<?php

/**
 * Enqueue scripts and styles
 */
function web2feel_scripts()
{
    
    //jQuery
    wp_enqueue_script('jquery-js', 'https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js');
    
    //fontawesome
    wp_enqueue_style('fontawesome-css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css');
    
    //bootstrap
    // wp_enqueue_style( 'bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css');
    // wp_enqueue_style( 'bootstrap-css-theme', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css');
    // wp_enqueue_script( 'bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js');  
    
    //base
    wp_enqueue_style('web2feel-style', get_stylesheet_uri());
    
    //autosize
    //wp_enqueue_script( 'autosize-js', get_template_directory_uri() . '/js/jquery.autosize.js' );
    
    //slider
    // wp_enqueue_style( 'fractionslider-css', get_template_directory_uri() . '/css/fractionslider.css');
    // wp_enqueue_script( 'fractionslider-js', get_template_directory_uri() . '/js/jquery.fractionslider.min.js' );
    
    //masonry 
    wp_enqueue_script('imagesloaded-js', get_template_directory_uri() . '/js/jquery.imagesloaded.min.js');
    wp_enqueue_script('masonry-js', get_template_directory_uri() . '/js/jquery.masonry.js');
    
    //parallax
    wp_enqueue_script('parallax-js', get_template_directory_uri() . '/js/jquery.parallax.min.js');
    
    //mmenu
    wp_enqueue_style('jquery.mmenu.all-css', get_template_directory_uri() . '/css/jquery.mmenu.all.css');
    wp_enqueue_script('jquery.mmenu.min.all-js', get_template_directory_uri() . '/js/jquery.mmenu.min.all.js');
    
    //flexslider
    wp_enqueue_style('jquery.flexslider-css', get_template_directory_uri() . '/css/jquery.flexslider.css');
    wp_enqueue_script('jquery.flexslider-js', get_template_directory_uri() . '/js/jquery.flexslider.js');
    
    //jquery cookie
    wp_enqueue_script('jquery.cookie.js', get_template_directory_uri() . '/js/jquery.cookie.js');
    
    //elevate zoom
    wp_enqueue_script('jquery.elevate-zoom.js', get_template_directory_uri() . '/js/jquery.elevate-zoom.js');

    

    //core styles
    wp_enqueue_style('reset-css', get_template_directory_uri() . '/css/reset.css');
    wp_enqueue_style('imports-css', get_template_directory_uri() . '/css/imports.css');
    wp_enqueue_style('style-css', get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style('media-css', get_template_directory_uri() . '/css/media.css');
    
    //spinner css
    wp_enqueue_style('spinner-css', get_template_directory_uri() . '/css/spinner.css');
    
    //core scripts
    wp_enqueue_script('scripts', get_template_directory_uri() . '/js/scripts.js');
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
    
    if (is_singular() && wp_attachment_is_image()) {
        wp_enqueue_script('web2feel-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array(
            'jquery'
        ), '20120202');
    }
}
add_action('wp_enqueue_scripts', 'web2feel_scripts');


?>