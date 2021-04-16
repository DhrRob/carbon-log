<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://robmigchels.com
 * @since             0.1.0
 * @package           Carbon_Log
 *
 * @wordpress-plugin
 * Plugin Name:       Carbon Log
 * Plugin URI:        https://carbonlog.migchels.me
 * Description:       Every visit to your websites generates carbon emissions. Carbon Log helps you to keep track of them over time.
 * Version:           0.1.0
 * Author:            Rob Migchels
 * Author URI:        https://robmigchels.com
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       carbon-log
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 0.1.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CARBON_LOG_VERSION', '0.1.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-carbon-log-activator.php
 */
function activate_carbon_log() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-carbon-log-activator.php';
	Carbon_Log_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-carbon-log-deactivator.php
 */
function deactivate_carbon_log() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-carbon-log-deactivator.php';
	Carbon_Log_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_carbon_log' );
register_deactivation_hook( __FILE__, 'deactivate_carbon_log' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-carbon-log.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    0.1.0
 */
function run_carbon_log() {

	$plugin = new Carbon_Log();
	$plugin->run();

}
run_carbon_log();
