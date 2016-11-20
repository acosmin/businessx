<?php
/* ------------------------------------------- */
/*  Partials for selective refresh
/* ------------------------------------------- */


// Render the site title for the selective refresh partial
if ( ! function_exists( 'businessx_customize_partial_blogname' ) ) {
	function businessx_customize_partial_blogname() {
		bloginfo( 'name' );
	}
}

// Render the site tagline for the selective refresh partial
if ( ! function_exists( 'businessx_customize_partial_blogdescription' ) ) {
	function businessx_customize_partial_blogdescription() {
		bloginfo( 'description' );
	}
}
