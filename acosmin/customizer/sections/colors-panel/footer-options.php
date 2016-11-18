<?php
/* ------------------------------------ */
/*  Footer Colors
/* ------------------------------------ */

/// Footer
$wp_customize->add_section( 'colors_footer', array(
	'title'				=> __( 'Footer', 'businessx' ),
	'panel'				=> 'colors_options',
) );

	////// Footer colors - general
	businessx_controller_info(
		'colors_footer_general_info',
		'colors_footer',
		__( 'General options', 'businessx' ), '', '', 'bx-m-b' );

	businessx_controller_color_picker(
		'colors_footer_background_color',
		'colors_footer',
		esc_html__( 'Background color:', 'businessx' ), '',
		'#333333' );

	businessx_controller_color_picker(
		'colors_footer_color',
		'colors_footer',
		esc_html__( 'Text color:', 'businessx' ), '',
		'#999999' );

	businessx_controller_color_picker(
		'colors_footer_links_headings',
		'colors_footer',
		esc_html__( 'Headings and links:', 'businessx' ), '',
		'#ffffff' );

	businessx_controller_color_picker(
		'colors_footer_links_hover',
		'colors_footer',
		esc_html__( 'Links hover state:', 'businessx' ), '',
		'#ffffff' );

	businessx_controller_color_picker(
		'colors_footer_borders',
		'colors_footer',
		esc_html__( 'Border color:', 'businessx' ), '',
		'#595959' );

	businessx_controller_color_picker(
		'colors_footer_widget_2nd',
		'colors_footer',
		esc_html__( 'Widget title - 2nd color:', 'businessx' ), '',
		'#76bc1c' );

	////// Footer colors - inputs, textarea, select
	businessx_controller_info(
		'colors_footer_form_info',
		'colors_footer',
		__( 'Forms elemenets', 'businessx' ),
		__( '<p>Like inputs, textarea, selects, buttons.</p>', 'businessx' ), '', 'bx-m-b' );

	businessx_controller_color_picker(
		'colors_footer_form_bg',
		'colors_footer',
		esc_html__( 'Background color:', 'businessx' ), '',
		'#444444' );

	businessx_controller_color_picker(
		'colors_footer_form_border',
		'colors_footer',
		esc_html__( 'Border color:', 'businessx' ), '',
		'#666666' );

	businessx_controller_color_picker(
		'colors_footer_form_text',
		'colors_footer',
		esc_html__( 'Font color:', 'businessx' ), '',
		'#e1e1e1' );

	businessx_controller_color_picker(
		'colors_footer_form_bg_focus',
		'colors_footer',
		esc_html__( 'Background color - focus:', 'businessx' ), '',
		'#545454' );

	businessx_controller_color_picker(
		'colors_footer_form_border_focus',
		'colors_footer',
		esc_html__( 'Border color - focus:', 'businessx' ), '',
		'#76bc1c' );

	businessx_controller_color_picker(
		'colors_footer_form_placeholder',
		'colors_footer',
		esc_html__( 'Text placeholder color:', 'businessx' ), '',
		'#bfbfbf' );

	////// Footer colors - buttons
	businessx_controller_info(
		'colors_footer_buttons_info',
		'colors_footer',
		__( 'Buttons', 'businessx' ), '', '', 'bx-m-b' );

	businessx_controller_color_picker(
		'colors_footer_buttons_bg',
		'colors_footer',
		esc_html__( 'Background color:', 'businessx' ), '',
		'#76bc1c' );

	businessx_controller_color_picker(
		'colors_footer_buttons_bg_hover',
		'colors_footer',
		esc_html__( 'Hover background color:', 'businessx' ), '',
		'#82cf1f' );

	businessx_controller_color_picker(
		'colors_footer_buttons_bg_other',
		'colors_footer',
		esc_html__( 'Focus/Active background color:', 'businessx' ), '',
		'#69a619' );
