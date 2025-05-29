<?php
/**
 * CBC School Modern Theme Functions
 */

// Theme setup
function cbc_school_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo');
    add_theme_support('customize-selective-refresh-widgets');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'cbc-school-modern'),
        'footer' => __('Footer Menu', 'cbc-school-modern'),
    ));

    // Add image sizes
    add_image_size('hero-image', 800, 600, true);
    add_image_size('featured-image', 400, 300, true);
}
add_action('after_setup_theme', 'cbc_school_setup');

// Enqueue styles and scripts
function cbc_school_scripts() {
    // Enqueue main stylesheet
    wp_enqueue_style('cbc-school-style', get_stylesheet_uri(), array(), '1.0.0');

    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap', array(), null);

    // Enqueue main JavaScript
    wp_enqueue_script('cbc-school-script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0.0', true);

    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'cbc_school_scripts');

// Register widget areas
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

// Custom post types for school content
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

// Customizer settings
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

// Add custom body classes
function cbc_school_body_classes($classes) {
    if (is_front_page()) {
        $classes[] = 'front-page';
    }
    return $classes;
}
add_filter('body_class', 'cbc_school_body_classes');

// Add custom rewrite rules for News & Events page
function cbc_school_add_rewrite_rules() {
    add_rewrite_rule('^news-events/?$', 'index.php?news_events_page=1', 'top');
}
add_action('init', 'cbc_school_add_rewrite_rules');

// Add custom query vars
function cbc_school_query_vars($vars) {
    $vars[] = 'news_events_page';
    return $vars;
}
add_filter('query_vars', 'cbc_school_query_vars');

// Template redirect for News & Events page
function cbc_school_template_redirect() {
    if (get_query_var('news_events_page')) {
        include(get_template_directory() . '/page-news-events.php');
        exit;
    }
}
add_action('template_redirect', 'cbc_school_template_redirect');

// Flush rewrite rules on theme activation
function cbc_school_flush_rewrite_rules() {
    cbc_school_add_rewrite_rules();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'cbc_school_flush_rewrite_rules');
