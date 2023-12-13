<?php

	function theblogger_share_links_meta()
	{
		?>
			<span class="entry-share">
				<span class="entry-share-text">
					<?php
						esc_html_e('Share', 'theblogger');
					?>
				</span> <!-- .entry-share-text -->
				
				<span class="entry-share-wrap">
					<span class="entry-share-inner-wrap">
						<a class="share-facebook" rel="nofollow" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo urlencode(the_title_attribute('echo=0')); ?>" title="<?php esc_attr_e('Share this post on Facebook', 'theblogger'); ?>"><?php esc_html_e('Facebook', 'theblogger'); ?></a>
						
						<a class="share-twitter" rel="nofollow" target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title_attribute(); ?>&url=<?php the_permalink(); ?>" title="<?php esc_attr_e('Share this post with your followers', 'theblogger'); ?>"><?php esc_html_e('Twitter', 'theblogger'); ?></a>
						
						<a class="share-pinterest" rel="nofollow" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?><?php if (has_post_thumbnail()) { echo '&media='; the_post_thumbnail_url('theblogger_image_size_1'); } ?>&description=<?php echo urlencode(the_title_attribute('echo=0')); ?>"><?php esc_html_e('Pinterest', 'theblogger'); ?></a>
						
						<a class="share-mail" rel="nofollow" target="_blank" href="mailto:?subject=<?php esc_attr_e('I wanted you to see this post', 'theblogger'); ?>&body=<?php esc_attr_e('Check out this post:', 'theblogger'); ?> <?php the_title_attribute(); ?> <?php the_permalink(); ?>" title="<?php esc_attr_e('Email this post to a friend', 'theblogger'); ?>"><?php esc_attr_e('Email', 'theblogger'); ?></a>
					</span> <!-- .entry-share-inner-wrap -->
				</span> <!-- .entry-share-wrap -->
			</span> <!-- .entry-share -->
		<?php
	}
	
	
	function theblogger_share_links()
	{
		$share_links = get_theme_mod('theblogger_setting_share_links', 'Yes');
		
		if ($share_links != 'No')
		{
			?>
				<div class="share-links">
					<h3>
						<?php
							esc_html_e('Share This', 'theblogger');
						?>
					</h3>
					
					<a class="share-facebook" rel="nofollow" target="_blank" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&amp;t=<?php echo urlencode(the_title_attribute('echo=0')); ?>" title="<?php esc_attr_e('Share this post on Facebook', 'theblogger'); ?>">
						<i class="pw-icon-facebook"></i>
					</a>
					
					<a class="share-twitter" rel="nofollow" target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title_attribute(); ?>&url=<?php the_permalink(); ?>" title="<?php esc_attr_e('Share this post with your followers', 'theblogger'); ?>">
						<i class="pw-icon-twitter"></i>
					</a>
					
					<a class="share-pinterest" rel="nofollow" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?><?php if (has_post_thumbnail()) { echo '&media='; the_post_thumbnail_url('theblogger_image_size_1'); } ?>&description=<?php echo urlencode(the_title_attribute('echo=0')); ?>" title="<?php esc_attr_e('Pin It', 'theblogger'); ?>">
						<i class="pw-icon-pinterest-circled"></i>
					</a>
					
					<a class="share-mail" rel="nofollow" target="_blank" href="mailto:?subject=<?php esc_attr_e('I wanted you to see this post', 'theblogger'); ?>&body=<?php esc_attr_e('Check out this post:', 'theblogger'); ?> <?php the_title_attribute(); ?> <?php the_permalink(); ?>" title="<?php esc_attr_e('Email this post to a friend', 'theblogger'); ?>">
						<i class="pw-icon-mail"></i>
					</a>
				</div> <!-- .share-links -->
			<?php
		}
	}

?>