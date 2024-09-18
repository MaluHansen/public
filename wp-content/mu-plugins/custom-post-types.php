<?php
function custom_post_types(){
    //enkelt hund card
    register_post_type('hund', array(
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail'),
        'public' => true,
        'labels' => array(
            'name' => 'Hunde',
            'add_new_item' => 'Tilføj Ny Hund',
            'edit_item' => 'Rediger Hund',
            'all_items' => 'Alle Hunde',
            'singular_name' => 'Hund'
        ),
        'menu_icon' => 'dashicons-pets'
    ));

    //blogindlæg
    register_post_type('blog-indlæg', array(
        'show_in_rest' => true,
        'supports' => array('title', 'thumbnail'),
        'public' => true,
        'labels' => array(
            'name' => 'Blog Indlæg',
            'add_new_item' => 'Tilføj Nyt Bog Indlæg',
            'edit_item' => 'Rediger Blog Indlæg',
            'all_items' => 'Alle Blog Indlæg',
            'singular_name' => 'Blog Indlæg'
        ),
        'menu_icon' => 'dashicons-editor-paste-text'
    ));
}
add_action('init', 'custom_post_types');