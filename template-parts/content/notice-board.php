<?php
/**
 * Notice Board Template Part
 *
 * @package CBC_School_Modern
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

// Get notice board settings with fallbacks
$notice_board_title = get_theme_mod('notice_board_title', 'Important Notices');
if (empty($notice_board_title)) $notice_board_title = 'Important Notices';

// Get notice items with fallbacks
$notice_items = array();
for ($i = 1; $i <= 3; $i++) {
    $title = get_theme_mod("notice_{$i}_title");
    $content = get_theme_mod("notice_{$i}_content");
    $date = get_theme_mod("notice_{$i}_date");
    $url = get_theme_mod("notice_{$i}_url", '#');

    if ($title && $content) {
        $notice_items[] = array(
            'title' => $title,
            'content' => $content,
            'date' => $date,
            'url' => $url
        );
    }
}

// Add default notices if none are set
if (empty($notice_items)) {
    $notice_items = array(
        array(
            'title' => 'New Academic Year Registration Open',
            'content' => 'Registration for the new academic year is now open. Apply online or visit our admissions office.',
            'date' => date('Y-m-d'),
            'url' => '#'
        ),
        array(
            'title' => 'Parent-Teacher Conference',
            'content' => 'Join us for our quarterly parent-teacher conference on Saturday, 10 AM.',
            'date' => date('Y-m-d'),
            'url' => '#'
        ),
        array(
            'title' => 'Sports Day Event',
            'content' => 'Annual sports day celebration with various competitions and activities.',
            'date' => date('Y-m-d'),
            'url' => '#'
        )
    );
}

// Don't display if no notices
if (empty($notice_items)) {
    return;
}
?>

<div class="notice-board hero-notice-board">
    <div class="notice-board-header">
        <div class="notice-board-icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19 3H5C3.9 3 3 3.9 3 5V19C3 20.1 3.9 21 5 21H19C20.1 21 21 20.1 21 19V5C21 3.9 20.1 3 19 3ZM19 19H5V5H19V19Z" fill="currentColor"/>
                <path d="M7 7H17V9H7V7ZM7 11H17V13H7V11ZM7 15H14V17H7V15Z" fill="currentColor"/>
            </svg>
        </div>
        <h3><?php echo esc_html($notice_board_title); ?></h3>
        <button class="notice-board-toggle" aria-label="<?php esc_attr_e('Toggle notice board', 'cbc-school-modern'); ?>">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7 10L12 15L17 10H7Z" fill="currentColor"/>
            </svg>
        </button>
    </div>

    <div class="notice-board-content">
        <?php foreach ($notice_items as $notice) : ?>
            <div class="notice-item">
                <div class="notice-date">
                    <?php
                    $formatted_date = '';
                    if (!empty($notice['date'])) {
                        $timestamp = strtotime($notice['date']);
                        if ($timestamp) {
                            $formatted_date = date('M d', $timestamp);
                        } else {
                            $formatted_date = $notice['date'];
                        }
                    }
                    echo esc_html($formatted_date);
                    ?>
                </div>
                <div class="notice-details">
                    <h4><?php echo esc_html($notice['title']); ?></h4>
                    <p><?php echo esc_html($notice['content']); ?></p>
                    <?php if (!empty($notice['url']) && $notice['url'] !== '#') : ?>
                        <a href="<?php echo esc_url($notice['url']); ?>" class="notice-link">Read More</a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
