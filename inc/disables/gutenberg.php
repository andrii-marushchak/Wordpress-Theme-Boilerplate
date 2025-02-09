<?php
/**
 * Disable gutenberg stuff
 */

// Enable strict typing mode.
declare( strict_types=1 );

if ( ! function_exists( 'theme_domain_remove_block_css' ) ) {

	/**
	 * Disable Gutenberg block styles
	 *
	 * @return void
	 */
	function theme_domain_remove_block_css(): void {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'core-block-supports' );
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library-theme' );
		wp_dequeue_style( 'wc-block-style' );
		wp_dequeue_style( 'wp-editor-font' );
		wp_dequeue_style( 'wp-editor' );
		wp_dequeue_style( 'wstorefront-gutenberg-blocks' );
	}

	add_action( 'wp_enqueue_scripts', 'theme_domain_remove_block_css', 99999  );



}


// Disable gutenberg editor for posts.
add_filter( 'use_block_editor_for_post', '__return_false', 10 );

// Remove Wordpress inline styles
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );

// Remove SVG inline Filters
remove_action( 'wp_body_open', 'wp_global_styles_render_svg_filters' );

// Remove Core Block Supports inline CSS
add_action('wp_footer', function() {
	wp_dequeue_style( 'core-block-supports');
}, 5);
