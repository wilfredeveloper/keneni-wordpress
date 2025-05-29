<?php
/**
 * Student Achievements Section Template Part
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="student-achievements-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('academics_achievements_title', 'Student Achievements')); ?></h2>
            <p class="section-subtitle"><?php echo esc_html(get_theme_mod('academics_achievements_subtitle', 'Celebrating our students\' outstanding performance and accomplishments in academics, sports, and co-curricular activities')); ?></p>
        </div>
        
        <div class="achievements-grid">
            <div class="achievement-card">
                <div class="achievement-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L15.09 8.26L22 9L17 14L18.18 21L12 17.77L5.82 21L7 14L2 9L8.91 8.26L12 2Z" fill="currentColor"/>
                    </svg>
                </div>
                <h3><?php echo esc_html(get_theme_mod('academics_achievement_1_title', 'Academic Excellence')); ?></h3>
                <div class="achievement-stats">
                    <div class="stat">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('academics_achievement_1_stat_1', '95%')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('academics_achievement_1_stat_1_label', 'Pass Rate')); ?></span>
                    </div>
                    <div class="stat">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('academics_achievement_1_stat_2', '85%')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('academics_achievement_1_stat_2_label', 'Above Average')); ?></span>
                    </div>
                </div>
                <p><?php echo esc_html(get_theme_mod('academics_achievement_1_description', 'Our students consistently perform above national averages in all subject areas.')); ?></p>
            </div>
            
            <div class="achievement-card">
                <div class="achievement-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 7.5V9M15 11.5C15.8 12.3 16 13.4 16 14.5V22H14V16H10V22H8V14.5C8 13.4 8.2 12.3 9 11.5L12 8.5L15 11.5Z" fill="currentColor"/>
                    </svg>
                </div>
                <h3><?php echo esc_html(get_theme_mod('academics_achievement_2_title', 'Sports & Athletics')); ?></h3>
                <div class="achievement-stats">
                    <div class="stat">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('academics_achievement_2_stat_1', '12')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('academics_achievement_2_stat_1_label', 'Trophies Won')); ?></span>
                    </div>
                    <div class="stat">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('academics_achievement_2_stat_2', '8')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('academics_achievement_2_stat_2_label', 'Sports Offered')); ?></span>
                    </div>
                </div>
                <p><?php echo esc_html(get_theme_mod('academics_achievement_2_description', 'Excellence in various sports including football, netball, athletics, and swimming.')); ?></p>
            </div>
            
            <div class="achievement-card">
                <div class="achievement-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 3V13.55C11.41 13.21 10.73 13 10 13C7.79 13 6 14.79 6 17S7.79 21 10 21 14 19.21 14 17V7H18V3H12Z" fill="currentColor"/>
                    </svg>
                </div>
                <h3><?php echo esc_html(get_theme_mod('academics_achievement_3_title', 'Arts & Culture')); ?></h3>
                <div class="achievement-stats">
                    <div class="stat">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('academics_achievement_3_stat_1', '15')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('academics_achievement_3_stat_1_label', 'Awards Won')); ?></span>
                    </div>
                    <div class="stat">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('academics_achievement_3_stat_2', '6')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('academics_achievement_3_stat_2_label', 'Art Forms')); ?></span>
                    </div>
                </div>
                <p><?php echo esc_html(get_theme_mod('academics_achievement_3_description', 'Outstanding performances in music, drama, poetry, and visual arts competitions.')); ?></p>
            </div>
        </div>
        
        <div class="achievements-showcase">
            <h3><?php echo esc_html(get_theme_mod('academics_achievements_showcase_title', 'Recent Highlights')); ?></h3>
            <div class="showcase-grid">
                <div class="showcase-item">
                    <div class="showcase-year"><?php echo esc_html(get_theme_mod('academics_showcase_1_year', '2024')); ?></div>
                    <h4><?php echo esc_html(get_theme_mod('academics_showcase_1_title', 'Regional Science Fair Winners')); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('academics_showcase_1_description', 'Our Grade 6 students won first place in the regional science fair with their innovative water purification project.')); ?></p>
                </div>
                
                <div class="showcase-item">
                    <div class="showcase-year"><?php echo esc_html(get_theme_mod('academics_showcase_2_year', '2024')); ?></div>
                    <h4><?php echo esc_html(get_theme_mod('academics_showcase_2_title', 'Mathematics Olympiad Success')); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('academics_showcase_2_description', 'Three of our students qualified for the national mathematics olympiad, placing in the top 10.')); ?></p>
                </div>
                
                <div class="showcase-item">
                    <div class="showcase-year"><?php echo esc_html(get_theme_mod('academics_showcase_3_year', '2023')); ?></div>
                    <h4><?php echo esc_html(get_theme_mod('academics_showcase_3_title', 'Environmental Conservation Award')); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('academics_showcase_3_description', 'Recognized by the county government for our outstanding environmental conservation initiatives.')); ?></p>
                </div>
            </div>
        </div>
        
        <div class="achievements-cta">
            <h3><?php echo esc_html(get_theme_mod('academics_achievements_cta_title', 'Join Our Success Story')); ?></h3>
            <p><?php echo esc_html(get_theme_mod('academics_achievements_cta_description', 'Give your child the opportunity to excel academically and personally in our nurturing environment.')); ?></p>
            <a href="<?php echo esc_url(get_theme_mod('academics_achievements_cta_url', '/admissions/')); ?>" class="cta-button primary">
                <?php echo esc_html(get_theme_mod('academics_achievements_cta_text', 'Apply for Admission')); ?>
            </a>
        </div>
    </div>
</section>
