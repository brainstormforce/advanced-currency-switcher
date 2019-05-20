<?php
/**
 * Class Short Doc Comment
 * 
 * PHP version 7
 *
 * @category PHP
 * @package  Currency_Convertor_Addon
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com 
 * @link     https://brainstormforce.com
*/



add_shortcode('currency_convert', 'Currency_Convertor_addon');
/**
 * Define Currency_Converter_addon.
 *
 * @param string $atts The text to be formatted
 *
 * @since  1.0.0
 * @return void
 */
function Currency_Convertor_addon( $atts )
{
   ob_start();
   $attributes = shortcode_atts (
    array(
    'value' => '',
    ), 
    $atts
   );
	$getval = $attributes['value'];
    $myprice=$attributes['value'];
    if($myprice=='')
    {
       $myprice=$attributes['value'];
    }else {
   update_option('mypricevalue', $myprice);
}
//var_dump(get_option('mypricevalue'));
	?>
 <!--  Create custom div and span for display price -->
    <div class="cca-converter-wrap" >
        <span id="cca-convertor-wrap-1" class="cca-convertor-wrap-data-1">
        	<?php
        		echo $getval;
        	?>	
        </span>
    </div>
<!--     <script type="text/javascript">
        var getclass = document.getElementsByClassName( "cca-convertor-wrap-data-1" );
        for(var i=0;i<getclass.length;i++) {
           getclass[i].style.fontSize='65px';
        }
    </script> -->
    <?php
    return ob_get_clean();
}
