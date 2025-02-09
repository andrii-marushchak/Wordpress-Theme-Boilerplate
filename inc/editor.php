<?php
/**
 * Editor modification
 * @link https://codex.wordpress.org/TinyMCE_Custom_Styles
 */

// Enable strict typing mode.
declare( strict_types=1 );

if ( ! function_exists( 'theme_domain_wpdocs_theme_add_editor_styles' ) ) {

	/**
	 * Registers an editor stylesheet for the theme.
	 *
	 * @return void
	 */
	function theme_domain_wpdocs_theme_add_editor_styles(): void {
		add_editor_style( ASSETS_URL . '/dist/css/' . 'editor-styles.css' );
	}

	add_action( 'admin_init', 'theme_domain_wpdocs_theme_add_editor_styles' );

}

if ( ! function_exists( 'theme_domain_tiny_mce_style_formats' ) ) {

	/**
	 * Adds TinyMCE style formats.
	 *
	 * @param string[] $styles The array of TinyMCE style formats.
	 *
	 * @return string[] The modified array of TinyMCE style formats.
	 */
	function theme_domain_tiny_mce_style_formats( array $styles ): array {
		array_unshift( $styles, 'styleselect' );

		return $styles;
	}

	add_filter( 'mce_buttons_2', 'theme_domain_tiny_mce_style_formats' );

}

if ( ! function_exists( 'theme_domain_tiny_mce_before_intheme_domain_formats' ) ) {

	/**
	 * Adds TinyMCE style formats.
	 *
	 * @param string[] $settings The TinyMCE settings array.
	 *
	 * @return string[] The modified TinyMCE settings array.
	 */
	function theme_domain_tiny_mce_before_intheme_domain_formats( array $settings ): array {

		// Define the style_formats array.
		$style_formats = array(
			array(
				'title' => 'Titles',
				'items' => array(
					array(
						'title'    => 'H1',
						'selector' => 'p,h1,h2,h3,h4,h5,h6',
						'classes'  => 'h1',
					),
					array(
						'title'    => 'H2',
						'selector' => 'p,h1,h2,h3,h4,h5,h6',
						'classes'  => 'h2',
					),
					array(
						'title'    => 'H3',
						'selector' => 'p,h1,h2,h3,h4,h5,h6',
						'classes'  => 'h3',
					),
					array(
						'title'    => 'H4',
						'selector' => 'p,h1,h2,h3,h4,h5,h6',
						'classes'  => 'h4',
					),
					array(
						'title'    => 'H5',
						'selector' => 'p,h1,h2,h3,h4,h5,h6',
						'classes'  => 'h5',
					),
					array(
						'title'    => 'H6',
						'selector' => 'p,h1,h2,h3,h4,h5,h6',
						'classes'  => 'h6',
					),
				),
			),
			array(
				'title' => 'Text',
				'items' => array(
					array(
						'title'    => 'Text (lg)',
						'selector' => 'p,h1,h2,h3,h4,h5,h6',
						'classes'  => 'text-lg',
					),
					array(
						'title'    => 'Text (sm)',
						'selector' => 'p,h1,h2,h3,h4,h5,h6',
						'classes'  => 'text-sm',
					),
					array(
						'title'    => 'Uppercase',
						'selector' => 'p,h1,h2,h3,h4,h5,h6',
						'classes'  => 'text-uppercase',
					),
				),
			),
			array(
				'title' => 'Buttons',
				'items' => array(
					array(
						'title'    => 'Button (primary)',
						'selector' => 'a',
						'classes'  => 'btn',
						'wrapper'  => false,
					),
					array(
						'title'    => 'Button (outline)',
						'selector' => 'a',
						'classes'  => 'btn btn-outline',
						'wrapper'  => false,
					),
					array(
						'title'    => 'Button Group',
						'classes'  => 'btn-group',
						'selector' => 'p',
					),
				),
			),
			array(
				'title' => 'Lists',
				'items' => array(
					array(
						'title'    => 'List (checked)',
						'classes'  => 'list-check',
						'selector' => 'ul',
						'wrapper'  => false,
					),
					array(
						'title'    => 'List (dotted)',
						'classes'  => 'list-dot',
						'selector' => 'ul',
						'wrapper'  => false,
					),
					array(
						'title'    => 'List (numbered)',
						'classes'  => 'list-number',
						'selector' => 'ol',
						'wrapper'  => false,
					),
				),
			),
		);

		if ( isset( $settings['style_formats'] ) ) {
			$orig_style_formats = json_decode( $settings['style_formats'], true );
			$style_formats      = array_merge( $orig_style_formats, $style_formats ); // @phpstan-ignore-line
		}

		$encoded_formats = wp_json_encode( $style_formats );

		$settings['style_formats'] = $encoded_formats ?: ''; // phpcs:ignore

		return $settings;
	}

	add_filter( 'tiny_mce_before_init', 'theme_domain_tiny_mce_before_intheme_domain_formats' );

}

if ( ! function_exists( 'theme_domain_tiny_mce_before_intheme_domain_colors' ) ) {

	/**
	 * Add custom colors to TinyMCE editor text color selector.
	 *
	 * @param array<string, mixed> $init The TinyMCE initialisation array.
	 *
	 * @return array<string, mixed> The modified TinyMCE initialisation array.
	 */
	function theme_domain_tiny_mce_before_intheme_domain_colors( array $init ): array {

		// By using the same array keys as the default values you'll override (replace) them.
		$custom_colors = array(
			'Black'   => '000',
			'White'   => 'fff',
			'Grey'    => 'ccc',
			'Primary' => 'b91c1c',
		);

		$text_color_map = array();

		foreach ( $custom_colors as $name => $color ) {
			$text_color_map[] = "\"$color\", \"$name\"";
		}

		$init['textcolor_map']  = '[' . implode( ', ', $text_color_map ) . ']';
		$init['textcolor_rows'] = 6; // Expand color grid to 6 rows.

		return $init;
	}

	add_filter( 'tiny_mce_before_init', 'theme_domain_tiny_mce_before_intheme_domain_colors' );

}
