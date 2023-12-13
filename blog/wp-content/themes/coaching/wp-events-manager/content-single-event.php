<?php
wp_enqueue_script('owl-carousel');
?>
<article id="tp_event-<?php the_ID(); ?>" <?php post_class( 'tp_single_event' ); ?>>

	<?php
	/**
	 * tp_event_before_loop_room_summary hook
	 *
	 * @hooked tp_event_show_room_sale_flash - 10
	 * @hooked tp_event_show_room_images - 20
	 */
	do_action( 'tp_event_before_single_event' );
	?>

	<div class="summary entry-summary">

		<?php
		/**
		 * tp_event_single_event_title hook
		 */
		do_action( 'tp_event_single_event_title' );

		/**
		 * tp_event_single_event_thumbnail hook
		 */
		echo '<div class="tp-event-top">';
		do_action( 'tp_event_single_event_thumbnail' );

		/**
		 * tp_event_loop_event_countdown
		 */
		do_action( 'tp_event_loop_event_countdown' );
		echo '</div>';
		?>
		<div class="tp-event-content">
			<?php
			$time_from   = get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_start', true ) ) : time();
			$time_finish = get_post_meta( get_the_ID(), 'tp_event_date_end', true ) ? strtotime( get_post_meta( get_the_ID(), 'tp_event_date_end', true ) ) : time();
			$time_start  = wpems_event_start( get_option('time_format') );
			$time_end    = wpems_event_end( get_option('time_format') );
			$location    = get_post_meta( get_the_ID(), 'tp_event_location', true ) ? get_post_meta( get_the_ID(), 'tp_event_location', true ) : '';
			$view_map    = get_post_meta( get_the_ID(), 'tp_event_view_map', true ) ? get_post_meta( get_the_ID(), 'tp_event_view_map', true ) : '';
			?>
			<div class="tp-event-info">
				<div class="row">
					<div class="tp-info-box col-sm-4">
						<p class="heading">
							<i class="thim-color fa fa-clock-o"></i><?php esc_html_e( 'Start Time', 'coaching' ); ?>
						</p>

						<p><?php echo esc_html( $time_start ); ?></p>

						<p><?php echo date_i18n( get_option('date_format'), $time_from ); ?></p>
					</div>
					<div class="tp-info-box col-sm-4">
						<p class="heading">
							<i class="thim-color fa fa-flag"></i><?php esc_html_e( 'Finish Time', 'coaching' ); ?>
						</p>

						<p><?php echo esc_html( $time_end ); ?></p>

						<p><?php echo date_i18n( get_option('date_format'), $time_finish ); ?></p>
					</div>
                    <?php if( $location ) {?>
					<div class="tp-info-box col-sm-4">
						<p class="heading">
							<i class="thim-color fa fa-map-marker"></i><?php esc_html_e( 'Address', 'coaching' ); ?>
						</p>

						<p><?php echo esc_html( $location ); ?></p>
					</div>
                    <?php }?>
				</div>
			</div>

			<?php

			/**
			 * tp_event_single_event_content hook
			 */
			do_action( 'tp_event_single_event_content' );

			?>
			<div class="maps_event_single">
				<?php /**
				 * tp_event_loop_event_location hook
				 */
				do_action( 'tp_event_loop_event_location' );
				?>
			</div>

		</div>

		<?php $members = get_post_meta( get_the_ID(), 'thim_event_members', true ); ?>
		<?php if ( $members ) : ?>
			<div class="tp-event-organizers">
				<h3 class="title"><?php esc_html_e( 'Who comes with us?', 'coaching' ); ?></h3>

				<div class="thim-carousel-container">
					<div class="thim-carousel-wrapper" data-visible="3" data-loop="1" data-pagination="1">
						<?php foreach ( $members as $member ) : ?>
							<div class="item">
								<div class="thumbnail">
									<?php echo thim_get_feature_image( get_post_thumbnail_id( $member ), 'full', 100, 100 ); ?>
								</div>
								<div class="info">
									<p class="name"><?php echo get_the_title( $member ); ?></p>

									<p class="regency"><?php echo get_post_meta( $member, 'regency', true ); ?></p>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>

		<div class="tp-event-single-share">
			<?php do_action( 'thim_social_share' ); ?>
		</div>

		<div class="entry-navigation-post">
			<?php previous_post_link( '%link', '%title', true, ' ', 'tp_event' ); ?>
			<?php

			$navigation = thim_get_nav_single_event( get_the_ID() );

			$prev_post = isset( $navigation['prev_event'] ) ? $navigation['prev_event'] : false;
			if ( ! empty( $prev_post ) ):
				?>
				<div class="prev-post">
					<p class="heading"><?php echo esc_html__( 'Previous Event', 'coaching' ); ?></p>
					<h5 class="title">
						<a href="<?php echo get_permalink( $prev_post ); ?>"><?php echo get_the_title( $prev_post ); ?></a>
					</h5>
				</div>
			<?php endif; ?>

			<?php $next_post = isset( $navigation['next_event'] ) ? $navigation['next_event'] : false;
			if ( ! empty( $next_post ) ):
				?>
				<div class="next-post">
					<p class="heading"><?php echo esc_html__( 'Next Event', 'coaching' ); ?></p>
					<h5 class="title">
						<a href="<?php echo get_permalink( $next_post ); ?>"><?php echo get_the_title( $next_post ); ?></a>
					</h5>
				</div>
			<?php endif; ?>
		</div>

	</div><!-- .summary -->

	<?php
	/**
	 * hotel_booking_after_loop_room hook
	 *
	 * @hooked hotel_booking_output_room_data_tabs - 10
	 * @hooked hotel_booking_upsell_display - 15
	 * @hooked hotel_booking_output_related_products - 20
	 */
	do_action( 'tp_event_after_single_event' );
	?>

</article><!-- #product-<?php the_ID(); ?> -->