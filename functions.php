<?php

define('THEME_PATH', get_template_directory());
define('THEME_URL', get_template_directory_uri());
define('ASSETS_URL', get_template_directory_uri() . '/assets');
define('ASSETS_PATH', get_template_directory() . '/assets');

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
get_template_part('theme/additional/cleanup-validation');

// Helpers Functions
get_template_part('theme/functions/helpers');

// Navigation
get_template_part('theme/functions/nav');

// Shortcodes
get_template_part('theme/functions/shortcodes');

// Search
get_template_part('theme/functions/search');

// Gutenberg
get_template_part('theme/functions/gutenberg');

show_admin_bar(false);