( () => {
	const toggle = document.querySelector( '.menu-toggle' );
	const target = document.querySelector( '.main-navigation' );
	if ( !toggle || !target ) return
	toggle.addEventListener( 'click', function toggleMenu( e ) {
		this.classList.toggle( 'is-active' )
		target.classList.toggle( 'is-active' );
	} );

} )()