<?php function theme_name_enqueue_styles() {

	// Register Styles
	wp_register_style('theme-global', ASSETS_URL . '/dist/css/theme-global.css', array(), null);

	// Main CSS
	wp_enqueue_style('theme-global');
}

add_action('wp_enqueue_scripts', 'theme_name_enqueue_styles');


// Admin Styles
add_action('admin_enqueue_scripts', 'theme_name_admin_enqueue_styles');

function theme_name_admin_enqueue_styles() {
	wp_enqueue_style('admin-css', ASSETS_URL . '/dist/css/admin.css', array(), null);
}