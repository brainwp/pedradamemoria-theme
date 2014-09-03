<?php

// Redefine o tamanho do Cabeçalho
define( 'HEADER_IMAGE_WIDTH', apply_filters( 'twentyeleven_header_image_width', 338 ) );
define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'twentyeleven_header_image_height', 363 ) );


// Remove notificações de update do WP para usuários abaixo do Administrador
global $user_login;
get_currentuserinfo();
if (!current_user_can('update_plugins')) { // checks to see if current user can update plugins
add_action( 'init', create_function( '$a', "remove_action( 'init', 'wp_version_check' );" ), 2 );
add_filter( 'pre_option_update_core', create_function( '$a', "return null;" ) );
}

/*
 * Tell WordPress to run twentyeleven_setup() when the 'after_setup_theme' hook is run.
 */
add_action( 'after_setup_theme', 'pedradamemoria_setup' );

if ( ! function_exists( 'pedradamemoria_setup' ) ):

function pedradamemoria_setup() {

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'menu-pedra', __( 'Menu Pedra da Memoria', 'pedradamemoria' ) );
}
endif; // pedradamemoria_setup


//include new jQuery

function my_scripts_method() {
wp_deregister_script('jquery');
wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js');
wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts', 'my_scripts_method');


?>
