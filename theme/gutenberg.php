<?php

// Enable Gutenberg blocks for 'events' & 'posts'
add_filter('use_block_editor_for_post_type', 'startlife_disable_gutenberg', 10, 2);
function startlife_disable_gutenberg($current_status, $post_type) {
	if (in_array($post_type, ['events', 'post'])) {
		return true;
	} else {
		return $current_status;
	}
}

// Deregister Gutenberg font for frontend
if ( ! is_admin()) {
	add_filter('gettext_with_context', 'gg_deregister_gutenberg_fonts', 10, 4);
	function gg_deregister_gutenberg_fonts($translation, $text, $context, $domain) {
		if ($context != 'Google Font Name and Variants' || $text != 'Noto Serif:400,400i,700,700i') {
			return $translation;
		}

		return 'off';
	}
}

// Add Startlife category for gutenberg
function startlife_add_block_category($block_categories) {
	return array_merge($block_categories, [
		[
			'slug'  => 'startlife',
			'title' => __('Startlife', 'startlife'),
			'icon'  => '<svg width="30" height="27" viewBox="0 0 30 27" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M29.3437 26.2849L17.8861 0.00292969L15.0195 6.8257L21.1269 21.3627H17.8626V26.2878L29.3437 26.2849Z" fill="#CCCCCC"/>
<path d="M17.8851 0.00585938H12.1519L0.697266 26.2878H12.1755V21.3627H8.91114L15.0185 6.82863L17.8851 0.00585938Z" fill="white"/>
</svg>
							',
		],
	]);
}

add_filter('block_categories_all', 'startlife_add_block_category');


function register_acf_block_types() {

	// Button
	acf_register_block_type(array(
		'name'            => 'startlife_button',
		'title'           => __('Startlife Button'),
		'render_template' => 'template-parts/gutenberg-blocks/quote/quote.php',
		'category'        => 'blankfactor',
		'icon'            => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M9.983 3v7.391c0 5.704-3.731 9.57-8.983 10.609l-.995-2.151c2.432-.917 3.995-3.638 3.995-5.849h-4v-10h9.983zm14.017 0v7.391c0 5.704-3.748 9.571-9 10.609l-.996-2.151c2.433-.917 3.996-3.638 3.996-5.849h-3.983v-10h9.983z"/></svg> ',
		'keywords'        => array('button'),
	));

}

