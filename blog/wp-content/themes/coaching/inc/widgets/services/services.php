<?php

class Thim_Services_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'services',
			esc_html__( 'Thim: Services', 'coaching' ),
			array(
				'description'   => esc_html__( 'Add Service box', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
			),
			array(),

			array(

                'service' => array(
                    'type' => 'repeater',
                    'label' => esc_html__('service list', 'coaching'),
                    'item_name' => esc_html__('Service box', 'coaching'),

                    'fields' => array(
                        'service_title' => array(
                            'type' => 'text',
                            'label' => esc_html__('Service Title', 'coaching'),
                            'allow_html_formatting' => true,
                        ),

                        'service_image'     =>  array(
                            'type'        =>  'media',
                            'label'       =>  esc_html__( 'Image Of Box', 'coaching' ),
                            'description' =>  esc_html__( 'Select image from media library.', 'coaching' ),
                        ),
                        'service_link'                   => array(
                            "type"        => "text",
                            "label"       => esc_html__( "Add Link", 'coaching' ),
                            "description" => esc_html__( "Provide the link that will be applied to this service box.", 'coaching' ),
                        ),
                        'service_bg_color'        => array(
                            'type'        => 'color',
                            'default'     => '#ff9b9a',
                            'label'       => esc_html__( 'Background Overlay Color', 'coaching' ),
                            'description' => esc_html__( 'Select the background color.', 'coaching' ),
                            'class'       => 'color-mini',
                        ),
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

function thim_services_register_widget() {
	register_widget( 'Thim_Services_Widget' );
}

add_action( 'widgets_init', 'thim_services_register_widget' );