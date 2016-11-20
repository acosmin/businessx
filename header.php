<?php
/* ------------------------------------------------------------------------- *
 * Header template
/* ------------------------------------------------------------------------- */

/**
 * Filtered CSS classes
 * ------
 * div#inner-wrap: main-header-inner-wrap clearfix
 * ------
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); businessx_html_tag_classes() ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	/**
	 * Hooked:
	 * ------
	 * businessx_header_placeholder() - 11
	 * businessx_preloader_output_html() - 20
	 * ------
	 */
	do_action( 'businessx_header__before' );
?>

<header id="main-header" <?php businessx_header_classes(); ?>>
	<div class="<?php businessx_occ( 'businessx_header___inner_wrap' ) ?>">

		<?php
		/**
		 * Hooked:
		 * ------
		 * businessx_logo_display() - 10
		 * businessx_menu_main_area() - 20
		 * businessx_menu_actions_area() - 30
		 * ------
		 */
		do_action( 'businessx_main__header' );
		?>

	</div>
</header>

<?php do_action( 'businessx_header__after' ); // Hooked: businessx_search_display() - 11 ?>
