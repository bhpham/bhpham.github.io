<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Course_Categories_El extends Widget_Base {

	public function get_name() {
		return 'thim-course-categories';
	}

	public function get_title() {
		return esc_html__( 'Thim: Course Categories', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-course-categories';
	}

	public function get_categories() {
		return [ 'thim-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'content',
			[
				'label' => __( 'Course Categories', 'coaching' )
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => esc_html__( 'Title', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'layout',
			[
				'label'   => esc_html__( 'Layout', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'slider'     => esc_html__( 'Slider', 'coaching' ),
					'list'       => esc_html__( 'List Categories', 'coaching' ),
				],
				'default' => 'list'
			]
		);

		$this->end_controls_section();


        $this->start_controls_section(
            'slider-options',
            [
                'label'     => esc_html__( 'Slider Options', 'coaching' ),
                'condition' => array(
                    'layout' => [ 'slider' ]
                )
            ]
        );

        $this->add_control(
            'limit',
            [
                'label'   => esc_html__( 'Limit Number Courses', 'coaching' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 15,
                'min'     => 1,
                'step'    => 1
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
            'show_navigation',
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
            'item_visible',
            [
                'label'   => esc_html__( 'Limit Number Courses', 'coaching' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 7,
                'min'     => 1,
                'max'     => 8,
                'step'    => 1
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'list-options',
            [
                'label'     => esc_html__( 'List Options', 'coaching' ),
                'condition' => array(
                    'layout' => [ 'list' ]
                )
            ]
        );



        $this->add_control(
            'show_counts',
            [
                'label'   => esc_html__( 'Show course counts', 'coaching' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'coaching' ),
                'label_off'    => esc_html__( 'No', 'coaching' ),
                'return_value' => 'yes',
                'default'      => ''
            ]
        );

        $this->add_control(
            'hierarchical',
            [
                'label'   => esc_html__( 'Show hierarchy', 'coaching' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'coaching' ),
                'label_off'    => esc_html__( 'No', 'coaching' ),
                'return_value' => 'yes',
                'default'      => 'yes'
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'title'          => $settings['title'],
			'layout'         => $settings['layout'],
            'slider-options'    => array(
                'limit' => $settings['limit'],
                'show_navigation' => $settings['show_navigation'],
                'item_visible'    => $settings['item_visible'],
                'show_pagination'       => $settings['show_pagination']
            ),
			'list-options'   => array(
				'show_counts'  => $settings['show_counts'],
				'hierarchical' => $settings['hierarchical']
			)
		);

		$args                 = array();
		$args['before_title'] = '<h3 class="widget-title">';
		$args['after_title']  = '</h3>';

        if( $instance['layout'] && 'slider' == $instance['layout'] ){
            $layout = 'slider';
        }else{
            $layout = 'base';
        }
//        if ( thim_is_new_learnpress( '2.0' ) ) {
//            $layout .= '-v2';
//        }

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance,
			'args'     => $args
		), $layout );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Course_Categories_El() );