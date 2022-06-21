<?php
/**
 * Setup post types
 *
 * @package zr_test_plugin
 */

declare( strict_types=1 );

namespace ZR\TestPlugin\Setup\PostType;

add_action( 'init', __NAMESPACE__ . '\\zr_test_plugin_register_post_type' );

/**
 * Register post types
 *
 * @return void
 */
function zr_test_plugin_register_post_type():void {

	$labels = apply_filters( 'zr_test_plugin_post_type_labels', [
		'name'               => _x( 'Book', 'post type general name', 'zr-test-plugin' ),
		'singular_name'      => _x( 'Book', 'post type singular name', 'zr-test-plugin' ),
		'menu_name'          => _x( 'Book', 'admin menu', 'zr-test-plugin' ),
		'name_admin_bar'     => _x( 'Book', 'add new on admin bar', 'zr-test-plugin' ),
		'add_new'            => _x( 'Add New Book', 'zr-test-plugin' ),
		'add_new_item'       => __( 'Add New Book', 'zr-test-plugin' ),
		'new_item'           => __( 'New Book', 'zr-test-plugin' ),
		'edit_item'          => __( 'Edit Book', 'zr-test-plugin' ),
		'view_item'          => __( 'View Book', 'zr-test-plugin' ),
		'all_items'          => __( 'All Books', 'zr-test-plugin' ),
		'search_items'       => __( 'Search Book', 'zr-test-plugin' ),
		'parent_item_colon'  => __( 'Parent Book:', 'zr-test-plugin' ),
		'not_found'          => __( 'No book found.', 'zr-test-plugin' ),
		'not_found_in_trash' => __( 'No book found in Trash.', 'zr-test-plugin' ),
	]);

	$args = apply_filters( 'zr_test_plugin_post_type_args', [
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => [ 'slug' => 'book' ],
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'show_in_rest'       => true,
		'menu_icon'          => 'dashicons-book',
		'supports'           => [ 'title', 'editor', 'author', 'thumbnail' ],
	]);

	\register_post_type( ZR_TEST_PLUGIN_POST_TYPE, $args );
}
