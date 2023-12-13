<?php
/**
 * Section Settings
 *
 * @package Coaching
 */

thim_customizer()->add_section(
	array(
		'id'       => 'product_setting',
		'panel'    => 'product',
		'title'    => esc_html__( 'Settings', 'coaching' ),
		'priority' => 20,
	)
);

thim_customizer()->add_field(
	array(
		'type'     => 'select',
		'id'       => 'thim_woo_product_column',
		'label'    => esc_html__( 'Grid Columns', 'coaching' ),
		'tooltip'  => esc_html__( 'Choose the number grid columns for product.', 'coaching' ),
		'default'  => '3',
		'priority' => 10,
		'multiple' => 0,
		'section'  => 'product_setting',
		'choices'  => array(
			'2' => esc_html__( '2', 'coaching' ),
			'3' => esc_html__( '3', 'coaching' ),
			'4' => esc_html__( '4', 'coaching' ),
		),
	)
);

// Product per page
thim_customizer()->add_field(
	array(
		'id'          => 'thim_woo_product_per_page',
		'type'        => 'slider',
		'label'       => esc_html__( 'Products Per Page', 'coaching' ),
		'tooltip'     => esc_html__( 'Choose the number of products per page.', 'coaching' ),
		'priority'    => 30,
		'default'     => 9,
		'section'  => 'product_setting',
		'choices'     => array(
			'min'  => '1',
			'max'  => '20',
			'step' => '1',
		),
	)
);

// Enable or disable quick view
thim_customizer()->add_field(
	array(
		'id'       => 'thim_woo_set_show_qv',
		'type'     => 'switch',
		'label'    => esc_html__( 'Show Quick View', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you to enable or disable quick view.', 'coaching' ),
		'section'  => 'product_setting',
		'default'  => true,
		'priority' => 40,
		'choices'  => array(
			true  => esc_html__( 'On', 'coaching' ),
			false => esc_html__( 'Off', 'coaching' ),
		),
	)
);