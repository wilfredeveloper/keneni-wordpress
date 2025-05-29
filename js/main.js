/**
 * CBC School Modern Theme JavaScript
 */

(function($) {
    'use strict';

    // Document ready
    $(document).ready(function() {

        // Mobile menu toggle
        initMobileMenu();

        // Smooth scrolling for anchor links
        initSmoothScrolling();

        // Header scroll effect
        initHeaderScrollEffect();

        // Newsletter form handling
        initNewsletterForm();

        // Search form enhancements
        initSearchForm();

        // Accessibility improvements
        initAccessibility();

        // Hero carousel
        initHeroCarousel();

        // Notice board
        initNoticeBoard();

    });

    /**
     * Initialize mobile menu functionality
     */
    function initMobileMenu() {
        // Add mobile menu toggle button if it doesn't exist
        if (!$('.mobile-menu-toggle').length) {
            $('.header-container').append('<button class="mobile-menu-toggle" aria-label="Toggle Menu"><span></span><span></span><span></span></button>');
        }

        // Toggle mobile menu
        $('.mobile-menu-toggle').on('click', function() {
            $(this).toggleClass('active');
            $('.main-navigation').toggleClass('mobile-active');
            $('body').toggleClass('menu-open');
        });

        // Close mobile menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation, .mobile-menu-toggle').length) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.main-navigation').removeClass('mobile-active');
                $('body').removeClass('menu-open');
            }
        });

        // Close mobile menu on window resize
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                $('.mobile-menu-toggle').removeClass('active');
                $('.main-navigation').removeClass('mobile-active');
                $('body').removeClass('menu-open');
            }
        });
    }

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
            document.querySelectorAll('.feature-card, .news-card, .post-card').forEach(function(el) {
                observer.observe(el);
            });
        }
    }

    // Initialize scroll animations
    initScrollAnimations();

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
    }

    /**
     * Enhanced notice board functionality for mobile
     */
    function initNoticeBoard() {
        const noticeToggle = $('.notice-board-toggle');
        const noticeContent = $('.notice-board-content');
        const noticeBoard = $('.notice-board');

        // Toggle notice board visibility
        noticeToggle.on('click', function() {
            noticeContent.slideToggle(200);
            noticeBoard.toggleClass('expanded');
            $(this).toggleClass('active');

            // Change toggle icon based on state
            if ($(this).hasClass('active')) {
                $(this).html('<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 14L12 9L17 14H7Z" fill="currentColor"/></svg>');
            } else {
                $(this).html('<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 10L12 15L17 10H7Z" fill="currentColor"/></svg>');
            }
        });

        // Auto-collapse notice board on small screens when scrolling down
        // Only apply to non-hero notice boards (the old positioned ones)
        if ($(window).width() <= 768) {
            $(window).on('scroll', function() {
                // Only auto-collapse if it's not the hero notice board
                if ($(this).scrollTop() > 100 && noticeBoard.hasClass('expanded') && !noticeBoard.hasClass('hero-notice-board')) {
                    noticeContent.slideUp(200);
                    noticeBoard.removeClass('expanded');
                    noticeToggle.removeClass('active');
                    noticeToggle.html('<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 10L12 15L17 10H7Z" fill="currentColor"/></svg>');
                }
            });
        }
    }

})(jQuery);
