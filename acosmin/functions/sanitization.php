<?php
/* ------------------------------------------------------------------------- *
 *  Sanitization
 *  ________________
 *
 *	Functions used to sanitize theme mods and options
 *	________________
 *
/* ------------------------------------------------------------------------- */

// Checkbox
if ( ! function_exists( 'businessx_sanitize_checkbox' ) ) {
	function businessx_sanitize_checkbox( $input ) {
		if ( $input == 1 ) { return 1; } else { return 0; }
	}
}

// Select
// for Customizer select options
// and non Customizer options
if ( ! function_exists( 'businessx_sanitize_select' ) ) {
	function businessx_sanitize_select( $input, $setting, $new_default = '', $incustomizer = true ) {
		global $wp_customize;
	 	
		if( $incustomizer ) {
			$control = $wp_customize->get_control( $setting->id );
		 
			if ( array_key_exists( $input, $control->choices ) ) {
				return $input;
			} else {
				return $setting->default;
			}
		} else {
			$choices = (array) $setting;
			
			if ( in_array( $input, $choices, true ) ) {
				return $input;
			} else {
				return $new_default;
			}
		}
	}
}

// Sanitize HEX color
// if we can't use sanitize_hex_color()
if ( ! function_exists( 'businessx_sanitize_hex' ) ) {
	function businessx_sanitize_hex( $color ) {
		if ( '' === $color )
			return '';
	 
		// 3 or 6 hex digits, or the empty string.
		if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) )
			return $color;
	}
}

// Sanitize RGBA color
if ( ! function_exists( 'businessx_sanitize_rgba' ) ) {
	function businessx_sanitize_rgba( $color ) {
		// If empty or an array return transparent
		if ( empty( $color ) || is_array( $color ) ) {
			return 'rgba(0,0,0,0)';
		}
		// If string does not start with 'rgba', then treat as hex
		// sanitize the hex color and finally convert hex to rgba
		if ( false === strpos( $color, 'rgba' ) ) {
			return businessx_sanitize_hex( $color );
		} else {
			// By now we know the string is formatted as an rgba color so we need to further sanitize it.
			$color = str_replace( ' ', '', $color );
			sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
			return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
		}
	}
}

//  Sanitize CSS output
if ( ! function_exists( 'businessx_sanitize_css' ) ) {
	function businessx_sanitize_css( $custom_css, $format = TRUE ) {
		if ( '' === $custom_css )
			return '';
			
		if( $format ) {
			return preg_replace('/\s\s+/', ' ', wp_strip_all_tags( $custom_css ) ); } 
		else {
			return esc_html( $custom_css ); }
	}
}

// Output content and filter HTML
if ( ! function_exists( 'businessx_content_filter' ) ) {
	function businessx_content_filter( $content = '', $allowed_tags = array(), $echo = FALSE ) {	
		if( $echo ) {
			echo wp_kses( $content, $allowed_tags ); } 
		else {
			return wp_kses( $content, $allowed_tags ); }
	}
}

// Sanitize an array with a sanitization function
if ( ! function_exists( 'businessx_sanitize_array_map' ) ) {
	function businessx_sanitize_array_map( $sanitize_function, $the_array ) {
		$newArr = array();
	
		foreach( $the_array as $key => $value ) :
			$newArr[ $key ] = ( is_array( $value ) ? businessx_sanitize_array_map( $sanitize_function, $value ) : 
				( is_array( $sanitize_function ) ? call_user_func_array( $sanitize_function, $value ) : 
					$sanitize_function( $value ) ) ); 
		endforeach;
	
		return $newArr;
	}
}