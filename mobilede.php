<?php 
/* 
Plugin Name: Mobile.de API
Plugin URI: https://www.imjol.com
Description: Mobile.de API
Version: 1.0
Author: Imjol
Author URI: https://www.imjol.com
*/

// require a file that is inside inc folder of this plugin and the file is called mobilede.php
require_once plugin_dir_path( __FILE__ ) . 'inc/codestar-framework/codestar-framework.php';
require_once plugin_dir_path( __FILE__ ) . 'post-type.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes.php';
require_once plugin_dir_path( __FILE__ ) . 'shortcodes.php';

/// enqueue scripts and styles
function mobilede_scripts() {
    // Enqueue lightslider JS
    // wp_enqueue_script('lightslider', plugin_dir_url( __FILE__ ) . 'assets/js/lightslider', array('jquery'), '1.8.1', true);
    wp_enqueue_script('custom-jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', array(), '1.9.1', true);
    wp_enqueue_script('lightslider', 'https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/js/lightslider.js', array('custom-jquery'), '1.8.1', true);
    wp_enqueue_script( 'mobilede-script', plugin_dir_url( __FILE__ ) . 'assets/js/script.js', array( 'custom-jquery', 'lightslider' ), time(), true );
    wp_enqueue_style( 'lightslider-style', 'https://cdnjs.cloudflare.com/ajax/libs/lightslider/1.1.6/css/lightslider.css', array(), time(), 'all' );
    wp_enqueue_style( 'mobilede-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css', array(), time(), 'all' );
}
add_action( 'wp_enqueue_scripts', 'mobilede_scripts' );  