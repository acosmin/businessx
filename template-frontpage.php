<?php
/* ------------------------------------------------------------------------- *
 * Template name: Front Page
/* ------------------------------------------------------------------------- */

// Header and Footer templates
$businessx_header_tmpl = apply_filters( 'businessx_header___tmpl', '' );
$businessx_footer_tmpl = apply_filters( 'businessx_footer___tmpl', '' );

// Header
get_header( $businessx_header_tmpl );

	if( has_action( 'businessx_frontpage_sections' ) ) :
		/*
		A way for Businessx Extensions to hook
		and display sections on the front page;
		-----------
		hooked:
		businessx_extensions_display_sections() - 10
		*/
		do_action( 'businessx_frontpage_sections' );
	else :
		businessx_get_heading_templ( 'index', 'no-sections' );
	endif;

// Footer
get_footer( $businessx_footer_tmpl ); ?>
