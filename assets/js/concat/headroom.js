import '../../node_modules/headroom.js/dist/headroom.min.js'

const header = document.querySelector( "#inner-masthead" );

const options = {
	// vertical offset in px before element is first unpinned
	offset: 0,
	// or you can specify offset individually for up/down scroll
	offset: {
		up: 100,
		down: 50
	},
	// scroll tolerance in px before state changes
	tolerance: 0,
	// or you can specify tolerance individually for up/down scroll
	tolerance: {
		up: 5,
		down: 0
	},
	// css classes to apply
	classes: {
		// when element is initialised
		initial: "headroom",
		// when scrolling up
		pinned: "headroom--pinned",
		// when scrolling down
		unpinned: "headroom--unpinned",
		// when above offset
		top: "headroom--top",
		// when below offset
		notTop: "headroom--not-top",
		// when at bottom of scroll area
		bottom: "headroom--bottom",
		// when not at bottom of scroll area
		notBottom: "headroom--not-bottom",
		// when frozen method has been called
		frozen: "headroom--frozen",
		// multiple classes are also supported with a space-separated list
		pinned: "headroom--pinned foo bar"
	},
	// element to listen to scroll events on, defaults to `window`
	// scroller: someElement,
	// callback when pinned, `this` is headroom object
	onPin: function () { },
	// callback when unpinned, `this` is headroom object
	onUnpin: function () { },
	// callback when above offset, `this` is headroom object
	onTop: function () { },
	// callback when below offset, `this` is headroom object
	onNotTop: function () { },
	// callback when at bottom of page, `this` is headroom object
	onBottom: function () { },
	// callback when moving away from bottom of page, `this` is headroom object
	onNotBottom: function () { }
};


const headroom = new Headroom( header, options );
headroom.init();