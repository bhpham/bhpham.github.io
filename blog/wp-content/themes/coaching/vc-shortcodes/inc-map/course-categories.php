<?php

vc_map( array(
	'name'        => esc_html__( 'Thim: Course Categories', 'coaching' ),
	'base'        => 'thim-course-categories',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display course categories.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-course-categories',
	'params'      => array(

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Title', 'coaching' ),
			'param_name'  => 'title',
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Layout', 'coaching' ),
			'param_name'  => 'layout',
			'value'       => array(
				esc_html__( 'List Categories', 'coaching' ) => 'list',
				esc_html__( 'Slider', 'coaching' )          => 'slider'
			),
		),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Limit categories', 'coaching' ),
			'param_name'  => 'slider_limit',
			'std'         => '15',
			'group'       => esc_html__( 'Slider Settings', 'coaching' ),
            'dependency'  => array(
                'element' => 'layout',
                'value'   => 'slider',
            ),
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Show Pagination', 'coaching' ),
			'param_name'  => 'slider_show_pagination',
			'std'         => false,
            'dependency'  => array(
                'element' => 'layout',
                'value'   => 'slider',
            ),
			'group'       => esc_html__( 'Slider Settings', 'coaching' ),
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Show Navigation', 'coaching' ),
			'param_name'  => 'slider_show_navigation',
			//'value'       => array( esc_html__( '', 'coaching' ) => 'yes' ),
			'std'         => true,
            'dependency'  => array(
                'element' => 'layout',
                'value'   => 'slider',
            ),
			'group'       => esc_html__( 'Slider Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Items visible', 'coaching' ),
			'param_name'  => 'slider_item_visible',
			'value'       => array(
				esc_html__( 'Select', 'coaching' ) => '',
				esc_html__( '1', 'coaching' )      => '1',
				esc_html__( '2', 'coaching' )      => '2',
				esc_html__( '3', 'coaching' )      => '3',
				esc_html__( '4', 'coaching' )      => '4',
				esc_html__( '5', 'coaching' )      => '5',
				esc_html__( '6', 'coaching' )      => '6',
				esc_html__( '7', 'coaching' )      => '7',
				esc_html__( '8', 'coaching' )      => '8',
			),
            'dependency'  => array(
                'element' => 'layout',
                'value'   => 'slider',
            ),
			'group'       => esc_html__( 'Slider Settings', 'coaching' ),
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Show course count', 'coaching' ),
			'param_name'  => 'list_show_counts',
			//'value'       => array( esc_html__( '', 'coaching' ) => 'yes' ),
			'std'         => false,
			'dependency'  => array(
				'element' => 'layout',
				'value'   => 'list',
			),
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Show hierarchy', 'coaching' ),
			'param_name'  => 'list_hierarchical',
			//'value'       => array( esc_html__( '', 'coaching' ) => 'yes' ),
			'std'         => false,
			'dependency'  => array(
				'element' => 'layout',
				'value'   => 'list',
			),
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
