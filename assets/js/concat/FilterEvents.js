!( () => {
	const select = document.getElementById( "event-tag-select" );
	if ( !select ) return;
	select.addEventListener( 'input', handleFilter );
	const els = document.querySelectorAll( '.event--listing' );

	function handleFilter( e ) {
		const select = e.target.value;

		filterItems( select )

	}
	function filterItems( select ) {
		els.forEach( item => {
			item.style.display = "block";
			if ( select === '' ) return;
			if ( !( item.classList.contains( `event-tag-${select}` ) ) )
				item.style.display = "none";
		} )
	}
} )();