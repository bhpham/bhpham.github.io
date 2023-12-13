<?php

	class theblogger_Widget_Link_Box extends WP_Widget
	{
		public function __construct()
		{
			parent::__construct(
				'theblogger_widget_link_box',
				esc_html__('(TheBlogger) Link Box', 'theblogger'),
				array('description' => esc_html__('Link box widget.', 'theblogger'))
			);
		}
		
		public function form($instance)
		{
			if (isset($instance['title'])) { $title = $instance[ 'title' ]; } else { $title = ""; }
			if (isset($instance['theblogger_widget_option_1'])) { $theblogger_widget_option_1 = $instance[ 'theblogger_widget_option_1' ]; } else { $theblogger_widget_option_1 = ""; }
			if (isset($instance['theblogger_widget_option_2'])) { $theblogger_widget_option_2 = $instance[ 'theblogger_widget_option_2' ]; } else { $theblogger_widget_option_2 = 'no'; }
			if (isset($instance['theblogger_widget_option_3'])) { $theblogger_widget_option_3 = $instance[ 'theblogger_widget_option_3' ]; } else { $theblogger_widget_option_3 = ""; }
			if (isset($instance['theblogger_widget_option_4'])) { $theblogger_widget_option_4 = $instance[ 'theblogger_widget_option_4' ]; } else { $theblogger_widget_option_4 = ""; }
			if (isset($instance['theblogger_widget_option_5'])) { $theblogger_widget_option_5 = $instance[ 'theblogger_widget_option_5' ]; } else { $theblogger_widget_option_5 = ""; }
			
			?>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title', 'theblogger'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" value="<?php echo esc_attr($title); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_1')); ?>"><?php echo esc_html__('Link URL', 'theblogger'); ?></label>
					
					<input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_1')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_1')); ?>" value="<?php echo esc_attr($theblogger_widget_option_1); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_2')); ?>"><?php echo esc_html__('Open link in new tab', 'theblogger'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_2')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_2')); ?>">
						<option <?php if ($theblogger_widget_option_2 == 'no') { echo 'selected="selected"'; } ?> value="no"><?php esc_html_e('No', 'theblogger'); ?></option>
						<option <?php if ($theblogger_widget_option_2 == 'yes') { echo 'selected="selected"'; } ?> value="yes"><?php esc_html_e('Yes', 'theblogger'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_3')); ?>"><?php esc_html_e('Image', 'theblogger'); ?></label>
					<br>
					<input type="hidden" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_3')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_3')); ?>" value="<?php echo esc_attr($theblogger_widget_option_3); ?>">
					<input type="button" class="button button-browse" value="<?php esc_attr_e('Browse', 'theblogger'); ?>">
					<?php
						$image_url = wp_get_attachment_image_url($theblogger_widget_option_3, 'theblogger_image_size_3');
					?>
					<img class="theblogger-widget-preview-image" src="<?php echo esc_url($image_url); ?>">
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_4')); ?>"><?php echo esc_html__('Width', 'theblogger'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_4')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_4')); ?>">
						<option <?php if ($theblogger_widget_option_4 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('25%', 'theblogger'); ?></option>
						<option <?php if ($theblogger_widget_option_4 == 'w-33') { echo 'selected="selected"'; } ?> value="w-33"><?php esc_html_e('33%', 'theblogger'); ?></option>
						<option <?php if ($theblogger_widget_option_4 == 'w-50') { echo 'selected="selected"'; } ?> value="w-50"><?php esc_html_e('50%', 'theblogger'); ?></option>
						<option <?php if ($theblogger_widget_option_4 == 'w-100') { echo 'selected="selected"'; } ?> value="w-100"><?php esc_html_e('100%', 'theblogger'); ?></option>
					</select>
				</p>
				<p>
					<label for="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_5')); ?>"><?php echo esc_html__('Ratio', 'theblogger'); ?></label>
					
					<select class="widefat" id="<?php echo esc_attr($this->get_field_id('theblogger_widget_option_5')); ?>" name="<?php echo esc_attr($this->get_field_name('theblogger_widget_option_5')); ?>">
						<option <?php if ($theblogger_widget_option_5 == "") { echo 'selected="selected"'; } ?> value=""><?php esc_html_e('Square', 'theblogger'); ?></option>
						<option <?php if ($theblogger_widget_option_5 == 'ratio-2-1') { echo 'selected="selected"'; } ?> value="ratio-2-1"><?php esc_html_e('Tall', 'theblogger'); ?></option>
						<option <?php if ($theblogger_widget_option_5 == 'ratio-16-9') { echo 'selected="selected"'; } ?> value="ratio-16-9"><?php esc_html_e('Wide', 'theblogger'); ?></option>
						<option <?php if ($theblogger_widget_option_5 == 'ratio-21-9') { echo 'selected="selected"'; } ?> value="ratio-21-9"><?php esc_html_e('Extra Wide', 'theblogger'); ?></option>
					</select>
				</p>
			<?php
		}
		
		public function update($new_instance, $old_instance)
		{
			$instance = array();
			$instance['title']                      = strip_tags($new_instance['title']);
			$instance['theblogger_widget_option_1'] = strip_tags($new_instance['theblogger_widget_option_1']);
			$instance['theblogger_widget_option_2'] = strip_tags($new_instance['theblogger_widget_option_2']);
			$instance['theblogger_widget_option_3'] = strip_tags($new_instance['theblogger_widget_option_3']);
			$instance['theblogger_widget_option_4'] = strip_tags($new_instance['theblogger_widget_option_4']);
			$instance['theblogger_widget_option_5'] = strip_tags($new_instance['theblogger_widget_option_5']);
			return $instance;
		}
		
		public function widget($args, $instance)
		{
			extract($args);
			$title                      = apply_filters('widget_title', $instance['title']);
			$theblogger_widget_option_1 = apply_filters('theblogger_widget_option_1', $instance['theblogger_widget_option_1']);
			$theblogger_widget_option_2 = apply_filters('theblogger_widget_option_2', $instance['theblogger_widget_option_2']);
			$theblogger_widget_option_3 = apply_filters('theblogger_widget_option_3', $instance['theblogger_widget_option_3']);
			$theblogger_widget_option_4 = apply_filters('theblogger_widget_option_4', $instance['theblogger_widget_option_4']);
			$theblogger_widget_option_5 = apply_filters('theblogger_widget_option_5', $instance['theblogger_widget_option_5']);
			
			echo $before_widget;
			
				$width = $theblogger_widget_option_4;
				
				if (isset($_GET['link_box_width']))
				{
					$width = 'w-' . $_GET['link_box_width'];
				}
				
				$ratio = $theblogger_widget_option_5;
				
				if (isset($_GET['link_box_ratio']))
				{
					$ratio = 'ratio-' . $_GET['link_box_ratio'];
				}
				
				?>
                    <div class="block link-box <?php echo esc_attr($width); ?> <?php echo esc_attr($ratio); ?>">
						<?php
							$image = wp_get_attachment_image_src($theblogger_widget_option_3, 'theblogger_image_size_3');
						?>
                        <div class="post-thumbnail" style="background-image: url(<?php echo esc_url($image[0]); ?>);">
                            <div class="post-wrap">
                                <header class="entry-header">
                                    <h2 class="entry-title">
										<a <?php if ($theblogger_widget_option_2 == 'yes') { echo 'target="_blank"'; } ?> href="<?php echo esc_url($theblogger_widget_option_1); ?>">
											<?php
												echo esc_html($title);
											?>
										</a>
									</h2>
                                </header>
                                <a class="block-link" <?php if ($theblogger_widget_option_2 == 'yes') { echo 'target="_blank"'; } ?> href="<?php echo esc_url($theblogger_widget_option_1); ?>">
									<?php
										echo esc_html($title);
									?>
								</a>
                            </div>
                        </div>
                    </div>
				<?php
			
			echo $after_widget;
		}
	}
	
	add_action('widgets_init', function() { register_widget('theblogger_Widget_Link_Box'); });

?>