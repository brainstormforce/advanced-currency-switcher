<?php
/**
 * CS Loader Doc comment
 *
 * PHP version 7
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
class CS_Loader
{
  
    /**
     * Constructor
     */
    public function __construct()
    {

        $this->define_Constant();
        $this->cswp_load_all_data();
        $this->cswp_load_manual_data();
        $this->cswp_load_currency_button_data();
        $this->cswp_load_apirate_values_data();

        self::includes();
        add_action('wp_enqueue_scripts', array( $this, 'cswp_load_Scripts' ), 100);
        add_action('admin_enqueue_scripts', array( $this, 'cswp_load_Backend_Script' ));
        add_action('init',array($this,'cswp_save_form_data') );
        add_filter('cron_schedules', array($this,'my_cron_schedules'));
        add_action('cs_schedule_hook',array($this,'cs_schedule_event'));
    } 
       
    public static function cswp_load_all_data() {

        $cswp_get_form_value=get_option('cswp_form_data');
        return $cswp_get_form_value;
    } 

    public static function cswp_load_manual_data() {

        $cswp_manual_rate=get_option('cswp_manual_rate');
        return $cswp_manual_rate;
    } 
    public static function cswp_load_currency_button_data() {

        $cswp_currency_button_type=get_option('cswp_currency_button_type');
        return $cswp_currency_button_type;
    }
    public static function cswp_load_apirate_values_data() {

        $cswp_apirate_values=get_option('cswp_apirate_values');
        return $cswp_apirate_values;
    }
    /**
     * Define define_constant.
     *
     * @since  1.0.0
     * @return void
     */
    public function define_Constant()
    {

        define('CSWP_CURRENCY_SWITCHER_VER', '1.0.0');

        define('CSWP_CURRENCY_SWITCH_FILE', trailingslashit(dirname(dirname(__FILE__))) . 'currency-switcher.php');
           
        define('CSWP_PLUGIN_DIR', untrailingslashit(plugin_dir_path(CSWP_CURRENCY_SWITCH_FILE)));
         
        define('CSWP_PLUGIN_URL', plugins_url('/', CSWP_CURRENCY_SWITCH_FILE));
        //$purchase_url = $this->bsf_get_product_info( $cswp_getcontent, 'basecurency' );
    }
    
    /**
     * Function that includes necessary files
     *
     * @since  1.0.0
     * @return void
     */
    public function includes()
    {

        require_once CSWP_PLUGIN_DIR.'/includes/cs-page.php'; 
        require_once CSWP_PLUGIN_DIR.'/includes/cs-shortcode-value.php'; 
        require_once CSWP_PLUGIN_DIR.'/includes/cs-shortcode-button.php'; 
    }

    /**
    * Custom corn schedule for various event exchange request.
    */
        public function my_cron_schedules($schedules){
            if(!isset($schedules["hourly"])){
                $schedules["hourly"] = array(
                'interval' => 60*60, // Every Hour.
                'display' => __('Once hourly'));
            }
            if(!isset($schedules["daily "])){
                $schedules["daily"] = array(
                'interval' => 24*3600, // Every Day.
                'display' => __('Once daily'));
            }
            if(!isset($schedules["weekly"])){
                $schedules["weekly"] = array(
                'interval' => 7*86400, // Every Week.
                'display' => __('Once every week'));
            }
            return $schedules;
    }

    public function cswp_save_form_data(){

          $page = isset( $_GET['page'] ) ? $_GET['page'] : null;

          if ( 'currency_switch' !== $page ) {
              return;
          }

          if ( ! isset( $_POST['cs-form'] ) ) {
              return;
          }

          if ( ! wp_verify_nonce( $_POST['cs-form'], 'cs-form-nonce' ) ) {
              return;
          }

          $cswp_get_form_value=get_option('cswp_form_data');


        if($_POST['cswp_form_select'] === 'manualrate' )
        {
            if (isset($_POST['basecurency']) ) {
                $basecurency = $_POST['basecurency'];
            } else {
                $basecurency ='';
            }
        } elseif ($_POST['cswp_form_select'] === 'apirate' ) {
             if (isset($_POST['basecurencyapi']) ) {
                $basecurency = $_POST['basecurencyapi'];
            } else {
                $basecurency ='';
            }
        }

        if (isset($_POST['cswp_form_select']) ) {
            $form_type = $_POST['cswp_form_select'];
        } else {
            $form_type ='';
        }

        if (isset($_POST['appid']) ) {
            $api_key = sanitize_text_field($_POST['appid']);
        } else {
            $api_key ='';
        }

        if (isset($_POST['frequency_reload']) ) {
            $frequency_reload = $_POST['frequency_reload'];
        } else {
            $frequency_reload ='';
        }

        if (isset($_POST['decimal']) ) {
            $decimalpoint = sanitize_text_field($_POST['decimal']);
        } else {
            $decimalpoint ='';
        }


        //Set decimal point by default 2 if its blank
        if ($decimalpoint === '' ) {
            $decimalpoint = '2';
        }

        //Store checkbox values in arraysanitize_text_field()
        if($_POST['cswp_form_select'] === 'manualrate' )
        {
            if (isset($_POST['currency_button']) ) {

                foreach ( $_POST['currency_button'] as $currencybutton ) {
                    $cswp_currency_button_type[] = $currencybutton;
                }
            }

            if (isset($cswp_currency_button_type) ) {

                $cswp_currency_button_type=array_combine($cswp_currency_button_type, $cswp_currency_button_type);
                update_option('cswp_currency_button_type', $cswp_currency_button_type);
            }
        } elseif($_POST['cswp_form_select'] === 'apirate' ) {

             if (isset($_POST['currency_button_api']) ) {

                foreach ( $_POST['currency_button_api'] as $currencybutton ) {
                    $cswp_currency_button_type[] = $currencybutton;
                }
            }

            if (isset($cswp_currency_button_type) ) {

                $cswp_currency_button_type=array_combine($cswp_currency_button_type, $cswp_currency_button_type);
                update_option('cswp_currency_button_type', $cswp_currency_button_type);
            }
        }

        //Store values in array
        $savevalues = array(
          'basecurency'=>$basecurency,
          'cswp_form_select'=>$form_type,
          'api_key'=>$api_key,
          'frequency_reload'=>$frequency_reload,
          'decimalpoint'=>$decimalpoint,
        );

        //Merging both array 
        if (isset($cswp_currency_button_type) ) {

            $savevalues = array_merge($savevalues, $cswp_currency_button_type);
        }

        //Store $update_option array value in database option table
        update_option('cswp_form_data', $savevalues);


        //values from usermanual currency rate
        if ($_POST['cswp_form_select'] === 'manualrate' ) {
            $usd_rate=sanitize_text_field($_POST['usd']);
            $inr_rate=sanitize_text_field($_POST['inr']);
            $eur_rate=sanitize_text_field($_POST['eur']);
            $aud_rate=sanitize_text_field($_POST['aud']);

            $cswp_manual_rate = array(
                'usd_rate'=>$usd_rate,
                'inr_rate'=>$inr_rate,
                'eur_rate'=>$eur_rate,
                'aud_rate'=>$aud_rate,

            );
            update_option('cswp_manual_rate', $cswp_manual_rate);

        } elseif ($_POST['cswp_form_select'] === 'apirate' ) {

            $data='';
            // if ( file_exists( 'https://openexchangerates.org/api/latest.json?app_id='.$api_key.'&base='.$base_currency.'') ) {

            $data = file_get_contents('https://openexchangerates.org/api/latest.json?app_id='.$api_key.'&base='.$basecurency.'');

            //decode jason data.
            $data = json_decode($data);

            //Store required data in database 
            if (isset($data) ) {

                $inr=$data->rates->INR;
                $eur=$data->rates->EUR;
                $usd=$data->rates->USD;
                $aud=$data->rates->AUD;

                $cswp_apirate_values = array(
                    'inr'=>$inr,
                    'eur'=>$eur,
                    'usd'=>$usd,
                    'aud'=>$aud,
                );
                update_option('cswp_apirate_values',$cswp_apirate_values);
            }
        }

    $new_frequency = isset( $_POST['frequency_reload'] ) ? $_POST['frequency_reload'] : '';
    $old_frequency = isset( $cswp_get_form_value['frequency_reload'] ) ? $cswp_get_form_value['frequency_reload'] : '';

        if( empty( $old_frequency ) &&  empty( $new_frequency && $cs_frequency_reload !== 'manual') ) {
              // Schedule an action if it's not already scheduled.
             wp_schedule_event(time(), $new_frequency, 'cs_schedule_hook');
        } else if( ! empty( $new_frequency ) && ( $new_frequency !== $old_frequency ) ) {
            // Get the timestamp for the next event.
            $timestamp = wp_next_scheduled( 'cs_schedule_hook' );
            // If this event was created with any special arguments, you need to get those too.
            if( $timestamp ) {
                wp_unschedule_event($timestamp, 'cs_schedule_hook' );
            }

             // Schedule an action if it's not already scheduled.
             wp_schedule_event(time(), $new_frequency, 'cs_schedule_hook');
          }
    }

    public function cs_schedule_event(){
        $data = file_get_contents('https://openexchangerates.org/api/latest.json?app_id='.$api_key.'&base='.$base_currency.'');

        //decode jason data.
        $data = json_decode($data);

        //Store required data in database 
        if (isset($data) ) {

            $inr=$data->rates->INR;
        $eur=$data->rates->EUR;
        $usd=$data->rates->USD;
        $aud=$data->rates->AUD;

        $cswp_apirate_values = array(
            'inr'=>$inr,
            'eur'=>$eur,
            'usd'=>$usd,
            'aud'=>$aud,
        );
        update_option('cswp_apirate_values',$cswp_apirate_values);
        }
    }

    /**
     * Define cswp_load_Backend_Script.
     *
     * @since  1.0.0
     * @return void
     */
    public function cswp_load_Backend_Script()
    {

        wp_enqueue_script('newscript', CSWP_PLUGIN_URL.'assets/js/exchange.js');
        wp_enqueue_style('myccastyle', CSWP_PLUGIN_URL.'/assets/css/cs-styles.css');
            
    }
    /**
     * Plugin Scripts.
     *
     * @since  1.0.0
     * @return void
     */
    public function cswp_load_Scripts()
    {   
        wp_enqueue_style('myccastyle', CSWP_PLUGIN_URL.'/assets/css/buttonhide.css');
        wp_register_script('getrate', CSWP_PLUGIN_URL.'assets/js/cs-script.js');
        wp_enqueue_script('myccacript', CSWP_PLUGIN_URL.'assets/js/cs-script.js');
        wp_enqueue_script('getrate');
        $cswp_get_form_value = get_option('cswp_form_data'); 
        $cswp_manualrate = get_option('cswp_manual_rate');
        $cswp_buttonvalue=get_option('cswp_currency_button_type');

        $actual_currency_rates = array();

        //perform wp_localize_script() for currency rate and setting page value which use in javascript.
        if (isset($cswp_get_form_value[ 'cswp_form_select' ]) ) {

            if ($cswp_get_form_value[ 'cswp_form_select' ] === 'apirate' ) {
                //update_option('cswp_apirate_values',$apirate_values);
                $cswp_apirate_values=get_option('cswp_apirate_values');
                $actual_currency_rates = array(
                    'USD' => $cswp_apirate_values['usd'],
                    'INR' => $cswp_apirate_values['inr'],
                    'EUR' => $cswp_apirate_values['eur'],
                    'AUD' => $cswp_apirate_values['aud'],
                );
            } elseif ($cswp_get_form_value[ 'cswp_form_select' ] === 'manualrate' ) {
                $actual_currency_rates = array(
                    'USD' => $cswp_manualrate['usd_rate'],
                    'INR' => $cswp_manualrate['inr_rate'],
                    'EUR' => $cswp_manualrate['eur_rate'],
                    'AUD' => $cswp_manualrate['aud_rate'],
                );
            }
        }

        $currency_rate = array(
            'actual_currency_rates' => $actual_currency_rates,
            'decimal_point' => isset($cswp_get_form_value['decimalpoint']) ? $cswp_get_form_value['decimalpoint'] : '',
        );
        wp_localize_script('getrate', 'csVars', $currency_rate);
    }
}

/**
 * Initialize the class only after all the plugins are loaded.
 *
 * @return void
 */
function initialize_Cs()
{
    $CS_Loader = new CS_Loader();
}

add_action('plugins_loaded', 'initialize_Cs');
