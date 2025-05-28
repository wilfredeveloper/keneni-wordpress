<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="container" style="padding-top: 120px;">
        
        <section class="error-404 not-found text-center">
            <header class="page-header">
                <h1 class="page-title" style="font-size: 8rem; color: #ff6b35; margin-bottom: 1rem;">404</h1>
                <h2><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'cbc-school-modern'); ?></h2>
            </header>
            
            <div class="page-content">
                <p><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'cbc-school-modern'); ?></p>
                
                <div class="error-404-search" style="margin: 2rem 0;">
                    <?php get_search_form(); ?>
                </div>
                
                <div class="error-404-links">
                    <h3><?php esc_html_e('Quick Links', 'cbc-school-modern'); ?></h3>
                    <ul style="list-style: none; padding: 0;">
                        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'cbc-school-modern'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/about')); ?>"><?php esc_html_e('About Us', 'cbc-school-modern'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/academics')); ?>"><?php esc_html_e('Academics', 'cbc-school-modern'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/admissions')); ?>"><?php esc_html_e('Admissions', 'cbc-school-modern'); ?></a></li>
                        <li><a href="<?php echo esc_url(home_url('/contact')); ?>"><?php esc_html_e('Contact Us', 'cbc-school-modern'); ?></a></li>
                    </ul>
                </div>
                
                <div class="error-404-recent-posts">
                    <h3><?php esc_html_e('Recent Posts', 'cbc-school-modern'); ?></h3>
                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 5,
                        'post_status' => 'publish'
                    ));
                    
                    if ($recent_posts) :
                        echo '<ul>';
                        foreach ($recent_posts as $post) :
                            echo '<li><a href="' . get_permalink($post['ID']) . '">' . $post['post_title'] . '</a></li>';
                        endforeach;
                        echo '</ul>';
                        wp_reset_query();
                    endif;
                    ?>
                </div>
                
                <div class="error-404-categories">
                    <h3><?php esc_html_e('Categories', 'cbc-school-modern'); ?></h3>
                    <?php
                    wp_list_categories(array(
                        'orderby'    => 'count',
                        'order'      => 'DESC',
                        'show_count' => 1,
                        'title_li'   => '',
                        'number'     => 10,
                    ));
                    ?>
                </div>
                
                <div style="margin-top: 3rem;">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="cta-button">
                        <?php esc_html_e('Back to Home', 'cbc-school-modern'); ?>
                    </a>
                </div>
            </div>
        </section>
        
    </div>
</main>

<?php
get_footer();
?>
