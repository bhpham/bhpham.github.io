<?php
/**
 * Section Course Features
 *
 * @package Coaching
 */

thim_customizer()->add_section(
    array(
        'id'       => 'course_features',
        'panel'    => 'course',
        'title'    => esc_html__( 'Features', 'coaching' ),
        'priority' => 20,
    )
);

// Enable or Disable Login Popup when take this course
thim_customizer()->add_field(
    array(
        'id'          => 'thim_learnpress_single_popup',
        'type'        => 'switch',
        'label'       => esc_html__( 'Enable Login Popup', 'coaching' ),
        'tooltip'     => esc_html__( 'Enable login popup when take this course with user not logged in.', 'coaching' ),
        'section'     => 'course_features',
        'default'     => true,
        'priority'    => 15,
        'choices'     => array(
            true  	  => esc_html__( 'Show', 'coaching' ),
            false	  => esc_html__( 'Hide', 'coaching' ),
        ),
    )
);

// Enable or Disable Login Popup when take this course
thim_customizer()->add_field(
    array(
        'id'          => 'thim_learnpress_hidden_ads',
        'type'        => 'switch',
        'label'       => esc_html__( 'Hidden Ads', 'coaching' ),
        'tooltip'     => esc_html__( 'Hidden ads learnpress on WordPress admin.', 'coaching' ),
        'section'     => 'course_features',
        'default'     => true,
        'priority'    => 50,
        'choices'     => array(
            true  	  => esc_html__( 'Show', 'coaching' ),
            false	  => esc_html__( 'Hide', 'coaching' ),
        ),
    )
);