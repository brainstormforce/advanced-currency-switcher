<?php
/**
 * Main file of plugin
 *
 * @category PHP
 * @package  Currency_Switcher
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com
 * @link     https://brainstormforce.com
 */

/**
 * Plugin Name:     Advanced Currency Switcher
 * Plugin URI:      https://www.brainstormforce.com/
 * Description:     To convert one currency value into other.
 * Version:         0.0.1
 * Author:          Brainstrom Force
 * Author URI:      https://www.brainstormforce.com/
 * Text Domain:     cswp
 * Domain Path:     /languages
 *
 * Main
 *
 * @category PHP
 * @package  Currency_Convertor_Addon
 * @author   Display Name <ahemads@bsf.io>
 * @license  https://brainstormforce.com
 * @link     https://brainstormforce.com
 */

require_once 'classes/class-cs-loader.php';

/**
 * Add a link to the settings page on the plugins.php page.
 *
 * @since 1.0.0
 *
 * @param  array $links List of existing plugin action links.
 * @return array         List of modified plugin action links.
 */
function cswp_plugin_action_links( $links ) {
	$links = array_merge(
		$links,
		array(
			'<a href="' . esc_url( admin_url( '/options-general.php?page=currency_switch' ) ) . '">' . __( 'Settings', 'cswp' ) . '</a>',
		)
	);
	return $links;
}

add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'cswp_plugin_action_links' );
