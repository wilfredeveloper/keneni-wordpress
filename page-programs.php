<?php
/**
 * Template Name: Programs Page
 * Description: Custom template for the Programs page with comprehensive curriculum and program information
 *
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Debug: Log when this template is loaded
error_log('CBC School Theme: page-programs.php template loaded for page: ' . get_the_title());

get_header();
?>

<main id="primary" class="site-main academics-page">
    <!-- Academics Hero Section -->
    <section class="academics-hero-section">
        <div class="hero-background">
            <?php
            $programs_hero_image = get_theme_mod('programs_hero_image');
            if ($programs_hero_image) {
                $hero_image_url = wp_get_attachment_image_url($programs_hero_image, 'full');
            } else {
                $hero_image_url = 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80';
            }
            ?>
            <div class="hero-image" style="background-image: url('<?php echo esc_url($hero_image_url); ?>')"></div>
            <div class="hero-overlay"></div>
        </div>
        
        <div class="container">
            <div class="hero-content">
                <h1 class="page-title">
                    <?php echo esc_html(get_theme_mod('programs_hero_title', 'Academic Excellence')); ?>
                </h1>
                <p class="hero-description">
                    <?php echo esc_html(get_theme_mod('programs_hero_description', 'Empowering students through the Competency-Based Curriculum with innovative teaching methods and comprehensive learning experiences.')); ?>
                </p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('programs_stat_1_number', '8')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('programs_stat_1_label', 'Grade Levels')); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('programs_stat_2_number', '12')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('programs_stat_2_label', 'Subject Areas')); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('programs_stat_3_number', '100%')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('programs_stat_3_label', 'CBC Aligned')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Academic Programs Section -->
    <section class="academic-programs-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('programs_programs_title', 'Academic Programs')); ?></h2>
                <p class="section-subtitle"><?php echo esc_html(get_theme_mod('programs_programs_subtitle', 'Comprehensive educational programs designed to nurture every child\'s potential from early years through primary education')); ?></p>
            </div>
            
            <div class="programs-grid">
                <div class="program-card">
                    <div class="program-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 3L1 9L12 15L21 10.09V17H23V9L12 3ZM5 13.18V17.18L12 21L19 17.18V13.18L12 17L5 13.18Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3><?php echo esc_html(get_theme_mod('programs_program_1_title', 'Pre-Primary (PP1 & PP2)')); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('programs_program_1_description', 'Foundation years focusing on play-based learning, social skills development, and early literacy and numeracy skills.')); ?></p>
                    <div class="program-details">
                        <span class="age-range"><?php echo esc_html(get_theme_mod('programs_program_1_age', 'Ages 4-6')); ?></span>
                    </div>
                </div>
                
                <div class="program-card">
                    <div class="program-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19Z" fill="currentColor"/>
                            <path d="M7 7H17V9H7V7ZM7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3><?php echo esc_html(get_theme_mod('programs_program_2_title', 'Lower Primary (Grade 1-3)')); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('programs_program_2_description', 'Building fundamental skills in literacy, numeracy, and introducing core subjects through engaging, hands-on activities.')); ?></p>
                    <div class="program-details">
                        <span class="age-range"><?php echo esc_html(get_theme_mod('programs_program_2_age', 'Ages 6-9')); ?></span>
                    </div>
                </div>
                
                <div class="program-card">
                    <div class="program-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.4 16.6L4.8 12L3.4 13.4L9.4 19.4L20.6 8.2L19.2 6.8L9.4 16.6Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3><?php echo esc_html(get_theme_mod('programs_program_3_title', 'Upper Primary (Grade 4-6)')); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('programs_program_3_description', 'Advanced learning with specialized subjects, critical thinking development, and preparation for secondary education.')); ?></p>
                    <div class="program-details">
                        <span class="age-range"><?php echo esc_html(get_theme_mod('programs_program_3_age', 'Ages 9-12')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CBC Curriculum Section -->
    <section class="cbc-curriculum-section">
        <div class="container">
            <div class="curriculum-content">
                <div class="curriculum-text">
                    <h2><?php echo esc_html(get_theme_mod('programs_cbc_title', 'CBC Implementation')); ?></h2>
                    <div class="curriculum-description">
                        <?php
                        $cbc_content = get_theme_mod('programs_cbc_content', 'Our school is fully aligned with Kenya\'s Competency-Based Curriculum, focusing on developing learners\' competencies through engaging, learner-centered approaches. We emphasize critical thinking, creativity, communication, collaboration, citizenship, and digital literacy.');
                        echo wp_kses_post(wpautop($cbc_content));
                        ?>
                    </div>
                    
                    <div class="cbc-features">
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <span><?php echo esc_html(get_theme_mod('programs_cbc_feature_1', 'Competency-Based Assessment')); ?></span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <span><?php echo esc_html(get_theme_mod('programs_cbc_feature_2', 'Learner-Centered Approach')); ?></span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <span><?php echo esc_html(get_theme_mod('programs_cbc_feature_3', 'Integrated Learning Areas')); ?></span>
                        </div>
                        <div class="feature-item">
                            <div class="feature-icon">✓</div>
                            <span><?php echo esc_html(get_theme_mod('programs_cbc_feature_4', 'Values-Based Education')); ?></span>
                        </div>
                    </div>
                </div>
                
                <div class="curriculum-image">
                    <?php
                    $cbc_image = get_theme_mod('programs_cbc_image');
                    if ($cbc_image) {
                        $cbc_image_url = wp_get_attachment_image_url($cbc_image, 'large');
                        echo '<img src="' . esc_url($cbc_image_url) . '" alt="CBC Curriculum" loading="lazy" />';
                    } else {
                        echo '<img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="CBC Curriculum" loading="lazy" />';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Subject Areas Section -->
    <?php get_template_part('template-parts/content/subject-areas'); ?>

    <!-- Assessment Methods Section -->
    <?php get_template_part('template-parts/content/assessment-methods'); ?>

    <!-- Academic Calendar Section -->
    <?php get_template_part('template-parts/content/academic-calendar'); ?>

    <!-- Student Achievements Section -->
    <?php get_template_part('template-parts/content/student-achievements'); ?>

</main>

<?php
get_footer();
?>
