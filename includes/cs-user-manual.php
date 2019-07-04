<?php
/**
 * User Manual for how to use plugin.
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
<h2> <?php esc_html_e( 'Description', 'cswp' ); ?> </h2>

<p> <?php esc_html_e( 'Currency Switcher plugin is used to convert the currency on a web-page, into respective currency by using short-code on a page.', 'cswp' ); ?> </p>

<h3> <?php esc_html_e( 'Getting Started', 'cswp' ); ?> </h3>

<p> <?php esc_html_e( 'Allow user to select a type of action to be performed for currency switcher :-', 'cswp' ); ?>  </p>

<ul class="cswp-list">

	<li class="cswp-list"> <?php esc_html_e( 'Manual Currency Value', 'cswp' ); ?> </li>

	<p> <?php esc_html_e( 'This helps the user to set base currency and allow to insert values manually for other currency if the user does not have an API key for currency switchers.', 'cswp' ); ?>
	</p>

	<li class="cswp-list"> <?php esc_html_e( 'API Currency Value', 'cswp' ); ?></li>

	<p> <?php esc_html_e( 'This helps user to set base currency and allow to input API key so that currency value can be updated automatically.', 'cswp' ); ?>
	</p>
	<p> <?php esc_html_e( 'User have to authenticate the API key first to confirm the key is right or not.', 'cswp' ); ?>
		</p>
	<p> <?php esc_html_e( 'Visit here to generate the App ID ', 'cswp' ); ?>
		<a href="https://openexchangerates.org/" target="_blank">https://openexchangerates.org/</a>&nbsp; <?php esc_html_e( 'copy the APP Id and paste it in text box.', 'cswp' ); ?>
	</p>

	<p> <?php esc_html_e( 'Set frequency so that the currency value get updated automatically.', 'cswp' ); ?>
	</p>

</ul>

<h2> <?php esc_html_e( 'Shortcodes', 'cswp' ); ?> </h2>

<ul class="cswp-list">

	<li class="cswp-list"> <?php esc_html_e( 'Shotcode for Currency switcher', 'cswp' ); ?> </li>

	<pre><code>[currency value=""]</code></pre>

	<p><?php esc_html_e( 'This shortcode helps to convert the values. You can insert this shortcode inside the Price box of Ultimate Addon for Eementor, Ultimate Addon for Beaver Builder, any other page builder and also you can use where you want to display currency values.', 'cswp' ); ?> <br><?php esc_html_e( 'By passing the value in currency shortcode for example:', 'cswp' ); ?><b> [currency value="27"] </b>
	</p>

	<li class="cswp-list"><?php esc_html_e( 'Shotcode for Currency switcher Button', 'cswp' ); ?>  </li>

	<pre><code>[currency-switch]</code></pre>

	<p> <?php esc_html_e( 'This shortcode allows user to embed the currency switcher button on the web page of the website. It supports Elementor, Beaver Builder and other page builder', 'cswp' ); ?>
	</p>

</ul>

<h2> <?php esc_html_e( 'Disclaimer', 'cswp' ); ?> </h2>

<p> <?php esc_html_e( "The accuracy of the currency may vary from time to time. Which depends on the API you are using for the plugin. We can't guarantee the value provided by the API is accurate.", 'cswp' ); ?>
</p>

</body>
</html>
