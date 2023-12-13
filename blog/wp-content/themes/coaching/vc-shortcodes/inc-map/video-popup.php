<?php

vc_map( array(
	'name'        => esc_html__( 'Thim: Video popup', 'coaching' ),
	'base'        => 'thim-video-popup',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display video youtube or vimeo.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-video',
	'params'      => array(
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Title', 'coaching' ),
            'param_name'  => 'title',
            'value'       => '',
        ),

        array(
            'type'        => 'textarea',
            'admin_label' => false,
            'heading'     => esc_html__( 'Description', 'coaching' ),
            'param_name'  => 'description',
            'std'         => esc_html__( 'Write a short description, that will describe the title or something informational and useful.', 'coaching' ),
        ),
        array(
            'type'        => 'attach_image',
            'admin_label' => false,
            'heading'     => esc_html__( 'Image', 'coaching' ),
            'param_name'  => 'panel_image',
            'description' => esc_html__( 'Poster background display on popup video.', 'coaching' ),
        ),
        array(
            'type'        => 'textfield',
            'admin_label' => false,
            'heading'     => esc_html__( 'URL Video', 'coaching' ),
            'param_name'  => 'url_video',
            'value'       => '',
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