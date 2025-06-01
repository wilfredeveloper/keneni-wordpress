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
require_once CBC_SCHOOL_THEME_DIR . '/inc/customizer-about.php';
require_once CBC_SCHOOL_THEME_DIR . '/inc/custom-post-types.php';
require_once CBC_SCHOOL_THEME_DIR . '/inc/widgets.php';
require_once CBC_SCHOOL_THEME_DIR . '/inc/helpers.php';

// Add theme support for various WordPress features
function keneni_academy_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');

    // Let WordPress manage the document title
    add_theme_support('title-tag');

    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'keneni-academy'),
        'footer' => esc_html__('Footer Menu', 'keneni-academy'),
    ));

    // Switch default core markup to output valid HTML5
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));

    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');

    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));
}
add_action('after_setup_theme', 'keneni_academy_setup');

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

    wp_enqueue_script(
        'cbc-school-staff-filter',
        CBC_SCHOOL_THEME_URI . '/assets/js/components/staff-filter.js',
        array('jquery', 'cbc-school-main'),
        $theme_version,
        true
    );

    wp_enqueue_script(
        'cbc-school-gallery-filter',
        CBC_SCHOOL_THEME_URI . '/assets/js/components/gallery-filter.js',
        array('jquery', 'cbc-school-main'),
        $theme_version,
        true
    );

    // Enqueue admissions page specific styles and scripts
    if (is_page_template('page-admissions.php')) {
        wp_enqueue_style(
            'cbc-school-admissions',
            CBC_SCHOOL_THEME_URI . '/assets/css/admissions.css',
            array('cbc-school-style'),
            $theme_version
        );

        wp_enqueue_script(
            'cbc-school-admissions',
            CBC_SCHOOL_THEME_URI . '/assets/js/admissions.js',
            array('jquery'),
            $theme_version,
            true
        );
    }

    // Get PDF URLs for admissions downloads
    $checklist_pdf_id = get_theme_mod('admissions_checklist_pdf');
    $calendar_pdf_id = get_theme_mod('admissions_calendar_pdf');

    $checklist_pdf_url = $checklist_pdf_id ? wp_get_attachment_url($checklist_pdf_id) : '';
    $calendar_pdf_url = $calendar_pdf_id ? wp_get_attachment_url($calendar_pdf_id) : '';

    // Localize script for AJAX and other dynamic data
    wp_localize_script('cbc-school-main', 'cbcSchoolData', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('cbc_school_nonce'),
        'themeUri' => CBC_SCHOOL_THEME_URI,
        'isRTL' => is_rtl(),
        'admissions' => array(
            'checklistPdfUrl' => $checklist_pdf_url,
            'calendarPdfUrl' => $calendar_pdf_url,
        ),
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

/**
 * Manual trigger to create About page (for debugging)
 * Add ?create_about_page=1 to any admin URL to trigger page creation
 */
function cbc_school_manual_page_creation() {
    if (isset($_GET['create_about_page']) && $_GET['create_about_page'] == '1' && current_user_can('manage_options')) {
        // Include admin functions if not already loaded
        if (!function_exists('cbc_school_create_default_pages')) {
            require_once CBC_SCHOOL_THEME_DIR . '/inc/admin.php';
        }

        cbc_school_create_default_pages();

        // Show success message
        add_action('admin_notices', function() {
            echo '<div class="notice notice-success is-dismissible">';
            echo '<p>About page creation triggered! Check the <a href="' . admin_url('admin.php?page=cbc-school-setup') . '">Theme Setup page</a> for status.</p>';
            echo '</div>';
        });
    }
}
add_action('admin_init', 'cbc_school_manual_page_creation');
