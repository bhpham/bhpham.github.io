<?php

vc_map( array(

	'name'        => esc_html__( 'Thim: Google Map', 'coaching' ),
	'base'        => 'thim-google-map',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display Google Map.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-google-map',
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
            'heading'     => esc_html__( 'Type Maps', 'coaching' ),
            'param_name'  => 'type_map',
            'value'       => array(
                esc_html__( 'Default', 'coaching' ) => '',
                esc_html__( 'Multi Address', 'coaching' ) => 'multi_address',
                esc_html__( 'Layout 1', 'coaching' ) => 'layout-1',
            ),
        ),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Get Map By', 'coaching' ),
			'param_name'  => 'display_by',
			'value'       => array(
				esc_html__( 'Select', 'coaching' )      => '',
				esc_html__( 'Address', 'coaching' )     => 'address',
				esc_html__( 'Coordinates', 'coaching' ) => 'location',
			),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Lat', 'coaching' ),
			'param_name'  => 'location_lat',
			'std'         => '41.868626',
			'dependency'  => array(
				'element' => 'display_by',
				'value'   => 'location',
			),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Lng', 'coaching' ),
			'param_name'  => 'location_lng',
			'std'         => '-74.104301',
			'dependency'  => array(
				'element' => 'display_by',
				'value'   => 'location',
			),
		),

		array(
			'type'        => 'textarea',
			'admin_label' => true,
			'heading'     => esc_attr__( 'Map center', 'coaching' ),
			'description' => esc_attr__( 'The name of a place, town, city, or even a country. Can be an exact address too.', 'coaching' ),
			'param_name'  => 'map_center',
			'dependency'  => array(
				'element' => 'display_by',
				'value'   => 'address',
			),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Google Map API Key', 'coaching' ),
			'param_name'  => 'api_key',
			'description' => esc_html__( 'Enter your Google Map API Key. Refer on https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key', 'coaching' )
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Height', 'coaching' ),
			'param_name'  => 'settings_height',
			'std'         => '480',
		),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Zoom', 'coaching' ),
			'param_name'  => 'settings_zoom',
			'std'         => '12',
			'min'         => '0',
			'max'         => '21'
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Scroll to zoom', 'coaching' ),
			'description' => esc_html__( 'Allow scrolling over the map to zoom in or out.', 'coaching' ),
			'param_name'  => 'settings_scroll_zoom',
			'std'         => true,
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Draggable', 'coaching' ),
			'description' => esc_html__( 'Allow dragging the map to move it around.', 'coaching' ),
			'param_name'  => 'settings_draggable',
			'std'         => true,
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Show marker at map center', 'coaching' ),
			'param_name'  => 'marker_at_center',
			'std'         => true,
		),

		array(
			'type'        => 'attach_image',
			'admin_label' => true,
			'heading'     => esc_html__( 'Marker Icon', 'coaching' ),
			'param_name'  => 'marker_icon',
		),

        array(
            'type'        => 'param_group',
            'admin_label' => false,
            'heading'     => esc_html__( 'Marker positions', 'coaching' ),
            'param_name'  => 'marker_positions',
            'params'      => array(
                array(
                    'type'        => 'textarea',
                    'admin_label' => false,
                    'heading'     => esc_attr__( 'Place', 'coaching' ),
                    'param_name'  => 'map_center',
                ),
                array(
                    'type'        => 'textfield',
                    'admin_label' => true,
                    'heading'     => esc_html__( 'Title Place', 'coaching' ),
                    'param_name'  => 'title_place',
                ),
                array(
                    'type'        => 'textarea',
                    'admin_label' => false,
                    'heading'     => esc_attr__( 'Content Place', 'coaching' ),
                    'param_name'  => 'content_place',
                ),
            ),
            'dependency'  => array(
                'element' => 'type_map',
                'value'   => array('multi_address', 'layout-1'),
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