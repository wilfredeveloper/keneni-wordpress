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

    // About Page Section
    $wp_customize->add_section('about_page_section', array(
        'title' => __('About Page Settings', 'cbc-school-modern'),
        'priority' => 35,
    ));

    // About Hero Section
    $wp_customize->add_setting('about_hero_title', array(
        'default' => 'About Our School',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_hero_title', array(
        'label' => __('Hero Title', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_hero_description', array(
        'default' => 'Discover our commitment to excellence in CBC education and nurturing tomorrow\'s leaders through innovative learning approaches.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('about_hero_description', array(
        'label' => __('Hero Description', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('about_hero_image', array(
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'about_hero_image', array(
        'label' => __('Hero Background Image', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'mime_type' => 'image',
    )));

    // Hero Stats
    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("about_stat_{$i}_number", array(
            'default' => $i == 1 ? '15+' : ($i == 2 ? '500+' : '98%'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("about_stat_{$i}_number", array(
            'label' => sprintf(__('Stat %d Number', 'cbc-school-modern'), $i),
            'section' => 'about_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("about_stat_{$i}_label", array(
            'default' => $i == 1 ? 'Years of Excellence' : ($i == 2 ? 'Happy Students' : 'Success Rate'),
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("about_stat_{$i}_label", array(
            'label' => sprintf(__('Stat %d Label', 'cbc-school-modern'), $i),
            'section' => 'about_page_section',
            'type' => 'text',
        ));
    }

    // Mission & Vision Section
    $wp_customize->add_setting('about_mv_section_title', array(
        'default' => 'Our Mission & Vision',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_mv_section_title', array(
        'label' => __('Mission & Vision Section Title', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_mv_section_subtitle', array(
        'default' => 'Guiding principles that drive our commitment to educational excellence',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_mv_section_subtitle', array(
        'label' => __('Mission & Vision Section Subtitle', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_mission_title', array(
        'default' => 'Our Mission',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_mission_title', array(
        'label' => __('Mission Title', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_mission_content', array(
        'default' => 'To provide quality, holistic education that nurtures competent, confident, and ethical learners who contribute meaningfully to society through the Competency-Based Curriculum approach.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('about_mission_content', array(
        'label' => __('Mission Content', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('about_vision_title', array(
        'default' => 'Our Vision',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_vision_title', array(
        'label' => __('Vision Title', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_vision_content', array(
        'default' => 'To be a leading educational institution that empowers learners to become innovative, responsible, and globally competitive citizens who positively impact their communities.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('about_vision_content', array(
        'label' => __('Vision Content', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('about_values_title', array(
        'default' => 'Core Values',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_values_title', array(
        'label' => __('Values Title', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_values_content', array(
        'default' => 'Excellence, Integrity, Innovation, Respect, Collaboration, and Community Service guide everything we do in nurturing well-rounded learners.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('about_values_content', array(
        'label' => __('Values Content', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'textarea',
    ));

    // School History Section
    $wp_customize->add_setting('about_history_title', array(
        'default' => 'Our Story',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_history_title', array(
        'label' => __('History Section Title', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_history_content', array(
        'default' => 'Founded in 2008, our school began with a vision to provide quality education that prepares students for the challenges of the 21st century. Over the years, we have grown from a small community school to a leading educational institution, always maintaining our commitment to excellence and innovation in teaching and learning.',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('about_history_content', array(
        'label' => __('History Content', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('about_history_image', array(
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'about_history_image', array(
        'label' => __('History Section Image', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'mime_type' => 'image',
    )));

    // Timeline Items
    for ($i = 1; $i <= 3; $i++) {
        $default_years = array(1 => '2008', 2 => '2015', 3 => '2020');
        $default_titles = array(1 => 'School Founded', 2 => 'CBC Implementation', 3 => 'Digital Learning');
        $default_descriptions = array(
            1 => 'Established with 50 students and a vision for excellence',
            2 => 'Successfully transitioned to Competency-Based Curriculum',
            3 => 'Integrated technology and digital learning platforms'
        );

        $wp_customize->add_setting("about_timeline_{$i}_year", array(
            'default' => $default_years[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("about_timeline_{$i}_year", array(
            'label' => sprintf(__('Timeline %d Year', 'cbc-school-modern'), $i),
            'section' => 'about_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("about_timeline_{$i}_title", array(
            'default' => $default_titles[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("about_timeline_{$i}_title", array(
            'label' => sprintf(__('Timeline %d Title', 'cbc-school-modern'), $i),
            'section' => 'about_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("about_timeline_{$i}_description", array(
            'default' => $default_descriptions[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("about_timeline_{$i}_description", array(
            'label' => sprintf(__('Timeline %d Description', 'cbc-school-modern'), $i),
            'section' => 'about_page_section',
            'type' => 'text',
        ));
    }

    // Academic Excellence Section
    $wp_customize->add_setting('about_academic_title', array(
        'default' => 'Academic Excellence',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_academic_title', array(
        'label' => __('Academic Section Title', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_academic_subtitle', array(
        'default' => 'Committed to delivering quality education through the Competency-Based Curriculum',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_academic_subtitle', array(
        'label' => __('Academic Section Subtitle', 'cbc-school-modern'),
        'section' => 'about_page_section',
        'type' => 'text',
    ));

    // Academic Features
    $academic_defaults = array(
        1 => array('title' => 'CBC Curriculum', 'description' => 'Fully aligned with Kenya\'s Competency-Based Curriculum, focusing on developing critical thinking, creativity, and practical skills.'),
        2 => array('title' => 'Qualified Teachers', 'description' => 'Our dedicated team of qualified and experienced teachers are trained in modern pedagogical approaches and CBC implementation.'),
        3 => array('title' => 'Proven Results', 'description' => 'Consistent excellent performance in national assessments and successful transition of students to secondary education.'),
        4 => array('title' => 'Holistic Development', 'description' => 'Beyond academics, we focus on character development, life skills, and nurturing talents in sports, arts, and leadership.')
    );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("about_academic_feature_{$i}_title", array(
            'default' => $academic_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("about_academic_feature_{$i}_title", array(
            'label' => sprintf(__('Academic Feature %d Title', 'cbc-school-modern'), $i),
            'section' => 'about_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("about_academic_feature_{$i}_description", array(
            'default' => $academic_defaults[$i]['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));

        $wp_customize->add_control("about_academic_feature_{$i}_description", array(
            'label' => sprintf(__('Academic Feature %d Description', 'cbc-school-modern'), $i),
            'section' => 'about_page_section',
            'type' => 'textarea',
        ));
    }

    // Programs Page Section
    $wp_customize->add_section('programs_page_section', array(
        'title' => __('Programs Page Settings', 'cbc-school-modern'),
        'priority' => 36,
    ));

    // Programs Hero Section
    $wp_customize->add_setting('programs_hero_title', array(
        'default' => 'Academic Excellence',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('programs_hero_title', array(
        'label' => __('Hero Title', 'cbc-school-modern'),
        'section' => 'programs_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('programs_hero_description', array(
        'default' => 'Empowering students through the Competency-Based Curriculum with innovative teaching methods and comprehensive learning experiences.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('programs_hero_description', array(
        'label' => __('Hero Description', 'cbc-school-modern'),
        'section' => 'programs_page_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('programs_hero_image', array(
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'programs_hero_image', array(
        'label' => __('Hero Background Image', 'cbc-school-modern'),
        'section' => 'programs_page_section',
        'mime_type' => 'image',
    )));

    // Hero Stats
    for ($i = 1; $i <= 3; $i++) {
        $defaults = array(
            1 => array('number' => '8', 'label' => 'Grade Levels'),
            2 => array('number' => '12', 'label' => 'Subject Areas'),
            3 => array('number' => '100%', 'label' => 'CBC Aligned')
        );

        $wp_customize->add_setting("programs_stat_{$i}_number", array(
            'default' => $defaults[$i]['number'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("programs_stat_{$i}_number", array(
            'label' => sprintf(__('Stat %d Number', 'cbc-school-modern'), $i),
            'section' => 'programs_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("programs_stat_{$i}_label", array(
            'default' => $defaults[$i]['label'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("programs_stat_{$i}_label", array(
            'label' => sprintf(__('Stat %d Label', 'cbc-school-modern'), $i),
            'section' => 'programs_page_section',
            'type' => 'text',
        ));
    }

    // Academic Programs Section
    $wp_customize->add_setting('programs_programs_title', array(
        'default' => 'Academic Programs',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('programs_programs_title', array(
        'label' => __('Programs Section Title', 'cbc-school-modern'),
        'section' => 'programs_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('programs_programs_subtitle', array(
        'default' => 'Comprehensive educational programs designed to nurture every child\'s potential from early years through primary education',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('programs_programs_subtitle', array(
        'label' => __('Programs Section Subtitle', 'cbc-school-modern'),
        'section' => 'programs_page_section',
        'type' => 'textarea',
    ));

    // Program Cards
    $program_defaults = array(
        1 => array(
            'title' => 'Pre-Primary (PP1 & PP2)',
            'description' => 'Foundation years focusing on play-based learning, social skills development, and early literacy and numeracy skills.',
            'age' => 'Ages 4-6'
        ),
        2 => array(
            'title' => 'Lower Primary (Grade 1-3)',
            'description' => 'Building fundamental skills in literacy, numeracy, and introducing core subjects through engaging, hands-on activities.',
            'age' => 'Ages 6-9'
        ),
        3 => array(
            'title' => 'Upper Primary (Grade 4-6)',
            'description' => 'Advanced learning with specialized subjects, critical thinking development, and preparation for secondary education.',
            'age' => 'Ages 9-12'
        )
    );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("programs_program_{$i}_title", array(
            'default' => $program_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("programs_program_{$i}_title", array(
            'label' => sprintf(__('Program %d Title', 'cbc-school-modern'), $i),
            'section' => 'programs_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("programs_program_{$i}_description", array(
            'default' => $program_defaults[$i]['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));

        $wp_customize->add_control("programs_program_{$i}_description", array(
            'label' => sprintf(__('Program %d Description', 'cbc-school-modern'), $i),
            'section' => 'programs_page_section',
            'type' => 'textarea',
        ));

        $wp_customize->add_setting("programs_program_{$i}_age", array(
            'default' => $program_defaults[$i]['age'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("programs_program_{$i}_age", array(
            'label' => sprintf(__('Program %d Age Range', 'cbc-school-modern'), $i),
            'section' => 'programs_page_section',
            'type' => 'text',
        ));
    }

    // CBC Implementation Section
    $wp_customize->add_setting('programs_cbc_title', array(
        'default' => 'CBC Implementation',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('programs_cbc_title', array(
        'label' => __('CBC Section Title', 'cbc-school-modern'),
        'section' => 'programs_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('programs_cbc_content', array(
        'default' => 'Our school is fully aligned with Kenya\'s Competency-Based Curriculum, focusing on developing learners\' competencies through engaging, learner-centered approaches. We emphasize critical thinking, creativity, communication, collaboration, citizenship, and digital literacy.',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('programs_cbc_content', array(
        'label' => __('CBC Content', 'cbc-school-modern'),
        'section' => 'programs_page_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('programs_cbc_image', array(
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'programs_cbc_image', array(
        'label' => __('CBC Section Image', 'cbc-school-modern'),
        'section' => 'programs_page_section',
        'mime_type' => 'image',
    )));

    // CBC Features
    $cbc_features = array(
        1 => 'Competency-Based Assessment',
        2 => 'Learner-Centered Approach',
        3 => 'Integrated Learning Areas',
        4 => 'Values-Based Education'
    );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("programs_cbc_feature_{$i}", array(
            'default' => $cbc_features[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("programs_cbc_feature_{$i}", array(
            'label' => sprintf(__('CBC Feature %d', 'cbc-school-modern'), $i),
            'section' => 'programs_page_section',
            'type' => 'text',
        ));
    }

    // Admissions Page Section
    $wp_customize->add_section('admissions_page_section', array(
        'title' => __('Admissions Page Settings', 'cbc-school-modern'),
        'priority' => 37,
    ));

    // Admissions Hero Section
    $wp_customize->add_setting('admissions_hero_title', array(
        'default' => 'Join Our School Community',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_hero_title', array(
        'label' => __('Hero Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_hero_description', array(
        'default' => 'Begin your child\'s educational journey with us. Discover our admission process, requirements, and how to apply for the upcoming academic year.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('admissions_hero_description', array(
        'label' => __('Hero Description', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('admissions_hero_image', array(
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'admissions_hero_image', array(
        'label' => __('Hero Background Image', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'mime_type' => 'image',
    )));

    // Hero Stats
    for ($i = 1; $i <= 3; $i++) {
        $defaults = array(
            1 => array('number' => '95%', 'label' => 'Acceptance Rate'),
            2 => array('number' => '48hrs', 'label' => 'Response Time'),
            3 => array('number' => '100%', 'label' => 'Support Rate')
        );

        $wp_customize->add_setting("admissions_stat_{$i}_number", array(
            'default' => $defaults[$i]['number'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_stat_{$i}_number", array(
            'label' => sprintf(__('Stat %d Number', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("admissions_stat_{$i}_label", array(
            'default' => $defaults[$i]['label'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_stat_{$i}_label", array(
            'label' => sprintf(__('Stat %d Label', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));
    }

    // Admissions Process Section
    $wp_customize->add_setting('admissions_process_title', array(
        'default' => 'Admission Process',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_process_title', array(
        'label' => __('Process Section Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_process_subtitle', array(
        'default' => 'Follow these simple steps to complete your child\'s admission to our school',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('admissions_process_subtitle', array(
        'label' => __('Process Section Subtitle', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    // Process Steps
    $process_defaults = array(
        1 => array('title' => 'Submit Application', 'description' => 'Complete and submit the online application form with all required information.'),
        2 => array('title' => 'Document Review', 'description' => 'Our admissions team reviews your application and supporting documents.'),
        3 => array('title' => 'Schedule Interview', 'description' => 'Schedule a meeting with our admissions counselor and school tour.'),
        4 => array('title' => 'Assessment', 'description' => 'Student assessment to determine appropriate grade level placement.'),
        5 => array('title' => 'Fee Payment', 'description' => 'Complete fee payment and submit any remaining documentation.'),
        6 => array('title' => 'Enrollment', 'description' => 'Welcome to our school community! Complete enrollment process.')
    );

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("admissions_process_{$i}_title", array(
            'default' => $process_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_process_{$i}_title", array(
            'label' => sprintf(__('Process Step %d Title', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("admissions_process_{$i}_description", array(
            'default' => $process_defaults[$i]['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));

        $wp_customize->add_control("admissions_process_{$i}_description", array(
            'label' => sprintf(__('Process Step %d Description', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'textarea',
        ));
    }

    $wp_customize->add_setting('admissions_apply_button_text', array(
        'default' => 'Apply Now',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_apply_button_text', array(
        'label' => __('Apply Button Text', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    // Requirements Section
    $wp_customize->add_setting('admissions_requirements_title', array(
        'default' => 'Admission Requirements',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_requirements_title', array(
        'label' => __('Requirements Section Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_requirements_subtitle', array(
        'default' => 'Everything you need to know about our admission requirements and process',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('admissions_requirements_subtitle', array(
        'label' => __('Requirements Section Subtitle', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    // Required Documents
    $document_defaults = array(
        1 => 'Birth Certificate (Original and Copy)',
        2 => 'Previous School Report Cards',
        3 => 'Transfer Certificate (if applicable)',
        4 => 'Passport Size Photos (4 copies)',
        5 => 'Parent/Guardian ID Copies',
        6 => 'Medical Certificate',
        7 => 'Immunization Records',
        8 => 'Proof of Residence'
    );

    for ($i = 1; $i <= 8; $i++) {
        $wp_customize->add_setting("admissions_document_{$i}", array(
            'default' => $document_defaults[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_document_{$i}", array(
            'label' => sprintf(__('Required Document %d', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));
    }

    $wp_customize->add_setting('admissions_additional_requirements', array(
        'default' => 'All documents must be original or certified copies. International students may require additional documentation. Please contact our admissions office for specific requirements.',
        'sanitize_callback' => 'wp_kses_post',
    ));

    $wp_customize->add_control('admissions_additional_requirements', array(
        'label' => __('Additional Requirements', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    // Document Checklist PDF Upload
    $wp_customize->add_setting('admissions_checklist_pdf', array(
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'admissions_checklist_pdf', array(
        'label' => __('Document Checklist PDF', 'cbc-school-modern'),
        'description' => __('Upload a PDF file for the document checklist. If no PDF is uploaded, a text file will be generated automatically.', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'mime_type' => 'application/pdf',
    )));

    // Age Requirements
    $grade_defaults = array(
        1 => array('name' => 'Pre-Primary 1 (PP1)', 'age' => '4-5 years'),
        2 => array('name' => 'Pre-Primary 2 (PP2)', 'age' => '5-6 years'),
        3 => array('name' => 'Grade 1', 'age' => '6-7 years'),
        4 => array('name' => 'Grade 2', 'age' => '7-8 years'),
        5 => array('name' => 'Grade 3', 'age' => '8-9 years'),
        6 => array('name' => 'Grade 4', 'age' => '9-10 years'),
        7 => array('name' => 'Grade 5', 'age' => '10-11 years'),
        8 => array('name' => 'Grade 6', 'age' => '11-12 years')
    );

    for ($i = 1; $i <= 8; $i++) {
        $wp_customize->add_setting("admissions_grade_{$i}_name", array(
            'default' => $grade_defaults[$i]['name'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_grade_{$i}_name", array(
            'label' => sprintf(__('Grade %d Name', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("admissions_grade_{$i}_age", array(
            'default' => $grade_defaults[$i]['age'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_grade_{$i}_age", array(
            'label' => sprintf(__('Grade %d Age Requirement', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));
    }

    $wp_customize->add_setting('admissions_assessment_image', array(
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'admissions_assessment_image', array(
        'label' => __('Assessment Image', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'mime_type' => 'image',
    )));

    $wp_customize->add_setting('admissions_assessment_title', array(
        'default' => 'Grade Placement Assessment',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_assessment_title', array(
        'label' => __('Assessment Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_assessment_description', array(
        'default' => 'We conduct comprehensive assessments to ensure proper grade placement for each student.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('admissions_assessment_description', array(
        'label' => __('Assessment Description', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    // Fees Section
    $fee_defaults = array(
        1 => array('type' => 'Tuition Fee (PP1-PP2)', 'amount' => '45,000', 'frequency' => 'Annual'),
        2 => array('type' => 'Tuition Fee (Grade 1-3)', 'amount' => '55,000', 'frequency' => 'Annual'),
        3 => array('type' => 'Tuition Fee (Grade 4-6)', 'amount' => '65,000', 'frequency' => 'Annual'),
        4 => array('type' => 'Registration Fee', 'amount' => '5,000', 'frequency' => 'One-time'),
        5 => array('type' => 'Activity Fee', 'amount' => '8,000', 'frequency' => 'Annual'),
        6 => array('type' => 'Transport Fee', 'amount' => '15,000', 'frequency' => 'Annual')
    );

    for ($i = 1; $i <= 6; $i++) {
        $wp_customize->add_setting("admissions_fee_{$i}_type", array(
            'default' => $fee_defaults[$i]['type'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_fee_{$i}_type", array(
            'label' => sprintf(__('Fee %d Type', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("admissions_fee_{$i}_amount", array(
            'default' => $fee_defaults[$i]['amount'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_fee_{$i}_amount", array(
            'label' => sprintf(__('Fee %d Amount (KES)', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("admissions_fee_{$i}_frequency", array(
            'default' => $fee_defaults[$i]['frequency'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_fee_{$i}_frequency", array(
            'label' => sprintf(__('Fee %d Frequency', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));
    }

    // Additional Fees
    $additional_fee_defaults = array(
        1 => 'Uniform Fee: KES 3,500',
        2 => 'Books & Materials: KES 4,000',
        3 => 'Lunch Program: KES 12,000/year',
        4 => 'After School Care: KES 8,000/year'
    );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("admissions_additional_fee_{$i}", array(
            'default' => $additional_fee_defaults[$i],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_additional_fee_{$i}", array(
            'label' => sprintf(__('Additional Fee %d', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));
    }

    // Payment Options
    $payment_defaults = array(
        1 => array('title' => 'Annual Payment', 'description' => '5% discount for full year payment in advance'),
        2 => array('title' => 'Termly Payment', 'description' => 'Pay in three installments throughout the year'),
        3 => array('title' => 'Monthly Payment', 'description' => 'Convenient monthly payment plan available')
    );

    for ($i = 1; $i <= 3; $i++) {
        $wp_customize->add_setting("admissions_payment_{$i}_title", array(
            'default' => $payment_defaults[$i]['title'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_payment_{$i}_title", array(
            'label' => sprintf(__('Payment Option %d Title', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("admissions_payment_{$i}_description", array(
            'default' => $payment_defaults[$i]['description'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));

        $wp_customize->add_control("admissions_payment_{$i}_description", array(
            'label' => sprintf(__('Payment Option %d Description', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'textarea',
        ));
    }

    // Financial Aid
    $wp_customize->add_setting('admissions_financial_aid_title', array(
        'default' => 'Financial Aid Available',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_financial_aid_title', array(
        'label' => __('Financial Aid Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_financial_aid_description', array(
        'default' => 'We offer various financial aid options to support families. Contact our admissions office for more information.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('admissions_financial_aid_description', array(
        'label' => __('Financial Aid Description', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('admissions_financial_aid_link', array(
        'default' => '#contact',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('admissions_financial_aid_link', array(
        'label' => __('Financial Aid Link', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'url',
    ));

    // Important Dates Section
    $wp_customize->add_setting('admissions_dates_title', array(
        'default' => 'Important Dates',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_dates_title', array(
        'label' => __('Dates Section Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_dates_subtitle', array(
        'default' => 'Mark your calendar with these important admission dates and deadlines',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('admissions_dates_subtitle', array(
        'label' => __('Dates Section Subtitle', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    // Application Deadlines
    $wp_customize->add_setting('admissions_deadline_title', array(
        'default' => 'Application Deadlines',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_deadline_title', array(
        'label' => __('Deadline Section Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $deadline_defaults = array(
        1 => array('date' => 'March 15, 2024', 'desc' => 'Early Application Deadline'),
        2 => array('date' => 'May 30, 2024', 'desc' => 'Regular Application Deadline'),
        3 => array('date' => 'July 15, 2024', 'desc' => 'Late Application Deadline'),
        4 => array('date' => 'August 1, 2024', 'desc' => 'Final Application Deadline')
    );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("admissions_deadline_{$i}_date", array(
            'default' => $deadline_defaults[$i]['date'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_deadline_{$i}_date", array(
            'label' => sprintf(__('Deadline %d Date', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("admissions_deadline_{$i}_desc", array(
            'default' => $deadline_defaults[$i]['desc'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_deadline_{$i}_desc", array(
            'label' => sprintf(__('Deadline %d Description', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));
    }

    // Open Houses
    $wp_customize->add_setting('admissions_openhouse_title', array(
        'default' => 'Open Houses & Tours',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_openhouse_title', array(
        'label' => __('Open House Section Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $openhouse_defaults = array(
        1 => array('date' => 'Every Saturday', 'desc' => 'School Tours at 10:00 AM'),
        2 => array('date' => 'February 10, 2024', 'desc' => 'Open House Event'),
        3 => array('date' => 'April 20, 2024', 'desc' => 'Spring Open House'),
        4 => array('date' => 'June 15, 2024', 'desc' => 'Summer Information Session')
    );

    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting("admissions_openhouse_{$i}_date", array(
            'default' => $openhouse_defaults[$i]['date'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_openhouse_{$i}_date", array(
            'label' => sprintf(__('Open House %d Date', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("admissions_openhouse_{$i}_desc", array(
            'default' => $openhouse_defaults[$i]['desc'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_openhouse_{$i}_desc", array(
            'label' => sprintf(__('Open House %d Description', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));
    }

    // Academic Calendar
    $wp_customize->add_setting('admissions_calendar_title', array(
        'default' => 'Academic Calendar',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_calendar_title', array(
        'label' => __('Calendar Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_calendar_description', array(
        'default' => 'Download our complete academic calendar with all important dates, holidays, and events.',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('admissions_calendar_description', array(
        'label' => __('Calendar Description', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    // Academic Calendar PDF Upload
    $wp_customize->add_setting('admissions_calendar_pdf', array(
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'admissions_calendar_pdf', array(
        'label' => __('Academic Calendar PDF', 'cbc-school-modern'),
        'description' => __('Upload a PDF file for the academic calendar. If no PDF is uploaded, a text file will be generated automatically.', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'mime_type' => 'application/pdf',
    )));

    // Application Form Section
    $wp_customize->add_setting('admissions_form_title', array(
        'default' => 'Application Form',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_form_title', array(
        'label' => __('Form Section Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_form_subtitle', array(
        'default' => 'Complete the form below to begin your child\'s admission process',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('admissions_form_subtitle', array(
        'label' => __('Form Section Subtitle', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    // FAQ Section
    $wp_customize->add_setting('admissions_faq_title', array(
        'default' => 'Frequently Asked Questions',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_faq_title', array(
        'label' => __('FAQ Section Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_faq_subtitle', array(
        'default' => 'Find answers to common questions about our admission process',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('admissions_faq_subtitle', array(
        'label' => __('FAQ Section Subtitle', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    // FAQ Items
    $faq_defaults = array(
        1 => array('question' => 'What is the admission age for different grades?', 'answer' => 'We admit students based on age requirements for each grade level. Please refer to our age requirements table for specific details.'),
        2 => array('question' => 'When do applications open for the next academic year?', 'answer' => 'Applications typically open in January for the following academic year. Early applications are encouraged.'),
        3 => array('question' => 'What documents are required for admission?', 'answer' => 'Required documents include birth certificate, previous school reports, medical certificate, and passport photos. See our requirements section for the complete list.'),
        4 => array('question' => 'Do you offer financial aid or scholarships?', 'answer' => 'Yes, we offer various financial aid options for qualifying families. Please contact our admissions office for more information.'),
        5 => array('question' => 'Can I schedule a school tour?', 'answer' => 'Absolutely! We offer school tours every Saturday at 10:00 AM. You can also schedule a private tour by contacting our admissions office.'),
        6 => array('question' => 'What is your student-teacher ratio?', 'answer' => 'We maintain a low student-teacher ratio of 15:1 to ensure personalized attention for each student.'),
        7 => array('question' => 'Do you provide transportation?', 'answer' => 'Yes, we offer school bus transportation to various routes around the city. Transportation fees are separate from tuition.'),
        8 => array('question' => 'What extracurricular activities do you offer?', 'answer' => 'We offer a wide range of activities including sports, music, drama, debate, and various clubs to support holistic development.')
    );

    for ($i = 1; $i <= 8; $i++) {
        $wp_customize->add_setting("admissions_faq_{$i}_question", array(
            'default' => $faq_defaults[$i]['question'],
            'sanitize_callback' => 'sanitize_text_field',
        ));

        $wp_customize->add_control("admissions_faq_{$i}_question", array(
            'label' => sprintf(__('FAQ %d Question', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'text',
        ));

        $wp_customize->add_setting("admissions_faq_{$i}_answer", array(
            'default' => $faq_defaults[$i]['answer'],
            'sanitize_callback' => 'sanitize_textarea_field',
        ));

        $wp_customize->add_control("admissions_faq_{$i}_answer", array(
            'label' => sprintf(__('FAQ %d Answer', 'cbc-school-modern'), $i),
            'section' => 'admissions_page_section',
            'type' => 'textarea',
        ));
    }

    // Contact Section
    $wp_customize->add_setting('admissions_contact_title', array(
        'default' => 'Contact Admissions Office',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_contact_title', array(
        'label' => __('Contact Section Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_contact_subtitle', array(
        'default' => 'Have questions? Our admissions team is here to help you through the process',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('admissions_contact_subtitle', array(
        'label' => __('Contact Section Subtitle', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('admissions_contact_phone', array(
        'default' => '+254 700 123 456',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_contact_phone', array(
        'label' => __('Contact Phone', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_contact_email', array(
        'default' => 'admissions@school.ac.ke',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('admissions_contact_email', array(
        'label' => __('Contact Email', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'email',
    ));

    $wp_customize->add_setting('admissions_contact_address', array(
        'default' => '123 School Street, Nairobi, Kenya',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('admissions_contact_address', array(
        'label' => __('Contact Address', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('admissions_contact_hours', array(
        'default' => 'Monday - Friday: 8:00 AM - 5:00 PM',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_contact_hours', array(
        'label' => __('Office Hours', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_office_title', array(
        'default' => 'Admissions Office',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('admissions_office_title', array(
        'label' => __('Office Card Title', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('admissions_office_message', array(
        'default' => 'Our dedicated admissions team is committed to helping you find the perfect educational fit for your child. Schedule a visit or call us today!',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('admissions_office_message', array(
        'label' => __('Office Card Message', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('admissions_office_link', array(
        'default' => '#',
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control('admissions_office_link', array(
        'label' => __('Office Card Link', 'cbc-school-modern'),
        'section' => 'admissions_page_section',
        'type' => 'url',
    ));
}
add_action('customize_register', 'cbc_school_customize_register');
