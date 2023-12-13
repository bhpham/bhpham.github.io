<?php
/**
 * The Template for displaying all archive products.
 *
 * Override this template by copying it to yourtheme/tp-event/templates/shortcode/event-countdown.php
 *
 * @author 		ThimPress
 * @package 	tp-event
 * @version     1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$the_posts = new WP_Query( $args );

if ( $the_posts->have_posts() ) {
	while ( $the_posts->have_posts() ) : $the_posts->the_post();
		do_action( 'tp_event_loop_event_countdown' );
	endwhile;
	wp_reset_postdata();
}
