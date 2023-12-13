<?php
global $post;

$limit             = $instance['limit'];
$columns           = $instance['grid-options']['columns'];
$view_all_course   = ( $instance['view_all_courses'] && '' != $instance['view_all_courses'] ) ? $instance['view_all_courses'] : false;
$view_all_position = ( $instance['view_all_position'] && '' != $instance['view_all_position'] ) ? $instance['view_all_position'] : 'top';
$sort              = $instance['order'];
$feature           = !empty( $instance['featured'] ) ? true : false;
$thumb_w           = ( !empty( $instance['thumbnail_width'] ) && '' != $instance['thumbnail_width'] ) ? $instance['thumbnail_width'] : apply_filters( 'thim_course_thumbnail_width', 400 );
$thumb_h           = ( !empty( $instance['thumbnail_width'] ) && '' != $instance['thumbnail_height'] ) ? $instance['thumbnail_height'] : apply_filters( 'thim_course_thumbnail_height', 300 );

$condition = array(
	'post_type'           => 'lp_course',
	'posts_per_page'      => $limit,
	'ignore_sticky_posts' => true,
);

if ( $sort == 'category' && $instance['cat_id'] && $instance['cat_id'] != 'all' ) {
	if ( get_term( $instance['cat_id'], 'course_category' ) ) {
		$condition['tax_query'] = array(
			array(
				'taxonomy' => 'course_category',
				'field'    => 'term_id',
				'terms'    => $instance['cat_id']
			),
		);
	}
}

if ( $sort == 'popular' ) {
	$post_in = coaching_lp_get_popular_courses( $limit );

    $condition['post__in'] = $post_in;
    $condition['orderby']  = 'post__in';
}

if ( $feature ) {
	$condition['meta_query'] = array(
		array(
			'key'   => '_lp_featured',
			'value' => 'yes',
		)
	);
}

$the_query = new WP_Query( $condition );

if ( $the_query->have_posts() ) :
	if ( $instance['title'] ) {
		echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
	}
	?>
	<div class="thim-course-grid home5-layout">
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php
			$course          = LP()->global['course'];
			$course_id       = get_the_ID();
			$course_color    = get_post_meta( $course_id, 'thim_course_meta_color', true );
			$course_duration = get_post_meta( $course_id, '_lp_duration', true );
			?>
			<div class="lpr_course <?php echo 'course-grid-' . $columns; ?>">
				<div class="course-item">
					<div class="course-thumbnail">
						<?php echo thim_get_feature_image( get_post_thumbnail_id( get_the_ID() ), 'full', $thumb_w, $thumb_h, get_the_title() ); ?>
					</div>
					<div class="thim-course-content">

						<h4 class="course-title">
							<a href="<?php echo esc_url( get_the_permalink() ); ?>"> <?php echo get_the_title(); ?></a>
						</h4>
						<?php if ( thim_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) ) {
							$course_id   = get_the_ID();
							$course_rate = learn_press_get_course_rate( $course_id );
							$ratings     = learn_press_get_course_rate_total( $course_id );
							$total       = learn_press_get_course_rate_total( $course_id );
							?>
							<div class="course-review">
								<div class="value">
									<div class="review-stars-rated">
										<ul class="review-stars">
											<li><span class="fa fa-star-o"></span></li>
											<li><span class="fa fa-star-o"></span></li>
											<li><span class="fa fa-star-o"></span></li>
											<li><span class="fa fa-star-o"></span></li>
											<li><span class="fa fa-star-o"></span></li>
										</ul>
										<ul class="review-stars filled"
											style="<?php echo esc_attr( 'width: calc(' . ( $course_rate * 20 ) . '%)' ) ?>">
											<li><span class="fa fa-star"></span></li>
											<li><span class="fa fa-star"></span></li>
											<li><span class="fa fa-star"></span></li>
											<li><span class="fa fa-star"></span></li>
											<li><span class="fa fa-star"></span></li>
										</ul>
									</div>
									<span class="average-value"
										  itemprop="ratingValue"><?php echo ( $course_rate ) ? esc_html( number_format( (float) $course_rate, 1, '.', '' ) ) : '0.0'; ?></span>
									<span class="review-amount" itemprop="ratingCount">
										<?php $total ? printf( _n( '( %1$s Review )', '( %1$s Reviews )', $total, 'coaching' ), number_format_i18n( $total ) ) : esc_html_e( '( 0 Review )', 'coaching' ); ?>
									</span>
								</div>
							</div>
						<?php } ?>
						<div class="course-meta">
							<div class="students-feature">
								<i class="ion-android-person"></i>
								<?php $user_count = $course->get_users_enrolled() ? $course->get_users_enrolled() : 0; ?>
								<span
									class="value"><?php echo esc_html( $user_count ); ?><?php echo esc_html__( ' Student', 'coaching' ); ?></span>
							</div>
							<div class="course-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
								<?php
								$course      = LP_Course::get_course( $post->ID );
								$is_required = $course->is_required_enroll();
								?>
								<?php if ( $course->is_free() || !$is_required ) : ?>
									<div class="value free-course" itemprop="price"
										 content="<?php esc_attr_e( 'Free', 'coaching' ); ?>">
										<?php esc_html_e( 'Free', 'coaching' ); ?>
									</div>
								<?php else:
									$price = $course->get_price_html();
									$origin_price = $course->get_origin_price_html();
									?>
									<div class="value " itemprop="price" content="<?php echo esc_attr( $price ); ?>">
										<?php
										if ( $price != $origin_price ) {
											echo '<span class="course-origin-price">' . $origin_price . '</span>';
										}
										echo esc_html( $price );
										?>
									</div>
								<?php endif; ?>
								<meta itemprop="priceCurrency"
									  content="<?php echo learn_press_get_currency_symbol(); ?>"/>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		endwhile;
		?>
	</div>
	<?php
	if ( $view_all_course && 'bottom' == $view_all_position ) {
		echo '<div class="thim-button-style5 view-all"><a class="view-all-courses thim-button" href="' . get_post_type_archive_link( 'lp_course' ) . '">' . esc_attr( $view_all_course ) . '</a></div>';
	}

endif;

wp_reset_postdata();
