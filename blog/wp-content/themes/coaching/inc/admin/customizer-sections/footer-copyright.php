<?php
/**
 * Section Copyright
 *
 * @package Coaching
 */

thim_customizer()->add_section(
	array(
		'id'       => 'copyright',
		'title'    => esc_html__( 'Copyright', 'coaching' ),
		'panel'    => 'footer',
		'priority' => 50,
	)
);

// Copyright Background Color
thim_customizer()->add_field(
	array(
		'id'        => 'thim_copyright_bg_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Background Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you to choose background color for your copyright area. ', 'coaching' ),
		'section'   => 'copyright',
		'default'   => '#111',
		'priority'  => 15,
		'alpha'     => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'function' => 'css',
				'element'  => 'footer#colophon .copyright-area',
				'property' => 'background-color',
			)
		)
	)
);

thim_customizer()->add_field(
	array(
		'id'        => 'thim_copyright_text_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you to choose color for your copyright area. ', 'coaching' ),
		'section'   => 'copyright',
		'default'   => '#999',
		'priority'  => 20,
		'alpha'     => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'function' => 'css',
				'element'  => 'footer#colophon .copyright-area,footer#colophon .copyright-area ul li',
				'property' => 'color',
			)
		)
	)
);

thim_customizer()->add_field(
    array(
        'id'        => 'thim_copyright_link_color',
        'type'      => 'color',
        'label'     => esc_html__( 'Link Color', 'coaching' ),
        'tooltip'   => esc_html__( 'Allows you to choose color for your link copyright area. ', 'coaching' ),
        'section'   => 'copyright',
        'default'   => '#fff',
        'priority'  => 21,
        'alpha'     => true,
        'transport' => 'postMessage',
        'js_vars'   => array(
            array(
                'function' => 'css',
                'element'  => 'footer#colophon .copyright-area a,footer#colophon .copyright-area ul li a',
                'property' => 'color',
            )
        )
    )
);

thim_customizer()->add_field(
	array(
		'id'        => 'thim_copyright_border_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Border Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you to choose border color for your copyright area. ', 'coaching' ),
		'section'   => 'copyright',
		'default'   => '#222',
		'priority'  => 22,
		'alpha'     => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'function' => 'css',
				'element'  => 'footer#colophon .copyright-area .copyright-content',
				'property' => 'border-top-color',
			)
		)
	)
);

// Enter Text For Copyright
thim_customizer()->add_field(
	array(
		'type'            => 'textarea',
		'id'              => 'thim_copyright_text',
		'label'           => esc_html__( 'Copyright Text', 'coaching' ),
		'tooltip'         => esc_html__( 'Enter the text that displays in the copyright bar. HTML markup can be used.', 'coaching' ),
		'section'         => 'copyright',
		'default'     =>  sprintf( wp_kses( __( 'Copyright 2016 Coaching WordPress Theme by  <a href="%s">ThimPress</a>.', 'coaching' ),
			array( 'a' => array( 'href' => array() ) ) ), esc_url( 'https://thimpress.com') ),
		'priority'        => 100,
		'transport'       => 'postMessage',
		'js_vars'         => array(
			array(
				'element'  => 'footer#colophon .text-copyright',
				'function' => 'html',
			),
		)
	)
);