<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(
    'name'        => esc_html__( 'Thim: Image Box', 'coaching' ),
    'base'        => 'thim-image-box',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Add Image box', 'coaching' ),
    'icon'        => 'thim-widget-icon thim-widget-icon-icon-box',
    'params'      => array(

        array(
            'type'        => 'dropdown',
            'admin_label' => true,
            'heading'     => esc_html__( 'Layout', 'coaching' ),
            'param_name'  => 'layout',
            'value'       => array(
                esc_html__( 'Default', 'coaching' )        => 'default',
                esc_html__( 'Slider', 'coaching' )        => 'slider',
            ),
        ),

        array(
            'type'        => 'param_group',
            'admin_label' => false,
            'heading'     => esc_html__( 'Box', 'coaching' ),
            'param_name'  => 'box',
            'params'      => array(
                array(
                    'type'        => 'textfield',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Title', 'coaching' ),
                    'param_name'  => 'box_title',
                ),
                array(
                    'type'        => 'attach_image',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Image Of Box', 'coaching' ),
                    'description' => esc_html__( 'Select image from media library.', 'coaching' ),
                    'param_name'  => 'box_image',
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => false,
                    "label"       => esc_html__( "Add Link", 'coaching' ),
                    "description" => esc_html__( "Provide the link that will be applied to this icon box.", 'coaching' ),
                    'param_name'  => 'box_link',
                ),
            ),
            'dependency'  => array(
                'element' => 'layout',
                'value'   => array( 'slider' ),
            ),
        ),

        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Title', 'coaching' ),
            'param_name'  => 'title',
            'description' => esc_html__( 'Provide the title for this box.', 'coaching' ),
            'dependency'  => array(
                'element' => 'layout',
                'value'   => array( 'default' ),
            ),
        ),
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Sub Title', 'coaching' ),
            'param_name'  => 'subtitle',
            'description' => esc_html__( 'Provide the sub title for this box.', 'coaching' ),
            'dependency'  => array(
                'element' => 'layout',
                'value'   => array( 'default' ),
            ),
        ),
        array(
            'type'        => 'attach_image',
            'admin_label' => false,
            'heading'     => esc_html__( 'Image Of Box', 'coaching' ),
            'description' => esc_html__( 'Select image from media library.', 'coaching' ),
            'param_name'  => 'image',
            'dependency'  => array(
                'element' => 'layout',
                'value'   => array( 'default' ),
            ),
        ),
	    array(
		    'type'        => 'textfield',
		    'heading'     => esc_html__( 'Add Link', 'coaching' ),
		    'param_name'  => 'link',
		    'description' => esc_html__( 'Provide the link that will be applied to this icon box.', 'coaching' ),
            'dependency'  => array(
                'element' => 'layout',
                'value'   => array( 'default' ),
            ),
	    ),
        // Extra class
        array(
            'type'        => 'textfield',
            'admin_label' => false,
            'heading'     => esc_html__( 'Extra class', 'coaching' ),
            'param_name'  => 'el_class',
            'value'       => '',
            'description' => esc_html__( 'Add extra class name that will be applied to the box, and you can use this class for your customizations.', 'coaching' ),
        ),
        array(
            'type'        => 'dropdown',
            'admin_label' => true,
            'heading'     => esc_html__( 'Style', 'coaching' ),
            'param_name'  => 'style',
            'value'       => array(
                esc_html__( 'Default', 'coaching' )        => 'default',
                esc_html__( 'Style 1', 'coaching' )        => 'style-1',
            ),
            'dependency'  => array(
                'element' => 'layout',
                'value'   => array( 'default' ),
            ),

        ),
    )
) );