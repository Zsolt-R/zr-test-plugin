<?php
/**
 * Setup Activation
 *
 * @package zr_test_plugin
 */

declare( strict_types=1 );

namespace ZR\TestPlugin\Setup\Activation;

register_activation_hook( __FILE__, __NAMESPACE__ . '\\plugin_activation' );
register_activation_hook( __FILE__, __NAMESPACE__ . '\\plugin_deactivation' );

/**
 * Plugin Activation
 *
 * @return void
 */
function plugin_activation():void {
	\ZR\TestPlugin\Setup\PostType\register_post_type();
	\ZR\TestPlugin\Setup\Taxonomy\register_taxonomy();
	\flush_rewrite_rules();
}

/**
 * Plugin Deactivation
 *
 * @return void
 */
function plugin_deactivation():void {
	\unregister_post_type( ZR_TEST_PLUGIN_POST_TYPE );
	\unregister_taxonomy( ZR_TEST_PLUGIN_TAXONOMY );
}
