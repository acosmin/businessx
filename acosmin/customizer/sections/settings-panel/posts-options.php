<?php
/* ------------------------------------ */
/*  Posts
/* ------------------------------------ */

/// Posts section
$wp_customize->add_section( 'posts_settings', array(
	'title'	=> __( 'Posts', 'businessx' ),
	'panel'	=> 'settings_options'
) );

	////// Posts - Single View
	businessx_controller_info(
		'posts_single_info',
		'posts_settings',
		__( 'Single view', 'businessx' ) );

	businessx_controller_checkbox(
		'posts_single_featured_parallax',
		'posts_settings',
		esc_html__( 'Featured Image parallax', 'businessx' ),
		esc_html__( 'Enable parallax effect on Featured Images', 'businessx' ), false );

	businessx_controller_checkbox(
		'posts_single_hide_meta',
		'posts_settings',
		esc_html__( 'Hide post meta', 'businessx' ), '', false );

	businessx_controller_checkbox(
		'posts_single_hide_meta_author',
		'posts_settings',
		esc_html__( 'Hide by author', 'businessx' ), '', false );

	businessx_controller_checkbox(
		'posts_single_hide_meta_date',
		'posts_settings',
		esc_html__( 'Hide date', 'businessx' ), '', false );

	businessx_controller_checkbox(
		'posts_single_hide_meta_category',
		'posts_settings',
		esc_html__( 'Hide category', 'businessx' ), '', false );

	businessx_controller_checkbox(
		'posts_single_comments_nr',
		'posts_settings',
		esc_html__( 'Hide comments number', 'businessx' ), '', false );

	businessx_controller_checkbox(
		'posts_single_tags_bottom',
		'posts_settings',
		esc_html__( 'Hide tags', 'businessx' ),
		esc_html__( 'If they are displayed at the bottom of the post.', 'businessx' ), false );

	////// Posts - Index View
	businessx_controller_info(
		'posts_index_info',
		'posts_settings',
		__( 'Index view', 'businessx' ) );

	businessx_controller_checkbox(
		'posts_index_hide_meta_read_more',
		'posts_settings',
		esc_html__( 'Hide "Read More" button', 'businessx' ), '', false );

	businessx_controller_checkbox(
		'posts_index_hide_meta_date',
		'posts_settings',
		esc_html__( 'Hide date', 'businessx' ), '', false );

	businessx_controller_checkbox(
		'posts_index_hide_meta_category',
		'posts_settings',
		esc_html__( 'Hide category', 'businessx' ), '', false );

	businessx_controller_txt(
		'posts_index_excerpt_length',
		'posts_settings',
		esc_html__( 'Excerpt length:', 'businessx' ),
		esc_html__( 'This must be a number. For example, 35 will display 35 words. Leave empty for default.', 'businessx' ) );

	businessx_controller_txt(
		'posts_index_excerpt_ending',
		'posts_settings',
		esc_html__( 'Excerpt ending:', 'businessx' ),
		esc_html__( 'For example: ...', 'businessx' ) );
