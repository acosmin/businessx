<?php
/* ------------------------------------------- */
/*  Enqueue Customizer specific scripts/styles
/* ------------------------------------------- */


/*  Customizer JS/CSS
/* ------------------------------------ */
if ( ! function_exists( 'businessx_customizer_js_css' ) ) {
	function businessx_customizer_js_css() {
		global $businessx_customizer_settings;

		// Customizer Hacks
		wp_enqueue_style( 'businessx-customizer-style', get_template_directory_uri() . '/assets/css/admin/customizer.css', array(), '20160412', 'all' );
		wp_enqueue_script( 'businessx-customizer-js', get_template_directory_uri() . '/assets/js/admin/customizer.js', array(), '20160412', true );
		wp_localize_script( 'businessx-customizer-js', 'businessx_customizer_js_vars',
			apply_filters( 'businessx_customizer_js___vars', array(
				'admin_ajax'	=> esc_url( admin_url('admin-ajax.php') ),
				'dismiss_ext_nonce' => wp_create_nonce( 'businessx_dismiss_ext_nonce' )
			) )
		);

		// Settings Manager
		wp_enqueue_script( 'businessx-customizer-settings', get_template_directory_uri() . '/assets/js/admin/customizer-settings.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20160412', true );
		wp_localize_script( 'businessx-customizer-settings', 'bx_customizer_settings', $businessx_customizer_settings );

	}
}
add_action( 'customize_controls_enqueue_scripts', 'businessx_customizer_js_css' );


if ( ! function_exists( 'businessx_customizer_preview_js' ) ) {
	function businessx_customizer_preview_js() {
		wp_enqueue_script( 'businessx-customize-preview', get_template_directory_uri() . '/assets/js/admin/customize-preview.js', array( 'customize-preview' ), '20160412', true );
	}
}
add_action( 'customize_preview_init', 'businessx_customizer_preview_js' );
