<?php

// ACF Theme Options Panel
if ( function_exists( 'acf_add_options_page' ) ) {
	add_action( 'acf/init', function () {
		acf_add_options_page( 'Site Settings' );
	} );
}

if ( ! function_exists( 'acf_json_save_point' ) ) {
	/**
	 * Defines the save location for ACF JSON files.
	 *
	 * @param string $path Default ACF save path.
	 *
	 * @return string Custom save path for ACF JSON files.
	 */
	function acf_json_save_point( $path ) {
		$path = get_template_directory() . '/inc/acf/acf-json';

		return $path;
	}

	add_filter( 'acf/settings/save_json', 'acf_json_save_point' );
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
	function acf_json_load_point( $paths ) {
		unset( $paths[0] ); // Remove default ACF path
		$paths[] = get_template_directory() . '/inc/acf/acf-json';

		return $paths;
	}

	add_filter( 'acf/settings/load_json', 'acf_json_load_point' );
}

// Allow Shortcodes inside ACF Fields ( Uncomment if needed )
if ( ! function_exists( 'acf_format_value' ) ) {
	/**
	 * Allows shortcodes inside ACF fields.
	 *
	 * @param mixed $value The ACF field value.
	 * @param int $post_id The post ID.
	 * @param array $field The ACF field array.
	 *
	 * @return mixed Processed ACF field value with shortcodes rendered.
	 */
	function acf_format_value( $value, $post_id, $field ) {
		// Check if the value contains any shortcodes
		if ( is_string( $value ) && preg_match( '/\[(\w+).*?\]/', $value ) ) {
			$value = do_shortcode( $value );
		}

		return $value;
	}

	// Uncomment the following line if you want to enable this feature
	// add_filter('acf/format_value', 'acf_format_value', 10, 3);
}

// ACF Prevent ESCAPE HTML & disable notice
/*
add_filter( 'acf/admin/prevent_escaped_html_notice', '__return_true' );
add_filter( 'acf/shortcode/allow_unsafe_html', '__return_true' );
add_filter( 'acf/the_field/allow_unsafe_html', '__return_true' );
*/
