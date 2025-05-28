<?php
/**
 * The template for displaying all single posts
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top: 120px;">
        
        <?php while (have_posts()) : the_post(); ?>
            
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <header class="entry-header">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    
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
                        
                        <?php if (has_tag()) : ?>
                            <span class="tags-links">
                                <?php the_tags('Tags: ', ', '); ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                </header>
                
                <div class="entry-content">
                    <?php
                    the_content();
                    
                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . esc_html__('Pages:', 'cbc-school-modern'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>
                
                <footer class="entry-footer">
                    <?php
                    // Post navigation
                    the_post_navigation(array(
                        'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'cbc-school-modern') . '</span> <span class="nav-title">%title</span>',
                        'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'cbc-school-modern') . '</span> <span class="nav-title">%title</span>',
                    ));
                    
                    if (get_edit_post_link()) :
                        edit_post_link(
                            sprintf(
                                wp_kses(
                                    __('Edit <span class="screen-reader-text">%s</span>', 'cbc-school-modern'),
                                    array(
                                        'span' => array(
                                            'class' => array(),
                                        ),
                                    )
                                ),
                                get_the_title()
                            ),
                            '<span class="edit-link">',
                            '</span>'
                        );
                    endif;
                    ?>
                </footer>
                
            </article>
            
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
            
        <?php endwhile; ?>
        
    </div>
</main>

<?php
get_sidebar();
get_footer();
?>
