<?php
add_action( 'wp_enqueue_scripts', 'load_scrip_master' );
function load_script_master() {
    wp_enqueue_script( 'public', get_stylesheet_directory_uri() . '/static/js/public.min.js', array('jquery'), 1, false );

}