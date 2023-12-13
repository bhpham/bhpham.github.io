<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode List Posts
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_list_post( $atts ) {

	$instance = shortcode_atts( array(
		'title'            => '',
		'style'            => '',
		'cat_id'           => '',
		'image_size'       => 'none',
		'size_w'           => '',
		'size_h'           => '',
		'show_description' => false,
		'number_posts'     => '4',
		'orderby'          => 'recent',
		'order'            => 'asc',
		'feature_text'     => '',
		'link'             => '',
		'text_link'        => '',
		'autoplay'         => false,
		'autoplayTimeout'  => 6000,
		'el_class'         => '',
	), $atts );


	$args                 = array();
	$args['before_title'] = '<h3 class="widget-title">';
	$args['after_title']  = '</h3>';

	if ( $instance['style'] == 'gym' || $instance['style'] == 'therapist' || $instance['style'] == 'health_slider' || $instance['style'] == 'effective' || $instance['style'] == 'health_sticky' || $instance['style'] == 'health_2'  || $instance['style'] == 'home5' ) {
		$layout = $instance['style'] . '.php';
	} else {
		$layout = 'base.php';
	}

	$widget_template       = THIM_DIR . 'inc/widgets/list-post/tpl/' . $layout;
	$child_widget_template = THIM_CHILD_THEME_DIR . 'inc/widgets/list-post/' . $layout;
	if ( file_exists( $child_widget_template ) ) {
		$widget_template = $child_widget_template;
	}

	ob_start();
	if ( $instance['el_class'] ) {
		echo '<div class="' . $instance['el_class'] . '">';
	}
	echo '<div class="thim-widget-list-post">';
	include $widget_template;
	echo '</div>';
	if ( $instance['el_class'] ) {
		echo '</div>';
	}
	$html_output = ob_get_contents();
	ob_end_clean();

	return $html_output;
}

add_shortcode( 'thim-list-post', 'thim_shortcode_list_post' );


