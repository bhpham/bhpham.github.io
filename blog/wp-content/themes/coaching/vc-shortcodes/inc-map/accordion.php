<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(

    'name'        => esc_html__( 'Thim: Accordion', 'coaching' ),
    'base'        => 'thim-accordion',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Add accordion box', 'coaching' ),
    'icon'        => 'thim-widget-icon thim-widget-icon-icon-box',
    'params'      => array(
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Title', 'coaching' ),
            'param_name'  => 'title',
            'description' => esc_html__( 'Provide the title for this Accordion.', 'coaching' ),
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
                    'description' => esc_html__( 'Title of the panel', 'coaching' ),
                ),
                array(
                    'type'        => 'textarea',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Panel Body', 'coaching' ),
                    'param_name'  => 'panel_body',
                    'std'         => esc_html__( 'Put content', 'coaching' ),
                ),
            )
        ),
        array(
            'type'        => 'checkbox',
            'admin_label' => false,
            'heading'     => esc_html__( 'Show First Panel', 'coaching' ),
            'param_name'  => 'show_first_panel',
            'std'         => false,
        ),
    )
) );