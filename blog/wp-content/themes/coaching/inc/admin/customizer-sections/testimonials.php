<?php
/**
 * Panel Event
 * 
 * @package Coaching
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'testimonial',
        'priority' => 50,
        'title'    => esc_html__( 'Testimonials', 'coaching' ),
        'icon'     => 'dashicons-welcome-write-blog',
    )
);