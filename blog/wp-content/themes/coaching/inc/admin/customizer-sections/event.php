<?php
/**
 * Panel Event
 * 
 * @package Coaching
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'event',
        'priority' => 45,
        'title'    => esc_html__( 'Events', 'coaching' ),
        'icon'     => 'dashicons-calendar',
    )
);