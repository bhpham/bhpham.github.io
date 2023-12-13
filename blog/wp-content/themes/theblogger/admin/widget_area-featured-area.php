<?php

	function theblogger_featured_area()
	{
		if ((! isset($_GET['featured_area'])) && is_home() && is_active_sidebar('theblogger_sidebar_13'))
		{
			?>
				<section class="top-content">
					<div class="layout-medium">
						<div class="featured-area">
							<?php
								dynamic_sidebar('theblogger_sidebar_13');
							?>
						</div> <!-- .featured-area -->
					</div> <!-- .layout-medium -->
				</section> <!-- .top-content -->
			<?php
		}
	}

?>