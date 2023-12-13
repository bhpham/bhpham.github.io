<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Daily_Support_El extends Widget_Base {

	public function get_name() {
		return 'thim-daily-support';
	}

	public function get_title() {
		return esc_html__( 'Thim: Daily Support', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-daily-support';
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
				'label' => esc_html__( 'Daily Support', 'coaching' )
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);

		$repeater = new Repeater();

		$repeater->add_control(
			'position_support',
			[
                'label'         => esc_html__( 'Position', 'coaching' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'left'              => esc_html__( 'Left', 'coaching' ),
                    'right' => esc_html__( 'Right', 'coaching' ),
                ],
			]
		);

		$repeater->add_control(
			'image_support',
            [
                'label'         => esc_html__( 'Upload Image', 'coaching' ),
                'type'        => Controls_Manager::MEDIA,
            ]
		);

        $repeater->add_control(
            'body_support',
            [
                'label' => esc_html__('Support Body', 'coaching'),
                'type'        => Controls_Manager::TEXTAREA,
                'label_block' => true,
            ]
        );

        $this->add_control(
            'daily-support',
            [
                'label'       => esc_html__( 'Support List', 'coaching' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ position_support }}}',
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
			'daily-support' => $settings['daily-support'],
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		) );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Daily_Support_El() );
