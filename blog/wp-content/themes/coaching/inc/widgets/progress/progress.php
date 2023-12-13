<?php

class Thim_Progress extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'progress',
			esc_html__('Thim: Progress', 'coaching'),
			array(
				'description' => esc_html__( 'Add Progress', 'coaching' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(
				'title' => array(
					'type' => 'text',
					'label' => esc_html__('Title', 'coaching'),
					'default' => '',
				),
				'panel' => array(
					'type' => 'slider',
					'min' => 0,
					'max' => 100,
					'default' => 0,
					'allow_html_formatting' => true,
					'label' => esc_html__('Input percent', 'coaching'),
				),
				'style_options' => array(
					'type'          => 'section',
					'hide'          => true,
					'label'         => esc_html__( 'Style Progress', 'coaching' ),
					'fields'        => array(
						'height'          => array(
							'type'        => 'number',
							'default'     => '5',
							'label'       => esc_html__( 'Set height:', 'coaching' ),
							'description' => esc_html__( 'Set height.', 'coaching' ),
						),
						'color'           => array(
							'type'        => 'color',
							'default'     => '#2e8ece',
							'class'       => 'color-mini',
							'label'       => esc_html__( 'Select Color:', 'coaching' ),
							'description' => esc_html__( 'Select the color.', 'coaching' ),
						),
						'bg_color'        => array(
							'type'        => 'color',
							'default'     => '#eaeaea',
							'label'       => esc_html__( 'Background Color:', 'coaching' ),
							'description' => esc_html__( 'Select the background color.', 'coaching' ),
							'class'       => 'color-mini',
						),
					)
				),
			),
			THIM_DIR . 'inc/widgets/progress/'

		);
	}


	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}
}

function thim_progress_register_widget() {
	register_widget( 'Thim_Progress' );
}

add_action( 'widgets_init', 'thim_progress_register_widget' );
