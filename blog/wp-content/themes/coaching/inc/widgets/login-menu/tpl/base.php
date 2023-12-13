<div class="thim-link-login">
	<?php if ( is_user_logged_in() ): ?>
		<?php
		$current_user = wp_get_current_user();
		?>
		<?php echo esc_html__('Hi', 'coaching');?> <?php echo $current_user->display_name;?>
		<a class="logout" href="<?php echo esc_url( wp_logout_url( apply_filters( 'thim_default_logout_redirect', thim_get_login_page_url() ) ) ); ?>"><?php echo esc_html( $instance['text_logout'] ); ?></a>
	<?php else : ?>
		<?php
		$registration_enabled = get_option( 'users_can_register' );
		if ( $registration_enabled ) :
			?>
			<a class="register" href="<?php echo esc_url( thim_get_register_url() ); ?>"><?php echo esc_html( $instance['text_register'] ); ?></a>
		<?php endif; ?>
		<a class="login" href="<?php echo esc_url( thim_get_login_page_url() ); ?>"><?php echo esc_html( $instance['text_login'] ); ?></a>
	<?php endif; ?>
</div>