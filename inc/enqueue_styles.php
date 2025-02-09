<?php

// Theme Styles
function theme_name_enqueue_styles() {

	// Main CSS
	wp_enqueue_style( 'theme-global', DIST_URL . '/css/theme-global-css.css', [], null );
}

add_action( 'wp_enqueue_scripts', 'theme_name_enqueue_styles' );


function theme_name_admin_enqueue_styles(): void {
	wp_enqueue_style( 'admin-css', DIST_URL . '/css/admin-css.css', array(), null );

	wp_enqueue_script( 'admin-js', DIST_URL . '/js/admin.min.js' ); // phpcs:ignore

	wp_localize_script(
		'admin-js',
		'PHP',
		[

		]
	);
}


add_action( 'admin_enqueue_scripts', 'theme_name_admin_enqueue_styles' );



