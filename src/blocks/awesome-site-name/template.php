<?php
/**
 * Block template
 *
 * @package zr_test_plugin
 */

declare( strict_types=1 );

namespace ZR\TestPlugin\AwesomeSiteName;

/**
 * Render callback template
 *
 * @param array $arguments Block arguments.
 * @return string
 */
function template( array $arguments ): string {
	return 'This is the plugin';
}

/**
 * Callback function name
 *
 * @return string The template function name.
 **/
function block_frontend_template(): string {
	return __NAMESPACE__ . '\\template';
}
add_filter( 'render_callback_awesome-site-name', __NAMESPACE__ . '\\block_frontend_template' );

