<?php
/* ------------------------------------------------------------------------- *
 * Jetpack Portfolio template
/* ------------------------------------------------------------------------- */

/**
 * Filtered CSS classes
 * ------
 * section: grid-wrap
 * div: grid-container grid-1 padding-small clearfix
 * main: grid-col grid-posts-col site-portfolio clearfix
 * ------
 */

// Header and Footer templates
$businessx_header_tmpl = apply_filters( 'businessx_header___tmpl', '' );
$businessx_footer_tmpl = apply_filters( 'businessx_footer___tmpl', '' );

// Header
get_header( $businessx_header_tmpl );

// Title
businessx_get_heading_templ( 'portfolio', 'full-height' );
?>

<section role="main" id="content" class="<?php businessx_occ( 'businessx_portfolio___section_classes' ); ?>">
	<?php do_action( 'businessx_portfolio__inner_sec_top' ); ?>

	<div class="<?php businessx_occ( 'businessx_portfolio___container_classes' ); ?>">

		<?php do_action( 'businessx_portfolio__inner_before' ); ?>

		<main id="main" class="<?php businessx_occ( 'businessx_portfolio___main_classes' ); ?>" role="main">
			<?php
			while ( have_posts() ) : the_post();
				// Article template
			    get_template_part( 'partials/posts/content', apply_filters( 'businessx_blog_portfolio___content', 'portfolio' ) );

				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			endwhile;
			?>
		</main>

		<?php get_sidebar( apply_filters( 'businessx_sidebar___portfolio', 'portfolio' ) ); ?>

		<?php do_action( 'businessx_portfolio__inner_after' ); ?>

	</div>

    <?php do_action( 'businessx_portfolio__inner_sec_bottom' ); ?>
</section>

<?php
// Footer
get_footer( $businessx_footer_tmpl ); ?>
