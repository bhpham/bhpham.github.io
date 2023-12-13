<?php

class Thim_Login_Popup_Widget extends Thim_Widget {
	function __construct() {
		parent::__construct(
			'login-popup',
			esc_html__( 'Thim: Login Popup', 'coaching' ),
			array(
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'show_register'       => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Show Register Link', 'coaching' ),
					'options' => array(
						'' => esc_html__( 'No', 'coaching' ),
						'1' => esc_html__( 'Yes', 'coaching' )
					),
				),
				'text_register' => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Register Label', 'coaching' ),
					'default' => 'Register',
				),
				'text_login'    => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Login Label', 'coaching' ),
					'default' => 'Login',
				),
				'text_logout'   => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Logout Label', 'coaching' ),
					'default' => 'Logout',
				),
                'style'      => array(
                    "type"    => "select",
                    "label"   => esc_html__( "Style", 'coaching' ),
                    "options" => array(
                        ""					=> esc_html__( "Normal", 'coaching' ),
                        "layout_2" 	=> esc_html__( "Effective Style", 'coaching' ),
                        "layout_3" 	=> esc_html__( "Therapist Style", 'coaching' ),
						"layout_4" 	=> esc_html__( "Home 5 Style", 'coaching' ),
                    ),
                ),
				'shortcode'    => array(
					'type'        => 'text',
					'label'       => esc_html__( 'Shortcode', 'coaching' ),
					'description' => esc_html__( 'Enter shortcode to show in form Login', 'coaching' ),
					'default'     => '',
				)

			)
		);
	}


	/**
	 * Initialize the CTA widget
	 */


	function get_template_name( $instance ) {
        if ( isset($instance['style']) && $instance['style'] != '' ) {
            return $instance['style'];
        }
        else {
            return 'base';
        }
	}

	function get_style_name( $instance ) {
		return false;
	}

}

function thim_login_popup_widget() {
	register_widget( 'Thim_Login_Popup_Widget' );

}

add_action( 'widgets_init', 'thim_login_popup_widget' );

