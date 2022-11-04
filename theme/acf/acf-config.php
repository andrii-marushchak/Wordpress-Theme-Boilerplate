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
	$path = THEME_PATH . '/theme/acf/acf-json';

	return $path;
}

add_filter('acf/settings/save_json', 'theme_name_acf_json_save_point');


// Load Fields from JSON
function theme_name_acf_json_load_point($paths) {
	unset($paths[0]);
	$paths[] = THEME_PATH . '/theme/acf/acf-json';

	return $paths;
}

add_filter('acf/settings/load_json', 'theme_name_acf_json_load_point');
