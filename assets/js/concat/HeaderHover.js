!( () => {
	const mediaQuery = window.matchMedia( '(min-width: 40rem)' )
	// Check if the media query is true
	if ( mediaQuery.matches ) {
		const masthead = document.getElementById( 'masthead' );
		const subMenus = masthead.querySelectorAll( '.sub-menu' );
		const mH = masthead.clientHeight;
		masthead.style.height = `${mH}px`
		const tallest = getTallestSubmenu( subMenus );

		masthead.addEventListener( 'mouseleave', function ( e ) {
			masthead.classList.remove( 'is-hovered' )
			this.style.height = `${mH}px`;
		} )
		masthead.addEventListener( 'mouseenter', function ( e ) {
			masthead.classList.add( 'is-hovered' );
			this.style.height = `${mH + tallest}px`;
		} )
	}
	function getTallestSubmenu( submenuArr ) {
		return Array.from( submenuArr ).reduce( ( prev, itt ) => {
			const x = itt.clientHeight;
			const y = ( prev && prev.clientHeight ) ? prev.clientHeight : prev || 0;
			return Math.max( x, y );
		} )
	}

} )();