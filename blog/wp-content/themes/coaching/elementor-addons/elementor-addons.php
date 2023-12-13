<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

define( 'THIM_EL_PATH', THIM_DIR . 'elementor-addons/' );
define( 'THIM_EL_ADDONS_PATH', THIM_EL_PATH . 'elements/' );

require_once THIM_EL_PATH . 'inc/elementor-helper.php';
require_once THIM_EL_PATH . 'inc/class-elementor-extend-icons.php';

function thim_add_new_elements() {
	require_once THIM_EL_PATH . 'inc/helper.php';

	//Load elements
	require THIM_EL_ADDONS_PATH . 'services/services.php';
	require THIM_EL_ADDONS_PATH . 'heading/heading.php';
	require THIM_EL_ADDONS_PATH . 'icon-box/icon-box.php';
	require THIM_EL_ADDONS_PATH . 'countdown-box/countdown-box.php';
	require THIM_EL_ADDONS_PATH . 'carousel-post/carousel-post.php';
	require THIM_EL_ADDONS_PATH . 'counters-box/counters-box.php';
	require THIM_EL_ADDONS_PATH . 'daily-support/daily-support.php';
	require THIM_EL_ADDONS_PATH . 'google-map/google-map.php';
	require THIM_EL_ADDONS_PATH . 'gallery-images/gallery-images.php';
	require THIM_EL_ADDONS_PATH . 'accordion/accordion.php';
	require THIM_EL_ADDONS_PATH . 'plan/plan.php';
	require THIM_EL_ADDONS_PATH . 'program/program.php';
	require THIM_EL_ADDONS_PATH . 'progress/progress.php';
	require THIM_EL_ADDONS_PATH . 'progress-step/progress-step.php';
	require THIM_EL_ADDONS_PATH . 'round-slider/round-slider.php';
//	require THIM_EL_ADDONS_PATH . 'slider/slider.php';
	require THIM_EL_ADDONS_PATH . 'gallery-posts/gallery-posts.php';
	require THIM_EL_ADDONS_PATH . 'gallery-videos/gallery-videos.php';
	require THIM_EL_ADDONS_PATH . 'login-form/login-form.php';
	require THIM_EL_ADDONS_PATH . 'login-menu/login-menu.php';

	require THIM_EL_ADDONS_PATH . 'video/video.php';
	require THIM_EL_ADDONS_PATH . 'video-popup/video-popup.php';
	require THIM_EL_ADDONS_PATH . 'list-post/list-post.php';
	require THIM_EL_ADDONS_PATH . 'social/social.php';
	require THIM_EL_ADDONS_PATH . 'tab/tab.php';
	require THIM_EL_ADDONS_PATH . 'timeline-slider/timeline-slider.php';
	require THIM_EL_ADDONS_PATH . 'image-box/image-box.php';
	require THIM_EL_ADDONS_PATH . 'navigation-menu/navigation-menu.php';
	require THIM_EL_ADDONS_PATH . 'about-me/about-me.php';


	if ( thim_plugin_active( 'social-count-plus/social-count-plus.php' ) ) {
		require THIM_EL_ADDONS_PATH . 'social-counter/social-counter.php';
	}

	if ( class_exists( 'THIM_Testimonials' ) ) {
		require THIM_EL_ADDONS_PATH . 'testimonials/testimonials.php';
	}

	if ( thim_plugin_active( 'thim-portfolio/init.php' ) || thim_plugin_active( 'tp-portfolio/init.php' ) || thim_plugin_active( 'tp-portfolio/tp-portfolio.php' ) || thim_plugin_active( 'thim-portfolio/thim-portfolio.php' ) ) {
		require THIM_EL_ADDONS_PATH . 'portfolio/portfolio.php';
	}

	if ( class_exists( 'THIM_Our_Team' ) ) {
		require THIM_EL_ADDONS_PATH . 'our-team/our-team.php';
	}

	if ( thim_plugin_active( 'tp-event/tp-event.php' ) || thim_plugin_active( 'tp-event/event.php' ) || thim_plugin_active( 'wp-events-manager/wp-events-manager.php' ) ) {
		require THIM_EL_ADDONS_PATH . 'list-event/list-event.php';
	}

	if ( class_exists( 'LearnPress' ) ) {
		require THIM_EL_ADDONS_PATH . 'courses/courses.php';
		require THIM_EL_ADDONS_PATH . 'course-categories/course-categories.php';
	}
}

add_action( 'elementor/widgets/widgets_registered', 'thim_add_new_elements' );