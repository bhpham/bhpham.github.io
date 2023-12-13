<?php

class Thim_Countdown_Box_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'countdown-box',
			esc_html__( 'Thim: Countdown Box', 'coaching' ),
			array(
				'description'   => esc_html__( 'Countdown Box', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
			),
			array(),
			array(
				'text_days'    => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Text Days', 'coaching' ),
					'default' => esc_html__( 'days', 'coaching' ),
				),
				'text_hours'   => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Text Hours', 'coaching' ),
					'default' => esc_html__( 'hours', 'coaching' ),
				),
				'text_minutes' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Text Minutes', 'coaching' ),
					'default' => esc_html__( 'minutes', 'coaching' ),
				),
				'text_seconds' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Text Seconds', 'coaching' ),
					'default' => esc_html__( 'seconds', 'coaching' ),
				),
				'time_year'    => array(
					'type'  => 'text',
					'label' => esc_html__( 'Year', 'coaching' ),
				),
				'time_month'   => array(
					'type'  => 'text',
					'label' => esc_html__( 'Month', 'coaching' ),
				),
				'time_day'     => array(
					'type'  => 'text',
					'label' => esc_html__( 'Day', 'coaching' ),
				),
				'time_hour'    => array(
					'type'  => 'text',
					'label' => esc_html__( 'Hour', 'coaching' ),
				),
				'style_color'  => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Style Color', 'coaching' ),
					'options' => array(
						'white' => esc_html__( 'White', 'coaching' ),
						'black' => esc_html__( 'Black', 'coaching' ),
					),
				),
				'text_align'   => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Text Align', 'coaching' ),
					'options' => array(
						'text-left'   => esc_html__( 'Text Left', 'coaching' ),
						'text-center' => esc_html__( 'Text Center', 'coaching' ),
						'text-right'  => esc_html__( 'Text Right', 'coaching' ),
					),
				)
			),
			THIM_DIR . 'inc/widgets/countdown-box/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */

	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}
}

function thim_countdown_box_widget() {
	register_widget( 'Thim_Countdown_Box_Widget' );
}

add_action( 'widgets_init', 'thim_countdown_box_widget' );