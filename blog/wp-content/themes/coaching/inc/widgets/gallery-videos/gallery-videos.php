<?php

class Thim_Gallery_Video_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'gallery-videos',
			esc_attr__( 'Thim: Gallery Videos ', 'coaching' ),
			array(
				'description'   => esc_attr__( 'Display gallery posts', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
			),
			array(),
			array(
				'cad_id'       => array(
					'type'    => 'select',
					'label'   => esc_attr( 'Select Category', 'coaching' ),
					'default' => 'none',
					'options' => thim_get_cat_taxonomy( 'category', array( 'all' => esc_html__( 'All', 'coaching' ) ) ),
				),
				'orderby'      => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Order By', 'coaching' ),
					'options' => array(
						'popular' => esc_html__( 'Popular', 'coaching' ),
						'recent'  => esc_html__( 'Recent', 'coaching' ),
						'title'   => esc_html__( 'Title', 'coaching' ),
						'random'  => esc_html__( 'Random', 'coaching' ),
					),
				),
				'link'         => array(
					'type'  => 'text',
					'label' => esc_html__( 'Link All', 'coaching' ),
					'lable' => esc_html__( 'Link All Video', 'coaching' )
				),
				'text_link'    => array(
					'type'  => 'text',
					'label' => esc_html__( 'Text Of Link', 'coaching' ),
					'lable' => esc_html__( 'Text Of Link All Video', 'coaching' )
				),
				'number_posts' => array(
					'type'    => 'number',
					'label'   => esc_html__( 'Number Posts', 'coaching' ),
					'default' => '3'
				),
				'style'        => array(
					"type"    => "select",
					"label"   => esc_html__( "Videos Style", 'coaching' ),
					"options" => array(
						""       => esc_html__( "Normal", 'coaching' ),
						"slider" => esc_html__( "Slider", 'coaching' ),
					),
					'default' => ''
				),
			)
		);
	}

	/**
	 * Initialize the CTA widget
	 */

	function get_template_name( $instance ) {
		if ( isset( $instance['style'] ) && $instance['style'] != '' ) {
			return $instance['style'];
		} else {
			return 'base';
		}
	}

	function get_style_name( $instance ) {
		return false;
	}


}

function thim_gallery_videos_widget() {
	register_widget( 'Thim_Gallery_Video_Widget' );
}

add_action( 'widgets_init', 'thim_gallery_videos_widget' );