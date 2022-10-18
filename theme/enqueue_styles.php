<?php function startlife_enqueue_styles() {

	// Register Styles
	wp_register_style('main', ASSETS_URL . '/dist/css/styles.css', array(), null);
	wp_register_style('swiper', ASSETS_URL . '/vendors/swiper/swiper-bundle.min.css', array(), null);
	wp_register_style('choices', ASSETS_URL . '/vendors/choices/choices.min.css', array(), null);
	wp_register_style('sweetalert', ASSETS_URL . '/vendors/sweetalert/sweetalert2.min.css', array(), null);
	wp_register_style('jquery.modal', ASSETS_URL . '/vendors/modal/modal.min.css', array(), null);

	// Main CSS
	wp_enqueue_style('swiper');
	wp_enqueue_style('choices');
	wp_enqueue_style('sweetalert');
	wp_enqueue_style('jquery.modal');
	wp_enqueue_style('main');
}

add_action('wp_enqueue_scripts', 'startlife_enqueue_styles');


// Admin Styles
add_action('admin_enqueue_scripts', 'startlife_admin_enqueue_styles');

function startlife_admin_enqueue_styles() {
	wp_enqueue_style('admin-css', ASSETS_URL . '/dist/css/admin.css', array(), null);
}