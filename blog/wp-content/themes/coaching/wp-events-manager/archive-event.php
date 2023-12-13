<?php
/**
 * The Template for displaying all archive products.
 *
 * Override this template by copying it to yourtheme/tp-event/templates/archive-event.php
 *
 * @author        ThimPress
 * @package       tp-event/template
 * @version       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
global $wp_query;
$_wp_query = $wp_query;
?>

<?php
/**
 * tp_event_before_main_content hook
 *
 * @hooked tp_event_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked tp_event_breadcrumb - 20
 */
do_action( 'tp_event_before_main_content' );
?>

<?php
/**
 * tp_event_archive_description hook
 *
 * @hooked tp_event_taxonomy_archive_description - 10
 * @hooked tp_event_room_archive_description - 10
 */
do_action( 'tp_event_archive_description' );
?>
	<span class="icon-archive-event"><i class="fa fa-bars" aria-hidden="true"></i></span>
	<select class="thim-archive-event-select">
		<option selected value=""><?php esc_html_e( 'Event Type', 'coaching' ); ?></option>
		<option value="happening"><?php esc_html_e( 'Happening', 'coaching' ); ?></option>
		<option value="upcoming"><?php esc_html_e( 'Upcoming', 'coaching' ); ?></option>
		<option value="expired"><?php esc_html_e( 'Expired', 'coaching' ); ?></option>
	</select>
	<div class="archive-event thim-list-event">
		<?php
		foreach ( array( 'happening', 'upcoming', 'expired' ) as $type ):
			get_template_part( "wp-events-manager/archive-event", $type );
		endforeach;
		?>
	</div>

<?php
/**
 * tp_event_after_main_content hook
 *
 * @hooked tp_event_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'tp_event_after_main_content' );
?>

<?php
/**
 * tp_event_sidebar hook
 *
 * @hooked tp_event_get_sidebar - 10
 */
do_action( 'tp_event_sidebar' );
?>

<?php //get_footer(); ?>