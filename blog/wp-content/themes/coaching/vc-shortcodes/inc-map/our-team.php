<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(
    'name'        => esc_html__( 'Thim: Our Team', 'coaching' ),
    'base'        => 'thim-our-team',
    'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
    'description' => esc_html__( 'Add Our Team', 'coaching' ),
    'icon'        => 'thim-widget-icon thim-widget-icon-our-team',
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
            'heading'     => esc_html__( 'Select Category', 'coaching' ),
            'param_name'  => 'cat_id',
            'value'       =>  thim_get_cat_taxonomy( 'our_team_category', array( 'all' => esc_html__( 'All', 'coaching' ) ), true  ),
        ),

        array(
            'type'        => 'number',
            'admin_label' => true,
            'heading'     => esc_html__( 'Number Posts', 'coaching' ),
            'param_name'  => 'number_post',
            'std'         => '5',
        ),

        array(
            'type'        => 'dropdown',
            'admin_label' => true,
            'heading'     => esc_html__( 'Layout', 'coaching' ),
            'param_name'  => 'layout',
            'value'       => array(
                esc_html__( 'Default', 'coaching' ) => 'base',
                esc_html__( 'Layout Busines', 'coaching' )  => 'layout-business',
            ),
            'std'         => 'base',
        ),

        array(
            'type'        => 'dropdown',
            'admin_label' => true,
            'heading'     => esc_html__( 'Columns', 'coaching' ),
            'param_name'  => 'columns',
            'value'       => array(
                esc_html__( 'Select', 'coaching' ) => '',
                esc_html__( '1 Column', 'coaching' ) => '1',
                esc_html__( '2 Columns', 'coaching' ) => '2',
                esc_html__( '3 Columns', 'coaching' ) => '3',
                esc_html__( '4 Columns', 'coaching' ) => '4',
            ),
            'std'         => '1',
        ),

        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Text Link', 'coaching' ),
            'param_name'  => 'text_link',
            'value'       => '',
            'description' => esc_html__( 'Provide the text link that will be applied to box our team.', 'coaching' ),
            'std'         => '',
        ),

        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Link Join Team', 'coaching' ),
            'param_name'  => 'link',
            'value'       => '',
            'description' => esc_html__( 'Provide the link that will be applied to box our team', 'coaching' ),
            'std'         => '',
        ),

        array(
            'type'        => 'checkbox',
            'admin_label' => true,
            'heading'     => esc_html__( 'Enable Link To Member', 'coaching' ),
            'param_name'  => 'link_member',
            //'value'       => array( esc_html__( '', 'coaching' ) => 'yes' ),
            'std'         => false,
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