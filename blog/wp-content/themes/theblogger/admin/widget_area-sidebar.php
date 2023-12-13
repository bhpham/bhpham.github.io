<?php

	function theblogger_sidebar_yes_no()
	{
		global $theblogger_sidebar;
		$theblogger_sidebar = 'with-sidebar';
		
		if (isset($_GET['sidebar']))
		{
			if ($_GET['sidebar'] == 'no')
			{
				$theblogger_sidebar = "";
			}
		}
		else
		{
			if (is_singular('portfolio'))
			{
				$sidebar_portfolio_post = get_theme_mod('theblogger_setting_sidebar_portfolio_post', 'No');
				
				if ($sidebar_portfolio_post != 'Yes')
				{
					$theblogger_sidebar = "";
				}
			}
			elseif (is_single())
			{
				$sidebar_post        = get_theme_mod('theblogger_setting_sidebar_post', 'Yes');
				$select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'inherit');
				
				if ((($sidebar_post == 'No') && ($select_page_sidebar == 'inherit')) || ($select_page_sidebar == 'No Sidebar'))
				{
					$theblogger_sidebar = "";
				}
			}
			else
			{
				if (is_category() || is_tag() || is_author() || is_date() || is_search())
				{
					$sidebar_archive = get_theme_mod('theblogger_setting_sidebar_archive', 'No');
					
					if ($sidebar_archive != 'Yes')
					{
						$theblogger_sidebar = "";
					}
				}
				else
				{
					$sidebar_blog = get_theme_mod('theblogger_setting_sidebar_blog', 'Yes');
					
					if ($sidebar_blog == 'No')
					{
						$theblogger_sidebar = "";
					}
				}
			}
		}
	}


/* ============================================================================================================================================= */


	function theblogger_sidebar()
	{
		if (! is_404())
		{
			?>
				<div id="secondary" class="widget-area sidebar" role="complementary">
				    <div class="sidebar-wrap">
						<div class="sidebar-content">
							<?php
								if (is_page())
								{
									$select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'No Sidebar');
									dynamic_sidebar($select_page_sidebar); // Page sidebar. (for default and custom page templates)
								}
								elseif (is_post_type_archive('product') || is_tax('product_cat') || is_singular('product'))
								{
									$shop_page_id        = get_option('woocommerce_shop_page_id');
									$select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . $shop_page_id, 'No Sidebar');
									dynamic_sidebar($select_page_sidebar); // Shop sidebar. (WooCommerce)
								}
								elseif (is_tax('portfolio-category') || is_singular('portfolio'))
								{
									dynamic_sidebar('theblogger_sidebar_15'); // Portfolio sidebar.
								}
								elseif (is_singular('post'))
								{
									$select_page_sidebar = get_option('theblogger_select_page_sidebar' . '__' . get_the_ID(), 'inherit');
									
									if ($select_page_sidebar == 'inherit')
									{
										if (is_active_sidebar('theblogger_sidebar_2'))
										{
											dynamic_sidebar('theblogger_sidebar_2'); // Post sidebar.
										}
										else
										{
											dynamic_sidebar('theblogger_sidebar_1'); // Blog sidebar.
										}
									}
									else
									{
										if ($select_page_sidebar != 'No Sidebar')
										{
											dynamic_sidebar($select_page_sidebar); // Post sidebar.
										}
									}
								}
								else
								{
									dynamic_sidebar('theblogger_sidebar_1'); // Blog sidebar.
								}
							?>
						</div> <!-- .sidebar-content -->
					</div> <!-- .sidebar-wrap -->
				</div> <!-- #secondary .widget-area .sidebar -->
			<?php
		}
	}

?>