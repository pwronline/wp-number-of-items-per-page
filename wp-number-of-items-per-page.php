<?php
/*
Plugin Name: WP Number of Items per page
Plugin URI: https://wordpress.org/plugins/wp-number-of-items-per-page/ 
Description: WP Number Of Items Per Page is a simple, handy and practical plugin that shows paginate ordering of an amount of elements to be filtered.
This features just work under wordpress administrator, compatible with "custom posts" and "woocomerce".
Version: 1.0.0
License: GPL2
Author: Xabier Miranda
Author URI: http://xabiermiranda.com
Text Domain: WP Number of items per page
*/

defined('XM_WPNOIPP_PATH') or define('XM_WPNOIPP_PATH', plugin_dir_path( __FILE__ ));
defined('XM_WPNOIPP_URL') or define('XM_WPNOIPP_URL', plugin_dir_url( __FILE__ ));

class XM_WPNOIPP {

    public $name = 'WP Number of items per page';
    public $shortname = 'XM_WPNOIPP';
    public $slug = 'xm-wpnoipp';
    public $version = "1.0.0";
    public $plugin_path;
    public $plugin_url;

    /*Construct*/
    public function __construct(){
        add_action( 'admin_enqueue_scripts', array($this , 'loadJS' ));
    }
    
    
    /*Load JS*/
    public function loadJS($hook) {
        if (is_admin() && $hook == "edit.php") {
            wp_enqueue_script('jquery');
            wp_enqueue_script( 'wpnoipp', plugins_url( '/js/wpnoipp.js', __FILE__ ), array('jquery'), '1.0', true );
            
            $texto = __( 'Number of items per page:');
            wp_localize_script( 'wpnoipp', 'options', array(
            'texto' => $texto
            ));
        }
    }
    
    
}//End XM_WPNOIPP

$xm_wpnoipp = new XM_WPNOIPP();