<?php
/* ------------------------------------ */
/*  WooCommerce
/* ------------------------------------ */

	/// WooCommerce section
	$wp_customize->add_section( 'woocommerce_settings', array(
		'title'				=> __( 'WooCommerce', 'businessx' ),
		'panel'				=> 'settings_options'
	) );

		////// WooCommerce - Misc
		businessx_controller_checkbox(
			'woocommerce_cart_disable',
			'woocommerce_settings',
			esc_html__( 'Disable cart button', 'businessx' ),
			esc_html__( 'Hide the shopping cart button in the header', 'businessx' ), false );
