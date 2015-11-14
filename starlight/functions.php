<?php
if (!function_exists('web2feel_setup')): /**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */ 
    function web2feel_setup()
    {
        
        /**
         * Make theme available for translation
         * Translations can be filed in the /languages/ directory
         * If you're building a theme based on web2feel, use a find and replace
         * to change 'web2feel' to the name of your theme in all the template files
         */
        load_theme_textdomain('web2feel', get_template_directory() . '/languages');
        
        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support('automatic-feed-links');
        
        /**
         * Enable support for Post Thumbnails on posts and pages
         *
         * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
         */
        add_theme_support('post-thumbnails');
        
        /**
         * This theme uses wp_nav_menu() in one location.
         */
        register_nav_menus(array(
            'primary' => __('Primary Menu', 'web2feel')
        ));
    }
endif; // web2feel_setup
add_action('after_setup_theme', 'web2feel_setup');
 

///////////////CUSTOM QUERIES/////////////////
add_filter('query_vars', 'queryvars' );
function queryvars( $qvars ){
    $qvars[] = 'parameter';  
    return $qvars;
}
 
///////////////CONTENT TYPES/////////////////
include(get_template_directory().'/scripts-styles.php'); 
 
///////////////CONTENT TYPES/////////////////
include(get_template_directory().'/content-types.php'); 

///////////////HELPER FUNCTIONS/////////////////
include(get_template_directory().'/helper-functions.php'); 
 
//////////////////////////AJAX CALLS//////////////////////////
include(get_template_directory().'/ajax/quote-land.php'); 
include(get_template_directory().'/ajax/quote-model.php'); 
include(get_template_directory().'/ajax/quote-facade.php'); 
include(get_template_directory().'/ajax/quote-settings.php'); 
