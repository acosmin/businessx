<?php
/**
 * Businessx Recommended Plugin Install
 */
if( ! class_exists( 'Businessx_Installer_Control' ) ) {
	class Businessx_Installer_Section extends WP_Customize_Section {

		/**
		 * The type of customize section being rendered.
		 */
		public $type = 'bxext-installer';

		/**
		 * Vars
		 */
		public $notice = array();
		public $docs = array();
		public $plugin = '';
		public $install = array();
		public $dismiss = array();
		public $active = array();

		/**
		 * Add custom parameters to pass to the JS via JSON.
		 */
		public function json() {
			$json = parent::json();

			$json['notice'] = (array) $this->notice;
			$json['docs'] = (array) $this->docs;
			$json['plugin'] = (string) $this->plugin;
			$json['install'] = (array) $this->install;
			$json['dismiss'] = (array) $this->dismiss;
			$json['active'] = (array) $this->active;

			return $json;
		}

		/**
		 * Outputs the Underscore.js template.
		 */
		protected function render_template() { ?>

			<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
				<h3 class="accordion-section-title">
					{{ data.title }}
				</h3>
				<div class="notice-{{ data.type }}">
					<# if ( data.notice != '' ) { #>
					<p>
						{{ data.notice.p1 }} <b><em><a target="_blank" href="{{ data.docs.url }}">{{ data.docs.text }}</a></em></b>, {{ data.notice.p2 }} <b><em>{{ data.plugin }}</em></b>
					</p>
					<# } #>

					<# if ( data.active.check !== true ) { #>
					<p>
						<# if ( data.install != '' ) { #>
						<a class="install-now button-primary button"
						href="<?php echo esc_url( businessx_create_exts_install_url() ); ?>"
						data-slug="{{ data.install.slug }}"
						aria-label="{{ data.install.aria }}"
						data-name="{{ data.install.name }}">{{ data.install.text }}</a>
						<# } #>

						<# if ( data.dismiss != '' ) { #>
		                <a class="button-secondary button"
						id="{{ data.dismiss.id }}"
						href="#"
						aria-label="{{ data.dismiss.aria }}">{{ data.dismiss.text }}</a>
						<# } #>
					</p>
					<# } else { #>
					<hr>
					<p>{{ data.active.msg }}</p>
					<p>
						<a class="install-now button-primary button"
						href="{{ data.active.url }}">{{ data.active.btn }}</a>
	                    <a class="button-secondary button"
						id="{{ data.dismiss.id }}"
						href="#"
						aria-label="{{ data.dismiss.aria }}">{{ data.dismiss.text }}</a>
					</p>
					<# } #>
				</div>
			</li>
		<?php }
	}
}
