<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Services_El extends Widget_Base {

	public function get_name() {
		return 'thim-services';
	}

	public function get_title() {
		return esc_html__( 'Thim: Services', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-services';
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
				'label' => esc_html__( 'Services', 'coaching' )
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
            'service_title',
            [
                'label'       =>  esc_html__( 'Title', 'coaching' ),
                'type'    => Controls_Manager::TEXT,

            ]
        );

        $repeater->add_control(
            'service_link',
            [
                'label'       =>  esc_html__( 'Link', 'coaching' ),
                'type'        => Controls_Manager::TEXT,

            ]
        );

        $repeater->add_control(
            'service_image',
            [
                'label'       =>  esc_html__( 'Image', 'coaching' ),
                'type'        => Controls_Manager::MEDIA,

            ]
        );

        $repeater->add_control(
            'service_bg_color',
            [
                'label' => esc_html__( 'Background Overlay Color', 'coaching' ),
                'type'  => Controls_Manager::COLOR,
            ]
        );

        $this->add_control(
            'service',
            [
                'label'       => esc_html__( 'List', 'coaching' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ service_title }}}',
                'separator'   => 'before',
            ]
        );


		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'service'     => $settings['service'],
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		) );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Services_El() );
