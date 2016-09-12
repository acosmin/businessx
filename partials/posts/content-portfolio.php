<?php
/* ------------------------------------------------------------------------- *
 *  Default portfolio template for single view (portfolio)
/* ------------------------------------------------------------------------- */

do_action( 'businessx_portfolio_article_before' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php 
		do_action( 'businessx_portfolio_content_before' );
			the_content(); 
		do_action( 'businessx_portfolio_content_after' );
	?>
</article>

<?php 
do_action( 'businessx_portfolio_article_after' );
?>