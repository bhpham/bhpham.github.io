<?php

class Thim_About_Me_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'about-me',
			esc_html__( 'Thim: About Me', 'coaching' ),
			array(
				'description'   => esc_html__( 'Show Infomation About Me', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'thim-widget-icon thim-widget-icon-accordion'
			),
			array(),
			array(
				'title' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Title', 'coaching' ),
					'default' => ''
				),

				'info_me' => array(
					'type'                  => 'textarea',
					'allow_html_formatting' => true,
					'label'                 => esc_html__( 'Biographical Info', 'coaching' ),
				),

				'phone' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Phone Number', 'coaching' ),
					'default' => ''
				),

				'email' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Email', 'coaching' ),
					'default' => ''
				),

				'address' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Address', 'coaching' ),
					'default' => ''
				),

				'avt_img' => array(
					"type"        => "media",
					"label"       => esc_html__( "Upload Avatar Image:", 'coaching' ),
					"description" => esc_html__( "Upload Avatar Image.", 'coaching' ),
					"class_name"  => 'custom',
				),
				'link'    => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Link', 'coaching' ),
					'default' => ''
				),

				'text_link' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Text Link', 'coaching' ),
					'default' => ''
				),

			),
			THIM_DIR . 'inc/widgets/accordion/'
		);


	}


	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}

}

function thim_about_me_register_widget() {
	register_widget( 'Thim_About_Me_Widget' );
}

add_action( 'widgets_init', 'thim_about_me_register_widget' );