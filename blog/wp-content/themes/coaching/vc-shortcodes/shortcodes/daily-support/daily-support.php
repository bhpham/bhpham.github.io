<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Shortcode Daily Support
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_daily_support( $atts ) {

    $instance = shortcode_atts( array(
        'title' => '',
        'daily-support' => '',
        'el_class' => '',
    ), $atts );

    $instance['daily-support'] = (array) vc_param_group_parse_atts( $instance['daily-support'] );

    $widget_template       = THIM_DIR . 'inc/widgets/daily-support/tpl/base.php';
    $child_widget_template = THIM_CHILD_THEME_DIR . 'inc/widgets/daily-support/base.php';
    if ( file_exists( $child_widget_template ) ) {
        $widget_template = $child_widget_template;
    }

    $args                 = array();
    $args['before_title'] = '<h3 class="widget-title">';
    $args['after_title']  = '</h3>';

    $widget_template       = THIM_DIR . 'inc/widgets/daily-support/tpl/base.php';
    $child_widget_template = THIM_CHILD_THEME_DIR . 'inc/widgets/daily-support/base.php';
    if ( file_exists( $child_widget_template ) ) {
        $widget_template = $child_widget_template;
    }

    ob_start();
    if($instance['el_class']) echo '<div class="'.$instance['el_class'].'">';
    echo '<div class="thim-widget-round-slider">';
    include $widget_template;
    echo '</div>';
    if($instance['el_class']) echo '</div>';
    $html_output = ob_get_contents();
    ob_end_clean();

    return $html_output;
}

add_shortcode( 'thim-daily-support', 'thim_shortcode_daily_support' );
