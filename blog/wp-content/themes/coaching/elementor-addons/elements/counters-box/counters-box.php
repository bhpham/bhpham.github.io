<?php
namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Counters_Box_El extends Widget_Base {

	public function get_name() {
		return 'thim-counters-box';
	}

	public function get_title() {
		return esc_html__( 'Thim: Counters Box', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-counters-box';
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
				'label' => esc_html__( 'Counters Box', 'coaching' )
			]
		);

		$this->add_control(
			'counters_label',
			[
				'label'       => esc_html__( 'Counters Label', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'counters_value',
			[
				'label'   => esc_html__( 'Counters Value', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 20,
				'min'     => 1,
				'step'    => 1
			]
		);

		$this->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Select Icon:', 'coaching' ),
				'type'        => Controls_Manager::ICON,
				'placeholder' => esc_html__( 'Choose...', 'coaching' )
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Counter Style', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"home-page"     => esc_html__( "Home Page", 'coaching' ),
					"about-us"      => esc_html__( "Page About Us", 'coaching' ),
					"home-effective"   => esc_html__( "Home Effective", 'coaching' ),
					"home-5"         => esc_html__( "Home 5 Style", 'coaching' ),
				],
				'default' => 'home-page'
			]
		);

        $this->add_control(
            'css_animation',
            [
                'label'   => esc_html__( 'CSS Animation', 'coaching' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    ""              => esc_html__( "No", 'coaching' ),
                    "top-to-bottom" => esc_html__( "Top to bottom", 'coaching' ),
                    "bottom-to-top" => esc_html__( "Bottom to top", 'coaching' ),
                    "left-to-right" => esc_html__( "Left to right", 'coaching' ),
                    "right-to-left" => esc_html__( "Right to left", 'coaching' ),
                    "appear"        => esc_html__( "Appear from center", 'coaching' )
                ],
            ]
        );

        $this->end_controls_section();

		$this->start_controls_section(
			'style-tab',
			[
				'label' => esc_html__( 'Style', 'coaching' ),
				'tab'   => Controls_Manager::TAB_STYLE
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => esc_html__( 'Border Color Icon', 'coaching' ),
				'type'  => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'counter_color',
			[
				'label' => esc_html__( 'Counters Icon Color', 'coaching' ),
				'type'  => Controls_Manager::COLOR,
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'counters_label'   => $settings['counters_label'],
			'counters_value'   => $settings['counters_value'],
			'icon'             => str_replace("fa fa-", "", $settings['icon']),
			'style'            => $settings['style'],
			'border_color'     => $settings['border_color'],
			'counter_color'    => $settings['counter_color'],
			'css_animation'    => $settings['css_animation'],
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

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Counters_Box_El() );