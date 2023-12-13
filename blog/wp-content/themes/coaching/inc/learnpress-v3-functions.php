<?php
/**
 * Custom functions for LearnPress 3.x
 *
 * @package thim
 */


if ( ! function_exists( 'thim_remove_learnpress_hooks' ) ) {
	function thim_remove_learnpress_hooks() {
		remove_action( 'learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_begin_meta', 10 );
		remove_action( 'learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_price', 20 );
		remove_action( 'learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_instructor', 25 );
		remove_action( 'learn-press/after-courses-loop-item', 'learn_press_courses_loop_item_end_meta', 30 );
		remove_action( 'learn-press/after-courses-loop-item', 'learn_press_course_loop_item_buttons', 35 );
		remove_action( 'learn-press/after-courses-loop-item', 'learn_press_course_loop_item_user_progress', 40 );
		remove_action( 'learn-press/before-main-content', 'learn_press_breadcrumb', 10 );
		remove_action( 'learn-press/before-main-content', 'learn_press_search_form', 15 );
		remove_action( 'learn-press/content-landing-summary', 'learn_press_course_meta_start_wrapper', 5 );
		remove_action( 'learn-press/content-landing-summary', 'learn_press_course_students', 10 );
		remove_action( 'learn-press/content-landing-summary', 'learn_press_course_meta_end_wrapper', 15 );
		remove_action( 'learn-press/content-landing-summary', 'learn_press_course_price', 25 );
		remove_action( 'learn-press/content-landing-summary', 'learn_press_course_buttons', 30 );
		remove_action( 'learn-press/content-landing-summary', 'learn_press_course_instructor', 35 );
		remove_action( 'learn-press/course-section-item/before-lp_lesson-meta', 'learn_press_item_meta_duration', 5 );
		remove_action( 'learn-press/course-section-item/before-lp_quiz-meta', 'learn_press_item_meta_duration', 10 );
		remove_action( 'learn-press/course-section-item/before-lp_quiz-meta', 'learn_press_quiz_meta_questions', 5 );
		remove_action( 'learn-press/content-learning-summary', 'learn_press_course_meta_start_wrapper', 10 );
		remove_action( 'learn-press/content-learning-summary', 'learn_press_course_remaining_time', 30 );
		remove_action( 'learn-press/content-learning-summary', 'learn_press_course_students', 15 );
		remove_action( 'learn-press/content-learning-summary', 'learn_press_course_meta_end_wrapper', 20 );
		remove_action( 'learn-press/content-learning-summary', 'learn_press_course_progress', 25 );
		remove_action( 'learn-press/content-learning-summary', 'learn_press_course_buttons', 40 );
		remove_action( 'learn-press/content-learning-summary', 'learn_press_course_instructor', 45 );
		remove_action( 'learn-press/course-buttons', 'learn_press_course_continue_button', 25 );
		remove_action( 'learn-press/parse-course-item', 'learn_press_control_displaying_course_item' );
		remove_action( 'learn-press/before-profile-nav', 'learn_press_profile_mobile_menu', 5 );
		remove_action( 'learn-press/quiz-buttons', 'learn_press_course_finish_button', 50 );
		//remove_action( 'learn-press/quiz-buttons', 'learn_press_quiz_result_button', 35 );
		//remove_action( 'learn-press/after-content-item-summary/lp_quiz', 'learn_press_content_item_summary_question_numbers', 10 );
		add_action( 'thim_begin_curriculum_button', 'learn_press_course_remaining_time', 1 );
		add_action( 'learn-press/parse-course-item', function () {
			remove_action( 'wp_print_scripts', 'learn_press_content_item_script' );
		}, 10 );
		add_action( 'wp_enqueue_scripts', function () {
			wp_dequeue_style( 'learn-press' );
		}, 10000 );

		add_action( 'init', function () {
			if ( thim_plugin_active( 'learnpress-wishlist/learnpress-wishlist.php' ) && class_exists( 'LP_Addon_Wishlist' ) && is_user_logged_in() && thim_is_version_addons_wishlist( '3' ) ) {
				$instance_addon = LP_Addon_Wishlist::instance();
				remove_action( 'learn-press/after-course-buttons', array( $instance_addon, 'wishlist_button' ), 100 );
				add_action( 'thim_inner_thumbnail_course', array( $instance_addon, 'wishlist_button' ), 10 );
			}
			if ( thim_plugin_active( 'learnpress-bbpress/learnpress-bbpress.php' ) && class_exists( 'LP_Addon_bbPress' ) && thim_is_version_addons_bbpress( '3' ) ) {
				$instance_addon = LP_Addon_bbPress::instance();
				remove_action( 'learn-press/single-course-summary', array( $instance_addon, 'forum_link' ), 0 );
			}
			if ( thim_plugin_active( 'learnpress-woo-payment/learnpress-woo-payment.php' ) && class_exists( 'LP_Addon_Woo_Payment' ) && thim_is_version_addons_woo( '3' ) ) {
				$instance_addon = LP_Addon_Woo_Payment::instance();
				remove_action( 'learn-press/before-course-buttons', array(
					$instance_addon,
					'purchase_course_notice'
				) );
				remove_action( 'learn-press/after-course-buttons', array( $instance_addon, 'after_course_buttons' ) );
				//add_action( 'learn-press/before-single-course', array( $instance_addon, 'purchase_course_notice' ) );
				//add_action( 'learn-press/before-single-course', array( $instance_addon, 'after_course_buttons' ) );
			}
			if ( thim_plugin_active( 'learnpress-paid-membership-pro/learnpress-paid-memberships-pro.php' ) && thim_plugin_active( 'paid-memberships-pro/paid-memberships-pro.php' ) && class_exists( 'LP_Addon_Paid_Memberships_Pro' ) ) {
				$instance_addon = LP_Addon_Paid_Memberships_Pro::instance();
				remove_action( 'learn-press/before-course-buttons', array(
					$instance_addon,
					'learn_press_before_course_buttons'
				), 10 );
				add_action( 'thim_single_course_payment', array(
					$instance_addon,
					'learn_press_before_course_buttons'
				), 8 );
			}
		}, 99 );

		//remove_action( 'learn-press/course-section-item/before-lp_lesson-meta', 'learn_press_item_meta_duration', 5 );
		//add_action( 'learn-press/course-section-item/after-lp_lesson-meta', 'learn_press_item_meta_duration', 5 );

		add_action( 'thim_single_course_payment', 'learn_press_course_price', 5 );
		add_action( 'thim_single_course_payment', 'learn_press_course_external_button', 10 );
		add_action( 'thim_single_course_payment', 'learn_press_course_purchase_button', 15 );
		add_action( 'thim_single_course_payment', 'learn_press_course_enroll_button', 20 );
		add_action( 'thim_single_course_meta', 'learn_press_course_instructor', 5 );
		add_action( 'thim_single_course_meta', 'learn_press_course_categories', 15 );
		add_action( 'thim_single_course_meta', 'thim_course_forum_link', 20 );
		add_action( 'thim_single_course_meta', 'thim_course_ratings', 25 );
		add_action( 'thim_single_course_meta', 'learn_press_course_progress', 30 );
		add_action( 'thim_begin_curriculum_button', 'learn_press_course_buttons', 10 );
		remove_action( 'learn-press/course-buttons', 'learn_press_course_external_button', 5 );
		remove_action( 'learn-press/course-buttons', 'learn_press_course_purchase_button', 10 );
		remove_action( 'learn-press/course-buttons', 'learn_press_course_enroll_button', 15 );
		remove_action( 'learn-press/after-checkout-order-review', 'learn_press_order_comment', 5 );
		remove_action( 'learn-press/after-checkout-order-review', 'learn_press_order_payment', 10 );
		add_action( 'learn-press/checkout-order-review', 'learn_press_order_comment', 10 );
		add_action( 'learn-press/checkout-order-review', 'learn_press_order_payment', 15 );
		remove_action( 'learn-press/before-checkout-form', 'learn_press_checkout_form_login', 5 );
		remove_action( 'learn-press/before-checkout-form', 'learn_press_checkout_form_register', 10 );
	}
}

add_action( 'after_setup_theme', 'thim_remove_learnpress_hooks', 15 );

add_action( 'learn-press/content-landing-summary', 'thim_landing_tabs', 22 );

//learn_press_is_courses() || learn_press_is_course_taxonomy()

/**
 * Display course ratings
 */
if ( ! function_exists( 'thim_course_ratings_meta' ) ) {
	function thim_course_ratings_meta() {

		if ( ! thim_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) || ! thim_is_version_addons_review( '3' ) ) {
			return;
		}

		$course_id   = get_the_ID();
		$course_rate = learn_press_get_course_rate( $course_id );
		$ratings     = learn_press_get_course_rate_total( $course_id );
		?>
        <div class="course-review">
            <label><?php esc_html_e( 'Review', 'coaching' ); ?></label>

            <div class="value">
				<?php echo $course_rate; ?> <?php esc_html_e( 'Stars', 'coaching' ); ?>
                <span><?php $ratings ? printf( _n( '(%1$s review)', '(%1$s reviews)', $ratings, 'coaching' ), number_format_i18n( $ratings ) ) : esc_html_e( '(0 review)', 'coaching' ); ?></span>
            </div>
        </div>
		<?php
	}
}

/**
 * Display price html
 */

if ( ! function_exists( 'thim_course_loop_price_html' ) ) {
	function thim_course_loop_price_html( $course ) {
		$class = ( $course->has_sale_price() ) ? ' has-origin' : '';
		if ( $course->is_free() ) {
			$class .= ' free-course';
		}
		?>
        <div class="course-price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
			<?php if ( $price_html = $course->get_price_html() ) { ?>
                <div class="value <?php echo $class; ?>" itemprop="price">
					<?php if ( $course->get_origin_price() != $course->get_price() ) { ?>
						<?php $origin_price_html = $course->get_origin_price_html(); ?>
                        <span class="course-origin-price"><?php echo $origin_price_html; ?></span>
					<?php } ?>
					<?php echo $price_html; ?>
                </div>
                <meta itemprop="priceCurrency" content="<?php echo learn_press_get_currency_symbol(); ?>"/>
			<?php } ?>
        </div>
		<?php
	}
}

/**
 * Add some meta data for a course
 *
 * @param $meta_box
 */
if ( ! function_exists( 'thim_add_course_meta' ) ) {
	function thim_add_course_meta( $meta_box ) {
		$fields = $meta_box['fields'];

		$fields[] = array(
			'name' => __( 'Course Meta Color', 'coaching' ),
			'id'   => 'thim_course_meta_color',
			'type' => 'color',
			'desc' => __( 'Background Color', 'coaching' ),
		);

		$fields[]           = array(
			'name' => esc_html__( 'Duration', 'coaching' ),
			'id'   => 'thim_course_duration',
			'type' => 'text',
			'desc' => esc_html__( 'Course duration', 'coaching' ),
			'std'  => esc_html__( '50 hours', 'coaching' )
		);
		$fields[]           = array(
			'name' => esc_html__( 'Skill Levels', 'coaching' ),
			'id'   => 'thim_course_skill_level',
			'type' => 'text',
			'desc' => esc_html__( 'A possible level with this course', 'coaching' ),
			'std'  => esc_html__( 'All levels', 'coaching' )
		);
		$fields[]           = array(
			'name' => esc_html__( 'Languages', 'coaching' ),
			'id'   => 'thim_course_language',
			'type' => 'text',
			'desc' => esc_html__( 'Language\'s used for studying', 'coaching' ),
			'std'  => esc_html__( 'English', 'coaching' )
		);
		$fields[]           = array(
			'name' => esc_html__( 'Media Intro', 'coaching' ),
			'id'   => 'thim_course_media_intro',
			'type' => 'textarea',
			'desc' => esc_html__( 'Enter media intro', 'coaching' ),
		);
		$meta_box['fields'] = $fields;

		return $meta_box;
	}

}

add_filter( 'learn_press_course_settings_meta_box_args', 'thim_add_course_meta' );


if ( ! function_exists( 'thim_add_lesson_meta' ) ) {
	function thim_add_lesson_meta( $meta_box ) {
		$fields             = $meta_box['fields'];
		$fields[]           = array(
			'name' => esc_html__( 'Media', 'coaching' ),
			'id'   => '_lp_lesson_video_intro',
			'type' => 'textarea',
			'desc' => esc_html__( 'Add an embed link like video, PDF, slider...', 'coaching' ),
		);
		$meta_box['fields'] = $fields;

		return $meta_box;
	}
}
add_filter( 'learn_press_lesson_meta_box_args', 'thim_add_lesson_meta' );

/**
 * Display course review
 */
if ( ! function_exists( 'thim_course_review' ) ) {
	function thim_course_review() {
		if ( ! thim_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) || ! thim_is_version_addons_review( '3' ) ) {
			return;
		}

		$course_id     = get_the_ID();
		$course_review = learn_press_get_course_review( $course_id, isset( $_REQUEST['paged'] ) ? $_REQUEST['paged'] : 1, 5, true );
		$course_rate   = learn_press_get_course_rate( $course_id );
		$total         = learn_press_get_course_rate_total( $course_id );
		$reviews       = $course_review['reviews'];

		?>
        <div class="course-rating">
            <h3><?php esc_html_e( 'Reviews', 'coaching' ); ?></h3>

            <div class="average-rating" itemprop="aggregateRating" itemscope=""
                 itemtype="http://schema.org/AggregateRating">
                <p class="rating-title"><?php esc_html_e( 'Average Rating', 'coaching' ); ?></p>

                <div class="rating-box">
                    <div class="average-value"
                         itemprop="ratingValue"><?php echo ( $course_rate ) ? esc_html( round( $course_rate, 1 ) ) : 0; ?></div>
                    <div class="review-star">
						<?php thim_print_rating( $course_rate ); ?>
                    </div>
                    <div class="review-amount" itemprop="ratingCount">
						<?php $total ? printf( _n( '%1$s rating', '%1$s ratings', $total, 'coaching' ), number_format_i18n( $total ) ) : esc_html_e( '0 rating', 'coaching' ); ?>
                    </div>
                </div>
            </div>
            <div class="detailed-rating">
                <p class="rating-title"><?php esc_html_e( 'Detailed Rating', 'coaching' ); ?></p>

                <div class="rating-box">
					<?php thim_detailed_rating( $course_id, $total ); ?>
                </div>
            </div>
        </div>

        <div class="course-review">
            <div id="course-reviews" class="content-review">
                <ul class="course-reviews-list">
					<?php foreach ( $reviews as $review ) : ?>
                        <li>
                            <div class="review-container" itemprop="review" itemscope
                                 itemtype="http://schema.org/Review">
                                <div class="review-author">
									<?php echo get_avatar( $review->ID, 70 ); ?>
                                </div>
                                <div class="review-text">
                                    <h4 class="author-name"
                                        itemprop="author"><?php echo esc_html( $review->display_name ); ?></h4>

                                    <div class="review-star">
										<?php thim_print_rating( $review->rate ); ?>
                                    </div>
                                    <p class="review-title"><?php echo esc_html( $review->title ); ?></p>

                                    <div class="description" itemprop="reviewBody">
                                        <p><?php echo esc_html( $review->content ); ?></p>
                                    </div>
                                </div>
                            </div>
                        </li>
					<?php endforeach; ?>
                </ul>
            </div>
        </div>
		<?php if ( empty( $course_review['finish'] ) && $total ) : ?>
            <div class="review-load-more">
                <span id="course-review-load-more" data-paged="<?php echo esc_attr( $course_review['paged'] ); ?>"><i
                            class="fa fa-angle-double-down"></i></span>
            </div>
		<?php endif; ?>
		<?php thim_review_button( $course_id ); ?>
		<?php
	}
}

/**
 * Display review button
 *
 * @param $course_id
 */
if ( ! function_exists( 'thim_review_button' ) ) {
	function thim_review_button( $course_id ) {
		if ( ! thim_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) || ! thim_is_version_addons_review( '3' ) ) {
			return;
		}

		if ( ! get_current_user_id() ) {
			return;
		}
		if ( LP()->user->has( 'enrolled-course', $course_id ) || get_post_meta( $course_id, '_lp_required_enroll', true ) == 'no' ) {
			if ( ! learn_press_get_user_rate( $course_id ) ) {
				?>
                <div class="add-review">
                    <h3 class="title"><?php esc_html_e( 'Leave A Review', 'coaching' ); ?></h3>

                    <p class="description"><?php esc_html_e( 'Please provide as much detail as you can to justify your rating and to help others.', 'coaching' ); ?></p>
					<?php do_action( 'learn_press_before_review_fields' ); ?>
                    <form method="post">
                        <div>
                            <label for="review-title"><?php esc_html_e( 'Title', 'coaching' ); ?>
                                <span class="required">*</span></label>
                            <input required type="text" id="review-title" name="review-course-title"/>
                        </div>
                        <div>

                            <label><?php esc_html_e( 'Rating', 'coaching' ); ?>
                                <span class="required">*</span></label>

                            <div class="review-stars-rated">
                                <ul class="review-stars">
                                    <li><span class="fa fa-star-o"></span></li>
                                    <li><span class="fa fa-star-o"></span></li>
                                    <li><span class="fa fa-star-o"></span></li>
                                    <li><span class="fa fa-star-o"></span></li>
                                    <li><span class="fa fa-star-o"></span></li>
                                </ul>
                                <ul class="review-stars filled" style="width: 100%">
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                    <li><span class="fa fa-star"></span></li>
                                </ul>
                            </div>
                        </div>
                        <div>
                            <label for="review-content"><?php esc_html_e( 'Comment', 'coaching' ); ?>
                                <span class="required">*</span></label>
                            <textarea required id="review-content" name="review-course-content"></textarea>
                        </div>
                        <input type="hidden" id="review-course-value" name="review-course-value" value="5"/>
                        <input type="hidden" id="comment_post_ID" name="comment_post_ID"
                               value="<?php echo get_the_ID(); ?>"/>
                        <button type="submit"><?php esc_html_e( 'Submit Review', 'coaching' ); ?></button>
                    </form>
					<?php do_action( 'learn_press_after_review_fields' ); ?>
                </div>
				<?php
			}
		}
	}
}

/**
 * Process review
 */
if ( ! function_exists( 'thim_process_review' ) ) {
	function thim_process_review() {

		if ( ! thim_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) || ! thim_is_version_addons_review( '3' ) ) {
			return;
		}

		$user_id     = get_current_user_id();
		$course_id   = isset ( $_POST['comment_post_ID'] ) ? $_POST['comment_post_ID'] : 0;
		$user_review = learn_press_get_user_rate( $course_id, $user_id );
		if ( ! $user_review && $course_id ) {
			$review_title   = isset ( $_POST['review-course-title'] ) ? $_POST['review-course-title'] : 0;
			$review_content = isset ( $_POST['review-course-content'] ) ? $_POST['review-course-content'] : 0;
			$review_rate    = isset ( $_POST['review-course-value'] ) ? $_POST['review-course-value'] : 0;
			learn_press_add_course_review( array(
				'title'     => $review_title,
				'content'   => $review_content,
				'rate'      => $review_rate,
				'user_id'   => $user_id,
				'course_id' => $course_id
			) );
		}
	}
}
add_action( 'learn_press_before_main_content', 'thim_process_review' );


/**
 * @param LP_Quiz|LP_Lesson $item
 */
if ( ! function_exists( 'thim_item_meta_duration' ) ) {
	function thim_item_meta_duration( $item ) {
		$duration = $item->get_duration();

		if ( is_a( $duration, 'LP_Duration' ) && $duration->get() ) {
			$format = array(
				'day'    => _x( '%s day', 'duration', 'coaching' ),
				'hour'   => _x( '%s hour', 'duration', 'coaching' ),
				'minute' => _x( '%s min', 'duration', 'coaching' ),
				'second' => _x( '%s sec', 'duration', 'coaching' ),
			);
			echo '<span class="meta duration">' . $duration->to_timer( $format, true ) . '</span>';
		} elseif ( is_string( $duration ) && strlen( $duration ) ) {
			echo '<span class="meta duration">' . $duration . '</span>';
		}
	}
}
add_action( 'learn-press/course-section-item/before-lp_lesson-meta', 'thim_item_meta_duration', 5 );

/**
 * @param LP_Quiz|LP_Lesson $item
 */
function thim_item_quiz_meta_duration( $item ) {
	$duration = $item->get_duration();

	if ( is_a( $duration, 'LP_Duration' ) && $duration->get() ) {
		$format = array(
			'day'    => _x( '%s day', 'duration', 'coaching' ),
			'hour'   => _x( '%s hour', 'duration', 'coaching' ),
			'minute' => _x( '%s min', 'duration', 'coaching' ),
			'second' => _x( '%s sec', 'duration', 'coaching' ),
		);
		echo '<span class="meta duration">' . $duration->to_timer( $format, true ) . '</span>';
	} elseif ( is_string( $duration ) && strlen( $duration ) ) {
		echo '<span class="meta duration">' . $duration . '</span>';
	}
}

//add_action( 'learn-press/course-section-item/before-lp_quiz-meta', 'thim_item_quiz_meta_duration', 10 );

/**
 * @param LP_Quiz $item
 */
function thim_item_quiz_meta_questions( $item ) {
	$count = $item->count_questions();
	echo '<span class="meta count-questions">' . sprintf( $count ? _n( '%d question', '%d questions', 'coaching' ) : __( '%d question', 'coaching' ), $count ) . '</span>';
}

add_action( 'learn-press/course-section-item/before-lp_quiz-meta', 'thim_item_quiz_meta_questions', 5 );

/**
 * Add class course item
 */
if ( ! function_exists( 'thim_add_class_course_item' ) ) {
	function thim_add_class_course_item( $defaults, $item_type, $item_id, $course_id ) {
		$item_type  = str_replace( 'lp_', '', $item_type );
		$defaults[] = 'course-' . $item_type;

		return $defaults;
	}
}
add_filter( 'learn-press/course-item-class', 'thim_add_class_course_item', 1000, 4 );

/**
 * Create ajax handle for courses searching
 */
if ( ! function_exists( 'thim_courses_searching_callback' ) ) {
	function thim_courses_searching_callback() {
		ob_start();
		$keyword = $_REQUEST['keyword'];
		if ( $keyword ) {
			$keyword   = strtoupper( $keyword );
			$arr_query = array(
				'post_type'           => 'lp_course',
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
				's'                   => $keyword,
				'posts_per_page'      => '-1'
			);

			$search = new WP_Query( $arr_query );

			$newdata = array();
			foreach ( $search->posts as $post ) {
				$newdata[] = array(
					'id'    => $post->ID,
					'title' => $post->post_title,
					'guid'  => get_permalink( $post->ID ),
				);
			}

			ob_end_clean();
			if ( count( $search->posts ) ) {
				echo json_encode( $newdata );
			} else {
				$newdata[] = array(
					'id'    => '',
					'title' => '<i>' . esc_html__( 'No course found', 'coaching' ) . '</i>',
					'guid'  => '#',
				);
				echo json_encode( $newdata );
			}
			wp_reset_postdata();
		}
		die();
	}
}

add_action( 'wp_ajax_nopriv_courses_searching', 'thim_courses_searching_callback' );
add_action( 'wp_ajax_courses_searching', 'thim_courses_searching_callback' );

/*
 * Before Curiculumn on item page
 */
if ( ! function_exists( 'thim_before_curiculumn_item_func' ) ) {
	function thim_before_curiculumn_item_func() {
		$args = array();
		$args = wp_parse_args( $args, apply_filters( 'learn_press_breadcrumb_defaults', array(
			'delimiter'   => '<i class="fa-angle-right fa"></i>',
			'wrap_before' => '<nav class="thim-font-heading learn-press-breadcrumb" ' . ( is_single() ? 'itemprop="breadcrumb"' : '' ) . '>',
			'wrap_after'  => '</nav>',
			'before'      => '',
			'after'       => '',
		) ) );

		$breadcrumbs = new LP_Breadcrumb();


		$args['breadcrumb'] = $breadcrumbs->generate();

		learn_press_get_template( 'global/breadcrumb.php', $args );
	}
}
//add_action( 'thim_before_curiculumn_item', 'thim_before_curiculumn_item_func' );

/**
 * Filter profile title
 *
 * @param $tab_title
 * @param $key
 *
 * @return string
 */
function thim_tab_profile_filter_title( $tab_title, $key ) {
	switch ( $key ) {
		case 'courses':
			$tab_title = '<i class="fa fa-book"></i><span class="text">' . esc_html__( 'Courses', 'coaching' ) . '</span>';
			break;
		case 'quizzes':
			$tab_title = '<i class="fa fa-check-square-o"></i><span class="text">' . esc_html__( 'Quiz Results', 'coaching' ) . '</span>';
			break;
		case 'orders':
			$tab_title = '<i class="fa fa-shopping-cart"></i><span class="text">' . esc_html__( 'Orders', 'coaching' ) . '</span>';
			break;
		case 'wishlist':
			$tab_title = '<i class="fa fa-heart-o"></i><span class="text">' . esc_html__( 'Wishlist', 'coaching' ) . '</span>';
			break;
		case 'instructor':
			$tab_title = '<i class="fa fa-user-circle-o"></i><span class="text">' . esc_html__( 'Instructor', 'coaching' ) . '</span>';
			break;
		case 'gradebook':
			$tab_title = '<i class="fa fa-book"></i><span class="text">' . esc_html__( 'Gradebook', 'coaching' ) . '</span>';
			break;
		case 'settings':
			$tab_title = '<i class="fa fa-cog"></i><span class="text">' . esc_html__( 'Settings', 'coaching' ) . '</span>';
			break;
		case 'certificates':
			$tab_title = '<i class="fa fa-bookmark-o"></i><span class="text">' . esc_html__( 'Certificates', 'coaching' ) . '</span>';
			break;
		case 'edit':
			$tab_title = '<i class="fa fa-user"></i><span class="text">' . esc_html__( 'Account', 'coaching' ) . '</span>';
			break;
	}

	return $tab_title;
}

add_filter( 'learn_press_profile_edit_tab_title', 'thim_tab_profile_filter_title', 100, 2 );
add_filter( 'learn_press_profile_courses_tab_title', 'thim_tab_profile_filter_title', 100, 2 );
add_filter( 'learn_press_profile_quizzes_tab_title', 'thim_tab_profile_filter_title', 100, 2 );
add_filter( 'learn_press_profile_orders_tab_title', 'thim_tab_profile_filter_title', 100, 2 );
add_filter( 'learn_press_profile_wishlist_tab_title', 'thim_tab_profile_filter_title', 100, 2 );
add_filter( 'learn_press_profile_gradebook_tab_title', 'thim_tab_profile_filter_title', 100, 2 );
add_filter( 'learn_press_profile_settings_tab_title', 'thim_tab_profile_filter_title', 100, 2 );
add_filter( 'learn_press_profile_certificates_tab_title', 'thim_tab_profile_filter_title', 100, 2 );

/**
 * Change tabs profile
 */
if ( ! function_exists( 'thim_change_tabs_course_profile' ) ) {
	function thim_change_tabs_course_profile( $defaults ) {
		unset( $defaults['dashboard'] );
		$defaults['courses']['priority']       = 2;
		$defaults['orders']['priority']        = 3;
		$defaults['order-details']['priority'] = 4;
		$defaults['settings']['priority']      = 1;

		return $defaults;
	}
}
add_filter( 'learn-press/profile-tabs', 'thim_change_tabs_course_profile', 1000 );

if ( ! function_exists( 'show_pass_text' ) ) {
	function show_pass_text() {
		$user   = learn_press_get_current_user();
		$course = LP()->global['course'];
		$grade  = $user->get_course_grade( $course->get_id() );
		if ( $grade == 'passed' ) {
			echo '<div class="message message-success learn-press-success">' . ( __( 'You have finished this course.', 'coaching' ) ) . '</div>';
		}
	}
}
add_action( 'thim_begin_curriculum_button', 'show_pass_text', 5 );

if ( ! function_exists( 'thim_checkout_link_login_register' ) ) {
	function thim_checkout_link_login_register() {
		if ( is_user_logged_in() ) {
			return;
		}
		$redirect      = ( ! empty( $_SERVER['HTTPS'] ) ? "https" : "http" ) . '://' . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
		$link_login    = thim_get_login_page_url() . '?redirect_to=' . esc_attr( $redirect );
		$link_register = thim_get_register_url() . '&redirect_to=' . esc_attr( $redirect );
		if ( LP()->checkout()->is_enable_login() || LP()->checkout()->is_enable_register() ) {
			echo '<div class="message message-notice">';
			if ( LP()->checkout()->is_enable_login() ) {
				echo 'You can <a href="' . esc_attr( $link_login ) . '">' . __( 'login', 'coaching' ) . '</a> now.';
			}
			if ( LP()->checkout()->is_enable_register() ) {
				echo 'Don\'t have an account? Click <a href="' . esc_attr( $link_register ) . '">' . __( 'register now', 'coaching' ) . '</a>';
			}
			echo '</div>';
		}
	}
}
add_action( 'learn-press/before-checkout-form', 'thim_checkout_link_login_register', 5 );


/**
 * @param $user
 */
if ( ! function_exists( 'thim_extra_user_profile_fields' ) ) {
	function thim_extra_user_profile_fields( $user ) {
		$user_info = get_the_author_meta( 'lp_info', $user->ID );
		?>
        <h3><?php esc_html_e( 'LearnPress Profile', 'coaching' ); ?></h3>

        <table class="form-table">
            <tbody>
            <tr>
                <th>
                    <label for="lp_major"><?php esc_html_e( 'Major', 'coaching' ); ?></label>
                </th>
                <td>
                    <input id="lp_major" class="regular-text" type="text"
                           value="<?php echo isset( $user_info['major'] ) ? $user_info['major'] : ''; ?>"
                           name="lp_info[major]">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="lp_facebook"><?php esc_html_e( 'Facebook Account', 'coaching' ); ?></label>
                </th>
                <td>
                    <input id="lp_facebook" class="regular-text" type="text"
                           value="<?php echo isset( $user_info['facebook'] ) ? $user_info['facebook'] : ''; ?>"
                           name="lp_info[facebook]">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="lp_twitter"><?php esc_html_e( 'Twitter Account', 'coaching' ); ?></label>
                </th>
                <td>
                    <input id="lp_twitter" class="regular-text" type="text"
                           value="<?php echo isset( $user_info['twitter'] ) ? $user_info['twitter'] : ''; ?>"
                           name="lp_info[twitter]">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="lp_google"><?php esc_html_e( 'Google Plus Account', 'coaching' ); ?></label>
                </th>
                <td>
                    <input id="lp_google" class="regular-text" type="text"
                           value="<?php echo isset( $user_info['google'] ) ? $user_info['google'] : ''; ?>"
                           name="lp_info[google]">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="lp_linkedin"><?php esc_html_e( 'LinkedIn Plus Account', 'coaching' ); ?></label>
                </th>
                <td>
                    <input id="lp_linkedin" class="regular-text" type="text"
                           value="<?php echo isset( $user_info['linkedin'] ) ? $user_info['linkedin'] : ''; ?>"
                           name="lp_info[linkedin]">
                </td>
            </tr>
            <tr>
                <th>
                    <label for="lp_youtube"><?php esc_html_e( 'Youtube Account', 'coaching' ); ?></label>
                </th>
                <td>
                    <input id="lp_youtube" class="regular-text" type="text"
                           value="<?php echo isset( $user_info['youtube'] ) ? $user_info['youtube'] : ''; ?>"
                           name="lp_info[youtube]">
                </td>
            </tr>
            </tbody>
        </table>
		<?php
	}
}

add_action( 'show_user_profile', 'thim_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'thim_extra_user_profile_fields' );

function thim_save_extra_user_profile_fields( $user_id ) {

	if ( ! current_user_can( 'edit_user', $user_id ) ) {
		return false;
	}

	update_user_meta( $user_id, 'lp_info', $_POST['lp_info'] );
}

add_action( 'personal_options_update', 'thim_save_extra_user_profile_fields' );
add_action( 'edit_user_profile_update', 'thim_save_extra_user_profile_fields' );


