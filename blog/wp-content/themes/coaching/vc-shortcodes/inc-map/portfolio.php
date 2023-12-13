<?php

vc_map( array(
	'name'        => esc_html__( 'Thim: Portfolio', 'coaching' ),
	'base'        => 'thim-portfolio',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Thim Widget Portfolio By thimpress.com', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-portfolio',
	'params'      => array(
		array(
			'type'       => 'dropdown',
			'heading'    => esc_html__( 'Select Category', 'coaching' ),
			'param_name' => 'portfolio_category',
			'value'      => thim_get_cat_taxonomy( 'portfolio_category', array( 'all' => esc_html__( 'All', 'coaching' ) ) ,true ),
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Hide Filters?', 'coaching' ),
			'param_name'  => 'filter_hiden',
			//'value'       => array( esc_html__( '', 'coaching' ) => 'yes' ),
			'std'         => false,
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Select a filter position', 'coaching' ),
			'param_name'  => 'filter_position',
			'value'       => array(
				esc_html__( 'Left', 'coaching' )   => 'left',
				esc_html__( 'Center', 'coaching' ) => 'center',
				esc_html__( 'Right', 'coaching' )  => 'right',
			),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Select a column', 'coaching' ),
			'param_name'  => 'column',
			'value'       => array(
				esc_html__( 'Select', 'coaching' ) => '',
				esc_html__( 'One', 'coaching' )    => 'one',
				esc_html__( 'Two', 'coaching' )    => 'two',
				esc_html__( 'Three', 'coaching' )  => 'three',
				esc_html__( 'Four', 'coaching' )   => 'four',
				esc_html__( 'Five', 'coaching' )   => 'five',
			),
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Gutter', 'coaching' ),
			'param_name'  => 'gutter',
			//'value'       => array( esc_html__( '', 'coaching' ) => 'yes' ),
			'std'         => false,
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Select a item size', 'coaching' ),
			'param_name'  => 'item_size',
			'value'       => array(
				esc_html__( 'Select', 'coaching' )    => '',
				esc_html__( 'Multigrid', 'coaching' ) => 'multigrid',
				esc_html__( 'Masonry', 'coaching' )   => 'masonry',
				esc_html__( 'Same size', 'coaching' ) => 'same',
			),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Select a paging', 'coaching' ),
			'param_name'  => 'paging',
			'value'       => array(
				esc_html__( 'Select', 'coaching' )          => '',
				esc_html__( 'Show All', 'coaching' )        => 'all',
				esc_html__( 'Limit Items', 'coaching' )     => 'limit',
				esc_html__( 'Paging', 'coaching' )          => 'paging',
				esc_html__( 'Infinite Scroll', 'coaching' ) => 'infinite_scroll',
			),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Select style items', 'coaching' ),
			'param_name'  => 'style-item',
			'value'       => array(
				esc_html__( 'Select', 'coaching' )                   => '',
				esc_html__( 'Caption Hover Effects 01', 'coaching' ) => 'style01',
				esc_html__( 'Caption Hover Effects 02', 'coaching' ) => 'style02',
				esc_html__( 'Caption Hover Effects 03', 'coaching' ) => 'style03',
				esc_html__( 'Caption Hover Effects 04', 'coaching' ) => 'style04',
				esc_html__( 'Caption Hover Effects 05', 'coaching' ) => 'style05',
				esc_html__( 'Caption Hover Effects 06', 'coaching' ) => 'style06',
				esc_html__( 'Caption Hover Effects 07', 'coaching' ) => 'style07',
				esc_html__( 'Caption Hover Effects 08', 'coaching' ) => 'style08',
			),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Enter a number view', 'coaching' ),
			'param_name'  => 'num_per_view',
			'value'       => '',
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Show Read More?', 'coaching' ),
			'param_name'  => 'show_readmore',
			//'value'       => array( esc_html__( '', 'coaching' ) => 'yes' ),
			'std'         => false,
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