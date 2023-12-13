<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Heading
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_heading( $atts ) {
	$instance = shortcode_atts( array(
		'title'             => '',
		'size'              => 'h3',
		'textcolor'         => '',
		'font_size'         => '',
		'font_weight'       => '',
		'font_style'        => '',
        'custom_line_height'        => '',
        'custom_style'        => '',
		'title_custom'      => '',
        'font_sub_heading'      => '',
		'sub_heading'       => '',
		'sub_heading_color' => '',
        'custom_sub_font_size' => '',
        'custom_sub_font_weight' => '',
        'custom_sub_line_height' => '',
        'custom_sub_font_style' => '',
		'line'              => '',
		'bg_line'           => '',
		'css_animation'     => '',
		'type'              => '',
		'description'       => '',
		'text_align'        => '',
		'el_class'          => '',
	), $atts );

	$instance['font_heading']        = $instance['title_custom'];
    $instance['font_sub_heading']    = $instance['font_sub_heading'];
	$instance['content']             = $instance['description'];
	$instance['custom_font_heading'] = array(
		'custom_font_size'   => $instance['font_size'],
		'custom_font_weight' => $instance['font_weight'],
        'custom_line_height' => $instance['custom_line_height'],
        'custom_style' => $instance['custom_style'],
		'custom_font_style'  => $instance['font_style'],
	);
    $instance['custom_font_sub_heading'] = array(
        'custom_sub_font_size'   => $instance['custom_sub_font_size'],
        'custom_sub_font_weight' => $instance['custom_sub_font_weight'],
        'custom_sub_line_height' => $instance['custom_sub_line_height'],
        'custom_sub_font_style'  => $instance['custom_sub_font_style'],
    );

	$widget_template       = THIM_DIR . 'inc/widgets/heading/tpl/base.php';
	$child_widget_template = THIM_CHILD_THEME_DIR . 'inc/widgets/heading/base.php';
	if ( file_exists( $child_widget_template ) ) {
		$widget_template = $child_widget_template;
	}

	ob_start();
	if ( $instance['el_class'] ) {
		echo '<div class="' . $instance['el_class'] . '">';
	}
	echo '<div class="thim-widget-heading">';
	include $widget_template;
	echo '</div>';
	if ( $instance['el_class'] ) {
		echo '</div>';
	}
	$html_output = ob_get_contents();
	ob_end_clean();

	return $html_output;
}

add_shortcode( 'thim-heading', 'thim_shortcode_heading' );


