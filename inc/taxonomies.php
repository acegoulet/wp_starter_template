<?php
if ( ! function_exists( 'smf_reg_custom_tax' ) ) {

    //add_action('init', 'smf_reg_custom_tax');
    
    function smf_reg_custom_tax() {
        register_taxonomy(
            'press_type',
            array('post'),
            array(
        		'label'				=> 'Press Type',
        		'labels'			=> array(
        			'name'				=> 'Press Types',
        			'singular_name'		=> 'Press Type',
        			'search_items'		=> 'Search Press Types',
        			'popular_items'		=> 'Popular Press Types',
        			'all_items'			=> 'All Press Types',
        			'parent_item'		=> 'Parent Press Types',
        			'parent_item_colon'	=> 'Parent Press Types:',
        			'edit_item'			=> 'Edit Press Type',
        			'update_item'		=> 'Update Press Type',
        			'add_new_item'		=> 'Add New Press Type',
        			'new_item_name'		=> 'New Press Type Name',
        			'menu_name'			=> 'Press Types'
        		),
        		'public'			=> true,
        		'hierarchical'		=> true,
        		'rewrite'			=> array('slug'=>'press_type')
            )
        );
    }
}

?>