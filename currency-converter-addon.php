<?php
/**
 * Plugin Name:     Currency Converter Addon
 * Plugin URI:      https://www.brainstormforce.com/
 * Description:     To convert currency in native currency using Shortcode : [currency_converter].
 * Version:            1.0.0
 * Author:          Ahemad Shaikh
 * Author URI:      https://www.brainstormforce.com/
 * Text Domain:     currency-convertor-addon
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

define('CCA_PLUGIN_DIR', untrailingslashit(plugin_dir_path(__FILE__)));

define('CCA_PLUGIN_URL', untrailingslashit(plugins_url('', __FILE__)));

require plugin_dir_path(__FILE__).'classes/class-cca-loader.php';