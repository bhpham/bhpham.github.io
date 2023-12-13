<?php
/**
 * Section Archive
 *
 * @package Coaching
 */

thim_customizer()->add_section(
	array(
		'id'       => 'product_archive',
		'panel'    => 'product',
		'title'    => esc_html__( 'Archive Pages', 'coaching' ),
		'priority' => 10,
	)
);

thim_customizer()->add_field(
	array(
		'id'       => 'thim_woo_cate_layout',
		'type'     => 'radio-image',
		'label'    => esc_html__( 'Archive Layouts', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you to choose a layout for all products archive pages.', 'coaching' ),
		'section'  => 'product_archive',
		'priority' => 12,
		'default'  => 'sidebar-right',
		'choices'  => array(
			'sidebar-left'  => THIM_URI . 'images/layout/sidebar-left.jpg',
			'full-content'    => THIM_URI . 'images/layout/body-full.jpg',
			'sidebar-right' => THIM_URI . 'images/layout/sidebar-right.jpg',
		),
	)
);

// Enable or disable breadcrumbs
thim_customizer()->add_field(
	array(
		'id'       => 'thim_woo_cate_hide_breadcrumbs',
		'type'     => 'switch',
		'label'    => esc_html__( 'Hide Breadcrumbs?', 'coaching' ),
		'tooltip'  => esc_html__( 'Check this box to hide/show breadcrumbs.', 'coaching' ),
		'section'  => 'product_archive',
		'default'  => false,
		'priority' => 18,
		'choices'  => array(
			true  => esc_html__( 'On', 'coaching' ),
			false => esc_html__( 'Off', 'coaching' ),
		),
	)
);

// Enable or disable title
thim_customizer()->add_field(
	array(
		'id'       => 'thim_woo_cate_hide_title',
		'type'     => 'switch',
		'label'    => esc_html__( 'Hide Title', 'coaching' ),
		'tooltip'  => esc_html__( 'Check this box to hide/show title.', 'coaching' ),
		'section'  => 'product_archive',
		'default'  => false,
		'priority' => 15,
		'choices'  => array(
			true  => esc_html__( 'On', 'coaching' ),
			false => esc_html__( 'Off', 'coaching' ),
		),
	)
);

thim_customizer()->add_field(
	array(
		'type'     => 'text',
		'id'       => 'thim_woo_cate_sub_title',
		'label'    => esc_html__( 'Sub Heading', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you can setup sub heading.', 'coaching' ),
		'section'  => 'product_archive',
		'priority' => 20,
	)
);

thim_customizer()->add_field(
	array(
		'type'      => 'image',
		'id'        => 'thim_woo_cate_top_image',
		'label'     => esc_html__( 'Top Image', 'coaching' ),
		'priority'  => 30,
		'transport' => 'postMessage',
		'section'  => 'product_archive',
		'default'     => THIM_URI . "images/bg-page.jpg",
	)
);

// Page Title Background Color
thim_customizer()->add_field(
	array(
		'id'          => 'thim_woo_cate_bg_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Background Color', 'coaching' ),
		'tooltip'     => esc_html__( 'If you do not use background image, then can use background color for page title on heading top. ', 'coaching' ),
		'section'     => 'product_archive',
		'default'     => 'rgba(0,0,0,0.5)',
		'priority'    => 35,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => '.top_site_main>.overlay-top-header',
				'property' => 'background',
			)
		)
	)
);

thim_customizer()->add_field(
	array(
		'id'          => 'thim_woo_cate_title_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Title Color', 'coaching' ),
		'tooltip'     => esc_html__( 'Allows you can select a color make text color for title.', 'coaching' ),
		'section'     => 'product_archive',
		'default'     => '#ffffff',
		'priority'    => 40,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => '.top_site_main h1, .top_site_main h2',
				'property' => 'color',
			)
		)
	)
);

thim_customizer()->add_field(
	array(
		'id'          => 'thim_woo_cate_sub_title_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Sub Title Color', 'coaching' ),
		'tooltip'     => esc_html__( 'Allows you can select a color make sub title color page title.', 'coaching' ),
		'section'     => 'product_archive',
		'default'     => '#999',
		'priority'    => 45,
		'alpha'       => true,
		'transport' => 'postMessage',
		'js_vars'   => array(
			array(
				'choice'   => 'color',
				'element'  => '.top_site_main .banner-description',
				'property' => 'color',
			)
		)
	)
);