<?php

if ( ! REST_API) {
	remove_action('rest_api_init', 'wp_oembed_register_route');
}

if ( ! GUTENBERG) {
	// Disable Gutenberg
	add_filter('use_block_editor_for_post', '__return_false', 10);
	add_filter('use_block_editor_for_post', '__return_false', 10);

	// Deregister Gutenberg assets
	add_action('wp_print_styles', 'deregister_gutenberg_assets', 999);
	function deregister_gutenberg_assets() {
		wp_dequeue_style('wp-block-library');
		wp_dequeue_style('wp-block-library-theme');
		wp_dequeue_style('wc-block-style');
		wp_dequeue_style('wp-editor-font');
		wp_dequeue_style('wp-editor');
		wp_dequeue_style('wstorefront-gutenberg-blocks');
		wp_deregister_script('wp-util');
		wp_deregister_script('underscore');
	}

	// Deregister Gutenberg font for frontend
	if ( ! is_admin()) {
		add_filter('gettext_with_context', 'gg_deregister_gutenberg_fonts', 10, 4);
		function gg_deregister_gutenberg_fonts($translation, $text, $context, $domain) {
			if ($context != 'Google Font Name and Variants' || $text != 'Noto Serif:400,400i,700,700i') {
				return $translation;
			}

			return 'off';
		}
	}
}

// Clean Tags Attributes
add_action('template_redirect', function () {
	ob_start(function ($buffer) {
		$buffer = str_replace(array('type="text/javascript"', "type='text/javascript'"), '', $buffer);
		$buffer = str_replace(array('type="text/css"', "type='text/css'"), '', $buffer);
		$buffer = str_replace(array('frameborder="0"', "frameborder='0'"), '', $buffer);

		return $buffer;
	});
});


// Disable RSS
add_action('do_feed', 'itsme_disable_feed', 1);
add_action('do_feed_rdf', 'itsme_disable_feed', 1);
add_action('do_feed_rss', 'itsme_disable_feed', 1);
add_action('do_feed_rss2', 'itsme_disable_feed', 1);
add_action('do_feed_atom', 'itsme_disable_feed', 1);
add_action('do_feed_rss2_comments', 'itsme_disable_feed', 1);
add_action('do_feed_atom_comments', 'itsme_disable_feed', 1);
function itsme_disable_feed() {
	wp_die(__('No feed available, please visit the <a href="' . esc_url(home_url('/')) . '">homepage</a>!'));
}

// Disable XML-RPC
add_filter('xmlrpc_enabled', '__return_false');
add_filter('emoji_svg_url', '__return_false');

// Remove some not mandatory elements of head
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_oembed_add_discovery_links', 10);
remove_action('wp_head', 'wp_oembed_add_host_js');
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
remove_action( 'wp_enqueue_scripts', 'wp_enqueue_global_styles' );
remove_action( 'wp_footer', 'wp_enqueue_global_styles', 1 );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');


// Stope Heartbeat completely to save resources
add_action('init', function () {
	wp_deregister_script('heartbeat');
}, 1);

// Disable Emoji
add_action('init', 'disable_emojis');
function disable_emojis() {
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
	function disable_emojis_tinymce($plugins) {
		if (is_array($plugins)) {
			return array_diff($plugins, array('wpemoji'));
		} else {
			return array();
		}
	}

	add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
	function disable_emojis_remove_dns_prefetch($urls, $relation_type) {
		if ('dns-prefetch' == $relation_type) {
			$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

			$urls = array_diff($urls, array($emoji_svg_url));
		}

		return $urls;
	}
}