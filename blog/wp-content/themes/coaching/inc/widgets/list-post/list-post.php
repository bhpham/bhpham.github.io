<?php

class Thim_List_Post_Widget extends Thim_Widget {
	function __construct() {
		$list_image_size            = $this->get_image_sizes();
		$list_image_size['health2'] = array(
			'width'  => '270',
			'height' => '150',
			'crop'   => false
		);
		$list_image_size['custom']  = array(
			'width'  => '50',
			'height' => '50',
			'crop'   => false
		);

		$image_size                 = array();
		$image_size['none']         = esc_html__( "No Image", 'coaching' );
		$image_size['custom_image'] = esc_html__( 'Custom Image', 'coaching' );
		$image_size['custom_size']  = esc_html__( 'Custom Size', 'coaching' );
		if ( is_array( $list_image_size ) && !empty( $list_image_size ) ) {
			foreach ( $list_image_size as $key => $value ) {
				if ( $value['width'] && $value['height'] ) {
					$image_size[$key] = $value['width'] . 'x' . $value['height'];
				} else {
					$image_size[$key] = $key;
				}
			}
		}
		parent::__construct(
			'list-post',
			esc_html__( 'Thim: List Posts', 'coaching' ),
			array(
				'description'   => esc_html__( 'Display list posts', 'coaching' ),
				'help'          => '',
				'panels_groups' => array( 'thim_widget_group' ),

			),
			array(),
			array(
				'title'            => array(
					'type'    => 'text',
					'label'   => esc_html__( 'Title', 'coaching' ),
					'default' => esc_html__( "From Blog", 'coaching' )
				),
				'style'            => array(
					"type"          => "select",
					"label"         => esc_html__( "Style", 'coaching' ),
					"options"       => array(
						"no_style"        => esc_html__( "No Style", 'coaching' ),
						"life_homepage"   => esc_html__( "Life Normal Style", 'coaching' ),
						"health_homepage" => esc_html__( "Health Normal Style", 'coaching' ),
						"health_slider"   => esc_html__( "Health Slider Style", 'coaching' ),
						"health_2"        => esc_html__( "Health 2 Style", 'coaching' ),
						"effective"       => esc_html__( "Effective Style", 'coaching' ),
						"health_sticky"   => esc_html__( "Health Sticky Style", 'coaching' ),
						"sidebar"         => esc_html__( "Sidebar", 'coaching' ),
						"gym"             => esc_html__( "Gym style", 'coaching' ),
						"therapist"       => esc_html__( "Therapist style", 'coaching' ),
						"home5"           => esc_html__( "Home5 style", 'coaching' ),
					),
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'custom_style' )
					),
				),
				'cat_id'           => array(
					'type'    => 'select',
					'label'   => esc_html__( 'Select Category', 'coaching' ),
					'default' => 'none',
					'options' => thim_get_cat_taxonomy( 'category', array( 'all' => esc_html__( 'All', 'coaching' ) )  ),
				),
				'image_size'       => array(
					'type'          => 'select',
					'label'         => esc_html__( 'Select Image Size', 'coaching' ),
					'default'       => 'none',
					'options'       => $image_size,
					'state_emitter' => array(
						'callback' => 'select',
						'args'     => array( 'image_size' )
					),
				),
				'size_w'           => array(
					'type'    => 'number',
					'label'   => esc_html__( 'Image Width', 'coaching' ),
					'default' => '400'
				),
				'size_h'           => array(
					'type'    => 'number',
					'label'   => esc_html__( 'Image Height', 'coaching' ),
					'default' => '400'
				),
				'show_description' => array(
					'type'    => 'radio',
					'label'   => esc_html__( 'Show Description', 'coaching' ),
					'default' => 'yes',
					'options' => array(
						'no'  => esc_html__( "No", 'coaching' ),
						'yes' => esc_html__( "Yes", 'coaching' ),
					)
				),
				'number_posts'     => array(
					'type'    => 'number',
					'label'   => esc_html__( 'Number Post', 'coaching' ),
					'default' => '3'
				),
				'orderby'          => array(
					"type"    => "select",
					"label"   => esc_html__( "Order by", 'coaching' ),
					"options" => array(
						"popular" => esc_html__( "Popular", 'coaching' ),
						"recent"  => esc_html__( "Recent", 'coaching' ),
						"title"   => esc_html__( "Title", 'coaching' ),
						"random"  => esc_html__( "Random", 'coaching' ),
					),
				),
				'order'            => array(
					"type"    => "select",
					"label"   => esc_html__( "Order by", 'coaching' ),
					"options" => array(
						"asc"  => esc_html__( "ASC", 'coaching' ),
						"desc" => esc_html__( "DESC", 'coaching' )
					),
				),
				'feature_text'     => array(
					'type'          => 'text',
					'label'         => esc_html__( 'Feature Text', 'coaching' ),
					'default'       => esc_html__( 'Sticky Post', 'coaching' ),
					'state_handler' => array(
						'custom_style[health_slider]'   => array( 'hide' ),
						'custom_style[life_homepage]'   => array( 'hide' ),
						'custom_style[health_homepage]' => array( 'hide' ),
						'custom_style[effective]'       => array( 'hide' ),
						'custom_style[health_sticky]'   => array( 'show' ),
						'custom_style[sidebar]'         => array( 'hide' ),
						'custom_style[no_style]'        => array( 'hide' ),
						'custom_style[home5]'           => array( 'hide' ),
					),
				),
				'link'             => array(
					'type'          => 'text',
					'label'         => esc_html__( 'Link All Post', 'coaching' ),
					'state_handler' => array(
						'custom_style[health_slider]'   => array( 'hide' ),
						'custom_style[life_homepage]'   => array( 'show' ),
						'custom_style[health_homepage]' => array( 'hide' ),
						'custom_style[effective]'       => array( 'hide' ),
						'custom_style[health_sticky]'   => array( 'hide' ),
						'custom_style[sidebar]'         => array( 'hide' ),
						'custom_style[no_style]'        => array( 'hide' ),
						'custom_style[home5]'           => array( 'hide' ),
					),
				),
				'text_link'        => array(
					'type'          => 'text',
					'label'         => esc_html__( 'Text Link', 'coaching' ),
					'state_handler' => array(
						'custom_style[health_slider]'   => array( 'hide' ),
						'custom_style[life_homepage]'   => array( 'show' ),
						'custom_style[health_homepage]' => array( 'hide' ),
						'custom_style[effective]'       => array( 'hide' ),
						'custom_style[health_sticky]'   => array( 'hide' ),
						'custom_style[sidebar]'         => array( 'hide' ),
						'custom_style[no_style]'        => array( 'hide' ),
						'custom_style[home5]'           => array( 'hide' ),
					),
				),

				'autoplay' => array(
					'type'          => 'checkbox',
					'label'         => esc_html__( 'Autoplay', 'coaching' ),
					'default'       => '',
					'state_handler' => array(
						'custom_style[health_slider]'   => array( 'show' ),
						'custom_style[life_homepage]'   => array( 'hide' ),
						'custom_style[health_homepage]' => array( 'hide' ),
						'custom_style[effective]'       => array( 'hide' ),
						'custom_style[health_sticky]'   => array( 'hide' ),
						'custom_style[sidebar]'         => array( 'hide' ),
						'custom_style[no_style]'        => array( 'hide' ),
						'custom_style[home5]'           => array( 'show' ),
					),
				),

				'autoplayTimeout' => array(
					'type'          => 'number',
					'label'         => esc_html__( 'Autoplay Timeout', 'coaching' ),
					'default'       => '',
					'description'   => esc_html__( 'Set time out for slide auto play (millisecond).', 'coaching' ),
					'state_handler' => array(
						'custom_style[health_slider]'   => array( 'show' ),
						'custom_style[life_homepage]'   => array( 'hide' ),
						'custom_style[effective]'       => array( 'hide' ),
						'custom_style[health_homepage]' => array( 'hide' ),
						'custom_style[health_sticky]'   => array( 'hide' ),
						'custom_style[sidebar]'         => array( 'hide' ),
						'custom_style[no_style]'        => array( 'hide' ),
						'custom_style[home5]'           => array( 'show' ),
					),
				),
			),
			THIM_DIR . 'inc/widgets/list-post/'
		);
	}

	/**
	 * Initialize the CTA widget
	 */

	function get_template_name( $instance ) {
		if ( $instance['style'] == 'therapist' || $instance['style'] == 'health_slider' || $instance['style'] == 'gym' || $instance['style'] == 'health_sticky' || $instance['style'] == 'health_2' || $instance['style'] == 'effective' || $instance['style'] == 'home5' ) {
			return $instance['style'];
		} else {
			return 'base';
		}
	}


	function get_style_name( $instance ) {
		return false;
	}

	// list image size
	function get_image_sizes( $size = '' ) {

		global $_wp_additional_image_sizes;

		$sizes                        = array();
		$get_intermediate_image_sizes = get_intermediate_image_sizes();

		// Create the full array with sizes and crop info
		foreach ( $get_intermediate_image_sizes as $_size ) {

			if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

				$sizes[$_size]['width']  = get_option( $_size . '_size_w' );
				$sizes[$_size]['height'] = get_option( $_size . '_size_h' );
				$sizes[$_size]['crop']   = (bool) get_option( $_size . '_crop' );

			} elseif ( isset( $_wp_additional_image_sizes[$_size] ) ) {

				$sizes[$_size] = array(
					'width'  => $_wp_additional_image_sizes[$_size]['width'],
					'height' => $_wp_additional_image_sizes[$_size]['height'],
					'crop'   => $_wp_additional_image_sizes[$_size]['crop']
				);

			}

		}

		// Get only 1 size if found
		if ( $size ) {

			if ( isset( $sizes[$size] ) ) {
				return $sizes[$size];
			} else {
				return false;
			}

		}

		return $sizes;
	}

	// Get list category
	function thim_get_categories() {
		$args         = array(
			'orderby' => 'id',
			'parent'  => 0
		);
		$items        = array();
		$items['all'] = 'All';
		$categories   = get_categories( $args );
		if ( isset( $categories ) ) {
			foreach ( $categories as $key => $cat ) {
				$items[$cat->cat_ID] = $cat->cat_name;
				$childrens           = get_term_children( $cat->term_id, $cat->taxonomy );
				if ( $childrens ) {
					foreach ( $childrens as $key => $children ) {
						$child                  = get_term_by( 'id', $children, $cat->taxonomy );
						$items[$child->term_id] = '--' . $child->name;

					}
				}
			}
		}

		return $items;
	}
}

function thim_list_post_register_widget() {
	register_widget( 'Thim_List_Post_Widget' );
}

add_action( 'widgets_init', 'thim_list_post_register_widget' );