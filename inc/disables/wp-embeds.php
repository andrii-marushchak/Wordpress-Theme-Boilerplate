<?php
/**
 * Disable wp-embed.js
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

if ( ! function_exists( 'it_wpembed_deregister_scripts' ) ) {

	/**
	 * Dequeue wp-embed script.
	 *
	 * @return void
	 */
	function it_wpembed_deregister_scripts(): void {
		wp_dequeue_script( 'wp-embed' );
	}

	add_action( 'wp_footer', 'it_wpembed_deregister_scripts' );

}
