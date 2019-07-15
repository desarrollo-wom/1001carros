<?php

function add_styles(){
    
    wp_enqueue_style('normalize', get_stylesheet_directory_uri().'/css/normalize.css');
    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri().'/css/bootstrap/dist/css/bootstrap.css');
    wp_enqueue_style('slick', get_stylesheet_directory_uri().'/slick/slick.css');
    wp_enqueue_style('fileinput', get_stylesheet_directory_uri().'/css/fileinput.min.css');
    wp_enqueue_style('boslider', get_stylesheet_directory_uri().'/css/bootstrap-slider.css');
    wp_enqueue_style('hightligh', get_stylesheet_directory_uri().'/css/highlightjs-github-theme.css');
    wp_enqueue_style('slicktheme', get_stylesheet_directory_uri().'/slick/slick-theme.css');
    wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.8.2/css/all.css');
    wp_enqueue_style('jivosite', get_stylesheet_directory_uri().'/jivosite/jivosite.css');
    
    wp_enqueue_style('style', get_stylesheet_uri());
    
}

function add_scripts(){
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap', get_theme_file_uri('/css/bootstrap/dist/js/bootstrap.js'),array('jquery'),'4.1.3',true);
    wp_enqueue_script('jivosite', get_theme_file_uri('/jivosite/jivosite.js'),array('jquery'),'4.1.3',true);
    wp_enqueue_script('vuejs','https://cdn.jsdelivr.net/npm/vue/dist/vue.js',array('jquery'),'4.1.3',true);
}


add_action('wp_enqueue_scripts', 'add_styles');
add_action('wp_enqueue_scripts', 'add_scripts');

//menu
register_nav_menus(array(
    'menu_principal'=>__('Menu Principal','theme1001carros')
));
