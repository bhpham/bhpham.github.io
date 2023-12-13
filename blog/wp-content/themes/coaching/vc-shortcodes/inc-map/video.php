<?php

vc_map( array(
	'name'        => esc_html__( 'Thim: Video', 'coaching' ),
	'base'        => 'thim-video',
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
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Width video', 'coaching' ),
			'param_name'  => 'video_width',
			'value'       => '',
			'description' => esc_html__( 'Enter width of video. Example 100% or 600. ', 'coaching' )
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Height video', 'coaching' ),
			'param_name'  => 'video_height',
			'value'       => '',
			'description' => esc_html__( 'Enter height of video. Example 100% or 600.', 'coaching' )
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Vimeo Video ID', 'coaching' ),
			'param_name'  => 'external_video',
			'description' => esc_html__( 'Enter vimeo video ID . Example if link video https://player.vimeo.com/video/61389324 then video ID is 61389324 ', 'coaching' ),
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