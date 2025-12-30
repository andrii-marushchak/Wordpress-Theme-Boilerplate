<?php

// Remove Core Block Supports inline CSS
add_action( 'wp_footer', function () {
	wp_dequeue_style( 'core-block-supports' );
}, 5 );


add_action( 'wp_enqueue_scripts', function () {
	// Disable Gutenberg block styles
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );

	wp_dequeue_style( 'core-block-supports' );
	wp_dequeue_style( 'wc-block-style' );
	wp_dequeue_style( 'wp-editor-font' );
	wp_dequeue_style( 'wp-editor' );

}, 99999 );

// Prevents WordPress from generating inline styles for spacing, colors, typography, etc.
add_filter( 'wp_enqueue_block_support_styles', '__return_false', 1 );

// Disable inline css for core blocks
add_action( 'wp_enqueue_scripts', function () {
	wp_deregister_style( 'wp-block-paragraph' );
	wp_deregister_style( 'wp-block-heading' );
	wp_deregister_style( 'wp-block-button' );
	wp_deregister_style( 'wp-block-image' );
} );


/**
 * Disable Gutenberg for pages, enable for posts.
 */
add_filter( 'use_block_editor_for_post_type', function ( $use_block_editor, $post_type ) {

	if ( $post_type === 'page' ) {
		$use_block_editor = false;
	}

	if ( $post_type === 'post' ) {
		$use_block_editor = true;
	}

	return $use_block_editor;

}, 10, 2 );
