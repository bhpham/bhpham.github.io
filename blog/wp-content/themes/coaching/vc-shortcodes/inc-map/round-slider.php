<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(

    'name'        => esc_html__( 'Thim: Round Slider', 'coaching' ),
    'base'        => 'thim-round-slider',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Add round slider box', 'coaching' ),
    'icon'        => 'thim-widget-icon thim-widget-icon-icon-box',
    'params'      => array(
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Title', 'coaching' ),
            'param_name'  => 'title',
            'description' => esc_html__( 'Provide the title for this Round Slider.', 'coaching' ),
        ),
        array(
            'type'        => 'param_group',
            'admin_label' => false,
            'heading'     => esc_html__( 'Items', 'coaching' ),
            'param_name'  => 'panel',
            'params'      => array(
                array(
                    'type'        => 'dropdown',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Type of Box', 'coaching' ),
                    'param_name'  => 'panel_type',
                    'value'       => array(
                        __( 'Image', 'coaching' )     => 'image',
                        __( 'Video', 'coaching' )   => 'video',
                    ),
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Title', 'coaching' ),
                    'param_name'  => 'panel_title',
                    'description' => esc_html__( 'Title of the panel', 'coaching' ),
                ),
                array(
                    'type'        => 'attach_image',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Image Thumbnail', 'coaching' ),
                    'param_name'  => 'panel_image',
                    'description' => esc_html__( 'Select image from media library.', 'coaching' ),
                ),
                array(
                    'type'        => 'attach_image',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Image Large', 'coaching' ),
                    'param_name'  => 'panel_image_large',
                    'description' => esc_html__( 'Select image from media library.', 'coaching' ),
                    'dependency'  => array(
                        'element' => 'panel_type',
                        'value'   => 'image',
                    ),
                ),
                array(
                    'type'        => 'textarea',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Video URL or Embeded Code', 'coaching' ),
                    'param_name'  => 'panel_video',
                    'std'         => esc_html__( 'Just display with type Video', 'coaching' ),
                    'dependency'  => array(
                        'element' => 'panel_type',
                        'value'   => 'video',
                    ),
                ),
            )
        ),
	    // Extra class
	    array(
		    'type'        => 'textfield',
		    'admin_label' => false,
		    'heading'     => esc_html__( 'Extra class', 'coaching' ),
		    'param_name'  => 'el_class',
		    'value'       => '',
		    'description' => esc_html__( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'coaching' ),
	    ),
    )
) );