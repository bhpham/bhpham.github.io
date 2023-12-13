<?php
/*
Shortcodes Visual Composer for theme Coaching.
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

define( 'THIM_SC_PATH', THIM_DIR . 'vc-shortcodes' );
define( 'THIM_SC_URL', plugin_dir_url( __FILE__ ) );

// Map shortcodes to Visual Composer
require_once( THIM_DIR . 'vc-shortcodes/vc-map.php' );

// Register new parameters for shortcodes
require_once( THIM_DIR . 'vc-shortcodes/vc-functions.php' );

// Register shortcodes
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/services/services.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/accordion/accordion.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/button/button.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/carousel-post/carousel-post.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/countdown-box/countdown-box.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/counters-box/counters-box.php' );

require_once( THIM_DIR . 'vc-shortcodes/shortcodes/daily-support/daily-support.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/empty-space/empty-space.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/gallery-images/gallery-images.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/gallery-posts/gallery-posts.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/gallery-videos/gallery-videos.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/google-map/google-map.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/heading/heading.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/icon-box/icon-box.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/image-box/image-box.php' );

require_once( THIM_DIR . 'vc-shortcodes/shortcodes/list-post/list-post.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/login-form/login-form.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/login-menu/login-menu.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/login-popup/login-popup.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/our-team/our-team.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/plan/plan.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/portfolio/portfolio.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/program/program.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/progress/progress.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/progress-step/progress-step.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/round-slider/round-slider.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/single-images/single-images.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/social/social.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/social-counter/social-counter.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/tab/tab.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/twitter/twitter.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/testimonials/testimonials.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/timeline-slider/timeline-slider.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/video/video.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/video-popup/video-popup.php' );
require_once( THIM_DIR . 'vc-shortcodes/shortcodes/about-me/about-me.php' );
if ( thim_plugin_active( 'learnpress/learnpress.php' ) ) {
	require_once( THIM_DIR . 'vc-shortcodes/shortcodes/course-categories/course-categories.php' );
	require_once( THIM_DIR . 'vc-shortcodes/shortcodes/courses/courses.php' );
}
if ( thim_plugin_active( 'wp-events-manager/wp-events-manager.php' ) ) {
	require_once( THIM_DIR . 'vc-shortcodes/shortcodes/list-events/list-events.php' );
}