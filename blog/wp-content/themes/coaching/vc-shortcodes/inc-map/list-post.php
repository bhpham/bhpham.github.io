<?php

vc_map( array(

	'name'        => esc_html__( 'Thim: List Posts', 'coaching' ),
	'base'        => 'thim-list-post',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display list posts.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-list-post',
	'params'      => array(
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Title', 'coaching' ),
			'param_name'  => 'title',
			'value'       => '',
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Style', 'coaching' ),
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( 'No Style', 'coaching' )            => 'no_style',
				esc_html__( 'Life Normal Style', 'coaching' )   => 'life_homepage',
				esc_html__( 'Health Normal Style', 'coaching' ) => 'health_homepage',
				esc_html__( 'Health Slider Style', 'coaching' ) => 'health_slider',
				esc_html__( 'Health 2 Style', 'coaching' )      => 'health_2',
				esc_html__( 'Health Sticky Style', 'coaching' ) => 'health_sticky',
				esc_html__( 'Sidebar', 'coaching' )             => 'sidebar',
				esc_html__( 'Effective Style', 'coaching' )     => 'effective',
				esc_html__( 'Gym style', 'coaching' )           => 'gym',
				esc_html__( 'Therapist style', 'coaching' )     => 'therapist',
				esc_html__( 'Home 5 style', 'coaching' )        => 'home5',
			),
		),

		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select Category', 'coaching' ),
			'param_name' => 'cat_id',
			'value'      => thim_get_cat_taxonomy( 'category', array( 'all' => esc_html__( 'All', 'coaching' ) ) ,true ),
		),

		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select Image Size', 'coaching' ),
			'param_name' => 'image_size',
			'value'      => thim_sc_get_list_image_size(),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Image Width', 'coaching' ),
			'param_name'  => 'size_w',
			'std'         => '400',
			'dependency'  => array(
				'element' => 'image_size',
				'value'   => 'custom_size',
			),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Image Height', 'coaching' ),
			'param_name'  => 'size_h',
			'std'         => '400',
			'dependency'  => array(
				'element' => 'image_size',
				'value'   => 'custom_size',
			),
		),

		array(
			'type'       => 'checkbox',
			'heading'    => esc_html__( 'Show Description', 'coaching' ),
			'param_name' => 'show_description',
			'value'      => array(
				esc_html__( 'Yes', 'coaching' ) => true,
			),
			'std'        => true,
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Number posts', 'coaching' ),
			'param_name'  => 'number_posts',
			'std'         => '4',
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Order by', 'coaching' ),
			'param_name'  => 'orderby',
			'value'       => array(
				esc_html__( 'Popular', 'coaching' ) => 'popular',
				esc_html__( 'Recent', 'coaching' )  => 'recent',
				esc_html__( 'Title', 'coaching' )   => 'title',
				esc_html__( 'Random', 'coaching' )  => 'random',
			),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Order', 'coaching' ),
			'param_name'  => 'order',
			'value'       => array(
				esc_html__( 'Select', 'coaching' ) => '',
				esc_html__( 'ASC', 'coaching' )    => 'asc',
				esc_html__( 'DESC', 'coaching' )   => 'desc',
			),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => false,
			'heading'     => esc_html__( 'Feature Text', 'coaching' ),
			'param_name'  => 'feature_text',
			'value'       => 'Sticky Post',
			'dependency'  => array(
				'element' => 'style',
				'value'   => 'health_sticky',
			),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => false,
			'heading'     => esc_html__( 'Link All Posts', 'coaching' ),
			'param_name'  => 'link',
			'value'       => '#',
			'dependency'  => array(
				'element' => 'style',
				'value'   => 'life_homepage',
			),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => false,
			'heading'     => esc_html__( 'Text All Posts', 'coaching' ),
			'param_name'  => 'text_link',
			'dependency'  => array(
				'element' => 'style',
				'value'   => 'life_homepage',
			),
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => false,
			'heading'     => esc_html__( 'Autoplay', 'coaching' ),
			'param_name'  => 'autoplay',
			'std'         => false,
			'dependency'  => array(
				'element' => 'style',
				'value'   => array( 'health_slider', 'home5' ),
			),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Autoplay Timeout', 'coaching' ),
			'param_name'  => 'autoplayTimeout',
			'std'         => 6000,
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