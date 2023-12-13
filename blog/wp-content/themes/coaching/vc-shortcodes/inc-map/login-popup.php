<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(
    'name'        => esc_html__( 'Thim: Login Popup', 'coaching' ),
    'base'        => 'thim-login-popup',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Add Login popup', 'coaching' ),
    'icon'        => 'thim-widget-icon thim-widget-icon-login-form',
    'params'      => array(
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Title', 'coaching' ),
            'param_name'  => 'title',
            'description' => esc_html__( 'Provide the title for this box.', 'coaching' ),
        ),
        array(
            'type'        => 'dropdown',
            'admin_label' => false,
            'heading'     => esc_html__( 'Show Register Link', 'coaching' ),
            'param_name'  => 'show_register',
            'value'       => array(
                esc_html__( 'No', 'coaching' )   => 'no',
                esc_html__( 'Yes', 'coaching' )  => 'yes',
            ),
            'description' => esc_html__( 'Use captcha in register form', 'coaching' ),
        ),
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Text Login', 'coaching' ),
            'value'       => esc_html__('Login', 'coaching'),
            'param_name'  => 'text_login',
        ),
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Text Register', 'coaching' ),
            'value'       => esc_html__('Register', 'coaching'),
            'param_name'  => 'text_register',
        ),
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Text Logout', 'coaching' ),
            'value'       => esc_html__('Logout', 'coaching'),
            'param_name'  => 'text_logout',
        ),
        // Extra class
        array(
            'type'        => 'textfield',
            'admin_label' => false,
            'heading'     => esc_html__( 'Extra class', 'coaching' ),
            'param_name'  => 'el_class',
            'value'       => '',
            'description' => esc_html__( 'Add extra class name that will be applied to the box, and you can use this class for your customizations.', 'coaching' ),
        ),
    )
) );