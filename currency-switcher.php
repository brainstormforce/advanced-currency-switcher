<?php
/**
 * Plugin Name:     Advanced Currency Switcher
 * Plugin URI:      https://www.brainstormforce.com/
 * Description:     To convert currency in native currency using Shortcode : [currency value=' '], [currency-switch].
 * Version:         1.0.0
 * Author:          Brainstrom Force
 * Author URI:      https://www.brainstormforce.com/
 * Text Domain:     cswp_currencyswitch
 * Domain Path:     /languages
 *
 * Main
 *
 * PHP version 7
 *
 * @category PHP
 * @package  Currency_Convertor_Addon
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com
 * @link     https://brainstormforce.com
 */

require_once 'classes/class-cs-loader.php';

/*
 Add a link to the settings page on the plugins.php page.
 *
 * @since 1.0.0
 *
 * @param  array  $links List of existing plugin action links.
 * @return array         List of modified plugin action links.
 */
function cswp_plugin_action_links( $links ) {
	$links = array_merge(
		$links,
		array(
			'<a href="' . esc_url( admin_url( '/options-general.php?page=currency_switch' ) ) . '">' . __( 'Settings', 'cswp_currencyswitch' ) . '</a>',
		)
	);
	return $links;
}

add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'cswp_plugin_action_links' );
