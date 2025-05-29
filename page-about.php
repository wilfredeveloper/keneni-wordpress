<?php
/**
 * Template Name: About Us Page
 * Description: Custom template for the About Us page with comprehensive school information
 *
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Debug: Log when this template is loaded
error_log('CBC School Theme: page-about.php template loaded for page: ' . get_the_title());

get_header();
?>

<main id="primary" class="site-main about-page">
    <!-- About Hero Section -->
    <section class="about-hero-section">
        <div class="hero-background">
            <?php
            $about_hero_image = get_theme_mod('about_hero_image');
            if ($about_hero_image) {
                $hero_image_url = wp_get_attachment_image_url($about_hero_image, 'full');
            } else {
                $hero_image_url = 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80';
            }
            ?>
            <div class="hero-image" style="background-image: url('<?php echo esc_url($hero_image_url); ?>')"></div>
            <div class="hero-overlay"></div>
        </div>

        <div class="container">
            <div class="hero-content">
                <h1 class="page-title">
                    <?php echo esc_html(get_theme_mod('about_hero_title', 'About Our School')); ?>
                </h1>
                <p class="hero-description">
                    <?php echo esc_html(get_theme_mod('about_hero_description', 'Discover our commitment to excellence in CBC education and nurturing tomorrow\'s leaders through innovative learning approaches.')); ?>
                </p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('about_stat_1_number', '15+')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('about_stat_1_label', 'Years of Excellence')); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('about_stat_2_number', '500+')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('about_stat_2_label', 'Happy Students')); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('about_stat_3_number', '98%')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('about_stat_3_label', 'Success Rate')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision Section -->
    <section class="mission-vision-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('about_mv_section_title', 'Our Mission & Vision')); ?></h2>
                <p class="section-subtitle"><?php echo esc_html(get_theme_mod('about_mv_section_subtitle', 'Guiding principles that drive our commitment to educational excellence')); ?></p>
            </div>

            <div class="mv-grid">
                <div class="mv-card mission-card">
                    <div class="mv-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3><?php echo esc_html(get_theme_mod('about_mission_title', 'Our Mission')); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('about_mission_content', 'To provide quality, holistic education that nurtures competent, confident, and ethical learners who contribute meaningfully to society through the Competency-Based Curriculum approach.')); ?></p>
                </div>

                <div class="mv-card vision-card">
                    <div class="mv-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 4.5C7 4.5 2.73 7.61 1 12C2.73 16.39 7 19.5 12 19.5S21.27 16.39 23 12C21.27 7.61 17 4.5 12 4.5ZM12 17C9.24 17 7 14.76 7 12S9.24 7 12 7S17 9.24 17 12S14.76 17 12 17ZM12 9C10.34 9 9 10.34 9 12S10.34 15 12 15S15 13.66 15 12S13.66 9 12 9Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3><?php echo esc_html(get_theme_mod('about_vision_title', 'Our Vision')); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('about_vision_content', 'To be a leading educational institution that empowers learners to become innovative, responsible, and globally competitive citizens who positively impact their communities.')); ?></p>
                </div>

                <div class="mv-card values-card">
                    <div class="mv-icon">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 21.35L10.55 20.03C5.4 15.36 2 12.28 2 8.5C2 5.42 4.42 3 7.5 3C9.24 3 10.91 3.81 12 5.09C13.09 3.81 14.76 3 16.5 3C19.58 3 22 5.42 22 8.5C22 12.28 18.6 15.36 13.45 20.04L12 21.35Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3><?php echo esc_html(get_theme_mod('about_values_title', 'Core Values')); ?></h3>
                    <p><?php echo esc_html(get_theme_mod('about_values_content', 'Excellence, Integrity, Innovation, Respect, Collaboration, and Community Service guide everything we do in nurturing well-rounded learners.')); ?></p>
                </div>
            </div>
        </div>
    </section>

    <!-- School History Section -->
    <section class="school-history-section">
        <div class="container">
            <div class="history-content">
                <div class="history-text">
                    <h2><?php echo esc_html(get_theme_mod('about_history_title', 'Our Story')); ?></h2>
                    <div class="history-description">
                        <?php
                        $history_content = get_theme_mod('about_history_content', 'Founded in 2008, our school began with a vision to provide quality education that prepares students for the challenges of the 21st century. Over the years, we have grown from a small community school to a leading educational institution, always maintaining our commitment to excellence and innovation in teaching and learning.');
                        echo wp_kses_post(wpautop($history_content));
                        ?>
                    </div>

                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-year"><?php echo esc_html(get_theme_mod('about_timeline_1_year', '2008')); ?></div>
                            <div class="timeline-content">
                                <h4><?php echo esc_html(get_theme_mod('about_timeline_1_title', 'School Founded')); ?></h4>
                                <p><?php echo esc_html(get_theme_mod('about_timeline_1_description', 'Established with 50 students and a vision for excellence')); ?></p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-year"><?php echo esc_html(get_theme_mod('about_timeline_2_year', '2015')); ?></div>
                            <div class="timeline-content">
                                <h4><?php echo esc_html(get_theme_mod('about_timeline_2_title', 'CBC Implementation')); ?></h4>
                                <p><?php echo esc_html(get_theme_mod('about_timeline_2_description', 'Successfully transitioned to Competency-Based Curriculum')); ?></p>
                            </div>
                        </div>

                        <div class="timeline-item">
                            <div class="timeline-year"><?php echo esc_html(get_theme_mod('about_timeline_3_year', '2020')); ?></div>
                            <div class="timeline-content">
                                <h4><?php echo esc_html(get_theme_mod('about_timeline_3_title', 'Digital Learning')); ?></h4>
                                <p><?php echo esc_html(get_theme_mod('about_timeline_3_description', 'Integrated technology and digital learning platforms')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="history-image">
                    <?php
                    $history_image = get_theme_mod('about_history_image');
                    if ($history_image) {
                        $history_image_url = wp_get_attachment_image_url($history_image, 'large');
                        echo '<img src="' . esc_url($history_image_url) . '" alt="School History" loading="lazy" />';
                    } else {
                        echo '<img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="School History" loading="lazy" />';
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Academic Excellence Section -->
    <?php get_template_part('template-parts/content/academic-excellence'); ?>

    <!-- Facilities Section -->
    <?php get_template_part('template-parts/content/facilities'); ?>

    <!-- Staff Directory Section -->
    <?php get_template_part('template-parts/content/staff-directory'); ?>

</main>

<?php
get_footer();
?>
