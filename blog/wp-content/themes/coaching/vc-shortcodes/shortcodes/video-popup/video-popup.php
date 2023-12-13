<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Video popup
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_video_popup( $atts ) {

	$instance = shortcode_atts( array(
		'title'    => '',
        'description'    => '',
		'panel_image'   => '',
		'url_video' => '',
        'el_class' => '',
	), $atts );


	$args                 = array();
	$args['before_title'] = '<h3 class="widget-title">';
	$args['after_title']  = '</h3>';

	$instance['content'] = $instance['description'];

	$widget_template       = THIM_DIR . 'inc/widgets/video-popup/tpl/base.php';
	$child_widget_template = THIM_CHILD_THEME_DIR . 'inc/widgets/video-popup/base.php';
	if ( file_exists( $child_widget_template ) ) {
		$widget_template = $child_widget_template;
	}

	ob_start();
    if($instance['el_class']) echo '<div class="'.$instance['el_class'].'">';
	echo '<div class="thim-widget-video-popup">';
	include $widget_template;
	echo '</div>';
    if($instance['el_class']) echo '</div>';
	$html_output = ob_get_contents();
	ob_end_clean();

	return $html_output;
}

add_shortcode( 'thim-video-popup', 'thim_shortcode_video_popup' );


