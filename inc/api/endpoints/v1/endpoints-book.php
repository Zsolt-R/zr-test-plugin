<?php
/**
 * Load all book endpoint
 *
 * @package zr_test_plugin
 */

declare( strict_types=1 );

namespace ZR\TestPlugin\Api\Endpoints\Book;

use function ZR\TestPlugin\Api\Shapes\Book\shape_book_data;

add_filter( 'zr_test_plugin_api_endpoints', __NAMESPACE__ . '\\endpoint' );

/**
 * Register the endpoint
 * https://${domain.name}/wp-json/zr-test-plugin/v1/books
 *
 * @param array $endpoints Rest api endpoints definition array.
 * @return array
 */
function endpoint( array $endpoints ):array {
	$endpoints[] = [
		'namespace' => 'zr-test-plugin/v1',
		'route'     => '/books',
		'config'    => [
			'methods'             => \WP_REST_Server::READABLE,
			'callback'            => __NAMESPACE__ . '\\callback',
			'permission_callback' => '__return_true',
		],
	];

	return $endpoints;
}

/**
 * Callback for the endpoint
 */
function callback() { // phpcs:ignore

	$args = apply_filters( 'zr_test_plugin_api_query_book_args', [
		'post_type'      => 'book',
		'posts_per_page' => 20,
		'orderby'        => 'title',
		'order'          => 'ASC',
	] );

	$result = [ 'items' => [] ];

	$new_query = new \WP_Query( $args );
	$books     = $new_query->posts;

	if ( ! empty( $books ) ) {
		foreach ( $books as $book ) {
			$data              = shape_book_data( $book );
			$result['items'][] = $data;
		}
	}

	return wp_send_json_success( $result, 200 );
}

