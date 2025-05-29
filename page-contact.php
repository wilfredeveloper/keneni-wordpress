<?php
/**
 * Template Name: Contact Page
 * Description: Custom template for the Contact page with contact information, form, and map
 *
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Handle form submission
$form_submitted = false;
$form_success = false;
$form_errors = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['contact_form_submit'])) {
    // Verify nonce for security
    if (!wp_verify_nonce($_POST['contact_nonce'], 'contact_form_nonce')) {
        $form_errors[] = 'Security verification failed. Please try again.';
    } else {
        $form_submitted = true;

        // Sanitize and validate form data
        $name = sanitize_text_field($_POST['contact_name'] ?? '');
        $email = sanitize_email($_POST['contact_email'] ?? '');
        $phone = sanitize_text_field($_POST['contact_phone'] ?? '');
        $subject = sanitize_text_field($_POST['contact_subject'] ?? '');
        $message = sanitize_textarea_field($_POST['contact_message'] ?? '');

        // Validation
        if (empty($name)) {
            $form_errors[] = 'Name is required.';
        }
        if (empty($email) || !is_email($email)) {
            $form_errors[] = 'A valid email address is required.';
        }
        if (empty($subject)) {
            $form_errors[] = 'Please select a subject.';
        }
        if (empty($message)) {
            $form_errors[] = 'Message is required.';
        }

        // If no errors, process the form
        if (empty($form_errors)) {
            // Here you would typically send an email or save to database
            // For now, we'll just set success to true
            $form_success = true;

            // You can add email functionality here
            // wp_mail($to, $subject, $message, $headers);
        }
    }
}

get_header();
?>

<main id="primary" class="site-main">
    <!-- Contact Hero Section -->
    <section class="contact-hero-section">
        <div class="container">
            <div class="contact-hero-content">
                <h1>Contact Us</h1>
                <p class="lead">We'd love to hear from you. Reach out with any questions, inquiries, or feedback.</p>
            </div>
        </div>
    </section>

    <!-- Contact Information Cards -->
    <section class="contact-info-section">
        <div class="container">
            <div class="contact-info-grid">
                <!-- Location Card -->
                <div class="contact-info-card">
                    <div class="contact-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3>Our Location</h3>
                    <div class="contact-details">
                        <p><strong>123 Education Street</strong></p>
                        <p>City, State 12345</p>
                        <p>Country</p>
                    </div>
                </div>

                <!-- Phone Card -->
                <div class="contact-info-card">
                    <div class="contact-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3>Phone</h3>
                    <div class="contact-details">
                        <p><strong>Main Office: +1 (123) 456-7890</strong></p>
                        <p>Admissions: +1 (123) 456-7891</p>
                        <p>Fax: +1 (123) 456-7892</p>
                    </div>
                </div>

                <!-- Email Card -->
                <div class="contact-info-card">
                    <div class="contact-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" fill="currentColor"/>
                        </svg>
                    </div>
                    <h3>Email</h3>
                    <div class="contact-details">
                        <p><strong>General Inquiries: info@schoolname.edu</strong></p>
                        <p>Admissions: admissions@schoolname.edu</p>
                        <p>Support: support@schoolname.edu</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Form and Map Section -->
    <section class="contact-form-map-section">
        <div class="container">
            <div class="contact-form-map-grid">
                <!-- Contact Form -->
                <div class="contact-form-wrapper">
                    <h2>Send Us a Message</h2>

                    <?php if ($form_success): ?>
                        <div class="form-message success">
                            <p>✅ Thank you for your message! We'll get back to you soon.</p>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($form_errors)): ?>
                        <div class="form-message error">
                            <p>❌ Please correct the following errors:</p>
                            <ul>
                                <?php foreach ($form_errors as $error): ?>
                                    <li><?php echo esc_html($error); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <form class="contact-form" method="post" novalidate>
                        <?php wp_nonce_field('contact_form_nonce', 'contact_nonce'); ?>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact-name">Name</label>
                                <input type="text" id="contact-name" name="contact_name" value="<?php echo esc_attr($_POST['contact_name'] ?? ''); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="contact-email">Email</label>
                                <input type="email" id="contact-email" name="contact_email" value="<?php echo esc_attr($_POST['contact_email'] ?? ''); ?>" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="contact-phone">Phone</label>
                                <input type="tel" id="contact-phone" name="contact_phone" value="<?php echo esc_attr($_POST['contact_phone'] ?? ''); ?>">
                            </div>
                            <div class="form-group">
                                <label for="contact-subject">Subject</label>
                                <select id="contact-subject" name="contact_subject" required>
                                    <option value="">Select a subject</option>
                                    <option value="general" <?php selected($_POST['contact_subject'] ?? '', 'general'); ?>>General Inquiry</option>
                                    <option value="admissions" <?php selected($_POST['contact_subject'] ?? '', 'admissions'); ?>>Admissions</option>
                                    <option value="academics" <?php selected($_POST['contact_subject'] ?? '', 'academics'); ?>>Academics</option>
                                    <option value="support" <?php selected($_POST['contact_subject'] ?? '', 'support'); ?>>Technical Support</option>
                                    <option value="other" <?php selected($_POST['contact_subject'] ?? '', 'other'); ?>>Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="contact-message">Message</label>
                            <textarea id="contact-message" name="contact_message" rows="5" placeholder="Enter your message" required><?php echo esc_textarea($_POST['contact_message'] ?? ''); ?></textarea>
                        </div>

                        <button type="submit" name="contact_form_submit" class="contact-submit-btn">Send Message</button>
                    </form>
                </div>

                <!-- Map Section -->
                <div class="contact-map-wrapper">
                    <h2>Find Us</h2>
                    <div class="contact-map">
                        <div class="map-placeholder">
                            <p>School location map</p>
                            <small>Interactive map would be embedded here</small>
                        </div>
                    </div>

                    <!-- Office Hours -->
                    <div class="office-hours">
                        <h3>Office Hours</h3>
                        <div class="hours-list">
                            <div class="hours-item">
                                <span class="day">Monday - Friday</span>
                                <span class="time">8:00 AM - 4:30 PM</span>
                            </div>
                            <div class="hours-item">
                                <span class="day">Saturday</span>
                                <span class="time">9:00 AM - 12:00 PM</span>
                            </div>
                            <div class="hours-item">
                                <span class="day">Sunday</span>
                                <span class="time">Closed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Transportation Section -->
    <section class="transportation-section">
        <div class="container">
            <h2>Transportation</h2>
            <p>Our school is easily accessible by public transportation. Bus routes 15, 30, and 45 stop nearby in front of the school. The nearest subway station is Central Station, a 10-minute walk away.</p>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <h2>Frequently Asked Questions</h2>
            <p class="faq-intro">Find quick answers to common questions about contacting us.</p>

            <div class="faq-grid">
                <div class="faq-item">
                    <h3>What are the best hours to call?</h3>
                    <p>Our office staff is available to take calls from 8:00 AM to 4:30 PM on weekdays. For urgent matters outside these hours, please email us.</p>
                </div>

                <div class="faq-item">
                    <h3>How quickly will I receive a response?</h3>
                    <p>We aim to respond to all inquiries within 24-48 hours during business days. For urgent matters, please call our main office.</p>
                </div>

                <div class="faq-item">
                    <h3>Can I schedule a campus tour?</h3>
                    <p>Yes, campus tours are available by appointment. Please contact our admissions office to schedule a tour that ensures your message reaches the right department.</p>
                </div>

                <div class="faq-item">
                    <h3>Who should I contact for specific departments?</h3>
                    <p>For specific inquiries, please use the subject dropdown in our contact form to ensure your message reaches the right department.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<?php
get_footer();
?>
