<?php
/**
 * Helper Functions
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add custom body classes
 */
function cbc_school_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'front-page';
    }
    return $classes;
}
add_filter('body_class', 'cbc_school_body_classes');

/**
 * Get theme version for cache busting
 */
function cbc_school_get_theme_version() {
    $theme = wp_get_theme();
    return $theme->get('Version');
}

/**
 * Get customizer setting with fallback
 */
function cbc_school_get_option($option_name, $default = '') {
    return get_theme_mod($option_name, $default);
}

/**
 * Check if a customizer setting is enabled
 */
function cbc_school_is_enabled($option_name, $default = false) {
    return (bool) get_theme_mod($option_name, $default);
}

/**
 * Get hero carousel images
 */
function cbc_school_get_hero_images() {
    $images = array();
    for ($i = 1; $i <= 5; $i++) {
        $image_id = get_theme_mod("hero_image_$i");
        if ($image_id) {
            $image_url = wp_get_attachment_image_url($image_id, 'full');
            if ($image_url) {
                $images[] = $image_url;
            }
        }
    }
    return $images;
}

/**
 * Get notice board items
 */
function cbc_school_get_notice_items() {
    $notices = array();
    for ($i = 1; $i <= 3; $i++) {
        $title = get_theme_mod("notice_$i" . "_title");
        $content = get_theme_mod("notice_$i" . "_content");
        $date = get_theme_mod("notice_$i" . "_date");
        $url = get_theme_mod("notice_$i" . "_url");
        
        if ($title && $content) {
            $notices[] = array(
                'title' => $title,
                'content' => $content,
                'date' => $date,
                'url' => $url
            );
        }
    }
    return $notices;
}

/**
 * Format notice date
 */
function cbc_school_format_notice_date($date) {
    if (empty($date)) {
        return '';
    }
    
    $timestamp = strtotime($date);
    if ($timestamp) {
        return date('M d', $timestamp);
    }
    
    return $date;
}

/**
 * Truncate text to specified length
 */
function cbc_school_truncate_text($text, $length = 100, $suffix = '...') {
    if (strlen($text) <= $length) {
        return $text;
    }
    
    return substr($text, 0, $length) . $suffix;
}

/**
 * Get reading time estimate
 */
function cbc_school_get_reading_time($content) {
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // Average reading speed: 200 words per minute
    
    if ($reading_time < 1) {
        return '1 min read';
    }
    
    return $reading_time . ' min read';
}

/**
 * Check if we're on a school-related page
 */
function cbc_school_is_school_page() {
    return is_post_type_archive(array('events', 'staff')) || 
           is_singular(array('events', 'staff')) ||
           get_query_var('news_events_page');
}
