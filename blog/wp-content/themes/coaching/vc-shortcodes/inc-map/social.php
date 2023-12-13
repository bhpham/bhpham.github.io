<?php

vc_map( array(

	'name'        => esc_html__( 'Thim: Social', 'coaching' ),
	'base'        => 'thim-social',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display social icon.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-social',
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
			'heading'     => esc_html__( 'Style', 'coaching' ),
			'param_name'  => 'style',
			'value'       => array(
				esc_html__( 'Default', 'coaching' ) => '',
				esc_html__( 'No Border', 'coaching' ) => 'no-border',
			),
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Show text social', 'coaching' ),
			'param_name'  => 'show_text',
			'std'         => false,
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Facebook Url', 'coaching' ),
			'param_name'  => 'link_face',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Twitter Url', 'coaching' ),
			'param_name'  => 'link_twitter',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Google Url', 'coaching' ),
			'param_name'  => 'link_google',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Dribble Url', 'coaching' ),
			'param_name'  => 'link_dribble',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Linkedin Url', 'coaching' ),
			'param_name'  => 'link_linkedin',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Pinterest Url', 'coaching' ),
			'param_name'  => 'link_pinterest',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Instagram Url', 'coaching' ),
			'param_name'  => 'link_instagram',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Youtube Url', 'coaching' ),
			'param_name'  => 'link_youtube',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Snapchat Url', 'coaching' ),
			'param_name'  => 'link_snapchat',
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Link Target', 'coaching' ),
			'param_name'  => 'link_target',
			'value'       => array(
				esc_html__( 'Select', 'coaching' )      => '',
				esc_html__( 'Same window', 'coaching' ) => '_self',
				esc_html__( 'New window', 'coaching' )  => '_blank',
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