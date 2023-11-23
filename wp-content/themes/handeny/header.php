<!DOCTYPE html>
<html>
	<head>
		<?php wp_head() ?>
	</head>
    <body <?php body_class(); ?>>
		<header>
            <div class="flex-nav">         
                <?php
                    if(has_custom_logo()){
                        echo get_custom_logo();
                    }
                ?>
                <?php 
                    wp_nav_menu( [
                        'theme_location'       => 'header-menu',
                        'container'            => false,
                        'menu'                 => true,
                        'menu_class'           => 'navbar-nav',
                        'menu_id'              => false,
                        'echo'                 => true,
                        'before'               => '',
                        'after'                => '',
                        'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    ]); 
                ?>
                <div class="login-register">
                    <span>Login / Register</span>
                </div>
                <?php dynamic_sidebar('Mini cart'); ?>
            </div>
        </header>