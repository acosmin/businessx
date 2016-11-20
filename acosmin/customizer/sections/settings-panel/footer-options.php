<?php
/* ------------------------------------ */
/*  Footer
/* ------------------------------------ */

	/// Footer section
	$wp_customize->add_section( 'footer_settings', array(
		'title'				=> __( 'Footer', 'businessx' ),
		'panel'				=> 'settings_options'
	) );

		////// Footer - Sidebars
		businessx_controller_info(
			'footer_sidebars_info',
			'footer_settings',
			__( 'Footer sidebars', 'businessx' ) );

		businessx_controller_checkbox(
			'footer_sidebars_disable',
			'footer_settings',
			esc_html__( 'Disable footer sidebars area', 'businessx' ), '', false );

		////// Footer - Credits
		businessx_controller_info(
			'footer_credits_info',
			'footer_settings',
			__( 'Footer credits', 'businessx' ) );

		businessx_controller_checkbox(
			'footer_credits_disable',
			'footer_settings',
			esc_html__( 'Disable footer credits area', 'businessx' ), '', false );

		businessx_controller_checkbox(
			'footer_credits_logo_hide',
			'footer_settings',
			esc_html__( 'Hide logo', 'businessx' ), '', false );

		businessx_controller_txt_area(
			'footer_credits_creds_line',
			'footer_settings',
			esc_html__( 'Copyright line:', 'businessx' ),
			esc_html__( 'You can use <a> tags', 'businessx' ),
			businessx_return_copyright_templ(),
			'.footer-copyright', true, 'wp_kses_post' );
