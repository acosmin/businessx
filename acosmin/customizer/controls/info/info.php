<?php
/**
 * Info Control
 */
if( ! class_exists( 'Businessx_Control_Info' ) ) {
	class Businessx_Control_Info extends WP_Customize_Control {

		public $type 		= 'info-control';
		public $info_type, $css_class, $html;

		/**
		 * Render the control.
		 */
		public function render_content() {

			$icon = ( $this->info_type != '' ) ? '<span class="dashicons dashicons-' . esc_attr( $this->info_type ) . '"></span>' : '';
			$bottom = ( $this->html != '' ) ? '<div class="bx-control-info-bottom">' . $this->html . '</div>' : '';

			// Begin the output. ?>
			<div class="bx-control-info <?php echo esc_attr( $this->css_class ); ?>">
				<?php // Output the label and description if they were passed in.
				if ( isset( $this->label ) && '' !== $this->label ) {
					echo '<span class="customize-control-title bx-control-info-label">' . sanitize_text_field( $this->label ) . $icon . '</span>';
				}
				if ( isset( $this->description ) && '' !== $this->description ) {
					echo '<div class="description customize-control-description bx-control-info-description">' . wp_kses_post( $this->description ) . '</div>';
				}
				echo wp_kses_post( $bottom );
				?>
			</div>
			<?php
		}
	}
}
