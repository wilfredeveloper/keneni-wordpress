/**
 * Mobile Menu Component
 * 
 * @package CBC_School_Modern
 */

(function($) {
    'use strict';

    /**
     * Initialize mobile menu functionality
     */
    function initMobileMenu() {
        // Add mobile menu toggle button if it doesn't exist
        if (!$('.mobile-menu-toggle').length) {
            $('.header-container').append('<button class="mobile-menu-toggle" aria-label="Toggle Menu"><span class="hamburger-line"></span><span class="hamburger-line"></span><span class="hamburger-line"></span></button>');
        }

        var $toggle = $('.mobile-menu-toggle');
        var $navigation = $('.main-navigation');
        var $body = $('body');

        // Toggle mobile menu
        $toggle.on('click', function() {
            var isExpanded = $(this).attr('aria-expanded') === 'true';
            
            $(this).toggleClass('active');
            $(this).attr('aria-expanded', !isExpanded);
            $navigation.toggleClass('mobile-active');
            $body.toggleClass('menu-open');

            // Focus management
            if (!isExpanded) {
                // Menu is opening - focus first menu item
                setTimeout(function() {
                    $navigation.find('a').first().focus();
                }, 100);
            }
        });

        // Close mobile menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.main-navigation, .mobile-menu-toggle').length) {
                closeMobileMenu();
            }
        });

        // Close mobile menu on window resize
        $(window).on('resize', function() {
            if ($(window).width() > 768) {
                closeMobileMenu();
            }
        });

        // Close mobile menu on escape key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $body.hasClass('menu-open')) {
                closeMobileMenu();
                $toggle.focus();
            }
        });

        // Handle submenu toggles for mobile
        $navigation.find('.menu-item-has-children > a').on('click', function(e) {
            if ($(window).width() <= 768) {
                e.preventDefault();
                var $submenu = $(this).siblings('.sub-menu');
                var $parent = $(this).parent();
                
                $parent.toggleClass('submenu-open');
                $submenu.slideToggle(200);
                
                // Update aria-expanded
                var isExpanded = $(this).attr('aria-expanded') === 'true';
                $(this).attr('aria-expanded', !isExpanded);
            }
        });

        // Trap focus within mobile menu
        $navigation.on('keydown', function(e) {
            if (!$body.hasClass('menu-open')) return;

            var $focusableElements = $navigation.find('a, button').filter(':visible');
            var $firstElement = $focusableElements.first();
            var $lastElement = $focusableElements.last();

            if (e.key === 'Tab') {
                if (e.shiftKey) {
                    // Shift + Tab
                    if ($(document.activeElement).is($firstElement)) {
                        e.preventDefault();
                        $lastElement.focus();
                    }
                } else {
                    // Tab
                    if ($(document.activeElement).is($lastElement)) {
                        e.preventDefault();
                        $firstElement.focus();
                    }
                }
            }
        });

        function closeMobileMenu() {
            $toggle.removeClass('active');
            $toggle.attr('aria-expanded', 'false');
            $navigation.removeClass('mobile-active');
            $body.removeClass('menu-open');
            
            // Close any open submenus
            $navigation.find('.submenu-open').removeClass('submenu-open');
            $navigation.find('.sub-menu').slideUp(200);
            $navigation.find('a[aria-expanded="true"]').attr('aria-expanded', 'false');
        }

        // Add ARIA attributes
        $toggle.attr('aria-expanded', 'false');
        $toggle.attr('aria-controls', 'primary-menu');
        
        $navigation.find('.menu-item-has-children > a').attr('aria-expanded', 'false');
        $navigation.find('.sub-menu').attr('aria-hidden', 'true');

        // Update submenu ARIA attributes when toggled
        $navigation.on('submenuToggled', function(e, $submenu, isOpen) {
            $submenu.attr('aria-hidden', !isOpen);
        });
    }

    // Initialize when document is ready
    $(document).ready(function() {
        initMobileMenu();
    });

    // Export for global access
    window.CBCSchool = window.CBCSchool || {};
    window.CBCSchool.initMobileMenu = initMobileMenu;

})(jQuery);
