<?php
// Load Theme Textdomain
load_theme_textdomain('theme_domain', get_template_directory() . '/lang');


// Set Theme Locale
$locale     = get_locale();
$locDT_file = get_template_directory() . "/lang/$locale.php";

if (is_readable($locDT_file)) {
	require_once($locDT_file);
}


// add_theme_support()
add_action('after_setup_theme', 'theme_name_theme_support_settings');
function theme_name_theme_support_settings() {
	add_editor_style();
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array('caption'));
	add_theme_support('customize-selective-refresh-widgets');
	add_theme_support("title-tag");
	add_theme_support("menus");
}


// Deregister Gutenberg assets
function theme_name_deregister_gutenberg_assets() {
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-block-style');
	wp_dequeue_style('wp-editor-font');
	wp_dequeue_style('wp-editor');
	wp_dequeue_style('wstorefront-gutenberg-blocks');
	wp_deregister_script('wp-util'); //deregister script
	wp_deregister_script('underscore');
}

add_action('wp_print_styles', 'theme_name_deregister_gutenberg_assets', 999);


// Deregister Gutenberg font for frontend
function theme_name_deregister_gutenberg_fonts($translation, $text, $context, $domain) {
	if ($context != 'Google Font Name and Variants' || $text != 'Noto Serif:400,400i,700,700i') {
		return $translation;
	}

	return 'off';
}

if ( ! is_admin()) {
	add_filter('gettext_with_context', 'theme_name_deregister_gutenberg_fonts', 10, 4);
}


// Show plugin path in "wp-admin/plugins.php"
function theme_name_show_plugin_path($plugin_meta, $plugin_file) {
	echo '<code><small>' . esc_url($plugin_file) . '</small></code>  | ';

	return $plugin_meta;
}

add_filter('plugin_row_meta', 'theme_name_show_plugin_path', 10, 4);


function theme_name_remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'theme_name_remove_admin_login_header');



