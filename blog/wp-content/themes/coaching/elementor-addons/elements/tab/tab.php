<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Tab_El extends Widget_Base {

	public function get_name() {
		return 'thim-tab';
	}

	public function get_title() {
		return esc_html__( 'Thim: Tab', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-tab';
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
				'label' => esc_html__( 'Tab', 'coaching' )
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
            'title',
            [
                "label"   => esc_html__( "Tab Title", 'coaching' ),
                "default" => esc_html__("Tab Title", 'coaching'),
                'type'    => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'content',
            [
                "label" => esc_html__( "Content", 'coaching' ),
                'type'        => Controls_Manager::TEXTAREA,
            ]
        );


        $this->add_control(
            'tab',
            [
                'label'       => esc_html__( 'List', 'coaching' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
                'separator'   => 'before'
            ]
        );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(

			'tab'       => $settings['tab'],
		);


        thim_get_widget_template( $this->get_base(), array(
            'instance' => $instance
        ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Tab_El() );