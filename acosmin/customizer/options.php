<?php
/* ------------------------------------ */
/*  Customizer Options & Defaults
/* ------------------------------------ */

global $businessx_customizer_settings;

$businessx_cs_no_filters = array(

	/* Settings - Site Identity */
	'sticky_logo_height' => '2em',

	/* Colors - Body */
	'colors_body_background' => '#ffffff',
	'colors_body_font' => '#414141',
	'colors_body_border' => '#e1e1e1',
	'colors_body_999' => '#999999',

	/* Colors - Links */
	'colors_links_default' => '#1c82bc',
	'colors_links_other' => '#000000',

	/* Colors - Headings */
	'colors_headings_base' => '#232323',
	'colors_headings_default' => '#000000',
	'colors_headings_other' => '#444444',

	/* Colors - Inputs */
	'colors_inputs_placeholder' => '#bfbfbf',
	'colors_inputs_border_bottom' => '#d8d8d8',
	'colors_inputs_background' => '#f4f4f4',
	'colors_inputs_color' => '#666666',
	'colors_inputs_f_border_bottom' => '#76bc1c',
	'colors_inputs_f_background' => '#fcfcfc',

	/* Colors - Default Button */
	'colors_btn_def_default' => '#76bc1c',
	'colors_btn_def_hover' => '#82cf1f',
	'colors_btn_def_other' => '#69a619',

	/* Colors - Opaque Button */
	'colors_btn_opq_default' => 'rgba(28,130,188,0.5)',
	'colors_btn_opq_border' => 'rgba(28,130,188,1)',
	'colors_btn_opq_hover' => '#1c82bc',
	'colors_btn_opq_other' => '#1972a6',
	'colors_btn_opq_default_2x' => 'rgba(28,130,188,0.8)',

	/* Colors - Alternative Button */
	'colors_btn_alt_default' => '#000000',
	'colors_btn_alt_border' => '#1c82bc',
	'colors_btn_alt_other' => '#232323',
	'colors_btn_alt_border_hover' => '#232323',

	/* Transparent Header Colors */
	'colors_header_transparent_text' => '#ffffff',
	'colors_header_transparent_links' => '#ffffff',
	'colors_header_transparent_opacity' => '0.8',
	'colors_header_transparent_2nd'	=> 'rgba(255,255,255,0.2)',
	'colors_header_transparent_2nd_hover' => 'rgba(255,255,255,0.3)',
	'colors_header_transparent_action_border' => '#82cf1f',
	'colors_header_transparent_submenu_bg' => 'rgba(0,0,0,0.5)',
	'colors_header_transparent_submenu_borders' => 'rgba(255,255,255,0.1)',

	/* Colored Header Colors */
	'colors_header_colored_background' => '#ffffff',
	'colors_header_colored_border' => '#e5e5e5',
	'colors_header_colored_links_text' => '#232323',
	'colors_header_colored_links_hover' => '#444444',
	'colors_header_colored_action_border' => '#82cf1f',
	'colors_header_colored_2nd'	=> 'rgba(0,0,0,0.1)',
	'colors_header_colored_2nd_hover' => 'rgba(0,0,0,0.2)',
	'colors_header_colored_submenu_bg' => '#ffffff',
	'colors_header_colored_submenu_borders' => '#e5e5e5',
	'colors_header_colored_submenu_shadow' => 'rgba(0,0,0,0.1)',

	/* Colors - Mobile Menu */
	'colors_mobile_menu_background' => '#ffffff',
	'colors_mobile_menu_borders' => '#e4e4e4',
	'colors_mobile_menu_text_links' => '#232323',
	'colors_mobile_menu_submenu_bg' => 'rgba(0,0,0,0.03)',
	'colors_mobile_menu_arrow_btn' =>'rgba(0,0,0,0.05)',
	'colors_mobile_menu_arrow_btn_opened' => 'rgba(0,0,0,0.1)',
	'colors_mobile_menu_close' => '#76bc1c',

	/* Colors - Header Heading - Index */
	'colors_header_heading_index_bg' => '#232323',
	'colors_header_heading_index_text' => '#ffffff',
	'colors_header_heading_index_text_shadow' => 'rgba(0,0,0,0.75)',
	'colors_header_heading_index_overlay_color' => 'rgba(5,20,30,0.4)',
	'colors_header_heading_index_overlay_shadow' => 'rgba(0,0,0,0.75)',
	'colors_header_heading_index_links' => '#ffffff',

	/* Colors - Header Heading - Page */
	'colors_header_heading_page_bg' => '#232323',
	'colors_header_heading_page_text' => '#ffffff',
	'colors_header_heading_page_text_shadow' => 'rgba(0,0,0,0.75)',
	'colors_header_heading_page_overlay_color' => 'rgba(5,20,30,0.4)',
	'colors_header_heading_page_overlay_shadow' => 'rgba(0,0,0,0.75)',
	'colors_header_heading_page_links' => '#ffffff',

	/* Colors - Header Heading - Single */
	'colors_header_heading_single_bg' => '#232323',
	'colors_header_heading_single_text' => '#ffffff',
	'colors_header_heading_single_text_shadow' => 'rgba(0,0,0,0.75)',
	'colors_header_heading_single_overlay_color' => 'rgba(5,20,30,0.4)',
	'colors_header_heading_single_overlay_shadow' => 'rgba(0,0,0,0.75)',
	'colors_header_heading_single_links' => '#ffffff',

	/* Colors - Sidebars */
	'colors_sidebars_h_border_colors' => '#e1e1e1',
	'colors_sidebars_h_border_colors_2' => '#76bc1c',

	/* Colors - Footer */
	'colors_footer_background_color' => '#333333',
	'colors_footer_color' =>  '#999999',
	'colors_footer_links_headings' =>  '#ffffff',
	'colors_footer_links_hover' => '#ffffff',
	'colors_footer_borders' => '#595959',
	'colors_footer_widget_2nd' => '#76bc1c',

	'colors_footer_form_bg' => '#444444',
	'colors_footer_form_border' => '#666666',
	'colors_footer_form_text' => '#e1e1e1',
	'colors_footer_form_bg_focus' => '#545454',
	'colors_footer_form_border_focus' => '#76bc1c',
	'colors_footer_form_placeholder' => '#bfbfbf',

	'colors_footer_buttons_bg' => '#76bc1c',
	'colors_footer_buttons_bg_hover' => '#82cf1f',
	'colors_footer_buttons_bg_other' => '#69a619',

	/* Colors - Footer Credits */
	'colors_footer_credits_bg' => '#222222',
	'colors_footer_credits_text' => '#7a7a7a',
	'colors_footer_credits_links' => '#ffffff',

	/* Colors - WooCommerce */
	'colors_woocommerce_accent' => '#76bc1c',
	'colors_woocommerce_accent2' => '#1c82bc',

);

if( ! empty( $businessx_cs_no_filters ) ) {
	foreach( $businessx_cs_no_filters as $bcnf => $bcnf_value ) {
		$businessx_customizer_settings[$bcnf] = apply_filters( 'businessx_' . $bcnf . '_filter', $bcnf_value );
	}
}
