<?php
/* ------------------------------------------------------------------------- *
 * Sidebar - Portfolio template
/* ------------------------------------------------------------------------- */

/**
 * Filtered CSS classes
 * ------
 * div#sidebar-single: grid-col grid-sidebar-col last-col sidebar sidebar-portfolio clearfix
 * ------
 */

if( ! businessx_hide_sidebar( 'portfolio' ) ) :
?>
<div id="sidebar-single" role="complementary" class="<?php businessx_occ( 'businessx_sidebar___portfolio_classes' ); ?>">
	<?php
	do_action( 'businessx_sidebar_single__portfolio_top' );

		// Display widgets
		if ( is_active_sidebar( 'sidebar-portfolio' ) ) {
			dynamic_sidebar( 'sidebar-portfolio' );
		} else {
			businessx_sidebars_demo_widgets( __( 'Portfolio Sidebar', 'businessx' ) );
		}

	do_action( 'businessx_sidebar_single__portfolio_bottom' );
	?>
</div>
<?php endif; ?>
