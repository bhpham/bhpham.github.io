<?php

class Thim_Heading_Widget extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'heading',
			esc_html__( 'Thim: Heading', 'coaching' ),
			array(
				'description'   => esc_html__( 'Add heading text', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'title'                   => array(
					'type'                  => 'text',
					'allow_html_formatting' => true,
					'label'                 => esc_html__( 'Heading Text', 'coaching' ),
					'default'               => esc_html__( "Default value", 'coaching' )
				),
				'textcolor'               => array(
					'type'  => 'color',
					'label' => esc_html__( 'Text Heading color', 'coaching' ),
				),
				'size'                    => array(
					"type"    => "select",
					"label"   => esc_html__( "Size Heading", 'coaching' ),
					"options" => array(
						"h2" => esc_html__( "h2", 'coaching' ),
						"h3" => esc_html__( "h3", 'coaching' ),
						"h4" => esc_html__( "h4", 'coaching' ),
						"h5" => esc_html__( "h5", 'coaching' ),
						"h6" => esc_html__( "h6", 'coaching' )
					),
					"default" => "h3"
				),
				'font_heading'            => array(
					"type"          => "select",
					"label"         => esc_html__( "Font Heading", 'coaching' ),
					"default"       => "default",
					"options"       => array(
						"default" => esc_html__( "Default", 'coaching' ),
						"custom"  => esc_html__( "Custom", 'coaching' )
					),
					"description"   => esc_html__( "Select Font heading.", 'coaching' ),
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'font_heading_type' )
					)
				),
				'custom_font_heading'     => array(
					'type'          => 'section',
					'label'         => esc_html__( 'Custom Font Heading', 'coaching' ),
					'hide'          => true,
					'state_handler' => array(
						'font_heading_type[custom]'  => array( 'show' ),
						'font_heading_type[default]' => array( 'hide' ),
					),
					'fields'        => array(
						'custom_font_size'   => array(
							"type"        => "number",
							"label"       => esc_html__( "Font Size", 'coaching' ),
							"suffix"      => "px",
							"default"     => "14",
							"description" => esc_html__( "custom font size", 'coaching' ),
							"class"       => "color-mini",
						),
						'custom_font_weight' => array(
							"type"        => "select",
							"label"       => esc_html__( "Custom Font Weight", 'coaching' ),
							"options"     => array(
								"normal" => esc_html__( "Normal", 'coaching' ),
								"bold"   => esc_html__( "Bold", 'coaching' ),
								"100"    => esc_html__( "100", 'coaching' ),
								"200"    => esc_html__( "200", 'coaching' ),
								"300"    => esc_html__( "300", 'coaching' ),
								"400"    => esc_html__( "400", 'coaching' ),
								"500"    => esc_html__( "500", 'coaching' ),
								"600"    => esc_html__( "600", 'coaching' ),
								"700"    => esc_html__( "700", 'coaching' ),
								"800"    => esc_html__( "800", 'coaching' ),
								"900"    => esc_html__( "900", 'coaching' )
							),
							"description" => esc_html__( "Select Custom Font Weight", 'coaching' ),
							"class"       => "color-mini",
						),
						'custom_font_style'  => array(
							"type"        => "select",
							"label"       => esc_html__( "Custom Font Style", 'coaching' ),
							"options"     => array(
								"inherit" => esc_html__( "inherit", 'coaching' ),
								"initial" => esc_html__( "initial", 'coaching' ),
								"italic"  => esc_html__( "italic", 'coaching' ),
								"normal"  => esc_html__( "normal", 'coaching' ),
								"oblique" => esc_html__( "oblique", 'coaching' )
							),
							"description" => esc_html__( "Select Custom Font Style", 'coaching' ),
							"class"       => "color-mini",
						),
						'custom_line_height' => array(
							"type"        => "number",
							"label"       => esc_html__( "Line Height", 'coaching' ),
							"suffix"      => "px",
							"description" => esc_html__( "custom line height", 'coaching' ),
							"class"       => "color-mini",
						),
						'custom_style'       => array(
							'type'                  => 'text',
							'allow_html_formatting' => true,
							'label'                 => esc_html__( 'Custom Style', 'coaching' ),
						),
					),
				),
				'sub_heading'             => array(
					'type'                  => 'textarea',
					'allow_html_formatting' => true,
					'label'                 => esc_html__( 'Sub Heading', 'coaching' ),
				),
				'sub_heading_color'       => array(
					'type'  => 'color',
					'label' => esc_html__( 'Sub heading color', 'coaching' ),
				),
				'font_sub_heading'        => array(
					"type"          => "select",
					"label"         => esc_html__( "Font Sub Heading", 'coaching' ),
					"default"       => "default",
					"options"       => array(
						"default" => esc_html__( "Default", 'coaching' ),
						"custom"  => esc_html__( "Custom", 'coaching' )
					),
					"description"   => esc_html__( "Select Font sub heading.", 'coaching' ),
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'font_sub_heading_type' )
					)
				),
				'custom_font_sub_heading' => array(
					'type'          => 'section',
					'label'         => esc_html__( 'Custom Font Sub Heading', 'coaching' ),
					'hide'          => true,
					'state_handler' => array(
						'font_sub_heading_type[custom]'  => array( 'show' ),
						'font_sub_heading_type[default]' => array( 'hide' ),
					),
					'fields'        => array(
						'custom_sub_font_size'   => array(
							"type"        => "number",
							"label"       => esc_html__( "Font Size", 'coaching' ),
							"suffix"      => "px",
							"default"     => "14",
							"description" => esc_html__( "custom font size", 'coaching' ),
							"class"       => "color-mini",
						),
						'custom_sub_font_weight' => array(
							"type"        => "select",
							"label"       => esc_html__( "Custom Font Weight", 'coaching' ),
							"options"     => array(
								"normal" => esc_html__( "Normal", 'coaching' ),
								"bold"   => esc_html__( "Bold", 'coaching' ),
								"100"    => esc_html__( "100", 'coaching' ),
								"200"    => esc_html__( "200", 'coaching' ),
								"300"    => esc_html__( "300", 'coaching' ),
								"400"    => esc_html__( "400", 'coaching' ),
								"500"    => esc_html__( "500", 'coaching' ),
								"600"    => esc_html__( "600", 'coaching' ),
								"700"    => esc_html__( "700", 'coaching' ),
								"800"    => esc_html__( "800", 'coaching' ),
								"900"    => esc_html__( "900", 'coaching' )
							),
							"description" => esc_html__( "Select Custom Font Weight", 'coaching' ),
							"class"       => "color-mini",
						),
						'custom_sub_line_height' => array(
							"type"        => "number",
							"label"       => esc_html__( "Line Height", 'coaching' ),
							"suffix"      => "px",
							"description" => esc_html__( "custom line height", 'coaching' ),
							"class"       => "color-mini",
						),
						'custom_sub_font_style'  => array(
							"type"        => "select",
							"label"       => esc_html__( "Custom Font Style", 'coaching' ),
							"options"     => array(
								"inherit" => esc_html__( "inherit", 'coaching' ),
								"initial" => esc_html__( "initial", 'coaching' ),
								"italic"  => esc_html__( "italic", 'coaching' ),
								"normal"  => esc_html__( "normal", 'coaching' ),
								"oblique" => esc_html__( "oblique", 'coaching' )
							),
							"description" => esc_html__( "Select Custom Font Style", 'coaching' ),
							"class"       => "color-mini",
						),
					),
				),
				'type'                    => array(
					"type"          => "select",
					"label"         => esc_html__( "Layout", 'coaching' ),
					"options"       => array(
						""          => esc_html__( "Default", 'coaching' ),
						"bussiness" => esc_html__( "Bussiness", 'coaching' ),
						"gym"       => esc_html__( "Gym", 'coaching' ),
						"therapist" => esc_html__( "Therapist", 'coaching' ),
						"home-5"    => esc_html__( "Home 5", 'coaching' ),
					),
					"default"       => "",
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'layout_type' )
					)
				),

				'line' => array(
					'type'          => 'checkbox',
					'label'         => esc_html__( 'Show Separator', 'coaching' ),
					'default'       => 'yes',
					'state_handler' => array(
						'layout_type[bussiness]' => array( 'hide' ),
					),
				),

				'bg_line'       => array(
					'type'          => 'color',
					'label'         => esc_html__( 'Color Line', 'coaching' ),
					'state_handler' => array(
						'layout_type[bussiness]' => array( 'hide' ),
					),
				),
				'text_align'    => array(
					"type"    => "select",
					"label"   => esc_html__( "Text Align", 'coaching' ),
					"options" => array(
						"text-left"   => esc_html__( "Text Left", 'coaching' ),
						"text-center" => esc_html__( "Text Center", 'coaching' ),
						"text-right"  => esc_html__( "Text Right", 'coaching' ),
					),
				),
				'content'       => array(
					'type'                  => 'textarea',
					'allow_html_formatting' => true,
					'hide'                  => true,
					'label'                 => esc_html__( 'Content', 'coaching' ),
					'state_handler'         => array(
						'layout_type[bussiness]' => array( 'show' ),
						'layout_type[gym]'       => array( 'show' ),
						'layout_type[]'          => array( 'hide' ),
						'layout_type[therapist]' => array( 'hide' ),
						'layout_type[home-5]'    => array( 'hide' ),
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
			THIM_DIR . 'inc/widgets/heading/'
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

function thim_heading_register_widget() {
	register_widget( 'Thim_Heading_Widget' );
}

add_action( 'widgets_init', 'thim_heading_register_widget' );