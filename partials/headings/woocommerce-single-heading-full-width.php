<?php
/* ------------------------------------------------------------------------- *
 *	WooCommerce single heading template
/* ------------------------------------------------------------------------- */
?>

<header id="top-header-<?php the_ID(); ?>" class="grid-wrap single-heading heading-full-width clearfix"<?php businessx_sp_parallax(); ?>>
	<div class="grid-overlay"></div>
    <?php do_action( 'businessx_woocom_shfw__inner_top' ); ?>
	<div class="sec-hs-elements ta-center">
    	<?php do_action( 'businessx_woocom_shfw__heading_top' ); ?>
    	<?php the_title( '<h1 itemprop="name" class="hs-primary-large">', '</h1>' ); ?>
        <?php
		/**
		 * Hooked:
		 * woocommerce_breadcrumb - 20
		 */
		do_action( 'businessx_woocom_shfw__heading_bottom' );
		?>
    </div>
    <?php do_action( 'businessx_woocom_shfw__inner_bottom' ); ?>
</header>

<?php do_action( 'businessx_woocom_shfw__after' ); ?>
