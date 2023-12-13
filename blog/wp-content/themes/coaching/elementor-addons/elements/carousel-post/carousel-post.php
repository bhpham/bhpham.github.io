<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Carousel_Post_El extends Widget_Base {

	public function get_name() {
		return 'thim-carousel-post';
	}

	public function get_title() {
		return esc_html__( 'Thim: Carousel Posts', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-carousel-posts';
	}

	public function get_categories() {
		return [ 'thim-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}

	//Get list post categories
	function thim_get_post_categories() {
        $args         = array(
            'orderby' => 'id',
            'parent'  => 0
        );
        $items        = array();
        $items['all'] = 'All';
        $categories   = get_categories( $args );
        if ( isset( $categories ) ) {
            foreach ( $categories as $key => $cat ) {
                $items[ $cat->cat_ID ] = $cat->cat_name;
                $childrens             = get_term_children( $cat->term_id, $cat->taxonomy );
                if ( $childrens ) {
                    foreach ( $childrens as $key => $children ) {
                        $child                    = get_term_by( 'id', $children, $cat->taxonomy );
                        $items[ $child->term_id ] = '--' . $child->name;

                    }
                }
            }
        }

        return $items;
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content',
			[
				'label' => __( 'Carousel Posts', 'coaching' )
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Heading', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => false
			]
		);

		$this->add_control(
			'cat_id',
			[
				'label'   => esc_html__( 'Select Category', 'coaching' ),
				'type'    => Controls_Manager::SELECT2,
				'options' => $this->thim_get_post_categories(),
				'default' => 'all'
			]
		);

		$this->add_control(
			'visible_post',
			[
				'label'   => esc_html__( 'Posts Visible', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 3,
				'min'     => 1,
				'step'    => 1
			]
		);

		$this->add_control(
			'number_posts',
			[
				'label'   => esc_html__( 'Number Posts', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 6,
				'min'     => 1,
				'step'    => 1
			]
		);

		$this->add_control(
			'show_nav',
			[
				'label'        => esc_html__( 'Show Navigation?', 'coaching' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'coaching' ),
				'label_off'    => esc_html__( 'No', 'coaching' ),
				'return_value' => 'yes',
				'default'      => 'yes'
			]
		);

		$this->add_control(
			'show_pagination',
			[
				'label'        => esc_html__( 'Show Pagination?', 'coaching' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => esc_html__( 'Yes', 'coaching' ),
				'label_off'    => esc_html__( 'No', 'coaching' ),
				'return_value' => 'yes',
				'default'      => ''
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
					'random'  => esc_html__( 'Random', 'coaching' )
				],
				'default' => 'recent'
			]
		);

		$this->add_control(
			'order',
			[
				'label'   => esc_html__( 'Order', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'asc'  => esc_html__( 'ASC', 'coaching' ),
					'desc' => esc_html__( 'DESC', 'coaching' )
				],
				'default' => 'desc'
			]
		);


		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'title'           => $settings['title'],
			'cat_id'          => $settings['cat_id'],
			'visible_post'    => $settings['visible_post'],
			'number_posts'    => $settings['number_posts'],
			'show_nav'        => $settings['show_nav'],
			'show_pagination' => $settings['show_pagination'],
			'orderby'         => $settings['orderby'],
			'order'           => $settings['order'],
		);

		$args                 = array();
		$args['before_title'] = '<h3 class="widget-title">';
		$args['after_title']  = '</h3>';

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance,
			'args'     => $args
		) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Carousel_Post_El() );