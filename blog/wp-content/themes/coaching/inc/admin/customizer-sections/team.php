<?php
/**
 * Panel Event
 * 
 * @package Coaching
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'team',
        'priority' => 50,
        'title'    => esc_html__( 'Teams', 'coaching' ),
        'icon'     => 'dashicons-groups',
    )
);