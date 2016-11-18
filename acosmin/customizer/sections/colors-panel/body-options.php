<?php
/* ------------------------------------ */
/*  Body Colors
/* ------------------------------------ */

/// Body Colors section
$wp_customize->add_section( 'colors_body', array(
	'title'				=> __( 'Body', 'businessx' ),
	'panel'				=> 'colors_options',
) );

	////// Body Colors
	businessx_controller_color_picker(
		'colors_body_background',
		'colors_body',
		esc_html__( 'Background color:', 'businessx' ), '',
		'#ffffff' );

	businessx_controller_color_picker(
		'colors_body_font',
		'colors_body',
		esc_html__( 'Font color:', 'businessx' ), '',
		'#414141' );

	businessx_controller_color_picker(
		'colors_body_border',
		'colors_body',
		esc_html__( 'Border color:', 'businessx' ),
		esc_html__( 'Border color for widgets title is located in "Sidebars"', 'businessx' ),
		'#e1e1e1' );

	businessx_controller_color_picker(
		'colors_body_999',
		'colors_body',
		esc_html__( '#999 color:', 'businessx' ),
		esc_html__( 'It applies to some elements: blockquote cite/small, captions...', 'businessx' ),
		'#e1e1e1' );
