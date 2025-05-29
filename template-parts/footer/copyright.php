<?php
/**
 * Copyright Section Template Part
 *
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="footer-bottom">
    <div class="container">
        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved. |
        <a href="<?php echo esc_url(home_url('/privacy-policy')); ?>">Privacy Policy</a> |
        <a href="<?php echo esc_url(home_url('/terms-of-service')); ?>">Terms of Service</a></p>
    </div>
</div>
