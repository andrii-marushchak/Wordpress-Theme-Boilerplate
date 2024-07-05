<?php

function getOS() {
	$userAgent = $_SERVER['HTTP_USER_AGENT'];

	if ( stripos( $userAgent, 'windows' ) !== false ) {
		return 'windows';
	} elseif ( stripos( $userAgent, 'android' ) !== false ) {
		return 'android';
	} elseif (
		stripos( $userAgent, 'iphone' ) !== false ||
		stripos( $userAgent, 'iPhone' ) !== false ||
		stripos( $userAgent, 'ipad' ) !== false ||
		stripos( $userAgent, 'iPad' ) !== false ||
		stripos( $userAgent, 'ipod' ) !== false ||
		stripos( $userAgent, 'iPod' ) !== false
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

function theme_get_svg( $path_or_url ) {
	if ( ! function_exists( 'isContainsSVG' ) ) {
		function isContainsSVG( $content ) {
			// Regular expression to search for SVG opening tag
			$pattern = '/<svg[^>]*>/i';

			// Perform the search
			$matches = [];
			preg_match( $pattern, $content, $matches );

			// If matches are found, it contains SVG content
			return ! empty( $matches );
		}
	}

	if ( $path_or_url ) {

		// WP navtive Method
		$svgContent = false;
		if ( filter_var( $path_or_url, FILTER_VALIDATE_URL ) ) {
			// It's a URL, use wp_remote_get
			$args     = [
				'sslverify' => false,  // Only set this to false for local development!
			];
			$response = wp_remote_get( $path_or_url, $args );
			if ( is_wp_error( $response ) ) {
				return false;
			}
			$svgContent = wp_remote_retrieve_body( $response );
		} else {
			// It's a file path, use file_get_contents
			if ( file_exists( $path_or_url ) ) {
				$svgContent = file_get_contents( $path_or_url );
			}
		}


		if ( isContainsSVG( $svgContent ) ) {
			return $svgContent;
		} else {

			// Curl Method
			$ch = curl_init();
			curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, false );
			curl_setopt( $ch, CURLOPT_HEADER, false );
			curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
			curl_setopt( $ch, CURLOPT_URL, $path_or_url );
			curl_setopt( $ch, CURLOPT_REFERER, $path_or_url );
			curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
			curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, 3000 ); // 3 sec.
			curl_setopt( $ch, CURLOPT_TIMEOUT, 10000 ); // 10 sec.
			$result = curl_exec( $ch );
			curl_close( $ch );

			return $result;
		}


	} else {
		return 'url is empty';
	}
}

function get_post_primary_category( $post_id, $term = 'category', $return_all_categories = false ) {
	$return = array();

	if ( class_exists( 'WPSEO_Primary_Term' ) ) {
		// Show Primary category by Yoast if it is enabled & set
		$wpseo_primary_term = new WPSEO_Primary_Term( $term, $post_id );
		$primary_term       = get_term( $wpseo_primary_term->get_primary_term() );

		if ( ! is_wp_error( $primary_term ) ) {
			$return['primary_category'] = $primary_term;
		}
	}

	if ( empty( $return['primary_category'] ) || $return_all_categories ) {
		$categories_list = get_the_terms( $post_id, $term );

		if ( empty( $return['primary_category'] ) && ! empty( $categories_list ) ) {
			$return['primary_category'] = $categories_list[0];  //get the first category
		}
		if ( $return_all_categories ) {
			$return['all_categories'] = array();

			if ( ! empty( $categories_list ) ) {
				foreach ( $categories_list as &$category ) {
					$return['all_categories'][] = $category->term_id;
				}
			}
		}
	}

	return $return['primary_category'] ?? false;
}

function theme_get_user_ip() {
	// Check for shared Internet/ISP IP
	if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) && filter_var( $_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP ) ) {
		return $_SERVER['HTTP_CLIENT_IP'];
	} // Check for IP from proxy or load balancer
	elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) && filter_var( $_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP ) ) {
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	} // Default: return remote IP address
	else {
		return $_SERVER['REMOTE_ADDR'];
	}
}

function theme_get_section_id( $str ) {
	$str = strtolower( $str );

	// Convert HTML entities into their actual characters
	$str = html_entity_decode( $str, ENT_QUOTES, 'UTF-8' );

	// Replace special characters and spaces with '_'
	$str = str_replace( array(
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
		'/'
	),
		'_',
		$str );

	return $str;
}

function get_phone_link($phoneNumber) {
	// Remove all non-numeric characters from the phone number
	$phoneNumber = preg_replace('/[^0-9]/', '', $phoneNumber);

	// Add the 'tel:' prefix
	$phoneNumber = 'tel:' . $phoneNumber;

	return $phoneNumber;
}

