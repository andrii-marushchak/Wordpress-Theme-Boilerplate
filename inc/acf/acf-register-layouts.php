<?php
/**
 * ACF Initialization file
 *
 * @package starter
 * @subpackage acf
 */

// Enable strict typing mode.
declare( strict_types = 1 );

const ACF_LAYOUTS = [
	'text_and_media',
	'intro',
	'newsletter',
	'gallery',
	'accordion',
	'text_and_form',
	'counter',
	'columns',
	'categories',
	'cta',
	'ticker',
	'code',
];

/**
 * Get layout template
 *
 * @param string               $file File path
 * @param array<string, mixed> $field Field settings
 * @param array<string, mixed> $layout Layout settings
 */
function it_get_acf_layout_template( string $file, array $field, array $layout ): string {
	if ( ! isset( $layout['name'] ) ) {
		return $file;
	}

	return IT_ACF_LAYOUTS . $layout['name'] . '/template.php';
}

/**
 * Get layout stylesheet
 *
 * @param string               $file File path
 * @param array<string, mixed> $field Field settings
 * @param array<string, mixed> $layout Layout settings
 */
function it_get_acf_layout_style( string $file, array $field, array $layout ): string {
	if ( ! isset( $layout['name'] ) ) {
		return $file;
	}

	return IT_DIST . '/acf-layouts/' . $layout['name'] . '/style.css';
}

/**
 * Get layout script
 *
 * @param string               $file File path
 * @param array<string, mixed> $field Field settings
 * @param array<string, mixed> $layout Layout settings
 */
function it_get_acf_layout_script( string $file, array $field, array $layout ): string {
	if ( ! isset( $layout['name'] ) ) {
		return $file;
	}

	return IT_DIST . '/acf-layouts/' . $layout['name'] . '/script.min.js';
}

/**
 * Get layout thumbnail
 *
 * @param string               $file File path
 * @param array<string, mixed> $field Field settings
 * @param array<string, mixed> $layout Layout settings
 */
function it_get_acf_layout_thumbnail( string $file, array $field, array $layout ): string {
	if ( ! isset( $layout['name'] ) ) {
		return $file;
	}

	return get_stylesheet_directory_uri() . '/acf-layouts/' . $layout['name'] . '/preview.jpg';
}

/**
 * Register ACF layouts existed in the page content.
 */
function it_register_acf_layouts(): void {

	foreach ( ACF_LAYOUTS as $layout ) {
		add_filter( 'acfe/flexible/render/template/layout=' . $layout, 'it_get_acf_layout_template', 10, 3 );
		add_filter( 'acfe/flexible/render/style/layout=' . $layout, 'it_get_acf_layout_style', 10, 3 );
		add_filter( 'acfe/flexible/render/script/layout=' . $layout, 'it_get_acf_layout_script', 10, 3 );
		add_filter( 'acfe/flexible/thumbnail/layout=' . $layout, 'it_get_acf_layout_thumbnail', 10, 3 );
	}
}

/**
 * Add custom ACF preview images on back-end.
 */
function it_preview_acf_layouts(): void {
	$styles = '<style>';

	foreach ( ACF_LAYOUTS as $layout ) {
		$image_path = IT_ACF_LAYOUTS . $layout . '/preview.jpg';
		$image_url  = get_stylesheet_directory_uri() . '/acf-layouts/' . $layout . '/preview.jpg';

		if ( ! file_exists( $image_path ) ) {
			continue;
		}

		$styles .= '.acf-fields .layout[data-layout="' . $layout . '"] .acfe-fc-placeholder{ background-image: url("' . $image_url . '"); }';
	}

	$styles .= '</style>';

	echo $styles; // phpcs:ignore
}

add_action( 'init', 'it_register_acf_layouts' );
add_action( 'admin_head', 'it_preview_acf_layouts' );
