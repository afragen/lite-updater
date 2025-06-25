<?php
/**
 * Lite Updater
 *
 * @author  Andy Fragen
 * @license MIT
 * @link    https://github.com/afragen/lite-updater
 * @package git-updater-lite
 */

/**
 * Plugin Name: Lite Updater
 * Plugin URI:  https://github.com/afragen/lite-updater
 * Description:  Allow for alternate sources of plugin/theme updates. Currently integrated with update server running Git Updater.
 * Author: Andy Fragen
 * Version: 0.4.2.1
 * License: MIT
 * Text Domain: lite-updater
 * Network: true
 * Requires at least: 6.6
 * Requires PHP: 7.4
 * GitHub Plugin URI: https://github.com/afragen/lite-updater
 * Primary Branch: main
 * Update URI: afragen/lite-updater
 * Requires Plugins: fair-plugin
 */

namespace Fragen\Lite_Updater;

use function FAIR\Lite_Updater\bootstrap;

/**
 * Exit if called directly.
 */
if ( ! defined( 'WPINC' ) ) {
	die;
}

// require_once __DIR__ . '/vendor/afragen/git-updater-lite/Lite.php';
require_once __DIR__ . '/inc/upgrader/namespace.php';
bootstrap();
