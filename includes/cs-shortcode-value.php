<?php
/**
 * Class Short Doc Comment
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
if (! class_exists('CSCurrencyShortcode') ) {

    /**
     * Class define for currency convert shortcode.
     *
     * @class    CS_Currency_Shortcode
     * @category PHP
     * @package  Currency_Switcher
     * @author   Display Name <ahemads@bsf.io>
     * @license  https://brainstormforce.com 
     * @link     https://brainstormforce.com
     */
    class CS_Currency_Shortcode
    {

        /**
         * Constructor
         */
        public function __construct()
        {

            add_shortcode('currency', array($this,'currency_Convertoraddon'));
        }

        /**
         * Define Currency_Switcher.
         *
         * @param string $atts The text to be formatted
         *
         * @since  1.0.0
         * @return void
         */
        public function currency_Convertoraddon( $atts )
        {
            $attributes = shortcode_atts(
                array(
                'value' => '',
                ), 
                $atts
            );

            $getval = (float) $attributes['value'];
            $myprice=(float) $attributes['value'];
            ob_start();
            ?>

            <!--  Create custom div and span for display price -->
            <div class="cs-converter-wrap" >
                <span class="cs-convertor-wrap-symbol"></span>
                <span id="cs-convertor-wrap" class="cs-convertor-wrap-data" valuemy="<?php echo $myprice; ?>">
                    <?php
                    echo $getval;
                    ?>    
                </span> 
            </div>
            <?php
            return ob_get_clean();
        }
    }
    $CS_Currency_Shortcode = new CS_Currency_Shortcode();
}
