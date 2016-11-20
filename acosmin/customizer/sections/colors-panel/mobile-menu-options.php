<?php
/* ------------------------------------ */
/*  Mobile Menu Colors
/* ------------------------------------ */

/// Mobile Menu section
$wp_customize->add_section( 'colors_mobile_menu', array(
	'title'				=> __( 'Mobile Menu', 'businessx' ),
	'panel'				=> 'colors_options',
) );

	////// Mobile Menu Colors
	businessx_controller_info(
		'colors_mobile_menu_info',
		'colors_mobile_menu',
		__( 'Mobile Menu Colors', 'businessx' ),
		__( '<p>This only appears in mobile view. To test this you will need to click on the tablet button.</p>', 'businessx' ), '', 'bx-m-b' );

	businessx_controller_color_picker(
		'colors_mobile_menu_background',
		'colors_mobile_menu',
		esc_html__( 'Background color', 'businessx' ), '',
		'#ffffff' );

	businessx_controller_color_picker(
		'colors_mobile_menu_borders',
		'colors_mobile_menu',
		esc_html__( 'Borders color', 'businessx' ), '',
		'#e4e4e4' );

	businessx_controller_color_picker(
		'colors_mobile_menu_text_links',
		'colors_mobile_menu',
		esc_html__( 'Text and links', 'businessx' ), '',
		'#232323' );

	businessx_controller_rgba_picker(
		'colors_mobile_menu_submenu_bg',
		'colors_mobile_menu',
		esc_html__( 'Submenu background color', 'businessx' ),
		esc_html__( 'You should make this a transparent color, to keep the effect.', 'businessx' ),
		'rgba(0,0,0,0.03)' );

	businessx_controller_rgba_picker(
		'colors_mobile_menu_arrow_btn',
		'colors_mobile_menu',
		esc_html__( 'Arrow button background', 'businessx' ), '',
		'rgba(0,0,0,0.05)' );

	businessx_controller_rgba_picker(
		'colors_mobile_menu_arrow_btn_opened',
		'colors_mobile_menu',
		esc_html__( 'Arrow button background', 'businessx' ), '',
		'rgba(0,0,0,0.1)' );

	businessx_controller_color_picker(
		'colors_mobile_menu_close',
		'colors_mobile_menu',
		esc_html__( 'Close button', 'businessx' ), '',
		'#76bc1c' );
