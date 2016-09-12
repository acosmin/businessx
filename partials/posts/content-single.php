<?php
/* ------------------------------------------------------------------------- *
 *  Default post template for single view (post)
/* ------------------------------------------------------------------------- */

do_action( 'businessx_single_article_before' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		do_action( 'businessx_single_content_before' );
			the_content(); 
		do_action( 'businessx_single_content_after' );
	?>
</article>

<?php 
do_action( 'businessx_single_article_after' );
?>