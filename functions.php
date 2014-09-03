<?php

// Redefine o tamanho do Cabeçalho
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyeleven_header_image_width', 338 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyeleven_header_image_height', 363 ) );


// Remove seções desnecessárias do Painel
function example_remove_dashboard_widgets() {
    // Globalize the metaboxes array, this holds all the widgets for wp-admin
  
    global $wp_meta_boxes;
  
    // Remove the incomming links widget
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);   
  
    // Remove right now
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
}
  
// Hoook into the 'wp_dashboard_setup' action to register our function
add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets' );

?>