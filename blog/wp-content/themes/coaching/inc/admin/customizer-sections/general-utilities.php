<?php
/**
 * Section Utilities
 *
 * @package Coaching
 */

thim_customizer()->add_section(
	array(
		'id'       => 'utilities',
		'panel'    => 'general',
		'priority' => 100,
		'title'    => esc_html__( 'Utilities', 'coaching' ),
	)
);

// Feature: Google Analytics
thim_customizer()->add_field(
	array(
		'type'     => 'text',
		'id'       => 'thim_google_analytics',
		'label'    => esc_html__( 'Google Analytics', 'coaching' ),
		'tooltip'  => esc_html__( 'Enter your ID Google Analytics.', 'coaching' ),
		'section'  => 'utilities',
		'priority' => 10,
	)
);

// Feature: Facebook Pixel
thim_customizer()->add_field(
	array(
		'type'     => 'text',
		'id'       => 'thim_facebook_pixel',
		'label'    => esc_html__( 'Facebook Pixel', 'coaching' ),
		'tooltip'  => esc_html__( 'Enter your ID Facebook Pixel.', 'coaching' ),
		'section'  => 'utilities',
		'priority' => 20,
	)
);

// Feature: Body custom class
thim_customizer()->add_field(
	array(
		'type'     => 'text',
		'id'       => 'thim_body_custom_class',
		'label'    => esc_html__( 'Body Custom Class', 'coaching' ),
		'tooltip'  => esc_html__( 'Enter body custom class.', 'coaching' ),
		'section'  => 'utilities',
		'priority' => 30,
	)
);

// Feature: Body custom class
thim_customizer()->add_field(
	array(
		'type'     => 'text',
		'id'       => 'thim_register_redirect',
		'label'    => esc_html__( 'Register Redirect', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows register redirect url. Blank will redirect to home page.', 'coaching' ),
		'section'  => 'utilities',
		'priority' => 40,
	)
);

// Feature: Body custom class
thim_customizer()->add_field(
	array(
		'type'     => 'text',
		'id'       => 'thim_login_redirect',
		'label'    => esc_html__( 'Login Redirect', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows login redirect url. Blank will redirect to home page.', 'coaching' ),
		'section'  => 'utilities',
		'priority' => 50,
	)
);

thim_customizer()->add_field(
	array(
		'type'     => 'select',
		'id'       => 'thim_page_builder_chosen',
		'label'    => esc_html__( 'Page Builder', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows select page builder which you want to using.', 'coaching' ),
		'priority' => 55,
		'multiple' => 0,
		'section'  => 'utilities',
		'choices'  => array(
			''                => esc_html__( 'Select', 'coaching' ),
			'site_origin'     => esc_html__( 'Site Origin', 'coaching' ),
			'visual_composer' => esc_html__( 'Visual Composer', 'coaching' ),
            'elementor'       => esc_html__( 'Elementor', 'coaching' ),
		),
	)
);
/*
thim_customizer()->add_field(
	array(
		'type'            => 'image',
		'id'              => 'thim_footer_bottom_bg_img',
		'label'           => esc_html__( 'Footer Bottom Background image', 'coaching' ),
		'priority'        => 60,
		'section'         => 'utilities',
		'transport'       => 'postMessage',
		'js_vars'         => array(
			array(
				'element'  => '.footer-bottom .thim-bg-overlay-color-half',
				'function' => 'css',
				'property' => 'background-image',
			),
		),
		'active_callback' => array(
			array(
				'setting'  => 'thim_page_builder_chosen',
				'operator' => '===',
				'value'    => 'visual_composer',
			),
		),
	)
);
*/