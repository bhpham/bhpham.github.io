<?php
$theme_options_data = get_theme_mods();
?>
<div id="top-menu">
    <div class="<?php echo get_theme_mod( 'thim_header_size', 'default' ) == 'full_width' ? 'header_full' : 'container'; ?>">
		<div class="row wrap-logo navigation">
			<div class="col-sm-12">
				<div class="width-logo text-center sm-logo">
					<div class="top-left">
						<?php
							if ( is_active_sidebar( 'top_menu_left' ) ) {
								dynamic_sidebar( 'top_menu_left' );
							}
						?>
					</div>
					<?php
					do_action( 'thim_logo' );
					do_action( 'thim_sticky_logo' );
					?>
					<div class="top-right pull-right menu-right">
						<?php
							if ( is_active_sidebar( 'top_menu_right' ) ) {
								echo '<div class="menu-right"><ul>';
								dynamic_sidebar( 'top_menu_right' );
								echo '</ul></div>';
							}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="navigation col-sm-12">
			<div class="tm-table">
				<nav class="text-center">
					<?php get_template_part( 'inc/header/main-menu' ); ?>
				</nav>
				<div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</div>
			</div>
			<!--end .row-->
		</div>
	</div>
</div>