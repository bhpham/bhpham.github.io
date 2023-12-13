<?php

$defaults = array(
	'layout'            => 'base',
	'limit'             => '7',
	'item_visible'      => '5',
	'autoplay'          => false,
	'full_description'  => false,
	'mousewheel'        => false,
	'show_pagination'   => false,
	'show_navigation'   => true,
	'carousel_autoplay' => '0',
	'link_to_single'    => false,
);

vc_map( array(
	'name'        => esc_html__( 'Thim: Testimonial', 'coaching' ),
	'base'        => 'thim-testimonials',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display testimonials.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-testimonials',
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
				esc_html__( 'Select', 'coaching' )               => '',
				esc_html__( 'Default', 'coaching' )              => 'base',
				esc_html__( 'Testimonial Layout 1', 'coaching' ) => 'layout_1',
				esc_html__( 'Testimonial Layout 2', 'coaching' ) => 'layout_2',
				esc_html__( 'Testimonial Layout 3', 'coaching' ) => 'layout_3',
				esc_html__( 'Layout Business', 'coaching' )      => 'layout_business',
				esc_html__( 'Before After Image', 'coaching' )   => 'before_after',
				esc_html__( 'Layout Home 5', 'coaching' )        => 'layout_home5',
			),
			'std'         => $defaults['layout'],
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Show Full Description', 'coaching' ),
			'param_name'  => 'full_description',
			'std'         => $defaults['full_description'],
		),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Limit Posts', 'coaching' ),
			'param_name'  => 'limit',
			'std'         => $defaults['limit'],
		),

		array(
			'type'        => 'number',
			'admin_label' => true,
			'heading'     => esc_html__( 'Items visible', 'coaching' ),
			'param_name'  => 'item_visible',
			'std'         => $defaults['item_visible'],
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => true,
			'heading'     => esc_html__( 'Auto play', 'coaching' ),
			'param_name'  => 'autoplay',
			'std'         => $defaults['autoplay'],
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Timeout', 'coaching' ),
			'param_name'  => 'timeout',
			'description' => esc_html__( 'Set 0 to disable auto play.', 'coaching' ),
			'std'         => $defaults['carousel_autoplay'],
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