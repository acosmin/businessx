/* Customizer Preview */
( function( $ ) {

	var style = $( 'businessx-czr-settings-output-css' ),
		 api = wp.customize;

	if ( ! style.length ) {
		style = $( 'head' ).append( '<style type="text/css" id="businessx-czr-settings-output-css" />' )
		                    .find( '#businessx-czr-settings-output-css' );
	}

	api.bind( 'preview-ready', function() {
		api.preview.bind( 'bx-update-settings', function( new_settings ) {
			style.html( new_settings );
		} );
	} );

} )( jQuery );