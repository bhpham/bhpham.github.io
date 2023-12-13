<?php

/**
 * Widget Name: Button.
 * Author: ThimPress.
 */
class Thim_Button_Widget extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'button',
			esc_html__( 'Thim: Button', 'coaching' ),
			array(
				'description'   => esc_html__( 'Add Button', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'title'         => array(
					'type'    => 'text',
					'default' => esc_html__( 'READ MORE', 'coaching' ),
					'label'   => esc_html__( 'Button Text', 'coaching' ),
				),
				'url'           => array(
					'type'    => 'text',
					'default' => '#',
					'label'   => esc_html__( 'Destination URL', 'coaching' ),
				),
				'new_window'    => array(
					'type'    => 'checkbox',
					'default' => false,
					'label'   => esc_html__( 'Open in New Window', 'coaching' ),
				),
				'custom_style'  => array(
					'type'          => 'select',
					'label'         => esc_html__( 'Style', 'coaching' ),
					'options'       => array(
						'default'      => esc_html__( 'Default', 'coaching' ),
						'custom_style' => esc_html__( 'Custom Style', 'coaching' ),
					),
					'default'       => 'default',
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'custom_style' )
					),
				),
				'style_options' => array(
					'type'          => 'section',
					'label'         => esc_html__( 'Style Options', 'coaching' ),
					'hide'          => true,
					'state_handler' => array(
						'custom_style[custom_style]' => array( 'show' ),
						'custom_style[default]'      => array( 'hide' ),
					),
					'fields'        => array(
						// Customize Icon Color
						'font_size'          => array(
							'type'        => 'number',
							'class'       => 'color-mini',
							'label'       => esc_html__( 'Font Size ', 'coaching' ),
							'suffix'      => 'px',
							'default'     => '14',
							'description' => esc_html__( 'Select font size.', 'coaching' ),
						),
						'font_weight'        => array(
							'type'        => 'select',
							'label'       => esc_html__( 'Font Weight', 'coaching' ),
							'class'       => 'color-mini',
							'options'     => array(
								'normal' => esc_html__( 'Normal', 'coaching' ),
								'bold'   => esc_html__( 'Bold', 'coaching' ),
								'100'    => esc_html__( '100', 'coaching' ),
								'200'    => esc_html__( '200', 'coaching' ),
								'300'    => esc_html__( '300', 'coaching' ),
								'400'    => esc_html__( '400', 'coaching' ),
								'500'    => esc_html__( '500', 'coaching' ),
								'600'    => esc_html__( '600', 'coaching' ),
								'700'    => esc_html__( '700', 'coaching' ),
								'800'    => esc_html__( '800', 'coaching' ),
								'900'    => esc_html__( '900', 'coaching' )
							),
							'description' => esc_html__( 'Select Font Weight', 'coaching' ),
						),
						'border_width'       => array(
							'type'        => 'number',
							'class'       => 'color-mini',
							'label'       => esc_html__( 'Border Width ', 'coaching' ),
							'suffix'      => 'px',
							'default'     => '0',
							'description' => esc_html__( 'Enter border width.', 'coaching' ),
						),
						'color'              => array(
							'type'        => 'color',
							'class'       => 'color-mini',
							'label'       => esc_html__( 'Select Color:', 'coaching' ),
							'description' => esc_html__( 'Select the color.', 'coaching' ),
						),
						'border_color'       => array(
							'type'        => 'color',
							'label'       => esc_html__( 'Border Color:', 'coaching' ),
							'description' => esc_html__( 'Select the border color.', 'coaching' ),
							'class'       => 'color-mini',
						),
						'bg_color'           => array(
							'type'        => 'color',
							'label'       => esc_html__( 'Background Color:', 'coaching' ),
							'description' => esc_html__( 'Select the background color.', 'coaching' ),
							'class'       => 'color-mini',
						),
						'hover_color'        => array(
							'type'        => 'color',
							'label'       => esc_html__( 'Hover Color:', 'coaching' ),
							'description' => esc_html__( 'Select the color hover.', 'coaching' ),
							'class'       => 'color-mini',
						),
						'hover_border_color' => array(
							'type'        => 'color',
							'label'       => esc_html__( 'Hover Border Color:', 'coaching' ),
							'description' => esc_html__( 'Select the hover border color.', 'coaching' ),
							'class'       => 'color-mini',
						),
						'hover_bg_color'     => array(
							'type'        => 'color',
							'label'       => esc_html__( 'Hover Background Color:', 'coaching' ),
							'description' => esc_html__( 'Select the hover background color.', 'coaching' ),
							'class'       => 'color-mini',
						),
                        'custom_button_style'               => array(
                            'type'    => 'textarea',
                            'allow_html_formatting' => true,
                            'label'   => esc_html__( 'Custom Style', 'coaching' ),
                        ),
					)
				),
				'icon'          => array(
					'type'   => 'section',
					'label'  => esc_html__( 'Icon', 'coaching' ),
					'hide'   => true,
					'fields' => array(
						'icon'      => array(
							'type'        => 'icon',
							'class'       => '',
							'label'       => esc_html__( 'Select Icon:', 'coaching' ),
							'description' => esc_html__( 'Select the icon from the list.', 'coaching' ),
							'class_name'  => 'font-awesome',
						),
						// Resize the icon
						'icon_size' => array(
							'type'        => 'number',
							'class'       => '',
							'label'       => esc_html__( 'Icon Size ', 'coaching' ),
							'suffix'      => 'px',
							'default'     => '14',
							'description' => esc_html__( 'Select the icon font size.', 'coaching' ),
							'class_name'  => 'font-awesome'
						),
					),

				),
				'layout'        => array(
					'type'   => 'section',
					'label'  => esc_html__( 'Layout', 'coaching' ),
					'hide'   => true,
					'fields' => array(
						'button_size' => array(
							'type'    => 'select',
							'class'   => '',
							'label'   => esc_html__( 'Button Size', 'coaching' ),
							'options' => array(
								'normal' => esc_html__( 'Normal', 'coaching' ),
                                'regular' => esc_html__( 'Regular', 'coaching' ),
								'medium' => esc_html__( 'Medium', 'coaching' ),
								'large'  => esc_html__( 'Large', 'coaching' ),
							),
						),
						'rounding'    => array(
							'type'    => 'select',
							'class'   => '',
							'label'   => esc_html__( 'Rounding', 'coaching' ),
							'options' => array(
								''             => esc_html__( 'None', 'coaching' ),
								'very-rounded' => esc_html__( 'Very Rounded', 'coaching' ),
							),
						),
					)
				),
				
				'text_align'    => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Text Align', 'coaching' ),
					'options' => array(
						'text-left'   => esc_html__( 'Text Left', 'coaching' ),
						'text-center' => esc_html__( 'Text Center', 'coaching' ),
						'text-right'  => esc_html__( 'Text Right', 'coaching' ),
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

function thim_button_register_widget() {
	register_widget( 'Thim_Button_Widget' );
}

add_action( 'widgets_init', 'thim_button_register_widget' );