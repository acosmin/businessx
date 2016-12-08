<?php
/* ------------------------------------------------------------------------- *
 *  Simple Functions
/* ------------------------------------------------------------------------- */



/*  Return theme version
/* ------------------------------------ */
if ( ! function_exists( 'businessx_get_local_version' ) ) {
	function businessx_get_local_version() {
		$theme_data    = wp_get_theme();
		if( is_child_theme() ) {
			$theme_version = $theme_data->parent()->version;
		} else {
			$theme_version = $theme_data->version;
		}

		return $theme_version;
	}
}



/*  Some WooCommerce helpers
/* ------------------------------------ */

// Check if plugin is active/exists
if ( ! function_exists( 'businessx_wco_is_activated' ) ) {
	function businessx_wco_is_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
}



/*  Fallback menu
/* --------------------------------------- */
if ( ! function_exists( 'businessx_fb_menu' ) ) {
	function businessx_fb_menu() {
		return;
	}
}



/*  Echo or return an icon.
/*	You only need the icon's name witout "fa-" prefix.
/*	Example businessx_icon( "play" );
/*	Set the second parameter to false to return the icon.
/*	Example businessx_icon( "play", false );
/* ------------------------------------------------------------------------- */
if ( ! function_exists( 'businessx_icon' ) ) {
	function businessx_icon( $icon = '', $output = true, $fa_display = true ) {
		$icon_prefix = apply_filters( 'businessx_icon___prefix', 'fa-' );
		if( $fa_display ) { $fa = $icon_prefix; } else { $fa = ''; }
		if( $icon != '' ) {
			if( $output ) {
				echo '<i class="fa ' . $fa . esc_attr( $icon ) . '"></i> ';
			} else {
				return '<i class="fa ' . $fa . esc_attr( $icon ) . '"></i> ';
			}
		}
		return;
	}
}



/*  Count widgets and get their #
/*	position in sidebar
/*  Used by Businessx Extensions
/* ------------------------------------ */
if ( ! function_exists( 'businessx_get_widget_position' ) ) {
	function businessx_get_widget_position( $sidebar_name, $widget_base_ID ) {
		global $_wp_sidebars_widgets;
		if ( empty( $_wp_sidebars_widgets ) ) :
			$_wp_sidebars_widgets = get_option( 'sidebars_widgets', array() );
		endif;

		$sidebars_widgets_count = $_wp_sidebars_widgets;

		if ( isset( $sidebars_widgets_count[ $sidebar_name ] ) ) :
			$key = array_search( $widget_base_ID, $sidebars_widgets_count[ $sidebar_name ] ) + 1;
			return intval( $key );
		endif;
	}
}



/*  Output CSS classes based on a filter
/* --------------------------------------- */
if ( ! function_exists( 'businessx_occ' ) ) {
	function businessx_occ( $filter = '', $new_classes = array(), $return = false ) {
		if( $filter != '' ) {
			$classes = array();
			$classes = apply_filters( $filter, $classes );
			$new_classes = apply_filters( $filter . '_new', $new_classes );
			$new_classes = array_map( 'esc_attr', array_unique( array_merge( $classes, $new_classes ) ) );

			$output = join( ' ',  $new_classes );

			if( $return ) {
				return $new_classes;
			} else {
				echo esc_attr( $output );
			}
		} else { return ''; }
	}
}



/*  <html> tag classes
/* ------------------------------------ */
if ( ! function_exists( 'businessx_html_tag_classes' ) ) {
	function businessx_html_tag_classes() {
		$check_preloader = apply_filters( 'businessx_html_tag_classes___check', get_theme_mod( 'preloader_enable', false ) );
		$classes = array();

		if( $check_preloader ) {
			$classes[] = 'bx-preloader';
		}

		if( has_filter( 'businessx_html_tag_classes___filter' )) {
			$classes = apply_filters( 'businessx_html_tag_classes___filter', $classes );
		}

		$css_classes = join( ' ', $classes );

		if( ! empty( $classes ) ) {
			echo ' class="' . esc_attr( $css_classes ) . '"';
		}

	}
}



/*  Check front page template
/* ------------------------------------ */
if ( ! function_exists( 'businessx_front_pt' ) ) {
	function businessx_front_pt() {
		$template = apply_filters( 'businessx_front_pt___filter', 'template-frontpage.php' );
		if( is_page_template( $template ) ) { return true; } else { return false; }
	}
}



/*  Get heading template
/* ------------------------------------ */
if ( ! function_exists( 'businessx_get_heading_templ' ) ) {
	function businessx_get_heading_templ( $area = '', $type = '' ) {
		$new_area = str_replace( '-', '_', $area );
		$filter = (string) 'businessx_heading___' . $new_area;
		if( $area != '' && $type != '' ) {
			$part_type = apply_filters( $filter, $type );
			get_template_part( 'partials/headings/' . $area . '-heading', $part_type );
		}
	}
}



/*  Show/hide sidebars
/* ------------------------------------ */
if ( ! function_exists( 'businessx_hide_sidebar' ) ) {
	function businessx_hide_sidebar( $sidebar_type = NULL ) {
		global $post;
		$sidebar = (string) $sidebar_type;
		$post_global = get_theme_mod( 'sidebars_post_disable', false );
		$page_global = get_theme_mod( 'sidebars_page_disable', false );

		if( ! empty( $post ) ) {
			$pid = $post->ID;
			$display_sidebar = get_post_meta( $pid, "businessx_{$sidebar}_hide_sidebar", true );
		}

		if( businessx_wco_is_activated() ) {
			$wooc_global = get_theme_mod( 'sidebars_woocommerce_disable', false );

			if( is_woocommerce() ) {
				if( $wooc_global != true ) {
					if( isset( $display_sidebar ) ) {
						return (bool) $display_sidebar;
					} else {
						return false;
					}
				} else {
					return true;
				}
			}
		}

		if( is_single() ) {
			if( $post_global != true ) {
				if( isset( $display_sidebar ) ) {
					return (bool) $display_sidebar;
				} else {
					return false;
				}
			} else {
				return true;
			}
		}

		if( is_page() ) {
			if( $page_global != true ) {
				if( isset( $display_sidebar ) ) {
					return (bool) $display_sidebar;
				} else {
					return false;
				}
			} else {
				return true;
			}
		}

	}
}



/*  Parallax
/* ------------------------------------ */
// Output the necessary data to enable the Parallax effect on.

// Compatibility with older versions of Businessx Extensions
// Will remove it in the near future
if( defined( 'BUSINESSX_EXTS_VERSION' ) ) {
	if( version_compare( BUSINESSX_EXTS_VERSION, '1.0.3', '<' ) ) {
		function businessx_section_parallax( $enabled, $bgimg, $return = false ) {
			$parallax = get_theme_mod( $enabled, false );
			$output = '';
			if( $parallax ) { $output = '><div style="text-align:center; color:orange">' . esc_html__( 'If this message appears you need to update Businessx Extensions', 'businessx' ) . '</div'; }
			if( $return ) { return $output; } else { echo $output; }
		}
	}
}

// Custom headers
if ( ! function_exists( 'businessx_ch_parallax' ) ) {
	function businessx_ch_parallax( $return = false ) {
		$ch 		= get_header_image();
		$parallax 	= get_theme_mod( 'enable_parallax_custom_headers', false );
		$output		= '';

		if( ! empty( $ch ) && $parallax ) {
			$output = ' data-parallax="scroll" data-speed="0.5" data-image-src="' . esc_url( $ch ) . '"';
		}

		if( $return ) { return $output; } else { echo $output; }
	}
}

// WooCommerce category
if( businessx_wco_is_activated() ) {

if ( ! function_exists( 'businessx_wc_cat_parallax' ) ) {
	function businessx_wc_cat_parallax( $return = false ) {
		$parallax 	= get_theme_mod( 'enable_parallax_custom_headers', false );
		$output		= '';

		if( $parallax ) {
			if ( is_product_category() ) {
				$category = get_queried_object();

				$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );
				if ( $thumbnail_id ) {
					$image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
					$image = $image[0];
				} else {
					$image = '';
				}

				if ( $image ) {
					$output = ' data-parallax="scroll" data-speed="0.5" data-image-src="' . esc_url( $image ) . '"';
				}
			}
		}

		if( $return ) { return $output; } else { echo $output; }
	}
}

if ( ! function_exists( 'businessx_wc_parallax' ) ) {
	function businessx_wc_parallax( $return = false ) {
		if( businessx_wco_is_activated() ) {
			if ( is_product_category() ) {
				$category = get_queried_object();
				$thumbnail_id = get_woocommerce_term_meta( $category->term_id, 'thumbnail_id', true  );
				if ( $thumbnail_id ) { businessx_wc_cat_parallax(); } else { businessx_ch_parallax(); }
			} else {
				businessx_ch_parallax();
			}
		}
	}
}

} // WooCommerce check

// Single/Pages
if ( ! function_exists( 'businessx_sp_parallax' ) ) {
	function businessx_sp_parallax( $return = false ) {
		global $post;
		$pid 		= $post->ID;
		$size 		= apply_filters( 'businessx_sp_parallax___thumb_size', 'full' );
		$ch 		= get_header_image();
		$parallax 	= get_theme_mod( 'posts_single_featured_parallax', false );
		$output		= '';

		if ( has_post_thumbnail() && $parallax ) {
			$large_image = wp_get_attachment_image_src( get_post_thumbnail_id( $pid ), $size );
			if ( ! empty( $large_image[0] ) ) {
			   $large_image_url = $large_image[0];
			   $output = ' data-parallax="scroll" data-speed="0.5" data-image-src="' . esc_url( $large_image_url ) . '"';
			}
		}

		if( $return ) { return $output; } else { echo $output; }
	}
}

// Check if it's enbled and add a class;
if ( ! function_exists( 'businessx_parallax_check' ) ) {
	function businessx_parallax_check( $enabled, $return = false ) {
		$parallax = get_theme_mod( $enabled, false );
		if( is_customize_preview() && $parallax ) {
			if( $return ) { return ' parallaxon'; } else { echo ' parallaxon'; }
		}
	}
}



/*  Background options
/* ------------------------------------ */
// Background repeat
if ( ! function_exists( 'businessx_bg_options_repeat' ) ) {
	function businessx_bg_options_repeat() {
		$options = apply_filters( 'businessx_bg_options___repeat', $options = array(
			'repeat' 	=> esc_html_x( 'repeat', 'image background repeat', 'businessx' ),
			'repeat-x' 	=> esc_html_x( 'repeat-x', 'image background repeat', 'businessx' ),
			'repeat-y' 	=> esc_html_x( 'repeat-y', 'image background repeat', 'businessx' ),
			'no-repeat' => esc_html_x( 'no-repeat', 'image background repeat', 'businessx' ),
			'initial' 	=> esc_html_x( 'initial', 'image background repeat', 'businessx' ),
		) );

		return $options;
	}
}

// Background position
if ( ! function_exists( 'businessx_bg_options_position' ) ) {
	function businessx_bg_options_position() {
		$options = apply_filters( 'businessx_bg_options___position', $options = array(
			'left top' 		=> esc_html_x( 'left top', 'image background position', 'businessx' ),
			'left center' 	=> esc_html_x( 'left center', 'image background position', 'businessx' ),
			'left bottom' 	=> esc_html_x( 'left bottom', 'image background position', 'businessx' ),
			'right top' 	=> esc_html_x( 'right top', 'image background position', 'businessx' ),
			'right center' 	=> esc_html_x( 'right center', 'image background position', 'businessx' ),
			'right bottom' 	=> esc_html_x( 'right bottom', 'image background position', 'businessx' ),
			'center top' 	=> esc_html_x( 'center top', 'image background position', 'businessx' ),
			'center center'	=> esc_html_x( 'center center', 'image background position', 'businessx' ),
			'center bottom'	=> esc_html_x( 'center bottom', 'image background position', 'businessx' ),
		) );

		return $options;
	}
}

// Background size
if ( ! function_exists( 'businessx_bg_options_size' ) ) {
	function businessx_bg_options_size() {
		$options = apply_filters( 'businessx_bg_options___size', $options = array(
			'auto' 		=> esc_html_x( 'auto', 'image background size', 'businessx' ),
			'cover'		=> esc_html_x( 'cover', 'image background size', 'businessx' ),
			'contain' 	=> esc_html_x( 'contain', 'image background size', 'businessx' ),
		) );

		return array_map( 'esc_attr', array_unique( $options ) );
	}
}



/*  Opacity options
/*  Used by Businessx Extensions
/* ------------------------------------ */
if ( ! function_exists( 'businessx_opacity_options' ) ) {
	function businessx_opacity_options( $multi = false, $simple = false ) {
		$options = array();

		if( ! $simple ) {
			if( $multi ) {
				$options = apply_filters( 'businessx_opacity_options___select_multi', $options = array(
					array(
						'value' 	=> "0",
						'title'		=> esc_html_x( 'Transparent', 'background opacity option', 'businessx' ),
						'disabled'	=> false
					),
					array(
						'value' 	=> '0.1',
						'title'		=> esc_html_x( '10%', 'background opacity option', 'businessx' ),
						'disabled'	=> false
					),
					array(
						'value' 	=> '0.2',
						'title'		=> esc_html_x( '20%', 'background opacity option', 'businessx' ),
						'disabled'	=> false
					),
					array(
						'value' 	=> '0.3',
						'title'		=> esc_html_x( '30%', 'background opacity option', 'businessx' ),
						'disabled'	=> false
					),
					array(
						'value' 	=> '0.4',
						'title'		=> esc_html_x( '40%', 'background opacity option', 'businessx' ),
						'disabled'	=> false
					),
					array(
						'value' 	=> '0.5',
						'title'		=> esc_html_x( '50%', 'background opacity option', 'businessx' ),
						'disabled'	=> false
					),
					array(
						'value' 	=> '0.6',
						'title'		=> esc_html_x( '60%', 'background opacity option', 'businessx' ),
						'disabled'	=> false
					),
					array(
						'value' 	=> '0.7',
						'title'		=> esc_html_x( '70%', 'background opacity option', 'businessx' ),
						'disabled'	=> false
					),
					array(
						'value' 	=> '0.8',
						'title'		=> esc_html_x( '80%', 'background opacity option', 'businessx' ),
						'disabled'	=> false
					),
					array(
						'value' 	=> '0.9',
						'title'		=> esc_html_x( '90%', 'background opacity option', 'businessx' ),
						'disabled'	=> false
					),
					array(
						'value' 	=> "1",
						'title'		=> esc_html_x( '100%', 'background opacity option', 'businessx' ),
						'disabled'	=> false
					),
				) );
			} else {
				$options = apply_filters( 'businessx_opacity_options___select', $options = array(
					'.0'		=> esc_html_x( 'Transparent', 'background opacity option', 'businessx' ),
					'0.1'		=> esc_html_x( '10%', 'background opacity option', 'businessx' ),
					'0.2'		=> esc_html_x( '20%', 'background opacity option', 'businessx' ),
					'0.3'		=> esc_html_x( '30%', 'background opacity option', 'businessx' ),
					'0.4'		=> esc_html_x( '40%', 'background opacity option', 'businessx' ),
					'0.5'		=> esc_html_x( '50%', 'background opacity option', 'businessx' ),
					'0.6'		=> esc_html_x( '60%', 'background opacity option', 'businessx' ),
					'0.7'		=> esc_html_x( '70%', 'background opacity option', 'businessx' ),
					'0.8'		=> esc_html_x( '80%', 'background opacity option', 'businessx' ),
					'0.9'		=> esc_html_x( '90%', 'background opacity option', 'businessx' ),
					'1'			=> esc_html_x( '100%', 'background opacity option', 'businessx' ),
				) );
			}
		} else {
			$options = apply_filters( 'businessx_opacity_options___select_simple', array( "0", '0.1', '0.2', '0.3', '0.4', '0.5', '0.6', '0.7', '0.8', '0.9', "1" ) );
		}

		return $options;
	}
}



/*  Converts hex to rgb vaules
/* ------------------------------------ */
if ( ! function_exists( 'businessx_hex2rgb' ) ) {
	function businessx_hex2rgb( $hex, $ret = true ) {
		$hex = str_replace( "#", "", $hex );

		if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
		}

	   	$output = $r . ',' . $g . ','. $b;

		if( $ret ) {
			return (string) $output;
		} else {
			echo (string) $output;
		}
	}
}



/*  Converts hex to rgba vaules
/* ------------------------------------ */
if ( ! function_exists( 'businessx_hex2rgba' ) ) {
	function businessx_hex2rgba($hex, $alpha = 1, $ret = true) {
		$hex = str_replace("#", "", $hex);

		if(strlen($hex) == 3) {
		  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
		  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
		  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
		} else {
		  $r = hexdec(substr($hex,0,2));
		  $g = hexdec(substr($hex,2,2));
		  $b = hexdec(substr($hex,4,2));
		}

		$output = $r . ',' . $g . ','. $b . ',' . $alpha;

		if( $ret ) {
			return (string) $output;
		} else {
			echo (string) $output;
		}
	}
}



/*  Display post terms
/* ------------------------------------ */
if ( ! function_exists( 'businessx_terms' ) ) {
	function businessx_terms( $post_id = '', $type = '' ) {
		$terms = get_the_terms( $post_id, $type );

		if ( $terms && ! is_wp_error( $terms ) ) {

			$term_links = array();

			foreach ( $terms as $term ) {
				$term_links[] = $term->name;
			}

			$output = join( ", ", $term_links );

			echo esc_html( $output );

		}
	}
}



/*  Check if Jetpack/modules are
/*  enabled
/* ------------------------------------ */
if ( ! function_exists( 'businessx_jetpack_check' ) ) {
	function businessx_jetpack_check( $module = '' ) {
		if ( class_exists( 'Jetpack' ) && in_array( $module, Jetpack::get_active_modules() ) ) {
			return true;
		} else {
			return false;
		}
	}
}



/*  Sharedaddy options
/* ------------------------------------ */
if ( ! function_exists( 'businessx_sharedaddy_type_check' ) ) {
	function businessx_sharedaddy_type_check( $type = '' ) {
		$sharedaddy = get_option( 'sharing-options' );
		if( ! empty( $sharedaddy ) ) {
			$display_on = $sharedaddy[ 'global' ][ 'show' ];
			if( in_array(  $type, $display_on, true ) ) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}
}



/*  Post meta
/* ------------------------------------ */
if ( ! function_exists( 'businessx_post_meta' ) ) {
	function businessx_post_meta( $item_pre = NULL, $item_suf = NULL, $show_more = true, $show_author = false, $show_date = true, $show_category = true, $show_sticky = true, $show_portfolio = false ) {
		global $post;
		$item_pre 	= ! empty( $item_pre ) ? $item_pre : '<li>';
		$item_suf 	= ! empty( $item_suf ) ? $item_suf : '</li>';

		$output = '';
		$show = apply_filters( 'businessx_post_meta___show', $show = array(
			'more' 		=> array(
				'show' 		=> $show_more,
				'rel'		=> 'nofollow',
				'class'		=> 'ac-btn-alt fw-bolder',
				'anchor'	=> esc_html__( 'Read More', 'businessx' )
			),
			'author' 	=> array(
				'show' 		=> $show_author,
				'pre'		=> '<span class="fs-medium">',
				'suf'		=> '</span>',
				'icon'		=> '',
				'by'		=> '<em>' . esc_html_x( 'by', 'post author', 'businessx' ) . '</em> ',
			),
			'date' 		=> array(
				'show' 		=> $show_date,
				'pre'		=> '<span class="fs-medium">',
				'suf'		=> '</span>',
				'icon'		=> 'clock-o'
			),
			'category' 	=> array(
				'show' 		=> $show_category,
				'pre'		=> '<span class="fs-medium">',
				'suf'		=> '</span>',
				'icon'		=> 'folder'
			),
			'sticky' 	=> array(
				'show' 		=> $show_sticky,
				'pre'		=> '<span class="fs-medium">',
				'suf'		=> '</span>',
				'text'		=> esc_html__( 'Sticky Post', 'businessx' ),
				'icon'		=> 'sticky-note'
			),
			'portfolio'	=> array(
				'show' 		=> $show_portfolio,
				'pre'		=> '<span class="fs-medium">',
				'suf'		=> '</span>',
				'icon'		=> 'folder'
			),
		) );
		$more 		= $show[ 'more' ];
		$author 	= $show[ 'author' ];
		$date 		= $show[ 'date' ];
		$cate 		= $show[ 'category' ];
		$portf		= $show[ 'portfolio' ];
		$sticky		= $show[ 'sticky' ];
		$authorID 	= $post->post_author;
		$categories_list = get_the_category_list( __( ', ', 'businessx' ) );

		// Show "Read More" button
		if( $more[ 'show' ] && ! is_single() ) {
			$output .=
				$item_pre . '<a href="' . esc_url( get_permalink() ) . '" rel="' . esc_attr( $more[ 'rel' ] ) . '" class="' . esc_attr( $more[ 'class' ] ) . '">' . $more[ 'anchor' ] . '</a>' . $item_suf; }

		// Show author
		if( $author[ 'show' ] ) {
			$output .= $item_pre . $author[ 'pre' ] . businessx_icon( $author[ 'icon' ], false ) . $author[ 'by' ] . get_the_author_meta( 'display_name', $authorID ) . $author[ 'suf' ] . $item_suf; }

		// Show date
		if( $date[ 'show' ] ) {
			$output .= $item_pre . $date[ 'pre' ] . businessx_icon( $date[ 'icon' ], false ) . get_the_date() . $date[ 'suf' ] . $item_suf; }

		// Show category
		if( $cate[ 'show' ] && $categories_list != '' ) {
			$output .= $item_pre . $cate[ 'pre' ] . businessx_icon( $cate[ 'icon' ], false ) . $categories_list . $cate[ 'suf' ] . $item_suf; }

		// Show portfolio
		if( businessx_jetpack_check( 'custom-content-types' ) ) {
			$portfolio_cats = get_the_term_list( $post->ID, 'jetpack-portfolio-type', '', ', ' );
			if( $portf[ 'show' ] && $portfolio_cats != '' ) {
				$output .= $item_pre . $portf[ 'pre' ] . businessx_icon( $portf[ 'icon' ], false ) . $portfolio_cats . $portf[ 'suf' ] . $item_suf; } }

		// Show sticky
		if( $sticky[ 'show' ] && is_sticky() ) {
			$output .= $item_pre . $sticky[ 'pre' ] . businessx_icon( $sticky[ 'icon' ], false ) . $sticky[ 'text' ] . $sticky[ 'suf' ] . $item_suf; }

		echo wp_kses_post( apply_filters( 'businessx_post_meta___output', $output ) );
	}
}



/*  Pagination
/* ------------------------------------ */

// Get paged value
if ( ! function_exists( 'businessx_get_paged' ) ) {
	function businessx_get_paged() {
		global $paged;
		if ( get_query_var( 'paged' ) ) :
			$paged = get_query_var( 'paged' );
		elseif ( get_query_var( 'page' ) ) :
			$paged = get_query_var( 'page' );
		else :
			$paged = 1;
		endif;

		return intval( $paged );
	}
}

// Index
if ( ! function_exists( 'businessx_paged' ) ) {
	function businessx_paged( $wrapper = '', $wrapper_close = '', $container = '', $container_close = '', $max_num_pages = '' ) {
		if ( $wrapper == '') { $wrapper_out = '<nav class="posts-pagination clearfix" role="navigation">'; } else { $wrapper_out = $wrapper; }
		if ( $container == '') { $container_out = '<div class="paging-wrap">'; } else { $container_out = $container; }
		if ( $wrapper_close == '') { $wrapper_close_out = '</nav><!-- .posts-pagination -->'; } else { $wrapper_close_out = $wrapper_close; }
		if ( $container_close == '') { $container_close_out = '</div><!-- END .paging-wrap -->'; }  else { $container_close_out = $container_close; }

		if ( '' == $max_num_pages ) {
			$max_num_pages = $GLOBALS['wp_query']->max_num_pages; }

		if ( $max_num_pages < 2 ) {
			return; }

		$pagenum_link 	= html_entity_decode( get_pagenum_link() );
		$query_args   	= array();
		$url_parts    	= explode( '?', $pagenum_link );
		$output			= '';

		if ( isset( $url_parts[1] ) ) {
			wp_parse_str( $url_parts[1], $query_args );
		}

		$pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
		$pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

		$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
		$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

		$links   = paginate_links( array(
			'base'     => $pagenum_link,
			'format'   => $format,
			'total'    => $max_num_pages,
			'current'  => businessx_get_paged(),
			'mid_size' => 1,
			'add_args' => array_map( 'urlencode', $query_args ),
			'prev_text' => _x( '&larr; Previous', 'previous articles page', 'businessx' ),
			'next_text' => _x( 'Next &rarr;', 'next articles page', 'businessx' ),
		) );

		if ( $links ) :
			echo $output .= $wrapper_out . $container_out . $links . $container_close_out . $wrapper_close_out;
		endif;
	}
}

// Post
if ( ! function_exists( 'businessx_paged_post_args' ) ) {
	function businessx_paged_post_args() {
		$args = apply_filters( 'businessx_paged_post_args___filter',
			array(
				'before'           => '<nav class="posts-pagination in-post grid-col grid-4x-col fw-bold ta-right clearfix" role="navigation"><div class="paging-wrap"><span class="page-numbers">' . esc_html__( 'Pages:', 'businessx' ) . '</span>',
				'after'            => '</div></nav>',
				'link_before'      => '<span class="page-numbers">',
				'link_after'       => '</span>',
				'next_or_number'   => 'number',
				'separator'        => ' ',
				'nextpagelink'     => _x( 'Next page', 'single view', 'businessx' ),
				'previouspagelink' => _x( 'Previous page', 'single view', 'businessx' ),
				'pagelink'         => '%',
				'echo'             => 0
			)
		);

		return (array) $args;
	}
}

// Comments
if ( ! function_exists( 'businessx_paged_comments_args' ) ) {
	function businessx_paged_comments_args() {
		$args = apply_filters( 'businessx_paged_comments_args___filter',
			array(
				'prev_text' => businessx_icon( 'arrow-left', false ) . ' ' . esc_html__( 'Older comments', 'businessx' ),
				'next_text' => esc_html__( 'Newer comments', 'businessx' ) . ' ' . businessx_icon( 'arrow-right', false ),
			)
		);

		return (array) $args;
	}
}



/*  Some Businessx Extensions helpers
/* ------------------------------------ */

// Check if Businessx Extensions is installed
if ( ! function_exists( 'businessx_check_exts_installed' ) ) {
	function businessx_check_exts_installed() {
		if ( ! function_exists( 'get_plugins' ) ) {
		    require_once ABSPATH . 'wp-admin/includes/plugin.php'; }
		$plugins   = get_plugins();
		$installed = false;

		foreach ( $plugins as $plugin ) {
			if ( 'Businessx Extensions' == $plugin['Name'] ) {
				$installed = true;
			}
		}

		return $installed;
	}
}

// Check if Businessx Extensions plugin exists
if ( ! function_exists( 'businessx_check_exts_state' ) ) {
	function businessx_check_exts_state() {
		if( function_exists( 'businessx_extensions_sections' ) ) {
			return true;
		} else {
			return false;
		}
	}
}

// Plugin install url
if ( ! function_exists( 'businessx_create_exts_install_url' ) ) {
	function businessx_create_exts_install_url() {
		$plugin_slug = 'businessx-extensions';
		$plugin_install_url = add_query_arg(
			array(
				'action' => 'install-plugin',
				'plugin' => $plugin_slug,
			),
			self_admin_url( 'update.php' )
		);
		$nonce_key = 'install-plugin_' . $plugin_slug;
		return $plugin_install_url = wp_nonce_url( $plugin_install_url, $nonce_key );
	}
}

// Hide or show installer - section active_callback
if ( ! function_exists( 'businessx_installer_sec_callback' ) ) {
    function businessx_installer_sec_callback() {
        $notice = get_theme_mod( 'dismiss_ext_notice', false );
        return ( $notice ? false : true );
    }
}

// Sets a theme mod to remember if the user selected to dismiss the
// installer message.
if ( ! function_exists( 'businessx_dismiss_ext_action' ) ) {
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
}
add_action( 'wp_ajax_businessx_dismiss_ext', 'businessx_dismiss_ext_action' );
add_action( 'wp_ajax_nopriv_businessx_dismiss_ext', 'businessx_dismiss_ext_action' );
