<?php

class Thim_Progress_Step extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'progress-step',
			esc_html__('Thim: Progress Step', 'coaching'),
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

				'title_description' => array(
					'type' => 'textarea',
					'allow_html_formatting' => true,
					'label' => esc_html__('Title Description', 'coaching'),
				),
				'style_options' => array(
					'type'          => 'section',
					'hide'          => true,
					'label'         => esc_html__( 'Style Title Progress Step', 'coaching' ),
					'fields'        => array(
						'bg_color'        => array(
							'type'        => 'color',
							'label'       => esc_html__( 'Background Color:', 'coaching' ),
							'description' => esc_html__( 'Select the background color.', 'coaching' ),
							'class'       => 'color-mini',
						),
					)
				),

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
							'allow_html_formatting' => true,
							'label' => esc_html__('Panel Body', 'coaching'),
						),
					),
				),

				'autoplay' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Autoplay', 'coaching'),
					'default' => '',
				),

				'navigation' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Navigation', 'coaching'),
					'default' => '',
				),

                'pagination' => array(
                    'type' => 'checkbox',
                    'label' => esc_html__('Pagination', 'coaching'),
                    'default' => '',
                ),

				'autoplayTimeout' => array(
					'type' => 'number',
					'label' => esc_html__('Autoplay Timeout', 'coaching'),
					'default' => '',
					'description' => esc_html__( 'Set time out for slide auto play (millisecond).', 'coaching' ),
				),
			),
			THIM_DIR . 'inc/widgets/progress-step/'

		);
	}


	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}
}

function thim_progress_step_register_widget() {
	register_widget( 'Thim_Progress_Step' );
}

add_action( 'widgets_init', 'thim_progress_step_register_widget' );
