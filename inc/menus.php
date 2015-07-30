<?php

//add menu support
add_theme_support( 'menus' );

add_action('init','reg_smf_menus');
function reg_smf_menus() {
	register_nav_menus(
		array(
			'main-nav'		=> __('Main Navigation'),
			'footer-nav'	=> __('Footer Navigation')
		)
	);
}

?>