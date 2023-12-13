<?php

vc_map( array(
	'name'        => esc_html__( 'Thim: Countdown Box', 'coaching' ),
	'base'        => 'thim-countdown-box',
	'category'    => esc_html__( 'Thim Shortcodes', 'coaching' ),
	'description' => esc_html__( 'Display Countdown Box.', 'coaching' ),
	'icon'        => 'thim-widget-icon thim-widget-icon-countdown-box',
	'params'      => array(

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Text Days', 'coaching' ),
			'param_name'  => 'text_days',
			'std'         => esc_html__( 'days', 'coaching' ),
			'group'       => esc_html__( 'Text Settings', 'coaching' ),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Text Hours', 'coaching' ),
			'param_name'  => 'text_hours',
			'std'         => esc_html__( 'hours', 'coaching' ),
			'group'       => esc_html__( 'Text Settings', 'coaching' ),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Text Minutes', 'coaching' ),
			'param_name'  => 'text_minutes',
			'std'         => esc_html__( 'minutes', 'coaching' ),
			'group'       => esc_html__( 'Text Settings', 'coaching' ),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Text Seconds', 'coaching' ),
			'param_name'  => 'text_seconds',
			'std'         => esc_html__( 'seconds', 'coaching' ),
			'group'       => esc_html__( 'Text Settings', 'coaching' ),
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Year', 'coaching' ),
			'param_name'  => 'time_year',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Month', 'coaching' ),
			'param_name'  => 'time_month',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Day', 'coaching' ),
			'param_name'  => 'time_day',
		),

		array(
			'type'        => 'textfield',
			'admin_label' => true,
			'heading'     => esc_html__( 'Hour', 'coaching' ),
			'param_name'  => 'time_hour',
		),

        array(
            'type'        => 'dropdown',
            'admin_label' => true,
            'heading'     => esc_html__( 'Style Color', 'coaching' ),
            'param_name'  => 'style_color',
            'value'       => array(
                esc_html__( 'White', 'coaching' ) => 'white',
                esc_html__( 'Black', 'coaching' ) => 'black',
            ),
            'group'       => esc_html__( 'Text Settings', 'coaching' ),
        ),

		array(
			'type'        => 'dropdown',
			'admin_label' => true,
			'heading'     => esc_html__( 'Text alignment', 'coaching' ),
			'param_name'  => 'text_align',
			'value'       => array(
				esc_html__( 'Text at left', 'coaching' )   => 'text-left',
				esc_html__( 'Text at center', 'coaching' ) => 'text-center',
				esc_html__( 'Text at right', 'coaching' )  => 'text-right',
			),
			'group'       => esc_html__( 'Text Settings', 'coaching' ),
		),

        // Extra class
        array(
            'type'        => 'textfield',
            'admin_label' => true,
            'heading'     => esc_html__( 'Extra class', 'coaching' ),
            'param_name'  => 'el_class',
            'value'       => '',
            'description' => esc_html__( 'Add extra class name that will be applied to the shortcode, and you can use this class for your customizations.', 'coaching' ),
        ),
	)
) );