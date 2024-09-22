<?php
function sejrdavidsen_files() {
    //kalder scripts, NULL fordi vi ikke afhænger af andet javascript som jquery, version, true fordi filen skal loades før closing body tag
    wp_enqueue_script('sejrdavidsen_js', get_theme_file_uri('/assets/js/script.js'), NULL, '1.0', true);
    wp_enqueue_script('swiper_js', get_theme_file_uri('/assets/js/swiper.js'));

    //function som kalder stylesheet
    wp_enqueue_style('serdavidsen_main_styles', get_theme_file_uri('/assets/css/main_style.css'));

    //henter font - Barlow
    wp_enqueue_style('font', '//fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

    //loader font awsome iconer
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css');

}
//inden header outputtes, kald stylesheet functionen
add_action('wp_enqueue_scripts', 'sejrdavidsen_files');


function custom_editor_dyr_title( $title, $post ) {
    //hvis det er post typen hund der redigeres i skal title på postet ikke være 'add title' men 'navn på dyret'
    if( 'hund' === $post->post_type ) {
        $title = 'Navn på dyret';
    }
    return $title;
}
add_filter( 'enter_title_here', 'custom_editor_dyr_title', 10, 2 );




