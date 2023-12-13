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
				<div class="blog-stream blog-regular">
					<?php
						if (have_posts()) :
						
							$category_link_style = theblogger_category_link_style();
							
							while (have_posts()) : the_post();
							
								?>
									<article id="post-<?php the_ID(); ?>" <?php post_class(esc_attr($category_link_style)); ?>>
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
										<?php
											theblogger_featured_media__layout_regular();
										?>
										<div class="entry-content">
											<?php
												theblogger_content();
											?>
										</div> <!-- .entry-content -->
										<?php
											theblogger_meta('below_content');
										?>
									</article>
								<?php
							endwhile;
						else :
						
							theblogger_content_none();
						
						endif;
					?>
					<?php
						theblogger_blog_navigation();
					?>
				</div> <!-- .blog-stream .blog-regular -->
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