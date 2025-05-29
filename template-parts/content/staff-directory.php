<?php
/**
 * Staff Directory Section Template Part
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get staff members
$staff_per_page = get_theme_mod('about_staff_per_page', 8);
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$staff_query = new WP_Query(array(
    'post_type' => 'staff',
    'posts_per_page' => $staff_per_page,
    'paged' => $paged,
    'post_status' => 'publish',
    'meta_query' => array(
        'relation' => 'OR',
        array(
            'key' => 'staff_position',
            'compare' => 'EXISTS'
        ),
        array(
            'key' => 'staff_position',
            'compare' => 'NOT EXISTS'
        )
    )
));
?>

<section class="staff-directory-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('about_staff_title', 'Meet Our Team')); ?></h2>
            <p class="section-subtitle"><?php echo esc_html(get_theme_mod('about_staff_subtitle', 'Dedicated professionals committed to nurturing and educating your children')); ?></p>
        </div>
        
        <?php if (get_theme_mod('about_staff_filter_enabled', true)) : ?>
            <div class="staff-filters">
                <button class="filter-btn active" data-filter="all"><?php esc_html_e('All Staff', 'cbc-school-modern'); ?></button>
                <button class="filter-btn" data-filter="administration"><?php esc_html_e('Administration', 'cbc-school-modern'); ?></button>
                <button class="filter-btn" data-filter="teaching"><?php esc_html_e('Teaching Staff', 'cbc-school-modern'); ?></button>
                <button class="filter-btn" data-filter="support"><?php esc_html_e('Support Staff', 'cbc-school-modern'); ?></button>
            </div>
        <?php endif; ?>
        
        <div class="staff-grid">
            <?php if ($staff_query->have_posts()) : ?>
                <?php while ($staff_query->have_posts()) : $staff_query->the_post(); 
                    $staff_position = get_post_meta(get_the_ID(), 'staff_position', true);
                    $staff_department = get_post_meta(get_the_ID(), 'staff_department', true);
                    $staff_email = get_post_meta(get_the_ID(), 'staff_email', true);
                    $staff_phone = get_post_meta(get_the_ID(), 'staff_phone', true);
                    
                    // Determine staff category for filtering
                    $staff_category = 'teaching';
                    if ($staff_department) {
                        $dept_lower = strtolower($staff_department);
                        if (strpos($dept_lower, 'admin') !== false || strpos($dept_lower, 'management') !== false) {
                            $staff_category = 'administration';
                        } elseif (strpos($dept_lower, 'support') !== false || strpos($dept_lower, 'maintenance') !== false) {
                            $staff_category = 'support';
                        }
                    }
                ?>
                    <div class="staff-card" data-category="<?php echo esc_attr($staff_category); ?>">
                        <div class="staff-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium', array('loading' => 'lazy')); ?>
                            <?php else : ?>
                                <div class="staff-placeholder">
                                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 12C14.21 12 16 10.21 16 8C16 5.79 14.21 4 12 4C9.79 4 8 5.79 8 8C8 10.21 9.79 12 12 12ZM12 14C9.33 14 4 15.34 4 18V20H20V18C20 15.34 14.67 14 12 14Z" fill="currentColor"/>
                                    </svg>
                                </div>
                            <?php endif; ?>
                            
                            <div class="staff-overlay">
                                <div class="staff-contact">
                                    <?php if ($staff_email) : ?>
                                        <a href="mailto:<?php echo esc_attr($staff_email); ?>" class="contact-btn email" title="<?php esc_attr_e('Send Email', 'cbc-school-modern'); ?>">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M20 4H4C2.9 4 2.01 4.9 2.01 6L2 18C2 19.1 2.9 20 4 20H20C21.1 20 22 19.1 22 18V6C22 4.9 21.1 4 20 4ZM20 8L12 13L4 8V6L12 11L20 6V8Z" fill="currentColor"/>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                    
                                    <?php if ($staff_phone) : ?>
                                        <a href="tel:<?php echo esc_attr($staff_phone); ?>" class="contact-btn phone" title="<?php esc_attr_e('Call', 'cbc-school-modern'); ?>">
                                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.62 10.79C8.06 13.62 10.38 15.94 13.21 17.38L15.41 15.18C15.69 14.9 16.08 14.82 16.43 14.93C17.55 15.3 18.75 15.5 20 15.5C20.55 15.5 21 15.95 21 16.5V20C21 20.55 20.55 21 20 21C10.61 21 3 13.39 3 4C3 3.45 3.45 3 4 3H7.5C8.05 3 8.5 3.45 8.5 4C8.5 5.25 8.7 6.45 9.07 7.57C9.18 7.92 9.1 8.31 8.82 8.59L6.62 10.79Z" fill="currentColor"/>
                                            </svg>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="staff-info">
                            <h3 class="staff-name"><?php the_title(); ?></h3>
                            
                            <?php if ($staff_position) : ?>
                                <p class="staff-position"><?php echo esc_html($staff_position); ?></p>
                            <?php endif; ?>
                            
                            <?php if ($staff_department) : ?>
                                <p class="staff-department"><?php echo esc_html($staff_department); ?></p>
                            <?php endif; ?>
                            
                            <?php if (get_the_excerpt()) : ?>
                                <p class="staff-bio"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                            <?php endif; ?>
                            
                            <a href="<?php the_permalink(); ?>" class="staff-link">
                                <?php esc_html_e('View Profile', 'cbc-school-modern'); ?>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
                
                <?php wp_reset_postdata(); ?>
                
            <?php else : ?>
                <div class="no-staff-message">
                    <div class="no-staff-icon">
                        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 4C18.2091 4 20 5.79086 20 8C20 10.2091 18.2091 12 16 12C13.7909 12 12 10.2091 12 8C12 5.79086 13.7909 4 16 4ZM8 6C9.65685 6 11 7.34315 11 9C11 10.6569 9.65685 12 8 12C6.34315 12 5 10.6569 5 9C5 7.34315 6.34315 6 8 6ZM8 13C10.67 13 16 14.33 16 17V20H0V17C0 14.33 5.33 13 8 13Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3><?php esc_html_e('No Staff Members Found', 'cbc-school-modern'); ?></h3>
                    <p><?php esc_html_e('Staff profiles will be displayed here once they are added to the system.', 'cbc-school-modern'); ?></p>
                </div>
            <?php endif; ?>
        </div>
        
        <?php if ($staff_query->max_num_pages > 1) : ?>
            <div class="staff-pagination">
                <?php
                echo paginate_links(array(
                    'total' => $staff_query->max_num_pages,
                    'current' => $paged,
                    'format' => '?paged=%#%',
                    'show_all' => false,
                    'end_size' => 1,
                    'mid_size' => 2,
                    'prev_next' => true,
                    'prev_text' => __('« Previous', 'cbc-school-modern'),
                    'next_text' => __('Next »', 'cbc-school-modern'),
                    'type' => 'list',
                ));
                ?>
            </div>
        <?php endif; ?>
        
        <div class="staff-cta">
            <h3><?php echo esc_html(get_theme_mod('about_staff_cta_title', 'Join Our Team')); ?></h3>
            <p><?php echo esc_html(get_theme_mod('about_staff_cta_description', 'We are always looking for passionate educators to join our team and make a difference in students\' lives.')); ?></p>
            <a href="<?php echo esc_url(get_theme_mod('about_staff_cta_url', '/careers/')); ?>" class="cta-button secondary">
                <?php echo esc_html(get_theme_mod('about_staff_cta_text', 'View Opportunities')); ?>
            </a>
        </div>
    </div>
</section>
