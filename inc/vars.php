<?php 
    
    $dev_env = false;
    $env_domain = $_SERVER['SERVER_NAME'];
    if(strrpos($env_domain , 'staging.wpengine') !== false){
        $site_env = 'staging';
    }
    else if(strrpos($env_domain , 'localhost') !== false){
        $site_env = 'staging';
        $dev_env = true;
    }
    else if(strrpos($env_domain , '192.168') !== false){
        $site_env = 'staging';
    }
    else {
        $site_env = 'production';
    }
    
    //GA
    $ga_account = '';
    
?>