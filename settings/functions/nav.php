<?php

function theme_name_init_navigation() {
	register_nav_menus(
		array(
			'main-menu' => 'Main Menu',
		)
	);
}

add_action( 'after_setup_theme', 'theme_name_init_navigation' );


// Menu foreach setup (link icons | mega-menu | disabled link)
function theme_name_menu_foreach( $items, $args ) {

	$i = 0;
	foreach ( $items as & $item ) {

		if (
			in_array( 'mega-menu-wrap', $item->classes ) ||
			in_array( 'menu-item-has-children', $item->classes )
		) {
			// Menu Link Icon
			$item->title = "<span>" . esc_html( $item->title ) . "</span>";
		} else {
			$item->title = "<span>" . esc_html( $item->title ) . "</span>";
		}

		$i ++;
	}

	return $items;
}

add_filter( 'wp_nav_menu_objects', 'theme_name_menu_foreach', 10, 2 );




