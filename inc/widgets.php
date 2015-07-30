<?php
function sidebar_widgets_init() {

	register_sidebar( array(
		'name'          => 'Post Sidebar',
		'id'            => 'post_sidebar',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<!--',
        'after_title'   => '-->',
	) );

}
add_action( 'widgets_init', 'sidebar_widgets_init' );
?>