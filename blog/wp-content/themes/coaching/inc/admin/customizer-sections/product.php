<?php
/**
 * Panel Product
 * 
 * @package Coaching
 */

thim_customizer()->add_panel(
    array(
        'id'       => 'product',
        'priority' => 44,
        'title'    => esc_html__( 'Products', 'coaching' ),
        'icon'     => 'dashicons-cart',
    )
);