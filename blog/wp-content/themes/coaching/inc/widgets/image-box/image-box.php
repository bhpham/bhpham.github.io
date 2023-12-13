<?php

class Thim_Image_Box_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'image-box',
			esc_html__( 'Thim: Image Box', 'coaching' ),
			array(
				'description'   => esc_html__( 'Add Image box', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
			),
			array(),


			array(
                'layout'      => array(
                    "type"    => "select",
                    "label"   => esc_html__( "Layout", 'coaching' ),
                    "options" => array(
                        "default" 	=> esc_html__( "Default", 'coaching' ),
                        "slider" 	=> esc_html__( "Slider", 'coaching' ),
                    ),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args'     => array( 'layout' )
                    )
                ),

                'box' => array(
                    'type' => 'repeater',
                    'label' => esc_html__('Box list', 'coaching'),
                    'item_name' => esc_html__('Image box', 'coaching'),

                    'fields' => array(
                        'box_title' => array(
                            'type' => 'text',
                            'label' => esc_html__('Box Title', 'coaching'),
                            'allow_html_formatting' => true,
                        ),

                        'box_image'     =>  array(
                            'type'        =>  'media',
                            'label'       =>  esc_html__( 'Image Of Box', 'coaching' ),
                            'description' =>  esc_html__( 'Select image from media library.', 'coaching' ),
                        ),
                        'box_link'                   => array(
                            "type"        => "text",
                            "label"       => esc_html__( "Add Link", 'coaching' ),
                            "description" => esc_html__( "Provide the link that will be applied to this icon box.", 'coaching' ),
                        ),
                    ),
                    'state_handler' => array(
                        'layout[default]' => array( 'hide' ),
                        'layout[slider]' => array( 'show' ),
                    ),
                ),

				'title'                   =>  array(
					'type'                =>  'text',
					'label'               =>  esc_html__( 'Title', 'coaching' ),
					'default'             =>  '',
                    'allow_html_formatting' => true,
                    'state_handler' => array(
                        'layout[default]' => array( 'show' ),
                        'layout[slider]' => array( 'hide' ),
                    ),
				),
                'subtitle'                   =>  array(
                    'type'                =>  'text',
                    'label'               =>  esc_html__( 'Sub Title', 'coaching' ),
                    'default'             =>  '',
                    'allow_html_formatting' => true,
                    'state_handler' => array(
                        'style[default]' => array( 'show' ),
                        'style[style-1]' => array( 'hide' ),
                        'layout[default]' => array( 'hide' ),
                        'layout[slider]' => array( 'hide' ),
                    ),

                ),
				'image_box'     =>  array(
					'type'        =>  'media',
					'label'       =>  esc_html__( 'Image Of Box', 'coaching' ),
					'description' =>  esc_html__( 'Select image from media library.', 'coaching' ),
                    'state_handler' => array(
                        'layout[default]' => array( 'show' ),
                        'layout[slider]' => array( 'hide' ),
                    ),
				),
                'link'                   => array(
                    "type"        => "text",
                    "label"       => esc_html__( "Add Link", 'coaching' ),
                    "description" => esc_html__( "Provide the link that will be applied to this icon box.", 'coaching' ),
                    'state_handler' => array(
                        'layout[default]' => array( 'show' ),
                        'layout[slider]' => array( 'hide' ),
                    ),
                ),
                'style'      => array(
                    "type"    => "select",
                    "label"   => esc_html__( "Style", 'coaching' ),
                    "options" => array(
                        "default" 	=> esc_html__( "Default", 'coaching' ),
                        "style-1" 	=> esc_html__( "Style 1", 'coaching' ),
                    ),
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args'     => array( 'style' )
                    ),
                    'state_handler' => array(
                        'layout[default]' => array( 'show' ),
                        'layout[slider]' => array( 'hide' ),
                    ),
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

function thim_image_box_register_widget() {
	register_widget( 'Thim_Image_Box_Widget' );
}

add_action( 'widgets_init', 'thim_image_box_register_widget' );