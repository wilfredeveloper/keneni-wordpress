/**
 * Gallery Filter Component
 * Handles filtering and animations for the gallery page
 */

(function($) {
    'use strict';

    /**
     * Initialize gallery filtering functionality
     */
    function initGalleryFilter() {
        const $filterButtons = $('.filter-btn');
        const $galleryItems = $('.gallery-item');
        
        if (!$filterButtons.length || !$galleryItems.length) {
            return;
        }

        // Handle filter button clicks
        $filterButtons.on('click', function() {
            const $button = $(this);
            const filterValue = $button.data('filter');
            
            // Update active button
            $filterButtons.removeClass('active');
            $button.addClass('active');
            
            // Filter gallery items
            filterGalleryItems(filterValue);
        });

        /**
         * Filter gallery items based on category
         */
        function filterGalleryItems(category) {
            if (category === 'all') {
                // Show all items
                $galleryItems.removeClass('filtered-out').addClass('filtered-in');
            } else {
                // Filter items by category
                $galleryItems.each(function() {
                    const $item = $(this);
                    const itemCategory = $item.data('category');
                    
                    if (itemCategory === category) {
                        $item.removeClass('filtered-out').addClass('filtered-in');
                    } else {
                        $item.removeClass('filtered-in').addClass('filtered-out');
                    }
                });
            }
        }
    }

    /**
     * Initialize gallery lightbox functionality
     */
    function initGalleryLightbox() {
        const $galleryItems = $('.gallery-item');
        
        if (!$galleryItems.length) {
            return;
        }

        // Create lightbox overlay
        const lightboxHTML = `
            <div class="gallery-lightbox" id="gallery-lightbox">
                <div class="lightbox-overlay"></div>
                <div class="lightbox-content">
                    <button class="lightbox-close" aria-label="Close lightbox">&times;</button>
                    <button class="lightbox-prev" aria-label="Previous image">&#8249;</button>
                    <button class="lightbox-next" aria-label="Next image">&#8250;</button>
                    <div class="lightbox-image-container">
                        <img class="lightbox-image" src="" alt="">
                        <div class="lightbox-info">
                            <h3 class="lightbox-title"></h3>
                            <p class="lightbox-category"></p>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        $('body').append(lightboxHTML);
        
        const $lightbox = $('#gallery-lightbox');
        const $lightboxImage = $('.lightbox-image');
        const $lightboxTitle = $('.lightbox-title');
        const $lightboxCategory = $('.lightbox-category');
        const $closeBtn = $('.lightbox-close');
        const $prevBtn = $('.lightbox-prev');
        const $nextBtn = $('.lightbox-next');
        
        let currentIndex = 0;
        let visibleItems = [];

        // Handle gallery item clicks
        $galleryItems.on('click', function() {
            const $item = $(this);
            
            // Get currently visible items for navigation
            visibleItems = $galleryItems.filter(':not(.filtered-out)').toArray();
            currentIndex = visibleItems.indexOf(this);
            
            openLightbox($item);
        });

        /**
         * Open lightbox with image
         */
        function openLightbox($item) {
            const $img = $item.find('img');
            const $info = $item.find('.gallery-info');
            
            $lightboxImage.attr('src', $img.attr('src'));
            $lightboxImage.attr('alt', $img.attr('alt'));
            $lightboxTitle.text($info.find('h3').text());
            $lightboxCategory.text($info.find('p').text());
            
            $lightbox.addClass('active');
            $('body').addClass('lightbox-open');
        }

        /**
         * Close lightbox
         */
        function closeLightbox() {
            $lightbox.removeClass('active');
            $('body').removeClass('lightbox-open');
        }

        /**
         * Navigate to previous image
         */
        function showPrevImage() {
            currentIndex = currentIndex > 0 ? currentIndex - 1 : visibleItems.length - 1;
            openLightbox($(visibleItems[currentIndex]));
        }

        /**
         * Navigate to next image
         */
        function showNextImage() {
            currentIndex = currentIndex < visibleItems.length - 1 ? currentIndex + 1 : 0;
            openLightbox($(visibleItems[currentIndex]));
        }

        // Event listeners
        $closeBtn.on('click', closeLightbox);
        $('.lightbox-overlay').on('click', closeLightbox);
        $prevBtn.on('click', showPrevImage);
        $nextBtn.on('click', showNextImage);

        // Keyboard navigation
        $(document).on('keydown', function(e) {
            if (!$lightbox.hasClass('active')) return;
            
            switch(e.key) {
                case 'Escape':
                    closeLightbox();
                    break;
                case 'ArrowLeft':
                    showPrevImage();
                    break;
                case 'ArrowRight':
                    showNextImage();
                    break;
            }
        });
    }

    /**
     * Initialize lazy loading for gallery images
     */
    function initGalleryLazyLoading() {
        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        if (img.dataset.src) {
                            img.src = img.dataset.src;
                            img.removeAttribute('data-src');
                            img.classList.add('loaded');
                            imageObserver.unobserve(img);
                        }
                    }
                });
            });

            // Observe all gallery images with data-src attribute
            document.querySelectorAll('.gallery-item img[data-src]').forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    /**
     * Initialize gallery animations on scroll
     */
    function initGalleryScrollAnimations() {
        if ('IntersectionObserver' in window) {
            const animationObserver = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-in');
                        animationObserver.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            });

            // Observe all gallery items
            document.querySelectorAll('.gallery-item').forEach(function(item) {
                animationObserver.observe(item);
            });
        }
    }

    // Initialize when document is ready
    $(document).ready(function() {
        initGalleryFilter();
        initGalleryLightbox();
        initGalleryLazyLoading();
        initGalleryScrollAnimations();
    });

    // Export for global access
    window.CBCSchool = window.CBCSchool || {};
    window.CBCSchool.initGalleryFilter = initGalleryFilter;
    window.CBCSchool.initGalleryLightbox = initGalleryLightbox;

})(jQuery);
