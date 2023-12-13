<?php

vc_map( array(
	'name'        => esc_html__( 'Thim: Counters Box', 'coaching' ),
	'base'        => 'thim-counters-box',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display Counters Box.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-counters-box',
	'params'      => array(

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Counters Label', 'coaching' ),
			'param_name'  => 'counters_label',
			'std'         => '',
		),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Counters Value', 'coaching' ),
			'param_name'  => 'counters_value',
			'std'         => '20',
		),

		array(
			'type'        => 'iconpicker',
			'admin_label' => true,
			'heading'     => esc_html__( 'Select Icon', 'coaching' ),
			'param_name'  => 'icon',
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),


		array(
			'type'        => 'colorpicker',
			'admin_label' => true,
			'heading'     => esc_html__( 'Border Color Icon', 'coaching' ),
			'param_name'  => 'border_color',
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => true,
			'heading'     => esc_html__( 'Counters Icon Color', 'coaching' ),
			'param_name'  => 'counter_color',
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Style', 'coaching' ),
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( 'Home Page', 'coaching' )      => 'home-page',
				esc_html__( 'Page About Us', 'coaching' )  => 'about-us',
				esc_html__( 'Home Effective', 'coaching' ) => 'home-effective',
				esc_html__( 'Home 5 Style', 'coaching' )   => 'home-5',
			),
		),

		//Animation
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