<?php
/**
 * Controllers
 * ------
 * These are function wrappers for Customzier's add_setting & add_control
 * Some of these functions are used by Businessx Extensions
 * ------
 */


/*  Button controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_button' ) ) {
	function businessx_controller_button( $setting_id, $section_id, $label = '', $description = '', $href = '', $css_class = '' ) {
		global $wp_customize;
		$wp_customize->add_setting( $setting_id, array(
	    	'default'			=> '',
			'sanitize_callback' => 'sanitize_text_field',
	    	'capability'		=> 'edit_theme_options',
		) );
		$wp_customize->add_control( new Businessx_Control_Button( $wp_customize, $setting_id, array(
			'label'    			=> $label,
			'description' 		=> $description,
			'settings' 			=> $setting_id,
			'section'  			=> $section_id,
			'type'     			=> 'button-control',
			'href'				=> $href,
			'css_class'			=> $css_class,
		) ) );
	}
}


/*  Info controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_info' ) ) {
	function businessx_controller_info( $setting_id, $section_id, $label = '', $description = '', $info_type = '', $css_class = '', $html = '' ) {
		global $wp_customize;
		$wp_customize->add_setting( $setting_id, array(
	    	'default'			=> '',
			'sanitize_callback'	=> 'sanitize_text_field',
	    	'capability'		=> 'edit_theme_options',
		) );
		$wp_customize->add_control( new Businessx_Control_Info( $wp_customize, $setting_id, array(
			'label'    			=> $label,
			'description' 		=> $description,
			'settings' 			=> $setting_id,
			'section'  			=> $section_id,
			'type'     			=> 'info-control',
			'info_type'			=> $info_type,
			'css_class'			=> $css_class,
			'html'				=> $html
		) ) );
	}
}


/*  Text controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_txt' ) ) {
	function businessx_controller_txt( $setting_id, $section_id, $label = '', $description = '', $default = '', $selector = '', $transport = true, $selective = true, $sanitize = 'sanitize_text_field', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'default'			=> $default,
			'sanitize_callback' => $sanitize,
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport_type,
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'				=> $label,
			'description'		=> $description,
			'section'			=> $section_id,
			'settings'			=> $setting_id,
			'priority'			=> intval( $priority ),
		) );
		if( $transport && $selective ) {
			$wp_customize->selective_refresh->add_partial( $setting_id, array(
				'selector' => $selector,
				'render_callback' => function() use ( &$setting_id ) {
					return get_theme_mod( $setting_id );
				},
			) );
		}
	}
}


/*  Text Area controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_txt_area' ) ) {
	function businessx_controller_txt_area( $setting_id, $section_id, $label = '', $description = '', $default = '', $selector = '', $transport = true, $sanitize = 'sanitize_text_field', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'default'			=> $default,
			'sanitize_callback' => $sanitize,
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport_type,
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'				=> $label,
			'description'		=> $description,
			'section'			=> $section_id,
			'settings'			=> $setting_id,
			'type'     			=> 'textarea',
			'priority'			=> intval( $priority ),
		) );
		if( $transport ) {
			$wp_customize->selective_refresh->add_partial( $setting_id, array(
				'selector' => $selector,
				'render_callback' => function() use ( &$setting_id ) {
					return get_theme_mod( $setting_id );
				},
			) );
		}
	}
}


/*  Checkbox controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_checkbox' ) ) {
	function businessx_controller_checkbox( $setting_id, $section_id, $label = '', $description = '', $default = false, $transport = false, $sanitize = 'businessx_sanitize_checkbox', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'sanitize_callback' => $sanitize,
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_filter', $default ),
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport_type,
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'    		=> $label,
			'description'	=> $description,
			'section'  		=> $section_id,
			'settings' 		=> $setting_id,
			'type'     		=> 'checkbox',
			'priority'		=> intval( $priority ),
		));
	}
}


/*  Select controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_select' ) ) {
	function businessx_controller_select( $setting_id, $section_id, $choices = array(), $label = '', $description = '', $default = '', $transport = false, $sanitize = 'businessx_sanitize_select', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'sanitize_callback' => $sanitize,
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_filter', $default ),
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport_type,
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'    		=> $label,
			'description'	=> $description,
			'section'  		=> $section_id,
			'settings' 		=> $setting_id,
			'type'			=> 'select',
			'width'			=> '100',
			'choices'		=> $choices,
			'priority'		=> intval( $priority ),
		));
	}
}


/*  Color Picker controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_color_picker' ) ) {
	function businessx_controller_color_picker( $setting_id, $section_id, $label = '', $description = '', $default = '', $transport = true, $sanitize = 'sanitize_hex_color', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_filter', $default ),
			'sanitize_callback' => $sanitize,
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport_type,
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $setting_id, array(
			'label'				=> $label,
			'description'		=> $description,
			'section'			=> $section_id,
			'settings'			=> $setting_id,
			'priority'			=> intval( $priority ),
		) ) );
	}
}


/*  RGBA Picker controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_rgba_picker' ) ) {
	function businessx_controller_rgba_picker( $setting_id, $section_id, $label = '', $description = '', $default = '', $transport = true, $show_opacity = true, $palette = array(), $sanitize = 'businessx_sanitize_rgba', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'sanitize_callback' => $sanitize,
			'default'     		=> $default,
			'capability'  		=> 'edit_theme_options',
			'transport'   		=> $transport
		) );
		$wp_customize->add_control( new Businessx_Control_RGBA( $wp_customize, $setting_id, array(
			'label'         	=> $label,
			'description'		=> $description,
			'section'       	=> $section_id,
			'settings'      	=> $setting_id,
			'show_opacity'  	=> $show_opacity,
			'palette'   		=> $palette,
			'priority'			=> intval( $priority ),
		) ) );
	}
}


/*  Simple Opacity controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_simple_opacity' ) ) {
	function businessx_controller_simple_opacity( $setting_id, $section_id, $label = '', $description = '', $default = '0.5', $transport = true, $sanitize = 'businessx_sanitize_select' ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'sanitize_callback' => $sanitize,
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_opacity_filter', $default ),
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport,
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'				=> $label,
			'section'    		=> $section_id,
			'settings'   		=> $setting_id,
			'description'		=> $description,
			'type'       		=> 'select',
			'width'				=> '100',
			'choices'			=> businessx_opacity_options()
		) );
	}
}


/*  Simple Image controller
/* ------------------------------------ */
if ( ! function_exists( 'businessx_controller_simple_image' ) ) {
	function businessx_controller_simple_image( $setting_id, $section_id, $label = '', $description = '', $default = '', $transport = true, $sanitize = 'esc_url_raw', $priority = 10 ) {
		global $wp_customize;
		if( $transport ) { $transport_type = 'postMessage'; } else { $transport_type = 'refresh'; }

		$wp_customize->add_setting( $setting_id, array(
			'default'			=> $default,
			'sanitize_callback' => $sanitize,
			'capability'		=> 'edit_theme_options',
			'transport'         => $transport_type,
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $setting_id, array(
			'label'				=> $label,
			'description'		=> $description,
			'section'			=> $section_id,
			'settings'			=> $setting_id,
			'priority'			=> intval( $priority ),
		) ) );
	}
}


/*  Background controllers
/* ------------------------------------ */

// Background image
if ( ! function_exists( 'businessx_controller_bg_image' ) ) {
	function businessx_controller_bg_image( $setting_id, $section_id, $label = '', $default = '', $description = '' ) {
		global $wp_customize;
		$new_options = array();
		$new_options_global = array();

		// Image
		$wp_customize->add_setting( $setting_id, array(
	    	'default'			=> $default,
			'sanitize_callback' => 'esc_url_raw',
	    	'capability'		=> 'edit_theme_options',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $setting_id, array(
	    	'label'				=> $label,
			'description'		=> $description,
	    	'section'			=> $section_id,
	    	'settings'			=> $setting_id,
		) ) );

		// Background size
		$wp_customize->add_setting( $setting_id . '_size', array(
			'sanitize_callback' => 'businessx_sanitize_select',
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_size_filter', 'cover' ),
			'capability'		=> 'edit_theme_options',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( $setting_id . '_size', array(
			'label'				=> __( 'Background-size:', 'businessx' ),
			'section'    		=> $section_id,
			'settings'   		=> $setting_id . '_size',
			'type'       		=> 'select',
			'choices'			=> businessx_bg_options_size()
		) );

		// Background repeat
		$wp_customize->add_setting( $setting_id . '_repeat', array(
			'sanitize_callback' => 'businessx_sanitize_select',
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_repeat_filter', 'no-repeat' ),
			'capability'		=> 'edit_theme_options',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( $setting_id . '_repeat', array(
			'label'				=> __( 'Background-repeat:', 'businessx' ),
			'section'    		=> $section_id,
			'settings'   		=> $setting_id . '_repeat',
			'type'       		=> 'select',
			'choices'			=> businessx_bg_options_repeat()
		) );

		// Background position
		$wp_customize->add_setting( $setting_id . '_position', array(
			'sanitize_callback' => 'businessx_sanitize_select',
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_position_filter', 'center center' ),
			'capability'		=> 'edit_theme_options',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( $setting_id . '_position', array(
			'label'				=> __( 'Background-position:', 'businessx' ),
			'section'    		=> $section_id,
			'settings'   		=> $setting_id . '_position',
			'type'       		=> 'select',
			'choices'			=> businessx_bg_options_position()
		) );
	}
}

// Overlay
if ( ! function_exists( 'businessx_controller_bg_overlay' ) ) {
	function businessx_controller_bg_overlay( $setting_id, $section_id, $label = '', $default = false ) {
		global $wp_customize;

		$wp_customize->add_setting( $setting_id, array(
			'sanitize_callback' => 'businessx_sanitize_checkbox',
			'default'			=> $default,
			'capability'		=> 'edit_theme_options',
			'transport'         => 'postMessage',
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'    => $label,
			'section'  => $section_id,
			'type'     => 'checkbox',
			'settings' => $setting_id,
		)); /*=====*/

		$wp_customize->add_setting( $setting_id . '_color', array(
				'default'			=> apply_filters( 'businessx_' . $setting_id .'_color_filter', '#000000' ),
				'sanitize_callback' => 'sanitize_hex_color',
				'capability'		=> 'edit_theme_options',
				'transport'         => 'postMessage',
			) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, $setting_id . '_color', array(
			'label'				=> __( 'Overlay background color:', 'businessx' ),
			'section'			=> $section_id,
			'settings'			=> $setting_id . '_color',
		) ) ); /*=====*/

		$wp_customize->add_setting( $setting_id . '_opacity', array(
			'default'			=> apply_filters( 'businessx_' . $setting_id . '_opacity_filter', '0.5' ),
			'capability'		=> 'edit_theme_options',
			'transport'         => 'postMessage',
			'sanitize_callback' => 'businessx_sanitize_select',
		) );
		$wp_customize->add_control( $setting_id . '_opacity', array(
			'label'				=> __( 'Background overlay opacity:', 'businessx' ),
			'section'    		=> $section_id,
			'settings'   		=> $setting_id . '_opacity',
			'type'       		=> 'select',
			'width'				=> '100',
			'choices'			=> apply_filters( 'businessx_' . $setting_id . '_opacity_select_filter', array(
										'0' 			=> esc_html__( 'Transparent', 'businessx' ),
										'0.1'			=> esc_html__( '10%', 'businessx' ),
										'0.2'			=> esc_html__( '20%', 'businessx' ),
										'0.3' 			=> esc_html__( '30%', 'businessx' ),
										'0.4' 			=> esc_html__( '40%', 'businessx' ),
										'0.5' 			=> esc_html__( '50%', 'businessx' ),
										'0.6' 			=> esc_html__( '60%', 'businessx' ),
										'0.7' 			=> esc_html__( '70%', 'businessx' ),
										'0.8' 			=> esc_html__( '80%', 'businessx' ),
										'0.9' 			=> esc_html__( '90%', 'businessx' ),
										'1' 			=> esc_html__( '100%', 'businessx' ),
		) ) ) );
	}
}

// Parallax
if ( ! function_exists( 'businessx_controller_bg_parallax' ) ) {
	function businessx_controller_bg_parallax( $setting_id, $section_id, $label = '', $description = '', $default = false ) {
		global $wp_customize;

		$wp_customize->add_setting( $setting_id, array(
			'sanitize_callback' => 'businessx_sanitize_checkbox',
			'default'			=> $default,
			'capability'		=> 'edit_theme_options',
		) );
		$wp_customize->add_control( $setting_id, array(
			'label'    		=> $label,
			'description' 	=> $description,
			'section'  		=> $section_id,
			'type'     		=> 'checkbox',
			'settings' 		=> $setting_id,
		)); /*=====*/

	}
}
