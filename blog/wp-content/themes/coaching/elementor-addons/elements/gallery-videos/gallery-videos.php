<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Gallery_Videos_El extends Widget_Base {

	public function get_name() {
		return 'thim-gallery-videos';
	}

	public function get_title() {
		return esc_html__( 'Thim: Gallery Videos', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-gallery-videos';
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
				'label' => esc_html__( 'Gallery Video', 'coaching' )
			]
		);

        $this->add_control(
            'title',
            [
                'label'       => esc_html__( 'Heading', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true,
                'placeholder' => esc_html__( 'Add your text here', 'coaching' )
            ]
        );


        $this->add_control(
			'cad_id',
			[
				'label'    => esc_html__( 'Select Category', 'coaching' ),
				'type'     => Controls_Manager::SELECT2,
				'multiple' => false,
				'options'  => thim_get_cat_taxonomy( 'category', array( 'all' => esc_html__( 'All', 'coaching' ) )  ),
				'default'  => 'all'
			]
		);

		$this->add_control(
			'style',
			[
                "label"   => esc_html__( "Videos Style", 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'base'    => 'Normal',
					'slider' => 'Slider'
				],
				'default' => 'base'
			]
		);

        $this->add_control(
            'orderby',
            [
                'label'   => esc_html__( 'Order by', 'coaching' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'popular' => esc_html__( 'Popular', 'coaching' ),
                    'recent'  => esc_html__( 'Recent', 'coaching' ),
                    'title'   => esc_html__( 'Title', 'coaching' ),
                    'random'  => esc_html__( 'Random', 'coaching' ),
                ],
                'default' => 'popular'
            ]
        );

        $this->add_control(
            'link',
            [
                'label' => esc_html__( 'Link All', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $this->add_control(
            'text_link',
            [
                'label' => esc_html__( 'Text Of Link', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => true
            ]
        );

        $this->add_control(
            'number_posts',
            [
                'label'   => esc_html__( 'Number Posts', 'coaching' ),
                'type'    => Controls_Manager::NUMBER,
                'default' => 3,
                'min'     => 1,
                'step'    => 1
            ]
        );

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'title'     => $settings['title'],
			'cad_id'     => $settings['cad_id'],
			'orderby'  => $settings['orderby'],
			'link' => $settings['link'],
			'text_link'  => $settings['text_link'],
			'number_posts'   => $settings['number_posts'],
			'style'   => $settings['style']
		);

		thim_get_widget_template( $this->get_base(), array(
			'instance' => $instance
		), $settings['style'] );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Gallery_Videos_El() );
