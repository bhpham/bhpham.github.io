<?php

vc_map( array(

	'name'        => esc_html__( 'Thim: Icon Box', 'coaching' ),
	'base'        => 'thim-icon-box',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Add icon box', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-icon-box',
	'params'      => array(
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Heading', 'coaching' ),
			'param_name'  => 'title',
			'description' => esc_html__( 'Provide the title for this icon box.', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Heading color', 'coaching' ),
			'param_name'  => 'title_color',
			'value'       => '',
			'description' => esc_html__( 'Select the title color.', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Size heading', 'coaching' ),
			'param_name'  => 'title_size',
			'value'       => array(
				esc_html__( 'Select tag', 'coaching' ) => '',
				esc_html__( 'h2', 'coaching' )         => 'h2',
				esc_html__( 'h3', 'coaching' )         => 'h3',
				esc_html__( 'h4', 'coaching' )         => 'h4',
				esc_html__( 'h5', 'coaching' )         => 'h5',
				esc_html__( 'h6', 'coaching' )         => 'h6',
			),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Custom heading', 'coaching' ),
			'param_name'  => 'title_font_heading',
			'value'       => array(
				esc_html__( 'Default', 'coaching' ) => 'default',
				esc_html__( 'Custom', 'coaching' )  => 'custom',
			),

		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Font size', 'coaching' ),
			'param_name'  => 'title_custom_font_size',
			'std'         => '14',
			'description' => esc_html__( 'Custom title font size. Unit is pixel', 'coaching' ),
			'dependency'  => array(
				'element' => 'title_font_heading',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Heading Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Font Weight', 'coaching' ),
			'param_name'  => 'title_custom_font_weight',
			'description' => esc_html__( 'Select Custom Title Font Weight', 'coaching' ),
			'value'       => array(
				esc_html__( 'Select', 'coaching' ) => '',
				esc_html__( 'Normal', 'coaching' ) => 'normal',
				esc_html__( 'Bold', 'coaching' )   => 'bold',
				esc_html__( '100', 'coaching' )    => '100',
				esc_html__( '200', 'coaching' )    => '200',
				esc_html__( '300', 'coaching' )    => '300',
				esc_html__( '400', 'coaching' )    => '400',
				esc_html__( '500', 'coaching' )    => '500',
				esc_html__( '600', 'coaching' )    => '600',
				esc_html__( '700', 'coaching' )    => '700',
				esc_html__( '800', 'coaching' )    => '800',
				esc_html__( '900', 'coaching' )    => '900',
			),
			'dependency'  => array(
				'element' => 'title_font_heading',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Heading Settings', 'coaching' ),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Margin Top', 'coaching' ),
			'param_name'  => 'title_custom_mg_top',
			'std'         => '0',
			'dependency'  => array(
				'element' => 'title_font_heading',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Heading Settings', 'coaching' ),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Margin Bottom', 'coaching' ),
			'param_name'  => 'title_custom_mg_bt',
			'std'         => '0',
			'dependency'  => array(
				'element' => 'title_font_heading',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Heading Settings', 'coaching' ),
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => false,
			'heading'     => esc_html__( 'Show separator', 'coaching' ),
			'param_name'  => 'line_after_title',
			'std'         => false,
		),

		array(
			'type'        => 'textarea',
			'admin_label' => false,
			'heading'     => esc_html__( 'Description', 'coaching' ),
			'param_name'  => 'desc_content',
			'std'         => esc_html__( 'Write a short description, that will describe the title or something informational and useful.', 'coaching' ),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Description size', 'coaching' ),
			'param_name'  => 'custom_font_size_desc',
			'description' => esc_html__( 'Custom description font size. Unit is pixel', 'coaching' ),
			'std'         => '14'
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Description font weight', 'coaching' ),
			'param_name'  => 'custom_font_weight_desc',
			'description' => esc_html__( 'Select custom description font weight', 'coaching' ),
			'value'       => array(
				esc_html__( 'Select', 'coaching' ) => '',
				esc_html__( 'Normal', 'coaching' ) => 'normal',
				esc_html__( 'Bold', 'coaching' )   => 'bold',
				esc_html__( '100', 'coaching' )    => '100',
				esc_html__( '200', 'coaching' )    => '200',
				esc_html__( '300', 'coaching' )    => '300',
				esc_html__( '400', 'coaching' )    => '400',
				esc_html__( '500', 'coaching' )    => '500',
				esc_html__( '600', 'coaching' )    => '600',
				esc_html__( '700', 'coaching' )    => '700',
				esc_html__( '800', 'coaching' )    => '800',
				esc_html__( '900', 'coaching' )    => '900',
			),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Description color', 'coaching' ),
			'param_name'  => 'color_desc',
			'description' => esc_html__( 'Select the description color.', 'coaching' ),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Margin Top', 'coaching' ),
			'param_name'  => 'description_mg_top',
			'description' => esc_html__( 'Custom description margin top. Unit is pixel', 'coaching' ),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => false,
			'heading'     => esc_html__( 'Link', 'coaching' ),
			'param_name'  => 'read_more_link',
			'value'       => '',
			'description' => esc_html__( 'Provide the link that will be applied to this icon box.', 'coaching' ),
			'group'       => esc_html__( 'Read More Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Apply read more link to:', 'coaching' ),
			'param_name'  => 'read_more_link_to',
			'description' => esc_html__( 'Select Custom Title Font Weight', 'coaching' ),
			'value'       => array(
				esc_html__( 'Select', 'coaching' )            => '',
				esc_html__( 'Complete Box', 'coaching' )      => 'complete_box',
				esc_html__( 'Box Title', 'coaching' )         => 'title',
				esc_html__( 'Display Read More', 'coaching' ) => 'more',
			),
			'group'       => esc_html__( 'Read More Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Target link', 'coaching' ),
			'param_name'  => 'read_more_target',
			'value'       => array(
				esc_html__( 'Select', 'coaching' ) => '',
				esc_html__( 'Blank', 'coaching' )  => '_blank',
				esc_html__( 'Self', 'coaching' )   => '_self',
				esc_html__( 'Parent', 'coaching' ) => '_parent',
			),
			'group'       => esc_html__( 'Read More Settings', 'coaching' ),
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => false,
			'heading'     => esc_html__( 'Show Link To Icon', 'coaching' ),
			'param_name'  => 'link_to_icon',
			'std'         => false,
			'group'       => esc_html__( 'Read More Settings', 'coaching' ),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => false,
			'heading'     => esc_html__( 'Read more text', 'coaching' ),
			'param_name'  => 'read_more_text',
			'value'       => '',
			'description' => esc_html__( 'Provide text read more text.', 'coaching' ),
			'group'       => esc_html__( 'Read More Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Text color', 'coaching' ),
			'param_name'  => 'read_more_text_color',
			'value'       => '',
			'description' => esc_html__( 'Select the read more text color.', 'coaching' ),
			'group'       => esc_html__( 'Read More Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Border color', 'coaching' ),
			'param_name'  => 'read_more_border_color',
			'value'       => '',
			'description' => esc_html__( 'Select the read more border color.', 'coaching' ),
			'group'       => esc_html__( 'Read More Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Background color', 'coaching' ),
			'param_name'  => 'read_more_bg_color',
			'value'       => '',
			'description' => esc_html__( 'Select the read more background color.', 'coaching' ),
			'group'       => esc_html__( 'Read More Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Text hover color', 'coaching' ),
			'param_name'  => 'read_more_text_hover_color',
			'value'       => '',
			'description' => esc_html__( 'Select the read more text hover color.', 'coaching' ),
			'group'       => esc_html__( 'Read More Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Background hover color', 'coaching' ),
			'param_name'  => 'read_more_bg_hover_color',
			'value'       => '',
			'description' => esc_html__( 'Select the read more background hover color.', 'coaching' ),
			'group'       => esc_html__( 'Read More Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Icon type', 'coaching' ),
			'param_name'  => 'icon_type',
			'description' => esc_html__( 'Select icon type to display', 'coaching' ),
			'value'       => array(
				esc_html__( 'Select', 'coaching' )       => '',
				esc_html__( 'Font Awesome', 'coaching' ) => 'font-awesome',
				esc_attr__( "Ionicons", 'coaching' )     => "font_ionicons",
				esc_html__( 'Custom Image', 'coaching' ) => 'custom',
			),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'iconpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Font Awesome Icon', 'coaching' ),
			'param_name'  => 'font_awesome_icon',
			'value'       => '',
			'description' => esc_html__( 'Select icon', 'coaching' ),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => 'font-awesome',
			),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		// Ionicons Picker
		array(
			"type"       => "iconpicker",
			"heading"    => esc_attr__( "Font Ionicons Icon", 'coaching' ),
			"param_name" => "font_ionicons",
			"settings"   => array(
				'emptyIcon' => true,
				'type'      => 'ionicons',
			),
			'dependency' => array(
				'element' => 'icon_type',
				'value'   => array( 'font_ionicons' ),
			),
			'group'      => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Icon Font Size', 'coaching' ),
			'param_name'  => 'font_awesome_icon_size',
			'std'         => '14',
			'description' => esc_html__( 'Custom icon font size. Unit is pixel', 'coaching' ),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => array( 'font-awesome', 'font_ionicons' ),
			),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'attach_image',
			'admin_label' => false,
			'heading'     => esc_html__( 'Image Icon', 'coaching' ),
			'param_name'  => 'custom_image_icon',
			'std'         => '14',
			'description' => esc_html__( 'Select custom image icon', 'coaching' ),
			'dependency'  => array(
				'element' => 'icon_type',
				'value'   => 'custom',
			),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Width box icon', 'coaching' ),
			'param_name'  => 'width_icon_box',
			'std'         => '100',
			'description' => esc_html__( 'Custom width box icon. Unit is pixel', 'coaching' ),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Height box icon', 'coaching' ),
			'param_name'  => 'height_icon_box',
			'std'         => '',
			'description' => esc_html__( 'Custom height box icon. Unit is pixel', 'coaching' ),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Icon color', 'coaching' ),
			'param_name'  => 'icon_color',
			'value'       => '',
			'description' => esc_html__( 'Select the icon color.', 'coaching' ),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Icon border color', 'coaching' ),
			'param_name'  => 'icon_border_color',
			'value'       => '',
			'description' => esc_html__( 'Select the icon border color.', 'coaching' ),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Icon background color', 'coaching' ),
			'param_name'  => 'icon_bg_color',
			'value'       => '',
			'description' => esc_html__( 'Select the icon background color.', 'coaching' ),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Icon hover color', 'coaching' ),
			'param_name'  => 'icon_hover_color',
			'value'       => '',
			'description' => esc_html__( 'Select the icon hover color.', 'coaching' ),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Icon border hover color', 'coaching' ),
			'param_name'  => 'icon_border_hover_color',
			'value'       => '',
			'description' => esc_html__( 'Select icon border hover color.', 'coaching' ),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Icon background hover color', 'coaching' ),
			'param_name'  => 'icon_bg_hover_color',
			'value'       => '',
			'description' => esc_html__( 'Select the icon background hover color.', 'coaching' ),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Icon shape', 'coaching' ),
			'param_name'  => 'layout_box_icon_style',
			'value'       => array(
				esc_html__( 'None', 'coaching' )   => '',
				esc_html__( 'Circle', 'coaching' ) => 'circle',
			),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Box style', 'coaching' ),
			'param_name'  => 'layout_pos',
			'value'       => array(
				esc_html__( 'Select', 'coaching' )        => '',
				esc_html__( 'Icon at Left', 'coaching' )  => 'left',
				esc_html__( 'Icon at Right', 'coaching' ) => 'right',
				esc_html__( 'Icon at Top', 'coaching' )   => 'top',
				esc_html__( 'Icon Push Box', 'coaching' ) => 'push',
			),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => false,
			'heading'     => esc_html__( 'Push Box Sub Title:', 'coaching' ),
			'param_name'  => 'layout_sub_title_push',
			'value'       => '',
			'description' => esc_html__( 'The push box sub title.', 'coaching' ),
			'dependency'  => array(
				'element' => 'layout_pos',
				'value'   => 'push',
			),
		),

		array(
			'type'        => 'attach_image',
			'admin_label' => false,
			'heading'     => esc_html__( 'Upload Image Push Box:', 'coaching' ),
			'param_name'  => 'layout_img_push',
			'description' => esc_html__( 'Upload the push box image.', 'coaching' ),
			'dependency'  => array(
				'element' => 'layout_pos',
				'value'   => 'push',
			),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Text alignment', 'coaching' ),
			'param_name'  => 'layout_text_align_sc',
			'value'       => array(
				esc_html__( 'Select', 'coaching' )         => '',
				esc_html__( 'Text at left', 'coaching' )   => 'text-left',
				esc_html__( 'Text at center', 'coaching' ) => 'text-center',
				esc_html__( 'Text at right', 'coaching' )  => 'text-right',
			),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Type icon box', 'coaching' ),
			'param_name'  => 'layout_style_box',
			'value'       => array(
				esc_html__( 'Default', 'coaching' )      => '',
				esc_html__( 'Overlay', 'coaching' )      => 'overlay',
				esc_html__( 'Contact Info', 'coaching' ) => 'contact_info',
				esc_html__( 'Image Box', 'coaching' )    => 'image_box',
				esc_html__( 'Border Box', 'coaching' )   => 'border',
				esc_html__( 'Featured Box', 'coaching' ) => 'featured_box',
				esc_html__( 'Hover Box', 'coaching' )    => 'hover_box',
			),
			'group'       => esc_html__( 'Icon Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Widget Background', 'coaching' ),
			'param_name'  => 'widget_background',
			'value'       => array(
				esc_html__( 'None', 'coaching' )                         => 'none',
				esc_html__( 'Background Color', 'coaching' )             => 'bg_color',
				esc_html__( 'Image Background Bellow Icon', 'coaching' ) => 'bg_image',
			),
			'group'       => esc_html__( 'Layout Settings', 'coaching' ),
		),
		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Background Color', 'coaching' ),
			'param_name'  => 'bg_title',
			'value'       => '',
			'description' => esc_html__( 'Select the color background for title.', 'coaching' ),
		),

		array(
			'type'        => 'attach_image',
			'admin_label' => false,
			'heading'     => esc_html__( 'Upload Image Background Bellow Icon', 'coaching' ),
			'param_name'  => 'icon_img_background',
			'description' => esc_html__( 'Select Upload Image Background Bellow Icon.', 'coaching' ),
			'dependency'  => array(
				'element' => 'widget_background',
				'value'   => 'bg_image',
			),
			'group'       => esc_html__( 'Layout Settings', 'coaching' ),
		),

		// Extra class
		array(
			'type'        => 'textfield',
			'admin_label' => false,
			'heading'     => esc_html__( 'Extra class', 'coaching' ),
			'param_name'  => 'el_class',
			'value'       => '',
			'description' => esc_html__( 'Add extra class name that will be applied to the icon box, and you can use this class for your customizations.', 'coaching' ),
		),

	)
) );