<?php
/* ------------------------------------ */
/*  Buttons Colors
/* ------------------------------------ */

/// Buttons colors
$wp_customize->add_section( 'colors_btns', array(
	'title'				=> __( 'Buttons', 'businessx' ),
	'panel'				=> 'colors_options',
) );

	////// Default Button Colors
	businessx_controller_info(
		'colors_btns_def_info',
		'colors_btns',
		__( 'Default style', 'businessx' ) );

	businessx_controller_color_picker(
		'colors_btn_def_default',
		'colors_btns',
		esc_html__( 'Default color:', 'businessx' ), '',
		'#76bc1c' );

	businessx_controller_color_picker(
		'colors_btn_def_hover',
		'colors_btns',
		esc_html__( 'Hover state:', 'businessx' ), '',
		'#82cf1f' );

	businessx_controller_color_picker(
		'colors_btn_def_other',
		'colors_btns',
		esc_html__( 'Focus/Active state:', 'businessx' ), '',
		'#69a619' );

	////// Opaque Button Colors
	businessx_controller_info(
		'colors_btns_opq_info',
		'colors_btns',
		__( 'Opaque style', 'businessx' ) );

	businessx_controller_rgba_picker(
		'colors_btn_opq_default',
		'colors_btns',
		esc_html__( 'Default color:', 'businessx' ), '',
		'rgba(28,130,188,0.5)' );

	businessx_controller_rgba_picker(
		'colors_btn_opq_border',
		'colors_btns',
		esc_html__( 'Border color:', 'businessx' ), '',
		'rgba(28,130,188,1)' );

	businessx_controller_color_picker(
		'colors_btn_opq_hover',
		'colors_btns',
		esc_html__( 'Hover state:', 'businessx' ), '',
		'#1c82bc' );

	businessx_controller_color_picker(
		'colors_btn_opq_other',
		'colors_btns',
		esc_html__( 'Focus/Active state:', 'businessx' ), '',
		'#1972a6' );

	businessx_controller_rgba_picker(
		'colors_btn_opq_default_2x',
		'colors_btns',
		esc_html__( '2x class:', 'businessx' ),
		esc_html__( 'This class may be used on some buttons, it sets the opacity 2x times higher', 'businessx' ),
		'rgba(28,130,188,0.8)' );

	////// Alternative Button Colors
	businessx_controller_info(
		'colors_btns_alt_info',
		'colors_btns',
		__( 'Alternative style', 'businessx' ) );

	businessx_controller_color_picker(
		'colors_btn_alt_default',
		'colors_btns',
		esc_html__( 'Default color:', 'businessx' ), '',
		'#000000' );

	businessx_controller_color_picker(
		'colors_btn_alt_border',
		'colors_btns',
		esc_html__( 'Border color:', 'businessx' ), '',
		'#1c82bc' );

	businessx_controller_color_picker(
		'colors_btn_alt_other',
		'colors_btns',
		esc_html__( 'Hover/Focus/Active state:', 'businessx' ), '',
		'#232323' );

	businessx_controller_color_picker(
		'colors_btn_alt_border_hover',
		'colors_btns',
		esc_html__( 'Border hover state:', 'businessx' ), '',
		'#232323' );
