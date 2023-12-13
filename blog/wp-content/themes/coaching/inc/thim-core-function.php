<?php

require THIM_DIR . 'inc/admin/require-thim-core.php';

if ( !thim_plugin_active( 'thim-framework/tp-framework.php' ) ) {
	if ( thim_plugin_active( 'thim-core/thim-core.php' ) ) {
		require THIM_DIR . 'inc/admin/plugins-require.php';
		require THIM_DIR . 'inc/admin/customize-options.php';
		require THIM_DIR . 'inc/widgets/widgets.php';
	}
} else {
	return;
}

require THIM_DIR . 'inc/libs/Tax-meta-class/Tax-meta-class.php';
require THIM_DIR . 'inc/tax-meta.php';


/**
 * Compile Sass from theme customize.
 */
add_filter( 'thim_core_config_sass', 'thim_theme_options_sass' );

function thim_theme_options_sass() {
	$dir = THIM_DIR . 'assets/sass/';

	return array(
		'dir'  => $dir,
		'name' => '_style-options.scss',
	);
}

//Filter meta-box
add_filter( 'thim_metabox_display_settings', 'thim_add_metabox_settings', 100, 2 );
if ( !function_exists( 'thim_add_metabox_settings' ) ) {

	function thim_add_metabox_settings( $meta_box, $prefix ) {
		if ( defined( 'THIM_CORE_VERSION' ) && version_compare( THIM_CORE_VERSION, '1.0.3', '>' ) ) {
			if ( isset( $_GET['post'] ) ) {
				if ( $_GET['post'] == get_option( 'page_on_front' ) || $_GET['post'] == get_option( 'page_for_posts' ) ) {
					return false;
				}
			}
		}

		$meta_box['post_types'] = array( 'page', 'post', 'lp_course', 'our_team', 'testimonials', 'product', 'tp_event' );


		$prefix                      = 'thim_mtb_';
		$meta_box['tabs']['related'] = array(
			'label' => __( 'Related posts', 'coaching' ),
		);
		$meta_box['tabs']            = array(
			'title'  => array(
				'label' => __( 'Featured Title Area', 'coaching' ),
				'icon'  => 'dashicons-admin-appearance',
			),
			'layout' => array(
				'label' => __( 'Layout', 'coaching' ),
				'icon'  => 'dashicons-align-left',
			),
		);

		$meta_box['fields'] = array(
			/**
			 * Custom Title and Subtitle.
			 */
			array(
				'name' => __( 'Custom Title and Subtitle', 'coaching' ),
				'id'   => $prefix . 'using_custom_heading',
				'type' => 'checkbox',
				'std'  => false,
				'tab'  => 'title',
			),
			array(
				'name'   => __( 'Hide Title and Subtitle', 'coaching' ),
				'id'     => $prefix . 'hide_title_and_subtitle',
				'type'   => 'checkbox',
				'std'    => false,
				'hidden' => array( $prefix . 'using_custom_heading', '!=', true ),
				'tab'    => 'title',
			),
			array(
				'name'   => __( 'Custom Title', 'coaching' ),
				'id'     => $prefix . 'custom_title',
				'type'   => 'text',
				'desc'   => __( 'Leave empty to use post title', 'coaching' ),
				'hidden' => array( $prefix . 'using_custom_heading', '!=', true ),
				'tab'    => 'title',
			),
			array(
				'name'   => __( 'Color Title', 'coaching' ),
				'id'     => $prefix . 'text_color',
				'type'   => 'color',
				'hidden' => array( $prefix . 'using_custom_heading', '!=', true ),
				'tab'    => 'title',
			),
			array(
				'name'   => __( 'Subtitle', 'coaching' ),
				'id'     => 'thim_subtitle',
				'type'   => 'text',
				'hidden' => array( $prefix . 'using_custom_heading', '!=', true ),
				'tab'    => 'title',
			),
			array(
				'name'   => __( 'Color Subtitle', 'coaching' ),
				'id'     => $prefix . 'color_sub_title',
				'type'   => 'color',
				'hidden' => array( $prefix . 'using_custom_heading', '!=', true ),
				'tab'    => 'title',
			),
			array(
				'name'   => __( 'Hide Breadcrumbs', 'coaching' ),
				'id'     => $prefix . 'hide_breadcrumbs',
				'type'   => 'checkbox',
				'std'    => false,
				'hidden' => array( $prefix . 'using_custom_heading', '!=', true ),
				'tab'    => 'title',
			),

			array(
				'name'             => __( 'Background Image', 'coaching' ),
				'id'               => $prefix . 'top_image',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
				'tab'              => 'title',
				'hidden'           => array( $prefix . 'using_custom_heading', '!=', true ),
			),
			array(
				'name'   => __( 'Background color', 'coaching' ),
				'id'     => $prefix . 'bg_color',
				'type'   => 'color',
				'hidden' => array( $prefix . 'using_custom_heading', '!=', true ),
				'tab'    => 'title',
			),
			array(
				'name'   => __( 'Background color opacity', 'coaching' ),
				'id'     => $prefix . 'bg_opacity',
				'type'   => 'number',
				'std'    => 1,
				'step'   => 'any',
				'min'    => 0,
				'max'    => 1,
				'hidden' => array( $prefix . 'using_custom_heading', '!=', true ),
				'tab'    => 'title',
			),

			/**
			 * Custom layout
			 */
			array(
				'name' => __( 'Use Custom Layout', 'coaching' ),
				'id'   => $prefix . 'custom_layout',
				'type' => 'checkbox',
				'tab'  => 'layout',
				'std'  => false,
			),
			array(
				'name'    => __( 'Select Layout', 'coaching' ),
				'id'      => $prefix . 'layout',
				'type'    => 'image_select',
				'options' => array(
					'sidebar-left'  => THIM_URI . 'images/layout/sidebar-left.jpg',
					'full-content'  => THIM_URI . 'images/layout/body-full.jpg',
					'sidebar-right' => THIM_URI . 'images/layout/sidebar-right.jpg',
				),
				'default' => 'sidebar-right',
				'tab'     => 'layout',
				'hidden'  => array( $prefix . 'custom_layout', '=', false ),
			),
			array(
				'name' => __( 'No Padding Content', 'coaching' ),
				'id'   => $prefix . 'no_padding',
				'type' => 'checkbox',
				'std'  => false,
				'tab'  => 'layout',
			),
		);

		return $meta_box;
	}
}

/**
 * List child themes.
 *
 * @return array
 */
function thim_coaching_list_child_themes() {
	return array(
		'coaching-child' => array(
			'name'       => 'Coaching Child',
			'slug'       => 'coaching-child',
			'screenshot' => 'https://thimpresswp.github.io/demo-data/coaching/child-themes/coaching-child.jpg',
			'source'     => 'https://thimpresswp.github.io/demo-data/coaching/child-themes/coaching-child.zip',
			'version'    => '1.0.0'
		),
	);
}

add_filter( 'thim_core_list_child_themes', 'thim_coaching_list_child_themes' );

add_action( 'thim_core_activate_plugin', 'thim_coaching_deactivate_tp_event' );
function thim_coaching_deactivate_tp_event( $plugin ) {
	if ( $plugin != 'wp-events-manager/wp-events-manager.php' ) {
		return;
	}

	if ( !function_exists( 'get_plugin_data' ) ) {
		require_once ABSPATH . '/wp-admin/includes/plugin.php';
	}

	$tp_event_plugins = array(
		'tp-event-auth/tp-event-auth.php',
		'tp-event/tp-event.php'
	);

	foreach ( $tp_event_plugins as $_plugin ) {
		if ( is_multisite() ) {
			deactivate_plugins( $_plugin, false, true );
		} else {
			deactivate_plugins( $_plugin, false, false );
		}
	}
}

add_action( 'thim_core_dashboard_init', 'thim_coaching_require_latest_thim_core_importer' );
function thim_coaching_require_latest_thim_core_importer() {
	if ( !defined( 'THIM_CORE_VERSION' ) || version_compare( THIM_CORE_VERSION, '1.3.5', '>=' ) ) {
		return;
	}

	if ( !isset( $_GET['page'] ) || $_GET['page'] != 'thim-importer' ) {
		return;
	}

	$link = network_admin_url( 'update-core.php' );

	Thim_Notification::add_notification(
		array(
			'id'          => 'coaching_update_importer',
			'type'        => 'warning',
			'content'     => sprintf( __( '<strong>Important!</strong> This Coaching version requires Thim Core plugin 1.3.5 or higher, please go <a href="%s">here</a> and update the plugin.', 'coaching' ), $link ),
			'dismissible' => false,
			'global'      => false,
		)
	);
}

//Add font
function albert_custom_fonts( $standard_fonts ) {

	$standard_fonts = [
		'serif'      => [
			'label' => 'Serif',
			'stack' => 'Georgia,Times,"Times New Roman",serif',
		],
		'sans-serif' => [
			'label' => 'Sans Serif',
			'stack' => '-apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif',
		],
		'monospace'  => [
			'label' => 'Monospace',
			'stack' => 'Monaco,"Lucida Sans Typewriter","Lucida Typewriter","Courier New",Courier,monospace',
		],
	];

	return $standard_fonts;
}

add_filter( 'kirki/fonts/standard_fonts', 'albert_custom_fonts' );