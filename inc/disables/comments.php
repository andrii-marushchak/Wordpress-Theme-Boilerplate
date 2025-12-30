<?php
/**
 * Disable Comments
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

if ( ! function_exists( 'it_redirect_from_comments_page' ) ) {

	/**
	 * Redirects from the comments page to the admin dashboard.
	 */
	function it_redirect_from_comments_page(): void {
		global $pagenow;

		if ( 'edit-comments.php' === $pagenow ) {
			wp_safe_redirect( admin_url() );
			exit;
		}
	}

	add_action( 'admin_init', 'it_redirect_from_comments_page' );

}

if ( ! function_exists( 'it_redirect_from_comments_page' ) ) {

	/**
	 * Callback function to disable support for comments and trackbacks in post types.
	 *
	 * @return void
	 */
	function it_disable_trackbacks_support(): void {

		foreach ( get_post_types() as $post_type ) {

			if ( ! is_string( $post_type ) ) {
				continue;
			}

			if ( post_type_supports( $post_type, 'comments' ) ) {
				remove_post_type_support( $post_type, 'comments' );
				remove_post_type_support( $post_type, 'trackbacks' );
			}
		}
	}

	add_action( 'admin_init', 'it_disable_trackbacks_support' );

}

/**
 * Close comments on the front-end.
 */
add_filter( 'comments_open', '__return_false', 20, 2 );
add_filter( 'pings_open', '__return_false', 20, 2 );

/**
 * Hide existing comments.
 */
add_filter( 'comments_array', '__return_empty_array', 10, 2 );

/**
 * Remove comments page in menu.
 */
add_action(
	'admin_menu',
	function () {
		remove_menu_page( 'edit-comments.php' );
	}
);
