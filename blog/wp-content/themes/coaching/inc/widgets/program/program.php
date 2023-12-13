<?php

class Thim_Program_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'program',
			esc_html__( 'Thim: Program', 'coaching' ),
			array(
				'description'           => esc_html__( 'Add Program', 'coaching' ),
				'help'                  => '',
				'panels_groups'         => array( 'thim_widget_group' )
			),
			array(),
			array(
				'title'                   =>  array(
					'type'                =>  'text',
					'label'               =>  esc_html__( 'Title', 'coaching' ),
					'default'             =>  ''
				),
				'text_align'      => array(
					"type"    => "select",
					"label"   => esc_html__( "Text Align", 'coaching' ),
					"options" => array(
						"text-center" 	=> esc_html__( "Text Center", 'coaching' ),
						"text-left" 	=> esc_html__( "Text Left", 'coaching' ),
						"text-right" 	=> esc_html__( "Text Right", 'coaching' ),
					),
					"default" => "text-center",
				),
				'style'      => array(
					"type"    => "select",
					"label"   => esc_html__( "Style", 'coaching' ),
					"options" => array(
						"normal"					=> esc_html__( "Normal", 'coaching' ),
						"slider" 	=> esc_html__( "Slider", 'coaching' ),
					),
					"default" => "normal",
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'custom_style' )
					),
				),
				'columns'      => array(
					"type"    => "select",
					"label"   => esc_html__( "Columns", 'coaching' ),
					'options' => [
                    "2"                  => esc_html__( "2 Columns", 'coaching' ),
                    "3"                  => esc_html__( "3 Columns", 'coaching' ),
                    "4"                  => esc_html__( "4 Columns", 'coaching' ),
                    "6"                  => esc_html__( "6 Columns", 'coaching' ),
                    
                ],
                "default" => "3",

                'state_handler' => array(
						'custom_style[normal]' => array( 'show' ),
						'custom_style[slider]'      => array( 'hide' ),
					),
				),
				'program'                   =>  array(
					'type'                =>  'repeater',
					'label'               =>  esc_html__( 'Program List', 'coaching' ),
					'item_name'           =>  esc_html__( 'Program', 'coaching' ),
					'fields'              =>  array(
						'program_title'     =>  array(
							'type'        =>  'text',
							'label'       =>  esc_html__( 'Title Of Program', 'coaching' ),
							'default'     =>  ''
						),
						'program_link'      =>  array(
							'type'        =>  'text',
							'label'       =>  esc_html__( 'Link Of Program', 'coaching' ),
							'default'     =>  ''
						),
						'program_image'     =>  array(
							'type'        =>  'media',
							'label'       =>  esc_html__( 'Image Of Program', 'coaching' ),
							'description' =>  esc_html__( 'Select image from media library.', 'coaching' )
						),
					)
				),
			)
		);
	}

	function get_template_name( $instance ) {
		if ( $instance['style'] == 'slider' ) {
			return $instance['style'];
		}
		else{
			return 'base';
		}
	}

	function get_style_name( $instance ) {
		return false;
	}
}

function thim_program_widget() {
	register_widget( 'Thim_Program_Widget' );
}

add_action( 'widgets_init', 'thim_program_widget' );