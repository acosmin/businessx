<?php
/**
 * Custom link/button section.
 */
if( ! class_exists( 'Businessx_Section_Link' ) ) {
	class Businessx_Section_Link extends WP_Customize_Section {

		/**
		 * The type of customize section being rendered.
		 */
		public $type = 'link-button';

		/**
		 * Custom button text to output.
		 */
		public $link_text = '';
		public $rate_text = '';

		/**
		 * Custom pro button URL.
		 */
		public $link_url = '';
		public $rate_url = '';

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 */
		public function json() {
			$json = parent::json();

			$json['link_text'] = $this->link_text;
			$json['link_url']  = esc_url( $this->link_url );
			$json['rate_text'] = $this->rate_text;
			$json['rate_url']  = esc_url( $this->rate_url );

			return $json;
		}

		/**
		 * Outputs the Underscore.js template.
		 */
		protected function render_template() { ?>

			<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

				<h3 class="accordion-section-title">
					<# if ( data.link_text && data.link_url ) { #>
						<a href="{{ data.link_url }}" class="button bx-docs-btn button-secondary alignleft" target="_blank"><i class="fa fa-info-circle"></i>&nbsp;{{ data.link_text }}</a>
					<# } #>
					&nbsp;
					<# if ( data.rate_text && data.rate_url ) { #>
						<a href="{{ data.rate_url }}" class="button bx-rate-btn button-secondary alignright" target="_blank"><i class="fa fa-star"></i>&nbsp;{{ data.rate_text }}</a>
					<# } #>
				</h3>
			</li>
		<?php }
	}
}
