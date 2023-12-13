<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(
    'name'        => esc_html__( 'Thim: Daily Support', 'coaching' ),
    'base'        => 'thim-daily-support',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Add Daily Support box', 'coaching' ),
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
            'type'        => 'param_group',
            'admin_label' => false,
            'heading'     => esc_html__( 'Items', 'coaching' ),
            'param_name'  => 'daily-support',
            'params'      => array(
                array(
                    'type'        => 'dropdown',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Position', 'coaching' ),
                    'param_name'  => 'position_support',
                    'value'       => array(
                        esc_html__( 'Left', 'coaching' ) => 'left',
                        esc_html__( 'Right', 'coaching' ) => 'right',
                    ),
                ),
                array(
                    'type'        => 'attach_image',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Image Of Support', 'coaching' ),
                    'param_name'  => 'image_support',
                    'description' => esc_html__( 'Select image from media library.', 'coaching' ),
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => true,
                    'heading'     => esc_html__( 'Support Body', 'coaching' ),
                    'param_name'  => 'body_support',
                ),
            )
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