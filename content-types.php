<?php

function create_post_type()
{
    register_post_type('slides', array(
        'labels' => array(
            'name' => __('Slides'),
            'singular_name' => __('Slide')
        ),
        'public' => true,
        'has_archive' => false,
        'has_single' => false,
        'exclude_from_search' => true,
        'menu_icon' => 'dashicons-slides',
        'supports' => array(
            'title',
            'thumbnail'
        )
    ));
    register_post_type('land-plot', array(
        'labels' => array(
            'name' => __('Land Plots'),
            'singular_name' => __('Land Plot')
        ),
        'public' => true,
        'has_archive' => false,
        'has_single' => false,
        'exclude_from_search' => true,
        'menu_icon' => 'dashicons-slides',
        'supports' => array(
            'title',
            'thumbnail',
            'excerpt'
        )
    ));
    // register_post_type('projects', array(
    //     'labels' => array(
    //         'name' => __('Projects'),
    //         'singular_name' => __('Project')
    //     ),
    //     'public' => true,
    //     'has_archive' => true,
    //     'has_single' => true,
    //     'exclude_from_search' => false,
    //     'menu_icon' => 'dashicons-slides',
    //     'supports' => array(
    //         'title',
    //         'thumbnail',
    //         'excerpt',
    //         'editor'
    //     )
    // ));
    register_post_type('model', array(
        'labels' => array(
            'name' => __('Models'),
            'singular_name' => __('Model')
        ),
        'public' => true,
        'has_archive' => true,
        'has_single' => true,
        'exclude_from_search' => false,
        'menu_icon' => 'dashicons-slides',
        'supports' => array(
            'title',
        )
    ));
    
    // might not need those here
    // register_post_type('land-types', array(
    //     'labels' => array(
    //         'name' => __('Land Types'),
    //         'singular_name' => __('Land Type')
    //     ),
    //     'public' => true,
    //     'has_archive' => false,
    //     'has_single' => false,
    //     'exclude_from_search' => true,
    //     'menu_icon' => 'dashicons-slides',
    //     'supports' => array(
    //         'title',
    //         'thumbnail'
    //     )
    // ));
    
    
    register_post_type('facades', array(
        'labels' => array(
            'name' => __('Facades'),
            'singular_name' => __('Facade')
        ),
        'public' => true,
        'has_archive' => false,
        'has_single' => false,
        'exclude_from_search' => true,
        'menu_icon' => 'dashicons-slides',
        'supports' => array(
            'title',
            'thumbnail'
        )
    ));
    
    
    
    flush_rewrite_rules();
}
add_action('init', 'create_post_type');

?>