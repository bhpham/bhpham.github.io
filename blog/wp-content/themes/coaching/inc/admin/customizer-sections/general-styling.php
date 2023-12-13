<?php
/**
 * Section Styling
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'       => 'general_styling',
		'panel'    => 'general',
		'title'    => esc_html__( 'Styling', 'coaching' ),
		'priority' => 35,
	)
);

// Select Theme Primary Colors
thim_customizer()->add_field(
	array(
		'id'        => 'thim_body_primary_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Primary Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you to choose a primary color for your site.', 'coaching' ),
		'section'   => 'general_styling',
		'priority'  => 10,
		'alpha'     => true,
		'default'   => '#2e8ece',
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'function' => 'style',
				'element'  => '',
				'property' => 'color',
			),
			array(
				'function' => 'style',
				'element'  => '',
				'property' => 'background-color',
			),
			array(
				'function' => 'style',
				'element'  => '',
				'property' => 'border-color',
			)
		),
	)
);

thim_customizer()->add_field(
	array(
		'id'        => 'thim_button_hover_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Button Hover Background Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you to choose a button hover background color for your site.', 'coaching' ),
		'section'   => 'general_styling',
		'priority'  => 10,
		'alpha'     => true,
		'default'   => '#1e73be',
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'function' => 'style',
				'element'  => '',
				'property' => 'background-color',
			),
		),
	)
);

thim_customizer()->add_field(
	array(
		'id'        => 'thim_button_text_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Button Text Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you to choose a button text color for your site.', 'coaching' ),
		'section'   => 'general_styling',
		'priority'  => 10,
		'alpha'     => true,
		'default'   => '#fff',
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'function' => 'style',
				'element'  => '',
				'property' => 'color',
			),
		),
	)
);

thim_customizer()->add_field(
	array(
		'id'        => 'thim_body_bg_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Body Background Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you to choose background color for body.', 'coaching' ),
		'section'   => 'general_styling',
		'priority'  => 10,
		'alpha'     => true,
		'default'   => '#fff',
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'function' => 'css',
				'element'  => '',
				'property' => 'background-color',
			),
		),
	)
);
