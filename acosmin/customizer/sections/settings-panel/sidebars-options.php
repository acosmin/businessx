<?php
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

		////// Sidebars - WooCommerce
		if( businessx_wco_is_activated() ) {
		businessx_controller_info(
			'sidebars_woocommerce_info',
			'sidebars_settings',
			__( 'WooCommerce view', 'businessx' ) );

		businessx_controller_checkbox(
			'sidebars_woocommerce_disable',
			'sidebars_settings',
			esc_html__( 'Disable sidebar globally', 'businessx' ),
			esc_html__( 'This will overwrite any option you select for each product or on shop homepage/archives. Also, this does not work for cart,  checkout and my account pages (use the Page view option instead)', 'businessx' ), false );
		} // END WooCommerce Check
