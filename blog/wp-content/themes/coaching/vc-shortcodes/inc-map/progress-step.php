<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(
    'name'        => esc_html__( 'Thim: Progress Step', 'coaching' ),
    'base'        => 'thim-progress-step',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Add progress step', 'coaching' ),
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
            'type'        => 'textarea',
            'admin_label' => false,
            'heading'     => esc_html__( 'Title Description', 'coaching' ),
            'param_name'  => 'title_description',
        ),
        array(
            'type'        => 'param_group',
            'admin_label' => false,
            'heading'     => esc_html__( 'Items', 'coaching' ),
            'param_name'  => 'panel',
            'params'      => array(
                array(
                    'type'        => 'textfield',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Title', 'coaching' ),
                    'param_name'  => 'panel_title',
                ),
                array(
                    'type'        => 'textarea',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Panel Body', 'coaching' ),
                    'param_name'  => 'panel_body',
                ),
            )
        ),
        array(
            'type'        => 'checkbox',
            'admin_label' => false,
            'heading'     => esc_html__( 'Autoplay', 'coaching' ),
            'param_name'  => 'autoplay',
            'std'         => false,
        ),
        array(
            'type'        => 'checkbox',
            'admin_label' => false,
            'heading'     => esc_html__( 'Navigation', 'coaching' ),
            'param_name'  => 'navigation',
            'std'         => false,
        ),
        array(
            'type'        => 'checkbox',
            'admin_label' => false,
            'heading'     => esc_html__( 'Pagination', 'coaching' ),
            'param_name'  => 'pagination',
            'std'         => false,
        ),
        array(
            'type'        => 'number',
            'admin_label' => false,
            'heading'     => esc_html__( 'Autoplay Timeout', 'coaching' ),
            'param_name'  => 'autoplayTimeout',
            'std'         => 6000,
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