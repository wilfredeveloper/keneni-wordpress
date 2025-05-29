<?php
/**
 * Custom Post Types
 *
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register custom post types for school content
 */
function cbc_school_custom_post_types() {
    // Events post type
    register_post_type('events', array(
        'labels' => array(
            'name' => __('Events', 'cbc-school-modern'),
            'singular_name' => __('Event', 'cbc-school-modern'),
            'add_new' => __('Add New Event', 'cbc-school-modern'),
            'add_new_item' => __('Add New Event', 'cbc-school-modern'),
            'edit_item' => __('Edit Event', 'cbc-school-modern'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        'menu_icon' => 'dashicons-calendar-alt',
        'rewrite' => array('slug' => 'events'),
    ));

    // Staff post type
    register_post_type('staff', array(
        'labels' => array(
            'name' => __('Staff', 'cbc-school-modern'),
            'singular_name' => __('Staff Member', 'cbc-school-modern'),
            'add_new' => __('Add New Staff Member', 'cbc-school-modern'),
            'add_new_item' => __('Add New Staff Member', 'cbc-school-modern'),
            'edit_item' => __('Edit Staff Member', 'cbc-school-modern'),
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title', 'editor', 'thumbnail'),
        'menu_icon' => 'dashicons-groups',
        'rewrite' => array('slug' => 'staff'),
    ));
}
add_action('init', 'cbc_school_custom_post_types');

/**
 * Add custom rewrite rules for News & Events page
 */
function cbc_school_add_rewrite_rules() {
    add_rewrite_rule('^news-events/?$', 'index.php?news_events_page=1', 'top');
}
add_action('init', 'cbc_school_add_rewrite_rules');

/**
 * Add custom query vars
 */
function cbc_school_query_vars($vars) {
    $vars[] = 'news_events_page';
    return $vars;
}
add_filter('query_vars', 'cbc_school_query_vars');

/**
 * Template redirect for News & Events page
 */
function cbc_school_template_redirect() {
    if (get_query_var('news_events_page')) {
        include(CBC_SCHOOL_THEME_DIR . '/page-templates/page-news-events.php');
        exit;
    }
}
add_action('template_redirect', 'cbc_school_template_redirect');

/**
 * Flush rewrite rules on theme activation
 */
function cbc_school_flush_rewrite_rules() {
    cbc_school_add_rewrite_rules();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'cbc_school_flush_rewrite_rules');
