<?php

class Thim_Our_Team_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'our-team',
			esc_html__( 'Thim: Our Team', 'coaching' ),
			array(
				'description'   => '',
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'cat_id'        => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Select Category', 'coaching' ),
					'default' => 'all',
					'options' => thim_get_cat_taxonomy( 'our_team_category', array( 'all' => esc_html__( 'All', 'coaching' ) )  ),
 				),
				'layout'        => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Layout', 'coaching' ),
					'options' => array(
						'base'     => esc_html__( 'Default', 'coaching' ),
						'layout-business' => esc_html__( 'Layout Business', 'coaching' ),
					),
					'default' => 'base'
				),
				'number_post'   => array(
					'type'    => 'number',
					'label'   => esc_html__( 'Number Posts', 'coaching' ),
					'default' => '5'
				),
				'text_link'     => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Text Link', 'coaching' ),
					'description' => esc_html__( 'Provide the text link that will be applied to box our team.', 'coaching' )
				),
				'link'          => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Link Join Team', 'coaching' ),
					'description' => esc_html__( 'Provide the link that will be applied to box our team', 'coaching' )
				),
				'link_member' => array(
						'type'    => 'checkbox',
						'label'   => esc_html__( 'Enable Link To Member', 'coaching' ),
						'default' => false
				),
				'columns'       => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Column', 'coaching' ),
					'options' => array(
						'2' => esc_html__( '2', 'coaching' ),
						'3' => esc_html__( '3', 'coaching' ),
						'4' => esc_html__( '4', 'coaching' )
					),
				),
				'css_animation' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'CSS Animation', 'coaching' ),
					'options' => array(
						''              => esc_html__( 'No', 'coaching' ),
						'top-to-bottom' => esc_html__( 'Top to bottom', 'coaching' ),
						'bottom-to-top' => esc_html__( 'Bottom to top', 'coaching' ),
						'left-to-right' => esc_html__( 'Left to right', 'coaching' ),
						'right-to-left' => esc_html__( 'Right to left', 'coaching' ),
						'appear'        => esc_html__( 'Appear from center', 'coaching' )
					),
				)

			),
			THIM_DIR . 'inc/widgets/our-team/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */

	// Get list category
	function thim_get_team_categories() {
		global $wpdb;
		$query = $wpdb->get_results( $wpdb->prepare(
			"
				  SELECT      t1.term_id, t2.name
				  FROM        $wpdb->term_taxonomy AS t1
				  INNER JOIN $wpdb->terms AS t2 ON t1.term_id = t2.term_id
				  WHERE t1.taxonomy = %s
				  AND t1.count > %d
				  ",
			'our_team_category', 0
		) );

		$cats        = array();
		$cats['all'] = 'All';
		if ( ! empty( $query ) ) {
			foreach ( $query as $key => $value ) {
				$cats[ $value->term_id ] = $value->name;
			}
		}

		return $cats;
	}

	function get_template_name( $instance ) {
		if ( isset( $instance['layout'] ) ) {
			return $instance['layout'];
		} else {
			return 'base';
		}
	}

	function get_style_name( $instance ) {
		return false;
	}
}

function thim_our_team_register_widget() {
	register_widget( 'Thim_Our_Team_Widget' );
}

add_action( 'widgets_init', 'thim_our_team_register_widget' );