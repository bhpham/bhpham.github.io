<?php

vc_map( array(

	'name'        => esc_html__( 'Thim: Gallery Posts', 'coaching' ),
	'base'        => 'thim-gallery-posts',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display Gallery Posts.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-gallery-posts',
	'params'      => array(

		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select Category', 'coaching' ),
			'param_name' => 'cat',
			'value'      => thim_get_cat_taxonomy( 'category', array( esc_html__( 'All', 'coaching' ) => 'all' ), true ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Columns', 'coaching' ),
			'param_name'  => 'columns',
			'value'       => array(
				esc_html__( 'Select', 'coaching' ) => '',
				esc_html__( '1', 'coaching' )      => '1',
				esc_html__( '2', 'coaching' )      => '2',
				esc_html__( '3', 'coaching' )      => '3',
				esc_html__( '4', 'coaching' )      => '4',
				esc_html__( '5', 'coaching' )      => '5',
				esc_html__( '6', 'coaching' )      => '6',
			),
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Show Filter', 'coaching' ),
			'param_name'  => 'filter',
			'std'         => true,
		),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Limit', 'coaching' ),
			'param_name'  => 'limit',
			'std'         => '8',
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