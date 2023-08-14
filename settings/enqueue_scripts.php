<?php function theme_name_enqueue_scripts() {

	wp_register_script('theme-global', ASSETS_URL . '/dist/js/theme-global.js', array(), null, true);


	wp_enqueue_script('jquery');
	wp_enqueue_script('theme-global');

	$scripts_object = array(
		'ajaxurl'  => admin_url('admin-ajax.php'),
		'home_url' => home_url('/'),
	);

	wp_localize_script('theme-global', 'PHP', $scripts_object);
}

add_action('wp_enqueue_scripts', 'theme_name_enqueue_scripts');


if ( ! is_admin()) {
	add_filter('script_loader_tag', 'theme_name_defer_scripts', 10, 3);
}

function theme_name_defer_scripts($tag, $handle, $src) {
	return str_replace('src', ' defer  src', $tag);
}


