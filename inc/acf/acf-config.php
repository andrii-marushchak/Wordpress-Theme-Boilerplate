<?php

// ACF Theme Options Panel
if ( function_exists( 'acf_add_options_page' ) ) {
	/**
	 * Adds an ACF options page for site settings.
	 *
	 * This function registers a theme options page in the WordPress admin under
	 * "Site Settings" if ACF is installed and active.
	 */
	acf_add_options_page( array(
		'page_title' => __( 'Site Settings', 'theme_name' ),
		'menu_slug'  => 'theme-general-settings',
		'capability' => 'read',
		'redirect'   => false,
		'position'   => 60
	) );
}

if ( ! function_exists( 'theme_name_acf_json_save_point' ) ) {
	/**
	 * Defines the save location for ACF JSON files.
	 *
	 * @param string $path Default ACF save path.
	 *
	 * @return string Custom save path for ACF JSON files.
	 */
	function theme_name_acf_json_save_point( $path ) {
		$path = THEME_PATH . '/settings/acf/acf-json';

		return $path;
	}

	add_filter( 'acf/settings/save_json', 'theme_name_acf_json_save_point' );
}

if ( ! function_exists( 'theme_name_acf_json_load_point' ) ) {
	/**
	 * Defines the load location for ACF JSON files.
	 *
	 * This function modifies the default paths where ACF looks for JSON files,
	 * ensuring fields are loaded from a custom theme directory.
	 *
	 * @param array $paths Default ACF load paths.
	 *
	 * @return array Modified load paths.
	 */
	function theme_name_acf_json_load_point( $paths ) {
		unset( $paths[0] ); // Remove default ACF path
		$paths[] = THEME_PATH . '/settings/acf/acf-json';

		return $paths;
	}

	add_filter( 'acf/settings/load_json', 'theme_name_acf_json_load_point' );
}

// Allow Shortcodes inside ACF Fields ( Uncomment if needed )
if ( ! function_exists( 'theme_name_acf_format_value' ) ) {
	/**
	 * Allows shortcodes inside ACF fields.
	 *
	 * @param mixed $value The ACF field value.
	 * @param int $post_id The post ID.
	 * @param array $field The ACF field array.
	 *
	 * @return mixed Processed ACF field value with shortcodes rendered.
	 */
	function theme_name_acf_format_value( $value, $post_id, $field ) {
		// Check if the value contains any shortcodes
		if ( is_string( $value ) && preg_match( '/\[(\w+).*?\]/', $value ) ) {
			$value = do_shortcode( $value );
		}

		return $value;
	}

	// Uncomment the following line if you want to enable this feature
	// add_filter('acf/format_value', 'theme_name_acf_format_value', 10, 3);
}


// ACF Prevent ESCAPE HTML & disable notice
add_filter( 'acf/admin/prevent_escaped_html_notice', '__return_true' );
add_filter( 'acf/shortcode/allow_unsafe_html', '__return_true' );
add_filter( 'acf/the_field/allow_unsafe_html', '__return_true' );
