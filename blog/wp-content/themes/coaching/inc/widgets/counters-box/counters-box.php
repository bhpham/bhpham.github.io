<?php

class Thim_Counters_Box_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'counters-box',
			esc_html__( 'Thim: Counters Box', 'coaching' ),
			array(
				'description'   => esc_html__( 'Counters Box', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),
			),
			array(),
			array(

				'counters_label' => array(
					"type"  => "text",
					"label" => esc_html__( "Counters label", 'coaching' ),
				),

				'counters_value' => array(
					"type"    => "number",
					"label"   => esc_html__( "Counters Value", 'coaching' ),
					"default" => "20",
				),

				'icon'         => array(
					"type"  => "icon",
					"label" => esc_html__( "Icon", 'coaching' ),
				),
				'border_color' => array(
					"type"  => "color",
					"label" => esc_html__( "Border Color Icon", 'coaching' ),
				),

				'counter_color' => array(
					"type"  => "color",
					"label" => esc_html__( "Counters Box Icon", 'coaching' ),
				),

				'style' => array(
					"type"    => "select",
					"label"   => esc_html__( "Counter Style", 'coaching' ),
					"options" => array(
						"home-page"      => esc_html__( "Home Page", 'coaching' ),
						"about-us"       => esc_html__( "Page About Us", 'coaching' ),
						"home-effective" => esc_html__( "Home Effective", 'coaching' ),
						"home-5"         => esc_html__( "Home 5 Style", 'coaching' ),
					),
					'default' => 'home-page'
				),

				'css_animation' => array(
					"type"    => "select",
					"label"   => esc_html__( "CSS Animation", 'coaching' ),
					"options" => array(
						""              => esc_html__( "No", 'coaching' ),
						"top-to-bottom" => esc_html__( "Top to bottom", 'coaching' ),
						"bottom-to-top" => esc_html__( "Bottom to top", 'coaching' ),
						"left-to-right" => esc_html__( "Left to right", 'coaching' ),
						"right-to-left" => esc_html__( "Right to left", 'coaching' ),
						"appear"        => esc_html__( "Appear from center", 'coaching' )
					),
				)
			),
			THIM_DIR . 'inc/widgets/counters-box/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */

	function get_template_name( $instance ) {
		return 'base';
	}

	function get_style_name( $instance ) {
		return false;
	}

}

function thim_counters_box_widget() {
	register_widget( 'Thim_Counters_Box_Widget' );
}

add_action( 'widgets_init', 'thim_counters_box_widget' );