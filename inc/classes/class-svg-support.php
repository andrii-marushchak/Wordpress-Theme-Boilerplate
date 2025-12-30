<?php
/**
 * Allow SVG through WordPress Media Uploader
 *
 * @package starter
 */

// Enable strict typing mode.
declare( strict_types = 1 );

// Disable direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die( 'Access denied' );
}

/**
 * Class to add svg support onto website.
 */
final class SVG_Support {

	/**
	 * Screen check function.
	 * Checks if the current page is the Media Library page.
	 *
	 * @return   bool
	 * @since    1.0.0
	 */
	private function svg_specific_pages_media_library(): bool {
		$screen = get_current_screen();

		return is_object( $screen ) && 'upload' === $screen->id;
	}

	/**
	 * Screen check function.
	 * Checks if the current page is the Media Library page.
	 *
	 * @param null|string $new_edit - current instance.
	 *
	 * @return   bool
	 * @since    1.0.0
	 */
	public function svg_is_edit_page( null|string $new_edit = null ): bool {

		global $pagenow;

		if ( ! is_admin() ) {
			return false;
		}

		if ( 'edit' === $new_edit ) {

			return 'post.php' === $pagenow;

		} elseif ( 'new' === $new_edit ) {

			return 'post-new.php' === $pagenow;

		} else {

			return in_array( $pagenow, array( 'post.php', 'post-new.php' ), true );

		}
	}

	/**
	 * Add SVG to Mime Types
	 * Checks if the current page is the Media Library page.
	 *
	 * @param array $mimes - mime types.
	 *
	 * @return   array
	 * @since    1.0.0
	 */
	public function svg_upload_mimes( array $mimes = array() ): array {

		global $vn_svg_options;

		if (
			empty( $vn_svg_options['restrict'] ) ||
			current_user_can( 'administrator' ) // phpcs:ignore
		) {

			// Allow SVG file upload.
			$mimes['svg']  = 'image/svg+xml';
			$mimes['svgz'] = 'image/svg+xml';

			return $mimes;
		} else {
			return $mimes;
		}
	}

	/**
	 * Check Mime Types
	 * Checks if the current page is the Media Library page.
	 *
	 * @param array      $checked - checked array.
	 * @param mixed      $file - file to work with.
	 * @param string     $filename - mime types.
	 * @param null|array $mimes - mime types.
	 *
	 * @return   array
	 * @since    1.0.0
	 */
	public function svg_upload_check( array $checked, mixed $file, string $filename, null|array $mimes ): array {

		if ( ! $checked['type'] ) {

			$check_filetype  = wp_check_filetype( $filename, $mimes );
			$ext             = $check_filetype['ext'];
			$type            = $check_filetype['type'];
			$proper_filename = $filename;

			if ( $type && str_starts_with( $type, 'image/' ) && 'svg' !== $ext ) {
				$ext  = false;
				$type = false;
			}

			$checked = compact( 'ext', 'type', 'proper_filename' );
		}

		return $checked;
	}

	/**
	 * Proper SVG response for JS.
	 *
	 * @param string[] $response - response for js.
	 * @param object   $attachment - image object.
	 *
	 * @return   array
	 * @since    1.0.0
	 */
	public function svg_response_for_svg( array $response, object $attachment ): array {

		if ( ! property_exists( $attachment, 'ID' ) ) {
			return $response;
		}

		if (
			'image/svg+xml' === $response['mime'] &&
			empty( $response['sizes'] )
		) {

			$svg_path = get_attached_file( $attachment->ID );

			if ( ! $svg_path || ! file_exists( $svg_path ) ) {
				// If SVG is external, use the URL instead of the path.
				$svg_path = $response['url'];
			}

			$dimensions  = $this->svg_get_dimensions( $svg_path );
			$width       = $dimensions->width ?? '80';
			$height      = $dimensions->height ?? '45';
			$orientation = $width > $height ? 'landscape' : 'portrait';

			$response['sizes'] = array(
				'full' => array(
					'url'         => $response['url'],
					'width'       => $width,
					'height'      => $height,
					'orientation' => $orientation,
				),
			);

		}

		return $response;
	}

	/**
	 * Helper function to get SVG dimensions
	 *
	 * @param string $svg - svg.
	 *
	 * @return   object
	 * @since    1.0.0
	 */
	public function svg_get_dimensions( string $svg ): object {

		$svg = simplexml_load_file( $svg );

		if ( ! $svg ) {

			$width  = '0';
			$height = '0';

		} else {

			$attributes = $svg->attributes();
			$width      = (string) $attributes->width;
			$height     = (string) $attributes->height;

		}

		return (object) array(
			'width'  => $width,
			'height' => $height,
		);
	}

	/**
	 * Generate attachment metadata.
	 * Fixes Illegal String Offset Warning for Height & Width
	 *
	 * @param array $metadata - all metadata.
	 * @param int   $attachment_id - attachment id.
	 *
	 * @return   array
	 * @since    1.0.0
	 */
	public function svg_generate_svg_attachment_metadata( array $metadata, int $attachment_id ): array {

		$mime = get_post_mime_type( $attachment_id );

		if ( 'image/svg+xml' === $mime ) {

			$svg_path   = get_attached_file( $attachment_id );
			$upload_dir = wp_upload_dir();

			if ( ! $svg_path ) {
				return $metadata;
			}

			// get the path relative to /uploads/ - found no better way.
			$relative_path = str_replace( $upload_dir['basedir'], '', $svg_path );
			$filename      = basename( $svg_path );

			$dimensions = $this->svg_get_dimensions( $svg_path );
			$width      = $dimensions->width ?? '80';
			$height     = $dimensions->height ?? '45';

			$metadata = array(
				'width'  => intval( $width ),
				'height' => intval( $height ),
				'file'   => $relative_path,
			);

			// Might come in handy to create the sizes array too - But it's not needed for this workaround! Always links to original svg-file => Hey, it's a vector graphic! ;).
			$sizes = array();
			foreach ( get_intermediate_image_sizes() as $s ) {
				$sizes[ $s ] = array(
					'width'  => '',
					'height' => '',
					'crop'   => false,
				);

				// For theme-added sizes.
				if ( isset( $_wp_additional_image_sizes[ $s ]['width'] ) ) {
					$sizes[ $s ]['width'] = intval( $_wp_additional_image_sizes[ $s ]['width'] );
				} else { // For default sizes set in options.
					$sizes[ $s ]['width'] = get_option( "{$s}_size_w" );
				}

				// For theme-added sizes.
				if ( isset( $_wp_additional_image_sizes[ $s ]['height'] ) ) {
					$sizes[ $s ]['height'] = intval( $_wp_additional_image_sizes[ $s ]['height'] );
				} else { // For default sizes set in options.
					$sizes[ $s ]['height'] = get_option( "{$s}_size_h" );
				}

				// For theme-added sizes.
				if ( isset( $_wp_additional_image_sizes[ $s ]['crop'] ) ) {
					$sizes[ $s ]['crop'] = intval( $_wp_additional_image_sizes[ $s ]['crop'] );
				} else { // For default sizes set in options.
					$sizes[ $s ]['crop'] = get_option( "{$s}_crop" );
				}

				$sizes[ $s ]['file']      = $filename;
				$sizes[ $s ]['mime-type'] = 'image/svg+xml';
			}
			$metadata['sizes'] = $sizes;
		}

		return $metadata;
	}

	/**
	 * Add custom CSS for back-end proper output of SVG
	 */
	public function fix_svg_thumb(): void {

		?>
		<style>
			.attachment svg, .widget_media_image svg {
				max-width: 100%;
				height: auto
			}

			body #set-post-thumbnail, body #postimagediv .inside img[src$=".svg"] {
				width: 100%
			}

			td.media-icon img[src$=".svg"], img[src$=".svg"].attachment-post-thumbnail {
				width: 100% !important;
				height: auto !important
			}
		</style>
		<?php
	}

	/**
	 * Add ability to preview SVG
	 *
	 * @return   string|false
	 * @since    1.0.0
	 */
	public function svg_display_thumbs(): string|false {

		if ( $this->svg_specific_pages_media_library() ) {

			ob_start( array( $this, 'svg_thumbs_filter' ) );

			add_filter( 'final_output', array( $this, 'svg_final_output' ) );
		}

		return false;
	}

	/**
	 * Helper method.
	 *
	 * @param string $content - content that should be modified.
	 *
	 * @return   mixed
	 * @since    1.0.0
	 */
	public function svg_thumbs_filter( string $content ): mixed {
		return apply_filters( 'final_output', $content );
	}

	/**
	 * Add ability to preview SVG helper function
	 *
	 * @param string $content - content that should be modified.
	 *
	 * @return   string
	 * @since    1.0.0
	 */
	public function svg_final_output( string $content ): string {

		$content = str_replace(
			'<# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>',
			'<# } else if ( \'svg+xml\' === data.subtype ) { #>
					<img class="details-image" src="{{ data.url }}" draggable="false" />
					<# } else if ( \'image\' === data.type && data.sizes && data.sizes.full ) { #>',
			$content
		);

		return str_replace(
			'<# } else if ( \'image\' === data.type && data.sizes ) { #>',
			'<# } else if ( \'svg+xml\' === data.subtype ) { #>
					<div class="centered">
						<img src="{{ data.url }}" class="thumbnail" draggable="false" />
					</div>
					<# } else if ( \'image\' === data.type && data.sizes ) { #>',
			$content
		);
	}
}

$svg_support = new SVG_Support();

// Allow upload svg.
add_filter( 'upload_mimes', array( $svg_support, 'svg_upload_mimes' ), 99 );
add_filter( 'wp_check_filetype_and_ext', array( $svg_support, 'svg_upload_check' ), 10, 4 );
add_filter( 'wp_prepare_attachment_for_js', array( $svg_support, 'svg_response_for_svg' ), 10, 2 );
add_filter( 'wp_generate_attachment_metadata', array( $svg_support, 'svg_generate_svg_attachment_metadata' ), 10, 3 );
add_action( 'admin_head', array( $svg_support, 'fix_svg_thumb' ) );
add_action( 'admin_init', array( $svg_support, 'svg_display_thumbs' ) );
