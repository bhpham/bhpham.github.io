<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Login_Menu_El extends Widget_Base {

	public function get_name() {
		return 'thim-login-menu';
	}

	public function get_title() {
		return esc_html__( 'Thim: Login Menu', 'coaching' );
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
				'label' => esc_html__( 'Login Menu', 'coaching' )
			]
		);

		$this->add_control(
			'text_login',
			[
                'label'   => esc_html__( 'Text Login', 'coaching' ),
                'default' => esc_html__('Login', 'coaching'),
				'type'    => Controls_Manager::TEXT,
			]
		);

        $this->add_control(
            'text_register',
            [
                'label'   => esc_html__( 'Text for Register', 'coaching' ),
                'default' => esc_html__('Register', 'coaching'),
                'type'    => Controls_Manager::TEXT,
            ]
        );

        $this->add_control(
            'text_logout',
            [
                'label'   => esc_html__( 'Text Logout', 'coaching' ),
                'default' => esc_html__('Logout', 'coaching'),
                'type'    => Controls_Manager::TEXT,
            ]
        );


		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'text_login'     => $settings['text_login'],
			'text_register'     => $settings['text_register'],
			'text_logout'     => $settings['text_logout'],
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		) );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Login_Menu_El() );
