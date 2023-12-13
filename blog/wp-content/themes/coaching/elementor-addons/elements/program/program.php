<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Program_El extends Widget_Base {

	public function get_name() {
		return 'thim-program';
	}

	public function get_title() {
		return esc_html__( 'Thim: Program', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-program';
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
				'label' => esc_html__( 'Program', 'coaching' )
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
            'text_align',
            [
                "label"   => esc_html__( "Text Align", 'coaching' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    "text-center" 	=> esc_html__( "Text Center", 'coaching' ),
                    "text-left" 	=> esc_html__( "Text Left", 'coaching' ),
                    "text-right" 	=> esc_html__( "Text Right", 'coaching' ),
                ],
                "default" => "text-center",
            ]
        );

        $this->add_control(
            'style',
            [
                "label"   => esc_html__( "Style", 'coaching' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    "base"					=> esc_html__( "Normal", 'coaching' ),
                    "slider" 	=> esc_html__( "Slider", 'coaching' ),
                ],
                 "default" => "base",
            ]
        );
        $this->add_control(
            'columns',
            [
                "label"   => esc_html__( "Columns", 'coaching' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    "2"                  => esc_html__( "2 Columns", 'coaching' ),
                    "3"                  => esc_html__( "3 Columns", 'coaching' ),
                    "4"                  => esc_html__( "4 Columns", 'coaching' ),
                    "6"                  => esc_html__( "6 Columns", 'coaching' ),
                    
                ],
                "default" => "3",
                'condition' => array(
                    'style' => [ 'base' ]
                )       
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'program_title',
            [
                'label'       =>  esc_html__( 'Title Of Program', 'coaching' ),
                'type'    => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'program_link',
            [
                'label'       =>  esc_html__( 'Link Of Program', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
            ]
        );

        $repeater->add_control(
            'program_image',
            [
                'label'       =>  esc_html__( 'Image Of Program', 'coaching' ),
                'type'        => Controls_Manager::MEDIA,
            ]
        );

        $this->add_control(
            'program',
            [
                'label'       => esc_html__( 'List', 'coaching' ),
                'type'        => Controls_Manager::REPEATER,
                'fields'      => $repeater->get_controls(),
                'title_field' => '{{{ program_title }}}',
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
			'text_align' => $settings['text_align'],
			'style' => $settings['style'],
			'program' => $settings['program'],
            'columns' => $settings['columns'],
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		), $settings['style'] );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Program_El() );
