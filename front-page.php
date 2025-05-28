<?php
/**
 * The front page template file
 */

get_header();
?>

<main id="primary" class="site-main">
    <!-- Hero Section -->
    <section class="hero-section modern-gradient">
        <!-- Hero Carousel Background -->
        <div class="hero-carousel">
            <?php
            $hero_images = array();
            for ($i = 1; $i <= 5; $i++) {
                $image_id = get_theme_mod("hero_image_$i");
                if ($image_id) {
                    $hero_images[] = wp_get_attachment_image_url($image_id, 'full');
                }
            }

            if (!empty($hero_images)) {
                foreach ($hero_images as $index => $image_url) {
                    $active_class = $index === 0 ? ' active' : '';
                    echo '<div class="hero-slide' . $active_class . '" style="background-image: url(' . esc_url($image_url) . ');"></div>';
                }
            } else {
                // Fallback images for demo
                $fallback_images = [
                    'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                    'https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2032&q=80',
                    'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'
                ];
                foreach ($fallback_images as $index => $image_url) {
                    $active_class = $index === 0 ? ' active' : '';
                    echo '<div class="hero-slide' . $active_class . '" style="background-image: url(' . esc_url($image_url) . ');"></div>';
                }
            }
            ?>

            <!-- Carousel Navigation -->
            <?php
            $total_images = !empty($hero_images) ? count($hero_images) : 3;
            if ($total_images > 1) :
            ?>
                <div class="hero-carousel-nav">
                    <?php for ($i = 0; $i < $total_images; $i++) : ?>
                        <button class="carousel-dot<?php echo $i === 0 ? ' active' : ''; ?>" data-slide="<?php echo $i; ?>"></button>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- Gradient Overlay -->
        <div class="gradient-overlay"></div>

        <!-- Animated Background Elements -->
        <div class="hero-bg-elements">
            <div class="floating-shape shape-1"></div>
            <div class="floating-shape shape-2"></div>
            <div class="floating-shape shape-3"></div>
            <div class="floating-shape shape-4"></div>
        </div>

        <!-- 3D Floating Elements -->
        <div class="floating-elements">
            <div class="floating-card card-1">
                <div class="card-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" fill="currentColor"/>
                    </svg>
                </div>
            </div>

            <div class="floating-card card-2">
                <div class="card-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19Z" fill="currentColor"/>
                        <path d="M7 7H17V9H7V7ZM7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="currentColor"/>
                    </svg>
                </div>
            </div>

            <div class="floating-card card-3">
                <div class="card-icon graduation">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 3L1 9L12 15L21 10.09V17H23V9L12 3ZM5 13.18V17.18L12 21L19 17.18V13.18L12 17L5 13.18Z" fill="currentColor"/>
                    </svg>
                </div>
            </div>

            <div class="floating-card card-4">
                <div class="card-icon">
                    <svg width="40" height="40" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M16 4C18.2091 4 20 5.79086 20 8C20 10.2091 18.2091 12 16 12C13.7909 12 12 10.2091 12 8C12 5.79086 13.7909 4 16 4ZM8 6C9.65685 6 11 7.34315 11 9C11 10.6569 9.65685 12 8 12C6.34315 12 5 10.6569 5 9C5 7.34315 6.34315 6 8 6ZM8 13C10.67 13 16 14.33 16 17V20H0V17C0 14.33 5.33 13 8 13Z" fill="currentColor"/>
                    </svg>
                </div>
            </div>

            <div class="success-badge">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9 16.17L4.83 12L3.41 13.41L9 19L21 7L19.59 5.59L9 16.17Z" fill="currentColor"/>
                </svg>
            </div>
        </div>

        <!-- Notice Board -->
        <?php if (get_theme_mod('notice_board_enabled', true)) : ?>
            <div class="notice-board">
                <div class="notice-board-header">
                    <div class="notice-board-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19Z" fill="currentColor"/>
                            <path d="M7 7H17V9H7V7ZM7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3><?php echo esc_html(get_theme_mod('notice_board_title', 'Important Notices')); ?></h3>
                    <button class="notice-board-toggle" aria-label="Toggle notice board">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7 10L12 15L17 10H7Z" fill="currentColor"/>
                        </svg>
                    </button>
                </div>
                <div class="notice-board-content">
                    <?php for ($i = 1; $i <= 3; $i++) :
                        $notice_title = get_theme_mod("notice_{$i}_title");
                        $notice_content = get_theme_mod("notice_{$i}_content");
                        $notice_date = get_theme_mod("notice_{$i}_date");
                        $notice_url = get_theme_mod("notice_{$i}_url", '#');

                        if ($notice_title && $notice_content) :
                    ?>
                        <div class="notice-item">
                            <div class="notice-date"><?php echo esc_html(date('M d', strtotime($notice_date))); ?></div>
                            <div class="notice-details">
                                <h4><?php echo esc_html($notice_title); ?></h4>
                                <p><?php echo esc_html($notice_content); ?></p>
                                <?php if ($notice_url && $notice_url !== '#') : ?>
                                    <a href="<?php echo esc_url($notice_url); ?>" class="notice-link">Read More</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; endfor; ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="hero-container">
            <div class="hero-content">
                <!-- Trust Badge -->
                <div class="trust-badge">
                    <span class="trust-icon">✓</span>
                    <span class="trust-text">Trusted by 20,000+ Happy Learners</span>
                </div>

                <h1 class="hero-title">
                    <?php echo esc_html(get_theme_mod('hero_title', 'Education & Learning made Simple, Better.')); ?>
                </h1>

                <p class="hero-description">
                    <?php echo esc_html(get_theme_mod('hero_description', 'Practical project-based courses that are easy to understand, straight to the point, and distractions while ensuring comprehensive learning.')); ?>
                </p>

                <div class="hero-buttons">
                    <a href="<?php echo esc_url(get_theme_mod('hero_button_1_url', '#')); ?>" class="cta-button primary modern">
                        <?php echo esc_html(get_theme_mod('hero_button_1_text', 'View All Courses')); ?>
                    </a>
                    <a href="<?php echo esc_url(get_theme_mod('hero_button_2_url', '#')); ?>" class="cta-button secondary modern">
                        <?php echo esc_html(get_theme_mod('hero_button_2_text', 'Start Learning Now')); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Vision Section -->
    <section class="vision-section">
        <div class="vision-container">
            <div class="vision-content">
                <p class="vision-label">
                    <?php echo esc_html(get_theme_mod('vision_label', 'Our Vision')); ?>
                </p>

                <h2 class="vision-title">
                    <?php echo esc_html(get_theme_mod('vision_title', 'Shaping Tomorrow\'s Leaders')); ?>
                </h2>

                <p class="vision-description">
                    <?php echo esc_html(get_theme_mod('vision_description', 'We envision a learning community where every student is empowered to reach their full potential, becoming responsible global citizens who contribute positively to society.')); ?>
                </p>

                <a href="<?php echo esc_url(get_theme_mod('vision_button_url', '#')); ?>" class="cta-button dark">
                    <?php echo esc_html(get_theme_mod('vision_button_text', 'Learn More')); ?>
                </a>
                                </div>
        </div>
    </section>

    <!-- Key Highlights Section -->
    <section class="highlights-section">
        <div class="container">
            <div class="highlights-header">
                <h2 class="highlights-title">
                    <?php echo esc_html(get_theme_mod('highlights_title', 'Key Highlights')); ?>
                </h2>
                <p class="highlights-subtitle">
                    <?php echo esc_html(get_theme_mod('highlights_subtitle', 'What makes our school special and why parents choose us for their children\'s education.')); ?>
                </p>
            </div>

            <div class="highlights-grid">
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2L13.09 8.26L20 9L13.09 9.74L12 16L10.91 9.74L4 9L10.91 8.26L12 2Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="highlight-value">
                        <?php echo esc_html(get_theme_mod('highlight_1_value', '95%')); ?>
                    </div>
                    <h3 class="highlight-title">
                        <?php echo esc_html(get_theme_mod('highlight_1_title', 'Academic Excellence')); ?>
                    </h3>
                    <p class="highlight-description">
                        <?php echo esc_html(get_theme_mod('highlight_1_description', 'Of our students achieve above-average scores in national assessments')); ?>
                    </p>
                </div>

                <div class="highlight-card">
                    <div class="highlight-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M16 4C18.2091 4 20 5.79086 20 8C20 10.2091 18.2091 12 16 12C13.7909 12 12 10.2091 12 8C12 5.79086 13.7909 4 16 4ZM8 6C9.65685 6 11 7.34315 11 9C11 10.6569 9.65685 12 8 12C6.34315 12 5 10.6569 5 9C5 7.34315 6.34315 6 8 6ZM8 13C10.67 13 16 14.33 16 17V20H0V17C0 14.33 5.33 13 8 13ZM16 13.43C18.11 14.1 20 15.77 20 17V20H18V17.5C18 16.4 17.22 15.5 16 15.5V13.43Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="highlight-value">
                        <?php echo esc_html(get_theme_mod('highlight_2_value', '15:1')); ?>
                    </div>
                    <h3 class="highlight-title">
                        <?php echo esc_html(get_theme_mod('highlight_2_title', 'Student-Teacher Ratio')); ?>
                    </h3>
                    <p class="highlight-description">
                        <?php echo esc_html(get_theme_mod('highlight_2_description', 'Ensuring personalized attention for every student')); ?>
                    </p>
                </div>

                <div class="highlight-card">
                    <div class="highlight-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19ZM17 12H15V17H13V12H11V10H13V8H15V10H17V12Z" fill="currentColor"/>
                        </svg>
                    </div>
                    <div class="highlight-value">
                        <?php echo esc_html(get_theme_mod('highlight_3_value', '25+')); ?>
                    </div>
                    <h3 class="highlight-title">
                        <?php echo esc_html(get_theme_mod('highlight_3_title', 'Extracurricular Activities')); ?>
                    </h3>
                    <p class="highlight-description">
                        <?php echo esc_html(get_theme_mod('highlight_3_description', 'Different clubs and activities for holistic development')); ?>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Our School Section -->
    <section class="features-section">
        <div class="container">
            <div class="features-header">
                <h2>Why Choose Our School?</h2>
                <p>Discover what makes our educational approach unique and effective for your child's development</p>
            </div>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <h3>Competency-Based Learning</h3>
                    <p>Our CBC-aligned curriculum focuses on developing practical skills, critical thinking, and real-world applications that prepare students for future success.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🏫</div>
                    <h3>Modern Learning Facilities</h3>
                    <p>State-of-the-art classrooms, science laboratories, computer labs, and library resources equipped with the latest educational technology.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">👨‍🏫</div>
                    <h3>Qualified Teaching Staff</h3>
                    <p>Experienced and dedicated teachers committed to nurturing each student's potential through innovative teaching methods and personalized attention.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🌟</div>
                    <h3>Holistic Development</h3>
                    <p>We focus on intellectual, physical, social, emotional, and moral development to create well-rounded individuals ready for global citizenship.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🏆</div>
                    <h3>Excellence in Sports & Arts</h3>
                    <p>Comprehensive programs in athletics, music, drama, and visual arts that help students discover and develop their unique talents and interests.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🤝</div>
                    <h3>Strong Community Partnership</h3>
                    <p>Active collaboration with parents, local community, and educational partners to create a supportive learning environment for every student.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News & Events -->
    <section class="content-section">
        <div class="container">
            <div class="text-center mb-2">
                <h2>Latest News & Events</h2>
                <p>Stay updated with what's happening at our school</p>
            </div>

            <div class="news-grid">
                <?php
                $recent_posts = new WP_Query(array(
                    'posts_per_page' => 3,
                    'post_status' => 'publish'
                ));

                if ($recent_posts->have_posts()) :
                    while ($recent_posts->have_posts()) : $recent_posts->the_post();
                ?>
                    <article class="news-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="news-image">
                                <?php the_post_thumbnail('featured-image'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="news-content">
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p class="news-meta"><?php echo get_the_date(); ?></p>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                        </div>
                    </article>
                <?php
                    endwhile;
                    wp_reset_postdata();
                else :
                ?>
                    <p>No news available at the moment.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content">
                <h2>Ready to Join Our School Community?</h2>
                <p>Take the first step towards your child's bright future with quality education and holistic development.</p>
                <div class="cta-buttons">
                    <a href="<?php echo esc_url(home_url('/admissions')); ?>" class="cta-button primary">Apply Now</a>
                    <a href="<?php echo esc_url(home_url('/contact')); ?>" class="cta-button secondary">Schedule a Visit</a>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
