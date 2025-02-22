<?php
/**
 * Alternate Updater
 *
 * @author  Andy Fragen
 * @license MIT
 * @link    https://github.com/afragen/alternate-updater
 * @package git-updater
 */

/**
 * Plugin Name: Alternate Updater
 * Plugin URI:  https://github.com/afragen/alternate-updater
 * Description:  Allow for alternate sources of plugin/theme updates. Currently integrated with update server running Git Updater.
 * Author: Andy Fragen
 * Version: 0.3.1
 * License: MIT
 * Text Domain: alternate-updater
 * Network: true
 * Requires at least: 6.6
 * Requires PHP: 8.0
 * GitHub Plugin URI: https://github.com/afragen/alternate-updater
 * Primary Branch: main
 * Update URI: afragen/alternate-updater
 */

namespace Fragen\Git_Updater;

/**
 * Exit if called directly.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Class Loader
 */
class Loader {

	// phpcs:ignore Generic.Commenting.DocComment.MissingShort
	/** @var array */
	public static $package_arr = array();

	/**
	 * Gather all plugins/themes with data in Update URI header.
	 *
	 * @return \stdClass
	 */
	public function init() {
		// Seems to be required for PHPUnit testing on GitHub workflow.
		if ( ! function_exists( 'get_plugins' ) ) {
			require_once ABSPATH . 'wp-admin/includes/plugin.php';
		}

		$plugin_path = trailingslashit( \WP_PLUGIN_DIR );
		$plugins     = get_plugins();
		foreach ( $plugins as $file => $plugin ) {
			$update_uri = $plugin['UpdateURI'];

			if ( ! empty( $update_uri ) ) {
				self::$package_arr[] = $plugin_path . $file;
			}
		}

		$theme_path = \ABSPATH . \WP_CONTENT_DIR . '/themes/';
		$themes     = wp_get_themes();
		foreach ( $themes as $file => $theme ) {
			$update_uri = $theme->get( 'UpdateURI' );

			if ( ! empty( $update_uri ) ) {
				self::$package_arr[] = $theme_path . $file . '/style.css';
			}
		}

		return $this;
	}

	/**
	 * Run Git Updater Lite for potential packages.
	 *
	 * @return void
	 */
	public function run() {
		foreach ( self::$package_arr as $package ) {
			( new Lite( $package ) )->run();
		}
	}
}

// Dog food 🐶.
require_once __DIR__ . '/vendor/afragen/git-updater-lite/Lite.php';
( new Loader() )->init()->run();
