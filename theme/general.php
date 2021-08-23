<?php
// Load Theme Textdomain
load_theme_textdomain('um', get_template_directory() . '/lang');


// Set Theme Locale
$locale     = get_locale();
$locDT_file = get_template_directory() . "/lang/$locale.php";

if (is_readable($locDT_file)) {
	require_once($locDT_file);
}


// add_theme_support()
add_action('after_setup_theme', 'um_theme_support_settings');
function um_theme_support_settings() {
	add_editor_style();
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array('caption'));
	add_theme_support('customize-selective-refresh-widgets');
	add_theme_support("title-tag");
	add_theme_support("menus");
}


// Deregister Gutenberg assets
function um_deregister_gutenberg_assets() {
	wp_dequeue_style('wp-block-library');
	wp_dequeue_style('wp-block-library-theme');
	wp_dequeue_style('wc-block-style');
	wp_dequeue_style('wp-editor-font');
	wp_dequeue_style('wp-editor');
	wp_dequeue_style('wstorefront-gutenberg-blocks');
	wp_deregister_script('wp-util'); //deregister script
	wp_deregister_script('underscore');
}

add_action('wp_print_styles', 'um_deregister_gutenberg_assets', 999);


// Deregister Gutenberg font for frontend
function um_deregister_gutenberg_fonts($translation, $text, $context, $domain) {
	if ($context != 'Google Font Name and Variants' || $text != 'Noto Serif:400,400i,700,700i') {
		return $translation;
	}

	return 'off';
}

if ( ! is_admin()) {
	add_filter('gettext_with_context', 'um_deregister_gutenberg_fonts', 10, 4);
}


// Show plugin path in "wp-admin/plugins.php"
function um_show_plugin_path($plugin_meta, $plugin_file) {
	echo '<code><small>' . esc_url($plugin_file) . '</small></code>  | ';

	return $plugin_meta;
}

add_filter('plugin_row_meta', 'um_show_plugin_path', 10, 4);


function um_remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'um_remove_admin_login_header');


function dt_get_svg($path) {
	if ($path) {

		if (is_wp_error(wp_remote_retrieve_body(wp_remote_get($path)))) {
			return file_get_contents($path);
		} else {
			return wp_remote_retrieve_body(wp_remote_get($path));
		}

	} else {
		return 'Error';
	}
}

function dt_the_svg($path) {
	echo dt_get_svg($path);
}

// ACF get_field() wrapper
function dt_get_field($param, $id = null) {

	if ($id == null) {
		$id = get_the_ID();
	}

	if (function_exists('get_field')) {
		return get_field($param, $id);
	}
}

// ACF the_field() wrapper
function dt_the_field($param, $id = null) {

	if ($id == null) {
		$id = get_the_ID();
	}

	if (function_exists('the_field')) {
		the_field($param, $id);
	}
}

// ACF get_option() wrapper
function dt_get_option($param) {
	if (function_exists('get_field')) {
		return get_field($param, 'option');
	}
}

// ACF the_option() wrapper
function dt_the_option($param) {
	if (function_exists('the_field')) {
		the_field($param, 'option');
	}
}

// WP wp_kses() wrapper
function dt_wp_kses($DT_string) {
	$allowed_tags = array(
		'img'      => array(
			'src'    => array(),
			'alt'    => array(),
			'width'  => array(),
			'height' => array(),
			'class'  => array(),
		),
		'a'        => array(
			'href'  => array(),
			'title' => array(),
			'class' => array(),
		),
		'span'     => array(
			'class' => array(),
		),
		'br'       => array(),
		'div'      => array(
			'class' => array(),
			'id'    => array(),
		),
		'h1'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'h2'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'h3'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'h4'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'h5'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'h6'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'p'        => array(
			'class' => array(),
			'id'    => array(),
		),
		'strong'   => array(
			'class' => array(),
			'id'    => array(),
		),
		'b'        => array(
			'class' => array(),
			'id'    => array(),
		),
		'i'        => array(
			'class' => array(),
			'id'    => array(),
		),
		'del'      => array(
			'class' => array(),
			'id'    => array(),
		),
		'ul'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'li'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'ol'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'input'    => array(
			'class' => array(),
			'id'    => array(),
			'type'  => array(),
			'style' => array(),
			'name'  => array(),
			'value' => array(),
		),
		'textarea' => array(
			'class' => array(),
			'id'    => array(),
			'type'  => array(),
			'style' => array(),
			'name'  => array(),
			'value' => array(),
		),
	);
	if (function_exists('wp_kses')) {
		return wp_kses($DT_string, $allowed_tags);
	}
}

function dt_get_phone($value) {
	return str_replace(array(' ', ' - ', '( ', ' )'), '', $value);
}
