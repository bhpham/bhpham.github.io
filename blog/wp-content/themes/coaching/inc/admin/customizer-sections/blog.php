<?php
/**
 * Panel Blog
 * 
 * @package Coaching
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'blog',
        'priority' => 42,
        'title'    => esc_html__( 'Blog', 'coaching' ),
        'icon'     => 'dashicons-welcome-write-blog',
    )
);