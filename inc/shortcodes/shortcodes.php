<?php
/**
 * Shortcodes
 *
 * @package zr_test_plugin
 */

declare( strict_types=1 );

namespace ZR\TestPlugin\Shortcodes;

add_shortcode( 'awesome_sitename', __NAMESPACE__ . '\\awesome_sitename' );

/**
 * Shortcode for outputting the sitename with a prefix
 *
 * @param  array $attributes The prefix.
 * @return string The result.
 */
function awesome_sitename( $attributes = [] ){ // phpcs:ignore
	$prefix = $attributes['prefix'] ?? '';

	$site_title = get_bloginfo( 'name' );

	$result = sprintf(
		'<div class="zr-awesome-site-name"><span>%s %s</span></div>',
		esc_attr( $prefix ),
		$site_title
	);

	return $result;
}
