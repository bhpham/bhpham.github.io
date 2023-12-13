<?php

	function theblogger_meta_box__sidebar($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field(
						'theblogger_meta_box__sidebar',
						'theblogger_meta_box_nonce__sidebar'
					);
				?>
				<p>
					<label for="theblogger_select_page_sidebar"><?php esc_html_e('Select Sidebar', 'theblogger'); ?></label>
					<?php
						$select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar');
					?>
					<select id="theblogger_select_page_sidebar" name="theblogger_select_page_sidebar">
						<?php
							$current_screen = get_current_screen();
							
							if ($current_screen ->id === 'post')
							{
								$select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'inherit');
								
								?>
									<option <?php if ($select_page_sidebar == 'inherit') { echo 'selected="selected"'; } ?> value="inherit"><?php esc_html_e('Inherit from Customizer', 'theblogger'); ?></option>
								<?php
							}
						?>
						<option <?php if ($select_page_sidebar == 'No Sidebar') { echo 'selected="selected"'; } ?> value="No Sidebar"><?php esc_html_e('No Sidebar', 'theblogger'); ?></option>
						<option <?php if ($select_page_sidebar == 'theblogger_sidebar_1') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_1"><?php esc_html_e('Blog Sidebar', 'theblogger'); ?></option>
						<option <?php if ($select_page_sidebar == 'theblogger_sidebar_2') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_2"><?php esc_html_e('Post Sidebar', 'theblogger'); ?></option>
						<option <?php if ($select_page_sidebar == 'theblogger_sidebar_3') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_3"><?php esc_html_e('Page Sidebar', 'theblogger'); ?></option>
						<option <?php if ($select_page_sidebar == 'theblogger_sidebar_15') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_15"><?php esc_html_e('Portfolio Sidebar', 'theblogger'); ?></option>
						<option <?php if ($select_page_sidebar == 'theblogger_sidebar_16') { echo 'selected="selected"'; } ?> value="theblogger_sidebar_16"><?php esc_html_e('Shop Sidebar', 'theblogger'); ?></option>
						<?php
							$theblogger_sidebars_with_commas = get_option('theblogger_sidebars_with_commas');
							
							if ($theblogger_sidebars_with_commas != "")
							{
								$sidebars = preg_split("/[\s]*[,][\s]*/", $theblogger_sidebars_with_commas);
								
								foreach ($sidebars as $sidebar)
								{
									$sidebar_lowercase = strtolower($sidebar);
									$sidebar_id        = str_replace(" ", '_', $sidebar_lowercase); // Parameters: Old value, New value, String.
									
									$selected = "";
									
									if ($select_page_sidebar == $sidebar_id)
									{
										$selected = 'selected="selected"';
									}
									
									echo '<option ' . $selected . ' value="' . esc_attr($sidebar_id) . '">' . esc_html($sidebar) . '</option>';
								}
							}
						?>
					</select>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Inherit from Customizer: Appearance > Customize > Sidebar > Post Sidebar.', 'theblogger');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Sidebar is a widget area. You can find all available sidebars in your Widgets page under Appearance menu or Widgets section in Customizer.', 'theblogger');
					?>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Also you can create new sidebars from Appearance > Theme Options > Widget Areas.', 'theblogger');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function theblogger_save_meta_box__sidebar($post_id)
	{
		if (! isset($_POST['theblogger_meta_box_nonce__sidebar']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['theblogger_meta_box_nonce__sidebar'];
		
		if (! wp_verify_nonce($nonce, 'theblogger_meta_box__sidebar'))
        {
			return $post_id;
		}
		
		if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
        {
			return $post_id;
		}
		
		if ('page' == $_POST['post_type'])
		{
			if (! current_user_can('edit_page', $post_id))
			{
				return $post_id;
			}
		}
		else
		{
			if (! current_user_can('edit_post', $post_id))
			{
				return $post_id;
			}
		}
		
		update_option('theblogger_select_page_sidebar' . '__' . $post_id, $_POST['theblogger_select_page_sidebar']);
	}
	
	add_action('save_post', 'theblogger_save_meta_box__sidebar');
	
	
	function theblogger_add_meta_boxes__sidebar()
	{
		add_meta_box(
			'theblogger_add_meta_box__sidebar',
			esc_html__('Sidebar', 'theblogger'),
			'theblogger_meta_box__sidebar',
			array('page', 'post'),
			'side',
			'low'
		);
	}
	
	add_action('add_meta_boxes', 'theblogger_add_meta_boxes__sidebar');

?>