<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_List_Event_El extends Widget_Base {

	public function get_name() {
		return 'thim-list-event';
	}

	public function get_title() {
		return esc_html__( 'Thim: List Events', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-list-event';
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
				'label' => esc_html__( 'List Events', 'coaching' )
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Heading', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' )
			]
		);

		$this->add_control(
			'layout',
			[
				'label'   => esc_html__( 'Layout', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'base'             => esc_html__( 'Default', 'coaching' ),
					'layout-business'  => esc_html__( 'Layout Business', 'coaching' ),
					'layout-2'         => esc_html__( 'Layout 2', 'coaching' ),
					'layout-effective' => esc_html__( 'Layout Effective', 'coaching' ),
				],
				'default' => 'base'
			]
		);

		$this->add_control(
			'cat_id',
			[
				'label'   => esc_html__( 'Select Category', 'coaching' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => thim_get_cat_taxonomy( 'tp_event_category', array( esc_html__( 'All', 'coaching' ) => 'all' ) ),
				'default' => 'all'
			]
		);

		$this->add_control(
			'status',
			[
				'label'       => esc_html__( 'Select Status', 'coaching' ),
				'type'        => Controls_Manager::SELECT2,
				'multiple'    => true,
				'label_block' => false,
				'options'     => array(
					'upcoming'  => esc_html__( 'Upcoming', 'coaching' ),
					'happening' => esc_html__( 'Happening', 'coaching' ),
					'expired'   => esc_html__( 'Expired', 'coaching' ),
				)
			]
		);

		$this->add_control(
			'number_posts',
			[
				'label'   => esc_html__( 'Number Posts', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'step'    => 1
			]
		);

		$this->add_control(
			'feature_items',
			[
				'label'   => esc_html__( 'Feature Items', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 1,
			]
		);

		$this->add_control(
			'text_link',
			[
				'label'   => esc_html__( 'Text Link All', 'coaching' ),
				'type'    => Controls_Manager::TEXT,
				'default' => esc_html__( 'View All', 'coaching' )
			]
		);

		$this->add_control(
			'url_link',
			[
				'label'         => __( 'URL', 'coaching' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'coaching' ),
				'show_external' => true,
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
			'title'        => $settings['title'],
			'layout'       => $settings['layout'],
			'number_posts' => $settings['number_posts'],
			'text_link'    => $settings['text_link'],
			'url_link'     => $settings['url_link']['url'],
			'cat_id'       => $settings['cat_id'],
			'status'       => $settings['status'],
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

Plugin::instance()->widgets_manager->register_widget_type( new Thim_List_Event_El() );