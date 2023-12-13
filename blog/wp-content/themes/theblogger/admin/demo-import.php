<?php

	function theblogger_ocdi_import_files()
	{
		$theme_directory     = trailingslashit(get_template_directory());
		$theme_directory_url = trailingslashit(get_template_directory_uri());
		
		return array(
			array(
				'import_file_name'             => esc_html__('Default', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/default/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/default/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/default/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/default/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Adventura', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/adventura/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/adventura/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/adventura/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/adventura/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Milo', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/milo/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/milo/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/milo/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/milo/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Phil', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/phil/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/phil/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/phil/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/phil/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Mona', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/mona/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/mona/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/mona/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/mona/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Misty', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/misty/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/misty/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/misty/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/misty/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Lisa', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/lisa/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/lisa/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/lisa/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/lisa/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Eric', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/eric/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/eric/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/eric/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/eric/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Lori', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/lori/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/lori/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/lori/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/lori/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('John', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/john/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/john/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/john/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/john/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Anna', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/anna/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/anna/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/anna/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/anna/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Roger', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/roger/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/roger/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/roger/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/roger/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Emma', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/emma/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/emma/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/emma/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/emma/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Andy', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/andy/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/andy/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/andy/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/andy/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Oliver', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/oliver/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/oliver/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/oliver/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/oliver/screenshot.jpg'
			),
			array(
				'import_file_name'             => esc_html__('Jim', 'theblogger'),
				'local_import_file'            => $theme_directory     . 'admin/demo-data/jim/content.xml',
				'local_import_widget_file'     => $theme_directory     . 'admin/demo-data/jim/widgets.wie',
				'local_import_customizer_file' => $theme_directory     . 'admin/demo-data/jim/customizer.dat',
				'import_preview_image_url'     => $theme_directory_url . 'admin/demo-data/jim/screenshot.jpg'
			)
		);
	}
	
	add_filter('pt-ocdi/import_files', 'theblogger_ocdi_import_files');
	
	
	function theblogger_ocdi_time_for_one_ajax_call()
	{
		return 10;
	}
	
	add_action('pt-ocdi/time_for_one_ajax_call', 'theblogger_ocdi_time_for_one_ajax_call');


/* ============================================================================================================================================= */


	function theblogger_after_import()
	{
		// Assign menus to their locations.
		
		$main_menu = get_term_by('name', 'Menu 1', 'nav_menu');
		
		set_theme_mod('nav_menu_locations', array(
				'theblogger_theme_menu_location' => $main_menu->term_id,
			)
		);
	}
	
	add_action('pt-ocdi/after_import', 'theblogger_after_import');


/* ============================================================================================================================================= */


	add_filter('pt-ocdi/disable_pt_branding', '__return_true');
	
	add_filter('pt-ocdi/regenerate_thumbnails_in_content_import', '__return_false');

?>