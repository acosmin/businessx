<?php
/* ------------------------------------------------------------------------- *
 *  Partial Template Hooks
 *  ________________
 *
 *	If you want to add/edit functions please use a child theme
 *	http://codex.wordpress.org/Child_Themes
 *	________________
 *
/* ------------------------------------------------------------------------- */



/* ------------------------------------------------------------------------- *
 *  Header
/* ------------------------------------------------------------------------- */

/* -- Header Before */
add_action( 'businessx_header__before', 'businessx_header_placeholder', 0 ); // Add a placeholder for the menu, when fixed.

/* -- Header After */
add_action( 'businessx_header__after', 'businessx_search_display', 0 ); // Search overlay - when header search button is clicked

/* -- Header Main Wrapper */
add_action( 'businessx_main__header', 'businessx_logo_display', 10, 1 ); // Add logo, text or image.
add_action( 'businessx_main__header', 'businessx_menu_main_area', 20 ); // Displays the main menu.
add_action( 'businessx_main__header', 'businessx_menu_actions_area', 30 ); // Wrapper for the right side menu

/* -- Header / Action Buttons style 1 */
add_action( 'businessx_header__action_btns_1', 'businessx_menu_action_btns', 11 ); // Action buttons menu - right side

/* -- Header / Action Buttons style 2 */
add_action( 'businessx_header__action_btns_2', 'businessx_search_button', 10 ); // Action buttons - search
add_action( 'businessx_header__action_btns_2', 'businessx_mobile_menu_button', 20 ); // Action buttons - mobile menu



/* ------------------------------------------------------------------------- *
 *  Footer
/* ------------------------------------------------------------------------- */

/* -- Footer Wrapper */
add_action( 'businessx_main__footer', 'businessx_footer_widgets_wrapper', 10 ); // Displays footer sidebars columns wrapper
add_action( 'businessx_main__footer', 'businessx_footer_creds_wrapper', 20 ); // Displays footer credits wrapper

/* -- Footer Sidebars */
add_action( 'businessx_footer__sidebars', 'businessx_footer_sidebar_1', 10 ); // Footer sidebar #1
add_action( 'businessx_footer__sidebars', 'businessx_footer_sidebar_2', 20 ); // Footer sidebar #2
add_action( 'businessx_footer__sidebars', 'businessx_footer_sidebar_3', 30 ); // Footer sidebar #3

/* -- Footer Credits */
add_action( 'businessx_footer__creds', 'businessx_logo_display', 10, 1 ); // Add logo, text or image
add_action( 'businessx_footer__creds', 'businessx_footer_creds_menu', 20 ); // Displays a menu in the footer
add_action( 'businessx_footer__creds', 'businessx_footer_creds_copyright', 30 ); // Displays theme developer & website owner credits



/* ------------------------------------------------------------------------- *
 *  Posts & Pages
/* ------------------------------------------------------------------------- */

/* -- Single/Page pagination */
add_action( 'businessx_page_article_after', 'businessx_post_page_pagination', 11 );  // If page has multiple pages, add pagination

/* -- Single - After content */
add_action( 'businessx_single_content_after', 'businessx_post_page_pagination', 5 ); // If post has multiple pages, add pagination
add_action( 'businessx_single_content_after', 'businessx_single_tags_display', 10 ); // Displays a list of tags for this post

/* -- Index - Post meta footer */
add_action( 'businessx_post_index__footer_meta', 'businessx_index_post_meta_footer', 10 ); // Index post - footer meta wrapper
add_action( 'businessx_index__post_meta', 'businessx_post_meta', 10 ); // Index post - footer meta info



/* ------------------------------------------------------------------------- *
 *  Portfolio
/* ------------------------------------------------------------------------- */

if( businessx_jetpack_check( 'custom-content-types' ) ) : // Check if Jetpack is active

/* -- Project after content */
add_action( 'businessx_portfolio_content_after', 'businessx_portfolio_tags_display', 0 ); // Displays a list of tags for this project

/* -- Projects loop inner top */
add_action( 'businessx_portfolio_page__inner_items_wrap_top', 'businessx_portfolio_page_masonry_sizers' ); // Output masonry sizers

/* -- Projects container inner bottom */
add_action( 'businessx_portfolio_page__inner_container_bottom', 'businessx_portfolio_page_masonry_script' ); // Output masonry script

endif; // Jetpack check