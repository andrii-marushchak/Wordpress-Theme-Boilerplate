<?php

// Constants
define('DT_THEME_PATH', get_template_directory());
define('DT_THEME_URL', get_template_directory_uri());
define('DT_ASSETS_URL', get_template_directory_uri() . '/assets');
define('DT_ASSETS_PATH', get_template_directory() . '/assets');
define('DT_PATH', get_template_directory() . '/theme');
define('DT_URL', get_template_directory_uri() . '/theme');

// ACF Config
if (class_exists('acf')) {
	get_template_part('theme/acf/acf-config');
}

// Frontend Assets
get_template_part('theme/enqueue_scripts');
get_template_part('theme/enqueue_styles');

// General Theme Setup
get_template_part('theme/general');

// Validation
get_template_part('theme/additional/validation');

// Navigation
get_template_part('theme/functions/nav');


// Disable Gutenberg
add_filter('use_block_editor_for_post', '__return_false', 10);
add_filter('use_block_editor_for_post', '__return_false', 10);
