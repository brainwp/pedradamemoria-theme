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

// Remove notificações de update do WP para usuários abaixo do Administrador
global $user_login;
get_currentuserinfo();
if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins
add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}

function url_tema($url = '') {
	echo get_stylesheet_directory_uri('template_url').'/'.$url;
}

//Filtra a página index.php que roda o loop principal
function only_category($query) {

if ( $query->is_home() ) {
$query->set('cat', '37');
}
return $query;
}
add_filter('pre_get_posts', 'only_category');

//include new jQuery

function my_scripts_method() {
wp_deregister_script( 'jquery' );
wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'my_scripts_method');


?>