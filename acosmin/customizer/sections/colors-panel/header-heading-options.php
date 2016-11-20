<?php
/* ------------------------------------ */
/*  Header Heading Colors
/* ------------------------------------ */

/// Header Heading
$wp_customize->add_section( 'colors_header_heading', array(
	'title'				=> __( 'Header Heading', 'businessx' ),
	'panel'				=> 'colors_options',
) );

	////// Header Heading - Index Colors
	businessx_controller_info(
		'colors_header_heading_index_view',
		'colors_header_heading',
		__( 'Index view', 'businessx' ),
		__( '<p>Applies to homepage/archives/paged templates.</p>', 'businessx' ), '', 'bx-m-b' );

	businessx_controller_color_picker(
		'colors_header_heading_index_bg',
		'colors_header_heading',
		esc_html__( 'Background color', 'businessx' ),
		esc_html__( 'In case no background image is set.', 'businessx' ),
		'#232323' );

	businessx_controller_color_picker(
		'colors_header_heading_index_text',
		'colors_header_heading',
		esc_html__( 'Font color:', 'businessx' ), '',
		'#ffffff' );

	businessx_controller_rgba_picker(
		'colors_header_heading_index_text_shadow',
		'colors_header_heading',
		esc_html__( 'Font shadow', 'businessx' ), '',
		'rgba(0,0,0,0.75)' );

	businessx_controller_rgba_picker(
		'colors_header_heading_index_overlay_color',
		'colors_header_heading',
		esc_html__( 'Overlay background color', 'businessx' ),
		esc_html__( 'Make sure you use the opacity slider if you want to blend colors', 'businessx' ),
		'rgba(5,20,30,0.4)' );

	businessx_controller_rgba_picker(
		'colors_header_heading_index_overlay_shadow',
		'colors_header_heading',
		esc_html__( 'Overlay top shadow:', 'businessx' ),
		esc_html__( 'Make sure you use the opacity slider if you want to blend colors', 'businessx' ),
		'rgba(0,0,0,0.75)' );

	businessx_controller_color_picker(
		'colors_header_heading_index_links',
		'colors_header_heading',
		esc_html__( 'Links color:', 'businessx' ),
		esc_html__( 'If links are present, what color should they be.', 'businessx' ),
		'#ffffff' );

	////// Header Heading - Page Colors
	businessx_controller_info(
		'colors_header_heading_page_view',
		'colors_header_heading',
		__( 'Page view', 'businessx' ),
		__( '<p>Applies to pages templates.</p>', 'businessx' ), '', 'bx-m-b' );

	businessx_controller_color_picker(
		'colors_header_heading_page_bg',
		'colors_header_heading',
		esc_html__( 'Background color', 'businessx' ),
		esc_html__( 'In case no background image is set.', 'businessx' ),
		'#232323' );

	businessx_controller_color_picker(
		'colors_header_heading_page_text',
		'colors_header_heading',
		esc_html__( 'Font color:', 'businessx' ), '',
		'#ffffff' );

	businessx_controller_rgba_picker(
		'colors_header_heading_page_text_shadow',
		'colors_header_heading',
		esc_html__( 'Font shadow', 'businessx' ), '',
		'rgba(0,0,0,0.75)' );

	businessx_controller_rgba_picker(
		'colors_header_heading_page_overlay_color',
		'colors_header_heading',
		esc_html__( 'Overlay background color', 'businessx' ),
		esc_html__( 'Make sure you use the opacity slider if you want to blend colors', 'businessx' ),
		'rgba(5,20,30,0.4)' );

	businessx_controller_rgba_picker(
		'colors_header_heading_page_overlay_shadow',
		'colors_header_heading',
		esc_html__( 'Overlay top shadow:', 'businessx' ),
		esc_html__( 'Make sure you use the opacity slider if you want to blend colors', 'businessx' ),
		'rgba(0,0,0,0.75)' );

	businessx_controller_color_picker(
		'colors_header_heading_page_links',
		'colors_header_heading',
		esc_html__( 'Links color:', 'businessx' ),
		esc_html__( 'If links are present, what color should they be.', 'businessx' ),
		'#ffffff' );

	////// Header Heading - Single Colors
	businessx_controller_info(
		'colors_header_heading_single_view',
		'colors_header_heading',
		__( 'Single view', 'businessx' ),
		__( '<p>Applies to post templates.</p>', 'businessx' ), '', 'bx-m-b' );

	businessx_controller_color_picker(
		'colors_header_heading_single_bg',
		'colors_header_heading',
		esc_html__( 'Background color', 'businessx' ),
		esc_html__( 'In case no background image is set.', 'businessx' ),
		'#232323' );

	businessx_controller_color_picker(
		'colors_header_heading_single_text',
		'colors_header_heading',
		esc_html__( 'Font color:', 'businessx' ), '',
		'#ffffff' );

	businessx_controller_rgba_picker(
		'colors_header_heading_single_text_shadow',
		'colors_header_heading',
		esc_html__( 'Font shadow', 'businessx' ), '',
		'rgba(0,0,0,0.75)' );

	businessx_controller_rgba_picker(
		'colors_header_heading_single_overlay_color',
		'colors_header_heading',
		esc_html__( 'Overlay background color', 'businessx' ),
		esc_html__( 'Make sure you use the opacity slider if you want to blend colors', 'businessx' ),
		'rgba(5,20,30,0.4)' );

	businessx_controller_rgba_picker(
		'colors_header_heading_single_overlay_shadow',
		'colors_header_heading',
		esc_html__( 'Overlay top shadow:', 'businessx' ),
		esc_html__( 'Make sure you use the opacity slider if you want to blend colors', 'businessx' ),
		'rgba(0,0,0,0.75)' );

	businessx_controller_color_picker(
		'colors_header_heading_single_links',
		'colors_header_heading',
		esc_html__( 'Links color:', 'businessx' ),
		esc_html__( 'If links are present, what color should they be.', 'businessx' ),
		'#ffffff' );
