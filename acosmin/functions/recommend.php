<?php
/* ------------------------------------------------------------------------- *
 *
 *  Recommend Businessx Extensions plugin (added dismiss button)
 *  Dismissable with one click, never shows the message again.
 *  ________________
 *
 *  Based on Kirki's recommending function:
 *  https://gist.github.com/aristath/a42f51db02b9c1d22794
 *
 *  ________________
 *
/* ------------------------------------------------------------------------- */


if ( ! function_exists( 'businessx_check_exts_state' ) ) {
    function businessx_check_exts_state() {
        /**
    	 * Check if Businessx Extensions plugin exists
    	 */
        if( function_exists( 'businessx_extensions_sections' ) ) {
            return true;
        } else {
            return false;
        }
    }
}

if ( class_exists( 'WP_Customize_Section' ) && ! class_exists( 'Businessx_Installer_Control' ) ) {
	/**
	 * A simple control that will render the install button,
	 * what we're installing and a dismiss notice button
	 */
	class Businessx_Installer_Control extends WP_Customize_Control {
		public $type = 'businessx-installer';
		public function render_content() { ?>
			<style>
			li#accordion-section-businessx_installer {
				background: #f3f3f3;
				margin: -15px 0;
			}
			li#accordion-section-businessx_installer .accordion-section-title,
			li#accordion-section-businessx_installer .customize-section-title {
				display: none;
			}
			li#accordion-section-businessx_installer ul.accordion-section-content {
				display: block;
				position: relative;
				left: 0;
				margin-top: 0 !important;
				padding-top: 0;
				padding-bottom: 0;
			}
			#customize-controls li#accordion-section-businessx_installer .description {
				font-size: 1em;
			}
			#customize-control-businessx_installer {
				margin-bottom: 0;
			}
			iframe#businessx-customizer-installer {
				margin-left: -15px;
				height: 158px;
			}
			</style>
			<?php
                $plugins   = get_plugins();
			    $installed = false;
            ?>
            <?php if ( ! businessx_check_exts_state() ) : ?>
    			<?php foreach ( $plugins as $plugin ) : ?>
    				<?php if ( 'Businessx Extensions' == $plugin['Name'] ) : ?>
    					<?php $installed = true; ?>
    				<?php endif; ?>
    			<?php endforeach; ?>

    			<?php if ( ! $installed ) :
                    $plugin_slug = 'businessx-extensions';
                    $plugin_install_url = add_query_arg(
                        array(
                            'action' => 'install-plugin',
                            'plugin' => $plugin_slug,
                        ),
                        self_admin_url( 'update.php' )
                    );
                    $nonce_key = 'install-plugin_' . $plugin_slug;
                    $plugin_install_url = wp_nonce_url( $plugin_install_url, $nonce_key );
                ?>
                <a class="install-now button-primary button" data-slug="businessx-extensions" href="<?php echo esc_url( $plugin_install_url ); ?>" aria-label="<?php esc_attr_e( 'Install Businessx Extensions Now', 'businessx' ); ?>" data-name="<?php esc_attr_e( 'Businessx Extensions', 'businessx' ); ?>"><?php esc_html_e( 'Install Now', 'businessx' ); ?></a>
                <a href="#" id="bx-dismiss-rec-plugin" class="button-secondary button" aria-label="<?php esc_attr_e( 'Dismiss Installer Message', 'businessx' ); ?>"><?php _e('Dismiss Notice', 'businessx' ) ?></a>

                <br/></br>
    			<?php else : ?>
    				<hr>
    				<p><?php printf( __( 'The plugin is installed but not activated. Please <a href="%s"><b>activate it</b></a>.', 'businessx' ), admin_url( 'plugins.php' ) ); ?></p>
                    <a href="#" id="bx-dismiss-rec-plugin" class="button-secondary button"><?php _e('Dismiss Notice', 'businessx' ) ?></a>

                    <br/><br/>
    			<?php endif; ?>
            <?php endif;
		}
	}

}

if ( ! function_exists( 'businessx_installer_sec_callback' ) ) {
    /**
     * Hide or show installer - section active_callback
     */
    function businessx_installer_sec_callback() {
        $notice = get_theme_mod( 'dismiss_ext_notice', false );
        return ( $notice ? false : true );
    }
}

if ( ! function_exists( 'businessx_dismiss_ext_action' ) ) {
    /**
     * Sets a theme mod to remember if the user selected to dismiss the
     * installer message.
     */
    function businessx_dismiss_ext_action() {
        // Check nonce
        if( ! isset( $_POST[ 'businessx_dismiss_ext_nonce' ] ) || ! wp_verify_nonce( $_POST[ 'businessx_dismiss_ext_nonce' ], 'businessx_dismiss_ext_nonce' ) )
            die( esc_html__( 'Permission denied', 'businessx' ) );

        // Add theme mod - true or false
        if( current_user_can( 'edit_theme_options' ) ) {
            set_theme_mod( 'dismiss_ext_notice', true );
        }
        die();
    }
    add_action( 'wp_ajax_businessx_dismiss_ext', 'businessx_dismiss_ext_action' );
    add_action( 'wp_ajax_nopriv_businessx_dismiss_ext', 'businessx_dismiss_ext_action' );
}

if ( ! function_exists( 'businessx_installer_register' ) ) {
    /**
     * Registers the section, setting & control for the businessx installer.
     */
    function businessx_installer_register( $wp_customize ) {
    	// Add the section
    	if ( ! businessx_check_exts_state() ) {
    		$wp_customize->add_section( 'businessx_installer', array(
    			'title'       => '',
    			'description' => __( 'If you want to take full advantage of the options this theme has to provide <b><em>(Front Page sections)</em></b>, please install and activate the <b><em>Businessx Extensions</em></b> plugin.', 'businessx' ),
    			'priority'    => -10,
                'active_callback' => 'businessx_installer_sec_callback',
    			'capability'  => 'install_plugins',
    		) );
    		// Add the setting. This is required by WordPress in order to add our control.
    		$wp_customize->add_setting( 'businessx_installer', array(
    			'type'              => 'theme_mod',
    			'capability'        => 'install_plugins',
    			'default'           => '',
    			'sanitize_callback' => '__return_true',
    		));
    		// Add our control. This is required in order to show the section.
    		$wp_customize->add_control( new Businessx_Installer_Control( $wp_customize, 'businessx_installer', array(
    			'section' => 'businessx_installer',
    		) ) );
        }
    }
    add_action( 'customize_register', 'businessx_installer_register' );
}
