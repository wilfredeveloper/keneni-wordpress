<?php
/**
 * Post Card Template Part
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get post data
$post_id = get_the_ID();
$post_type = get_post_type();
$post_date = get_the_date();
$post_title = get_the_title();
$post_excerpt = get_the_excerpt();
$post_permalink = get_permalink();
$reading_time = cbc_school_get_reading_time(get_the_content());

// Get featured image
$featured_image = '';
if (has_post_thumbnail()) {
    $featured_image = get_the_post_thumbnail_url($post_id, 'card-image');
}

// Get post meta based on post type
$meta_info = array();
if ($post_type === 'events') {
    $event_date = get_post_meta($post_id, 'event_date', true);
    $event_location = get_post_meta($post_id, 'event_location', true);
    
    if ($event_date) {
        $meta_info['date'] = date('M d, Y', strtotime($event_date));
    }
    if ($event_location) {
        $meta_info['location'] = $event_location;
    }
} elseif ($post_type === 'staff') {
    $staff_position = get_post_meta($post_id, 'staff_position', true);
    $staff_department = get_post_meta($post_id, 'staff_department', true);
    
    if ($staff_position) {
        $meta_info['position'] = $staff_position;
    }
    if ($staff_department) {
        $meta_info['department'] = $staff_department;
    }
}

// Get post categories or custom taxonomy
$categories = array();
if ($post_type === 'post') {
    $post_categories = get_the_category();
    if ($post_categories) {
        foreach ($post_categories as $category) {
            $categories[] = $category->name;
        }
    }
}
?>

<article class="post-card <?php echo esc_attr($post_type); ?>-card" id="post-<?php echo esc_attr($post_id); ?>">
    <?php if ($featured_image) : ?>
        <div class="post-card-image">
            <a href="<?php echo esc_url($post_permalink); ?>" aria-label="<?php echo esc_attr(sprintf(__('Read more about %s', 'cbc-school-modern'), $post_title)); ?>">
                <img src="<?php echo esc_url($featured_image); ?>" alt="<?php echo esc_attr($post_title); ?>" loading="lazy" />
            </a>
        </div>
    <?php endif; ?>
    
    <div class="post-card-content">
        <div class="post-card-meta">
            <?php if (!empty($categories)) : ?>
                <span class="post-category"><?php echo esc_html($categories[0]); ?></span>
            <?php endif; ?>
            
            <?php if ($post_type === 'post') : ?>
                <span class="post-date"><?php echo esc_html($post_date); ?></span>
                <span class="reading-time"><?php echo esc_html($reading_time); ?></span>
            <?php endif; ?>
            
            <?php if (!empty($meta_info)) : ?>
                <?php foreach ($meta_info as $key => $value) : ?>
                    <span class="post-meta-<?php echo esc_attr($key); ?>"><?php echo esc_html($value); ?></span>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        
        <h3 class="post-card-title">
            <a href="<?php echo esc_url($post_permalink); ?>">
                <?php echo esc_html($post_title); ?>
            </a>
        </h3>
        
        <?php if ($post_excerpt) : ?>
            <p class="post-card-excerpt">
                <?php echo esc_html(cbc_school_truncate_text($post_excerpt, 120)); ?>
            </p>
        <?php endif; ?>
        
        <div class="post-card-footer">
            <a href="<?php echo esc_url($post_permalink); ?>" class="read-more-btn">
                <?php 
                if ($post_type === 'events') {
                    esc_html_e('View Event', 'cbc-school-modern');
                } elseif ($post_type === 'staff') {
                    esc_html_e('View Profile', 'cbc-school-modern');
                } else {
                    esc_html_e('Read More', 'cbc-school-modern');
                }
                ?>
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>
        </div>
    </div>
</article>
