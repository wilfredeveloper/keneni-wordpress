<?php
/**
 * CBC School Modern Theme Functions
 *
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Define theme constants
define('CBC_SCHOOL_VERSION', '1.0.0');
define('CBC_SCHOOL_THEME_DIR', get_template_directory());
define('CBC_SCHOOL_THEME_URI', get_template_directory_uri());

// Include theme files
require_once CBC_SCHOOL_THEME_DIR . '/inc/admin.php';
require_once CBC_SCHOOL_THEME_DIR . '/inc/customizer.php';
require_once CBC_SCHOOL_THEME_DIR . '/inc/custom-post-types.php';
require_once CBC_SCHOOL_THEME_DIR . '/inc/widgets.php';
require_once CBC_SCHOOL_THEME_DIR . '/inc/helpers.php';

/**
 * Enqueue styles and scripts
 */
function cbc_school_scripts() {
    $theme_version = cbc_school_get_theme_version();

    // Enqueue main stylesheet (required in root for WordPress)
    wp_enqueue_style('cbc-school-style', get_stylesheet_uri(), array(), $theme_version);

    // Enqueue Google Fonts
    wp_enqueue_style(
        'cbc-school-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap',
        array(),
        null
    );

    // Enqueue main JavaScript
    wp_enqueue_script(
        'cbc-school-main',
        CBC_SCHOOL_THEME_URI . '/assets/js/main.js',
        array('jquery'),
        $theme_version,
        true
    );

    // Enqueue component scripts
    wp_enqueue_script(
        'cbc-school-carousel',
        CBC_SCHOOL_THEME_URI . '/assets/js/components/carousel.js',
        array('jquery', 'cbc-school-main'),
        $theme_version,
        true
    );

    wp_enqueue_script(
        'cbc-school-mobile-menu',
        CBC_SCHOOL_THEME_URI . '/assets/js/components/mobile-menu.js',
        array('jquery', 'cbc-school-main'),
        $theme_version,
        true
    );

    wp_enqueue_script(
        'cbc-school-notice-board',
        CBC_SCHOOL_THEME_URI . '/assets/js/components/notice-board.js',
        array('jquery', 'cbc-school-main'),
        $theme_version,
        true
    );

    // Localize script for AJAX and other dynamic data
    wp_localize_script('cbc-school-main', 'cbcSchoolData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('cbc_school_nonce'),
        'themeUri' => CBC_SCHOOL_THEME_URI,
        'isRTL' => is_rtl(),
        'strings' => array(
            'loading' => __('Loading...', 'cbc-school-modern'),
            'error' => __('An error occurred. Please try again.', 'cbc-school-modern'),
            'success' => __('Success!', 'cbc-school-modern'),
        )
    ));

    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cbc_school_scripts');

/**
 * Theme initialization complete
 * All other functionality is loaded from include files
 */
