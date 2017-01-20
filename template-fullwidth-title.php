<?php
/* ------------------------------------------------------------------------- *
 * Template name: Full Width With Title
/* ------------------------------------------------------------------------- */

// Header and Footer templates
$businessx_header_tmpl   = apply_filters( 'businessx_header___tmpl', '' );
$businessx_footer_tmpl   = apply_filters( 'businessx_footer___tmpl', '' );
$businessx_page_fw_title = apply_filters( 'businessx_page_fw_title___tmpl', 'page-fw' );

// Header
get_header( $businessx_header_tmpl );

// Title
businessx_get_heading_templ( 'page', 'full-width' );

	// Loop
	while ( have_posts() ) : the_post();
		// Page template
		get_template_part( 'partials/posts/content', sanitize_file_name( $businessx_page_fw_title ) );
	endwhile;

// Footer
get_footer( $businessx_footer_tmpl );
