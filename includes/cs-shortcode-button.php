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

            $base_value_select=CS_Loader::cswp_load_all_data( $cswp_get_form_value );
            //var_dump($base_value_select['basecurency']);

            $currencybtn = CS_Loader::cswp_load_currency_button_data( $cswp_currency_button_type );
            //var_dump($currencybtn);
            foreach ( $currencybtn as $mybase_value )
            {
               
                if( $mybase_value === $base_value_select['basecurency'])
                {
                   continue;
                }
                $curbtn[]=$mybase_value;
            }
            
            array_push($curbtn,$base_value_select['basecurency']);
            $currencybtn=array_combine($curbtn, $curbtn);


            
              
            if (is_array($currencybtn) ) {

                foreach ( $currencybtn as $currencyname ) {

                    $currency_symbol = $this->get_currency_symbol( $currencyname );
                    ?>
                    <input type="button" class="cs-currency-name" id="cstoggleto<?php echo $currencyname; ?>" value="<?php echo 'Change TO '.$currencyname; ?>" data-currency-name="<?php echo $currencyname; ?>" data-currency-symbol="<?php echo $currency_symbol; ?>" style="display: none;">
                    <?php
                }
            }

            return ob_get_clean();
        }

        function get_currency_symbol( $currency ) {
            $currenceis = $this->get_currenceis();

            if( array_key_exists($currency, $currenceis) ) {
                return $currenceis[$currency];
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

    $CSCurrencyBtnShortcode = new CSCurrencyBtnShortcode();
}

