<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(

    'name'        => esc_html__( 'Thim: Services', 'coaching' ),
    'base'        => 'thim-services',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Add service box', 'coaching' ),
    'icon'        => 'thim-widget-icon thim-widget-icon-icon-box',
    'params'      => array(
        array(
            'type'        => 'param_group',
            'admin_label' => false,
            'heading'     => esc_html__( 'Service', 'coaching' ),
            'param_name'  => 'service',
            'params'      => array(
                array(
                    'type'        => 'textfield',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Title', 'coaching' ),
                    'param_name'  => 'service_title',
                ),
                array(
                    'type'        => 'attach_image',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Image Of Box', 'coaching' ),
                    'description' => esc_html__( 'Select image from media library.', 'coaching' ),
                    'param_name'  => 'service_image',
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => false,
                    "label"       => esc_html__( "Add Link", 'coaching' ),
                    "description" => esc_html__( "Provide the link that will be applied to this icon box.", 'coaching' ),
                    'param_name'  => 'service_link',
                ),
                array(
                    'type'        => 'colorpicker',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Color', 'coaching' ),
                    'param_name'  => 'service_bg_color',
                    'value'       => '#ff9b9a',
                    'description' => esc_html__( 'Select the color.', 'coaching' ),
                ),
            ),
        ),
    )
) );