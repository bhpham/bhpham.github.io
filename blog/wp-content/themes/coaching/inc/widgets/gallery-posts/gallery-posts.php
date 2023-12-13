<?php

class Thim_Gallery_Post_Widget extends Thim_Widget {
	function __construct() {

		parent::__construct(
			'gallery-posts',
			esc_attr__( 'Thim: Gallery Posts ', 'coaching' ),
			array(
				'description'   => esc_attr__( 'Display gallery posts', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
			),
			array(),
			array(
				'cat'     => array(
					'type'    => 'select',
					'label'   => esc_attr__( 'Select Category', 'coaching' ),
//					'options' => $cate
					'options' => thim_get_cat_taxonomy( 'category', array( 'all' => esc_html__( 'All', 'coaching' ) )  ),
				),
				'columns' => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Columns', 'coaching' ),
					'options' => array(
						'2' => '2',
						'3' => '3',
						'4' => '4',
						'5' => '5',
						'6' => '6',
					),
					'default' => '4'
				),
				'filter'  => array(
					'type'    => 'checkbox',
					'label'   => esc_html__( 'Show Filter', 'coaching' ),
					'default' => true,
				),
                'limit'    => array(
                    'type'    => 'number',
                    'label'   => esc_html__( 'Limit', 'coaching' ),
                    'default' => '8'
                ),
			)
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

}

function thim_gallery_posts_widget() {
	register_widget( 'Thim_Gallery_Post_Widget' );
}

add_action( 'widgets_init', 'thim_gallery_posts_widget' );