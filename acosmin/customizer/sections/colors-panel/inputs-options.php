<?php
/* ------------------------------------ */
/*  Inputs Colors
/* ------------------------------------ */

/// Inputs Colors section
$wp_customize->add_section( 'colors_inputs', array(
	'title'				=> __( 'Input Fields', 'businessx' ),
	'panel'				=> 'colors_options',
) );

	////// Inputs Colors
	businessx_controller_color_picker(
		'colors_inputs_placeholder',
		'colors_inputs',
		esc_html__( 'Placeholder color:', 'businessx' ), '',
		'#bfbfbf' );

	businessx_controller_color_picker(
		'colors_inputs_border_bottom',
		'colors_inputs',
		esc_html__( 'Inputs - border bottom:', 'businessx' ), '',
		'#d8d8d8' );

	businessx_controller_color_picker(
		'colors_inputs_background',
		'colors_inputs',
		esc_html__( 'Inputs - background:', 'businessx' ), '',
		'#f4f4f4' );

	businessx_controller_color_picker(
		'colors_inputs_color',
		'colors_inputs',
		esc_html__( 'Inputs - font color:', 'businessx' ), '',
		'#666666' );

	businessx_controller_color_picker(
		'colors_inputs_f_border_bottom',
		'colors_inputs',
		esc_html__( 'Inputs:focus - border bottom:', 'businessx' ), '',
		'#76bc1c' );

	businessx_controller_color_picker(
		'colors_inputs_f_background',
		'colors_inputs',
		esc_html__( 'Inputs:focus - background:', 'businessx' ), '',
		'#fcfcfc' );
