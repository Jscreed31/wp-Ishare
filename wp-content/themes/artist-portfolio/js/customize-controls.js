( function( api ) {

	// Extends our custom "artist-portfolio" section.
	api.sectionConstructor['artist-portfolio'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );