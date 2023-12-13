<?php

class Thim_Video_Popup_Widget extends Thim_Widget {

    function __construct() {

        parent::__construct(
            'video-popup',
            esc_html__( 'Thim: Video popup', 'coaching' ),
            array(
                'description'           => esc_html__( 'Video popup', 'coaching' ),
                'help'                  => '',
                'panels_groups'         => array( 'thim_widget_group' )
            ),
            array(),
            array(
                'title'                   =>  array(
                    'type'                =>  'text',
                    'label'               =>  esc_html__( 'Title', 'coaching' ),
                    'default'             =>  ''
                ),
                'content' => array(
                    "type"  => "textarea",
                    "label" => esc_html__( "Content", 'coaching' ),
                    "allow_html_formatting"=>true
                ),
                'panel_image' => array(
                    'type'        => 'media',
                    'label'       => esc_html__( 'Image Thumbnail', 'coaching' ),
                    'description' => esc_html__( 'Select image from media library.', 'coaching' )
                ),
                'url_video'                   =>  array(
                    'type'                =>  'text',
                    'label'               =>  esc_html__( 'URL Video', 'coaching' ),
                    'description'           => esc_html__( 'http://www.youtube.com/embed/xxxxxxxxxxx', 'coaching' ),
                    'default'             =>  ''
                ),
            )
        );
    }

    function get_template_name( $instance ) {
        return 'base';
    }

    function get_style_name( $instance ) {
        return false;
    }
}

function thim_video_popup_widget() {
    register_widget( 'Thim_Video_Popup_Widget' );
}

add_action( 'widgets_init', 'thim_video_popup_widget' );