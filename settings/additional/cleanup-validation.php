<?php

// Disable Emoji
function disable_emojis() {
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
	add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}

function disable_emojis_tinymce($plugins) {
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

add_action('init', 'disable_emojis');


function disable_emojis_remove_dns_prefetch($urls, $relation_type) {
	if ('dns-prefetch' == $relation_type) {
		$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

		$urls = array_diff($urls, array($emoji_svg_url));
	}

	return $urls;
}

add_filter('emoji_svg_url', '__return_false');


add_action('template_redirect', 'turing_clean_html');


function turing_clean_html() {
	ob_start(function ($html) {

		// Clean <link> <style> <script>
		$html = str_replace(array('type="text/javascript"', "type='text/javascript'"), '', $html);
		$html = str_replace(array('type="text/css"', "type='text/css'"), '', $html);

		// Clean <iframe>
		$html = str_replace(array('frameborder="0"', "frameborder='0'"), '', $html);

		// Clean vendors
		$html = str_replace(array('scrolling="no"', "scrolling='no'"), '', $html);
		$html = str_replace(array('rel="prettyPhoto"', 'target=""'), '', $html);


		// Remove some extra inline css
		$pattern = "/<style id=[\"']pisol_edd_dummy-handle-inline-css[\"'](.|\s)*?<\/style>/i";
		$html    = preg_replace($pattern, '', $html);


		return $html;
	});
}


function turing_custom_wp_remove_global_css() {

	// Remove Wordpress inline styles
	remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');

	// Remove SVG in the body open
	remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');
}

add_action('init', 'turing_custom_wp_remove_global_css');