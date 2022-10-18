<?php function startlife_enqueue_scripts() {

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

		'success_notification' => startlife_get_option('success_notification'),
		'error_notification'   => startlife_get_option('error_notification'),

		'cf_nonce' => wp_create_nonce('cf_nonce'),
	);
	wp_localize_script('main', 'PHP', $scripts_object);
}

add_action('wp_enqueue_scripts', 'startlife_enqueue_scripts');


if ( ! is_admin()) {
	add_filter('script_loader_tag', 'startlife_defer_scripts', 10, 3);
}

function startlife_defer_scripts($tag, $handle, $src) {
	return str_replace('src', ' defer  src', $tag);
}


