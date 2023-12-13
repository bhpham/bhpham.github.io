<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(
    'name'        => esc_html__( 'Thim: Plan', 'coaching' ),
    'base'        => 'thim-plan',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Add Plan', 'coaching' ),
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