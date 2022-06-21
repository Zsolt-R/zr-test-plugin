<?php
/**
 * Setup taxonomies
 *
 * @package zr_test_plugin
 */

declare( strict_types=1 );

namespace ZR\TestPlugin\Setup\Taxonomy;

add_action( 'init', __NAMESPACE__ . '\\zr_test_plugin_register_taxonomy' );

/**
 * Register taxonomies
 *
 * @return void
 */
function zr_test_plugin_register_taxonomy():void {

	// Setup taxonomy.
	$args = apply_filters( 'zr_test_plugin_genre_taxonomy_args', [
		'label'             => __( 'Genre', 'zr-test-plugin' ),
		'hierarchical'      => true,
		'show_admin_column' => true,
		'show_in_rest'      => true,
		'show_in_nav_menus' => false,
		'rewrite'           => [
			'slug'       => 'genre',
			'with_front' => false,
		],
	]);

	\register_taxonomy(
		ZR_TEST_PLUGIN_TAXONOMY,
		ZR_TEST_PLUGIN_POST_TYPE,
		$args
	);

}
