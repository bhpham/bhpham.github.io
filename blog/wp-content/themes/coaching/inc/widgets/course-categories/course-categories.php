<?php

/**
 * Class Course_Categories_Widget
 *
 * Widget Name: Course Categories
 *
 * Author: Ken
 */
class Thim_Course_Categories_Widget extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'course-categories',
			esc_html__( 'Thim: Course Categories', 'coaching' ),
			array(
				'description' => esc_html__( 'Show course categories', 'coaching' ),
				'help'        => '',
				'panels_groups' => array( 'thim_widget_group' ),
			),
			array(),
			array(
				'title'        => array(
					'type'  => 'text',
					'label' => esc_html__( 'Title', 'coaching' ),
				),
				'layout'           => array(
					'type'          => 'select',
					'label'         => esc_html__( 'Layout', 'coaching' ),
					'options'       => array(
						'slider' 	=> esc_html__( 'Slider', 'coaching' ),
						'list' 		=> esc_html__( 'List Categories', 'coaching' ),
					),
					'default'       => 'list',
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'layout_type' )
					),
				),
				'slider-options'   => array(
					'type'          => 'section',
					'label'         => esc_html__( 'Slider Layout Options', 'coaching' ),
					'hide'          => true,
					"class"         => "clear-both",
					'state_handler' => array(
						'layout_type[slider]' => array( 'show' ),
						'layout_type[list]' => array( 'hide' ),
					),
					'fields'        => array(
						'limit'            => array(
							'type'    => 'number',
							'label'   => esc_html__( 'Limit categories', 'coaching' ),
							'default' => '15'
						),
						'show_pagination'   => array(
							'type'          => 'checkbox',
							'label'         => esc_html__( 'Show Pagination', 'coaching' ),
							'default'       => false
						),
						'show_navigation' => array(
							'type'          => 'checkbox',
							'label'         => esc_html__( 'Show Navigation', 'coaching' ),
							'default'       => true
						),
						'item_visible'          => array(
							'type'          => 'select',
							'label'         => esc_html__( 'Items Visible', 'coaching' ),
							'options'       => array(
								'1' => '1',
								'2' => '2',
								'3' => '3',
								'4' => '4',
								'5' => '5',
								'6' => '6',
								'7' => '7',
								'8' => '8',
							),
							'default'	=> '7'
						),
					),
					
				),
				
				'list-options'   => array(
					'type'          => 'section',
					'label'         => esc_html__( 'List Layout Options', 'coaching' ),
					'hide'          => true,
					"class"         => "clear-both",
					'state_handler' => array(
						'layout_type[list]' => array( 'show' ),
						'layout_type[slider]' => array( 'hide' ),
					),
					'fields'        => array(
						'show_counts'  => array(
							'type'    => 'checkbox',
							'label'   => esc_html__( 'Show course counts', 'coaching' ),
							'default' => false,
						),
						'hierarchical' => array(
							'type'    => 'checkbox',
							'label'   => esc_html__( 'Show hierarchy', 'coaching' ),
							'default' => false,
						),
					),
					
				),
			)
		);
	}

	function get_template_name( $instance ) {
		if($instance['layout'] && 'slider' == $instance['layout']){
			$layout = 'slider';
		}else{
			$layout = 'base';
		}
		if ( thim_is_new_learnpress( '2.0' ) ) {
			$layout .= '-v2';
		}
		
		return $layout;
	}

	function get_style_name( $instance ) {
		return false;
	}
}

/**
 * Register widget
 */
function thim_course_categories_register_widget() {
	register_widget( 'Thim_Course_Categories_Widget' );
}

add_action( 'widgets_init', 'thim_course_categories_register_widget' );
