<?php
// Load Theme Textdomain
load_theme_textdomain('theme_domain', get_template_directory() . '/lang');


// Set Theme Locale
$locale     = get_locale();
$locDT_file = get_template_directory() . "/lang/$locale.php";

if (is_readable($locDT_file)) {
	require_once($locDT_file);
}


// add_theme_support()
add_action('after_setup_theme', 'theme_name_theme_support_settings');
function theme_name_theme_support_settings() {
	add_editor_style();
	add_theme_support('automatic-feed-links');
	add_theme_support('post-thumbnails');
	add_theme_support('html5', array('caption'));
	add_theme_support('customize-selective-refresh-widgets');
	add_theme_support("title-tag");
	add_theme_support("menus");
	add_theme_support('align-wide');
}


function theme_name_remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'theme_name_remove_admin_login_header');



