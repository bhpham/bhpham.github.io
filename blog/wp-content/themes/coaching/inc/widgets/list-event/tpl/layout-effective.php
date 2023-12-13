<?php
$number_posts = $instance['number_posts'] ? $instance['number_posts'] : 10;
$feature_item = $instance['feature_items'] ? $instance['feature_items'] : 1;
$list_status = $instance['status'] ? $instance['status'] : array( 'happening', 'upcoming' );
$list_cat = $instance['cat_id'] ? $instance['cat_id'] : array();
wp_enqueue_script('owl-carousel');
$link  = '';
if($instance['url_link'] != ''){
    $link       = $instance['url_link'];
} else {
    $link       = get_post_type_archive_link( 'tp_event' );
}

if( version_compare(WPEMS_VER, '2.1.5', '>=') ) {
    $query_args = array(
        'post_type'           => 'tp_event',
        'posts_per_page'      => $number_posts,
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
        'posts_per_page'      => $number_posts,
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
	echo '<div class="thim-list-event-effective">';

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
			$html[ get_the_ID() ]['month_show'] = wpems_get_time( 'M' );
            $html[ get_the_ID() ]['year_show'] = wpems_get_time( 'Y' );
		} else {
			$html[ get_the_ID() ]['time_from']  = tp_event_start( get_option('time_format') );
			$html[ get_the_ID() ]['time_end']   = tp_event_end( get_option('time_format') );
			$html[ get_the_ID() ]['location']   = tp_event_location();
			$html[ get_the_ID() ]['date_show']  = tp_event_get_time( 'd' );
			$html[ get_the_ID() ]['month_show'] = tp_event_get_time( 'M' );
            $html[ get_the_ID() ]['year_show'] = tp_event_get_time( 'Y' );
		}
		$html[ get_the_ID() ]['title']      = get_the_title();
		$html[ get_the_ID() ]['url']        = get_permalink( get_the_ID() );
		$html[ get_the_ID() ]['image_id']   = get_post_thumbnail_id();
		$html[ get_the_ID() ]['excerpt']    = thim_excerpt( 18 );
        $html[ get_the_ID() ]['qty']    = get_post_meta( get_the_ID(), 'tp_event_qty', true );
        $html[ get_the_ID() ]['price']    = get_post_meta( get_the_ID(), 'tp_event_price', true );

	}

	ksort( $sorting );

	if ( ! empty( $sorting ) ) {
        global $post;
		?>
        <div class="row">
            <div class="col-md-6 layout-effective-normal">
                <?php
                $index = 1;
                foreach ( $sorting as $value ) {
                    if ($index > $feature_item) {
                        ?>
                        <div class="item-event clearfix">
                            <div class="date-event">
                                <span><?php echo esc_html( $html[ $value ]['date_show'] );?></span>
                                <?php echo esc_html( $html[ $value ]['month_show'] );?>, <?php echo esc_html( $html[ $value ]['year_show'] );?>
                            </div>
                            <div class="info-event">
                                <div class="title-event">
                                    <a href="<?php echo esc_url( $html[ $value ]['url'] ); ?>">
                                        <?php echo esc_html( $html[ $value ]['title'] );?>
                                    </a>
                                </div>
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
                                <div class="content_event">
                                    <?php echo ent2ncr( $html[ $value ]['excerpt'] ); ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    $index++;
                }
            ?>
            </div>
            <div class="col-md-6 col-xs-12">
                <div class="layout-effective-slider">
                    <div class="thim-carousel-wrapper layout-effective-wrap" data-visible="1" data-itemtablet="1" data-itemmobile_horizontal="1" data-pagination="0" data-navigation="1" data-autoplay="1">
                        <?php
                        $index = 1;
                        foreach ( $sorting as $value ) {
                            if ( $index > $feature_item ) {
                                break;
                            }
                            $post = get_post( $value );
                            setup_postdata( $post );
                            ?>
                            <div class="event-item">
                                <div class="thumb-event">
                                    <a href="<?php echo esc_url( $html[ $value ]['url'] ); ?>"><?php echo thim_get_feature_image( $html[ $value ]['image_id'], 'full', 540, 280 );?></a>
                                </div>
                                <div class="countdown-event">
                                    <?php do_action( 'tp_event_loop_event_countdown' );?>
                                </div>
                                <div class="date-event">
                                    <?php echo esc_html( $html[ $value ]['month_show'] );?> <?php echo esc_html( $html[ $value ]['date_show'] );?>, <?php echo esc_html( $html[ $value ]['year_show'] );?>
                                </div>
                                <div class="title-event">
                                    <a href="<?php echo esc_url( $html[ $value ]['url'] ); ?>">
                                        <?php echo esc_html( $html[ $value ]['title'] );?>
                                    </a>
                                </div>
                                <div class="meta-event">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span>
                                                <i class="fa fa-map-marker"></i>
                                                <?php echo ent2ncr( $html[ $value ]['location'] ); ?>
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span>
                                                <i class="fa fa-users"></i>
                                                <?php echo esc_html__('Quantity', 'coaching');?>: <?php echo esc_html( $html[ $value ]['qty'] ); ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <span>
                                                <i class="fa fa-clock-o"></i>
                                                <?php echo esc_html( $html[ $value ]['time_from'] ) . ' - ' . esc_html( $html[ $value ]['time_end'] ); ?>
                                            </span>
                                        </div>
                                        <div class="col-sm-6">
                                            <span>
                                                <i class="fa fa-cc-visa"></i>
                                                <?php echo esc_html__('Price', 'coaching');?>: <?php echo esc_html( $html[ $value ]['price'] ); ?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            $index++;
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}
	if ( $instance['text_link'] <> '' ) {
		echo '<div class="view-all"><a class="view-all-link thim-button" href="' . esc_url( $link ) . '">' . $instance['text_link'] . '</a></div>';
	}
	echo '</div>';
}

wp_reset_postdata();

?>
