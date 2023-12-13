<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Image_Box_El extends Widget_Base {

	public function get_name() {
		return 'thim-image-box';
	}

	public function get_title() {
		return esc_html__( 'Thim: Image Box', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-image-box';
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
				'label' => esc_html__( 'Image box', 'coaching' )
			]
		);

        $this->add_control(
            'layout',
            [
                'label'   => esc_html__( 'Layout', 'coaching' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'default'   => esc_html__( 'Default', 'coaching' ),
                    'slider' => esc_html__( 'Slider', 'coaching' ),
                ],
                'default' => 'default'
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'box_title',
            [
                'label'       =>  esc_html__( 'Title', 'coaching' ),
                'type'    => Controls_Manager::TEXT,

            ]
        );

        $repeater->add_control(
            'box_link',
            [
                'label'       =>  esc_html__( 'Link', 'coaching' ),
                'type'        => Controls_Manager::TEXT,

            ]
        );

        $repeater->add_control(
            'box_image',
            [
                'label'       =>  esc_html__( 'Image', 'coaching' ),
                'type'        => Controls_Manager::MEDIA,

            ]
        );

        $this->add_control(
            'box',
            [
                'label'       => esc_html__( 'List', 'coaching' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ box_title }}}',
                'separator'   => 'before',
                'condition' => [
                    'layout' => [ 'slider' ]
                ]
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => esc_html__( 'Title', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'layout' => [ 'default' ]
                ]
            ]
        );

        $this->add_control(
            'subtitle',
            [
                'label'               =>  esc_html__( 'Sub Title', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'layout' => [ 'default' ]
                ]
            ]
        );

        $this->add_control(
            'image_box',
            [
                'label'         => esc_html__( 'Upload Image', 'coaching' ),
                'type'        => Controls_Manager::MEDIA,
                'condition' => [
                    'layout' => [ 'default' ]
                ]
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( 'Link', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'layout' => [ 'default' ]
                ]
            ]
        );

        $this->add_control(
            'style',
            [
                'label'   => esc_html__( 'Style', 'coaching' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'default'   => esc_html__( 'Default', 'coaching' ),
                    'style-1' => esc_html__( 'Style 1', 'coaching' ),
                ],
                'default' => 'default',
                'condition' => [
                    'layout' => [ 'default' ]
                ]
            ]
        );


		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'layout'     => $settings['layout'],
			'style'     => $settings['style'],
			'box'     => $settings['box'],
			'title'     => $settings['title'],
			'image_box'   => $settings['image_box']['id'],
			'link' => $settings['link'],
			'subtitle'    => $settings['subtitle']
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		) );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Image_Box_El() );
