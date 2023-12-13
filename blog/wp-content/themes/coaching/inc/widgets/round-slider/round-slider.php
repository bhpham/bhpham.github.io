<?php

class Thim_Round_Slider_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'round-slider',
			esc_html__( 'Thim: Round Slider', 'coaching' ),
			array(
				'description'   => esc_html__( 'Add Round Slider', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' )
			),
			array(),
			array(
				'title' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Title', 'coaching' ),
					'default' => ''
				),

				'panel' => array(
					'type'      => 'repeater',
					'label'     => esc_html__( 'Panel List', 'coaching' ),
					'item_name' => esc_html__( 'Panel', 'coaching' ),
					'fields'    => array(
						'panel_type'  => array(
							'type'          => 'select',
							'label'         => esc_html__( 'Type of Box', 'coaching' ),
							'default'       => 'image',
							'options'       => array(
								'image' => esc_html__( 'Image', 'coaching' ),
								'video' => esc_html__( 'Video', 'coaching' ),
							),
							'state_emitter' => array(
								'callback' => 'select',
								'args'     => array( 'panel_type' )
							),
						),
						'panel_title' => array(
							'type'       => 'text',
							'label'      => esc_html__( 'Title', 'coaching' ),
							'description' => esc_html__( 'Title of the panel', 'coaching' )
						),
						'panel_image' => array(
							'type'        => 'media',
							'label'       => esc_html__( 'Image Thumbnail', 'coaching' ),
							'description' => esc_html__( 'Select image from media library.', 'coaching' )
						),

						'panel_image_large' => array(
							'type'        => 'media',
							'label'       => esc_html__( 'Image Large', 'coaching' ),
							'description' => esc_html__( 'Select image from media library. Image Large just display with type Image', 'coaching' ),
						),

						'panel_video' => array(
							'type'                  => 'text',
							'label'                 => esc_html__( 'Video URL or Embeded Code', 'coaching' ),
							'description'           => esc_html__( 'Just display with type Video', 'coaching' ),
							"allow_html_formatting" => array(
								'iframe' => array(
									'width'           => true,
									'height'          => true,
									'src'             => true,
									'frameborder'     => true,
									'allowfullscreen' => true
								),
							)
						),
					),
				),
			)
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


function thim_round_slider_widget() {
	register_widget( 'Thim_Round_Slider_Widget' );
}

add_action( 'widgets_init', 'thim_round_slider_widget' );