<?php function theme_name_enqueue_scripts() {

	// Deregister jquery
	wp_deregister_script('jquery');

	// Register Scrips
	wp_register_script('main', ASSETS_URL . '/dist/js/main.js', array(), null, true);

	// Include Libs & Plugins

	// Main JS
	wp_enqueue_script('main');

	$scripts_object = array(
		'ajaxurl'  => admin_url('admin-ajax.php'),
		'home_url' => home_url('/'),

		'cf_nonce' => wp_create_nonce('cf_nonce'),
	);
	wp_localize_script('main', 'PHP', $scripts_object);
}

add_action('wp_enqueue_scripts', 'theme_name_enqueue_scripts');


if ( ! is_admin()) {
	add_filter('script_loader_tag', 'theme_name_defer_scripts', 10, 3);
}

function theme_name_defer_scripts($tag, $handle, $src) {
	return str_replace('src', ' defer  src', $tag);
}


