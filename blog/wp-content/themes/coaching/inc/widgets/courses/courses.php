<?php

/**
 * Class Courses_Widget
 *
 * Widget Name: Courses
 *
 * Author: Ken
 */
class Thim_Courses_Widget extends Thim_Widget {
	function __construct() {

		parent::__construct(
			'courses',
			esc_html__( 'Thim: Courses', 'coaching' ),
			array(
				'description'   => esc_html__( 'Display courses', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'title' => array(
					'type'                  => 'text',
					'label'                 => esc_html__( 'Heading Text', 'coaching' ),
					'default'               => esc_html__( 'Latest Courses', 'coaching' ),
					'allow_html_formatting' => true
				),

				'order'  => array(
					'type'          => 'select',
					'label'         => esc_html__( 'Order By', 'coaching' ),
					'options'       => array(
						'popular'  => esc_html__( 'Popular', 'coaching' ),
						'latest'   => esc_html__( 'Latest', 'coaching' ),
						'category' => esc_html__( 'Category', 'coaching' )
					),
					'default'       => 'latest',
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'order' )
					),
				),
				'cat_id' => array(
					'type'          => 'select',
					'label'         => esc_html__( 'Select Category', 'coaching' ),
					'default'       => 'all',
					'hide'          => true,
					'options'       => $this->thim_get_course_categories(),
					'state_handler' => array(
						'order[category]' => array( 'show' ),
						'order[popular]'  => array( 'hide' ),
						'order[latest]'   => array( 'hide' ),
					),
				),


				'layout' => array(
					'type'          => 'select',
					'label'         => esc_html__( 'Widget Layout', 'coaching' ),
					'options'       => array(
						'slider'         => esc_html__( 'Slider', 'coaching' ),
						'grid'           => esc_html__( 'Grid', 'coaching' ),
						'list-sidebar'   => esc_html__( 'List Sidebar', 'coaching' ),
						'megamenu'       => esc_html__( 'Mega Menu', 'coaching' ),
						'grid-bussiness' => esc_html__( 'Grid Bussiness', 'coaching' ),
						'grid-effective' => esc_html__( 'Grid Effective', 'coaching' ),
						'grid-gym'       => esc_html__( 'Grid Gym', 'coaching' ),
						'grid-therapist' => esc_html__( 'Grid Therapist', 'coaching' ),
						'grid-home5'     => esc_html__( 'Grid Home 5', 'coaching' ),
					),
					'default'       => 'slider',
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'layout_type' )
					),
				),

				'thumbnail_width'   => array(
					'type'          => 'slider',
					'label'         => esc_html__( 'Thumbnail Width', 'coaching' ),
					'default'       => 400,
					'min'           => 100,
					'max'           => 800,
					'integer'       => true,
					'state_handler' => array(
						'layout_type[slider]'         => array( 'show' ),
						'layout_type[grid]'           => array( 'show' ),
						'layout_type[grid-bussiness]' => array( 'show' ),
						'layout_type[grid-effective]' => array( 'show' ),
						'layout_type[grid-home5]'     => array( 'show' ),
						'layout_type[list-sidebar]'   => array( 'hide' ),
					),
				),
				'thumbnail_height'  => array(
					'type'          => 'slider',
					'label'         => esc_html__( 'Thumbnail Height', 'coaching' ),
					'default'       => 300,
					'min'           => 100,
					'max'           => 800,
					'integer'       => true,
					'state_handler' => array(
						'layout_type[slider]'         => array( 'show' ),
						'layout_type[grid]'           => array( 'show' ),
						'layout_type[grid-bussiness]' => array( 'show' ),
						'layout_type[grid-effective]' => array( 'show' ),
						'layout_type[grid-home5]'     => array( 'show' ),
						'layout_type[list-sidebar]'   => array( 'hide' ),
					),
				),
				'limit'             => array(
					'type'    => 'number',
					'label'   => esc_html__( 'Limit number course', 'coaching' ),
					'default' => '8'
				),
				'view_all_courses'  => array(
					'type'          => 'text',
					'label'         => esc_html__( 'Text View All Courses', 'coaching' ),
					'default'       => '',
					'hide'          => true,
					'state_handler' => array(
						'layout_type[slider]'         => array( 'show' ),
						'layout_type[slider-v2]'      => array( 'show' ),
						'layout_type[grid]'           => array( 'show' ),
						'layout_type[grid-bussiness]' => array( 'show' ),
						'layout_type[grid-effective]' => array( 'show' ),
						'layout_type[grid-home5]'     => array( 'show' ),
						'layout_type[list-sidebar]'   => array( 'hide' ),
					),
				),
				'view_all_position' => array(
					'type'          => 'select',
					'label'         => esc_html__( 'View All Position', 'coaching' ),
					'options'       => array(
						'top'    => esc_html__( 'Top', 'coaching' ),
						'bottom' => esc_html__( 'Bottom', 'coaching' ),
					),
					'default'       => 'top',
					'hide'          => true,
					'state_handler' => array(
						'layout_type[slider]'         => array( 'show' ),
						'layout_type[slider-v2]'      => array( 'show' ),
						'layout_type[grid]'           => array( 'show' ),
						'layout_type[grid-bussiness]' => array( 'show' ),
						'layout_type[grid-effective]' => array( 'show' ),
						'layout_type[grid-home5]'     => array( 'show' ),
						'layout_type[list-sidebar]'   => array( 'hide' ),
					),
				),
				'slider-options'    => array(
					'type'          => 'section',
					'label'         => esc_html__( 'Slider Layout Options', 'coaching' ),
					'hide'          => true,
					"class"         => "clear-both",
					'state_handler' => array(
						'layout_type[slider]'         => array( 'show' ),
						'layout_type[grid]'           => array( 'hide' ),
						'layout_type[grid-gym]'       => array( 'hide' ),
						'layout_type[grid-therapist]' => array( 'hide' ),
						'layout_type[grid-bussiness]' => array( 'hide' ),
						'layout_type[grid-effective]' => array( 'hide' ),
						'layout_type[grid-home5]'     => array( 'hide' ),
						'layout_type[list-sidebar]'   => array( 'hide' ),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'courses_slider_opt' )
					),
					'fields'        => array(
						'show_pagination' => array(
							'type'    => 'checkbox',
							'label'   => esc_html__( 'Show Pagination', 'coaching' ),
							'default' => false
						),
						'show_navigation' => array(
							'type'    => 'checkbox',
							'label'   => esc_html__( 'Show Navigation', 'coaching' ),
							'default' => true
						),
						'item_visible'    => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Items Visible', 'coaching' ),
							'options' => array(
								'1' => '1',
								'2' => '2',
								'3' => '3',
								'4' => '4',
								'5' => '5',
								'6' => '6',
							),
							'default' => '4'
						),
					),

				),

				'grid-options' => array(
					'type'          => 'section',
					'label'         => esc_html__( 'Grid Layout Options', 'coaching' ),
					'hide'          => true,
					"class"         => "clear-both",
					'state_handler' => array(
						'layout_type[slider]'         => array( 'hide' ),
						'layout_type[grid]'           => array( 'show' ),
						'layout_type[grid-bussiness]' => array( 'show' ),
						'layout_type[grid-effective]' => array( 'show' ),
						'layout_type[grid-home5]'     => array( 'show' ),
						'layout_type[list-sidebar]'   => array( 'hide' ),
						'layout_type[megamenu]'       => array( 'hide' ),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'courses_grid_opt' )
					),
					'fields'        => array(
						'columns' => array(
							'type'    => 'select',
							'label'   => esc_html__( 'Columns', 'coaching' ),
							'options' => array(
								'1' => '1',
								'2' => '2',
								'3' => '3',
								'4' => '4',
								'5' => '5',
								'6' => '6',
							),
							'default' => '4'
						),

					),

				),


			)
		);
	}

	function get_template_name( $instance ) {
		if ( $instance['layout'] && '' != $instance['layout'] ) {
			$layout = $instance['layout'];
		}

		return $layout;
	}

	function get_style_name( $instance ) {
		return false;
	}

	// Get list category
	function thim_get_course_categories() {
		$cats        = array();
		if ( is_admin() ) {
			global $wpdb;
			$query = $wpdb->get_results( $wpdb->prepare(
				"
				  SELECT      t1.term_id, t2.name
				  FROM        $wpdb->term_taxonomy AS t1
				  INNER JOIN $wpdb->terms AS t2 ON t1.term_id = t2.term_id
				  WHERE t1.taxonomy = %s
				  AND t1.count > %d
				  ",
				'course_category', 0
			) );
			$cats['all'] = 'All';
			if ( ! empty( $query ) ) {
				foreach ( $query as $key => $value ) {
					$cats[ $value->term_id ] = $value->name;
				}
			}
		}
		return $cats;
	}

}

function thim_courses_register_widget() {
	register_widget( 'Thim_Courses_Widget' );
}

add_action( 'widgets_init', 'thim_courses_register_widget' );