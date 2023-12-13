<?php

vc_map( array(

	'name'        => esc_html__( 'Thim: Twitter', 'coaching' ),
	'base'        => 'thim-twitter',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display twitter icon.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-social',
	'params'      => array(
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Title', 'coaching' ),
			'param_name'  => 'title',
		),

        array(
            'type'        => 'textfield',
            'admin_label' => false,
            'heading'     => esc_html__( 'Username', 'coaching' ),
            'param_name'  => 'username',
        ),

        array(
            'type'        => 'textfield',
            'admin_label' => false,
            'heading'     => esc_html__( 'Tweets Display', 'coaching' ),
            'param_name'  => 'display',
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