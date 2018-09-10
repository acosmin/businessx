<?php
/* -------------------------------------- */
/* CSS template for Customizer Previewera
/* -------------------------------------- */

if ( ! function_exists( 'businessx_czr_output_css' ) ) {
	function businessx_czr_output_css( $settings ) {
		global $businessx_customizer_settings;
		$new_settings = array();

		if( ! empty( $businessx_customizer_settings ) ) {
			foreach( $businessx_customizer_settings as $bcs ) {
				$new_settings[ $bcs ] = '';
			}
		}

		$settings = wp_parse_args( $settings, $new_settings );

		return <<<CSS
		/* CSS GOES HERE */

		/* Settings - Site Identity */
		body.sticky-logo .mh-moving .logo-wrap img {
			max-height: {$settings['sticky_logo_height']};
		}

		/* Colors - Body */
		body, .comment-reply-title, .woocommerce div.product .woocommerce-tabs ul.tabs li.active {
			background-color: {$settings['colors_body_background']};
			color: {$settings['colors_body_font']};
		}
		.comment-reply-title:after {
			border: solid transparent;
			border-color: transparent;
			border-bottom-color: {$settings['colors_body_background']};
		}
		.woocommerce div.product .woocommerce-tabs ul.tabs li.active {
			border-bottom-color: {$settings['colors_body_background']};
		}
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle {
			box-shadow: 0 0 0 2px {$settings['colors_body_background']};
		}
		blockquote, pre, abbr, acronym, table, th, td, fieldset, .tagcloud a, .post-index.sticky, .comments-title, .comment, .pingback, .comment-reply-title, .tags-display, .posts-pagination .paging-wrap,
		.woocommerce div.product form.cart .variations,
		.woocommerce nav.woocommerce-pagination ul,
		.woocommerce div.product .woocommerce-tabs ul.tabs:before,
		.woocommerce div.product .woocommerce-tabs ul.tabs li,
		.woocommerce table.shop_table, #add_payment_method .cart-collaterals .cart_totals table td, #add_payment_method .cart-collaterals .cart_totals table th, .woocommerce-cart .cart-collaterals .cart_totals table td, .woocommerce-cart .cart-collaterals .cart_totals table th, .woocommerce-checkout .cart-collaterals .cart_totals table td, .woocommerce-checkout .cart-collaterals .cart_totals table th, #add_payment_method #payment ul.payment_methods, .woocommerce-cart #payment ul.payment_methods, .woocommerce-checkout #payment ul.payment_methods, .woocommerce-checkout-payment, .woocommerce-MyAccount-navigation ul,
		.woocommerce form.checkout_coupon, .woocommerce form.login, .woocommerce form.register {
			border-color: {$settings['colors_body_border']};
		}
		.woocommerce .widget_price_filter .price_slider_wrapper .ui-widget-content {
			background-color: {$settings['colors_body_border']};
		}
		.comment-reply-title:before {
			border-bottom-color: {$settings['colors_body_border']};
		}
		blockquote cite, blockquote small, .wp-caption .wp-caption-text, .gallery-caption, .comment-notes, .logged-in-as, .form-allowed-tags, .woocommerce .star-rating:before {
			color: {$settings['colors_body_999']};
		}

		/* Colors - Links */
		a {
			color: {$settings['colors_links_default']};
		}
		a:hover, a:focus, a:active,
		.woocommerce nav.woocommerce-pagination ul li a:focus,
		.woocommerce nav.woocommerce-pagination ul li a:hover,
		.woocommerce nav.woocommerce-pagination ul li span.current,
		.woocommerce div.product .woocommerce-tabs ul.tabs li a,
		.woocommerce-MyAccount-navigation li.is-active a {
			color: {$settings['colors_links_other']};
		}

		/* Colors - Headings */
		h1, h2, h3, h4, h5, h6 {
			color: {$settings['colors_headings_base']};
		}
		h1 a, h2 a, h3 a, h4 a, h5 a, h6 a {
			color: {$settings['colors_headings_default']};
		}
		h1 a:hover, h2 a:hover, h3 a:hover, h4 a:hover, h5 a:hover, h6 a:hover, h1 a:focus, h2 a:focus, h3 a:focus, h4 a:focus, h5 a:focus, h6 a:focus, h1 a:active, h2 a:active, h3 a:active, h4 a:active, h5 a:active, h6 a:active, .woocommerce div.product .woocommerce-tabs ul.tabs li a:hover,  .woocommerce div.product .woocommerce-tabs ul.tabs li a:focus, .woocommerce div.product .woocommerce-tabs ul.tabs li a:active, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a {
			color: {$settings['colors_headings_other']};
		}

		/* Colors - Inputs */
		::-webkit-input-placeholder {
		color: {$settings['colors_inputs_placeholder']};
		}
		:-moz-placeholder {
			color: {$settings['colors_inputs_placeholder']};
		}
		::-moz-placeholder {
			color: {$settings['colors_inputs_placeholder']};
		}
		:-ms-input-placeholder {
			color: {$settings['colors_inputs_placeholder']};
		}
		/* Colors - Inputs */
		input[type=text],
		input[type=search],
		input[type=radio],
		input[type=tel],
		input[type=time],
		input[type=url],
		input[type=week],
		input[type=password],
		input[type=checkbox],
		input[type=color],
		input[type=date],
		input[type=datetime],
		input[type=datetime-local],
		input[type=email],
		input[type=month],
		input[type=number],
		select,
		textarea,
		#add_payment_method table.cart td.actions .coupon .input-text,
		.woocommerce-cart table.cart td.actions .coupon .input-text,
		.woocommerce-checkout table.cart td.actions .coupon .input-text {
			border-color: {$settings['colors_inputs_border_bottom']};
			background-color: {$settings['colors_inputs_background']};
			color: {$settings['colors_inputs_color']};
		}
		input[type=radio]:checked:before {
			background-color: {$settings['colors_inputs_color']};
		}
		input[type=text]:focus,
		input[type=search]:focus,
		input[type=radio]:focus,
		input[type=tel]:focus,
		input[type=time]:focus,
		input[type=url]:focus,
		input[type=week]:focus,
		input[type=password]:focus,
		input[type=checkbox]:focus,
		input[type=color]:focus,
		input[type=date]:focus,
		input[type=datetime]:focus,
		input[type=datetime-local]:focus,
		input[type=email]:focus,
		input[type=month]:focus,
		input[type=number]:focus,
		select:focus,
		textarea:focus,
		#add_payment_method table.cart td.actions .coupon .input-text:focus, .woocommerce-cart table.cart td.actions .coupon .input-text:focus, .woocommerce-checkout table.cart td.actions .coupon .input-text:focus {
			border-color: {$settings['colors_inputs_f_border_bottom']};
			background-color: {$settings['colors_inputs_f_background']};
		}

		/* Colors - Default Button */
		.ac-btn, input[type=submit], input[type=reset], input[type=button], button,
		.woocommerce a.button,
		.woocommerce button.button,
		.woocommerce input.button,
		.woocommerce input[type=submit].button,
		.woocommerce #respond input#submit,
		.woocommerce a.button.alt,
		.woocommerce button.button.alt,
		.woocommerce input.button.alt,
		.woocommerce #respond input#submit.alt {
			background-color: {$settings['colors_btn_def_default']};
		}
		.ac-btn:hover, input[type=submit]:hover, input[type=reset]:hover, input[type=button]:hover, button:hover,
		.woocommerce a.button:hover,
		.woocommerce button.button:hover,
		.woocommerce input.button:hover,
		.woocommerce input[type=submit].button:hover,
		.woocommerce #respond input#submit:hover,
		.woocommerce a.button.alt:hover,
		.woocommerce button.button.alt:hover,
		.woocommerce input.button.alt:hover,
		.woocommerce #respond input#submit.alt:hover,
		.woocommerce #respond input#submit.disabled, .woocommerce #respond input#submit:disabled, .woocommerce #respond input#submit:disabled[disabled], .woocommerce a.button.disabled, .woocommerce a.button:disabled, .woocommerce a.button:disabled[disabled], .woocommerce button.button.disabled, .woocommerce button.button:disabled, .woocommerce button.button:disabled[disabled], .woocommerce input.button.disabled, .woocommerce input.button:disabled, .woocommerce input.button:disabled[disabled],
		.woocommerce #respond input#submit.disabled:hover, .woocommerce #respond input#submit:disabled:hover, .woocommerce #respond input#submit:disabled[disabled]:hover, .woocommerce a.button.disabled:hover, .woocommerce a.button:disabled:hover, .woocommerce a.button:disabled[disabled]:hover, .woocommerce button.button.disabled:hover, .woocommerce button.button:disabled:hover, .woocommerce button.button:disabled[disabled]:hover, .woocommerce input.button.disabled:hover, .woocommerce input.button:disabled:hover, .woocommerce input.button:disabled[disabled]:hover,
		.woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover {
			background-color: {$settings['colors_btn_def_hover']};
		}
		.ac-btn:focus, input[type=submit]:focus, input[type=reset]:focus, input[type=button]:focus, button:focus, .ac-btn:active, input[type=submit]:active, input[type=reset]:active, input[type=button]:focus, button:active, .woocommerce a.button:focus,
		.woocommerce button.button:focus, .woocommerce input.button:focus, .woocommerce input[type=submit].button:focus, .woocommerce #respond input#submit:focus, .woocommerce a.button.alt:focus, .woocommerce button.button.alt:focus, .woocommerce input.button.alt:focus, .woocommerce #respond input#submit.alt:focus, .ac-btn:active, input[type=submit]:active, input[type=reset]:active, input[type=button]:focus, button:active, .woocommerce a.button:active, .woocommerce button.button:active, .woocommerce input.button:active, .woocommerce input[type=submit].button:active, .woocommerce #respond input#submit:active, .woocommerce a.button.alt:active, .woocommerce button.button.alt:active, .woocommerce input.button.alt:active, .woocommerce #respond input#submit.alt:active {
			background-color: {$settings['colors_btn_def_other']};
		}

		/* Colors - Opaque Button */
		.ac-btn.btn-opaque {
			box-shadow: inset 0 0 0 3px {$settings['colors_btn_opq_border']};
			background-color: {$settings['colors_btn_opq_default']};
		}
		.ac-btn.btn-opaque.opq-x2 {
			background-color: {$settings['colors_btn_opq_default_2x']};
		}
		.ac-btn.btn-opaque:hover {
			background-color: {$settings['colors_btn_opq_hover']};
		}
		.ac-btn.btn-opaque:focus,
		.ac-btn.btn-opaque:active {
			background-color: {$settings['colors_btn_opq_other']};
		}

		/* Colors - Alternative Button */
		.ac-btn-alt, .comment-reply-link, .actions-menu a {
			color: {$settings['colors_btn_alt_default']};
			border-color: {$settings['colors_btn_alt_border']};
		}
		.ac-btn-alt:hover, .comment-reply-link:hover, .actions-menu a:hover,
		.ac-btn-alt:focus, .comment-reply-link:focus, .actions-menu a:focus,
		.ac-btn-alt:active, .comment-reply-link:active, .actions-menu a:active {
			color: {$settings['colors_btn_alt_other']};
		}
		.ac-btn-alt:hover:after, .comment-reply-link:hover:after, .actions-menu a:hover:after {
			border-color: {$settings['colors_btn_alt_border_hover']};
		}

		/* Colors Transparent Header  */
		.main-header.mh-transparent {
			color: {$settings['colors_header_transparent_text']};
		}
		.main-header.mh-transparent a,
		.main-header.mh-transparent a i,
		.main-header.mh-transparent a:hover,
		.main-header.mh-transparent a:hover i,
		.main-header.mh-transparent a:focus,
		.main-header.mh-transparent a:focus i,
		.main-header.mh-transparent a:active,
		.main-header.mh-transparent a:active i {
			color: {$settings['colors_header_transparent_links']} !important;
		}
		.main-header.mh-transparent .main-menu li a {
			opacity: {$settings['colors_header_transparent_opacity']};
		}
		.main-header.mh-transparent .main-header-btns .ac-btn-h {
			background-color: {$settings['colors_header_transparent_2nd']};
		}
		.main-header.mh-transparent .main-header-btns .ac-btn-h:hover {
			background-color: {$settings['colors_header_transparent_2nd_hover']};
		}
		.main-header.mh-transparent .actions-menu a, .main-header.mh-transparent .ac-btn-alt.alt2 {
			border-color: {$settings['colors_header_transparent_action_border']} !important;
		}
		.main-header.mh-transparent .main-menu li ul {
			background-color: {$settings['colors_header_transparent_submenu_bg']};
		}
		.main-header.mh-transparent .main-menu .sub-menu li {
			border-color: {$settings['colors_header_transparent_submenu_borders']};
		}

		/* Colored Header Colors */
		.main-header {
			border-color: {$settings['colors_header_colored_border']};
		}
		.main-header,
		.mh-placeholder {
			background-color: {$settings['colors_header_colored_background']};
		}
		.main-header,
		.main-header a,
		.main-header a i {
			color: {$settings['colors_header_colored_links_text']} !important;
		}
		.main-header a:hover,
		.main-header a:hover i,
		.main-header a:focus,
		.main-header a:focus i,
		.main-header a:active,
		.main-header a:active i {
			color: {$settings['colors_header_colored_links_hover']} !important;
		}
		.main-header-right .actions-menu a, .main-header-right .ac-btn-alt.alt2 {
			border-color: {$settings['colors_header_colored_action_border']};
		}
		.main-header .main-header-btns .ac-btn-h {
			background-color: {$settings['colors_header_colored_2nd']};
		}
		.main-header .main-header-btns .ac-btn-h:hover {
			background-color: {$settings['colors_header_colored_2nd_hover']};
		}
		.main-menu li ul {
			background-color: {$settings['colors_header_colored_submenu_bg']};
			box-shadow: 0 1px 2px {$settings['colors_header_colored_submenu_shadow']};
		}
		.main-menu li ul, .main-menu .sub-menu li {
			border-color:{$settings['colors_header_colored_submenu_borders']};
		}

		/* Mobile Menu Colors */
		.mobile-menu {
			background-color: {$settings['colors_mobile_menu_background']};
		}
		.mobile-menu li,
		.mobile-menu .sub-menu,
		.mobile-menu .sub-menu li {
			border-color: {$settings['colors_mobile_menu_borders']};
		}
		.mobile-menu,
		.mobile-menu a:not(.ac-btn),
		.mobile-menu a:not(.ac-btn):hover,
		.mobile-menu a:not(.ac-btn):focus,
		.mobile-menu a:not(.ac-btn):active {
			color: {$settings['colors_mobile_menu_text_links']};
		}
		.mobile-menu .sub-menu {
			background-color: {$settings['colors_mobile_menu_submenu_bg']};
		}
		.mobile-menu .mobile-arrow {
			background-color: {$settings['colors_mobile_menu_arrow_btn']};
		}
		.mobile-menu li.parent-opened > .mobile-arrow {
			background-color: {$settings['colors_mobile_menu_arrow_btn_opened']};
		}
		.mobile-menu .ac-btn,
		.mobile-menu .ac-btn:hover,
		.mobile-menu .ac-btn:focus,
		.mobile-menu .ac-btn:active {
			background-color: {$settings['colors_mobile_menu_close']};
		}

		/* Colors - Header Heading - Index */
		.index-heading {
			background-color: {$settings['colors_header_heading_index_bg']};
		}
		.index-heading,
		.index-heading .sec-hs-elements .hs-primary-large {
			color: {$settings['colors_header_heading_index_text']};
		}
		.index-heading .sec-hs-elements .hs-primary-large,
		.index-heading .sec-hs-elements .sec-hs-description,
		.index-heading .sec-hs-elements .ac-btns-or,
		.index-heading .entry-meta-list {
			text-shadow: 0 1px 2px {$settings['colors_header_heading_index_text_shadow']};
		}
		.index-heading .grid-overlay {
			background-color: {$settings['colors_header_heading_index_overlay_color']};
		}
		.index-heading .grid-overlay:before {
			background: -moz-linear-gradient(top, {$settings['colors_header_heading_index_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
			background: -webkit-linear-gradient(top, {$settings['colors_header_heading_index_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
			background: linear-gradient(to bottom, {$settings['colors_header_heading_index_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
		}
		.index-heading a:not(.ac-btn), .index-heading a:not(.ac-btn):hover, .index-heading a:not(.ac-btn):focus, .index-heading a:not(.ac-btn):active {
			color: {$settings['colors_header_heading_index_links']};
		}

		/* Colors - Header Heading - Page */
		.page-heading {
			background-color: {$settings['colors_header_heading_page_bg']};
		}
		.page-heading,
		.page-heading .sec-hs-elements .hs-primary-large {
			color: {$settings['colors_header_heading_page_text']};
		}
		.page-heading .sec-hs-elements .hs-primary-large,
		.page-heading .sec-hs-elements .sec-hs-description,
		.page-heading .sec-hs-elements .ac-btns-or,
		.page-heading .entry-meta-list {
			text-shadow: 0 1px 2px {$settings['colors_header_heading_page_text_shadow']};
		}
		.page-heading .grid-overlay {
			background-color: {$settings['colors_header_heading_page_overlay_color']};
		}
		.page-heading .grid-overlay:before {
			background: -moz-linear-gradient(top, {$settings['colors_header_heading_page_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
			background: -webkit-linear-gradient(top, {$settings['colors_header_heading_page_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
			background: linear-gradient(to bottom, {$settings['colors_header_heading_page_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
		}
		.page-heading a:not(.ac-btn), .page-heading a:not(.ac-btn):hover, .page-heading a:not(.ac-btn):focus, .page-heading a:not(.ac-btn):active, .woocommerce .woocommerce-breadcrumb {
			color: {$settings['colors_header_heading_page_links']};
		}

		/* Colors - Header Heading - Single */
		.single-heading {
			background-color: {$settings['colors_header_heading_single_bg']};
		}
		.single-heading,
		.single-heading .sec-hs-elements .hs-primary-large {
			color: {$settings['colors_header_heading_single_text']};
		}
		.single-heading .sec-hs-elements .hs-primary-large,
		.single-heading .sec-hs-elements .sec-hs-description,
		.single-heading .sec-hs-elements .ac-btns-or,
		.single-heading .entry-meta-list,
		.index-heading .entry-meta-list,
		.page-heading .entry-meta-list,
		.woocommerce .term-description,
		.woocommerce .woocommerce-breadcrumb {
			text-shadow: 0 1px 2px {$settings['colors_header_heading_single_text_shadow']};
		}
		.single-heading .grid-overlay {
			background-color: {$settings['colors_header_heading_single_overlay_color']};
		}
		.single-heading .grid-overlay:before {
			background: -moz-linear-gradient(top, {$settings['colors_header_heading_single_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
			background: -webkit-linear-gradient(top, {$settings['colors_header_heading_single_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
			background: linear-gradient(to bottom, {$settings['colors_header_heading_single_overlay_shadow']} 0%, rgba(0,0,0,0) 100%);
		}
		.single-heading a:not(.ac-btn), .single-heading a:not(.ac-btn):hover, .single-heading a:not(.ac-btn):focus, .single-heading a:not(.ac-btn):active {
			color: {$settings['colors_header_heading_single_links']};
		}

		/* Colors - Sidebars */
		.widget-title, .widget_wpcom_social_media_icons_widget li a {
			border-color: {$settings['colors_sidebars_h_border_colors']} !important;
		}
		.widget-title span:before {
			border-top-color: {$settings['colors_sidebars_h_border_colors_2']};
		}

		/* Colors - Footer */
		.footer-widgets {
			color: {$settings['colors_footer_color']};
			background-color: {$settings['colors_footer_background_color']};
		}
		.footer-widgets h1, .footer-widgets h2, .footer-widgets h3, .footer-widgets h4, .footer-widgets h5, .footer-widgets h6,
		.footer-widgets a, .footer-widgets a:focus, .footer-widgets a:active {
			color: {$settings['colors_footer_links_headings']};
		}
		.footer-widgets a:hover {
			color: {$settings['colors_footer_links_hover']};
		}
		.footer-sidebar .widget-title, .footer-sidebar .tagcloud a, .footer-sidebar .widget table, .footer-sidebar .widget th, .footer-sidebar .widget td, .footer-sidebar .widget fieldset, .footer-sidebar .widget blockquote, .footer-sidebar .widget pre, .footer-sidebar .widget abbr, .footer-sidebar .widget acronym, .footer-sidebar .widget_wpcom_social_media_icons_widget li a {
			border-color: {$settings['colors_footer_borders']} !important;
		}
		.footer-sidebar .widget-title span:before {
			border-top-color: {$settings['colors_footer_widget_2nd']};
		}
		.footer-wrap input[type=text], .footer-wrap input[type=search], .footer-wrap input[type=radio], .footer-wrap input[type=tel], .footer-wrap input[type=time], .footer-wrap input[type=url], .footer-wrap input[type=week], .footer-wrap input[type=password], .footer-wrap input[type=checkbox], .footer-wrap input[type=color], .footer-wrap input[type=date], .footer-wrap input[type=datetime], .footer-wrap input[type=datetime-local], .footer-wrap input[type=email], .footer-wrap input[type=month], .footer-wrap input[type=number], .footer-wrap select, .footer-wrap textarea {
			background-color: {$settings['colors_footer_form_bg']};
			border-color: {$settings['colors_footer_form_border']};
			color: {$settings['colors_footer_form_text']};
		}
		.footer-wrap input[type=radio]:checked:before {
			background-color: {$settings['colors_footer_form_text']};
		}
		.footer-wrap input[type=text]:focus, .footer-wrap input[type=search]:focus, .footer-wrap input[type=radio]:focus, .footer-wrap input[type=tel]:focus, .footer-wrap input[type=time]:focus, .footer-wrap input[type=url]:focus, .footer-wrap input[type=week]:focus, .footer-wrap input[type=password]:focus, .footer-wrap input[type=checkbox]:focus, .footer-wrap input[type=color]:focus, .footer-wrap input[type=date]:focus, .footer-wrap input[type=datetime]:focus, .footer-wrap input[type=datetime-local]:focus, .footer-wrap input[type=email]:focus, .footer-wrap input[type=month]:focus, .footer-wrap input[type=number]:focus, .footer-wrap select:focus, .footer-wrap textarea:focus {
			border-color: {$settings['colors_footer_form_border_focus']};
			background-color: {$settings['colors_footer_form_bg_focus']};
		}
		.footer-wrap ::-webkit-input-placeholder{
			color: {$settings['colors_footer_form_placeholder']};
		}
		.footer-wrap :-moz-placeholder{
			color: {$settings['colors_footer_form_placeholder']};
		}
		.footer-wrap ::-moz-placeholder{
			color: {$settings['colors_footer_form_placeholder']};
		}
		.footer-wrap :-ms-input-placeholder {
			color: {$settings['colors_footer_form_placeholder']};
		}
		.footer-wrap .ac-btn, .footer-wrap input[type=submit], .footer-wrap input[type=reset], .footer-wrap input[type=button], .footer-wrap button {
			background-color: {$settings['colors_footer_buttons_bg']};
		}
		.footer-wrap .ac-btn:hover, .footer-wrap input[type=submit]:hover, .footer-wrap input[type=reset]:hover, .footer-wrap input[type=button]:hover,.footer-wrap  button:hover {
			background-color:{$settings['colors_footer_buttons_bg_hover']};
		}
		.footer-wrap .ac-btn:focus, .footer-wrap input[type=submit]:focus, .footer-wrap input[type=reset]:focus, .footer-wrap input[type=button]:focus, .footer-wrap button:focus,
		.footer-wrap .ac-btn:active, .footer-wrap input[type=submit]:active, .footer-wrap input[type=reset]:active, .footer-wrap input[type=button]:focus, .footer-wrap button:active {
			background-color: {$settings['colors_footer_buttons_bg_other']};
		}

		/* Colors - Footer Credits */
		.footer-credits {
			color: {$settings['colors_footer_credits_text']};
			background-color: {$settings['colors_footer_credits_bg']};
		}
		.footer-creds a, .footer-creds a:hover, .footer-creds a:focus, .footer-creds a:active {
			color: {$settings['colors_footer_credits_links']};
		}

		/* Colors - WooCommerce */
		mark,
		ins,
		.woocommerce ul.products li.product .price ins,
		.woocommerce div.product p.price ins,
		.woocommerce div.product span.price ins,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-handle,
		.woocommerce .widget_price_filter .ui-slider .ui-slider-range,
		.woocommerce span.onsale {
			background-color: {$settings['colors_woocommerce_accent2']};
		}
		.woocommerce ul.products li.product .price,
		.woocommerce div.product p.price,
		.woocommerce div.product span.price {
			color: {$settings['colors_woocommerce_accent']};
		}

CSS;
	}
}


/*  CSS template
/* ------------------------------------ */
if ( ! function_exists( 'businessx_czr_output_css_template' ) ) {
	function businessx_czr_output_css_template() {
		global $businessx_customizer_settings;
		$new_settings = array();

		if( ! empty( $businessx_customizer_settings ) ) {
			foreach( $businessx_customizer_settings as $bcs => $bcs_value ) {
				$new_settings[ $bcs ] = '{{ data.' . $bcs . ' }}';
			}
		}

		?>
		<script type="text/html" id="tmpl-businessx-czr-settings-output">
			<?php echo businessx_czr_output_css( $new_settings  ); ?>
		</script>
		<?php
	}
}
add_action( 'customize_controls_print_footer_scripts', 'businessx_czr_output_css_template' );