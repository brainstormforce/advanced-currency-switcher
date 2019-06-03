<?php
/**
 * User Manual for how to use plugin.
 * 
 * PHP version 7
 *
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com 
 * @link     https://brainstormforce.com
 */

?>
<html>
<body>
<h2> <?php _e('Description', 'cs_currencyswitch'); ?> </h2>

<p> 
    <?php 
        _e(
            'Currency Switcher plugin is used to convert the currency on a web-page, into respective currency by using short-code on a page.', 
            'cs_currencyswitch'
        ); 
    ?> 
</p>

<h3> <?php _e('Getting Started', 'cs_currencyswitch'); ?> </h3>

<p> <?php _e('Allow user to select a type of action to be performed for currency switcher,', 'cs_currencyswitch'); ?>  </p>

<ul class="cs-mylist">

    <li class="cs-mylist"> <?php _e('Manual Currency Value', 'cs_currencyswitch'); ?> </li>

    <p> <?php _e('This helps the user to set base currency and allow to insert values manually for other currency if the user does not have an API key for currency switchers.', 'cs_currencyswitch'); ?> 
    </p>

    <li class="cs-mylist"> <?php _e('API Currency Value', 'cs_currencyswitch'); ?></li>

    <p> <?php _e('This helps user to set base currency and allow to input API key so that currency value can be updated automatically.', 'cs_currencyswitch'); ?> 
    </p>

    <p> <?php _e('To generate APP Id', 'cs_currencyswitch'); ?> 
        <a href="https://openexchangerates.org/" target="_blank">https://openexchangerates.org/</a>&nbsp; <?php _e('copy the ap id and past it in text box.', 'cs_currencyswitch'); ?> 
    </p>

    <p> <?php _e('Set frequency so that the currency value get updated automatically.', 'cs_currencyswitch'); ?>  
    </p>

</ul>

<h2> <?php _e('ShortCodes', 'cs_currencyswitch'); ?> </h2>

<ul class="cs-mylist">

    <li class="cs-mylist"> <?php _e('Shot-code for Currency switcher', 'cs_currencyswitch'); ?> </li>

    <pre><code>[currency_convert value=" "]</code></pre>

    <p><?php _e('This shortcode help to insert the shortcode in the price info box in Eementor, Beaver Builder and other page builder.', 'cs_currencyswitch'); ?> <br><?php _e('By passing the value of currency in', 'cs_currencyswitch'); ?><b> value="" </b> 
    </p>

    <li class="cs-mylist"><?php _e('Shot-code for Currency switcher Button', 'cs_currencyswitch'); ?>  </li>

    <pre><code>[currency_switcher_button]</code></pre>

    <p> <?php _e('This shortcode allows user to embed the currency switcher button on the web page of the website. It support Elementor, Beaver Builder and other page builder', 'cs_currencyswitch'); ?>
    </p>

</ul>

<h2> <?php _e('Disclaimer', 'cs_currencyswitch'); ?> </h2>

<p> <?php _e('The accuracy of the currency may vary from time to time. Which depends on the API you are using for the plugin. We never guarantee the value provided by the API is accurate.', 'cs_currencyswitch'); ?> 
</p>

</body>
</html>
