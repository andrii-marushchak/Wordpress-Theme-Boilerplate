<?php

// ACF Theme Options Panel
if (function_exists('acf_add_options_page')) {
	acf_add_options_page(array(
		'page_title' => __('Site Settings', 'um'),
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'read',
		'redirect'   => false,
		'position'   => 60
	));
}

// Save Fields in JSON
function theme_name_acf_json_save_point($path) {
	$path = THEME_PATH . '/settings/acf/acf-json';

	return $path;
}

add_filter('acf/settings/save_json', 'theme_name_acf_json_save_point');


// Load Fields from JSON
function theme_name_acf_json_load_point($paths) {
	unset($paths[0]);
	$paths[] = THEME_PATH . '/settings/acf/acf-json';

	return $paths;
}

add_filter('acf/settings/load_json', 'theme_name_acf_json_load_point');


// ACF Prevent ESCAPE HTMl & disable notice
add_filter('acf/admin/prevent_escaped_html_notice', '__return_true');
add_filter('acf/shortcode/allow_unsafe_html', '__return_true');
add_filter('acf/the_field/allow_unsafe_html', '__return_true');



// Allow Shortcodes inside ACF Fields
function agr_my_acf_format_value( $value, $post_id, $field ) {
	// Check if the value contains any shortcodes
	if (is_string($value) && preg_match('/\[(\w+).*?\]/', $value)) {
		$value = do_shortcode($value);
	}
	return $value;
}

add_filter('acf/format_value', 'agr_my_acf_format_value', 10, 3);