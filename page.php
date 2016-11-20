<?php
/* ------------------------------------------------------------------------- *
 * Page template
/* ------------------------------------------------------------------------- */

/**
 * Filtered CSS classes
 * ------
 * section: grid-wrap
 * div: grid-container grid-1 padding-small clearfix
 * main: grid-col grid-posts-col site-page clearfix
 * ------
 */

// Header and Footer templates
$businessx_header_tmpl = apply_filters( 'businessx_header___tmpl', '' );
$businessx_footer_tmpl = apply_filters( 'businessx_footer___tmpl', '' );

// Header
get_header( $businessx_header_tmpl );

// Title
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
// Footer
get_footer( $businessx_footer_tmpl ); ?>
