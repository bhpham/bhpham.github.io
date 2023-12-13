<?php $theme_options_data = get_theme_mods(); ?>
<footer id="colophon" class="site-footer <?php thim_footer_class();?>">
	<?php if ( is_active_sidebar( 'footer' ) ) : ?>
		<div class="footer">
			<div class="container">
				<div class="row">
					<?php dynamic_sidebar( 'footer' ); ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<!--==============================powered=====================================-->
	<?php if ( ( isset( $theme_options_data['thim_copyright_text'] ) && !empty( $theme_options_data['thim_copyright_text'] ) ) || is_active_sidebar( 'copyright' ) || !isset( $theme_options_data['thim_copyright_text'] ) ) { ?>
		<div class="copyright-area">
			<div class="container">
				<div class="copyright-content">
					<div class="row">
						<?php if ( is_active_sidebar( 'copyright' ) ) echo '<div class="col-sm-8">'; else echo '<div class="col-sm-12">';?>
							<p class="text-copyright">
								<?php
								if ( isset( $theme_options_data['thim_copyright_text'] ) ) {
									echo ent2ncr( $theme_options_data['thim_copyright_text'] );
								} else {
									echo sprintf( wp_kses( __( 'Copyright 2016 Coaching WordPress Theme by  <a href="%s">ThimPress</a>.', 'coaching' ),
										array( 'a' => array( 'href' => array() ) ) ), esc_url( 'https://thimpress.com') );
								}
								?>
							</p>
						</div>
						<?php
						if ( is_active_sidebar( 'copyright' ) ) : ?>
							<div class="col-sm-4 text-right">
								<?php dynamic_sidebar( 'copyright' ); ?>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>


</footer><!-- #colophon -->
</div><!--end main-content-->

<?php do_action( 'thim_end_content_pusher' ); ?>

</div><!-- end wrapper-container and content-pusher-->

<?php
if ( isset( $theme_options_data['thim_show_to_top'] ) && $theme_options_data['thim_show_to_top'] == 1 ) { ?>
	<a href="#" id="back-to-top">
		<i class="fa fa-chevron-up"></i>
	</a>
	<?php
}
?>


</div>

<?php wp_footer(); ?>
</body >
</html >