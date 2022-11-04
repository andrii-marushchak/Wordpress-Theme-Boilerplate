<!-- Desktop menu -->
<?php $args = array(
	'theme_location'  => 'main-menu',
	'menu'            => '',
	'container'       => 'div',
	'container_class' => 'desktop-nav main-nav-wrapper menu-main-menu-container',
	'container_id'    => '',
	'menu_class'      => 'menu',
	'menu_id'         => '',
	'echo'            => true,
	'before'          => '',
	'after'           => '',
	'link_before'     => '',
	'link_after'      => '',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'walker'          => '',
);

wp_nav_menu( $args ); ?>