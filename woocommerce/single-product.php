<?php
/**
 * The Template for displaying all single products
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$businessx_header_tmpl = apply_filters( 'businessx_header___tmpl', '' );
$businessx_footer_tmpl = apply_filters( 'businessx_footer___tmpl', '' );

get_header( $businessx_header_tmpl ); ?>

	<?php
	if ( apply_filters( 'woocommerce_show_page_title', true ) ) :
		businessx_get_heading_templ( 'woocommerce-single', 'full-width' );
	endif;
	?>

	<?php
		/**
		 * woocommerce_before_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 */
		do_action( 'woocommerce_before_main_content' );
	?>
		<main id="main" class="<?php businessx_occ( 'businessx_wc_single___main_classes' ); ?>" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php wc_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

		</main>

		<?php
			/**
			 * woocommerce_sidebar hook.
			 *
			 * @hooked woocommerce_get_sidebar - 10
			 */
			do_action( 'woocommerce_sidebar' );
		?>

	<?php
		/**
		 * woocommerce_after_main_content hook.
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action( 'woocommerce_after_main_content' );
	?>

<?php get_footer( $businessx_footer_tmpl ); ?>
