<?php
/* ------------------------------------------------------------------------- *
 *	Portfolio archive heading template
/* ------------------------------------------------------------------------- */
?>

<header id="top-header" class="grid-wrap index-heading heading-full-width clearfix"<?php businessx_ch_parallax(); ?>>
	<div class="grid-overlay"></div>
    <?php do_action( 'businessx_ahfw__inner_top' ); ?>
	<div class="sec-hs-elements ta-center">
    	<?php do_action( 'businessx_ahfw__heading_top' ); ?>
			<?php the_archive_title( '<h1 class="hs-primary-large">', '</h1>' ); ?>
        <?php do_action( 'businessx_ahfw__heading_bottom' ); ?>
    </div>
    <?php do_action( 'businessx_ahfw__inner_bottom' ); ?>
</header>

<?php do_action( 'businessx_ahfw__after' ); ?>
