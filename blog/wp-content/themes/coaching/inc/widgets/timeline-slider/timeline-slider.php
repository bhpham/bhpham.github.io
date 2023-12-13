<?php

class Thim_Timeline_Slider_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'timeline-slider',
			esc_html__( 'Thim: Timeline Slider', 'coaching' ),
			array(
				'description'   => esc_html__( 'Add Timeline Slider', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'item' => array(
					'type'        => 'repeater',
					'label'       => esc_html__( 'Timelines', 'coaching' ),
					'item_name'   => esc_html__( 'Item', 'coaching' ),
					'description' => esc_html__( 'List items timeline', 'coaching' ),
					'fields'      => array(
						'title'       => array(
							'type'  => 'text',
							'label' => esc_html__( 'Title for timeline.', 'coaching' )
						),
						'description' => array(
							'type'  => 'textarea',
							'label' => esc_html__( 'Description for timeline.', 'coaching' )
						),
						'timeline'    => array(
							'type'  => 'text',
							'label' => esc_html__( 'Date time for timeline.', 'coaching' )
						)
					)

				),

				'number'      => array(
					'type'    => 'number',
					'default' => '4',
					'label'   => esc_html__( 'Visible Item', 'coaching' ),
				),

				'css_animation' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'CSS Animation', 'coaching' ),
					'options' => array(
						''              => esc_html__( 'No', 'coaching' ),
						'top-to-bottom' => esc_html__( 'Top to bottom', 'coaching' ),
						'bottom-to-top' => esc_html__( 'Bottom to top', 'coaching' ),
						'left-to-right' => esc_html__( 'Left to right', 'coaching' ),
						'right-to-left' => esc_html__( 'Right to left', 'coaching' ),
						'appear'        => esc_html__( 'Appear from center', 'coaching' )
					),
				),
			),
			THIM_DIR . 'inc/widgets/timeline-slider/'
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


function thim_timeline_slider_widget() {
	register_widget( 'Thim_Timeline_Slider_Widget' );
}

add_action( 'widgets_init', 'thim_timeline_slider_widget' );