<?php function um_enqueue_styles() {

	// Register Styles
	wp_register_style('main', DT_ASSETS_URL . '/dist/css/styles.min.css', array(), null);

	// Main CSS
	wp_enqueue_style('main');
}

add_action('wp_enqueue_scripts', 'um_enqueue_styles');
