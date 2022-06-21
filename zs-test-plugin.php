<?php
/**
 * Plugin Name:     ZR Test Plugin
 * Plugin URI:      https://zsoltrevay.com
 * Description:     Add a Gutenberg block that prints the site name prefixed by a string.
 * Author:          Zsolt Revay
 * Author URI:      https://zsoltrevay.com
 * Text Domain:     zr-test-plugin
 * Version:         1.0.0
 *
 * @package zr_test_plugin
 */

declare( strict_types=1 );

namespace ZR\TestPlugin;

define( 'ZR_TEST_PLUGIN_VERSION', '1.0.0' );
define( 'ZR_TEST_PLUGIN_DIR_PATH', untrailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'ZR_TEST_PLUGIN_POST_TYPE', 'book' );
define( 'ZR_TEST_PLUGIN_TAXONOMY', 'genre' );
define( 'ZR_TEST_PLUGIN_URL', untrailingslashit( plugin_dir_url( __FILE__ ) ) );

require_once __DIR__ . '/inc/setup/setup-post-type.php';
require_once __DIR__ . '/inc/setup/setup-taxonomy.php';
require_once __DIR__ . '/inc/setup/setup-activation.php';
require_once __DIR__ . '/inc/setup/setup-api.php';
require_once __DIR__ . '/inc/setup/setup-frontend.php';
require_once __DIR__ . '/inc/setup/setup-blocks.php';
require_once __DIR__ . '/inc/meta/meta.php';
require_once __DIR__ . '/inc/api/api.php';

/**
 * Load the plugin text domain.
 */
function load_domain():void {
	load_plugin_textdomain( 'zr-test-plugin', false, basename( dirname( __FILE__ ) ) . '/lang/' );
}
