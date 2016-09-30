<?php
/* ------------------------------------------------------------------------- *
 *  Customizer
 *  ________________
 *
 *	This file registers options for the Customizer
 *	________________
 *
/* ------------------------------------------------------------------------- */



/*  Register Customizer options
/* ------------------------------------ */
if ( ! function_exists( 'businessx_customize_register' ) ) {
	function businessx_customize_register( $wp_customize ) {

		// Custom Controls
		require_once( get_template_directory() . '/acosmin/customizer/controls/rgba/rgba-picker.php' ); // RGBA Color Picker
		require_once( get_template_directory() . '/acosmin/customizer/controls/info/info.php' ); // Info control
		require_once( get_template_directory() . '/acosmin/customizer/controls/button/button.php' ); // Button control
		require_once( get_template_directory() . '/acosmin/customizer/controls/link/link.php' ); // Link section

		// Register custom sections
		$wp_customize->register_section_type( 'Businessx_Section_Link' );

		// Add postMessage support for site title and description for the Customizer
		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial( 'blogname', array(
				'selector' => '.logo-text',
				'container_inclusive' => false,
				'render_callback' => 'businessx_customize_partial_blogname',
			) );
		}


			/*  Add panels
			/* ------------------------------------ */

			// Colors
			$wp_customize->add_panel( 'colors_options', array(
			  'title' 				=> __( 'Colors', 'businessx' ),
			  'priority'			=> 38,
			) );

			// Settings
			$wp_customize->add_panel( 'settings_options', array(
			  'title' 				=> __( 'Settings', 'businessx' ),
			  'priority'			=> 39,
			) );


			/*  Add sections
			/* ------------------------------------ */

			/* ------------------------------------ */
			/*  Custom links
			/* ------------------------------------ */

				/// Documentation
				$wp_customize->add_section( new Businessx_Section_Link( $wp_customize, 'link-button', array(
					'title'    	=> esc_html__( 'Businessx', 'businessx' ),
					'link_text' => esc_html__( 'Documentation', 'businessx' ),
					'link_url'  => BUSINESSX_AC_DOCS_URL . '?utm_campaign=businessx_docs_btn',
					'priority'	=> 1
				) ) );


			/* ------------------------------------ */
			/*  Header
			/* ------------------------------------ */

				/// Header Options
				$wp_customize->get_section( 'header_image' )->title = __( 'Header', 'businessx' );

					////// Header Menu
					businessx_controller_info(
						'header_menu_info',
						'header_image',
						__( 'Menu area', 'businessx' ) );

					businessx_controller_select(
						'header_type_select',
						'header_image',
						apply_filters( 'businessx_option___header_type_select', array(
							'menu-tf' 	=> esc_html__( 'Transparent Sticky', 'businessx' ),
							'menu-ff' 	=> esc_html__( 'Colored Sticky', 'businessx' ),
							'menu-tn' 	=> esc_html__( 'Transparent', 'businessx' ),
							'menu-nn' 	=> esc_html__( 'Colored', 'businessx' ),
						) ),
						esc_html__( 'Design style:', 'businessx' ),
						esc_html__( 'Select how you want your header to look.', 'businessx' ),
						apply_filters( 'businessx_option___header_type_select_default', 'menu-tf' ) );

					////// Header Heading
					businessx_controller_info(
						'header_headings_info',
						'header_image',
						__( 'Heading area', 'businessx' ), '', '', 'bx-m-t' );

					businessx_controller_txt(
						'homepage_heading', // Homepage Blog heading
						'header_image',
						esc_html__( 'Homepage main heading', 'businessx' ),
						esc_html__( 'This will change the heading on your homepage/blog, leave empty for none.', 'businessx' ),
						esc_html__( 'Homepage Heading', 'businessx' ),
						'#top-header .hs-primary-large' );

					////// Header misc
					businessx_controller_info(
						'header_misc_info',
						'header_image',
						__( 'Miscellaneous', 'businessx' ), '', '', 'bx-m-t' );

					businessx_controller_checkbox(
						'header_misc_hide_search_btn',
						'header_image',
						esc_html__( 'Hide search button', 'businessx' ), '', false );

					////// Header Image
					businessx_controller_info(
						'header_heading_info',
						'header_image',
						__( 'Custom Header Images', 'businessx' ), '', '', 'bx-m-t' );

					businessx_controller_checkbox(
						'enable_parallax_custom_headers', // Custom Headers parallax
						'header_image',
						esc_html__( 'Custom Header parallax', 'businessx' ),
						esc_html__( 'Enable parallax effect on Custom Headers', 'businessx' ),
						apply_filters( 'enable_parallax_custom_headers___filter', false ) );


			/* ------------------------------------ */
			/*  Colors
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


				/// Links Colors section
				$wp_customize->add_section( 'colors_links', array(
					'title'				=> __( 'Links', 'businessx' ),
					'panel'				=> 'colors_options',
				) );

					////// Links colors
					businessx_controller_color_picker(
						'colors_links_default',
						'colors_links',
						esc_html__( 'Default state:', 'businessx' ), '',
						'#1c82bc' );

					businessx_controller_color_picker(
						'colors_links_other',
						'colors_links',
						esc_html__( 'Hover/Active/Focus state:', 'businessx' ), '',
						'#000000' );


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

				/// Footer Credits
				$wp_customize->add_section( 'colors_footer_credits', array(
					'title'				=> __( 'Footer Credits', 'businessx' ),
					'panel'				=> 'colors_options',
				) );

					////// Footer Credits colors
					businessx_controller_color_picker(
						'colors_footer_credits_bg',
						'colors_footer_credits',
						esc_html__( 'Background color:', 'businessx' ), '',
						'#222222' );

					businessx_controller_color_picker(
						'colors_footer_credits_text',
						'colors_footer_credits',
						esc_html__( 'Font color:', 'businessx' ), '',
						'#7a7a7a' );

					businessx_controller_color_picker(
						'colors_footer_credits_links',
						'colors_footer_credits',
						esc_html__( 'Links color:', 'businessx' ), '',
						'#ffffff' );


				/* ------------------------------------ */
				/*  Posts
				/* ------------------------------------ */

				/// Posts section
				$wp_customize->add_section( 'posts_settings', array(
					'title'	=> __( 'Posts', 'businessx' ),
					'panel'	=> 'settings_options'
				) );

					////// Posts - Single View
					businessx_controller_info(
						'posts_single_info',
						'posts_settings',
						__( 'Single view', 'businessx' ) );

					businessx_controller_checkbox(
						'posts_single_featured_parallax',
						'posts_settings',
						esc_html__( 'Featured Image parallax', 'businessx' ),
						esc_html__( 'Enable parallax effect on Featured Images', 'businessx' ), false );

					businessx_controller_checkbox(
						'posts_single_hide_meta',
						'posts_settings',
						esc_html__( 'Hide post meta', 'businessx' ), '', false );

					businessx_controller_checkbox(
						'posts_single_hide_meta_author',
						'posts_settings',
						esc_html__( 'Hide by author', 'businessx' ), '', false );

					businessx_controller_checkbox(
						'posts_single_hide_meta_date',
						'posts_settings',
						esc_html__( 'Hide date', 'businessx' ), '', false );

					businessx_controller_checkbox(
						'posts_single_hide_meta_category',
						'posts_settings',
						esc_html__( 'Hide category', 'businessx' ), '', false );

					businessx_controller_checkbox(
						'posts_single_comments_nr',
						'posts_settings',
						esc_html__( 'Hide comments number', 'businessx' ), '', false );

					businessx_controller_checkbox(
						'posts_single_tags_bottom',
						'posts_settings',
						esc_html__( 'Hide tags', 'businessx' ),
						esc_html__( 'If they are displayed at the bottom of the post.', 'businessx' ), false );

					////// Posts - Index View
					businessx_controller_info(
						'posts_index_info',
						'posts_settings',
						__( 'Index view', 'businessx' ) );

					businessx_controller_checkbox(
						'posts_index_hide_meta_read_more',
						'posts_settings',
						esc_html__( 'Hide "Read More" button', 'businessx' ), '', false );

					businessx_controller_checkbox(
						'posts_index_hide_meta_date',
						'posts_settings',
						esc_html__( 'Hide date', 'businessx' ), '', false );

					businessx_controller_checkbox(
						'posts_index_hide_meta_category',
						'posts_settings',
						esc_html__( 'Hide category', 'businessx' ), '', false );

					businessx_controller_txt(
						'posts_index_excerpt_length',
						'posts_settings',
						esc_html__( 'Excerpt length:', 'businessx' ),
						esc_html__( 'This must be a number. For example, 35 will display 35 words. Leave empty for default.', 'businessx' ) );

					businessx_controller_txt(
						'posts_index_excerpt_ending',
						'posts_settings',
						esc_html__( 'Excerpt ending:', 'businessx' ),
						esc_html__( 'For example: ...', 'businessx' ) );


			/* ------------------------------------ */
			/*  Sidebars
			/* ------------------------------------ */

				/// Sidebars section
				$wp_customize->add_section( 'sidebars_settings', array(
					'title'				=> __( 'Sidebars', 'businessx' ),
					'panel'				=> 'settings_options'
				) );

					////// Sidebars - Misc
					businessx_controller_checkbox(
						'sidebars_demo_disable',
						'sidebars_settings',
						esc_html__( 'Disable demo widgets', 'businessx' ),
						esc_html__( 'If sidebars are empty, demo widgets will show up. Check this if you do not want to display them.', 'businessx' ), false );

					////// Sidebars - Post
					businessx_controller_info(
						'sidebars_post_info',
						'sidebars_settings',
						( businessx_jetpack_check( 'custom-content-types' ) ) ? __( 'Post & Portfolio view', 'businessx' ) : __( 'Post view', 'businessx' ) );

					businessx_controller_checkbox(
						'sidebars_post_disable',
						'sidebars_settings',
						esc_html__( 'Disable sidebar globally', 'businessx' ),
						esc_html__( 'This will overwrite any option you select for each post.', 'businessx' ), false );

					////// Sidebars - Page
					businessx_controller_info(
						'sidebars_page_info',
						'sidebars_settings',
						__( 'Page view', 'businessx' ) );

					businessx_controller_checkbox(
						'sidebars_page_disable',
						'sidebars_settings',
						esc_html__( 'Disable sidebar globally', 'businessx' ),
						esc_html__( 'This will overwrite any option you select for each page.', 'businessx' ), false );

			/* ------------------------------------ */
			/*  Footer
			/* ------------------------------------ */

				/// Footer section
				$wp_customize->add_section( 'footer_settings', array(
					'title'				=> __( 'Footer', 'businessx' ),
					'panel'				=> 'settings_options'
				) );

					////// Footer - Sidebars
					businessx_controller_info(
						'footer_sidebars_info',
						'footer_settings',
						__( 'Footer sidebars', 'businessx' ) );

					businessx_controller_checkbox(
						'footer_sidebars_disable',
						'footer_settings',
						esc_html__( 'Disable footer sidebars area', 'businessx' ), '', false );

					////// Footer - Credits
					businessx_controller_info(
						'footer_credits_info',
						'footer_settings',
						__( 'Footer credits', 'businessx' ) );

					businessx_controller_checkbox(
						'footer_credits_disable',
						'footer_settings',
						esc_html__( 'Disable footer credits area', 'businessx' ), '', false );

					businessx_controller_checkbox(
						'footer_credits_logo_hide',
						'footer_settings',
						esc_html__( 'Hide logo', 'businessx' ), '', false );

					businessx_controller_txt_area(
						'footer_credits_creds_line',
						'footer_settings',
						esc_html__( 'Copyright line:', 'businessx' ),
						esc_html__( 'You can use <a> tags', 'businessx' ),
						businessx_return_copyright_templ(),
						'.footer-copyright', true, 'wp_kses_post' );


			/* ------------------------------------ */
			/*  Animations
			/* ------------------------------------ */

				/// Animations section
				$wp_customize->add_section( 'animations_settings', array(
					'title'	=> __( 'Animations', 'businessx' ),
					'panel'	=> 'settings_options'
				) );

					////// Animations - Options
					businessx_controller_info(
						'animations_info',
						'animations_settings',
						__( 'Animations Options', 'businessx' ),
						__( '<p>This will add a fade in animation on elements when you scroll down.</p>', 'businessx') );

					businessx_controller_checkbox(
						'animations_enable',
						'animations_settings',
						esc_html__( 'Enable Animations', 'businessx' ),
						esc_html__( 'You can only preview this option on the live website, not in Customizer', 'businessx' ), false );


			/* ------------------------------------ */
			/*  Preloader
			/* ------------------------------------ */

				/// Preloader section
				$wp_customize->add_section( 'preloader_settings', array(
					'title'	=> __( 'Preloader', 'businessx' ),
					'panel'	=> 'settings_options'
				) );

					////// Preloader - Options
					businessx_controller_info(
						'preloader_info',
						'preloader_settings',
						__( 'Preloader Options', 'businessx' ),
						__( '<p>This displays a loading animation until the browser fetched the whole web content and will fade out the moment the page has been completely cached.</p>', 'businessx') );

					businessx_controller_checkbox(
						'preloader_enable',
						'preloader_settings',
						esc_html__( 'Enable Preloader', 'businessx' ), '', false );

					businessx_controller_color_picker(
						'preloader_fill_color',
						'preloader_settings',
						esc_html__( 'Preloader fill color:', 'businessx' ), '',
						'#dd3333', false );

					businessx_controller_color_picker(
						'preloader_bg_color',
						'preloader_settings',
						esc_html__( 'Preloader fill color:', 'businessx' ), '',
						'#ffffff', false );

					businessx_controller_simple_opacity(
						'preloader_opacity',
						'preloader_settings',
						esc_html__( 'Preloader opacity:', 'businessx' ), '', '0.9', false );

					businessx_controller_select(
						'preloader_options',
						'preloader_settings',
						apply_filters( 'businessx_preloader_options___filter', $items = array(
							'balls' 	=> esc_html__( 'Balls Beat', 'businessx' ),
							'balls2' 	=> esc_html__( 'Balls Pulse', 'businessx' ),
							'balls3' 	=> esc_html__( 'Balls Spinner', 'businessx' ),
							'loader1' 	=> esc_html__( 'Loading #1', 'businessx' ),
						) ),
						esc_html__( 'Preloader animation:', 'businessx' ), '', 'balls', false );


			/* ------------------------------------ */
			/*  Notifications
			/* ------------------------------------ */

				/// Notifications section
				$wp_customize->add_section( 'notification_settings', array(
					'title'	=> __( 'Notifications', 'businessx' ),
					'panel'	=> 'settings_options'
				) );

					////// otifications - Options
					businessx_controller_info(
						'notification_info',
						'notification_settings',
						__( 'Updates Notifications', 'businessx' ),
						__( '<p>If the theme has an update, we will display a frendly notification. You can dismiss it for 72 hours by clicking on "Hide Notice".</p><p>We are adding this notification because Businessx is not yet in the official WordPress.org directory and we do not have any way to let you know the theme has an update available.</p>', 'businessx') );

					businessx_controller_checkbox(
						'notification_disable',
						'notification_settings',
						esc_html__( 'Disable Update Notification', 'businessx' ),
						esc_html__( 'If you do not want to view this notification.', 'businessx' ), false );



			/*  Add custom options
			/* ------------------------------------ */

			// Select logo type
			businessx_controller_select(
				'logo_type_select',
				'title_tagline',
				apply_filters( 'businessx_option___logo_type_select', array(
					'logo-image-type' 	=> esc_html__( 'Image', 'businessx' ),
					'logo-text-type' 	=> esc_html__( 'Text', 'businessx' ),
				) ),
				__( 'Logo type:', 'businessx' ),
				__( 'Select whether to use a custom logo or your site title. If a logo is not selected, the text one is displayed.', 'businessx' ),
				apply_filters( 'businessx_option___logo_type_select_default', 'logo-text-type' ), false, 'sanitize_text_field', 0 );
			/*=====*/

	} // businessx_customize_register() END
}
add_action( 'customize_register', 'businessx_customize_register', 11 );



/*  Customizer CSS options
/* ------------------------------------ */
global $businessx_customizer_settings;
$businessx_cs_no_filters = array(

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

);


if( ! empty( $businessx_cs_no_filters ) ) {
	foreach( $businessx_cs_no_filters as $bcnf => $bcnf_value ) {
		$businessx_customizer_settings[$bcnf] = apply_filters( 'businessx_' . $bcnf . '_filter', $bcnf_value );
	}
}



/*  Output CSS for templating
/* ------------------------------------ */
if ( ! function_exists( 'businessx_czr_output_css' ) ) {
	function businessx_czr_output_css( $settings ) {
		global $businessx_customizer_settings;
		$new_settings = array();

		if( ! empty( $businessx_customizer_settings ) ) {
			foreach( $businessx_customizer_settings as $bcs ) {
				$new_settings[ $bcs ] = '';
			}
		}

		$settings = wp_parse_args( $settings, $new_settings );

		return <<<CSS
		/* CSS GOES HERE */

		/* Colors - Body */
		body, .comment-reply-title {
			background-color: {$settings['colors_body_background']};
			color: {$settings['colors_body_font']};
		}
		.comment-reply-title:after {
			border: solid transparent;
			border-color: transparent;
			border-bottom-color: {$settings['colors_body_background']};
		}
		blockquote, pre, abbr, acronym, table, th, td, fieldset, .tagcloud a, .post-index.sticky, .comments-title, .comment, .pingback, .comment-reply-title, .tags-display, .posts-pagination .paging-wrap {
			border-color: {$settings['colors_body_border']};
		}
		.comment-reply-title:before {
			border-bottom-color: {$settings['colors_body_border']};
		}
		blockquote cite, blockquote small, .wp-caption .wp-caption-text, .gallery-caption, .comment-notes, .logged-in-as, .form-allowed-tags {
			color: {$settings['colors_body_999']};
		}

		/* Colors - Links */
		a {
			color: {$settings['colors_links_default']};
		}
		a:hover, a:focus, a:active {
			color: {$settings['colors_links_other']};
		}

		/* Colors - Headings */
		h1, h2, h3, h4, h5, h6 {
			color: {$settings['colors_headings_base']};
		}
		h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
			color: {$settings['colors_headings_default']};
		}
		h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, h1 a:focus, h2 a:focus, h3 a:focus, h4 a:focus, h5 a:focus, h6 a:focus, h1 a:active, h2 a:active, h3 a:active, h4 a:active, h5 a:active, h6 a:active {
			color: {$settings['colors_headings_other']};
		}

		/* Colors - Inputs */
		::-webkit-input-placeholder {
		color: {$settings['colors_inputs_placeholder']};
		}
		:-moz-placeholder {
			color: {$settings['colors_inputs_placeholder']};
		}
		::-moz-placeholder {
			color: {$settings['colors_inputs_placeholder']};
		}
		:-ms-input-placeholder {
			color: {$settings['colors_inputs_placeholder']};
		}
		/* Colors - Inputs */
		input[type=text],
		input[type=search],
		input[type=radio],
		input[type=tel],
		input[type=time],
		input[type=url],
		input[type=week],
		input[type=password],
		input[type=checkbox],
		input[type=color],
		input[type=date],
		input[type=datetime],
		input[type=datetime-local],
		input[type=email],
		input[type=month],
		input[type=number],
		select,
		textarea {
			border-color: {$settings['colors_inputs_border_bottom']};
			background-color: {$settings['colors_inputs_background']};
			color: {$settings['colors_inputs_color']};
		}
		input[type=radio]:checked:before {
			background-color: {$settings['colors_inputs_color']};
		}
		input[type=text]:focus,
		input[type=search]:focus,
		input[type=radio]:focus,
		input[type=tel]:focus,
		input[type=time]:focus,
		input[type=url]:focus,
		input[type=week]:focus,
		input[type=password]:focus,
		input[type=checkbox]:focus,
		input[type=color]:focus,
		input[type=date]:focus,
		input[type=datetime]:focus,
		input[type=datetime-local]:focus,
		input[type=email]:focus,
		input[type=month]:focus,
		input[type=number]:focus,
		select:focus,
		textarea:focus {
			border-color: {$settings['colors_inputs_f_border_bottom']};
			background-color: {$settings['colors_inputs_f_background']};
		}

		/* Colors - Default Button */
		.ac-btn, input[type=submit], input[type=reset], input[type=button], button {
			background-color: {$settings['colors_btn_def_default']};
		}
		.ac-btn:hover, input[type=submit]:hover, input[type=reset]:hover, input[type=button]:hover, button:hover {
			background-color: {$settings['colors_btn_def_hover']};
		}
		.ac-btn:focus, input[type=submit]:focus, input[type=reset]:focus, input[type=button]:focus, button:focus, .ac-btn:active, input[type=submit]:active, input[type=reset]:active, input[type=button]:focus, button:active {
			background-color: {$settings['colors_btn_def_other']};
		}

		/* Colors - Opaque Button */
		.ac-btn.btn-opaque {
			box-shadow: inset 0 0 0 3px {$settings['colors_btn_opq_border']};
			background-color: {$settings['colors_btn_opq_default']};
		}
		.ac-btn.btn-opaque.opq-x2 {
			background-color: {$settings['colors_btn_opq_default_2x']};
		}
		.ac-btn.btn-opaque:hover {
			background-color: {$settings['colors_btn_opq_hover']};
		}
		.ac-btn.btn-opaque:focus,
		.ac-btn.btn-opaque:active {
			background-color: {$settings['colors_btn_opq_other']};
		}

		/* Colors - Alternative Button */
		.ac-btn-alt, .comment-reply-link, .actions-menu a {
			color: {$settings['colors_btn_alt_default']};
			border-color: {$settings['colors_btn_alt_border']};
		}
		.ac-btn-alt:hover, .comment-reply-link:hover, .actions-menu a:hover,
		.ac-btn-alt:focus, .comment-reply-link:focus, .actions-menu a:focus,
		.ac-btn-alt:active, .comment-reply-link:active, .actions-menu a:active {
			color: {$settings['colors_btn_alt_other']};
		}
		.ac-btn-alt:hover:after, .comment-reply-link:hover:after, .actions-menu a:hover:after {
			border-color: {$settings['colors_btn_alt_border_hover']};
		}

		/* Colors Transparent Header  */
		.main-header.mh-transparent {
			color: {$settings['colors_header_transparent_text']};
		}
		.main-header.mh-transparent a,
		.main-header.mh-transparent a i,
		.main-header.mh-transparent a:hover,
		.main-header.mh-transparent a:hover i,
		.main-header.mh-transparent a:focus,
		.main-header.mh-transparent a:focus i,
		.main-header.mh-transparent a:active,
		.main-header.mh-transparent a:active i {
			color: {$settings['colors_header_transparent_links']} !important;
		}
		.main-header.mh-transparent .main-menu li a {
			opacity: {$settings['colors_header_transparent_opacity']};
		}
		.main-header.mh-transparent .main-header-btns .ac-btn-h {
			background-color: {$settings['colors_header_transparent_2nd']};
		}
		.main-header.mh-transparent .main-header-btns .ac-btn-h:hover {
			background-color: {$settings['colors_header_transparent_2nd_hover']};
		}
		.main-header.mh-transparent .actions-menu a, .main-header.mh-transparent .ac-btn-alt.alt2 {
			border-color: {$settings['colors_header_transparent_action_border']} !important;
		}
		.main-header.mh-transparent .main-menu li ul {
			background-color: {$settings['colors_header_transparent_submenu_bg']};
		}
		.main-header.mh-transparent .main-menu .sub-menu li {
			border-color: {$settings['colors_header_transparent_submenu_borders']};
		}

		/* Colored Header Colors */
		.main-header {
			border-color: {$settings['colors_header_colored_border']};
		}
		.main-header,
		.mh-placeholder {
			background-color: {$settings['colors_header_colored_background']};
		}
		.main-header,
		.main-header a,
		.main-header a i {
			color: {$settings['colors_header_colored_links_text']} !important;
		}
		.main-header a:hover,
		.main-header a:hover i,
		.main-header a:focus,
		.main-header a:focus i,
		.main-header a:active,
		.main-header a:active i {
			color: {$settings['colors_header_colored_links_hover']} !important;
		}
		.main-header-right .actions-menu a, .main-header-right .ac-btn-alt.alt2 {
			border-color: {$settings['colors_header_colored_action_border']};
		}
		.main-header .main-header-btns .ac-btn-h {
			background-color: {$settings['colors_header_colored_2nd']};
		}
		.main-header .main-header-btns .ac-btn-h:hover {
			background-color: {$settings['colors_header_colored_2nd_hover']};
		}
		.main-menu li ul {
			background-color: {$settings['colors_header_colored_submenu_bg']};
			box-shadow: 0 1px 2px {$settings['colors_header_colored_submenu_shadow']};
		}
		.main-menu li ul, .main-menu .sub-menu li {
			border-color:{$settings['colors_header_colored_submenu_borders']};
		}

		/* Mobile Menu Colors */
		.mobile-menu {
			background-color: {$settings['colors_mobile_menu_background']};
		}
		.mobile-menu li,
		.mobile-menu .sub-menu,
		.mobile-menu .sub-menu li {
			border-color: {$settings['colors_mobile_menu_borders']};
		}
		.mobile-menu,
		.mobile-menu a:not(.ac-btn),
		.mobile-menu a:not(.ac-btn):hover,
		.mobile-menu a:not(.ac-btn):focus,
		.mobile-menu a:not(.ac-btn):active {
			color: {$settings['colors_mobile_menu_text_links']};
		}
		.mobile-menu .sub-menu {
			background-color: {$settings['colors_mobile_menu_submenu_bg']};
		}
		.mobile-menu .mobile-arrow {
			background-color: {$settings['colors_mobile_menu_arrow_btn']};
		}
		.mobile-menu li.parent-opened > .mobile-arrow {
			background-color: {$settings['colors_mobile_menu_arrow_btn_opened']};
		}
		.mobile-menu .ac-btn,
		.mobile-menu .ac-btn:hover,
		.mobile-menu .ac-btn:focus,
		.mobile-menu .ac-btn:active {
			background-color: {$settings['colors_mobile_menu_close']};
		}

		/* Colors - Header Heading - Index */
		.index-heading {
			background-color: {$settings['colors_header_heading_index_bg']};
		}
		.index-heading,
		.index-heading .sec-hs-elements .hs-primary-large {
			color: {$settings['colors_header_heading_index_text']};
		}
		.index-heading .sec-hs-elements .hs-primary-large,
		.index-heading .sec-hs-elements .sec-hs-description,
		.index-heading .sec-hs-elements .ac-btns-or,
		.index-heading .entry-meta-list {
			text-shadow: 0 1px 2px {$settings['colors_header_heading_index_text_shadow']};
		}
		.index-heading .grid-overlay {
			background-color: {$settings['colors_header_heading_index_overlay_color']};
		}
		.index-heading .grid-overlay:before {
			background: -moz-linear-gradient(top, {$settings['colors_header_heading_index_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
			background: -webkit-linear-gradient(top, {$settings['colors_header_heading_index_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
			background: linear-gradient(to bottom, {$settings['colors_header_heading_index_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
		}
		.index-heading a:not(.ac-btn), .index-heading a:not(.ac-btn):hover, .index-heading a:not(.ac-btn):focus, .index-heading a:not(.ac-btn):active {
			color: {$settings['colors_header_heading_index_links']};
		}

		/* Colors - Header Heading - Page */
		.page-heading {
			background-color: {$settings['colors_header_heading_page_bg']};
		}
		.page-heading,
		.page-heading .sec-hs-elements .hs-primary-large {
			color: {$settings['colors_header_heading_page_text']};
		}
		.page-heading .sec-hs-elements .hs-primary-large,
		.page-heading .sec-hs-elements .sec-hs-description,
		.page-heading .sec-hs-elements .ac-btns-or,
		.page-heading .entry-meta-list {
			text-shadow: 0 1px 2px {$settings['colors_header_heading_page_text_shadow']};
		}
		.page-heading .grid-overlay {
			background-color: {$settings['colors_header_heading_page_overlay_color']};
		}
		.page-heading .grid-overlay:before {
			background: -moz-linear-gradient(top, {$settings['colors_header_heading_page_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
			background: -webkit-linear-gradient(top, {$settings['colors_header_heading_page_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
			background: linear-gradient(to bottom, {$settings['colors_header_heading_page_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
		}
		.page-heading a:not(.ac-btn), .page-heading a:not(.ac-btn):hover, .page-heading a:not(.ac-btn):focus, .page-heading a:not(.ac-btn):active {
			color: {$settings['colors_header_heading_page_links']};
		}

		/* Colors - Header Heading - Single */
		.single-heading {
			background-color: {$settings['colors_header_heading_single_bg']};
		}
		.single-heading,
		.single-heading .sec-hs-elements .hs-primary-large {
			color: {$settings['colors_header_heading_single_text']};
		}
		.single-heading .sec-hs-elements .hs-primary-large,
		.single-heading .sec-hs-elements .sec-hs-description,
		.single-heading .sec-hs-elements .ac-btns-or,
		.single-heading .entry-meta-list {
			text-shadow: 0 1px 2px {$settings['colors_header_heading_single_text_shadow']};
		}
		.single-heading .grid-overlay {
			background-color: {$settings['colors_header_heading_single_overlay_color']};
		}
		.single-heading .grid-overlay:before {
			background: -moz-linear-gradient(top, {$settings['colors_header_heading_single_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
			background: -webkit-linear-gradient(top, {$settings['colors_header_heading_single_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
			background: linear-gradient(to bottom, {$settings['colors_header_heading_single_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
		}
		.single-heading a:not(.ac-btn), .single-heading a:not(.ac-btn):hover, .single-heading a:not(.ac-btn):focus, .single-heading a:not(.ac-btn):active {
			color: {$settings['colors_header_heading_single_links']};
		}

		/* Colors - Sidebars */
		.widget-title, .widget_wpcom_social_media_icons_widget li a {
			border-color: {$settings['colors_sidebars_h_border_colors']} !important;
		}
		.widget-title span:before {
			border-top-color: {$settings['colors_sidebars_h_border_colors_2']};
		}

		/* Colors - Footer */
		.footer-widgets {
			color: {$settings['colors_footer_color']};
			background-color: {$settings['colors_footer_background_color']};
		}
		.footer-widgets h1, .footer-widgets h2, .footer-widgets h3, .footer-widgets h4, .footer-widgets h5, .footer-widgets h6,
		.footer-widgets a, .footer-widgets a:focus, .footer-widgets a:active {
			color: {$settings['colors_footer_links_headings']};
		}
		.footer-widgets a:hover {
			color: {$settings['colors_footer_links_hover']};
		}
		.footer-sidebar .widget-title, .footer-sidebar .tagcloud a, .footer-sidebar .widget table, .footer-sidebar .widget th, .footer-sidebar .widget td, .footer-sidebar .widget fieldset, .footer-sidebar .widget blockquote, .footer-sidebar .widget pre, .footer-sidebar .widget abbr, .footer-sidebar .widget acronym, .footer-sidebar .widget_wpcom_social_media_icons_widget li a {
			border-color: {$settings['colors_footer_borders']} !important;
		}
		.footer-sidebar .widget-title span:before {
			border-top-color: {$settings['colors_footer_widget_2nd']};
		}
		.footer-wrap input[type=text], .footer-wrap input[type=search], .footer-wrap input[type=radio], .footer-wrap input[type=tel], .footer-wrap input[type=time], .footer-wrap input[type=url], .footer-wrap input[type=week], .footer-wrap input[type=password], .footer-wrap input[type=checkbox], .footer-wrap input[type=color], .footer-wrap input[type=date], .footer-wrap input[type=datetime], .footer-wrap input[type=datetime-local], .footer-wrap input[type=email], .footer-wrap input[type=month], .footer-wrap input[type=number], .footer-wrap select, .footer-wrap textarea {
			background-color: {$settings['colors_footer_form_bg']};
			border-color: {$settings['colors_footer_form_border']};
			color: {$settings['colors_footer_form_text']};
		}
		.footer-wrap input[type=radio]:checked:before {
			background-color: {$settings['colors_footer_form_text']};
		}
		.footer-wrap input[type=text]:focus, .footer-wrap input[type=search]:focus, .footer-wrap input[type=radio]:focus, .footer-wrap input[type=tel]:focus, .footer-wrap input[type=time]:focus, .footer-wrap input[type=url]:focus, .footer-wrap input[type=week]:focus, .footer-wrap input[type=password]:focus, .footer-wrap input[type=checkbox]:focus, .footer-wrap input[type=color]:focus, .footer-wrap input[type=date]:focus, .footer-wrap input[type=datetime]:focus, .footer-wrap input[type=datetime-local]:focus, .footer-wrap input[type=email]:focus, .footer-wrap input[type=month]:focus, .footer-wrap input[type=number]:focus, .footer-wrap select:focus, .footer-wrap textarea:focus {
			border-color: {$settings['colors_footer_form_border_focus']};
			background-color: {$settings['colors_footer_form_bg_focus']};
		}
		.footer-wrap ::-webkit-input-placeholder{
			color: {$settings['colors_footer_form_placeholder']};
		}
		.footer-wrap :-moz-placeholder{
			color: {$settings['colors_footer_form_placeholder']};
		}
		.footer-wrap ::-moz-placeholder{
			color: {$settings['colors_footer_form_placeholder']};
		}
		.footer-wrap :-ms-input-placeholder {
			color: {$settings['colors_footer_form_placeholder']};
		}
		.footer-wrap .ac-btn, .footer-wrap input[type=submit], .footer-wrap input[type=reset], .footer-wrap input[type=button], .footer-wrap button {
			background-color: {$settings['colors_footer_buttons_bg']};
		}
		.footer-wrap .ac-btn:hover, .footer-wrap input[type=submit]:hover, .footer-wrap input[type=reset]:hover, .footer-wrap input[type=button]:hover,.footer-wrap  button:hover {
			background-color:{$settings['colors_footer_buttons_bg_hover']};
		}
		.footer-wrap .ac-btn:focus, .footer-wrap input[type=submit]:focus, .footer-wrap input[type=reset]:focus, .footer-wrap input[type=button]:focus, .footer-wrap button:focus,
		.footer-wrap .ac-btn:active, .footer-wrap input[type=submit]:active, .footer-wrap input[type=reset]:active, .footer-wrap input[type=button]:focus, .footer-wrap button:active {
			background-color: {$settings['colors_footer_buttons_bg_other']};
		}

		/* Colors - Footer Credits */
		.footer-credits {
			color: {$settings['colors_footer_credits_text']};
			background-color: {$settings['colors_footer_credits_bg']};
		}
		.footer-creds a, .footer-creds a:hover, .footer-creds a:focus, .footer-creds a:active {
			color: {$settings['colors_footer_credits_links']};
		}

CSS;
	}
}



/*  Output inline styles
/* ------------------------------------ */
if ( ! function_exists( 'businessx_final_inline_css' ) ) {
	function businessx_final_inline_css() {
		global $businessx_customizer_settings;
		$css = '';

		if( ! empty( $businessx_customizer_settings ) ) {
			foreach ( $businessx_customizer_settings as $bcs => $bcs_value ) {
				${"$bcs"} = apply_filters( 'businessx_' . $bcs . '_filter', $bcs_value );
			}
		}

		/* Colors - Body */
		if( businessx_cd( 'colors_body_background', $colors_body_background ) ) {
			$css .= businessx_gcs( 'body, .comment-reply-title', 'background-color', 'colors_body_background' );
			$css .= businessx_gcs( '.comment-reply-title:after', 'border-bottom-color', 'colors_body_background' ); }

		if( businessx_cd( 'colors_body_font', $colors_body_font ) ) {
			$css .= businessx_gcs( 'body', 'color', 'colors_body_font' ); }

		if( businessx_cd( 'colors_body_border', $colors_body_border ) ) {
			$css .= businessx_gcs( 'blockquote, pre, abbr, acronym, table, th, td, fieldset, .tagcloud a, .post-index.sticky, .comments-title, .comment, .pingback, .comment-reply-title, .tags-display, .posts-pagination .paging-wrap', 'border-color', 'colors_body_border' );
			$css .= businessx_gcs( '.comment-reply-title:before', 'border-bottom-color', 'colors_body_border' ); }

		if( businessx_cd( 'colors_body_999', $colors_body_999 ) ) {
			$css .= businessx_gcs( 'blockquote cite, blockquote small, .wp-caption .wp-caption-text, .gallery-caption, .comment-notes, .logged-in-as, .form-allowed-tags', 'color', 'colors_body_999' ); }

		/* Colors - Links */
		if( businessx_cd( 'colors_links_default', $colors_links_default ) ) {
			$css .= businessx_gcs( 'a', 'color', 'colors_links_default' ); }

		if( businessx_cd( 'colors_links_other', $colors_links_other ) ) {
			$css .= businessx_gcs( 'a:hover, a:focus, a:active', 'color', 'colors_links_other' ); }

		/* Colors - Headings */
		if( businessx_cd( 'colors_headings_base', $colors_headings_base ) ) {
			$css .= businessx_gcs( 'h1, h2, h3, h4, h5, h6', 'color', 'colors_headings_base' ); }

		if( businessx_cd( 'colors_headings_default', $colors_headings_default ) ) {
			$css .= businessx_gcs( 'h1 a, h2 a, h3 a, h4 a, h5 a, h6 a', 'color', 'colors_headings_default' ); }

		if( businessx_cd( 'colors_headings_other', $colors_headings_other ) ) {
			$css .= businessx_gcs(
				'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, h1 a:focus, h2 a:focus, h3 a:focus, h4 a:focus, h5 a:focus, h6 a:focus, h1 a:active, h2 a:active, h3 a:active, h4 a:active, h5 a:active, h6 a:active',
				'color', 'colors_headings_other' ); }

		/* Colors - Inputs */
		if( businessx_cd( 'colors_inputs_placeholder', $colors_inputs_placeholder ) ) {
			$css .= businessx_gcs( '::-webkit-input-placeholder', 'color', 'colors_inputs_placeholder' );
			$css .= businessx_gcs( ':-moz-placeholder', 'color', 'colors_inputs_placeholder' );
			$css .= businessx_gcs( '::-moz-placeholder', 'color', 'colors_inputs_placeholder' );
			$css .= businessx_gcs( ':-ms-input-placeholder', 'color', 'colors_inputs_placeholder' ); }

		if( businessx_cd( 'colors_inputs_border_bottom', $colors_inputs_border_bottom ) ) {
			$css .= businessx_gcs( 'input[type=text], input[type=search], input[type=radio], input[type=tel], input[type=time], input[type=url], input[type=week], input[type=password], input[type=checkbox], input[type=color], input[type=date], input[type=datetime], input[type=datetime-local], input[type=email], input[type=month], input[type=number], select, textarea', 'border-color', 'colors_inputs_border_bottom' ); }

		if( businessx_cd( 'colors_inputs_background', $colors_inputs_background ) ) {
			$css .= businessx_gcs( 'input[type=text], input[type=search], input[type=radio], input[type=tel], input[type=time], input[type=url], input[type=week], input[type=password], input[type=checkbox], input[type=color], input[type=date], input[type=datetime], input[type=datetime-local], input[type=email], input[type=month], input[type=number], select, textarea', 'background-color', 'colors_inputs_background' ); }

		if( businessx_cd( 'colors_inputs_color', $colors_inputs_color ) ) {
			$css .= businessx_gcs( 'input[type=text], input[type=search], input[type=radio], input[type=tel], input[type=time], input[type=url], input[type=week], input[type=password], input[type=checkbox], input[type=color], input[type=date], input[type=datetime], input[type=datetime-local], input[type=email], input[type=month], input[type=number], select, textarea', 'color', 'colors_inputs_color' );
			$css .= businessx_gcs( 'input[type=radio]:checked:before', 'background-color', 'colors_inputs_color' ); }

		if( businessx_cd( 'colors_inputs_f_border_bottom', $colors_inputs_f_border_bottom ) ) {
			$css .= businessx_gcs( 'input[type=text]:focus, input[type=search]:focus, input[type=radio]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, select:focus, textarea:focus', 'border-color', 'colors_inputs_f_border_bottom' ); }

		if( businessx_cd( 'colors_inputs_f_background', $colors_inputs_f_background ) ) {
			$css .= businessx_gcs( 'input[type=text]:focus, input[type=search]:focus, input[type=radio]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, select:focus, textarea:focus', 'background-color', 'colors_inputs_f_background' ); }

		/* Colors - Default Button */
		if( businessx_cd( 'colors_btn_def_default', $colors_btn_def_default ) ) {
			$css .= businessx_gcs( '.ac-btn, input[type=submit], input[type=reset], input[type=button], button', 'background-color', 'colors_btn_def_default' ); }

		if( businessx_cd( 'colors_btn_def_hover', $colors_btn_def_hover ) ) {
			$css .= businessx_gcs( '.ac-btn:hover, input[type=submit]:hover, input[type=reset]:hover, input[type=button]:hover, button:hover', 'background-color', 'colors_btn_def_hover' ); }

		if( businessx_cd( 'colors_btn_def_other', $colors_btn_def_other ) ) {
			$css .= businessx_gcs( '.ac-btn:focus, input[type=submit]:focus, input[type=reset]:focus, input[type=button]:focus, button:focus, .ac-btn:active, input[type=submit]:active, input[type=reset]:active, input[type=button]:focus, button:active', 'background-color', 'colors_btn_def_other' ); }

		/* Colors - Opaque Button */
		if( businessx_cd( 'colors_btn_opq_default', $colors_btn_opq_default ) ) {
			$css .= businessx_gcs( '.ac-btn.btn-opaque', 'background-color', 'colors_btn_opq_default' ); }

		if( businessx_cd( 'colors_btn_opq_border', $colors_btn_opq_border ) ) {
			$css .= businessx_gcs( '.ac-btn.btn-opaque', 'box-shadow', 'colors_btn_opq_border', 'inset 0 0 0 3px' ); }

		if( businessx_cd( 'colors_btn_opq_default_2x', $colors_btn_opq_default_2x ) ) {
			$css .= businessx_gcs( '.ac-btn.btn-opaque.opq-x2', 'background-color', 'colors_btn_opq_default_2x' ); }

		if( businessx_cd( 'colors_btn_opq_hover', $colors_btn_opq_hover ) ) {
			$css .= businessx_gcs( '.ac-btn.btn-opaque:hover', 'background-color', 'colors_btn_opq_hover' ); }

		if( businessx_cd( 'colors_btn_opq_other', $colors_btn_opq_other ) ) {
			$css .= businessx_gcs( '.ac-btn.btn-opaque:focus, .ac-btn.btn-opaque:active', 'background-color', 'colors_btn_opq_other' ); }

		/* Colors - Alternative Button */
		if( businessx_cd( 'colors_btn_alt_default', $colors_btn_alt_default ) ) {
			$css .= businessx_gcs( '.ac-btn-alt, .comment-reply-link, .actions-menu a', 'color', 'colors_btn_alt_default' ); }

		if( businessx_cd( 'colors_btn_alt_border', $colors_btn_alt_border ) ) {
			$css .= businessx_gcs( '.ac-btn-alt, .comment-reply-link, .actions-menu a', 'border-color', 'colors_btn_alt_border' ); }

		if( businessx_cd( 'colors_btn_alt_other', $colors_btn_alt_other ) ) {
			$css .= businessx_gcs( '.ac-btn-alt:hover, .comment-reply-link:hover, .actions-menu a:hover, .ac-btn-alt:focus, .comment-reply-link:focus, .actions-menu a:focus, .ac-btn-alt:active, .comment-reply-link:active, .actions-menu a:active', 'color', 'colors_btn_alt_other' ); }

		if( businessx_cd( 'colors_btn_alt_border_hover', $colors_btn_alt_border_hover ) ) {
			$css .= businessx_gcs( '.ac-btn-alt:hover:after, .comment-reply-link:hover:after, .actions-menu a:hover:after', 'border-color', 'colors_btn_alt_border_hover' ); }

		/* Colors Transparent Header */
		if( businessx_cd( 'colors_header_transparent_text', $colors_header_transparent_text ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent', 'color', 'colors_header_transparent_text' ); }

		if( businessx_cd( 'colors_header_transparent_links', $colors_header_transparent_links ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent a, .main-header.mh-transparent a i, .main-header.mh-transparent a:hover, .main-header.mh-transparent a:hover i, .main-header.mh-transparent a:focus, .main-header.mh-transparent a:focus i, .main-header.mh-transparent a:active, .main-header.mh-transparent a:active i', 'color', 'colors_header_transparent_links', '', ' !important' ); }

		if( businessx_cd( 'colors_header_transparent_opacity', $colors_header_transparent_opacity ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent .main-menu li a', 'opacity', 'colors_header_transparent_opacity' ); }

		if( businessx_cd( 'colors_header_transparent_2nd', $colors_header_transparent_2nd ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent .main-header-btns .ac-btn-h', 'background-color', 'colors_header_transparent_2nd' ); }

		if( businessx_cd( 'colors_header_transparent_2nd_hover', $colors_header_transparent_2nd_hover ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent .main-header-btns .ac-btn-h:hover', 'background-color', 'colors_header_transparent_2nd_hover' ); }

		if( businessx_cd( 'colors_header_transparent_action_border', $colors_header_transparent_action_border ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent .actions-menu a, .main-header.mh-transparent .ac-btn-alt.alt2', 'border-color', 'colors_header_transparent_action_border', '', ' !important' ); }

		if( businessx_cd( 'colors_header_transparent_submenu_bg', $colors_header_transparent_submenu_bg ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent .main-menu li ul', 'background-color', 'colors_header_transparent_submenu_bg' ); }

		if( businessx_cd( 'colors_header_transparent_submenu_borders', $colors_header_transparent_submenu_borders ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent .main-menu .sub-menu li', 'border-color', 'colors_header_transparent_submenu_borders' ); }

		/* Colored Header Colors */
		if( businessx_cd( 'colors_header_colored_background', $colors_header_colored_background ) ) {
			$css .= businessx_gcs( '.main-header, .mh-placeholder', 'background-color', 'colors_header_colored_background' ); }

		if( businessx_cd( 'colors_header_colored_border', $colors_header_colored_border ) ) {
			$css .= businessx_gcs( '.main-header', 'border-color', 'colors_header_colored_border' ); }

		if( businessx_cd( 'colors_header_colored_links_text', $colors_header_colored_links_text ) ) {
			$css .= businessx_gcs( '.main-header, .main-header a, .main-header a i', 'color', 'colors_header_colored_links_text', '', ' !important' ); }

		if( businessx_cd( 'colors_header_colored_links_hover', $colors_header_colored_links_hover ) ) {
			$css .= businessx_gcs( '.main-header a:hover, .main-header a:hover i, .main-header a:focus, .main-header a:focus i, .main-header a:active, .main-header a:active i', 'color', 'colors_header_colored_links_hover', '', ' !important' ); }

		if( businessx_cd( 'colors_header_colored_action_border', $colors_header_colored_action_border ) ) {
			$css .= businessx_gcs( '.main-header-right .actions-menu a, .main-header-right .ac-btn-alt.alt2', 'border-color', 'colors_header_colored_action_border' ); }

		if( businessx_cd( 'colors_header_colored_2nd', $colors_header_colored_2nd ) ) {
			$css .= businessx_gcs( '.main-header .main-header-btns .ac-btn-h', 'background-color', 'colors_header_colored_2nd' ); }

		if( businessx_cd( 'colors_header_colored_2nd_hover', $colors_header_colored_2nd_hover ) ) {
			$css .= businessx_gcs( '.main-header .main-header-btns .ac-btn-h:hover', 'background-color', 'colors_header_colored_2nd_hover' ); }

		if( businessx_cd( 'colors_header_colored_submenu_bg', $colors_header_colored_submenu_bg ) ) {
			$css .= businessx_gcs( '.main-menu li ul', 'background-color', 'colors_header_colored_submenu_bg' ); }

		if( businessx_cd( 'colors_header_colored_submenu_borders', $colors_header_colored_submenu_borders ) ) {
			$css .= businessx_gcs( '.main-menu li ul, .main-menu .sub-menu li', 'border-color', 'colors_header_colored_submenu_borders' ); }

		if( businessx_cd( 'colors_header_colored_submenu_shadow', $colors_header_colored_submenu_shadow ) ) {
			$css .= businessx_gcs( '.main-menu li ul', 'box-shadow', 'colors_header_colored_submenu_shadow', '0 1px 2px' ); }

		/* Mobile Menu Colors */
		if( businessx_cd( 'colors_mobile_menu_background', $colors_mobile_menu_background ) ) {
			$css .= businessx_gcs( '.mobile-menu', 'background-color', 'colors_mobile_menu_background' ); }

		if( businessx_cd( 'colors_mobile_menu_borders', $colors_mobile_menu_borders ) ) {
			$css .= businessx_gcs( '.mobile-menu li, .mobile-menu .sub-menu, .mobile-menu .sub-menu li', 'border-color', 'colors_mobile_menu_borders' ); }

		if( businessx_cd( 'colors_mobile_menu_text_links', $colors_mobile_menu_text_links ) ) {
			$css .= businessx_gcs( '.mobile-menu, .mobile-menu a:not(.ac-btn), .mobile-menu a:not(.ac-btn):hover, .mobile-menu a:not(.ac-btn):focus, .mobile-menu a:not(.ac-btn):active', 'color', 'colors_mobile_menu_text_links' ); }

		if( businessx_cd( 'colors_mobile_menu_submenu_bg', $colors_mobile_menu_submenu_bg ) ) {
			$css .= businessx_gcs( '.mobile-menu .sub-menu', 'background-color', 'colors_mobile_menu_submenu_bg' ); }

		if( businessx_cd( 'colors_mobile_menu_arrow_btn', $colors_mobile_menu_arrow_btn ) ) {
			$css .= businessx_gcs( '.mobile-menu .mobile-arrow', 'background-color', 'colors_mobile_menu_arrow_btn' ); }

		if( businessx_cd( 'colors_mobile_menu_arrow_btn_opened', $colors_mobile_menu_arrow_btn_opened ) ) {
			$css .= businessx_gcs( '.mobile-menu li.parent-opened > .mobile-arrow', 'background-color', 'colors_mobile_menu_arrow_btn_opened' ); }

		if( businessx_cd( 'colors_mobile_menu_close', $colors_mobile_menu_close ) ) {
			$css .= businessx_gcs( '.mobile-menu .ac-btn, .mobile-menu .ac-btn:hover, .mobile-menu .ac-btn:focus, .mobile-menu .ac-btn:active', 'background-color', 'colors_mobile_menu_close' ); }

		/* Header Heading - Index Colors */
		if( businessx_cd( 'colors_header_heading_index_bg', $colors_header_heading_index_bg ) ) {
			$css .= businessx_gcs( '.index-heading', 'background-color', 'colors_header_heading_index_bg' ); }

		if( businessx_cd( 'colors_header_heading_index_text', $colors_header_heading_index_text ) ) {
			$css .= businessx_gcs( '.index-heading, .index-heading .sec-hs-elements .hs-primary-large', 'color', 'colors_header_heading_index_text' ); }

		if( businessx_cd( 'colors_header_heading_index_text_shadow', $colors_header_heading_index_text_shadow ) ) {
			$css .= businessx_gcs(
				'.index-heading .sec-hs-elements .hs-primary-large, .index-heading  .sec-hs-elements .sec-hs-description, .index-heading .sec-hs-elements .ac-btns-or, .index-heading .entry-meta-list', 'text-shadow', 'colors_header_heading_index_text_shadow', '0 1px 2px ' ); }

		if( businessx_cd( 'colors_header_heading_index_overlay_color', $colors_header_heading_index_overlay_color ) ) {
			$css .= businessx_gcs( '.index-heading .grid-overlay', 'background-color', 'colors_header_heading_index_overlay_color' ); }

		if( businessx_cd( 'colors_header_heading_index_overlay_shadow', $colors_header_heading_index_overlay_shadow ) ) {
			$css .= businessx_gcs( '.index-heading .grid-overlay:before', 'background', 'colors_header_heading_index_overlay_shadow', '-moz-linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' );
			$css .= businessx_gcs( '.index-heading .grid-overlay:before', 'background', 'colors_header_heading_index_overlay_shadow', '-webkit-linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' );
			$css .= businessx_gcs( '.index-heading .grid-overlay:before', 'background', 'colors_header_heading_index_overlay_shadow', 'linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' ); }

		if( businessx_cd( 'colors_header_heading_index_links', $colors_header_heading_index_links ) ) {
			$css .= businessx_gcs(
				'.index-heading a:not(.ac-btn), .index-heading a:not(.ac-btn):hover, .index-heading a:not(.ac-btn):focus, .index-heading a:not(.ac-btn):active', 'color', 'colors_header_heading_index_links' ); }

		/* Header Heading - Page Colors */
		if( businessx_cd( 'colors_header_heading_page_bg', $colors_header_heading_page_bg ) ) {
			$css .= businessx_gcs( '.page-heading', 'background-color', 'colors_header_heading_page_bg' ); }

		if( businessx_cd( 'colors_header_heading_page_text', $colors_header_heading_page_text ) ) {
			$css .= businessx_gcs( '.page-heading, .page-heading .sec-hs-elements .hs-primary-large', 'color', 'colors_header_heading_page_text' ); }

		if( businessx_cd( 'colors_header_heading_page_text_shadow', $colors_header_heading_page_text_shadow ) ) {
			$css .= businessx_gcs(
				'.page-heading .sec-hs-elements .hs-primary-large, .page-heading  .sec-hs-elements .sec-hs-description, .page-heading .sec-hs-elements .ac-btns-or, .page-heading .entry-meta-list', 'text-shadow', 'colors_header_heading_page_text_shadow', '0 1px 2px ' ); }

		if( businessx_cd( 'colors_header_heading_page_overlay_color', $colors_header_heading_page_overlay_color ) ) {
			$css .= businessx_gcs( '.page-heading .grid-overlay', 'background-color', 'colors_header_heading_page_overlay_color' ); }

		if( businessx_cd( 'colors_header_heading_page_overlay_shadow', $colors_header_heading_page_overlay_shadow ) ) {
			$css .= businessx_gcs( '.page-heading .grid-overlay:before', 'background', 'colors_header_heading_page_overlay_shadow', '-moz-linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' );
			$css .= businessx_gcs( '.page-heading .grid-overlay:before', 'background', 'colors_header_heading_page_overlay_shadow', '-webkit-linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' );
			$css .= businessx_gcs( '.page-heading .grid-overlay:before', 'background', 'colors_header_heading_page_overlay_shadow', 'linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' ); }

		if( businessx_cd( 'colors_header_heading_page_links', $colors_header_heading_page_links ) ) {
			$css .= businessx_gcs(
				'.page-heading a:not(.ac-btn), .page-heading a:not(.ac-btn):hover, .page-heading a:not(.ac-btn):focus, .page-heading a:not(.ac-btn):active', 'color', 'colors_header_heading_page_links' ); }

		/* Header Heading - Single Colors */
		if( businessx_cd( 'colors_header_heading_single_bg', $colors_header_heading_single_bg ) ) {
			$css .= businessx_gcs( '.single-heading', 'background-color', 'colors_header_heading_single_bg' ); }

		if( businessx_cd( 'colors_header_heading_single_text', $colors_header_heading_single_text ) ) {
			$css .= businessx_gcs( '.single-heading, .single-heading .sec-hs-elements .hs-primary-large', 'color', 'colors_header_heading_single_text' ); }

		if( businessx_cd( 'colors_header_heading_single_text_shadow', $colors_header_heading_single_text_shadow ) ) {
			$css .= businessx_gcs(
				'.single-heading .sec-hs-elements .hs-primary-large, .single-heading  .sec-hs-elements .sec-hs-description, .single-heading .sec-hs-elements .ac-btns-or, .single-heading .entry-meta-list', 'text-shadow', 'colors_header_heading_single_text_shadow', '0 1px 2px ' ); }

		if( businessx_cd( 'colors_header_heading_single_overlay_color', $colors_header_heading_single_overlay_color ) ) {
			$css .= businessx_gcs( '.single-heading .grid-overlay', 'background-color', 'colors_header_heading_single_overlay_color' ); }

		if( businessx_cd( 'colors_header_heading_single_overlay_shadow', $colors_header_heading_single_overlay_shadow ) ) {
			$css .= businessx_gcs( '.single-heading .grid-overlay:before', 'background', 'colors_header_heading_single_overlay_shadow', '-moz-linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' );
			$css .= businessx_gcs( '.single-heading .grid-overlay:before', 'background', 'colors_header_heading_single_overlay_shadow', '-webkit-linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' );
			$css .= businessx_gcs( '.single-heading .grid-overlay:before', 'background', 'colors_header_heading_single_overlay_shadow', 'linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' ); }

		if( businessx_cd( 'colors_header_heading_single_links', $colors_header_heading_single_links ) ) {
			$css .= businessx_gcs(
				'.single-heading a:not(.ac-btn), .single-heading a:not(.ac-btn):hover, .single-heading a:not(.ac-btn):focus, .single-heading a:not(.ac-btn):active', 'color', 'colors_header_heading_single_links' ); }

		/* Sidebars colors */
		if( businessx_cd( 'colors_sidebars_h_border_colors', $colors_sidebars_h_border_colors ) ) {
			$css .= businessx_gcs( '.widget-title, .widget_wpcom_social_media_icons_widget li a', 'border-color', 'colors_sidebars_h_border_colors', '', ' !important' ); }

		if( businessx_cd( 'colors_sidebars_h_border_colors_2', $colors_sidebars_h_border_colors_2 ) ) {
			$css .= businessx_gcs( '.widget-title span:before', 'border-top-color', 'colors_sidebars_h_border_colors_2' ); }

		/* Footer colors */
		if( businessx_cd( 'colors_footer_color', $colors_footer_color ) ) {
			$css .= businessx_gcs( '.footer-widgets', 'color', 'colors_footer_color' ); }

		if( businessx_cd( 'colors_footer_background_color', $colors_footer_background_color ) ) {
			$css .= businessx_gcs( '.footer-widgets', 'background-color', 'colors_footer_background_color' ); }

		if( businessx_cd( 'colors_footer_links_headings', $colors_footer_links_headings ) ) {
			$css .= businessx_gcs( '.footer-widgets h1, .footer-widgets h2, .footer-widgets h3, .footer-widgets h4, .footer-widgets h5, .footer-widgets h6, .footer-widgets a, .footer-widgets a:focus, .footer-widgets a:active', 'color', 'colors_footer_links_headings' ); }

		if( businessx_cd( 'colors_footer_links_hover', $colors_footer_links_hover ) ) {
			$css .= businessx_gcs( '.footer-widgets a:hover', 'color', 'colors_footer_links_hover' ); }

		if( businessx_cd( 'colors_footer_borders', $colors_footer_borders ) ) {
			$css .= businessx_gcs( '.footer-sidebar .widget-title, .footer-sidebar .tagcloud a, .footer-sidebar .widget table, .footer-sidebar .widget th, .footer-sidebar .widget td, .footer-sidebar .widget fieldset, .footer-sidebar .widget blockquote, .footer-sidebar .widget pre, .footer-sidebar .widget abbr, .footer-sidebar .widget acronym, .footer-sidebar .widget_wpcom_social_media_icons_widget li a', 'border-color', 'colors_footer_borders', '', ' !important' ); }

		if( businessx_cd( 'colors_footer_widget_2nd', $colors_footer_widget_2nd ) ) {
			$css .= businessx_gcs( '.footer-sidebar .widget-title span:before', 'border-top-color', 'colors_footer_widget_2nd' ); }

		/* Footer colors - form elements */
		if( businessx_cd( 'colors_footer_form_bg', $colors_footer_form_bg ) ) {
			$css .= businessx_gcs( '.footer-wrap input[type=text], .footer-wrap input[type=search], .footer-wrap input[type=radio], .footer-wrap input[type=tel], .footer-wrap input[type=time], .footer-wrap input[type=url], .footer-wrap input[type=week], .footer-wrap input[type=password], .footer-wrap input[type=checkbox], .footer-wrap input[type=color], .footer-wrap input[type=date], .footer-wrap input[type=datetime], .footer-wrap input[type=datetime-local], .footer-wrap input[type=email], .footer-wrap input[type=month], .footer-wrap input[type=number], .footer-wrap select, .footer-wrap textarea', 'background-color', 'colors_footer_form_bg' ); }

		if( businessx_cd( 'colors_footer_form_border', $colors_footer_form_border ) ) {
			$css .= businessx_gcs( '.footer-wrap input[type=text], .footer-wrap input[type=search], .footer-wrap input[type=radio], .footer-wrap input[type=tel], .footer-wrap input[type=time], .footer-wrap input[type=url], .footer-wrap input[type=week], .footer-wrap input[type=password], .footer-wrap input[type=checkbox], .footer-wrap input[type=color], .footer-wrap input[type=date], .footer-wrap input[type=datetime], .footer-wrap input[type=datetime-local], .footer-wrap input[type=email], .footer-wrap input[type=month], .footer-wrap input[type=number], .footer-wrap select, .footer-wrap textarea', 'border-color', 'colors_footer_form_border' ); }

		if( businessx_cd( 'colors_footer_form_text', $colors_footer_form_text ) ) {
			$css .= businessx_gcs( '.footer-wrap input[type=text], .footer-wrap input[type=search], .footer-wrap input[type=radio], .footer-wrap input[type=tel], .footer-wrap input[type=time], .footer-wrap input[type=url], .footer-wrap input[type=week], .footer-wrap input[type=password], .footer-wrap input[type=checkbox], .footer-wrap input[type=color], .footer-wrap input[type=date], .footer-wrap input[type=datetime], .footer-wrap input[type=datetime-local], .footer-wrap input[type=email], .footer-wrap input[type=month], .footer-wrap input[type=number], .footer-wrap select, .footer-wrap textarea', 'color', 'colors_footer_form_text' );
			$css .= businessx_gcs( '.footer-wrap input[type=radio]:checked:before', 'background-color', 'colors_footer_form_text' ); }

		if( businessx_cd( 'colors_footer_form_border_focus', $colors_footer_form_border_focus ) ) {
			$css .= businessx_gcs( '.footer-wrap input[type=text]:focus, .footer-wrap input[type=search]:focus, .footer-wrap input[type=radio]:focus, .footer-wrap input[type=tel]:focus, .footer-wrap input[type=time]:focus, .footer-wrap input[type=url]:focus, .footer-wrap input[type=week]:focus, .footer-wrap input[type=password]:focus, .footer-wrap input[type=checkbox]:focus, .footer-wrap input[type=color]:focus, .footer-wrap input[type=date]:focus, .footer-wrap input[type=datetime]:focus, .footer-wrap input[type=datetime-local]:focus, .footer-wrap input[type=email]:focus, .footer-wrap input[type=month]:focus, .footer-wrap input[type=number]:focus, .footer-wrap select:focus, .footer-wrap textarea:focus', 'border-color', 'colors_footer_form_border_focus' ); }

		if( businessx_cd( 'colors_footer_form_bg_focus', $colors_footer_form_bg_focus ) ) {
			$css .= businessx_gcs( '.footer-wrap input[type=text]:focus, .footer-wrap input[type=search]:focus, .footer-wrap input[type=radio]:focus, .footer-wrap input[type=tel]:focus, .footer-wrap input[type=time]:focus, .footer-wrap input[type=url]:focus, .footer-wrap input[type=week]:focus, .footer-wrap input[type=password]:focus, .footer-wrap input[type=checkbox]:focus, .footer-wrap input[type=color]:focus, .footer-wrap input[type=date]:focus, .footer-wrap input[type=datetime]:focus, .footer-wrap input[type=datetime-local]:focus, .footer-wrap input[type=email]:focus, .footer-wrap input[type=month]:focus, .footer-wrap input[type=number]:focus, .footer-wrap select:focus, .footer-wrap textarea:focus', 'background-color', 'colors_footer_form_bg_focus' ); }

		if( businessx_cd( 'colors_footer_form_placeholder', $colors_footer_form_placeholder ) ) {
			$css .= businessx_gcs( '.footer-wrap ::-webkit-input-placeholder', 'color', 'colors_footer_form_placeholder' );
			$css .= businessx_gcs( '.footer-wrap :-moz-placeholder', 'color', 'colors_footer_form_placeholder' );
			$css .= businessx_gcs( '.footer-wrap ::-moz-placeholder', 'color', 'colors_footer_form_placeholder' );
			$css .= businessx_gcs( '.footer-wrap :-ms-input-placeholder', 'color', 'colors_footer_form_placeholder' ); }

		/* Footer colors - buttons */
		if( businessx_cd( 'colors_footer_buttons_bg', $colors_footer_buttons_bg ) ) {
			$css .= businessx_gcs( '.footer-wrap .ac-btn, .footer-wrap input[type=submit], .footer-wrap input[type=reset], .footer-wrap input[type=button], .footer-wrap button', 'background-color', 'colors_footer_buttons_bg' ); }

		if( businessx_cd( 'colors_footer_buttons_bg_hover', $colors_footer_buttons_bg_hover ) ) {
			$css .= businessx_gcs( '.footer-wrap .ac-btn:hover, .footer-wrap input[type=submit]:hover, .footer-wrap input[type=reset]:hover, .footer-wrap input[type=button]:hover,.footer-wrap  button:hover', 'background-color', 'colors_footer_buttons_bg_hover' ); }

		if( businessx_cd( 'colors_footer_buttons_bg_other', $colors_footer_buttons_bg_other ) ) {
			$css .= businessx_gcs( '.footer-wrap .ac-btn:focus, .footer-wrap input[type=submit]:focus, .footer-wrap input[type=reset]:focus, .footer-wrap input[type=button]:focus, .footer-wrap button:focus, .footer-wrap .ac-btn:active, .footer-wrap input[type=submit]:active, .footer-wrap input[type=reset]:active, .footer-wrap input[type=button]:focus, .footer-wrap button:active', 'background-color', 'colors_footer_buttons_bg_other' ); }

		/* Footer credits colors */
		if( businessx_cd( 'colors_footer_credits_bg', $colors_footer_credits_bg ) ) {
			$css .= businessx_gcs( '.footer-credits', 'background-color', 'colors_footer_credits_bg' ); }

		if( businessx_cd( 'colors_footer_credits_text', $colors_footer_credits_text ) ) {
			$css .= businessx_gcs( '.footer-credits', 'color', 'colors_footer_credits_text' ); }

		if( businessx_cd( 'colors_footer_credits_links', $colors_footer_credits_links ) ) {
			$css .= businessx_gcs( '.footer-creds a, .footer-creds a:hover, .footer-creds a:focus, .footer-creds a:active', 'color', 'colors_footer_credits_links' ); }


		// Adds inline CSS
		wp_add_inline_style( 'businessx-style', businessx_sanitize_css( $css ) );
	}
}
add_action( 'wp_enqueue_scripts', 'businessx_final_inline_css', 11 );



/*  Customizer JS/CSS
/* ------------------------------------ */
if ( ! function_exists( 'businessx_customizer_js_css' ) ) {
	function businessx_customizer_js_css() {
		global $businessx_customizer_settings;

		// Customizer Hacks
		wp_enqueue_style( 'businessx-customizer-style', get_template_directory_uri() . '/assets/css/admin/customizer.css', array(), '20160412', 'all' );
		wp_enqueue_script( 'businessx-customizer-js', get_template_directory_uri() . '/assets/js/admin/customizer.js', array(), '20160412', true );
		wp_localize_script( 'businessx-customizer-js', 'businessx_customizer_js_vars',
			apply_filters( 'businessx_customizer_js___vars', array(
				'admin_ajax'	=> esc_url( admin_url('admin-ajax.php') ),
				'dismiss_ext_nonce' => wp_create_nonce( 'businessx_dismiss_ext_nonce' )
			) )
		);

		// Settings Manager
		wp_enqueue_script( 'businessx-customizer-settings', get_template_directory_uri() . '/assets/js/admin/customizer-settings.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '20160412', true );
		wp_localize_script( 'businessx-customizer-settings', 'bx_customizer_settings', $businessx_customizer_settings );

	}
}
add_action( 'customize_controls_enqueue_scripts', 'businessx_customizer_js_css' );

if ( ! function_exists( 'businessx_customizer_preview_js' ) ) {
	function businessx_customizer_preview_js() {
		wp_enqueue_script( 'businessx-customize-preview', get_template_directory_uri() . '/assets/js/admin/customize-preview.js', array( 'customize-preview' ), '20160412', true );
	}
}
add_action( 'customize_preview_init', 'businessx_customizer_preview_js' );



/*  CSS template
/* ------------------------------------ */
if ( ! function_exists( 'businessx_czr_output_css_template' ) ) {
	function businessx_czr_output_css_template() {
		global $businessx_customizer_settings;
		$new_settings = array();

		if( ! empty( $businessx_customizer_settings ) ) {
			foreach( $businessx_customizer_settings as $bcs => $bcs_value ) {
				$new_settings[ $bcs ] = '{{ data.' . $bcs . ' }}';
			}
		}

		?>
		<script type="text/html" id="tmpl-businessx-czr-settings-output">
			<?php echo businessx_czr_output_css( $new_settings  ); ?>
		</script>
		<?php
	}
}
add_action( 'customize_controls_print_footer_scripts', 'businessx_czr_output_css_template' );



/*  Generate CSS styles
/* ------------------------------------ */
if ( ! function_exists( 'businessx_gcs' ) ) {
	function businessx_gcs( $selector, $style, $mod_name, $prefix = '', $postfix = '', $type2mod = ''  ) {
		$return = '';

		if( $type2mod != '' ) {
			$mod = $type2mod;
		} else {
			$mod = get_theme_mod( $mod_name );
		}

		if ( ! empty( $mod ) ) {

			$return = sprintf( '%s{%s:%s;}',
				$selector,
				$style,
				$prefix . $mod . $postfix
			);

			return $return;

		}
	}
}



/*  Check if option is not changed
/*	or default
/* ------------------------------------ */
if ( ! function_exists( 'businessx_cd' ) ) {
	function businessx_cd( $mod_name, $default ) {
		$mod = get_theme_mod( $mod_name );
		if ( $mod != $default || $mod == '' )	{
			return true;
		}
	}
}



/*  Button controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_button' ) ) {
	function businessx_controller_button( $setting_id, $section_id, $label = '', $description = '', $href = '', $css_class = '' ) {
		global $wp_customize;
		$wp_customize->add_setting( $setting_id, array(
	    	'default'			=> '',
			'sanitize_callback' => 'sanitize_text_field',
	    	'capability'		=> 'edit_theme_options',
		) );
		$wp_customize->add_control( new Businessx_Control_Button( $wp_customize, $setting_id, array(
			'label'    			=> $label,
			'description' 		=> $description,
			'settings' 			=> $setting_id,
			'section'  			=> $section_id,
			'type'     			=> 'button-control',
			'href'				=> $href,
			'css_class'			=> $css_class,
		) ) );
	}
}



/*  Info controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_info' ) ) {
	function businessx_controller_info( $setting_id, $section_id, $label = '', $description = '', $info_type = '', $css_class = '', $html = '' ) {
		global $wp_customize;
		$wp_customize->add_setting( $setting_id, array(
	    	'default'			=> '',
			'sanitize_callback' => 'sanitize_text_field',
	    	'capability'		=> 'edit_theme_options',
		) );
		$wp_customize->add_control( new Businessx_Control_Info( $wp_customize, $setting_id, array(
			'label'    			=> $label,
			'description' 		=> $description,
			'settings' 			=> $setting_id,
			'section'  			=> $section_id,
			'type'     			=> 'info-control',
			'info_type'			=> $info_type,
			'css_class'			=> $css_class,
			'html'				=> $html
		) ) );
	}
}


/*  Text controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_txt' ) ) {
	function businessx_controller_txt( $setting_id, $section_id, $label = '', $description = '', $default = '', $selector = '', $transport = true, $selective = true, $sanitize = 'sanitize_text_field', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'default'			=> $default,
			'sanitize_callback' => $sanitize,
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport_type,
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'				=> $label,
			'description'		=> $description,
			'section'			=> $section_id,
			'settings'			=> $setting_id,
			'priority'			=> intval( $priority ),
		) );
		if( $transport && $selective && ! businessx_wp_version_compare( '4.5' ) ) {
			$wp_customize->selective_refresh->add_partial( $setting_id, array(
				'selector' => $selector,
				'render_callback' => function() use ( &$setting_id ) {
					return get_theme_mod( $setting_id );
				},
			) );
		}
	}
}



/*  Text Area controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_txt_area' ) ) {
	function businessx_controller_txt_area( $setting_id, $section_id, $label = '', $description = '', $default = '', $selector = '', $transport = true, $sanitize = 'sanitize_text_field', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'default'			=> $default,
			'sanitize_callback' => $sanitize,
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport_type,
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'				=> $label,
			'description'		=> $description,
			'section'			=> $section_id,
			'settings'			=> $setting_id,
			'type'     			=> 'textarea',
			'priority'			=> intval( $priority ),
		) );
		if( $transport && ! businessx_wp_version_compare( '4.5' ) ) {
			$wp_customize->selective_refresh->add_partial( $setting_id, array(
				'selector' => $selector,
				'render_callback' => function() use ( &$setting_id ) {
					return get_theme_mod( $setting_id );
				},
			) );
		}
	}
}



/*  Checkbox controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_checkbox' ) ) {
	function businessx_controller_checkbox( $setting_id, $section_id, $label = '', $description = '', $default = false, $transport = false, $sanitize = 'businessx_sanitize_checkbox', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'sanitize_callback' => $sanitize,
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_filter', $default ),
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport_type,
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'    		=> $label,
			'description'	=> $description,
			'section'  		=> $section_id,
			'settings' 		=> $setting_id,
			'type'     		=> 'checkbox',
			'priority'		=> intval( $priority ),
		));
	}
}



/*  Select controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_select' ) ) {
	function businessx_controller_select( $setting_id, $section_id, $choices = array(), $label = '', $description = '', $default = '', $transport = false, $sanitize = 'businessx_sanitize_select', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'sanitize_callback' => $sanitize,
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_filter', $default ),
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport_type,
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'    		=> $label,
			'description'	=> $description,
			'section'  		=> $section_id,
			'settings' 		=> $setting_id,
			'type'			=> 'select',
			'width'			=> '100',
			'choices'		=> $choices,
			'priority'		=> intval( $priority ),
		));
	}
}



/*  Color Picker controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_color_picker' ) ) {
	function businessx_controller_color_picker( $setting_id, $section_id, $label = '', $description = '', $default = '', $transport = true, $sanitize = 'sanitize_hex_color', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_filter', $default ),
			'sanitize_callback' => $sanitize,
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport_type,
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $setting_id, array(
			'label'				=> $label,
			'description'		=> $description,
			'section'			=> $section_id,
			'settings'			=> $setting_id,
			'priority'			=> intval( $priority ),
		) ) );
	}
}



/*  RGBA Picker controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_rgba_picker' ) ) {
	function businessx_controller_rgba_picker( $setting_id, $section_id, $label = '', $description = '', $default = '', $transport = true, $show_opacity = true, $palette = array(), $sanitize = 'businessx_sanitize_rgba', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'sanitize_callback' => $sanitize,
			'default'     		=> $default,
			'capability'  		=> 'edit_theme_options',
			'transport'   		=> $transport
		) );
		$wp_customize->add_control( new Businessx_Control_RGBA( $wp_customize, $setting_id, array(
			'label'         	=> $label,
			'description'		=> $description,
			'section'       	=> $section_id,
			'settings'      	=> $setting_id,
			'show_opacity'  	=> $show_opacity,
			'palette'   		=> $palette,
			'priority'			=> intval( $priority ),
		) ) );
	}
}



/*  Simple Opacity controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_simple_opacity' ) ) {
	function businessx_controller_simple_opacity( $setting_id, $section_id, $label = '', $description = '', $default = '0.5', $transport = true, $sanitize = 'businessx_sanitize_select' ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'sanitize_callback' => $sanitize,
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_opacity_filter', $default ),
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport,
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'				=> $label,
			'section'    		=> $section_id,
			'settings'   		=> $setting_id,
			'description'		=> $description,
			'type'       		=> 'select',
			'width'				=> '100',
			'choices'			=> apply_filters( 'businessx_' . $setting_id . '_opacity_select_filter', array(
										'0' 			=> esc_html__( 'Transparent', 'businessx' ),
										'0.1'			=> esc_html__( '10%', 'businessx' ),
										'0.2'			=> esc_html__( '20%', 'businessx' ),
										'0.3' 			=> esc_html__( '30%', 'businessx' ),
										'0.4' 			=> esc_html__( '40%', 'businessx' ),
										'0.5' 			=> esc_html__( '50%', 'businessx' ),
										'0.6' 			=> esc_html__( '60%', 'businessx' ),
										'0.7' 			=> esc_html__( '70%', 'businessx' ),
										'0.8' 			=> esc_html__( '80%', 'businessx' ),
										'0.9' 			=> esc_html__( '90%', 'businessx' ),
										'1' 			=> esc_html__( '100%', 'businessx' ),
		) ) ) );
	}
}



/*  Simple Image controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_simple_image' ) ) {
	function businessx_controller_simple_image( $setting_id, $section_id, $label = '', $description = '', $default = '', $transport = true, $sanitize = 'esc_url_raw', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'default'			=> $default,
			'sanitize_callback' => $sanitize,
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport_type,
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $setting_id, array(
			'label'				=> $label,
			'description'		=> $description,
			'section'			=> $section_id,
			'settings'			=> $setting_id,
			'priority'			=> intval( $priority ),
		) ) );
	}
}



/*  Background controllers
/* ------------------------------------ */

// Background image
if ( ! function_exists( 'businessx_controller_bg_image' ) ) {
	function businessx_controller_bg_image( $setting_id, $section_id, $label = '', $default = '', $description = '' ) {
		global $wp_customize;
		$new_options = array();
		$new_options_global = array();

		// Image
		$wp_customize->add_setting( $setting_id, array(
	    	'default'			=> $default,
			'sanitize_callback' => 'esc_url_raw',
	    	'capability'		=> 'edit_theme_options',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $setting_id, array(
	    	'label'				=> $label,
			'description'		=> $description,
	    	'section'			=> $section_id,
	    	'settings'			=> $setting_id,
		) ) );

		// Background size
		$wp_customize->add_setting( $setting_id . '_size', array(
			'sanitize_callback' => 'businessx_sanitize_select',
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_size_filter', 'cover' ),
			'capability'		=> 'edit_theme_options',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( $setting_id . '_size', array(
			'label'				=> __( 'Background-size:', 'businessx' ),
			'section'    		=> $section_id,
			'settings'   		=> $setting_id . '_size',
			'type'       		=> 'select',
			'choices'			=> businessx_bg_options_size()
		) );

		// Background repeat
		$wp_customize->add_setting( $setting_id . '_repeat', array(
			'sanitize_callback' => 'businessx_sanitize_select',
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_repeat_filter', 'no-repeat' ),
			'capability'		=> 'edit_theme_options',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( $setting_id . '_repeat', array(
			'label'				=> __( 'Background-repeat:', 'businessx' ),
			'section'    		=> $section_id,
			'settings'   		=> $setting_id . '_repeat',
			'type'       		=> 'select',
			'choices'			=> businessx_bg_options_repeat()
		) );

		// Background position
		$wp_customize->add_setting( $setting_id . '_position', array(
			'sanitize_callback' => 'businessx_sanitize_select',
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_position_filter', 'center center' ),
			'capability'		=> 'edit_theme_options',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( $setting_id . '_position', array(
			'label'				=> __( 'Background-position:', 'businessx' ),
			'section'    		=> $section_id,
			'settings'   		=> $setting_id . '_position',
			'type'       		=> 'select',
			'choices'			=> businessx_bg_options_position()
		) );
	}
}

// Overlay
if ( ! function_exists( 'businessx_controller_bg_overlay' ) ) {
	function businessx_controller_bg_overlay( $setting_id, $section_id, $label = '', $default = false ) {
		global $wp_customize;

		$wp_customize->add_setting( $setting_id, array(
			'sanitize_callback' => 'businessx_sanitize_checkbox',
			'default'			=> $default,
			'capability'		=> 'edit_theme_options',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'    => $label,
			'section'  => $section_id,
			'type'     => 'checkbox',
			'settings' => $setting_id,
		)); /*=====*/

		$wp_customize->add_setting( $setting_id . '_color', array(
				'default'			=> apply_filters( 'businessx_' . $setting_id .'_color_filter', '#000000' ),
				'sanitize_callback' => 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'transport'         => 'postMessage',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $setting_id . '_color', array(
			'label'				=> __( 'Overlay background color:', 'businessx' ),
			'section'			=> $section_id,
			'settings'			=> $setting_id . '_color',
		) ) ); /*=====*/

		$wp_customize->add_setting( $setting_id . '_opacity', array(
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_opacity_filter', '0.5' ),
			'capability'		=> 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'businessx_sanitize_select',
		) );
		$wp_customize->add_control( $setting_id . '_opacity', array(
			'label'				=> __( 'Background overlay opacity:', 'businessx' ),
			'section'    		=> $section_id,
			'settings'   		=> $setting_id . '_opacity',
			'type'       		=> 'select',
			'width'				=> '100',
			'choices'			=> apply_filters( 'businessx_' . $setting_id . '_opacity_select_filter', array(
										'0' 			=> esc_html__( 'Transparent', 'businessx' ),
										'0.1'			=> esc_html__( '10%', 'businessx' ),
										'0.2'			=> esc_html__( '20%', 'businessx' ),
										'0.3' 			=> esc_html__( '30%', 'businessx' ),
										'0.4' 			=> esc_html__( '40%', 'businessx' ),
										'0.5' 			=> esc_html__( '50%', 'businessx' ),
										'0.6' 			=> esc_html__( '60%', 'businessx' ),
										'0.7' 			=> esc_html__( '70%', 'businessx' ),
										'0.8' 			=> esc_html__( '80%', 'businessx' ),
										'0.9' 			=> esc_html__( '90%', 'businessx' ),
										'1' 			=> esc_html__( '100%', 'businessx' ),
		) ) ) );
	}
}

// Parallax
if ( ! function_exists( 'businessx_controller_bg_parallax' ) ) {
	function businessx_controller_bg_parallax( $setting_id, $section_id, $label = '', $description = '', $default = false ) {
		global $wp_customize;

		$wp_customize->add_setting( $setting_id, array(
			'sanitize_callback' => 'businessx_sanitize_checkbox',
			'default'			=> $default,
			'capability'		=> 'edit_theme_options',
			//'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'    		=> $label,
			'description' 	=> $description,
			'section'  		=> $section_id,
			'type'     		=> 'checkbox',
			'settings' 		=> $setting_id,
		)); /*=====*/

	}
}



/*  Other functions
/* ------------------------------------ */

// Render the site title for the selective refresh partial
if ( ! function_exists( 'businessx_customize_partial_blogname' ) ) {
	function businessx_customize_partial_blogname() {
		bloginfo( 'name' );
	}
}

// Render the site tagline for the selective refresh partial
if ( ! function_exists( 'businessx_customize_partial_blogdescription' ) ) {
	function businessx_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
}
