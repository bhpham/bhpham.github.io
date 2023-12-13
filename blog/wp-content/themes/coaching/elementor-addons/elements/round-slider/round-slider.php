<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Round_Slider_El extends Widget_Base {

	public function get_name() {
		return 'thim-round-slider';
	}

	public function get_title() {
		return esc_html__( 'Thim: Round Slider', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-round-slider';
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
				'label' => esc_html__( 'Program', 'coaching' )
			]
		);

        $this->add_control(
            'title',
            [
                'label'               =>  esc_html__( 'Title', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
            ]
        );


        $repeater = new Repeater();

        $repeater->add_control(
            'panel_type',
            [
                'label'         => esc_html__( 'Type of Box', 'coaching' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'image' => esc_html__( 'Image', 'coaching' ),
                    'video' => esc_html__( 'Video', 'coaching' ),
                ],
            ]
        );

        $repeater->add_control(
            'panel_title',
            [
                'label' => esc_html__('Title', 'coaching'),
                'type'    => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'panel_image',
            [
                'label'       => esc_html__( 'Image Thumbnail', 'coaching' ),
                'type'    => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'panel_image_large',
            [
                'label'       => esc_html__( 'Image Large', 'coaching' ),
                'type'    => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'panel_video',
            [
                'label'                 => esc_html__( 'Video URL or Embeded Code', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'panel',
            [
                'label'       => esc_html__( 'List', 'coaching' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ panel_type }}}',
                'separator'   => 'before'
            ]
        );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'title' => $settings['title'],
			'panel' => $settings['panel'],
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		) );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Round_Slider_El() );
