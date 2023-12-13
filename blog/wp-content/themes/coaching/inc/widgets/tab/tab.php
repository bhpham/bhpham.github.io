<?php
class Thim_Tab_Widget extends Thim_Widget {

	function __construct() {

		parent::__construct(
			'tab',
			esc_html__( 'Thim: Tab', 'coaching' ),
			array(
				'description' => esc_html__( 'Add tab', 'coaching' ),
				'help'        => '',
				'panels_groups' => array('thim_widget_group'),
				'panels_icon' => 'dashicons dashicons-welcome-learn-more'
			),
			array(),
			array(
				'tab' => array(
					'type'      => 'repeater',
					'label'     => esc_html__( 'Tab', 'coaching' ),
					'item_name' => esc_html__( 'Tab', 'coaching' ),
					'fields'    => array(
						'title'   => array(
							"type"    => "text",
							"label"   => esc_html__( "Tab Title", 'coaching' ),
							"default" => esc_html__("Tab Title", 'coaching'),
							"allow_html_formatting"=> array(
									'a'      => array(
											'href'   => true,
											'target' => true,
											'class'  => true,
											'alt'    => true,
											'title'  => true,
									),
									'br'     => array(),
									'em'     => array(),
									'strong' => array(),
									'span'   => array(),
									'i'      => array(
											'class'  => true,
									),
									'b'      => array(),
							)
						),
						'content' => array(
							"type"  => "textarea",
							"label" => esc_html__( "Content", 'coaching' ),
							"allow_html_formatting"=>true
						),
					),
				),
			),
			THIM_DIR . 'inc/widgets/tab/'
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
function thim_tab_register_widget() {
	register_widget( 'Thim_Tab_Widget' );
}

add_action( 'widgets_init', 'thim_tab_register_widget' );