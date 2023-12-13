<?php
/**
 * Panel Header
 * 
 * @package Coaching
 */


thim_customizer()->add_panel(
	array(
		'id'       => 'header',
		'priority' => 20,
		'title'    => esc_html__( 'Header', 'coaching' ),
		'icon'     => 'dashicons-align-left',
	)
);