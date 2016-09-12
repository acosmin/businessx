<?php
/* ------------------------------------------------------------------------- *
 *
 *  Theme Updater
 *  ________________
 *
 *	Just a frendly notice until we get on WordPress.org
 *	________________
 *
/* ------------------------------------------------------------------------- */



/*	Returns current theme version pulled 
 *	from our server.
/* --------------------------------------- */
function businessx_updater_get_remote_version() {
	global $wp_version;

	$url  = 'http://changelog.acosmin.com/businessx/';

	$options = array(
		'timeout'    => 3,
		'user-agent' => 'WordPress/' . $wp_version . '; ' . home_url( '/' )
	);

	$response = wp_remote_get( $url, $options );

	if ( is_wp_error( $response ) || 200 != wp_remote_retrieve_response_code( $response ) ) {
		return __( 'Can not contact the server. Try again later.', 'businessx' );
	}

	$changelog = trim( wp_remote_retrieve_body( $response ) );
	$changelog = maybe_unserialize( $changelog );

	$changelog = preg_split( "/(\r\n|\n|\r)/", $changelog );

	foreach ( $changelog as $line ) {
		if ( preg_match("/((?:\d+(?!\.\*)\.)+)(\d+)?(\.\*)?/i", $line, $matches ) ) {
			$version = $matches[0];
			break;
		}
	}

	return $version;
}



/*	Checks if new theme version is available 
/* ------------------------------------------- */
function businessx_updater_has_update() {
	$remote_version = businessx_updater_get_remote_version();
	$local_version  = businessx_get_local_version();

	if ( preg_match('/[0-9]*\.?[0-9]+/', $remote_version )) {
		if ( version_compare( $local_version, $remote_version, '<' ) ) {
			return true;
		}
	}

	return false;
}



/*	Adds notifications if there are new theme version available.
 *	Runs on time a day.
/* --------------------------------------------------------------- */
function businessx_updater_check_update() {
	$last_checked 	= (int) get_option( 'businessx_theme_last_checked' );
	$temp_version 	= get_transient( 'businessx_temp_theme_version' );
	$theme_version 	= businessx_get_local_version();

	if ( ! $temp_version ) {
		set_transient( 'businessx_temp_theme_version', $theme_version );
	} else {
		if ( version_compare($temp_version, $theme_version, '!=' ) ) {
			$last_checked = 0;
			set_transient('businessx_temp_theme_version', $theme_version );
		}
	}

	if ( $last_checked == 0 || ( $last_checked + 60 * 60 * 24 ) < time() ) {
		if ( businessx_updater_has_update() ) {
			update_option( 'businessx_theme_status', 'needs_update' );
		} else {
			delete_option( 'businessx_theme_status' );
		}
		update_option( 'businessx_theme_last_checked', time() );
	}

	if ( get_option( 'businessx_theme_status' ) == 'needs_update' && current_user_can( 'update_themes' ) ) {
		add_action( 'admin_notices', 'businessx_updater_notification' );
	}
}



/*	Update notification
/* ----------------------- */
function businessx_updater_notification() {
	$update_url 	= 'http://www.acosmin.com/theme/businessx/';

	echo '<div class="notice bx-theme-updater notice-warning"><p style="display: inline-block; width: 100%;">';
	echo '<span style="display: inline-block; float: left;">There is a new version of <a href="' . esc_url( $update_url ) . '">Businessx</a> available. ';
	echo '<a href="http://changelog.acosmin.com/businessx/?TB_iframe=true" class="thickbox thickbox-preview">View the changelog </a> or visit our tutorial on <a href="http://www.acosmin.com/documentation/businessx/#h4">updating themes</a>.</span>';
	echo ' <a style="float: right;" href="#" class="bx-updater-hide">Hide notice</a></p></div>';
}



function businessx_updater_ajax() {
	if ( $_POST['type'] == 'theme-notification-hide' ) {
		
		if( ! current_user_can( 'edit_theme_options' ) )
			return;
		
		update_option( 'businessx_theme_last_checked', time() + 60 * 60 * 48 );
		delete_option( 'businessx_theme_status' );

		die();
	}
	die();
}



/*	Initiate Updater
/* ----------------------- */
function businessx_updater_init() {
	$disabled = get_theme_mod( 'notification_disable', false );
	if( ! $disabled ) {
		add_action( 'admin_head', 'businessx_updater_check_update' );
		add_action( 'wp_ajax_businessx_updater', 'businessx_updater_ajax' );
	}
}
add_action( 'admin_init', 'businessx_updater_init' );