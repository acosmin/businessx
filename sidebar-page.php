<?php
/* ------------------------------------------------------------------------- *
 * Sidebar - Page template
/* ------------------------------------------------------------------------- */

/**
 * Filtered CSS classes
 * ------
 * div#sidebar-page: grid-col grid-sidebar-col last-col sidebar sidebar-page clearfix
 * ------
 */

if( ! businessx_hide_sidebar( 'page' ) ) :
?>
<div id="sidebar-page" role="complementary" class="<?php businessx_occ( 'businessx_sidebar___page_classes' ); ?>">
	<?php
	do_action( 'businessx_sidebar_page__index_top' );

		// Display widgets
		if ( is_active_sidebar( 'sidebar-page' ) ) {
			dynamic_sidebar( 'sidebar-page' );
		} else {
			businessx_sidebars_demo_widgets( __( 'Page Sidebar', 'businessx' ) );
		}

	do_action( 'businessx_sidebar_page__index_bottom' );
	?>
</div>
<?php endif; ?>
