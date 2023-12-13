<?php

/**
 * Plugin Name: Coaching Demo Data
 * Description: Demo data for the theme Coaching.
 * Plugin URI: https://thimpress.com
 * Version: 1.2.2
 * Author: ThimPress
 * Author URI: https://thimpress.com
 * Text Domain: coaching-dd
 * Domain Path: /languages
 */

define( 'COACHING_DD_FILE', __FILE__ );
define( 'COACHING_DD_PATH', dirname( __FILE__ ) );
define( 'COACHING_DD_URI', untrailingslashit( plugins_url( '', COACHING_DD_FILE ) ) );

/**
 * Coaching demo data init.
 *
 * @since 1.0.0
 */
function coaching_dd_init() {
	$is_support = get_theme_support( 'coaching-demo-data' );

	if ( ! $is_support ) {
		return;
	}

	add_filter( 'thim_core_importer_base_uri_demo_data', 'coaching_dd_filter_importer_base_uri_demo_data' );
	add_filter( 'thim_core_importer_base_path_demo_data', 'coaching_dd_filter_importer_base_path_demo_data' );
	add_filter( 'thim_core_importer_directory_revsliders', 'coaching_dd_filter_importer_directory_revsliders' );
	add_filter( 'thim_core_importer_path_demo_image', 'coaching_dd_filter_importer_path_demo_image' );
	add_filter( 'thim_core_importer_uri_demo_image', 'coaching_dd_filter_importer_uri_demo_image' );
	add_action( 'thim_core_importer_next_step', 'coaching_dd_download_demo_data', 10, 2 );
}

add_action( 'init', 'coaching_dd_init' );

/**
 * Download and unzip demo data.
 *
 * @since 1.1.0
 *
 * @param $done
 * @param $next
 *
 * @throws Thim_Error
 */
function coaching_dd_download_demo_data( $done, $next ) {
	if ( $done !== 'plugins' ) {
		return;
	}

	$demo_data = Thim_Importer_AJAX::get_current_demo_data();
	$demo_key  = $demo_data['demo'];
	
	$url       = 'https://thimpresswp.github.io/demo-data/coaching/demos/' . $demo_key . '.zip';

	$package = Thim_File_Helper::download_file( $url );
	if ( is_wp_error( $package ) ) {
		throw Thim_Error::create( $package->get_error_message(), 8, __( 'Please try again later 2.', 'coaching-demo-data' ) );
	}

	$path_file = COACHING_DD_PATH . '/data/demos/' . $demo_key . '.zip';
	$dir       = pathinfo( $path_file, PATHINFO_DIRNAME );
	$unzip     = Thim_File_Helper::unzip_file( $package, $dir );
	if ( is_wp_error( $unzip ) ) {
		throw Thim_Error::create( $unzip->get_error_message(), 0, __( 'Please try again later 4.', 'coaching-demo-data' ) );
	}
}

/**
 * Filter base uri demo data.
 *
 * @since 1.0.0
 *
 * @return string
 */
function coaching_dd_filter_importer_base_uri_demo_data() {
	return COACHING_DD_URI . '/data/demos/';
}

/**
 * Filter base path demo data.
 *
 * @since 1.0.0
 *
 * @return string
 */
function coaching_dd_filter_importer_base_path_demo_data() {
	return COACHING_DD_PATH . '/data/demos/';
}

/**
 * Filter directory revolution sliders.
 *
 * @since 1.0.0
 *
 * @return string
 */
function coaching_dd_filter_importer_directory_revsliders() {
	return 'https://thimpresswp.github.io/demo-data/coaching/revsliders/';
}

/**
 * Filter path demo image.
 *
 * @since 1.0.0
 *
 * @return string
 */
function coaching_dd_filter_importer_path_demo_image() {
	return COACHING_DD_PATH . '/data/demo_image.jpg';
}

/**
 * Filter uri demo image.
 *
 * @since 1.0.0
 *
 * @return string
 */
function coaching_dd_filter_importer_uri_demo_image() {
	return COACHING_DD_URI . '/data/demo_image.jpg';
}
