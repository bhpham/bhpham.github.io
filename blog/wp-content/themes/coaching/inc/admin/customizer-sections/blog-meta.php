<?php
/**
 * Section Blog Archive
 *
 * @package Hair_Salon
 */

thim_customizer()->add_section(
    array(
        'id'       => 'blog_meta',
        'panel'    => 'blog',
        'title'    => esc_html__( 'Meta Tags', 'coaching' ),
        'priority' => 20,
    )
);

// Enable or Disable Year
thim_customizer()->add_field(
    array(
        'id'          => 'thim_blog_display_year',
        'type'        => 'switch',
        'label'       => esc_html__( 'Display Year', 'coaching' ),
        'tooltip'     => esc_html__( 'Display year on date of Blog.', 'coaching' ),
        'section'     => 'blog_meta',
        'default'     => false,
        'priority'    => 20,
        'choices'     => array(
            true  	  => esc_html__( 'On', 'coaching' ),
            false	  => esc_html__( 'Off', 'coaching' ),
        ),
    )
);

// Enable or Disable Author Meta Tags
thim_customizer()->add_field(
    array(
        'id'          => 'thim_show_author',
        'type'        => 'switch',
        'label'       => esc_html__( 'Show Author', 'coaching' ),
        'tooltip'     => esc_html__( 'Allows you to show author meta tags to display at all blog page.', 'coaching' ),
        'section'     => 'blog_meta',
        'default'     => true,
        'priority'    => 30,
        'choices'     => array(
            true  	  => esc_html__( 'Show', 'coaching' ),
            false	  => esc_html__( 'Hide', 'coaching' ),
        ),
    )
);

// Enable or Disable Date Meta Tags
thim_customizer()->add_field(
    array(
        'id'          => 'thim_show_date',
        'type'        => 'switch',
        'label'       => esc_html__( 'Show Date', 'coaching' ),
        'tooltip'     => esc_html__( 'Allows you to show date meta tags to display at all blog page.', 'coaching' ),
        'section'     => 'blog_meta',
        'default'     => true,
        'priority'    => 31,
        'choices'     => array(
            true  	  => esc_html__( 'Show', 'coaching' ),
            false	  => esc_html__( 'Hide', 'coaching' ),
        ),
    )
);

// Enable or Disable Category Meta Tags
thim_customizer()->add_field(
    array(
        'id'          => 'thim_show_category',
        'type'        => 'switch',
        'label'       => esc_html__( 'Show Category', 'coaching' ),
        'tooltip'     => esc_html__( 'Allows you to show category meta tags to display at single post page.', 'coaching' ),
        'section'     => 'blog_meta',
        'default'     => false,
        'priority'    => 32,
        'choices'     => array(
            true  	  => esc_html__( 'Show', 'coaching' ),
            false	  => esc_html__( 'Hide', 'coaching' ),
        ),
    )
);

// Enable or Disable Tags Meta Tags
//thim_customizer()->add_field(
//    array(
//        'id'          => 'show_tags_meta_tags',
//        'type'        => 'switch',
//        'label'       => esc_html__( 'Show Tags', 'coaching' ),
//        'tooltip'     => esc_html__( 'Allows you to show tags meta tags to display at single post page.', 'coaching' ),
//        'section'     => 'blog_meta',
//        'default'     => true,
//        'priority'    => 33,
//        'choices'     => array(
//            true  	  => esc_html__( 'Show', 'coaching' ),
//            false	  => esc_html__( 'Hide', 'coaching' ),
//        ),
//    )
//);

//Enable or Disable Comments Meta Tags
thim_customizer()->add_field(
    array(
        'id'       => 'thim_show_comment',
        'type'     => 'switch',
        'label'    => esc_html__( 'Show Comment Number', 'coaching' ),
        'tooltip'  => esc_html__( 'Allows you to show comment meta tags to display at single post page.', 'coaching' ),
        'section'  => 'blog_meta',
        'default'  => true,
        'priority' => 33,
        'choices'  => array(
            true  	  => esc_html__( 'Show', 'coaching' ),
            false	  => esc_html__( 'Hide', 'coaching' ),
        ),
    )
);