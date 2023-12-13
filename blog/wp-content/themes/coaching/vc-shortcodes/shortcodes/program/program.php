<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Shortcode Program
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_program( $atts ) {

    $instance = shortcode_atts( array(
        'title' => '',
        'text_align' => '',
        'style' => '',
        'columns'=> '',
        'program' => '',
        'el_class' => '',
    ), $atts );

    $instance['program'] = (array) vc_param_group_parse_atts( $instance['program'] );

    $args                 = array();
    $args['before_title'] = '<h3 class="widget-title">';
    $args['after_title']  = '</h3>';

    if ( ! empty( $instance['style'] ) ) {
        $layout = $instance['style'] . '.php';
    } else {
        $layout = 'base.php';
    }

    $widget_template       = THIM_DIR . 'inc/widgets/program/tpl/' . $layout;
    $child_widget_template = THIM_CHILD_THEME_DIR . 'inc/widgets/program/' . $layout;
    if ( file_exists( $child_widget_template ) ) {
        $widget_template = $child_widget_template;
    }

    ob_start();
    if($instance['el_class']) echo '<div class="'.$instance['el_class'].'">';
    echo '<div class="thim-widget-program">';
    include $widget_template;
    echo '</div>';
    if($instance['el_class']) echo '</div>';
    $html_output = ob_get_contents();
    ob_end_clean();

    return $html_output;
}

add_shortcode( 'thim-program', 'thim_shortcode_program' );
