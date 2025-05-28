    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
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
                <form class="newsletter-form" action="#" method="post">
                    <input type="email" placeholder="Enter your email address" required>
                    <button type="submit">Join Community</button>
                </form>

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

        <div class="footer-bottom">
            <div class="container">
                <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. |
                <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy Policy</a> |
                <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">Terms of Service</a></p>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Hero Carousel Script -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.carousel-dot');
    let currentSlide = 0;
    let slideInterval;

    if (slides.length <= 1) return; // No need for carousel if only one slide

    // Function to show specific slide
    function showSlide(index) {
        // Remove active class from all slides and dots
        slides.forEach(slide => slide.classList.remove('active'));
        dots.forEach(dot => dot.classList.remove('active'));

        // Add active class to current slide and dot
        slides[index].classList.add('active');
        if (dots[index]) dots[index].classList.add('active');

        currentSlide = index;
    }

    // Function to go to next slide
    function nextSlide() {
        const next = (currentSlide + 1) % slides.length;
        showSlide(next);
    }

    // Auto-advance slides every 5 seconds
    function startSlideshow() {
        slideInterval = setInterval(nextSlide, 5000);
    }

    // Stop slideshow
    function stopSlideshow() {
        clearInterval(slideInterval);
    }

    // Add click event listeners to dots
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            stopSlideshow();
            startSlideshow(); // Restart auto-advance
        });
    });

    // Pause on hover
    const heroSection = document.querySelector('.hero-section');
    if (heroSection) {
        heroSection.addEventListener('mouseenter', stopSlideshow);
        heroSection.addEventListener('mouseleave', startSlideshow);
    }

    // Start the slideshow
    startSlideshow();

    // Keyboard navigation
    document.addEventListener('keydown', (e) => {
        if (e.key === 'ArrowLeft') {
            const prev = (currentSlide - 1 + slides.length) % slides.length;
            showSlide(prev);
            stopSlideshow();
            startSlideshow();
        } else if (e.key === 'ArrowRight') {
            nextSlide();
            stopSlideshow();
            startSlideshow();
        }
    });
});
</script>

<!-- Font Awesome for icons -->
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

</body>
</html>
