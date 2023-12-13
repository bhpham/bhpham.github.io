<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Shortcode Timeline Slider
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_timeline_slider( $atts ) {

    $instance = shortcode_atts( array(
        'title' => '',
        'item' => '',
        'number' => 4,
        'el_class' => '',
    ), $atts );

    $instance['item'] = (array) vc_param_group_parse_atts( $instance['item'] );

    $args                 = array();
    $args['before_title'] = '<h3 class="widget-title">';
    $args['after_title']  = '</h3>';

    $widget_template       = THIM_DIR . 'inc/widgets/timeline-slider/tpl/base.php';
    $child_widget_template = THIM_CHILD_THEME_DIR . 'inc/widgets/timeline-slider/base.php';
    if ( file_exists( $child_widget_template ) ) {
        $widget_template = $child_widget_template;
    }

    ob_start();
    if($instance['el_class']) echo '<div class="'.$instance['el_class'].'">';
    echo '<div class="thim-widget-timeline-slider">';
    include $widget_template;
    echo '</div>';
    if($instance['el_class']) echo '</div>';
    $html_output = ob_get_contents();
    ob_end_clean();

    return $html_output;
}

add_shortcode( 'thim-timeline-slider', 'thim_shortcode_timeline_slider' );


