<?php
/**
 * Footer Widgets Template Part
 *
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Always show footer content - either widgets or default content
?>

<div class="footer-content">
    <div class="footer-section">
        <?php if (is_active_sidebar('footer-1')) : ?>
            <?php dynamic_sidebar('footer-1'); ?>
        <?php else : ?>
            <h3>Empowering Tomorrow's Leaders</h3>
            <p>At our school, we believe every child has the potential to excel. Through innovative CBC education, state-of-the-art facilities, and dedicated teachers, we're shaping confident, creative, and competent learners ready for the global stage.</p>
            <div class="school-stats">
                <div class="stat-item">
                    <strong>15+</strong>
                    <span>Years of Excellence</span>
                </div>
                <div class="stat-item">
                    <strong>500+</strong>
                    <span>Happy Students</span>
                </div>
                <div class="stat-item">
                    <strong>98%</strong>
                    <span>Success Rate</span>
                </div>
            </div>
            <div class="social-links">
                <a href="#" aria-label="Follow us on Facebook">📘</a>
                <a href="#" aria-label="Follow us on Twitter">🐦</a>
                <a href="#" aria-label="Follow us on Instagram">📷</a>
                <a href="#" aria-label="Connect on LinkedIn">💼</a>
            </div>
        <?php endif; ?>
    </div>

    <div class="footer-section">
        <?php if (is_active_sidebar('footer-2')) : ?>
            <?php dynamic_sidebar('footer-2'); ?>
        <?php else : ?>
            <h3>Quick Links</h3>
            <ul>
                <li><a href="<?php echo esc_url(home_url('/about')); ?>">About Us</a></li>
                <li><a href="<?php echo esc_url(home_url('/academics')); ?>">Academics</a></li>
                <li><a href="<?php echo esc_url(home_url('/admissions')); ?>">Admissions</a></li>
                <li><a href="<?php echo esc_url(home_url('/student-life')); ?>">Student Life</a></li>
                <li><a href="<?php echo esc_url(home_url('/parents')); ?>">Parents Portal</a></li>
                <li><a href="<?php echo esc_url(home_url('/events')); ?>">Events</a></li>
            </ul>
        <?php endif; ?>
    </div>

    <div class="footer-section">
        <?php if (is_active_sidebar('footer-3')) : ?>
            <?php dynamic_sidebar('footer-3'); ?>
        <?php else : ?>
            <h3>Contact Information</h3>
            <div class="contact-info">
                <p><strong>Address:</strong><br>
                123 Education Street<br>
                Nairobi, Kenya</p>

                <p><strong>Phone:</strong><br>
                +254 700 123 456</p>

                <p><strong>Email:</strong><br>
                info@cbcschool.ac.ke</p>

                <p><strong>Office Hours:</strong><br>
                Monday - Friday: 8:00 AM - 5:00 PM<br>
                Saturday: 9:00 AM - 1:00 PM</p>
            </div>
        <?php endif; ?>
    </div>

    <div class="footer-section">
        <h3>Stay Connected 📧</h3>
        <p>Join our community and never miss important updates about your child's education journey.</p>
        <?php get_template_part('template-parts/forms/newsletter-form'); ?>

        <div class="accreditation">
            <h4>🏆 Recognized & Accredited By:</h4>
            <ul>
                <li>✅ Ministry of Education, Kenya</li>
                <li>✅ Kenya National Examinations Council (KNEC)</li>
                <li>✅ Kenya Institute of Curriculum Development (KICD)</li>
                <li>✅ International Schools Association</li>
            </ul>
        </div>

        <div class="school-motto">
            <p><em>"Excellence in Education, Excellence in Life"</em></p>
        </div>
    </div>
</div>
