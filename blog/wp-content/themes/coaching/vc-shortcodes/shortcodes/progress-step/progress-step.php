<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Shortcode Progress
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_progress_step( $atts ) {

    $instance = shortcode_atts( array(
        'title' => '',
        'title_description' => '',
        'panel' => '',
        'autoplay' => false,
        'navigation' => false,
        'pagination' => false,
        'autoplayTimeout' => 6000,
        'el_class' => '',
    ), $atts );

    $instance['panel'] = (array) vc_param_group_parse_atts( $instance['panel'] );

    $args                 = array();
    $args['before_title'] = '<h3 class="widget-title">';
    $args['after_title']  = '</h3>';

    $widget_template       = THIM_DIR . 'inc/widgets/progress-step/tpl/base.php';
    $child_widget_template = THIM_CHILD_THEME_DIR . 'inc/widgets/progress-step/base.php';
    if ( file_exists( $child_widget_template ) ) {
        $widget_template = $child_widget_template;
    }

    ob_start();
    if($instance['el_class']) echo '<div class="'.$instance['el_class'].'">';
    echo '<div class="thim-widget-progress-step">';
    include $widget_template;
    echo '</div>';
    if($instance['el_class']) echo '</div>';
    $html_output = ob_get_contents();
    ob_end_clean();

    return $html_output;
}

add_shortcode( 'thim-progress-step', 'thim_shortcode_progress_step' );
