<?php
/**
 * Custom functions for LearnPress
 *
 * @package thim
 */

/**
 * Display course ratings
 */
if ( ! function_exists( 'thim_course_ratings' ) ) {
	function thim_course_ratings() {

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
				<?php thim_print_rating( $course_rate ); ?>
            </div>
        </div>
		<?php
	}
}

if ( ! function_exists( 'thim_print_rating' ) ) {
	function thim_print_rating( $rate ) {
		if ( ! thim_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) || ! thim_is_version_addons_review( '3' ) ) {
			return;
		}

		?>
        <div class="review-stars-rated">
            <ul class="review-stars">
                <li><span class="fa fa-star-o"></span></li>
                <li><span class="fa fa-star-o"></span></li>
                <li><span class="fa fa-star-o"></span></li>
                <li><span class="fa fa-star-o"></span></li>
                <li><span class="fa fa-star-o"></span></li>
            </ul>
            <ul class="review-stars filled"
                style="<?php echo esc_attr( 'width: calc(' . ( $rate * 20 ) . '% - 2px)' ) ?>">
                <li><span class="fa fa-star"></span></li>
                <li><span class="fa fa-star"></span></li>
                <li><span class="fa fa-star"></span></li>
                <li><span class="fa fa-star"></span></li>
                <li><span class="fa fa-star"></span></li>
            </ul>
        </div>
		<?php

	}
}

/**
 * Display ratings count
 */

if ( ! function_exists( 'thim_course_ratings_count' ) ) {
	function thim_course_ratings_count( $course_id = null ) {
		if ( ! thim_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) || ! thim_is_version_addons_wishlist( '3' ) ) {
			return;
		}
		if ( ! $course_id ) {
			$course_id = get_the_ID();
		}
		$ratings = learn_press_get_course_rate_total( $course_id ) ? learn_press_get_course_rate_total( $course_id ) : 0;
		echo '<div class="course-comments-count">';
		echo '<div class="value"><i class="fa fa-comment"></i>';
		echo esc_html( $ratings );
		echo '</div>';
		echo '</div>';
	}
}

if ( ! function_exists( 'thim_course_wishlist_button' ) ) {
	function thim_course_wishlist_button( $course_id = null ) {
		if ( ! thim_plugin_active( 'learnpress-wishlist/learnpress-wishlist.php' ) || ! thim_is_version_addons_wishlist( '3' ) ) {
			return;
		}
		LP_Addon_Wishlist::instance()->wishlist_button( $course_id );

	}
}

/**
 * Breadcrumb for LearnPress
 */
if ( ! function_exists( 'thim_learnpress_breadcrumb' ) ) {
	function thim_learnpress_breadcrumb() {

		// Do not display on the homepage
		if ( is_front_page() || is_404() ) {
			return;
		}

		// Get the query & post information
		global $post;

		// Build the breadcrums
		echo '<ul itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs" class="breadcrumbs">';

		// Home page
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_html( get_home_url() ) . '" title="' . esc_attr__( 'Home', 'coaching' ) . '"><span itemprop="name">' . esc_html__( 'Home', 'coaching' ) . '</span></a><meta itemprop="position" content="1"></li>';

		if ( is_single() ) {

			$categories = get_the_terms( $post, 'course_category' );

			if ( get_post_type() == 'lp_course' ) {
				// All courses
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_post_type_archive_link( 'lp_course' ) ) . '" title="' . esc_attr__( 'All courses', 'coaching' ) . '"><span itemprop="name">' . esc_html__( 'All courses', 'coaching' ) . '</span></a><meta itemprop="position" content="2"></li>';
			} else {
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_permalink( get_post_meta( $post->ID, '_lp_course', true ) ) ) . '" title="' . esc_attr( get_the_title( get_post_meta( $post->ID, '_lp_course', true ) ) ) . '"><span itemprop="name">' . esc_html( get_the_title( get_post_meta( $post->ID, '_lp_course', true ) ) ) . '</span></a><meta itemprop="position" content="2"></li>';
			}

			// Single post (Only display the first category)
			if ( isset( $categories[0] ) ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_term_link( $categories[0] ) ) . '" title="' . esc_attr( $categories[0]->name ) . '"><span itemprop="name">' . esc_html( $categories[0]->name ) . '</span></a><meta itemprop="position" content="3"></li>';
			}
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_title() ) . '">' . esc_html( get_the_title() ) . '</span><meta itemprop="position" content="3"></li>';

		} else if ( learn_press_is_course_taxonomy() || learn_press_is_course_tag() ) {
			// All courses
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_post_type_archive_link( 'lp_course' ) ) . '" title="' . esc_attr__( 'All courses', 'coaching' ) . '"><span itemprop="name">' . esc_html__( 'All courses', 'coaching' ) . '</span></a><meta itemprop="position" content="2"></li>';

			// Category page
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( learn_press_single_term_title( '', false ) ) . '">' . esc_html( learn_press_single_term_title( '', false ) ) . '</span><meta itemprop="position" content="3"></li>';
		} else if ( ! empty( $_REQUEST['s'] ) && ! empty( $_REQUEST['ref'] ) && ( $_REQUEST['ref'] == 'course' ) ) {
			// All courses
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_post_type_archive_link( 'lp_course' ) ) . '" title="' . esc_attr__( 'All courses', 'coaching' ) . '"><span itemprop="name">' . esc_html__( 'All courses', 'coaching' ) . '</span></a><meta itemprop="position" content="2"></li>';

			// Search result
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( 'Search results for:', 'coaching' ) . ' ' . esc_attr( get_search_query() ) . '">' . esc_html__( 'Search results for:', 'coaching' ) . ' ' . esc_html( get_search_query() ) . '</span><meta itemprop="position" content="3"></li>';
		} else {
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( 'All courses', 'coaching' ) . '">' . esc_html__( 'All courses', 'coaching' ) . '</span><meta itemprop="position" content="2"></li>';
		}

		echo '</ul>';
	}
}

/**
 * Breadcrumb for Courses Collection
 */
if ( ! function_exists( 'thim_courses_collection_breadcrumb' ) ) {
	function thim_courses_collection_breadcrumb() {

		// Build the breadcrums
		echo '<ul itemprop="breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList" id="breadcrumbs" class="breadcrumbs">';

		// Home page
		echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_html( get_home_url() ) . '" title="' . esc_attr__( 'Home', 'coaching' ) . '"><span itemprop="name">' . esc_html__( 'Home', 'coaching' ) . '</span></a><meta itemprop="position" content="1"></li>';

		if ( is_single() ) {
			if ( get_post_type() == 'lp_collection' ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_post_type_archive_link( 'lp_collection' ) ) . '" title="' . esc_attr__( 'Collections', 'coaching' ) . '"><span itemprop="name">' . esc_html__( 'Collections', 'coaching' ) . '</span></a><meta itemprop="position" content="2"></li>';
			}
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_title() ) . '">' . esc_html( get_the_title() ) . '</span><meta itemprop="position" content="3"></li>';
		} else {
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name">' . esc_html__( 'Collections', 'coaching' ) . '</span><meta itemprop="position" content="2"></li>';
		}

		echo '</ul>';
	}
}

if ( ! function_exists( 'thim_learnpress_page_title' ) ) {
	function thim_learnpress_page_title( $echo = true ) {
		$title = '';
		if ( get_post_type() == 'lp_course' && ! is_404() && ! is_search() || learn_press_is_courses() || learn_press_is_course_taxonomy() ) {
			if ( learn_press_is_course_taxonomy() ) {
				$title = learn_press_single_term_title( '', false );
			} else {
				$title                = esc_html__( 'All Courses', 'coaching' );
				$using_custom_heading = get_post_meta( get_the_ID(), 'thim_mtb_using_custom_heading', true );
 				if ( $using_custom_heading ) {
					$thim_custom_heading = get_post_meta( get_the_ID(), 'thim_mtb_custom_title', true );
 					if ( $thim_custom_heading ) {
						$title = $thim_custom_heading;
					}
				}
			}
		}
		if ( get_post_type() == 'lp_quiz' && ! is_404() && ! is_search() ) {
			if ( is_tax() ) {
				$title = learn_press_single_term_title( '', false );
			} else {
				$title = esc_html__( 'Quiz', 'coaching' );
			}
		}
		if ( $echo ) {
			echo $title;
		} else {
			return $title;
		}
	}
}

/**
 * Display thumbnail course
 */

if ( ! function_exists( 'thim_courses_loop_item_thumbnail' ) ) {
	function thim_courses_loop_item_thumbnail( $course = null ) {
		$course = LP_Global::course();
		echo '<div class="course-thumbnail">';
		echo '<a class="thumb" href="' . esc_url( get_the_permalink( $course->get_id() ) ) . '" >';
		echo thim_get_feature_image( get_post_thumbnail_id( $course->get_id() ), 'full', apply_filters( 'thim_course_thumbnail_width', 450 ), apply_filters( 'thim_course_thumbnail_height', 450 ), $course->get_title() );
		echo '</a>';
		thim_course_wishlist_button( $course->get_id() );
		echo '<a class="course-readmore" href="' . esc_url( get_the_permalink( $course->get_id() ) ) . '">' . esc_html__( 'Read More', 'coaching' ) . '</a>';
		echo '</div>';
	}
}
add_action( 'thim_courses_loop_item_thumb', 'thim_courses_loop_item_thumbnail' );

/**
 * Display related courses
 */
if ( ! function_exists( 'thim_related_courses' ) ) {
	function thim_related_courses() {
		$related_courses    = thim_get_related_courses( 5 );
		$theme_options_data = get_theme_mods();
		wp_enqueue_script( 'owl-carousel' );
		if ( $related_courses ) {
			$layout_grid = get_theme_mod( 'thim_learnpress_cate_layout_grid', '' );
			$cls_layout  = ( $layout_grid != '' && $layout_grid != 'layout_courses_1' ) ? ' cls_courses_2' : ' ';
			?>
            <div class="thim-ralated-course <?php echo $cls_layout; ?>">

                <h3 class="related-title">
					<?php esc_html_e( 'You May Like', 'coaching' ); ?>
                </h3>

                <div class="thim-course-grid">
                    <div class="thim-carousel-wrapper" data-visible="3" data-itemtablet="2" data-itemmobile="1"
                         data-pagination="1">
						<?php foreach ( $related_courses as $course_item ) : ?>
							<?php
							$course      = learn_press_get_course( $course_item->ID );
							$is_required = $course->is_required_enroll();
							?>
                            <article class="lpr_course">
                                <div class="course-item">
                                    <div class="course-thumbnail">
                                        <a class="thumb" href="<?php echo get_the_permalink( $course_item->ID ); ?>">
											<?php
											if ( $layout_grid != '' && $layout_grid != 'layout_courses_1' ) {
												echo thim_get_feature_image( get_post_thumbnail_id( $course_item->ID ), 'full', 320, 220, get_the_title( $course_item->ID ) );
											} else {
												echo thim_get_feature_image( get_post_thumbnail_id( $course_item->ID ), 'full', 450, 450, get_the_title( $course_item->ID ) );
											}
											?>
                                        </a>
										<?php thim_course_wishlist_button( $course_item->ID ); ?>
										<?php echo '<a class="course-readmore" href="' . esc_url( get_the_permalink( $course_item->ID ) ) . '">' . esc_html__( 'Read More', 'coaching' ) . '</a>'; ?>
                                    </div>
                                    <div class="thim-course-content">
                                        <h2 class="course-title">
                                            <a href="<?php echo esc_url( get_the_permalink( $course_item->ID ) ); ?>"> <?php echo get_the_title( $course_item->ID ); ?></a>
                                        </h2>
                                        <div class="middle">
                                            <div class="course-author" itemscope itemtype="http://schema.org/Person">
												<?php echo get_avatar( get_the_author_meta( 'ID', $course_item->post_author ), 40 ); ?>
                                                <div class="author-contain">
                                                    <label itemprop="jobTitle"><?php esc_html_e( 'Teacher', 'coaching' ); ?></label>

                                                    <div class="value" itemprop="name">
                                                        <a href="<?php echo esc_url( learn_press_user_profile_link( $course_item->post_author ) ); ?>">
															<?php echo get_the_author_meta( 'display_name', $course_item->post_author ); ?>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
											<?php
											//$count = $course->count_users_enrolled( 'append' ) ? $course->count_users_enrolled( 'append' ) : 0;
											?>
                                            <div class="course-students">
                                                <label><?php esc_html_e( 'Students', 'coaching' ); ?></label>
												<?php do_action( 'learn_press_begin_course_students' ); ?>

                                                <div class="value"><i class="fa fa-group"></i>
													<?php //echo esc_html( $count ); ?>
                                                </div>
												<?php do_action( 'learn_press_end_course_students' ); ?>

                                            </div>
                                        </div>
                                        <div class="course-meta">
											<?php if ( thim_plugin_active( 'learnpress-course-review/learnpress-course-review.php' ) ) { ?>
                                                <div class="course-review">
													<?php
													$course_rate = learn_press_get_course_rate( $course_item->ID );
													thim_print_rating( $course_rate );
													?>
                                                </div>
											<?php } ?>

                                            <div class="course-price" itemprop="offers" itemscope
                                                 itemtype="http://schema.org/Offer">
												<?php if ( $course->is_free() || ! $is_required ) : ?>
                                                    <div class="value free-course" itemprop="price"
                                                         content="<?php esc_attr_e( 'Free', 'coaching' ); ?>">
														<?php esc_html_e( 'Free', 'coaching' ); ?>
                                                    </div>
												<?php else:
													//$price = learn_press_format_price( $course->get_price(), true );
													$price = $course->get_price_html();
													$origin_price = $course->get_origin_price_html();
													?>
                                                    <div class="value " itemprop="price"
                                                         content="<?php echo esc_attr( $price ); ?>">
														<?php
														echo esc_html( $price );
														if ( $price != $origin_price ) {
															echo '<span class="course-origin-price">' . $origin_price . '</span>';
														}

														?>
                                                    </div>
												<?php endif; ?>
                                                <meta itemprop="priceCurrency"
                                                      content="<?php echo learn_press_get_currency_symbol(); ?>"/>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
			<?php
		}
	}
}

if ( ! function_exists( 'thim_get_related_courses' ) ) {
	function thim_get_related_courses( $limit ) {
		if ( ! $limit ) {
			$limit = 3;
		}
		$course_id = get_the_ID();

		$tag_ids = array();
		$tags    = get_the_terms( $course_id, 'course_tag' );

		if ( $tags ) {
			foreach ( $tags as $individual_tag ) {
				$tag_ids[] = $individual_tag->slug;
			}
		}

		$args = array(
			'posts_per_page'      => $limit,
			'paged'               => 1,
			'ignore_sticky_posts' => 1,
			'post__not_in'        => array( $course_id ),
			'post_type'           => 'lp_course'
		);

		if ( $tag_ids ) {
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'course_tag',
					'field'    => 'slug',
					'terms'    => $tag_ids
				)
			);
		}
		$related = array();
		if ( $posts = new WP_Query( $args ) ) {
			global $post;
			while ( $posts->have_posts() ) {
				$posts->the_post();
				$related[] = $post;
			}
		}
		wp_reset_query();

		return $related;
	}
}

/**
 * Display the link to course forum
 */
if ( ! function_exists( 'thim_course_forum_link' ) ) {
	function thim_course_forum_link() {

		if ( thim_plugin_active( 'bbpress/bbpress.php' ) && thim_plugin_active( 'learnpress-bbpress/learnpress-bbpress.php' ) && thim_is_version_addons_bbpress( '3' ) ) {
			LP_Addon_bbPress::instance()->forum_link();
		}
	}
}

if ( ! function_exists( 'thim_landing_tabs' ) ) {
	function thim_landing_tabs() {
		learn_press_get_template( 'single-course/tabs/tabs-landing.php' );
	}
}

/**
 * Display course info
 */
if ( ! function_exists( 'thim_course_info' ) ) {
	function thim_course_info() {
		$course    = LP()->global['course'];
		$course_id = get_the_ID();

		$course_skill_level = get_post_meta( $course_id, 'thim_course_skill_level', true );
		$course_language    = get_post_meta( $course_id, 'thim_course_language', true );

		?>
        <div class="thim-course-info">
            <h3 class="title"><?php esc_html_e( 'Course Features', 'coaching' ); ?></h3>
            <ul>
                <li class="lectures-feature">
                    <i class="fa fa-files-o"></i>
                    <span class="label"><?php esc_html_e( 'Lectures', 'coaching' ); ?></span>
                    <span class="value"><?php echo $course->get_curriculum_items( 'lp_lesson' ) ? count( $course->get_curriculum_items( 'lp_lesson' ) ) : 0; ?></span>
                </li>
                <li class="quizzes-feature">
                    <i class="fa fa-puzzle-piece"></i>
                    <span class="label"><?php esc_html_e( 'Quizzes', 'coaching' ); ?></span>
                    <span class="value"><?php echo $course->get_curriculum_items( 'lp_quiz' ) ? count( $course->get_curriculum_items( 'lp_quiz' ) ) : 0; ?></span>
                </li>
				<?php if ( ! empty( $course_duration ) ): ?>
                    <li class="duration-feature">
                        <i class="fa fa-clock-o"></i>
                        <span class="label"><?php esc_html_e( 'Duration', 'coaching' ); ?></span>
                        <span class="value"><?php echo $course->get_duration(); ?></span>
                    </li>
				<?php endif; ?>
				<?php if ( ! empty( $course_skill_level ) ): ?>
                    <li class="skill-feature">
                        <i class="fa fa-level-up"></i>
                        <span class="label"><?php esc_html_e( 'Skill level', 'coaching' ); ?></span>
                        <span class="value"><?php echo esc_html( $course_skill_level ); ?></span>
                    </li>
				<?php endif; ?>
				<?php if ( ! empty( $course_language ) ): ?>
                    <li class="language-feature">
                        <i class="fa fa-language"></i>
                        <span class="label"><?php esc_html_e( 'Language', 'coaching' ); ?></span>
                        <span class="value"><?php echo esc_html( $course_language ); ?></span>
                    </li>
				<?php endif; ?>
                <li class="students-feature">
                    <i class="fa fa-users"></i>
                    <span class="label"><?php esc_html_e( 'Students', 'coaching' ); ?></span>
					<?php $user_count = $course->get_users_enrolled() ? $course->get_users_enrolled() : 0; ?>
                    <span class="value"><?php echo esc_html( $user_count ); ?></span>
                </li>
				<?php thim_course_certificate( $course_id ); ?>
                <li class="assessments-feature">
                    <i class="fa fa-check-square-o"></i>
                    <span class="label"><?php esc_html_e( 'Assessments', 'coaching' ); ?></span>
                    <span class="value"><?php echo ( get_post_meta( $course_id, '_lp_course_result', true ) == 'evaluate_lesson' ) ? esc_html__( 'Yes', 'coaching' ) : esc_html__( 'Self', 'coaching' ); ?></span>
                </li>
            </ul>
			<?php thim_course_wishlist_button(); ?>
        </div>
		<?php
	}
}

/**
 * Display feature certificate
 *
 * @param $course_id
 */
function thim_course_certificate( $course_id ) {

	if ( thim_plugin_active( 'learnpress-certificates/learnpress-certificates.php' ) && thim_is_version_addons_certificates( '3' ) ) {
		?>
        <li class="cert-feature">
            <i class="fa fa-rebel"></i>
            <span class="label"><?php esc_html_e( 'Certificate', 'coaching' ); ?></span>
            <span class="value"><?php echo ( get_post_meta( $course_id, '_lp_cert', true ) ) ? esc_html__( 'Yes', 'coaching' ) : esc_html__( 'No', 'coaching' ); ?></span>
        </li>
		<?php
	}
}

/**
 * Display co instructors
 *
 * @param $course_id
 */
if ( ! function_exists( 'thim_co_instructors' ) ) {
	function thim_co_instructors( $course_id, $author_id ) {
		if ( ! $course_id ) {
			return;
		}

		if ( thim_plugin_active( 'learnpress-co-instructor/learnpress-co-instructor.php' ) && thim_is_version_addons_instructor( '3' ) ) {
			$instructors = get_post_meta( $course_id, '_lp_co_teacher' );
			$instructors = array_diff( $instructors, array( $author_id ) );
			if ( $instructors ) {
				foreach ( $instructors as $instructor ) {
					//Check if instructor not exist
					$user = get_userdata( $instructor );
					if ( $user === false ) {
						break;
					}
					$lp_info = get_the_author_meta( 'lp_info', $instructor );
					$link    = learn_press_user_profile_link( $instructor );
					?>
                    <div class="thim-about-author thim-co-instructor" itemprop="contributor" itemscope
                         itemtype="http://schema.org/Person">
                        <div class="author-wrapper">
                            <div class="author-avatar">
								<?php echo get_avatar( $instructor, 110 ); ?>
                            </div>
                            <div class="author-bio">
                                <div class="author-top">
                                    <a itemprop="url" class="name" href="<?php echo esc_url( $link ); ?>">
                                        <span itemprop="name"><?php echo get_the_author_meta( 'display_name', $instructor ); ?></span>
                                    </a>
									<?php if ( isset( $lp_info['major'] ) && $lp_info['major'] ) : ?>
                                        <p class="job"
                                           itemprop="jobTitle"><?php echo esc_html( $lp_info['major'] ); ?></p>
									<?php endif; ?>
                                </div>
                                <ul class="thim-author-social">
									<?php if ( isset( $lp_info['facebook'] ) && $lp_info['facebook'] ) : ?>
                                        <li>
                                            <a href="<?php echo esc_url( $lp_info['facebook'] ); ?>" class="facebook"><i
                                                        class="fa fa-facebook"></i></a>
                                        </li>
									<?php endif; ?>

									<?php if ( isset( $lp_info['twitter'] ) && $lp_info['twitter'] ) : ?>
                                        <li>
                                            <a href="<?php echo esc_url( $lp_info['twitter'] ); ?>" class="twitter"><i
                                                        class="fa fa-twitter"></i></a>
                                        </li>
									<?php endif; ?>

									<?php if ( isset( $lp_info['google'] ) && $lp_info['google'] ) : ?>
                                        <li>
                                            <a href="<?php echo esc_url( $lp_info['google'] ); ?>"
                                               class="google-plus"><i class="fa fa-google-plus"></i></a>
                                        </li>
									<?php endif; ?>

									<?php if ( isset( $lp_info['linkedin'] ) && $lp_info['linkedin'] ) : ?>
                                        <li>
                                            <a href="<?php echo esc_url( $lp_info['linkedin'] ); ?>" class="linkedin"><i
                                                        class="fa fa-linkedin"></i></a>
                                        </li>
									<?php endif; ?>

									<?php if ( isset( $lp_info['youtube'] ) && $lp_info['youtube'] ) : ?>
                                        <li>
                                            <a href="<?php echo esc_url( $lp_info['youtube'] ); ?>" class="youtube"><i
                                                        class="fa fa-youtube"></i></a>
                                        </li>
									<?php endif; ?>
                                </ul>

                            </div>
                            <div class="author-description" itemprop="description">
								<?php echo get_the_author_meta( 'description', $instructor ); ?>
                            </div>
                        </div>
                    </div>
					<?php
				}
			}
		}
	}
}

/**
 * Add format icon before curriculum items
 *
 * @param $lesson_or_quiz
 * @param $enrolled
 */
if ( ! function_exists( 'thim_add_format_icon' ) ) {
	function thim_add_format_icon( $item ) {
		$format = get_post_format( $item->get_id() );
		if ( get_post_type( $item->get_id() ) == 'lp_quiz' ) {
			echo '<span class="course-format-icon"><i class="fa fa-puzzle-piece"></i></span>';
		} elseif ( $format == 'video' ) {
			echo '<span class="course-format-icon"><i class="fa fa-play-circle"></i></span>';
		} else {
			echo '<span class="course-format-icon"><i class="fa fa-file-o"></i></span>';
		}
	}
}

add_action( 'learn_press_before_section_item_title', 'thim_add_format_icon', 10, 1 );


/** 
 * Show thumbnail single course
 */
if ( ! function_exists( 'thim_course_thumbnail_item' ) ) {
	function thim_course_thumbnail_item() {
		learn_press_get_template( 'single-course/thumbnail.php' );
	}
}
add_action( 'learn-press/single-course-summary', 'thim_course_thumbnail_item', 2 );

/**
 * Display table detailed rating
 *
 * @param $course_id
 * @param $total
 */
if ( ! function_exists( 'thim_detailed_rating' ) ) {
	function thim_detailed_rating( $course_id, $total ) {
		global $wpdb;
		$query = $wpdb->get_results( $wpdb->prepare(
			"
		SELECT cm2.meta_value AS rating, COUNT(*) AS quantity FROM $wpdb->posts AS p
		INNER JOIN $wpdb->comments AS c ON p.ID = c.comment_post_ID
		INNER JOIN $wpdb->users AS u ON u.ID = c.user_id
		INNER JOIN $wpdb->commentmeta AS cm1 ON cm1.comment_id = c.comment_ID AND cm1.meta_key=%s
		INNER JOIN $wpdb->commentmeta AS cm2 ON cm2.comment_id = c.comment_ID AND cm2.meta_key=%s
		WHERE p.ID=%d AND c.comment_type=%s AND c.comment_approved=%s
		GROUP BY cm2.meta_value",
			'_lpr_review_title',
			'_lpr_rating',
			$course_id,
			'review',
			'1'
		), OBJECT_K
		);
		?>
        <div class="detailed-rating">
			<?php for ( $i = 5; $i >= 1; $i -- ) : ?>
                <div class="stars">
                    <div class="key"><?php ( $i === 1 ) ? printf( esc_html__( '%s star', 'coaching' ), $i ) : printf( esc_html__( '%s stars', 'coaching' ), $i ); ?></div>
                    <div class="bar">
                        <div class="full_bar">
                            <div style="<?php echo ( $total && ! empty( $query[ $i ]->quantity ) ) ? esc_attr( 'width: ' . ( $query[ $i ]->quantity / $total * 100 ) . '%' ) : 'width: 0%'; ?>"></div>
                        </div>
                    </div>
                    <div class="value"><?php echo empty( $query[ $i ]->quantity ) ? '0' : esc_html( $query[ $i ]->quantity ); ?></div>
                </div>
			<?php endfor; ?>
        </div>
		<?php
	}
}

/*
 * Add media for lesson
 */
if ( ! function_exists( 'thim_content_item_lesson_media' ) ) {
	function thim_content_item_lesson_media() {
		$item          = LP_Global::course_item();
		$user          = LP_Global::user();
		$course_item   = LP_Global::course_item();
		$course        = LP_Global::course();
		$can_view_item = $user->can_view_item( $course_item->get_id(), $course->get_id() );
		$media_intro   = get_post_meta( $item->get_id(), '_lp_lesson_video_intro', true );
		if ( ! empty( $media_intro ) && ! $course_item->is_blocked() && $can_view_item ) {
			?>
            <div class="learn-press-video-intro">
                <div class="video-content">
					<?php
					echo str_replace( array( "<iframe", "</iframe>" ), array(
						'<div class="responsive-iframe"><iframe',
						"</iframe></div>"
					), apply_filters( 'the_content', $media_intro ) );
					?>
                </div>
            </div>
			<?php
		}
	}
}
add_action( 'learn-press/before-course-item-content', 'thim_content_item_lesson_media', 5 );

if ( ! function_exists( 'thim_course_tabs_content' ) ) {
	function thim_course_tabs_content( $defaults ) {
		$arr    = array();
		$course = learn_press_get_course();
		$user   = learn_press_get_current_user();

		//active tab
		$request_tab = ! empty( $_REQUEST['tab'] ) ? $_REQUEST['tab'] : '';
		$has_active  = false;
		if ( $request_tab != '' ) {
			foreach ( $defaults as $k => $v ) {
				$v['id'] = ! empty( $v['id'] ) ? $v['id'] : 'tab-' . $k;

				if ( $request_tab === $v['id'] ) {
					$v['current'] = true;
					$has_active   = $k;
				}
				$defaults[ $k ] = $v;
			}
		} else {
			/**
			 * Active Curriculum tab if user has enrolled course
			 */
			if ( $course && $user->has_course_status( $course->get_id(), array(
					'enrolled',
					'finished'
				) ) && ! empty( $defaults['curriculum'] )
			) {
				$defaults['curriculum']['current'] = true;
				$has_active                        = 'curriculum';
			}
		}

		$theme_options_data = get_theme_mods();

		$group_tab = isset( $theme_options_data['group_tabs_course'] ) ? $theme_options_data['group_tabs_course'] : array(
			'description',
			'curriculum',
			'instructor',
			'students-list',
			'review'
		);
		if ( ! isset( $theme_options_data['default_tab_course'] ) && ! $has_active ) {
			$defaults['overview']['current'] = true;
		}

		foreach ( $defaults as $k => $v ) {
			switch ( $k ) {
				case 'overview':
					$v['icon']  = 'fa-bookmark';
					$new_prioty = array_keys( $group_tab, "description" );
					if ( $new_prioty ) {
						if ( isset( $theme_options_data['default_tab_course'] ) && $theme_options_data['default_tab_course'] == 'description' && ! $has_active ) {
							$v['current'] = true;
						}
						$v['priority'] = $new_prioty[0];
						$arr[ $k ]     = $v;
					}
					break;
				case 'curriculum':
					$v['icon']  = 'fa-cube';
					$new_prioty = array_keys( $group_tab, "curriculum" );
					if ( $new_prioty ) {
						if ( isset( $theme_options_data['default_tab_course'] ) && $theme_options_data['default_tab_course'] == 'curriculum' && ! $has_active ) {
							$v['current'] = true;
						}
						$v['priority'] = $new_prioty[0];
						$arr[ $k ]     = $v;
					}
					break;
				case 'instructor':
					$v['icon']  = 'fa-user';
					$new_prioty = array_keys( $group_tab, "instructor" );
					if ( $new_prioty ) {
						if ( isset( $theme_options_data['default_tab_course'] ) && $theme_options_data['default_tab_course'] == 'instructor' && ! $has_active ) {
							$v['current'] = true;
						}
						$v['priority'] = $new_prioty[0];
						$arr[ $k ]     = $v;
					}
					break;
				case 'students-list':
					$v['icon']  = 'fa-list';
					$new_prioty = array_keys( $group_tab, "students-list" );
					if ( $new_prioty ) {
						if ( isset( $theme_options_data['default_tab_course'] ) && $theme_options_data['default_tab_course'] == 'students-list' && ! $has_active ) {
							$v['current'] = true;
						}
						$v['priority'] = $new_prioty[0];
						$arr[ $k ]     = $v;
					}
					break;
				case 'reviews':
					$v['icon']  = 'fa-comments';
					$new_prioty = array_keys( $group_tab, "review" );
					if ( $new_prioty ) {
						if ( isset( $theme_options_data['default_tab_course'] ) && $theme_options_data['default_tab_course'] == 'review' && ! $has_active ) {
							$v['current'] = true;
						}
						$v['priority'] = $new_prioty[0];
						$arr[ $k ]     = $v;
					}
					break;
				default:
					$v['icon']     = 'fa-th-large lp-icon-' . $k;
					$new_prioty    = array_keys( $group_tab, $k );
 					$v['priority'] = $new_prioty ? $new_prioty[0] : '';
					if ( isset( $theme_options_data['default_tab_course'] ) && $theme_options_data['default_tab_course'] == $k && ! $has_active ) {
						$v['current'] = true;
					}
					$arr[ $k ] = $v;
					break;
			}
		}

		return $arr;
	}
}
add_filter( 'learn-press/course-tabs', 'thim_course_tabs_content', 9999 );



/*
 * Hide ads Learnpress
 */
if ( get_theme_mod( 'thim_learnpress_hidden_ads', false ) ) {
	remove_action( 'admin_footer', 'learn_press_footer_advertisement', - 10 );
}


/*
 * Hide LP collections excerpt
 */
if ( class_exists( 'LP_Addon_Collections' ) ) {
	remove_action( 'learn_press_collections_after_loop_item', 'learn_press_collections_after_loop_item', 5 );
}