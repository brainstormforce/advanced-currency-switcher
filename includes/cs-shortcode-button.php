<?php
/**
 * Class Short Button Doc Comment
 *
 * PHP version 7
 *
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com
 * @link     https://brainstormforce.com
 */

if ( ! class_exists( 'CSWP_currency_Btn_Shortcode' ) ) {

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
	class CSWP_currency_Btn_Shortcode {

		/**
		 * Instance
		 *
		 * @access private
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

			add_shortcode( 'currency-switch', array( $this, 'currency_Switcherbutton' ) );
			add_action('wp_head', array( $this, 'currency_js' ));

		}

		/**
		 * Enqueue currency_js.
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function currency_js() {
			wp_enqueue_style('cswp_myccastyle');
		 	wp_enqueue_script( 'cswp_myccacript' );
		 	wp_enqueue_script( 'cswp_getrate' );
		}
		/**
		 * Define Currency_Converter_Addon_button.
		 *
		 * @since  1.0.0
		 * @return void
		 */
		public function currency_Switcherbutton() {

			ob_start();

			$base_value_select = CS_Loader::cswp_load_all_data();

			$currencybtn = CS_Loader::cswp_load_currency_button_data();

			if ( ! empty( $currencybtn ) ) {
				foreach ( $currencybtn as $mybase_value ) {
					if ( $mybase_value === $base_value_select['basecurency'] ) {
						continue;
					}
					$curbtn[] = $mybase_value;
					// var_dump($curbtn);
				}
				if ( ! empty( $curbtn ) && is_array( $curbtn ) ) {
					array_push( $curbtn, $base_value_select['basecurency'] );
					$currencybtn = array_combine( $curbtn, $curbtn );
				}
			}

			?>
			<div class="cs-currency-buttons">
			<?php

			if ( is_array( $currencybtn ) ) {

				foreach ( $currencybtn as $currencyname ) {

					$currency_symbol = $this->get_currency_symbol( $currencyname );
					?>
					<input type="button" class="cs-currency-name" id="cstoggleto<?php echo $currencyname; ?>" value="<?php echo 'Change TO ' . $currencyname; ?>" data-currency-name="<?php echo $currencyname; ?>" data-currency-symbol="<?php echo $currency_symbol; ?>" style="display: none;">
					<?php
				}
			}
			?>
			</div>
			<?php

			return ob_get_clean();
		}

		function get_currency_symbol( $currency ) {
			$currenceis = $this->get_currenceis();

			if ( array_key_exists( $currency, $currenceis ) ) {
				return $currenceis[ $currency ];
			}

			return '';
		}

		function get_currenceis() {
			return array(
				'INR' => '₹',
				'USD' => '$',
				'AUD' => 'A$',
				'EUR' => '€',
			);
		}

	}

	CSWP_Currency_Btn_Shortcode::get_instance();
}
