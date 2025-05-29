/**
 * Notice Board Component
 * 
 * @package CBC_School_Modern
 */

(function($) {
    'use strict';

    /**
     * Enhanced notice board functionality for mobile
     */
    function initNoticeBoard() {
        const $noticeToggle = $('.notice-board-toggle');
        const $noticeContent = $('.notice-board-content');
        const $noticeBoard = $('.notice-board');

        if (!$noticeToggle.length || !$noticeContent.length) {
            return;
        }

        // Set initial ARIA attributes
        $noticeToggle.attr('aria-expanded', 'true');
        $noticeContent.attr('aria-hidden', 'false');

        // Toggle notice board visibility
        $noticeToggle.on('click', function() {
            const isExpanded = $(this).attr('aria-expanded') === 'true';
            
            $noticeContent.slideToggle(200);
            $noticeBoard.toggleClass('expanded');
            $(this).toggleClass('active');

            // Update ARIA attributes
            $(this).attr('aria-expanded', !isExpanded);
            $noticeContent.attr('aria-hidden', isExpanded);

            // Change toggle icon based on state
            updateToggleIcon($(this), !isExpanded);
        });

        function updateToggleIcon($toggle, isExpanded) {
            const expandIcon = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 10L12 15L17 10H7Z" fill="currentColor"/></svg>';
            const collapseIcon = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7 14L12 9L17 14H7Z" fill="currentColor"/></svg>';
            
            $toggle.html(isExpanded ? collapseIcon : expandIcon);
        }

        // Auto-collapse notice board on small screens when scrolling down
        // Only apply to non-hero notice boards (the old positioned ones)
        if ($(window).width() <= 768) {
            let lastScrollTop = 0;
            
            $(window).on('scroll', function() {
                const scrollTop = $(this).scrollTop();
                
                // Only auto-collapse if it's not the hero notice board and user scrolled down
                if (scrollTop > 100 && 
                    scrollTop > lastScrollTop && 
                    $noticeBoard.hasClass('expanded') && 
                    !$noticeBoard.hasClass('hero-notice-board')) {
                    
                    $noticeContent.slideUp(200);
                    $noticeBoard.removeClass('expanded');
                    $noticeToggle.removeClass('active');
                    $noticeToggle.attr('aria-expanded', 'false');
                    $noticeContent.attr('aria-hidden', 'true');
                    updateToggleIcon($noticeToggle, false);
                }
                
                lastScrollTop = scrollTop;
            });
        }

        // Handle keyboard navigation
        $noticeToggle.on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        // Add smooth animations
        $noticeContent.css({
            'transition': 'max-height 0.3s ease-out',
            'overflow': 'hidden'
        });

        // Handle notice item interactions
        $('.notice-item').on('click', function(e) {
            // If clicking on a link, let it proceed normally
            if ($(e.target).is('a') || $(e.target).closest('a').length) {
                return;
            }
            
            // Otherwise, find and click the link in this notice item
            const $link = $(this).find('a').first();
            if ($link.length && $link.attr('href') !== '#') {
                window.location.href = $link.attr('href');
            }
        });

        // Add hover effects for notice items
        $('.notice-item').on('mouseenter', function() {
            $(this).addClass('hovered');
        }).on('mouseleave', function() {
            $(this).removeClass('hovered');
        });

        // Accessibility: announce when notice board is toggled
        $noticeToggle.on('click', function() {
            const isExpanded = $(this).attr('aria-expanded') === 'true';
            const message = isExpanded ? 
                'Notice board expanded' : 
                'Notice board collapsed';
            
            // Create a temporary announcement for screen readers
            const $announcement = $('<div>')
                .attr('aria-live', 'polite')
                .attr('aria-atomic', 'true')
                .addClass('sr-only')
                .text(message);
            
            $('body').append($announcement);
            
            setTimeout(function() {
                $announcement.remove();
            }, 1000);
        });

        // Initialize with proper state
        if ($noticeBoard.hasClass('hero-notice-board')) {
            // Hero notice board starts expanded
            $noticeBoard.addClass('expanded');
            updateToggleIcon($noticeToggle, true);
        } else {
            // Regular notice board starts collapsed on mobile
            if ($(window).width() <= 768) {
                $noticeContent.hide();
                $noticeBoard.removeClass('expanded');
                $noticeToggle.attr('aria-expanded', 'false');
                $noticeContent.attr('aria-hidden', 'true');
                updateToggleIcon($noticeToggle, false);
            }
        }
    }

    // Initialize when document is ready
    $(document).ready(function() {
        initNoticeBoard();
    });

    // Re-initialize on window resize
    $(window).on('resize', function() {
        // Debounce resize events
        clearTimeout(window.noticeResizeTimeout);
        window.noticeResizeTimeout = setTimeout(function() {
            initNoticeBoard();
        }, 250);
    });

    // Export for global access
    window.CBCSchool = window.CBCSchool || {};
    window.CBCSchool.initNoticeBoard = initNoticeBoard;

})(jQuery);
