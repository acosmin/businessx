<?php
/* ------------------------------------------------------------------------- *
 *	Search heading template
/* ------------------------------------------------------------------------- */
?>

<header id="top-header" class="grid-wrap index-heading heading-full-width clearfix"<?php businessx_ch_parallax(); ?>>
	<div class="grid-overlay"></div>
    <?php do_action( 'businessx_shfw__inner_top' ); ?>
	<div class="sec-hs-elements ta-center">
    	<?php do_action( 'businessx_shfw__heading_top' ); ?>
        <h1 class="hs-primary-large"><?php printf( __( 'Search Results for: %s', 'businessx' ), '<span class="opaque--7">' . get_search_query() . '</span>' ); ?></h1>
        <?php do_action( 'businessx_shfw__heading_bottom' ); ?>
    </div>
    <?php do_action( 'businessx_shfw__inner_bottom' ); ?>
</header>

<?php do_action( 'businessx_shfw__after' ); ?>
