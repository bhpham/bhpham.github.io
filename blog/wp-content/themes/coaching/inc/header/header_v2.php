<?php
$theme_options_data = get_theme_mods();
?>
<!-- <div class="main-menu"> -->
<div class="<?php echo get_theme_mod( 'thim_header_size', 'default' ) == 'full_width' ? 'header_full' : 'container'; ?>">
	<div class="row">
		<div class="col-sm-2">
			<div class="tm-table">
				<div class="width-logo table-cell sm-logo">
					<?php
					do_action( 'thim_logo' );
					do_action( 'thim_sticky_logo' );
					?>
				</div>
			</div>
		</div>
		<div class="col-sm-10">
            <?php if ( isset( $theme_options_data['thim_toolbar_show'] ) && $theme_options_data['thim_toolbar_show'] == '1' ) { ?>
			<div class="toolbar" id="toolbar">
				<div class="row">
					<div class="col-sm-12">
						<?php dynamic_sidebar( 'toolbar' ); ?>
					</div>
				</div>
			</div>
            <?php }?>
			<div class="navigation">
				<nav class="width-navigation table-cell table-right">
					<?php get_template_part( 'inc/header/main-menu' ); ?>
				</nav>
				<div class="menu-mobile-effect navbar-toggle" data-effect="mobile-effect">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</div>
			</div>
		</div>
	</div>
</div>