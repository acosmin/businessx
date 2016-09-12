<?php
/* ------------------------------------------------------------------------- *
 *	Prevent switching to Businessx on old versions of WordPress.					
/* ------------------------------------------------------------------------- */
function businessx_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'businessx_upgrade_notice' );
}
add_action( 'after_switch_theme', 'businessx_switch_theme' );



/*  Adds a message for unsuccessful theme switch.
 *
 *	Prints an update nag after an unsuccessful attempt to switch to
 *	Twenty Sixteen on WordPress versions prior to 4.5.
/* ------------------------------------------------------------------ */
function businessx_upgrade_notice() {
	$message = sprintf( __( 'Businessx requires at least WordPress version 4.5. You are running version %s. Please upgrade and try again.', 'businessx' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );
}



/*
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.5.
/* ------------------------------------------------------------------------------- */
function businessx_customize_notice() {
	wp_die( sprintf( __( 'Businessx requires at least WordPress version 4.5. You are running version %s. Please upgrade and try again.', 'businessx' ), $GLOBALS['wp_version'] ), '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'businessx_customize_notice' );



/*
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.5.
/* ---------------------------------------------------------------------------------- */
function businessx_preview_notice() {
	if ( isset( $_GET['preview'] ) ) {
		wp_die( sprintf( __( 'Businessx requires at least WordPress version 4.5. You are running version %s. Please upgrade and try again.', 'businessx' ), $GLOBALS['wp_version'] ) );
	}
}
add_action( 'template_redirect', 'businessx_preview_notice' );