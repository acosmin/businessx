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
	apply_filters( 'businessx_option___logo_type_select_default', 'logo-text-type' ), false, 'sanitize_text_field', 0 );
