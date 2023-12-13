<?php

vc_map( array(

	'name'        => esc_html__( 'Thim: Gallery Images', 'coaching' ),
	'base'        => 'thim-gallery-images',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display Gallery Images.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-gallery-images',
	'params'      => array(
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Heading', 'coaching' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Write the heading.', 'coaching' )
		),

		array(
			'type'        => 'attach_images',
			'admin_label' => true,
			'heading'     => esc_html__( 'Image', 'coaching' ),
			'description' => esc_html__( 'Select image from media library.', 'coaching' ),
			'param_name'  => 'image',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Image size', 'coaching' ),
			'param_name'  => 'image_size',
			'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full"', 'coaching' )
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Image Link', 'coaching' ),
			'param_name'  => 'image_link',
			'description' => esc_html__( 'Enter URL if you want this image to have a link. These links are separated by comma (Ex: #,#,#,#)', 'coaching' )
		),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Visible Items', 'coaching' ),
			'param_name'  => 'number',
			'std'         => '4',
			'group'       => esc_html__( 'Slider Settings', 'coaching' ),
		),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Tablet Items', 'coaching' ),
			'param_name'  => 'item_tablet',
			'std'         => '2',
			'group'       => esc_html__( 'Slider Settings', 'coaching' ),
		),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Mobile Items', 'coaching' ),
			'param_name'  => 'item_mobile',
			'std'         => '1',
			'group'       => esc_html__( 'Slider Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Show Pagination', 'coaching' ),
			'param_name'  => 'show_pagination',
			'value'       => array(
				esc_html__( 'Select', 'coaching' ) => '',
				esc_html__( 'Yes', 'coaching' )    => 'yes',
				esc_html__( 'No', 'coaching' )     => 'no',
			),
			'group'       => esc_html__( 'Slider Settings', 'coaching' ),
		),
		array(
            'type'        => 'checkbox',
            'admin_label' => true,
            'heading'     => esc_html__( 'Loop', 'coaching' ),
            'param_name'  => 'loop',
            'std'         => false,
            'group'       => esc_html__( 'Slider Settings', 'coaching' ),
        ),
        array(
            'type'        => 'checkbox',
            'admin_label' => true,
            'heading'     => esc_html__( 'Auto play', 'coaching' ),
            'param_name'  => 'autoplay',
            'std'         => false,
            'group'       => esc_html__( 'Slider Settings', 'coaching' ),
        ),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Auto Play Speed (in ms)', 'coaching' ),
			'param_name'  => 'timeout',
			'std'         => '1000',
			'group'       => esc_html__( 'Slider Settings', 'coaching' ),
			'description' => esc_html__( 'Set 0 to disable auto play.', 'coaching' )
		),
		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Link Target', 'coaching' ),
			'param_name'  => 'link_target',
			'value'       => array(
				esc_html__( 'Select', 'coaching' )      => '',
				esc_html__( 'Same window', 'coaching' ) => '_self',
				esc_html__( 'New window', 'coaching' )  => '_blank',
			),
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