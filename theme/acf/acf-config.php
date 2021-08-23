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
function DT_acf_json_save_point($path) {
	$path = DT_PATH . '/acf/acf-json';

	return $path;
}

add_filter('acf/settings/save_json', 'DT_acf_json_save_point');


// Load Fields from JSON
function DT_acf_json_load_point($paths) {
	unset($paths[0]);
	$paths[] = DT_PATH . '/acf/acf-json';

	return $paths;
}

add_filter('acf/settings/load_json', 'DT_acf_json_load_point');
