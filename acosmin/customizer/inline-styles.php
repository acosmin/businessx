<?php
/* -------------------------------------- */
/*  CSS Inline Styles
/* -------------------------------------- */


/*  Generate CSS styles
/* ------------------------------------ */
if ( ! function_exists( 'businessx_gcs' ) ) {
	function businessx_gcs( $selector, $style, $mod_name, $prefix = '', $postfix = '', $type2mod = ''  ) {
		$return = '';

		if( $type2mod != '' ) {
			$mod = $type2mod;
		} else {
			$mod = get_theme_mod( $mod_name );
		}

		if ( ! empty( $mod ) ) {

			$return = sprintf( '%s{%s:%s;}',
				$selector,
				$style,
				$prefix . $mod . $postfix
			);

			return $return;

		}
	}
}


/*  Check if option is not changed
/*	or default
/* ------------------------------------ */
if ( ! function_exists( 'businessx_cd' ) ) {
	function businessx_cd( $mod_name, $default ) {
		$mod = get_theme_mod( $mod_name );
		if ( $mod != $default || $mod == '' )	{
			return true;
		}
	}
}


/*  Generate inline syles
/* ------------------------------------ */
if ( ! function_exists( 'businessx_final_inline_css' ) ) {
	function businessx_final_inline_css() {
		global $businessx_customizer_settings;
		$css = '';

		if( ! empty( $businessx_customizer_settings ) ) {
			foreach ( $businessx_customizer_settings as $bcs => $bcs_value ) {
				${"$bcs"} = apply_filters( 'businessx_' . $bcs . '_filter', $bcs_value );
			}
		}

		/* Settings - Site Identity */
		if( businessx_cd( 'sticky_logo_height', $sticky_logo_height ) ) {
			$css .= businessx_gcs( 'body.sticky-logo .mh-moving .logo-wrap img', 'max-height', 'sticky_logo_height' ); }

		/* Colors - Body */
		if( businessx_cd( 'colors_body_background', $colors_body_background ) ) {
			$css .= businessx_gcs( 'body, .comment-reply-title, .woocommerce div.product .woocommerce-tabs ul.tabs li.active', 'background-color', 'colors_body_background' );
			$css .= businessx_gcs( '.comment-reply-title:after', 'border-bottom-color', 'colors_body_background' );
			$css .= businessx_gcs( '.woocommerce div.product .woocommerce-tabs ul.tabs li.active', 'border-bottom-color', 'colors_body_background' );
			$css .= businessx_gcs( '.woocommerce .widget_price_filter .ui-slider .ui-slider-handle', 'box-shadow', 'colors_body_background', '0 0 0 2px' );}

		if( businessx_cd( 'colors_body_font', $colors_body_font ) ) {
			$css .= businessx_gcs( 'body', 'color', 'colors_body_font' ); }

		if( businessx_cd( 'colors_body_border', $colors_body_border ) ) {
			$css .= businessx_gcs( 'blockquote, pre, abbr, acronym, table, th, td, fieldset, .tagcloud a, .post-index.sticky, .comments-title, .comment, .pingback, .comment-reply-title, .tags-display, .posts-pagination .paging-wrap,.woocommerce div.product form.cart .variations,
			.woocommerce nav.woocommerce-pagination ul, .woocommerce div.product .woocommerce-tabs ul.tabs:before, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce table.shop_table, #add_payment_method .cart-collaterals .cart_totals table td, #add_payment_method .cart-collaterals .cart_totals table th, .woocommerce-cart .cart-collaterals .cart_totals table td, .woocommerce-cart .cart-collaterals .cart_totals table th, .woocommerce-checkout .cart-collaterals .cart_totals table td, .woocommerce-checkout .cart-collaterals .cart_totals table th, #add_payment_method #payment ul.payment_methods, .woocommerce-cart #payment ul.payment_methods, .woocommerce-checkout #payment ul.payment_methods, .woocommerce-checkout-payment, .woocommerce-MyAccount-navigation ul, .woocommerce form.checkout_coupon, .woocommerce form.login, .woocommerce form.register', 'border-color', 'colors_body_border' );
			$css .= businessx_gcs( '.comment-reply-title:before', 'border-bottom-color', 'colors_body_border' );
			$css .= businessx_gcs( '.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content', 'background-color', 'colors_body_border' ); }

		if( businessx_cd( 'colors_body_999', $colors_body_999 ) ) {
			$css .= businessx_gcs( 'blockquote cite, blockquote small, .wp-caption .wp-caption-text, .gallery-caption, .comment-notes, .logged-in-as, .form-allowed-tags, .woocommerce .star-rating:before', 'color', 'colors_body_999' ); }

		/* Colors - Links */
		if( businessx_cd( 'colors_links_default', $colors_links_default ) ) {
			$css .= businessx_gcs( 'a', 'color', 'colors_links_default' ); }

		if( businessx_cd( 'colors_links_other', $colors_links_other ) ) {
			$css .= businessx_gcs( 'a:hover, a:focus, a:active,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current, .woocommerce div.product .woocommerce-tabs ul.tabs li a, .woocommerce-MyAccount-navigation li.is-active a ', 'color', 'colors_links_other' ); }

		/* Colors - Headings */
		if( businessx_cd( 'colors_headings_base', $colors_headings_base ) ) {
			$css .= businessx_gcs( 'h1, h2, h3, h4, h5, h6', 'color', 'colors_headings_base' ); }

		if( businessx_cd( 'colors_headings_default', $colors_headings_default ) ) {
			$css .= businessx_gcs( 'h1 a, h2 a, h3 a, h4 a, h5 a, h6 a', 'color', 'colors_headings_default' ); }

		if( businessx_cd( 'colors_headings_other', $colors_headings_other ) ) {
			$css .= businessx_gcs(
				'h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, h1 a:focus, h2 a:focus, h3 a:focus, h4 a:focus, h5 a:focus, h6 a:focus, h1 a:active, h2 a:active, h3 a:active, h4 a:active, h5 a:active, h6 a:active, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,  .woocommerce div.product .woocommerce-tabs ul.tabs li a:focus, .woocommerce div.product .woocommerce-tabs ul.tabs li a:active, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a',
				'color', 'colors_headings_other' ); }

		/* Colors - Inputs */
		if( businessx_cd( 'colors_inputs_placeholder', $colors_inputs_placeholder ) ) {
			$css .= businessx_gcs( '::-webkit-input-placeholder', 'color', 'colors_inputs_placeholder' );
			$css .= businessx_gcs( ':-moz-placeholder', 'color', 'colors_inputs_placeholder' );
			$css .= businessx_gcs( '::-moz-placeholder', 'color', 'colors_inputs_placeholder' );
			$css .= businessx_gcs( ':-ms-input-placeholder', 'color', 'colors_inputs_placeholder' ); }

		if( businessx_cd( 'colors_inputs_border_bottom', $colors_inputs_border_bottom ) ) {
			$css .= businessx_gcs( 'input[type=text], input[type=search], input[type=radio], input[type=tel], input[type=time], input[type=url], input[type=week], input[type=password], input[type=checkbox], input[type=color], input[type=date], input[type=datetime], input[type=datetime-local], input[type=email], input[type=month], input[type=number], select, textarea, #add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text', 'border-color', 'colors_inputs_border_bottom' ); }

		if( businessx_cd( 'colors_inputs_background', $colors_inputs_background ) ) {
			$css .= businessx_gcs( 'input[type=text], input[type=search], input[type=radio], input[type=tel], input[type=time], input[type=url], input[type=week], input[type=password], input[type=checkbox], input[type=color], input[type=date], input[type=datetime], input[type=datetime-local], input[type=email], input[type=month], input[type=number], select, textarea, #add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text', 'background-color', 'colors_inputs_background' ); }

		if( businessx_cd( 'colors_inputs_color', $colors_inputs_color ) ) {
			$css .= businessx_gcs( 'input[type=text], input[type=search], input[type=radio], input[type=tel], input[type=time], input[type=url], input[type=week], input[type=password], input[type=checkbox], input[type=color], input[type=date], input[type=datetime], input[type=datetime-local], input[type=email], input[type=month], input[type=number], select, textarea, #add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text', 'color', 'colors_inputs_color' );
			$css .= businessx_gcs( 'input[type=radio]:checked:before', 'background-color', 'colors_inputs_color' ); }

		if( businessx_cd( 'colors_inputs_f_border_bottom', $colors_inputs_f_border_bottom ) ) {
			$css .= businessx_gcs( 'input[type=text]:focus, input[type=search]:focus, input[type=radio]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, select:focus, textarea:focus, #add_payment_method table.cart td.actions .coupon .input-text:focus, .woocommerce-cart table.cart td.actions .coupon .input-text:focus, .woocommerce-checkout table.cart td.actions .coupon .input-text:focus', 'border-color', 'colors_inputs_f_border_bottom' ); }

		if( businessx_cd( 'colors_inputs_f_background', $colors_inputs_f_background ) ) {
			$css .= businessx_gcs( 'input[type=text]:focus, input[type=search]:focus, input[type=radio]:focus, input[type=tel]:focus, input[type=time]:focus, input[type=url]:focus, input[type=week]:focus, input[type=password]:focus, input[type=checkbox]:focus, input[type=color]:focus, input[type=date]:focus, input[type=datetime]:focus, input[type=datetime-local]:focus, input[type=email]:focus, input[type=month]:focus, input[type=number]:focus, select:focus, textarea:focus, #add_payment_method table.cart td.actions .coupon .input-text:focus, .woocommerce-cart table.cart td.actions .coupon .input-text:focus, .woocommerce-checkout table.cart td.actions .coupon .input-text:focus', 'background-color', 'colors_inputs_f_background' ); }

		/* Colors - Default Button */
		if( businessx_cd( 'colors_btn_def_default', $colors_btn_def_default ) ) {
			$css .= businessx_gcs( '.ac-btn, input[type=submit], input[type=reset], input[type=button], button, .woocommerce a.button,  .woocommerce button.button, .woocommerce input.button, .woocommerce input[type=submit].button, .woocommerce #respond input#submit, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt', 'background-color', 'colors_btn_def_default' ); }

		if( businessx_cd( 'colors_btn_def_hover', $colors_btn_def_hover ) ) {
			$css .= businessx_gcs( '.ac-btn:hover, input[type=submit]:hover, input[type=reset]:hover, input[type=button]:hover, button:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce input[type=submit].button:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce #respond input#submit:disabled[disabled], .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce a.button:disabled[disabled], .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled],
			.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover', 'background-color', 'colors_btn_def_hover' ); }

		if( businessx_cd( 'colors_btn_def_other', $colors_btn_def_other ) ) {
			$css .= businessx_gcs( '.ac-btn:focus, input[type=submit]:focus, input[type=reset]:focus, input[type=button]:focus, button:focus, .ac-btn:active, input[type=submit]:active, input[type=reset]:active, input[type=button]:focus, button:active, .woocommerce a.button:focus,
			.woocommerce button.button:focus, .woocommerce input.button:focus, .woocommerce input[type=submit].button:focus, .woocommerce #respond input#submit:focus, .woocommerce a.button.alt:focus, .woocommerce button.button.alt:focus, .woocommerce input.button.alt:focus, .woocommerce #respond input#submit.alt:focus, .ac-btn:active, input[type=submit]:active, input[type=reset]:active, input[type=button]:focus, button:active, .woocommerce a.button:active, .woocommerce button.button:active, .woocommerce input.button:active, .woocommerce input[type=submit].button:active, .woocommerce #respond input#submit:active, .woocommerce a.button.alt:active, .woocommerce button.button.alt:active, .woocommerce input.button.alt:active, .woocommerce #respond input#submit.alt:active', 'background-color', 'colors_btn_def_other' ); }

		/* Colors - Opaque Button */
		if( businessx_cd( 'colors_btn_opq_default', $colors_btn_opq_default ) ) {
			$css .= businessx_gcs( '.ac-btn.btn-opaque', 'background-color', 'colors_btn_opq_default' ); }

		if( businessx_cd( 'colors_btn_opq_border', $colors_btn_opq_border ) ) {
			$css .= businessx_gcs( '.ac-btn.btn-opaque', 'box-shadow', 'colors_btn_opq_border', 'inset 0 0 0 3px' ); }

		if( businessx_cd( 'colors_btn_opq_default_2x', $colors_btn_opq_default_2x ) ) {
			$css .= businessx_gcs( '.ac-btn.btn-opaque.opq-x2', 'background-color', 'colors_btn_opq_default_2x' ); }

		if( businessx_cd( 'colors_btn_opq_hover', $colors_btn_opq_hover ) ) {
			$css .= businessx_gcs( '.ac-btn.btn-opaque:hover', 'background-color', 'colors_btn_opq_hover' ); }

		if( businessx_cd( 'colors_btn_opq_other', $colors_btn_opq_other ) ) {
			$css .= businessx_gcs( '.ac-btn.btn-opaque:focus, .ac-btn.btn-opaque:active', 'background-color', 'colors_btn_opq_other' ); }

		/* Colors - Alternative Button */
		if( businessx_cd( 'colors_btn_alt_default', $colors_btn_alt_default ) ) {
			$css .= businessx_gcs( '.ac-btn-alt, .comment-reply-link, .actions-menu a', 'color', 'colors_btn_alt_default' ); }

		if( businessx_cd( 'colors_btn_alt_border', $colors_btn_alt_border ) ) {
			$css .= businessx_gcs( '.ac-btn-alt, .comment-reply-link, .actions-menu a', 'border-color', 'colors_btn_alt_border' ); }

		if( businessx_cd( 'colors_btn_alt_other', $colors_btn_alt_other ) ) {
			$css .= businessx_gcs( '.ac-btn-alt:hover, .comment-reply-link:hover, .actions-menu a:hover, .ac-btn-alt:focus, .comment-reply-link:focus, .actions-menu a:focus, .ac-btn-alt:active, .comment-reply-link:active, .actions-menu a:active', 'color', 'colors_btn_alt_other' ); }

		if( businessx_cd( 'colors_btn_alt_border_hover', $colors_btn_alt_border_hover ) ) {
			$css .= businessx_gcs( '.ac-btn-alt:hover:after, .comment-reply-link:hover:after, .actions-menu a:hover:after', 'border-color', 'colors_btn_alt_border_hover' ); }

		/* Colors Transparent Header */
		if( businessx_cd( 'colors_header_transparent_text', $colors_header_transparent_text ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent', 'color', 'colors_header_transparent_text' ); }

		if( businessx_cd( 'colors_header_transparent_links', $colors_header_transparent_links ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent a, .main-header.mh-transparent a i, .main-header.mh-transparent a:hover, .main-header.mh-transparent a:hover i, .main-header.mh-transparent a:focus, .main-header.mh-transparent a:focus i, .main-header.mh-transparent a:active, .main-header.mh-transparent a:active i', 'color', 'colors_header_transparent_links', '', ' !important' ); }

		if( businessx_cd( 'colors_header_transparent_opacity', $colors_header_transparent_opacity ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent .main-menu li a', 'opacity', 'colors_header_transparent_opacity' ); }

		if( businessx_cd( 'colors_header_transparent_2nd', $colors_header_transparent_2nd ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent .main-header-btns .ac-btn-h', 'background-color', 'colors_header_transparent_2nd' ); }

		if( businessx_cd( 'colors_header_transparent_2nd_hover', $colors_header_transparent_2nd_hover ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent .main-header-btns .ac-btn-h:hover', 'background-color', 'colors_header_transparent_2nd_hover' ); }

		if( businessx_cd( 'colors_header_transparent_action_border', $colors_header_transparent_action_border ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent .actions-menu a, .main-header.mh-transparent .ac-btn-alt.alt2', 'border-color', 'colors_header_transparent_action_border', '', ' !important' ); }

		if( businessx_cd( 'colors_header_transparent_submenu_bg', $colors_header_transparent_submenu_bg ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent .main-menu li ul', 'background-color', 'colors_header_transparent_submenu_bg' ); }

		if( businessx_cd( 'colors_header_transparent_submenu_borders', $colors_header_transparent_submenu_borders ) ) {
			$css .= businessx_gcs( '.main-header.mh-transparent .main-menu .sub-menu li', 'border-color', 'colors_header_transparent_submenu_borders' ); }

		/* Colored Header Colors */
		if( businessx_cd( 'colors_header_colored_background', $colors_header_colored_background ) ) {
			$css .= businessx_gcs( '.main-header, .mh-placeholder', 'background-color', 'colors_header_colored_background' ); }

		if( businessx_cd( 'colors_header_colored_border', $colors_header_colored_border ) ) {
			$css .= businessx_gcs( '.main-header', 'border-color', 'colors_header_colored_border' ); }

		if( businessx_cd( 'colors_header_colored_links_text', $colors_header_colored_links_text ) ) {
			$css .= businessx_gcs( '.main-header, .main-header a, .main-header a i', 'color', 'colors_header_colored_links_text', '', ' !important' ); }

		if( businessx_cd( 'colors_header_colored_links_hover', $colors_header_colored_links_hover ) ) {
			$css .= businessx_gcs( '.main-header a:hover, .main-header a:hover i, .main-header a:focus, .main-header a:focus i, .main-header a:active, .main-header a:active i', 'color', 'colors_header_colored_links_hover', '', ' !important' ); }

		if( businessx_cd( 'colors_header_colored_action_border', $colors_header_colored_action_border ) ) {
			$css .= businessx_gcs( '.main-header-right .actions-menu a, .main-header-right .ac-btn-alt.alt2', 'border-color', 'colors_header_colored_action_border' ); }

		if( businessx_cd( 'colors_header_colored_2nd', $colors_header_colored_2nd ) ) {
			$css .= businessx_gcs( '.main-header .main-header-btns .ac-btn-h', 'background-color', 'colors_header_colored_2nd' ); }

		if( businessx_cd( 'colors_header_colored_2nd_hover', $colors_header_colored_2nd_hover ) ) {
			$css .= businessx_gcs( '.main-header .main-header-btns .ac-btn-h:hover', 'background-color', 'colors_header_colored_2nd_hover' ); }

		if( businessx_cd( 'colors_header_colored_submenu_bg', $colors_header_colored_submenu_bg ) ) {
			$css .= businessx_gcs( '.main-menu li ul', 'background-color', 'colors_header_colored_submenu_bg' ); }

		if( businessx_cd( 'colors_header_colored_submenu_borders', $colors_header_colored_submenu_borders ) ) {
			$css .= businessx_gcs( '.main-menu li ul, .main-menu .sub-menu li', 'border-color', 'colors_header_colored_submenu_borders' ); }

		if( businessx_cd( 'colors_header_colored_submenu_shadow', $colors_header_colored_submenu_shadow ) ) {
			$css .= businessx_gcs( '.main-menu li ul', 'box-shadow', 'colors_header_colored_submenu_shadow', '0 1px 2px' ); }

		/* Mobile Menu Colors */
		if( businessx_cd( 'colors_mobile_menu_background', $colors_mobile_menu_background ) ) {
			$css .= businessx_gcs( '.mobile-menu', 'background-color', 'colors_mobile_menu_background' ); }

		if( businessx_cd( 'colors_mobile_menu_borders', $colors_mobile_menu_borders ) ) {
			$css .= businessx_gcs( '.mobile-menu li, .mobile-menu .sub-menu, .mobile-menu .sub-menu li', 'border-color', 'colors_mobile_menu_borders' ); }

		if( businessx_cd( 'colors_mobile_menu_text_links', $colors_mobile_menu_text_links ) ) {
			$css .= businessx_gcs( '.mobile-menu, .mobile-menu a:not(.ac-btn), .mobile-menu a:not(.ac-btn):hover, .mobile-menu a:not(.ac-btn):focus, .mobile-menu a:not(.ac-btn):active', 'color', 'colors_mobile_menu_text_links' ); }

		if( businessx_cd( 'colors_mobile_menu_submenu_bg', $colors_mobile_menu_submenu_bg ) ) {
			$css .= businessx_gcs( '.mobile-menu .sub-menu', 'background-color', 'colors_mobile_menu_submenu_bg' ); }

		if( businessx_cd( 'colors_mobile_menu_arrow_btn', $colors_mobile_menu_arrow_btn ) ) {
			$css .= businessx_gcs( '.mobile-menu .mobile-arrow', 'background-color', 'colors_mobile_menu_arrow_btn' ); }

		if( businessx_cd( 'colors_mobile_menu_arrow_btn_opened', $colors_mobile_menu_arrow_btn_opened ) ) {
			$css .= businessx_gcs( '.mobile-menu li.parent-opened > .mobile-arrow', 'background-color', 'colors_mobile_menu_arrow_btn_opened' ); }

		if( businessx_cd( 'colors_mobile_menu_close', $colors_mobile_menu_close ) ) {
			$css .= businessx_gcs( '.mobile-menu .ac-btn, .mobile-menu .ac-btn:hover, .mobile-menu .ac-btn:focus, .mobile-menu .ac-btn:active', 'background-color', 'colors_mobile_menu_close' ); }

		/* Header Heading - Index Colors */
		if( businessx_cd( 'colors_header_heading_index_bg', $colors_header_heading_index_bg ) ) {
			$css .= businessx_gcs( '.index-heading', 'background-color', 'colors_header_heading_index_bg' ); }

		if( businessx_cd( 'colors_header_heading_index_text', $colors_header_heading_index_text ) ) {
			$css .= businessx_gcs( '.index-heading, .index-heading .sec-hs-elements .hs-primary-large', 'color', 'colors_header_heading_index_text' ); }

		if( businessx_cd( 'colors_header_heading_index_text_shadow', $colors_header_heading_index_text_shadow ) ) {
			$css .= businessx_gcs(
				'.index-heading .sec-hs-elements .hs-primary-large, .index-heading  .sec-hs-elements .sec-hs-description, .index-heading .sec-hs-elements .ac-btns-or, .index-heading .entry-meta-list', 'text-shadow', 'colors_header_heading_index_text_shadow', '0 1px 2px ' ); }

		if( businessx_cd( 'colors_header_heading_index_overlay_color', $colors_header_heading_index_overlay_color ) ) {
			$css .= businessx_gcs( '.index-heading .grid-overlay', 'background-color', 'colors_header_heading_index_overlay_color' ); }

		if( businessx_cd( 'colors_header_heading_index_overlay_shadow', $colors_header_heading_index_overlay_shadow ) ) {
			$css .= businessx_gcs( '.index-heading .grid-overlay:before', 'background', 'colors_header_heading_index_overlay_shadow', '-moz-linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' );
			$css .= businessx_gcs( '.index-heading .grid-overlay:before', 'background', 'colors_header_heading_index_overlay_shadow', '-webkit-linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' );
			$css .= businessx_gcs( '.index-heading .grid-overlay:before', 'background', 'colors_header_heading_index_overlay_shadow', 'linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' ); }

		if( businessx_cd( 'colors_header_heading_index_links', $colors_header_heading_index_links ) ) {
			$css .= businessx_gcs(
				'.index-heading a:not(.ac-btn), .index-heading a:not(.ac-btn):hover, .index-heading a:not(.ac-btn):focus, .index-heading a:not(.ac-btn):active', 'color', 'colors_header_heading_index_links' ); }

		/* Header Heading - Page Colors */
		if( businessx_cd( 'colors_header_heading_page_bg', $colors_header_heading_page_bg ) ) {
			$css .= businessx_gcs( '.page-heading', 'background-color', 'colors_header_heading_page_bg' ); }

		if( businessx_cd( 'colors_header_heading_page_text', $colors_header_heading_page_text ) ) {
			$css .= businessx_gcs( '.page-heading, .page-heading .sec-hs-elements .hs-primary-large', 'color', 'colors_header_heading_page_text' ); }

		if( businessx_cd( 'colors_header_heading_page_text_shadow', $colors_header_heading_page_text_shadow ) ) {
			$css .= businessx_gcs(
				'.page-heading .sec-hs-elements .hs-primary-large, .page-heading  .sec-hs-elements .sec-hs-description, .page-heading .sec-hs-elements .ac-btns-or, .page-heading .entry-meta-list', 'text-shadow', 'colors_header_heading_page_text_shadow', '0 1px 2px ' ); }

		if( businessx_cd( 'colors_header_heading_page_overlay_color', $colors_header_heading_page_overlay_color ) ) {
			$css .= businessx_gcs( '.page-heading .grid-overlay', 'background-color', 'colors_header_heading_page_overlay_color' ); }

		if( businessx_cd( 'colors_header_heading_page_overlay_shadow', $colors_header_heading_page_overlay_shadow ) ) {
			$css .= businessx_gcs( '.page-heading .grid-overlay:before', 'background', 'colors_header_heading_page_overlay_shadow', '-moz-linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' );
			$css .= businessx_gcs( '.page-heading .grid-overlay:before', 'background', 'colors_header_heading_page_overlay_shadow', '-webkit-linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' );
			$css .= businessx_gcs( '.page-heading .grid-overlay:before', 'background', 'colors_header_heading_page_overlay_shadow', 'linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' ); }

		if( businessx_cd( 'colors_header_heading_page_links', $colors_header_heading_page_links ) ) {
			$css .= businessx_gcs(
				'.page-heading a:not(.ac-btn), .page-heading a:not(.ac-btn):hover, .page-heading a:not(.ac-btn):focus, .page-heading a:not(.ac-btn):active, .woocommerce .woocommerce-breadcrumb', 'color', 'colors_header_heading_page_links' ); }

		/* Header Heading - Single Colors */
		if( businessx_cd( 'colors_header_heading_single_bg', $colors_header_heading_single_bg ) ) {
			$css .= businessx_gcs( '.single-heading', 'background-color', 'colors_header_heading_single_bg' ); }

		if( businessx_cd( 'colors_header_heading_single_text', $colors_header_heading_single_text ) ) {
			$css .= businessx_gcs( '.single-heading, .single-heading .sec-hs-elements .hs-primary-large', 'color', 'colors_header_heading_single_text' ); }

		if( businessx_cd( 'colors_header_heading_single_text_shadow', $colors_header_heading_single_text_shadow ) ) {
			$css .= businessx_gcs(
				'.single-heading .sec-hs-elements .hs-primary-large, .single-heading  .sec-hs-elements .sec-hs-description, .single-heading .sec-hs-elements .ac-btns-or, .single-heading .entry-meta-list, .index-heading .entry-meta-list, .page-heading .entry-meta-list,
				.woocommerce .term-description, .woocommerce .woocommerce-breadcrumb', 'text-shadow', 'colors_header_heading_single_text_shadow', '0 1px 2px ' ); }

		if( businessx_cd( 'colors_header_heading_single_overlay_color', $colors_header_heading_single_overlay_color ) ) {
			$css .= businessx_gcs( '.single-heading .grid-overlay', 'background-color', 'colors_header_heading_single_overlay_color' ); }

		if( businessx_cd( 'colors_header_heading_single_overlay_shadow', $colors_header_heading_single_overlay_shadow ) ) {
			$css .= businessx_gcs( '.single-heading .grid-overlay:before', 'background', 'colors_header_heading_single_overlay_shadow', '-moz-linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' );
			$css .= businessx_gcs( '.single-heading .grid-overlay:before', 'background', 'colors_header_heading_single_overlay_shadow', '-webkit-linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' );
			$css .= businessx_gcs( '.single-heading .grid-overlay:before', 'background', 'colors_header_heading_single_overlay_shadow', 'linear-gradient(top,', ' 0%, rgba(0,0,0,0) 100%)' ); }

		if( businessx_cd( 'colors_header_heading_single_links', $colors_header_heading_single_links ) ) {
			$css .= businessx_gcs(
				'.single-heading a:not(.ac-btn), .single-heading a:not(.ac-btn):hover, .single-heading a:not(.ac-btn):focus, .single-heading a:not(.ac-btn):active', 'color', 'colors_header_heading_single_links' ); }

		/* Sidebars colors */
		if( businessx_cd( 'colors_sidebars_h_border_colors', $colors_sidebars_h_border_colors ) ) {
			$css .= businessx_gcs( '.widget-title, .widget_wpcom_social_media_icons_widget li a', 'border-color', 'colors_sidebars_h_border_colors', '', ' !important' ); }

		if( businessx_cd( 'colors_sidebars_h_border_colors_2', $colors_sidebars_h_border_colors_2 ) ) {
			$css .= businessx_gcs( '.widget-title span:before', 'border-top-color', 'colors_sidebars_h_border_colors_2' ); }

		/* Footer colors */
		if( businessx_cd( 'colors_footer_color', $colors_footer_color ) ) {
			$css .= businessx_gcs( '.footer-widgets', 'color', 'colors_footer_color' ); }

		if( businessx_cd( 'colors_footer_background_color', $colors_footer_background_color ) ) {
			$css .= businessx_gcs( '.footer-widgets', 'background-color', 'colors_footer_background_color' ); }

		if( businessx_cd( 'colors_footer_links_headings', $colors_footer_links_headings ) ) {
			$css .= businessx_gcs( '.footer-widgets h1, .footer-widgets h2, .footer-widgets h3, .footer-widgets h4, .footer-widgets h5, .footer-widgets h6, .footer-widgets a, .footer-widgets a:focus, .footer-widgets a:active', 'color', 'colors_footer_links_headings' ); }

		if( businessx_cd( 'colors_footer_links_hover', $colors_footer_links_hover ) ) {
			$css .= businessx_gcs( '.footer-widgets a:hover', 'color', 'colors_footer_links_hover' ); }

		if( businessx_cd( 'colors_footer_borders', $colors_footer_borders ) ) {
			$css .= businessx_gcs( '.footer-sidebar .widget-title, .footer-sidebar .tagcloud a, .footer-sidebar .widget table, .footer-sidebar .widget th, .footer-sidebar .widget td, .footer-sidebar .widget fieldset, .footer-sidebar .widget blockquote, .footer-sidebar .widget pre, .footer-sidebar .widget abbr, .footer-sidebar .widget acronym, .footer-sidebar .widget_wpcom_social_media_icons_widget li a', 'border-color', 'colors_footer_borders', '', ' !important' ); }

		if( businessx_cd( 'colors_footer_widget_2nd', $colors_footer_widget_2nd ) ) {
			$css .= businessx_gcs( '.footer-sidebar .widget-title span:before', 'border-top-color', 'colors_footer_widget_2nd' ); }

		/* Footer colors - form elements */
		if( businessx_cd( 'colors_footer_form_bg', $colors_footer_form_bg ) ) {
			$css .= businessx_gcs( '.footer-wrap input[type=text], .footer-wrap input[type=search], .footer-wrap input[type=radio], .footer-wrap input[type=tel], .footer-wrap input[type=time], .footer-wrap input[type=url], .footer-wrap input[type=week], .footer-wrap input[type=password], .footer-wrap input[type=checkbox], .footer-wrap input[type=color], .footer-wrap input[type=date], .footer-wrap input[type=datetime], .footer-wrap input[type=datetime-local], .footer-wrap input[type=email], .footer-wrap input[type=month], .footer-wrap input[type=number], .footer-wrap select, .footer-wrap textarea', 'background-color', 'colors_footer_form_bg' ); }

		if( businessx_cd( 'colors_footer_form_border', $colors_footer_form_border ) ) {
			$css .= businessx_gcs( '.footer-wrap input[type=text], .footer-wrap input[type=search], .footer-wrap input[type=radio], .footer-wrap input[type=tel], .footer-wrap input[type=time], .footer-wrap input[type=url], .footer-wrap input[type=week], .footer-wrap input[type=password], .footer-wrap input[type=checkbox], .footer-wrap input[type=color], .footer-wrap input[type=date], .footer-wrap input[type=datetime], .footer-wrap input[type=datetime-local], .footer-wrap input[type=email], .footer-wrap input[type=month], .footer-wrap input[type=number], .footer-wrap select, .footer-wrap textarea', 'border-color', 'colors_footer_form_border' ); }

		if( businessx_cd( 'colors_footer_form_text', $colors_footer_form_text ) ) {
			$css .= businessx_gcs( '.footer-wrap input[type=text], .footer-wrap input[type=search], .footer-wrap input[type=radio], .footer-wrap input[type=tel], .footer-wrap input[type=time], .footer-wrap input[type=url], .footer-wrap input[type=week], .footer-wrap input[type=password], .footer-wrap input[type=checkbox], .footer-wrap input[type=color], .footer-wrap input[type=date], .footer-wrap input[type=datetime], .footer-wrap input[type=datetime-local], .footer-wrap input[type=email], .footer-wrap input[type=month], .footer-wrap input[type=number], .footer-wrap select, .footer-wrap textarea', 'color', 'colors_footer_form_text' );
			$css .= businessx_gcs( '.footer-wrap input[type=radio]:checked:before', 'background-color', 'colors_footer_form_text' ); }

		if( businessx_cd( 'colors_footer_form_border_focus', $colors_footer_form_border_focus ) ) {
			$css .= businessx_gcs( '.footer-wrap input[type=text]:focus, .footer-wrap input[type=search]:focus, .footer-wrap input[type=radio]:focus, .footer-wrap input[type=tel]:focus, .footer-wrap input[type=time]:focus, .footer-wrap input[type=url]:focus, .footer-wrap input[type=week]:focus, .footer-wrap input[type=password]:focus, .footer-wrap input[type=checkbox]:focus, .footer-wrap input[type=color]:focus, .footer-wrap input[type=date]:focus, .footer-wrap input[type=datetime]:focus, .footer-wrap input[type=datetime-local]:focus, .footer-wrap input[type=email]:focus, .footer-wrap input[type=month]:focus, .footer-wrap input[type=number]:focus, .footer-wrap select:focus, .footer-wrap textarea:focus', 'border-color', 'colors_footer_form_border_focus' ); }

		if( businessx_cd( 'colors_footer_form_bg_focus', $colors_footer_form_bg_focus ) ) {
			$css .= businessx_gcs( '.footer-wrap input[type=text]:focus, .footer-wrap input[type=search]:focus, .footer-wrap input[type=radio]:focus, .footer-wrap input[type=tel]:focus, .footer-wrap input[type=time]:focus, .footer-wrap input[type=url]:focus, .footer-wrap input[type=week]:focus, .footer-wrap input[type=password]:focus, .footer-wrap input[type=checkbox]:focus, .footer-wrap input[type=color]:focus, .footer-wrap input[type=date]:focus, .footer-wrap input[type=datetime]:focus, .footer-wrap input[type=datetime-local]:focus, .footer-wrap input[type=email]:focus, .footer-wrap input[type=month]:focus, .footer-wrap input[type=number]:focus, .footer-wrap select:focus, .footer-wrap textarea:focus', 'background-color', 'colors_footer_form_bg_focus' ); }

		if( businessx_cd( 'colors_footer_form_placeholder', $colors_footer_form_placeholder ) ) {
			$css .= businessx_gcs( '.footer-wrap ::-webkit-input-placeholder', 'color', 'colors_footer_form_placeholder' );
			$css .= businessx_gcs( '.footer-wrap :-moz-placeholder', 'color', 'colors_footer_form_placeholder' );
			$css .= businessx_gcs( '.footer-wrap ::-moz-placeholder', 'color', 'colors_footer_form_placeholder' );
			$css .= businessx_gcs( '.footer-wrap :-ms-input-placeholder', 'color', 'colors_footer_form_placeholder' ); }

		/* Footer colors - buttons */
		if( businessx_cd( 'colors_footer_buttons_bg', $colors_footer_buttons_bg ) ) {
			$css .= businessx_gcs( '.footer-wrap .ac-btn, .footer-wrap input[type=submit], .footer-wrap input[type=reset], .footer-wrap input[type=button], .footer-wrap button', 'background-color', 'colors_footer_buttons_bg' ); }

		if( businessx_cd( 'colors_footer_buttons_bg_hover', $colors_footer_buttons_bg_hover ) ) {
			$css .= businessx_gcs( '.footer-wrap .ac-btn:hover, .footer-wrap input[type=submit]:hover, .footer-wrap input[type=reset]:hover, .footer-wrap input[type=button]:hover,.footer-wrap  button:hover', 'background-color', 'colors_footer_buttons_bg_hover' ); }

		if( businessx_cd( 'colors_footer_buttons_bg_other', $colors_footer_buttons_bg_other ) ) {
			$css .= businessx_gcs( '.footer-wrap .ac-btn:focus, .footer-wrap input[type=submit]:focus, .footer-wrap input[type=reset]:focus, .footer-wrap input[type=button]:focus, .footer-wrap button:focus, .footer-wrap .ac-btn:active, .footer-wrap input[type=submit]:active, .footer-wrap input[type=reset]:active, .footer-wrap input[type=button]:focus, .footer-wrap button:active', 'background-color', 'colors_footer_buttons_bg_other' ); }

		/* Footer credits colors */
		if( businessx_cd( 'colors_footer_credits_bg', $colors_footer_credits_bg ) ) {
			$css .= businessx_gcs( '.footer-credits', 'background-color', 'colors_footer_credits_bg' ); }

		if( businessx_cd( 'colors_footer_credits_text', $colors_footer_credits_text ) ) {
			$css .= businessx_gcs( '.footer-credits', 'color', 'colors_footer_credits_text' ); }

		if( businessx_cd( 'colors_footer_credits_links', $colors_footer_credits_links ) ) {
			$css .= businessx_gcs( '.footer-creds a, .footer-creds a:hover, .footer-creds a:focus, .footer-creds a:active', 'color', 'colors_footer_credits_links' ); }

		/* WooCommerce colors */
		if( businessx_cd( 'colors_woocommerce_accent', $colors_woocommerce_accent ) ) {
			$css .= businessx_gcs( '.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price', 'color', 'colors_woocommerce_accent' ); }

		if( businessx_cd( 'colors_woocommerce_accent2', $colors_woocommerce_accent2 ) ) {
			$css .= businessx_gcs( 'mark, ins, .woocommerce ul.products li.product .price ins, .woocommerce div.product p.price ins, .woocommerce div.product span.price ins, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce span.onsale', 'background-color', 'colors_woocommerce_accent2' ); }

		// Adds inline CSS
		wp_add_inline_style( 'businessx-style', businessx_sanitize_css( $css ) );
	}
}
add_action( 'wp_enqueue_scripts', 'businessx_final_inline_css', 11 );
