<?php

class Thim_Slider_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'slider',
			esc_html__( 'Thim: Slider', 'coaching' ),
			array(
				'description'   => esc_html__( 'Thim Slider', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon' => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'thim_slider_frames'  => array(
					'type'      => 'repeater',
					'label'     => esc_html__( 'Slider Frames', 'coaching' ),
					'item_name' => esc_html__( 'Frame', 'coaching' ),
					'fields'    => array(
						'thim_slider_background_image' => array(
							'type'    => 'media',
							'library' => 'image',
							'label'   => esc_html__( 'Background Image', 'coaching' ),
						),
						'color_overlay'                => array(
							'type'  => 'color',
							'label' => esc_html__( 'Color Overlay images', 'coaching' ),
						),
						'thim_slider_items'  => array(
							'type'      => 'repeater',
							'label'     => esc_html__( 'Slider Items', 'coaching' ),
							'item_name' => esc_html__( 'Items', 'coaching' ),
							'fields'    => array(
								'thim_slider_item_type'        => array(
									"type"          => "select",
									"label"         => esc_html__( "Type Content", 'coaching' ),
									"default"       => "inputbox",
									"options"       => array(
										"inputbox" => esc_html__( "Input box", 'coaching' ),
										"texarea"  => esc_html__( "Texarea", 'coaching' ),
										"button"  => esc_html__( "Button", 'coaching' ),
										"image"  => esc_html__( "Image", 'coaching' )
									),
									"description"   => esc_html__( "Select type of content.", 'coaching' ),
									'state_emitter' => array(
										'callback' => 'select',
										'args'     => array( 'field_thim_slider_item_type_{$repeater}' )
									)
								),
								'thim_slider_item_title_text'       => array(
									'type'                  => 'text',
									'label'                 => esc_html__( 'Content', 'coaching' ),
									'state_handler' => array(
										'field_thim_slider_item_type_{$repeater}[inputbox]' => array('show'),
										'_else[field_thim_slider_item_type_{$repeater}]' => array( 'hide' ),
									),
								),
								'thim_slider_item_title_textarea'       => array(
									'type'                  => 'textarea',
									'label'                 => esc_html__( 'Content', 'coaching' ),
									'state_handler' => array(
										'field_thim_slider_item_type_{$repeater}[textarea]' => array('show'),
										'_else[field_thim_slider_item_type_{$repeater}]' => array( 'hide' ),
									),
								),
								'thim_slider_item_title_button_text'       => array(
									'type'                  => 'text',
									'label'                 => esc_html__( 'Button text', 'coaching' ),
									'state_handler' => array(
										'field_thim_slider_item_type_{$repeater}[button]' => array('show'),
										'_else[field_thim_slider_item_type_{$repeater}]' => array( 'hide' ),
									),
								),
								'thim_slider_item_title_button_link'       => array(
									'type'                  => 'text',
									'label'                 => esc_html__( 'Button link', 'coaching' ),
									'state_handler' => array(
										'field_thim_slider_item_type_{$repeater}[button]' => array('show'),
										'_else[field_thim_slider_item_type_{$repeater}]' => array( 'hide' ),
									),
								),
								'thim_slider_item_title_image'       => array(
									'type'                  => 'multimedia',
									'label'                 => esc_html__( 'Content', 'coaching' ),
									'state_handler' => array(
										'field_thim_slider_item_type_{$repeater}[image]' => array('show'),
										'_else[field_thim_slider_item_type_{$repeater}]' => array( 'hide' ),
									),
								),
								'thim_slider_item_delay'       => array(
									'type'    => 'select',
									'label'   => esc_html__( 'Title Delay:', 'coaching' ),
									'options' => array(
										'delay1'   => esc_html__( '1000', 'coaching' ),
										'delay2'   => esc_html__( '2000', 'coaching' ),
										'delay3'   => esc_html__( '3000', 'coaching' ),
										'delay4'   => esc_html__( '4000', 'coaching' ),
									),
								),
								'thim_slider_item_animate'       => array(
									'type'    => 'select',
									'label'   => esc_html__( 'Title Animate:', 'coaching' ),
									'options' => array(
										'bounceIn'   => esc_html__( 'bounceIn', 'coaching' ),
										'bounceInRight'  => esc_html__( 'bounceInRight', 'coaching' ),
										'bounceInLeft'  => esc_html__( 'bounceInLeft', 'coaching' ),
										'bounceInUp'  => esc_html__( 'bounceInUp', 'coaching' ),
										'bounceInDown'  => esc_html__( 'bounceInDown', 'coaching' ),
										'fadeIn'  => esc_html__( 'fadeIn', 'coaching' ),
										'growIn'  => esc_html__( 'growIn', 'coaching' ),
										'shake'  => esc_html__( 'shake', 'coaching' ),
										'shakeUp'  => esc_html__( 'shakeUp', 'coaching' ),
										'fadeInLeft'  => esc_html__( 'fadeInLeft', 'coaching' ),
										'fadeInRight' => esc_html__( 'fadeInRight', 'coaching' ),
										'fadeInUp' => esc_html__( 'fadeInUp', 'coaching' ),
										'fadeInDown' => esc_html__( 'fadeInDown', 'coaching' ),
										'rotateIn' => esc_html__( 'rotateIn', 'coaching' ),
										'rotateInUpLeft' => esc_html__( 'rotateInUpLeft', 'coaching' ),
										'rotateInDownLeft' => esc_html__( 'rotateInDownLeft', 'coaching' ),
										'rotateInUpRight' => esc_html__( 'rotateInUpRight', 'coaching' ),
										'rotateInDownRight' => esc_html__( 'rotateInDownRight', 'coaching' ),
										'rollIn' => esc_html__( 'rollIn', 'coaching' ),
										'wiggle' => esc_html__( 'wiggle', 'coaching' ),
										'swing' => esc_html__( 'swing', 'coaching' ),
										'tada' => esc_html__( 'tada', 'coaching' ),
										'wobble' => esc_html__( 'wobble', 'coaching' ),
										'pulse' => esc_html__( 'pulse', 'coaching' ),
										'lightSpeedInRight' => esc_html__( 'lightSpeedInRight', 'coaching' ),
										'lightSpeedInLeft' => esc_html__( 'lightSpeedInLeft', 'coaching' ),
										'flip' => esc_html__( 'flip', 'coaching' ),
										'flipInX' => esc_html__( 'flipInX', 'coaching' ),
										'flipInY' => esc_html__( 'flipInY', 'coaching' ),
									),
								),
								'thim_slider_item_class'       => array(
									'type'                  => 'text',
									'label'                 => esc_html__( 'Class', 'coaching' ),
								),
							),
						),
					),
				),
				'thim_slider_height'       => array(
					'type'        => 'number',
					'label'                 => esc_html__( 'Height', 'coaching' ),
					'description' => esc_html__( 'Height of slider.', 'coaching' ),
					'default'     => 500,
				),
				'slider_autoplay'  => array(
					'type'    => 'checkbox',
					'label'   => esc_html__( 'Auto play', 'coaching' ),
					'default' => true
				),
				'thim_slider_timeout' => array(
					'type'        => 'number',
					'label'       => esc_html__( 'Timeout', 'coaching' ),
					'description' => esc_html__( 'How long each slide is displayed for in milliseconds.', 'coaching' ),
					'default'     => 9000,
				),
				'slider_control'  => array(
					'type'    => 'checkbox',
					'label'   => esc_html__( 'Show Control', 'coaching' ),
					'default' => false
				),
				'slider_bullets'  => array(
					'type'    => 'checkbox',
					'label'   => esc_html__( 'Show Bullets', 'coaching' ),
					'default' => false
				),
			),
			THIM_DIR . 'inc/widgets/slider/'
		);
	}

	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}

	/**
	 * Enqueue the slider scripts
	 */
	function enqueue_frontend_scripts() {
		wp_enqueue_script( 'thim-slider', THIM_URI . 'inc/widgets/slider/js/slider.js', array( 'jquery' ), '', true );
	}
}

function thim_slider_register_widget() {
	register_widget( 'Thim_Slider_Widget' );
}

add_action( 'widgets_init', 'thim_slider_register_widget' );