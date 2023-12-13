<?php
/**
 * The template for displaying event content in the single-event.php template
 *
 * Override this template by copying it to yourtheme/wp-events-manager/templates/content-event.php
 *
 * @author 		ThimPress
 * @package 	tp-event
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * tp_event_before_loop_event hook
	 *
	 */
	 do_action( 'tp_event_before_loop_event' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="event-<?php the_ID(); ?>" <?php post_class('item-event feature-item'); ?>>

	<?php
		/**
		 * tp_event_before_loop_event_summary hook
		 *
		 * @hooked tp_event_show_event_sale_flash - 10
		 * @hooked tp_event_show_event_images - 20
		 */
		do_action( 'tp_event_before_loop_event_item' );

		$time_from  = wpems_event_start( get_option('time_format') );
		$time_end   = wpems_event_end( get_option('time_format') );
		$date_show  = wpems_get_time( 'd' );
		$month_show = wpems_get_time( 'M' );

	?>

	<div class="event-wrapper">

		<div class="time-from">
			<div class="date">
				<?php echo esc_html( $date_show ); ?>
			</div>
			<div class="month">
				<?php echo esc_html( $month_show ); ?>
			</div>
		</div>

		<div class="top-heading">
			<?php
			/**
			 * tp_event_single_event_title hook
			 */
			do_action( 'tp_event_single_event_title' );

			?>
			<div class="meta">
				<div class="time">
					<i class="fa fa-clock-o"></i>
					<?php echo esc_html( $time_from . ' - ' . $time_end ); ?>
				</div>
				<?php
				/**
				 * tp_event_loop_event_countdown
				 */
				//do_action( 'tp_event_loop_event_location' );
				?>
			</div>
		</div>


		<?php

		/**
		 * tp_event_single_event_content hook
		 */
		do_action( 'tp_event_single_event_content' );

		?>
	</div>

	<div class="image">
		<?php
			/**
			 * tp_event_single_event_thumbnail hook
			 */
			do_action( 'tp_event_single_event_thumbnail' );

		?>
	</div>

	<?php
		/**
		 * tp_event_after_loop_event_item hook
		 *
		 * @hooked tp_event_show_event_sale_flash - 10
		 * @hooked tp_event_show_event_images - 20
		 */
		do_action( 'tp_event_after_loop_event_item' );
	?>

</div>

<?php do_action( 'tp_event_after_loop_event' ); ?>
