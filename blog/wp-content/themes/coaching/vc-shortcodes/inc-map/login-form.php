<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(
    'name'        => esc_html__( 'Thim: Login Form', 'coaching' ),
    'base'        => 'thim-login-form',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Add Login Form', 'coaching' ),
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
            'admin_label' => true,
            'heading'     => esc_html__( 'Captcha', 'coaching' ),
            'param_name'  => 'captcha',
            'value'       => array(
                esc_html__( 'No', 'coaching' )   => 'no',
                esc_html__( 'Yes', 'coaching' )  => 'yes',
            ),
            'description' => esc_html__( 'Use captcha in register form', 'coaching' ),
        ),
        // Extra class
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Extra class', 'coaching' ),
            'param_name'  => 'el_class',
            'value'       => '',
            'description' => esc_html__( 'Add extra class name that will be applied to the box, and you can use this class for your customizations.', 'coaching' ),
        ),
    )
) );