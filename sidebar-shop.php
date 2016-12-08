<?php
/* ------------------------------------------------------------------------- *
 * Sidebar - Shop template
/* ------------------------------------------------------------------------- */

/**
 * Filtered CSS classes
 * ------
 * div#sidebar-single: grid-col grid-sidebar-col last-col sidebar sidebar-shop clearfix
 * ------
 */

if( ! businessx_hide_sidebar( 'product' ) ) :
?>
<div id="sidebar-shop" role="complementary" class="<?php businessx_occ( 'businessx_sidebar___shop_classes' ); ?>">
	<?php
	do_action( 'businessx_sidebar_shop__index_top' );

		// Display widgets
		if ( is_active_sidebar( 'sidebar-shop' ) ) {
			dynamic_sidebar( 'sidebar-shop' );
		} else {
			businessx_sidebars_demo_widgets( __( 'Shop Sidebar', 'businessx' ) );
		}

	do_action( 'businessx_sidebar_shop__index_bottom' );
	?>
</div>
<?php endif; ?>
