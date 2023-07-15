

!( () => {
	/** add query param to select links */
	const links = document.querySelectorAll( '.queryParam' );
	links.forEach( item => {
		const a = item.querySelector( 'a' );
		const src = new URL( a.href );
		src.searchParams.append( 'filter', 'festival' );
		a.href = src

	} )
} )();


!( () => {

	const select = document.getElementById( "event-tag-select" );
	if ( !select ) return;

	select.addEventListener( 'input', handleFilter );
	const els = document.querySelectorAll( '.event--listing' );
	filterOnLoad();
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
	function filterOnLoad() {
		const optionParam = new URLSearchParams( window.location.search ).get( 'filter' );
		if ( optionParam ) {
			const opt = [...select.options].find( op => op.value === optionParam );
			if ( opt ) select.value = opt.value;
			filterItems( opt.value )
		}
	}
} )();