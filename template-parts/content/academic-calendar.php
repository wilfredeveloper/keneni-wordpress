<?php
/**
 * Academic Calendar Section Template Part
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<section class="academic-calendar-section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('academics_calendar_title', 'Academic Calendar')); ?></h2>
            <p class="section-subtitle"><?php echo esc_html(get_theme_mod('academics_calendar_subtitle', 'Stay informed about important academic dates, events, and school activities throughout the year')); ?></p>
        </div>
        
        <div class="calendar-content">
            <div class="calendar-terms">
                <div class="term-card">
                    <div class="term-header">
                        <h3><?php echo esc_html(get_theme_mod('academics_term_1_title', 'Term 1')); ?></h3>
                        <span class="term-dates"><?php echo esc_html(get_theme_mod('academics_term_1_dates', 'January - April')); ?></span>
                    </div>
                    <div class="term-content">
                        <p><?php echo esc_html(get_theme_mod('academics_term_1_description', 'New academic year begins with orientation, baseline assessments, and introduction of new concepts.')); ?></p>
                        <div class="term-highlights">
                            <div class="highlight-item">
                                <span class="highlight-icon">📚</span>
                                <span><?php echo esc_html(get_theme_mod('academics_term_1_highlight_1', 'New curriculum introduction')); ?></span>
                            </div>
                            <div class="highlight-item">
                                <span class="highlight-icon">🎯</span>
                                <span><?php echo esc_html(get_theme_mod('academics_term_1_highlight_2', 'Baseline assessments')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="term-card">
                    <div class="term-header">
                        <h3><?php echo esc_html(get_theme_mod('academics_term_2_title', 'Term 2')); ?></h3>
                        <span class="term-dates"><?php echo esc_html(get_theme_mod('academics_term_2_dates', 'May - August')); ?></span>
                    </div>
                    <div class="term-content">
                        <p><?php echo esc_html(get_theme_mod('academics_term_2_description', 'Continued learning with mid-year assessments, sports activities, and academic competitions.')); ?></p>
                        <div class="term-highlights">
                            <div class="highlight-item">
                                <span class="highlight-icon">🏆</span>
                                <span><?php echo esc_html(get_theme_mod('academics_term_2_highlight_1', 'Sports competitions')); ?></span>
                            </div>
                            <div class="highlight-item">
                                <span class="highlight-icon">📊</span>
                                <span><?php echo esc_html(get_theme_mod('academics_term_2_highlight_2', 'Mid-year assessments')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="term-card">
                    <div class="term-header">
                        <h3><?php echo esc_html(get_theme_mod('academics_term_3_title', 'Term 3')); ?></h3>
                        <span class="term-dates"><?php echo esc_html(get_theme_mod('academics_term_3_dates', 'September - December')); ?></span>
                    </div>
                    <div class="term-content">
                        <p><?php echo esc_html(get_theme_mod('academics_term_3_description', 'Final term with end-of-year assessments, graduation ceremonies, and preparation for next academic year.')); ?></p>
                        <div class="term-highlights">
                            <div class="highlight-item">
                                <span class="highlight-icon">🎓</span>
                                <span><?php echo esc_html(get_theme_mod('academics_term_3_highlight_1', 'Graduation ceremonies')); ?></span>
                            </div>
                            <div class="highlight-item">
                                <span class="highlight-icon">📋</span>
                                <span><?php echo esc_html(get_theme_mod('academics_term_3_highlight_2', 'Final assessments')); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="calendar-schedule">
                <h3><?php echo esc_html(get_theme_mod('academics_schedule_title', 'Daily Schedule')); ?></h3>
                <div class="schedule-grid">
                    <div class="schedule-item">
                        <span class="time"><?php echo esc_html(get_theme_mod('academics_schedule_1_time', '7:30 - 8:00 AM')); ?></span>
                        <span class="activity"><?php echo esc_html(get_theme_mod('academics_schedule_1_activity', 'Assembly & Morning Devotion')); ?></span>
                    </div>
                    <div class="schedule-item">
                        <span class="time"><?php echo esc_html(get_theme_mod('academics_schedule_2_time', '8:00 - 10:30 AM')); ?></span>
                        <span class="activity"><?php echo esc_html(get_theme_mod('academics_schedule_2_activity', 'First Learning Block')); ?></span>
                    </div>
                    <div class="schedule-item">
                        <span class="time"><?php echo esc_html(get_theme_mod('academics_schedule_3_time', '10:30 - 11:00 AM')); ?></span>
                        <span class="activity"><?php echo esc_html(get_theme_mod('academics_schedule_3_activity', 'Break Time')); ?></span>
                    </div>
                    <div class="schedule-item">
                        <span class="time"><?php echo esc_html(get_theme_mod('academics_schedule_4_time', '11:00 - 1:00 PM')); ?></span>
                        <span class="activity"><?php echo esc_html(get_theme_mod('academics_schedule_4_activity', 'Second Learning Block')); ?></span>
                    </div>
                    <div class="schedule-item">
                        <span class="time"><?php echo esc_html(get_theme_mod('academics_schedule_5_time', '1:00 - 2:00 PM')); ?></span>
                        <span class="activity"><?php echo esc_html(get_theme_mod('academics_schedule_5_activity', 'Lunch Break')); ?></span>
                    </div>
                    <div class="schedule-item">
                        <span class="time"><?php echo esc_html(get_theme_mod('academics_schedule_6_time', '2:00 - 4:00 PM')); ?></span>
                        <span class="activity"><?php echo esc_html(get_theme_mod('academics_schedule_6_activity', 'Afternoon Activities')); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
