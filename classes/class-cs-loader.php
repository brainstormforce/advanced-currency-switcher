<?php
/**
 * CS Loader Doc comment
 *
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <username@ahemads.com>
 * @license  http://brainstormforce.com
 * @link     http://brainstormforce.com
 */

/**
 * Class define load files and define constant.
 *
 * @class    CS_Loader
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com
 * @link     https://brainstormforce.com
 */
class CS_Loader {
	/**
	 * Constructor
	 */
	public function __construct() {

		$this->define_constant();

		self::includes();
		add_action( 'wp_enqueue_scripts', array( $this, 'cswp_load_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_backend_script' ) );
		add_action( 'init', array( $this, 'cswp_save_form_data' ) );
		add_action( 'wp_ajax_ccs_validate', array( $this, 'cs_validate_api_key' ) );
		add_filter( 'cron_schedules', array( $this, 'my_cron_schedules' ) );
		add_action( 'cs_schedule_hook', array( $this, 'cs_schedule_event' ) );
	}

	/**
	 * Load all form data.
	 *
	 * @since  1.0.0
	 * @return $cswp_get_form_value
	 */
	public static function cswp_load_all_data() {

		$cswp_get_form_value = get_option( 'cswp_form_data' );
		return $cswp_get_form_value;
	}

	/**
	 * Load Manual currency rate.
	 *
	 * @since  1.0.0
	 * @return $cswp_manual_rate
	 */
	public static function cswp_load_manual_data() {

		$cswp_manual_rate = get_option( 'cswp_manual_rate' );
		return $cswp_manual_rate;
	}

	/**
	 * Load currency button data.
	 *
	 * @since  1.0.0
	 * @return $cswp_currency_button_type
	 */
	public static function cswp_load_currency_button_data() {

		$cswp_currency_button_type = get_option( 'cswp_currency_button_type' );

		if ( ! empty( $cswp_currency_button_type ) ) {

			return $cswp_currency_button_type;

		} else {

			$cswp_currency_button_type = array();
			return $cswp_currency_button_type;
		}
	}

	/**
	 * Load api values.
	 *
	 * @since  1.0.0
	 * @return $cswp_apirate_values
	 */
	public static function cswp_load_apirate_values_data() {

		$cswp_apirate_values = get_option( 'cswp_apirate_values' );
		return $cswp_apirate_values;
	}

	/**
	 * Define define_constant.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function define_constant() {
		define( 'CSWP_CURRENCY_SWITCHER_VER', '1.0.0' );

		define( 'CSWP_CURRENCY_SWITCH_FILE', trailingslashit( dirname( dirname( __FILE__ ) ) ) . 'currency-switcher.php' );

		define( 'CSWP_PLUGIN_DIR', untrailingslashit( plugin_dir_path( CSWP_CURRENCY_SWITCH_FILE ) ) );

		define( 'CSWP_PLUGIN_URL', plugins_url( '/', CSWP_CURRENCY_SWITCH_FILE ) );
	}

	/**
	 * Validate api key
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function cs_validate_api_key() {

		check_ajax_referer( 'ajax_nonce_val', 'security' );
		$api_key = isset( $_POST['api_key'] ) ? sanitize_key( $_POST['api_key'] ) : '';

		if ( empty( $api_key ) ) {
			wp_send_json_error( __( 'Empty API key!' ) );
		}

		$data = (array) get_option( 'cswp_form_data', array() );

		$cswp_str = add_query_arg( 'app_id', $api_key, 'https://openexchangerates.org/api/latest.json' );

		$cswp_str = wp_remote_post( $cswp_str );

		if ( 'Unauthorized' === $cswp_str['response']['message'] ) {
			update_option( '', 'no' );
			$args     = array(
				'api_key'        => $api_key,
				'api_key_status' => 'fail',
			);
			$new_data = wp_parse_args( $args, $data );
			update_option( 'cswp_form_data', $new_data );

			wp_send_json_error( 'Authentication Failed!' );
		}
		$args     = array(
			'api_key'        => $api_key,
			'api_key_status' => 'pass',
		);
		$new_data = wp_parse_args( $args, $data );
		update_option( 'cswp_form_data', $new_data );

		wp_send_json_success( 'Authentication Success!' );
	}
	/**
	 * Function that includes necessary files
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function includes() {
		require_once CSWP_PLUGIN_DIR . '/includes/class-cs-menu-page.php';
		require_once CSWP_PLUGIN_DIR . '/includes/class-cs-currency-shortcode.php';
		require_once CSWP_PLUGIN_DIR . '/includes/class-cs-btn-shortcode.php';
	}

	/**
	 * Custom corn schedule for various event exchange request..
	 *
	 * @param string $schedules which return schedule time.
	 *
	 * @since  1.0.0
	 * @return $schedules.
	 */
	public function my_cron_schedules( $schedules ) {
		if ( ! isset( $schedules['hourly'] ) ) {
			$schedules['hourly'] = array(
				'interval' => 60 * 60, // Every Hour.
				'display'  => __( 'Once hourly' ),
			);
		}
		if ( ! isset( $schedules['daily '] ) ) {
			$schedules['daily'] = array(
				'interval' => 24 * 3600, // Every Day.
				'display'  => __( 'Once daily' ),
			);
		}
		if ( ! isset( $schedules['weekly'] ) ) {
			$schedules['weekly'] = array(
				'interval' => 7 * 86400, // Every Week.
				'display'  => __( 'Once every week' ),
			);
		}
		return $schedules;
	}

	/**
	 * Function that save all form data
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function cswp_save_form_data() {

		if ( ! isset( $_POST['cs-form'] ) ) {
			return;
		}
		if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['cs-form'] ) ), 'cs-form-nonce' ) ) {
			return;
		}
		if ( 'currency_switch' !== ( isset( $_GET['page'] ) ? sanitize_text_field( wp_unslash( $_GET['page'] ) ) : null ) ) {
			return;
		}

		$cswp_get_form_value = get_option( 'cswp_form_data' );

		$api_key = isset( $_POST['appid'] ) ? sanitize_text_field( wp_unslash( $_POST['appid'] ) ) : '';

		if ( isset( $_POST['cswp_form_select'] ) && 'manualrate' === $_POST['cswp_form_select'] ) {
			$basecurency = isset( $_POST['basecurency'] ) ? sanitize_text_field( wp_unslash( $_POST['basecurency'] ) ) : '';

		} elseif ( isset( $_POST['cswp_form_select'] ) && 'apirate' === $_POST['cswp_form_select'] ) {

			$basecurency = isset( $_POST['basecurencyapi'] ) ? sanitize_text_field( wp_unslash( $_POST['basecurencyapi'] ) ) : '';
		}

		$decimalradio = isset( $_POST['cswp_decimal_place_value'] ) ? intval( $_POST['cswp_decimal_place_value'] ) : '';

		if ( 0 === $decimalradio ) {
			$decimalradio = null;
		}

		$form_type        = isset( $_POST['cswp_form_select'] ) ? sanitize_text_field( wp_unslash( $_POST['cswp_form_select'] ) ) : '';
		$cswp_button_type = isset( $_POST['cswp_button_type'] ) ? sanitize_text_field( wp_unslash( $_POST['cswp_button_type'] ) ) : '';
		$cswp_vlaue_style = isset( $_POST['cswp_vlaue_style'] ) ? sanitize_text_field( wp_unslash( $_POST['cswp_vlaue_style'] ) ) : '';
		$frequency_reload = isset( $_POST['frequency_reload'] ) ? sanitize_text_field( wp_unslash( $_POST['frequency_reload'] ) ) : '';

		// Store checkbox values in arraysanitize_text_field().
		if ( 'manualrate' === $_POST['cswp_form_select'] ) {

			if ( isset( $_POST['currency_button'] ) ) {

				foreach ( $_POST['currency_button'] as $currencybutton ) {//PHPCS:ignore:WordPress.Security.ValidatedSanitizedInput.MissingUnslash
					$cswp_currency_button_type[] = $currencybutton;
				}
			}

			if ( null === $cswp_currency_button_type ) {
					$cswp_currency_button_type = array( 'INR' );
			}

			if ( isset( $cswp_currency_button_type ) ) {

				$cswp_currency_button_type = array_combine( $cswp_currency_button_type, $cswp_currency_button_type );

				update_option( 'cswp_currency_button_type', $cswp_currency_button_type );
			}
		} elseif ( 'apirate' === $_POST['cswp_form_select'] ) {

			if ( isset( $_POST['currency_button_api'] ) ) {

				foreach ( $_POST['currency_button_api'] as $currencybutton ) {//PHPCS:ignore:WordPress.Security.ValidatedSanitizedInput.MissingUnslash
					$cswp_currency_button_type[] = $currencybutton;
				}
			}

			if ( null === $cswp_currency_button_type ) {
					$cswp_currency_button_type = array( 'INR' );
			}

			if ( isset( $cswp_currency_button_type ) ) {

				$cswp_currency_button_type = array_combine( $cswp_currency_button_type, $cswp_currency_button_type );

				update_option( 'cswp_currency_button_type', $cswp_currency_button_type );
			}
		}

		// Store values in array.
		$savevalues = array(
			'basecurency'      => $basecurency,
			'cswp_form_select' => $form_type,
			'api_key'          => $api_key,
			'frequency_reload' => $frequency_reload,
			'cswp_button_type' => $cswp_button_type,
			'decimalradio'     => $decimalradio,
		);

		// Merging both array.
		if ( isset( $cswp_currency_button_type ) ) {

			$savevalues = array_merge( $savevalues, $cswp_currency_button_type );
		}

		// Store $update_option array value in database option table.
		update_option( 'cswp_form_data', $savevalues );

		// values from usermanual currency rate.
		if ( 'manualrate' === $_POST['cswp_form_select'] ) {

			$usd_rate = isset( $_POST['usd'] ) ? floatval( $_POST['usd'] ) : '';
			$inr_rate = isset( $_POST['inr'] ) ? floatval( $_POST['inr'] ) : '';
			$eur_rate = isset( $_POST['eur'] ) ? floatval( $_POST['eur'] ) : '';
			$aud_rate = isset( $_POST['aud'] ) ? floatval( $_POST['aud'] ) : '';

			$usd_text = isset( $_POST['usd-text'] ) ?  $_POST['usd-text']  : '';
			$inr_text = isset( $_POST['inr-text'] ) ?  $_POST['inr-text']  : '';
			$eur_text = isset( $_POST['eur-text'] ) ?  $_POST['eur-text']  : '';
			$aud_text = isset( $_POST['aud-text'] ) ?  $_POST['aud-text']  : '';

			$usd_symbol =  isset( $_POST['usd-symbol'] ) ? sanitize_text_field( wp_unslash( $_POST['usd-symbol'] ) ) : '';
			$inr_symbol =  isset( $_POST['inr-symbol'] ) ? sanitize_text_field( wp_unslash( $_POST['inr-symbol'] ) ) : '';
			$eur_symbol =  isset( $_POST['eur-symbol'] ) ? sanitize_text_field( wp_unslash( $_POST['eur-symbol'] ) ) : '';
			$aud_symbol =  isset( $_POST['aud-symbol'] ) ? sanitize_text_field( wp_unslash( $_POST['aud-symbol'] ) ) : '';

			$cswp_manual_rate = array(

				'usd_rate' => $usd_rate,
				'inr_rate' => $inr_rate,
				'eur_rate' => $eur_rate,
				'aud_rate' => $aud_rate,

				'usd-text' => $usd_text,
				'inr-text' => $inr_text,
				'eur-text' => $eur_text,
				'aud-text' => $aud_text,

				'usd-symbol' => $usd_symbol,
				'inr-symbol' => $inr_symbol,
				'eur-symbol' => $eur_symbol,
				'aud-symbol' => $aud_symbol,
			);
			update_option( 'cswp_display', 'display' );
			update_option( 'cswp_manual_rate', $cswp_manual_rate );

		} elseif ( 'apirate' === $_POST['cswp_form_select'] ) {

			$data = '';

			$data = add_query_arg(
				array(
					'app_id' => $api_key,
					'base'   => $basecurency,
				),
				'https://openexchangerates.org/api/latest.json'
			);

			$data = wp_remote_post( $data );
			
			$data= json_decode( $data['body'] );
			
			if ( 'invalid_app_id' === $data->message && 'manualrate' !== $_POST['cswp_form_select']) {
					update_option( 'apivalidate', 'no' );

			} else if('not_allowed' === $data->message && 'manualrate' !== $_POST['cswp_form_select'] ) {
				update_option( 'apinotfree', 'notfree' );
			} else if('missing_app_id' === $data->message && 'manualrate' !== $_POST['cswp_form_select'] ) {
				update_option( 'apinotfree', 'emptyapi' );
			} else {
				// Store required data in database.
				if ( isset( $data ) ) {

					$inr = $data->rates->INR;
					$eur = $data->rates->EUR;
					$usd = $data->rates->USD;
					$aud = $data->rates->AUD;

					$usd_apitext = isset( $_POST['usd-apitext'] ) ? $_POST['usd-apitext'] : '';
					$inr_apitext = isset( $_POST['inr-apitext'] ) ? $_POST['inr-apitext'] : '';
					$eur_apitext = isset( $_POST['eur-apitext'] ) ? $_POST['eur-apitext'] : '';
					$aud_apitext = isset( $_POST['aud-apitext'] ) ? $_POST['aud-apitext'] : '';

					$usd_apisymbol =  isset( $_POST['usd-apisymbol'] ) ? sanitize_text_field( wp_unslash( $_POST['usd-apisymbol'] ) ) : '';
			$inr_apisymbol =  isset( $_POST['inr-apisymbol'] ) ? sanitize_text_field( wp_unslash( $_POST['inr-apisymbol'] ) ) : '';
			$eur_apisymbol =  isset( $_POST['eur-apisymbol'] ) ? sanitize_text_field( wp_unslash( $_POST['eur-apisymbol'] ) ) : '';
			$aud_apisymbol =  isset( $_POST['aud-apisymbol'] ) ? sanitize_text_field( wp_unslash( $_POST['aud-apisymbol'] ) ) : '';


					$cswp_apirate_values = array(
						'inr'         => $inr,
						'eur'         => $eur,
						'usd'         => $usd,
						'aud'         => $aud,

						'usd-apitext' => $usd_apitext,
						'inr-apitext' => $inr_apitext,
						'eur-apitext' => $eur_apitext,
						'aud-apitext' => $aud_apitext,

						'usd-apisymbol' => $usd_apisymbol,
				'inr-apisymbol' => $inr_apisymbol,
				'eur-apisymbol' => $eur_apisymbol,
				'aud-apisymbol' => $aud_apisymbol,

					);

					update_option( 'cswp_display', 'display' );
				}

				update_option( 'cswp_apirate_values', $cswp_apirate_values );
			}
		}

		$old_frequency = isset( $cswp_get_form_value['frequency_reload'] ) ? sanitize_text_field( $cswp_get_form_value['frequency_reload'] ) : '';

		if ( empty( $old_frequency ) && empty( $frequency_reload ) ) {

			// Schedule an action if it's not already scheduled.
			wp_schedule_event( time(), $frequency_reload, 'cs_schedule_hook' );

		} elseif ( ! empty( $frequency_reload ) && ( $frequency_reload !== $old_frequency ) ) {

			// Get the timestamp for the next event.
			$timestamp = wp_next_scheduled( 'cs_schedule_hook' );
			// If this event was created with any special arguments, you need to get those too.
			if ( $timestamp ) {
				wp_unschedule_event( $timestamp, 'cs_schedule_hook' );
			}
			// Schedule an action if it's not already scheduled.
			wp_schedule_event( time(), $frequency_reload, 'cs_schedule_hook' );
		}
	}

	/**
	 * Function that schedule events
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function cs_schedule_event() {

		$data = add_query_arg(
			array(
				'app_id' => $api_key,
				'base'   => $base_currency,
			),
			'https://openexchangerates.org/api/latest.json'
		);

		$data = wp_remote_post( $data );
		$data = json_decode( $data['body'] );
		// Store required data in database.
		if ( isset( $data ) ) {

			$inr = $data->rates->INR;
			$eur = $data->rates->EUR;
			$usd = $data->rates->USD;
			$aud = $data->rates->AUD;

			$cswp_apirate_values = array(
				'inr' => $inr,
				'eur' => $eur,
				'usd' => $usd,
				'aud' => $aud,
			);
			update_option( 'cswp_apirate_values', $cswp_apirate_values );
		}

	}

	/**
	 * Define load_backend_script.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function load_backend_script() {

		wp_register_script( 'cswp-backend-script', CSWP_PLUGIN_URL . 'assets/js/exchange.js', array( 'jquery' ), CSWP_CURRENCY_SWITCHER_VER, true );

		wp_enqueue_script( 'cswp-backend-script' );
		wp_enqueue_style( 'cswp-style', CSWP_PLUGIN_URL . '/assets/css/cs-styles.css', '', CSWP_CURRENCY_SWITCHER_VER );

		$data = array(
			'cs_data'    => get_option( 'cs_data', array() ),
			'ajax_url'   => admin_url( 'admin-ajax.php' ),
			'ajax_nonce' => wp_create_nonce( 'ajax_nonce_val' ),
		);

		wp_localize_script( 'cswp-backend-script', 'csVars', $data );
	}

	/**
	 * Plugin Scripts.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function cswp_load_scripts() {

		wp_register_style( 'cswp-style', CSWP_PLUGIN_URL . '/assets/css/buttonhide.css', CSWP_CURRENCY_SWITCHER_VER, true );

		wp_register_script( 'cswp-getrate', CSWP_PLUGIN_URL . 'assets/js/cs-script.js', array( 'jquery' ), CSWP_CURRENCY_SWITCHER_VER, true );

		wp_register_script( 'cswp-script', CSWP_PLUGIN_URL . 'assets/js/cs-script.js', array( 'jquery' ), CSWP_CURRENCY_SWITCHER_VER, true );

		$cswp_get_form_value = self::cswp_load_all_data();
		$cswp_manualrate     = self::cswp_load_manual_data();

		$actual_currency_rates = array();
		$currency_symbol_add =array();

		// perform wp_localize_script() for currency rate and setting page value which use in javascript.
		if ( isset( $cswp_get_form_value['cswp_form_select'] ) ) {

			if ( 'apirate' === $cswp_get_form_value['cswp_form_select'] ) {

				$cswp_apirate_values = self::cswp_load_apirate_values_data();

				if ( ! empty( $cswp_apirate_values ) ) {
					$actual_currency_rates = array(
						'USD' => $cswp_apirate_values['usd'],
						'INR' => $cswp_apirate_values['inr'],
						'EUR' => $cswp_apirate_values['eur'],
						'AUD' => $cswp_apirate_values['aud'],
					);
					$currency_symbol_add = array(
					'usd-symbol' => $cswp_apirate_values['usd-apisymbol'],
					'inr-symbol' => $cswp_apirate_values['inr-apisymbol'],
					'eur-symbol' => $cswp_apirate_values['eur-apisymbol'],
					'aud-symbol' => $cswp_apirate_values['aud-apisymbol'],
				);
				}
			} elseif ( 'manualrate' === $cswp_get_form_value['cswp_form_select'] ) {
				$actual_currency_rates = array(
					'USD' => $cswp_manualrate['usd_rate'],
					'INR' => $cswp_manualrate['inr_rate'],
					'EUR' => $cswp_manualrate['eur_rate'],
					'AUD' => $cswp_manualrate['aud_rate'],
				);
				$currency_symbol_add = array(
					'usd-symbol' => $cswp_manualrate['usd-symbol'],
					'inr-symbol' => $cswp_manualrate['inr-symbol'],
					'eur-symbol' => $cswp_manualrate['eur-symbol'],
					'aud-symbol' => $cswp_manualrate['aud-symbol'],
				);
			}
		}


		$cswp_basecurency = '';

		if ( isset( $cswp_get_form_value['basecurency'] ) ) {
			$cswp_basecurency = $cswp_get_form_value['basecurency'];
		}

		$currency_rate = array(
			'actual_currency_rates' => $actual_currency_rates,
			'decimal_point'         => isset( $cswp_get_form_value['decimalradio'] ) ? $cswp_get_form_value['decimalradio'] : '',
			'base_currency'         => $cswp_basecurency,
			'base_currency_symbol'  => CS_Btn_Shortcode::get_instance()->get_currency_symbol( $cswp_basecurency ),
			'currency_symbol_add'   => $currency_symbol_add,
		);
		wp_localize_script( 'cswp-getrate', 'csVars', $currency_rate );
	}
}

/**
 * Initialize the class only after all the plugins are loaded.
 *
 * @return void
 */
function initialize_cswp() {
	$cswp_loader = new CS_Loader();
}

add_action( 'plugins_loaded', 'initialize_cswp' );
