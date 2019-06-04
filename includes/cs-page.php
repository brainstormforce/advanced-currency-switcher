<?php 
/**
 * Add submenu of Global settings Page to admin menu.
 *
 * PHP version 7
 *
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com 
 * @link     https://brainstormforce.com
 */

/**
 * Custom modules
 */
if (! class_exists('CS_Menu_Page') ) {
    
    /**
     * Class define for Menu.
     *
     * @class    CS_Menu_Page
     * @category PHP
     * @package  Currency_Switcher
     * @author   Display Name <ahemads@bsf.io>
     * @license  https://brainstormforce.com 
     * @link     https://brainstormforce.com
     */
    class CS_Menu_Page
    {

        /**
         * Constructor
         */
        public function __construct()
        {

            add_action('admin_menu', array( $this, 'cs_OptionsPage' ));
            
        }

        /**
         * Define cs_options_page.
         *
         * @since  1.0.0
         * @return void
         */
        public function cs_OptionsPage()
        {

            add_submenu_page(
                'options-general.php',
                'Currency Switcher',
                'Currency Switcher',
                'manage_options',
                'currency_switch',
                array( $this,'CS_Page_html')
            );
        }
        /**
             * Main Frontpage.
             *
             * @since  1.0.0
             * @return void
             */
            public function CS_Page_html()
            {

                //require main-frontend tab file 
                require_once CSWP_PLUGIN_DIR.'/includes/cs-main-frontend.php';   
            }

    }
    $menup = new CS_Menu_Page();
}
