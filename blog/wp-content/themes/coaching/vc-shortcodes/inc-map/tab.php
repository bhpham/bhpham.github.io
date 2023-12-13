<?php

vc_map( array(
	'name'        => esc_html__( 'Thim: Tab', 'coaching' ),
	'base'        => 'thim-tab',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display Tab.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-timetable',
	'params'      => array(
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Title', 'coaching' ),
			'param_name'  => 'title',
			'value'       => '',
		),

		array(
			'type'        => 'param_group',
			'admin_label' => false,
			'heading'     => esc_html__( 'Tab Items', 'coaching' ),
			'param_name'  => 'tab',
			'params'      => array(
				array(
					'type'       => 'textfield',
                    'admin_label' => false,
					'heading'    => esc_html__( 'Title', 'coaching' ),
					'std'        => esc_html__( 'Title', 'coaching' ),
					'param_name' => 'title',
				),
                array(
                    'type'        => 'textarea',
                    'admin_label' => false,
                    'heading'     => esc_html__( 'Content', 'coaching' ),
                    'param_name'  => 'content',
                    'std'         => esc_html__( 'Write a short description, that will describe the title or something informational and useful.', 'coaching' ),
                ),

			)
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