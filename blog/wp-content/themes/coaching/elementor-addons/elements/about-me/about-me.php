<?php

namespace Elementor;

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_About_Me_El extends Widget_Base {

	public function get_name() {
		return 'thim-about-me';
	}

	public function get_title() {
		return esc_html__( 'Thim: About Me', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-accordion';
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
				'label' => esc_html__( 'About Me', 'coaching' )
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

		$this->add_control(
			'info_me',
			[
				'label'       => esc_html__( 'Biographical Info', 'coaching' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'avt_img',
			[
				'label' => esc_html__( 'Upload Avatar Image', 'coaching' ),
				'type'  => Controls_Manager::MEDIA,

			]
		);

		$this->add_control(
			'phone',
			[
				'label'       => esc_html__( 'Phone Number', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);
		$this->add_control(
			'email',
			[
				'label'       => esc_html__( 'Email', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);
		$this->add_control(
			'address',
			[
				'label'       => esc_html__( 'Address', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);
		$this->add_control(
			'link',
			[
				'label'       => esc_html__( 'Link', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);
		$this->add_control(
			'text_link',
			[
				'label'       => esc_html__( 'Text Link', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'title'     => $settings['title'],
			'info_me'   => $settings['info_me'],
			'phone'     => $settings['phone'],
			'email'     => $settings['email'],
			'avt_img'   => $settings['avt_img']['id'],
			'address'   => $settings['address'],
			'link'      => $settings['link'],
			'text_link' => $settings['text_link'],
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		) );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_About_Me_El() );