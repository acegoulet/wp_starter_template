<?php 
    
//add new image sizes and override default image sizes to be hard crops
//default image sizes used for 'updates' section
//add_image_size( 'large', 1600, 620, true );
/*
add_image_size( 'large', 1600, 492, true );
add_image_size( 'medium', 640, 320, true );
add_image_size( 'small', 312, 120, true );
add_image_size( 'content_landing_side', 310, 282, true );
add_image_size( 'homepage_carousel', 1028, 592, true );
*/
    
//enable featured image
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
}

/* ---------------------------------------------
Remove in-line height & width attributes on WYSIWYG images (aids in responsiveness on older browsers)
--------------------------------------------- */

add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
function remove_thumbnail_dimensions( $html ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}
add_filter('wp_get_attachment_link', 'remove_img_width_height', 10, 1);
function remove_img_width_height($html) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
}

/* ---------------------------------------------
Get Hero URL
--------------------------------------------- */
function get_featured_image_url($postid, $size){
    if(empty($size)){
        $size = 'large';
    }
    $thumbnail_id = get_post_thumbnail_id($postid);
    $image_url = wp_get_attachment_image_src( $thumbnail_id, $size );
    $image_url = $image_url[0];
    return $image_url;
}

/* ---------------------------------------------
Get Image URL
--------------------------------------------- */
function get_image_url($imageid, $size){
    if(empty($size)){
        $size = 'large';
    }
    $image_url = wp_get_attachment_image_src( $imageid, $size );
    $image_url = $image_url[0];
    return $image_url;
}

/* ---------------------------------------------
Get attachment info by id
--------------------------------------------- */

function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}
    
?>
