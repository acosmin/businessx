<?php
/**
 * Button Control
 */
if( ! class_exists( 'Businessx_Control_Button' ) ) {
	class Businessx_Control_Button extends WP_Customize_Control {

		public $type 		= 'button-control';
		public $href, $css_class;

		/**
		 * Render the control.
		 */
		public function render_content() {

			// Begin the output
			if ( isset( $this->label ) && '' !== $this->label ) {
				echo '<a href="' . esc_url( $this->href ) . '" class="button button-primary ' . esc_attr( $this->css_class ) . '">' . sanitize_text_field( $this->label ) . '</a><div class="bx-btn-notice"></div>';
			}
			if ( isset( $this->description ) && '' !== $this->description ) {
				echo '<div class="description">' . wp_kses_post( $this->description ) . '</div>';
			}

		}
	}
}
