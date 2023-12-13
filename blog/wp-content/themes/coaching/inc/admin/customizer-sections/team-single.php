<?php
/**
 * Section Single
 *
 * @package Coaching
 */

thim_customizer()->add_section(
	array(
		'id'       => 'team_single',
		'panel'    => 'team',
		'title'    => esc_html__( 'Single Page', 'coaching' ),
		'priority' => 15,
	)
);

thim_customizer()->add_field(
	array(
		'id'       => 'thim_team_single_layout',
		'type'     => 'radio-image',
		'label'    => esc_html__( 'Layout', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you to choose a layout to display for all event single pages.', 'coaching' ),
		'section'  => 'team_single',
		'priority' => 12,
		'default'  => 'full-content',
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
		'id'       => 'thim_team_single_hide_breadcrumbs',
		'type'     => 'switch',
		'label'    => esc_html__( 'Hide Breadcrumbs?', 'coaching' ),
		'tooltip'  => esc_html__( 'Check this box to hide/show breadcrumbs.', 'coaching' ),
		'section'  => 'team_single',
		'default'  => false,
		'priority' => 15,
		'choices'  => array(
			true  => esc_html__( 'On', 'coaching' ),
			false => esc_html__( 'Off', 'coaching' ),
		),
	)
);

// Enable or disable title
thim_customizer()->add_field(
	array(
		'id'       => 'thim_team_single_hide_title',
		'type'     => 'switch',
		'label'    => esc_html__( 'Hide Title', 'coaching' ),
		'tooltip'  => esc_html__( 'Check this box to hide/show title.', 'coaching' ),
		'section'  => 'team_single',
		'default'  => false,
		'priority' => 18,
		'choices'  => array(
			true  => esc_html__( 'On', 'coaching' ),
			false => esc_html__( 'Off', 'coaching' ),
		),
	)
);

thim_customizer()->add_field(
	array(
		'type'      => 'image',
		'id'        => 'thim_team_single_top_image',
		'label'     => esc_html__( 'Top Image', 'coaching' ),
		'priority'  => 30,
		'transport' => 'postMessage',
		'section'  => 'team_single',
		'default'     => THIM_URI . "images/bg-page.jpg",
	)
);

// Page Title Background Color
thim_customizer()->add_field(
	array(
		'id'          => 'thim_team_single_bg_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Background Color', 'coaching' ),
		'tooltip'     => esc_html__( 'If you do not use background image, then can use background color for page title on heading top. ', 'coaching' ),
		'section'     => 'team_single',
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
		'id'          => 'thim_team_single_title_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Title Color', 'coaching' ),
		'tooltip'     => esc_html__( 'Allows you can select a color make text color for title.', 'coaching' ),
		'section'     => 'team_single',
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
		'id'          => 'thim_team_single_sub_title_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Sub Title Color', 'coaching' ),
		'tooltip'     => esc_html__( 'Allows you can select a color make sub title color page title.', 'coaching' ),
		'section'     => 'team_single',
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