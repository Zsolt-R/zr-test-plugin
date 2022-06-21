<?php
/**
 * Setup the front end
 *
 * @package zr_test_plugin
 */

declare( strict_types=1 );

namespace ZR\TestPlugin\Setup\Frontend;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\load_front_end' );

/**
 * Calling the app scripts and styles.
 */
function load_front_end():void {

	// Enqueue scripts.
	$script_file_uri       = ZR_TEST_PLUGIN_URL . '/build/frontend/test-script.js';
	$script_file_path      = ZR_TEST_PLUGIN_DIR_PATH . '/build/frontend/test-script.js';
	$script_deps_file_path = ZR_TEST_PLUGIN_DIR_PATH . '/build/frontend/test-script.asset.php';

	if ( \file_exists( $script_file_path ) && \file_exists( $script_deps_file_path ) ) {
		$dependencies = require $script_deps_file_path;

		// Register scripts and then enqueue them in order to allow wp_localize_script to be attached.
		\wp_register_script( 'zr-test-plugin-front-end', $script_file_uri, $dependencies['dependencies'], $dependencies['version'], true );

		\wp_enqueue_script( 'zr-test-plugin-front-end' );
	}

	// Enqueue styles.
	$style_file_path = ZR_TEST_PLUGIN_DIR_PATH . '/build/frontend/test-style.css';
	$style_file_uri  = ZR_TEST_PLUGIN_URL . '/build/frontend/test-style.css';

	if ( \file_exists( $style_file_path ) ) {
		\wp_enqueue_style( 'zr-test-plugin-front-end', $style_file_uri, [], \filemtime( $style_file_path ) );
	}
}
