<?php
/**
 * Custom link/button section.
 */
class Businessx_Section_Link extends WP_Customize_Section {

	/**
	 * The type of customize section being rendered.
	 */
	public $type = 'link-button';

	/**
	 * Custom button text to output.
	 */
	public $link_text = '';

	/**
	 * Custom pro button URL.
	 */
	public $link_url = '';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 */
	public function json() {
		$json = parent::json();

		$json['link_text'] = $this->link_text;
		$json['link_url']  = esc_url( $this->link_url );

		return $json;
	}

	/**
	 * Outputs the Underscore.js template.
	 */
	protected function render_template() { ?>

		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">

			<h3 class="accordion-section-title">
				{{ data.title }}

				<# if ( data.link_text && data.link_url ) { #>
					<a href="{{ data.link_url }}" class="button button-secondary alignright" target="_blank">{{ data.link_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}
