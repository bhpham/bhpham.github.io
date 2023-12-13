<?php

vc_map( array(
	'name'        => esc_html__( 'Thim: About Me', 'coaching' ),
	'base'        => 'thim-about-me',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display About Me.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-counters-box',
	'params'      => array(

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Title', 'coaching' ),
			'param_name'  => 'title',
			'std'         => '',
		),

		array(
			'type'        => 'textarea',
			'admin_label' => true,
			'heading'     => esc_html__( 'Biographical Info', 'coaching' ),
			'param_name'  => 'info_me',
			'std'         => '',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Phone Number', 'coaching' ),
			'param_name'  => 'phone',
			'std'         => '',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Email', 'coaching' ),
			'param_name'  => 'email',
			'std'         => '',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Address', 'coaching' ),
			'param_name'  => 'address',
			'std'         => '',
		),

		array(
			'type'        => 'attach_image',
			'admin_label' => false,
			'heading'     => esc_html__( 'Upload Avatar Image', 'coaching' ),
			'param_name'  => 'avt_img',
			'description' => esc_html__( 'Select Upload Avatar Image.', 'coaching' ),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Link', 'coaching' ),
			'param_name'  => 'link',
			'std'         => '',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Text Link', 'coaching' ),
			'param_name'  => 'text_link',
			'std'         => '',
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