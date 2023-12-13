<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Video_El extends Widget_Base {

	public function get_name() {
		return 'thim-video';
	}

	public function get_title() {
		return esc_html__( 'Thim: Video', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-video';
	}

	public function get_categories() {
		return [ 'thim-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content',
			[
				'label' => esc_html__( 'Video', 'coaching' )
			]
		);


        $this->add_control(
            'video_width',
            [
                'label'   => esc_html__( 'Width video', 'coaching' ),
                'description' => esc_html__( 'Enter width of video. Example 100% or 600. ', 'coaching' ),
                'type'    => Controls_Manager::NUMBER,
            ]
        );

        $this->add_control(
            'video_height',
            [
                'label'   => esc_html__( 'Height video', 'coaching' ),
                'description' => esc_html__( 'Enter height of video. Example 100% or 600. ', 'coaching' ),
                'type'    => Controls_Manager::NUMBER,
            ]
        );


		$this->add_control(
			'external_video',
			[
				'label'       => esc_html__( 'Vimeo Video ID', 'coaching' ),
                'description' => esc_html__( 'Enter vimeo video ID . Example if link video https://player.vimeo.com/video/61389324 then video ID is 61389324 ', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'video_width'       => $settings['video_width'],
			'video_height'      => $settings['video_height'],
			'external_video'    => $settings['external_video'],
		);

		thim_get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Video_El() );