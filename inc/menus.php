<?php

//add menu support
add_theme_support( 'menus' );

add_action('init','reg_aceify_menus');
function reg_aceify_menus() {
	register_nav_menus(
		array(
			'main-nav'		=> __('Main Navigation'),
			'footer-nav'	=> __('Footer Navigation')
		)
	);
}

?>