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



if (! class_exists('CSCurrencyBtnShortcode') ) {

    /**
     * Class for definr currency_Switcher_button shortcode.
     *
     * @class    CS_Currency_Shortcode
     * @category PHP
     * @package  Currency_Switcher
     * @author   Display Name <ahemads@bsf.io>
     * @license  https://brainstormforce.com 
     * @link     https://brainstormforce.com
     */
    class CSCurrencyBtnShortcode
    {

         /**
          * Constructor
          */
        public function __construct()
        {

            add_shortcode('currency_switcher_button', array($this,'currency_Switcherbutton'));
        }
        /**
         * Define Currency_Converter_Addon_button.
         *
         * @since  1.0.0
         * @return void
         */
        public function currency_Switcherbutton()
        {

            ob_start();

            $currencybtn = get_option('currency_button_type');
              
            if (is_array($currencybtn) ) {

                foreach ( $currencybtn as $currencyname ) { ?>
                    <input type="button" class="cs-currency-name" id="cstoggleto<?php echo $currencyname; ?>" value="<?php echo $currencyname; ?>" data-currency-name="<?php echo $currencyname; ?>">
                    <?php
                }
            }

            return ob_get_clean();

        }

    }

    $CSCurrencyBtnShortcode = new CSCurrencyBtnShortcode();
}


