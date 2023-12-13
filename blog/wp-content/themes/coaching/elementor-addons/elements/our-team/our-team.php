<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Our_Team_El extends Widget_Base {

	public function get_name() {
		return 'thim-our-team';
	}

	public function get_title() {
		return esc_html__( 'Thim: Our Team', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-our-team';
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
				'label' => esc_html__( 'Our Team', 'coaching' )
			]
		);

		$this->add_control(
			'layout',
			[
				'label'   => esc_html__( 'Layout', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'base'   => esc_html__( 'Default', 'coaching' ),
                    'layout-business' => esc_html__( 'Layout Business', 'coaching' ),
				],
				'default' => 'base'
			]
		);

		$this->add_control(
			'cat_id',
			[
				'label'   => esc_html__( 'Select Category', 'coaching' ),
				'type'    => Controls_Manager::SELECT2,
				'options' =>  thim_get_cat_taxonomy( 'our_team_category', array( 'all' => esc_html__( 'All', 'coaching' ) )  ),
				'default' => 'all'
			]
		);

		$this->add_control(
			'number_post',
			[
				'label'   => esc_html__( 'Number Posts', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 5,
				'min'     => 1,
				'step'    => 1
			]
		);

		$this->add_control(
			'columns',
			[
				'label'       => esc_html__( 'Columns', 'coaching' ),
				'type'        => Controls_Manager::SELECT,
				'label_block' => false,
				'options'     => [
					'1' => esc_html__( '1', 'coaching' ),
					'2' => esc_html__( '2', 'coaching' ),
					'3' => esc_html__( '3', 'coaching' ),
					'4' => esc_html__( '4', 'coaching' )
				],
				'default'     => '4'
			]
		);

		$this->add_control(
			'show_pagination',
			[
				'label'     => esc_html__( 'Show Pagination?', 'coaching' ),
				'type'      => Controls_Manager::SWITCHER,
				'default'   => 'yes',
				'condition' => array(
					'layout' => [ 'slider' ]
				)
			]
		);

		$this->add_control(
			'link_member',
			[
				'label'   => esc_html__( 'Enable Link To Member?', 'coaching' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => '',
			]
		);

		$this->add_control(
			'text_link',
			[
				'label'       => esc_html__( 'CTA Button Text', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'link',
			[
				'label'         => esc_html__( 'CTA Button Link', 'coaching' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => esc_html__( 'https://your-link.com', 'coaching' ),
				'show_external' => false,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
			]
		);


		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'cat_id'        => $settings['cat_id'],
			'layout'        => $settings['layout'],
			'number_post'   => $settings['number_post'],
			'text_link'     => $settings['text_link'],
			'link'          => $settings['link']['url'],
			'link_member'   => $settings['link_member'],
			'columns'       => $settings['columns'],
			'css_animation' => ''
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		), $settings['layout'] );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Our_Team_El() );
