<?php
if ( class_exists( 'THIM_Testimonials' ) ) {
	class Thim_Testimonials_Widget extends Thim_Widget {
		function __construct() {
			parent::__construct(
				'testimonials',
				esc_html__( 'Thim: Testimonials', 'coaching' ),
				array(
					'description'   => '',
					'help'          => '',
					'panels_groups' => array( 'thim_widget_group' ),
					'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
				),
				array(),
				array(
					'title'            => array(
						'type'                  => 'text',
						'label'                 => esc_html__( 'Heading Text', 'coaching' ),
						'default'               => esc_html__( 'Testimonials', 'coaching' ),
						'allow_html_formatting' => true
					),
					'layout'           => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Layout', 'coaching' ),
						'default' => 'base',
						'options' => array(
							'base'            => esc_html__( 'Default', 'coaching' ),
							'layout_1'        => esc_html__( 'Testimonial Layout 1', 'coaching' ),
							'layout_2'        => esc_html__( 'Testimonial Layout 2', 'coaching' ),
							'layout_3'        => esc_html__( 'Testimonial Layout 3', 'coaching' ),
							'layout_business' => esc_html__( 'Layout Business', 'coaching' ),
							'before_after'    => esc_html__( 'Before After Image', 'coaching' ),
							'layout_home5'    => esc_html__( 'Layout Home 5', 'coaching' ),
						)
					),
					'full_description' => array(
						'type'    => 'checkbox',
						'label'   => esc_html__( 'Show Full Description', 'coaching' ),
						'default' => false,
					),
					'limit'            => array(
						'type'    => 'number',
						'label'   => esc_html__( 'Limit Posts', 'coaching' ),
						'default' => '7'
					),
					'item_visible'     => array(
						'type'    => 'number',
						'label'   => esc_html__( 'Visible items', 'coaching' ),
						'default' => '2'
					),
					'autoplay'         => array(
						'type'    => 'checkbox',
						'label'   => esc_html__( 'Auto play', 'coaching' ),
						'default' => false,
					),
					'timeout'          => array(
						'type'    => 'number',
						'label'   => esc_html__( 'Timeout', 'coaching' ),
						'default' => '6000'
					),

				)
			);
		}

		/**
		 * Initialize the CTA widget
		 */


		function get_template_name( $instance ) {
			if ( !empty( $instance['layout'] ) ) {
				return $instance['layout'];
			} else {
				return 'base';
			}

		}

		function get_style_name( $instance ) {
			return false;
		}

		function enqueue_scripts() {

		}

	}

	function thim_testimonials_register_widget() {
		register_widget( 'Thim_Testimonials_Widget' );
	}

	add_action( 'widgets_init', 'thim_testimonials_register_widget' );
}