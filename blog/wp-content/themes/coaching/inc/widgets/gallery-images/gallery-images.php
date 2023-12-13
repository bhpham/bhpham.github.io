<?php

class Thim_Gallery_Images_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'gallery-images',
			esc_html__( 'Thim: Gallery Images', 'coaching' ),
			array(
				'description'   => esc_html__( 'Add gallery image', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'image' => array(
					'type'        => 'multimedia',
					'label'       => esc_html__( 'Image', 'coaching' ),
					'description' => esc_html__( 'Select image from media library.', 'coaching' )
				),

				'image_size'      => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Image size', 'coaching' ),
					'description' => esc_html__( 'Enter image size. Example: "thumbnail", "medium", "large", "full"', 'coaching' )
				),
				'image_link'      => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Image Link', 'coaching' ),
					'description' => esc_html__( 'Enter URL if you want this image to have a link. These links are separated by comma (Ex: #,#,#,#)', 'coaching' )
				),
				'number'          => array(
					'type'    => 'number',
					'default' => '4',
					'label'   => esc_html__( 'Visible Items', 'coaching' ),
				),
				'item_tablet'          => array(
					'type'    => 'number',
					'default' => '2',
					'label'   => esc_html__( 'Tablet Items', 'coaching' ),
				),
				'item_mobile'          => array(
					'type'    => 'number',
					'default' => '1',
					'label'   => esc_html__( 'Mobile Items', 'coaching' ),
				),
				'show_pagination' => array(
					'type'    => 'radio',
					'label'   => esc_html__( 'Show Pagination', 'coaching' ),
					'default' => 'no',
					'options' => array(
						'no'  => esc_html__( 'No', 'coaching' ),
						'yes' => esc_html__( 'Yes', 'coaching' ),
					)
				),
				'link_target'     => array(
					"type"    => "select",
					"label"   => esc_html__( "Link Target", 'coaching' ),
					"options" => array(
						"_self"  => esc_html__( "Same window", 'coaching' ),
						"_blank" => esc_html__( "New window", 'coaching' ),
					),
				),
				'loop' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Loop', 'coaching'),
					'default' => '',
				),
				'autoplay' => array(
					'type' => 'checkbox',
					'label' => esc_html__('Autoplay', 'coaching'),
					'default' => '',
				),

				'autoplayTimeout' => array(
                    'type'        => 'number',
                    'label'       => esc_html__( 'Auto Play Speed (in ms)', 'coaching' ),
                    'description' => esc_html__( 'Set 0 to disable auto play.', 'coaching' ),
                    'default'     => '0'
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
			THIM_DIR . 'inc/widgets/gallery-images/'
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


function thim_gallery_images_widget() {
	register_widget( 'Thim_Gallery_Images_Widget' );
}

add_action( 'widgets_init', 'thim_gallery_images_widget' );