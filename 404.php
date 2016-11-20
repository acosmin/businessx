<?php
/* ------------------------------------------------------------------------- *
 * 404 template
/* ------------------------------------------------------------------------- */

/**
 * Filtered CSS classes
 * ------
 * section: grid-wrap
 * div: grid-container grid-1 padding-small clearfix
 * main: grid-col grid-4x-col site-404 clearfix
 * ------
 */

// Header and Footer templates
$businessx_header_tmpl = apply_filters( 'businessx_header___tmpl', '' );
$businessx_footer_tmpl = apply_filters( 'businessx_footer___tmpl', '' );

// Header
get_header( $businessx_header_tmpl );

// Title
businessx_get_heading_templ( '404', 'full-width' );
?>

<section role="main" id="content" class="<?php businessx_occ( 'businessx_404___section_classes' ); ?>">
	<?php do_action( 'businessx_404__inner_sec_top' ); ?>

	<div class="<?php businessx_occ( 'businessx_404___container_classes' ); ?>">

        <?php do_action( 'businessx_404__inner_before' ); ?>

        <main id="main" class="<?php businessx_occ( 'businessx_404___main_classes' ); ?>" role="main">
			<p class="alert alert-warning ta-center"><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'businessx' ); ?></p>
        </main>

        <?php do_action( 'businessx_404__inner_after' ); ?>

    </div>

    <?php do_action( 'businessx_404__inner_sec_bottom' ); ?>
</section>

<?php
// Footer
get_footer( $businessx_footer_tmpl ); ?>
