<?php
/**
 * Subject Areas Section Template Part
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="subject-areas-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('academics_subjects_title', 'Subject Areas')); ?></h2>
            <p class="section-subtitle"><?php echo esc_html(get_theme_mod('academics_subjects_subtitle', 'Comprehensive curriculum covering all essential learning areas for holistic development')); ?></p>
        </div>
        
        <div class="subjects-grid">
            <?php for ($i = 1; $i <= 8; $i++) : 
                $subject_title = get_theme_mod("academics_subject_{$i}_title");
                $subject_description = get_theme_mod("academics_subject_{$i}_description");
                
                // Default subjects if none are set
                $default_subjects = array(
                    1 => array(
                        'title' => 'English Language',
                        'description' => 'Developing communication skills through reading, writing, speaking, and listening activities.',
                        'icon' => '<path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM7 7H17V9H7V7ZM7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="currentColor"/>'
                    ),
                    2 => array(
                        'title' => 'Kiswahili',
                        'description' => 'Building proficiency in Kenya\'s national language through interactive learning methods.',
                        'icon' => '<path d="M12.87 15.07L10.33 12.56L10.36 12.53C12.1 10.59 13.34 8.36 14.07 6H17V4H10V2H8V4H1V6H12.17C11.5 7.92 10.44 9.75 9 11.35C8.07 10.32 7.3 9.19 6.69 8H4.69C5.42 9.63 6.42 11.17 7.67 12.56L2.58 17.58L4 19L9 14L12.11 17.11L12.87 15.07Z" fill="currentColor"/>'
                    ),
                    3 => array(
                        'title' => 'Mathematics',
                        'description' => 'Building numerical literacy and problem-solving skills through practical applications.',
                        'icon' => '<path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM13.5 18H10.5V16H13.5V18ZM18 14H6V12H18V14ZM18 10H6V8H18V10Z" fill="currentColor"/>'
                    ),
                    4 => array(
                        'title' => 'Science & Technology',
                        'description' => 'Exploring the natural world and developing scientific thinking and technological skills.',
                        'icon' => '<path d="M9 11H7V9H9V11ZM13 11H11V9H13V11ZM17 11H15V9H17V11ZM19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V8H19V19Z" fill="currentColor"/>'
                    ),
                    5 => array(
                        'title' => 'Social Studies',
                        'description' => 'Understanding society, culture, geography, and developing citizenship skills.',
                        'icon' => '<path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 7.5V9M15 11.5C15.8 12.3 16 13.4 16 14.5V22H14V16H10V22H8V14.5C8 13.4 8.2 12.3 9 11.5L12 8.5L15 11.5Z" fill="currentColor"/>'
                    ),
                    6 => array(
                        'title' => 'Creative Arts',
                        'description' => 'Fostering creativity through music, art, drama, and other artistic expressions.',
                        'icon' => '<path d="M12 3V13.55C11.41 13.21 10.73 13 10 13C7.79 13 6 14.79 6 17S7.79 21 10 21 14 19.21 14 17V7H18V3H12Z" fill="currentColor"/>'
                    ),
                    7 => array(
                        'title' => 'Physical Education',
                        'description' => 'Promoting physical fitness, health awareness, and sportsmanship.',
                        'icon' => '<path d="M13.49 5.48C13.77 5.2 14.11 5.02 14.49 5.02S15.21 5.2 15.49 5.48L18.52 8.51C18.8 8.79 18.98 9.13 18.98 9.51S18.8 10.23 18.52 10.51L15.49 13.54C15.21 13.82 14.87 14 14.49 14S13.77 13.82 13.49 13.54L10.46 10.51C10.18 10.23 10 9.89 10 9.51S10.18 8.79 10.46 8.51L13.49 5.48Z" fill="currentColor"/>'
                    ),
                    8 => array(
                        'title' => 'Life Skills',
                        'description' => 'Developing personal, social, and emotional skills for well-rounded growth.',
                        'icon' => '<path d="M12 21.35L10.55 20.03C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3C9.24 3 10.91 3.81 12 5.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5C22 12.28 18.6 15.36 13.45 20.04L12 21.35Z" fill="currentColor"/>'
                    )
                );
                
                if (empty($subject_title)) {
                    $subject_title = $default_subjects[$i]['title'];
                }
                if (empty($subject_description)) {
                    $subject_description = $default_subjects[$i]['description'];
                }
            ?>
                <div class="subject-card">
                    <div class="subject-icon">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <?php echo $default_subjects[$i]['icon']; ?>
                        </svg>
                    </div>
                    <h3><?php echo esc_html($subject_title); ?></h3>
                    <p><?php echo esc_html($subject_description); ?></p>
                </div>
            <?php endfor; ?>
        </div>
        
        <div class="subjects-cta">
            <h3><?php echo esc_html(get_theme_mod('academics_subjects_cta_title', 'Explore Our Curriculum')); ?></h3>
            <p><?php echo esc_html(get_theme_mod('academics_subjects_cta_description', 'Download our detailed curriculum guide to learn more about our comprehensive educational approach.')); ?></p>
            <a href="<?php echo esc_url(get_theme_mod('academics_subjects_cta_url', '/contact/')); ?>" class="cta-button primary">
                <?php echo esc_html(get_theme_mod('academics_subjects_cta_text', 'Download Curriculum Guide')); ?>
            </a>
        </div>
    </div>
</section>
