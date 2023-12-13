<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Progress_El extends Widget_Base {

	public function get_name() {
		return 'thim-progress';
	}

	public function get_title() {
		return esc_html__( 'Thim: Progress', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-progress';
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
				'label' => esc_html__( 'Progress', 'coaching' )
			]
		);

        $this->add_control(
            'title',
            [
                'label'               =>  esc_html__( 'Title', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'panel',
            [
                'label' => esc_html__('Input percent', 'coaching'),
                'type'        => Controls_Manager::NUMBER,
                'default' => 50,
                'min'     => 1,
                'max'     => 100,
                'step'    => 1
            ]
        );

		$this->end_controls_section();

        $this->start_controls_section(
            'style_options',
            [
                'label'         => esc_html__( 'Style Progress', 'coaching' ),
            ]
        );

        $this->add_control(
            'height',
            [
                'label'       => esc_html__( 'Set width:', 'coaching' ),
                'description' => esc_html__( 'Set width.', 'coaching' ),
                'type'        => Controls_Manager::NUMBER,
                'default'     => '5',
                'label_block' => true
            ]
        );


        $this->add_control(
            'color',
            [
                'default'     => '#2e8ece',
                'type'    => Controls_Manager::COLOR,
                'label'       => esc_html__( 'Select Color:', 'coaching' ),
                'description' => esc_html__( 'Select the color.', 'coaching' ),
            ]
        );

        $this->add_control(
            'bg_color',
            [
                'default'     => '#eaeaea',
                'label'       => esc_html__( 'Background Color:', 'coaching' ),
                'description' => esc_html__( 'Select the background color.', 'coaching' ),
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
            'style_options' => array(
                'height'              => $settings['height'],
                'color' => $settings['color'],
                'bg_color'   => $settings['bg_color'],
            )
    );

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		));
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Progress_El() );
