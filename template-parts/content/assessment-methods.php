<?php
/**
 * Assessment Methods Section Template Part
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="assessment-methods-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('academics_assessment_title', 'Assessment & Evaluation')); ?></h2>
            <p class="section-subtitle"><?php echo esc_html(get_theme_mod('academics_assessment_subtitle', 'Comprehensive assessment methods that focus on competency development and holistic learner progress')); ?></p>
        </div>
        
        <div class="assessment-grid">
            <div class="assessment-card">
                <div class="assessment-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z" fill="currentColor"/>
                    </svg>
                </div>
                <h3><?php echo esc_html(get_theme_mod('academics_assessment_1_title', 'Formative Assessment')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('academics_assessment_1_description', 'Continuous assessment through observations, projects, and activities to monitor learning progress and provide timely feedback.')); ?></p>
            </div>
            
            <div class="assessment-card">
                <div class="assessment-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM7 7H17V9H7V7ZM7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="currentColor"/>
                    </svg>
                </div>
                <h3><?php echo esc_html(get_theme_mod('academics_assessment_2_title', 'Portfolio Assessment')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('academics_assessment_2_description', 'Collection of student work samples that demonstrate growth, achievement, and competency development over time.')); ?></p>
            </div>
            
            <div class="assessment-card">
                <div class="assessment-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 7.5V9M15 11.5C15.8 12.3 16 13.4 16 14.5V22H14V16H10V22H8V14.5C8 13.4 8.2 12.3 9 11.5L12 8.5L15 11.5Z" fill="currentColor"/>
                    </svg>
                </div>
                <h3><?php echo esc_html(get_theme_mod('academics_assessment_3_title', 'Performance Tasks')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('academics_assessment_3_description', 'Real-world tasks and projects that allow students to demonstrate their knowledge and skills in authentic contexts.')); ?></p>
            </div>
            
            <div class="assessment-card">
                <div class="assessment-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" fill="currentColor"/>
                    </svg>
                </div>
                <h3><?php echo esc_html(get_theme_mod('academics_assessment_4_title', 'Self & Peer Assessment')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('academics_assessment_4_description', 'Encouraging students to reflect on their own learning and provide constructive feedback to their peers.')); ?></p>
            </div>
        </div>
        
        <div class="assessment-features">
            <div class="features-content">
                <h3><?php echo esc_html(get_theme_mod('academics_assessment_features_title', 'Our Assessment Approach')); ?></h3>
                <div class="features-list">
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <span><?php echo esc_html(get_theme_mod('academics_assessment_feature_1', 'Competency-based grading system')); ?></span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <span><?php echo esc_html(get_theme_mod('academics_assessment_feature_2', 'Regular parent-teacher conferences')); ?></span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <span><?php echo esc_html(get_theme_mod('academics_assessment_feature_3', 'Digital progress tracking')); ?></span>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">✓</div>
                        <span><?php echo esc_html(get_theme_mod('academics_assessment_feature_4', 'Individualized learning plans')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
