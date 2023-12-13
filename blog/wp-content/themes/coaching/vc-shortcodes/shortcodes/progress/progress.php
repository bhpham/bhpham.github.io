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
function thim_shortcode_progress( $atts ) {

    $instance = shortcode_atts( array(
        'title' => '',
        'panel' => '',
        'height' => '',
        'color' => '#2e8ece',
        'bg_color' => '#eaeaea',
        'el_class' => '',
    ), $atts );

    $instance['style_options']['height'] = $instance['height'];
    $instance['style_options']['color'] = $instance['color'];
    $instance['style_options']['bg_color'] = $instance['bg_color'];

    $args                 = array();
    $args['before_title'] = '<h3 class="widget-title">';
    $args['after_title']  = '</h3>';

    $widget_template       = THIM_DIR . 'inc/widgets/progress/tpl/base.php';
    $child_widget_template = THIM_CHILD_THEME_DIR . 'inc/widgets/progress/base.php';
    if ( file_exists( $child_widget_template ) ) {
        $widget_template = $child_widget_template;
    }

    ob_start();
    if($instance['el_class']) echo '<div class="'.$instance['el_class'].'">';
    echo '<div class="thim-widget-progress">';
    include $widget_template;
    echo '</div>';
    if($instance['el_class']) echo '</div>';
    $html_output = ob_get_contents();
    ob_end_clean();

    return $html_output;
}

add_shortcode( 'thim-progress', 'thim_shortcode_progress' );
