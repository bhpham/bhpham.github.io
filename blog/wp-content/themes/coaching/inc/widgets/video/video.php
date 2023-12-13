<?php

class Thim_Video_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'video',
			esc_html__( 'Thim: Video', 'coaching' ),
			array(
				'description'   => esc_html__( 'A video player widget.', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' )
			),
			array(),
			array(
				'video_width' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Width video', 'coaching' ),
						'description' => esc_html__( 'Enter width video. Example 100% or 600. ', 'coaching' )
				),
				'video_height' => array(
						'type'        => 'text',
						'label'       => esc_html__( 'Height video', 'coaching' ),
						'description' => esc_html__( 'Enter height video. Example 100% or 600.', 'coaching' )
				),
				'external_video' => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Vimeo Video ID', 'coaching' ),
					'description' => esc_html__( 'Enter vimeo video ID . Example if link video https://player.vimeo.com/video/61389324 then video ID is 61389324 ', 'coaching' )
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

function thim_video_register_widget() {
	register_widget( 'Thim_Video_Widget' );
}

add_action( 'widgets_init', 'thim_video_register_widget' );