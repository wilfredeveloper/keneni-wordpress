<?php
/**
 * Newsletter Form Template Part
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

$unique_id = wp_unique_id('newsletter-form-');
?>

<form class="newsletter-form" action="#" method="post" novalidate>
    <div class="newsletter-form-fields">
        <label for="<?php echo esc_attr($unique_id); ?>" class="screen-reader-text">
            <?php esc_html_e('Email address', 'cbc-school-modern'); ?>
        </label>
        <input 
            type="email" 
            id="<?php echo esc_attr($unique_id); ?>" 
            name="newsletter_email" 
            class="newsletter-email" 
            placeholder="<?php esc_attr_e('Enter your email address', 'cbc-school-modern'); ?>" 
            required 
        />
        <button type="submit" class="newsletter-submit">
            <?php esc_html_e('Subscribe', 'cbc-school-modern'); ?>
        </button>
    </div>
    
    <div class="newsletter-privacy">
        <p class="privacy-text">
            <?php esc_html_e('By subscribing, you agree to receive our newsletter and promotional emails. You can unsubscribe at any time.', 'cbc-school-modern'); ?>
        </p>
    </div>
</form>
