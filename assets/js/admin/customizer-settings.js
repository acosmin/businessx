/* Customizer Settings Manager */
( function( api ) {

	var	api = wp.customize,
		bx_styles_template = wp.template( 'businessx-czr-settings-output' ),
		bx_simple_settings = _.map( bx_customizer_settings, function( element, index ) { return index } ),
		bx_settings_keys = bx_simple_settings,
		bx_settings_values = bx_simple_settings;


	// Update function
	function bx_update_css() {
		var new_settings,
			settings = _.object( bx_settings_keys, bx_customizer_settings );

		_.each( bx_settings_values, function( new_value ) {
			settings[ new_value ] = api( new_value )();
		} );

		new_settings = bx_styles_template( settings );

		api.previewer.send( 'bx-update-settings', new_settings );
	}


	// Update the CSS whenever a color setting is changed.
	_.each( bx_settings_values, function( new_value ) {
		api( new_value, function( new_value ) {
			new_value.bind( bx_update_css );
		} );
	} );


	// Link section
	api.sectionConstructor['link-button'] = api.Section.extend( {
		// No events for this type of section.a
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );


	// Businessx Extensions installer
	api.sectionConstructor['bxext-installer'] = api.Section.extend( {
		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
