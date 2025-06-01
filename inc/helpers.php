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
 * Get contact page meta field with fallback
 */
function cbc_school_get_contact_meta($field_name, $default = '') {
    $contact_page = get_page_by_path('contact');
    if (!$contact_page) {
        return $default;
    }

    $value = get_post_meta($contact_page->ID, $field_name, true);
    return !empty($value) ? $value : $default;
}

/**
 * Get contact FAQ items
 */
function cbc_school_get_contact_faqs() {
    $contact_page = get_page_by_path('contact');
    if (!$contact_page) {
        return array();
    }

    $faqs = array();
    $default_faqs = array(
        1 => array(
            'question' => 'What are the best hours to call?',
            'answer' => 'Our office staff is available to take calls from 8:00 AM to 4:30 PM on weekdays. For urgent matters outside these hours, please email us.'
        ),
        2 => array(
            'question' => 'How quickly will I receive a response?',
            'answer' => 'We aim to respond to all inquiries within 24-48 hours during business days. For urgent matters, please call our main office.'
        ),
        3 => array(
            'question' => 'Can I schedule a campus tour?',
            'answer' => 'Yes, campus tours are available by appointment. Please contact our admissions office to schedule a tour.'
        ),
        4 => array(
            'question' => 'Who should I contact for specific departments?',
            'answer' => 'For specific inquiries, please use the subject dropdown in our contact form to ensure your message reaches the right department.'
        )
    );

    for ($i = 1; $i <= 4; $i++) {
        $question = get_post_meta($contact_page->ID, "contact_faq_{$i}_question", true);
        $answer = get_post_meta($contact_page->ID, "contact_faq_{$i}_answer", true);

        // Use defaults if empty
        if (empty($question)) {
            $question = $default_faqs[$i]['question'];
        }
        if (empty($answer)) {
            $answer = $default_faqs[$i]['answer'];
        }

        if (!empty($question) && !empty($answer)) {
            $faqs[] = array(
                'question' => $question,
                'answer' => $answer
            );
        }
    }

    return $faqs;
}

/**
 * Check if we're on a school-related page
 */
function cbc_school_is_school_page() {
    return is_post_type_archive(array('events', 'staff')) ||
           is_singular(array('events', 'staff')) ||
           get_query_var('news_events_page');
}
