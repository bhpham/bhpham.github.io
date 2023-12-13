<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Gallery Videos
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_gallery_videos( $atts ) {

	$instance = shortcode_atts( array(
		'title'        => '',
		'cad_id'       => '',
		'orderby'      => '',
		'link'         => '',
		'text_link'    => '',
		'number_posts' => '8',
        'style'        => '',
		'el_class'     => '',
	), $atts );


	$args                 = array();
	$args['before_title'] = '<h3 class="widget-title">';
	$args['after_title']  = '</h3>';

    if ( isset($instance['style']) && $instance['style'] != '' ) {
        $layout = $instance['style'] . '.php';
    } else {
        $layout = 'base.php';
    }

	$widget_template       = THIM_DIR . 'inc/widgets/gallery-videos/tpl/' . $layout;
	$child_widget_template = THIM_CHILD_THEME_DIR . 'inc/widgets/gallery-videos/' . $layout;
	if ( file_exists( $child_widget_template ) ) {
		$widget_template = $child_widget_template;
	}

	ob_start();
	if ( $instance['el_class'] ) {
		echo '<div class="' . $instance['el_class'] . '">';
	}
	echo '<div class="thim-widget-gallery-videos">';
	include $widget_template;
	echo '</div>';
	if ( $instance['el_class'] ) {
		echo '</div>';
	}
	$html_output = ob_get_contents();
	ob_end_clean();

	return $html_output;
}

add_shortcode( 'thim-gallery-videos', 'thim_shortcode_gallery_videos' );


