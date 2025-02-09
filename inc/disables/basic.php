<?php

// Remove WordPress version from head tag
remove_action( 'wp_head', 'wp_generator' );

// Disable XMLRPC
add_filter( 'xmlrpc_enabled', '__return_false' );

// Disable Emojis
if ( ! function_exists( 'theme_domain_disable_emojis' ) ) {

	/**
	 * Remove emoji CDN hostname from DNS prefetching hints.
	 *
	 * @param string[] $urls URLs to print for resource hints.
	 * @param string $relation_type The relation type the URLs are printed for.
	 *
	 * @return string[] Difference between the two arrays.
	 */
	function theme_domain_disable_emojis_remove_dns_prefetch( array $urls, string $relation_type ): array {
		if ( 'dns-prefetch' === $relation_type ) {
			/** This filter is documented in wp-includes/formatting.php */
			$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

			$urls = array_diff( $urls, array( $emoji_svg_url ) );
		}

		return $urls;
	}

	/**
	 * Disable emojis.
	 *
	 * @return void
	 */
	function theme_domain_disable_emojis(): void {
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
		remove_action( 'admin_print_styles', 'print_emoji_styles' );
		remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
		remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
		remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

		add_filter( 'tiny_mce_plugins', fn( $plugins ) => array_diff( $plugins, array( 'wpemoji' ) ) );
		add_filter( 'wp_resource_hints', 'theme_domain_disable_emojis_remove_dns_prefetch', 10, 2 );
	}

	add_action( 'init', 'theme_domain_disable_emojis' );

}

// Disable wp-embed.js
if ( ! function_exists( 'theme_domain_wpembed_deregister_scripts' ) ) {

	/**
	 * Dequeue wp-embed script.
	 *
	 * @return void
	 */
	function theme_domain_wpembed_deregister_scripts(): void {
		wp_dequeue_script( 'wp-embed' );
	}

	add_action( 'wp_footer', 'theme_domain_wpembed_deregister_scripts' );

}

if ( ! ( function_exists( 'theme_domain_dequeue_classic_theme_styles' ) ) ) {
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
	function theme_domain_dequeue_classic_theme_styles() {
		wp_dequeue_style( 'classic-theme-styles' );
	}

	add_action( 'wp_enqueue_scripts', 'theme_domain_dequeue_classic_theme_styles', 20 );
}

