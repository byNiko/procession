( () => {
	// mark this in sessionStorage
	document.addEventListener( 'click', handleClick );
	document.addEventListener( 'keydown', handleKeydown );

	const popupDisplayed = sessionStorage.getItem( 'popupDisplayed' );

	const triggers = document.querySelectorAll( '.openJoinPopup' );

	const body = document.getElementsByTagName( 'body' )[0];
	const popup = document.getElementById( 'joinPopup' );
	if ( !popup || !triggers.length ) return;
	if ( popupDisplayed !== "true" ) {
		setTimeout( () => {
			openJoinPopup();
		}, 5000 )
	}

	triggers.forEach( ( el ) => {
		el.addEventListener( 'mouseover', setupWillchange )
		el.addEventListener( 'touchstart', setupWillchange )
		el.addEventListener( 'mouseout', removeWillchange )
		el.addEventListener( 'touchmove', removeWillchange )
	} )

	function handleKeydown( e ) {
		e.key === "Escape" ? closePopup() : null;
	}

	function setupWillchange() {
		popup.style.willChange = "transform, opacity";
		transitionEnd()
	}
	function removeWillchange() {
		popup.style.willChange = "";
	}

	function transitionEnd() {
		popup.addEventListener( 'transitionend', removeWillchange )
	}

	function handleClick( e ) {
		e.target.closest( '.openJoinPopup' ) ? openJoinPopup() : null;
		e.target.closest( '#background-overlay' ) ? closePopup() : null;
		e.target.matches( '.popup--close-button' ) ? closePopup() : null;

	}
	function openJoinPopup() {
		// open popup
		body.classList.add( 'overlay--is-active' )
		popup.classList.add( 'is-active' )
		sessionStorage.setItem( "popupDisplayed", "true" );

	}

	function closePopup() {
		popup.classList.remove( 'is-active' )
		body.classList.remove( 'overlay--is-active' )
	}
	function getScrollbarWidth() {
		return window.outerWidth - document.body.clientWidth;
	}

} )();