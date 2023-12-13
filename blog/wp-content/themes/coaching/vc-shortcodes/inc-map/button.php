<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$defaults = array(
	'title'         => esc_html__( 'READ MORE', 'coaching' ),
	'custom_style'  => 'default',
	'font_size'     => '14',
	'font_weight'   => '',
	'border_width'  => '0',
	'icon_size'     => '14',
	'icon_position' => '',
	'button_size'   => 'normal',
	'rounding'      => '',
);

vc_map( array(
	'name'        => esc_html__( 'Thim: Button', 'coaching' ),
	'base'        => 'thim-button',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Add Button', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-button',
	'params'      => array(
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Button Text', 'coaching' ),
			'param_name'  => 'title',
			'std'         => $defaults['title'],
		),

		array(
			'type'        => 'textfield',
			'admin_label' => false,
			'heading'     => esc_html__( 'Destination URL', 'coaching' ),
			'param_name'  => 'url',
			'std'         => '#',
		),

		array(
			'type'        => 'checkbox',
			'admin_label' => false,
			'heading'     => esc_html__( 'Open in New Window', 'coaching' ),
			'param_name'  => 'new_window',
			'std'         => false,
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Style', 'coaching' ),
			'param_name'  => 'custom_style',
			'value'       => array(
				esc_html__( 'Default', 'coaching' )      => 'default',
				esc_html__( 'Custom Style', 'coaching' ) => 'custom_style',
			),
			'std'         => $defaults['custom_style']
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Font Size', 'coaching' ),
			'param_name'  => 'font_size',
			'description' => esc_html__( 'Select font size. Unit is px', 'coaching' ),
			'std'         => $defaults['font_size'],
			'dependency'  => array(
				'element' => 'custom_style',
				'value'   => 'custom_style',
			),
			'group'       => esc_html__( 'Custom Settings', 'coaching' ),
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Font Weight', 'coaching' ),
			'param_name'  => 'font_weight',
			'description' => esc_html__( 'Select Custom Font Weight', 'coaching' ),
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
				'element' => 'custom_style',
				'value'   => 'custom_style',
			),
			'group'       => esc_html__( 'Custom Settings', 'coaching' ),
			'std'         => $defaults['font_weight']
		),

		array(
			'type'        => 'textfield',
			'admin_label' => false,
			'heading'     => esc_html__( 'Border Width', 'coaching' ),
			'description' => esc_html__( 'Enter border width.', 'coaching' ),
			'param_name'  => 'border_width',
			'dependency'  => array(
				'element' => 'custom_style',
				'value'   => 'custom_style',
			),
			'group'       => esc_html__( 'Custom Settings', 'coaching' ),
			'std'         => $defaults['border_width']
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Color', 'coaching' ),
			'param_name'  => 'color',
			'description' => esc_html__( 'Select the text color.', 'coaching' ),
			'dependency'  => array(
				'element' => 'custom_style',
				'value'   => 'custom_style',
			),
			'group'       => esc_html__( 'Custom Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Border color', 'coaching' ),
			'param_name'  => 'border_color',
			'description' => esc_html__( 'Select the border color.', 'coaching' ),
			'dependency'  => array(
				'element' => 'custom_style',
				'value'   => 'custom_style',
			),
			'group'       => esc_html__( 'Custom Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Select background color', 'coaching' ),
			'param_name'  => 'bg_color',
			'description' => esc_html__( 'Select the background color.', 'coaching' ),
			'dependency'  => array(
				'element' => 'custom_style',
				'value'   => 'custom_style',
			),
			'group'       => esc_html__( 'Custom Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Hover color', 'coaching' ),
			'param_name'  => 'hover_color',
			'description' => esc_html__( 'Select the hover text color.', 'coaching' ),
			'dependency'  => array(
				'element' => 'custom_style',
				'value'   => 'custom_style',
			),
			'group'       => esc_html__( 'Custom Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Hover border color', 'coaching' ),
			'param_name'  => 'hover_border_color',
			'description' => esc_html__( 'Select the hover border color.', 'coaching' ),
			'dependency'  => array(
				'element' => 'custom_style',
				'value'   => 'custom_style',
			),
			'group'       => esc_html__( 'Custom Settings', 'coaching' ),
		),

		array(
			'type'        => 'colorpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Hover background color', 'coaching' ),
			'param_name'  => 'hover_bg_color',
			'description' => esc_html__( 'Select the hover background color.', 'coaching' ),
			'dependency'  => array(
				'element' => 'custom_style',
				'value'   => 'custom_style',
			),
			'group'       => esc_html__( 'Custom Settings', 'coaching' ),
		),

		array(
			'type'        => 'iconpicker',
			'admin_label' => false,
			'heading'     => esc_html__( 'Select icon', 'coaching' ),
			'param_name'  => 'icon',
			'value'       => '',
			'description' => esc_html__( 'Select the icon', 'coaching' ),
		),

		array(
			'type'        => 'number',
			'admin_label' => false,
			'heading'     => esc_html__( 'Icon size.', 'coaching' ),
			'param_name'  => 'icon_size',
			'description' => esc_html__( 'Select the icon font size. Unit is px', 'coaching' ),
			'std'         => $defaults['icon_size']
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Icon Position', 'coaching' ),
			'param_name'  => 'icon_position',
			'value'       => array(
				esc_html__( 'Select', 'coaching' )      => '',
				esc_html__( 'Before text', 'coaching' ) => 'before',
				esc_html__( 'After text', 'coaching' )  => 'after',
			),
			'std'         => $defaults['icon_position']
		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Layout', 'coaching' ),
			'param_name'  => 'button_size',
			'value'       => array(
				esc_html__( 'Normal', 'coaching' ) => 'normal',
                esc_html__( 'Regular', 'coaching' )  => 'regular',
				esc_html__( 'Medium', 'coaching' ) => 'medium',
				esc_html__( 'Large', 'coaching' )  => 'large',
			),
			'std'         => $defaults['button_size']

		),

		array(
			'type'        => 'dropdown',
			'admin_label' => false,
			'heading'     => esc_html__( 'Rounding', 'coaching' ),
			'param_name'  => 'rounding',
			'value'       => array(
				esc_html__( 'None', 'coaching' )         => '',
				esc_html__( 'Very Rounded', 'coaching' ) => 'very-rounded',
			),
			'std'         => $defaults['rounding']
		),

        array(
            'type'        => 'dropdown',
            'admin_label' => false,
            'heading'     => esc_html__( 'Text Align', 'coaching' ),
            'param_name'  => 'text_align',
            'value'       => array(
                esc_html__( 'Text Left', 'coaching' )         => 'text-left',
                esc_html__( 'Text Center', 'coaching' )       => 'text-center',
                esc_html__( 'Text Right', 'coaching' )         => 'text-right',
            ),
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