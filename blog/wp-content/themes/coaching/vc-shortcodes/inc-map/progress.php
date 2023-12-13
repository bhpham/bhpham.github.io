<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(
    'name'        => esc_html__( 'Thim: Progress', 'coaching' ),
    'base'        => 'thim-progress',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Add progress', 'coaching' ),
    'icon'        => 'thim-widget-icon thim-widget-icon-icon-box',
    'params'      => array(
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Title', 'coaching' ),
            'param_name'  => 'title',
            'description' => esc_html__( 'Provide the title for this box.', 'coaching' ),
        ),
        array(
            'type'        => 'number',
            'admin_label' => false,
            'heading'     => esc_html__( 'Input percent', 'coaching' ),
            'param_name'  => 'panel',
            'min'         => 0,
            'max'         => 100,
            'std'         => 0,
        ),
        array(
            'type'        => 'number',
            'admin_label' => false,
            'heading'     => esc_html__( 'Set height', 'coaching' ),
            'param_name'  => 'height',
            'std'         => 5,
        ),
        array(
            'type'        => 'colorpicker',
            'admin_label' => false,
            'heading'     => esc_html__( 'Color', 'coaching' ),
            'param_name'  => 'color',
            'value'       => '#2e8ece',
            'description' => esc_html__( 'Select the color.', 'coaching' ),
        ),
        array(
            'type'        => 'colorpicker',
            'admin_label' => false,
            'heading'     => esc_html__( 'Background Color', 'coaching' ),
            'param_name'  => 'bg_color',
            'value'       => '#eaeaea',
            'description' => esc_html__( 'Select the background color.', 'coaching' ),
        ),
        // Extra class
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Extra class', 'coaching' ),
            'param_name'  => 'el_class',
            'value'       => '',
            'description' => esc_html__( 'Add extra class name that will be applied to the box, and you can use this class for your customizations.', 'coaching' ),
        ),
    )
) );