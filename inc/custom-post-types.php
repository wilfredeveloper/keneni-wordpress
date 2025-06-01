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

    // Admissions Applications post type
    register_post_type('admissions_app', array(
        'labels' => array(
            'name' => __('Admissions Applications', 'cbc-school-modern'),
            'singular_name' => __('Application', 'cbc-school-modern'),
            'add_new' => __('Add New Application', 'cbc-school-modern'),
            'add_new_item' => __('Add New Application', 'cbc-school-modern'),
            'edit_item' => __('View Application', 'cbc-school-modern'),
            'view_item' => __('View Application', 'cbc-school-modern'),
            'search_items' => __('Search Applications', 'cbc-school-modern'),
            'not_found' => __('No applications found', 'cbc-school-modern'),
            'not_found_in_trash' => __('No applications found in trash', 'cbc-school-modern'),
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'capability_type' => 'post',
        'capabilities' => array(
            'create_posts' => false, // Removes support for the "Add New" function
        ),
        'map_meta_cap' => true,
        'supports' => array('title'),
        'menu_icon' => 'dashicons-forms',
        'menu_position' => 25,
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

/**
 * Handle admissions application form submission
 */
function cbc_school_handle_admissions_form() {
    // Check if form was submitted
    if (!isset($_POST['admissions_nonce']) || !wp_verify_nonce($_POST['admissions_nonce'], 'admissions_application')) {
        return;
    }

    // Sanitize and validate form data
    $student_first_name = sanitize_text_field($_POST['student_first_name']);
    $student_last_name = sanitize_text_field($_POST['student_last_name']);
    $student_dob = sanitize_text_field($_POST['student_dob']);
    $student_gender = sanitize_text_field($_POST['student_gender']);
    $grade_applying = sanitize_text_field($_POST['grade_applying']);
    $academic_year = sanitize_text_field($_POST['academic_year']);

    $parent_first_name = sanitize_text_field($_POST['parent_first_name']);
    $parent_last_name = sanitize_text_field($_POST['parent_last_name']);
    $relationship = sanitize_text_field($_POST['relationship']);
    $parent_email = sanitize_email($_POST['parent_email']);
    $parent_phone = sanitize_text_field($_POST['parent_phone']);
    $parent_address = sanitize_textarea_field($_POST['parent_address']);

    $current_school = sanitize_text_field($_POST['current_school']);
    $additional_info = sanitize_textarea_field($_POST['additional_info']);

    // Validate required fields
    if (empty($student_first_name) || empty($student_last_name) || empty($grade_applying) ||
        empty($academic_year) || empty($parent_first_name) || empty($parent_last_name) ||
        empty($relationship) || empty($parent_email) || empty($parent_phone)) {
        wp_die('Please fill in all required fields.');
    }

    // Create application post
    $application_title = $student_first_name . ' ' . $student_last_name . ' - ' . $grade_applying . ' (' . $academic_year . ')';

    $post_id = wp_insert_post(array(
        'post_title' => $application_title,
        'post_type' => 'admissions_app',
        'post_status' => 'publish',
        'meta_input' => array(
            'student_first_name' => $student_first_name,
            'student_last_name' => $student_last_name,
            'student_dob' => $student_dob,
            'student_gender' => $student_gender,
            'grade_applying' => $grade_applying,
            'academic_year' => $academic_year,
            'parent_first_name' => $parent_first_name,
            'parent_last_name' => $parent_last_name,
            'relationship' => $relationship,
            'parent_email' => $parent_email,
            'parent_phone' => $parent_phone,
            'parent_address' => $parent_address,
            'current_school' => $current_school,
            'additional_info' => $additional_info,
            'application_date' => current_time('mysql'),
            'application_status' => 'pending'
        )
    ));

    if ($post_id) {
        // Send email notification to admin
        $admin_email = get_option('admin_email');
        $subject = 'New Admission Application: ' . $application_title;
        $message = "A new admission application has been submitted.\n\n";
        $message .= "Student: {$student_first_name} {$student_last_name}\n";
        $message .= "Grade: {$grade_applying}\n";
        $message .= "Academic Year: {$academic_year}\n";
        $message .= "Parent/Guardian: {$parent_first_name} {$parent_last_name}\n";
        $message .= "Email: {$parent_email}\n";
        $message .= "Phone: {$parent_phone}\n\n";
        $message .= "View application in admin: " . admin_url('post.php?post=' . $post_id . '&action=edit');

        wp_mail($admin_email, $subject, $message);

        // Send confirmation email to parent
        $parent_subject = 'Application Received - ' . get_bloginfo('name');
        $parent_message = "Dear {$parent_first_name} {$parent_last_name},\n\n";
        $parent_message .= "Thank you for submitting an admission application for {$student_first_name}.\n\n";
        $parent_message .= "Application Details:\n";
        $parent_message .= "Student: {$student_first_name} {$student_last_name}\n";
        $parent_message .= "Grade Applying For: {$grade_applying}\n";
        $parent_message .= "Academic Year: {$academic_year}\n\n";
        $parent_message .= "We will review your application and contact you within 48 hours.\n\n";
        $parent_message .= "Best regards,\n";
        $parent_message .= "Admissions Office\n";
        $parent_message .= get_bloginfo('name');

        wp_mail($parent_email, $parent_subject, $parent_message);

        // Redirect with success message
        wp_redirect(add_query_arg('application_submitted', '1', wp_get_referer()));
        exit;
    } else {
        wp_die('There was an error submitting your application. Please try again.');
    }
}
add_action('init', 'cbc_school_handle_admissions_form');

/**
 * Customize admissions applications admin columns
 */
function cbc_school_admissions_admin_columns($columns) {
    $columns = array(
        'cb' => $columns['cb'],
        'title' => 'Student Name',
        'grade' => 'Grade',
        'academic_year' => 'Academic Year',
        'parent_contact' => 'Parent Contact',
        'application_date' => 'Application Date',
        'status' => 'Status'
    );
    return $columns;
}
add_filter('manage_admissions_app_posts_columns', 'cbc_school_admissions_admin_columns');

/**
 * Populate custom admin columns
 */
function cbc_school_admissions_admin_column_content($column, $post_id) {
    switch ($column) {
        case 'grade':
            echo esc_html(get_post_meta($post_id, 'grade_applying', true));
            break;
        case 'academic_year':
            echo esc_html(get_post_meta($post_id, 'academic_year', true));
            break;
        case 'parent_contact':
            $parent_name = get_post_meta($post_id, 'parent_first_name', true) . ' ' . get_post_meta($post_id, 'parent_last_name', true);
            $parent_email = get_post_meta($post_id, 'parent_email', true);
            $parent_phone = get_post_meta($post_id, 'parent_phone', true);
            echo esc_html($parent_name) . '<br>';
            echo '<a href="mailto:' . esc_attr($parent_email) . '">' . esc_html($parent_email) . '</a><br>';
            echo '<a href="tel:' . esc_attr($parent_phone) . '">' . esc_html($parent_phone) . '</a>';
            break;
        case 'application_date':
            echo esc_html(get_post_meta($post_id, 'application_date', true));
            break;
        case 'status':
            $status = get_post_meta($post_id, 'application_status', true);
            $status_class = $status === 'approved' ? 'approved' : ($status === 'rejected' ? 'rejected' : 'pending');
            echo '<span class="status-badge status-' . esc_attr($status_class) . '">' . esc_html(ucfirst($status)) . '</span>';
            break;
    }
}
add_action('manage_admissions_app_posts_custom_column', 'cbc_school_admissions_admin_column_content', 10, 2);

/**
 * Add meta boxes for application details
 */
function cbc_school_add_admissions_meta_boxes() {
    add_meta_box(
        'admissions_student_info',
        'Student Information',
        'cbc_school_student_info_meta_box',
        'admissions_app',
        'normal',
        'high'
    );

    add_meta_box(
        'admissions_parent_info',
        'Parent/Guardian Information',
        'cbc_school_parent_info_meta_box',
        'admissions_app',
        'normal',
        'high'
    );

    add_meta_box(
        'admissions_additional_info',
        'Additional Information',
        'cbc_school_additional_info_meta_box',
        'admissions_app',
        'normal',
        'high'
    );

    add_meta_box(
        'admissions_status',
        'Application Status',
        'cbc_school_status_meta_box',
        'admissions_app',
        'side',
        'high'
    );
}
add_action('add_meta_boxes', 'cbc_school_add_admissions_meta_boxes');

/**
 * Student information meta box
 */
function cbc_school_student_info_meta_box($post) {
    $student_first_name = get_post_meta($post->ID, 'student_first_name', true);
    $student_last_name = get_post_meta($post->ID, 'student_last_name', true);
    $student_dob = get_post_meta($post->ID, 'student_dob', true);
    $student_gender = get_post_meta($post->ID, 'student_gender', true);
    $grade_applying = get_post_meta($post->ID, 'grade_applying', true);
    $academic_year = get_post_meta($post->ID, 'academic_year', true);

    echo '<table class="form-table">';
    echo '<tr><th>First Name:</th><td>' . esc_html($student_first_name) . '</td></tr>';
    echo '<tr><th>Last Name:</th><td>' . esc_html($student_last_name) . '</td></tr>';
    echo '<tr><th>Date of Birth:</th><td>' . esc_html($student_dob) . '</td></tr>';
    echo '<tr><th>Gender:</th><td>' . esc_html(ucfirst($student_gender)) . '</td></tr>';
    echo '<tr><th>Grade Applying For:</th><td>' . esc_html($grade_applying) . '</td></tr>';
    echo '<tr><th>Academic Year:</th><td>' . esc_html($academic_year) . '</td></tr>';
    echo '</table>';
}

/**
 * Parent information meta box
 */
function cbc_school_parent_info_meta_box($post) {
    $parent_first_name = get_post_meta($post->ID, 'parent_first_name', true);
    $parent_last_name = get_post_meta($post->ID, 'parent_last_name', true);
    $relationship = get_post_meta($post->ID, 'relationship', true);
    $parent_email = get_post_meta($post->ID, 'parent_email', true);
    $parent_phone = get_post_meta($post->ID, 'parent_phone', true);
    $parent_address = get_post_meta($post->ID, 'parent_address', true);

    echo '<table class="form-table">';
    echo '<tr><th>First Name:</th><td>' . esc_html($parent_first_name) . '</td></tr>';
    echo '<tr><th>Last Name:</th><td>' . esc_html($parent_last_name) . '</td></tr>';
    echo '<tr><th>Relationship:</th><td>' . esc_html(ucfirst($relationship)) . '</td></tr>';
    echo '<tr><th>Email:</th><td><a href="mailto:' . esc_attr($parent_email) . '">' . esc_html($parent_email) . '</a></td></tr>';
    echo '<tr><th>Phone:</th><td><a href="tel:' . esc_attr($parent_phone) . '">' . esc_html($parent_phone) . '</a></td></tr>';
    echo '<tr><th>Address:</th><td>' . esc_html($parent_address) . '</td></tr>';
    echo '</table>';
}

/**
 * Additional information meta box
 */
function cbc_school_additional_info_meta_box($post) {
    $current_school = get_post_meta($post->ID, 'current_school', true);
    $additional_info = get_post_meta($post->ID, 'additional_info', true);

    echo '<table class="form-table">';
    echo '<tr><th>Current School:</th><td>' . esc_html($current_school) . '</td></tr>';
    echo '<tr><th>Additional Information:</th><td>' . esc_html($additional_info) . '</td></tr>';
    echo '</table>';
}

/**
 * Status meta box
 */
function cbc_school_status_meta_box($post) {
    $status = get_post_meta($post->ID, 'application_status', true);
    $application_date = get_post_meta($post->ID, 'application_date', true);

    wp_nonce_field('admissions_status_nonce', 'admissions_status_nonce');

    echo '<p><strong>Application Date:</strong><br>' . esc_html($application_date) . '</p>';
    echo '<p><strong>Status:</strong></p>';
    echo '<select name="application_status" style="width: 100%;">';
    echo '<option value="pending"' . selected($status, 'pending', false) . '>Pending</option>';
    echo '<option value="approved"' . selected($status, 'approved', false) . '>Approved</option>';
    echo '<option value="rejected"' . selected($status, 'rejected', false) . '>Rejected</option>';
    echo '</select>';
}

/**
 * Save application status
 */
function cbc_school_save_application_status($post_id) {
    if (!isset($_POST['admissions_status_nonce']) || !wp_verify_nonce($_POST['admissions_status_nonce'], 'admissions_status_nonce')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['application_status'])) {
        update_post_meta($post_id, 'application_status', sanitize_text_field($_POST['application_status']));
    }
}
add_action('save_post', 'cbc_school_save_application_status');

/**
 * Add admin CSS for application status badges
 */
function cbc_school_admin_styles() {
    echo '<style>
        .status-badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .status-pending {
            background: #fef3cd;
            color: #856404;
        }
        .status-approved {
            background: #d1ecf1;
            color: #0c5460;
        }
        .status-rejected {
            background: #f8d7da;
            color: #721c24;
        }
    </style>';
}
add_action('admin_head', 'cbc_school_admin_styles');
