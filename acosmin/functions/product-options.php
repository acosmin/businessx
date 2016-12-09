<?php
/* ------------------------------------------------------------------------- *
 *  WooCommerce product meta boxes
/* ------------------------------------------------------------------------- */

/*  Add a metabox to display options
/* ------------------------------------ */
if ( ! function_exists( 'businessx_add_product_options_box' ) ) {
	function businessx_add_product_options_box() {
		add_meta_box( 'businessx_product_options_metabox', __( 'Product Options:', 'businessx' ), 'businessx_product_options_box', 'product', 'side', 'high' );
	}
}
add_action( 'admin_menu', 'businessx_add_product_options_box' );



/*  Metabox output
/* ------------------------------------ */
if ( ! function_exists( 'businessx_product_options_box' ) ) {
	function businessx_product_options_box() {
		global $post;

		// Get some info
		$hide_sidebar = get_post_meta( $post->ID, 'businessx_product_hide_sidebar', true );

		// Nonce
		wp_nonce_field( 'businessx_product_hide_sidebar_nonce', 'businessx_product_hide_sidebar_nonce' );

		do_action( 'businessx_product_options_box__action_before' );

		?>
	    	<p>
	    	<label for="businessx_product_hide_sidebar_meta">
	            <input type="checkbox" class="checkbox" id="businessx_product_hide_sidebar_meta" name="businessx_product_hide_sidebar_meta" <?php checked( $hide_sidebar, 1 ); ?> />
	            <?php _e( 'Hide sidebar', 'businessx' ) ?> &mdash; <em><?php _e( 'You can hide it globally from the Customizer.', 'businessx' ) ?></em>
			</label>
			</p>
	    <?php

		do_action( 'businessx_product_options_box__action_after' );

	}
}



/*  Save meta info
/* ------------------------------------ */
if ( ! function_exists( 'businessx_product_options_save' ) ) {
	function businessx_product_options_save() {
		global $post;

		// Verify some credentials
		if ( ! isset( $_POST[ 'businessx_product_hide_sidebar_nonce' ] ) ||
		! wp_verify_nonce( $_POST[ 'businessx_product_hide_sidebar_nonce' ], 'businessx_product_hide_sidebar_nonce' ) )
			return;

		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
			return;

		if ( ! current_user_can( 'edit_post', $post->ID ) )
			return;

		// Check defaults
		$hide_sidebar = ! empty( $_POST[ 'businessx_product_hide_sidebar_meta' ] ) ? 1 : 0;

		// Update meta info
		update_post_meta( $post->ID, 'businessx_product_hide_sidebar', absint( $hide_sidebar ) );

		do_action( 'businessx_product_options_save__action' );

	}
}
add_action( 'save_post', 'businessx_product_options_save' );
