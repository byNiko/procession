<?php

/**
 * procession functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package procession
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function procession_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on procession, use a find and replace
		* to change 'procession' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('procession', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'procession'),
			'menu-2' => esc_html__('Secondary', 'procession'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'procession_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'procession_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function procession_content_width() {
	$GLOBALS['content_width'] = apply_filters('procession_content_width', 640);
}
add_action('after_setup_theme', 'procession_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function procession_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'procession'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'procession'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'procession_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function procession_scripts() {
	wp_enqueue_style('procession-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('procession-style', 'rtl', 'replace');

	// wp_enqueue_script('procession-navigation', get_template_directory_uri() . '/dist/js/navigation.js', array(), _S_VERSION, true);
	wp_enqueue_script('procession-bundle', get_template_directory_uri() . '/dist/js/bundle.min.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'procession_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if (class_exists('WooCommerce')) {
	require get_template_directory() . '/inc/woocommerce.php';
}
require get_template_directory() . '/inc/acf.php';


function mytheme_setup_theme_supported_features() {
	add_theme_support('editor-color-palette', array(
		array(
			'name' => __('dark blue', 'procession'),
			'slug' => 'dark-blue',
			'color' => '#001f66',
		),
		array(
			'name' => __('light blue', 'procession'),
			'slug' => 'light-blue',
			'color' => '#57a3f4',
		),
		array(
			'name' => __('white', 'procession'),
			'slug' => 'white',
			'color' => '#fff',
		),
		array(
			'name' => __('grey', 'procession'),
			'slug' => 'grey',
			'color' => '#f5f5f5',
		),
		array(
			'name' => __('black', 'procession'),
			'slug' => 'black',
			'color' => '#000',
		),
	));
}

add_action('after_setup_theme', 'mytheme_setup_theme_supported_features');



function procession_get_wavy_line() {
	echo
	'<div class="wave">
	<img class="d-none" src="' . wp_get_upload_dir()['url'] . '/Wiggle-line-copy.png" alt="">
</div>';
}


function procession_query_all_events($query) {
	if (is_admin()) return;
	if ($query->is_main_query()) {
		$query->set('post_type', 'event');
	}
}
// add_action('pre_get_posts', 'procession_query_all_events');