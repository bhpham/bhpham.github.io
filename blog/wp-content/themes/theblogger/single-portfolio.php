<?php
	get_header();
?>

<?php
	function theblogger_portfolio_item__short_description()
	{
		if (has_excerpt())
		{
			?>
				<p>
					<?php
						echo get_the_excerpt();
					?>
				</p>
			<?php
		}
	}
?>

<?php
	function theblogger_portfolio_item__feat_img($linked_url = "")
	{
		if (! empty($linked_url))
		{
			$image_big = $linked_url;
			
			?>
				<figure class="wp-caption aligncenter">
					<a href="<?php echo esc_url($image_big); ?>">
						<?php
							the_post_thumbnail('theblogger_image_size_7');
						?>
					</a>
					<?php
						if (has_excerpt())
						{
							?>
								<figcaption class="wp-caption-text">
									<?php
										echo get_the_excerpt();
									?>
								</figcaption>
							<?php
						}
					?>
				</figure>
			<?php
		}
		else
		{
			if (has_post_thumbnail())
			{
				?>
					<p>
						<?php
							the_post_thumbnail('theblogger_image_size_7');
						?>
					</p>
				<?php
			}
		}
	}
?>

<?php
	function theblogger_portfolio_item__format_image()
	{
		if (has_post_thumbnail())
		{
			$image_big 				 = "";
			$feat_img_id 			 = get_post_thumbnail_id();
			$image_big_width_cropped = wp_get_attachment_image_src($feat_img_id, 'theblogger_image_size_7'); // magnific-popup-width
			
			if ($image_big_width_cropped[1] > $image_big_width_cropped[2])
			{
				$image_big = $image_big_width_cropped[0];
			}
			else
			{
				$image_big_height_cropped = wp_get_attachment_image_src($feat_img_id, 'theblogger_image_size_8'); // magnific-popup-height
				$image_big 				  = $image_big_height_cropped[0];
			}
			
			theblogger_portfolio_item__feat_img($linked_url = $image_big);
		}
	}
?>

<?php
	function theblogger_portfolio_item__format_link()
	{
		$direct_url = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url'));
		
		if (! empty($direct_url))
		{
			$new_tab = get_option(get_the_ID() . 'theblogger_featured_video_url__new_tab', true);
			
			?>
				<p>
					<a class="button" <?php if ($new_tab != false) { echo 'target="_blank"'; } ?> href="<?php echo esc_url($direct_url); ?>">
						<?php
							esc_html_e('Go To Link', 'theblogger');
						?>
					</a>
				</p>
			<?php
		}
	}
?>

<?php
	function theblogger_portfolio_item__format_audio_video()
	{
		$browser_address_url = stripcslashes(get_option(get_the_ID() . 'theblogger_featured_video_url'));
		
		if (! empty($browser_address_url))
		{
			echo theblogger_iframe_from_xml($browser_address_url);
		}
	}
?>

<?php
	function theblogger_portfolio_item__format_chooser()
	{
		if (has_post_format('audio') || has_post_format('video'))
		{
			theblogger_portfolio_item__format_audio_video();
			theblogger_portfolio_item__short_description();
		}
		elseif (has_post_format('link'))
		{
			theblogger_portfolio_item__format_link();
			theblogger_portfolio_item__short_description();
			theblogger_portfolio_item__feat_img();
		}
		elseif (has_post_format('image'))
		{
			theblogger_portfolio_item__format_image();
		}
		elseif (has_post_format('gallery'))
		{
			theblogger_portfolio_item__short_description();
		}
	}
?>

<?php
	global $theblogger_sidebar;
	theblogger_sidebar_yes_no();
?>

<div id="main" class="site-main">
	<div class="<?php if ($theblogger_sidebar != "") { echo 'layout-medium'; } else { echo 'layout-fixed'; } ?>">
		<div id="primary" class="content-area <?php echo esc_attr( $theblogger_sidebar ); ?>">
			<div id="content" class="site-content" role="main">
				<?php
					while (have_posts()) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="hentry-wrap">
									<div class="post-header portfolio-header post-header-classic">
										<header class="entry-header">
											<?php
												the_title('<h1 class="entry-title">', '</h1>');
											?>
											<div class="entry-meta">
												<?php
													theblogger_meta_like();
													theblogger_meta_share();
												?>
											</div> <!-- .entry-meta -->
										</header> <!-- .entry-header -->
									</div> <!-- .post-header-classic -->
									<div class="entry-content">
										<?php
											theblogger_portfolio_item__format_chooser();
											theblogger_content();
										?>
									</div> <!-- .entry-content -->
								</div> <!-- .hentry-wrap -->
								<?php
									theblogger_single_navigation();
								?>
							</article> <!-- .hentry -->
							<?php
								comments_template("", true);
							?>
						<?php
					endwhile;
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		<?php
			if ($theblogger_sidebar != "")
			{
				theblogger_sidebar();
			}
		?>
	</div> <!-- .layout-medium OR .layout-fixed -->
</div> <!-- #main .site-main -->

<?php
	get_footer();
?>