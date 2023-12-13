<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Countdown_Box_El extends Widget_Base {

	public function get_name() {
		return 'thim-countdown-box';
	}

	public function get_title() {
		return esc_html__( 'Thim: Countdown Box', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-countdown-box';
	}

	public function get_categories() {
		return [ 'thim-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}

	protected function _register_controls() {
//		wp_enqueue_script( 'jquery-classycountdown', THIM_URI . 'inc/widgets/countdown-box/js/jquery.classycountdown.js', array( 'jquery' ), null );

		$this->start_controls_section(
			'config',
			[
				'label' => __( 'Countdown', 'coaching' )
			]
		);

		$this->add_control(
			'text_days',
			[
				'label'       => __( 'Text Days', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false
			]
		);

		$this->add_control(
			'text_hours',
			[
				'label'       => __( 'Text Hours', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false
			]
		);

		$this->add_control(
			'text_minutes',
			[
				'label'       => __( 'Text Minutes', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false
			]
		);

		$this->add_control(
			'text_seconds',
			[
				'label'       => __( 'Text Seconds', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'label_block' => false
			]
		);

        $this->add_control(
            'time_year',
            [
                'label'       => __( 'Year', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => false
            ]
        );

        $this->add_control(
            'time_month',
            [
                'label'       => __( 'Month', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => false
            ]
        );

        $this->add_control(
            'time_day',
            [
                'label'       => __( 'Day', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => false
            ]
        );

        $this->add_control(
            'time_hour',
            [
                'label'       => __( 'Hour', 'coaching' ),
                'type'        => Controls_Manager::TEXT,
                'label_block' => false
            ]
        );

        $this->add_control(
            'style_color',
            [
                'label'   => esc_html__( 'Style Color', 'coaching' ),
                'type'    => Controls_Manager::SELECT,
                'options' => [
                    'white' => esc_html__( 'White', 'coaching' ),
                    'black'  => esc_html__( 'Black', 'coaching' )
                ],
                'default' => 'base'
            ]
        );


		$this->add_control(
			'text_align',
			[
				'label'   => __( 'Text Alignment', 'coaching' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'text-left'   => [
						'title' => __( 'Left', 'coaching' ),
						'icon'  => 'fa fa-align-left',
					],
					'text-center' => [
						'title' => __( 'Center', 'coaching' ),
						'icon'  => 'fa fa-align-center',
					],
					'text-right'  => [
						'title' => __( 'Right', 'coaching' ),
						'icon'  => 'fa fa-align-right',
					]
				],
				'default' => 'text-left',
			]
		);

		$this->end_controls_section();
	}

	protected function render() {

		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array(
			'text_days'    => $settings['text_days'],
			'text_hours'   => $settings['text_hours'],
			'text_minutes' => $settings['text_minutes'],
			'text_seconds' => $settings['text_seconds'],

			'time_year' => $settings['time_year'],
			'time_month' => $settings['time_month'],
			'time_day' => $settings['time_day'],
			'time_hour' => $settings['time_hour'],


			'style_color'  => $settings['style_color'],
			'text_align'   => $settings['text_align'],
		);

		thim_get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Countdown_Box_El() );