<?php
/* ------------------------------------------------------------------------- *
 *  Functions
 *  ________________
 *
 *	If you want to add/edit functions please use a child theme
 *	http://codex.wordpress.org/Child_Themes
 *	________________
 *
/* ------------------------------------------------------------------------- */



/* ------------------------------------ *
 *  Define some constants
/* ------------------------------------ */
if( ! defined( 'BUSINESSX_VERSION' ) ) {
	define( 'BUSINESSX_VERSION', '1.0.3.2' ); }

if( ! defined( 'BUSINESSX_AC_URL' ) ) {
	define( 'BUSINESSX_AC_URL', 'http://www.acosmin.com/' ); }



/* ------------------------------------ *
 *  WordPress Version Compare
/* ------------------------------------ */
if ( ! function_exists( 'businessx_wp_version_compare' ) ) {
	function businessx_wp_version_compare( $wp_version = '', $compare_sign = '<' ) {
		if ( version_compare( $GLOBALS['wp_version'], $wp_version, $compare_sign ) ) {
			return true;
		} else {
			return false;
		}
	}
}



/* ------------------------------------------------------------------------- *
 *  Businessx only works in WordPress 4.5 or later.
/* ------------------------------------------------------------------------- */
if ( businessx_wp_version_compare( '4.5' ) ) {
	require get_template_directory() . '/acosmin/functions/back-compat.php';
}



/* ------------------------------------------------------------------------- *
 *  Required Files
/* ------------------------------------------------------------------------- */
require_once ( get_template_directory() . '/acosmin/customizer/customizer.php' );
require_once ( get_template_directory() . '/acosmin/functions/tgmpa.php' );
require_once ( get_template_directory() . '/acosmin/functions/sanitization.php' );
require_once ( get_template_directory() . '/acosmin/functions/icons.php' );
require_once ( get_template_directory() . '/acosmin/functions/helpers.php' );
require_once ( get_template_directory() . '/acosmin/functions/preloader.php' );
require_once ( get_template_directory() . '/acosmin/functions/post-options.php' );
require_once ( get_template_directory() . '/acosmin/functions/page-options.php' );
require_once ( get_template_directory() . '/acosmin/functions/portfolio-options.php' );
require_once ( get_template_directory() . '/acosmin/functions/recommend.php' );
require_once ( get_template_directory() . '/acosmin/functions/updater.php' );
require_once ( get_template_directory() . '/partials/partial-template-css-classes.php' );
require_once ( get_template_directory() . '/partials/partial-template-functions.php' );
require_once ( get_template_directory() . '/partials/partial-template-helpers.php' );
require_once ( get_template_directory() . '/partials/partial-template-hooks.php' );



/*  Theme setup
/* ------------------------------------ */
if ( ! function_exists( 'businessx_setup' ) ) {
	function businessx_setup() {

		// Make BusinessX available for translation.
		load_theme_textdomain( 'businessx', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1200, 0, true );
		add_image_size( 'businessx-tmb-portfolio', 630, 415, true );
		add_image_size( 'businessx-tmb-blog-wide', 594 );
		add_image_size( 'businessx-tmb-blog-normal', 250, 250, true );

		// Register locations for your menus
		register_nav_menus( array(
			'primary' 	=> __( 'Primary Menu', 'businessx' ),
			'actions'	=> __( 'Actions Menu', 'businessx' ),
			'footer' 	=> __( 'Footer Menu', 'businessx' )
		) );

		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Custom logo
		add_theme_support( 'custom-logo', apply_filters( 'businessx_custom_logo___options', array(
			'height'      => 100,
			'width'       => 200,
			'flex-height' => true,
			'flex-width'  => true,
			'header-text' => array( 'site-title' ),
		) ) );

		// Enable support for Custom_Headers
		add_theme_support( 'custom-header', apply_filters( 'businessx_custom_header___options', array(
			'width'         => 1900,
			'height'        => 800,
			'flex-height'   => true,
			'flex-width'    => true,
			'header-text' 	=> false
		)));

		// This theme uses its own gallery styles.
		add_filter( 'use_default_gallery_style', '__return_false' );

		// Globals
		global $businessx_sections, $businessx_info;

		// Some info
		$businessx_info = apply_filters( 'businessx_info', array(
			'base_font_size' 	=> 18
		) );

		// Add front-page sections positions
		$sections_position 		= get_theme_mod( 'businessx_sections_position' );
		$businessx_sections 	= apply_filters( 'businessx_sections_filter', array() );

		if( empty( $sections_position ) && ! empty( $businessx_sections ) ) {
			$sections = array();
			foreach( $businessx_sections as $key => $value ) {
				$sections[] = 'businessx_section__' . $value;
			}
			set_theme_mod( 'businessx_sections_position', $sections );
		}

		// Widgets selective refresh
		add_theme_support( 'customize-selective-refresh-widgets' );

	}
}
add_action( 'after_setup_theme', 'businessx_setup' );



/*  Handles JavaScript detection.
/* ------------------------------------ */
function businessx_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'businessx_javascript_detection', 0 );



/*  Set the content width in pixels
/* ------------------------------------ */
if ( ! function_exists( 'businessx_content_width' ) ) {
	function businessx_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'businessx_content_width', 840 );
	}
}
add_action( 'after_setup_theme', 'businessx_content_width', 0 );



/*  Enqueues scripts and styles.
/* ------------------------------------ */
if ( ! function_exists( 'businessx_scripts' ) ) {
	function businessx_scripts() {

		// Google Fonts
		wp_enqueue_style( 'businessx-fonts', businessx_fonts_setup(), array(), null );

		// Theme stylesheet
		wp_enqueue_style( 'businessx-style', get_stylesheet_uri(), array(), BUSINESSX_VERSION );

		// Font Awesome
		wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/icons/css/font-awesome.min.css', array(), '4.6.3', 'all' );

		// Javascript
		wp_enqueue_script( 'businessx-scripts', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '20160412', true );

		// Masonry
		if( is_page_template( 'template-frontpage.php') || businessx_jetpack_check( 'custom-content-types' ) ) {
		wp_enqueue_script( 'jquery-masonry' ); };

		// Comments Script
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }

		// Some variables
		wp_localize_script(
			'businessx-scripts',
			'businessx_scripts_data',
			apply_filters( 'businessx_frontend_js_data_filter', array(
				/* Search form placeholder */
				'bx_search_placeholder'	=> esc_html__( 'Type the keywords you are searching for', 'businessx' ),
			) )
		);

	}
}
add_action( 'wp_enqueue_scripts', 'businessx_scripts' );



/*  Enqueues admin scripts and styles.
/* ------------------------------------ */
if ( ! function_exists( 'businessx_admin_scripts' ) ) {
	function businessx_admin_scripts() {
		// CSS Files
		wp_enqueue_style(  'businessx-admin-style', get_template_directory_uri() . '/assets/css/admin/admin.css', array(), '20160412', 'all' );

		// JS Files
		wp_enqueue_script(  'businessx-admin-scripts', get_template_directory_uri() . '/assets/js/admin/admin.js', array(), '20160412', FALSE );
	}
}
add_action( 'admin_enqueue_scripts', 'businessx_admin_scripts' );



/*  Widgets and Sidebars Setup
/* ------------------------------------ */
if ( ! function_exists( 'businessx_sidebars_and_widgets' ) ) {
	function businessx_sidebars_and_widgets() {

		// Normal sidebars
		register_sidebar( array( // Index sidebar
			'name'          => __( 'Index Sidebar', 'businessx' ),
			'id'            => 'sidebar-index',
			'description'   => __( 'Index Sidebar', 'businessx' ),
			'before_widget' => '<aside id="%1$s" class="%2$s widget clearfix">',
			'after_widget'  => '</aside><!-- END .widget -->',
			'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
			'after_title'   => '</span></h3>',
		) );

		register_sidebar( array( // Posts sidebar
			'name'          => __( 'Posts Sidebar', 'businessx' ),
			'id'            => 'sidebar-single',
			'description'   => __( 'This sidebar appears when you view a post', 'businessx' ),
			'before_widget' => '<aside id="%1$s" class="%2$s widget clearfix">',
			'after_widget'  => '</aside><!-- END .widget -->',
			'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
			'after_title'   => '</span></h3>',
		) );

		register_sidebar( array( // Page sidebar
			'name'          => __( 'Page Sidebar', 'businessx' ),
			'id'            => 'sidebar-page',
			'description'   => __( 'This sidebar appears when you view a page', 'businessx' ),
			'before_widget' => '<aside id="%1$s" class="%2$s widget clearfix">',
			'after_widget'  => '</aside><!-- END .widget -->',
			'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
			'after_title'   => '</span></h3>',
		) );

		if( businessx_jetpack_check( 'custom-content-types' ) ) {
		register_sidebar( array( // Portfolio sidebar
			'name'          => __( 'Portfolio Sidebar', 'businessx' ),
			'id'            => 'sidebar-portfolio',
			'description'   => __( 'This sidebar appears when you view a Jetpack Portfolio item', 'businessx' ),
			'before_widget' => '<aside id="%1$s" class="%2$s widget clearfix">',
			'after_widget'  => '</aside><!-- END .widget -->',
			'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
			'after_title'   => '</span></h3>',
		) ); }

		// Footer sidebars
		register_sidebar( array( // Footer #1 sidebar
			'name'          => __( 'Footer #1 Sidebar', 'businessx' ),
			'id'            => 'sidebar-footer-1',
			'description'   => __( 'First footer sidebar', 'businessx' ),
			'before_widget' => '<aside id="%1$s" class="%2$s widget clearfix">',
			'after_widget'  => '</aside><!-- END .widget -->',
			'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
			'after_title'   => '</span></h3>',
		) );

		register_sidebar( array( // Footer #2 sidebar
			'name'          => __( 'Footer #2 Sidebar', 'businessx' ),
			'id'            => 'sidebar-footer-2',
			'description'   => __( 'Second footer sidebar', 'businessx' ),
			'before_widget' => '<aside id="%1$s" class="%2$s widget clearfix">',
			'after_widget'  => '</aside><!-- END .widget -->',
			'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
			'after_title'   => '</span></h3>',
		) );

		register_sidebar( array( // Footer #3 sidebar
			'name'          => __( 'Footer #3 Sidebar', 'businessx' ),
			'id'            => 'sidebar-footer-3',
			'description'   => __( 'Three footer sidebar', 'businessx' ),
			'before_widget' => '<aside id="%1$s" class="%2$s widget clearfix">',
			'after_widget'  => '</aside><!-- END .widget -->',
			'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
			'after_title'   => '</span></h3>',
		) );

	}
}
add_action( 'widgets_init', 'businessx_sidebars_and_widgets', 20 );



/*  Google fonts
/* ------------------------------------ */
if ( ! function_exists( 'businessx_fonts_setup' ) ) {
	function businessx_fonts_setup() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = apply_filters( 'businessx_fonts___subsets', $subsets = 'latin,latin-ext' );

		// Default fonts
		$fonts[] = 'Poppins:400,700,300';
		$fonts[] = 'Roboto:400,300,700,900,300italic,400italic,700italic';

		$fonts = apply_filters( 'businessx_fonts___family', $fonts );

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => urlencode( implode( '|', $fonts ) ),
				'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
		}

		return $fonts_url;

	}
}



/*  TGM - Recommended plugins
/* ------------------------------------ */
if ( ! function_exists( 'businessx_register_required_plugins' ) ) {
	function businessx_register_required_plugins() {

		$plugins = array(
			array(
				'name'      => esc_html__( 'Businessx Extensions', 'businessx' ),
				'slug'      => 'businessx-extensions',
				'required'  => false,
			),
			array(
				'name'      => esc_html__( 'Jetpack by WordPress.com', 'businessx' ),
				'slug'      => 'jetpack',
				'required'  => false,
			),
		);

		$config = array(
			'id'           => 'businessx',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'has_notices'  => true,
			'dismissable'  => true,
			'dismiss_msg'  => '',
			'is_automatic' => false,
			'message'      => '',
		);

		tgmpa( $plugins, $config );
	}
}
add_action( 'tgmpa_register', 'businessx_register_required_plugins' );
