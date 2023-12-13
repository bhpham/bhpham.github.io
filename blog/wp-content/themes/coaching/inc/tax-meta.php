<?php

if ( is_admin() ) {
	/*
	   * prefix of meta keys, optional
	   */
	$prefix = 'thim_';

	/*
	   * Fnfigure your meta box
	   */
	$config = array(
		'id'             => 'category_meta_box',
		// meta box id, unique per meta box
		'title'          => esc_html__('Category Meta Box', 'coaching'),
		// meta box title
		'pages'          => array( 'category', 'product_cat', 'course_category', 'portfolio_category' ),
		// taxonomy name, accept categories, post_tag and custom taxonomies
		'context'        => 'normal',
		// where the meta box appear: normal (default), advanced, side; optional
		'fields'         => array(),
		// list of meta fields (can be added by field arrays)
		'local_images'   => false,
		// Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => get_template_directory_uri() . '/inc/libs/Tax-meta-class'
		//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);

	$config_product_cat = array(
		'id'             => 'product_cat_meta_box',
		// meta box id, unique per meta box
		'title'          => esc_html__('Category Meta Box', 'coaching'),
		// meta box title
		'pages'          => array( 'product_cat' ),
		// taxonomy name, accept categories, post_tag and custom taxonomies
		'context'        => 'normal',
		// where the meta box appear: normal (default), advanced, side; optional
		'fields'         => array(),
		// list of meta fields (can be added by field arrays)
		'local_images'   => false,
		// Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => false
		//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);

	$config_courses_cat = array(
		'id'             => 'product_cat_meta_box',
		// meta box id, unique per meta box
		'title'          => esc_html__('Course Meta Box', 'coaching'),
		// meta box title
		'pages'          => array( 'course_category' ),
		// taxonomy name, accept categories, post_tag and custom taxonomies
		'context'        => 'normal',
		// where the meta box appear: normal (default), advanced, side; optional
		'fields'         => array(),
		// list of meta fields (can be added by field arrays)
		'local_images'   => false,
		// Use local or hosted images (meta box images for add/remove)
		'use_with_theme' => false
		//change path if used with theme set to true, false for a plugin or anything else for a custom path(default false).
	);
	/*
	   * Initiate your meta box
	   */
	$my_meta            = new Tax_Meta_Class( $config );
	$product_cat_meta   = new Tax_Meta_Class( $config_product_cat );
	$config_courses_cat = new Tax_Meta_Class( $config_courses_cat );

	/*
   * Add fields to your meta box
   */
	/* blog */

	$my_meta->addSelect( $prefix . 'layout', array(
		''              => esc_html__('Using in Theme Option', 'coaching'),
		'full-content'  => esc_html__('No Sidebar', 'coaching'),
		'sidebar-left'  => esc_html__('Left Sidebar', 'coaching'),
		'sidebar-right' => esc_html__('Right Sidebar', 'coaching')
	), array( 'name' => esc_html__( 'Custom Layout ', 'coaching' ), 'std' => array( '' ) ) );

	$my_meta->addSelect( $prefix . 'custom_heading', array(
		''       => esc_html__('Using in Theme Option', 'coaching'),
		'custom' => esc_html__('Custom',  'coaching'),
	), array( 'name' => esc_html__( 'Custom Heading ', 'coaching' ), 'std' => array( '' ) ) );

	$my_meta->addImage( $prefix . 'archive_top_image', array( 'name' => esc_html__( 'Background Image Heading', 'coaching' ) ) );
	$my_meta->addColor( $prefix . 'archive_cate_heading_bg_color', array( 'name' => esc_html__( 'Background Color Heading', 'coaching' ) ) );
	$my_meta->addColor( $prefix . 'archive_cate_heading_text_color', array( 'name' => esc_html__( 'Text Color Heading', 'coaching' ) ) );
	$my_meta->addColor( $prefix . 'archive_cate_sub_heading_text_color', array( 'name' => esc_html__( 'Color Description Category', 'coaching' ) ) );
	$my_meta->addCheckbox( $prefix . 'archive_cate_hide_title', array( 'name' => esc_html__( 'Hide Title', 'coaching' ) ) );
	$my_meta->addCheckbox( $prefix . 'archive_cate_hide_breadcrumbs', array( 'name' => esc_html__( 'Hide Breadcrumbs', 'coaching' ) ) );
	$my_meta->Finish();

	// option woocommerce
	$product_cat_meta->addSelect( $prefix . 'layout', array(
		''              => esc_html__('Using in Theme Option', 'coaching'),
		'full-content'  => esc_html__('No Sidebar', 'coaching'),
		'sidebar-left'  => esc_html__('Left Sidebar', 'coaching'),
		'sidebar-right' => esc_html__('Right Sidebar', 'coaching')
	), array( 'name' => esc_html__( 'Custom Layout ', 'coaching' ), 'std' => array( '' ) ) );

	$product_cat_meta->addSelect( $prefix . 'custom_heading', array(
		''       => esc_html__('Using in Theme Option','coaching'),
		'custom' => esc_html__('Custom', 'coaching')
	), array( 'name' => esc_html__( 'Custom Heading ', 'coaching' ), 'std' => array( '' ) ) );

	$product_cat_meta->addImage( $prefix . 'woo_top_image', array( 'name' => esc_html__( 'Background Image Heading', 'coaching' ) ) );
	$product_cat_meta->addColor( $prefix . 'woo_cate_heading_bg_color', array( 'name' => esc_html__( 'Background Color Heading', 'coaching' ) ) );
	$product_cat_meta->addColor( $prefix . 'woo_cate_heading_text_color', array( 'name' => esc_html__( 'Text Color Heading', 'coaching' ) ) );
	$product_cat_meta->addColor( $prefix . 'woo_cate_sub_heading_text_color', array( 'name' => esc_html__( 'Color Description Category', 'coaching' ) ) );
	$product_cat_meta->addCheckbox( $prefix . 'woo_cate_hide_title', array( 'name' => esc_html__( 'Hide Title', 'coaching' ) ) );
	$product_cat_meta->addCheckbox( $prefix . 'woo_cate_hide_breadcrumbs', array( 'name' => esc_html__( 'Hide Breadcrumbs', 'coaching' ) ) );
	$product_cat_meta->Finish();

	// option courses
	$config_courses_cat->addSelect( $prefix . 'layout', array(
		''              => esc_html__('Using in Theme Option', 'coaching' ),
		'full-content'  => esc_html__('No Sidebar', 'coaching' ),
		'sidebar-left'  => esc_html__('Left Sidebar', 'coaching' ),
		'sidebar-right' => esc_html__('Right Sidebar', 'coaching' ),
	), array( 'name' => esc_html__( 'Custom Layout ', 'coaching' ), 'std' => array( '' ) ) );

	$config_courses_cat->addSelect( $prefix . 'custom_heading', array(
		''       => esc_html__('Using in Theme Option', 'coaching' ),
		'custom' => esc_html__('Custom', 'coaching' ),
	), array( 'name' => esc_html__( 'Custom Heading ', 'coaching' ), 'std' => array( '' ) ) );

	$config_courses_cat->addImage( $prefix . 'learnpress_top_image', array( 'name' => esc_html__( 'Background Image Heading', 'coaching' ) ) );
	$config_courses_cat->addColor( $prefix . 'learnpress_cate_heading_bg_color', array( 'name' => esc_html__( 'Background Color Heading', 'coaching' ) ) );
	$config_courses_cat->addColor( $prefix . 'learnpress_cate_heading_text_color', array( 'name' => esc_html__( 'Text Color Heading', 'coaching' ) ) );
	$config_courses_cat->addColor( $prefix . 'learnpress_cate_sub_heading_text_color', array( 'name' => esc_html__( 'Color Description Category', 'coaching' ) ) );
	$config_courses_cat->addCheckbox( $prefix . 'learnpress_cate_hide_title', array( 'name' => esc_html__( 'Hide Title', 'coaching' ) ) );
	$config_courses_cat->addCheckbox( $prefix . 'learnpress_cate_hide_breadcrumbs', array( 'name' => esc_html__( 'Hide Breadcrumbs', 'coaching' ) ) );
	$config_courses_cat->Finish();
}
