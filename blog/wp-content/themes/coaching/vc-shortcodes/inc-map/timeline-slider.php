<?php

vc_map( array(
    'name'        => esc_html__( 'Thim: Timeline Slider', 'coaching' ),
    'base'        => 'thim-timeline-slider',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Display Timeline Slider.', 'coaching' ),
    'icon'        => 'thim-widget-icon thim-widget-icon-timetable',
    'params'      => array(
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Title', 'coaching' ),
            'param_name'  => 'title',
            'value'       => '',
        ),

        array(
            'type'        => 'param_group',
            'admin_label' => false,
            'heading'     => esc_html__( 'Items', 'coaching' ),
            'param_name'  => 'item',
            'params'      => array(
                array(
                    'type'       => 'textfield',
                    'admin_label' => false,
                    'heading'    => esc_html__( 'Title', 'coaching' ),
                    'std'        => esc_html__( 'Title', 'coaching' ),
                    'param_name' => 'title',
                ),
                array(
                    'type'        => 'textarea',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Description', 'coaching' ),
                    'param_name'  => 'description',
                    'std'         => esc_html__( 'Write a short description, that will describe the title or something informational and useful.', 'coaching' ),
                ),
                array(
                    'type'       => 'textfield',
                    'admin_label' => false,
                    'heading'    => esc_html__( 'Date time', 'coaching' ),
                    'param_name' => 'timeline',
                ),
            )
        ),
        array(
            'type'        => 'number',
            'admin_label' => true,
            'heading'     => esc_html__( 'Visible Item', 'coaching' ),
            'param_name'  => 'number',
            'std'         => 4,
        ),

        // Extra class
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Extra class', 'coaching' ),
            'param_name'  => 'el_class',
            'value'       => '',
            'description' => esc_html__( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'coaching' ),
        ),
    )
) );