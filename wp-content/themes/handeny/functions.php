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
