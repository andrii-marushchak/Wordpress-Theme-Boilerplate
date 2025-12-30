<?php
/**
 * Disable wp generator
 *
 * @package starter
 * @subpackage disables
 */

// Enable strict typing mode.
declare( strict_types=1 );

// Disable direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied' );
}

// Remove WordPress version from head tag
remove_action( 'wp_head', 'wp_generator' );
