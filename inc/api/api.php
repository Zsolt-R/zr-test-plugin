<?php
/**
 * Import endpoints
 *
 * @package zr_test_plugin
 */

declare( strict_types=1 );

namespace ZR\TestPlugin\Api;

/**
 * Autoload rest api result objects data shapes
 */
foreach ( glob( __DIR__ . '/shapes/*.php' ) as $shape ) {
	if ( ! $shape ) {
		return;
	}
	$shape = basename( $shape );
	require_once __DIR__ . '/shapes/' . $shape;
}

/**
 * Autoload endpoint definitions
 */
foreach ( glob( __DIR__ . '/endpoints/v1/*.php' ) as $endpoint ) {
	if ( ! $endpoint ) {
		return;
	}
	$endpoint = basename( $endpoint );
	require_once __DIR__ . '/endpoints/v1/' . $endpoint;
}
