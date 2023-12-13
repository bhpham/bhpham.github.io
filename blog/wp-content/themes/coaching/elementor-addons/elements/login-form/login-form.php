<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Login_Form_El extends Widget_Base {

	public function get_name() {
		return 'thim-login-form';
	}

	public function get_title() {
		return esc_html__( 'Thim: Login Form', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-login-form';
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
				'label' => esc_html__( 'Login Form', 'coaching' )
			]
		);

		$this->add_control(
			'captcha',
			[
				'label'   => esc_html__( 'Use Captcha?', 'coaching' ),
				'type'    => Controls_Manager::SWITCHER,
                'default' => false
			]
		);


		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'captcha'     => $settings['captcha'],
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		) );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Login_Form_El() );
