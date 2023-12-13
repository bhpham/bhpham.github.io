<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Slider_El extends Widget_Base {

	public function get_name() {
		return 'thim-slider';
	}

	public function get_title() {
		return esc_html__( 'Thim: Slider', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-slider';
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
				'label' => esc_html__( 'Slider', 'coaching' )
			]
		);

        $repeater = new Repeater();

        $repeater->add_control(
            'thim_slider_background_image',
            [
                'label'   => esc_html__( 'Background Image', 'coaching' ),
                'type'        => Controls_Manager::MEDIA,
            ]
        );

        $repeater->add_control(
            'color_overlay',
            [
                'label' => esc_html__( 'Color Overlay images', 'coaching' ),
                'type'        => Controls_Manager::COLOR,
            ]
        );

        $repeater_c = new Repeater();

        $repeater_c->add_control(
            'style',
            [
                "label"         => esc_html__( "Type Content", 'coaching' ),
                "default"       => "inputbox",
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    "inputbox" => esc_html__( "Input box", 'coaching' ),
                    "texarea"  => esc_html__( "Texarea", 'coaching' ),
                    "button"  => esc_html__( "Button", 'coaching' ),
                    "image"  => esc_html__( "Image", 'coaching' )
                ],
            ]
        );

        $repeater_c->add_control(
            'thim_slider_item_title_text',
            [
                'label'                 => esc_html__( 'Content', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'condition' => array(
                    'thim_slider_item_type' => [ 'inputbox' ]
                )
            ]
        );

        $repeater_c->add_control(
            'thim_slider_item_title_textarea',
            [
                'label'                 => esc_html__( 'Content', 'coaching' ),
                'type'        => Controls_Manager::TEXTAREA,
                'condition' => array(
                    'thim_slider_item_type' => [ 'inputbox' ]
                )
            ]
        );


        $repeater_c->add_control(
            'thim_slider_item_title_button_text',
            [
                'label'                 => esc_html__( 'Button text', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'condition' => array(
                    'thim_slider_item_type' => [ 'inputbox' ]
                )
            ]
        );

        $repeater_c->add_control(
            'thim_slider_item_title_button_link',
            [
                'label'                 => esc_html__( 'Button link', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'condition' => array(
                    'thim_slider_item_type' => [ 'inputbox' ]
                )
            ]
        );

        $repeater_c->add_control(
            'thim_slider_item_title_image',
            [
                'label'                 => esc_html__( 'Media', 'coaching' ),
                'type'       => Controls_Manager::GALLERY,
                'condition' => array(
                    'thim_slider_item_type' => [ 'inputbox' ]
                )
            ]
        );


        $this->add_control(
            'thim_slider_items',
            [
                'label'     => esc_html__( 'Slider Frames', 'coaching' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ thim_slider_item_type }}}',
                'separator'   => 'before'
            ]
        );


        $this->add_control(
            'thim_slider_frames',
            [
                'label'     => esc_html__( 'Slider Frames', 'coaching' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ thim_slider_background_image }}}',
                'separator'   => 'before'
            ]
        );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'title' => $settings['title'],
			'panel' => $settings['panel'],
			'show_first_panel' => $settings['show_first_panel'],
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		) );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Slider_El() );
