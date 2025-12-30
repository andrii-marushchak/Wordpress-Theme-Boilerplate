<?php

// Enable strict typing mode.
declare( strict_types=1 );

// Disable direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied' );
}

if ( ! defined( 'WP_ENVIRONMENT_TYPE' ) ) {
	define( 'WP_ENVIRONMENT_TYPE', 'local' );
}

define( 'IT_DIR', get_template_directory() );
define( 'IT_URL', get_template_directory_uri() );
define( 'IT_TEMPLATES', get_template_directory() . '/template-parts/' );
define( 'IT_ACF_LAYOUTS', get_template_directory() . '/acf-layouts/' );
define( 'IT_DIST', get_template_directory_uri() . '/dist/' );
define( 'IT_CSS', get_template_directory_uri() . '/dist/css/' );
define( 'IT_JS', get_template_directory_uri() . '/dist/js/' );
define( 'IT_IMG', get_template_directory_uri() . '/dist/img/' );
define( 'IT_BUILD', get_template_directory_uri() . '/blocks/build/' );
define( 'IT_BUILD_DIR', get_template_directory() . '/blocks/build/' );
define( 'IT_VERSION', wp_get_theme()->get( 'Version' ) );

$autoload = IT_DIR . '/vendor/autoload.php';

if ( is_readable( $autoload ) ) {
	require_once $autoload;
}

require IT_DIR . '/inc/general.php';  // General Theme Setup
require IT_DIR . '/inc/enqueue_assets.php';  // Theme CSS & JS

require IT_DIR . '/inc/disables/dashboard-widgets.php';
require IT_DIR . '/inc/disables/emoji.php';
require IT_DIR . '/inc/disables/comments.php';
require IT_DIR . '/inc/disables/xmlrpc.php';
require IT_DIR . '/inc/disables/wp-embeds.php';
require IT_DIR . '/inc/disables/wp-generator.php';
require IT_DIR . '/inc/disables/classic-theme-styles.php';
require IT_DIR . '/inc/disables/gutenberg.php';

// ACF Config
if ( class_exists( 'acf' ) ) {
	require IT_DIR . '/inc/acf/acf-config.php';
	require IT_DIR . '/inc/acf/acf-register-layouts.php';
}

require IT_DIR . '/inc/classes/class-svg-support.php';  // Adds support for SVG upload.
require IT_DIR . '/inc/helper-functions.php';  // Helper functions.
require IT_DIR . '/inc/menus.php';  // Menus registration & settings.

require IT_DIR . '/inc/plugins/cf7.php';  // Contact Form 7
