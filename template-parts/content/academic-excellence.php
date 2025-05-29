<?php
/**
 * Academic Excellence Section Template Part
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="academic-excellence-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('about_academic_title', 'Academic Excellence')); ?></h2>
            <p class="section-subtitle"><?php echo esc_html(get_theme_mod('about_academic_subtitle', 'Committed to delivering quality education through the Competency-Based Curriculum')); ?></p>
        </div>
        
        <div class="academic-grid">
            <div class="academic-feature">
                <div class="feature-icon">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 3L1 9L12 15L21 10.09V17H23V9L12 3ZM5 13.18V17.18L12 21L19 17.18V13.18L12 17L5 13.18Z" fill="currentColor"/>
                    </svg>
                </div>
                <h3><?php echo esc_html(get_theme_mod('about_academic_feature_1_title', 'CBC Curriculum')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('about_academic_feature_1_description', 'Fully aligned with Kenya\'s Competency-Based Curriculum, focusing on developing critical thinking, creativity, and practical skills.')); ?></p>
            </div>
            
            <div class="academic-feature">
                <div class="feature-icon">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19Z" fill="currentColor"/>
                        <path d="M7 7H17V9H7V7ZM7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="currentColor"/>
                    </svg>
                </div>
                <h3><?php echo esc_html(get_theme_mod('about_academic_feature_2_title', 'Qualified Teachers')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('about_academic_feature_2_description', 'Our dedicated team of qualified and experienced teachers are trained in modern pedagogical approaches and CBC implementation.')); ?></p>
            </div>
            
            <div class="academic-feature">
                <div class="feature-icon">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.4 16.6L4.8 12L3.4 13.4L9.4 19.4L20.6 8.2L19.2 6.8L9.4 16.6Z" fill="currentColor"/>
                    </svg>
                </div>
                <h3><?php echo esc_html(get_theme_mod('about_academic_feature_3_title', 'Proven Results')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('about_academic_feature_3_description', 'Consistent excellent performance in national assessments and successful transition of students to secondary education.')); ?></p>
            </div>
            
            <div class="academic-feature">
                <div class="feature-icon">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 7.5V9M15 11.5C15.8 12.3 16 13.4 16 14.5V22H14V16H10V22H8V14.5C8 13.4 8.2 12.3 9 11.5L12 8.5L15 11.5Z" fill="currentColor"/>
                    </svg>
                </div>
                <h3><?php echo esc_html(get_theme_mod('about_academic_feature_4_title', 'Holistic Development')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('about_academic_feature_4_description', 'Beyond academics, we focus on character development, life skills, and nurturing talents in sports, arts, and leadership.')); ?></p>
            </div>
        </div>
        
        <div class="academic-achievements">
            <h3><?php echo esc_html(get_theme_mod('about_achievements_title', 'Our Achievements')); ?></h3>
            <div class="achievements-grid">
                <div class="achievement-item">
                    <div class="achievement-icon">🏆</div>
                    <h4><?php echo esc_html(get_theme_mod('about_achievement_1_title', 'Top Performer')); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('about_achievement_1_description', 'Ranked among top 10 schools in the county for CBC implementation')); ?></p>
                </div>
                
                <div class="achievement-item">
                    <div class="achievement-icon">📚</div>
                    <h4><?php echo esc_html(get_theme_mod('about_achievement_2_title', 'Academic Excellence')); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('about_achievement_2_description', '95% of students score above average in national assessments')); ?></p>
                </div>
                
                <div class="achievement-item">
                    <div class="achievement-icon">🌟</div>
                    <h4><?php echo esc_html(get_theme_mod('about_achievement_3_title', 'Innovation Award')); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('about_achievement_3_description', 'Recognized for innovative teaching methods and technology integration')); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
