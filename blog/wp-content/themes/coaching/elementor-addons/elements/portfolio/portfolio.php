<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Portfolio_El extends Widget_Base {

	public function get_name() {
		return 'thim-portfolio';
	}

	public function get_title() {
		return esc_html__( 'Thim: Portfolio', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-portfolio';
	}

	public function get_categories() {
		return [ 'thim-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}


	protected function _register_controls() {
		wp_enqueue_script( 'thim-portfolio-appear', THIM_URI . 'assets/js/jquery.appear.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'thim-portfolio-widget', THIM_URI . 'assets/js/portfolio.js', array(
			'jquery'
		), '', true );
		$this->start_controls_section(
			'content',
			[
				'label' => esc_html__( 'Portfolio', 'coaching' )
			]
		);

		$this->add_control(
			'portfolio_category',
			[
				'label'   => esc_html__( 'Select Category', 'coaching' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => thim_get_cat_taxonomy( 'portfolio_category', array( 'all' => esc_html__( 'All', 'coaching' ) )  ),
				'default' => 0
			]
		);

		$this->add_control(
			'filter_hiden',
			[
				'label'   => esc_html__( 'Draggable', 'coaching' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => ''
			]
		);

		$this->add_control(
			'filter_position',
			[
				'label'   => esc_html__( 'Filter Position', 'coaching' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left'   => [
						'title' => esc_html__( 'Left', 'coaching' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'coaching' ),
						'icon'  => 'fa fa-align-center',
					],
					'right'  => [
						'title' => esc_html__( 'Right', 'coaching' ),
						'icon'  => 'fa fa-align-right',
					]
				],
				'default' => 'center',
			]
		);

		$this->add_control(
			'column',
			[
				'label'   => esc_html__( 'Column', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'one'   => esc_html__( '1', 'coaching' ),
					'two'   => esc_html__( '2', 'coaching' ),
					'three' => esc_html__( '3', 'coaching' ),
					'four'  => esc_html__( '4', 'coaching' ),
					'five'  => esc_html__( '5', 'coaching' )
				],
				'default' => 'three'
			]
		);

		$this->add_control(
			'gutter',
			[
				'label'   => esc_html__( 'Gutter', 'coaching' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => ''
			]
		);

		$this->add_control(
			'item_size',
			[
				'label'   => esc_html__( 'Item Size', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'multigrid' => esc_html__( 'Multigrid', 'coaching' ),
					'masonry'   => esc_html__( 'Masonry', 'coaching' ),
					'same'      => esc_html__( 'Same size', 'coaching' )
				],
				'default' => 'masonry'
			]
		);

		$this->add_control(
			'paging',
			[
				'label'   => esc_html__( 'Paging', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'all'             => esc_html__( 'Show All', 'coaching' ),
					'limit'           => esc_html__( 'Limit Items', 'coaching' ),
					'paging'          => esc_html__( 'Paging', 'coaching' ),
					'infinite_scroll' => esc_html__( 'Infinite Scroll', 'coaching' )
				],
				'default' => 'all'
			]
		);

		$this->add_control(
			'style-item',
			[
				'label'   => esc_html__( 'Item Style', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'style01' => esc_html__( 'Caption Hover Effects 01', 'coaching' ),
					'style02' => esc_html__( 'Caption Hover Effects 02', 'coaching' ),
					'style03' => esc_html__( 'Caption Hover Effects 03', 'coaching' ),
					'style04' => esc_html__( 'Caption Hover Effects 04', 'coaching' ),
					'style05' => esc_html__( 'Caption Hover Effects 05', 'coaching' ),
					'style06' => esc_html__( 'Caption Hover Effects 06', 'coaching' ),
					'style07' => esc_html__( 'Caption Hover Effects 07', 'coaching' ),
					'style08' => esc_html__( 'Caption Hover Effects 08', 'coaching' )
				],
				'default' => 'style01'
			]
		);

		$this->add_control(
			'num_per_view',
			[
				'label'       => esc_html__( 'Enter a number view', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true
			]
		);

		$this->add_control(
			'show_readmore',
			[
				'label'   => esc_html__( 'Show Read More?', 'coaching' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => ''
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'portfolio_category' => $settings['portfolio_category'],
			'filter_position'    => $settings['filter_position'],
			'column'             => $settings['column'],
			'gutter'             => $settings['gutter'],
			'item_size'          => $settings['item_size'],
			'paging'             => $settings['paging'],
			'style-item'         => $settings['style-item'],
			'num_per_view'       => $settings['num_per_view'],
			'filter_hiden'       => $settings['filter_hiden'],
			'show_readmore'       => $settings['show_readmore'],
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		) );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Portfolio_El() );
