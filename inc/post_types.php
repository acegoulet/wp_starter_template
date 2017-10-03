<?php

if ( ! function_exists( 'aceify_reg_post_types' ) ) {

    add_action('init', 'aceify_reg_post_types');
    
    function aceify_reg_post_types(){
        $labels = array(
    		'name' => _x('Portfolio Items', 'post type general name'),
    		'singular_name' => _x('Portfolio Item', 'post type singular name'),
    		'add_new' => _x('Add New Portfolio Item', 'bdes'),
    		'add_new_item' => __('Add New Portfolio Item'),
    		'edit_item' => __('Edit Portfolio Item'),
    		'new_item' => __('New Portfolio Item'),
    		'view_item' => __('View Portfolio Item'),
    		'search_items' => __('Search Portfolio Items'),
    		'not_found' =>  __('Nothing found'),
    		'not_found_in_trash' => __('Nothing found in Trash'),
    		'parent_item_colon' => ''
    	);
         
    	$args = array(
    		'labels' => $labels,
    		'label'	=> 'Portfolio Items',
    		'public' => true,
    		'publicly_queryable' => true,
    		'description' => 'Portfolio Item',
    		'show_ui' => true,
    		'query_var' => true,
    		'capability_type' => 'post',
    		'hierarchical' => false,
//     		'menu_position' => $menu_pos,
    		'supports' => array('title','thumbnail','editor','revisions'),
    		'taxonomies' => array()
        ); 
     
        register_post_type( 'portfolio' , $args );          
    }
    
}

?>