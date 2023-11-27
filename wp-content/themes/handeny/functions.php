<?php

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if( !function_exists( 'handany_custom_logo_setup' ) ){
    function handany_custom_logo_setup() {
        $defaults = array(
            'height'               => 100,
            'width'                => 400,
            'flex-height'          => true,
            'flex-width'           => true,
            'header-text'          => array( 'site-title', 'site-description' ),
            'unlink-homepage-logo' => true, 
        );
        add_theme_support( 'custom-logo', $defaults );
        add_theme_support( 'title-tag' );
        add_theme_support( 'widgets' );
    }
    add_action( 'after_setup_theme', 'handany_custom_logo_setup' );
}

// Connecting scripts and styles
function handany_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri(), array(), _S_VERSION );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', array(), _S_VERSION );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array(), _S_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'handany_scripts' );

function register_handany_menus() {
    $locations = array(
        'header-menu' => __( 'Header Menu' )
    );
    
    register_nav_menus($locations);
}
add_action( 'init', 'register_handany_menus' );

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}

function true_register_wp_sidebars() {
	register_sidebar(
		array(
			'id' => 'true_foot',
			'name' => 'Footer',
			'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
    register_sidebar(
		array(
			'id' => 'mini-cart',
			'name' => 'Mini cart',
			'before_widget' => '<div id="%1$s" class="foot widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>'
		)
	);
}
add_action( 'widgets_init', 'true_register_wp_sidebars' );

// To change add to cart text on product
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text() {
    return __( '', 'woocommerce' ); 
}