/**
 * CBC School Modern Theme JavaScript
 * Main application file that coordinates all components
 */

(function($) {
    'use strict';

    // Global namespace
    window.CBCSchool = window.CBCSchool || {};

    // Document ready
    $(document).ready(function() {
        // Initialize core functionality
        initSmoothScrolling();
        initHeaderScrollEffect();
        initNewsletterForm();
        initSearchForm();
        initAccessibility();
        initScrollAnimations();

        // Components are initialized in their respective files
        // This ensures better code organization and maintainability
    });

    /**
     * Initialize smooth scrolling for anchor links
     */
    function initSmoothScrolling() {
        $('a[href*="#"]:not([href="#"])').on('click', function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html, body').animate({
                        scrollTop: target.offset().top - 80
                    }, 1000);
                    return false;
                }
            }
        });
    }

    /**
     * Initialize header scroll effect
     */
    function initHeaderScrollEffect() {
        var header = $('.site-header');
        var scrollThreshold = 100;

        $(window).on('scroll', function() {
            var scrollTop = $(this).scrollTop();

            if (scrollTop > scrollThreshold) {
                header.addClass('scrolled');
            } else {
                header.removeClass('scrolled');
            }
        });
    }

    /**
     * Initialize newsletter form handling
     */
    function initNewsletterForm() {
        $('.newsletter-form').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var email = form.find('input[type="email"]').val();
            var button = form.find('button');
            var originalText = button.text();

            // Basic email validation
            if (!isValidEmail(email)) {
                showMessage(form, 'Please enter a valid email address.', 'error');
                return;
            }

            // Simulate form submission
            button.text('Subscribing...').prop('disabled', true);

            setTimeout(function() {
                showMessage(form, 'Thank you for subscribing to our newsletter!', 'success');
                form.find('input[type="email"]').val('');
                button.text(originalText).prop('disabled', false);
            }, 2000);
        });
    }

    /**
     * Initialize search form enhancements
     */
    function initSearchForm() {
        var searchForm = $('.search-form');
        var searchInput = searchForm.find('input[type="search"]');

        // Add search suggestions (placeholder functionality)
        searchInput.on('focus', function() {
            $(this).attr('placeholder', 'Search for news, events, academics...');
        });

        searchInput.on('blur', function() {
            $(this).attr('placeholder', 'Search...');
        });
    }

    /**
     * Initialize accessibility improvements
     */
    function initAccessibility() {
        // Add skip link
        if (!$('.skip-link').length) {
            $('body').prepend('<a class="skip-link screen-reader-text" href="#content">Skip to content</a>');
        }

        // Improve keyboard navigation
        $('.main-navigation a, .cta-button, .contact-btn').on('focus', function() {
            $(this).addClass('focused');
        }).on('blur', function() {
            $(this).removeClass('focused');
        });

        // Add ARIA labels to social links
        $('.social-links a').each(function() {
            var href = $(this).attr('href');
            if (href.includes('facebook')) {
                $(this).attr('aria-label', 'Visit our Facebook page');
            } else if (href.includes('twitter')) {
                $(this).attr('aria-label', 'Visit our Twitter page');
            } else if (href.includes('instagram')) {
                $(this).attr('aria-label', 'Visit our Instagram page');
            } else if (href.includes('linkedin')) {
                $(this).attr('aria-label', 'Visit our LinkedIn page');
            }
        });
    }

    /**
     * Utility function to validate email
     */
    function isValidEmail(email) {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    /**
     * Utility function to show messages
     */
    function showMessage(container, message, type) {
        var messageDiv = $('<div class="form-message ' + type + '">' + message + '</div>');

        // Remove existing messages
        container.find('.form-message').remove();

        // Add new message
        container.append(messageDiv);

        // Auto-hide after 5 seconds
        setTimeout(function() {
            messageDiv.fadeOut(function() {
                $(this).remove();
            });
        }, 5000);
    }

    /**
     * Initialize animations on scroll (if Intersection Observer is supported)
     */
    function initScrollAnimations() {
        if ('IntersectionObserver' in window) {
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                    }
                });
            }, {
                threshold: 0.1
            });

            // Observe elements that should animate
            document.querySelectorAll('.feature-card, .news-card, .post-card, .news-event-card').forEach(function(el) {
                observer.observe(el);
            });
        }
    }

    // Export functions to global namespace for external access
    window.CBCSchool.initSmoothScrolling = initSmoothScrolling;
    window.CBCSchool.initHeaderScrollEffect = initHeaderScrollEffect;
    window.CBCSchool.initNewsletterForm = initNewsletterForm;
    window.CBCSchool.initSearchForm = initSearchForm;
    window.CBCSchool.initAccessibility = initAccessibility;
    window.CBCSchool.initScrollAnimations = initScrollAnimations;

})(jQuery);
