<?php
/**
 * Panel Portfolio
 * 
 * @package Coaching
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'portfolio',
        'priority' => 50,
        'title'    => esc_html__( 'Portfolio', 'coaching' ),
        'icon'     => 'dashicons-portfolio',
    )
);