<?php
/**
 * Currency Converter Addon Loader Doc comment
 *
 * PHP version 7
 *
 * @category PHP
 * @package  Currency_Convertor_Addon
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com 
 * @link     https://brainstormforce.com
*/

if (! class_exists('CCA_Loader') ) :
    /**
     * WCM Loader Doc comment
     *
     * PHP version 7
     *
     * @category PHP
     * @package  Google_Pagespeed_Insights_Portal
     * @author   Display Name <username@ahemads.com>
     * @license  http://brainstormforce.com
     * @link     http://brainstormforce.com
     */
    class CCA_Loader
    {
        /**
         * Constructor
         */
        public function __construct()
        {
            include CCA_PLUGIN_DIR.'/includes/cca-page.php'; 
            require CCA_PLUGIN_DIR.'/includes/cca-shortcode-value.php'; 
              require CCA_PLUGIN_DIR.'/includes/cca-shortcode-button.php'; 
            add_action('init', array($this, 'cca_pluginStyle'));
            add_action('init', array($this, 'cca_pluginScript'));
      
           
        }         
        /**
         * Plugin Styles.
         *
         * @since  1.0.0
         * @return void
         */
        public function cca_pluginStyle()
        { 
             wp_enqueue_style('customstyle', CCA_PLUGIN_URL.'/assets/css/styles.css');
        }
         /**
          * Plugin Scripts.
          *
          * @since  1.0.0
          * @return void
          */
        public function cca_pluginScript()
        { 
            wp_enqueue_script('customscript', CCA_PLUGIN_URL.'/assets/js/cca.js');
            wp_register_script( 'getrate', CCA_PLUGIN_URL.'/assets/js/cca.js' );
            wp_enqueue_script( 'getrate' );
            $options=get_option('cca_data'); 

            //perform wp_localize_script() for currency rate and setting page value which use in javascript.
            $currency_rate = array(
        
            'actualrate' => get_option('inr')
            );
            wp_localize_script( 'getrate', 'mydatarate',$currency_rate);

            $currency_rate1 = array(
                'actualrate1' => get_option('eur')
            );
            wp_localize_script( 'getrate', 'mydatarate1',$currency_rate1);

            $currency_rate2 = array(
                'actualrate2' => get_option('usd')
            );
            wp_localize_script( 'getrate', 'mydatarate2',$currency_rate2);

            $currency_rate3 = array(
                'actualrate3' => get_option('aud')
            );
            wp_localize_script( 'getrate', 'mydatarate3',$currency_rate3);

            // $currency_rate4 = array(
            //     'actualrate4' => $os['price_value']
            // );
            // wp_localize_script( 'getrate', 'mydatarate4',$currency_rate4);
            $decimalpoint = array(
                'decimaldata' => $options['decimalpoint'] 
            );
                
            wp_localize_script( 'getrate', 'mydecimal',$decimalpoint);
        }

    }
    $fl = new CCA_Loader();
endif;
?>
