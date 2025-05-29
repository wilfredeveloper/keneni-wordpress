<?php
/**
 * Gallery Page Template
 * Displays the school gallery with filtering options
 */

// Set page title for SEO
add_filter('wp_title', function($title) {
    return 'Gallery | ' . get_bloginfo('name');
});

// Set page description for SEO
add_action('wp_head', function() {
    echo '<meta name="description" content="Explore our vibrant school life through images capturing memorable moments, events, and activities. View photos from campus life, sports, arts, and special events.">' . "\n";
});

get_header();
?>

<main id="primary" class="site-main gallery-page">

    <!-- Gallery Hero Section -->
    <section class="gallery-hero-section">
        <div class="container">
            <div class="gallery-hero-content">
                <h1>School Gallery</h1>
                <p class="lead">Explore our vibrant school life through images capturing memorable moments, events, and activities.</p>
            </div>
        </div>
    </section>

    <!-- Gallery Filter Section -->
    <section class="gallery-filter-section">
        <div class="container">
            <div class="gallery-filters">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="campus">Campus</button>
                <button class="filter-btn" data-filter="events">Events</button>
                <button class="filter-btn" data-filter="activities">Activities</button>
                <button class="filter-btn" data-filter="sports">Sports</button>
                <button class="filter-btn" data-filter="arts-culture">Arts & Culture</button>
            </div>
        </div>
    </section>

    <!-- Gallery Grid Section -->
    <section class="gallery-grid-section">
        <div class="container">
            <div class="gallery-grid" id="gallery-grid">
                
                <!-- Campus Images -->
                <div class="gallery-item" data-category="campus">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="School Building" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>School Building</h3>
                                <p>Campus</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="campus">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Modern Classroom" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Modern Classroom</h3>
                                <p>Campus</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="campus">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1481627834876-b7833e8f5570?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Library" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Library</h3>
                                <p>Campus</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="activities">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Graduation Ceremony" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Graduation Ceremony</h3>
                                <p>Activities</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Events Images -->
                <div class="gallery-item" data-category="events">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Science Fair" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Science Fair</h3>
                                <p>Events</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="events">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="School Assembly" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>School Assembly</h3>
                                <p>Events</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="activities">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Group Study" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Group Study</h3>
                                <p>Activities</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="campus">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1497486751825-1233686d5d80?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Study Area" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Study Area</h3>
                                <p>Campus</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="campus">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1544717297-fa95b6ee9643?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Computer Lab" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Computer Lab</h3>
                                <p>Campus</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sports Images -->
                <div class="gallery-item" data-category="sports">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Track and Field" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Track and Field</h3>
                                <p>Sports</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="sports">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1574629810360-7efbbe195018?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Pizza Day" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Pizza Day</h3>
                                <p>Events</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="sports">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Soccer Match" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Soccer Match</h3>
                                <p>Sports</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="arts-culture">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1565299624946-b28f40a0ca4b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Healthy Lunch" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Healthy Lunch</h3>
                                <p>Activities</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Arts & Culture Images -->
                <div class="gallery-item" data-category="arts-culture">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Music Performance" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Music Performance</h3>
                                <p>Arts & Culture</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="arts-culture">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Recording Studio" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Recording Studio</h3>
                                <p>Arts & Culture</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="activities">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Team Meeting" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Team Meeting</h3>
                                <p>Activities</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="gallery-item" data-category="activities">
                    <div class="gallery-image">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Student Portrait" loading="lazy">
                        <div class="gallery-overlay">
                            <div class="gallery-info">
                                <h3>Student Portrait</h3>
                                <p>Activities</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
