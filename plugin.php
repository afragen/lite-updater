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
 * Version: 0.1.0
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

// Dog food 🐶.
require_once __DIR__ . '/vendor/afragen/git-updater-lite/Lite.php';
add_filter(
	'gul_server_domain',
	function () {
		return 'https://git-updater.com';
	}
);
( new Lite( __FILE__ ) )->run();
