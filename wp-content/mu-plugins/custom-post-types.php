<?php
function custom_post_types(){
    //enkelt hund card
    register_post_type('hund', array(
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail', 'editor', 'custom-fields'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'hunde'),
        'labels' => array(
            'name' => 'Hunde',
            'add_new_item' => 'Tilføj Ny Hund',
            'edit_item' => 'Rediger Hund',
            'all_items' => 'Alle Hunde',
            'singular_name' => 'Hund'
        ),
        'menu_icon' => 'dashicons-pets'
    ));

    //blog indlæg
    register_post_type('blog', array(
        'show_in_rest' => true,
        'supports' => array('title', 'autor', 'thumbnail', 'editor', 'custom-fields'),
        'public' => true,
        'has_archive' => true,
        'labels' => array(
            'name' => 'Blog',
            'add_new_item' => 'Tilføj Nyt Opslag',
            'edit_item' => 'Rediger Opslag',
            'all_items' => 'Alle Opslag',
            'singular_name' => 'Blog Opslag'
        ),
        'menu_icon' => 'dashicons-editor-paste-text'
    ));

    //enkelt kat card
    register_post_type('kat', array(
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail', 'editor', 'custom-fields'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'katte'),
        'labels' => array(
            'name' => 'Katte',
            'add_new_item' => 'Tilføj Ny Kat',
            'edit_item' => 'Rediger Kat',
            'all_items' => 'Alle Katte',
            'singular_name' => 'Kat'
        ),
        'menu_icon' => 'dashicons-pets'
    ));

    //træningsevent
    register_post_type('event', array(
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail', 'custom-fields'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'events'),
        'labels' => array(
            'name' => 'Trænings events',
            'add_new_item' => 'Tilføj Nyt Event',
            'edit_item' => 'Rediger Event',
            'all_items' => 'Alle Trænings events',
            'singular_name' => 'Trænings event'
        ),
        'menu_icon' => 'dashicons-awards'
    ));

    
}
add_action('init', 'custom_post_types');
add_theme_support('post-thumbnails');