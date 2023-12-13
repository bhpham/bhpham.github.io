<?php
/**
 * Section Blog Singular
 *
 * @package Coaching
 */

thim_customizer()->add_section(
	array(
		'id'       => 'blog_singular',
		'panel'    => 'blog',
		'title'    => esc_html__( 'Singular Pages', 'coaching' ),
		'priority' => 10,
	)
);

thim_customizer()->add_field(
	array(
		'id'       => 'thim_archive_single_layout',
		'type'     => 'radio-image',
		'label'    => esc_html__( 'Layout', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you to choose a layout to display for all single post pages.', 'coaching' ),
		'section'  => 'blog_singular',
		'priority' => 12,
		'default'  => 'sidebar-right',
		'choices'  => array(
			'sidebar-left'  => THIM_URI . 'images/layout/sidebar-left.jpg',
			'full-content'    => THIM_URI . 'images/layout/body-full.jpg',
			'sidebar-right' => THIM_URI . 'images/layout/sidebar-right.jpg',
		),
	)
);

thim_customizer()->add_field(
	array(
		'type'     => 'text',
		'id'       => 'thim_archive_single_sub_title',
		'label'    => esc_html__( 'Sub Heading', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you can setup sub heading for single.', 'coaching' ),
		'section'  => 'blog_singular',
		'priority' => 15,
	)
);

thim_customizer()->add_field(
	array(
		'type'      => 'image',
		'id'        => 'thim_archive_single_top_image',
		'label'     => esc_html__( 'Top Image', 'coaching' ),
		'priority'  => 20,
		'transport' => 'postMessage',
		'section'   => 'blog_singular',
		'default'   => THIM_URI . "images/bg-page.jpg",
	)
);

// Page Title Background Color
thim_customizer()->add_field(
	array(
		'id'        => 'thim_archive_single_bg_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Background Color', 'coaching' ),
		'tooltip'   => esc_html__( 'If you do not use background image, then can use background color for page title on heading top. ', 'coaching' ),
		'section'   => 'blog_singular',
		'default'   => 'rgba(0,0,0,0.5)',
		'priority'  => 35,
		'alpha'     => true,
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
		'id'        => 'thim_archive_single_title_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Title Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you can select a color make text color for title.', 'coaching' ),
		'section'   => 'blog_singular',
		'default'   => '#ffffff',
		'priority'  => 40,
		'alpha'     => true,
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
		'id'        => 'thim_archive_single_sub_title_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Sub Title Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you can select a color make sub title color page title.', 'coaching' ),
		'section'   => 'blog_singular',
		'default'   => '#999',
		'priority'  => 45,
		'alpha'     => true,
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