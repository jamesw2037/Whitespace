<?php
/*START CUSTOM FUNCTIONS*/


/* START THEME FUNCTIONS 
|-------------------------------------------------------
| Declare ACF Options page
|-------------------------------------------------------
|*/

if( function_exists('acf_add_options_page') ) {
    acf_add_options_page('General Content'); 
}


/*
|-------------------------------------------------------
| Clean up the WordPress head
|-------------------------------------------------------
|*/

add_action('init', 'tjnz_head_cleanup');
function tjnz_head_cleanup() {
    remove_action( 'wp_head', 'feed_links_extra', 3 );                      
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );			
    remove_action( 'wp_head', 'feed_links', 2 );                            
    remove_action( 'wp_head', 'rsd_link' );                                 
    remove_action( 'wp_head', 'wlwmanifest_link' );                        
    remove_action( 'wp_head', 'index_rel_link' );                           
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );              
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );               
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );   
    remove_action( 'wp_head', 'wp_generator' );                             
    if (!is_admin()) {
        wp_deregister_script('jquery');                                     
        wp_register_script('jquery', '', '', '', true);                     
    }
}

add_filter('the_generator', 'tjnz_rss_version');
function tjnz_rss_version() { return ''; }


/*
|-------------------------------------------------------
| Remove theme editor
|-------------------------------------------------------
|*/

function remove_editor_menu() {
  remove_action('admin_menu', '_add_themes_utility_last', 101);
}
add_action('_admin_menu', 'remove_editor_menu', 1);


/*
|-------------------------------------------------------
| Default Theme Functions
|-------------------------------------------------------
*/

add_action( 'after_setup_theme', 'wordpresstheme_setup' );
function wordpresstheme_setup(){
    load_theme_textdomain( 'wordpresstheme', get_template_directory() . '/languages' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'post-thumbnails' );
    global $content_width;
    if ( ! isset( $content_width ) ) $content_width = 640;
    register_nav_menus(
        array( 
            'main-menu'  => __( 'Main Menu', 'whitespace' ),
            'admin-menu' => __( 'Admin Menu', 'whitespace')
        )
    );
}

add_action( 'wp_enqueue_scripts', 'wordpresstheme_load_scripts' );

function wordpresstheme_load_scripts(){
    wp_enqueue_script( 'jquery' );
}

add_action( 'comment_form_before', 'wordpresstheme_enqueue_comment_reply_script' );

function wordpresstheme_enqueue_comment_reply_script(){
    if ( get_option( 'thread_comments' ) ) { wp_enqueue_script( 'comment-reply' ); }
}

add_filter( 'the_title', 'wordpresstheme_title' );

function wordpresstheme_title( $title ) {
    if ( $title == '' ) {
        return '&rarr;';
    } else {
        return $title;
    }
}

add_filter( 'wp_title', 'wordpresstheme_filter_wp_title' );

function wordpresstheme_filter_wp_title( $title ){
    return $title . esc_attr( get_bloginfo( 'name' ) );
}