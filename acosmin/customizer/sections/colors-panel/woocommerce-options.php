<?php
/* ------------------------------------ */
/*  WooCommerce Colors
/* ------------------------------------ */

/// WooCommerce Colors section
$wp_customize->add_section( 'colors_woocommerce', array(
	'title'				=> __( 'WooCommerce', 'businessx' ),
	'panel'				=> 'colors_options',
	'active_callback'	=> 'businessx_wco_is_activated',
) );

	////// WooCommerce Colors
	businessx_controller_color_picker(
		'colors_woocommerce_accent',
		'colors_woocommerce',
		esc_html__( 'Accent #1:', 'businessx' ),
		esc_html__( 'This will change the price tag font color.', 'businessx' ),
		'#76bc1c' );

	businessx_controller_color_picker(
		'colors_woocommerce_accent2',
		'colors_woocommerce',
		esc_html__( 'Accent #2:', 'businessx' ),
		esc_html__( 'This will change the sale tag background color, price filter handles and a few other things.', 'businessx' ),
		'#1c82bc' );
