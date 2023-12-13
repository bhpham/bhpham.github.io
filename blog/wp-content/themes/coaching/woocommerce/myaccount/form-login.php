<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>


<div class="col2-set" id="customer_login">

	<div class="col-1 login-area">

		<?php endif; ?>

		<h2><?php esc_html_e( 'Login', 'coaching' ); ?></h2>

		<form method="post" class="login">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="form-row form-row-wide">
				<input type="text" class="input-text" name="username" id="username" placeholder="<?php esc_html_e( 'Username or email address', 'coaching' ); ?>" value="<?php if ( ! empty( $_POST['username'] ) ) {
					echo esc_attr( $_POST['username'] );
				} ?>" />
			</p>

			<p class="form-row form-row-wide">
				<input class="input-text" type="password" name="password" id="password" placeholder="<?php esc_html_e( 'Password', 'coaching' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>

			<div class="row">
				<div class="col-xs-6 remember">
					<label for="rememberme" class="inline">
						<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php esc_html_e( 'Remember me', 'coaching' ); ?>
					</label>
				</div>

				<div class="col-xs-6 lost-password">
					<p class="lost_password">
						<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'coaching' ); ?></a>
					</p>
				</div>
			</div>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-login' ); ?>
				<input type="submit" class="button" name="login" value="<?php esc_attr_e( 'Login', 'coaching' ); ?>" />
			</p>

			<h4 class="link-bottom">
				<?php echo esc_html__( 'Not a member yet?', 'coaching' ); ?>
				<a href="#"><?php echo esc_html__( 'Register now', 'coaching' ); ?></a>
			</h4>

			<?php do_action( 'woocommerce_login_form_end' ); ?>

		</form>

		<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="col-2 register-area">

		<h2 class="title"><?php esc_html_e( 'Register', 'coaching' ); ?></h2>

		<form method="post" class="register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="form-row form-row-wide">
					<input type="text" class="input-text" name="username" id="reg_username" placeholder="<?php esc_html_e( 'Username', 'coaching' ); ?>" value="<?php if ( ! empty( $_POST['username'] ) ) {
						echo esc_attr( $_POST['username'] );
					} ?>" />
				</p>

			<?php endif; ?>

			<p class="form-row form-row-wide">
				<input type="email" class="input-text" name="email" id="reg_email" placeholder="<?php esc_html_e( 'Email address', 'coaching' ); ?>" value="<?php if ( ! empty( $_POST['email'] ) ) {
					echo esc_attr( $_POST['email'] );
				} ?>" />
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="form-row form-row-wide">
					<input type="password" class="input-text" name="password" id="reg_password" placeholder="<?php esc_html_e( 'Password', 'coaching' ); ?>" />
				</p>

			<?php endif; ?>

			<!-- Spam Trap -->
			<div style="<?php echo( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;">
				<label for="trap"><?php esc_html_e( 'Anti-spam', 'coaching' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" />
			</div>

			<p class="thim-login-captcha">
				<?php
				$value_1 = rand( 1, 9 );
				$value_2 = rand( 1, 9 );
				?>
				<input type="text" data-captcha1="<?php echo esc_attr( $value_1 ); ?>" data-captcha2="<?php echo esc_attr( $value_2 ); ?>" placeholder="<?php echo esc_attr( $value_1 . ' &#43; ' . $value_2 . ' &#61;' ); ?>" class="captcha-result" />
			</p>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-register' ); ?>
				<input type="submit" class="button" name="register" value="<?php esc_attr_e( 'Register', 'coaching' ); ?>" />
			</p>

			<h4 class="link-bottom">
				<?php echo esc_html__( 'Are you a member?', 'coaching' ); ?>
				<a href="#"><?php echo esc_html__( 'Login now', 'coaching' ); ?></a>
			</h4>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>