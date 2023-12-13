<?php

if (!class_exists('Thim_Social_Widget')) {
	class Thim_Social_Widget extends Thim_Widget {

		function __construct() {

			parent::__construct(
				'social',
				esc_html__( 'Thim: Social Links', 'coaching' ),
				array(
					'description'   => esc_html__( 'Social Links', 'coaching' ),
					'help'          => '',
					'panels_groups' => array( 'thim_widget_group' ),
					'panels_icon'   => 'dashicons dashicons-welcome-learn-more'
				),
				array(),
				array(
					'title'          => array(
						'type'  => 'text',
						'label' => esc_html__( 'Title', 'coaching' )
					),
					'link_face'      => array(
						'type'  => 'text',
						'label' => esc_html__( 'Facebook Url', 'coaching' )
					),
					'link_twitter'   => array(
						'type'  => 'text',
						'label' => esc_html__( 'Twitter Url', 'coaching' )
					),
					'link_google'    => array(
						'type'  => 'text',
						'label' => esc_html__( 'Google Url', 'coaching' )
					),
					'link_dribble'   => array(
						'type'  => 'text',
						'label' => esc_html__( 'Dribble Url', 'coaching' )
					),
					'link_linkedin'  => array(
						'type'  => 'text',
						'label' => esc_html__( 'Linked in Url', 'coaching' )
					),
					'link_pinterest' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Pinterest Url', 'coaching' )
					),
					'link_instagram' => array(
						'type'  => 'text',
						'label' => esc_html__( 'Instagram Url', 'coaching' )
					),
					'link_youtube'   => array(
						'type'  => 'text',
						'label' => esc_html__( 'Youtube Url', 'coaching' )
					),
					'link_target'    => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Link Target', 'coaching' ),
						'options' => array(
							'_self'  => esc_html__( 'Same window', 'coaching' ),
							'_blank' => esc_html__( 'New window', 'coaching' ),
						),
					),
					'style'    => array(
						'type'    => 'select',
						'label'   => esc_html__( 'Style', 'coaching' ),
						'options' => array(
							''  => esc_html__( 'Default', 'coaching' ),
							'no-border' => esc_html__( 'No Border', 'coaching' ),
						),
					),
					'show_text'      => array(
						'type'    => 'checkbox',
						'default' => false,
						'label'   => esc_html__( 'Show text social', 'coaching' ),
					),

				),
				THIM_DIR . 'inc/widgets/social/'
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
}

function thim_social_register_widget() {
	register_widget( 'Thim_Social_Widget' );
}

add_action( 'widgets_init', 'thim_social_register_widget' );