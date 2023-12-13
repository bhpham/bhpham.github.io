<?php
add_action( 'wp_enqueue_scripts', 'olsen_light_enqueue_scripts' );
function olsen_light_enqueue_scripts() {
	$suffix = olsen_light_scripts_styles_suffix();
	/*
	 * Styles
	 */
	$theme = wp_get_theme();

	$font_url = '';
	/* translators: If there are characters in your language that are not supported by Lora and Lato, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Lora and Lato fonts: on or off', 'olsen-light' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lora:400,700,400italic,700italic|Lato:400,400italic,700,700italic' ), '//fonts.googleapis.com/css' );
	}
	wp_register_style( 'olsen-light-google-font', esc_url( $font_url ) );

	wp_register_style( 'font-awesome', get_template_directory_uri() . "/vendor/fontawesome/font-awesome{$suffix}.css", array(), '4.7.0' );
	wp_register_style( 'tiny-slider', get_template_directory_uri() . "/vendor/tiny-slider/tiny-slider{$suffix}.css", array(), '2.9.3' );
	wp_register_style( 'simple-lightbox', get_template_directory_uri() . "/vendor/simple-lightbox/simple-lightbox{$suffix}.css", array(), '2.7.0' );
	wp_register_style( 'olsen-light-simple-lightbox-theme', get_template_directory_uri() . "/css/simple-lightbox-theme{$suffix}.css", array(), $theme->get( 'Version' ) );

	wp_enqueue_style( 'olsen-light-style', get_template_directory_uri() . '/style.css', array(
		'olsen-light-google-font',
		'font-awesome',
		'simple-lightbox',
		'tiny-slider',
		'olsen-light-simple-lightbox-theme',
	), $theme->get( 'Version' ) );

	if( is_child_theme() ) {
		wp_enqueue_style( 'olsen-light-style-child', get_stylesheet_directory_uri() . '/style.css', array(
			'olsen-light-style',
		), $theme->get( 'Version' ) );
	}

	/*
	 * Scripts
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_register_script( 'simple-lightbox', get_template_directory_uri() . "/vendor/simple-lightbox/simple-lightbox{$suffix}.js", array(), '2.7.0', true );
	wp_register_script( 'tiny-slider', get_template_directory_uri() . "/vendor/tiny-slider/tiny-slider{$suffix}.js", array(), '2.9.3', true );

	/*
	 * Enqueue
	 */
	wp_enqueue_script( 'olsen-light-front-scripts', get_template_directory_uri() . "/js/scripts{$suffix}.js", array(
		'simple-lightbox',
		'tiny-slider',
	), $theme->get( 'Version' ), true );

}

add_action( 'admin_enqueue_scripts', 'olsen_light_admin_enqueue_scripts' );
function olsen_light_admin_enqueue_scripts( $hook ) {
	$theme = wp_get_theme();

	/*
	 * Styles
	 */


	/*
	 * Scripts
	 */


	/*
	 * Enqueue
	 */
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
		wp_enqueue_media();
		wp_enqueue_style( 'olsen-light-post-meta' );
		wp_enqueue_script( 'olsen-light-post-meta' );
	}

	if ( in_array( $hook, array( 'profile.php', 'user-edit.php' ) ) ) {
		wp_enqueue_media();
		wp_enqueue_style( 'olsen-light-post-meta' );
		wp_enqueue_script( 'olsen-light-post-meta' );
	}

	if ( in_array( $hook, array( 'widgets.php', 'customize.php' ) ) ) {
		wp_enqueue_media();
		wp_enqueue_style( 'olsen-light-post-meta' );
		wp_enqueue_script( 'olsen-light-post-meta' );
	}

}
