<?php

if ( ! function_exists( 'theme_name_theme_support_settings' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function theme_name_theme_support_settings(): void {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /lang/ directory.
		 */
		load_theme_textdomain( 'it', get_template_directory() . '/lang' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Example of registering a new image presets
		 *
		 * @link https://developer.wordpress.org/reference/functions/add_image_size/
		 */
		// add_image_size( 'full-hd', 1920, 1080, true );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', [
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		] );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'responsive-embeds' );
	}

	add_action( 'after_setup_theme', 'theme_name_theme_support_settings' );

}

if ( ! function_exists( 'it_slug_body_class' ) ) {

	/**
	 * Adds the page slug to the <body> class.
	 *
	 * @link https://developer.wordpress.org/reference/functions/body_class/
	 *
	 * @param string[] $classes An array of body classes.
	 *
	 * @return string[] The modified array of body classes.
	 */
	function theme_name_add_custom_body_class( array $classes ): array {
		global $post;

		$classes[] = 'os-' . it_get_OS();

		if ( isset( $post ) ) {
			$classes[] = $post->post_type . '-' . $post->post_name;
		}

		return $classes;
	}

	add_filter( 'body_class', 'theme_name_add_custom_body_class' );

}

if ( ! function_exists( 'theme_name_set_content_width' ) ) {

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @return void
	 * @global int $content_width
	 */
	function theme_name_set_content_width(): void {
		$GLOBALS['content_width'] = apply_filters( 'theme_name_content_width', 1130 );
	}

	add_action( 'after_setup_theme', 'theme_name_set_content_width', 0 );

}

if ( ! function_exists( 'theme_name_remove_admin_login_header' ) ) {
	/**
	 * Removes the admin bar margin added to the front end when a user is logged in.
	 *
	 * WordPress adds a CSS margin to the `<html>` element when the admin bar is visible.
	 * This function removes that margin by unhooking the `_admin_bar_bump_cb` action from `wp_head`.
	 *
	 * @return void
	 */
	function theme_name_remove_admin_login_header() {
		remove_action( 'wp_head', '_admin_bar_bump_cb' );
	}

	add_action( 'get_header', 'theme_name_remove_admin_login_header' );
}


/**
 * Prevents WordPress from generating a unique slug for attachments.
 *
 * By returning `true`, this filter ensures that WordPress does not check for
 * conflicting attachment slugs, allowing duplicate attachment slugs.
 *
 * @since 1.0.0
 * @see wp_unique_post_slug_is_bad_attachment_slug
 */
add_filter( 'wp_unique_post_slug_is_bad_attachment_slug', '__return_true' );

