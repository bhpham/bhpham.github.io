<?php
/**
 * Section Course Archive
 *
 * @package Coaching
 */

thim_customizer()->add_section(
	array(
		'id'       => 'course_single',
		'panel'    => 'course',
		'title'    => esc_html__( 'Single Pages', 'coaching' ),
		'priority' => 15,
	)
);

thim_customizer()->add_field(
	array(
		'id'       => 'thim_learnpress_single_layout',
		'type'     => 'radio-image',
		'label'    => esc_html__( 'Layout', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you to choose a layout to display for all single course pages.', 'coaching' ),
		'section'  => 'course_single',
		'priority' => 12,
		'default'  => 'sidebar-right',
		'choices'  => array(
			'sidebar-left'  => THIM_URI . 'images/layout/sidebar-left.jpg',
			'full-content'  => THIM_URI . 'images/layout/body-full.jpg',
			'sidebar-right' => THIM_URI . 'images/layout/sidebar-right.jpg',
		),
	)
);

// Enable or disable title
thim_customizer()->add_field(
	array(
		'id'       => 'thim_learnpress_single_hide_title',
		'type'     => 'switch',
		'label'    => esc_html__( 'Hide Title', 'coaching' ),
		'tooltip'  => esc_html__( 'Check this box to hide/show title.', 'coaching' ),
		'section'  => 'course_single',
		'default'  => false,
		'priority' => 18,
		'choices'  => array(
			true  => esc_html__( 'On', 'coaching' ),
			false => esc_html__( 'Off', 'coaching' ),
		),
	)
);

// Enable or disable breadcrumbs
thim_customizer()->add_field(
	array(
		'id'       => 'thim_learnpress_single_hide_breadcrumbs',
		'type'     => 'switch',
		'label'    => esc_html__( 'Hide Breadcrumbs?', 'coaching' ),
		'tooltip'  => esc_html__( 'Check this box to hide/show breadcrumbs.', 'coaching' ),
		'section'  => 'course_single',
		'default'  => false,
		'priority' => 20,
		'choices'  => array(
			true  => esc_html__( 'On', 'coaching' ),
			false => esc_html__( 'Off', 'coaching' ),
		),
	)
);

thim_customizer()->add_field(
	array(
		'type'     => 'text',
		'id'       => 'thim_learnpress_single_sub_title',
		'label'    => esc_html__( 'Sub Heading', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you can setup sub heading.', 'coaching' ),
		'section'  => 'course_single',
		'priority' => 25,
	)
);

thim_customizer()->add_field(
	array(
		'type'      => 'image',
		'id'        => 'thim_learnpress_single_top_image',
		'label'     => esc_html__( 'Top Image', 'coaching' ),
		'priority'  => 30,
		'transport' => 'postMessage',
		'section'   => 'course_single',
		'default'   => THIM_URI . "images/bg-page.jpg",
	)
);

// Page Title Background Color
thim_customizer()->add_field(
	array(
		'id'        => 'thim_learnpress_single_bg_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Background Color', 'coaching' ),
		'tooltip'   => esc_html__( 'If you do not use background image, then can use background color for page title on heading top. ', 'coaching' ),
		'section'   => 'course_single',
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
		'id'        => 'thim_learnpress_single_title_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Title Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you can select a color make text color for title.', 'coaching' ),
		'section'   => 'course_single',
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
		'id'        => 'thim_learnpress_single_sub_title_color',
		'type'      => 'color',
		'label'     => esc_html__( 'Sub Title Color', 'coaching' ),
		'tooltip'   => esc_html__( 'Allows you can select a color make sub title color page title.', 'coaching' ),
		'section'   => 'course_single',
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

if ( class_exists( 'LP_Addon_Announcements_Preload' ) ) {
	$course_tabs = apply_filters( 'thim_customize_course_tabs', array(
		'description'   => esc_html__( 'Description', 'coaching' ),
		'curriculum'    => esc_html__( 'Curriculum', 'coaching' ),
		'instructor'    => esc_html__( 'Instructors', 'coaching' ),
		'announcements' => esc_html__( 'Announcements', 'coaching' ),
		'students-list' => esc_html__( 'Student list', 'coaching' ),
		'review'        => esc_html__( 'Reviews', 'coaching' ),
	) );
} else {
	$course_tabs = apply_filters( 'thim_customize_course_tabs', array(
		'description'   => esc_html__( 'Description', 'coaching' ),
		'curriculum'    => esc_html__( 'Curriculum', 'coaching' ),
		'instructor'    => esc_html__( 'Instructors', 'coaching' ),
		'students-list' => esc_html__( 'Student list', 'coaching' ),
		'review'        => esc_html__( 'Reviews', 'coaching' ),
	) );
}

// Tab Course
thim_customizer()->add_field(
	array(
		'id'       => 'group_tabs_course',
		'type'     => 'sortable',
		'label'    => esc_html__( 'Sortable Tab Course', 'coaching' ),
		'tooltip'  => esc_html__( 'Click on eye icons to show or hide buttons. Use drag and drop to change the position of tabs...', 'coaching' ),
		'section'  => 'course_single',
		'priority' => 50,
		'default'  => array(
			'description',
			'curriculum',
			'instructor',
			'students-list',
			'review',
		),
		'choices'  => $course_tabs,
	)
);

thim_customizer()->add_field(
	array(
		'id'       => 'default_tab_course',
		'type'     => 'select',
		'label'    => esc_html__( 'Select Tab Default', 'coaching' ),
		'tooltip'  => esc_html__( 'Select tab you want set to default', 'coaching' ),
		'section'  => 'course_single',
		'priority' => 50,
		'choices'  => $course_tabs,
		'default'  => 'description',
	)
);