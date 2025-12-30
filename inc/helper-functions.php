<?php

if ( ! function_exists( 'it_get_OS' ) ) {
	/**
	 * Get the operating system from the user agent.
	 *
	 * @return string Operating system (windows, android, ios, macos, linux, unknown)
	 */
	function it_get_OS() {
		$userAgent = $_SERVER['HTTP_USER_AGENT'];

		if ( stripos( $userAgent, 'windows' ) !== false ) {
			return 'windows';
		} elseif ( stripos( $userAgent, 'android' ) !== false ) {
			return 'android';
		} elseif (
			stripos( $userAgent, 'iphone' ) !== false ||
			stripos( $userAgent, 'ipad' ) !== false ||
			stripos( $userAgent, 'ipod' ) !== false
		) {
			return 'ios';
		} elseif ( stripos( $userAgent, 'macintosh' ) !== false || stripos( $userAgent, 'mac os x' ) !== false ) {
			return 'macos';
		} elseif ( stripos( $userAgent, 'linux' ) !== false ) {
			return 'linux';
		} else {
			return 'unknown';
		}
	}
}

if ( ! function_exists( 'it_get_post_primary_category' ) ) {
	/**
	 * Get the primary category of a post.
	 *
	 * @param int $post_id The post ID.
	 * @param string $term The taxonomy term (default: 'category').
	 * @param bool $return_all_categories Whether to return all categories.
	 *
	 * @return object|false Primary category object or false if not found.
	 */
	function it_get_post_primary_category( $post_id, $term = 'category', $return_all_categories = false ) {
		$return = array();

		if ( class_exists( 'WPSEO_Primary_Term' ) ) {
			$wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
			$primary_term       = get_term( $wpseo_primary_term->get_primary_term() );

			if ( ! is_wp_error( $primary_term ) ) {
				$return['primary_category'] = $primary_term;
			}
		}

		if ( empty( $return['primary_category'] ) || $return_all_categories ) {
			$categories_list = get_the_terms( $post_id, $term );

			if ( empty( $return['primary_category'] ) && ! empty( $categories_list ) ) {
				$return['primary_category'] = $categories_list[0];
			}
			if ( $return_all_categories ) {
				$return['all_categories'] = array();
				if ( ! empty( $categories_list ) ) {
					foreach ( $categories_list as $category ) {
						$return['all_categories'][] = $category->term_id;
					}
				}
			}
		}

		return $return['primary_category'] ?? false;
	}
}

if ( ! function_exists( 'it_get_user_ip' ) ) {
	/**
	 * Get the user's IP address.
	 *
	 * @return string The user's IP address.
	 */
	function theme_get_user_ip() {
		if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) && filter_var( $_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP ) ) {
			return $_SERVER['HTTP_CLIENT_IP'];
		} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) && filter_var( $_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP ) ) {
			return $_SERVER['HTTP_X_FORWARDED_FOR'];
		} else {
			return $_SERVER['REMOTE_ADDR'];
		}
	}
}

if ( ! function_exists( 'it_get_section_id' ) ) {
	/**
	 * Generate a section ID from a string.
	 *
	 * @param string $str Input string.
	 *
	 * @return string Sanitized string for section ID.
	 */
	function theme_get_section_id( $str ) {
		$str = strtolower( $str );
		$str = html_entity_decode( $str, ENT_QUOTES, 'UTF-8' );
		$str = preg_replace( '/[^a-z0-9]+/', '_', $str );

		return trim( $str, '_' );
	}
}

if ( ! function_exists( 'it_clear_phone' ) ) {
	/**
	 * Clean a phone number to retain only digits and '+'
	 *
	 * @param string $tel Phone number.
	 *
	 * @return string|null Cleaned phone number.
	 */
	function it_clear_phone( string $tel ): string|null {
		return preg_replace( '/[^+\d]+/', '', $tel );
	}
}

if ( ! function_exists( 'it_email' ) ) {
	/**
	 * Obfuscate an email address to prevent spam.
	 *
	 * @param string $email Email address.
	 *
	 * @return string Obfuscated email.
	 */
	function it_email( $email ) {
		return antispambot( $email );
	}
}

if ( ! function_exists( 'it_log' ) ) {
	/**
	 * Log a variable to a file.
	 *
	 * @param mixed $variable The variable to log.
	 * @param string|null $label Optional label.
	 * @param string $file Log file path.
	 *
	 * @return bool True on success, false on failure.
	 */
	function it_log( mixed $variable, string|null $label = null, string $file = ABSPATH . 'debug.log' ): bool {
		$logfile     = $file;
		$date_format = 'Y-m-d H:i:s';
		$output      = '[' . gmdate( $date_format ) . '] ' . ( $label ? "($label) " : '' ) . print_r( $variable, true ) . "\n";

		return file_put_contents( $logfile, $output, FILE_APPEND ) !== false;
	}
}

if ( ! function_exists( 'it_console_log' ) ) {
	/**
	 * Output PHP variables to the browser console.
	 *
	 * @param string|null $content Content to display.
	 * @param bool $as_text Whether to display as text or JS object.
	 */
	function it_console_log( null|string $content = null, bool $as_text = true ): void {
		echo '<div class="php-to-js-console-log" style="display: none!important;" data-as-text="' . esc_attr( $as_text ) . '" data-variable="' . htmlspecialchars( wp_json_encode( $content ) ) . '">' . htmlspecialchars( var_export( $content,
				true ) ) . '</div>';
		$hook = is_admin() ? 'admin_footer' : 'wp_footer';
		add_action(
			$hook,
			function () {
				echo '<script>(function ($) { $(document).ready(function ($) { $(".php-to-js-console-log").each(function () { var $e = $(this); console.log($e.attr("data-as-text") ? $e.text() : JSON.parse($e.attr("data-variable"))); }); }); }(jQuery));</script>';
			},
			1
		);
	}
}

if ( ! function_exists( 'it_excerpt' ) ) {
	/**
	 * Limit Excerpt Length
	 *
	 * @param int $word_limit - word limitation.
	 *
	 * @return string
	 */
	function it_excerpt( int $word_limit ): string {

		$excerpt = explode( ' ', get_the_excerpt(), $word_limit );

		if ( count( $excerpt ) >= $word_limit ) {
			array_pop( $excerpt );
			$excerpt = implode( ' ', $excerpt ) . '...';
		} else {
			$excerpt = implode( ' ', $excerpt );
		}

		$excerpt = preg_replace( '`[[^]]*]`', '', $excerpt );

		return $excerpt;
	}
}

if ( ! function_exists( 'it_post_date' ) ) {

	/**
	 * Prints HTML with meta information for the current post-date/time.
	 * @return string
	 */
	function it_post_date(): string {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( (string) get_the_date( DATE_W3C ) ),
			esc_html( (string) get_the_date() ),
			esc_attr( (string) get_the_modified_date( DATE_W3C ) ),
			esc_html( (string) get_the_modified_date() )
		);

		return $time_string;
	}

}

if ( ! function_exists( 'it_get_section_id' ) ) :
	/**
	 * Convert a string into a valid section ID by sanitizing it.
	 *
	 * This function processes a string to make it suitable for use as a section ID by performing the following actions:
	 * - Converts the string to lowercase.
	 * - Decodes HTML entities into their actual characters.
	 * - Replaces special characters, spaces, and some symbols with underscores ('_').
	 * - Trims any leading or trailing whitespace.
	 *
	 * The resulting string will consist of alphanumeric characters and underscores, making it safe for use in HTML element IDs or URLs.
	 *
	 * @param string $str The input string to be converted.
	 *
	 * @return string The sanitized string, suitable for use as a section ID.
	 */
	function it_get_section_id( $str ) {
		$str = strtolower( $str );

		// Convert HTML entities into their actual characters.
		$str = html_entity_decode( $str, ENT_QUOTES, 'UTF-8' );

		// Replace special characters and spaces with '_'.
		$str = str_replace(
			array(
				'’',
				'&',
				';',
				' ',
				',',
				'-',
				'`',
				'"',
				'\\',
				'\/',
				'/"',
				'’',
				'‘',
				'.',
				'-',
				'&nbsp;',
				' ',
				"\x20",
				'$',
				'*',
				'`',
				',',
				'"',
				')',
				'(',
				'|',
				'\\',
				'/',
			),
			'_',
			$str
		);

		$str = trim( $str );

		return $str;
	}

endif;

if ( ! function_exists( 'it_print_acf_title' ) ) {

	/**
	 * Render title & subtitle from ACF component.
	 * IMPORTANT: Make sure that component is cloned as a group.
	 *
	 * @param array<string, string|string[]> $group title component group.
	 *
	 * @return void
	 */
	function it_print_acf_title( array $group = [] ): void {

		$title_group = ! empty( $group ) ? $group : get_sub_field( 'title' );

		if ( empty( $title_group ) ) {
			return;
		}

		$title   = $title_group['the_title'] ?? '';
		$tag     = $title_group['tag'] ?? 'h2';
		$class   = $title_group['title_class'] ?? 'h2';
		$classes = 'it-title-group';

		if ( empty( $title ) ) {
			return;
		}
		?>

		<div class="<?php echo esc_attr( $classes ); ?>">
			<?php printf(
				' <%1$s class="it-title %2$s" >%3$s </%1$s > ',
				esc_attr( $tag ),
				esc_attr( $class ),
				wp_kses_post( $title )
			); ?>
		</div>

		<?php
	}
}
