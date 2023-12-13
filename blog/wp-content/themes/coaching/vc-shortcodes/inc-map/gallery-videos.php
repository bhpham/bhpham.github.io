<?php

vc_map( array(

	'name'        => esc_html__( 'Thim: Gallery Videos', 'coaching' ),
	'base'        => 'thim-gallery-videos',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display Gallery Videos.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-gallery-posts',
	'params'      => array(
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Title', 'coaching' ),
			'param_name'  => 'title',
			'value'       => '',
		),

		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select Category', 'coaching' ),
			'param_name' => 'cad_id',
			'value'      => thim_get_cat_taxonomy( 'category', array( 'all' => esc_html__( 'All', 'coaching' ) ), true ),
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
			'heading'     => esc_html__( 'Style', 'coaching' ),
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( 'Normal', 'coaching' ) => '',
				esc_html__( 'Slider', 'coaching' ) => 'slider',
			),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => false,
			'heading'     => esc_html__( 'Link All Posts', 'coaching' ),
			'param_name'  => 'link',
			'value'       => '#',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => false,
			'heading'     => esc_html__( 'Text All Posts', 'coaching' ),
			'param_name'  => 'text_link',
			'value'       => 'View All',
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Number Posts', 'coaching' ),
			'param_name'  => 'number_posts',
			'std'         => '8',
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