<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

vc_map( array(
	'name'        => esc_html__( 'Thim: Carousel Posts', 'coaching' ),
	'base'        => 'thim-carousel-post',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Show Carousel Posts', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-carousel-posts',
	'params'      => array(
		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Button Text', 'coaching' ),
			'param_name'  => 'title',
		),
        //Select Category
        array(
            'type'       => 'dropdown',
            'heading'    => esc_html__( 'Select Category', 'coaching' ),
            'param_name' => 'cat_id',
            'std'        => 'all',
            'value'      => thim_sc_get_categories(),
        ),
        //Posts visible
        array(
            'type'        => 'number',
            'admin_label' => true,
            'heading'     => esc_html__( 'Posts visible', 'coaching' ),
            'param_name'  => 'visible_post',
            'std'         => '3',
        ),
        //Number posts
        array(
            'type'        => 'number',
            'admin_label' => true,
            'heading'     => esc_html__( 'Number posts', 'coaching' ),
            'param_name'  => 'number_posts',
            'std'         => '6',
        ),
        //Show Navigation
        array(
            'type'        => 'dropdown',
            'admin_label' => true,
            'heading'     => esc_html__( 'Show Navigation', 'coaching' ),
            'param_name'  => 'show_nav',
            'value'       => array(
                esc_html__( 'Select', 'coaching' ) => '',
                esc_html__( 'Yes', 'coaching' )    => 'yes',
                esc_html__( 'No', 'coaching' )     => 'no',
            ),
            'group'       => esc_html__( 'Slider Settings', 'coaching' ),
        ),
        //Show Pagination
        array(
            'type'        => 'dropdown',
            'admin_label' => true,
            'heading'     => esc_html__( 'Show Pagination', 'coaching' ),
            'param_name'  => 'show_pagination',
            'value'       => array(
                esc_html__( 'Select', 'coaching' ) => '',
                esc_html__( 'Yes', 'coaching' )    => 'yes',
                esc_html__( 'No', 'coaching' )     => 'no',
            ),
            'group'       => esc_html__( 'Slider Settings', 'coaching' ),
        ),
        //Order by
        array(
            'type'        => 'dropdown',
            'admin_label' => true,
            'heading'     => esc_html__( 'Order by', 'coaching' ),
            'param_name'  => 'orderby',
            'value'       => array(
                esc_html__( 'Select', 'coaching' )  => '',
                esc_html__( 'Popular', 'coaching' ) => 'popular',
                esc_html__( 'Recent', 'coaching' )  => 'recent',
                esc_html__( 'Title', 'coaching' )   => 'title',
                esc_html__( 'Random', 'coaching' )  => 'random',
            ),
        ),
        //Order
        array(
            'type'        => 'dropdown',
            'admin_label' => true,
            'heading'     => esc_html__( 'Order', 'coaching' ),
            'param_name'  => 'order',
            'value'       => array(
                esc_html__( 'Select', 'coaching' ) => '',
                esc_html__( 'ASC', 'coaching' )    => 'asc',
                esc_html__( 'DESC', 'coaching' )   => 'desc',
            ),
        ),
        // Extra class
        array(
            'type'        => 'textfield',
            'admin_label' => false,
            'heading'     => esc_html__( 'Extra class', 'coaching' ),
            'param_name'  => 'el_class',
            'value'       => '',
            'description' => esc_html__( 'Add extra class name that will be applied to the shortcode, and you can use this class for your customizations.', 'coaching' ),
        ),

	)
) );