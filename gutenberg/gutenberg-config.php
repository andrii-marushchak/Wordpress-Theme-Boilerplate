<?php remove_action('shutdown', 'wp_ob_end_flush_all', 1);

// Enable Gutenberg blocks for 'posts'
add_filter('use_block_editor_for_post_type', 'bb_disable_gutenberg', 10, 2);
function bb_disable_gutenberg($current_status, $post_type) {
	if (in_array($post_type, ['post'])) {
		return true;
	} else {
		return false;
	}
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

// Deregister Gutenberg assets
function turing_deregister_gutenberg_assets() {
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-block-style');
	wp_dequeue_style('wp-editor-font');
	wp_dequeue_style('wp-editor');
	wp_dequeue_style('wstorefront-gutenberg-blocks');
}

add_action('wp_print_styles', 'turing_deregister_gutenberg_assets', 999);

