<?php
/**
 * Panel Footer
 * 
 * @package Coaching
 */

thim_customizer()->add_panel(
	array(
		'id'       => 'footer',
		'priority' => 60,
		'title'    => esc_html__( 'Footer', 'coaching' ),
		'icon'     => 'dashicons-align-right',
	)
);
