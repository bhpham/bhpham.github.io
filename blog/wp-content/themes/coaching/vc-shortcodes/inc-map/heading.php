<?php

vc_map( array(
	'name'        => esc_html__( 'Thim Heading', 'coaching' ),
	'base'        => 'thim-heading',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display heading.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-heading',
	'params'      => array(
		//Title
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Heading', 'coaching' ),
			'param_name'  => 'title',
			'value'       => '',
			'description' => esc_html__( 'Write the title for the heading.', 'coaching' )
		),
		//Title color
		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Heading color ', 'coaching' ),
			'param_name'  => 'textcolor',
			'value'       => '',
			'description' => esc_html__( 'Select the title color.', 'coaching' ),
			'group'       => esc_html__( 'Heading Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Heading tag', 'coaching' ),
			'param_name'  => 'size',
			'value'       => array(
				__( 'Select tag', 'coaching' ) => '',
				'h2'                           => 'h2',
				'h3'                           => 'h3',
				'h4'                           => 'h4',
				'h5'                           => 'h5',
				'h6'                           => 'h6',
			),
			'description' => esc_html__( 'Choose heading element.', 'coaching' ),
			'group'       => esc_html__( 'Heading Settings', 'coaching' ),
		),

		//Use custom or default title?
		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Use custom or default title?', 'coaching' ),
			'param_name'  => 'title_custom',
			'value'       => array(
				__( 'Default', 'coaching' ) => '',
				__( 'Custom', 'coaching' )  => 'custom',
			),
			'description' => esc_html__( 'If you select default you will use default title which customized in typography.', 'coaching' ),
			'group'       => esc_html__( 'Heading Settings', 'coaching' ),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Font size ', 'coaching' ),
			'param_name'  => 'font_size',
			'min'         => 0,
			'value'       => '',
			'suffix'      => 'px',
			'description' => esc_html__( 'Custom title font size.', 'coaching' ),
			'std'         => '14',
			'dependency'  => array(
				'element' => 'title_custom',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Heading Settings', 'coaching' ),
		),
		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Font Weight ', 'coaching' ),
			'param_name'  => 'font_weight',
			'value'       => array(
				__( 'Custom font weight', 'coaching' ) => '',
				__( 'Normal', 'coaching' )             => 'normal',
				__( 'Bold', 'coaching' )               => 'bold',
				__( '100', 'coaching' )                => '100',
				__( '200', 'coaching' )                => '200',
				__( '300', 'coaching' )                => '300',
				__( '400', 'coaching' )                => '400',
				__( '500', 'coaching' )                => '500',
				__( '600', 'coaching' )                => '600',
				__( '700', 'coaching' )                => '700',
				__( '800', 'coaching' )                => '800',
				__( '900', 'coaching' )                => '900',
			),
			'description' => esc_html__( 'Custom title font weight.', 'coaching' ),
			'dependency'  => array(
				'element' => 'title_custom',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Heading Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Font style ', 'coaching' ),
			'param_name'  => 'font_style',
			'value'       => array(
				__( 'Choose the title font style', 'coaching' ) => '',
				__( 'Italic', 'coaching' )                      => 'italic',
				__( 'Oblique', 'coaching' )                     => 'oblique',
				__( 'Initial', 'coaching' )                     => 'initial',
				__( 'Inherit', 'coaching' )                     => 'inherit',
				__( 'Normal', 'coaching' )                      => 'normal',
			),
			'description' => esc_html__( 'Custom title font style.', 'coaching' ),
			'dependency'  => array(
				'element' => 'title_custom',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Heading Settings', 'coaching' ),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Line Height ', 'coaching' ),
			'param_name'  => 'custom_line_height',
			'min'         => 0,
			'value'       => '',
			'suffix'      => 'px',
			'description' => esc_html__( 'Custom title line Height.', 'coaching' ),
			'dependency'  => array(
				'element' => 'title_custom',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Heading Settings', 'coaching' ),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Custom Style', 'coaching' ),
			'param_name'  => 'custom_style',
			'value'       => '',
			'dependency'  => array(
				'element' => 'title_custom',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Heading Settings', 'coaching' ),
		),

		// Description
		array(
			'type'        => 'textarea',
			'heading'     => esc_html__( 'Sub heading', 'coaching' ),
			'param_name'  => 'sub_heading',
			'value'       => '',
			'description' => esc_html__( 'Enter sub heading.', 'coaching' )
		),
		//Description color
		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Sub heading color ', 'coaching' ),
			'param_name'  => 'sub_heading_color',
			'value'       => '',
			'description' => esc_html__( 'Select the sub heading color.', 'coaching' ),
		),

		//Use custom or default sub title?
		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Use custom or default description?', 'coaching' ),
			'param_name'  => 'font_sub_heading',
			'value'       => array(
				__( 'Default', 'coaching' ) => '',
				__( 'Custom', 'coaching' )  => 'custom',
			),
			'description' => esc_html__( 'If you select default you will use default description which customized in typography.', 'coaching' ),
			'group'       => esc_html__( 'Description Settings', 'coaching' ),
		),
		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Font size ', 'coaching' ),
			'param_name'  => 'custom_sub_font_size',
			'min'         => 0,
			'value'       => '',
			'suffix'      => 'px',
			'description' => esc_html__( 'Custom sub heading font size.', 'coaching' ),
			'std'         => '14',
			'dependency'  => array(
				'element' => 'font_sub_heading',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Description Settings', 'coaching' ),
		),
		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Font Weight ', 'coaching' ),
			'param_name'  => 'custom_sub_font_weight',
			'value'       => array(
				__( 'Custom font weight', 'coaching' ) => '',
				__( 'Normal', 'coaching' )             => 'normal',
				__( 'Bold', 'coaching' )               => 'bold',
				__( '100', 'coaching' )                => '100',
				__( '200', 'coaching' )                => '200',
				__( '300', 'coaching' )                => '300',
				__( '400', 'coaching' )                => '400',
				__( '500', 'coaching' )                => '500',
				__( '600', 'coaching' )                => '600',
				__( '700', 'coaching' )                => '700',
				__( '800', 'coaching' )                => '800',
				__( '900', 'coaching' )                => '900',
			),
			'description' => esc_html__( 'Custom sub heading font weight.', 'coaching' ),
			'dependency'  => array(
				'element' => 'font_sub_heading',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Description Settings', 'coaching' ),
		),
		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Line Height ', 'coaching' ),
			'param_name'  => 'custom_sub_line_height',
			'min'         => 0,
			'value'       => '',
			'suffix'      => 'px',
			'description' => esc_html__( 'Custom sub heading line Height.', 'coaching' ),
			'dependency'  => array(
				'element' => 'font_sub_heading',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Description Settings', 'coaching' ),
		),
		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Font style ', 'coaching' ),
			'param_name'  => 'custom_sub_font_style',
			'value'       => array(
				__( 'Choose the title font style', 'coaching' ) => '',
				__( 'Italic', 'coaching' )                      => 'italic',
				__( 'Oblique', 'coaching' )                     => 'oblique',
				__( 'Initial', 'coaching' )                     => 'initial',
				__( 'Inherit', 'coaching' )                     => 'inherit',
				__( 'Normal', 'coaching' )                      => 'normal',
			),
			'description' => esc_html__( 'Custom sub heading font style.', 'coaching' ),
			'dependency'  => array(
				'element' => 'font_sub_heading',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Description Settings', 'coaching' ),
		),

		//Show separator?
		array(
			'type'        => 'checkbox',
			'admin_label' => false,
			'heading'     => esc_html__( 'Show Separator?', 'coaching' ),
			'param_name'  => 'line',
			//'value'       => array( esc_html__( '', 'coaching' ) => 'yes' ),
			'std'         => true,
			'description' => esc_html__( 'Tick it to show the separator between title and description.', 'coaching' ),
		),
		//Separator color
		array(
			'type'        => 'colorpicker',
			'heading'     => esc_html__( 'Separator color', 'coaching' ),
			'param_name'  => 'bg_line',
			'value'       => '',
			'description' => esc_html__( 'Choose the separator color.', 'coaching' ),
		),

		//Alignment
		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Text alignment', 'coaching' ),
			'param_name'  => 'text_align',
			'value'       => array(
				'Choose the text alignment'        => '',
				__( 'Text at left', 'coaching' )   => 'text-left',
				__( 'Text at center', 'coaching' ) => 'text-center',
				__( 'Text at right', 'coaching' )  => 'text-right',
			),
		),

		//Layout
		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Layout', 'coaching' ),
			'param_name'  => 'type',
			'value'       => array(
				__( 'Default', '' )           => '',
				__( 'Bussiness', 'coaching' ) => 'bussiness',
				__( 'Gym', 'coaching' )       => 'gym',
				__( 'Therapist', 'coaching' ) => 'therapist',
				__( 'Home 5', 'coaching' )    => 'home-5',
			),
		),

		// Content
		array(
			'type'        => 'textarea',
			'heading'     => esc_html__( 'Content', 'coaching' ),
			'param_name'  => 'description',
			'value'       => '',
			'description' => esc_html__( 'Enter Content.', 'coaching' ),
			'dependency'  => array(
				'element' => 'type',
				'value'   => array( 'bussiness', 'gym' ),
			),
		),

		//Animation
		array(
			'type'        => 'dropdown',
			'heading'     => esc_html__( 'Animation', 'coaching' ),
			'param_name'  => 'css_animation',
			'admin_label' => false,
			'value'       => array(
				__( 'No', 'coaching' )                 => '',
				__( 'Top to bottom', 'coaching' )      => 'top-to-bottom',
				__( 'Bottom to top', 'coaching' )      => 'bottom-to-top',
				__( 'Left to right', 'coaching' )      => 'left-to-right',
				__( 'Right to left', 'coaching' )      => 'right-to-left',
				__( 'Appear from center', 'coaching' ) => 'appear'
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