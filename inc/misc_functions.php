<?php 
    
/* ---------------------------------------------
Force Login
--------------------------------------------- */

function my_force_login() {
	global $post;
	if ( ( is_single() || is_front_page() || is_page() ) && !is_page('login') && !is_user_logged_in()){
		auth_redirect();
	}  
}

/* ---------------------------------------------
shorter stylesheet directory function & get template directory function
--------------------------------------------- */
function gsdu() {
	return get_stylesheet_directory_uri();
}
function gtdu() {
	return get_template_directory_uri();
}

/* ---------------------------------------------
Enqueue Styles
--------------------------------------------- */

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', gsdu() . '/style.css', '', '1' );

}

/* ---------------------------------------------
Enqueue Scripts.
--------------------------------------------- */

function theme_scripts_enqueue() {
    global $site_env;
    if($site_env == 'staging'){
        wp_enqueue_script('jquery');
        //wp_enqueue_script('zaccordion', gtdu(). '/js/jquery.zaccordion.js', 'jquery', '1', true);
        //wp_enqueue_script('waypoints', gtdu(). '/js/jquery.waypoints.min.js', '', '1', true);
        wp_enqueue_script('theme-scripts', gtdu(). '/js/scripts.js', 'jquery', '1', true);
    }
    else {
        wp_enqueue_script('jquery');
        wp_enqueue_script('theme-scripts-min', gtdu(). '/js/scripts-min.js', 'jquery', '1', true);
    }
}
add_action( 'wp_enqueue_scripts', 'theme_scripts_enqueue' );

/* ---------------------------------------------
Google Analytics
--------------------------------------------- */

if(!empty($ga_account)){
    function google_analytics(){ 
        global $ga_account;
    ?> 
        <!-- Begin GA Tag -->
        <script type="text/javascript">
    		var _gaq = _gaq || [];
    	
    		_gaq.push(['_setAccount', '<?php echo $ga_account; ?>']);
    		_gaq.push(['_trackPageview']);
    	
    		var gaAddons = gaAddons || [];
    		gaAddons.push( ['_trackOutbound'], ['_trackDownloads'], ['_trackMailto'], ['_trackRealBounce'] );
    	
    		(function() {
    			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    		})();
    	</script>
        <!-- End GA Tag -->
    <?php }
    add_action( 'wp_head', 'google_analytics' );
}

/* ---------------------------------------------
Admin favicon
--------------------------------------------- */

function favicon(){
	echo '<link rel="shortcut icon" href="'. gsdu() .'/img/favicon.ico?v=1" />',"\n";
}
add_action('admin_head','favicon');
add_action('login_head','favicon');

/* ---------------------------------------------
Hide comment interfaces in admin
--------------------------------------------- */

function hide_admin_comments(){
	echo '<style>#wp-admin-bar-comments {display: none !important;}#latest-comments.activity-block {display: none !important;}</style>',"\n";
}
add_action('admin_head','hide_admin_comments');

function hide_page_comments(){
	echo '<script>jQuery("th.column-comments, td.column-comments").html("");</script>',"\n";
}
add_action('admin_footer','hide_page_comments');

/* ---------------------------------------------
Featured Image size note
--------------------------------------------- */

function featured_image_instructions(){
    $output = '';
    $output .= '<script type="text/javascript">';
    
        //$output .= 'jQuery("#postimagediv .inside").append("<p>(1600x620 for Content Landing Pages. 640x320 for press releases and posts.)</p>");';
        
        $output .= 'jQuery("#postimagediv .inside").append("<p>(1600x492 for Content Landing Pages. 640x320 for press releases and posts.)</p>");';
    
    $output .= '</script>';
	echo $output;
}
//add_action('admin_footer','featured_image_instructions');

/* ---------------------------------------------
Reformat default "read more" tag associated with the_excerpt()
--------------------------------------------- */

function replace_excerpt($content) {
	return str_replace('[&hellip;]',' ',$content);
}
add_filter('the_excerpt', 'replace_excerpt');

/* ---------------------------------------------
Change length of excerpt returned with the_excerpt()
--------------------------------------------- */
function custom_excerpt_length( $length ) {
    $length = 10;
	return $length;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

//excerpt length character limit
function get_the_trimmed_excerpt(){
    $excerpt = get_the_content();
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = sanitize_text_field($excerpt);
    if(strlen($excerpt)>=80){
        $excerpt = substr($excerpt, 0, 80);
        $excerpt = substr($excerpt, 0, strripos($excerpt, ' '));
        $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
        $excerpt = $excerpt.'&hellip; ';
    }
    return $excerpt;
}

/* ---------------------------------------------
Return truncated Title
--------------------------------------------- */

//excerpt length character limit
function get_the_trimmed_title(){
    $title = get_the_title();
    $title = clean_string($title);
    if(strlen($title)<=40){
        return $title;
    } else {
        $title = substr($title, 0, 40);
        $title = substr($title, 0, strripos($title, ' '));
        $title = trim(preg_replace( '/\s+/', ' ', $title));
        $title = $title.'&hellip; ';
        return $title;
    }
}

function clean_string($string){
    // Strip HTML Tags
    $string = strip_tags($string);
    // Clean up things like &amp;
    $string = html_entity_decode($string, ENT_QUOTES, 'UTF-8');
    // Strip out any url-encoded stuff
    $string = urldecode($string);
    // Replace non-AlNum characters with space
    $string = preg_replace('/[^A-Za-z0-9]/', ' ', $string);
    // Replace Multiple spaces with single space
    $string = preg_replace('/ +/', ' ', $string);
    // Trim the string of leading/trailing space
    $string = trim($string);
    return $string;
}

/* ---------------------------------------------
Page Slug Body Class
--------------------------------------------- */

function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

/* ------------------------------------------------------

IF USING THE ACIFY PLUGIN, REMOVE THE FOLLOWING FUNCTIONS

------------------------------------------------------ */

//remove admin areas
function remove_menus(){
    global $keystone_app;
//	remove_menu_page( 'index.php' ); //Hide Dashboard
//	remove_menu_page( 'edit.php' ); //Hide Posts
	remove_menu_page( 'link-manager.php' ); //Hide Link Manager
//	remove_menu_page( 'upload.php' ); //Hide Media
//	remove_menu_page( 'edit.php?post_type=page' ); //Hide Pages
    remove_menu_page( 'edit-comments.php' ); //Hide Comments
//	remove_menu_page( 'themes.php' ); //Hide Appearance
//	remove_menu_page( 'plugins.php' ); //Hide Plugins
//	remove_menu_page( 'users.php' ); //Hide Users
//	remove_menu_page( 'tools.php' ); //Hide Tools
//	remove_menu_page( 'options-general.php' ); //Hide Settings
}
add_action( 'admin_menu', 'remove_menus' );

//remove unwanted wordpress <head> tags
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head','feed_links_extra', 3);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link'); //Edit URI Link (xmlrpc)
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );

//remove widget css ouput from header
add_action( 'widgets_init', 'my_remove_recent_comments_style' );
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'  ) );
}

//remove emoji support
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

//disable admin bar on front end
//add_filter('show_admin_bar', '__return_false');

//custom login page styles
function aceify_login_style() { ?>

	<style type="text/css">
		body.login {
			background: #15160e;
		}
		body.login div#login {
    		padding-top: 2%;
		}
		body.login div#login h1 a {
			display: none;
		}
		body.login div#login h1{
			background: url("<?php echo gsdu(); ?>/img/logo-login.jpg") center no-repeat;
			width: 100%;
			height: 291px;
		}
		.login form {
			
		}
	</style>
	
<?php 
}
add_action( 'login_enqueue_scripts', 'aceify_login_style' );

?>