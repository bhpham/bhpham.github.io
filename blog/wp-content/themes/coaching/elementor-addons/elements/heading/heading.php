<?php

namespace Elementor;

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Heading_El extends Widget_Base {

	public function get_name() {
		return 'thim-heading';
	}

	public function get_title() {
		return esc_html__( 'Thim: Heading', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-heading';
	}

	public function get_categories() {
		return [ 'thim-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_tabs',
			[
				'label' => __( 'Content', 'coaching' )
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'coaching' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'dynamic'     => [
					'active' => true,
				],
				'label_block' => true
			]
		);


		$this->add_control(
			'size',
			[
				'label'   => esc_html__( 'HTML Tag', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					''   => esc_html__( 'Select tag', 'coaching' ),
					'h2' => esc_html__( 'h2', 'coaching' ),
					'h3' => esc_html__( 'h3', 'coaching' ),
					'h4' => esc_html__( 'h4', 'coaching' ),
					'h5' => esc_html__( 'h5', 'coaching' ),
					'h6' => esc_html__( 'h6', 'coaching' ),
				],
				'default' => 'h3',
			]
		);

		$this->add_control(
			'sub_heading',
			[
				'label'       => esc_html__( 'Sub Title', 'coaching' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'line',
			[
				'label'   => esc_html__( 'Show Separator?', 'coaching' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes'
			]
		);

		$this->add_control(
			'text_align',
			[
				'label'   => esc_html__( 'Text Alignment', 'coaching' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'text-left'   => [
						'title' => esc_html__( 'Left', 'coaching' ),
						'icon'  => 'fa fa-align-left',
					],
					'text-center' => [
						'title' => esc_html__( 'Center', 'coaching' ),
						'icon'  => 'fa fa-align-center',
					],
					'text-right'  => [
						'title' => esc_html__( 'Right', 'coaching' ),
						'icon'  => 'fa fa-align-right',
					]
				],
			]
		);
		$this->add_control(
			'type',
			[
				"label"   => esc_html__( "Layout", 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					""          => esc_html__( "Default", 'coaching' ),
					"bussiness" => esc_html__( "Bussiness", 'coaching' ),
					"gym"       => esc_html__( "Gym", 'coaching' ),
					"therapist" => esc_html__( "Therapist", 'coaching' ),
					"home-5"    => esc_html__( "Home 5", 'coaching' ),
				],
				'default' => '',
			]
		);


		$this->add_control(
			'content',
			[
				'label'     => esc_html__( 'Content', 'coaching' ),
				'type'      => Controls_Manager::TEXTAREA,
				'dynamic'   => [
					'active' => true,
				],
				'condition' => array(
					'type' => [ 'bussiness', 'gym' ]
				)
			]
		);

		$this->end_controls_section();

//		Style Tab

		$this->start_controls_section(
			'heading_settings',
			[
				'label' => esc_html__( 'Style', 'coaching' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'textcolor',
			[
				'label' => esc_html__( 'Title Color', 'coaching' ),
				'type'  => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'sub_heading_color',
			[
				'label'       => esc_html__( 'Sub Title Color', 'coaching' ),
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'type'        => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'bg_line',
			[
				'label' => esc_html__( 'Separator Color', 'coaching' ),
				'type'  => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'css_animation',
			[
				'label'   => esc_html__( 'Animation', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					''              => esc_html__( 'Choose...', 'coaching' ),
					'top-to-bottom' => esc_html__( 'Top to bottom', 'coaching' ),
					'bottom-to-top' => esc_html__( 'Bottom to top', 'coaching' ),
					'left-to-right' => esc_html__( 'Left to right', 'coaching' ),
					'right-to-left' => esc_html__( 'Right to left', 'coaching' ),
					'appear'        => esc_html__( 'Appear from center', 'coaching' ),
				],
				'default' => '',
			]
		);

		$this->add_control(
			'font_heading',
			[
				'label'        => esc_html__( 'Custom Title Typography?', 'coaching' ),
				'type'         => Controls_Manager::SWITCHER,
				'separator'    => 'before',
				'return_value' => 'custom',
				'default'      => ''
			]
		);

		$this->add_control(
			'custom_font_size',
			[
				'label'     => esc_html__( 'Font Size', 'coaching' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => '14',
				'condition' => [
					'font_heading' => [ 'custom' ]
				]
			]
		);

		$this->add_control(
			'custom_font_weight',
			[
				'label'     => esc_html__( 'Font Weight', 'coaching' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					''       => esc_html__( 'Choose...', 'coaching' ),
					'normal' => esc_html__( 'Normal', 'coaching' ),
					'bold'   => esc_html__( 'Bold', 'coaching' ),
					'100'    => esc_html__( '100', 'coaching' ),
					'200'    => esc_html__( '200', 'coaching' ),
					'300'    => esc_html__( '300', 'coaching' ),
					'400'    => esc_html__( '400', 'coaching' ),
					'500'    => esc_html__( '500', 'coaching' ),
					'600'    => esc_html__( '600', 'coaching' ),
					'700'    => esc_html__( '700', 'coaching' ),
					'800'    => esc_html__( '800', 'coaching' ),
					'900'    => esc_html__( '900', 'coaching' ),
				],
				'default'   => '',
				'condition' => [
					'font_heading' => [ 'custom' ]
				]
			]
		);

		$this->add_control(
			'custom_font_style',
			[
				'label'     => esc_html__( 'Font Style', 'coaching' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					''        => esc_html__( 'Choose...', 'coaching' ),
					'italic'  => esc_html__( 'Italic', 'coaching' ),
					'oblique' => esc_html__( 'Oblique', 'coaching' ),
					'initial' => esc_html__( 'Initial', 'coaching' ),
					'inherit' => esc_html__( 'Inherit', 'coaching' ),
					'normal'  => esc_html__( 'Normal', 'coaching' ),
				],
				'default'   => '',
				'condition' => [
					'font_heading' => [ 'custom' ]
				]
			]
		);

		$this->add_control(
			'custom_line_height',
			[
				"label"   => esc_html__( "Line Height", 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => '',
			]
		);

		$this->add_control(
			'custom_style',
			[
				'label' => esc_html__( 'Custom Style', 'coaching' ),
				'type'  => Controls_Manager::TEXT,
			]
		);

		$this->add_control(
			'font_sub_heading',
			[
				"label"   => esc_html__( "Font Sub Heading", 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"default" => esc_html__( "Default", 'coaching' ),
					"custom"  => esc_html__( "Custom", 'coaching' )
				],
				"default" => "default",
			]
		);

		$this->end_controls_section();

//		Sub Heading Setting
		$this->start_controls_section(
			'custom_font_sub_heading',
			[
				'label'     => esc_html__( 'Custom Font Sub Heading', 'coaching' ),
				'tab'       => Controls_Manager::TAB_STYLE,
				'condition' => array(
					'font_sub_heading' => [ 'custom' ]
				)
			]
		);

		$this->add_control(
			'custom_sub_font_size',
			[
				'label'   => esc_html__( 'Font Size', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => '14',
			]
		);

		$this->add_control(
			'custom_sub_font_weight',
			[
				'label'   => esc_html__( 'Font Weight', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					''       => esc_html__( 'Choose...', 'coaching' ),
					'normal' => esc_html__( 'Normal', 'coaching' ),
					'bold'   => esc_html__( 'Bold', 'coaching' ),
					'100'    => esc_html__( '100', 'coaching' ),
					'200'    => esc_html__( '200', 'coaching' ),
					'300'    => esc_html__( '300', 'coaching' ),
					'400'    => esc_html__( '400', 'coaching' ),
					'500'    => esc_html__( '500', 'coaching' ),
					'600'    => esc_html__( '600', 'coaching' ),
					'700'    => esc_html__( '700', 'coaching' ),
					'800'    => esc_html__( '800', 'coaching' ),
					'900'    => esc_html__( '900', 'coaching' ),
				],
				'default' => '',
			]
		);

		$this->add_control(
			'custom_sub_line_height',
			[
				"label"   => esc_html__( "Line Height", 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => '',
			]
		);

		$this->add_control(
			'custom_sub_font_style',
			[
				'label'   => esc_html__( 'Font Style', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					''        => esc_html__( 'Choose...', 'coaching' ),
					'italic'  => esc_html__( 'Italic', 'coaching' ),
					'oblique' => esc_html__( 'Oblique', 'coaching' ),
					'initial' => esc_html__( 'Initial', 'coaching' ),
					'inherit' => esc_html__( 'Inherit', 'coaching' ),
					'normal'  => esc_html__( 'Normal', 'coaching' ),
				],
				'default' => '',
			]
		);

		$this->end_controls_section();


	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'title'                   => $settings['title'],
			'size'                    => $settings['size'],
			'textcolor'               => $settings['textcolor'],
			'font_heading'            => $settings['font_heading'],
			'custom_font_heading'     => array(
				'custom_font_size'   => $settings['custom_font_size'],
				'custom_font_weight' => $settings['custom_font_weight'],
				'custom_line_height' => $settings['custom_line_height'],
				'custom_font_style'  => $settings['custom_font_style'],
				'custom_style'       => $settings['custom_style'],
			),
			'sub_heading'             => $settings['sub_heading'],
			'sub_heading_color'       => $settings['sub_heading_color'],
			'font_sub_heading'        => $settings['font_sub_heading'],
			'custom_font_sub_heading' => array(
				'custom_sub_font_size'   => $settings['custom_sub_font_size'],
				'custom_sub_font_weight' => $settings['custom_sub_font_weight'],
				'custom_sub_line_height' => $settings['custom_sub_line_height'],
				'custom_sub_font_style'  => $settings['custom_sub_font_style'],
			),
			'type'                    => $settings['type'],
			'line'                    => $settings['line'],
			'text_align'              => $settings['text_align'],
			'bg_line'                 => $settings['bg_line'],
			'content'                 => $settings['content'],
			'css_animation'           => $settings['css_animation'],

		);

		thim_get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Heading_El() );