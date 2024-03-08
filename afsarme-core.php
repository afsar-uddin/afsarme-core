<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.notionwebtech.com
 * @since             1.0.0
 * @package           Plugins_Basic
 *
 * @wordpress-plugin
 * Plugin Name:       afsarme-core
 * Plugin URI:        https://www.notionwebtech.com
 * Description:       This plugin for core functionality of the whole website.
 * Version:           1.0.0
 * Author:            Afsar Uddin
 * Author URI:        https://www.notionwebtech.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       afsarme
 * Domain Path:       /languages
 */

 if(!defined('ABSPATH')) {
    die("");
 }

 /**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'AFSARME_CORE_VERSION', '1.0.0' );


 if ( ! function_exists( 'is_plugin_active' ) ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

/* define plugin file */
if ( ! defined( 'AFSARME_CORE_PLUGIN_FILE' ) ) {
	define( 'AFSARME_CORE_PLUGIN_FILE', __FILE__ );
}

/* define plugin path */
if ( ! defined( 'AFSARME_CORE_PATH' ) ) {
	define( 'AFSARME_CORE_PATH', plugin_dir_path( __FILE__ ) );
}

/* define plugin URL */
if ( ! defined( 'AFSARME_CORE_URL' ) ) {
	define( 'AFSARME_CORE_URL', plugins_url() . '/afsarme-core' );
}

/* define inc URL */
if ( ! defined( 'AFSARME_INC_URL' ) ) {
	define( 'AFSARME_INC_URL', AFSARME_CORE_URL . '/inc' );
}

/* define inc path */
if ( ! defined( 'AFSARME_INC_DIR' ) ) {
	define( 'AFSARME_INC_DIR', AFSARME_CORE_PATH . 'inc' );
}

function AFSARME_core_construct() {

	/** Require file*/
	require_once( AFSARME_INC_DIR . '/init.php' );

	/** Load text domain*/
	load_plugin_textdomain( 'afsarme-core', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );
}

add_action( 'plugins_loaded', 'AFSARME_core_construct', 20 );

 /** Activation and Deactivation*/

register_activation_hook(__FILE__, 'activate_pp');
function activate_pp() {
    require_once plugin_dir_path(__FILE__) . 'inc/class-afsarme-activator.php';
}

register_deactivation_hook(__FILE__, 'deactivate_pp');
function deactivate_pp() {
    require_once plugin_dir_path(__FILE__) . 'inc/class-afsarme-deactivator.php';

    unregister_post_type('pp-product');
}
