<?php
/* ------------------------------------ */
/*  Header Colors
/* ------------------------------------ */

/// Header section
$wp_customize->add_section( 'colors_header', array(
	'title'				=> __( 'Header', 'businessx' ),
	'panel'				=> 'colors_options',
) );

	////// Transparent Header Colors
	businessx_controller_info(
		'colors_header_transparent_info',
		'colors_header',
		__( 'Transparent Header', 'businessx' ) );

	businessx_controller_color_picker(
		'colors_header_transparent_text',
		'colors_header',
		esc_html__( 'Text color:', 'businessx' ),
		esc_html__( 'Does not apply to links, just text. It will also change arrows color for sub-menus.', 'businessx' ),
		'#ffffff' );

	businessx_controller_color_picker(
		'colors_header_transparent_links',
		'colors_header',
		esc_html__( 'Links color:', 'businessx' ), '',
		'#ffffff' );

	businessx_controller_simple_opacity(
		'colors_header_transparent_opacity',
		'colors_header',
		esc_html__( 'Menu - links opacity:', 'businessx' ), '',
		'0.8' );

	businessx_controller_rgba_picker(
		'colors_header_transparent_2nd',
		'colors_header',
		esc_html__( '2nd style button:', 'businessx' ),
		esc_html__( 'Example: search button', 'businessx' ),
		'rgba(255,255,255,0.2)' );

	businessx_controller_rgba_picker(
		'colors_header_transparent_2nd_hover',
		'colors_header',
		esc_html__( '2nd style button (hover)', 'businessx' ), '',
		'rgba(255,255,255,0.3)' );

	businessx_controller_color_picker(
		'colors_header_transparent_action_border',
		'colors_header',
		esc_html__( 'Action button border-color:', 'businessx' ), '',
		'#82cf1f' );

	businessx_controller_rgba_picker(
		'colors_header_transparent_submenu_bg',
		'colors_header',
		esc_html__( 'Submenu background color:', 'businessx' ), '',
		'rgba(0,0,0,0.5)' );

	businessx_controller_rgba_picker(
		'colors_header_transparent_submenu_borders',
		'colors_header',
		esc_html__( 'Submenu borders color:', 'businessx' ), '',
		'rgba(255,255,255,0.1)' );

	////// Default Header Colors
	businessx_controller_info(
		'colors_header_colored_info',
		'colors_header',
		__( 'Colored Header', 'businessx' ) );

	businessx_controller_color_picker(
		'colors_header_colored_background',
		'colors_header',
		esc_html__( 'Background color:', 'businessx' ), '',
		'#ffffff' );

	businessx_controller_color_picker(
		'colors_header_colored_border',
		'colors_header',
		esc_html__( 'Bottom border color:', 'businessx' ), '',
		'#e5e5e5' );

	businessx_controller_color_picker(
		'colors_header_colored_links_text',
		'colors_header',
		esc_html__( 'Text and links color', 'businessx' ), '',
		'#232323' );

	businessx_controller_color_picker(
		'colors_header_colored_links_hover',
		'colors_header',
		esc_html__( 'Links hover state', 'businessx' ), '',
		'#444444' );

	businessx_controller_color_picker(
		'colors_header_colored_action_border',
		'colors_header',
		esc_html__( 'Action button border-color:', 'businessx' ), '',
		'#82cf1f' );

	businessx_controller_rgba_picker(
		'colors_header_colored_2nd',
		'colors_header',
		esc_html__( '2nd style button:', 'businessx' ),
		esc_html__( 'Example: search button', 'businessx' ),
		'rgba(0,0,0,0.1)' );

	businessx_controller_rgba_picker(
		'colors_header_colored_2nd_hover',
		'colors_header',
		esc_html__( '2nd style button (hover)', 'businessx' ), '',
		'rgba(0,0,0,0.2)' );

	businessx_controller_color_picker(
		'colors_header_colored_submenu_bg',
		'colors_header',
		esc_html__( 'Submenu background color:', 'businessx' ), '',
		'#ffffff' );

	businessx_controller_color_picker(
		'colors_header_colored_submenu_borders',
		'colors_header',
		esc_html__( 'Submenu borders color:', 'businessx' ), '',
		'#e5e5e5' );

	businessx_controller_rgba_picker(
		'colors_header_colored_submenu_shadow',
		'colors_header',
		esc_html__( 'Submenu shadow', 'businessx' ), '',
		'rgba(0,0,0,0.2)' );
