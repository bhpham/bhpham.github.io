<?php
/**
 * Section Layout
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'       => 'content_layout',
		'panel'    => 'general',
		'title'    => esc_html__( 'Layouts', 'coaching' ),
		'priority' => 20,
	)
);

//---------------------------------------------Site-Content---------------------------------------------//

// Select Theme Content Layout
thim_customizer()->add_field(
	array(
		'id'       => 'thim_box_layout',
		'type'     => 'radio-image',
		'label'    => esc_html__( 'Site Layout', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you to choose a layout for your site.', 'coaching' ),
		'section'  => 'content_layout',
		'priority' => 20,
		'default'  => 'wide',
		'choices'  => array(
			'wide'  => THIM_URI . 'images/layout/content-full.jpg',
			'boxed' => THIM_URI . 'images/layout/content-boxed.jpg',
		),
	)
);

//------------------------------------------------Page---------------------------------------------//

// Select All Page Layout
thim_customizer()->add_field(
	array(
		'id'       => 'thim_page_layout',
		'type'     => 'radio-image',
		'label'    => esc_html__( 'Page Layouts', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you to choose a layout to display for all pages on your site.', 'coaching' ),
		'section'  => 'content_layout',
		'priority' => 66,
		'choices'  => array(
			'sidebar-left'  => THIM_URI . 'images/layout/sidebar-left.jpg',
			'full-content'  => THIM_URI . 'images/layout/body-full.jpg',
			'sidebar-right' => THIM_URI . 'images/layout/sidebar-right.jpg',
		),
	)
);

// Select All Page Size
thim_customizer()->add_field(
    array(
        'type'            => 'select',
        'id'              => 'thim_size_wrap',
        'label'           => esc_html__( 'Size Wrap', 'coaching' ),
        'default'         => 'normal',
        'section'  => 'content_layout',
        'priority'        => 80,
        'choices'         => array(
            'normal'    => esc_html__( 'Normal', 'coaching' ),
            'wide'  => esc_html__( 'Wide', 'coaching' ),
            'elementor'  => esc_html__( 'Elementor', 'coaching' ),
        ),
    )
);

thim_customizer()->add_field(
    array(
        'type'     => 'text',
        'id'       => 'thim_container_width',
        'label'    => esc_html__( 'Body Content Width', 'coaching' ),
        'section'  => 'content_layout',
        'default'  => '1340px',
        'priority' => 100,
        'active_callback' => array(
            array(
                'setting'  => 'thim_size_wrap',
                'operator' => '===',
                'value'    => 'elementor',
            ),
        ),
    )
);