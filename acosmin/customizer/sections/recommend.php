<?php
/* ---------------------------------------- */
/*  Businessx Extensions Installer Notice
/* ---------------------------------------- */

if ( ! businessx_check_exts_state() ) :
	if ( businessx_installer_sec_callback() ) :
	$wp_customize->add_section( new Businessx_Installer_Section( $wp_customize, 'bxext-installer', array(
		'title'     => esc_html_x( 'Recommended Plugin:', 'Customizer Extensions Installer', 'businessx' ),
		'plugin'    => esc_html_x( 'Businessx Extensions', 'Customizer Extensions Installer', 'businessx' ),
		'notice'    => array(
							'p1' => esc_html_x( 'If you want to take full advantage of all the options this theme has to offer', 'Customizer Extensions Installer', 'businessx' ),
							'p2' => esc_html_x( 'please install and activate', 'Customizer Extensions Installer', 'businessx' ),
						),
		'docs'      => array(
							'url'  => esc_url( BUSINESSX_AC_DOCS_URL . '#h10' ),
							'text' => esc_html_x( '(Front Page sections)', 'Customizer Extensions Installer', 'businessx' ),
						),
		'install'   => array(
							'slug' => 'businessx-extensions',
							'aria' => esc_attr_x( 'Install Businessx Extensions Now', 'Customizer Extensions Installer', 'businessx' ),
							'name' => esc_attr_x( 'Businessx Extensions', 'Customizer Extensions Installer', 'businessx' ),
							'text' => esc_attr_x( 'Install Now', 'Customizer Extensions Installer', 'businessx' ),
						),
		'dismiss'   => array(
							'id'   => 'bx-dismiss-rec-plugin',
							'aria' => esc_attr_x( 'Dismiss Installer Message', 'Customizer Extensions Installer', 'businessx' ),
							'text' => esc_attr_x( 'Dismiss', 'Customizer Extensions Installer', 'businessx' ),
						),
		'active'    => array(
							'check' => (bool) businessx_check_exts_installed(),
							'msg'   => esc_attr_x( 'The plugin is installed but not activated.', 'Customizer Extensions Installer', 'businessx' ),
							'url'   => esc_url( admin_url( 'plugins.php' ) ),
							'btn'   => esc_attr_x( 'Activate Plugin', 'Customizer Extensions Installer', 'businessx' ),
						),
		'priority'  => 0
	) ) );
	endif;
endif;
