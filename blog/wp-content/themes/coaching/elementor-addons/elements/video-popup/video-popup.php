<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Video_Popup_El extends Widget_Base {

	public function get_name() {
		return 'thim-video-popup';
	}

	public function get_title() {
		return esc_html__( 'Thim: Video Popup', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-video-popup';
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
            'title',
            [
                'label'               =>  esc_html__( 'Title', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'content_text',
            [
                "label" => esc_html__( "Content", 'coaching' ),
                'type'    => Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'panel_image',
            [
                'label'       => esc_html__( 'Image Thumbnail', 'coaching' ),
                'description' => esc_html__( 'Select image from media library.', 'coaching' ),
                'type'    => Controls_Manager::MEDIA,
            ]
        );

		$this->add_control(
			'url_video',
			[
                'label'               =>  esc_html__( 'URL Video', 'coaching' ),
                'description'           => esc_html__( 'http://www.youtube.com/embed/xxxxxxxxxxx', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'title'       => $settings['title'],
			'content'      => $settings['content_text'],
			'panel_image'    => $settings['panel_image']['id'],
			'url_video'    => $settings['url_video'],
		);

		thim_get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Video_Popup_El() );