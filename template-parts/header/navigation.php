<?php
/**
 * Navigation Template Part
 * 
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e('Primary Navigation', 'cbc-school-modern'); ?>">
    <?php
    wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_id'        => 'primary-menu',
        'container'      => false,
        'fallback_cb'    => 'cbc_school_fallback_menu',
        'depth'          => 2,
    ));
    ?>
</nav>

<?php
/**
 * Fallback menu if no menu is assigned
 */
function cbc_school_fallback_menu() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'cbc-school-modern') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about/')) . '">' . esc_html__('About', 'cbc-school-modern') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/academics/')) . '">' . esc_html__('Academics', 'cbc-school-modern') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/admissions/')) . '">' . esc_html__('Admissions', 'cbc-school-modern') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/news-events/')) . '">' . esc_html__('News & Events', 'cbc-school-modern') . '</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact/')) . '">' . esc_html__('Contact', 'cbc-school-modern') . '</a></li>';
    echo '</ul>';
}
?>
