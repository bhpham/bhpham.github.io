<?php

namespace Elementor;

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Testimonials_El extends Widget_Base {

	public function get_name() {
		return 'thim-testimonials';
	}

	public function get_title() {
		return esc_html__( 'Thim: Testimonials', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-testimonials';
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
				'label' => __( 'Testimonials', 'coaching' )
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Heading Text', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => false
			]
		);

		$this->add_control(
			'layout',
			[
				'label'   => esc_html__( 'Layout', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'base'            => esc_html__( 'Default', 'coaching' ),
					'layout_1'        => esc_html__( 'Testimonial Layout 1', 'coaching' ),
					'layout_2'        => esc_html__( 'Testimonial Layout 2', 'coaching' ),
					'layout_3'        => esc_html__( 'Testimonial Layout 3', 'coaching' ),
					'layout_business' => esc_html__( 'Layout Business', 'coaching' ),
					'before_after'    => esc_html__( 'Before After Image', 'coaching' ),
					'layout_home5'    => esc_html__( 'Layout Home 5', 'coaching' ),
				],
				'default' => 'base'
			]
		);

		$this->add_control(
			'limit',
			[
				'label'   => esc_html__( 'Limit Posts', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 7,
				'min'     => 1,
				'step'    => 1
			]
		);

		$this->add_control(
			'item_visible',
			[
				'label'   => esc_html__( 'Item Visible', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5,
				'min'     => 1,
				'step'    => 1
			]
		);

		$this->add_control(
			'timeout',
			[
				'label'   => esc_html__( 'Timeout', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 6000,
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'   => esc_html__( 'Auto play?', 'coaching' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => false,
			]
		);

		$this->add_control(
			'full_description',
			[
				'label' => esc_html__( 'Show Full Description', 'coaching' ),
				'type'  => Controls_Manager::SWITCHER,
			]
		);


		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'title'            => $settings['title'],
			'layout'           => $settings['layout'],
			'limit'            => $settings['limit'],
			'item_visible'     => $settings['item_visible'],
			'full_description' => $settings['full_description'],
			'autoplay'         => $settings['autoplay'],
			'timeout'          => $settings['timeout'],
		);

		$args                 = array();
		$args['before_title'] = '<h3 class="widget-title">';
		$args['after_title']  = '</h3>';

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance,
			'args'     => $args
		), $settings['layout'] );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Testimonials_El() );