<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Plan_El extends Widget_Base {

	public function get_name() {
		return 'thim-plan';
	}

	public function get_title() {
		return esc_html__( 'Thim: Plan', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-plan';
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
				'label' => esc_html__( 'Plan', 'coaching' )
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
            'panel_title',
            [
                'label' => esc_html__('Panel Title', 'coaching'),
                'type'    => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'panel_body',
            [
                'label' => esc_html__('Panel Body', 'coaching'),
                'type'        => Controls_Manager::TEXTAREA,
            ]
        );

        $this->add_control(
            'panel',
            [
                'label'       => esc_html__( 'List', 'coaching' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ panel_title }}}',
                'separator'   => 'before'
            ]
        );

		$this->add_control(
			'date_type',
			[
				'type'        => Controls_Manager::TEXT,
                'label' => esc_html__('Date Type','coaching'),
                'label_block' => true
			]
		);

        $this->add_control(
            'autoplay',
            [
                'type'    => Controls_Manager::SWITCHER,
                'label' => esc_html__('Autoplay', 'coaching'),
                'default' => false
            ]
        );

        $this->add_control(
            'autoplayTimeout',
            [
                'type'        => Controls_Manager::NUMBER,
                'label' => esc_html__('Autoplay Timeout', 'coaching'),
                'default' => '',
                'description' => esc_html__( 'Set time out for slide auto play (millisecond).', 'coaching' ),
            ]
        );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'panel' => $settings['panel'],
			'date_type' => $settings['date_type'],
			'autoplay' => $settings['autoplay'],
			'autoplayTimeout' => $settings['autoplayTimeout'],
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		) );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Plan_El() );
