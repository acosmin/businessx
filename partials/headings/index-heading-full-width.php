<?php
/* ------------------------------------------------------------------------- *
 *	Index heading template					
/* ------------------------------------------------------------------------- */
?>

<header id="top-header" class="grid-wrap index-heading heading-full-width clearfix"<?php businessx_ch_parallax(); ?>>
	<div class="grid-overlay"></div>
    <?php do_action( 'businessx_ihfw__inner_top' ); ?>
	<div class="sec-hs-elements ta-center">
    	<?php do_action( 'businessx_ihfw__heading_top' ); ?>
    	<h2 class="hs-primary-large"><?php echo esc_html( businessx_heading_title() ); ?></h2>
        <?php do_action( 'businessx_ihfw__heading_bottom' ); ?>
    </div>
    <?php do_action( 'businessx_ihfw__inner_bottom' ); ?>
</header>

<?php do_action( 'businessx_ihfw__after' ); ?>