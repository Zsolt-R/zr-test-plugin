<?php
/**
 * Rest API Data shape for single book
 *
 * @package zr_test_plugin
 */

declare( strict_types=1 );

namespace ZR\TestPlugin\Api\Shapes\Book;

/**
 * Define the shape of the data returned by the API
 *
 * @param \WP_Post $post Current post object.
 * @return array
 */
function shape_book_data( \WP_Post $post ):array {

	if ( empty( $post ) ) {
		return [];
	}

	$taxonomies = get_the_terms( $post->ID, 'genre' );

	$output = [
		'ID'          => $post->ID,
		'name'        => $post->post_title,
		'description' => apply_filters( 'the_content', $post->post_content ),
		'cover'       => get_the_post_thumbnail_url( $post->ID ),
		'url'         => get_the_permalink( $post->ID ),
		'genre'      => $taxonomies,
	];

	return apply_filters( 'zr_test_plugin_shape_book_data', $output );
}
