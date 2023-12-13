<?php

namespace Elementor;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class Thim_Icon_Box_El extends Widget_Base {

	public function get_name() {
		return 'thim-icon-box';
	}

	public function get_title() {
		return esc_html__( 'Thim: Icon Box', 'coaching' );
	}

	public function get_icon() {
		return 'thim-widget-icon thim-widget-icon-icon-box';
	}

	public function get_categories() {
		return [ 'thim-elements' ];
	}

	public function get_base() {
		return basename( __FILE__, '.php' );
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'title_group',
			[
				'label' => __( 'Title', 'coaching' )
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);

		$this->add_control(
			'size',
			[
				'label'   => __( 'Size Heading', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					'h2' => esc_html__( 'h2', 'coaching' ),
					'h3' => esc_html__( 'h3', 'coaching' ),
					'h4' => esc_html__( 'h4', 'coaching' ),
					'h5' => esc_html__( 'h5', 'coaching' ),
					'h6' => esc_html__( 'h6', 'coaching' ),
				],
				'default' => 'h3',
			]
		);

		$this->add_control(
			'font_heading',
			[
				'label'        => __( 'Custom Font Heading?', 'coaching' ),
				'type'         => Controls_Manager::SWITCHER,
				'label_on'     => __( 'Yes', 'coaching' ),
				'label_off'    => __( 'No', 'coaching' ),
				'return_value' => 'custom',
				'default'      => '',
			]
		);

		$this->add_control(
			'custom_font_size',
			[
				'label'     => __( 'Font Size (px)', 'coaching' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 14,
				'min'       => 1,
				'step'      => 1,
				'condition' => [
					'font_heading' => [ 'custom' ]
				]
			]
		);

		$this->add_control(
			'custom_font_weight',
			[
				'label'     => __( 'Custom Font Weight', 'coaching' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					"normal" => esc_html__( "Normal", 'coaching' ),
					"bold"   => esc_html__( "Bold", 'coaching' ),
					'100'    => esc_html__( '100', 'coaching' ),
					'200'    => esc_html__( '200', 'coaching' ),
					'300'    => esc_html__( '300', 'coaching' ),
					'400'    => esc_html__( '400', 'coaching' ),
					'500'    => esc_html__( '500', 'coaching' ),
					'600'    => esc_html__( '600', 'coaching' ),
					'700'    => esc_html__( '700', 'coaching' ),
					'800'    => esc_html__( '800', 'coaching' ),
					'900'    => esc_html__( '900', 'coaching' ),
				],
				'default'   => 'normal',
				'condition' => [
					'font_heading' => [ 'custom' ]
				]
			]
		);

		$this->add_control(
			'custom_mg_top',
			[
				'label'   => esc_html__( 'Margin Top (px)', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => '',
				'min'     => 0,
				'step'    => 1
			]
		);

		$this->add_control(
			'custom_mg_bt',
			[
				'label'   => esc_html__( 'Margin Bottom (px)', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => '',
				'min'     => 0,
				'step'    => 1
			]
		);

		$this->add_control(
			'line_after_title',
			[
				'label'   => __( 'Show Separator?', 'coaching' ),
				'type'    => Controls_Manager::SWITCHER,
				'options' => [
					true  => __( 'Yes', 'coaching' ),
					false => __( 'No', 'coaching' ),
				],
				'default' => false
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'desc_group',
			[
				'label' => __( 'Description', 'coaching' ),
			]
		);

		$this->add_control(
			'content',
			[
				'label'       => __( 'Add Description', 'coaching' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'label_block' => true
			]
		);


		$this->add_control(
			'custom_font_size_des',
			[
				'label'   => __( 'Font Size (px)', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => 14,
				'min'     => 0,
				'step'    => 1
			]
		);

		$this->add_control(
			'custom_font_weight_desc',
			[
				'label'   => __( 'Font Weight', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					''       => esc_html__( 'Choose...', 'coaching' ),
					'normal' => esc_html__( 'Normal', 'coaching' ),
					'bold'   => esc_html__( 'Bold', 'coaching' ),
					'100'    => esc_html__( '100', 'coaching' ),
					'200'    => esc_html__( '200', 'coaching' ),
					'300'    => esc_html__( '300', 'coaching' ),
					'400'    => esc_html__( '400', 'coaching' ),
					'500'    => esc_html__( '500', 'coaching' ),
					'600'    => esc_html__( '600', 'coaching' ),
					'700'    => esc_html__( '700', 'coaching' ),
					'800'    => esc_html__( '800', 'coaching' ),
					'900'    => esc_html__( '900', 'coaching' ),
				],
				'default' => ''
			]
		);

		$this->add_control(
			'description_mg_top',
			[
				'label'   => esc_html__( 'Margin Top (px)', 'coaching' ),
				'type'    => Controls_Manager::NUMBER,
				'default' => '',
				'min'     => 0,
				'step'    => 1
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'read_more_group',
			[
				'label' => __( 'Link', 'coaching' ),
			]
		);

		$this->add_control(
			'link',
			[
				'label'         => __( 'URL', 'coaching' ),
				'type'          => Controls_Manager::URL,
				'placeholder'   => __( 'https://your-link.com', 'coaching' ),
				'show_external' => true,
				'default'       => [
					'url'         => '',
					'is_external' => true,
					'nofollow'    => true,
				],
			]
		);

		$this->add_control(
			'read_more',
			[
				'label'   => __( 'Apply to', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"complete_box" => esc_html__( "Complete Box", 'coaching' ),
					"title"        => esc_html__( "Box Title", 'coaching' ),
					"more"         => esc_html__( "Display Read More", 'coaching' ),
				],
				'default' => 'complete_box'
			]
		);

		$this->add_control(
			'read_text',
			[
				'label'       => __( 'Read More Text', 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Add your text here', 'coaching' ),
				'default'     => esc_html__( 'Read More', 'coaching' ),
				'label_block' => true,
				'condition'   => [
					'read_more' => [ 'more' ]
				]
			]
		);

		$this->add_control(
			'read_more_text_color',
			[
				'label'     => __( 'Text Color Read More', 'coaching' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'read_more' => [ 'more' ]
				]
			]
		);

		$this->add_control(
			'border_read_more_text',
			[
				'label'     => __( 'Border Color Read More Text:', 'coaching' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'read_more' => [ 'more' ]
				]
			]
		);

		$this->add_control(
			'bg_read_more_text',
			[
				'label'     => __( 'Background Color Read More Text:', 'coaching' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'read_more' => [ 'more' ]
				]
			]
		);

		$this->add_control(
			'read_more_text_color_hover',
			[
				'label'     => __( 'Text Hover Color Read More', 'coaching' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'read_more' => [ 'more' ]
				]
			]
		);

		$this->add_control(
			'bg_read_more_text_hover',
			[
				'label'     => __( 'Background Hover Color Read More Text:', 'coaching' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'read_more' => [ 'more' ]
				]
			]
		);

		$this->add_control(
			'link_to_icon',
			[
				'label'   => __( 'Show Link To Icon', 'coaching' ),
				'type'    => Controls_Manager::SWITCHER,
				'options' => [
					'no'  => __( 'Yes', 'coaching' ),
					'yes' => __( 'No', 'coaching' ),
				],
				'default' => 'no'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_group',
			[
				'label' => __( 'Icon', 'coaching' ),
			]
		);

		$this->add_control(
			'icon_type',
			[
				'label'   => __( 'Icon Type', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"font-awesome"  => esc_html__( "Font Awesome Icon", 'coaching' ),
					"font-7-stroke" => esc_html__( "Font 7 stroke Icon", 'coaching' ),
					"custom"        => esc_html__( "Custom Image", 'coaching' )
				],
				'default' => 'font-awesome'
			]
		);

		$this->add_control(
			'icon',
			[
				'label'       => esc_html__( 'Select Icon:', 'coaching' ),
				'type'        => Controls_Manager::ICON,
				'placeholder' => esc_html__( 'Choose...', 'coaching' ),
				'condition'   => [
					'icon_type' => [ 'font-awesome' ]
				]
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label'     => __( 'Icon Font Size (px)', 'coaching' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 14,
				'min'       => 0,
				'step'      => 1,
				'condition' => [
					'icon_type' => [ 'font-awesome' ]
				]
			]
		);

		$this->add_control(
			'flat_icon',
			[
				'label'       => esc_html__( 'Select Icon:', 'coaching' ),
				'type'        => Controls_Manager::ICON,
				'placeholder' => esc_html__( 'Choose...', 'coaching' ),
				'options'     => \Thim_Elementor_Extend_Icons::get_font_flaticon(),
				'exclude'     => array_keys( Control_Icon::get_icons() ),
				'condition'   => [
					'icon_type' => [ 'font-flaticon' ]
				]
			]
		);

		$this->add_control(
			'flat_icon_size',
			[
				'label'     => __( 'Icon Font Size (px)', 'coaching' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 14,
				'min'       => 0,
				'step'      => 1,
				'condition' => [
					'icon_type' => [ 'font-flaticon' ]
				]
			]
		);

		$this->add_control(
			'stroke_icon',
			[
				'label'       => esc_html__( 'Select Icon:', 'coaching' ),
				'type'        => Controls_Manager::ICON,
				'placeholder' => esc_html__( 'Choose...', 'coaching' ),
				'options'     => \Thim_Elementor_Extend_Icons::get_font_7_stroke(),
				'exclude'     => array_keys( Control_Icon::get_icons() ),
				'condition'   => [
					'icon_type' => [ 'font-7-stroke' ]
				]
			]
		);

		$this->add_control(
			'stroke_icon_size',
			[
				'label'     => __( 'Icon Font Size (px)', 'coaching' ),
				'type'      => Controls_Manager::NUMBER,
				'default'   => 14,
				'min'       => 0,
				'step'      => 1,
				'condition' => [
					'icon_type' => [ 'font-7-stroke' ]
				]
			]
		);

		$this->add_control(
			'icon_img',
			[
				'label'     => esc_html__( 'Choose Image', 'coaching' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'icon_type' => [ 'custom' ]
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'layout_group',
			[
				'label' => esc_html__( 'Layout Options', 'coaching' ),
			]
		);

		$this->add_control(
			'box_icon_style',
			[
				'label'   => esc_html__( 'Icon Shape', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					""       => esc_html__( "None", 'coaching' ),
					"circle" => esc_html__( "Circle", 'coaching' )
				],
				'default' => 'circle'
			]
		);

		$this->add_control(
			'pos',
			[
				'label'   => esc_html__( 'Box Style:', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"left"  => esc_html__( "Icon at Left", 'coaching' ),
					"right" => esc_html__( "Icon at Right", 'coaching' ),
					"top"   => esc_html__( "Icon at Top", 'coaching' ),
					"push"  => esc_html__( "Icon Push Box", 'coaching' ),
				],
				'default' => 'top'
			]
		);

		$this->add_control(
			'sub_title_push',
			[
				"label"       => esc_html__( "Push Box Sub Title:", 'coaching' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => esc_html__( "The push box sub title.", 'coaching' ),
				'label_block' => true,
				'condition'   => [
					'pos' => [ 'push' ]
				]
			]
		);

		$this->add_control(
			'img_push',
			[
				"label"       => esc_html__( "Upload Image Push Box:", 'coaching' ),
				"description" => esc_html__( "Upload the push box image.", 'coaching' ),
				'type'        => Controls_Manager::MEDIA,
				'condition'   => [
					'pos' => [ 'push' ]
				]
			]
		);

		$this->add_control(
			'text_align_sc',
			[
				'label'   => esc_html__( 'Text Align Shortcode:', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					"text-left"   => esc_html__( "Text Left", 'coaching' ),
					"text-right"  => esc_html__( "Text Right", 'coaching' ),
					"text-center" => esc_html__( "Text Center", 'coaching' )
				],
				'default' => 'text-left'
			]
		);

		$this->add_control(
			'style_box',
			[
				'label'   => esc_html__( 'Type Icon Box', 'coaching' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
					""             => esc_html__( "Default", 'coaching' ),
					"overlay"      => esc_html__( "Overlay", 'coaching' ),
					"contact_info" => esc_html__( "Contact Info", 'coaching' ),
					"image_box"    => esc_html__( "Image Box", 'coaching' ),
					"border"       => esc_html__( "Border Box", 'coaching' ),
					"featured_box" => esc_html__( "Featured Box", 'coaching' ),
					"hover_box"    => esc_html__( "Hover Box", 'coaching' ),
				],
				'default' => ''
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'color_group',
			[
				'label' => esc_html__( 'Style', 'coaching' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'color_title',
			[
				'label' => __( 'Title Color', 'coaching' ),
				'type'  => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'color_description',
			[
				'label' => __( 'Description Color', 'coaching' ),
				'type'  => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label' => esc_html__( 'Icon Color:', 'coaching' ),
				'type'  => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'icon_border_color',
			[
				'label' => esc_html__( 'Icon Border Color:', 'coaching' ),
				'type'  => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'icon_bg_color',
			[
				'label' => esc_html__( 'Icon Background Color:', 'coaching' ),
				'type'  => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label' => esc_html__( 'Hover Icon Color:', 'coaching' ),
				'type'  => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'icon_border_color_hover',
			[
				'label' => esc_html__( 'Hover Icon Border Color:', 'coaching' ),
				'type'  => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'icon_bg_color_hover',
			[
				'label' => esc_html__( 'Hover Icon Background Color:', 'coaching' ),
				'type'  => Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'widget_background',
			[
				'label'     => esc_html__( 'Widget Background', 'coaching' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					"none"     => esc_html__( "None", 'coaching' ),
					"bg_color" => esc_html__( "Background Color", 'coaching' ),
					"bg_video" => esc_html__( "Video Background", 'coaching' ),
					"bg_image" => esc_html__( "Image Background Bellow Icon", 'coaching' )
				],
				'default'   => 'none',
				'separator' => 'before'
			]
		);

		$this->add_control(
			'bg_box_color',
			[
				'label'     => esc_html__( 'Background Color:', 'coaching' ),
				'type'      => Controls_Manager::COLOR,
				'condition' => [
					'widget_background' => [ 'bg_color' ]
				]
			]
		);

		$this->add_control(
			'icon_img_background',
			[
				"label"       => esc_html__( "Upload Image Background Bellow Icon", 'coaching' ),
				"description" => esc_html__( "Upload Image Background Bellow Icon.", 'coaching' ),
				'type'        => Controls_Manager::MEDIA,
				'condition'   => [
					'widget_background' => [ 'bg_image' ]
				]
			]
		);


		$this->add_control(
			'self_video',
			[
				'label'       => esc_html__( 'Select video', 'coaching' ),
				'description' => esc_html__( 'Select an uploaded video in mp4 format. Other formats, such as webm and ogv will work in some browsers. You can use an online service such as \'http://video.online-convert.com/convert-to-mp4\' to convert your videos to mp4.', 'coaching' ),
				'type'        => Controls_Manager::MEDIA,
				'media_type'  => 'video',
				'condition'   => [
					'widget_background' => [ 'bg_video' ]
				],
			]
		);

		$this->add_control(
			'self_poster',
			[
				'label'     => esc_html__( 'Select cover image', 'coaching' ),
				'type'      => Controls_Manager::MEDIA,
				'default'   => [
					'url' => Utils::get_placeholder_image_src(),
				],
				'condition' => [
					'widget_background' => [ 'bg_video' ]
				]
			]
		);

		$this->add_control(
			'css_animation',
			[
				'label'     => esc_html__( 'CSS Animation', 'coaching' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					""              => esc_html__( "No", 'coaching' ),
					"top-to-bottom" => esc_html__( "Top to bottom", 'coaching' ),
					"bottom-to-top" => esc_html__( "Bottom to top", 'coaching' ),
					"left-to-right" => esc_html__( "Left to right", 'coaching' ),
					"right-to-left" => esc_html__( "Right to left", 'coaching' ),
					"appear"        => esc_html__( "Appear from center", 'coaching' )
				],
				'default'   => '',
				'separator' => 'before'
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'dimension',
			[
				'label' => esc_html__( 'Dimension', 'coaching' ),
				'tab'   => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'width_icon_box',
			[
				'label'      => esc_html__( 'Width Box Icon (px)', 'coaching' ),
				'type'       => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range'      => [
					'px' => [
						'min'  => 0,
						'max'  => 1000,
						'step' => 1,
					]
				],
				'default'    => [
					'unit' => 'px',
					'size' => 100,
				]
			]
		);

		$this->end_controls_section();
	}

	protected function render() {
		$settings = $this->get_settings_for_display();

		// Map variables between Elementor and SiteOrigin
		$instance = array();

		$instance['title_group'] = array(
			'title'            => $settings['title'],
			'color_title'      => $settings['color_title'],
			'size'             => $settings['size'],
			'font_heading'     => $settings['font_heading'],
			'custom_heading'   => array(
				'custom_font_size'   => $settings['custom_font_size'],
				'custom_font_weight' => $settings['custom_font_weight'],
				'custom_mg_bt'       => $settings['custom_mg_bt'],
				'custom_mg_top'      => $settings['custom_mg_top']
			),
			'line_after_title' => $settings['line_after_title']
		);

		$instance['desc_group'] = array(
			'content'                 => $settings['content'],
			'custom_font_size_des'    => $settings['custom_font_size_des'],
			'custom_font_weight_desc' => $settings['custom_font_weight_desc'],
			'color_description'       => $settings['color_description'],
			'description_mg_top'      => $settings['description_mg_top']
		);

		$instance['read_more_group'] = array(
			'link'                   => $settings['link']['url'],
			'link_target'            => ! empty( $settings['link']['is_external'] ) ? '_blank' : '_self',
			'read_more'              => $settings['read_more'],
			'link_to_icon'           => $settings['link_to_icon'],
			'button_read_more_group' => array(
				'read_text'                  => $settings['read_text'],
				'read_more_text_color'       => $settings['read_more_text_color'],
				'border_read_more_text'      => $settings['border_read_more_text'],
				'bg_read_more_text'          => $settings['bg_read_more_text'],
				'read_more_text_color_hover' => $settings['read_more_text_color_hover'],
				'bg_read_more_text_hover'    => $settings['bg_read_more_text_hover']
			)
		);

		$instance['icon_type']          = $settings['icon_type'];
		$instance['font_awesome_group'] = array(
			'icon'      => $settings['icon'],
			'icon_size' => $settings['icon_size']
		);

		$instance['font_7_stroke_group']          = array(
			'icon'      => $settings['stroke_icon'],
			'icon_size' => $settings['stroke_icon_size']
		);
		$instance['font_image_group']['icon_img'] = isset( $settings['icon_img'] ) ? $settings['icon_img']['id'] : '';

		$instance['width_icon_box'] = isset( $settings['width_icon_box'] ) ? $settings['width_icon_box']['size'] : '';

		$instance['color_group'] = array(
			'icon_color'              => $settings['icon_color'],
			'icon_border_color'       => $settings['icon_border_color'],
			'icon_bg_color'           => $settings['icon_bg_color'],
			'icon_hover_color'        => $settings['icon_hover_color'],
			'icon_border_color_hover' => $settings['icon_border_color_hover'],
			'icon_bg_color_hover'     => $settings['icon_bg_color_hover']
		);

		$instance['layout_group'] = array(
			'box_icon_style' => $settings['box_icon_style'],
			'pos'            => $settings['pos'],
			'img_push'       => isset( $settings['img_push'] ) ? $settings['img_push']['id'] : '',
			'sub_title_push' => $settings['sub_title_push'],
			'text_align_sc'  => $settings['text_align_sc'],
			'style_box'      => $settings['style_box']
		);

		$instance['widget_background']   = $settings['widget_background'];
		$instance['bg_box_color']        = $settings['bg_box_color'];
		$instance['icon_img_background'] = isset( $settings['icon_img_background'] ) ? $settings['icon_img_background']['id'] : '';
		$instance['self_video']          = $settings['self_video'];
		$instance['self_poster']         = $settings['self_poster'];
		$instance['css_animation']       = $settings['css_animation'];

		thim_get_widget_template( $this->get_base(), array( 'instance' => $instance ) );
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Thim_Icon_Box_El() );
