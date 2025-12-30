<?php
// Enable strict typing mode.
declare( strict_types=1 );

// Disable direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied' );
}

$version = ! defined( 'WP_ENVIRONMENT_TYPE' ) || 'production' !== WP_ENVIRONMENT_TYPE ? (string) time() : IT_VERSION;

if ( ! function_exists( 'it_admin_assets' ) ) {
	function it_admin_assets( $version ): void {

		wp_enqueue_style( 'admin-css', IT_CSS . '/admin-styles.css', [], $version );

		wp_enqueue_script( 'admin-js', IT_JS . 'admin.min.js', [], $version, [ 'in_footer' => true, 'defer' => false, ] );

		wp_localize_script( 'admin-js', 'PHP', [


		] );

	}

	add_action( 'admin_enqueue_scripts', 'it_admin_assets' );
}

if ( ! function_exists( 'it_theme_assets' ) ) {
	function it_theme_assets( $version ): void {

		wp_deregister_script( 'jquery' );

		// Global JavaScript.
		wp_enqueue_script( 'theme-global', IT_JS . 'public.min.js', [], $version, [ 'in_footer' => true, 'strategy' => 'defer', ] );

		wp_localize_script( 'theme-global', 'PHP', [
			'ajaxurl'  => admin_url( 'admin-ajax.php' ),
			'home_url' => home_url( '/' ),
		] );

		// Global styles.
		wp_enqueue_style( 'theme-global', IT_CSS . 'theme-global.css', [], $version );

	}

	add_action( 'wp_enqueue_scripts', 'it_theme_assets', 15 );
}

if ( ! function_exists( 'it_add_editor_styles' ) ) {

	/**
	 * Registers an editor stylesheet for the theme.
	 *
	 * @return void
	 */
	function it_add_editor_styles(): void {
		add_editor_style( IT_CSS . 'editor-styles.css' );
	}

	add_action( 'admin_init', 'it_add_editor_styles' );

}
