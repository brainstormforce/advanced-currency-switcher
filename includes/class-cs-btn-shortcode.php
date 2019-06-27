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
			wp_enqueue_script( 'cswp-getrate' );

			$base_value_select = CS_Loader::cswp_load_all_data();

			if ( 'manualrate' === $base_value_select['cswp_form_select'] ) {
				$manual_button_text                   = CS_Loader::cswp_load_manual_data();
							$manual_button_text_value = array(
								$manual_button_text['usd-text'],
								$manual_button_text['inr-text'],
								$manual_button_text['eur-text'],
								$manual_button_text['aud-text'],
							);
			} elseif ( 'apirate' === $base_value_select['cswp_form_select'] ) {
				$manual_button_text                   = CS_Loader::cswp_load_apirate_values_data();
							$manual_button_text_value = array(
								$manual_button_text['usd-apitext'],
								$manual_button_text['inr-apitext'],
								$manual_button_text['eur-apitext'],
								$manual_button_text['aud-apitext'],
							);
			}

						$currencybtn      = CS_Loader::cswp_load_currency_button_data();
						$currencydropdown = CS_Loader::cswp_load_currency_button_data();

			if ( ! empty( $currencybtn ) ) {
				foreach ( $currencybtn as $mybase_value ) {
					if ( $mybase_value === $base_value_select['basecurency'] ) {
						continue;
					}
					$curbtn[] = $mybase_value;
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
						<input type="button" class="cs-currency-name" id="cstoggleto<?php echo esc_attr( $currencyname ); ?>"
						value="
						<?php
						if ( 'USD' === $currencyname ) {
							echo esc_attr( $manual_button_text_value[0] );
						} elseif ( 'INR' === $currencyname ) {
							echo esc_attr( $manual_button_text_value[1] );
						} elseif ( 'EUR' === $currencyname ) {
							echo esc_attr( $manual_button_text_value[2] );
						} elseif ( 'AUD' === $currencyname ) {
							echo esc_attr( $manual_button_text_value[3] ); }
						?>
								"

						data-currency-name="<?php echo esc_attr( $currencyname ); ?>" data-currency-symbol="<?php echo esc_attr( $currency_symbol ); ?>" style="display: none;">
						<?php
					}
				}
			} elseif ( 'dropdown' === $base_value_select['cswp_button_type'] ) {

				if ( ! empty( $currencydropdown ) ) {
					foreach ( $currencydropdown as $mybase_value ) {
						if ( $mybase_value === $base_value_select['basecurency'] ) {
							continue;
						}
						$curbtn[] = $mybase_value;
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
					<select class="cs-currency-name-dropdown"  value="<?php echo esc_attr( $currencyname ); ?>" data-currency-name="<?php echo esc_attr( $currencyname ); ?>" data-currency-symbol="<?php echo esc_attr( $currency_symbol ); ?>">
						<?php
						foreach ( $currencydropdown as $currencyname ) {

							$currency_symbol = $this->get_currency_symbol( $currencyname );
							?>
							<option 
							<?php
							if ( $currencyname === $base_value_select['basecurency'] ) {
								?>
								selected 
								<?php
							}
							?>
								value="<?php echo esc_attr( $currencyname ); ?>" > 

								<?php
								if ( 'USD' === $currencyname ) {
									echo esc_attr( $manual_button_text_value[0] );
								} elseif ( 'INR' === $currencyname ) {
									echo esc_attr( $manual_button_text_value[1] );
								} elseif ( 'EUR' === $currencyname ) {
									echo esc_attr( $manual_button_text_value[2] );
								} elseif ( 'AUD' === $currencyname ) {
									echo esc_attr( $manual_button_text_value[3] );
								}
								?>

							</option>
								<?php
						}
						?>
					</select>
					<?php
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