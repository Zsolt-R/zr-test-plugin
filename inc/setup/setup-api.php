<?php
/**
 * Setup Rest API for front end
 *
 * @package zr_test_plugin
 */

declare( strict_types=1 );

namespace ZR\TestPlugin\Setup\Api;

add_action( 'rest_api_init', __NAMESPACE__ . '\\register_rest_routes' );

/**
 * Register REST API routes
 */
function register_rest_routes():void {

	// Create filter to register api routes from own files.
	$endpoints     = apply_filters( 'zr_test_plugin_api_endpoints', [] );
	$api_namespace = 'zr_test_plugin/v1';

	if ( ! empty( $endpoints ) ) {
		foreach ( $endpoints as $endpoint ) {

			$namespace = $endpoint['namespace'] ?? $api_namespace;
			$route     = $endpoint['route'] ?? false;
			$config    = $endpoint['config'] ?? [];

			if ( ! $route || empty( $config ) ) {
				continue;
			}

			register_rest_route(
				$namespace,
				$route,
				$config
			);
		}
	}

}
