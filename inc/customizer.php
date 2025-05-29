<?php
/**
 * Theme Customizer Settings
 *
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add customizer settings
 */
function cbc_school_customize_register($wp_customize) {
    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title' => __('Hero Section', 'cbc-school-modern'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default' => 'State-of-the-Art Facilities',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Hero Title', 'cbc-school-modern'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default' => 'Modern Learning Environment',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Hero Subtitle', 'cbc-school-modern'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_description', array(
        'default' => 'Our campus is equipped with the latest technology and resources for optimal learning.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_description', array(
        'label' => __('Hero Description', 'cbc-school-modern'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('hero_button_1_text', array(
        'default' => 'Apply Now',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_button_1_text', array(
        'label' => __('Hero Button 1 Text', 'cbc-school-modern'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_button_1_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_button_1_url', array(
        'label' => __('Hero Button 1 URL', 'cbc-school-modern'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('hero_button_2_text', array(
        'default' => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_button_2_text', array(
        'label' => __('Hero Button 2 Text', 'cbc-school-modern'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_button_2_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('hero_button_2_url', array(
        'label' => __('Hero Button 2 URL', 'cbc-school-modern'),
        'section' => 'hero_section',
        'type' => 'url',
    ));

    // Hero Carousel Images
    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("hero_image_$i", array(
            'sanitize_callback' => 'absint',
        ));

        $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, "hero_image_$i", array(
            'label' => sprintf(__('Hero Image %d', 'cbc-school-modern'), $i),
            'section' => 'hero_section',
            'mime_type' => 'image',
        )));
    }

    // Notice Board Section
    $wp_customize->add_section('notice_board', array(
        'title' => __('Notice Board', 'cbc-school-modern'),
        'priority' => 30.5,
    ));

    $wp_customize->add_setting('notice_board_enabled', array(
        'default' => true,
        'sanitize_callback' => 'wp_validate_boolean',
    ));

    $wp_customize->add_control('notice_board_enabled', array(
        'label' => __('Enable Notice Board', 'cbc-school-modern'),
        'section' => 'notice_board',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('notice_board_title', array(
        'default' => 'Important Notices',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('notice_board_title', array(
        'label' => __('Notice Board Title', 'cbc-school-modern'),
        'section' => 'notice_board',
        'type' => 'text',
    ));

    // Notice Board Items
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("notice_$i" . "_title", array(
            'default' => $i == 1 ? 'New Academic Year Registration Open' : ($i == 2 ? 'Parent-Teacher Conference' : 'Sports Day Event'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("notice_$i" . "_title", array(
            'label' => sprintf(__('Notice %d Title', 'cbc-school-modern'), $i),
            'section' => 'notice_board',
            'type' => 'text',
        ));

        $wp_customize->add_setting("notice_$i" . "_content", array(
            'default' => $i == 1 ? 'Registration for the new academic year is now open. Apply online or visit our admissions office.' : ($i == 2 ? 'Join us for our quarterly parent-teacher conference on Saturday, 10 AM.' : 'Annual sports day celebration with various competitions and activities.'),
            'sanitize_callback' => 'sanitize_textarea_field',
        ));

        $wp_customize->add_control("notice_$i" . "_content", array(
            'label' => sprintf(__('Notice %d Content', 'cbc-school-modern'), $i),
            'section' => 'notice_board',
            'type' => 'textarea',
        ));

        $wp_customize->add_setting("notice_$i" . "_date", array(
            'default' => date('Y-m-d'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("notice_$i" . "_date", array(
            'label' => sprintf(__('Notice %d Date', 'cbc-school-modern'), $i),
            'section' => 'notice_board',
            'type' => 'date',
        ));

        $wp_customize->add_setting("notice_$i" . "_url", array(
            'default' => '#',
            'sanitize_callback' => 'esc_url_raw',
        ));

        $wp_customize->add_control("notice_$i" . "_url", array(
            'label' => sprintf(__('Notice %d Link URL', 'cbc-school-modern'), $i),
            'section' => 'notice_board',
            'type' => 'url',
        ));
    }
    // Vision Section
    $wp_customize->add_section('vision_section', array(
        'title' => __('Vision Section', 'cbc-school-modern'),
        'priority' => 31,
    ));

    $wp_customize->add_setting('vision_label', array(
        'default' => 'Our Vision',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('vision_label', array(
        'label' => __('Vision Label', 'cbc-school-modern'),
        'section' => 'vision_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('vision_title', array(
        'default' => 'Shaping Tomorrow\'s Leaders',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('vision_title', array(
        'label' => __('Vision Title', 'cbc-school-modern'),
        'section' => 'vision_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('vision_description', array(
        'default' => 'We envision a learning community where every student is empowered to reach their full potential, becoming responsible global citizens who contribute positively to society.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('vision_description', array(
        'label' => __('Vision Description', 'cbc-school-modern'),
        'section' => 'vision_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('vision_button_text', array(
        'default' => 'Learn More',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('vision_button_text', array(
        'label' => __('Vision Button Text', 'cbc-school-modern'),
        'section' => 'vision_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('vision_button_url', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('vision_button_url', array(
        'label' => __('Vision Button URL', 'cbc-school-modern'),
        'section' => 'vision_section',
        'type' => 'url',
    ));

    $wp_customize->add_setting('vision_image', array(
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'vision_image', array(
        'label' => __('Vision Section Image', 'cbc-school-modern'),
        'section' => 'vision_section',
        'mime_type' => 'image',
    )));

    // Key Highlights Section
    $wp_customize->add_section('highlights_section', array(
        'title' => __('Key Highlights', 'cbc-school-modern'),
        'priority' => 32,
    ));

    $wp_customize->add_setting('highlights_title', array(
        'default' => 'Key Highlights',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('highlights_title', array(
        'label' => __('Highlights Section Title', 'cbc-school-modern'),
        'section' => 'highlights_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('highlights_subtitle', array(
        'default' => 'What makes our school special and why parents choose us for their children\'s education.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('highlights_subtitle', array(
        'label' => __('Highlights Section Subtitle', 'cbc-school-modern'),
        'section' => 'highlights_section',
        'type' => 'textarea',
    ));

    // Highlight 1
    $wp_customize->add_setting('highlight_1_value', array(
        'default' => '95%',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('highlight_1_value', array(
        'label' => __('Highlight 1 Value', 'cbc-school-modern'),
        'section' => 'highlights_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('highlight_1_title', array(
        'default' => 'Academic Excellence',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('highlight_1_title', array(
        'label' => __('Highlight 1 Title', 'cbc-school-modern'),
        'section' => 'highlights_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('highlight_1_description', array(
        'default' => 'Of our students achieve above-average scores in national assessments',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('highlight_1_description', array(
        'label' => __('Highlight 1 Description', 'cbc-school-modern'),
        'section' => 'highlights_section',
        'type' => 'text',
    ));

    // Highlight 2
    $wp_customize->add_setting('highlight_2_value', array(
        'default' => '15:1',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('highlight_2_value', array(
        'label' => __('Highlight 2 Value', 'cbc-school-modern'),
        'section' => 'highlights_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('highlight_2_title', array(
        'default' => 'Student-Teacher Ratio',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('highlight_2_title', array(
        'label' => __('Highlight 2 Title', 'cbc-school-modern'),
        'section' => 'highlights_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('highlight_2_description', array(
        'default' => 'Ensuring personalized attention for every student',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('highlight_2_description', array(
        'label' => __('Highlight 2 Description', 'cbc-school-modern'),
        'section' => 'highlights_section',
        'type' => 'text',
    ));

    // Highlight 3
    $wp_customize->add_setting('highlight_3_value', array(
        'default' => '25+',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('highlight_3_value', array(
        'label' => __('Highlight 3 Value', 'cbc-school-modern'),
        'section' => 'highlights_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('highlight_3_title', array(
        'default' => 'Extracurricular Activities',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('highlight_3_title', array(
        'label' => __('Highlight 3 Title', 'cbc-school-modern'),
        'section' => 'highlights_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('highlight_3_description', array(
        'default' => 'Different clubs and activities for holistic development',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('highlight_3_description', array(
        'label' => __('Highlight 3 Description', 'cbc-school-modern'),
        'section' => 'highlights_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'cbc_school_customize_register');
