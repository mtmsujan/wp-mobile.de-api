<?php 

// a custom post type to add cars
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'cars',
        array(
        'labels' => array(
            'name' => __( 'Cars' ),
            'singular_name' => __( 'Car' )
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'cars'),
        'supports' => array('title', 'editor', 'thumbnail'),
        )
    );

    // flush rewrite rules 
    flush_rewrite_rules();
}


// add a php file for single car page for cars post type 
add_filter( 'template_include', 'include_template_function', 1 );

function include_template_function( $template_path ) {
    if ( get_post_type() == 'cars' ) {
        if ( is_single() ) {
            // checks if the file exists in the theme first,
            // otherwise serve the file from the plugin
            if ( $theme_file = locate_template( array ( 'single-cars.php' ) ) ) {
                $template_path = $theme_file;
            } else {
                $template_path = plugin_dir_path( __FILE__ ) . '/single-cars.php';
            }
        }
    }
    return $template_path;
}