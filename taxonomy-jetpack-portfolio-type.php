<?php
/* ------------------------------------------------------------------------- *
 * Portfolio Type Template
/* ------------------------------------------------------------------------- */

/**
 * Filtered CSS classes
 * ------
 * section#section-portfolio-page: grid-wrap sec-portfolio
 * div#container: grid-container grid-1 padding-small clearfix
 * div#sec-portfolio-wrap: js-masonry grid-masonry-wrap
 * ------
 */

// Header and Footer templates
$businessx_header_tmpl = apply_filters( 'businessx_header___tmpl', '' );
$businessx_footer_tmpl = apply_filters( 'businessx_footer___tmpl', '' );

// Header
get_header( $businessx_header_tmpl );

// Variables
$bx_pp_id = apply_filters( 'businessx_portfolio_page_masonry_script___id', 'sec-portfolio-wrap' );

// Title
businessx_get_heading_templ( 'archive', 'full-width' );
?>

<section id="section-portfolio-page" class="<?php businessx_occ( 'businessx_portfolio_page___section_classes' ); ?>">
	<?php do_action( 'businessx_portfolio_page__inner_wrapper_top' ); ?>
	<div class="<?php businessx_occ( 'businessx_portfolio_page___container_classes' ); ?>">
	<?php do_action( 'businessx_portfolio_page__inner_container_top' ); ?>
		<div id="<?php echo esc_attr( $bx_pp_id ); ?>" class="<?php businessx_occ( 'businessx_portfolio_page___wrap_classes' ); ?>" data-masonry-options='<?php businessx_portfolio_page_masonry_options(); ?>'>
		<?php do_action( 'businessx_portfolio_page__inner_items_wrap_top' ); ?>

			<?php
			if( businessx_jetpack_check( 'custom-content-types' ) ) :

			if ( have_posts() ) : while ( have_posts() ) : the_post();

				// Get portfolio item template
				get_template_part( 'partials/posts/content', apply_filters( 'businessx_portfolio_page___templ', 'portfolio-page' ) );

			endwhile;
				if( $wp_query->max_num_pages > 1 ) { echo '<div class="grid-col grid-4x-col sec-portfolio-pmt"></div>'; }
				businessx_paged( '<nav class="posts-pagination grid-col grid-4x-col fw-bold ta-center clearfix" role="navigation">', '', '', '', $wp_query->max_num_pages );
			else :
			?>
			<p class="ta-center grid-col msg-info alert alert-warning">
				<?php printf( __( 'Ready to publish your first project? <a href="%1$s">Get started here</a>.', 'businessx' ), esc_url( admin_url( 'post-new.php?post_type=jetpack-portfolio' ) ) ); ?>
			</p>
			<?php
				endif; // Query
				else : // If Jetpack or Portfolio module isn't enabled
			?>
			<p class="ta-center grid-col msg-info alert alert-warning"><?php _e( 'You need Jetpack - Portfolio module enabled to use this section.', 'businessx' ); ?></p>
			<?php
			endif; // JetPack check
			?>
		<?php do_action( 'businessx_portfolio_page__inner_items_wrap_bottom' ); ?>
		</div>
	<?php do_action( 'businessx_portfolio_page__inner_container_bottom' ); ?>
	</div>
    <?php do_action( 'businessx_portfolio_page__inner_wrapper_bottom' ); ?>
</section>
<?php  do_action( 'businessx_portfolio_page__after_wrapper' ); ?>

<?php
// Footer
get_footer( $businessx_footer_tmpl ); ?>
