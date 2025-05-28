<?php
/**
 * The main template file
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top: 120px;">
        
        <?php if (have_posts()) : ?>
            
            <header class="page-header">
                <?php if (is_home() && !is_front_page()) : ?>
                    <h1 class="page-title"><?php single_post_title(); ?></h1>
                <?php elseif (is_archive()) : ?>
                    <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
                    <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
                <?php elseif (is_search()) : ?>
                    <h1 class="page-title">
                        <?php printf(__('Search Results for: %s', 'cbc-school-modern'), '<span>' . get_search_query() . '</span>'); ?>
                    </h1>
                <?php else : ?>
                    <h1 class="page-title"><?php _e('Latest News & Updates', 'cbc-school-modern'); ?></h1>
                <?php endif; ?>
            </header>

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
                                <?php
                                if (is_singular()) :
                                    the_title('<h1 class="entry-title">', '</h1>');
                                else :
                                    the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
                                endif;
                                ?>
                                
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
                                <?php
                                if (is_singular()) :
                                    the_content();
                                else :
                                    the_excerpt();
                                endif;
                                ?>
                            </div>
                            
                            <?php if (!is_singular()) : ?>
                                <footer class="entry-footer">
                                    <a href="<?php the_permalink(); ?>" class="read-more">
                                        <?php _e('Read More', 'cbc-school-modern'); ?>
                                    </a>
                                </footer>
                            <?php endif; ?>
                        </div>
                    </article>
                    
                <?php endwhile; ?>
            </div>
            
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
                    <?php if (is_home() && current_user_can('publish_posts')) : ?>
                        
                        <p><?php
                            printf(
                                wp_kses(
                                    __('Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'cbc-school-modern'),
                                    array(
                                        'a' => array(
                                            'href' => array(),
                                        ),
                                    )
                                ),
                                esc_url(admin_url('post-new.php'))
                            );
                        ?></p>
                        
                    <?php elseif (is_search()) : ?>
                        
                        <p><?php _e('Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'cbc-school-modern'); ?></p>
                        <?php get_search_form(); ?>
                        
                    <?php else : ?>
                        
                        <p><?php _e('It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'cbc-school-modern'); ?></p>
                        <?php get_search_form(); ?>
                        
                    <?php endif; ?>
                </div>
            </section>
            
        <?php endif; ?>
        
    </div>
</main>

<?php
get_sidebar();
get_footer();
?>
