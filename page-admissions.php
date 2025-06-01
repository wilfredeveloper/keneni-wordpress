<?php
/**
 * Template Name: Admissions Page
 * Description: Custom template for the Admissions page with comprehensive application information and form
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Set page title for SEO
add_filter('wp_title', function($title) {
    return 'Admissions | ' . get_bloginfo('name');
});

// Set page description for SEO
add_action('wp_head', function() {
    echo '<meta name="description" content="Apply for admission to our school. Learn about our admission process, requirements, fees, and important dates. Start your child\'s educational journey with us.">' . "\n";
});

// Debug: Log when this template is loaded
error_log('CBC School Theme: page-admissions.php template loaded for page: ' . get_the_title());

get_header();
?>

<main id="primary" class="site-main admissions-page">
    <!-- Admissions Hero Section -->
    <section class="admissions-hero-section">
        <div class="hero-background">
            <?php
            $admissions_hero_image = get_theme_mod('admissions_hero_image');
            if ($admissions_hero_image) {
                $hero_image_url = wp_get_attachment_image_url($admissions_hero_image, 'full');
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
                    <?php echo esc_html(get_theme_mod('admissions_hero_title', 'Join Our School Community')); ?>
                </h1>
                <p class="hero-description">
                    <?php echo esc_html(get_theme_mod('admissions_hero_description', 'Begin your child\'s educational journey with us. Discover our admission process, requirements, and how to apply for the upcoming academic year.')); ?>
                </p>
                <div class="hero-stats">
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('admissions_stat_1_number', '95%')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('admissions_stat_1_label', 'Acceptance Rate')); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('admissions_stat_2_number', '48hrs')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('admissions_stat_2_label', 'Response Time')); ?></span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number"><?php echo esc_html(get_theme_mod('admissions_stat_3_number', '100%')); ?></span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('admissions_stat_3_label', 'Support Rate')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Admissions Process Section -->
    <section class="admissions-process-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('admissions_process_title', 'Admission Process')); ?></h2>
                <p class="section-subtitle"><?php echo esc_html(get_theme_mod('admissions_process_subtitle', 'Follow these simple steps to complete your child\'s admission to our school')); ?></p>
            </div>
            
            <div class="process-grid">
                <?php for ($i = 1; $i <= 6; $i++) : ?>
                <div class="process-card">
                    <div class="process-step">
                        <span class="step-number"><?php echo $i; ?></span>
                    </div>
                    <div class="process-icon">
                        <?php
                        $icons = [
                            1 => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.89 22 5.99 22H18C19.1 22 20 21.1 20 20V8L14 2ZM18 20H6V4H13V9H18V20Z" fill="currentColor"/></svg>',
                            2 => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C6.48 2 2 6.48 2 12S6.48 22 12 22 22 17.52 22 12 17.52 2 12 2ZM13 17H11V15H13V17ZM13 13H11V7H13V13Z" fill="currentColor"/></svg>',
                            3 => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 11H7V9H9V11ZM13 11H11V9H13V11ZM17 11H15V9H17V11ZM19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V8H19V19Z" fill="currentColor"/></svg>',
                            4 => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12 2C13.1 2 14 2.9 14 4C14 5.1 13.1 6 12 6C10.9 6 10 5.1 10 4C10 2.9 10.9 2 12 2ZM21 9V7L15 1L13.5 2.5L16.17 5.17L10.5 10.84L6.5 8.84L4.5 10.84L8.5 12.84L15 6.34L17.5 8.84V9H21Z" fill="currentColor"/></svg>',
                            5 => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M11.8 10.9C9.53 10.31 8.8 9.7 8.8 8.75C8.8 7.66 9.81 6.9 11.5 6.9C13.28 6.9 13.94 7.75 14 9H16.21C16.14 7.28 15.09 5.7 13 5.19V3H10V5.16C8.06 5.58 6.5 6.84 6.5 8.77C6.5 11.08 8.41 12.23 11.2 12.9C13.7 13.5 14.2 14.38 14.2 15.31C14.2 16 13.71 17.1 11.5 17.1C9.44 17.1 8.63 16.18 8.5 15H6.32C6.44 17.19 8.08 18.42 10 18.83V21H13V18.85C14.95 18.5 16.5 17.35 16.5 15.3C16.5 12.46 14.07 11.5 11.8 10.9Z" fill="currentColor"/></svg>',
                            6 => '<svg width="48" height="48" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9 12L11 14L15 10M21 12C21 16.97 16.97 21 12 21C7.03 21 3 16.97 3 12C3 7.03 7.03 3 12 3C16.97 3 21 7.03 21 12Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" fill="none"/></svg>'
                        ];
                        echo $icons[$i];
                        ?>
                    </div>
                    <h3><?php echo esc_html(get_theme_mod("admissions_process_{$i}_title", 'Step ' . $i)); ?></h3>
                    <p><?php echo esc_html(get_theme_mod("admissions_process_{$i}_description", 'Process step description')); ?></p>
                </div>
                <?php endfor; ?>
            </div>
            
            <div class="process-cta">
                <a href="#application-form" class="cta-button primary smooth-scroll">
                    <?php echo esc_html(get_theme_mod('admissions_apply_button_text', 'Apply Now')); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Admission Requirements Section -->
    <section class="admission-requirements-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('admissions_requirements_title', 'Admission Requirements')); ?></h2>
                <p class="section-subtitle"><?php echo esc_html(get_theme_mod('admissions_requirements_subtitle', 'Everything you need to know about our admission requirements and process')); ?></p>
            </div>
            
            <div class="requirements-tabs">
                <div class="tab-navigation">
                    <button class="tab-button active" data-tab="documents">
                        <span class="tab-icon">📄</span>
                        Required Documents
                    </button>
                    <button class="tab-button" data-tab="age">
                        <span class="tab-icon">👶</span>
                        Age Requirements
                    </button>
                    <button class="tab-button" data-tab="fees">
                        <span class="tab-icon">💰</span>
                        Fees & Financial Aid
                    </button>
                </div>
                
                <div class="tab-content">
                    <!-- Documents Tab -->
                    <div class="tab-panel active" id="documents-tab">
                        <div class="tab-grid">
                            <div class="tab-column">
                                <h3>Required Documents</h3>
                                <ul class="documents-list">
                                    <?php for ($i = 1; $i <= 8; $i++) : ?>
                                    <li>
                                        <span class="document-icon">✓</span>
                                        <?php echo esc_html(get_theme_mod("admissions_document_{$i}", 'Document ' . $i)); ?>
                                    </li>
                                    <?php endfor; ?>
                                </ul>
                                <a href="#" class="download-btn" id="download-checklist">
                                    <span class="download-icon">⬇</span>
                                    Download Document Checklist
                                </a>
                            </div>
                            <div class="tab-column">
                                <h3>Additional Requirements</h3>
                                <div class="additional-requirements">
                                    <?php echo wp_kses_post(wpautop(get_theme_mod('admissions_additional_requirements', 'Additional requirements and important notes about the admission process.'))); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Age Requirements Tab -->
                    <div class="tab-panel" id="age-tab">
                        <div class="tab-grid">
                            <div class="tab-column">
                                <h3>Age Requirements by Grade</h3>
                                <div class="age-table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Grade Level</th>
                                                <th>Age Requirement</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 1; $i <= 8; $i++) : ?>
                                            <tr>
                                                <td><?php echo esc_html(get_theme_mod("admissions_grade_{$i}_name", 'Grade ' . $i)); ?></td>
                                                <td><?php echo esc_html(get_theme_mod("admissions_grade_{$i}_age", 'Age requirement')); ?></td>
                                            </tr>
                                            <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-column">
                                <div class="assessment-info">
                                    <?php
                                    $assessment_image = get_theme_mod('admissions_assessment_image');
                                    if ($assessment_image) {
                                        $assessment_image_url = wp_get_attachment_image_url($assessment_image, 'medium');
                                        echo '<img src="' . esc_url($assessment_image_url) . '" alt="Grade Placement Assessment" loading="lazy" />';
                                    } else {
                                        echo '<img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Grade Placement Assessment" loading="lazy" />';
                                    }
                                    ?>
                                    <div class="assessment-content">
                                        <h3><?php echo esc_html(get_theme_mod('admissions_assessment_title', 'Grade Placement Assessment')); ?></h3>
                                        <p><?php echo esc_html(get_theme_mod('admissions_assessment_description', 'We conduct comprehensive assessments to ensure proper grade placement for each student.')); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Fees Tab -->
                    <div class="tab-panel" id="fees-tab">
                        <div class="tab-grid">
                            <div class="tab-column">
                                <h3>Tuition & Fees</h3>
                                <div class="fees-table">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Fee Type</th>
                                                <th>Amount (KES)</th>
                                                <th>Frequency</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php for ($i = 1; $i <= 6; $i++) : ?>
                                            <tr>
                                                <td><?php echo esc_html(get_theme_mod("admissions_fee_{$i}_type", 'Fee Type ' . $i)); ?></td>
                                                <td><?php echo esc_html(get_theme_mod("admissions_fee_{$i}_amount", '0')); ?></td>
                                                <td><?php echo esc_html(get_theme_mod("admissions_fee_{$i}_frequency", 'Annual')); ?></td>
                                            </tr>
                                            <?php endfor; ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <div class="additional-fees">
                                    <h4>Additional Fees</h4>
                                    <ul>
                                        <?php for ($i = 1; $i <= 4; $i++) : ?>
                                        <li><?php echo esc_html(get_theme_mod("admissions_additional_fee_{$i}", 'Additional fee ' . $i)); ?></li>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="tab-column">
                                <div class="payment-options">
                                    <h3>Payment Options</h3>
                                    <div class="payment-methods">
                                        <?php for ($i = 1; $i <= 3; $i++) : ?>
                                        <div class="payment-method">
                                            <h4><?php echo esc_html(get_theme_mod("admissions_payment_{$i}_title", 'Payment Option ' . $i)); ?></h4>
                                            <p><?php echo esc_html(get_theme_mod("admissions_payment_{$i}_description", 'Payment description')); ?></p>
                                        </div>
                                        <?php endfor; ?>
                                    </div>
                                </div>
                                
                                <div class="financial-aid-card">
                                    <h3><?php echo esc_html(get_theme_mod('admissions_financial_aid_title', 'Financial Aid Available')); ?></h3>
                                    <p><?php echo esc_html(get_theme_mod('admissions_financial_aid_description', 'We offer various financial aid options to support families. Contact our admissions office for more information.')); ?></p>
                                    <a href="<?php echo esc_url(get_theme_mod('admissions_financial_aid_link', '#contact')); ?>" class="aid-link">Learn More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Important Dates Section -->
    <section class="important-dates-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('admissions_dates_title', 'Important Dates')); ?></h2>
                <p class="section-subtitle"><?php echo esc_html(get_theme_mod('admissions_dates_subtitle', 'Mark your calendar with these important admission dates and deadlines')); ?></p>
            </div>

            <div class="dates-grid">
                <div class="date-card">
                    <div class="date-icon">📅</div>
                    <h3><?php echo esc_html(get_theme_mod('admissions_deadline_title', 'Application Deadlines')); ?></h3>
                    <div class="deadline-list">
                        <?php for ($i = 1; $i <= 4; $i++) : ?>
                        <div class="deadline-item">
                            <span class="deadline-date"><?php echo esc_html(get_theme_mod("admissions_deadline_{$i}_date", 'Date')); ?></span>
                            <span class="deadline-desc"><?php echo esc_html(get_theme_mod("admissions_deadline_{$i}_desc", 'Deadline description')); ?></span>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="date-card">
                    <div class="date-icon">🏫</div>
                    <h3><?php echo esc_html(get_theme_mod('admissions_openhouse_title', 'Open Houses & Tours')); ?></h3>
                    <div class="openhouse-list">
                        <?php for ($i = 1; $i <= 4; $i++) : ?>
                        <div class="openhouse-item">
                            <span class="openhouse-date"><?php echo esc_html(get_theme_mod("admissions_openhouse_{$i}_date", 'Date')); ?></span>
                            <span class="openhouse-desc"><?php echo esc_html(get_theme_mod("admissions_openhouse_{$i}_desc", 'Open house description')); ?></span>
                        </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="date-card full-width">
                    <div class="calendar-download">
                        <h3><?php echo esc_html(get_theme_mod('admissions_calendar_title', 'Academic Calendar')); ?></h3>
                        <p><?php echo esc_html(get_theme_mod('admissions_calendar_description', 'Download our complete academic calendar with all important dates, holidays, and events.')); ?></p>
                        <a href="#" class="download-btn" id="download-calendar">
                            <span class="download-icon">⬇</span>
                            Download Full Academic Calendar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form Section -->
    <section class="application-form-section" id="application-form">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('admissions_form_title', 'Application Form')); ?></h2>
                <p class="section-subtitle"><?php echo esc_html(get_theme_mod('admissions_form_subtitle', 'Complete the form below to begin your child\'s admission process')); ?></p>
            </div>

            <div class="application-form-container">
                <form id="admissions-application-form" class="admissions-form" method="post" action="">
                    <?php wp_nonce_field('admissions_application', 'admissions_nonce'); ?>

                    <!-- Student Information -->
                    <div class="form-section">
                        <h3 class="form-section-title">Student Information</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="student_first_name">First Name *</label>
                                <input type="text" id="student_first_name" name="student_first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="student_last_name">Last Name *</label>
                                <input type="text" id="student_last_name" name="student_last_name" required>
                            </div>
                            <div class="form-group">
                                <label for="student_dob">Date of Birth</label>
                                <input type="date" id="student_dob" name="student_dob">
                            </div>
                            <div class="form-group">
                                <label for="student_gender">Gender</label>
                                <select id="student_gender" name="student_gender">
                                    <option value="">Select Gender</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="grade_applying">Grade Applying For *</label>
                                <select id="grade_applying" name="grade_applying" required>
                                    <option value="">Select Grade</option>
                                    <option value="pp1">Pre-Primary 1 (PP1)</option>
                                    <option value="pp2">Pre-Primary 2 (PP2)</option>
                                    <option value="grade1">Grade 1</option>
                                    <option value="grade2">Grade 2</option>
                                    <option value="grade3">Grade 3</option>
                                    <option value="grade4">Grade 4</option>
                                    <option value="grade5">Grade 5</option>
                                    <option value="grade6">Grade 6</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="academic_year">Academic Year *</label>
                                <select id="academic_year" name="academic_year" required>
                                    <option value="">Select Year</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Parent/Guardian Information -->
                    <div class="form-section">
                        <h3 class="form-section-title">Parent/Guardian Information</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="parent_first_name">First Name *</label>
                                <input type="text" id="parent_first_name" name="parent_first_name" required>
                            </div>
                            <div class="form-group">
                                <label for="parent_last_name">Last Name *</label>
                                <input type="text" id="parent_last_name" name="parent_last_name" required>
                            </div>
                            <div class="form-group">
                                <label for="relationship">Relationship to Student *</label>
                                <select id="relationship" name="relationship" required>
                                    <option value="">Select Relationship</option>
                                    <option value="parent">Parent</option>
                                    <option value="guardian">Guardian</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="parent_email">Email Address *</label>
                                <input type="email" id="parent_email" name="parent_email" required>
                            </div>
                            <div class="form-group">
                                <label for="parent_phone">Phone Number *</label>
                                <input type="tel" id="parent_phone" name="parent_phone" required>
                            </div>
                            <div class="form-group full-width">
                                <label for="parent_address">Address</label>
                                <textarea id="parent_address" name="parent_address" rows="3" placeholder="Enter full address"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Information -->
                    <div class="form-section">
                        <h3 class="form-section-title">Additional Information</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="current_school">Current School</label>
                                <input type="text" id="current_school" name="current_school" placeholder="Name of current school (if applicable)">
                            </div>
                            <div class="form-group full-width">
                                <label for="additional_info">Additional Information</label>
                                <textarea id="additional_info" name="additional_info" rows="4" placeholder="Any additional information you would like to share about your child (special needs, interests, etc.)"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-submit">
                        <button type="submit" class="submit-btn">
                            <span class="btn-text">Submit Application</span>
                            <span class="btn-loading" style="display: none;">Submitting...</span>
                        </button>
                        <p class="form-note">By submitting this form, you agree to our terms and conditions and privacy policy.</p>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="faq-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('admissions_faq_title', 'Frequently Asked Questions')); ?></h2>
                <p class="section-subtitle"><?php echo esc_html(get_theme_mod('admissions_faq_subtitle', 'Find answers to common questions about our admission process')); ?></p>
            </div>

            <div class="faq-container">
                <?php for ($i = 1; $i <= 8; $i++) : ?>
                <div class="faq-item">
                    <button class="faq-question" aria-expanded="false">
                        <span><?php echo esc_html(get_theme_mod("admissions_faq_{$i}_question", 'FAQ Question ' . $i)); ?></span>
                        <span class="faq-icon">+</span>
                    </button>
                    <div class="faq-answer">
                        <p><?php echo esc_html(get_theme_mod("admissions_faq_{$i}_answer", 'FAQ Answer ' . $i)); ?></p>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </section>

    <!-- Contact Information Section -->
    <section class="admissions-contact-section">
        <div class="aurora-background">
            <div class="aurora-gradient"></div>
        </div>

        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php echo esc_html(get_theme_mod('admissions_contact_title', 'Contact Admissions Office')); ?></h2>
                <p class="section-subtitle"><?php echo esc_html(get_theme_mod('admissions_contact_subtitle', 'Have questions? Our admissions team is here to help you through the process')); ?></p>
            </div>

            <div class="contact-grid">
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-icon">📞</div>
                        <div class="contact-info">
                            <h3>Phone</h3>
                            <p><?php echo esc_html(get_theme_mod('admissions_contact_phone', '+254 700 123 456')); ?></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">✉️</div>
                        <div class="contact-info">
                            <h3>Email</h3>
                            <p><?php echo esc_html(get_theme_mod('admissions_contact_email', 'admissions@school.ac.ke')); ?></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">📍</div>
                        <div class="contact-info">
                            <h3>Address</h3>
                            <p><?php echo esc_html(get_theme_mod('admissions_contact_address', '123 School Street, Nairobi, Kenya')); ?></p>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">🕒</div>
                        <div class="contact-info">
                            <h3>Office Hours</h3>
                            <p><?php echo esc_html(get_theme_mod('admissions_contact_hours', 'Monday - Friday: 8:00 AM - 5:00 PM')); ?></p>
                        </div>
                    </div>
                </div>

                <div class="admissions-office-card">
                    <div class="card-content">
                        <h3><?php echo esc_html(get_theme_mod('admissions_office_title', 'Admissions Office')); ?></h3>
                        <p><?php echo esc_html(get_theme_mod('admissions_office_message', 'Our dedicated admissions team is committed to helping you find the perfect educational fit for your child. Schedule a visit or call us today!')); ?></p>
                        <a href="<?php echo esc_url(get_theme_mod('admissions_office_link', '#')); ?>" class="office-cta">
                            Schedule a Visit
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
?>
