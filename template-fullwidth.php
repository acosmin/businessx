<?php
/* ------------------------------------------------------------------------- *
 * Template name: Full Width
/* ------------------------------------------------------------------------- */

// Header and Footer templates
$businessx_header_tmpl = apply_filters( 'businessx_header___tmpl', '' );
$businessx_footer_tmpl = apply_filters( 'businessx_footer___tmpl', '' );
$businessx_page_fw     = apply_filters( 'businessx_page_fw___tmpl', 'page-fw' );

// Header
get_header( $businessx_header_tmpl );

	// Loop
	while ( have_posts() ) : the_post();
		// Page template
		get_template_part( 'partials/posts/content', sanitize_file_name( $businessx_page_fw ) );
	endwhile;

// Footer
get_footer( $businessx_footer_tmpl );
