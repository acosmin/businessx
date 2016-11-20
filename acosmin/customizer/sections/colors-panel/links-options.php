<?php
/* ------------------------------------ */
/*  Links Colors
/* ------------------------------------ */

/// Links Colors section
$wp_customize->add_section( 'colors_links', array(
	'title'				=> __( 'Links', 'businessx' ),
	'panel'				=> 'colors_options',
) );

	////// Links colors
	businessx_controller_color_picker(
		'colors_links_default',
		'colors_links',
		esc_html__( 'Default state:', 'businessx' ), '',
		'#1c82bc' );

	businessx_controller_color_picker(
		'colors_links_other',
		'colors_links',
		esc_html__( 'Hover/Active/Focus state:', 'businessx' ), '',
		'#000000' );
