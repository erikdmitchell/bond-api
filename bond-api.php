<?php
/**
 * Plugin Name:     Bond API
 * Plugin URI:      
 * Description:     A plugin to power the James Bond API.
 * Author:          Erik Mitchell
 * Author URI: 
 * Text Domain:     bond-api
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Bond_API
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

// Define BOND_API_PLUGIN_FILE.
if ( ! defined( 'BOND_API_PLUGIN_FILE' ) ) {
    define( 'BOND_API_PLUGIN_FILE', __FILE__ );
}

// Include the main Bond API class.
if ( ! class_exists( 'PickleCalendar' ) ) {
    include_once dirname( __FILE__ ) . '/includes/class-bond-api.php';
}
