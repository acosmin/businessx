<?php
/* ------------------------------------ */
/*  Custom Options
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
	apply_filters( 'businessx_option___logo_type_select_default', 'logo-text-type' ), false, 'sanitize_text_field', 5 );

// Show logo on scroll
businessx_controller_checkbox(
	'sticky_logo',
	'title_tagline',
	__( 'Sticky Logo', 'businessx' ),
	__( 'Show logo on scroll? If you use this feature, the logo will show up if the menu is sticky on scroll', 'businessx' ),
	apply_filters( 'businessx_option___sticky_logo_default', false ), false, 'businessx_sanitize_checkbox', 0 );

// Select logo type
businessx_controller_select(
	'sticky_logo_height',
	'title_tagline',
	apply_filters( 'businessx_option___logo_type_select', array(
		'1.5em'  => esc_html_x( '1.5', 'sticky logo size', 'businessx' ),
		'2em'    => esc_html_x( '2', 'sticky logo size', 'businessx' ),
		'2.5em'  => esc_html_x( '2.5', 'sticky logo size', 'businessx' ),
		'3em'    => esc_html_x( '3', 'sticky logo size', 'businessx' ),
		'3.5em'  => esc_html_x( '3.5', 'sticky logo size', 'businessx' ),
		'4em'    => esc_html_x( '4', 'sticky logo size', 'businessx' ),
	) ),
	__( 'Sticky Logo Height', 'businessx' ),
	__( 'Logo height on scroll, works only if the above option is on and the logo is and image. The value is represented in EM units', 'businessx' ),
	apply_filters( 'businessx_option___sticky_logo_height_default', '2em' ), true, 'sanitize_text_field', 3 );
