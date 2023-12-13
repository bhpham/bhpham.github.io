<?php
/**
 * Panel Course
 * 
 * @package Coaching
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'course',
        'priority' => 43,
        'title'    => esc_html__( 'Courses', 'coaching' ),
        'icon'     => 'dashicons-welcome-learn-more',
    )
);