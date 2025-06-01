<?php
/**
 * Admin Functionality
 *
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add theme support and setup
 */
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
    add_image_size('card-image', 350, 250, true);
    add_image_size('thumbnail-small', 150, 150, true);
}
add_action('after_setup_theme', 'cbc_school_setup');

/**
 * Enqueue admin styles and scripts
 */
function cbc_school_admin_scripts() {
    // Add admin-specific styles if needed
    if (file_exists(get_template_directory() . '/assets/css/admin.css')) {
        wp_enqueue_style(
            'cbc-school-admin-style',
            get_template_directory_uri() . '/assets/css/admin.css',
            array(),
            cbc_school_get_theme_version()
        );
    }
}
add_action('admin_enqueue_scripts', 'cbc_school_admin_scripts');

/**
 * Add custom columns to Events post type
 */
function cbc_school_events_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['title'] = $columns['title'];
    $new_columns['event_date'] = __('Event Date', 'cbc-school-modern');
    $new_columns['featured_image'] = __('Featured Image', 'cbc-school-modern');
    $new_columns['date'] = $columns['date'];

    return $new_columns;
}
add_filter('manage_events_posts_columns', 'cbc_school_events_columns');

/**
 * Populate custom columns for Events post type
 */
function cbc_school_events_column_content($column, $post_id) {
    switch ($column) {
        case 'event_date':
            $event_date = get_post_meta($post_id, 'event_date', true);
            if ($event_date) {
                echo date('M d, Y', strtotime($event_date));
            } else {
                echo '—';
            }
            break;

        case 'featured_image':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(50, 50));
            } else {
                echo '—';
            }
            break;
    }
}
add_action('manage_events_posts_custom_column', 'cbc_school_events_column_content', 10, 2);

/**
 * Add custom columns to Staff post type
 */
function cbc_school_staff_columns($columns) {
    $new_columns = array();
    $new_columns['cb'] = $columns['cb'];
    $new_columns['title'] = $columns['title'];
    $new_columns['position'] = __('Position', 'cbc-school-modern');
    $new_columns['department'] = __('Department', 'cbc-school-modern');
    $new_columns['featured_image'] = __('Photo', 'cbc-school-modern');
    $new_columns['date'] = $columns['date'];

    return $new_columns;
}
add_filter('manage_staff_posts_columns', 'cbc_school_staff_columns');

/**
 * Populate custom columns for Staff post type
 */
function cbc_school_staff_column_content($column, $post_id) {
    switch ($column) {
        case 'position':
            $position = get_post_meta($post_id, 'staff_position', true);
            echo $position ? esc_html($position) : '—';
            break;

        case 'department':
            $department = get_post_meta($post_id, 'staff_department', true);
            echo $department ? esc_html($department) : '—';
            break;

        case 'featured_image':
            if (has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail($post_id, array(50, 50));
            } else {
                echo '—';
            }
            break;
    }
}
add_action('manage_staff_posts_custom_column', 'cbc_school_staff_column_content', 10, 2);

/**
 * Add meta boxes for custom fields
 */
function cbc_school_add_meta_boxes() {
    // Event meta box
    add_meta_box(
        'event_details',
        __('Event Details', 'cbc-school-modern'),
        'cbc_school_event_meta_box_callback',
        'events',
        'normal',
        'high'
    );

    // Staff meta box
    add_meta_box(
        'staff_details',
        __('Staff Details', 'cbc-school-modern'),
        'cbc_school_staff_meta_box_callback',
        'staff',
        'normal',
        'high'
    );

    // Contact page meta boxes - only show on contact page
    global $post;
    if ($post && $post->post_name === 'contact') {
        add_meta_box(
            'contact_hero_details',
            __('Hero Section', 'cbc-school-modern'),
            'cbc_school_contact_hero_meta_box_callback',
            'page',
            'normal',
            'high'
        );

        add_meta_box(
            'contact_info_details',
            __('Contact Information', 'cbc-school-modern'),
            'cbc_school_contact_info_meta_box_callback',
            'page',
            'normal',
            'high'
        );

        add_meta_box(
            'contact_hours_details',
            __('Office Hours & Transportation', 'cbc-school-modern'),
            'cbc_school_contact_hours_meta_box_callback',
            'page',
            'normal',
            'high'
        );

        add_meta_box(
            'contact_faq_details',
            __('FAQ Section', 'cbc-school-modern'),
            'cbc_school_contact_faq_meta_box_callback',
            'page',
            'normal',
            'high'
        );
    }
}
add_action('add_meta_boxes', 'cbc_school_add_meta_boxes');

/**
 * Event meta box callback
 */
function cbc_school_event_meta_box_callback($post) {
    wp_nonce_field('cbc_school_event_meta_box', 'cbc_school_event_meta_box_nonce');

    $event_date = get_post_meta($post->ID, 'event_date', true);
    $event_time = get_post_meta($post->ID, 'event_time', true);
    $event_location = get_post_meta($post->ID, 'event_location', true);

    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="event_date">' . __('Event Date', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="date" id="event_date" name="event_date" value="' . esc_attr($event_date) . '" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="event_time">' . __('Event Time', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="time" id="event_time" name="event_time" value="' . esc_attr($event_time) . '" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="event_location">' . __('Event Location', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="text" id="event_location" name="event_location" value="' . esc_attr($event_location) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '</table>';
}

/**
 * Staff meta box callback
 */
function cbc_school_staff_meta_box_callback($post) {
    wp_nonce_field('cbc_school_staff_meta_box', 'cbc_school_staff_meta_box_nonce');

    $staff_position = get_post_meta($post->ID, 'staff_position', true);
    $staff_department = get_post_meta($post->ID, 'staff_department', true);
    $staff_email = get_post_meta($post->ID, 'staff_email', true);
    $staff_phone = get_post_meta($post->ID, 'staff_phone', true);

    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="staff_position">' . __('Position', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="text" id="staff_position" name="staff_position" value="' . esc_attr($staff_position) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="staff_department">' . __('Department', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="text" id="staff_department" name="staff_department" value="' . esc_attr($staff_department) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="staff_email">' . __('Email', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="email" id="staff_email" name="staff_email" value="' . esc_attr($staff_email) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="staff_phone">' . __('Phone', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="tel" id="staff_phone" name="staff_phone" value="' . esc_attr($staff_phone) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '</table>';
}

/**
 * Contact Hero meta box callback
 */
function cbc_school_contact_hero_meta_box_callback($post) {
    wp_nonce_field('cbc_school_contact_meta_box', 'cbc_school_contact_meta_box_nonce');

    $hero_title = get_post_meta($post->ID, 'contact_hero_title', true);
    $hero_description = get_post_meta($post->ID, 'contact_hero_description', true);

    // Set defaults if empty
    if (empty($hero_title)) {
        $hero_title = 'Contact Us';
    }
    if (empty($hero_description)) {
        $hero_description = "We'd love to hear from you. Reach out with any questions, inquiries, or feedback.";
    }

    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="contact_hero_title">' . __('Hero Title', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="text" id="contact_hero_title" name="contact_hero_title" value="' . esc_attr($hero_title) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="contact_hero_description">' . __('Hero Description', 'cbc-school-modern') . '</label></th>';
    echo '<td><textarea id="contact_hero_description" name="contact_hero_description" rows="3" class="large-text">' . esc_textarea($hero_description) . '</textarea></td>';
    echo '</tr>';
    echo '</table>';
}

/**
 * Contact Information meta box callback
 */
function cbc_school_contact_info_meta_box_callback($post) {
    // Get existing values
    $location_title = get_post_meta($post->ID, 'contact_location_title', true);
    $location_address = get_post_meta($post->ID, 'contact_location_address', true);
    $location_city = get_post_meta($post->ID, 'contact_location_city', true);
    $location_country = get_post_meta($post->ID, 'contact_location_country', true);

    $phone_main = get_post_meta($post->ID, 'contact_phone_main', true);
    $phone_admissions = get_post_meta($post->ID, 'contact_phone_admissions', true);
    $phone_fax = get_post_meta($post->ID, 'contact_phone_fax', true);

    $email_general = get_post_meta($post->ID, 'contact_email_general', true);
    $email_admissions = get_post_meta($post->ID, 'contact_email_admissions', true);
    $email_support = get_post_meta($post->ID, 'contact_email_support', true);

    // Set defaults if empty
    if (empty($location_title)) $location_title = 'Our Location';
    if (empty($location_address)) $location_address = '123 Education Street';
    if (empty($location_city)) $location_city = 'City, State 12345';
    if (empty($location_country)) $location_country = 'Country';
    if (empty($phone_main)) $phone_main = '+1 (123) 456-7890';
    if (empty($phone_admissions)) $phone_admissions = '+1 (123) 456-7891';
    if (empty($phone_fax)) $phone_fax = '+1 (123) 456-7892';
    if (empty($email_general)) $email_general = 'info@schoolname.edu';
    if (empty($email_admissions)) $email_admissions = 'admissions@schoolname.edu';
    if (empty($email_support)) $email_support = 'support@schoolname.edu';

    echo '<h4>' . __('Location Information', 'cbc-school-modern') . '</h4>';
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="contact_location_title">' . __('Location Title', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="text" id="contact_location_title" name="contact_location_title" value="' . esc_attr($location_title) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="contact_location_address">' . __('Street Address', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="text" id="contact_location_address" name="contact_location_address" value="' . esc_attr($location_address) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="contact_location_city">' . __('City, State/Province', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="text" id="contact_location_city" name="contact_location_city" value="' . esc_attr($location_city) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="contact_location_country">' . __('Country', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="text" id="contact_location_country" name="contact_location_country" value="' . esc_attr($location_country) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '</table>';

    echo '<h4>' . __('Phone Numbers', 'cbc-school-modern') . '</h4>';
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="contact_phone_main">' . __('Main Office', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="tel" id="contact_phone_main" name="contact_phone_main" value="' . esc_attr($phone_main) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="contact_phone_admissions">' . __('Admissions', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="tel" id="contact_phone_admissions" name="contact_phone_admissions" value="' . esc_attr($phone_admissions) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="contact_phone_fax">' . __('Fax', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="tel" id="contact_phone_fax" name="contact_phone_fax" value="' . esc_attr($phone_fax) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '</table>';

    echo '<h4>' . __('Email Addresses', 'cbc-school-modern') . '</h4>';
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="contact_email_general">' . __('General Inquiries', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="email" id="contact_email_general" name="contact_email_general" value="' . esc_attr($email_general) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="contact_email_admissions">' . __('Admissions', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="email" id="contact_email_admissions" name="contact_email_admissions" value="' . esc_attr($email_admissions) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="contact_email_support">' . __('Support', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="email" id="contact_email_support" name="contact_email_support" value="' . esc_attr($email_support) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '</table>';
}

/**
 * Contact Hours & Transportation meta box callback
 */
function cbc_school_contact_hours_meta_box_callback($post) {
    // Get existing values
    $hours_mon_fri = get_post_meta($post->ID, 'contact_hours_mon_fri', true);
    $hours_saturday = get_post_meta($post->ID, 'contact_hours_saturday', true);
    $hours_sunday = get_post_meta($post->ID, 'contact_hours_sunday', true);
    $transportation_info = get_post_meta($post->ID, 'contact_transportation_info', true);

    // Set defaults if empty
    if (empty($hours_mon_fri)) $hours_mon_fri = '8:00 AM - 4:30 PM';
    if (empty($hours_saturday)) $hours_saturday = '9:00 AM - 12:00 PM';
    if (empty($hours_sunday)) $hours_sunday = 'Closed';
    if (empty($transportation_info)) $transportation_info = 'Our school is easily accessible by public transportation. Bus routes 15, 30, and 45 stop nearby in front of the school. The nearest subway station is Central Station, a 10-minute walk away.';

    echo '<h4>' . __('Office Hours', 'cbc-school-modern') . '</h4>';
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="contact_hours_mon_fri">' . __('Monday - Friday', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="text" id="contact_hours_mon_fri" name="contact_hours_mon_fri" value="' . esc_attr($hours_mon_fri) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="contact_hours_saturday">' . __('Saturday', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="text" id="contact_hours_saturday" name="contact_hours_saturday" value="' . esc_attr($hours_saturday) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '<tr>';
    echo '<th><label for="contact_hours_sunday">' . __('Sunday', 'cbc-school-modern') . '</label></th>';
    echo '<td><input type="text" id="contact_hours_sunday" name="contact_hours_sunday" value="' . esc_attr($hours_sunday) . '" class="regular-text" /></td>';
    echo '</tr>';
    echo '</table>';

    echo '<h4>' . __('Transportation Information', 'cbc-school-modern') . '</h4>';
    echo '<table class="form-table">';
    echo '<tr>';
    echo '<th><label for="contact_transportation_info">' . __('Transportation Details', 'cbc-school-modern') . '</label></th>';
    echo '<td><textarea id="contact_transportation_info" name="contact_transportation_info" rows="4" class="large-text">' . esc_textarea($transportation_info) . '</textarea></td>';
    echo '</tr>';
    echo '</table>';
}

/**
 * Contact FAQ meta box callback
 */
function cbc_school_contact_faq_meta_box_callback($post) {
    // Get existing FAQ items
    $faq_items = array();
    for ($i = 1; $i <= 4; $i++) {
        $question = get_post_meta($post->ID, "contact_faq_{$i}_question", true);
        $answer = get_post_meta($post->ID, "contact_faq_{$i}_answer", true);
        $faq_items[$i] = array('question' => $question, 'answer' => $answer);
    }

    // Set defaults if empty
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
            'answer' => 'Yes, campus tours are available by appointment. Please contact our admissions office to schedule a tour that ensures your message reaches the right department.'
        ),
        4 => array(
            'question' => 'Who should I contact for specific departments?',
            'answer' => 'For specific inquiries, please use the subject dropdown in our contact form to ensure your message reaches the right department.'
        )
    );

    echo '<p>' . __('Manage frequently asked questions for the contact page.', 'cbc-school-modern') . '</p>';

    for ($i = 1; $i <= 4; $i++) {
        $question = !empty($faq_items[$i]['question']) ? $faq_items[$i]['question'] : $default_faqs[$i]['question'];
        $answer = !empty($faq_items[$i]['answer']) ? $faq_items[$i]['answer'] : $default_faqs[$i]['answer'];

        echo '<h4>' . sprintf(__('FAQ Item %d', 'cbc-school-modern'), $i) . '</h4>';
        echo '<table class="form-table">';
        echo '<tr>';
        echo '<th><label for="contact_faq_' . $i . '_question">' . __('Question', 'cbc-school-modern') . '</label></th>';
        echo '<td><input type="text" id="contact_faq_' . $i . '_question" name="contact_faq_' . $i . '_question" value="' . esc_attr($question) . '" class="large-text" /></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th><label for="contact_faq_' . $i . '_answer">' . __('Answer', 'cbc-school-modern') . '</label></th>';
        echo '<td><textarea id="contact_faq_' . $i . '_answer" name="contact_faq_' . $i . '_answer" rows="3" class="large-text">' . esc_textarea($answer) . '</textarea></td>';
        echo '</tr>';
        echo '</table>';
    }
}

/**
 * Save meta box data
 */
function cbc_school_save_meta_box_data($post_id) {
    // Check if nonce is valid
    if (!isset($_POST['cbc_school_event_meta_box_nonce']) && !isset($_POST['cbc_school_staff_meta_box_nonce']) && !isset($_POST['cbc_school_contact_meta_box_nonce'])) {
        return;
    }

    // Verify nonce
    if (isset($_POST['cbc_school_event_meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['cbc_school_event_meta_box_nonce'], 'cbc_school_event_meta_box')) {
            return;
        }
    }

    if (isset($_POST['cbc_school_staff_meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['cbc_school_staff_meta_box_nonce'], 'cbc_school_staff_meta_box')) {
            return;
        }
    }

    if (isset($_POST['cbc_school_contact_meta_box_nonce'])) {
        if (!wp_verify_nonce($_POST['cbc_school_contact_meta_box_nonce'], 'cbc_school_contact_meta_box')) {
            return;
        }
    }

    // Check user permissions
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save event meta
    if (isset($_POST['event_date'])) {
        update_post_meta($post_id, 'event_date', sanitize_text_field($_POST['event_date']));
    }
    if (isset($_POST['event_time'])) {
        update_post_meta($post_id, 'event_time', sanitize_text_field($_POST['event_time']));
    }
    if (isset($_POST['event_location'])) {
        update_post_meta($post_id, 'event_location', sanitize_text_field($_POST['event_location']));
    }

    // Save staff meta
    if (isset($_POST['staff_position'])) {
        update_post_meta($post_id, 'staff_position', sanitize_text_field($_POST['staff_position']));
    }
    if (isset($_POST['staff_department'])) {
        update_post_meta($post_id, 'staff_department', sanitize_text_field($_POST['staff_department']));
    }
    if (isset($_POST['staff_email'])) {
        update_post_meta($post_id, 'staff_email', sanitize_email($_POST['staff_email']));
    }
    if (isset($_POST['staff_phone'])) {
        update_post_meta($post_id, 'staff_phone', sanitize_text_field($_POST['staff_phone']));
    }

    // Save contact page meta
    if (isset($_POST['contact_hero_title'])) {
        update_post_meta($post_id, 'contact_hero_title', sanitize_text_field($_POST['contact_hero_title']));
    }
    if (isset($_POST['contact_hero_description'])) {
        update_post_meta($post_id, 'contact_hero_description', sanitize_textarea_field($_POST['contact_hero_description']));
    }

    // Contact information
    if (isset($_POST['contact_location_title'])) {
        update_post_meta($post_id, 'contact_location_title', sanitize_text_field($_POST['contact_location_title']));
    }
    if (isset($_POST['contact_location_address'])) {
        update_post_meta($post_id, 'contact_location_address', sanitize_text_field($_POST['contact_location_address']));
    }
    if (isset($_POST['contact_location_city'])) {
        update_post_meta($post_id, 'contact_location_city', sanitize_text_field($_POST['contact_location_city']));
    }
    if (isset($_POST['contact_location_country'])) {
        update_post_meta($post_id, 'contact_location_country', sanitize_text_field($_POST['contact_location_country']));
    }

    // Phone numbers
    if (isset($_POST['contact_phone_main'])) {
        update_post_meta($post_id, 'contact_phone_main', sanitize_text_field($_POST['contact_phone_main']));
    }
    if (isset($_POST['contact_phone_admissions'])) {
        update_post_meta($post_id, 'contact_phone_admissions', sanitize_text_field($_POST['contact_phone_admissions']));
    }
    if (isset($_POST['contact_phone_fax'])) {
        update_post_meta($post_id, 'contact_phone_fax', sanitize_text_field($_POST['contact_phone_fax']));
    }

    // Email addresses
    if (isset($_POST['contact_email_general'])) {
        update_post_meta($post_id, 'contact_email_general', sanitize_email($_POST['contact_email_general']));
    }
    if (isset($_POST['contact_email_admissions'])) {
        update_post_meta($post_id, 'contact_email_admissions', sanitize_email($_POST['contact_email_admissions']));
    }
    if (isset($_POST['contact_email_support'])) {
        update_post_meta($post_id, 'contact_email_support', sanitize_email($_POST['contact_email_support']));
    }

    // Office hours
    if (isset($_POST['contact_hours_mon_fri'])) {
        update_post_meta($post_id, 'contact_hours_mon_fri', sanitize_text_field($_POST['contact_hours_mon_fri']));
    }
    if (isset($_POST['contact_hours_saturday'])) {
        update_post_meta($post_id, 'contact_hours_saturday', sanitize_text_field($_POST['contact_hours_saturday']));
    }
    if (isset($_POST['contact_hours_sunday'])) {
        update_post_meta($post_id, 'contact_hours_sunday', sanitize_text_field($_POST['contact_hours_sunday']));
    }

    // Transportation
    if (isset($_POST['contact_transportation_info'])) {
        update_post_meta($post_id, 'contact_transportation_info', sanitize_textarea_field($_POST['contact_transportation_info']));
    }

    // FAQ items
    for ($i = 1; $i <= 4; $i++) {
        if (isset($_POST["contact_faq_{$i}_question"])) {
            update_post_meta($post_id, "contact_faq_{$i}_question", sanitize_text_field($_POST["contact_faq_{$i}_question"]));
        }
        if (isset($_POST["contact_faq_{$i}_answer"])) {
            update_post_meta($post_id, "contact_faq_{$i}_answer", sanitize_textarea_field($_POST["contact_faq_{$i}_answer"]));
        }
    }
}
add_action('save_post', 'cbc_school_save_meta_box_data');

/**
 * Add admin notice if pages are missing
 */
function cbc_school_admin_notices() {
    $about_page = get_page_by_path('about');
    $academics_page = get_page_by_path('academics');
    $contact_page = get_page_by_path('contact');

    $missing_pages = array();
    if (!$about_page) $missing_pages[] = 'About';
    if (!$academics_page) $missing_pages[] = 'Academics';
    if (!$contact_page) $missing_pages[] = 'Contact';

    if (!empty($missing_pages)) {
        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p><strong>CBC School Theme:</strong> ';

        if (count($missing_pages) === 1) {
            echo 'The ' . $missing_pages[0] . ' page is missing. ';
        } elseif (count($missing_pages) === 2) {
            echo 'The ' . implode(' and ', $missing_pages) . ' pages are missing. ';
        } else {
            echo 'The ' . implode(', ', array_slice($missing_pages, 0, -1)) . ', and ' . end($missing_pages) . ' pages are missing. ';
        }

        echo '<a href="' . admin_url('admin.php?page=cbc-school-setup') . '">Go to Theme Setup</a> to create them.</p>';
        echo '</div>';
    }
}
add_action('admin_notices', 'cbc_school_admin_notices');

/**
 * Handle manual page creation
 */
function cbc_school_handle_admin_actions() {
    if (isset($_GET['page']) && $_GET['page'] === 'cbc-school-setup' && isset($_GET['action'])) {
        if ($_GET['action'] === 'create-pages' && current_user_can('manage_options')) {
            cbc_school_create_default_pages();

            // Redirect back to admin with success message
            wp_redirect(admin_url('admin.php?page=cbc-school-setup&created=all'));
            exit;
        }
    }
}
add_action('admin_init', 'cbc_school_handle_admin_actions');

/**
 * Create default pages on theme activation
 */
function cbc_school_create_default_pages() {
    // Check if About page exists
    $about_page = get_page_by_path('about');

    if (!$about_page) {
        // Create About page
        $about_page_id = wp_insert_post(array(
            'post_title' => 'About Us',
            'post_name' => 'about',
            'post_content' => 'This page uses the About Us template to display comprehensive information about our school.',
            'post_status' => 'publish',
            'post_type' => 'page',
            'meta_input' => array(
                '_wp_page_template' => 'page-about.php'
            )
        ));

        if ($about_page_id && !is_wp_error($about_page_id)) {
            // Set the page template
            update_post_meta($about_page_id, '_wp_page_template', 'page-about.php');

            // Log success
            error_log('CBC School Theme: About page created successfully with ID: ' . $about_page_id);
        } else {
            // Log error
            error_log('CBC School Theme: Failed to create About page. Error: ' . (is_wp_error($about_page_id) ? $about_page_id->get_error_message() : 'Unknown error'));
        }
    } else {
        // Page exists, ensure it has the correct template
        $current_template = get_post_meta($about_page->ID, '_wp_page_template', true);
        if ($current_template !== 'page-about.php') {
            update_post_meta($about_page->ID, '_wp_page_template', 'page-about.php');
            error_log('CBC School Theme: Updated About page template to page-about.php');
        }
    }

    // Check if Programs page exists
    $programs_page = get_page_by_path('programs');

    if (!$programs_page) {
        // Create Programs page
        $programs_page_id = wp_insert_post(array(
            'post_title' => 'Programs',
            'post_name' => 'programs',
            'post_content' => 'This page uses the Programs template to display comprehensive information about our curriculum and educational programs.',
            'post_status' => 'publish',
            'post_type' => 'page',
            'meta_input' => array(
                '_wp_page_template' => 'page-programs.php'
            )
        ));

        if ($programs_page_id && !is_wp_error($programs_page_id)) {
            // Set the page template
            update_post_meta($programs_page_id, '_wp_page_template', 'page-programs.php');

            // Log success
            error_log('CBC School Theme: Programs page created successfully with ID: ' . $programs_page_id);
        } else {
            // Log error
            error_log('CBC School Theme: Failed to create Programs page. Error: ' . (is_wp_error($programs_page_id) ? $programs_page_id->get_error_message() : 'Unknown error'));
        }
    } else {
        // Page exists, ensure it has the correct template
        $current_template = get_post_meta($programs_page->ID, '_wp_page_template', true);
        if ($current_template !== 'page-programs.php') {
            update_post_meta($programs_page->ID, '_wp_page_template', 'page-programs.php');
            error_log('CBC School Theme: Updated Programs page template to page-programs.php');
        }
    }

    // Check if Contact page exists
    $contact_page = get_page_by_path('contact');

    if (!$contact_page) {
        // Create Contact page
        $contact_page_id = wp_insert_post(array(
            'post_title' => 'Contact',
            'post_name' => 'contact',
            'post_content' => 'This page uses the Contact template to display contact information, forms, and location details.',
            'post_status' => 'publish',
            'post_type' => 'page',
            'meta_input' => array(
                '_wp_page_template' => 'page-contact.php'
            )
        ));

        if ($contact_page_id && !is_wp_error($contact_page_id)) {
            // Set the page template
            update_post_meta($contact_page_id, '_wp_page_template', 'page-contact.php');

            // Log success
            error_log('CBC School Theme: Contact page created successfully with ID: ' . $contact_page_id);
        } else {
            // Log error
            error_log('CBC School Theme: Failed to create Contact page. Error: ' . (is_wp_error($contact_page_id) ? $contact_page_id->get_error_message() : 'Unknown error'));
        }
    } else {
        // Page exists, ensure it has the correct template
        $current_template = get_post_meta($contact_page->ID, '_wp_page_template', true);
        if ($current_template !== 'page-contact.php') {
            update_post_meta($contact_page->ID, '_wp_page_template', 'page-contact.php');
            error_log('CBC School Theme: Updated Contact page template to page-contact.php');
        }
    }

    // Check if Gallery page exists
    $gallery_page = get_page_by_path('gallery');

    if (!$gallery_page) {
        // Create Gallery page
        $gallery_page_id = wp_insert_post(array(
            'post_title' => 'Gallery',
            'post_name' => 'gallery',
            'post_content' => 'This page uses the Gallery template to display school photos organized by categories.',
            'post_status' => 'publish',
            'post_type' => 'page',
            'meta_input' => array(
                '_wp_page_template' => 'page-gallery.php'
            )
        ));

        if ($gallery_page_id && !is_wp_error($gallery_page_id)) {
            // Set the page template
            update_post_meta($gallery_page_id, '_wp_page_template', 'page-gallery.php');

            // Log success
            error_log('CBC School Theme: Gallery page created successfully with ID: ' . $gallery_page_id);
        } else {
            // Log error
            error_log('CBC School Theme: Failed to create Gallery page. Error: ' . (is_wp_error($gallery_page_id) ? $gallery_page_id->get_error_message() : 'Unknown error'));
        }
    } else {
        // Page exists, ensure it has the correct template
        $current_template = get_post_meta($gallery_page->ID, '_wp_page_template', true);
        if ($current_template !== 'page-gallery.php') {
            update_post_meta($gallery_page->ID, '_wp_page_template', 'page-gallery.php');
            error_log('CBC School Theme: Updated Gallery page template to page-gallery.php');
        }
    }

    // Check if Admissions page exists
    $admissions_page = get_page_by_path('admissions');

    if (!$admissions_page) {
        // Create Admissions page
        $admissions_page_id = wp_insert_post(array(
            'post_title' => 'Admissions',
            'post_name' => 'admissions',
            'post_content' => 'This page uses the Admissions template to display comprehensive admission information, requirements, and application form.',
            'post_status' => 'publish',
            'post_type' => 'page',
            'meta_input' => array(
                '_wp_page_template' => 'page-admissions.php'
            )
        ));

        if ($admissions_page_id && !is_wp_error($admissions_page_id)) {
            // Set the page template
            update_post_meta($admissions_page_id, '_wp_page_template', 'page-admissions.php');

            // Log success
            error_log('CBC School Theme: Admissions page created successfully with ID: ' . $admissions_page_id);
        } else {
            // Log error
            error_log('CBC School Theme: Failed to create Admissions page. Error: ' . (is_wp_error($admissions_page_id) ? $admissions_page_id->get_error_message() : 'Unknown error'));
        }
    } else {
        // Page exists, ensure it has the correct template
        $current_template = get_post_meta($admissions_page->ID, '_wp_page_template', true);
        if ($current_template !== 'page-admissions.php') {
            update_post_meta($admissions_page->ID, '_wp_page_template', 'page-admissions.php');
            error_log('CBC School Theme: Updated Admissions page template to page-admissions.php');
        }
    }

    // Create sample staff members if none exist
    $staff_query = new WP_Query(array(
        'post_type' => 'staff',
        'posts_per_page' => 1,
        'post_status' => 'publish'
    ));

    if (!$staff_query->have_posts()) {
        $sample_staff = array(
            array(
                'name' => 'Dr. Mary Wanjiku',
                'position' => 'Head Teacher',
                'department' => 'Administration',
                'email' => 'headteacher@cbcschool.ac.ke',
                'phone' => '+254 700 123 456',
                'bio' => 'Dr. Wanjiku brings over 20 years of educational leadership experience to our school. She holds a PhD in Educational Administration and is passionate about implementing innovative teaching methods.'
            ),
            array(
                'name' => 'Mr. James Kiprotich',
                'position' => 'Deputy Head Teacher',
                'department' => 'Administration',
                'email' => 'deputy@cbcschool.ac.ke',
                'phone' => '+254 700 123 457',
                'bio' => 'Mr. Kiprotich oversees academic programs and curriculum implementation. He has been instrumental in our successful transition to the CBC system.'
            ),
            array(
                'name' => 'Ms. Grace Achieng',
                'position' => 'Grade 1 Teacher',
                'department' => 'Teaching Staff',
                'email' => 'grace.achieng@cbcschool.ac.ke',
                'bio' => 'Ms. Achieng specializes in early childhood education and has a gift for making learning fun and engaging for our youngest learners.'
            ),
            array(
                'name' => 'Mr. David Mwangi',
                'position' => 'Mathematics Teacher',
                'department' => 'Teaching Staff',
                'email' => 'david.mwangi@cbcschool.ac.ke',
                'bio' => 'Mr. Mwangi makes mathematics accessible and enjoyable for students of all levels. He holds a degree in Mathematics Education.'
            ),
            array(
                'name' => 'Mrs. Sarah Njeri',
                'position' => 'Science Teacher',
                'department' => 'Teaching Staff',
                'email' => 'sarah.njeri@cbcschool.ac.ke',
                'bio' => 'Mrs. Njeri brings science to life through hands-on experiments and real-world applications. She has a background in Biology and Chemistry.'
            ),
            array(
                'name' => 'Mr. Peter Ochieng',
                'position' => 'ICT Coordinator',
                'department' => 'Support Staff',
                'email' => 'ict@cbcschool.ac.ke',
                'bio' => 'Mr. Ochieng manages our technology infrastructure and teaches digital literacy skills to students and staff.'
            )
        );

        foreach ($sample_staff as $staff_member) {
            $staff_id = wp_insert_post(array(
                'post_title' => $staff_member['name'],
                'post_content' => $staff_member['bio'],
                'post_status' => 'publish',
                'post_type' => 'staff'
            ));

            if ($staff_id && !is_wp_error($staff_id)) {
                update_post_meta($staff_id, 'staff_position', $staff_member['position']);
                update_post_meta($staff_id, 'staff_department', $staff_member['department']);
                update_post_meta($staff_id, 'staff_email', $staff_member['email']);
                if (isset($staff_member['phone'])) {
                    update_post_meta($staff_id, 'staff_phone', $staff_member['phone']);
                }
            }
        }
    }

    wp_reset_postdata();

    // Flush rewrite rules to ensure permalinks work
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'cbc_school_create_default_pages');

/**
 * Force create pages if they don't exist (can be called manually)
 */
function cbc_school_force_create_pages() {
    cbc_school_create_default_pages();

    // Also ensure permalinks are flushed
    flush_rewrite_rules();

    return true;
}

/**
 * Add a simple admin page for theme setup
 */
function cbc_school_add_admin_menu() {
    add_theme_page(
        'CBC School Setup',
        'Theme Setup',
        'manage_options',
        'cbc-school-setup',
        'cbc_school_setup_page'
    );
}
add_action('admin_menu', 'cbc_school_add_admin_menu');

/**
 * Theme setup admin page
 */
function cbc_school_setup_page() {
    if (isset($_GET['created'])) {
        if ($_GET['created'] === 'about') {
            echo '<div class="notice notice-success"><p>About page created successfully!</p></div>';
        } elseif ($_GET['created'] === 'programs') {
            echo '<div class="notice notice-success"><p>Programs page created successfully!</p></div>';
        } elseif ($_GET['created'] === 'admissions') {
            echo '<div class="notice notice-success"><p>Admissions page created successfully!</p></div>';
        } elseif ($_GET['created'] === 'all') {
            echo '<div class="notice notice-success"><p>All pages have been created/updated successfully!</p></div>';
        }
    }

    $about_page = get_page_by_path('about');
    $programs_page = get_page_by_path('programs');
    $admissions_page = get_page_by_path('admissions');
    $contact_page = get_page_by_path('contact');
    $gallery_page = get_page_by_path('gallery');

    echo '<div class="wrap">';
    echo '<h1>CBC School Theme Setup</h1>';

    echo '<h2>Page Status</h2>';
    echo '<table class="widefat">';
    echo '<thead><tr><th>Page</th><th>Status</th><th>Action</th></tr></thead>';
    echo '<tbody>';

    // About page status
    echo '<tr>';
    echo '<td>About Us</td>';
    if ($about_page) {
        echo '<td><span style="color: green;">✓ Created</span></td>';
        echo '<td><a href="' . get_permalink($about_page->ID) . '" target="_blank">View Page</a> | ';
        echo '<a href="' . admin_url('post.php?post=' . $about_page->ID . '&action=edit') . '">Edit</a></td>';
    } else {
        echo '<td><span style="color: red;">✗ Missing</span></td>';
        echo '<td><a href="' . admin_url('admin.php?page=cbc-school-setup&action=create-pages') . '" class="button">Create All Pages</a></td>';
    }
    echo '</tr>';

    // Programs page status
    echo '<tr>';
    echo '<td>Programs</td>';
    if ($programs_page) {
        echo '<td><span style="color: green;">✓ Created</span></td>';
        echo '<td><a href="' . get_permalink($programs_page->ID) . '" target="_blank">View Page</a> | ';
        echo '<a href="' . admin_url('post.php?post=' . $programs_page->ID . '&action=edit') . '">Edit</a></td>';
    } else {
        echo '<td><span style="color: red;">✗ Missing</span></td>';
        echo '<td><a href="' . admin_url('admin.php?page=cbc-school-setup&action=create-pages') . '" class="button">Create All Pages</a></td>';
    }
    echo '</tr>';

    // Admissions page status
    echo '<tr>';
    echo '<td>Admissions</td>';
    if ($admissions_page) {
        echo '<td><span style="color: green;">✓ Created</span></td>';
        echo '<td><a href="' . get_permalink($admissions_page->ID) . '" target="_blank">View Page</a> | ';
        echo '<a href="' . admin_url('post.php?post=' . $admissions_page->ID . '&action=edit') . '">Edit</a></td>';
    } else {
        echo '<td><span style="color: red;">✗ Missing</span></td>';
        echo '<td><a href="' . admin_url('admin.php?page=cbc-school-setup&action=create-pages') . '" class="button">Create All Pages</a></td>';
    }
    echo '</tr>';

    // Contact page status
    echo '<tr>';
    echo '<td>Contact</td>';
    if ($contact_page) {
        echo '<td><span style="color: green;">✓ Created</span></td>';
        echo '<td><a href="' . get_permalink($contact_page->ID) . '" target="_blank">View Page</a> | ';
        echo '<a href="' . admin_url('post.php?post=' . $contact_page->ID . '&action=edit') . '">Edit</a></td>';
    } else {
        echo '<td><span style="color: red;">✗ Missing</span></td>';
        echo '<td><a href="' . admin_url('admin.php?page=cbc-school-setup&action=create-pages') . '" class="button">Create All Pages</a></td>';
    }
    echo '</tr>';

    // Gallery page status
    echo '<tr>';
    echo '<td>Gallery</td>';
    if ($gallery_page) {
        echo '<td><span style="color: green;">✓ Created</span></td>';
        echo '<td><a href="' . get_permalink($gallery_page->ID) . '" target="_blank">View Page</a> | ';
        echo '<a href="' . admin_url('post.php?post=' . $gallery_page->ID . '&action=edit') . '">Edit</a></td>';
    } else {
        echo '<td><span style="color: red;">✗ Missing</span></td>';
        echo '<td><a href="' . admin_url('admin.php?page=cbc-school-setup&action=create-pages') . '" class="button">Create All Pages</a></td>';
    }
    echo '</tr>';

    echo '</tbody>';
    echo '</table>';

    echo '<h2>Quick Actions</h2>';
    echo '<p><a href="' . admin_url('admin.php?page=cbc-school-setup&action=create-pages') . '" class="button button-primary">Create All Missing Pages</a></p>';

    echo '<h2>Troubleshooting</h2>';
    echo '<p>If pages are not working:</p>';
    echo '<ol>';
    echo '<li>Go to <a href="' . admin_url('options-permalink.php') . '">Settings → Permalinks</a> and click "Save Changes"</li>';
    echo '<li>Make sure your theme is activated</li>';
    echo '<li>Check that the page template is assigned correctly</li>';
    echo '</ol>';

    echo '</div>';
}
