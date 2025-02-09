<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
if ( ! defined( 'WP_ENVIRONMENT_TYPE' ) ) {
	define( 'WP_ENVIRONMENT_TYPE', 'local' );
}

define( 'THEME_PATH', get_template_directory() );
define( 'THEME_URL', get_template_directory_uri() );
define( 'ASSETS_URL', get_template_directory_uri() . '/assets' );
define( 'ASSETS_PATH', get_template_directory() . '/assets' );
define( 'DIST_URL', get_template_directory_uri() . '/assets/dist' );
define( 'DIST_PATH', get_template_directory() . '/assets/dist' );
define( 'THEME_IMG_URL', get_template_directory_uri() . '/assets/img' );

// General Theme Setup
get_template_part( 'inc/general' ); // General Theme Setup

get_template_part( 'inc/disables/basic' ); // Disable XMLRPC / Emojis / WP embed
get_template_part( 'inc/disables/comments' ); // Disable wordpress comments
get_template_part( 'inc/disables/dashboard-widgets' ); // Disable dashboard start page widgets
get_template_part( 'inc/disables/gutenberg' ); // Disable Gutenberg support

// ACF Config
if ( class_exists( 'acf' ) ) {
	get_template_part( 'inc/acf/acf-config' );
}

get_template_part( 'inc/class-svg-support' ); // Adds support for SVG upload.
get_template_part( 'inc/editor' ); // Editor functions.
get_template_part( 'inc/help-func' ); // Helper functions.

// Frontend Assets
get_template_part( 'inc/enqueue_scripts' );
get_template_part( 'inc/enqueue_styles' );

get_template_part( 'inc/menus' ); // Menus registration

// Plugins
get_template_part( 'inc/plugins/cf7' );

// Shortcodes
get_template_part( 'inc/shortcodes/shortcode-year' );





