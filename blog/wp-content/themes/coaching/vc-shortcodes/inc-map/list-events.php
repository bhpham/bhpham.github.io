<?php

vc_map( array(

	'name'        => esc_html__( 'Thim: List Events', 'coaching' ),
	'base'        => 'thim-list-events',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display List Events.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-list-event',
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
			'heading'     => esc_html__( 'Layout', 'coaching' ),
			'param_name'  => 'layout',
			'value'       => array(
				esc_html__( 'Default', 'coaching' )  => 'base',
				esc_html__( 'Layout Business', 'coaching' )   => 'layout-business',
				esc_html__( 'Layout 2', 'coaching' ) => 'layout-2',
                esc_html__( 'Layout Effective', 'coaching' ) => 'layout-effective',
			),
		),

        array(
            'type'       => 'dropdown_multiple',
            'heading'    => esc_html__( 'Select Category', 'coaching' ),
            'param_name' => 'cat_id',
            'value'      => thim_get_cat_taxonomy( 'tp_event_category', array( esc_html__( 'All', 'coaching' ) => 'all' ), true ),
        ),

        array(
            'type'       => 'dropdown_multiple',
            'heading'     => esc_html__( 'Select Status', 'coaching' ),
            'param_name'  => 'status',
            'std'        => '',
            'value'       => array(
                esc_html__( 'Upcoming', 'coaching' )  => 'upcoming',
                esc_html__( 'Happening', 'coaching' )   => 'happening',
                esc_html__( 'Expired', 'coaching' ) => 'expired',
            ),
        ),

        array(
            'type'        => 'number',
            'admin_label' => true,
            'heading'     => esc_html__( 'Number events display', 'coaching' ),
            'param_name'  => 'number_posts',
            'std'         => '2',
        ),

        array(
            'type'        => 'number',
            'admin_label' => true,
            'heading'     => esc_html__( 'Feature Items', 'coaching' ),
            'param_name'  => 'feature_items',
            'std'         => '2',
        ),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Text View All', 'coaching' ),
			'param_name'  => 'text_link',
			'std'         => esc_html__( 'View All', 'coaching' ),
		),

        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Url Link All', 'coaching' ),
            'param_name'  => 'url_link',
            'std'         => '#',
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