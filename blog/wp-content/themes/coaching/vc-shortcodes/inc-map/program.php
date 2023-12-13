<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(
    'name'        => esc_html__( 'Thim: Program', 'coaching' ),
    'base'        => 'thim-program',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Add Program', 'coaching' ),
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
            'type'        => 'dropdown',
            'admin_label' => false,
            'heading'     => esc_html__( 'Text alignment', 'coaching' ),
            'param_name'  => 'text_align',
            'value'       => array(
                esc_html__( 'Text at center', 'coaching' ) => 'text-center',
                esc_html__( 'Text at left', 'coaching' )   => 'text-left',
                esc_html__( 'Text at right', 'coaching' )  => 'text-right',
            ),
            'std'       => 'text-center',
        ),
        array(
            'type'        => 'dropdown',
            'admin_label' => false,
            'heading'     => esc_html__( 'Style', 'coaching' ),
            'param_name'  => 'style',
            'value'       => array(
                esc_html__( 'Normal', 'coaching' ) => 'normal',
                esc_html__( 'Slider', 'coaching' )   => 'slidert',
            ),
            'std'       => 'normal',
        ),
        array(
                    'type'       => 'dropdown',
                    'heading'    => __( 'Select Columns', 'tutorx' ),
                    'param_name' => 'columns',
                    'value'      => array(
                        esc_html__( '2 columns', 'tutorx' ) => '2',
                        esc_html__( '3 columns', 'tutorx' ) => '3',
                        esc_html__( '4 columns', 'tutorx' ) => '4',
                        esc_html__( '6 columns', 'tutorx' ) => '6',
                    ),
                    'std'       => '3',
                    'dependency' => array(
                        'element' => 'style',
                        'value'   => 'normal',
                    ),
                ),
        array(
            'type'        => 'param_group',
            'admin_label' => false,
            'heading'     => esc_html__( 'Items', 'coaching' ),
            'param_name'  => 'program',
            'params'      => array(
                array(
                    'type'        => 'textfield',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Title Of Program', 'coaching' ),
                    'param_name'  => 'program_title',
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Link Of Program', 'coaching' ),
                    'param_name'  => 'program_link',
                ),
                array(
                    'type'        => 'attach_image',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Image Of Program', 'coaching' ),
                    'param_name'  => 'program_image',
                    'description' => esc_html__( 'Select image from media library.', 'coaching' ),
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