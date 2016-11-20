<?php
/* ------------------------------------ */
/*  Preloader
/* ------------------------------------ */

	/// Preloader section
	$wp_customize->add_section( 'preloader_settings', array(
		'title'	=> __( 'Preloader', 'businessx' ),
		'panel'	=> 'settings_options'
	) );

		////// Preloader - Options
		businessx_controller_info(
			'preloader_info',
			'preloader_settings',
			__( 'Preloader Options', 'businessx' ),
			__( '<p>This displays a loading animation until the browser fetched the whole web content and will fade out the moment the page has been completely cached. <br /><br /><b>It is best to check this on the live website after you make changes and save.</b></p>', 'businessx') );

		businessx_controller_checkbox(
			'preloader_enable',
			'preloader_settings',
			esc_html__( 'Enable Preloader', 'businessx' ), '', false );

		businessx_controller_color_picker(
			'preloader_fill_color',
			'preloader_settings',
			esc_html__( 'Preloader fill color:', 'businessx' ), '',
			'#dd3333', false );

		businessx_controller_color_picker(
			'preloader_bg_color',
			'preloader_settings',
			esc_html__( 'Preloader fill color:', 'businessx' ), '',
			'#ffffff', false );

		businessx_controller_simple_opacity(
			'preloader_opacity',
			'preloader_settings',
			esc_html__( 'Preloader opacity:', 'businessx' ), '', '0.9', false );

		businessx_controller_select(
			'preloader_options',
			'preloader_settings',
			apply_filters( 'businessx_preloader_options___filter', $items = array(
				'balls' 	=> esc_html__( 'Balls Beat', 'businessx' ),
				'balls2' 	=> esc_html__( 'Balls Pulse', 'businessx' ),
				'balls3' 	=> esc_html__( 'Balls Spinner', 'businessx' ),
				'loader1' 	=> esc_html__( 'Loading #1', 'businessx' ),
			) ),
			esc_html__( 'Preloader animation:', 'businessx' ), '', 'balls', false );
