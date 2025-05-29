<?php
/**
 * About Page Additional Customizer Settings
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add additional customizer settings for About page
 */
function cbc_school_about_customize_register($wp_customize) {
    
    // Achievements Section
    $wp_customize->add_setting('about_achievements_title', array(
        'default' => 'Our Achievements',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_achievements_title', array(
        'label' => __('Achievements Section Title', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    // Achievement Items
    $achievement_defaults = array(
        1 => array('title' => 'Top Performer', 'description' => 'Ranked among top 10 schools in the county for CBC implementation'),
        2 => array('title' => 'Academic Excellence', 'description' => '95% of students score above average in national assessments'),
        3 => array('title' => 'Innovation Award', 'description' => 'Recognized for innovative teaching methods and technology integration')
    );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("about_achievement_{$i}_title", array(
            'default' => $achievement_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("about_achievement_{$i}_title", array(
            'label' => sprintf(__('Achievement %d Title', 'cbc-school-modern'), $i),
            'section' => 'about_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("about_achievement_{$i}_description", array(
            'default' => $achievement_defaults[$i]['description'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("about_achievement_{$i}_description", array(
            'label' => sprintf(__('Achievement %d Description', 'cbc-school-modern'), $i),
            'section' => 'about_page_section',
            'type' => 'text',
        ));
    }

    // Facilities Section
    $wp_customize->add_setting('about_facilities_title', array(
        'default' => 'World-Class Facilities',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_facilities_title', array(
        'label' => __('Facilities Section Title', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_facilities_subtitle', array(
        'default' => 'State-of-the-art infrastructure designed to enhance learning and development',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_facilities_subtitle', array(
        'label' => __('Facilities Section Subtitle', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    // Facility Items
    $facility_defaults = array(
        1 => array('title' => 'Modern Classrooms', 'description' => 'Spacious, well-ventilated classrooms equipped with smart boards and modern learning aids.'),
        2 => array('title' => 'Science Laboratory', 'description' => 'Fully equipped science lab for hands-on experiments and practical learning.'),
        3 => array('title' => 'Computer Lab', 'description' => 'Modern computer laboratory with high-speed internet for digital literacy.'),
        4 => array('title' => 'Library', 'description' => 'Well-stocked library with books, digital resources, and quiet study areas.'),
        5 => array('title' => 'Sports Facilities', 'description' => 'Playground, sports field, and indoor games area for physical development.'),
        6 => array('title' => 'Dining Hall', 'description' => 'Clean, spacious dining area serving nutritious meals for students.')
    );

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("about_facility_{$i}_title", array(
            'default' => $facility_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("about_facility_{$i}_title", array(
            'label' => sprintf(__('Facility %d Title', 'cbc-school-modern'), $i),
            'section' => 'about_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("about_facility_{$i}_description", array(
            'default' => $facility_defaults[$i]['description'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("about_facility_{$i}_description", array(
            'label' => sprintf(__('Facility %d Description', 'cbc-school-modern'), $i),
            'section' => 'about_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("about_facility_{$i}_image", array(
            'sanitize_callback' => 'absint',
        ));

        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "about_facility_{$i}_image", array(
            'label' => sprintf(__('Facility %d Image', 'cbc-school-modern'), $i),
            'section' => 'about_page_section',
            'mime_type' => 'image',
        )));
    }

    // Facilities CTA
    $wp_customize->add_setting('about_facilities_cta_title', array(
        'default' => 'Experience Our Facilities',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_facilities_cta_title', array(
        'label' => __('Facilities CTA Title', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_facilities_cta_description', array(
        'default' => 'Schedule a visit to see our world-class facilities and learning environment firsthand.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_facilities_cta_description', array(
        'label' => __('Facilities CTA Description', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_facilities_cta_text', array(
        'default' => 'Schedule a Visit',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_facilities_cta_text', array(
        'label' => __('Facilities CTA Button Text', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_facilities_cta_url', array(
        'default' => '/contact/',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('about_facilities_cta_url', array(
        'label' => __('Facilities CTA Button URL', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'url',
    ));

    // Staff Directory Section
    $wp_customize->add_setting('about_staff_title', array(
        'default' => 'Meet Our Team',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_staff_title', array(
        'label' => __('Staff Section Title', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_staff_subtitle', array(
        'default' => 'Dedicated professionals committed to nurturing and educating your children',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_staff_subtitle', array(
        'label' => __('Staff Section Subtitle', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_staff_per_page', array(
        'default' => 8,
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('about_staff_per_page', array(
        'label' => __('Staff Members Per Page', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'number',
        'input_attrs' => array(
            'min' => 4,
            'max' => 20,
            'step' => 2,
        ),
    ));

    $wp_customize->add_setting('about_staff_filter_enabled', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('about_staff_filter_enabled', array(
        'label' => __('Enable Staff Filtering', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'checkbox',
    ));

    // Staff CTA
    $wp_customize->add_setting('about_staff_cta_title', array(
        'default' => 'Join Our Team',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_staff_cta_title', array(
        'label' => __('Staff CTA Title', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_staff_cta_description', array(
        'default' => 'We are always looking for passionate educators to join our team and make a difference in students\' lives.',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_staff_cta_description', array(
        'label' => __('Staff CTA Description', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_staff_cta_text', array(
        'default' => 'View Opportunities',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_staff_cta_text', array(
        'label' => __('Staff CTA Button Text', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_staff_cta_url', array(
        'default' => '/careers/',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('about_staff_cta_url', array(
        'label' => __('Staff CTA Button URL', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'url',
    ));
}
add_action('customize_register', 'cbc_school_about_customize_register');
