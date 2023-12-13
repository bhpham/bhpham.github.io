<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Social_Counter_El extends Widget_Base {

	public function get_name() {
		return 'thim-social-counter';
	}

	public function get_title() {
		return esc_html__( 'Thim: Social Count Plus', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-social-counter';
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
				'label' => esc_html__( 'Display Social Count Plus', 'coaching' )
			]
		);

        $this->add_control(
            'title',
            [
                'label'       => esc_html__( 'Title', 'coaching' ),
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
			'title'            => $settings['title'],
		);

        $args                 = array();
        $args['before_title'] = '<h3 class="widget-title">';
        $args['after_title']  = '</h3>';

        thim_get_widget_template( $this->get_base(), array(
            'instance' => $instance,
            'args'     => $args
        ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Social_Counter_El() );