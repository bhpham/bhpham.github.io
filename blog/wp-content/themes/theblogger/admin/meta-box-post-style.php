<?php

	function theblogger_meta_box__post_style($post)
	{
		?>
			<div class="admin-inside-box">
				<?php
					wp_nonce_field(
						'theblogger_meta_box__post_style',
						'theblogger_meta_box_nonce__post_style'
					);
				?>
				<p>
					<label for="theblogger_post_style"><?php esc_html_e('Select Post Style', 'theblogger'); ?></label>
					<?php
						$post_style = get_option('theblogger_post_style' . '__' . get_the_ID(), 'inherit');
					?>
					<select id="theblogger_post_style" name="theblogger_post_style">
						<option <?php if ($post_style == 'inherit') { echo 'selected="selected"'; } ?> value="inherit"><?php esc_html_e('Inherit from Customizer', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'post-header-classic') { echo 'selected="selected"'; } ?> value="post-header-classic"><?php esc_html_e('Classic', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-medium') { echo 'selected="selected"'; } ?> value="is-top-content-single-medium"><?php esc_html_e('Classic Medium', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-medium with-parallax') { echo 'selected="selected"'; } ?> value="is-top-content-single-medium with-parallax"><?php esc_html_e('Classic Medium Parallax', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full') { echo 'selected="selected"'; } ?> value="is-top-content-single-full"><?php esc_html_e('Classic Full', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full with-parallax') { echo 'selected="selected"'; } ?> value="is-top-content-single-full with-parallax"><?php esc_html_e('Classic Full Parallax', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full-margins') { echo 'selected="selected"'; } ?> value="is-top-content-single-full-margins"><?php esc_html_e('Classic Full with Margins', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full-margins with-parallax') { echo 'selected="selected"'; } ?> value="is-top-content-single-full-margins with-parallax"><?php esc_html_e('Classic Full with Margins Parallax', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'post-header-overlay post-header-overlay-inline is-post-dark') { echo 'selected="selected"'; } ?> value="post-header-overlay post-header-overlay-inline is-post-dark"><?php esc_html_e('Overlay', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-medium with-overlay') { echo 'selected="selected"'; } ?> value="is-top-content-single-medium with-overlay"><?php esc_html_e('Overlay Medium', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full with-overlay') { echo 'selected="selected"'; } ?> value="is-top-content-single-full with-overlay"><?php esc_html_e('Overlay Full', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-full-margins with-overlay') { echo 'selected="selected"'; } ?> value="is-top-content-single-full-margins with-overlay"><?php esc_html_e('Overlay Full with Margins', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'is-top-content-single-medium with-title-full') { echo 'selected="selected"'; } ?> value="is-top-content-single-medium with-title-full"><?php esc_html_e('Title Full', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'post-header-classic is-featured-image-left') { echo 'selected="selected"'; } ?> value="post-header-classic is-featured-image-left"><?php esc_html_e('Image Left', 'theblogger'); ?></option>
						<option <?php if ($post_style == 'post-header-classic is-featured-image-right') { echo 'selected="selected"'; } ?> value="post-header-classic is-featured-image-right"><?php esc_html_e('Image Right', 'theblogger'); ?></option>
					</select>
				</p>
				<p class="howto">
					<?php
						esc_html_e('Inherit from Customizer: Appearance > Customize > Single Post > Post Style.', 'theblogger');
					?>
					<br>
					<br>
					<?php
						esc_html_e('- Classic style applies if there is no featured media.', 'theblogger');
					?>
					<br>
					<?php
						esc_html_e('- Image Left and Image Right layouts display as classic style when featured video is present.', 'theblogger');
					?>
				</p>
			</div>
		<?php
	}
	
	
	function theblogger_save_meta_box__post_style($post_id)
	{
		if (! isset($_POST['theblogger_meta_box_nonce__post_style']))
		{
			return $post_id;
		}
		
		$nonce = $_POST['theblogger_meta_box_nonce__post_style'];
		
		if (! wp_verify_nonce($nonce, 'theblogger_meta_box__post_style'))
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
		
		update_option('theblogger_post_style' . '__' . $post_id, $_POST['theblogger_post_style']);
	}
	
	add_action('save_post', 'theblogger_save_meta_box__post_style');
	
	
	function theblogger_add_meta_boxes__post_style()
	{
		add_meta_box(
			'theblogger_add_meta_box__post_style',
			esc_html__('Post Style', 'theblogger'),
			'theblogger_meta_box__post_style',
			array('post'),
			'side',
			'high'
		);
	}
	
	add_action('add_meta_boxes', 'theblogger_add_meta_boxes__post_style');

?>