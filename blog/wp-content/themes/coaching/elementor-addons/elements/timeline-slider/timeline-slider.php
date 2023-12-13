<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Timeline_Slider_El extends Widget_Base {

	public function get_name() {
		return 'thim-timeline-slider';
	}

	public function get_title() {
		return esc_html__( 'Thim: Timeline Slider', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-timeline-slider';
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
				'label' => esc_html__( 'Add Timeline Slider', 'coaching' ),
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__( 'Title for timeline.', 'coaching' ),
                'type'    => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__( 'Description for timeline.', 'coaching' ),
                'type'        => Controls_Manager::TEXTAREA,
            ]
        );

        $repeater->add_control(
            'timeline',
            [
                'label' => esc_html__( 'Date time for timeline.', 'coaching' ),
                'type'    => Controls_Manager::TEXT,
            ]
        );


        $this->add_control(
            'item',
            [
                'label'       => esc_html__( 'Timelines', 'coaching' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
                'separator'   => 'before'
            ]
        );

        $this->add_control(
            'number',
            [
                'type'        => Controls_Manager::NUMBER,
                'default' => '4',
                'label'   => esc_html__( 'Visible Item', 'coaching' ),
            ]
        );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(

			'item'       => $settings['item'],
			'number'       => $settings['number'],
			'css_animation'       => '',
		);


        thim_get_widget_template( $this->get_base(), array(
            'instance' => $instance
        ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Timeline_Slider_El() );