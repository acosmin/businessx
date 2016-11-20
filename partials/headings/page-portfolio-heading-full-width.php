<?php
/* ------------------------------------------------------------------------- *
 *	Portfolio Page heading template
/* ------------------------------------------------------------------------- */
?>

<header id="top-header-<?php the_ID(); ?>" class="grid-wrap page-heading heading-full-width clearfix"<?php businessx_sp_parallax(); ?>>
	<div class="grid-overlay"></div>
    <?php do_action( 'businessx_ppohfw__inner_top' ); ?>
	<div class="sec-hs-elements ta-center">
    	<?php do_action( 'businessx_ppohfw__heading_top' ); ?>
    	<h1 class="hs-primary-large"><?php echo esc_html( businessx_portfolio_heading_title() ); ?></h1>
        <?php do_action( 'businessx_ppohfw__heading_bottom' ); ?>
    </div>
    <?php do_action( 'businessx_ppohfw__inner_bottom' ); ?>
</header>

<?php do_action( 'businessx_ppohfw__after' ); ?>
