<?php
/* ------------------------------------ */
/*  Sidebars Colors
/* ------------------------------------ */

/// Sidebars
$wp_customize->add_section( 'colors_sidebars', array(
	'title'				=> __( 'Sidebars', 'businessx' ),
	'panel'				=> 'colors_options',
) );

	////// Sidebars colors
	businessx_controller_color_picker(
		'colors_sidebars_h_border_colors',
		'colors_sidebars',
		esc_html__( 'Widget title border color:', 'businessx' ), '',
		'#e1e1e1' );

	businessx_controller_color_picker(
		'colors_sidebars_h_border_colors_2',
		'colors_sidebars',
		esc_html__( 'Widget title 2nd border color:', 'businessx' ), '',
		'#76bc1c' );
