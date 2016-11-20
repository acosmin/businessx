<?php
/* ------------------------------------------------------------------------- *
 * Sidebar template
/* ------------------------------------------------------------------------- */

/**
 * Filtered CSS classes
 * ------
 * div#sidebar-index: grid-col grid-sidebar-col last-col sidebar clearfix
 * ------
 */

?>
<div id="sidebar-index" role="complementary" class="<?php businessx_occ( 'businessx_sidebar___default_classes' ); ?>">
	<?php
	do_action( 'businessx_sidebar__index_top' );

		// Display widgets
		if ( is_active_sidebar( 'sidebar-index' ) ) {
			dynamic_sidebar( 'sidebar-index' );
		} else {
			businessx_sidebars_demo_widgets( __( 'Index Sidebar', 'businessx' ) );
		}

	do_action( 'businessx_sidebar__index_bottom' );
	?>
</div>
