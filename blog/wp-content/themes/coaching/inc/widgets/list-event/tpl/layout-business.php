<?php
$number_posts = $instance['number_posts'] ? $instance['number_posts'] : 10;
$feature_item = $instance['feature_items'] ? $instance['feature_items'] : 1;
$list_status = $instance['status'] ? $instance['status'] : array( 'happening', 'upcoming' );
$list_cat = $instance['cat_id'] ? $instance['cat_id'] : array();

$link  = '';
if($instance['url_link'] != ''){
    $link       = $instance['url_link'];
} else {
    $link       = get_post_type_archive_link( 'tp_event' );
}

if( version_compare(WPEMS_VER, '2.1.5', '>=') ) {
    $query_args = array(
        'post_type'           => 'tp_event',
        'posts_per_page'      => - 1,
        'meta_query' => array(
            array(
                'key'     => 'tp_event_status',
                'value'   => $list_status,
                'compare' => 'IN',
            ),
        ),
        'ignore_sticky_posts' => true
    );
} else {
    $list_status = $instance['status'] ? $instance['status'] : array( 'tp-event-happenning', 'tp-event-upcoming' );
    $query_args = array(
        'post_type'           => 'tp_event',
        'posts_per_page'      => - 1,
        'post_status'         => $list_status,
        'ignore_sticky_posts' => true
    );
}

if( $list_cat && $list_cat != 'all' ) {
    $query_args['tax_query'] = array(
        array(
            'taxonomy' => 'tp_event_category',
            'field'    => 'term_id',
            'terms'    => $list_cat
        ),
    );
}

$events  = new WP_Query( $query_args );
$html    = array();
$sorting = array();

if ( $events->have_posts() ) {
	if ( $instance['title'] ) {
		echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
	}
	echo '<div class="thim-list-event-business">';

	while ( $events->have_posts() ) {

		$events->the_post();
		if ( class_exists( 'WPEMS' ) ) {
			$sorting[strtotime(wpems_get_time())] = get_the_ID();
		} else {
			$sorting[strtotime(tp_event_get_time())] = get_the_ID();
		}

		$html[ get_the_ID() ]['class']      = join( ' ', get_post_class( 'item-event', get_the_ID() ) );
		if ( class_exists( 'WPEMS' ) ) {
			$html[ get_the_ID() ]['time_from']  = wpems_event_start( get_option('time_format') );
			$html[ get_the_ID() ]['time_end']   = wpems_event_end( get_option('time_format') );
			$html[ get_the_ID() ]['location']   = wpems_event_location();
			$html[ get_the_ID() ]['date_show']  = wpems_get_time( 'd' );
			$html[ get_the_ID() ]['month_show'] = wpems_get_time( 'F' );
		} else {
			$html[ get_the_ID() ]['time_from']  = tp_event_start( get_option('time_format') );
			$html[ get_the_ID() ]['time_end']   = tp_event_end( get_option('time_format') );
			$html[ get_the_ID() ]['location']   = tp_event_location();
			$html[ get_the_ID() ]['date_show']  = tp_event_get_time( 'd' );
			$html[ get_the_ID() ]['month_show'] = tp_event_get_time( 'F' );
		}
		$html[ get_the_ID() ]['title']      = get_the_title();
		$html[ get_the_ID() ]['url']        = get_permalink( get_the_ID() );
		$html[ get_the_ID() ]['image_id']   = get_post_thumbnail_id();
		$html[ get_the_ID() ]['excerpt']    = thim_excerpt( 70 );

	}

	ksort( $sorting );

	if ( ! empty( $sorting ) ) {
		$index = 1;
		echo '<div class="row">';
		echo '<div class="col-sm-6 col-md-8">';
		foreach ( $sorting as $value ) {
			if ( $index > $number_posts ) {
				break;
			}
			$event           = get_post( $value );
			if ( $html[ $value ] ) {
				if ( $index <= $feature_item ) {
					?>
					<div class="<?php echo ent2ncr( $html[ $value ]['class'] ); ?> feature-item">
						<div class="info_event">
							<div class="date_event">
								<h4><?php echo esc_html( $html[ $value ]['date_show'] ); ?></h4> <?php echo esc_html( $html[ $value ]['month_show'] ); ?>
							</div>
							<div class="title_event">
								<h2><a href="<?php echo esc_url( $html[ $value ]['url'] ); ?>"> <?php echo esc_html( $html[ $value ]['title'] ) ; ?></a></h2>
								<div class="meta_event">
									<span>
										<i class="fa fa-clock-o"></i>
										<?php echo esc_html( $html[ $value ]['time_from'] ) . ' - ' . esc_html( $html[ $value ]['time_end'] ); ?>
									</span>
									<span>
										<i class="fa fa-map-marker"></i>
										<?php echo ent2ncr( $html[ $value ]['location'] ); ?>
									</span>
								</div>
							</div>
						</div>
						<div class="content_event">
							<?php echo ent2ncr( $html[ $value ]['excerpt'] ); ?>
						</div>
						<div class="view_detail">
							<a class="thim-button" href="<?php echo esc_url( $html[ $value ]['url'] ); ?>"> <?php esc_html_e( 'View Detail', 'coaching' ); ?></a>
						</div>
					</div>
					<?php
					if ( $index == $feature_item ) {
						echo '</div><div class="col-sm-6 col-md-4">';
					}
				} else {
					?>
					<div class="<?php echo ent2ncr( $html[ $value ]['class'] ); ?>">
						<div class="date_event">
							<?php echo esc_html( $html[ $value ]['date_show'] ); ?> <?php echo esc_html( $html[ $value ]['month_show'] ); ?>
						</div>
						<div class="title_event">
							<h2><a href="<?php echo esc_url( $html[ $value ]['url'] ); ?>"> <?php echo esc_html( $html[ $value ]['title'] ) ; ?></a></h2>
						</div>
					</div>
					<?php
				}
			}
			$index ++;
		}
		echo '</div>';
		echo '</div>';
	}
	if ( $instance['text_link'] <> '' ) {
		echo '<div class="view-all"><a class="view-all-link thim-button" href="' . esc_url( $link ) . '">' . $instance['text_link'] . '</a></div>';
	}
	echo '</div>';
}

wp_reset_postdata();

?>
