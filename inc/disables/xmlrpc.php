<?php
/**
 * Disable XMLRPC
 *
 * @package starter
 * @subpackage disables
 */

// Enable strict typing mode.
declare( strict_types = 1 );

// Disable direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied' );
}

add_filter( 'xmlrpc_enabled', '__return_false' );
