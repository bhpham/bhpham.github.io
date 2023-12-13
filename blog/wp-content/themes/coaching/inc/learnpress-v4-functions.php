<?php
/**
 * Custom functions for LearnPress 4.x
 *
 * @package thim
 */
add_filter( 'learn-press/override-templates', '__return_true' );

if ( ! function_exists( 'thim_remove_learnpress_hooks' ) ) {
	function thim_remove_learnpress_hooks() {
		
		add_action( 'thim_single_course_payment', LP()->template( 'course' )->func('course_pricing'), 5 );
		add_action( 'thim_single_course_payment', LP()->template( 'course' )->func( 'course_external_button' ), 10 );
		add_action( 'thim_single_course_payment', LP()->template( 'course' )->func( 'course_purchase_button' ), 15 );
		add_action( 'thim_single_course_payment', LP()->template( 'course' )->func( 'course_enroll_button' ), 20 );
		add_action( 'thim_single_course_meta', LP()->template( 'course' )->callback( 'single-course/instructor' ), 5 );
		add_action( 'thim_single_course_meta', LP()->template( 'course' )->callback( 'single-course/meta/category' ), 15 );
		add_action( 'thim_single_course_meta', 'thim_course_forum_link', 20 );
		add_action( 'thim_single_course_meta', 'thim_course_ratings', 25 );
		add_action( 'thim_single_course_meta', LP()->template( 'course' )->func('user_progress'), 30 );

		add_action( 'init', function () {
			if ( thim_plugin_active( 'learnpress-wishlist/learnpress-wishlist.php' ) && class_exists( 'LP_Addon_Wishlist' ) && is_user_logged_in() && thim_is_version_addons_wishlist( '3' ) ) {
				$instance_addon = LP_Addon_Wishlist::instance();
				remove_action( 'learn-press/after-course-buttons', array( $instance_addon, 'wishlist_button' ), 100 );
				add_action( 'thim_inner_thumbnail_course', array( $instance_addon, 'wishlist_button' ), 10 );
			}
		}, 99 );

		// remove_action( 'learn-press/single-item-summary', LP()->template( 'course' )->func( 'popup_header' ), 10 );
		// remove_action( 'learn-press/single-item-summary', LP()->template( 'course' )->func( 'popup_sidebar' ), 20 );
		// remove_action( 'learn-press/single-item-summary', LP()->template( 'course' )->func( 'popup_content' ), 30 );
		// remove_action( 'learn-press/single-item-summary', LP()->template( 'course' )->func( 'popup_footer' ), 40 );
		// add_action('learn-press/course-item-content-header', LP()->template( 'course' )->func( 'popup_header' ), 5);

		// add_action( 'learn-press/single-item-summary', LP()->template( 'course' )->callback( 'single-course/tabs/curriculum.php' ), 5 );
		// add_action( 'learn-press/single-item-summary', LP()->template( 'course' )->callback( 'single-course/content-item.php' ), 10 );

		/**
		*   Profile
		*/
		remove_action('learn-press/after-checkout-form',LP()->template( 'checkout' )->func( 'account_logged_in' ),20);
		remove_action( 'learn-press/after-checkout-form', LP()->template( 'checkout' )->func( 'order_comment' ), 60 );
		add_action('learn-press/before-checkout-form',LP()->template( 'checkout' )->func( 'account_logged_in' ),9);
		add_action('learn-press/before-checkout-form',LP()->template( 'checkout' )->func( 'order_comment' ),11);
		remove_action( 'learn-press/before-user-profile', LP()->template( 'profile' )->func( 'header' ), 10 );
		remove_action( 'learn-press/profile/before-dashboard', LP()->template( 'profile' )->func( 'dashboard_statistic' ), 10 );
		remove_action( 'learn-press/profile/dashboard-summary', LP()->template( 'profile' )->func( 'dashboard_featured_courses' ), 20 );

		/**
		* @see LP_Template_Course::popup_footer_nav()
		*/
		// remove_action( 'learn-press/popup-footer', LP()->template( 'course' )->func( 'popup_footer_nav' ), 10 );
		// add_action( 'learn-press/after-course-item-content', LP()->template( 'course' )->func( 'popup_footer_nav' ), 5 );
		// add_action( 'learn-press/after-course-item-content', 'learn_press_lesson_comment_form', 10 );

		// remove action for page profile - tuanta
		// remove html in begin loop and end loop
		add_filter(
			'learn_press_course_loop_begin', function () {
			return '';
		}
		);
		add_filter(
			'learn_press_course_loop_end', function () {
			return '';
		}
		);
	}
}

add_action( 'after_setup_theme', 'thim_remove_learnpress_hooks', 15 );

add_filter( 'lp_item_course_class',  'thim_item_course_class_custom');
function thim_item_course_class_custom($class){
	$class[] = 'thim-course-grid';
  	return $class;
}

/**
 * Remove Archive Course
 */
remove_action('learn-press/before-courses-loop' , LP()->template( 'course' )->func( 'courses_top_bar' ));
remove_action( 'learn-press/before-main-content', LP()->template( 'general' )->func( 'breadcrumb' ) );

/**
 * Remove Single Course
 */
remove_all_actions( 'learn-press/course-content-summary', 10 );
remove_all_actions( 'learn-press/course-content-summary', 15 );
remove_all_actions( 'learn-press/course-content-summary', 85 );

add_action('widget-grid-middle-content', LP()->template( 'course' )->callback( 'single-course/instructor' ), 5);
add_action('widget-grid-middle-content', LP()->template( 'course' )->callback( 'loop/course/students' ), 10);

function coaching_add_video_lesson() {
	lp_meta_box_textarea_field(
			array(
				'id'          => '_lp_lesson_video_intro',
				'label'       => esc_html__( 'Media intro', 'learnpress' ),
				// 'description' => esc_html__( 'A good review to promote the course.', 'learnpress' ),
				// 'placeholder' => esc_html__( 'e.g. This course is so great and helpful. Thank you the best teacher to explain and show us what LearnPress LMS is all about.', 'learnpress' ),
				'default'     => '',
			)
		);
}
add_action( 'learnpress/lesson-settings/after', 'coaching_add_video_lesson' );

add_action( 'learnpress_save_lp_lesson_metabox', function( $post_id ) {
	$video = ! empty( $_POST['_lp_lesson_video_intro'] ) ? $_POST['_lp_lesson_video_intro'] : '';

	update_post_meta( $post_id, '_lp_lesson_video_intro', $video );
} );

// add cusom field for course
function coaching_add_custom_field_course() {
	lp_meta_box_text_input_field(
		array(
			'id'          => 'thim_course_duration',
			'label'       => esc_html__( 'Duration Info', 'coaching' ),
			'description' => esc_html__( 'Display duration info', 'coaching' ),
			'default'     => esc_html__( '50 hours', 'coaching' )
		)
	);
	lp_meta_box_text_input_field(
		array(
			'id'          => 'thim_course_language',
			'label'       => esc_html__( 'Languages', 'coaching' ),
			'description' => esc_html__( 'Language\'s used for studying', 'coaching' ),
			'default'     => esc_html__( 'English', 'coaching' )
		)
	);

	lp_meta_box_textarea_field(
		array(
			'id'          => 'thim_course_media_intro',
			'label'       => esc_html__( 'Media Intro', 'coaching' ),
			'description' => esc_html__( 'Enter media intro', 'coaching' ),
			'default'     => '',
		)
	);
}

add_action( 'learnpress/course-settings/after-general', 'coaching_add_custom_field_course' );

add_action('learnpress_save_lp_course_metabox', function ( $post_id ) {
	$video         = ! empty( $_POST['thim_course_media_intro'] ) ? $_POST['thim_course_media_intro'] : '';
	$language      = ! empty( $_POST['thim_course_language'] ) ? $_POST['thim_course_language'] : '';
	$duration_info = ! empty( $_POST['thim_course_duration'] ) ? $_POST['thim_course_duration'] : '';

	update_post_meta( $post_id, 'thim_course_media_intro', $video );
	update_post_meta( $post_id, 'thim_course_language', $language );
	update_post_meta( $post_id, 'thim_course_duration', $duration_info );
}
);


/**
 * @param Remaining time
 */
function thim_get_remaining_time() {
	$user = LP_Global::user();
	$course = LP_Global::course();

	if ( ! $course ) {
		return false;
	}

	if ( ! $user ) {
		return false;
	}

	$remaining_time = $user->get_course_remaining_time( $course->get_id() );

	if ( false === $remaining_time ) {
		return false;
	}

	$time = '';
	$time .= '<div class="course-remaining-time message message-warning learn-press-message">';
	$time .= '<p>';
	$time .= sprintf( __( 'You have %s remaining for the course', 'coaching' ), $remaining_time );
	$time .= '</p>';
	$time .= '</div>';
	echo $time;
}

add_action( 'thim_begin_curriculum_button', 'thim_get_remaining_time', 5 );

LP()->template( 'course' )->remove( 'learn-press/single-course-summary', array( 'single-course/content', array() ), 10  );
function single_course_content(){
	?>
	<div id="course-landing" class="course-content course-summary-content">
		<?php do_action( 'learn-press/course-content-summary' ); ?>

		<?php thim_landing_tabs(); ?>
	</div>
	<?php
}
add_action('learn-press/single-course-summary', 'single_course_content', 10 );
