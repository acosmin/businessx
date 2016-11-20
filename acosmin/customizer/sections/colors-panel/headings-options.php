<?php
/* ------------------------------------ */
/*  Headings Colors
/* ------------------------------------ */

/// Headings Colors section
$wp_customize->add_section( 'colors_headings', array(
	'title'				=> __( 'Headings', 'businessx' ),
	'panel'				=> 'colors_options',
) );

	////// Headings Colors
	businessx_controller_color_picker(
		'colors_headings_base',
		'colors_headings',
		esc_html__( 'Base color:', 'businessx' ), '',
		'#232323' );

	businessx_controller_color_picker(
		'colors_headings_default',
		'colors_headings',
		esc_html__( 'Links state:', 'businessx' ), '',
		'#000000' );

	businessx_controller_color_picker(
		'colors_headings_other',
		'colors_headings',
		esc_html__( 'Hover/Active/Focus state:', 'businessx' ), '',
		'#444444' );
