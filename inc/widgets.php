<?php
/**
 * Widget Areas and Custom Widgets
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register widget areas
 */
function cbc_school_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'cbc-school-modern'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here.', 'cbc-school-modern'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 1', 'cbc-school-modern'),
        'id'            => 'footer-1',
        'description'   => __('Footer widget area 1.', 'cbc-school-modern'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 2', 'cbc-school-modern'),
        'id'            => 'footer-2',
        'description'   => __('Footer widget area 2.', 'cbc-school-modern'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 3', 'cbc-school-modern'),
        'id'            => 'footer-3',
        'description'   => __('Footer widget area 3.', 'cbc-school-modern'),
        'before_widget' => '<div class="footer-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3>',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'cbc_school_widgets_init');
