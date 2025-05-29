<?php
/**
 * Hero Section Template Part
 *
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get customizer values with robust fallbacks
$hero_title = get_theme_mod('hero_title', 'State-of-the-Art Facilities');
$hero_subtitle = get_theme_mod('hero_subtitle', 'Modern Learning Environment');
$hero_description = get_theme_mod('hero_description', 'Our campus is equipped with the latest technology and resources for optimal learning.');
$hero_button_1_text = get_theme_mod('hero_button_1_text', 'Apply Now');
$hero_button_1_url = get_theme_mod('hero_button_1_url', '#');
$hero_button_2_text = get_theme_mod('hero_button_2_text', 'Learn More');
$hero_button_2_url = get_theme_mod('hero_button_2_url', '#');

// Ensure we have content even if customizer fails
if (empty($hero_title)) $hero_title = 'State-of-the-Art Facilities';
if (empty($hero_subtitle)) $hero_subtitle = 'Modern Learning Environment';
if (empty($hero_description)) $hero_description = 'Our campus is equipped with the latest technology and resources for optimal learning.';
if (empty($hero_button_1_text)) $hero_button_1_text = 'Apply Now';
if (empty($hero_button_2_text)) $hero_button_2_text = 'Learn More';

// Get hero images with fallback
$hero_images = array();
for ($i = 1; $i <= 5; $i++) {
    $image_id = get_theme_mod("hero_image_$i");
    if ($image_id) {
        $image_url = wp_get_attachment_image_url($image_id, 'full');
        if ($image_url) {
            $hero_images[] = $image_url;
        }
    }
}
?>

<section class="hero-section modern-gradient mobile-optimized">
    <!-- Hero Carousel Background -->
    <div class="hero-carousel">
        <?php if (!empty($hero_images)) : ?>
            <?php foreach ($hero_images as $index => $image_url) : ?>
                <div class="hero-slide <?php echo $index === 0 ? 'active' : ''; ?>" style="background-image: url('<?php echo esc_url($image_url); ?>')"></div>
            <?php endforeach; ?>
        <?php else : ?>
            <!-- Fallback images for demo -->
            <?php
            $fallback_images = [
                'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80',
                'https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2032&q=80',
                'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80'
            ];
            foreach ($fallback_images as $index => $image_url) : ?>
                <div class="hero-slide <?php echo $index === 0 ? 'active' : ''; ?>" style="background-image: url('<?php echo esc_url($image_url); ?>')"></div>
            <?php endforeach; ?>
        <?php endif; ?>

        <!-- Carousel Navigation -->
        <?php
        $total_images = !empty($hero_images) ? count($hero_images) : 3;
        if ($total_images > 1) : ?>
            <div class="hero-carousel-nav">
                <?php for ($i = 0; $i < $total_images; $i++) : ?>
                    <button class="carousel-dot <?php echo $i === 0 ? 'active' : ''; ?>" data-slide="<?php echo $i; ?>" aria-label="<?php printf(__('Go to slide %d', 'cbc-school-modern'), $i + 1); ?>"></button>
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
            <div class="card-icon">📚</div>
        </div>
        <div class="floating-card card-2">
            <div class="card-icon">🎓</div>
        </div>
        <div class="floating-card card-3">
            <div class="card-icon">🔬</div>
        </div>
        <div class="floating-card card-4">
            <div class="card-icon">🏆</div>
        </div>
        <div class="success-badge">✓</div>
    </div>

    <div class="hero-container">
        <div class="hero-content">
            <!-- Test visibility -->
            <div style="background: red; color: white; padding: 20px; margin: 20px 0; text-align: center; font-size: 18px; font-weight: bold;">
                HERO TEMPLATE PART IS LOADING - THIS IS A TEST
            </div>

            <!-- Trust Badge -->
            <div class="trust-badge">
                <span class="trust-icon">✓</span>
                <span class="trust-text">Trusted by 20,000+ Happy Learners</span>
            </div>

            <h1 class="hero-title">
                <?php echo esc_html($hero_title); ?>
            </h1>

            <p class="hero-description">
                <?php echo esc_html($hero_description); ?>
            </p>

            <!-- Debug output (remove after testing) -->
            <?php if (current_user_can('administrator')) : ?>
                <div style="background: rgba(255,255,255,0.9); padding: 10px; margin: 10px 0; font-size: 12px; color: #333;">
                    <strong>Debug:</strong><br>
                    Title: <?php echo esc_html($hero_title); ?><br>
                    Description: <?php echo esc_html($hero_description); ?><br>
                    Button 1: <?php echo esc_html($hero_button_1_text); ?><br>
                    Button 2: <?php echo esc_html($hero_button_2_text); ?>
                </div>
            <?php endif; ?>

            <!-- Notice Board -->
            <?php if (get_theme_mod('notice_board_enabled', true)) : ?>
                <?php get_template_part('template-parts/content/notice-board'); ?>
            <?php endif; ?>

            <div class="hero-buttons">
                <a href="<?php echo esc_url($hero_button_1_url); ?>" class="cta-button primary modern">
                    <?php echo esc_html($hero_button_1_text); ?>
                </a>
                <a href="<?php echo esc_url($hero_button_2_url); ?>" class="cta-button secondary modern">
                    <?php echo esc_html($hero_button_2_text); ?>
                </a>
            </div>
        </div>
    </div>
</section>
