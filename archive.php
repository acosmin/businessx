<?php
/* ------------------------------------------------------------------------- *
 * Archive template
/* ------------------------------------------------------------------------- */

/**
 * Filtered CSS classes
 * ------
 * section: grid-wrap
 * div: grid-container grid-1 padding-small clearfix
 * main: grid-col grid-posts-col site-main clearfix
 * ------
 */

// Header and Footer templates
$businessx_header_tmpl = apply_filters( 'businessx_header___tmpl', '' );
$businessx_footer_tmpl = apply_filters( 'businessx_footer___tmpl', '' );

// Header
get_header( $businessx_header_tmpl );

// Title
businessx_get_heading_templ( 'archive', 'full-width' );
?>

<section role="main" id="content" class="<?php businessx_occ( 'businessx_index___section_classes' ); ?>">
	<?php do_action( 'businessx_index__inner_sec_top' ); ?>

	<div class="<?php businessx_occ( 'businessx_index___container_classes' ); ?>">

        <?php do_action( 'businessx_index__inner_before' ); ?>

		<main id="main" class="<?php businessx_occ( 'businessx_index___main_classes' ); ?>" role="main">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();
					get_template_part( 'partials/posts/content', get_post_format() );
				endwhile;
				businessx_paged( '<nav class="posts-pagination grid-col grid-4x-col fw-bold ta-right clearfix" role="navigation">' );
			else :
				get_template_part( 'partials/posts/content', 'none' );
			endif;
			?>
		</main>

        <?php get_sidebar(); ?>

        <?php do_action( 'businessx_index__inner_after' ); ?>

    </div>

    <?php do_action( 'businessx_index__inner_sec_bottom' ); ?>
</section>

<?php
// Footer
get_footer( $businessx_footer_tmpl ); ?>
