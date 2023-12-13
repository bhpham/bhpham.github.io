<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( class_exists( 'THIM_Portfolio' ) ) {
	class Thim_Portfolio_Widget extends Thim_Widget {

		function __construct() {

			parent::__construct(
				'portfolio',
				esc_html__( 'Thim: Portfolio', 'coaching' ),
				array(
					'description'   => esc_html__( 'Thim Widget Portfolio By thimpress.com', 'coaching' ),
					'help'          => '',
					'panels_groups' => array( 'thim_widget_group' )
				),
				array(),
				array(
					'portfolio_category' => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Select a category', 'coaching' ),
						'default' => esc_html__( 'All', 'coaching' ),
						'options' =>  thim_get_cat_taxonomy( 'portfolio_category', array( 'all' => esc_html__( 'All', 'coaching' ) )  ),
					),
					'filter_hiden'       => array(
						'type'    => 'checkbox',
						'label'   => esc_html__( 'Hide Filters?', 'coaching' ),
						'default' => false,
					),
					'filter_position'    => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Select a filter position', 'coaching' ),
						'default' => 'center',
						'options' => array(
							'left'   => esc_html__( 'Left', 'coaching' ),
							'center' => esc_html__( 'Center', 'coaching' ),
							'right'  => esc_html__( 'Right', 'coaching' )
						)
					),
					'column'             => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Select a column', 'coaching' ),
						'default' => 'center',
						'options' => array(
							'one'   => esc_html__( 'One', 'coaching' ),
							'two'   => esc_html__( 'Two', 'coaching' ),
							'three' => esc_html__( 'Three', 'coaching' ),
							'four'  => esc_html__( 'Four', 'coaching' ),
							'five'  => esc_html__( 'Five', 'coaching' ),
						)
					),
					'gutter'             => array(
						'type'    => 'checkbox',
						'label'   => esc_html__( 'Gutter', 'coaching' ),
						'default' => false
					),
					'item_size'          => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Select a item size', 'coaching' ),
						'default' => 'center',
						'options' => array(
							'multigrid' => esc_html__( 'Multigrid', 'coaching' ),
							'masonry'   => esc_html__( 'Masonry', 'coaching' ),
							'same'      => esc_html__( 'Same size', 'coaching' ),
						)
					),
					'paging'             => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Select a paging', 'coaching' ),
						'default' => 'center',
						'options' => array(
							'all'             => esc_html__( 'Show All', 'coaching' ),
							'limit'           => esc_html__( 'Limit Items', 'coaching' ),
							'paging'          => esc_html__( 'Paging', 'coaching' ),
							'infinite_scroll' => esc_html__( 'Infinite Scroll', 'coaching' ),
						)
					),
					'style-item'         => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Select style items', 'coaching' ),
						'default' => 'style-01',
						'options' => array(
							'style01' => esc_html__( 'Caption Hover Effects 01', 'coaching' ),
							'style02' => esc_html__( 'Caption Hover Effects 02', 'coaching' ),
							'style03' => esc_html__( 'Caption Hover Effects 03', 'coaching' ),
							'style04' => esc_html__( 'Caption Hover Effects 04', 'coaching' ),
							'style05' => esc_html__( 'Caption Hover Effects 05', 'coaching' ),
							'style06' => esc_html__( 'Caption Hover Effects 06', 'coaching' ),
							'style07' => esc_html__( 'Caption Hover Effects 07', 'coaching' ),
							'style08' => esc_html__( 'Caption Hover Effects 08', 'coaching' ),
						)
					),
					'num_per_view'       => array(
						'type'  => 'text',
						'label' => esc_html__( 'Enter a number view', 'coaching' ),
					),
					'show_readmore'      => array(
						'type'    => 'checkbox',
						'label'   => esc_html__( 'Show Read More?', 'coaching' ),
						'default' => false
					)
				),
				THIM_DIR . 'inc/widgets/portfolio/'
			);
		}

		/**
		 * Initialize the CTA widget
		 */


		function get_template_name( $instance ) {
			return 'base';
		}

		function get_style_name( $instance ) {
			return false;
		}

		function enqueue_frontend_scripts() {
			wp_enqueue_script( 'thim-portfolio-appear', THIM_URI . 'assets/js/jquery.appear.js', array( 'jquery' ), '', true );
			wp_enqueue_script( 'thim-portfolio-widget', THIM_URI . 'assets/js/portfolio.js', array(
				'jquery'
			), '', true );
		}
	}

	function thim_portfolio_register_widget() {
		register_widget( 'Thim_Portfolio_Widget' );
	}

	add_action( 'widgets_init', 'thim_portfolio_register_widget' );
}