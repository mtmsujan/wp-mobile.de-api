<?php 
/* 
Plugin Name: Mobile.de API
Plugin URI: http://www.mobile.de
Description: Mobile.de API
Version: 1.0
Author: Md Toriqul Mowla
Author URI: http://fiverr.com/developer_sujan
*/

// require a file that is inside inc folder of this plugin and the file is called mobilede.php
require_once plugin_dir_path( __FILE__ ) . 'inc/codestar-framework/codestar-framework.php';
require_once plugin_dir_path( __FILE__ ) . 'post-type.php';
require_once plugin_dir_path( __FILE__ ) . 'metaboxes.php';
require_once plugin_dir_path( __FILE__ ) . 'shortcodes.php';

/// enqueue scripts and styles
function mobilede_scripts() {
    // Enqueue Slick Slider CSS
    wp_enqueue_style('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    // Enqueue Slick Slider JS
    wp_enqueue_script('slick', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true);
    wp_enqueue_style( 'mobilede-style', plugin_dir_url( __FILE__ ) . 'assets/css/style.css', array(), time(), 'all' );
    wp_enqueue_script( 'mobilede-script', plugin_dir_url( __FILE__ ) . 'assets/js/script.js', array( 'jquery', 'slick' ), time(), true );
}
add_action( 'wp_enqueue_scripts', 'mobilede_scripts' );