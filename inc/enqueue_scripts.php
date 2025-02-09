<?php
// Theme Scripts
function theme_name_enqueue_scripts() {

	wp_deregister_script( 'jquery' );

	wp_enqueue_script( 'theme-global', ASSETS_URL . '/dist/js/theme-global-js.js', array(), null, true );

	$scripts_object = array(
		'ajaxurl'  => admin_url( 'admin-ajax.php' ),
		'home_url' => home_url( '/' ),
	);

	wp_localize_script( 'theme-global', 'PHP', $scripts_object );






}

add_action( 'wp_enqueue_scripts', 'theme_name_enqueue_scripts' );



// Deffer All the scripts
function theme_name_defer_scripts( $tag, $handle, $src ) {
	return str_replace( 'src', ' defer  src', $tag );
}

if ( ! is_admin() ) {
	add_filter( 'script_loader_tag', 'theme_name_defer_scripts', 10, 3 );
}
