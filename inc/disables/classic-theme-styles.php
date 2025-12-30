<?php
// Enable strict typing mode.
declare( strict_types=1 );

// Disable direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied' );
}


if ( ! ( function_exists( 'it_dequeue_classic_theme_styles' ) ) ) {
	/**
	 * Dequeues the 'classic-theme-styles' stylesheet.
	 *
	 * This function removes the 'classic-theme-styles' stylesheet that is
	 * enqueued by default in WordPress 5.9+ to maintain backward compatibility
	 * with classic themes.
	 *
	 * @return void
	 * @since 1.0.0
	 *
	 */
	function it_dequeue_classic_theme_styles() {
		wp_dequeue_style( 'classic-theme-styles' );
	}

	add_action( 'wp_enqueue_scripts', 'it_dequeue_classic_theme_styles', 20 );
}


// Remove Wordpress inline styles
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles', 99 );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );

// Remove SVG inline Filters
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters', 99 );

