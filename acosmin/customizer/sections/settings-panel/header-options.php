<?php
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
			'.home:not(.paged) #top-header .hs-primary-large' );

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
