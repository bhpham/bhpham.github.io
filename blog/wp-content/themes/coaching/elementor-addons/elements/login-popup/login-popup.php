<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Login_Popup_El extends Widget_Base {

	public function get_name() {
		return 'thim-login-popup';
	}

	public function get_title() {
		return esc_html__( 'Thim: Login Popup', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-login-popup';
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
				'label' => esc_html__( 'Login Popup', 'coaching' )
			]
		);

        $this->add_control(
            'show_register',
            [
                'label'   => esc_html__( 'Show Register Link', 'coaching' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    '' => esc_html__( 'No', 'coaching' ),
                    '1' => esc_html__( 'Yes', 'coaching' )
                ],
            ]
        );

        $this->add_control(
            'style',
            [
                "label"   => esc_html__( "Style", 'coaching' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    "base"					=> esc_html__( "Normal", 'coaching' ),
                    "layout_2" 	=> esc_html__( "Effective Style", 'coaching' ),
                ],
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

        $this->add_control(
            'shortcode',
            [
                'label'       => esc_html__( 'Shortcode', 'coaching' ),
                'description' => esc_html__( 'Enter shortcode to show in form Login', 'coaching' ),
                'type'    => Controls_Manager::TEXT,
            ]
        );


		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'show_register'     => $settings['show_register'],
			'text_login'     => $settings['text_login'],
			'text_register'     => $settings['text_register'],
			'text_logout'     => $settings['text_logout'],
			'style'     => $settings['style'],
			'shortcode'     => $settings['shortcode'],
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		), $settings['style'] );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Login_Popup_El() );
