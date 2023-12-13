<?php

namespace Elementor;

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_List_Post_El extends Widget_Base {

	public function get_name() {
		return 'thim-list-post';
	}

	public function get_title() {
		return esc_html__( 'Thim: List Post', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-list-post';
	}

	public function get_categories() {
		return [ 'thim-elements' ];
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

	public function get_base() {
		return basename( __FILE__, '.php' );
	}

	protected function _register_controls() {

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
		$image_size['none']         = esc_html__( 'No Image', 'coaching' );
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

		$this->start_controls_section(
			'content',
			[
				'label' => esc_html__( 'List Post', 'coaching' )
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'coaching' ),
				'default'     => esc_html__( 'From Blog', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
			]
		);

		$this->add_control(
			'cat_id',
			[
				'label'   => esc_html__( 'Select Category', 'coaching' ),
				'default' => 'none',
				'type'    => Controls_Manager::SELECT,
				'options' => thim_get_cat_taxonomy( 'category', array( 'all' => esc_html__( 'All', 'coaching' ) )  ),
			]
		);

		$this->add_control(
			'number_posts',
			[
				'label'   => esc_html__( 'Number Post', 'coaching' ),
				'default' => '4',
				'type'    => Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'show_description',
			[
				'label'   => esc_html__( 'Show Description', 'coaching' ),
				'default' => true,
				'type'    => Controls_Manager::SWITCHER,
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'   => esc_html__( 'Order by', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'popular' => esc_html__( 'Popular', 'coaching' ),
					'recent'  => esc_html__( 'Date', 'coaching' ),
					'title'   => esc_html__( 'Title', 'coaching' ),
					'random'  => esc_html__( 'Random', 'coaching' ),
				],
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => esc_html__( 'Order by', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'asc'  => esc_html__( 'ASC', 'coaching' ),
					'desc' => esc_html__( 'DESC', 'coaching' )
				],
			]
		);

		$this->add_control(
			'style',
			[
				'label'   => esc_html__( 'Layout', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'default' => 'base',
				'options' => [
					"base"            => esc_html__( "No Style", 'coaching' ),
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
				],
			]
		);

		$this->add_control(
			'image_size',
			[
				'label'   => esc_html__( 'Select Image Size', 'coaching' ),
				'default' => 'none',
				'type'    => Controls_Manager::SELECT,
				'options' => $image_size,
			]
		);

		$this->add_control(
			'size_w',
			[
				'label'   => esc_html__( 'Image width', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => '400'
			]
		);

		$this->add_control(
			'size_h',
			[
				'label'   => esc_html__( 'Image height', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => '400'
			]
		);

		$this->add_control(
			'feature_text',
			[
				'label'       => esc_html__( 'Feature Text', 'coaching' ),
				'default'     => esc_html__( 'Sticky Post', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'condition'   => [
					'style' => [ 'health_sticky' ]
				]
			]
		);

		$this->add_control(
			'link',
			[
				'label'       => esc_html__( 'Link All Posts', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'condition'   => [
					'style' => [ 'life_homepage' ]
				]
			]
		);

		$this->add_control(
			'text_link',
			[
				'label'       => esc_html__( 'Text All Posts', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => true,
				'condition'   => [
					'style' => [ 'life_homepage' ]
				]
			]
		);

		$this->add_control(
			'autoplay',
			[
				'label'     => esc_html__( 'Autoplay', 'coaching' ),
				'default'   => false,
				'type'      => Controls_Manager::SWITCHER,
				'condition' => [
					'style' => [ 'health_slider', 'home5' ]
				]
			]
		);

		$this->add_control(
			'autoplayTimeout',
			[
				'label'     => esc_html__( 'Autoplay Timeout', 'coaching' ),
				'type'      => Controls_Manager::NUMBER,
				'condition' => [
					'style' => [ 'health_slider', 'home5' ]
				]
			]
		);


		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'title'            => $settings['title'],
			'style'            => $settings['style'],
			'cat_id'           => $settings['cat_id'],
			'number_posts'     => $settings['number_posts'],
			'show_description' => $settings['show_description'],
			'orderby'          => $settings['orderby'],
			'order'            => $settings['order'],
			'feature_text'     => $settings['feature_text'],
			'image_size'       => $settings['image_size'],
			'size_w'           => $settings['size_w'],
			'size_h'           => $settings['size_h'],
			'link'             => $settings['link'],
			'text_link'        => $settings['text_link'],
			'autoplay'         => $settings['autoplay'],
			'autoplayTimeout'  => $settings['autoplayTimeout'],
		);

		$args                 = array();
		$args['before_title'] = '<h3 class="widget-title">';
		$args['after_title']  = '</h3>';


		if ( $instance['style'] == 'therapist' || $instance['style'] == 'health_slider' || $instance['style'] == 'gym' || $instance['style'] == 'health_sticky' || $instance['style'] == 'health_2' || $instance['style'] == 'effective' || $instance['style'] == 'home5') {
			$layout = $instance['style'];
		} else {
			$layout = 'base';
		}

		thim_get_widget_template( $this->get_base(), array( 'instance' => $instance, 'args' => $args ), $layout );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_List_Post_El() );