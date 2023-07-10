
!( function () {

	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation doesn't exist.
	if ( !siteNavigation ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[0];


	// Get all the link elements within the menu.
	const links = menu.getElementsByTagName( 'a' );

	// Get all the link elements with children within the menu.
	const linksWithChildren = menu.querySelectorAll( '.menu-item-has-children > a, .page_item_has_children > a' );

	for ( const link of linksWithChildren ) {
		link.addEventListener( 'touchstart', toggleFocus, false );
		link.addEventListener( 'click', toggleFocus, false );
		link.addEventListener( 'touchstart', toggleFocus, false );
	}

	function toggleFocus( event ) {

		event.preventDefault();
		if ( event.type === 'focus' || event.type === 'blur' ) {
			let self = this;
			// Move up through the ancestors of the current link until we hit .nav-menu.
			while ( !self.classList.contains( 'nav-menu' ) ) {
				// On li elements toggle the class .focus.
				if ( 'li' === self.tagName.toLowerCase() ) {
					self.classList.toggle( 'focus' );
				}
				self = self.parentNode;
			}
		}

		if ( event.type === 'touchstart' || event.type === 'click' ) {
			const menuItem = this.parentNode;
			event.preventDefault();
			for ( const link of menuItem.parentNode.children ) {
				if ( menuItem !== link ) {
					link.classList.remove( 'focus' );
				}
			}
			menuItem.classList.toggle( 'focus' );
		}
	}
	// Remove the .toggled class and set aria-expanded to false when the user clicks outside the navigation.
	// document.addEventListener( 'click', function ( event ) {

	// 	const isClickInside = siteNavigation.contains( event.target );

	// 	if ( !isClickInside ) {
	// 		siteNavigation.classList.remove( 'is-active' );
	// 		button.setAttribute( 'aria-expanded', 'false' );
	// 	}
	// } );
} )();