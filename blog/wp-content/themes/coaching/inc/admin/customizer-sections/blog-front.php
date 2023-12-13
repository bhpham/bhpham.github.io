<?php
/**
 * Section Blog Front Page
 *
 * @package Coaching
 */

thim_customizer()->add_section(
	array(
		'id'       => 'blog_front',
		'panel'    => 'blog',
		'title'    => esc_html__( 'Blog Page', 'coaching' ),
		'priority' => 5,
	)
);

thim_customizer()->add_field(
    array(
        'id'       => 'thim_front_page_cate_layout',
        'type'     => 'radio-image',
        'label'    => esc_html__( 'Layout', 'coaching' ),
        'tooltip'  => esc_html__( 'Allows you to choose a layout for the blog page.', 'coaching' ),
        'section'  => 'blog_front',
        'priority' => 12,
        'choices'  => array(
            'sidebar-left'  => THIM_URI . 'images/layout/sidebar-left.jpg',
            'full-content'    => THIM_URI . 'images/layout/body-full.jpg',
            'sidebar-right' => THIM_URI . 'images/layout/sidebar-right.jpg',
        ),
    )
);

// Enable or Disable Page Title
thim_customizer()->add_field(
	array(
		'id'          => 'thim_front_page_hide_title',
		'type'        => 'switch',
		'label'       => esc_html__( 'Hidden Page Title', 'coaching' ),
		'tooltip'     => esc_html__( 'Allows you can hidden or show page title on heading top.', 'coaching' ),
		'section'     => 'blog_front',
		'default'     => false,
		'priority'    => 20,
		'choices'     => array(
			true  	  => esc_html__( 'On', 'coaching' ),
			false	  => esc_html__( 'Off', 'coaching' ),
		),
	)
);

// Enable or Disable Page Title
thim_customizer()->add_field(
	array(
		'id'          => 'thim_front_page_hide_breadcrumbs',
		'type'        => 'switch',
		'label'       => esc_html__( 'Hidden Breadcrumb', 'coaching' ),
		'tooltip'     => esc_html__( 'Allows you can hidden breadcrumbs on page title.', 'coaching' ),
		'section'     => 'blog_front',
		'default'     => false,
		'priority'    => 20,
		'choices'     => array(
			true  	  => esc_html__( 'On', 'coaching' ),
			false	  => esc_html__( 'Off', 'coaching' ),
		),
	)
);

thim_customizer()->add_field(
	array(
		'type'     => 'text',
		'id'       => 'thim_front_page_sub_title',
		'label'    => esc_html__( 'Sub Heading', 'coaching' ),
		'tooltip'  => esc_html__( 'Allows you can setup sub heading.', 'coaching' ),
		'section'  => 'blog_front',
		'priority' => 25,
	)
);

thim_customizer()->add_field(
	array(
		'type'      => 'image',
		'id'        => 'thim_front_page_top_image',
		'label'     => esc_html__( 'Top Image', 'coaching' ),
		'priority'  => 30,
		'transport' => 'postMessage',
		'section'  => 'blog_front',
		'default'     => THIM_URI . "images/bg-page.jpg",
	)
);

// Page Title Background Color
thim_customizer()->add_field(
	array(
		'id'          => 'thim_front_page_bg_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Background Color', 'coaching' ),
		'tooltip'     => esc_html__( 'If you do not use background image, then can use background color for page title on heading top. ', 'coaching' ),
		'section'     => 'blog_front',
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
		'id'          => 'thim_front_page_title_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Title Color', 'coaching' ),
		'tooltip'     => esc_html__( 'Allows you can select a color make text color for title.', 'coaching' ),
		'section'     => 'blog_front',
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
		'id'          => 'thim_front_page_sub_title_color',
		'type'        => 'color',
		'label'       => esc_html__( 'Sub Title Color', 'coaching' ),
		'tooltip'     => esc_html__( 'Allows you can select a color make sub title color page title.', 'coaching' ),
		'section'     => 'blog_front',
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

thim_customizer()->add_field(
	array(
		'id'       => 'thim_post_excerpt_length',
		'type'     => 'number',
		'label'    => esc_html__( 'Post Excerpt Length', 'coaching' ),
		'tooltip'  => esc_html__( 'Post item description length (number of words)', 'coaching' ),
		'section'  => 'blog_front',
		'default'  => 50,
		'priority' => 50,
		'choices'  => array(
			'min' => 0
		)
	)
);