<?php
/**
 * The template for displaying archive pages
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top: 120px;">
        
        <?php if (have_posts()) : ?>
            
            <header class="page-header text-center mb-2">
                <?php
                if (is_post_type_archive('events')) :
                    echo '<h1 class="page-title">School Events</h1>';
                    echo '<p class="archive-description">Stay updated with our latest school events and activities.</p>';
                elseif (is_post_type_archive('staff')) :
                    echo '<h1 class="page-title">Our Staff</h1>';
                    echo '<p class="archive-description">Meet our dedicated team of educators and staff members.</p>';
                else :
                    the_archive_title('<h1 class="page-title">', '</h1>');
                    the_archive_description('<div class="archive-description">', '</div>');
                endif;
                ?>
            </header>

            <?php if (is_post_type_archive('events')) : ?>
                <!-- Events Archive Layout -->
                <div class="events-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('event-card'); ?>>
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="event-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('featured-image'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="event-content">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    
                                    <div class="event-meta">
                                        <span class="event-date">
                                            <i class="fas fa-calendar"></i>
                                            <?php echo get_the_date(); ?>
                                        </span>
                                        <span class="event-time">
                                            <i class="fas fa-clock"></i>
                                            <?php echo get_the_time(); ?>
                                        </span>
                                    </div>
                                </header>
                                
                                <div class="entry-summary">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <footer class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                        Learn More
                                    </a>
                                </footer>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
            <?php elseif (is_post_type_archive('staff')) : ?>
                <!-- Staff Archive Layout -->
                <div class="staff-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('staff-card'); ?>>
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="staff-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('featured-image'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="staff-content">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    
                                    <div class="staff-position">
                                        <?php 
                                        // You can add custom fields for position/department
                                        $position = get_post_meta(get_the_ID(), 'staff_position', true);
                                        $department = get_post_meta(get_the_ID(), 'staff_department', true);
                                        
                                        if ($position) {
                                            echo '<span class="position">' . esc_html($position) . '</span>';
                                        }
                                        if ($department) {
                                            echo '<span class="department">' . esc_html($department) . '</span>';
                                        }
                                        ?>
                                    </div>
                                </header>
                                
                                <div class="entry-summary">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <footer class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                        View Profile
                                    </a>
                                </footer>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
                
            <?php else : ?>
                <!-- Default Archive Layout -->
                <div class="posts-grid">
                    <?php while (have_posts()) : the_post(); ?>
                        
                        <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                            
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('featured-image'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            
                            <div class="post-content">
                                <header class="entry-header">
                                    <h2 class="entry-title">
                                        <a href="<?php the_permalink(); ?>" rel="bookmark">
                                            <?php the_title(); ?>
                                        </a>
                                    </h2>
                                    
                                    <div class="entry-meta">
                                        <span class="posted-on">
                                            <time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                                <?php echo esc_html(get_the_date()); ?>
                                            </time>
                                        </span>
                                        
                                        <span class="byline">
                                            <?php _e('by', 'cbc-school-modern'); ?> 
                                            <span class="author vcard">
                                                <a class="url fn n" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                    <?php echo esc_html(get_the_author()); ?>
                                                </a>
                                            </span>
                                        </span>
                                        
                                        <?php if (has_category()) : ?>
                                            <span class="cat-links">
                                                <?php _e('in', 'cbc-school-modern'); ?> <?php the_category(', '); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </header>
                                
                                <div class="entry-summary">
                                    <?php the_excerpt(); ?>
                                </div>
                                
                                <footer class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                        <?php _e('Read More', 'cbc-school-modern'); ?>
                                    </a>
                                </footer>
                            </div>
                        </article>
                        
                    <?php endwhile; ?>
                </div>
                
            <?php endif; ?>
            
            <?php
            // Pagination
            the_posts_pagination(array(
                'mid_size' => 2,
                'prev_text' => __('&laquo; Previous', 'cbc-school-modern'),
                'next_text' => __('Next &raquo;', 'cbc-school-modern'),
            ));
            ?>
            
        <?php else : ?>
            
            <section class="no-results not-found">
                <header class="page-header">
                    <h1 class="page-title"><?php _e('Nothing here', 'cbc-school-modern'); ?></h1>
                </header>
                
                <div class="page-content">
                    <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cbc-school-modern'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </section>
            
        <?php endif; ?>
        
    </div>
</main>

<?php
get_sidebar();
get_footer();
?>
