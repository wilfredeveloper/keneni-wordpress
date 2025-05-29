<?php
/**
 * Facilities Section Template Part
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="facilities-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('about_facilities_title', 'World-Class Facilities')); ?></h2>
            <p class="section-subtitle"><?php echo esc_html(get_theme_mod('about_facilities_subtitle', 'State-of-the-art infrastructure designed to enhance learning and development')); ?></p>
        </div>
        
        <div class="facilities-grid">
            <?php for ($i = 1; $i <= 6; $i++) : 
                $facility_title = get_theme_mod("about_facility_{$i}_title");
                $facility_description = get_theme_mod("about_facility_{$i}_description");
                $facility_image = get_theme_mod("about_facility_{$i}_image");
                
                // Default facilities if none are set
                $default_facilities = array(
                    1 => array(
                        'title' => 'Modern Classrooms',
                        'description' => 'Spacious, well-ventilated classrooms equipped with smart boards and modern learning aids.',
                        'image' => 'https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    ),
                    2 => array(
                        'title' => 'Science Laboratory',
                        'description' => 'Fully equipped science lab for hands-on experiments and practical learning.',
                        'image' => 'https://images.unsplash.com/photo-1582719471384-894fbb16e074?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    ),
                    3 => array(
                        'title' => 'Computer Lab',
                        'description' => 'Modern computer laboratory with high-speed internet for digital literacy.',
                        'image' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    ),
                    4 => array(
                        'title' => 'Library',
                        'description' => 'Well-stocked library with books, digital resources, and quiet study areas.',
                        'image' => 'https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    ),
                    5 => array(
                        'title' => 'Sports Facilities',
                        'description' => 'Playground, sports field, and indoor games area for physical development.',
                        'image' => 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    ),
                    6 => array(
                        'title' => 'Dining Hall',
                        'description' => 'Clean, spacious dining area serving nutritious meals for students.',
                        'image' => 'https://images.unsplash.com/photo-1567521464027-f127ff144326?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80'
                    )
                );
                
                if (empty($facility_title)) {
                    $facility_title = $default_facilities[$i]['title'];
                }
                if (empty($facility_description)) {
                    $facility_description = $default_facilities[$i]['description'];
                }
                
                $facility_image_url = '';
                if ($facility_image) {
                    $facility_image_url = wp_get_attachment_image_url($facility_image, 'medium');
                }
                if (empty($facility_image_url)) {
                    $facility_image_url = $default_facilities[$i]['image'];
                }
            ?>
                <div class="facility-card">
                    <div class="facility-image">
                        <img src="<?php echo esc_url($facility_image_url); ?>" alt="<?php echo esc_attr($facility_title); ?>" loading="lazy" />
                        <div class="facility-overlay">
                            <div class="facility-icon">
                                <?php if ($i == 1) : ?>
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19Z" fill="currentColor"/>
                                    </svg>
                                <?php elseif ($i == 2) : ?>
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 11H7V9H9V11ZM13 11H11V9H13V11ZM17 11H15V9H17V11ZM19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V8H19V19Z" fill="currentColor"/>
                                    </svg>
                                <?php elseif ($i == 3) : ?>
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 18C20.6 18 21 17.6 21 17V7C21 6.4 20.6 6 20 6H4C3.4 6 3 6.4 3 7V17C3 17.6 3.4 18 4 18H20ZM5 8H19V16H5V8Z" fill="currentColor"/>
                                    </svg>
                                <?php elseif ($i == 4) : ?>
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM7 7H17V9H7V7ZM7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="currentColor"/>
                                    </svg>
                                <?php elseif ($i == 5) : ?>
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 7.5V9M15 11.5C15.8 12.3 16 13.4 16 14.5V22H14V16H10V22H8V14.5C8 13.4 8.2 12.3 9 11.5L12 8.5L15 11.5Z" fill="currentColor"/>
                                    </svg>
                                <?php else : ?>
                                    <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M8.1 13.34L3.91 9.16C3.35 8.6 2.44 8.6 1.88 9.16S1.32 10.56 1.88 11.12L8.1 17.34C8.66 17.9 9.57 17.9 10.13 17.34L22.12 5.34C22.68 4.78 22.68 3.87 22.12 3.31C21.56 2.75 20.65 2.75 20.09 3.31L8.1 13.34Z" fill="currentColor"/>
                                    </svg>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="facility-content">
                        <h3><?php echo esc_html($facility_title); ?></h3>
                        <p><?php echo esc_html($facility_description); ?></p>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
        
        <div class="facilities-cta">
            <h3><?php echo esc_html(get_theme_mod('about_facilities_cta_title', 'Experience Our Facilities')); ?></h3>
            <p><?php echo esc_html(get_theme_mod('about_facilities_cta_description', 'Schedule a visit to see our world-class facilities and learning environment firsthand.')); ?></p>
            <a href="<?php echo esc_url(get_theme_mod('about_facilities_cta_url', '/contact/')); ?>" class="cta-button primary">
                <?php echo esc_html(get_theme_mod('about_facilities_cta_text', 'Schedule a Visit')); ?>
            </a>
        </div>
    </div>
</section>
