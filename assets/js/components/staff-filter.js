/**
 * Staff Filter Component
 * 
 * @package CBC_School_Modern
 */

(function($) {
    'use strict';

    /**
     * Initialize staff filtering functionality
     */
    function initStaffFilter() {
        const $filterButtons = $('.filter-btn');
        const $staffCards = $('.staff-card');

        if (!$filterButtons.length || !$staffCards.length) {
            return;
        }

        // Filter functionality
        $filterButtons.on('click', function() {
            const $this = $(this);
            const filter = $this.data('filter');

            // Update active button
            $filterButtons.removeClass('active');
            $this.addClass('active');

            // Filter staff cards
            if (filter === 'all') {
                $staffCards.fadeIn(300);
            } else {
                $staffCards.each(function() {
                    const $card = $(this);
                    const category = $card.data('category');

                    if (category === filter) {
                        $card.fadeIn(300);
                    } else {
                        $card.fadeOut(300);
                    }
                });
            }

            // Update URL without page reload (for better UX)
            if (history.pushState) {
                const newUrl = filter === 'all' ? 
                    window.location.pathname : 
                    window.location.pathname + '?filter=' + filter;
                history.pushState(null, null, newUrl);
            }
        });

        // Initialize filter from URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const filterParam = urlParams.get('filter');
        
        if (filterParam && filterParam !== 'all') {
            const $targetButton = $filterButtons.filter(`[data-filter="${filterParam}"]`);
            if ($targetButton.length) {
                $targetButton.click();
            }
        }

        // Keyboard navigation for filter buttons
        $filterButtons.on('keydown', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                $(this).click();
            }
        });

        // Add ARIA attributes for accessibility
        $filterButtons.attr('role', 'button');
        $filterButtons.attr('tabindex', '0');

        // Update ARIA attributes when filter changes
        $filterButtons.on('click', function() {
            const filter = $(this).data('filter');
            const visibleCount = filter === 'all' ? 
                $staffCards.length : 
                $staffCards.filter(`[data-category="${filter}"]`).length;

            // Announce filter change to screen readers
            const message = filter === 'all' ? 
                `Showing all ${visibleCount} staff members` :
                `Showing ${visibleCount} ${filter} staff members`;

            announceToScreenReader(message);
        });

        // Add smooth scroll to staff section when filter is used
        $filterButtons.on('click', function() {
            const $staffSection = $('.staff-directory-section');
            if ($staffSection.length) {
                $('html, body').animate({
                    scrollTop: $staffSection.offset().top - 100
                }, 500);
            }
        });
    }

    /**
     * Announce message to screen readers
     */
    function announceToScreenReader(message) {
        const $announcement = $('<div>')
            .attr('aria-live', 'polite')
            .attr('aria-atomic', 'true')
            .addClass('sr-only')
            .text(message);

        $('body').append($announcement);

        setTimeout(function() {
            $announcement.remove();
        }, 1000);
    }

    /**
     * Initialize staff card interactions
     */
    function initStaffCardInteractions() {
        const $staffCards = $('.staff-card');

        // Add hover effects
        $staffCards.on('mouseenter', function() {
            $(this).addClass('hovered');
        }).on('mouseleave', function() {
            $(this).removeClass('hovered');
        });

        // Handle contact button clicks
        $('.contact-btn').on('click', function(e) {
            e.stopPropagation(); // Prevent card click event
        });

        // Add keyboard navigation for staff cards
        $staffCards.on('keydown', function(e) {
            if (e.key === 'Enter') {
                const $link = $(this).find('.staff-link');
                if ($link.length) {
                    window.location.href = $link.attr('href');
                }
            }
        });

        // Make staff cards focusable
        $staffCards.attr('tabindex', '0');
        $staffCards.attr('role', 'article');
    }

    /**
     * Initialize staff pagination if present
     */
    function initStaffPagination() {
        const $pagination = $('.staff-pagination');
        
        if (!$pagination.length) {
            return;
        }

        // Add smooth scroll to top of staff section on pagination click
        $pagination.find('a').on('click', function() {
            const $staffSection = $('.staff-directory-section');
            if ($staffSection.length) {
                setTimeout(function() {
                    $('html, body').animate({
                        scrollTop: $staffSection.offset().top - 100
                    }, 500);
                }, 100);
            }
        });
    }

    /**
     * Initialize lazy loading for staff images
     */
    function initStaffImageLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            imageObserver.unobserve(img);
                        }
                    }
                });
            });

            // Observe all staff images with data-src attribute
            document.querySelectorAll('.staff-card img[data-src]').forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Initialize search functionality for staff (if search field exists)
     */
    function initStaffSearch() {
        const $searchField = $('.staff-search-field');
        
        if (!$searchField.length) {
            return;
        }

        let searchTimeout;

        $searchField.on('input', function() {
            const searchTerm = $(this).val().toLowerCase();
            
            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(function() {
                filterStaffBySearch(searchTerm);
            }, 300);
        });

        function filterStaffBySearch(searchTerm) {
            const $staffCards = $('.staff-card');
            
            if (searchTerm === '') {
                $staffCards.fadeIn(300);
                return;
            }

            $staffCards.each(function() {
                const $card = $(this);
                const name = $card.find('.staff-name').text().toLowerCase();
                const position = $card.find('.staff-position').text().toLowerCase();
                const department = $card.find('.staff-department').text().toLowerCase();
                
                const matches = name.includes(searchTerm) || 
                               position.includes(searchTerm) || 
                               department.includes(searchTerm);

                if (matches) {
                    $card.fadeIn(300);
                } else {
                    $card.fadeOut(300);
                }
            });
        }
    }

    // Initialize when document is ready
    $(document).ready(function() {
        initStaffFilter();
        initStaffCardInteractions();
        initStaffPagination();
        initStaffImageLazyLoading();
        initStaffSearch();
    });

    // Export for global access
    window.CBCSchool = window.CBCSchool || {};
    window.CBCSchool.initStaffFilter = initStaffFilter;
    window.CBCSchool.initStaffCardInteractions = initStaffCardInteractions;

})(jQuery);
