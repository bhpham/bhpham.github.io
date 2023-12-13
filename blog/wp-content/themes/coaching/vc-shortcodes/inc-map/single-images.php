<?php

vc_map( array(

	'name'        => esc_html__( 'Thim: Single Image', 'coaching' ),
	'base'        => 'thim-single-images',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display single images.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-single-images',
	'params'      => array(
		array(
			'type'        => 'attach_image',
			'admin_label' => true,
			'heading'     => esc_html__( 'Image', 'coaching' ),
			'param_name'  => 'image',
			'description' => esc_html__( 'Select image from media library.', 'coaching' )
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Image size', 'coaching' ),
			'param_name'  => 'image_size',
			'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'coaching' ),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Image Link', 'coaching' ),
			'param_name'  => 'image_link',
			'description' => esc_html__( 'Enter URL if you want this image to have a link.', 'coaching' ),
		),

		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Link Target', 'coaching' ),
			'param_name' => 'link_target',
			'value'      => array(
				esc_html__( 'Same window', 'coaching' ) => '_self',
				esc_html__( 'New window', 'coaching' )  => '_blank',
			)
		),

		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Image alignment', 'coaching' ),
			'param_name'  => 'image_alignment',
			'description' => esc_html__( 'Select image alignment.', 'coaching' ),
			'value'       => array(
				esc_html__( 'Align Left', 'coaching' )   => 'left',
				esc_html__( 'Align Center', 'coaching' ) => 'center',
				esc_html__( 'Align Right', 'coaching' )  => 'right',
			)
		),

		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Animation', 'coaching' ),
			'param_name'  => 'css_animation',
			'admin_label' => true,
			'value'       => array(
				esc_html__( 'No', 'coaching' )                 => '',
				esc_html__( 'Top to bottom', 'coaching' )      => 'top-to-bottom',
				esc_html__( 'Bottom to top', 'coaching' )      => 'bottom-to-top',
				esc_html__( 'Left to right', 'coaching' )      => 'left-to-right',
				esc_html__( 'Right to left', 'coaching' )      => 'right-to-left',
				esc_html__( 'Appear from center', 'coaching' ) => 'appear'
			),
			'description' => esc_html__( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', 'coaching' )
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