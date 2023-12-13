<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Shortcode Services
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_services( $atts ) {

	$instance = shortcode_atts( array(
		'service'   => '',
		'el_class' => '',
	), $atts );

    $args                 = array();

    $instance['service'] = (array) vc_param_group_parse_atts( $instance['service'] );


    $widget_template       = THIM_DIR . 'inc/widgets/services/tpl/base.php';
    $child_widget_template = THIM_CHILD_THEME_DIR . 'inc/widgets/services/base.php';

	if ( file_exists( $child_widget_template ) ) {
		$widget_template = $child_widget_template;
	}

	ob_start();
	if ( $instance['el_class'] ) {
		echo '<div class="' . $instance['el_class'] . '">';
	}
	echo '<div class="thim-widget-services">';
	include $widget_template;
	echo '</div>';
	if ( $instance['el_class'] ) {
		echo '</div>';
	}
	$html_output = ob_get_contents();
	ob_end_clean();

	return $html_output;
}

add_shortcode( 'thim-services', 'thim_shortcode_services' );
