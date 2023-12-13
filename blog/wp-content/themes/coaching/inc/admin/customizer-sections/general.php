<?php
/**
 * Panel General
 * 
 * @package Coaching
 */

thim_customizer()->add_panel(
	array(
		'id'       => 'general',
		'priority' => 10,
		'title'    => esc_html__( 'General', 'coaching' ),
		'icon'     => 'dashicons-admin-generic',
	)
);