<?php
/**
 * Section Header Toolbar
 */

thim_customizer()->add_section(
	array(
		'id'       => 'header_toolbar',
		'title'    => esc_html__( 'Toolbar', 'coaching' ),
		'panel'    => 'header',
		'priority' => 25,
	)
);

// Enable or disable top bar
thim_customizer()->add_field(
	array(
		'id'       => 'thim_toolbar_show',
		'type'     => 'switch',
		'label'    => esc_html__( 'Show Toolbar', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you to enable or disable Toolbar.', 'coaching' ),
		'section'  => 'header_toolbar',
		'default'  => true,
		'priority' => 10,
		'choices'  => array(
			true  => esc_html__( 'On', 'coaching' ),
			false => esc_html__( 'Off', 'coaching' ),
		),
	)
);

thim_customizer()->add_field(
	array(
		'id'        => 'thim_toolbar',
		'type'      => 'typography',
		'label'     => esc_html__( 'Font size', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you to select font size for toolbar. ', 'coaching' ),
		'section'   => 'header_toolbar',
		'priority'  => 20,
		'default'   => array(
			'font-size'      => '12px',
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'font-size',
				'element'  => '#toolbar',
				'property' => 'font-size',
			),
		),
	)
);

// Topbar background color
thim_customizer()->add_field(
	array(
		'id'          => 'thim_bg_color_toolbar',
		'type'        => 'color',
		'label'       => esc_html__( 'Background Color', 'coaching' ),
		'tooltip'     => esc_html__( 'Allows you to choose a background color for widget on toolbar. ', 'coaching' ),
		'section'     => 'header_toolbar',
		'default'     => '#111',
		'priority'    => 20,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '
							#toolbar
							',
				'property' => 'background-color',
			)
		)
	)
);

thim_customizer()->add_field(
	array(
		'id'          => 'thim_text_color_toolbar',
		'type'        => 'color',
		'label'       => esc_html__( 'Text Color', 'coaching' ),
		'tooltip'     => esc_html__( 'Allows you to choose a color for widget on toolbar. ', 'coaching' ),
		'section'     => 'header_toolbar',
		'default'     => '#ababab',
		'priority'    => 25,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '#toolbar',
				'property' => 'color',
			)
		)
	)
);

thim_customizer()->add_field(
	array(
		'id'          => 'thim_link_color_toolbar',
		'type'        => 'color',
		'label'       => esc_html__( 'Link Color', 'coaching' ),
		'tooltip'     => esc_html__( 'Allows you to choose a link color for widget on toolbar. ', 'coaching' ),
		'section'     => 'header_toolbar',
		'default'     => '#fff',
		'priority'    => 25,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '#toolbar a, #toolbar span.value',
				'property' => 'color',
			)
		)
	)
);