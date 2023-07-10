( () => {
	const toggle = document.querySelector( '.menu-toggle' );
	const target = document.querySelector( '.main-navigation' );
	const body = document.querySelector( 'body' );

	if ( !toggle || !target ) return
	let isActive = false;
	toggle.addEventListener( 'click', function toggleMenu( e ) {
		this.classList.toggle( 'is-active' )
		target.classList.toggle( 'is-active' );
		isActive = !isActive;
		if ( isActive ) {
			body.style.overflowY = 'hidden';
		} else {
			body.style.overflowY = '';
		}


	} );

} )()