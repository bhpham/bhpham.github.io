<div class="thim-login-home5 thim-login-popup">
	<?php if ( is_user_logged_in() ): ?>
		<?php
		$current_user = wp_get_current_user();
		?>

		<?php if ( thim_plugin_active( 'learnpress/learnpress.php' ) ) : ?>
			<?php if ( thim_is_new_learnpress( '1.0' ) ) : ?>
				<a class="profile"
				   href="<?php echo esc_url( learn_press_user_profile_link() ); ?>"><?php esc_html_e( 'Profile', 'coaching' ); ?></a>
			<?php else: ?>
				<a class="profile"
				   href="<?php echo esc_url( learn_press_user_profile_link( get_current_user_id() ) ); ?>"><?php esc_html_e( 'Profile', 'coaching' ); ?></a>
			<?php endif; ?>
		<?php endif; ?>
		<a class="logout"
		   href="<?php echo esc_url( wp_logout_url( get_home_url() ) ); ?>"><?php echo esc_html( $instance['text_logout'] ); ?></a>
	<?php else : ?>
		<?php
		$registration_enabled = get_option( 'users_can_register' );
		?>
		<?php if ( $registration_enabled && !empty( $instance['show_register'] ) ) { ?>
			<?php if ( $instance['show_register'] == '1' ) { ?>
				<a class="register_link"
				   href="<?php echo esc_url( thim_get_register_url() ); ?>"><?php echo esc_html( $instance['text_register'] ); ?></a>
			<?php } ?>
		<?php } ?>
		<a class="login"
		   href="<?php echo esc_url( thim_get_login_page_url() ); ?>"><?php echo esc_html( $instance['text_login'] ); ?></a>
	<?php endif; ?>
</div>

<?php if ( !is_user_logged_in() ): ?>
	<div id="thim-popup-login" class="<?php echo ( !empty( $instance['shortcode'] ) ) ? 'has-shortcode' : ''; ?>">
		<div class="thim-login-container">
			<?php
			if ( !empty( $instance['shortcode'] ) ) {
				echo do_shortcode( $instance['shortcode'] );
			}
			?>
			<span class="close-popup fa fa-times"></span>
			<?php
			$login_redirect = get_theme_mod( 'thim_login_redirect', false );
			if ( empty( $login_redirect ) ) {
				$login_redirect = apply_filters( 'thim_default_login_redirect', ( isset( $_SERVER['HTTPS'] ) ? "https" : "http" ) . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] );
			}
			$redirect = !empty( $_REQUEST['redirect_to'] ) ? esc_url( $_REQUEST['redirect_to'] ) : $login_redirect;
			?>
			<div class="thim-login">
				<h2 class="title"><?php esc_html_e( 'Login with your site account', 'coaching' ); ?></h2>
				<form name="loginpopupform" action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>"
					  method="post">
					<p class="login-username">
						<input type="text" name="log" class="input required" value="" size="20"
							   placeholder="<?php esc_attr_e( 'Username', 'coaching' ) ?>"/>
					</p>
					<p class="login-password">
						<input type="password" name="pwd" class="input required" value="" size="20"
							   placeholder="<?php esc_attr_e( 'Password', 'coaching' ) ?>"/>
					</p>

					<?php
					/**
					 * Fires following the 'Password' field in the login form.
					 *
					 * @since 2.1.0
					 */
					do_action( 'login_form' );
					?>
					<p class="login-remember">
						<label><input name="rememberme" type="checkbox"
									  value="forever"/><?php esc_attr_e( 'Remember me', 'coaching' ) ?>
						</label>
					</p>
					<a class="lost-pass-link" href="<?php echo esc_url( thim_get_lost_password_url() ); ?>"
					   title="<?php esc_attr_e( 'Lost Password', 'coaching' ); ?>"><?php esc_html_e( 'Lost your password?', 'coaching' ) ?></a>

					<p class="login-submit">
						<input type="submit" name="wp-submit" class="button button-primary"
							   value="<?php esc_attr_e( 'Login', 'coaching' ) ?>"/>
						<input type="hidden" name="redirect_to" value="<?php echo esc_url( $redirect ); ?>"/>
					</p>
				</form>
				<?php
				$registration_enabled = get_option( 'users_can_register' );
				if ( $registration_enabled && !empty( $instance['show_register'] ) ) {
					?>
					<?php echo '<p class="link-bottom">' . esc_html__( 'Not a member yet? ', 'coaching' ) . '<a class="register" href="' . esc_url( thim_get_register_url() ) . '">' . esc_html__( 'Register now', 'coaching' ) . '</a></p>'; ?>
				<?php } ?>
			</div>
			<span class="close-popup"><i class="fa fa-times" aria-hidden="true"></i></span>
		</div>
	</div>
<?php endif; ?>