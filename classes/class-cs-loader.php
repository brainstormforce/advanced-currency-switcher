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
		add_action( 'wp_enqueue_scripts', array( $this, 'cswp_load_scripts' ) );
		self::includes();
		add_action( 'admin_enqueue_scripts', array( $this, 'load_backend_script' ) );
		add_action( 'init', array( $this, 'cswp_style_form_data' ) );
		add_action( 'init', array( $this, 'cswp_save_form_data' ) );
		add_action( 'wp_ajax_ccs_validate', array( $this, 'cs_validate_api_key' ) );
		add_filter( 'cron_schedules', array( $this, 'cron_schedules' ) );
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
		return get_option( 'cswp_apirate_values' );
	}

	/**
	 * Define define_constant.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function define_constant() {
		define( 'CSWP_CURRENCY_SWITCHER_VER', '1.0.1' );

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
			wp_send_json_error( __( 'Empty API key!', 'advanced-currency-switcher' ) );
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
	public function cron_schedules( $schedules ) {
		if ( ! isset( $schedules['hourly'] ) ) {
			$schedules['hourly'] = array(
				'interval' => 60 * 60, // Every Hour.
				'display'  => __( 'Once hourly', 'advanced-currency-switcher' ),
			);
		}
		if ( ! isset( $schedules['daily '] ) ) {
			$schedules['daily'] = array(
				'interval' => 24 * 3600, // Every Day.
				'display'  => __( 'Once daily', 'advanced-currency-switcher' ),
			);
		}
		if ( ! isset( $schedules['weekly'] ) ) {
			$schedules['weekly'] = array(
				'interval' => 7 * 86400, // Every Week.
				'display'  => __( 'Once every week', 'advanced-currency-switcher' ),
			);
		}
		return $schedules;
	}

	/**
	 * Function that save style form data
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function cswp_style_form_data() {

		if ( ! isset( $_POST['cs-style-form'] ) ) {
			return;
		}
		if ( ! empty( $_POST['cs-style-form'] ) && wp_verify_nonce( sanitize_text_field( $_POST['cs-style-form'] ), 'cs-style-form-nonce' ) ) {

			//For Dropdown
			$cswp_dd_font_size = ! empty( $_POST['cswp_dd_font_size'] ) ? sanitize_text_field( $_POST['cswp_dd_font_size'] ) : '';
			$cswp_dd_background_color = ! empty( $_POST['cswp_dd_background_color'] ) ? sanitize_hex_color( $_POST['cswp_dd_background_color'] ) : '';
			$cswp_dd_text_color = ! empty( $_POST['cswp_dd_text_color'] ) ? sanitize_hex_color( $_POST['cswp_dd_text_color'] ) : '';
			$cswp_dd_padding_top = ( ! empty( $_POST['cswp_dd_padding_top'] ) ? floatval( $_POST['cswp_dd_padding_top'] ) : 0.76 );
			$cswp_dd_padding_right = ( ! empty( $_POST['cswp_dd_padding_right'] ) ? floatval( $_POST['cswp_dd_padding_right'] ) : 0.76 );
			$cswp_dd_padding_bottom = ( ! empty( $_POST['cswp_dd_padding_bottom'] ) ? floatval( $_POST['cswp_dd_padding_bottom'] ) : 0.76 );
			$cswp_dd_padding_left = ( ! empty( $_POST['cswp_dd_padding_left'] ) ? floatval( $_POST['cswp_dd_padding_left'] ) : 0.76 );
			$cswp_dd_padding_unit = ( ! empty( $_POST['cswp_dd_padding_unit'] ) ? sanitize_text_field( $_POST['cswp_dd_padding_unit'] ) : '' );

			//For Toggle
			$cswp_tgl_font_size = ( ! empty( $_POST['cswp_tgl_font_size'] ) ? sanitize_text_field($_POST['cswp_tgl_font_size'] ) : '' );
			$cswp_tgl_background_color = ( ! empty( $_POST['cswp_tgl_background_color'] ) ? sanitize_hex_color( $_POST['cswp_tgl_background_color'] ) : '' );
			$cswp_tgl_text_color = ( ! empty( $_POST['cswp_tgl_text_color'] ) ? sanitize_hex_color( $_POST['cswp_tgl_text_color'] ) : '' );
			$cswp_tgl_padding_top = ( ! empty( $_POST['cswp_tgl_padding_top'] ) ? floatval( $_POST['cswp_tgl_padding_top'] ) : 0.76 );
			$cswp_tgl_padding_right = ( ! empty( $_POST['cswp_tgl_padding_right'] ) ? floatval( $_POST['cswp_tgl_padding_right'] ) : 0.76 );
			$cswp_tgl_padding_left = ( ! empty( $_POST['cswp_tgl_padding_left'] ) ? floatval( $_POST['cswp_tgl_padding_left'] ) : 0.76);
			$cswp_tgl_padding_bottom = ( ! empty( $_POST['cswp_tgl_padding_bottom'] ) ? floatval( $_POST['cswp_tgl_padding_bottom'] ) : 0.76 );
			$cswp_tgl_padding_unit = ( ! empty( $_POST['cswp_tgl_padding_unit'] ) ? sanitize_text_field( $_POST['cswp_tgl_padding_unit'] ) : '' );
			$cswp_tgl_font_weight = ( ! empty( $_POST['cswp_tgl_font_weight'] ) ? sanitize_text_field( $_POST['cswp_tgl_font_weight'] ) : '' );
			$cswp_tgl_border_radius = ( ! empty( $_POST['cswp_tgl_border_radius'] ) ? sanitize_text_field( $_POST['cswp_tgl_border_radius'] ) : 5 );
			$cswp_tgl_border_width = ( ! empty( $_POST['cswp_tgl_border_width'] ) ? sanitize_text_field( $_POST['cswp_tgl_border_width'] ) : 2 );
			$cswp_tgl_border_style = ( ! empty( $_POST['cswp_tgl_border_style'] ) ? sanitize_text_field( $_POST['cswp_tgl_border_style'] ) : '' );
			$cswp_tgl_border_unit = ( ! empty( $_POST['cswp_tgl_border_unit'] ) ? sanitize_text_field( $_POST['cswp_tgl_border_unit'] ) : 'px' );
			$cswp_tgl_border_color = ( ! empty( $_POST['cswp_tgl_border_color'] ) ? sanitize_hex_color( $_POST['cswp_tgl_border_color'] ) : 'buttonface' );
			$cswp_tgl_text_hover_color = ( ! empty( $_POST['cswp_tgl_text_hover_color'] ) ? sanitize_hex_color( $_POST['cswp_tgl_text_hover_color'] ) : '' );
			$cswp_tgl_hover_color = ( ! empty( $_POST['cswp_tgl_hover_color'] ) ? sanitize_hex_color( $_POST['cswp_tgl_hover_color'] ) : '' );


			$cswp_font_size = ! empty( $_POST['cswp_font_size'] ) ? sanitize_text_field( $_POST['cswp_font_size'] ) : '';

			$cswp_button_width = ! empty( $_POST['cswp_button_width'] ) ? sanitize_text_field( $_POST['cswp_button_width'] ) : '';

			$cswp_font_weight = ! empty( $_POST['cswp_font_weight'] ) ? sanitize_text_field( $_POST['cswp_font_weight'] ) : '';

			$cswp_text_color = ! empty( $_POST['cswp_text_color'] ) ? sanitize_hex_color( $_POST['cswp_text_color'] ) : '';

			$cswp_hover_color = ! empty( $_POST['cswp_hover_color'] ) ? sanitize_hex_color( $_POST['cswp_hover_color'] ) : '';

			$cswp_text_hover_color = ! empty( $_POST['cswp_text_hover_color'] ) ? sanitize_hex_color( $_POST['cswp_text_hover_color'] ) : '';

			$cswp_background_color = ! empty( $_POST['cswp_background_color'] ) ? sanitize_hex_color( $_POST['cswp_background_color'] ) : '';

			$cswp_active_button_background_color = ! empty( $_POST['cswp_active_button_background_color'] ) ? sanitize_hex_color( $_POST['cswp_active_button_background_color'] ) : '';

			$cswp_padding_top = ( ! empty( $_POST['cswp_padding_top'] ) ? floatval( $_POST['cswp_padding_top'] ) : 0.76 );

			$cswp_padding_right = ( ! empty( $_POST['cswp_padding_right'] ) ? floatval( $_POST['cswp_padding_right'] ) : 0.76 );

			$cswp_padding_bottom = ( ! empty( $_POST['cswp_padding_bottom'] ) ? floatval( $_POST['cswp_padding_bottom'] ) : 0.76 );

			$cswp_padding_left = ( ! empty( $_POST['cswp_padding_left'] ) ? floatval( $_POST['cswp_padding_left'] ) : 0.76 );

			$cswp_border_width = ( ! empty( $_POST['cswp_border_width'] ) ? floatval( $_POST['cswp_border_width'] ) : 0 );

			$cswp_border_style = ( ! empty( $_POST['cswp_border_style'] ) ? sanitize_text_field( $_POST['cswp_border_style'] ) : 'none' );

			$cswp_border_color = ( ! empty( $_POST['cswp_border_color'] ) ? sanitize_hex_color( $_POST['cswp_border_color'] ) : '' );

			$cswp_icon_width = ( ! empty( $_POST['cswp_icon_width'] ) ? sanitize_text_field( $_POST['cswp_icon_width'] ) : 30 );

			$cswp_icon_height = ( ! empty( $_POST['cswp_icon_height'] ) ? sanitize_text_field( $_POST['cswp_icon_height'] ) : 30 );

			$cswp_padding_unit = ( ! empty( $_POST['cswp_padding_unit'] ) ? sanitize_text_field( $_POST['cswp_padding_unit'] ) : '' );

			$cswp_border_unit = ( ! empty( $_POST['cswp_border_unit'] ) ? sanitize_text_field( $_POST['cswp_border_unit'] ) : '' );

			$cswp_border_style = ( ! empty( $_POST['cswp_border_style'] ) ? sanitize_text_field( $_POST['cswp_border_style'] ) : '' );

			$cswp_vertical_align = ( ! empty( $_POST['cswp_vertical_align'] ) ? sanitize_text_field( $_POST['cswp_vertical_align'] ) : '' );

			$cswp_border_radius = ! empty( $_POST['cswp_border_radius'] ) ? sanitize_text_field( $_POST['cswp_border_radius'] ) : '';

			$cswp_icon_align = ! empty( $_POST['cswp_icon_align'] ) ? sanitize_text_field( $_POST['cswp_icon_align'] ) : '';

			$cswp_button = get_option( 'cswp_currency_button_type' );

			$cswp_icon_array = array(
				'USD' => '',
				'AUD' => '',
				'EUR' => '',
				'INR' => '',
			);
			$cswp_icon       = array();
			foreach ( $cswp_button as $cswp_button_value ) {
				$cswp_icon_list                        = ! empty( $_POST[ 'cswp_icon' . $cswp_button_value ] ) ? esc_url_raw( $_POST[ 'cswp_icon' . $cswp_button_value ] ) : '';
				$cswp_icon_array[ $cswp_button_value ] = $cswp_icon_list;
				array_push( $cswp_icon, $cswp_icon_list );
			}
			$save = array(
				//For Dropdown
				'cswp_dd_font_size'                      => $cswp_dd_font_size,
				'cswp_dd_text_color'                     => $cswp_dd_text_color,
				'cswp_dd_background_color'               => $cswp_dd_background_color,
				'cswp_dd_padding_top'                    => $cswp_dd_padding_top,
				'cswp_dd_padding_right'                  => $cswp_dd_padding_right,
				'cswp_dd_padding_bottom'                 => $cswp_dd_padding_bottom,
				'cswp_dd_padding_left'                   => $cswp_dd_padding_left,
				'cswp_dd_padding_unit'                   => $cswp_dd_padding_unit,

				//For Toggle
				'cswp_tgl_font_size'                      => $cswp_tgl_font_size,
				'cswp_tgl_font_weight'                    => $cswp_tgl_font_weight,
				'cswp_tgl_text_color'                     => $cswp_tgl_text_color,
				'cswp_tgl_text_hover_color'               => $cswp_tgl_text_hover_color,
				'cswp_tgl_background_color'               => $cswp_tgl_background_color,
				'cswp_tgl_hover_color'                    => $cswp_tgl_hover_color,
				'cswp_tgl_padding_top'                    => $cswp_tgl_padding_top,
				'cswp_tgl_padding_right'                  => $cswp_tgl_padding_right,
				'cswp_tgl_padding_bottom'                 => $cswp_tgl_padding_bottom,
				'cswp_tgl_padding_left'                   => $cswp_tgl_padding_left,
				'cswp_tgl_padding_unit'                   => $cswp_tgl_padding_unit,
				'cswp_tgl_border_radius'                  => $cswp_tgl_border_radius,
				'cswp_tgl_border_width'                   => $cswp_tgl_border_width,
				'cswp_tgl_border_style'                   => $cswp_tgl_border_style,
				'cswp_tgl_border_color'                   => $cswp_tgl_border_color,
				'cswp_tgl_border_unit'                    => $cswp_tgl_border_unit,

				'cswp_button_width'                   => $cswp_button_width,
				'cswp_font_size'                      => $cswp_font_size,
				'cswp_font_weight'                    => $cswp_font_weight,
				'cswp_text_color'                     => $cswp_text_color,
				'cswp_background_color'               => $cswp_background_color,

				'cswp_padding_top'                    => $cswp_padding_top,
				'cswp_padding_right'                  => $cswp_padding_right,
				'cswp_padding_bottom'                 => $cswp_padding_bottom,
				'cswp_padding_left'                   => $cswp_padding_left,
				'cswp_padding_unit'                   => $cswp_padding_unit,

				'cswp_border_radius'                  => $cswp_border_radius,
				'cswp_border_width'                   => $cswp_border_width,
				'cswp_border_style'                   => $cswp_border_style,
				'cswp_border_color'                   => $cswp_border_color,
				'cswp_border_unit'                    => $cswp_border_unit,
				'cswp_vertical_align'                   => $cswp_vertical_align,

				'cswp_hover_color'                    => $cswp_hover_color,
				'cswp_text_hover_color'               => $cswp_text_hover_color,

				'cswp_active_button_background_color' => $cswp_active_button_background_color,
				'cswp_icon_align'                     => $cswp_icon_align,
				'cswp_icon_width'                     => $cswp_icon_width,
				'cswp_icon_height'                    => $cswp_icon_height,

				'cswp_icon'                           => $cswp_icon,
				'cswp_icon_array'                     => $cswp_icon_array,
			);
			update_option( 'cswp_style_form_data', $save );

		}
	}
	/**
	 * Function that save all form data
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function cswp_save_form_data() {

		$cswp_currency_button_type = null;
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

			$basecurency = isset( $_POST['basecurency'] ) ? sanitize_text_field( wp_unslash( $_POST['basecurency'] ) ) : '';

		$decimalradio = isset( $_POST['cswp_decimal_place_value'] ) ? intval( $_POST['cswp_decimal_place_value'] ) : '';

		if ( 0 === $decimalradio ) {
			$decimalradio = 0;
		}

		$form_type        = isset( $_POST['cswp_form_select'] ) ? sanitize_text_field( wp_unslash( $_POST['cswp_form_select'] ) ) : '';
		$cswp_button_type = isset( $_POST['cswp_button_type'] ) ? sanitize_text_field( wp_unslash( $_POST['cswp_button_type'] ) ) : '';
		$cswp_vlaue_style = isset( $_POST['cswp_vlaue_style'] ) ? sanitize_text_field( wp_unslash( $_POST['cswp_vlaue_style'] ) ) : '';
		$frequency_reload = isset( $_POST['frequency_reload'] ) ? sanitize_text_field( wp_unslash( $_POST['frequency_reload'] ) ) : 'manual';

		if ( isset( $_POST['currency_button'] ) ) {

			foreach ( $_POST['currency_button'] as $currencybutton ) {//PHPCS:ignore:WordPress.Security.ValidatedSanitizedInput.InputNotSanitized
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

		// Store values in array.
			$usd_text = isset( $_POST['usd-text'] ) ? wp_kses_post( wp_unslash( $_POST['usd-text'] ) ) : '';
			$inr_text = isset( $_POST['inr-text'] ) ? wp_kses_post( wp_unslash( $_POST['inr-text'] ) ) : '';
			$eur_text = isset( $_POST['eur-text'] ) ? wp_kses_post( wp_unslash( $_POST['eur-text'] ) ) : '';
			$aud_text = isset( $_POST['aud-text'] ) ? wp_kses_post( wp_unslash( $_POST['aud-text'] ) ) : '';

			$usd_symbol = isset( $_POST['usd-symbol'] ) ? wp_kses_post( wp_unslash( $_POST['usd-symbol'] ) ) : '';
			$inr_symbol = isset( $_POST['inr-symbol'] ) ? wp_kses_post( wp_unslash( $_POST['inr-symbol'] ) ) : '';
			$eur_symbol = isset( $_POST['eur-symbol'] ) ? wp_kses_post( wp_unslash( $_POST['eur-symbol'] ) ) : '';
			$aud_symbol = isset( $_POST['aud-symbol'] ) ? wp_kses_post( wp_unslash( $_POST['aud-symbol'] ) ) : '';
		$savevalues     = array(
			'basecurency'      => $basecurency,
			'cswp_form_select' => $form_type,
			'api_key'          => $api_key,
			'frequency_reload' => $frequency_reload,
			'cswp_button_type' => $cswp_button_type,
			'decimalradio'     => $decimalradio,

			'usd-text'         => $usd_text,
			'inr-text'         => $inr_text,
			'eur-text'         => $eur_text,
			'aud-text'         => $aud_text,

			'usd-symbol'       => $usd_symbol,
			'inr-symbol'       => $inr_symbol,
			'eur-symbol'       => $eur_symbol,
			'aud-symbol'       => $aud_symbol,
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

			$cswp_manual_rate = array(

				'usd_rate' => $usd_rate,
				'inr_rate' => $inr_rate,
				'eur_rate' => $eur_rate,
				'aud_rate' => $aud_rate,

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
			$data = wp_remote_post( $data, array( 'timeout' => '300' ) );
			if ( ! is_wp_error( $data ) ) {

				$data = json_decode( $data['body'] );

				if ( ! empty( $data->message ) ) {

					if ( 'invalid_app_id' === $data->message && 'manualrate' !== $_POST['cswp_form_select'] ) {
						update_option( 'apivalidate', 'no' );

					} elseif ( 'not_allowed' === $data->message && 'manualrate' !== $_POST['cswp_form_select'] ) {
						update_option( 'apinotfree', 'notfree' );
					} elseif ( 'missing_app_id' === $data->message && 'manualrate' !== $_POST['cswp_form_select'] ) {
						update_option( 'apinotfree', 'emptyapi' );
					}
				} else {
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

						update_option( 'cswp_display', 'display' );
					}
					update_option( 'cswp_apirate_values', $cswp_apirate_values );
				}
			}
		}

		$old_frequency = isset( $cswp_get_form_value['frequency_reload'] ) ? sanitize_text_field( $cswp_get_form_value['frequency_reload'] ) : '';

		$api_form_selection = isset( $_POST['cswp_form_select'] ) ? sanitize_text_field( wp_unslash( $_POST['cswp_form_select'] ) ) : '';

		if ( empty( $old_frequency ) && ! empty( $frequency_reload ) ) {
			if ( 'apirate' === $api_form_selection ) {
				// Schedule an action if it's not already scheduled.
				wp_schedule_event( time(), $frequency_reload, 'cs_schedule_hook' );
			}
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

		$sotred_data = get_option(
			'cswp_form_data',
			array(
				'basecurency' => '',
				'api_key'     => '',
			)
		);
		if ( ! empty( $sotred_data['basecurency'] ) && ! empty( $sotred_data['api_key'] ) ) {
			$data = add_query_arg(
				array(
					'app_id' => $sotred_data['api_key'],
					'base'   => $sotred_data['basecurency'],
				),
				'https://openexchangerates.org/api/latest.json'
			);
			$data = wp_remote_post( $data );
			$data = json_decode( $data['body'] );
			// Store required data in database.
			if ( ! empty( $data ) && ! isset( $data->error ) ) {

				$inr = $data->rates->INR;
				$eur = $data->rates->EUR;
				$usd = $data->rates->USD;
				$aud = $data->rates->AUD;

				$cswp_apirate_values_cron = array(
					'inr' => $inr,
					'eur' => $eur,
					'usd' => $usd,
					'aud' => $aud,
				);
				$cswp_apirate_values      = get_option( 'cswp_apirate_values' );
				$cswp_apirate_values      = wp_parse_args( $cswp_apirate_values_cron, $cswp_apirate_values );
				update_option( 'cswp_apirate_values', $cswp_apirate_values );
			}
		}
	}

	/**
	 * Define load_backend_script.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function load_backend_script() {
		$cswp_get_button_value = $this->cswp_load_currency_button_data();
		wp_register_script( 'cswp-backend-script', CSWP_PLUGIN_URL . 'assets/js/exchange.js', array( 'jquery' ), CSWP_CURRENCY_SWITCHER_VER, true );
		wp_enqueue_media();
		wp_register_script( 'cswp-image-upload', CSWP_PLUGIN_URL . 'assets/js/cs_image_upload.js', array( 'jquery' ), CSWP_CURRENCY_SWITCHER_VER, true );
		wp_enqueue_script( 'cswp-image-upload' );
		wp_localize_script(
			'cswp-image-upload',
			'cswp_image_upload_vars',
			array(
				'cswp_get_button_value' => $cswp_get_button_value,
			),
			true
		);
		wp_register_script( 'colorpickerscript', CSWP_PLUGIN_URL . 'assets/js/color-picker.js', array( 'jquery', 'wp-color-picker' ), CSWP_CURRENCY_SWITCHER_VER, true );
		wp_enqueue_script( 'cswp-backend-script' );
		wp_enqueue_style( 'cswp-style', CSWP_PLUGIN_URL . '/assets/css/cs-styles.css', '', CSWP_CURRENCY_SWITCHER_VER );

		$data = array(
			'ajax_url'   => admin_url( 'admin-ajax.php' ),
			'ajax_nonce' => wp_create_nonce( 'ajax_nonce_val' ),
		);

		wp_localize_script( 'cswp-backend-script', 'csExchangeVars', $data );
	}

	/**
	 * Plugin Scripts.
	 *
	 * @since  1.0.0
	 * @return void
	 */
	public function cswp_load_scripts() {

		wp_register_style( 'cswp-style', CSWP_PLUGIN_URL . '/assets/css/buttonhide.css', CSWP_CURRENCY_SWITCHER_VER, true );
		wp_register_script( 'cswp-script', CSWP_PLUGIN_URL . 'assets/js/cs-script.js', array( 'jquery' ), CSWP_CURRENCY_SWITCHER_VER, true );

		$cswp_get_form_value = self::cswp_load_all_data();
		$cswp_manualrate     = self::cswp_load_manual_data();

		$actual_currency_rates = array();
		$currency_symbol_add   = array();

		// perform wp_localize_script() for currency rate and setting page value which use in javascript.
		if ( isset( $cswp_get_form_value['cswp_form_select'] ) ) {

			if ( 'apirate' === $cswp_get_form_value['cswp_form_select'] ) {

				$cswp_apirate_values = self::cswp_load_apirate_values_data();

				if ( ! empty( $cswp_apirate_values ) ) {

					$usdrate = isset( $cswp_apirate_values['usd'] ) ? $cswp_apirate_values['usd'] : '';
					$inrrate = isset( $cswp_apirate_values['inr'] ) ? $cswp_apirate_values['inr'] : '';
					$eurrate = isset( $cswp_apirate_values['eur'] ) ? $cswp_apirate_values['eur'] : '';
					$audrate = isset( $cswp_apirate_values['aud'] ) ? $cswp_apirate_values['aud'] : '';

					$actual_currency_rates = array(
						'USD' => $usdrate,
						'INR' => $inrrate,
						'EUR' => $eurrate,
						'AUD' => $audrate,
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
		$currency_symbol_add = array(
			'usd-symbol' => $cswp_get_form_value['usd-symbol'],
			'inr-symbol' => $cswp_get_form_value['inr-symbol'],
			'eur-symbol' => $cswp_get_form_value['eur-symbol'],
			'aud-symbol' => $cswp_get_form_value['aud-symbol'],
		);

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
		wp_localize_script( 'cswp-script', 'csVars', $currency_rate );
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
