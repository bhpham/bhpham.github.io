<?php

	function theblogger_meta_box__featured_video($post)
	{
		?>
			<?php
				wp_nonce_field(
					'theblogger_meta_box__featured_video',
					'theblogger_meta_box_nonce__featured_video'
				);
			?>
			<p>
				<label for="theblogger_featured_video_url"><?php esc_html_e('URL', 'theblogger'); ?></label>
				<?php
					$theblogger_featured_video_url          = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url', ""));
					$theblogger_featured_video_url__new_tab = get_option(get_the_ID() . 'theblogger_featured_video_url__new_tab', true);
				?>
				<input type="text" id="theblogger_featured_video_url" name="theblogger_featured_video_url" class="widefat" value="<?php echo esc_url($theblogger_featured_video_url); ?>">
				<span id="theblogger_featured_video__new_tab">
					<label style="font-size: 12px; color: #777777;">
						<input type="checkbox" name="theblogger_featured_video_url__new_tab" <?php if ($theblogger_featured_video_url__new_tab != false) { echo 'checked="checked"'; } ?>> <?php esc_html_e('Open In New Tab', 'theblogger'); ?> <span style="color: #999999;"><?php esc_html_e('(for Link format)', 'theblogger'); ?></span>
					</label>
				</span>
			</p>
			
			<p class="howto theblogger_featured_video__howto_post">
				<?php
					esc_html_e('Audio: Just paste the browser address url of an audio from SoundCloud. This audio will be shown in place of featured image.', 'theblogger');
				?>
				<br>
				<br>
				<?php
					esc_html_e('Video: Just paste the browser address url of a video from YouTube or Vimeo. This video will be shown in place of featured image.', 'theblogger');
				?>
			</p>
			<p class="howto theblogger_featured_video__howto_portfolio">
				<?php
					esc_html_e('Use this URL field for format; Link, Audio and Video.', 'theblogger');
				?>
				<br>
				<br>
				<?php
					esc_html_e('- Link: Enter your custom url.', 'theblogger');
				?>
				<br>
				<br>
				<?php
					esc_html_e('- Audio: Use browser address url of an audio from SoundCloud. This audio will be shown in a lightbox in your portfolio page.', 'theblogger');
				?>
				<br>
				<br>
				<?php
					esc_html_e('- Video: Use browser address url of a video from YouTube or Vimeo. This video will be shown in a lightbox in your portfolio page.', 'theblogger');
				?>
			</p>
		<?php
	}
	
	
	function theblogger_meta_box_save__featured_video($post_id)
	{
		if (! isset($_POST['theblogger_meta_box_nonce__featured_video']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['theblogger_meta_box_nonce__featured_video'];
		
		if (! wp_verify_nonce($nonce, 'theblogger_meta_box__featured_video'))
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
		
		update_option($post_id . 'theblogger_featured_video_url', $_POST['theblogger_featured_video_url']);
		update_option($post_id . 'theblogger_featured_video_url__new_tab', $_POST['theblogger_featured_video_url__new_tab']);
	}
	
	add_action('save_post', 'theblogger_meta_box_save__featured_video');
	
	
	function theblogger_add_meta_boxes__featured_video()
	{
		add_meta_box(
			'theblogger_add_meta_box__featured_video__post',
			esc_html__('Featured Audio/Video', 'theblogger'),
			'theblogger_meta_box__featured_video',
			array('post'),
			'side',
			'low'
		);
		
		add_meta_box(
			'theblogger_add_meta_box__featured_video__portfolio',
			esc_html__('Featured Audio/Video/Link', 'theblogger'),
			'theblogger_meta_box__featured_video',
			array('portfolio'),
			'side',
			'low'
		);
	}
	
	add_action('add_meta_boxes', 'theblogger_add_meta_boxes__featured_video');

?>