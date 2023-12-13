<?php

class Thim_Login_Form_Widget extends Thim_Widget {

	function __construct() {
		parent::__construct(
			'login-form',
			esc_html__( 'Thim: Login Form', 'coaching' ),
			array(
				'description'   => esc_html__( 'Add login form', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
				'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'captcha' => array(
					'type'        => 'radio',
					'label'       => esc_html__( 'Captcha', 'coaching' ),
					'description' => esc_html__( 'Use captcha in register form', 'coaching' ),
					'default'     => 'no',
					'options'     => array(
						'no'  => esc_html__( 'No', 'coaching' ),
						'yes' => esc_html__( 'Yes', 'coaching' ),
					)
				),
			),
			THIM_DIR . 'inc/widgets/login-form/'
		);
	}

	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}

}

function thim_login_form_widget() {
	register_widget( 'Thim_Login_Form_Widget' );
}

add_action( 'widgets_init', 'thim_login_form_widget' );