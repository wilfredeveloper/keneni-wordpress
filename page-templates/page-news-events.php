<?php
/**
 * News & Events Page Template
 * Displays the News & Events page content
 */

// Set page title for SEO
add_filter('wp_title', function($title) {
    return 'News & Events | ' . get_bloginfo('name');
});

// Set page description for SEO
add_action('wp_head', function() {
    echo '<meta name="description" content="Stay updated with the latest news, events, and announcements from our school. Find information about upcoming events, academic calendar, and school activities.">' . "\n";
});

get_header();
?>

<main id="primary" class="site-main">

    <!-- Hero Section -->
    <section class="news-events-hero">
        <div class="container">
            <div class="news-events-hero-content">
                <div class="news-events-hero-text">
                    <h1>News & Events</h1>
                    <p>Stay updated with the latest happenings, announcements, and upcoming events at our school.</p>
                </div>
                <div class="news-events-hero-image">
                    <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2532&q=80" alt="Students in classroom" />
                </div>
            </div>
        </div>
    </section>

    <!-- Latest News Section -->
    <section class="news-events-section">
        <div class="container">
            <div class="section-header">
                <h2>Latest News</h2>
                <p>Stay informed about the latest developments and achievements at our school</p>
            </div>

            <div class="news-events-grid">
                <!-- News Item 1 -->
                <article class="news-event-card">
                    <div class="news-event-card-image">
                        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2532&q=80" alt="New STEM Lab Opening" />
                    </div>
                    <div class="news-event-card-content">
                        <div class="news-event-card-meta">
                            <span class="news-event-card-date">Mar 15</span>
                            <span class="news-event-card-category">School News</span>
                        </div>
                        <h3>New STEM Lab Opening</h3>
                        <p>We are excited to announce the opening of our state-of-the-art STEM laboratory, providing students with cutting-edge resources for science and technology education.</p>
                        <div class="news-event-card-footer">
                            <a href="#" class="read-more-btn">Read More</a>
                        </div>
                    </div>
                </article>

                <!-- News Item 2 -->
                <article class="news-event-card">
                    <div class="news-event-card-image">
                        <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2532&q=80" alt="Annual Arts Festival" />
                    </div>
                    <div class="news-event-card-content">
                        <div class="news-event-card-meta">
                            <span class="news-event-card-date">Mar 10</span>
                            <span class="news-event-card-category">Arts</span>
                        </div>
                        <h3>Annual Arts Festival</h3>
                        <p>Join us for our annual Arts Festival featuring student performances, exhibitions, and interactive workshops showcasing creative talents.</p>
                        <div class="news-event-card-footer">
                            <a href="#" class="read-more-btn">Read More</a>
                        </div>
                    </div>
                </article>

                <!-- News Item 3 -->
                <article class="news-event-card">
                    <div class="news-event-card-image">
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2532&q=80" alt="National Science Competition Winners" />
                    </div>
                    <div class="news-event-card-content">
                        <div class="news-event-card-meta">
                            <span class="news-event-card-date">Mar 05</span>
                            <span class="news-event-card-category">Achievement</span>
                        </div>
                        <h3>National Science Competition Winners</h3>
                        <p>Congratulations to our students who won first place at the National Science Competition, showcasing their innovative science projects.</p>
                        <div class="news-event-card-footer">
                            <a href="#" class="read-more-btn">Read More</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Upcoming Events Section -->
    <section class="news-events-section">
        <div class="container">
            <div class="section-header">
                <h2>Upcoming Events</h2>
                <p>Mark your calendar for these exciting upcoming events and activities</p>
            </div>

            <div class="news-events-grid">
                <!-- Event Item 1 -->
                <article class="news-event-card">
                    <div class="news-event-card-image">
                        <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2532&q=80" alt="New Curriculum Announcement" />
                    </div>
                    <div class="news-event-card-content">
                        <div class="news-event-card-meta">
                            <span class="news-event-card-date">Mar 25</span>
                            <span class="news-event-card-category">Curriculum</span>
                        </div>
                        <h3>New Curriculum Announcement</h3>
                        <p>We are excited to announce updates to our curriculum that will enhance learning outcomes and prepare students for future challenges.</p>
                        <div class="news-event-card-footer">
                            <a href="#" class="read-more-btn">Read More</a>
                        </div>
                    </div>
                </article>

                <!-- Event Item 2 -->
                <article class="news-event-card">
                    <div class="news-event-card-image">
                        <img src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2532&q=80" alt="Community Service Initiative" />
                    </div>
                    <div class="news-event-card-content">
                        <div class="news-event-card-meta">
                            <span class="news-event-card-date">Mar 30</span>
                            <span class="news-event-card-category">Community</span>
                        </div>
                        <h3>Community Service Initiative</h3>
                        <p>Our students have launched a new community service initiative aimed at supporting local environmental conservation efforts.</p>
                        <div class="news-event-card-footer">
                            <a href="#" class="read-more-btn">Read More</a>
                        </div>
                    </div>
                </article>

                <!-- Event Item 3 -->
                <article class="news-event-card">
                    <div class="news-event-card-image">
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2532&q=80" alt="International Exchange Program" />
                    </div>
                    <div class="news-event-card-content">
                        <div class="news-event-card-meta">
                            <span class="news-event-card-date">Apr 05</span>
                            <span class="news-event-card-category">Exchange</span>
                        </div>
                        <h3>International Exchange Program</h3>
                        <p>Applications are now open for our International Exchange Program, offering students the opportunity to study abroad for a semester.</p>
                        <div class="news-event-card-footer">
                            <a href="#" class="read-more-btn">Read More</a>
                        </div>
                    </div>
                </article>
            </div>

            <div class="view-more-section">
                <a href="#" class="view-more-btn">
                    View More Archives
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7 10L12 15L17 10H7Z" fill="currentColor"/>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Academic Calendar Section -->
    <section class="news-events-section">
        <div class="container">
            <div class="section-header">
                <h2>Academic Calendar</h2>
                <p>Important dates and deadlines for the academic year</p>
            </div>

            <div class="news-events-grid">
                <!-- Calendar Item 1 -->
                <article class="news-event-card">
                    <div class="news-event-card-image">
                        <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2532&q=80" alt="Mid-term Examinations" />
                    </div>
                    <div class="news-event-card-content">
                        <div class="news-event-card-meta">
                            <span class="news-event-card-date">Apr 15</span>
                            <span class="news-event-card-category">Exams</span>
                        </div>
                        <h3>Mid-term Examinations</h3>
                        <p>Mid-term examinations will be conducted for all classes. Students should prepare well and follow the examination schedule.</p>
                        <div class="news-event-card-footer">
                            <a href="#" class="read-more-btn">View Schedule</a>
                        </div>
                    </div>
                </article>

                <!-- Calendar Item 2 -->
                <article class="news-event-card">
                    <div class="news-event-card-image">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2532&q=80" alt="Parent-Teacher Conference" />
                    </div>
                    <div class="news-event-card-content">
                        <div class="news-event-card-meta">
                            <span class="news-event-card-date">Apr 20</span>
                            <span class="news-event-card-category">Meeting</span>
                        </div>
                        <h3>Parent-Teacher Conference</h3>
                        <p>Join us for our quarterly parent-teacher conference to discuss student progress and academic development.</p>
                        <div class="news-event-card-footer">
                            <a href="#" class="read-more-btn">Book Slot</a>
                        </div>
                    </div>
                </article>

                <!-- Calendar Item 3 -->
                <article class="news-event-card">
                    <div class="news-event-card-image">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2532&q=80" alt="Sports Day Event" />
                    </div>
                    <div class="news-event-card-content">
                        <div class="news-event-card-meta">
                            <span class="news-event-card-date">May 01</span>
                            <span class="news-event-card-category">Sports</span>
                        </div>
                        <h3>Sports Day Event</h3>
                        <p>Annual sports day featuring various athletic competitions, team sports, and fun activities for all students and families.</p>
                        <div class="news-event-card-footer">
                            <a href="#" class="read-more-btn">Register</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="newsletter-section">
        <div class="container">
            <div class="newsletter-content">
                <h2>Stay Updated</h2>
                <p>Subscribe to our newsletter to receive the latest news, events, and announcements directly in your inbox.</p>

                <form class="newsletter-form-wrapper" action="#" method="post">
                    <input type="email" name="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </section>

</main>

<?php
get_footer();
?>
