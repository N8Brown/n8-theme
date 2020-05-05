<?php

function theme_files(){
    wp_enqueue_script('theme-main-javascript', get_theme_file_uri('/js/scripts-bundled.js'), NULL, microtime(), true);
    wp_enqueue_style('theme-main-styles', get_stylesheet_uri(), NULL, microtime());
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Open+Sans|Rock+Salt|Saira+Extra+Condensed');
}

function theme_features(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menu('main-menu', 'Main Menu');
    register_nav_menu('mobile-menu', 'Mobile Menu');
    register_nav_menu('blog-menu', 'Blog Menu');
    register_nav_menu('portfolio-menu', 'Portfolio Menu');
}

function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

function theme_post_types(){
    register_post_type('portfolio', array(
        'has_archive' => true,
        'public' => true,
        'menu_icon' => 'dashicons-portfolio',
        'labels' => array(
            'name' => 'Portfolio',
            'add_new_item' => 'Add New Project',
            'edit_item' => 'Edit Project',
            'all_items' => 'All Projects',
            'singular_name' => 'Project'
        ),
        // 'rewrite' => array( 
        //     'slug' => 'my-portfolio'
        // ),
        'supports' => array(
            'title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'
        ),
        'taxonomies' => array(
            'category', 
            'post_tag'
        ),
    ));

}

function themeprefix_show_cpt_archives( $query ) {
    if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
    $query->set( 'post_type', array(
    'post', 'nav_menu_item', 'portfolio'
    ));
    return $query;
    }
}


if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Contact Form',
    'before_widget' => '<div class = "widgetizedArea">',
    'after_widget' => '</div>',
    'before_title' => '<h3>',
    'after_title' => '</h3>',
  )
);



add_action('wp_enqueue_scripts', 'theme_files');
add_action('after_setup_theme', 'theme_features');
add_action('get_header', 'remove_admin_login_header');
add_action('init', 'theme_post_types');
add_filter( 'pre_get_posts', 'themeprefix_show_cpt_archives' );

?>