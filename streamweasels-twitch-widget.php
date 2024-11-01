<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.streamweasels.com/
 * @since             1.0.0
 * @package           Streamweasels_Twitch_Widget
 *
 * @wordpress-plugin
 * Plugin Name:       StreamWeasels Twitch Widget
 * Description:       StreamWeasels Twitch widget.
 * Version:           1.0.0
 * Author:            StreamWeasels
 * Author URI:        https://www.streamweasels.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       streamweasels-twitch-widget
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'STREAMWEASELS_TWITCH_WIDGET_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-streamweasels-twitch-widget-activator.php
 */
function activate_streamweasels_twitch_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-streamweasels-twitch-widget-activator.php';
	Streamweasels_Twitch_Widget_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-streamweasels-twitch-widget-deactivator.php
 */
function deactivate_streamweasels_twitch_widget() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-streamweasels-twitch-widget-deactivator.php';
	Streamweasels_Twitch_Widget_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_streamweasels_twitch_widget' );
register_deactivation_hook( __FILE__, 'deactivate_streamweasels_twitch_widget' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-streamweasels-twitch-widget.php';

/**
 * The custom widget class that is used to define the custom widget,
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-streamweasels-twitch-widget-widget.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_streamweasels_twitch_widget() {

	$plugin = new Streamweasels_Twitch_Widget();
	$plugin->run();

}
run_streamweasels_twitch_widget();
