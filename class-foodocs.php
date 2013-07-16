<?php
/**
 * FooDocs
 *
 * @package   FooDocs
 * @author    Matt Cromwell <reachme@mattcromwell.com>
 * @license   GPL-2.0+
 * @link      https://github.com/mathetos/foodocs
 * @copyright 2013 Matt Cromwell
 */

class FooDocs {

	/**
	 * Plugin version, used for cache-busting of style and script file references.
	 * @since   0.0.1
	 * @var     string
	 */
	protected $version = '0.0.1';

	/**
	 * Unique identifier for your plugin.
	 *
	 * Use this value (not the variable name) as the text domain when internationalizing strings of text. It should
	 * match the Text Domain file header in the main plugin file.
	 *
	 * @since    0.0.1
	 *
	 * @var      string
	 */
	protected $plugin_slug = 'foodocs';

	/**
	 * Instance of this class.
	 *
	 * @since    0.0.1
	 *
	 * @var      object
	 */
	protected static $instance = null;

	/**
	 * Return an instance of this class.
	 *
	 * @since     0.0.1
	 *
	 * @return    object    A single instance of this class.
	 */
	public static function get_instance() {

		// If the single instance hasn't been set, set it now.
		if ( null == self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Initialize the plugin
	 *
	 * @since     1.0.0
	 */
	private function __construct() {
		//only do this on the frontend
		if ( !is_admin() ) {
			add_filter( 'body_class', array( $this, 'add_class_names' ) );
		}
	}

	/**
	 * Adds the class names to the body tag
	 *
	 * @since    1.0.0
	 */
	public function add_class_names($classes) {
		global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome;

		$md = new Mobile_Detect();
		$md->setDetectionType('extended');

		//Tablet, Mobile or Desktop
		if ( $md->isTablet() ) { $classes[] = 'tablet'; }
		else if ( $md->isMobile() ) { $classes[] = "mobile"; }
		else { $classes[] = "desktop"; }

		//Specific types of mobile devices
		if ( $md->isIphone() ) { $classes[] = 'iphone'; }
		if ( $md->isIpad() ) { $classes[] = 'ipad'; }
		if ( $md->isAndroidOS() ) { $classes[] = 'android'; }
		if ( $md->isBlackBerry() ) { $classes[] = 'blackberry'; }
		if ( $md->is('WindowsMobileOS') || $md->is('WindowsPhoneOS') ) { $classes[] = 'windows_mobile'; }
		if ( $md->is('Samsung') ) { $classes[] = 'samsung'; }
		if ( $md->is('Kindle') ) { $classes[] = 'kindle'; }
		if ( $md->isiOS() ) { $classes[] = 'ios'; }

		//Browser specific
		if ($is_lynx) { $classes[] = "lynx"; }
		if ($is_gecko) { $classes[] = "gecko"; }
		if ($is_opera) { $classes[] = "opera"; }
		if ($is_NS4) { $classes[] = "ns4"; }
		if ($is_safari) { $classes[] = "safari"; }
		if ($is_chrome) { $classes[] = "chrome"; }
		if ($is_IE) { $classes[] = "ie"; }

		return $classes;
	}
}