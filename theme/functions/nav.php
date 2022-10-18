<?php

function startlife_init_navigation() {
	register_nav_menus(
		array(
			'main-menu'   => 'Desktop Menu',
			'mobile-menu' => 'Mobile Menu',
		)
	);
}

add_action('after_setup_theme', 'startlife_init_navigation');


// Menu foreach setup (link icons | mega-menu | disabled link)
function startlife_menu_foreach($items, $args) {

	$i = 0;
	foreach ($items as & $item) {


		if (
			in_array('mega-menu-wrap', $item->classes) ||
			in_array('menu-item-has-children', $item->classes)
		) {
			// Menu Link Icon
			$item->title = "<span>" . esc_html($item->title) . "</span>" . '<span class="icon sub-menu-toggle"><svg width="12" height="8" viewBox="0 0 12 8" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M5.36605 7.72701L0.264458 2.46079C-0.0881526 2.09681 -0.0881526 1.50823 0.264458 1.14811L1.11222 0.272991C1.46483 -0.0909971 2.03501 -0.0909971 2.38387 0.272991L6 4.00581L9.61613 0.272991C9.96874 -0.0909971 10.5389 -0.0909971 10.8878 0.272991L11.7355 1.14811C12.0882 1.5121 12.0882 2.10068 11.7355 2.46079L6.63395 7.72701C6.28884 8.091 5.71866 8.091 5.36605 7.72701Z" fill="#098500"/>
</svg>
</span>';
		} else {


			if ($item->menu_item_parent) {

				// Sub Menu Links
				if ($item->description) {
					ob_start(); ?>
                    <span class="title"><?php echo esc_html($item->title) ?></span>
                    <div class="description"><?php echo esc_html($item->description) ?></div>
                    <div class="icon">
                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
                                  fill="black"/>
                        </svg>
                    </div>
				<?php } else {
					ob_start(); ?>
                    <span class="title"><?php echo esc_html($item->title) ?></span>
                    <div class="icon">
                        <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.37764 1.06558L7.12086 0.256833C7.43555 -0.0856111 7.94443 -0.0856111 8.25578 0.256833L14.764 7.33523C15.0787 7.67768 15.0787 8.23142 14.764 8.57022L8.25578 15.6523C7.94108 15.9947 7.43221 15.9947 7.12086 15.6523L6.37764 14.8435C6.05959 14.4974 6.06629 13.9328 6.39103 13.5939L10.4252 9.41176H0.803482C0.358219 9.41176 0 9.02195 0 8.53743V7.37166C0 6.88714 0.358219 6.49734 0.803482 6.49734H10.4252L6.39103 2.31514C6.06294 1.97634 6.05624 1.41167 6.37764 1.06558Z"
                                  fill="black"/>
                        </svg>
                    </div>
				<?php }

				$item->title = ob_get_clean();

			} else {
				// Parent Menu Links
				$item->title = "<span>" . esc_html($item->title) . "</span>";
			}

		}

		$i ++;
	}

	return $items;
}

add_filter('wp_nav_menu_objects', 'startlife_menu_foreach', 10, 2);




