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
        self::includes();
        add_action('wp_enqueue_scripts', array( $this, 'load_Scripts' ), 100);
        add_action('admin_enqueue_scripts', array( $this, 'load_Backend_Script' ));
        add_action('init',array($this,'save_form_data') );
        add_filter('cron_schedules', array($this,'my_cron_schedules'));
        add_action('cs_schedule_hook',array($this,'cs_schedule_event')) ;

    } 
        
    /**
     * Define define_constant.
     *
     * @since  1.0.0
     * @return void
     */
    public function define_Constant()
    {

        define('CS_CURRENCY_SWITCHER_VER', '1.0.0');

        define('CS_CURRENCY_SWITCH_FILE', trailingslashit(dirname(dirname(__FILE__))) . 'currency-switcher.php');
           
        define('CS_PLUGIN_DIR', untrailingslashit(plugin_dir_path(CS_CURRENCY_SWITCH_FILE)));
         
        define('CS_PLUGIN_URL', plugins_url('/', CS_CURRENCY_SWITCH_FILE));
           
    }
    
    /**
     * Function that includes necessary files
     *
     * @since  1.0.0
     * @return void
     */
    public function includes()
    {

        require_once CS_PLUGIN_DIR.'/includes/cs-page.php'; 
        require_once CS_PLUGIN_DIR.'/includes/cs-shortcode-value.php'; 
        require_once CS_PLUGIN_DIR.'/includes/cs-shortcode-button.php'; 

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

public function save_form_data(){

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

        $getvalue=get_option('cs_data');
        $site_url = site_url();

        if (isset($_POST['submit']) ) {

            if (isset($_POST['base_currency']) ) {
                $base_currency = $_POST['base_currency'];
            } else {
                $base_currency ='';
            }

            if (isset($_POST['form_select']) ) {
                $form_type = $_POST['form_select'];
            } else {
                $form_type ='';
            }

            if (isset($_POST['appid']) ) {
                $api_key = $_POST['appid'];
            } else {
                $api_key ='';
            }

            if (isset($_POST['frequency_reload']) ) {
                $frequency_reload = $_POST['frequency_reload'];
            } else {
                $frequency_reload ='';
            }

            if (isset($_POST['decimal']) ) {
                $decimalpoint = $_POST['decimal'];
            } else {
                $decimalpoint ='';
            }

        }
 

        //Set decimal point by default 2 if its blank
        if ($decimalpoint === '' ) {
            $decimalpoint = '2';
        }

        //Store checkbox values in array

        if (isset($_POST['currency_button']) ) {

            foreach ( $_POST['currency_button'] as $currencybutton ) {
                $currency_button_type[] = $currencybutton;
            }
        }

        if (isset($currency_button_type) ) {

            $currency_button_type=array_combine($currency_button_type, $currency_button_type);
            update_option('currency_button_type', $currency_button_type);
        }

        //Store values in array
        $savevalues = array(
          'base_currency'=>$base_currency,
          'form_select'=>$form_type,
          'api_key'=>$api_key,
          'frequency_reload'=>$frequency_reload,
          'decimalpoint'=>$decimalpoint,
        );

        //Merging both array 
        if (isset($currency_button_type) ) {

            $savevalues = array_merge($savevalues, $currency_button_type);
}

//Store $update_option array value in database option table
update_option('cs_data', $savevalues);

//values from usermanual currency rate
        if ($_POST['form_select'] === 'manualrate' ) {

            $usd_rate=$_POST['usd'];
            $inr_rate=$_POST['inr'];
            $eur_rate=$_POST['eur'];
            $aud_rate=$_POST['aud'];

            $manual_rate = array(
                'usd_rate'=>$usd_rate,
                'inr_rate'=>$inr_rate,
                'eur_rate'=>$eur_rate,
                'aud_rate'=>$aud_rate,

            );
            update_option('manual_rate', $manual_rate);
        } elseif ($_POST['form_select'] === 'apirate' ) {

            $data='';

            $data = file_get_contents('https://openexchangerates.org/api/latest.json?app_id='.$api_key.'&base='.$base_currency.'');

            //decode jason data.
            $data = json_decode($data);

            //Store required data in database 
            if (isset($data) ) {

                $inr=$data->rates->INR;
                if ($inr ) {
                    update_option('inr', $inr);
                }

                $eur=$data->rates->EUR;
                if ($eur ) {
                    update_option('eur', $eur);
                }

                $usd=$data->rates->USD;
                if ($usd) {
                    update_option('usd', $usd);
                }

                $aud=$data->rates->AUD;
                if ($aud) {
                    update_option('aud', $aud);
                }
            }
        }

    $new_frequency = isset( $_POST['frequency_reload'] ) ? $_POST['frequency_reload'] : '';
    $old_frequency = isset( $getvalue['frequency_reload'] ) ? $getvalue['frequency_reload'] : '';

        if( empty( $old_frequency ) && ! empty( $new_frequency ) ) {
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
                    if ($inr ) {
                        update_option('inr', $inr);
                    }

                    $eur=$data->rates->EUR;
                    if ($eur ) {
                        update_option('eur', $eur);
                    }

                    $usd=$data->rates->USD;
                    if ($usd) {
                        update_option('usd', $usd);
                    }

                    $aud=$data->rates->AUD;
                    if ($aud) {
                        update_option('aud', $aud);
                    }
                }
        }

        



    /**
     * Define load_Backend_Script.
     *
     * @since  1.0.0
     * @return void
     */
    public function load_Backend_Script()
    {

        wp_enqueue_script('newscript', CS_PLUGIN_URL.'assets/js/exchange.js');
        wp_enqueue_style('myccastyle', CS_PLUGIN_URL.'/assets/css/cs-styles.css');
            
    }
    /**
     * Plugin Scripts.
     *
     * @since  1.0.0
     * @return void
     */
    public function load_Scripts()
    {   
        wp_enqueue_style('myccastyle', CS_PLUGIN_URL.'/assets/css/buttonhide.css');
        wp_register_script('getrate', CS_PLUGIN_URL.'assets/js/cs-script.js');
        wp_enqueue_script('myccacript', CS_PLUGIN_URL.'assets/js/cs-script.js');
        wp_enqueue_script('getrate');
        $getvalue = get_option('cs_data'); 
        $manualrate = get_option('manual_rate');
        $buttonvalue=get_option('currency_button_type');



            //perform wp_localize_script() for currency rate and setting page value which use in javascript.
        if (isset($getvalue[ 'form_select' ]) ) {
                
            if ($getvalue[ 'form_select' ] === 'apirate' ) {
                
                $currency_rate = array(
                    'actual_currency_rates' => array(
                        'USD' => get_option('usd'),
                        'INR' => get_option('inr'),
                        'EUR' => get_option('eur'),
                        'AUD' => get_option('aud'),
                    ),
                    
                );
                wp_localize_script('getrate', 'csVars', $currency_rate);

            } elseif ($getvalue[ 'form_select' ] === 'manualrate' ) {

                $currency_rate = array(
                    'actual_currency_rates' => array(
                        'USD' => $manualrate['usd_rate'],
                        'INR' => $manualrate['inr_rate'],
                        'EUR' => $manualrate['eur_rate'],
                        'AUD' => $manualrate['aud_rate'],
                    ),
                );
                wp_localize_script('getrate', 'csVars', $currency_rate);
            }
            
            if (isset($getvalue['decimalpoint']) ) {
                $decimalpoint = array(
                'decimaldata' => $getvalue['decimalpoint'] 
                );  
                wp_localize_script('getrate', 'mydecimal', $decimalpoint);
            }
            if (isset($buttonvalue)) {
                $btnval=array(
                    'btn' =>$buttonvalue
                );
                wp_localize_script('getrate', 'mybtn', $btnval);
            }

        }
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
