<?php
/* ------------------------------------------------------------------------- *
 *	Index blog post template
/* ------------------------------------------------------------------------- */
?>
<article <?php post_class(); ?> title="<?php printf( esc_html__( 'Blog post: %s', 'businessx' ), the_title_attribute('echo=0') ); ?>">
	<?php if( has_post_thumbnail( get_the_ID() ) ) { ?>
    <figure class="entry-thumbnail">
    	<a href="<?php echo esc_url( get_permalink() ); ?>" rel="nofollow"><?php echo get_the_post_thumbnail( get_the_ID(), apply_filters( 'businessx_blog_index___thumbnail_size', 'businessx-tmb-blog-normal' ) ); ?></a>
        <?php do_action( 'businessx_blog_index___inner_thumbnail' ); ?>
    </figure><?php } ?>
	<div class="entry-info">
		<?php the_title( sprintf( '<h2 class="entry-title hs-secondary-large"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
        <div class="entry-excerpt">
        	<?php the_excerpt(); ?>
        </div>
        <?php do_action( 'businessx_post_index__footer_meta' ); // Hooked: businessx_index_post_meta_footer() - 10 ?>
    </div>
</article>
