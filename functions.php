<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'THEME_PATH', get_template_directory() );
define( 'THEME_URL', get_template_directory_uri() );
define( 'ASSETS_URL', get_template_directory_uri() . '/assets' );
define( 'ASSETS_PATH', get_template_directory() . '/assets' );

// ACF Config
if ( class_exists( 'acf' ) ) {
	get_template_part( 'settings/acf/acf-config' );
}


// Frontend Assets
get_template_part( 'settings/enqueue_scripts' );
get_template_part( 'settings/enqueue_styles' );

// General Theme Setup
get_template_part( 'settings/general' );

// Utility Functions
get_template_part( 'settings/utility/utility' );

// Navigation
get_template_part( 'settings/functions/nav' );

// Gutenberg
get_template_part( 'gutenberg/gutenberg-config' );


// Plugins
get_template_part( 'settings/plugins/cf7' );

// Shortcodes
get_template_part( 'settings/shortcodes/shortcode-year' );


// Validation
get_template_part( 'settings/additional/cleanup-validation' );

// Diasble WP Comments
get_template_part( 'settings/additional/disable-comments' );
