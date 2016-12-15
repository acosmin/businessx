<?php
/* ------------------------------------------------------------------------- *
 *  Customizer
 *  ________________
 *
 *	This file registers options for the Customizer
 *	________________
 *
/* ------------------------------------------------------------------------- */



/*  Register Customizer options
/* ------------------------------------ */
if ( ! function_exists( 'businessx_customize_register' ) ) {
	function businessx_customize_register( $wp_customize ) {

		// Custom Controls
		require_once( BUSINESSX_CUSTOMIZER_PATH . 'controls/rgba/rgba-picker.php' ); // RGBA Color Picker
		require_once( BUSINESSX_CUSTOMIZER_PATH . 'controls/info/info.php' ); // Info control
		require_once( BUSINESSX_CUSTOMIZER_PATH . 'controls/button/button.php' ); // Button control
		require_once( BUSINESSX_CUSTOMIZER_PATH . 'controls/link/link.php' ); // Link section
		require_once( BUSINESSX_CUSTOMIZER_PATH . 'controls/recommend/recommend.php' ); // Recommend Businessx Extensions

		// Register custom sections
		$wp_customize->register_section_type( 'Businessx_Section_Link' );
		$wp_customize->register_section_type( 'Businessx_Installer_Section' );

		// Add postMessage support for site title and description for the Customizer
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.logo-text',
				'container_inclusive' => false,
				'render_callback' => 'businessx_customize_partial_blogname',
			) );
		}


			/*  Add panels
			/* ------------------------------------ */

			// Colors
			$wp_customize->add_panel( 'colors_options', array(
			  'title' 				=> __( 'Colors', 'businessx' ),
			  'priority'			=> 38,
			) );

			// Settings
			$wp_customize->add_panel( 'settings_options', array(
			  'title' 				=> __( 'Settings', 'businessx' ),
			  'priority'			=> 39,
			) );


			/*  Add sections
			/* ------------------------------------ */

			require_once( BUSINESSX_CUSTOMIZER_PATH . 'sections/docs-button.php' ); // Documentation button
			require_once( BUSINESSX_CUSTOMIZER_PATH . 'sections/recommend.php' ); // Businessx Extensions Recommendation
			require_once( BUSINESSX_CUSTOMIZER_PATH . 'custom-options/options.php' ); // Custom options

			$sections = array(
				'settings' => array(
					'header', 'posts', 'sidebars', 'footer', 'animations', 'preloader', 'woocommerce',
				),
				'colors' => array(
					'body', 'links', 'headings', 'inputs', 'buttons', 'header', 'header-heading',
					'mobile-menu', 'sidebars', 'footer', 'footer-credits', 'woocommerce'
				)
			);

			foreach( $sections as $panel => $section ) {
				foreach ($section as $section_name ) {
					$businessx_options_incl_path = BUSINESSX_CUSTOMIZER_PATH . 'sections/' . $panel . '-panel/' . $section_name . '-options.php';
					require_once( $businessx_options_incl_path );
				}
			}


	} // businessx_customize_register() END
}
add_action( 'customize_register', 'businessx_customize_register', 11 );


/*  Including the rest of Customizer functions
/* ------------------------------------------- */

// Options & defaults
require_once( BUSINESSX_CUSTOMIZER_PATH . 'options.php' );

// Output CSS for Previewer templating
require_once( BUSINESSX_CUSTOMIZER_PATH . 'preview-css-tmpl.php' );

// Output inline styles
require_once( BUSINESSX_CUSTOMIZER_PATH . 'inline-styles.php' );

// Enqueue Customizer styles/scripts
require_once( BUSINESSX_CUSTOMIZER_PATH . 'enqueue.php' );

// Wrappers for Customizer methods
require_once( BUSINESSX_CUSTOMIZER_PATH . 'controllers.php' );

// Partials for selective refresh
require_once( BUSINESSX_CUSTOMIZER_PATH . 'partials.php' );
