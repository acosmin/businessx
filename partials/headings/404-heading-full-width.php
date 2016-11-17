<?php
/* ------------------------------------------------------------------------- *
 *	404 heading template
/* ------------------------------------------------------------------------- */
?>

<header id="top-header" class="grid-wrap index-heading heading-full-width clearfix"<?php businessx_ch_parallax(); ?>>
	<div class="grid-overlay"></div>
    <?php do_action( 'businessx_404hfw__inner_top' ); ?>
	<div class="sec-hs-elements ta-center">
    	<?php do_action( 'businessx_404hfw__heading_top' ); ?>
        <h1 class="hs-primary-large"><?php _e( 'Oops! That page can&rsquo;t be found.', 'businessx' ); ?></h1>
        <?php do_action( 'businessx_404hfw__heading_bottom' ); ?>
    </div>
    <?php do_action( 'businessx_404hfw__inner_bottom' ); ?>
</header>

<?php do_action( 'businessx_404hfw__after' ); ?>
