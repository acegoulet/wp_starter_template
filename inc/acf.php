<?php

global $dev_env;
//remove ACF interfaces in WP Admin
if($dev_env == false) {
    define( 'ACF_LITE', true );
}

//setup options pages
if (function_exists('acf_add_options_sub_page')){
    acf_add_options_sub_page(array(
        'title' => 'Site Options',
        'parent' => 'options-general.php',
        'capability' => 'manage_options'
    ));
}

?>