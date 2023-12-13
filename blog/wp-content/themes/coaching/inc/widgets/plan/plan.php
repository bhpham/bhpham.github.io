<?php
/**
 * Class Plan_Widget
 *
 * Widget Name: Plan
 *
 * Author: Quoc
 */
class Thim_Plan_Widget extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'plan',
			esc_html__('Thim: Plan', 'coaching'),
			array(
				'description' => esc_html__( 'Displan plan', 'coaching' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group')
			),
			array(),
			array(
				'panel' => array(
					'type' => 'repeater',
					'label' => esc_html__('Panel List', 'coaching'),
					'item_name' => esc_html__('Panel', 'coaching'),

					'fields' => array(
						'panel_title' => array(
							'type' => 'text',
							'label' => esc_html__('Panel Title', 'coaching'),
						),

						'panel_body' => array(
							'type' => 'textarea',
							'allow_html_formatting' => array(
								'p' => array(
									'class' => array()
								),
								'ul' => array(
									'class' => array()
								),
								'li' => array(
									'class' => array()
								),
								'iframe' => array(
									'width'           => true,
									'height'          => true,
									'src'             => true,
									'frameborder'     => true,
									'allowfullscreen' => true
								)
							),
							'label' => esc_html__('Panel Body', 'coaching'),
						),
					),
				),
				'date_type' => array(
					'type' => 'text',
					'label' => esc_html__('Date Type','coaching'),
				),
				'autoplay' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Autoplay', 'coaching'),
					'default' => '',
				),

				'autoplayTimeout' => array(
					'type' => 'number',
					'label' => esc_html__('Autoplay Timeout', 'coaching'),
					'default' => '',
					'description' => esc_html__( 'Set time out for slide auto play (millisecond).', 'coaching' ),
				),
			),
			THIM_DIR . 'inc/widgets/plan/'

		);
	}


	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}
}

function thim_plan_register_widget() {
	register_widget( 'Thim_Plan_Widget' );
}

add_action( 'widgets_init', 'thim_plan_register_widget' );
