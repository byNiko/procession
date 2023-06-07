( () => {
	const toggle = document.querySelector( '.menu-toggle' );
	const target = document.querySelector( '.main-navigation' );
	toggle.addEventListener( 'click', function toggleMenu( e ) {
		this.classList.toggle( 'is-active' )
		target.classList.toggle( 'is-active' );
	} );

} )()