<?php

function theme_name_get_svg(string $path) {
	$result = false;
	if ($path) {
		try {
			$result = wp_remote_retrieve_body(wp_remote_get($path));
		} catch (Exception $e) {
			$result = false;
		}

		if ( ! $result) {
			try {

				$args   = stream_context_create([
					"ssl" => [
						"verify_peer"      => false,
						"verify_peer_name" => false,
					]
				]);
				$result = file_get_contents($path, false, $args);
			} catch (Exception $e) {
				$result = false;
			}
		}

		if ( ! $result) {
			try {
				$url = $path;
				$ch  = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
				$result = curl_exec($ch);
				curl_close($ch);
			} catch (Exception $e) {
				$result = false;
			}
		}
	}

	return $result;
}

function theme_name_the_svg($path) {
	echo theme_name_get_svg($path);
}

function theme_name_strip_value($str) {
	$str = sanitize_text_field($str);
	$str = theme_name_wp_kses($str);
	$str = trim($str);

	return $str;
}

// ACF get_field() wrapper
function theme_name_get_field($param, $id = null) {

	if ($id == null) {
		$id = get_the_ID();
	}

	if (function_exists('get_field')) {
		return get_field($param, $id);
	}
}

// ACF the_field() wrapper
function theme_name_the_field($param, $id = null) {

	if ($id == null) {
		$id = get_the_ID();
	}

	if (function_exists('the_field')) {
		the_field($param, $id);
	}
}

// ACF get_option() wrapper
function theme_name_get_option($param) {
	if (function_exists('get_field')) {
		return get_field($param, 'option');
	}
}

// ACF the_option() wrapper
function theme_name_the_option($param) {
	if (function_exists('the_field')) {
		the_field($param, 'option');
	}
}

// WP wp_kses() wrapper
function theme_name_wp_kses($DT_string) {
	$allowed_tags = array(
		'img'      => array(
			'src'    => array(),
			'alt'    => array(),
			'width'  => array(),
			'height' => array(),
			'class'  => array(),
		),
		'a'        => array(
			'href'  => array(),
			'title' => array(),
			'class' => array(),
		),
		'span'     => array(
			'class' => array(),
		),
		'br'       => array(),
		'div'      => array(
			'class' => array(),
			'id'    => array(),
		),
		'h1'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'h2'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'h3'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'h4'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'h5'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'h6'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'p'        => array(
			'class' => array(),
			'id'    => array(),
		),
		'strong'   => array(
			'class' => array(),
			'id'    => array(),
		),
		'b'        => array(
			'class' => array(),
			'id'    => array(),
		),
		'i'        => array(
			'class' => array(),
			'id'    => array(),
		),
		'del'      => array(
			'class' => array(),
			'id'    => array(),
		),
		'ul'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'li'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'ol'       => array(
			'class' => array(),
			'id'    => array(),
		),
		'input'    => array(
			'class' => array(),
			'id'    => array(),
			'type'  => array(),
			'style' => array(),
			'name'  => array(),
			'value' => array(),
		),
		'textarea' => array(
			'class' => array(),
			'id'    => array(),
			'type'  => array(),
			'style' => array(),
			'name'  => array(),
			'value' => array(),
		),
	);
	if (function_exists('wp_kses')) {
		return wp_kses($DT_string, $allowed_tags);
	}
}

// Get stripped phone number for href=tel:
function theme_name_get_phone($value) {
	return str_replace(array(' ', ' - ', '( ', ' )'), '', $value);
}

// Display Picture
function theme_name_picture(string $path, bool $echo = true, bool $loading_lazy = true, string $img_css = '', string $alt = '', string $picture_css = '') {
	$file_path              = THEME_PATH . $path;
	$real_extension         = pathinfo($file_path)['extension'];
	$path_without_extension = preg_replace('/\\.[^.\\s]{3,4}$/', '', $path);

	$loading_attr = '';
	if ($loading_lazy) {
		$loading_attr = 'loading="lazy"';
	}
	if ($img_css) {
		$img_css = 'class="' . $img_css . '"';
	}
	if ($picture_css) {
		$picture_css = 'class="' . $picture_css . '"';
	}

	if ($alt) {
		$alt = 'alt="' . $alt . '"';
	} else {
		$alt = 'alt=""';
	}

	$images_arr = [
		[
			'extension' => $real_extension,
			'mime_type' => mime_content_type(THEME_PATH . $path_without_extension . '.' . $real_extension),
			'size'      => filesize(THEME_PATH . $path_without_extension . '.' . $real_extension),
			'url'       => THEME_URL . $path_without_extension . '.' . $real_extension,
			'html'      => '<img src="' . THEME_URL . $path_without_extension . '.' . $real_extension . '"   ' . $loading_attr . '  ' . $img_css . '    ' . $alt . '     >'
		],
	];

	// Avif
	$avif = THEME_PATH . $path_without_extension . '.avif';
	if (file_exists($avif)) {
		$images_arr[] = [
			'extension' => 'avif',
			'mime_type' => mime_content_type(THEME_PATH . $path_without_extension . '.avif'),
			'size'      => filesize(THEME_PATH . $path_without_extension . '.avif'),
			'url'       => THEME_URL . $path_without_extension . '.avif',
			'html'      => '<source srcset="' . THEME_URL . $path_without_extension . '.avif' . '" type="' . mime_content_type(THEME_PATH . $path_without_extension . '.avif') . '">'
		];
	}

	// Webp
	$webp = THEME_PATH . $path_without_extension . '.webp';
	if (file_exists($webp)) {
		$images_arr[] = [
			'extension' => 'webp',
			'mime_type' => mime_content_type(THEME_PATH . $path_without_extension . '.webp'),
			'size'      => filesize(THEME_PATH . $path_without_extension . '.webp'),
			'url'       => THEME_URL . $path_without_extension . '.webp',
			'html'      => '<source srcset="' . THEME_URL . $path_without_extension . '.webp' . '" type="' . mime_content_type(THEME_PATH . $path_without_extension . '.webp') . '">'
		];
	}

	// Sort by size
	usort($images_arr, function ($a, $b) {
		return strcmp($a['size'], $b['size']);
	});

	ob_start(); ?>

    <picture <?php echo $picture_css; ?> >
		<?php foreach ($images_arr as $img) {
			echo $img['html'];
		} ?>
    </picture>

	<?php $picture = ob_get_clean();

	if ($echo) {
		echo $picture;
	} else {
		return $picture;
	}
}