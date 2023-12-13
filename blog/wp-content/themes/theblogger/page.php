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
	$theblogger_layout_class   = "";
	$theblogger_sidebar_class  = "";
	$theblogger_page_sidebar   = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar');
	
	if ($theblogger_page_sidebar != 'No Sidebar')
	{
		$theblogger_layout_class  = 'layout-medium';
		$theblogger_sidebar_class = 'with-sidebar';
	}
	else
	{
		$archive_layout = theblogger_archive_layout();
		
		if ($archive_layout == 'Other')
		{
			$theblogger_layout_class  = 'layout-medium';
		}
		else
		{
			$theblogger_layout_class = 'layout-fixed';
		}
	}
?>

<div id="main" class="site-main">
	<div class="<?php echo esc_attr($theblogger_layout_class); ?>">
		<div id="primary" class="content-area <?php echo esc_attr($theblogger_sidebar_class); ?>">
			<div id="content" class="site-content" role="main">
				<?php
					while (have_posts()) : the_post();
						?>
							<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
								<div class="hentry-wrap">
									<div class="post-header page-header post-header-classic">
										<?php
											$theblogger_title_visibility = get_option(get_the_ID() . 'theblogger_title_visibility', false);
										?>
										<header class="entry-header" <?php if ($theblogger_title_visibility == true) { echo 'style="display: none;"'; } ?>>
											<?php
												the_title('<h1 class="entry-title">', '</h1>');
											?>
										</header> <!-- .entry-header -->
									</div> <!-- .post-header .page-header .post-header-classic -->
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
									</div> <!-- .entry-content -->
								</div> <!-- .hentry-wrap -->
							</article>
							<?php
								comments_template("", true);
							?>
						<?php
					endwhile;
				?>
			</div> <!-- #content .site-content -->
		</div> <!-- #primary .content-area -->
		<?php
			if ($theblogger_page_sidebar != 'No Sidebar')
			{
				theblogger_sidebar();
			}
		?>
	</div> <!-- .layout -->
</div> <!-- #main .site-main -->

<?php
	get_footer();
?>