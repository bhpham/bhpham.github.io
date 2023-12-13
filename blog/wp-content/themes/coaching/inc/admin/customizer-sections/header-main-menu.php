<?php
/**
 * Section Header Main Menu
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
	array(
		'id'       => 'header_main_menu',
		'title'    => esc_html__( 'Main Menu', 'coaching' ),
		'panel'    => 'header',
		'priority' => 30,
	)
);

// Select All Fonts For Main Menu
thim_customizer()->add_field(
	array(
		'id'        => 'thim_main_menu',
		'type'      => 'typography',
		'label'     => esc_html__( 'Fonts', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you to select all font font properties for header. ', 'coaching' ),
		'section'   => 'header_main_menu',
		'priority'  => 10,
		'default'   => array(
            'font-family'    => 'Open Sans',
			'variant'   => '600',
			'font-size' => '14px',
			//'line-height'    => '1.6em',
			//'text-transform' => 'uppercase',
		),
		'transport' => 'postMessage',
		'js_vars'   => array(
            array(
                'choice'   => 'font-family',
                'element'  => '.navigation .width-navigation .navbar-nav > li > a, .navigation .width-navigation .navbar-nav > li > span',
                'property' => 'font-family',
            ),
			array(
				'choice'   => 'variant',
				'element'  => '.navigation .width-navigation .navbar-nav > li > a, .navigation .width-navigation .navbar-nav > li > span',
				'property' => 'font-weight',
			),
			array(
				'choice'   => 'font-size',
				'element'  => '.navigation .width-navigation .navbar-nav > li > a, .navigation .width-navigation .navbar-nav > li > span',
				'property' => 'font-size',
			),
		)
	)
);

// Text color
thim_customizer()->add_field(
	array(
		'id'        => 'thim_main_menu_text_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Text Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you to select color for text.', 'coaching' ),
		'section'   => 'header_main_menu',
		'default'   => '#ffffff',
		'priority'  => 25,
		'alpha'     => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'element'  => '
                            .navigation .width-navigation .navbar-nav > li > a,
                            .navigation .width-navigation .navbar-nav > li > span
                            ',
				'property' => 'color',
			)
		)
	)
);

// Text Link Hover
thim_customizer()->add_field(
	array(
		'id'        => 'thim_main_menu_text_hover_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Text Color Hover', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you to select color for text link when hover text link.', 'coaching' ),
		'section'   => 'header_main_menu',
		'default'   => '#ffffff',
		'priority'  => 30,
		'alpha'     => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'function' => 'style',
				'element'  => '
								.navigation .width-navigation .navbar-nav > li > a:hover,
								.navigation .width-navigation .navbar-nav > li > span:hover
								',
				'property' => 'color',
			)
		)
	)
);