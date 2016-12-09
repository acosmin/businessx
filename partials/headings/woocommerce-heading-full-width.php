<?php
/* ------------------------------------------------------------------------- *
 *	WooCommerce heading template
/* ------------------------------------------------------------------------- */
?>

<header id="top-header" class="grid-wrap index-heading heading-full-width clearfix"<?php businessx_wc_parallax(); ?>>
	<div class="grid-overlay"></div>
    <?php do_action( 'businessx_woocom_hfw__inner_top' ); ?>
	<div class="sec-hs-elements ta-center">
		<?php do_action( 'businessx_woocom_hfw__heading_top' ); ?>
		<h1 class="hs-primary-large"><?php woocommerce_page_title(); ?></h1>
		<?php
		/**
		 * Hooked:
		 * woocommerce_taxonomy_archive_description - 10
		 * woocommerce_product_archive_description - 10
		 */
		do_action( 'woocommerce_archive_description' );

		/**
		 * Hooked:
		 * woocommerce_breadcrumb - 20
		 */
		do_action( 'businessx_woocom_hfw__heading_bottom' );
		?>
    </div>
    <?php do_action( 'businessx_woocom_hfw__inner_bottom' ); ?>
</header>

<?php do_action( 'businessx_woocom_hfw__after' ); ?>
