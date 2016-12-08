<?php
/* ------------------------------------------------------------------------- *
 *  Some functions used to help around.
 *  ________________
 *
 *	If you want to add/edit functions please use a child theme
 *	http://codex.wordpress.org/Child_Themes
 *	________________
 *
/* ------------------------------------------------------------------------- */



/* ------------------------------------------------------------------------- *
 *  Demo widgets
/* ------------------------------------------------------------------------- */

// Normal sidebars
if ( ! function_exists( 'businessx_sidebars_demo_widgets' ) ) {
	function businessx_sidebars_demo_widgets( $sidebar_name = '' ) {
		$disabled = get_theme_mod( 'sidebars_demo_disable', false );
		if( ! $disabled ) {

			// Show Search widget
			the_widget( 'WP_Widget_Search' );

			// Show Recent Posts widget
			the_widget( 'WP_Widget_Recent_Posts',
				array(
					'number' => 5
				),
				array(
					'before_widget' => '<aside class="widget clearfix">',
					'after_widget'  => '</aside><!-- END .widget -->',
					'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
					'after_title'   => '</span></h3>',
				)
			);

			// Display a friendly notice
			if( $sidebar_name != '' && current_user_can( 'edit_theme_options' ) ) {
				echo '<p class="alert alert-warning ta-center widget">';
				printf( __( 'This sidebar is empty, you should add some widgets (in %s). Until then we are showing some default widgets. Only you can see this message', 'businessx' ), '<strong>' . esc_html( $sidebar_name ) . '</strong>' );
				echo '</p>';
			}

			// Show Meta widget
			the_widget( 'WP_Widget_Meta', array(),
			array(
				'before_widget' => '<aside class="widget clearfix">',
				'after_widget'  => '</aside><!-- END .widget -->',
				'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
				'after_title'   => '</span></h3>',
			) );

		}
	}
}

// Footer sidebars
if ( ! function_exists( 'businessx_footer_sidebars_demo_widgets' ) ) {
	function businessx_footer_sidebars_demo_widgets( $sidebar_name = '' ) {
		$disabled = get_theme_mod( 'sidebars_demo_disable', false );
		if( ! $disabled ) {

			switch( $sidebar_name ) :

				case 'sidebar-footer-1' :
					// Show Recent Posts widget
					the_widget( 'WP_Widget_Recent_Posts',
						array(
							'number' => 6
						),
						array(
							'before_widget' => '<aside class="widget clearfix">',
							'after_widget'  => '</aside><!-- END .widget -->',
							'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
							'after_title'   => '</span></h3>',
						)
					);
				break;

				case 'sidebar-footer-2' :
					// Show Calendar
					the_widget( 'WP_Widget_Calendar',
						array(
							'title' => __( 'Calendar', 'businessx' ),
						),
						array(
							'before_widget' => '<aside class="widget clearfix">',
							'after_widget'  => '</aside><!-- END .widget -->',
							'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
							'after_title'   => '</span></h3>',
						)
					);
				break;

				case 'sidebar-footer-3' :
					// Show Text Widget
					if( current_user_can( 'edit_theme_options' ) ) {
						the_widget( 'WP_Widget_Text',
							array(
								'title' => esc_html__( 'Demo Widgets', 'businessx' ),
								'text' => __( '<p>These are <strong>demo widgets</strong>, you can add your own in this sidebars: Footer #1 Sidebar, Footer #2 Sidebar and Footer #3 Sidebar.</p><p>You can also disable this entire section (widgetized footer) from <em>Customizer > Settings > Footer > Disable footer sidebars.</em></p><p>Simple stuff :D</p>', 'businessx' ),
								'filter' => true
							),
							array(
								'before_widget' => '<aside class="widget clearfix">',
								'after_widget'  => '</aside><!-- END .widget -->',
								'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
								'after_title'   => '</span></h3>',
							)
						);
					}
					the_widget( 'WP_Widget_Meta', array(),
						array(
							'before_widget' => '<aside class="widget clearfix">',
							'after_widget'  => '</aside><!-- END .widget -->',
							'before_title'  => '<h3 class="widget-title hs-secondary-smallest ls-min"><span>',
							'after_title'   => '</span></h3>',
						)
					);
				break;

				default : '';

			endswitch;

		}
	}
}



/* ------------------------------------------------------------------------- *
 *  Footer
/* ------------------------------------------------------------------------- */

/* -- Return copyright info */
if ( ! function_exists( 'businessx_return_copyright_templ' ) ) {
	function businessx_return_copyright_templ() {
		return '&copy; <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a> ' . date_i18n( 'Y' ) . '. ';
	}
}



/* ------------------------------------------------------------------------- *
 *  Animations
/* ------------------------------------------------------------------------- */
if ( ! function_exists( 'businessx_anim_classes' ) ) {
	function businessx_anim_classes( $return = false ) {
		$enable = get_theme_mod( 'animations_enable', false );
		$classes = array();
		if( ! is_customize_preview() && $enable ) {
			$classes[] = 'fader';
		}
		$classes = apply_filters( 'businessx_anim_classes___filter', $classes );
		$classes = array_map( 'esc_attr', array_unique( $classes ) );
		$output = join( ' ', $classes );

		if( $return ) {
			return $output; } else { echo $output; }
	}
}



/* ------------------------------------------------------------------------- *
 *  Headings used with custom header images
/* ------------------------------------------------------------------------- */


/* -- Index
escape on output */
if ( ! function_exists( 'businessx_heading_title' ) ) {
	function businessx_heading_title() {
		global $wp_query;
		$title = get_theme_mod( 'homepage_heading', __( 'Homepage Heading', 'businessx' ) );

		if( ( is_front_page() || is_home() ) && ! is_paged() ) {
			return $title;
		}

		if( is_paged() ) {
			printf( __( 'Page #: %s of %s', 'businessx' ), businessx_get_paged(), intval( $wp_query->max_num_pages ) );
		}

	}
}


/* -- Portfolio
escape on output */
if ( ! function_exists( 'businessx_portfolio_heading_title' ) ) {
	function businessx_portfolio_heading_title( $template = 'template-jetpack-portfolio.php' ) {

		if( is_page_template( $template ) && ! is_paged() ) {
			return get_the_title();
		}

		if( is_paged() ) {
			printf( __( 'Portfolio Page #%s', 'businessx' ), businessx_get_paged() );
		}

	}
}



/* ------------------------------------------------------------------------- *
 *  JetPack Portfolio
/* ------------------------------------------------------------------------- */


/* -- Setup Masonry args */
if ( ! function_exists( 'businessx_portfolio_page_masonry_options' ) ) {
	function businessx_portfolio_page_masonry_options() {
		$options = apply_filters(
			'businessx_portfolio_page_masonry___options',
			'{ "columnWidth": ".sec-portfolio-grid-sizer", "gutter": ".sec-portfolio-gutter-sizer", "percentPosition": true, "itemSelector": ".grid-col" }' );

		echo esc_attr( $options );
	}
}



/* ------------------------------------------------------------------------- *
 *  Get featured image and set background
/* ------------------------------------------------------------------------- */
if ( ! function_exists( 'businessx_header_bg_options' ) ) {
	function businessx_header_bg_options() {
		global $post;

		$css		= '';
		$size 		= apply_filters( 'businessx_header_bg_options___thumb_size', 'full' );
		$ch 		= get_header_image();
		$show_ch 	= false;
		$px_index	= get_theme_mod( 'enable_parallax_custom_headers', apply_filters( 'enable_parallax_custom_headers___filter', false ) );
		$px_sp		= get_theme_mod( 'enable_parallax_featured_images', apply_filters( 'enable_parallax_featured_images___filter', false ) );
		$wooheader  = false;
		$wooindex   = false;

		// Post id
		if( ! empty( $post ) ) { $pid = $post->ID; }

		// Post thumbnail
		if ( has_post_thumbnail() && ( is_page() || is_single() ) && ! $px_sp && ! empty( $post ) ) {
			$large_image = wp_get_attachment_image_src( get_post_thumbnail_id( $pid ), $size );
			if ( ! empty( $large_image[0] ) ) {
			   $large_image_url = $large_image[0];
			   $css .= ' #top-header-' . intval( $pid ) . ' { background-image: url("' . esc_url( $large_image_url ) . '"); }';
			}
		} else { $show_ch = true; }

		// WooCommerce Category thumbnail
		if( businessx_wco_is_activated() ) {
			if ( is_product_category() ) {
				$category = get_queried_object();

				$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );
				if ( $thumbnail_id ) {
					$image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
					$image = $image[0];
				} else {
					$image = false;
				}

				if ( $image ) {
					$css .= ' #top-header { background-image: url("' . esc_url( $image ) . '"); }';
					$wooheader = true;
				}
			}
			if( is_shop() ) {
				$wooindex = true;
			}
		}

		// Custom header
		if ( ! empty( $ch ) && ! businessx_front_pt() && $show_ch && ! ( is_page() || is_single() ) && ! $px_index && ! $wooheader ) {
			$css .= ' #top-header { background-image: url("' . esc_url( $ch ) . '"); }';
		}

		// Output CSS
		wp_add_inline_style( 'businessx-style', businessx_sanitize_css( $css ) );
	}
}
add_action( 'wp_enqueue_scripts', 'businessx_header_bg_options', 101 );



/* ------------------------------------------------------------------------- *
 *  Excerpt options
/* ------------------------------------------------------------------------- */


/* -- Custom excerpt length */
if ( ! function_exists( 'businessx_custom_excerpt_length' ) ) {
	function businessx_custom_excerpt_length( $length ) {
		$custom = get_theme_mod( 'posts_index_excerpt_length' );
		if( $custom != '' ) {
			$length = $custom;
			return intval( $length );
		} else {
			return $length;
		}
	}
}
add_filter( 'excerpt_length', 'businessx_custom_excerpt_length', 999 );


/* -- Custom excerpt ending */
if ( ! function_exists( 'businessx_excerpt_ending' ) ) {
	function businessx_excerpt_ending( $more ) {
		$custom = get_theme_mod( 'posts_index_excerpt_ending' );
		if( $custom != '' ) {
			$more = $custom;
			return esc_html( $more );
		} else {
			return $more;
		}
	}
}
add_filter( 'excerpt_more', 'businessx_excerpt_ending', 999 );
