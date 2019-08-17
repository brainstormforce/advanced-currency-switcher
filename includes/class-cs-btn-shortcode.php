<?php
/**
 * Class Short Button Doc Comment
 *
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com
 * @link     https://brainstormforce.com
 */

if ( ! class_exists( 'CS_Btn_Shortcode' ) ) {

	/**
	 * Class for definr currency_Switcher_button shortcode.
	 *
	 * @class    CSWP_urrency_Shortcode
	 * @category PHP
	 * @package  Currency_Switcher
	 * @author   Display Name <ahemads@bsf.io>
	 * @license  https://brainstormforce.com
	 * @link     https://brainstormforce.com
	 */
	class CS_Btn_Shortcode {

		/**
		 * Instance
		 *
		 * @access private
		 * @var $instance
		 * @since 1.0.2
		 */
		private static $instance;

		/**
		 * Initiator
		 *
		 * @since 1.0.2
		 * @return object initialized object of class.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Constructor
		 */
		public function __construct() {

			add_shortcode( 'currency-switch', array( $this, 'cswp_advance_currency_button' ) );
			add_action( 'wp_head', array( $this, 'cswp_styling_data' ) );

		}

		/**
		 * Get style data.
		 *
		 * @since  1.0.0
		 *  array of $cswp_font_size_disp.
		 */
		public function cswp_styling_data() {
			$cswp_get_form_value = get_option( 'cswp_style_form_data' );
			$cswp_icon           = $cswp_get_form_value['cswp_icon'];
			$cswp_iconx          = get_option( 'cswp_iconx' );
			$cswp_currency_array = $cswp_get_form_value['cswp_icon_array'];
			?>
			<style type="text/css">
			.cs-currency-buttons .cs-currency-name-dropdown {
				font-size: <?php echo ( ! empty( $cswp_get_form_value['cswp_font_size'] ) ? $cswp_get_form_value['cswp_font_size'] : 10 ); ?>px;

				font-weight: <?php echo ( ! empty( $cswp_get_form_value['cswp_font_weight'] ) ? $cswp_get_form_value['cswp_font_weight'] : 100 ); ?>;

				background: <?php echo ( ! empty( $cswp_get_form_value['cswp_background_color'] ) ? $cswp_get_form_value['cswp_background_color'] : 'unset' ); ?>;

				color: <?php echo ( ! empty( $cswp_get_form_value['cswp_text_color'] ) ? $cswp_get_form_value['cswp_text_color'] : 'unset' ); ?>;

				padding-top: 
				<?php
				echo ( ! empty( $cswp_get_form_value['cswp_padding_top'] ) ? $cswp_get_form_value['cswp_padding_top'] : 0 );
				echo ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'px' );
				?>
				;

				padding-right: 
						<?php
						echo ( ! empty( $cswp_get_form_value['cswp_padding_right'] ) ? $cswp_get_form_value['cswp_padding_right'] : 0 );
						echo ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'px' );
						?>
				;

				padding-bottom: 
						<?php
						echo ( ! empty( $cswp_get_form_value['cswp_padding_bottom'] ) ? $cswp_get_form_value['cswp_padding_bottom'] : 0 );
						echo ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'px' );
						?>
				;

				padding-left: 
						<?php
						echo ( ! empty( $cswp_get_form_value['cswp_padding_left'] ) ? $cswp_get_form_value['cswp_padding_left'] : 0 );
						echo ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'px' );
						?>
				;

				border-radius:
					<?php
						echo ( ! empty( $cswp_get_form_value['cswp_border_radius'] ) ? $cswp_get_form_value['cswp_border_radius'] : 0 );

					?>
					px;
				;

				border:
					<?php
						echo ( ! empty( $cswp_get_form_value['cswp_border_width'] ) ? $cswp_get_form_value['cswp_border_width'] : 0 );
						echo ( ! empty( $cswp_get_form_value['cswp_border_unit'] ) ? $cswp_get_form_value['cswp_border_unit'] : 'px' );

						echo ' ';
						echo ( ! empty( $cswp_get_form_value['cswp_border_style'] ) ? $cswp_get_form_value['cswp_border_style'] : 'none' );
						echo ' ';
						echo ( ! empty( $cswp_get_form_value['cswp_border_color'] ) ? $cswp_get_form_value['cswp_border_color'] : 'unset' );

					?>
				;

			}

			.cs-currency-buttons .cs-currency-name:hover{
					color:<?php echo ( ! empty( $cswp_get_form_value['cswp_text_hover_color'] ) ? $cswp_get_form_value['cswp_text_hover_color'] : 'unset' ); ?>;
					background-color:<?php echo ( ! empty( $cswp_get_form_value['cswp_hover_color'] ) ? $cswp_get_form_value['cswp_hover_color'] : 'unset' ); ?>;
				}

			.cs-currency-name-btn.cswpactive{
					background:<?php echo ( ! empty( $cswp_get_form_value['cswp_active_button_background_color'] ) ? $cswp_get_form_value['cswp_active_button_background_color'] : 'unset' ); ?> !important;
				}
			.cs-currency-buttons .cs-currency-name{

				font-size: <?php echo ( ! empty( $cswp_get_form_value['cswp_font_size'] ) ? $cswp_get_form_value['cswp_font_size'] : 10 ); ?>px;

				font-weight: <?php echo ( ! empty( $cswp_get_form_value['cswp_font_weight'] ) ? $cswp_get_form_value['cswp_font_weight'] : 100 ); ?>;

				background: <?php echo ( ! empty( $cswp_get_form_value['cswp_background_color'] ) ? $cswp_get_form_value['cswp_background_color'] : 'unset' ); ?>;

				color: <?php echo ( ! empty( $cswp_get_form_value['cswp_text_color'] ) ? $cswp_get_form_value['cswp_text_color'] : 'unset' ); ?>;

				padding-top: 
				<?php
				echo ( ! empty( $cswp_get_form_value['cswp_padding_top'] ) ? $cswp_get_form_value['cswp_padding_top'] : 0 );
				echo ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'px' );
				?>
				;

				padding-right: 
						<?php
						echo ( ! empty( $cswp_get_form_value['cswp_padding_right'] ) ? $cswp_get_form_value['cswp_padding_right'] : 0 );
						echo ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'px' );
						?>
				;

				padding-bottom: 
						<?php
						echo ( ! empty( $cswp_get_form_value['cswp_padding_bottom'] ) ? $cswp_get_form_value['cswp_padding_bottom'] : 0 );
						echo ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'px' );
						?>
				;

				padding-left: 
						<?php
						echo ( ! empty( $cswp_get_form_value['cswp_padding_left'] ) ? $cswp_get_form_value['cswp_padding_left'] : 0 );
						echo ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'px' );
						?>
				;

				border-radius:
					<?php
						echo ( ! empty( $cswp_get_form_value['cswp_border_radius'] ) ? $cswp_get_form_value['cswp_border_radius'] : 0 );

					?>
					px;
				;

				border:
					<?php
						echo ( ! empty( $cswp_get_form_value['cswp_border_width'] ) ? $cswp_get_form_value['cswp_border_width'] : 0 );
						echo ( ! empty( $cswp_get_form_value['cswp_border_unit'] ) ? $cswp_get_form_value['cswp_border_unit'] : 'px' );

						echo ' ';
						echo ( ! empty( $cswp_get_form_value['cswp_border_style'] ) ? $cswp_get_form_value['cswp_border_style'] : 'none' );
						echo ' ';
						echo ( ! empty( $cswp_get_form_value['cswp_border_color'] ) ? $cswp_get_form_value['cswp_border_color'] : 'unset' );

					?>
				;
			}

			.cswp_button_change .cs-currency-name-btn:hover{

			background-color:<?php echo ( ! empty( $cswp_get_form_value['cswp_hover_color'] ) ? $cswp_get_form_value['cswp_hover_color'] : 'unset' ); ?>;
			}
			span.cs-currency-icon{
			float:<?php echo ( ! empty( $cswp_get_form_value['cswp_icon_align'] ) ? $cswp_get_form_value['cswp_icon_align'] : 'left' ); ?>;

			width:<?php echo ( ! empty( $cswp_get_form_value['cswp_icon_width'] ) ? $cswp_get_form_value['cswp_icon_width'] : 10 ); ?>px;


			height:<?php echo ( ! empty( $cswp_get_form_value['cswp_icon_height'] ) ? $cswp_get_form_value['cswp_icon_height'] : 10 ); ?>px;

			content:"";

			background-repeat:no-repeat;
			}

			#cstoggletoEUR span.cs-currency-icon{
			background-image: url(<?php echo ( ! empty( $cswp_currency_array['EUR'] ) ? $cswp_currency_array['EUR'] : '' ); ?>);
			}

			#cstoggletoAUD span.cs-currency-icon{
			background-image: url(<?php echo ( ! empty( $cswp_currency_array['AUD'] ) ? $cswp_currency_array['AUD'] : '' ); ?>);
			}

			#cstoggletoINR span.cs-currency-icon{
			background-image: url(<?php echo ( ! empty( $cswp_currency_array['INR'] ) ? $cswp_currency_array['INR'] : '' ); ?>);
			}

			#cstoggletoUSD span.cs-currency-icon{
			background-image: url(<?php echo ( ! empty( $cswp_currency_array['USD'] ) ? $cswp_currency_array['USD'] : '' ); ?>);
			}

			.cswp_button_change .cs-currency-name-btn {

				width:<?php echo ( ! empty( $cswp_get_form_value['cswp_button_width'] ) ? $cswp_get_form_value['cswp_button_width'] : 10 ); ?>px;

				font-size: <?php echo ( ! empty( $cswp_get_form_value['cswp_font_size'] ) ? $cswp_get_form_value['cswp_font_size'] : 10 ); ?>px;

				font-weight: <?php echo ( ! empty( $cswp_get_form_value['cswp_font_weight'] ) ? $cswp_get_form_value['cswp_font_weight'] : 100 ); ?>;

				background: <?php echo ( ! empty( $cswp_get_form_value['cswp_background_color'] ) ? $cswp_get_form_value['cswp_background_color'] : 'unset' ); ?>;

				color: <?php echo ( ! empty( $cswp_get_form_value['cswp_text_color'] ) ? $cswp_get_form_value['cswp_text_color'] : 'unset' ); ?>;

				padding-top: 
				<?php
				echo ( ! empty( $cswp_get_form_value['cswp_padding_top'] ) ? $cswp_get_form_value['cswp_padding_top'] : 0 );
				echo ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'px' );
				?>
				;

				padding-right: 
						<?php
						echo ( ! empty( $cswp_get_form_value['cswp_padding_right'] ) ? $cswp_get_form_value['cswp_padding_right'] : 0 );
						echo ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'px' );
						?>
				;

				padding-bottom: 
						<?php
						echo ( ! empty( $cswp_get_form_value['cswp_padding_bottom'] ) ? $cswp_get_form_value['cswp_padding_bottom'] : 0 );
						echo ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'px' );
						?>
				;

				padding-left: 
						<?php
						echo ( ! empty( $cswp_get_form_value['cswp_padding_left'] ) ? $cswp_get_form_value['cswp_padding_left'] : 0 );
						echo ( ! empty( $cswp_get_form_value['cswp_padding_unit'] ) ? $cswp_get_form_value['cswp_padding_unit'] : 'px' );
						?>
				;

				border-radius:
					<?php
						echo ( ! empty( $cswp_get_form_value['cswp_border_radius'] ) ? $cswp_get_form_value['cswp_border_radius'] : 0 );
					?>px;
				;

				border:
					<?php
						echo ( ! empty( $cswp_get_form_value['cswp_border_width'] ) ? $cswp_get_form_value['cswp_border_width'] : 0 );
						echo ( ! empty( $cswp_get_form_value['cswp_border_unit'] ) ? $cswp_get_form_value['cswp_border_unit'] : 'px' );

						echo ' ';
						echo ( ! empty( $cswp_get_form_value['cswp_border_style'] ) ? $cswp_get_form_value['cswp_border_style'] : 'none' );
						echo ' ';
						echo ( ! empty( $cswp_get_form_value['cswp_border_color'] ) ? $cswp_get_form_value['cswp_border_color'] : 'unset' );

					?>
				;
		}
		}											
			<?php

		}

		/**
		 * Define Currency_Converter_Addon_button.
		 *
		 * @since  1.0.0
		 * @return ob_get_clean().
		 */
		public function cswp_advance_currency_button() {

			ob_start();
			wp_enqueue_style( 'cswp-style' );
			wp_enqueue_script( 'cswp-script' );

			$base_value_select                   = CS_Loader::cswp_load_all_data();
							$manual_usd_btn_text = isset( $base_value_select['usd-text'] ) ? $base_value_select['usd-text'] : '';
							$manual_inr_btn_text = isset( $base_value_select['inr-text'] ) ? $base_value_select['inr-text'] : '';
							$manual_eur_btn_text = isset( $base_value_select['eur-text'] ) ? $base_value_select['eur-text'] : '';
							$manual_aud_btn_text = isset( $base_value_select['aud-text'] ) ? $base_value_select['aud-text'] : '';

							$manual_button_text_value = array(
								$manual_usd_btn_text,
								$manual_inr_btn_text,
								$manual_eur_btn_text,
								$manual_aud_btn_text,
							);

							$currencybtn      = CS_Loader::cswp_load_currency_button_data();
							$currencydropdown = CS_Loader::cswp_load_currency_button_data();
							if ( ! empty( $currencybtn ) ) {
								foreach ( $currencybtn as $cswp_base_value ) {
									if ( $cswp_base_value === $base_value_select['basecurency'] ) {
										continue;
									}
									$curbtn[] = $cswp_base_value;
								}
								if ( ! empty( $curbtn ) && is_array( $curbtn ) ) {
									array_push( $curbtn, $base_value_select['basecurency'] );
									$currencybtn = array_combine( $curbtn, $curbtn );
								}
							}

							?>
			<div class="cs-currency-buttons">
			<?php
			if ( 'toggle' === $base_value_select['cswp_button_type'] ) {
				if ( is_array( $currencybtn ) ) {

					foreach ( $currencybtn as $currencyname ) {

						$currency_symbol = $this->get_currency_symbol( $currencyname );
						?>
						<button class="cs-currency-name" id="cstoggleto<?php echo esc_attr( $currencyname ); ?>"
						data-currency-name="<?php echo esc_attr( $currencyname ); ?>" data-currency-symbol="<?php echo esc_attr( $currency_symbol ); ?>" style="display: none;"> 
														<?php
														if ( 'USD' === $currencyname ) {
															echo trim( $manual_button_text_value[0] );
														} elseif ( 'INR' === $currencyname ) {
															echo trim( $manual_button_text_value[1] );
														} elseif ( 'EUR' === $currencyname ) {
															echo trim( $manual_button_text_value[2] );
														} elseif ( 'AUD' === $currencyname ) {
															echo trim( $manual_button_text_value[3] );
														}
														?>
						</button>
						<?php
					}
				}
			} elseif ( 'dropdown' === $base_value_select['cswp_button_type'] ) {

				if ( ! empty( $currencydropdown ) ) {
					foreach ( $currencydropdown as $cswp_base_value ) {
						if ( $cswp_base_value === $base_value_select['basecurency'] ) {
							continue;
						}
						$curbtn[] = $cswp_base_value;
					}
					if ( ! empty( $curbtn ) && is_array( $curbtn ) ) {
						array_unshift( $curbtn, $base_value_select['basecurency'] );
						$currencydropdown = array_combine( $curbtn, $curbtn );
					}
				}

				if ( is_array( $currencydropdown ) ) {
					$currencyname    = '';
					$currency_symbol = '';
					?>
					<select class="cs-currency-name-dropdown">
						<?php

						foreach ( $currencydropdown as $currencyname ) {

							$currency_symbol = $this->get_currency_symbol( $currencyname );
							$selected        = '';
							$currency_value  = '';
							if ( $currencyname === $base_value_select['basecurency'] ) {
								$selected = 'selected';
							}
							if ( 'USD' === $currencyname ) {
								$currency_value = $manual_button_text_value[0];
							} elseif ( 'INR' === $currencyname ) {
								$currency_value = $manual_button_text_value[1];
							} elseif ( 'EUR' === $currencyname ) {
								$currency_value = $manual_button_text_value[2];
							} elseif ( 'AUD' === $currencyname ) {
								$currency_value = $manual_button_text_value[3];
							}
							?>
							<option value="<?php echo esc_attr( $currencyname ); ?>" data-currency-name="<?php echo esc_attr( $currencyname ); ?>" data-currency-symbol="<?php echo esc_attr( $currency_symbol ); ?>"
								value="<?php echo esc_attr( $currencyname ); ?>" <?php echo esc_attr( $selected ); ?>><?php echo $currency_value; ?></option>
							<?php } ?>
						</select>
					<?php
				}
			} elseif ( 'button' === $base_value_select['cswp_button_type'] ) {

				if ( is_array( $currencybtn ) ) {
					echo '<div class="cswp_button_change">';
					foreach ( $currencybtn as $currencyname ) {

						$currency_symbol = $this->get_currency_symbol( $currencyname );
						?>
						<button class="cs-currency-name-btn 
						<?php
						if ( $base_value_select['basecurency'] === $currencyname ) {
							echo 'cswpactive'; }
						?>
						" id="cstoggleto<?php echo esc_attr( $currencyname ); ?>"
						data-currency-name="<?php echo esc_attr( $currencyname ); ?>" data-currency-symbol="<?php echo esc_attr( $currency_symbol ); ?>"> 
														<?php
														if ( 'USD' === $currencyname ) {
															echo trim( $manual_button_text_value[0] );
														} elseif ( 'INR' === $currencyname ) {
															echo trim( $manual_button_text_value[1] );
														} elseif ( 'EUR' === $currencyname ) {
															echo trim( $manual_button_text_value[2] );
														} elseif ( 'AUD' === $currencyname ) {
															echo trim( $manual_button_text_value[3] );
														}
														?>
														<span class="cs-currency-icon"></span>
						</button>
						<?php
					}
					echo '</div>';
				}
			}
			?>
			</div>
			<?php

			return ob_get_clean();
		}

		/**
		 * Get_currency_symbol.
		 *
		 * @since  1.0.0
		 * @param string $currency The text to be formatted.
		 * @return ''.
		 */
		public function get_currency_symbol( $currency ) {
			$currenceis = $this->get_currenceis();

			if ( array_key_exists( $currency, $currenceis ) ) {
				return $currenceis[ $currency ];
			}

			return '';
		}

		/**
		 * Get_currenceis.
		 *
		 * @since  1.0.0
		 */
		public function get_currenceis() {
			return array(
				'INR' => '&#8377;',
				'USD' => '&#36;',
				'AUD' => '&#36;',
				'EUR' => '&#8364;',
			);
		}

	}

	CS_Btn_Shortcode::get_instance();
}
