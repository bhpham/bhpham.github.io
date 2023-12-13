<?php
	get_header();
?>

<?php
	global $theblogger_sidebar;
	theblogger_sidebar_yes_no();
?>

<?php
	theblogger_featured_area();
?>

<div id="main" class="site-main">
	<div class="layout-medium">
		<div id="primary" class="content-area <?php echo esc_attr($theblogger_sidebar); ?>">
			<div id="content" class="site-content" role="main">
				<?php
					theblogger_archive_title();
				?>
				
				<?php
					$theblogger_1st_full = theblogger_1st_full_yes_no();
				?>
				
				<div class="blog-grid-wrap">
					<div class="blog-stream blog-grid blog-small masonry <?php if ($theblogger_1st_full == 'Yes') { echo 'first-full'; } ?>" data-layout="<?php echo theblogger_blog_grid_type(); ?>" data-item-width="<?php theblogger_blog_grid_post_width(); ?>">
						<?php
							if (have_posts()) :
							
								$category_link_style = theblogger_category_link_style();
								
								while (have_posts()) : the_post();
									?>
										<article id="post-<?php the_ID(); ?>" <?php post_class(esc_attr($category_link_style)); ?>>
											<div class="hentry-wrap">
												<?php
													if ($theblogger_1st_full == 'Yes')
													{
														theblogger_featured_media__layout_grid($first_full = 'Yes', theblogger_blog_grid_type());
														$theblogger_1st_full = 'No';
													}
													else
													{
														theblogger_featured_media__layout_grid($first_full = 'No', theblogger_blog_grid_type());
													}
												?>
												<div class="hentry-middle">
													<header class="entry-header">
														<?php
															theblogger_meta('above_title');
														?>
														<h2 class="entry-title">
															<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
														</h2>
														<?php
															theblogger_meta('below_title');
														?>
													</header> <!-- .entry-header -->
													<div class="entry-content">
														<?php
															theblogger_content();
														?>
													</div> <!-- .entry-content -->
													<?php
														theblogger_meta('below_content');
													?>
												</div> <!-- .hentry-middle -->
											</div> <!-- .hentry-wrap -->
										</article>
									<?php
								endwhile;
							else :
							
								theblogger_content_none();
							
							endif;
						?>
					</div> <!-- .blog-stream .blog-grid .blog-small .masonry -->
				</div> <!-- .blog-grid-wrap -->
				<?php
					theblogger_blog_navigation();
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		<?php
			if ($theblogger_sidebar != "")
			{
				theblogger_sidebar();
			}
		?>
	</div> <!-- .layout-medium -->
</div> <!-- #main .site-main -->

<?php
	get_footer();
?>