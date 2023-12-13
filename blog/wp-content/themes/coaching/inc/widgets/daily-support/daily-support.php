<?php

class Thim_Daily_Support_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'daily-support',
			esc_html__( 'Thim: Daily Support', 'coaching' ),
			array(
				'description'           => esc_html__( 'Daily Support', 'coaching' ),
				'help'                  => '',
				'panels_groups'         => array( 'thim_widget_group' )
			),
			array(),
			array(
				'title'                   =>  array(
					'type'                =>  'text',
					'label'               =>  esc_html__( 'Title', 'coaching' ),
					'default'             =>  ''
				),

				'daily-support'           =>  array(
					'type'                =>  'repeater',
					'label'               =>  esc_html__( 'Support List', 'coaching' ),
					'item_name'           =>  esc_html__( 'Daily Support', 'coaching' ),
					'fields'              =>  array(
						'position_support'          => array(
							'type'          => 'select',
							'label'         => esc_html__( 'Position', 'coaching' ),
							'options'       => array(
								'left' => esc_html__( "Left", 'coaching' ),
								'right' => esc_html__( "Right", 'coaching' ),
							),
							'default'	=> ''
						),
						'image_support'     =>  array(
							'type'        =>  'media',
							'label'       =>  esc_html__( 'Image Of Support', 'coaching' ),
							'description' =>  esc_html__( 'Select image from media library.', 'coaching' )
						),
						'body_support' => array(
							'type' => 'textarea',
							'allow_html_formatting' => true,
							'label' => esc_html__('Support Body', 'coaching'),
						),
					)
				),
			)
		);
	}

	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}
}

function thim_daily_support_widget() {
	register_widget( 'Thim_Daily_Support_Widget' );
}

add_action( 'widgets_init', 'thim_daily_support_widget' );