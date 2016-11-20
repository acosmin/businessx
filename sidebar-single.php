<?php
/* ------------------------------------------------------------------------- *
 * Sidebar - Single template
/* ------------------------------------------------------------------------- */

/**
 * Filtered CSS classes
 * ------
 * div#sidebar-single: grid-col grid-sidebar-col last-col sidebar sidebar-single clearfix
 * ------
 */

if( ! businessx_hide_sidebar( 'single' ) ) :
?>
<div id="sidebar-single" role="complementary" class="<?php businessx_occ( 'businessx_sidebar___single_classes' ); ?>">
	<?php
	do_action( 'businessx_sidebar_single__index_top' );

		// Display widgets
		if ( is_active_sidebar( 'sidebar-single' ) ) {
			dynamic_sidebar( 'sidebar-single' );
		} else {
			businessx_sidebars_demo_widgets( __( 'Posts Sidebar', 'businessx' ) );
		}

	do_action( 'businessx_sidebar_single__index_bottom' );
	?>
</div>
<?php endif; ?>
