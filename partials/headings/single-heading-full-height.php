<?php
/* ------------------------------------------------------------------------- *
 *	Single heading template
/* ------------------------------------------------------------------------- */
?>

<header id="top-header-<?php the_ID(); ?>" class="grid-wrap single-heading heading-full-height clearfix"<?php businessx_sp_parallax(); ?>>
	<div class="grid-overlay"></div>
    <?php do_action( 'businessx_shfh__inner_top' ); ?>
	<div class="sec-hs-elements ta-center">
    	<?php do_action( 'businessx_shfh__heading_top' ); ?>
    	<?php the_title( '<h1 class="hs-primary-large">', '</h1>' ); ?>
        <?php do_action( 'businessx_shfh__heading_bottom' ); ?>
    </div>
    <?php do_action( 'businessx_shfh__middle' ); ?>

    <?php if( ! get_theme_mod( 'posts_single_hide_meta', false ) ) : ?>
    <div class="grid-container info-full clearfix">
    	<?php do_action( 'businessx_shfh__info_top' ); ?>
    	<ul class="entry-meta-list clearfix">
			<?php businessx_post_meta( '', '', true, true ); ?>
		</ul>
        <?php do_action( 'businessx_shfh__info_middle' ); ?>
        <?php if( ! get_theme_mod( 'posts_single_comments_nr', false ) ) : ?>
        <ul class="entry-meta-list eml-right clearfix">
			<li><span class="fs-medium"><?php businessx_icon( 'comments' ); ?><a href="<?php esc_url( comments_link() ) ?>"><?php comments_number(); ?></a></span></li>
		</ul><?php endif; ?>
        <?php do_action( 'businessx_shfh__info_bottom' ); ?>
	</div>
    <?php endif; ?>

    <?php do_action( 'businessx_shfh__inner_bottom' ); ?>
</header>

<?php do_action( 'businessx_shfh__after' ); ?>
