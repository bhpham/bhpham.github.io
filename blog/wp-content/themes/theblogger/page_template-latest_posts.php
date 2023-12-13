<?php
/*
Template Name: Latest Posts
*/
?>

<?php
	get_header();
?>

<?php
	$theblogger_select_page_featured_area = get_option('theblogger_select_page_featured_area' . '__' . get_the_ID(), 'No Featured Area');
	
	if ((! isset($_GET['featured_area'])) && is_active_sidebar($theblogger_select_page_featured_area))
	{
		?>
			<section class="top-content">
				<div class="layout-medium">
					<div class="featured-area">
						<?php
							dynamic_sidebar($theblogger_select_page_featured_area);
						?>
					</div> <!-- .featured-area -->
				</div> <!-- .layout-medium -->
			</section> <!-- .top-content -->
		<?php
	}
?>

<?php
	$theblogger_select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar');
?>

<div id="main" class="site-main">
	<div class="<?php if ($theblogger_select_page_sidebar != 'No Sidebar') { echo 'layout-medium'; } else { echo 'layout-fixed'; } ?>">
		<div id="primary" class="content-area <?php if ($theblogger_select_page_sidebar != 'No Sidebar') { echo 'with-sidebar'; } ?>">
			<div id="content" class="site-content" role="main">
				<?php
					while (have_posts()) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<?php
									if (has_post_thumbnail())
									{
										?>
											<div class="featured-image">
												<?php
													the_post_thumbnail('theblogger_image_size_1');
												?>
											</div> <!-- .featured-image -->
										<?php
									}
								?>
								<div class="entry-content">
									<?php
										theblogger_content();
									?>
									
									<?php
										$theblogger_query = new WP_Query(
											array(
												'post_type'           => 'post',
												'ignore_sticky_posts' => true,
												'posts_per_page'      => 5
											)
										);
										
										if ($theblogger_query->have_posts()) :
											?>
												<h3 class="widget-title section-title">
													<span><?php esc_html_e('Latest From The Blog', 'theblogger'); ?></span>
												</h3> <!-- .widget-title .section-title -->
												
												<div class="blog-simple">
													<?php
														while ($theblogger_query->have_posts()) : $theblogger_query->the_post();
															?>
																<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
																	<div class="hentry-left">
																		<div class="entry-date">
																			<span class="day"><?php echo get_the_date('d'); ?></span> <!-- .day -->
																			<span class="month"><?php echo get_the_date('M'); ?></span> <!-- .month -->
																			<span class="year"><?php echo get_the_date('Y'); ?></span> <!-- .year -->
																		</div> <!-- .entry-date -->
																		<?php
																			if (has_post_thumbnail())
																			{
																				?>
																					<div class="featured-image" style="background-image: url(<?php the_post_thumbnail_url('theblogger_image_size_5'); ?>);"></div> <!-- .featured-image -->
																				<?php
																			}
																		?>
																	</div> <!-- .hentry-left -->
																	<div class="hentry-middle">
																		<h2 class="entry-title">
																			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
																		</h2> <!-- .entry-title -->
																	</div> <!-- .hentry-middle -->
																	<a class="post-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <!-- .post-link -->
																</article>
															<?php
														endwhile;
													?>
												</div> <!-- .blog-simple -->
											<?php
										endif;
										wp_reset_postdata();
									?>
									
									<?php
										function theblogger_see_all_posts_markup($url)
										{
											?>
												<div class="section-launch">
													<a class="button" href="<?php echo esc_url($url); ?>"><?php esc_html_e('See All Posts', 'theblogger'); ?></a> <!-- .button -->
												</div> <!-- .section-launch -->
											<?php
										}
										
										function theblogger_see_all_posts()
										{
											$front_page_displays = get_option('show_on_front');
											
											if ($front_page_displays == 'posts')
											{
												$home_url = home_url('/');
												theblogger_see_all_posts_markup($home_url);
											}
											else
											{
												$blog_page_id = get_option('page_for_posts');
												
												if ($blog_page_id)
												{
													$blog_page_url = get_page_link($blog_page_id);
													theblogger_see_all_posts_markup($blog_page_url);
												}
											}
										}
										
										theblogger_see_all_posts();
									?>
								</div> <!-- .entry-content -->
							</article>
						<?php
					endwhile;
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		<?php
			if ($theblogger_select_page_sidebar != 'No Sidebar')
			{
				theblogger_sidebar();
			}
		?>
	</div> <!-- .layout -->
</div> <!-- #main .site-main -->

<?php
	get_footer();
?>