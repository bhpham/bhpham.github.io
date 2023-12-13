<?php

class Thim_Single_Images_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'single-images',
			esc_html__( 'Thim: Single Image', 'coaching' ),
			array(
				'description'   => esc_html__( 'Add heading text', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'image' => array(
					'type'        => 'media',
					'label'       => esc_html__( 'Image', 'coaching' ),
					'description' => esc_html__( 'Select image from media library.', 'coaching' )
				),

				'image_size'      => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Image size', 'coaching' ),
					'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full" or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height). Leave empty to use "thumbnail" size.', 'coaching' )
				),
				'image_link'      => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Image Link', 'coaching' ),
					'description' => esc_html__( 'Enter URL if you want this image to have a link.', 'coaching' )
				),
				'link_target'     => array(
					"type"    => "select",
					"label"   => esc_html__( "Link Target", 'coaching' ),
					"options" => array(
						"_self"  => esc_html__( "Same window", 'coaching' ),
						"_blank" => esc_html__( "New window", 'coaching' ),
					),
				),
				'image_alignment' => array(
					"type"        => "select",
					"label"       => esc_html__( "Image alignment", 'coaching' ),
					"description" => esc_html__("Select image alignment.", 'coaching'),
					"options"     => array(
						"left"   => esc_html__( "Align Left", 'coaching' ),
						"right"  => esc_html__( "Align Right", 'coaching' ),
						"center" => esc_html__( "Align Center", 'coaching' )
					),
				),

				'css_animation' => array(
					"type"    => "select",
					"label"   => esc_html__( "CSS Animation", 'coaching' ),
					"options" => array(
						""              => esc_html__( "No", 'coaching' ),
						"top-to-bottom" => esc_html__( "Top to bottom", 'coaching' ),
						"bottom-to-top" => esc_html__( "Bottom to top", 'coaching' ),
						"left-to-right" => esc_html__( "Left to right", 'coaching' ),
						"right-to-left" => esc_html__( "Right to left", 'coaching' ),
						"appear"        => esc_html__( "Appear from center", 'coaching' )
					),
				),
			),
			THIM_DIR . 'inc/widgets/single-images/'
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

function thim_single_images_register_widget() {
	register_widget( 'Thim_Single_Images_Widget' );
}

add_action( 'widgets_init', 'thim_single_images_register_widget' );