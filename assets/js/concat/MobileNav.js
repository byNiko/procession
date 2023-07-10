
!( function () {
	window.addEventListener( 'click', e => { console.log( 'click', e ) } )
	const mediaQuery = window.matchMedia( '(min-width: 40rem)' )
	// Check if the media query is true
	if ( !mediaQuery.matches ) {
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
			// link.addEventListener( 'touchstart', toggleFocus, false );
		}

		function toggleFocus( event ) {

			// if ( event.type === 'focus' || event.type === 'blur' || event.type === 'click' ) {
			if ( event.type === 'click' ) {
				event.preventDefault();
				let self = this;

				// Move up through the ancestors of the current link until we hit .nav-menu.
				while ( !self.classList.contains( 'main-menu' ) ) {

					// On li elements toggle the class .focus.
					if ( 'li' === self.tagName.toLowerCase() ) {
						if ( self.classList.contains( 'focus' ) ) {
							self.classList.remove( 'focus' );
						} else {
							for ( const link of linksWithChildren ) {
								link.parentNode.classList.remove( 'focus' );
							}
							self.classList.add( 'focus' )

						}
					}
					self = self.parentNode;
				}
			}

			if ( event.type === 'focus' ) {
				return;
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
	}
} )();