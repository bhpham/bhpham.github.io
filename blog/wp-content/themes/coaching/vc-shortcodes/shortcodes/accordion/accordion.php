<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Shortcode accordion
 *
 * @param $atts
 *
 * @return string
 */
function thim_shortcode_accordion( $atts ) {

    $instance = shortcode_atts( array(
        'title' => '',
        'show_first_panel' => '',
        'panel' => '',
        'el_class' => '',
    ), $atts );

    $instance['panel'] = (array) vc_param_group_parse_atts( $instance['panel'] );

    $widget_template       = THIM_DIR . 'inc/widgets/accordion/tpl/base.php';
    $child_widget_template = THIM_CHILD_THEME_DIR . 'inc/widgets/accordion/base.php';
    if ( file_exists( $child_widget_template ) ) {
        $widget_template = $child_widget_template;
    }

    ob_start();
    if($instance['el_class']) echo '<div class="'.$instance['el_class'].'">';
    echo '<div class="thim-widget-accordion">';
    include $widget_template;
    echo '</div>';
    if($instance['el_class']) echo '</div>';
    $html_output = ob_get_contents();
    ob_end_clean();

    return $html_output;
}

add_shortcode( 'thim-accordion', 'thim_shortcode_accordion' );
