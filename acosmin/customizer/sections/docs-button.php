<?php
/* ------------------------------------ */
/*  Custom links
/* ------------------------------------ */

/// Documentation
$wp_customize->add_section( new Businessx_Section_Link( $wp_customize, 'link-button', array(
	'title'    	=> esc_html__( 'Businessx', 'businessx' ),
	'link_text' => esc_html__( 'Documentation', 'businessx' ),
	'link_url'  => esc_url( BUSINESSX_AC_DOCS_URL ) . '?utm_campaign=businessx_docs_btn',
	'priority'	=> 1
) ) );
