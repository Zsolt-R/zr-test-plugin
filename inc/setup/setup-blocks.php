<?php
/**
 * Setup Gutenberg blocks
 *
 * @package zr_test_plugin
 */

declare( strict_types=1 );

namespace ZR\TestPlugin\Setup\Blocks;

// Initialize all the blocks.
add_action( 'init', __NAMESPACE__ . '\\register_blocks' );

// List all blocks to be initialized.
define( 'ZR_TEST_PLUGIN_BLOCKS_LIST', [
	'awesome-site-name',
]);

// Load all block templates.
$blocks = ZR_TEST_PLUGIN_BLOCKS_LIST;
foreach ( $blocks as $block ) {
	if ( file_exists( ZR_TEST_PLUGIN_DIR_PATH . '/src/blocks/' . $block . '/template.php' ) ) {
		include_once ZR_TEST_PLUGIN_DIR_PATH . '/src/blocks/' . $block . '/template.php';
	}
}

/**
 * Register blocks
 */
function register_blocks():void {
	$blocks = ZR_TEST_PLUGIN_BLOCKS_LIST;

	foreach ( $blocks as $block ) {

		$args = [];

		// Assign the server side block template.
		if ( file_exists( ZR_TEST_PLUGIN_DIR_PATH . '/src/blocks/' . $block . '/template.php' ) ) {
			$args['render_callback'] = apply_filters( 'render_callback_' . $block, 'return__false' );
		}

		\register_block_type_from_metadata(
			ZR_TEST_PLUGIN_DIR_PATH . '/src/blocks/' . $block,
			$args
		);
	}
}
