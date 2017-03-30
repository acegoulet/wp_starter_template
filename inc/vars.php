<?php 
    
    function get_site_env(){
        $env_domain = $_SERVER['SERVER_NAME'];
        $site_env = 'production';
        if(strrpos($env_domain , 'staging.wpengine') !== false){
            $site_env = 'staging';
        }
        else if(strrpos($env_domain , 'localhost') !== false){
            $site_env = 'dev';
        }
        else if(strrpos($env_domain , '192.168') !== false){
            $site_env = 'dev';
        }
        
        if(isset($_GET['prod_env']) && sanitize_text_field($_GET['prod_env']) == true){
            $site_env = 'production';
        }
        if(isset($_GET['stag_env']) && sanitize_text_field($_GET['stag_env']) == true){
            $site_env = 'staging';
        }
        if(isset($_GET['dev_env']) && sanitize_text_field($_GET['dev_env']) == true){
            $site_env = 'dev';
        }
        return $site_env;
    }
    
    //GA
    $ga_account = '';
    
?>