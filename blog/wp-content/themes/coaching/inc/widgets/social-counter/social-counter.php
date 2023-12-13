<?php

class Thim_Social_Counter extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'social-counter',
			esc_html__( 'Thim: Social Count Plus', 'coaching' ),
			array(
				'description'   => esc_html__( 'Display Social Count Plus', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'title'          => array(
					'type'  => 'text',
					'label' => esc_html__( 'Title', 'coaching' )
				)
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

function thim_social_counter_register_widget() {
	register_widget( 'Thim_Social_Counter' );
}

add_action( 'widgets_init', 'thim_social_counter_register_widget' );