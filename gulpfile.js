const devURL = "procession.local";

// Initialize modules
// Importing specific gulp API functions lets us write them below as series() instead of gulp.series()
const { src, dest, watch, series, parallel } = require( 'gulp' );
// Importing all the Gulp-related packages we want to use
const sass = require( 'gulp-sass' )( require( 'sass' ) );
const concat = require( 'gulp-concat' );
const rename = require( 'gulp-rename' );
const terser = require( 'gulp-terser' );
const postcss = require( 'gulp-postcss' );
const autoprefixer = require( 'autoprefixer' );
const cssnano = require( 'cssnano' );
const replace = require( 'gulp-replace' );
const browsersync = require( 'browser-sync' ).create();

// File paths
const files = {
	scssPath: 'assets/sass/**/*.scss',
	jsConcatPath: 'assets/js/concat/*.js',
	jsSolosPath: 'assets/js/solos/*.js',
	images: 'assets/images/**/*.{png,jpg,jpeg,svg}',
	fonts: 'assets/fonts/**/*.{ttf,woff,woff2,eof,svg}'
};

// Sass task: compiles the style.scss file into style.css
function scssTask() {
	return src( files.scssPath, { sourcemaps: true } ) // set source and turn on sourcemaps
		.pipe( sass() ) // compile SCSS to CSS
		.pipe( postcss( [autoprefixer(), cssnano()] ) ) // PostCSS plugins
		.pipe( dest( '.', { sourcemaps: '.' } ) )// put final CSS in dist folder with sourcemap
		.pipe( browsersync.stream() );  // stream css updates
}

// JS task: concatenates and uglifies JS files to script.js
function jsConcatTask() {
	return src(
		[
			files.jsConcatPath,
			//,'!' + 'includes/js/jquery.min.js', // to exclude any specific files
		],
		{ sourcemaps: true }
	)
		.pipe( concat( 'bundle.js' ) )
		.pipe( terser() )
		.pipe( rename( { suffix: ".min" } ) )
		.pipe( dest( 'dist/js', { sourcemaps: '.' } ) );
}

function jsSolosTask() {
	return src(
		[
			files.jsSolosPath
		],
		{ sourcemaps: true }
	)
		.pipe( terser() )
		.pipe( rename( { suffix: ".min" } ) )
		.pipe( dest( 'dist/js', { sourcemaps: '.' } ) );
}

// Cachebust
function cacheBustTask() {
	var cbString = new Date().getTime();
	return src( ['**/*.php'] )
		.pipe( replace( /cb=\d+/g, 'cb=' + cbString ) )
		.pipe( dest( '.' ) );
}

function moveImages( cb ) {
	return src( 'assets/images/**/*.{png,jpg,jpeg,svg}' )
		// Perform minification tasks, etc here
		.pipe( dest( 'dist/images' ) );
}

function moveFonts( cb ) {
	return src( 'assets/fonts/**/*.{woff,woff2,ttf}' )
		// Perform minification tasks, etc here
		.pipe( dest( 'dist/fonts' ) );
}
// Browsersync to spin up a local server
function browserSyncServe( cb ) {
	// initializes browsersync server
	browsersync.init( {
		proxy: devURL,
		https: true

	} );
	cb();
}
function browserSyncReload( cb ) {
	// reloads browsersync server
	browsersync.reload();
	cb();
}

// Watch task: watch SCSS and JS files for changes
// If any change, run scss and js tasks simultaneously
function watchTask() {
	watch(
		[files.scssPath, files.jsConcatPath, files.jsSolosPath, files.images, files.fonts],
		{ interval: 1000, usePolling: true }, //Makes docker work
		series( parallel( scssTask, jsConcatTask, jsSolosTask, moveImages, moveFonts ), cacheBustTask )
	);
}

// Browsersync Watch task
// Watch HTML file for change and reload browsersync server
// watch SCSS and JS files for changes, run scss and js tasks simultaneously and update browsersync
function bsWatchTask() {
	watch( '**/*.php', browserSyncReload );
	watch(
		[files.scssPath],
		{ interval: 1000, usePolling: true }, //Makes docker work
		series( parallel( scssTask ) )
	);
	watch(
		[files.jsConcatPath, files.jsSolosPath, files.images, files.fonts],
		{ interval: 1000, usePolling: true }, //Makes docker work
		series( parallel( jsConcatTask, jsSolosTask, moveImages, moveFonts ), cacheBustTask, browserSyncReload )
	);
}

// Export the default Gulp task so it can be run
// Runs the scss and js tasks simultaneously
// then runs cacheBust, then watch task
exports.all = series( parallel( scssTask, jsConcatTask, jsSolosTask, moveImages, moveFonts ), cacheBustTask, watchTask );

// Runs all of the above but also spins up a local Browsersync server
// Run by typing in "gulp bs" on the command line
exports.default = series(
	parallel( scssTask, jsConcatTask, jsSolosTask, moveImages, moveFonts ),
	cacheBustTask,
	browserSyncServe,
	bsWatchTask
);