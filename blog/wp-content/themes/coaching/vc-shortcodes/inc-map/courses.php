<?php

vc_map( array(

	'name'        => esc_html__( 'Thim: Courses', 'coaching' ),
	'base'        => 'thim-courses',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display courses.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-courses',
	'params'      => array(
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Title', 'coaching' ),
			'param_name'  => 'title',
			'value'       => '',
		),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Limit', 'coaching' ),
			'param_name'  => 'limit',
			'min'         => 1,
			'max'         => 20,
			'std'         => '8',
			'description' => esc_html__( 'Limit number courses.', 'coaching' )
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Order By', 'coaching' ),
			'param_name'  => 'order',
			'value'       => array(
				esc_html__( 'Select', 'coaching' )   => '',
				esc_html__( 'Popular', 'coaching' )  => 'popular',
				esc_html__( 'Latest', 'coaching' )   => 'latest',
				esc_html__( 'Category', 'coaching' ) => 'category',
			),
			'description' => esc_html__( 'Select order by.', 'coaching' ),
		),

		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select Category', 'coaching' ),
			'param_name' => 'cat_id',
			'value'      => thim_get_cat_taxonomy( 'course_category', array( esc_html__( 'All', 'coaching' ) => 'all' ), true ),
			'dependency' => array(
				'element' => 'order',
				'value'   => 'category',
			),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Layout', 'coaching' ),
			'param_name'  => 'layout',
			'value'       => array(
				esc_html__( 'Slider', 'coaching' )         => 'slider',
				esc_html__( 'Grid', 'coaching' )           => 'grid',
				esc_html__( 'Mega Menu', 'coaching' )      => 'megamenu',
				esc_html__( 'List Sidebar', 'coaching' )   => 'list-sidebar',
				esc_html__( 'Grid Bussiness', 'coaching' ) => 'grid-bussiness',
				esc_html__( 'Grid Effective', 'coaching' ) => 'grid-effective',
				esc_html__( 'Grid Gym', 'coaching' )       => 'grid-gym',
				esc_html__( 'Grid Therapist', 'coaching' ) => 'grid-therapist',
				esc_html__( 'Grid Home 5', 'coaching' )    => 'grid-home5',
			),
		),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Thumbnail Width', 'coaching' ),
			'param_name'  => 'thumbnail_width',
			'min'         => 100,
			'max'         => 800,
			'std'         => 400,
			'description' => esc_html__( 'Set width for thumbnail course.', 'coaching' ),
			'dependency'  => array(
				'element' => 'layout',
				'value'   => array( 'slider', 'grid', 'grid-bussiness', 'grid-effective', 'grid-gym', 'grid-therapist', 'grid-home5' ),
			),
		),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Thumbnail Height', 'coaching' ),
			'param_name'  => 'thumbnail_height',
			'min'         => 100,
			'max'         => 800,
			'std'         => 300,
			'description' => esc_html__( 'Set height for thumbnail course.', 'coaching' ),
			'dependency'  => array(
				'element' => 'layout',
				'value'   => array( 'slider', 'grid', 'grid-bussiness', 'grid-effective', 'grid-gym', 'grid-therapist', 'grid-home5' ),
			),
		),

		//Slider Options
		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Items Visible', 'coaching' ),
			'param_name'  => 'slider_item_visible',
			'min'         => 1,
			'max'         => 20,
			'std'         => '4',
			'dependency'  => array(
				'element' => 'layout',
				'value'   => 'slider',
			),
			'group'       => esc_html__( 'Slider Settings', 'coaching' ),
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Show Pagination', 'coaching' ),
			'param_name'  => 'slider_pagination',
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
			'param_name'  => 'slider_navigation',
			'std'         => true,
			'dependency'  => array(
				'element' => 'layout',
				'value'   => 'slider',
			),
			'group'       => esc_html__( 'Slider Settings', 'coaching' ),
		),

		//Grid options
		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Grid Columns', 'coaching' ),
			'param_name'  => 'grid_columns',
			'min'         => 1,
			'max'         => 20,
			'std'         => '4',
			'dependency'  => array(
				'element' => 'layout',
				'value'   => array( 'grid', 'grid-bussiness', 'grid-effective', 'grid-gym', 'grid-therapist', 'grid-home5' ),
			),
			'group'       => esc_html__( 'Grid Settings', 'coaching' ),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Text View All Courses', 'coaching' ),
			'param_name'  => 'view_all_courses',
			'dependency'  => array(
				'element' => 'layout',
				'value'   => array( 'grid', 'grid-bussiness', 'slider', 'grid-effective', 'grid-gym', 'grid-therapist', 'grid-home5' ),
			),
			'group'       => esc_html__( 'Grid Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'View All Position', 'coaching' ),
			'param_name'  => 'view_all_position',
			'value'       => array(
				esc_html__( 'Select', 'coaching' ) => '',
				esc_html__( 'Top', 'coaching' )    => 'top',
				esc_html__( 'Bottom', 'coaching' ) => 'bottom',
			),
			'dependency'  => array(
				'element' => 'layout',
				'value'   => array( 'grid', 'grid-bussiness', 'slider', 'grid-effective', 'grid-home5' ),
			),
			'group'       => esc_html__( 'Grid Settings', 'coaching' ),
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