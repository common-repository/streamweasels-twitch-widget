<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://www.streamweasels.com/
 * @since      1.0.0
 *
 * @package    Streamweasels_Twitch_Widget
 * @subpackage Streamweasels_Twitch_Widget/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Streamweasels_Twitch_Widget
 * @subpackage Streamweasels_Twitch_Widget/includes
 * @author     StreamWeasels <admin@streamweasels.com>
 */
class Streamweasels_Twitch_Widget_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'streamweasels-twitch-widget',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
