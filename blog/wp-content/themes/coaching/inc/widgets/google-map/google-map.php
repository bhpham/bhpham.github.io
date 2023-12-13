<?php

class Thim_Google_Map_Widget extends Thim_Widget {

    function __construct() {
        parent::__construct(
            'google-map',
            esc_html__( 'Thim: Google Maps', 'coaching' ),
            array(
                'description'   => esc_html__( 'A Google Maps widget.', 'coaching' ),
                'help'          => '',
                'panels_groups' => array( 'thim_widget_group' ),
                'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
            ),
            array(),
            array(

                'type_map' => array(
                    'type'          => 'select',
                    'label'         => esc_html__( 'Get Map By', 'coaching' ),
                    'options'       => array(
                        ''  => esc_html__( 'Default', 'coaching' ),
                        'multi_address' => esc_html__( 'Multi Address', 'coaching' ),
                        'layout-1' => esc_html__( 'Layout 1', 'coaching' ),
                    ),
                    'default'       => '',
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args'     => array( 'type_map' )
                    ),
                ),

                'display_by' => array(
                    'type'          => 'select',
                    'label'         => esc_html__( 'Get Map By', 'coaching' ),
                    'options'       => array(
                        'address'  => esc_html__( 'Address', 'coaching' ),
                        'location' => esc_html__( 'Coordinates', 'coaching' ),
                    ),
                    'default'       => 'address',
                    'state_emitter' => array(
                        'callback' => 'select',
                        'args'     => array( 'display_by' )
                    ),
                ),

                'location'   => array(
                    'type'          => 'section',
                    'label'         => esc_html__( 'Coordinates', 'coaching' ),
                    'hide'          => true,
                    "class"         => "clear-both",
                    'state_handler' => array(
                        'display_by[address]'  => array( 'hide' ),
                        'display_by[location]' => array( 'show' ),
                    ),
                    'fields'        => array(
                        'lat' => array(
                            'type'    => 'text',
                            'label'   => esc_html__( 'Lat', 'coaching' ),
                            'default' => '41.868626',
                        ),
                        'lng' => array(
                            'type'    => 'text',
                            'label'   => esc_html__( 'Lng', 'coaching' ),
                            'default' => '-74.104301',
                        ),
                    ),
                ),

                'map_center' => array(
                    'type'          => 'textarea',
                    'rows'          => 2,
                    'label'         => esc_attr__( 'Map center', 'coaching' ),
                    'description'   => esc_attr__( 'The name of a place, town, city, or even a country. Can be an exact address too.', 'coaching' ),
                    'state_handler' => array(
                        'display_by[address]'  => array( 'show' ),
                        'display_by[location]' => array( 'hide' ),
                    ),
                ),

                'api_key'      => array(
                    'type'  => 'text',
                    'label' => esc_html__( 'Google Map API Key', 'coaching' ),
                    'description' =>  esc_html__( 'Enter your Google Map API Key. Refer on https://developers.google.com/maps/documentation/javascript/get-api-key#get-an-api-key', 'coaching' )
                ),


                'settings'   => array(
                    'type'        => 'section',
                    'label'       => esc_html__( 'Settings', 'coaching' ),
                    'hide'        => false,
                    'description' => esc_html__( 'Set map display options.', 'coaching' ),
                    'fields'      => array(
                        'height'      => array(
                            'type'    => 'text',
                            'default' => 480,
                            'label'   => esc_html__( 'Height', 'coaching' )
                        ),

                        'zoom'        => array(
                            'type'        => 'slider',
                            'label'       => esc_html__( 'Zoom level', 'coaching' ),
                            'description' => esc_html__( 'A value from 0 (the world) to 21 (street level).', 'coaching' ),
                            'min'         => 0,
                            'max'         => 21,
                            'default'     => 12,
                            'integer'     => true,

                        ),
                        'scroll_zoom' => array(
                            'type'        => 'checkbox',
                            'default'     => true,
                            'state_name'  => 'interactive',
                            'label'       => esc_html__( 'Scroll to zoom', 'coaching' ),
                            'description' => esc_html__( 'Allow scrolling over the map to zoom in or out.', 'coaching' )
                        ),
                        'draggable'   => array(
                            'type'        => 'checkbox',
                            'default'     => true,
                            'state_name'  => 'interactive',
                            'label'       => esc_html__( 'Draggable', 'coaching' ),
                            'description' => esc_html__( 'Allow dragging the map to move it around.', 'coaching' )
                        )
                    )
                ),
                'markers'    => array(
                    'type'        => 'section',
                    'label'       => esc_html__( 'Markers', 'coaching' ),
                    'hide'        => true,
                    'description' => esc_html__( 'Use markers to identify points of interest on the map.', 'coaching' ),
                    'fields'      => array(
                        'marker_at_center' => array(
                            'type'    => 'checkbox',
                            'default' => true,
                            'label'   => esc_html__( 'Show marker at map center', 'coaching' )
                        ),
                        'marker_icon'      => array(
                            'type'        => 'media',
                            'default'     => '',
                            'label'       => esc_html__( 'Marker Icon', 'coaching' ),
                            'description' => esc_html__( 'Replaces the default map marker with your own image.', 'coaching' )
                        ),

                        'marker_positions' => array(
                            'type'      => 'repeater',
                            'label'     => esc_html__( 'Marker positions', 'coaching' ),
                            'item_name' => esc_html__( 'Marker', 'coaching' ),
                            'fields'    => array(
                                'place' => array(
                                    'type'  => 'textarea',
                                    'rows'  => 2,
                                    'label' => esc_html__( 'Place', 'coaching' ),
                                    'state_handler' => array(
                                        'type_map[multi_address]'  => array( 'show' ),
                                        'type_map[]' => array( 'show' ),
                                        'type_map[layout-1]'  => array( 'hide' ),
                                    ),

                                ),
                                'title_place'      => array(
                                    'type'  => 'text',
                                    'label' => esc_html__( 'Title Place', 'coaching' ),
                                    'hide'          => true,
                                    'state_handler' => array(
                                        'type_map[multi_address]'  => array( 'show' ),
                                        'type_map[]' => array( 'hide' ),
                                        'type_map[layout-1]'  => array( 'hide' ),
                                    ),
                                ),
                                'content_place' => array(
                                    'type'          => 'textarea',
                                    'rows'          => 5,
                                    'label'         => esc_attr__( 'Content Place', 'coaching' ),
                                    'description'   => '',
                                    'state_handler' => array(
                                        'type_map[multi_address]'  => array( 'show' ),
                                        'type_map[layout-1]'  => array( 'show' ),
                                        'type_map[]' => array( 'hide' ),
                                    ),
                                    "allow_html_formatting"=>true,
                                ),
                            )
                        )
                    )
                ),
            )
        );
    }

    function enqueue_frontend_scripts() {
        wp_enqueue_script( 'thim-google-map', THIM_URI . 'inc/widgets/google-map/js/js-google-map.js', array( 'jquery' ), THIM_THEME_VERSION, true );
    }

    function get_template_name( $instance ) {
        return 'base';
    }

    function get_style_name( $instance ) {
        return false;
    }

    function get_template_variables( $instance, $args ) {
        $settings = $instance['settings'];
        $markers  = $instance['markers'];
        $mrkr_src = wp_get_attachment_image_src( $instance['markers']['marker_icon'] );
        $map_id = isset($instance['map_center']) ? $instance['map_center'] : '';
        $api_key = ( !empty( $instance['api_key'] ) ) ? $instance['api_key'] : '';
        {
            return array(
                'map_id'   => md5( $map_id ),
                'height'   => $settings['height'],
                'map_data' => array(
                    'display_by'       => ( isset( $instance['display_by'] ) && $instance['display_by'] != 'address' ) ? $instance['display_by'] : 'address',
                    'lat'              => isset( $instance['location']['lat'] ) ? $instance['location']['lat'] : 41.956750,
                    'lng'              => isset( $instance['location']['lng'] ) ? $instance['location']['lng'] : - 74.545448,
                    'address'          =>  isset($instance['map_center']) ? $instance['map_center'] : '',
                    'zoom'             => $settings['zoom'],
                    'scroll-zoom'      => $settings['scroll_zoom'],
                    'draggable'        => $settings['draggable'],
                    'marker-icon'      => ! empty( $mrkr_src ) ? $mrkr_src[0] : '',
                    'marker-at-center' => $markers['marker_at_center'],
                    'marker-positions' => isset( $markers['marker_positions'] ) ? json_encode( $markers['marker_positions'] ) : '',
                    'api-key'           => $api_key
                )
            );
        }
    }
}

function thim_google_map_widget() {
    register_widget( 'Thim_Google_Map_Widget' );
}

add_action( 'widgets_init', 'thim_google_map_widget' );