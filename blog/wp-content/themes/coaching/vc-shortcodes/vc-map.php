<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'THIM_DIR_SHORTCODES_MAP', THIM_DIR . 'vc-shortcodes/inc-map/' );

/**
 * Mapping shortcodes
 */
function ts_map_vc_shortcodes() {

    include_once( THIM_DIR_SHORTCODES_MAP . 'accordion.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'button.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'carousel-post.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'countdown-box.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'counters-box.php' );

    include_once( THIM_DIR_SHORTCODES_MAP . 'daily-support.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'empty-space.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'gallery-images.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'gallery-posts.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'gallery-videos.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'google-map.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'heading.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'icon-box.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'image-box.php' );

    include_once( THIM_DIR_SHORTCODES_MAP . 'list-post.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'login-form.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'login-menu.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'login-popup.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'our-team.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'plan.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'portfolio.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'program.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'progress.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'progress-step.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'round-slider.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'single-images.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'social.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'social-counter.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'tab.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'testimonials.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'timeline-slider.php' );

    include_once( THIM_DIR_SHORTCODES_MAP . 'video.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'video-popup.php' );
    include_once( THIM_DIR_SHORTCODES_MAP . 'services.php' );
	include_once( THIM_DIR_SHORTCODES_MAP . 'about-me.php' );

    if ( thim_plugin_active( 'learnpress/learnpress.php' ) ) {
        include_once( THIM_DIR_SHORTCODES_MAP . 'course-categories.php' );
        include_once( THIM_DIR_SHORTCODES_MAP . 'courses.php' );
    }
    if ( thim_plugin_active( 'thim-twitter/thim-twitter.php' ) ) {
        include_once( THIM_DIR_SHORTCODES_MAP . 'twitter.php' );
    }
    if ( thim_plugin_active( 'wp-events-manager/wp-events-manager.php' ) ) {
        include_once( THIM_DIR_SHORTCODES_MAP . 'list-events.php' );
    }
}

add_action( 'vc_before_init', 'ts_map_vc_shortcodes' );
