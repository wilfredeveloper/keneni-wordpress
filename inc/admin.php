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
 * Save meta box data
 */
function cbc_school_save_meta_box_data($post_id) {
    // Check if nonce is valid
    if (!isset($_POST['cbc_school_event_meta_box_nonce']) && !isset($_POST['cbc_school_staff_meta_box_nonce'])) {
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
}
add_action('save_post', 'cbc_school_save_meta_box_data');
