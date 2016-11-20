<?php
/* ------------------------------------ */
/*  Animations
/* ------------------------------------ */

	/// Animations section
	$wp_customize->add_section( 'animations_settings', array(
		'title'	=> __( 'Animations', 'businessx' ),
		'panel'	=> 'settings_options'
	) );

		////// Animations - Options
		businessx_controller_info(
			'animations_info',
			'animations_settings',
			__( 'Animations Options', 'businessx' ),
			__( '<p>This will add a fade in animation on elements when you scroll down.</p>', 'businessx') );

		businessx_controller_checkbox(
			'animations_enable',
			'animations_settings',
			esc_html__( 'Enable Animations', 'businessx' ),
			esc_html__( 'You can only preview this option on the live website, not in Customizer', 'businessx' ), false );
