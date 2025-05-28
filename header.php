<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="header-container">
            <div class="site-branding">
                <?php
                if (has_custom_logo()) {
                    the_custom_logo();
                } else {
                    ?>
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="site-logo" rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                    <?php
                }
                ?>
            </div>

            <nav id="site-navigation" class="main-navigation">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                    'container'      => false,
                    'fallback_cb'    => 'cbc_school_fallback_menu',
                ));
                ?>
            </nav>

            <button class="mobile-menu-toggle" aria-label="Toggle mobile menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <div id="content" class="site-content">

<?php
// Fallback menu function
function cbc_school_fallback_menu() {
    echo '<ul id="primary-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
    echo '<li><a href="' . esc_url(home_url('/about')) . '">About Us</a></li>';
    echo '<li><a href="' . esc_url(home_url('/programs')) . '">Programs</a></li>';
    echo '<li><a href="' . esc_url(home_url('/admissions')) . '">Admissions</a></li>';
    echo '<li><a href="' . esc_url(home_url('/news-events')) . '">News & Events</a></li>';
    echo '<li><a href="' . esc_url(home_url('/gallery')) . '">Gallery</a></li>';
    echo '<li><a href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
    echo '<li><a href="' . esc_url(home_url('/student-portal')) . '">Student Portal</a></li>';
    echo '</ul>';
}
?>
