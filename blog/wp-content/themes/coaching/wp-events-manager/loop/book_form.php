<?php
/**
 * @Author: ducnvtt
 * @Date  :   2016-03-03 10:34:45
 * @Last  Modified by:   ducnvtt
 * @Last  Modified time: 2016-03-25 17:12:38
 */

use WPEMS_Auth\Events\Event as Event;

if ( !defined( 'ABSPATH' ) ) {
	exit;
}

$event    = new WPEMS_Event( get_the_ID() );
$user_reg = $event->booked_quantity( get_current_user_id() );
$payments = wpems_gateways_enable();
if( version_compare(WPEMS_VER, '2.1.5', '>=') ) {
    $is_expired = ( 'expired' === get_post_meta( get_the_ID(), 'tp_event_status', true ) ) ? true : false;
} else {
    $is_expired = ( 'tp-event-expired' === $event->post->post_status ) ? true : false;
}

?>
<h3 class="book-title"><?php esc_html_e( 'Buy Ticket', 'coaching' ); ?></h3>

<div class="event_register_area">

	<form name="event_register" class="event_register" method="POST">

		<ul class="info-event">
			<li>
				<div class="label"><?php esc_html_e( 'Total Slots', 'coaching' ); ?></div>
				<div class="value"><?php echo absint( $event->qty ); ?></div>
			</li>
			<li>
				<div class="label"><?php esc_html_e( 'Booked Slots', 'coaching' ); ?></div>
				<div class="value"><?php echo esc_html( $event->booked_quantity() ); ?></div>
			</li>
			<li class="event-cost">
				<div class="label"><?php esc_html_e( 'Cost', 'coaching' ); ?></div>
				<div class="value"><?php echo ( $event->get_price() ) ? wpems_format_price( $event->get_price() ) . esc_html__( '/Slot', 'coaching' ) : '<span class="free">' . esc_html__( 'Free', 'coaching' ) . '</span>'; ?></div>
			</li>
			<li>
				<?php if ( $user_reg == 0 && $event->is_free() && wpems_get_option( 'email_register_times' ) === 'once' ) : ?>
					<div class="label"><?php esc_html_e( 'Quantity', 'coaching' ); ?></div>
					<div class="value">
						<input disabled type="number" value="1" min="1" id="event_register_qty"/>
						<input type="hidden" name="qty" value="1" min="1"/>
					</div>
				<?php else : ?>
					<div class="label"><?php esc_html_e( 'Quantity', 'coaching' ); ?></div>
					<div class="value">
						<input type="number" name="qty" value="1" min="1" id="event_register_qty"/>
					</div>
				<?php endif; ?>
			</li>
			<?php if ( !$event->is_free() ) : ?>
				<?php
				if ( ! empty( $payments ) ) {
					?>
					<li class="event-payment">
						<div class="label"><?php esc_html_e( 'Pay with', 'coaching' ); ?></div>
						<div class="event_auth_payment_methods">
							<?php
							$payments = wpems_gateways_enable();

							if( !empty($payments) ) {
								$i = 0;
								foreach ( $payments as $id => $payment ) : ?>
									<input id="payment_method_<?php echo esc_attr( $id ) ?>" type="radio" name="payment_method" value="<?php echo esc_attr( $id ) ?>"<?php echo $i === 0 ? ' checked' : '' ?>/>
									<label for="payment_method_<?php echo esc_attr( $id ) ?>"><img width="115" height="50" src="<?php echo esc_attr( $payment->icon ) ?>" /></label>
									<?php $i ++;
								endforeach;
							}
							?>
						</div>
					</li>
				<?php }?>
			<?php endif; ?>
		</ul>

		<?php if(empty($payments)) { ?>
			<p class="event_auth_register_message_error">
				<?php echo esc_html__( 'You must set payment setting!', 'coaching' ); ?>
			</p>
		<?php }?>

		<!--Hide payment option when cost is 0-->

		<!--End hide payment option when cost is 0-->

		<div class="event_register_foot">
			<input type="hidden" name="event_id" value="<?php echo esc_attr( get_the_ID() ) ?>" />
			<input type="hidden" name="action" value="event_auth_register" />
			<?php wp_nonce_field( 'event_auth_register_nonce', 'event_auth_register_nonce' ); ?>
			<?php if ( $is_expired ) : ?>
				<button type="submit" disabled class="event_button_disable"><?php esc_html_e( 'Expired', 'coaching' ); ?></button>
			<?php elseif ( absint( $event->qty ) == 0 ) : ?>
				<button type="submit" disabled class="event_button_disable"><?php esc_html_e( 'Sold Out', 'coaching' ); ?></button>
			<?php else: ?>
				<?php if ( !is_user_logged_in() ) { ?>
					<a href="<?php echo esc_url( add_query_arg( 'redirect_to', urlencode( get_permalink() ), thim_get_login_page_url() ) ) ?>" class="event_register_submit event_auth_button"><?php esc_html_e( 'Login Now', 'coaching' ); ?><?php add_query_arg( 'redirect_to', get_permalink(), thim_get_login_page_url() );?></a>
					<p></p>
					<p class="login-notice">
						<?php echo esc_html__('You must login to our site to book this event!', 'coaching'); ?>
					</p>
				<?php } else { ?>
					<button type="submit" class="event_register_submit event_auth_button"><?php esc_html_e( 'Book Now', 'coaching' ); ?></button>
				<?php } ?>
			<?php endif ?>

		</div>

	</form>

</div>