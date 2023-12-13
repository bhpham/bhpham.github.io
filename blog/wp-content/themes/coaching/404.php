<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package thim
 */
?>
<section class="error-404 not-found">
	<div class="page-404-content">
		<div class="row">
			<div class="col-sm-6">
				<img src="<?php echo esc_url( get_template_directory_uri() . '/images/404.png' ); ?>" alt="404-page" />
			</div>
			<div class="col-sm-6 text-left">
				<h2><?php esc_html_e( '404 Page Not Found!', 'coaching' ); ?>
					<span class="line-title"></span>
				</h2>
				<p class="messages-404">
					<?php esc_html_e( 'The page you are looking for cannot be found.', 'coaching' ); ?>
					<br><?php esc_html_e( 'You better comeback', 'coaching' ); ?>
					<a href="<?php echo esc_url( home_url('/') ); ?>" class="thim-color"><?php esc_html_e( 'Homepage.', 'coaching' ); ?></a>
				</p>
			</div>
		</div>
	</div>
	<!-- .page-content -->
</section>