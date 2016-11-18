<?php
/* ------------------------------------------------------------------------- *
 *  Preloader
/* ------------------------------------------------------------------------- */


/*  Preloader CSS
/* ------------------------------------ */
if ( ! function_exists( 'businessx_preloader_css' ) ) {
	function businessx_preloader_css() {

		$fill = get_theme_mod( 'preloader_fill_color', '#dd3333' );

		$preloaders = array(
			'balls' => array(
				'css' => '.bx-preloader div#bx-preloader .ac-loader { position: absolute; width: 171px; height: 45px; display: inline-block; top: 50%; left: 50%; margin-top: -22px; margin-left: -85px; }
							@-webkit-keyframes ball-beat {
							50% {
								opacity: 0.2;
								-webkit-transform: scale(0.75);
										transform: scale(0.75); }

							100% {
								opacity: 1;
								-webkit-transform: scale(1);
										transform: scale(1); } }

						  @keyframes ball-beat {
							50% {
								opacity: 0.2;
								-webkit-transform: scale(0.75);
										transform: scale(0.75); }

							100% {
								opacity: 1;
								-webkit-transform: scale(1);
										transform: scale(1); } }

							div#bx-preloader .ac-loader.ac-ball-beat > div {
								background-color: ' . esc_attr( $fill ) . ';
								width: 45px;
								height: 45px;
								margin: 0 6px;
								border-radius: 100%;
								-webkit-animation-fill-mode: both;
										animation-fill-mode: both;
								display: inline-block;
								-webkit-animation: ball-beat 0.7s 0s infinite linear;
										animation: ball-beat 0.7s 0s infinite linear; }
								.ac-ball-beat > div:nth-child(2n-1) {
								  -webkit-animation-delay: -0.35s !important;
										  animation-delay: -0.35s !important; }
							@media screen and (max-width: 1140px) {
								.bx-preloader div#bx-preloader .ac-loader { width: 114px; height: 30px; margin-top: -15px; margin-left: -57px; }
								div#bx-preloader .ac-loader.ac-ball-beat > div {
									width: 30px;
									height: 30px;
									margin: 0 4px; }
							}',

			), // Bubbles

			'balls2' => array(
				'css' => '.bx-preloader div#bx-preloader .ac-loader { position: absolute; width: 171px; height: 45px; display: inline-block; top: 50%; left: 50%; margin-top: -22px; margin-left: -85px; }
							@-webkit-keyframes scale {
								0% {
									-webkit-transform: scale(1);
											transform: scale(1);
									opacity: 1; }

								45% {
									-webkit-transform: scale(0.1);
											transform: scale(0.1);
									opacity: 0.7; }

								80% {
									-webkit-transform: scale(1);
											transform: scale(1);
									opacity: 1; } }
							@keyframes scale {
								0% {
									-webkit-transform: scale(1);
											transform: scale(1);
									opacity: 1; }

								45% {
									-webkit-transform: scale(0.1);
											transform: scale(0.1);
									opacity: 0.7; }

								80% {
									-webkit-transform: scale(1);
											transform: scale(1);
									opacity: 1; } }

							div#bx-preloader .ac-loader.ac-ball-pulse > div:nth-child(0) {
								-webkit-animation: scale 0.75s -0.36s infinite cubic-bezier(.2, .68, .18, 1.08);
										animation: scale 0.75s -0.36s infinite cubic-bezier(.2, .68, .18, 1.08); }
							div#bx-preloader .ac-loader.ac-ball-pulse > div:nth-child(1) {
								-webkit-animation: scale 0.75s -0.24s infinite cubic-bezier(.2, .68, .18, 1.08);
										animation: scale 0.75s -0.24s infinite cubic-bezier(.2, .68, .18, 1.08); }
							div#bx-preloader .ac-loader.ac-ball-pulse > div:nth-child(2) {
								-webkit-animation: scale 0.75s -0.12s infinite cubic-bezier(.2, .68, .18, 1.08);
										animation: scale 0.75s -0.12s infinite cubic-bezier(.2, .68, .18, 1.08); }
							div#bx-preloader .ac-loader.ac-ball-pulse > div:nth-child(3) {
								-webkit-animation: scale 0.75s 0s infinite cubic-bezier(.2, .68, .18, 1.08);
										animation: scale 0.75s 0s infinite cubic-bezier(.2, .68, .18, 1.08); }
							div#bx-preloader .ac-loader.ac-ball-pulse > div {
								background-color: ' . esc_attr( $fill ) . ';
								width: 45px;
								height: 45px;
								margin: 0 6px;
								border-radius: 100%;
								-webkit-animation-fill-mode: both;
										animation-fill-mode: both;
								display: inline-block;
							}
							@media screen and (max-width: 1140px) {
								.bx-preloader div#bx-preloader .ac-loader { width: 114px; height: 30px; margin-top: -15px; margin-left: -57px; }
								div#bx-preloader .ac-loader.ac-ball-pulse > div {
									width: 30px;
									height: 30px;
									margin: 0 4px; }
							}',

			), // Bubbles 2

			'balls3' => array(
				'css' => 'div#bx-preloader .ac-spinner div {
							  width: 20px;
							  height: 20px;
							  position: absolute;
							  left: -20px;
							  top: 50%;
							  margin-top: -10px;
							  background-color: ' . esc_attr( $fill ) . ';
							  border-radius: 50%;
							  animation: balls-move 4s infinite cubic-bezier(.2,.64,.81,.23);
						  }
						  div#bx-preloader .ac-spinner div:nth-child(2) {
							  animation-delay: 150ms;
						  }
						  div#bx-preloader .ac-spinner div:nth-child(3) {
							  animation-delay: 300ms;
						  }
						  div#bx-preloader .ac-spinner div:nth-child(4) {
							  animation-delay: 450ms;
						  }
						  @keyframes balls-move {
							  0% {left: 0%;}
							  75% {left:100%;}
							  100% {left:100%;}
						  }',

			), // Bubbles 3

			'loader1' => array(
				'css' => 'div#bx-preloader .ac-loader {
							height: 10px;
							width: 100%;
							position: absolute;
							top: 50%;
							margin-top: -5px;
							overflow: hidden;
							background-color: rgba(' . esc_attr( businessx_hex2rgba( $fill, 0.2, true ) ) . ');
						}
						div#bx-preloader .ac-loader:before {
							display: block;
							position: absolute;
							content: "";
							left: -200px;
							width: 200px;
							height: 10px;
							background-color: ' . esc_attr( $fill ) . ';
							animation: loading1 2s linear infinite;
							border-radius: 5px;
						}
						@keyframes loading1 {
							from { left: -200px; width: 30%; }
							50% { width: 30%; }
							70% { width: 70%; }
							80% { left: 50%; }
							95% { left: 120%; }
							to { left: 100% }
						}
						@media screen and (max-width: 1140px) {
							div#bx-preloader .ac-loader { height: 4px; margin-top: -2px; }
							div#bx-preloader .ac-loader:before { height: 4px; }
						}',

			), // Loading 1

		);

		if( has_filter( 'businessx_preloader_css___filter' ) ) {
			return $preloaders = apply_filters( 'businessx_preloader_css___filter', $preloaders );
		} else {
			return $preloaders;
		}

	}
}



/*  Output css
/* ------------------------------------ */
if ( ! function_exists( 'businessx_preloader_output_css' ) ) {
	function businessx_preloader_output_css( $preloaders = array() ) {
		// Get Preloaders and settings
		$preloaders = apply_filters( 'businessx_preloader_output_css___filter', $preloaders );
		$bg 		= get_theme_mod( 'preloader_bg_color', '#ffffff' );
		$op			= get_theme_mod( 'preloader_opacity', '0.9' );
		$selected 	= get_theme_mod( 'preloader_options', 'balls' );


		foreach( $preloaders as $pre => $data ) {
			if( $pre == $selected ) {
				// Preloader Info
				$preloader 		= $data['css'];
			}
		}

		// Preloader CSS Output
		?>
		<style type="text/css"> .bx-preloader div#bx-preloader { position: fixed; left: 0; top: 0; z-index: 99999; width: 100%; height: 100%; overflow: visible; background-color: rgba(<?php esc_attr( businessx_hex2rgba( $bg, $op, false ) ) ?>); }
		<?php
		echo businessx_sanitize_css( $preloader ); ?> </style>
		<?php
	}
}



/*  Preloader HTML
/* ------------------------------------ */
if ( ! function_exists( 'businessx_preloader_output_html' ) ) {
	function businessx_preloader_output_html( $output = '' ) {
		$selected = get_theme_mod( 'preloader_options', 'balls' );

		// Preloader html
		$preloaders_html = apply_filters( 'businessx_preloader_output_html_code___filter', $preloaders_html = array(
			'balls' 	=> array( 'html' => '<div id="bx-preloader"><div class="ac-loader ac-ball-beat"><div></div><div></div><div></div></div></div>' ),
			'balls2'	=> array( 'html' => '<div id="bx-preloader"><div class="ac-loader ac-ball-pulse"><div></div><div></div><div></div></div></div>' ),
			'balls3'	=> array( 'html' => '<div id="bx-preloader"><div class="ac-spinner"><div></div><div></div><div></div><div></div></div></div>' ),
			'loader1'	=> array( 'html' => '<div id="bx-preloader"><div class="ac-loader"></div></div>' ),
		) );

		// Allowed tags for sanitization
		$allowed = apply_filters( 'businessx_preloader_output_html___allowed', $allowed = array(
			'div' => array(
				'id' => array(),
				'class' => array(),
			),
			'span' => array(
				'id' => array(),
				'class' => array(),
			),
		) );

		foreach( $preloaders_html as $preloader_html => $data ) {
			if( $preloader_html == $selected ) {
				// Preloader html
				$output .= $data['html'];
			}
		}
		// $output .= '<div id="ac-preloader"><div class="ac-loader ac-ball-beat"><div></div><div></div><div></div></div></div>';

		if( has_filter( 'businessx_preloader_output_html___filter' ) ) {
			echo wp_kses( apply_filters( 'businessx_preloader_output_html___filter', $output ), $allowed );
		} else {
			echo wp_kses( $output, $allowed );
		}
	}
}



/*  Init Preloader
/* ------------------------------------ */
if( get_theme_mod( 'preloader_enable', false ) ) {
	add_filter( 'businessx_preloader_output_css___filter', 'businessx_preloader_css' );
	add_action( 'wp_head', 'businessx_preloader_output_css', 1 );
	add_action( 'businessx_header__before', 'businessx_preloader_output_html', 10 );
}
