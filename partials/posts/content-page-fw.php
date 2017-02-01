<?php
/* ------------------------------------------------------------------------- *
 *  Full width page template for page view
/* ------------------------------------------------------------------------- */

$e_magazine_current_page_fw_id = get_queried_object_id();

do_action( 'businessx_page_fw_article_before', $e_magazine_current_page_fw_id ); ?>

<section id="page-<?php the_ID(); ?>" class="<?php businessx_occ( 'businessx_page_fw___section_classes', array( 'page-fw' ) ); ?>">
	<?php
	// Page content
	the_content();
	?>
</section>

<?php
do_action( 'businessx_page_fw_article_after', $e_magazine_current_page_fw_id );
