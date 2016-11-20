<?php
/* ------------------------------------ */
/*  Footer Credits Colors
/* ------------------------------------ */

/// Footer Credits
$wp_customize->add_section( 'colors_footer_credits', array(
	'title'				=> __( 'Footer Credits', 'businessx' ),
	'panel'				=> 'colors_options',
) );

	////// Footer Credits colors
	businessx_controller_color_picker(
		'colors_footer_credits_bg',
		'colors_footer_credits',
		esc_html__( 'Background color:', 'businessx' ), '',
		'#222222' );

	businessx_controller_color_picker(
		'colors_footer_credits_text',
		'colors_footer_credits',
		esc_html__( 'Font color:', 'businessx' ), '',
		'#7a7a7a' );

	businessx_controller_color_picker(
		'colors_footer_credits_links',
		'colors_footer_credits',
		esc_html__( 'Links color:', 'businessx' ), '',
		'#ffffff' );
