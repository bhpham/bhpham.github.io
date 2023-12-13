<?php

	function theblogger_meta_box__title_visibility($post)
	{
		?>
			<?php
				wp_nonce_field(
					'theblogger_meta_box__title_visibility',
					'theblogger_meta_box_nonce__title_visibility'
				);
			?>
			<p>
				<?php
					$theblogger_title_visibility = get_option(get_the_ID() . 'theblogger_title_visibility', false);
				?>
				<label for="theblogger_title_visibility">
					<input type="checkbox" id="theblogger_title_visibility" name="theblogger_title_visibility" <?php if ($theblogger_title_visibility == true) { echo 'checked="checked"'; } ?>>
					<?php esc_html_e('Hide Title', 'theblogger'); ?>
				</label>
			</p>
		<?php
	}
	
	
	function theblogger_meta_box_save__title_visibility($post_id)
	{
		if (! isset($_POST['theblogger_meta_box_nonce__title_visibility']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['theblogger_meta_box_nonce__title_visibility'];
		
		if (! wp_verify_nonce($nonce, 'theblogger_meta_box__title_visibility'))
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
		
		update_option($post_id . 'theblogger_title_visibility', $_POST['theblogger_title_visibility']);
	}
	
	add_action('save_post', 'theblogger_meta_box_save__title_visibility');
	
	
	function theblogger_add_meta_boxes__title_visibility()
	{
		add_meta_box(
			'theblogger_add_meta_box__title_visibility',
			esc_html__('Title Visibility', 'theblogger'),
			'theblogger_meta_box__title_visibility',
			array('page'),
			'side',
			'high'
		);
	}
	
	add_action('add_meta_boxes', 'theblogger_add_meta_boxes__title_visibility');

?>