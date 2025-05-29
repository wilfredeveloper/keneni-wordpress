/**
 * Hero Carousel Component
 * 
 * @package CBC_School_Modern
 */

(function($) {
    'use strict';

    /**
     * Initialize hero carousel functionality
     */
    function initHeroCarousel() {
        var slides = $('.hero-slide');
        var dots = $('.carousel-dot');
        var currentSlide = 0;
        var slideInterval;

        if (slides.length <= 1) return;

        function showSlide(index) {
            slides.removeClass('active');
            dots.removeClass('active');

            slides.eq(index).addClass('active');
            dots.eq(index).addClass('active');

            currentSlide = index;
        }

        function nextSlide() {
            var next = (currentSlide + 1) % slides.length;
            showSlide(next);
        }

        function startAutoplay() {
            slideInterval = setInterval(nextSlide, 5000);
        }

        function stopAutoplay() {
            clearInterval(slideInterval);
        }

        // Dot navigation
        dots.on('click', function() {
            var index = $(this).data('slide');
            showSlide(index);
            stopAutoplay();
            startAutoplay();
        });

        // Pause on hover
        $('.hero-section').on('mouseenter', stopAutoplay);
        $('.hero-section').on('mouseleave', startAutoplay);

        // Start autoplay
        startAutoplay();

        // Keyboard navigation
        $(document).on('keydown', function(e) {
            if (e.key === 'ArrowLeft') {
                var prev = currentSlide === 0 ? slides.length - 1 : currentSlide - 1;
                showSlide(prev);
                stopAutoplay();
                startAutoplay();
            } else if (e.key === 'ArrowRight') {
                nextSlide();
                stopAutoplay();
                startAutoplay();
            }
        });

        // Touch/swipe support for mobile
        var startX = 0;
        var endX = 0;

        $('.hero-section').on('touchstart', function(e) {
            startX = e.originalEvent.touches[0].clientX;
        });

        $('.hero-section').on('touchend', function(e) {
            endX = e.originalEvent.changedTouches[0].clientX;
            handleSwipe();
        });

        function handleSwipe() {
            var threshold = 50; // Minimum distance for swipe
            var diff = startX - endX;

            if (Math.abs(diff) > threshold) {
                if (diff > 0) {
                    // Swipe left - next slide
                    nextSlide();
                } else {
                    // Swipe right - previous slide
                    var prev = currentSlide === 0 ? slides.length - 1 : currentSlide - 1;
                    showSlide(prev);
                }
                stopAutoplay();
                startAutoplay();
            }
        }

        // Accessibility improvements
        slides.attr('aria-hidden', 'true');
        slides.eq(0).attr('aria-hidden', 'false');

        dots.attr('role', 'button');
        dots.attr('tabindex', '0');

        // Update aria-hidden when slide changes
        $(document).on('slideChanged', function(e, slideIndex) {
            slides.attr('aria-hidden', 'true');
            slides.eq(slideIndex).attr('aria-hidden', 'false');
        });

        // Trigger custom event when slide changes
        var originalShowSlide = showSlide;
        showSlide = function(index) {
            originalShowSlide(index);
            $(document).trigger('slideChanged', [index]);
        };
    }

    // Initialize when document is ready
    $(document).ready(function() {
        initHeroCarousel();
    });

    // Export for global access
    window.CBCSchool = window.CBCSchool || {};
    window.CBCSchool.initHeroCarousel = initHeroCarousel;

})(jQuery);
