<?php
/**
 * Section Header Layout
 *
 * @package Coaching
 */

thim_customizer()->add_section(
	array(
		'id'       => 'header_layout',
		'title'    => esc_html__( 'Layouts', 'coaching' ),
		'panel'    => 'header',
		'priority' => 20,
	)
);

// Select Header Layout
thim_customizer()->add_field(
	array(
		'id'       => 'thim_header_style',
		'type'     => 'radio-image',
		'label'    => esc_html__( 'Layout', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you can select header layout for header on your site. ', 'coaching' ),
		'section'  => 'header_layout',
		'default'  => 'header_v1',
		'priority' => 10,
		'choices'  => array(
			'header_v1' => THIM_URI . 'images/header/header_life.jpg',
			'header_v2' => THIM_URI . 'images/header/header_health3.jpg',
			'header_v3' => THIM_URI . 'images/header/header_health2.jpg',
			'header_v4' => THIM_URI . 'images/header/header_health1.jpg',
		),
	)
);

// Select Header Position
thim_customizer()->add_field(
	array(
		'id'       => 'thim_header_position',
		'type'     => 'select',
		'label'    => esc_html__( 'Position', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you can select position layout for header layout. ', 'coaching' ),
		'section'  => 'header_layout',
		'priority' => 20,
		'multiple' => 0,
		'default'  => 'header_overlay',
		'choices'  => array(
			'header_default' => esc_html__( 'Default', 'coaching' ),
			'header_overlay' => esc_html__( 'Overlay', 'coaching' ),
		),
	)
);


// Background Header
thim_customizer()->add_field(
	array(
		'id'        => 'thim_bg_main_menu_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Background Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you can choose background color for your header. ', 'coaching' ),
		'section'   => 'header_layout',
		'default'   => 'rgba(255,255,255,0)',
		'priority'  => 100,
		'alpha'     => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'function' => 'css',
				'element'  => '.site-header, .site-header.header_v2 .width-navigation',
				'property' => 'background-color',
			)
		)
	)
);

// Select Header Size
thim_customizer()->add_field(
    array(
        'id'       => 'thim_header_size',
        'type'     => 'select',
        'label'    => esc_html__( 'Size', 'coaching' ),
        'tooltip'  => esc_html__( 'Allows you can select size layout for header layout. ', 'coaching' ),
        'section'  => 'header_layout',
        'priority' => 35,
        'multiple' => 0,
        'default'  => 'default',
        'choices'  => array(
            'default' => esc_html__( 'Default', 'coaching' ),
            'full_width' => esc_html__( 'Full width', 'coaching' ),
        ),
    )
);

//Custom Class
thim_customizer()->add_field(
    array(
        'type'     => 'text',
        'id'       => 'thim_header_custom_class',
        'label'    => esc_html__( 'Header Custom Class', 'coaching' ),
        'tooltip'  => esc_html__( 'Enter Header Custom Class.', 'coaching' ),
        'section'  => 'header_layout',
        'priority' => 40,
    )
);