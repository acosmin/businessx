<?php
/* ------------------------------------------------------------------------- *
 *	Index heading - no sections template
/* ------------------------------------------------------------------------- */
?>

<?php if( current_user_can( 'edit_theme_options' ) ) { // Display this only to those with the right access ?>

<header id="top-header" class="grid-wrap index-heading heading-full-width clearfix"<?php businessx_ch_parallax(); ?>>
	<div class="grid-overlay"></div>
	<div class="sec-hs-elements ta-center">
    	<h2 class="hs-primary-large"><?php _e( 'Businessx Extensions is not activated!', 'businessx' ) ?></h2>
    </div>
</header>

<section role="main" id="content" class="grid-wrap">
	<div class="grid-container grid-1 padding-small clearfix">
    	<main id="main" class="grid-col grid-4x-col site-main clearfix" role="main">
    		<p class="alert alert-warning ta-center">
                <?php
				printf( __( 'You need %s activated to display sections. Activate the plugin first!', 'businessx' ), '<b><a href="' . esc_url( __( 'https://wordpress.org/plugins/businessx-extensions/', 'businessx' ) ) . '">' . esc_html__( 'Businessx Extensions', 'businessx' ) . '</a></b>' )
				?>
			</p>
        </main>
    </div>
</section>

<?php } else {

// Show default Page template if no access
businessx_get_heading_templ( 'page', 'full-width' );
?>

<section role="main" id="content" class="<?php businessx_occ( 'businessx_page___section_classes' ); ?>">
	<?php do_action( 'businessx_page__inner_sec_top' ); ?>

	<div class="<?php businessx_occ( 'businessx_page___container_classes' ); ?>">

		<?php do_action( 'businessx_page__inner_before' ); ?>

		<main id="main" class="<?php businessx_occ( 'businessx_page___main_classes' ); ?>" role="main">
			<?php
			while ( have_posts() ) : the_post();
				// Page template
				get_template_part( 'partials/posts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile;
			?>
		</main>

		<?php get_sidebar( apply_filters( 'businessx_sidebar___page', 'page' ) ); ?>

		<?php do_action( 'businessx_page__inner_after' ); ?>

	</div>

    <?php do_action( 'businessx_page__inner_sec_bottom' ); ?>
</section>

<?php
}
