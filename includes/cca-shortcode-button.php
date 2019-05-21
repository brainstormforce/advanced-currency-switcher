<?php
/**
 * Class Short Button Doc Comment
 * 
 * PHP version 7
 *
 * @category PHP
 * @package  Currency_Convertor_Addon
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com 
 * @link     https://brainstormforce.com
*/


/**
 * Define Currency_Converter_Addon_button.
 *
 * @since  1.0.0
 * @return void
 */
function Currency_Convertor_Addon_button() {
  ob_start();

  $currencybtn = get_option( 'currency_button_type' );
  
  // var_dump(get_option('currency_button_type'));
  
  foreach ( $currencybtn as $currencyname ) {?>
	<input type="button" value="<?php echo $currencyname; ?>" id="inr"  onclick="changeto<?php echo $currencyname; ?>();">
		<?php
	}

    return ob_get_clean();
}
add_shortcode('currency_convert_button', 'Currency_Convertor_Addon_button');
