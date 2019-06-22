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
		$this->cswp_load_all_data();
		$this->cswp_load_manual_data();
		$this->cswp_load_currency_button_data();
		$this->cswp_load_apirate_values_data();

		self::includes();
		add_action( 'wp_enqueue_scripts', array( $this, 'cswp_load_scripts' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'load_backend_script' ) );
		add_action( 'wp_ajax_ccs_validate', array( $this, 'cs_validate_api_key' ) );
		add_action( 'init', array( $this, 'cswp_save_form_data' ) );
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

		$api_key = isset( $_POST['api_key'] ) ? sanitize_key( $_POST['api_key'] ) : '';
		if ( empty( $api_key ) ) {
			wp_send_json_error( __( 'Empty API key!' ) );
		}

		$data = (array) get_option( 'cswp_form_data', array() );

		$cswp_str = add_query_arg( 'app_id', $api_key, 'https://openexchangerates.org/api/latest.json' );

		$cswp_str = wp_remote_get( $cswp_str );

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
		require_once CSWP_PLUGIN_DIR . '/includes/cs-page.php';
		require_once CSWP_PLUGIN_DIR . '/includes/cs-shortcode-value.php';
		require_once CSWP_PLUGIN_DIR . '/includes/cs-shortcode-button.php';
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

		if ( 'currency_switch' !== ( isset( $_GET['page'] ) ? $_GET['page'] : null ) ) {
			return;
		}

		if ( ! isset( $_POST['cs-form'] ) ) {
			return;
		}

		if ( ! wp_verify_nonce( $_POST['cs-form'], 'cs-form-nonce' ) ) {
			return;
		}
		$cswp_get_form_value = get_option( 'cswp_form_data' );
		$api_key             = isset( $_POST['appid'] ) ? sanitize_text_field( $_POST['appid'] ) : '';

		$cswp_submit_check = add_query_arg(
			array(
				'app_id' => $api_key,
			),
			'https://openexchangerates.org/api/latest.json'
		);

		$cswp_submit_check = wp_remote_get( $cswp_submit_check );

		if ( 'Unauthorized' === $cswp_submit_check['response']['message'] && 'manualrate' !== $_POST['cswp_form_select'] ) {
			update_option( 'apivalidate', 'no' );

		}

		if ( 'manualrate' === $_POST['cswp_form_select'] ) {
			$basecurency = isset( $_POST['basecurency'] ) ? $_POST['basecurency'] : '';

		} elseif ( 'apirate' === $_POST['cswp_form_select'] ) {

			$basecurency = isset( $_POST['basecurencyapi'] ) ? $_POST['basecurencyapi'] : '';
		}

		$decimalradio = isset( $_POST['decimal-radio'] ) ? $_POST['decimal-radio'] : '';

		$form_type = isset( $_POST['cswp_form_select'] ) ? sanitize_text_field( $_POST['cswp_form_select'] ) : '';

		$cswp_button_type = isset( $_POST['cswp_button_type'] ) ? sanitize_text_field( $_POST['cswp_button_type'] ) : '';

		$frequency_reload = isset( $_POST['frequency_reload'] ) ? ( $_POST['frequency_reload'] ) : '';

		// Store checkbox values in arraysanitize_text_field().
		if ( 'manualrate' === $_POST['cswp_form_select'] ) {

			if ( isset( $_POST['currency_button'] ) ) {

				foreach ( $_POST['currency_button'] as $currencybutton ) {
					$cswp_currency_button_type[] = $currencybutton;
				}
			}

			if ( isset( $cswp_currency_button_type ) ) {

				$cswp_currency_button_type = array_combine( $cswp_currency_button_type, $cswp_currency_button_type );

				update_option( 'cswp_currency_button_type', $cswp_currency_button_type );
			}
		} elseif ( 'apirate' === $_POST['cswp_form_select'] ) {

			if ( isset( $_POST['currency_button_api'] ) ) {

				foreach ( $_POST['currency_button_api'] as $currencybutton ) {
					$cswp_currency_button_type[] = $currencybutton;
				}
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

			$usd_rate = $_POST['usd'];
			$inr_rate = $_POST['inr'];
			$eur_rate = $_POST['eur'];
			$aud_rate = $_POST['aud'];

			$usd_text = $_POST['usd-text'];
			$inr_text = $_POST['inr-text'];
			$eur_text = $_POST['eur-text'];
			$aud_text = $_POST['aud-text'];

			$cswp_manual_rate = array(

				'usd_rate' => $usd_rate,
				'inr_rate' => $inr_rate,
				'eur_rate' => $eur_rate,
				'aud_rate' => $aud_rate,

				'usd-text' => $usd_text,
				'inr-text' => $inr_text,
				'eur-text' => $eur_text,
				'aud-text' => $aud_text,
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

			$data = wp_remote_get( $data );
			
			$data = json_decode( $data['body'] );

			// Store required data in database.
			if ( isset( $data ) ) {

				$inr = $data->rates->INR;
				$eur = $data->rates->EUR;
				$usd = $data->rates->USD;
				$aud = $data->rates->AUD;

				$usd_apitext = $_POST['usd-apitext'];
				$inr_apitext = $_POST['inr-apitext'];
				$eur_apitext = $_POST['eur-apitext'];
				$aud_apitext = $_POST['aud-apitext'];

				$cswp_apirate_values = array(
					'inr'=> $inr,
					'eur'=> $eur,
					'usd'=> $usd,
					'aud'=> $aud,

					'usd-apitext' => $usd_apitext,
					'inr-apitext' => $inr_apitext,
					'eur-apitext' => $eur_apitext,
					'aud-apitext' => $aud_apitext,

				);

				if ( 'Unauthorized' === $cswp_submit_check['response']['message'] && 'manualrate' !== $_POST['cswp_form_select'] ) {
					update_option( 'cswp_display', 'no' );

				} else {
					update_option( 'cswp_display', 'display' );
				}

				update_option( 'cswp_apirate_values', $cswp_apirate_values );
			}
		}

		$old_frequency = isset( $cswp_get_form_value['frequency_reload'] ) ? $cswp_get_form_value['frequency_reload'] : '';

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

		$data = wp_remote_get( $data );
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
			'cs_data'  => get_option( 'cs_data', array() ),
			'ajax_url' => admin_url( 'admin-ajax.php' ),
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

				}
			} elseif ( 'manualrate' === $cswp_get_form_value['cswp_form_select'] ) {
				$actual_currency_rates = array(
					'USD' => $cswp_manualrate['usd_rate'],
					'INR' => $cswp_manualrate['inr_rate'],
					'EUR' => $cswp_manualrate['eur_rate'],
					'AUD' => $cswp_manualrate['aud_rate'],
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
			'base_currency_symbol'  => CSWP_Currency_Btn_Shortcode::get_instance()->get_currency_symbol( $cswp_basecurency ),
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
