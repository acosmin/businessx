<?php
/* ------------------------------------------------------------------------- *
 *  Default page template for page view
/* ------------------------------------------------------------------------- */

do_action( 'businessx_page_article_before' );
?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		do_action( 'businessx_page_content_before' );
			the_content();
		do_action( 'businessx_page_content_after' );
	?>
</article>

<?php
do_action( 'businessx_page_article_after' );
?>