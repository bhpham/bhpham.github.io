<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Progress_Step_El extends Widget_Base {

	public function get_name() {
		return 'thim-progress-step';
	}

	public function get_title() {
		return esc_html__( 'Thim: Progress Step', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-progress-step';
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
				'label' => esc_html__( 'Progress Step', 'coaching' )
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
            'title_description',
            [
                'label' => esc_html__('Title Description', 'coaching'),
                'type'        => Controls_Manager::TEXTAREA,
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
            'autoplay',
            [
                'type'    => Controls_Manager::SWITCHER,
                'label' => esc_html__('Autoplay', 'coaching'),
                'default' => false
            ]
        );

        $this->add_control(
            'navigation',
            [
                'type'    => Controls_Manager::SWITCHER,
                'label' => esc_html__('Navigation', 'coaching'),
                'default' => false
            ]
        );

        $this->add_control(
            'pagination',
            [
                'type'    => Controls_Manager::SWITCHER,
                'label' => esc_html__('Pagination', 'coaching'),
                'default' => false
            ]
        );

        $this->add_control(
            'autoplayTimeout',
            [
                'type'    => Controls_Manager::NUMBER,
                'label' => esc_html__('Autoplay Timeout', 'coaching'),
                'description' => esc_html__( 'Set time out for slide auto play (millisecond).', 'coaching' ),
            ]
        );

		$this->end_controls_section();

	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin

		$instance = array(
			'title' => $settings['title'],
			'title_description' => $settings['title_description'],
			'panel' => $settings['panel'],
			'autoplay' => $settings['autoplay'],
			'navigation' => $settings['navigation'],
			'pagination' => $settings['pagination'],
			'autoplayTimeout' => $settings['autoplayTimeout'],
    );

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		));
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Progress_Step_El() );
