<?php
/**
 * FooDocs
 *
 * A simple documentation plugin for helping easily and intuitively create documentation for WordPress plugins.
 *
 * @package   foodocs
 * @author    Matt Cromwell <reachme@mattcromwell.com>
 * @license   GPL-2.0+
 * @link      https://github.com/mathetos/foodocs
 * @copyright 2013 Matt Cromwell
 *
 * @wordpress-plugin
 * Plugin Name: FooDocs
 * Plugin URI:  https://github.com/mathetos/foodocs
 * Description: A simple documentation plugin for helping easily and intuitively create documentation for WordPress plugins.
 * Version:     0.0.1
 * Author:      mathetos
 * Author URI:  http://mattcromwell.com
 * Text Domain: foodocs-locale
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path: /lang
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

//include plugin class
require_once( plugin_dir_path( __FILE__ ) . 'class-foodocs.php' );

//include mobile detect class
if (!class_exists('Mobile_Detect')) {
	require_once( plugin_dir_path( __FILE__ ) . 'includes/Mobile_Detect.php');
}

//run it baby!
DeviceBodyClass::get_instance();