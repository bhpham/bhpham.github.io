<?php

class Thim_Icon_Box_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'icon-box',
			esc_html__( 'Thim: Icon Box', 'coaching' ),
			array(
				'description'   => esc_html__( 'Add icon box', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
			),
			array(),
			$this->get_list_field(),
			THIM_DIR . 'inc/widgets/icon-box/'
		);
	}

	function get_list_field() {

		$list_field = array(
			'title_group'         => array(
				'type'   => 'section',
				'label'  => esc_html__( 'Title Options', 'coaching' ),
				'hide'   => true,
				'fields' => array(
					'title'            => array(
						'type'                  => 'text',
						'label'                 => esc_html__( 'Title', 'coaching' ),
						"default"               => esc_html__( "This is an icon box.", 'coaching' ),
						"description"           => esc_html__( "Provide the title for this icon box.", 'coaching' ),
						'allow_html_formatting' => array(
							'i' => array(
								'class' => array()
							)
						)
					),
					'color_title'      => array(
						'type'  => 'color',
						'label' => esc_html__( 'Color Title', 'coaching' ),
					),
					'size'             => array(
						"type"        => "select",
						"label"       => esc_html__( "Size Heading", 'coaching' ),
						"default"     => "h3",
						"options"     => array(
							"h2" => esc_html__( "h2", 'coaching' ),
							"h3" => esc_html__( "h3", 'coaching' ),
							"h4" => esc_html__( "h4", 'coaching' ),
							"h5" => esc_html__( "h5", 'coaching' ),
							"h6" => esc_html__( "h6", 'coaching' )
						),
						"description" => esc_html__( "Select size heading.", 'coaching' )
					),
					'font_heading'     => array(
						"type"          => "select",
						"label"         => esc_html__( "Font Heading", 'coaching' ),
						"options"       => array(
							"default" => esc_html__( "Default", 'coaching' ),
							"custom"  => esc_html__( "Custom", 'coaching' )
						),
						"description"   => esc_html__( "Select Font heading.", 'coaching' ),
						'state_emitter' => array(
							'callback' => 'select',
							'args'     => array( 'custom_font_heading' )
						)
					),
					'custom_heading'   => array(
						'type'          => 'section',
						'label'         => esc_html__( 'Custom Heading Option', 'coaching' ),
						'hide'          => true,
						'state_handler' => array(
							'custom_font_heading[custom]'  => array( 'show' ),
							'custom_font_heading[default]' => array( 'hide' ),
						),
						'fields'        => array(
							'custom_font_size'   => array(
								"type"        => "number",
								"label"       => esc_html__( "Font Size", 'coaching' ),
								"suffix"      => "px",
								"default"     => "14",
								"description" => esc_html__( "custom font size", 'coaching' ),
								"class"       => "color-mini"
							),
							'custom_font_weight' => array(
								"type"        => "select",
								"label"       => esc_html__( "Custom Font Weight", 'coaching' ),
								"class"       => "color-mini",
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
							),
							'custom_mg_bt'       => array(
								"type"   => "number",
								"class"  => "color-mini",
								"label"  => esc_html__( "Margin Bottom Value", "coaching" ),
								"value"  => 0,
								"suffix" => "px",
							),
							'custom_mg_top'      => array(
								"type"   => "number",
								"class"  => "color-mini",
								"label"  => esc_html__( "Margin top Value", "coaching" ),
								"value"  => 0,
								"suffix" => "px",
							),
						)
					),
					'line_after_title' => array(
						'type'    => 'checkbox',
						'label'   => esc_html__( 'Show Separator', 'coaching' ),
						'default' => false
					),
				),
			),
			'desc_group'          => array(
				'type'   => 'section',
				'label'  => esc_html__( 'Description', 'coaching' ),
				'hide'   => true,
				'fields' => array(
					'content'              => array(
						"type"                  => "textarea",
						"label"                 => esc_html__( "Add description", 'coaching' ),
						"default"               => esc_html__( "Write a short description, that will describe the title or something informational and useful.", 'coaching' ),
						"description"           => esc_html__( "Provide the description for this icon box.", 'coaching' ),
						'allow_html_formatting' => true
					),
					'custom_font_size_des' => array(
						"type"        => "number",
						"label"       => esc_html__( "Custom Font Size", 'coaching' ),
						"suffix"      => "px",
						"default"     => "",
						"description" => esc_html__( "Custom font size", 'coaching' ),
						"class"       => "color-mini",
					),
					'custom_font_weight'   => array(
						"type"        => "select",
						"label"       => esc_html__( "Custom Font Weight", 'coaching' ),
						"class"       => "color-mini",
						"options"     => array(
							""     => esc_html__( "Normal", 'coaching' ),
							"bold" => esc_html__( "Bold", 'coaching' ),
							"100"  => esc_html__( "100", 'coaching' ),
							"200"  => esc_html__( "200", 'coaching' ),
							"300"  => esc_html__( "300", 'coaching' ),
							"400"  => esc_html__( "400", 'coaching' ),
							"500"  => esc_html__( "500", 'coaching' ),
							"600"  => esc_html__( "600", 'coaching' ),
							"700"  => esc_html__( "700", 'coaching' ),
							"800"  => esc_html__( "800", 'coaching' ),
							"900"  => esc_html__( "900", 'coaching' )
						),
						"description" => esc_html__( "Select Custom Font Weight", 'coaching' ),
					),
					'color_description'    => array(
						"type"  => "color",
						"label" => esc_html__( "Color Description", 'coaching' ),
						"class" => "color-mini",
					),
					'description_mg_top'   => array(
						"type"   => "number",
						"class"  => "color-mini",
						"label"  => esc_html__( "Margin top", "coaching" ),
						"value"  => 0,
						"suffix" => "px",
					),
				),
			),
			'read_more_group'     => array(
				'type'   => 'section',
				'label'  => esc_html__( 'Link Icon Box', 'coaching' ),
				'hide'   => true,
				'fields' => array(
					// Add link to existing content or to another resource
					'link'                   => array(
						"type"        => "text",
						"label"       => esc_html__( "Add Link", 'coaching' ),
						"description" => esc_html__( "Provide the link that will be applied to this icon box.", 'coaching' )
					),
					'link_target'            => array(
						"type"    => "select",
						"label"   => esc_html__( "Link Target", 'coaching' ),
						"options" => array(
							"_self"  => esc_html__( "Same window", 'coaching' ),
							"_blank" => esc_html__( "New window", 'coaching' ),
						),
					),
					// Select link option - to box or with read more text
					'read_more'              => array(
						"type"          => "select",
						"label"         => esc_html__( "Apply link to:", 'coaching' ),
						"options"       => array(
							"complete_box" => esc_html__( "Complete Box", 'coaching' ),
							"title"        => esc_html__( "Box Title", 'coaching' ),
							"more"         => esc_html__( "Display Read More", 'coaching' )
						),
						"description"   => esc_html__( "Select whether to use color for icon or not.", 'coaching' ),
						'state_emitter' => array(
							'callback' => 'select',
							'args'     => array( 'read_more_op' )
						)
					),
					// Link to traditional read more
					'button_read_more_group' => array(
						'type'          => 'section',
						'label'         => esc_html__( 'Option Button Read More', 'coaching' ),
						'hide'          => true,
						'state_handler' => array(
							'read_more_op[more]'         => array( 'show' ),
							'read_more_op[complete_box]' => array( 'hide' ),
							'read_more_op[title]'        => array( 'hide' ),
						),
						'fields'        => array(
							'read_text'                  => array(
								"type"        => "text",
								"label"       => esc_html__( "Read More Text", 'coaching' ),
								"default"     => esc_html__( "Read More", 'coaching' ),
								"description" => esc_html__( "Customize the read more text.", 'coaching' ),
							),
							'read_more_text_color'       => array(
								"type"        => "color",
								"class"       => "",
								"label"       => esc_html__( "Text Color Read More", 'coaching' ),
								"description" => esc_html__( "Select whether to use text color for Read More Text or default.", 'coaching' ),
								"class"       => "color-mini",
							),
							'border_read_more_text'      => array(
								"type"        => "color",
								"label"       => esc_html__( "Border Color Read More Text:", 'coaching' ),
								"description" => esc_html__( "Select whether to use border color for Read More Text or none.", 'coaching' ),
								"class"       => "color-mini",
							),
							'bg_read_more_text'          => array(
								"type"        => "color",
								"class"       => "mini",
								"label"       => esc_html__( "Background Color Read More Text:", 'coaching' ),
								"description" => esc_html__( "Select whether to use background color for Read More Text or default.", 'coaching' ),
								"class"       => "color-mini",
							),
							'read_more_text_color_hover' => array(
								"type"        => "color",
								"class"       => "",
								"label"       => esc_html__( "Text Hover Color Read More", 'coaching' ),
								"description" => esc_html__( "Select whether to use text color for Read More Text or default.", 'coaching' ),
								"class"       => "color-mini",
							),

							'bg_read_more_text_hover' => array(
								"type"        => "color",
								"label"       => esc_html__( "Background Hover Color Read More Text:", 'coaching' ),
								"description" => esc_html__( "Select whether to use background color when hover Read More Text or default.", 'coaching' ),
								"class"       => "color-mini",
							),

						)
					),
				),
			),
			'icon_type'           => array(
				"type"          => "select",
				"class"         => "",
				"label"         => esc_html__( "Icon to display:", 'coaching' ),
				"default"       => "font-awesome",
				"options"       => array(
					"font-awesome"  => esc_html__( "Font Awesome Icon", 'coaching' ),
					"font-7-stroke" => esc_html__( "Font 7 stroke Icon", 'coaching' ),
					"custom"        => esc_html__( "Custom Image", 'coaching' ),
				),
				'state_emitter' => array(
					'callback' => 'select',
					'args'     => array( 'icon_type_op' )
				)
			),
			'font_awesome_group'  => array(
				'type'          => 'section',
				'label'         => esc_html__( 'Font Awesome Icon', 'coaching' ),
				'hide'          => true,
				'state_handler' => array(
					'icon_type_op[font-awesome]'  => array( 'show' ),
					'icon_type_op[custom]'        => array( 'hide' ),
					'icon_type_op[font-7-stroke]' => array( 'hide' ),
				),
				'fields'        => array(
					'icon'      => array(
						"type"        => "icon",
						"class"       => "",
						"label"       => esc_html__( "Select Icon:", 'coaching' ),
						"description" => esc_html__( "Select the icon from the list.", 'coaching' ),
						"class_name"  => 'font-awesome',
					),
					'icon_size' => array(
						"type"        => "number",
						"class"       => "",
						"label"       => esc_html__( "Icon Font Size ", 'coaching' ),
						"suffix"      => "px",
						"default"     => "14",
						"description" => esc_html__( "Select the icon font size.", 'coaching' ),
						"class_name"  => 'font-awesome'
					),
				),
			),
			'font_7_stroke_group' => array(
				'type'          => 'section',
				'label'         => esc_html__( 'Font 7 Stroke Icon', 'coaching' ),
				'hide'          => true,
				'state_handler' => array(
					'icon_type_op[font-awesome]'  => array( 'hide' ),
					'icon_type_op[custom]'        => array( 'hide' ),
					'icon_type_op[font-7-stroke]' => array( 'show' ),
				),
				'fields'        => array(
					'icon'      => array(
						"type"        => "icon-7-stroke",
						"class"       => "",
						"label"       => esc_html__( "Select Icon:", 'coaching' ),
						"description" => esc_html__( "Select the icon from the list.", 'coaching' ),
						"class_name"  => 'font-7-stroke',
					),
					// Resize the icon
					'icon_size' => array(
						"type"        => "number",
						"class"       => "",
						"label"       => esc_html__( "Icon Font Size ", 'coaching' ),
						"suffix"      => "px",
						"default"     => "14",
						"description" => esc_html__( "Select the icon font size.", 'coaching' ),
						"class_name"  => 'font-7-stroke'
					),
				),
			),
			'font_image_group'    => array(
				'type'          => 'section',
				'label'         => esc_html__( 'Custom Image Icon', 'coaching' ),
				'hide'          => true,
				'state_handler' => array(
					'icon_type_op[font-awesome]'  => array( 'hide' ),
					'icon_type_op[custom]'        => array( 'show' ),
					'icon_type_op[font-7-stroke]' => array( 'hide' ),
					'icon_type_op[font-flat]'     => array( 'hide' ),

				),
				'fields'        => array(
					// Play with icon selector
					'icon_img' => array(
						"type"        => "media",
						"label"       => esc_html__( "Upload Image Icon:", 'coaching' ),
						"description" => esc_html__( "Upload the custom image icon.", 'coaching' ),
						"class_name"  => 'custom',
					),
				),
			),
			// // Resize the icon
			'width_icon_box'      => array(
				"type"    => "number",
				"class"   => "",
				"default" => "100",
				"label"   => esc_html__( "Width Box Icon", 'coaching' ),
				"suffix"  => "px",
			),
			'color_group'         => array(
				'type'   => 'section',
				'label'  => esc_html__( 'Color Options', 'coaching' ),
				'hide'   => true,
				'fields' => array(
					// Customize Icon Color
					'icon_color'              => array(
						"type"        => "color",
						"class"       => "color-mini",
						"label"       => esc_html__( "Select Icon Color:", 'coaching' ),
						"description" => esc_html__( "Select the icon color.", 'coaching' ),
					),
					'icon_border_color'       => array(
						"type"        => "color",
						"label"       => esc_html__( "Icon Border Color:", 'coaching' ),
						"description" => esc_html__( "Select the color for icon border.", 'coaching' ),
						"class"       => "color-mini",
					),
					'icon_bg_color'           => array(
						"type"        => "color",
						"label"       => esc_html__( "Icon Background Color:", 'coaching' ),
						"description" => esc_html__( "Select the color for icon background.", 'coaching' ),
						"class"       => "color-mini",
					),
					'icon_hover_color'        => array(
						"type"        => "color",
						"label"       => esc_html__( "Hover Icon Color:", 'coaching' ),
						"description" => esc_html__( "Select the color hover for icon.", 'coaching' ),
						"class"       => "color-mini",
					),
					'icon_border_color_hover' => array(
						"type"        => "color",
						"label"       => esc_html__( "Hover Icon Border Color:", 'coaching' ),
						"description" => esc_html__( "Select the color hover for icon border.", 'coaching' ),
						"class"       => "color-mini",
					),
					// Give some background to icon
					'icon_bg_color_hover'     => array(
						"type"        => "color",
						"label"       => esc_html__( "Hover Icon Background Color:", 'coaching' ),
						"description" => esc_html__( "Select the color hover for icon background .", 'coaching' ),
						"class"       => "color-mini",
					),
				)
			),
			'layout_group'        => array(
				'type'   => 'section',
				'label'  => esc_html__( 'Layout Options', 'coaching' ),
				'hide'   => true,
				'fields' => array(
					'box_icon_style' => array(
						"type"    => "select",
						"class"   => "",
						"label"   => esc_html__( "Icon Shape", 'coaching' ),
						"options" => array(
							""       => esc_html__( "None", 'coaching' ),
							"circle" => esc_html__( "Circle", 'coaching' ),
						),
						"std"     => "circle",
					),
					'pos'            => array(
						"type"          => "select",
						"class"         => "",
						"label"         => esc_html__( "Box Style:", 'coaching' ),
						"default"       => "top",
						"options"       => array(
							"left"  => esc_html__( "Icon at Left", 'coaching' ),
							"right" => esc_html__( "Icon at Right", 'coaching' ),
							"top"   => esc_html__( "Icon at Top", 'coaching' ),
							"push"  => esc_html__( "Icon Push Box", 'coaching' ),
						),
						'state_emitter' => array(
							'callback' => 'select',
							'args'     => array( 'pos_op' )
						),
						"description"   => esc_html__( "Select icon position. Icon box style will be changed according to the icon position.", 'coaching' ),
					),
					'sub_title_push' => array(
						"type"          => "text",
						"label"         => esc_html__( "Push Box Sub Title:", 'coaching' ),
						"description"   => esc_html__( "The push box sub title.", 'coaching' ),
						"hide"          => true,
						'state_handler' => array(
							'pos_op[push]'  => array( 'show' ),
							'pos_op[left]'  => array( 'hide' ),
							'pos_op[right]' => array( 'hide' ),
							'pos_op[top]'   => array( 'hide' ),
						)
					),
					'img_push'       => array(
						"type"          => "media",
						"label"         => esc_html__( "Upload Image Push Box:", 'coaching' ),
						"description"   => esc_html__( "Upload the push box image.", 'coaching' ),
						"hide"          => true,
						'state_handler' => array(
							'pos_op[push]'  => array( 'show' ),
							'pos_op[left]'  => array( 'hide' ),
							'pos_op[right]' => array( 'hide' ),
							'pos_op[top]'   => array( 'hide' ),
						)
					),
					'text_align_sc'  => array(
						"type"    => "select",
						"class"   => "",
						"label"   => esc_html__( "Text Align Shortcode:", 'coaching' ),
						"options" => array(
							"text-left"   => esc_html__( "Text Left", 'coaching' ),
							"text-right"  => esc_html__( "Text Right", 'coaching' ),
							"text-center" => esc_html__( "Text Center", 'coaching' ),
						)
					),
					'style_box'      => array(
						"type"    => "select",
						"label"   => esc_html__( "Type Icon Box", 'coaching' ),
						"options" => array(
							""             => esc_html__( "Default", 'coaching' ),
							"overlay"      => esc_html__( "Overlay", 'coaching' ),
							"contact_info" => esc_html__( "Contact Info", 'coaching' ),
							"image_box"    => esc_html__( "Image Box", 'coaching' ),
							"border"       => esc_html__( "Border Box", 'coaching' ),
							"featured_box" => esc_html__( "Featured Box", 'coaching' ),
							"hover_box"    => esc_html__( "Hover Box", 'coaching' ),
						),
					),
				),
			),

			'widget_background'   => array(
				"type"          => "select",
				"label"         => esc_html__( "Widget Background", 'coaching' ),
				"default"       => "none",
				"options"       => array(
					"none"     => esc_html__( "None", 'coaching' ),
					"bg_video" => esc_html__( "Video Background", 'coaching' ),
					"bg_image" => esc_html__( "Image Background Bellow Icon", 'coaching' ),
				),
				'state_emitter' => array(
					'callback' => 'select',
					'args'     => array( 'bg_video_style' )
				)
			),
			'self_video'          => array(
				'type'          => 'media',
				'fallback'      => true,
				'label'         => esc_html__( 'Select video', 'coaching' ),
				'description'   => esc_html__( 'Select an uploaded video in mp4 format. Other formats, such as webm and ogv will work in some browsers.', 'coaching' ),
				'default'       => '',
				'library'       => 'video',
				'state_handler' => array(
					'bg_video_style[bg_video]' => array( 'show' ),
					'bg_video_style[none]'     => array( 'hide' ),
					'bg_video_style[bg_image]' => array( 'hide' ),
				)
			),
			'self_poster'         => array(
				'type'          => 'media',
				'label'         => esc_html__( 'Select cover image', 'coaching' ),
				'default'       => '',
				'library'       => 'image',
				'state_handler' => array(
					'bg_video_style[bg_video]' => array( 'show' ),
					'bg_video_style[none]'     => array( 'hide' ),
					'bg_video_style[bg_image]' => array( 'hide' ),
				)
			),
			// Play with icon selector
			'icon_img_background' => array(
				"type"          => "media",
				"label"         => esc_html__( "Upload Image Background Bellow Icon:", 'coaching' ),
				"description"   => esc_html__( "Upload Image Background Bellow Icon", 'coaching' ),
				"class_name"    => 'custom',
				'state_handler' => array(
					'bg_video_style[bg_video]' => array( 'hide' ),
					'bg_video_style[none]'     => array( 'hide' ),
					'bg_video_style[bg_image]' => array( 'show' ),
				)
			),
			'css_animation'       => array(
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
			)
		);

		return $list_field;
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

function thim_icon_box_register_widget() {
	register_widget( 'Thim_Icon_Box_Widget' );
}

add_action( 'widgets_init', 'thim_icon_box_register_widget' );