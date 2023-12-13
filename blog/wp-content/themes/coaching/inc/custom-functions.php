<?php

/**
 * Animation
 *
 * @param $css_animation
 *
 * @return string
 */
if ( ! function_exists( 'thim_getCSSAnimation' ) ) {
	function thim_getCSSAnimation( $css_animation ) {
		$output = '';
		if ( $css_animation != '' ) {
			wp_enqueue_script( 'thim-waypoints' );
			$output = ' wpb_animate_when_almost_visible wpb_' . $css_animation;
		}

		return $output;
	}
}


/**
 * Custom excerpt
 *
 * @param $limit
 *
 * @return array|mixed|string|void
 */
function thim_excerpt( $limit ) {
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( " ", $excerpt ) . '...';
	} else {
		$excerpt = implode( " ", $excerpt );
	}
	$excerpt = preg_replace( '`\[[^\]]*\]`', '', $excerpt );
	$excerpt = strip_tags( $excerpt );

	return '<div class="thim-excerpt">' . $excerpt . '</div>';
}

/**
 * Display breadcrumbs
 */
if ( ! function_exists( 'thim_breadcrumbs' ) ) {
	function thim_breadcrumbs() {

		// Do not display on the homepage
		if ( is_front_page() || is_404() ) {
			return;
		}

		// Get the query & post information
		global $post;
		$categories = get_the_category();

		// Build the breadcrums
		echo '<ul itemscope itemtype="https://schema.org/BreadcrumbList" id="breadcrumbs" class="breadcrumbs">';


		// Home page
		echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( home_url( '/' ) ) . '" title="' . esc_attr__( 'Home', 'coaching' ) . '"><span itemprop="name">' . esc_html__( 'Home', 'coaching' ) . '</span></a><meta itemprop="position" content="1"></li>';

		if ( is_home() ) {
			echo '<li  itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_title() ) . '">' . esc_html__( 'Blog', 'coaching' ) . '</span><meta itemprop="position" content="2"></li>';
		}

		if ( is_single() ) {
			if ( get_post_type() == 'tp_event' ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_post_type_archive_link( 'tp_event' ) ) . '" title="' . esc_attr__( 'Events', 'coaching' ) . '"><span itemprop="name">' . esc_html__( 'Events', 'coaching' ) . '</span></a><meta itemprop="position" content="2"></li>';
			}
			if ( get_post_type() == 'testimonials' ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_post_type_archive_link( 'testimonials' ) ) . '" title="' . esc_attr__( 'Success Stories', 'coaching' ) . '"><span itemprop="name">' . esc_html__( 'Success Stories', 'coaching' ) . '</span></a><meta itemprop="position" content="2"></li>';
			}
			if ( get_post_type() == 'our_team' ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_post_type_archive_link( 'our_team' ) ) . '" title="' . esc_attr__( 'Our Team', 'coaching' ) . '"><span itemprop="name">' . esc_html__( 'Our Team', 'coaching' ) . '</span></a><meta itemprop="position" content="2"></li>';
			}
			// Single post (Only display the first category)
			if ( isset( $categories[0] ) ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '" title="' . esc_attr( $categories[0]->cat_name ) . '"><span itemprop="name">' . esc_html( $categories[0]->cat_name ) . '</span></a><meta itemprop="position" content="2"></li>';
			}
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_title() ) . '">' . esc_html( get_the_title() ) . '</span><meta itemprop="position" content="3"></li>';

		} else if ( is_category() ) {
			if ( isset( $categories[0] ) ) {
				// Category page
				echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name">' . esc_html( $categories[0]->cat_name ) . '</span><meta itemprop="position" content="2"></li>';
			}
		} else if ( is_page() ) {

			// Standard page
			if ( $post->post_parent ) {

				// If child page, get parents
				$anc = get_post_ancestors( $post->ID );

				// Get parents in the right order
				$anc = array_reverse( $anc );

				// Parent page loop
				foreach ( $anc as $ancestor ) {
					echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_permalink( $ancestor ) ) . '" title="' . esc_attr( get_the_title( $ancestor ) ) . '"><span itemprop="name">' . esc_html( get_the_title( $ancestor ) ) . '</span></a><meta itemprop="position" content="2"></li>';
				}
			}

			// Current page
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_title() ) . '"> ' . esc_html( get_the_title() ) . '</span><meta itemprop="position" content="2"></li>';


		} else if ( is_tag() ) {

			// Display the tag name
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( single_term_title( '', false ) ) . '">' . esc_html( single_term_title( '', false ) ) . '</span><meta itemprop="position" content="2"></li>';

		} elseif ( is_day() ) {

			// Day archive

			// Year link
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '" title="' . esc_attr( get_the_time( 'Y' ) ) . '"><span itemprop="name">' . esc_html( get_the_time( 'Y' ) ) . ' ' . esc_html__( 'Archives', 'coaching' ) . '</span></a><meta itemprop="position" content="2"></li>';

			// Month link
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_month_link( get_the_time( 'Y' ), get_the_time( 'm' ) ) ) . '" title="' . esc_attr( get_the_time( 'M' ) ) . '"><span itemprop="name">' . esc_html( get_the_time( 'M' ) ) . ' ' . esc_html__( 'Archives', 'coaching' ) . '</span></a><meta itemprop="position" content="3"></li>';

			// Day display
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_time( 'jS' ) ) . '"> ' . esc_html( get_the_time( 'jS' ) ) . ' ' . esc_html( get_the_time( 'M' ) ) . ' ' . esc_html__( 'Archives', 'coaching' ) . '</span><meta itemprop="position" content="4"></li>';

		} else if ( is_month() ) {

			// Month Archive

			// Year link
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><a itemprop="item" href="' . esc_url( get_year_link( get_the_time( 'Y' ) ) ) . '" title="' . esc_attr( get_the_time( 'Y' ) ) . '"><span itemprop="name">' . esc_html( get_the_time( 'Y' ) ) . ' ' . esc_html__( 'Archives', 'coaching' ) . '</span></a><meta itemprop="position" content="2"></li>';

			// Month display
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_time( 'M' ) ) . '">' . esc_html( get_the_time( 'M' ) ) . ' ' . esc_html__( 'Archives', 'coaching' ) . '</span><meta itemprop="position" content="3"></li>';

		} else if ( is_year() ) {

			// Display year archive
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( get_the_time( 'Y' ) ) . '">' . esc_html( get_the_time( 'Y' ) ) . ' ' . esc_html__( 'Archives', 'coaching' ) . '</span><meta itemprop="position" content="3"></li>';

		} else if ( is_author() ) {

			// Auhor archive

			// Get the author information
			global $author;
			$userdata = get_userdata( $author );

			// Display author name
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr( $userdata->display_name ) . '">' . esc_attr__( 'Author', 'coaching' ) . ' ' . esc_html( $userdata->display_name ) . '</span><meta itemprop="position" content="2"></li>';

		} else if ( get_query_var( 'paged' ) ) {

			// Paginated archives
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( 'Page', 'coaching' ) . ' ' . get_query_var( 'paged' ) . '">' . esc_html__( 'Page', 'coaching' ) . ' ' . esc_html( get_query_var( 'paged' ) ) . '</span><meta itemprop="position" content="2"></li>';

		} else if ( is_search() ) {

			// Search results page
			echo '<li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( 'Search results for:', 'coaching' ) . ' ' . esc_attr( get_search_query() ) . '">' . esc_html__( 'Search results for:', 'coaching' ) . ' ' . esc_html( get_search_query() ) . '</span><meta itemprop="position" content="2"></li>';

		} elseif ( is_404() ) {
			// 404 page
			echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( '404 Page', 'coaching' ) . '">' . esc_html__( '404 Page', 'coaching' ) . '</span><meta itemprop="position" content="2"></li>';
		} elseif ( is_archive() ) {
			if ( get_post_type() == "tp_event" ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( 'Events', 'coaching' ) . '">' . esc_html__( 'Events', 'coaching' ) . '</span><meta itemprop="position" content="2"></li>';
			}

			if ( get_post_type() == "testimonials" ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( 'Success Stories', 'coaching' ) . '">' . esc_html__( 'Success Stories', 'coaching' ) . '</span><meta itemprop="position" content="2"></li>';
			}

			if ( get_post_type() == "our_team" ) {
				echo '<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem"><span itemprop="name" title="' . esc_attr__( 'Our Team', 'coaching' ) . '">' . esc_html__( 'Our Team', 'coaching' ) . '</span><meta itemprop="position" content="2"></li>';
			}
		}

		echo '</ul>';
	}
}

/**
 * Get related posts
 *
 * @param     $post_id
 * @param int $number_posts
 *
 * @return WP_Query
 */
if ( ! function_exists( 'thim_get_related_posts' ) ) {
	function thim_get_related_posts( $post_id, $number_posts = - 1 ) {
		$query = new WP_Query();
		$args  = '';
		if ( $number_posts == 0 ) {
			return $query;
		}
		$args = wp_parse_args(
			$args, array(
				'posts_per_page'      => $number_posts,
				'post__not_in'        => array( $post_id ),
				'ignore_sticky_posts' => 0,
				'meta_key'            => '_thumbnail_id',
				'category__in'        => wp_get_post_categories( $post_id )
			)
		);

		$query = new WP_Query( $args );

		return $query;
	}
}


// bbPress
function thim_use_bbpress() {
	if ( function_exists( 'is_bbpress' ) ) {
		return is_bbpress();
	} else {
		return false;
	}
}

/************ List Comment ***************/
if ( ! function_exists( 'thim_comment' ) ) {
	function thim_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment;
		//extract( $args, EXTR_SKIP );
		if ( 'div' == $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
		<<?php echo ent2ncr( $tag . ' ' ) ?><?php comment_class( 'description_comment' ) ?> id="comment-<?php comment_ID() ?>">
		<div class="wrapper-comment">
			<?php
			if ( $args['avatar_size'] != 0 ) {
				echo '<div class="avatar">';
				echo get_avatar( $comment, $args['avatar_size'] );
				echo '</div>';
			}
			?>
			<div class="comment-right">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'coaching' ) ?></em>
				<?php endif; ?>

				<div class="comment-extra-info">
					<div
						class="author"><span class="author-name"><?php echo get_comment_author_link(); ?></span></div>
					<div class="date" itemprop="commentTime">
						<?php printf( get_comment_date(), get_comment_time() ) ?></div>

					<div class="content-comment">
						<?php comment_text() ?>
					</div>
					<?php edit_comment_link( esc_html__( 'Edit', 'coaching' ), '', '' ); ?>
					<?php comment_reply_link(
						array_merge(
							$args, array(
								'add_below' => $add_below,
								'depth'     => $depth,
								'max_depth' => $args['max_depth']
							)
						)
					) ?>
				</div>


			</div>
		</div>
		<?php
	}
}

// dislay setting layout
require THIM_DIR . 'inc/wrapper-before-after.php';

/**
 * @param $mtb_setting
 *
 * @return mixed
 */
function thim_mtb_setting_after_created( $mtb_setting ) {
	$mtb_setting->removeOption( array( 11 ) );
	$option_name_space = $mtb_setting->owner->optionNamespace;

	$settings   = array(
		'name'      => esc_html__( 'Color Sub Title', 'coaching' ),
		'id'        => 'mtb_color_sub_title',
		'type'      => 'color-opacity',
		'desc'      => ' ',
		'row_class' => 'child_of_' . $option_name_space . '_mtb_using_custom_heading thim_sub_option',
	);
	$settings_1 = array(
		'name' => esc_html__( 'No Padding Content', 'coaching' ),
		'id'   => 'mtb_no_padding',
		'type' => 'checkbox',
		'desc' => ' ',
	);

	$mtb_setting->insertOptionBefore( $settings, 11 );
	$mtb_setting->insertOptionBefore( $settings_1, 16 );

	return $mtb_setting;
}

add_filter( 'thim_mtb_setting_after_created', 'thim_mtb_setting_after_created', 10, 2 );


/**
 * @param $tabs
 *
 * @return array
 */
function thim_widget_group( $tabs ) {
	$tabs[] = array(
		'title'  => esc_html__( 'Thim Widget', 'coaching' ),
		'filter' => array(
			'groups' => array( 'thim_widget_group' )
		)
	);

	return $tabs;
}

add_filter( 'siteorigin_panels_widget_dialog_tabs', 'thim_widget_group', 19 );

/**
 * @param $fields
 *
 * @return mixed
 */
function thim_row_style_fields( $fields ) {
	$fields['parallax'] = array(
		'name'        => esc_html__( 'Parallax', 'coaching' ),
		'type'        => 'checkbox',
		'group'       => 'design',
		'description' => esc_html__( 'If enabled, the background image will have a parallax effect.', 'coaching' ),
		'priority'    => 8,
	);

	return $fields;
}

//add_filter( 'siteorigin_panels_row_style_fields', 'thim_row_style_fields' );


/**
 * @return string
 */
function thim_excerpt_length() {
	$theme_options_data = get_theme_mods();
	if ( isset( $theme_options_data['thim_archive_excerpt_length'] ) ) {
		$length = $theme_options_data['thim_archive_excerpt_length'];
	} else {
		$length = '50';
	}

	return $length;
}

add_filter( 'excerpt_length', 'thim_excerpt_length', 999 );

/**
 * @param $text
 *
 * @return mixed|string|void
 */
function thim_wp_new_excerpt( $text ) {
	if ( $text == '' ) {
		$text           = get_the_content( '' );
		$text           = strip_shortcodes( $text );
		$text           = apply_filters( 'the_content', $text );
		$text           = str_replace( ']]>', ']]>', $text );
		$text           = strip_tags( $text );
		$text           = nl2br( $text );
		$excerpt_length = apply_filters( 'excerpt_length', 55 );
		$words          = explode( ' ', $text, $excerpt_length + 1 );
		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			array_push( $words, '' );
			$text = implode( ' ', $words );
		}
	}

	return $text;
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'thim_wp_new_excerpt' );

/**
 * Social sharing
 */
if ( ! function_exists( 'thim_social_share' ) ) {
	function thim_social_share() {
		$theme_options_data = get_theme_mods();

		$facebook  = isset( $theme_options_data['group_sharing'] ) && in_array( 'facebook', $theme_options_data['group_sharing'] ) ? true : false;
		$twitter   = isset( $theme_options_data['group_sharing'] ) && in_array( 'twitter', $theme_options_data['group_sharing'] ) ? true : false;
		$pinterest = isset( $theme_options_data['group_sharing'] ) && in_array( 'pinterest', $theme_options_data['group_sharing'] ) ? true : false;
		$google    = isset( $theme_options_data['group_sharing'] ) && in_array( 'google', $theme_options_data['group_sharing'] ) ? true : false;
		$linkedin  = isset( $theme_options_data['group_sharing'] ) && in_array( 'linkedin', $theme_options_data['group_sharing'] ) ? true : false;

		if ( $facebook || $twitter || $pinterest || $google ) {
			echo '<ul class="thim-social-share">';
			do_action( 'thim_before_social_list' );
			echo '<li class="heading">' . esc_html__( 'Share:', 'coaching' ) . '</li>';
			if ( $facebook ) {

				echo '<li><div class="facebook-social"><a target="_blank" class="facebook"  href="https://www.facebook.com/sharer.php?u=' . urlencode( get_permalink() ) . '" title="' . esc_attr__( 'Facebook', 'coaching' ) . '"><i class="fa fa-facebook"></i></a></div></li>';

			}
			if ( $google ) {
				echo '<li><div class="googleplus-social"><a target="_blank" class="googleplus" href="https://plus.google.com/share?url=' . urlencode( get_permalink() ) . '&amp;title=' . rawurlencode( esc_attr( get_the_title() ) ) . '" title="' . esc_attr__( 'Google Plus', 'coaching' ) . '" onclick=\'javascript:window.open(this.href, "", "menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600");return false;\'><i class="fa fa-google"></i></a></div></li>';

			}
			if ( $twitter ) {
				echo '<li><div class="twitter-social"><a target="_blank" class="twitter" href="https://twitter.com/share?url=' . urlencode( get_permalink() ) . '&amp;text=' . rawurlencode( esc_attr( get_the_title() ) ) . '" title="' . esc_attr__( 'Twitter', 'coaching' ) . '"><i class="fa fa-twitter"></i></a></div></li>';

			}

			if ( $pinterest ) {
				echo '<li><div class="pinterest-social"><a target="_blank" class="pinterest"  href="http://pinterest.com/pin/create/button/?url=' . urlencode( get_permalink() ) . '&amp;description=' . rawurlencode( esc_attr( get_the_excerpt() ) ) . '&amp;media=' . urlencode( wp_get_attachment_url( get_post_thumbnail_id() ) ) . '" onclick="window.open(this.href); return false;" title="' . esc_attr__( 'Pinterest', 'coaching' ) . '"><i class="fa fa-pinterest-p"></i></a></div></li>';

			}
			if ( $linkedin ) {
				echo '<li><div class="linkedin-social"><a target="_blank" class="linkedin" href="https://www.linkedin.com/shareArticle?mini=true&url=' . urlencode( get_permalink() ) . '&title=' . rawurlencode( esc_attr( get_the_title() ) ) . '&summary=&source=' . rawurlencode( esc_attr( get_the_excerpt() ) ) . '"><i class="fa fa-linkedin-square"></i></a></div></li>';

			}
			do_action( 'thim_after_social_list' );

			echo '</ul>';
		}

	}
}
add_action( 'thim_social_share', 'thim_social_share' );


/**
 * Display favicon
 */
function thim_favicon() {
	if ( function_exists( 'wp_site_icon' ) ) {
		if ( function_exists( 'has_site_icon' ) ) {
			if ( ! has_site_icon() ) {
				// Icon default
				$thim_favicon_src = get_template_directory_uri() . "/images/favicon.png";
				echo '<link rel="shortcut icon" href="' . esc_url( $thim_favicon_src ) . '" type="image/x-icon" />';

				return;
			}

			return;
		}
	}

	/**
	 * Support WordPress < 4.3
	 */
	$theme_options_data = get_theme_mods();
	$thim_favicon_src   = '';
	if ( isset( $theme_options_data['thim_favicon'] ) ) {
		$thim_favicon       = $theme_options_data['thim_favicon'];
		$favicon_attachment = wp_get_attachment_image_src( $thim_favicon, 'full' );
		$thim_favicon_src   = $favicon_attachment[0];
	}
	if ( ! $thim_favicon_src ) {
		$thim_favicon_src = get_template_directory_uri() . "/images/favicon.png";
	}
	echo '<link rel="shortcut icon" href="' . esc_url( $thim_favicon_src ) . '" type="image/x-icon" />';
}

add_action( 'wp_head', 'thim_favicon' );

/**
 * Redirect to custom login page
 */
if ( ! function_exists( 'thim_login_failed' ) ) {
	function thim_login_failed() {
		if ( ( isset( $_REQUEST['action'] ) && $_REQUEST['action'] == 'thim_login_ajax' ) || ( isset( $_REQUEST['lp-ajax'] ) && $_REQUEST['lp-ajax'] == 'login' ) || ( is_admin() && defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
			return;
		}

		if ( is_user_logged_in() ) {
			return;
		}

		$url = add_query_arg( 'result', 'failed', thim_get_login_page_url() );

		if ( isset( $_POST['g-recaptcha-response'] ) ) {
			if ( ! $_POST['g-recaptcha-response'] ) {
				$url = add_query_arg( 'gglcptch_error', '1', $url );
			}
		}

		wp_redirect( $url );
		exit;
	}

	add_action( 'wp_login_failed', 'thim_login_failed', 1000 );
}

/**
 * Filter register link
 *
 * @param $register_url
 *
 * @return string|void
 */
if ( ! function_exists( 'thim_get_register_url' ) ) {
	function thim_get_register_url() {
		$url = add_query_arg( 'action', 'register', thim_get_login_page_url() );

		return $url;
	}
}


/**
 * Register failed
 *
 * @param $sanitized_user_login
 * @param $user_email
 * @param $errors
 */
if ( ! function_exists( 'thim_register_failed' ) ) {
	function thim_register_failed( $errors ) {
		if ( $errors->get_error_code() ) {

			//setup your custom URL for redirection
			$url = add_query_arg( 'action', 'register', thim_get_login_page_url() );

			foreach ( $errors->errors as $e => $m ) {
				$url = add_query_arg( $e, '1', $url );
			}
			wp_redirect( $url );
			exit;
		}

		return $errors;
	}

	add_action( 'registration_errors', 'thim_register_failed', 99, 1 );
}

function thim_check_extra_register_fields( $login, $email, $errors ) {
	$theme_options_data = get_theme_mods();
	if ( empty( $theme_options_data['thim_auto_login'] ) || ( isset( $theme_options_data['thim_auto_login'] ) && $theme_options_data['thim_auto_login'] == '0' ) ) {
		if ( $_POST['password'] !== $_POST['repeat_password'] ) {
			$errors->add( 'passwords_not_matched', "<strong>" . esc_html__( 'ERROR:', 'coaching' ) . "</strong>" . esc_html__( ' Passwords must match', 'coaching' ) );
		}
	}
}

add_action( 'register_post', 'thim_check_extra_register_fields', 10, 3 );

/**
 * Update password
 *
 * @param $user_id
 */
function thim_register_extra_fields( $user_id ) {
	$theme_options_data = get_theme_mods();
	if ( empty( $theme_options_data['thim_auto_login'] ) || ( isset( $theme_options_data['thim_auto_login'] ) && $theme_options_data['thim_auto_login'] == '0' ) ) {
		if ( ! isset( $_POST['password'] ) || ! isset( $_POST['repeat_password'] ) ) {
			return false;
		}

		$pw         = sanitize_text_field( $_POST['password'] );
		$confirm_pw = sanitize_text_field( $_POST['repeat_password'] );

		if ( $pw !== $confirm_pw ) {
			return false;
		}

		$user_data       = array();
		$user_data['ID'] = $user_id;
		$user_data['user_pass'] = $pw;

		add_filter( 'send_password_change_email', '__return_false' );

		$new_user_id = wp_update_user( $user_data );

		// Login after registered
		if ( ! is_admin() ) {
			wp_set_current_user( $user_id );
			wp_set_auth_cookie( $user_id );
			wp_new_user_notification( $user_id, null, 'both' );
			if ( ( isset( $_POST['billing_email'] ) && ! empty( $_POST['billing_email'] ) ) || ( isset( $_POST['bconfirmemail'] ) && ! empty( $_POST['bconfirmemail'] ) ) ) {
				return;
			} elseif ( isset($_POST['gateway']) && $_POST['gateway'] == 'paypalexpress' && isset($_POST['token']) && isset($_POST['confirm']) &&  isset( $_POST['confirm'] ) && isset( $_POST['level'] ) && isset( $_POST['checkjavascript'] ) ){
				return; 
			} else {
				if ( ! empty( $_REQUEST['redirect_to'] ) ) {
					wp_redirect( $_REQUEST['redirect_to'] );
				} else {
					$theme_options_data = get_theme_mods();
					if ( ! empty( $_REQUEST['option'] ) && $_REQUEST['option'] == 'moopenid' ) {
						if ( isset( $_SERVER['HTTPS'] ) && ! empty( $_SERVER['HTTPS'] ) && $_SERVER['HTTPS'] != 'off' ) {
							$http = "https://";
						} else {
							$http = "http://";
						}
						$redirect_url = urldecode( html_entity_decode( esc_url( $http . $_SERVER["HTTP_HOST"] . str_replace( '?option=moopenid', '', $_SERVER['REQUEST_URI'] ) ) ) );
						if ( html_entity_decode( esc_url( remove_query_arg( 'ss_message', $redirect_url ) ) ) == wp_login_url() || strpos( $_SERVER['REQUEST_URI'], 'wp-login.php' ) !== false || strpos( $_SERVER['REQUEST_URI'], 'wp-admin' ) !== false ) {
							$redirect_url = site_url() . '/';
						}

						wp_redirect( $redirect_url );

						return;
					}
					if ( ! empty( $theme_options_data['thim_register_redirect'] ) ) {
						wp_redirect( $theme_options_data['thim_register_redirect'] );
					} else {
						wp_redirect( home_url() );
					}
				}
				exit;
			}
		}
	}
}

add_action( 'user_register', 'thim_register_extra_fields', 1000 );

/**
 * Redirect to custom register page in case multi sites
 *
 * @param $url
 *
 * @return mixed
 */
if ( ! function_exists( 'thim_multisite_register_redirect' ) ) {
	function thim_multisite_register_redirect( $url ) {

		if ( ! is_user_logged_in() ) {
			if ( is_multisite() ) {
				$url = add_query_arg( 'action', 'register', thim_get_login_page_url() );
			}

			$user_login = isset( $_POST['user_login'] ) ? $_POST['user_login'] : '';
			$user_email = isset( $_POST['user_email'] ) ? $_POST['user_email'] : '';

			$errors = register_new_user( $user_login, $user_email );

			if ( ! is_wp_error( $errors ) ) {
				$redirect_to = ! empty( $_POST['redirect_to'] ) ? $_POST['redirect_to'] : 'wp-login.php?checkemail=registered';
				wp_safe_redirect( $redirect_to );
				exit();
			}
		}

		return $url;
	}
}

add_filter( 'wp_signup_location', 'thim_multisite_register_redirect' );

if ( ! function_exists( 'thim_multisite_signup_redirect' ) ) {
	function thim_multisite_signup_redirect() {
		if ( is_multisite() ) {
			wp_redirect( wp_registration_url() );
			die();
		}
	}
}

add_action( 'signup_header', 'thim_multisite_signup_redirect' );


/**
 * Filter lost password link
 *
 * @param $url
 *
 * @return string
 */
if ( ! function_exists( 'thim_get_lost_password_url' ) ) {
	function thim_get_lost_password_url() {
		$url = add_query_arg( 'action', 'lostpassword', thim_get_login_page_url() );

		return $url;
	}
}


/**
 * Add lost password link into login form
 *
 * @param $content
 * @param $args
 *
 * @return string
 */
if ( ! function_exists( 'thim_add_lost_password_link' ) ) {
	function thim_add_lost_password_link() {
		$content = '<a class="lost-pass-link" href="' . thim_get_lost_password_url() . '" title="' . esc_attr__( 'Lost Password', 'coaching' ) . '">' . esc_html__( 'Lost your password?', 'coaching' ) . '</a>';

		return $content;
	}
}

//add_filter( 'login_form_middle', 'thim_add_lost_password_link', 999 );

/**
 * Register failed
 */
if ( ! function_exists( 'thim_reset_password_failed' ) ) {
	function thim_reset_password_failed() {

		//setup your custom URL for redirection
		$url = add_query_arg( 'action', 'lostpassword', thim_get_login_page_url() );

		if ( empty( $_POST['user_login'] ) ) {
			$url = add_query_arg( 'empty', '1', $url );
			wp_redirect( $url );
			exit;
		} elseif ( strpos( $_POST['user_login'], '@' ) ) {
			$user_data = get_user_by( 'email', trim( $_POST['user_login'] ) );
			if ( empty( $user_data ) ) {
				$url = add_query_arg( 'user_not_exist', '1', $url );
				wp_redirect( $url );
				exit;
			}
		} elseif ( ! username_exists( $_POST['user_login'] ) ) {
			$url = add_query_arg( 'user_not_exist', '1', $url );
			wp_redirect( $url );
			exit;
		}


	}
}
add_action( 'lostpassword_post', 'thim_reset_password_failed', 999 );

/**
 * Get login page url
 *
 * @return false|string
 */
if ( ! function_exists( 'thim_get_login_page_url' ) ) {
	function thim_get_login_page_url() {

//		if ( ! thim_plugin_active( 'siteorigin-panels/siteorigin-panels.php' ) && ! thim_plugin_active( 'js_composer/js_composer.php' ) ) {
//			return wp_login_url();
//		}

        if ( $page = get_option( 'thim_login_page' ) ) {
            return get_permalink( $page );
        } else {
            global $wpdb;
            $page = $wpdb->get_col(
                $wpdb->prepare(
                    "SELECT p.ID FROM $wpdb->posts AS p INNER JOIN $wpdb->postmeta AS pm ON p.ID = pm.post_id
			WHERE 	pm.meta_key = %s
			AND 	pm.meta_value = %s
			AND		p.post_type = %s
			AND		p.post_status = %s",
                    'thim_login_page',
                    '1',
                    'page',
                    'publish'
                )
            );
            if ( ! empty( $page[0] ) ) {
                return get_permalink( $page[0] );
            }
        }

        return wp_login_url();

	}
}

/**
 * Display feature image
 *
 * @param $attachment_id
 * @param $size_type
 * @param $width
 * @param $height
 * @param $alt
 * @param $title
 *
 * @return string
 */

if ( ! function_exists( 'thim_get_feature_image' ) ) {
	function thim_get_feature_image( $attachment_id, $size_type = null, $width = null, $height = null, $alt = null, $title = null ) {


		if ( ! $size_type ) {
			$size_type = 'full';
		}
		$style = '';
		if ( $width && $height ) {
			$src   = wp_get_attachment_image_src( $attachment_id, array( $width, $height ) );
			$style = ' width="' . $width . '" height="' . $height . '"';
		} else {
			$src = wp_get_attachment_image_src( $attachment_id, $size_type );
			if ( ! empty( $src[1] ) && ! empty( $src[2] ) ) {
				$style = ' width="' . $src[1] . '" height="' . $src[2] . '"';
			}
		}

		if ( ! $src ) {
			$query_args    = array(
				'post_type'   => 'attachment',
				'post_status' => 'inherit',
				'meta_query'  => array(
					array(
						'key'     => '_wp_attached_file',
						'compare' => 'LIKE',
						'value'   => 'demo_image.jpg'
					)
				)
			);
			$attachment_id = get_posts( $query_args );
			if ( $attachment_id[0] ) {
				$attachment_id = $attachment_id[0]->ID;
				$src           = wp_get_attachment_image_src( $attachment_id, 'full' );
			}
		}


		if ( ! $alt ) {
			$alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) ? get_post_meta( $attachment_id, '_wp_attachment_image_alt', true ) : get_the_title( $attachment_id );
		}
//		if ( $no_lazyload = 1 ) {
//			$style .= ' data-skip-lazy';
//		}
		if ( ! $title ) {
			$title = get_the_title( $attachment_id );
		}

		return '<img src="' . esc_url( $src[0] ) . '" alt="' . esc_attr( $alt ) . '" title="' . esc_attr( $title ) . '" ' . $style . '>';

 	}
}

function thim_get_src_demo_image() {

	// Get demo image
	global $wpdb;
	$attachment_id = $wpdb->get_col(
		$wpdb->prepare(
			"SELECT p.ID FROM $wpdb->posts AS p INNER JOIN $wpdb->postmeta AS pm ON p.ID = pm.post_id
				WHERE 	pm.meta_key = %s
				AND 	pm.meta_value LIKE %s",
			'_wp_attached_file',
			'%demo_image.jpg'
		)
	);

	if ( empty( $attachment_id[0] ) ) {
		return;
	}

	$attachment_id = $attachment_id[0];
	$src           = wp_get_attachment_image_src( $attachment_id, 'full' );

	return $src;

}


/**
 * Adds a box to the main column on the Post and Page edit screens.
 */
function thim_event_add_meta_boxes() {

	if ( ! post_type_exists( 'tp_event' ) || ! post_type_exists( 'our_team' ) ) {
		return;
	}
	add_meta_box(
		'thim_organizers',
		esc_html__( 'Organizers', 'coaching' ),
		'thim_event_meta_boxes_callback',
		'tp_event'
	);
}

add_action( 'add_meta_boxes', 'thim_event_add_meta_boxes' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function thim_event_meta_boxes_callback( $post ) {

	// Add a nonce field so we can check for it later.
	wp_nonce_field( 'thim_event_save_meta_boxes', 'thim_event_meta_boxes_nonce' );

	// Get all team
	$team = new WP_Query(
		array(
			'post_type'           => 'our_team',
			'post_status'         => 'publish',
			'ignore_sticky_posts' => true,
			'posts_per_page'      => - 1
		)
	);
	if ( empty( $team->post_count ) ) {
		echo '<p>' . esc_html__( 'No members exists. You can create a member data from', 'coaching' ) . ' <a target="_blank" href="' . esc_url( admin_url( 'post-new.php?post_type=our_team' ) ) . '">' . esc_html__( 'Our Team', 'coaching' ) . '</a></p>';

		return;
	}

	echo '<label for="thim_event_members">';
	esc_html_e( 'Get Members', 'coaching' );
	echo '</label> ';
	echo '<select id="thim_event_members" name="thim_event_members[]" multiple>';
	if ( isset( $team->posts ) ) {
		$team = $team->posts;
		foreach ( $team as $member ) {
			echo '<option value="' . esc_attr( $member->ID ) . '">' . get_the_title( $member->ID ) . '</option>';
		}
	}
	echo '</select>';
	echo '<span>';
	esc_html_e( 'Hold down the Ctrl (Windows) / Command (Mac) button to select multiple options.', 'coaching' );
	echo '</span><br>';
	wp_reset_postdata();

	/*
	 * Use get_post_meta() to retrieve an existing value
	 * from the database and use the value for the form.
	 */
	$members = get_post_meta( $post->ID, 'thim_event_members', true );
	echo '<p>' . esc_html__( 'Current Members: ', 'coaching' );

	if ( ! $members ) {
		echo esc_html__( 'None', 'coaching' ) . '</p>';
	} else {

		foreach ( $members as $key => $id ) {
			echo '<strong><a target="_blank" href="' . get_edit_post_link( $id ) . '">' . get_the_title( $id ) . '</a></strong>';
			if ( $key != count( $members ) ) {
				echo ', ';
			}
		}
	}
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function thim_event_save_meta_boxes( $post_id ) {

	/*
	 * We need to verify this came from our screen and with proper authorization,
	 * because the save_post action can be triggered at other times.
	 */

	// Check if our nonce is set.
	if ( ! isset( $_POST['thim_event_meta_boxes_nonce'] ) ) {
		return;
	}

	// Verify that the nonce is valid.
	if ( ! wp_verify_nonce( $_POST['thim_event_meta_boxes_nonce'], 'thim_event_save_meta_boxes' ) ) {
		return;
	}

	// If this is an autosave, our form has not been submitted, so we don't want to do anything.
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}

	// Check the user's permissions.
	if ( isset( $_POST['post_type'] ) && 'tp_event' == $_POST['post_type'] ) {

		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

	}

	/* OK, it's safe for us to save the data now. */

	// Make sure that it is set.
	if ( ! isset( $_POST['thim_event_members'] ) ) {
		return;
	}

	// Update the meta field in the database.
	update_post_meta( $post_id, 'thim_event_members', $_POST['thim_event_members'] );
}

add_action( 'save_post', 'thim_event_save_meta_boxes' );

if ( ! function_exists( 'thim_child_add_extra_event' ) ) {
	function thim_child_add_extra_event( $post ) {
		$on_map = get_post_meta( $post->ID, 'tp_event_view_map', true ) ? get_post_meta( $post->ID, 'tp_event_view_map', true ) : '';
		?>
		<tr>
			<th>
				<label><?php esc_html_e( 'Map Link', 'coaching' ) ?></label>
			</th>
			<td>
				<p id="tp_event_datetime_end">
					<input type="text" name="tp_event_view_map" value="<?php echo esc_attr( $on_map ); ?>">
				</p>
			</td>
		</tr>
		<?php
	}
}

add_action( 'event_after_meta_box', 'thim_child_add_extra_event' );


/**
 * Change default comment fields
 *
 * @param $field
 *
 * @return string
 */
function thim_new_comment_fields( $fields ) {
	$commenter = wp_get_current_commenter();
	$req       = get_option( 'require_name_email' );
	$aria_req  = ( $req ? 'aria-required=true' : '' );

	$fields = array(
		'author' => '<p class="comment-form-author">' . '<input placeholder="' . esc_attr__( 'Name', 'coaching' ) . ( $req ? ' *' : '' ) . '" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30" ' . $aria_req . ' /></p>',
		'email'  => '<p class="comment-form-email">' . '<input placeholder="' . esc_attr__( 'Email', 'coaching' ) . ( $req ? ' *' : '' ) . '" id="email" name="email" type="text" value="' . esc_attr( $commenter['comment_author_email'] ) . '" size="30" ' . $aria_req . ' /></p>',
		'url'    => '<p class="comment-form-url">' . '<input placeholder="' . esc_attr__( 'Website', 'coaching' ) . '" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
	);

	return $fields;
}

add_filter( 'comment_form_default_fields', 'thim_new_comment_fields', 1 );


/**
 * Remove Emoji scripts
 */
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );


/**
 * Optimize script files
 */
if ( !function_exists( 'thim_optimize_scripts' ) ) {
	function thim_optimize_scripts() {
		global $wp_scripts;
		if ( !is_a( $wp_scripts, 'WP_Scripts' ) ) {
			return;
		}
		foreach ( $wp_scripts->registered as $handle => $script ) {
			$wp_scripts->registered[$handle]->ver = null;
		}
	}
}


/**
 * Optimize style files
 */
if ( !function_exists( 'thim_optimize_styles' ) ) {
	function thim_optimize_styles() {
		global $wp_styles;
		if ( !is_a( $wp_styles, 'WP_Styles' ) ) {
			return;
		}
		foreach ( $wp_styles->registered as $handle => $style ) {
			if ( $handle !== 'thim-rtl' ) {
				$wp_styles->registered[$handle]->ver = null;
			}
		}
	}
}

/**
 * Remove query string in css files & js files
 */
$theme_remove_string = get_theme_mod( 'thim_remove_query_string', false );
if ( $theme_remove_string ) {
	add_action( 'wp_print_scripts', 'thim_optimize_scripts', 999 );
	add_action( 'wp_print_footer_scripts', 'thim_optimize_scripts', 999 );
	add_action( 'admin_print_styles', 'thim_optimize_styles', 999 );
	add_action( 'wp_print_styles', 'thim_optimize_styles', 999 );
}

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 *
 * @return array
 */
function thim_page_menu_args( $args ) {
	$args['show_home'] = true;

	return $args;
}

add_filter( 'wp_page_menu_args', 'thim_page_menu_args' );

/**
 * Sets the authordata global when viewing an author archive.
 *
 * @global WP_Query $wp_query WordPress Query object.
 * @return void
 */
function thim_setup_author() {
	global $wp_query;

	if ( $wp_query->is_author() && isset( $wp_query->post ) ) {
		$GLOBALS['authordata'] = get_userdata( $wp_query->post->post_author );
	}
}

add_action( 'wp', 'thim_setup_author' );

function thim_add_event_admin_styles() {
	?>
	<style type="text/css">
		#thim_event_members {
			min-height: 200px;
		}
	</style>
	<?php
}

add_action( 'admin_print_styles', 'thim_add_event_admin_styles' );

/**
 * Check a plugin activate
 *
 * @param $plugin
 *
 * @return bool
 */
function thim_plugin_active( $plugin ) {
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( $plugin ) ) {
		return true;
	}

	return false;
}


/**
 * Custom WooCommerce breadcrumbs
 *
 * @return array
 */
function thim_woocommerce_breadcrumbs() {
	return array(
		'delimiter'   => '',
		'wrap_before' => '<ul class="breadcrumbs" id="breadcrumbs" itemtype="http://schema.org/BreadcrumbList" itemscope="" itemprop="breadcrumb">',
		'wrap_after'  => '</ul>',
		'before'      => '<li itemtype="http://schema.org/ListItem" itemscope="" itemprop="itemListElement">',
		'after'       => '</li>',
		'home'        => esc_html__( 'Home', 'coaching' ),
	);
}

add_filter( 'woocommerce_breadcrumb_defaults', 'thim_woocommerce_breadcrumbs' );

/**
 * Display post thumbnail by default
 *
 * @param $size
 */
function thim_default_get_post_thumbnail( $size ) {

	if ( thim_plugin_active( 'thim-framework/tp-framework.php' ) ) {
		return;
	}

	if ( get_the_post_thumbnail( get_the_ID(), $size ) ) {
		?>
		<div class='post-formats-wrapper'>
			<a class="post-image" href="<?php echo esc_url( get_permalink() ); ?>">
				<?php echo get_the_post_thumbnail( get_the_ID(), $size ); ?>
			</a>
		</div>
		<?php
	}
}

//add_action( 'thim_entry_top', 'thim_default_get_post_thumbnail', 20 );


/**
 * Set unlimit events in archive
 *
 * @param $query
 */
function thim_event_post_filter( $query ) {
	global $wp_query;

	if ( is_post_type_archive( 'tp_event' ) && 'tp_event' == $query->get( 'post_type' ) ) {
		$query->set( 'posts_per_page', - 1 );

		return;
	}
}

add_action( 'pre_get_posts', 'thim_event_post_filter' );


function thim_start_widget_element_content( $content, $panels_data, $post_id ) {
	global $siteorigin_panels_inline_css;

	if ( ! empty( $siteorigin_panels_inline_css[ $post_id ] ) ) {
		$content = '<style scoped>' . ( $siteorigin_panels_inline_css[ $post_id ] ) . '</style>' . $content;
	}

	return $content;
}

remove_action( 'wp_footer', 'siteorigin_panels_print_inline_css' );
add_filter( 'siteorigin_panels_before_content', 'thim_start_widget_element_content', 10, 3 );

//Override ajax-loader contact form
function thim_wpcf7_ajax_loader() {
	return THIM_URI . 'images/ajax-loader.gif';
}

add_filter( 'wpcf7_ajax_loader', 'thim_wpcf7_ajax_loader' );


/**
 * Testing with CF7 scripts
 */
if ( ! function_exists( 'thim_disable_cf7_cache' ) ) {
	function thim_disable_cf7_cache() {
		global $wp_scripts;
		if ( ! empty( $wp_scripts->registered['contact-form-7'] ) ) {
			if ( ! empty( $wp_scripts->registered['contact-form-7']->extra['data'] ) ) {
				$localize                                                = $wp_scripts->registered['contact-form-7']->extra['data'];
				$localize                                                = str_replace( '"cached":"1"', '"cached":0', $localize );
				$wp_scripts->registered['contact-form-7']->extra['data'] = $localize;
			}
		}
	}
}

add_action( 'wpcf7_enqueue_scripts', 'thim_disable_cf7_cache' );


//Function thim_related_our_team
if ( ! function_exists( 'thim_related_our_team' ) ) {
	function thim_related_our_team( $post_id, $number_posts = - 1 ) {
		$query = new WP_Query();
		$args  = '';
		if ( $number_posts == 0 ) {
			return $query;
		}
		$args  = wp_parse_args(
			$args, array(
				'posts_per_page'      => $number_posts,
				'post_type'           => 'our_team',
				'post__not_in'        => array( $post_id ),
				'ignore_sticky_posts' => true,
				'tax_query'           => array(
					array(
						'taxonomy' => 'our_team_category',
						// taxonomy name
						'field'    => 'term_id',
						// term_id, slug or name
						'operator' => 'IN',
						'terms'    => wp_get_post_terms( $post_id, 'our_team_category', array( "fields" => "ids" ) ),
						// term id, term slug or term name
					)
				),
			)
		);
		$query = new WP_Query( $args );

		return $query;
	}
}

/**
 * Process events order
 */

add_filter( 'posts_fields', 'thim_event_posts_fields' );
add_filter( 'posts_join_paged', 'thim_event_posts_join_paged' );
add_filter( 'posts_where_paged', 'thim_event_posts_where_paged' );
add_filter( 'posts_orderby', 'thim_event_posts_orderby' );

function thim_is_events_archive() {
	global $pagenow, $post_type;
	if ( ! is_post_type_archive( 'tp_event' ) || ! is_main_query() ) {
		return false;
	}

	return true;
}

function thim_event_posts_fields( $fields ) {
	if ( ! thim_is_events_archive() ) {
		return $fields;
	}

	$fields = " DISTINCT " . $fields;
	$fields .= ', concat( str_to_date( pm1.meta_value, \'%m/%d/%Y\' ), \' \', str_to_date(pm2.meta_value, \'%h:%i %p\' ) ) as start_date_time ';

	return $fields;
}

function thim_event_posts_join_paged( $join ) {
	if ( ! thim_is_events_archive() ) {
		return $join;
	}

	global $wpdb;
	$join .= " LEFT JOIN {$wpdb->postmeta} pm1 ON pm1.post_id = {$wpdb->posts}.ID AND pm1.meta_key = 'tp_event_date_start'";
	$join .= " LEFT JOIN {$wpdb->postmeta} pm2 ON pm2.post_id = {$wpdb->posts}.ID AND pm2.meta_key = 'tp_event_time_start'";


	return $join;
}

function thim_event_posts_where_paged( $where ) {
	if ( ! thim_is_events_archive() ) {
		return $where;
	}

	return $where;
}

function thim_event_posts_orderby( $order_by_statement ) {

	if ( ! thim_is_events_archive() ) {
		return $order_by_statement;
	}
	$order_by_statement = "start_date_time ASC"; // ASC

	return $order_by_statement;
}

if ( ! function_exists( 'thim_replace_retrieve_password_message' ) ) {
	function thim_replace_retrieve_password_message( $message, $key, $user_login, $user_data ) {

		$reset_link = add_query_arg(
			array(
				'action' => 'rp',
				'key'    => $key,
				'login'  => rawurlencode( $user_login )
			), thim_get_login_page_url()
		);

		// Create new message
		$message = esc_html__( 'Someone has requested a password reset for the following account:', 'coaching' ) . "\r\n\r\n";
		$message .= network_home_url( '/' ) . "\r\n\r\n";
		$message .= sprintf( esc_html__( 'Username: %s', 'coaching' ), $user_login ) . "\r\n\r\n";
		$message .= esc_html__( 'If this was a mistake, just ignore this email and nothing will happen.', 'coaching' ) . "\r\n\r\n";
		$message .= esc_html__( 'To reset your password, visit the following address:', 'coaching' ) . "\r\n\r\n";
		$message .= $reset_link . "\r\n";

		return $message;
	}
}
/**
 * Add filter if without using wpengine
 */
if ( ! function_exists( 'is_wpe' ) && ! function_exists( 'is_wpe_snapshot' ) ) {
	add_filter( 'retrieve_password_message', 'thim_replace_retrieve_password_message', 10, 4 );
}


function thim_do_password_reset() {

	$login_page = thim_get_login_page_url();
	if ( 'POST' == $_SERVER['REQUEST_METHOD'] ) {

		if ( ! isset( $_REQUEST['key'] ) || ! isset( $_REQUEST['login'] ) ) {
			return;
		}

		$key   = $_REQUEST['key'];
		$login = $_REQUEST['login'];

		$user = check_password_reset_key( $key, $login );

		if ( ! $user || is_wp_error( $user ) ) {
			if ( $user && $user->get_error_code() === 'expired_key' ) {
				wp_redirect( add_query_arg(
					array(
						'action'      => 'rp',
						'expired_key' => '1',
					), $login_page
				) );
			} else {
				wp_redirect( add_query_arg(
					array(
						'action'      => 'rp',
						'invalid_key' => '1',
					), $login_page
				) );
			}
			exit;
		}

		if ( isset( $_POST['password'] ) ) {

			if ( empty( $_POST['password'] ) ) {
				// Password is empty
				wp_redirect( add_query_arg(
					array(
						'action'           => 'rp',
						'key'              => $_REQUEST['key'],
						'login'            => $_REQUEST['login'],
						'invalid_password' => '1',
					), $login_page
				) );
				exit;
			}

			// Parameter checks OK, reset password
			reset_password( $user, $_POST['password'] );
			wp_redirect( add_query_arg(
				array(
					'result' => 'changed',
				), $login_page
			) );
		} else {
			esc_html_e( 'Invalid request.', 'coaching' );
		}

		exit;
	}
}

add_action( 'login_form_rp', 'thim_do_password_reset', 1000 );
add_action( 'login_form_resetpass', 'thim_do_password_reset', 1000 );

if ( ! function_exists( 'thim_related_portfolio' ) ) {
	function thim_related_portfolio( $post_id ) {

		?>
		<div class="related-portfolio col-md-12">
			<div class="module_title"><h4 class="widget-title"><?php esc_html_e( 'Related Items', 'coaching' ); ?></h4>
			</div>

			<?php //Get Related posts by category	-->
			$args      = array(
				'posts_per_page' => 3,
				'post_type'      => 'portfolio',
				'post_status'    => 'publish',
				'post__not_in'   => array( $post_id )
			);
			$port_post = get_posts( $args );
			?>

			<ul class="row">
				<?php
				foreach ( $port_post as $post ) : setup_postdata( $post ); ?>
					<?php
					$bk_ef = get_post_meta( $post->ID, 'thim_portfolio_bg_color_ef', true );
					if ( $bk_ef == '' ) {
						$bk_ef = get_post_meta( $post->ID, 'thim_portfolio_bg_color_ef', true );
						$bg    = '';
					} else {
						$bk_ef = get_post_meta( $post->ID, 'thim_portfolio_bg_color_ef', true );
						$bg    = 'style="background-color:' . $bk_ef . ';"';
					}
					?>
					<li class="col-sm-4">
						<?php

						$imImage = get_permalink( $post->ID );

						$image_url = thim_get_feature_image( get_post_thumbnail_id( $post->ID ), 'full', '480', '320' );
						echo '<div data-color="' . $bk_ef . '" ' . $bg . '>';
						echo '<div class="portfolio-image" ' . $bg . '>' . $image_url . '
					<div class="portfolio_hover"><div class="thumb-bg"><div class="mask-content">';
						echo '<h3><a href="' . esc_url( get_permalink( $post->ID ) ) . '" title="' . esc_attr( get_the_title( $post->ID ) ) . '" >' . get_the_title( $post->ID ) . '</a></h3>';
						echo '<span class="p_line"></span>';
						$terms    = get_the_terms( $post->ID, 'portfolio_category' );
						$cat_name = "";
						if ( $terms && ! is_wp_error( $terms ) ) :
							foreach ( $terms as $term ) {
								if ( $cat_name ) {
									$cat_name .= ', ';
								}
								$cat_name .= '<a href="' . esc_url( get_term_link( $term ) ) . '">' . $term->name . "</a>";
							}
							echo '<div class="cat_portfolio">' . $cat_name . '</div>';
						endif;
						echo '<a href="' . esc_url( $imImage ) . '" title="' . esc_attr( get_the_title( $post->ID ) ) . '" class="btn_zoom ">' . esc_html__( 'Zoom', 'coaching' ) . '</a>';
						echo '</div></div></div></div></div>';
						?>
					</li>
				<?php endforeach; ?>
			</ul>
			<?php wp_reset_postdata(); ?>
		</div><!--#portfolio_related-->
		<?php
	}
}


//Function ajax widget gallery-posts
add_action( 'wp_ajax_thim_gallery_popup', 'thim_gallery_popup' );
add_action( 'wp_ajax_nopriv_thim_gallery_popup', 'thim_gallery_popup' );
/** widget gallery posts ajax output **/
if ( ! function_exists( 'thim_gallery_popup' ) ) {
	function thim_gallery_popup() {
		global $post;
		$post_id = $_POST["post_id"];
		$post    = get_post( $post_id );

		$format = get_post_format( $post_id->ID );

		$error = true;
		$link  = get_edit_post_link( $post_id );
		ob_start();

		if ( $format == 'video' ) {
			$url_video = get_post_meta( $post_id, 'thim_video', true );
			if ( empty( $url_video ) ) {
				echo '<div class="thim-gallery-message"><a class="link" href="' . $link . '">' . esc_html__( 'This post doesn\'t have config video, please add the video!', 'coaching' ) . '</a></div>';
			}
			// If URL: show oEmbed HTML
			if ( filter_var( $url_video, FILTER_VALIDATE_URL ) ) {
				if ( $oembed = @wp_oembed_get( $url_video ) ) {
					echo '<div class="video">' . $oembed . '</div>';
				}
			} else {
				echo '<div class="video">' . $url_video . '</div>';
			}

		} else {
			$images = thim_meta( 'thim_gallery', "type=image&single=false&size=full" );
			// Get category permalink


			if ( ! empty( $images ) ) {
				foreach ( $images as $k => $value ) {
					$url_image = $value['url'];
					if ( $url_image && $url_image != '' ) {
						echo '<a href="' . $url_image . '">';
						echo '<img src="' . $url_image . '" />';
						echo '</a>';
						$error = false;
					}
				}
			}
			if ( $error ) {
				if ( is_user_logged_in() ) {
					echo '<div class="thim-gallery-message"><a class="link" href="' . $link . '">' . esc_html__( 'This post doesn\'t have any gallery images, please add some!', 'coaching' ) . '</a></div>';
				} else {
					echo '<div class="thim-gallery-message">' . esc_html__( 'This post doesn\'t have any gallery images, please add some!', 'coaching' ) . '</div>';
				}

			}
		}
		$output = ob_get_contents();
		ob_end_clean();
		echo ent2ncr( $output );
		die();
	}
}


//Function ajax widget gallery-videos
add_action( 'wp_ajax_thim_gallery_video', 'thim_gallery_video' );
add_action( 'wp_ajax_nopriv_thim_gallery_video', 'thim_gallery_video' );
/** widget gallery videos ajax output **/
if ( ! function_exists( 'thim_gallery_video' ) ) {
	function thim_gallery_video() {
		global $post;
		$post_id = $_POST["post_id"];
		$post    = get_post( $post_id );
		$video   = thim_meta_theme( 'thim_video' );
		// Get category permalink
		ob_start();
		echo '<div class="thim-gallery-video-content">';
		if ( filter_var( $video, FILTER_VALIDATE_URL ) ) {
			if ( $video_temp = @wp_oembed_get( $video ) ) {
				echo ent2ncr( $video_temp );
			}
		} // If embed code: just display
		else {
			echo ent2ncr( $video );
		}
		echo '</div>';
		//		?>

		<?php
		$output = ob_get_contents();
		ob_end_clean();
		echo ent2ncr( $output );
		die();
	}
}


//Action call reload page when change font on preview box
function thim_chameleon_add_script_reload() {
	?>
	location.reload();
	<?php
}

add_action( 'tp_chameleon_script_after_change_body_font', 'thim_chameleon_add_script_reload' );
add_action( 'tp_chameleon_script_after_change_heading_font', 'thim_chameleon_add_script_reload' );


//Remove action single event
remove_action( 'tp_event_after_loop_event_item', 'event_auth_register' );
if ( class_exists( 'WPEMS' ) ) {
	remove_action( 'tp_event_after_single_event', 'wpems_single_event_register' );
} else {
	remove_action( 'tp_event_after_single_event', 'event_auth_register' );
}

add_filter( 'event_auth_create_pages', 'thim_remove_create_page_action_event_auth' );
if ( ! function_exists( 'thim_remove_create_page_action_event_auth' ) ) {
	function thim_remove_create_page_action_event_auth( $return ) {
		return false;
	}
}

add_filter( 'event_auth_login_url', 'thim_get_login_page_url' );


add_action( 'wp_head', 'thim_define_ajaxurl', 1000 );
if ( ! function_exists( 'thim_define_ajaxurl' ) ) {
	function thim_define_ajaxurl() {
		?>
		<script type="text/javascript">
            if (typeof ajaxurl === 'undefined') {
                /* <![CDATA[ */
                var ajaxurl = "<?php echo esc_js( admin_url( 'admin-ajax.php' ) ); ?>";
                /* ]]> */
            }
		</script>
		<?php
	}
}


//Ajax widget login-popup
add_action( 'wp_ajax_nopriv_thim_login_ajax', 'thim_login_ajax_callback' );
add_action( 'wp_ajax_thim_login_ajax', 'thim_login_ajax_callback' );
if ( ! function_exists( 'thim_login_ajax_callback' ) ) {
	function thim_login_ajax_callback() {
		//ob_start();
		if ( empty( $_REQUEST['data'] ) ) {
			$response_data = array(
				'code'    => - 1,
				'message' => '<p class="message message-error">' . esc_html__( 'Something wrong. Please try again.', 'coaching' ) . '</p>'
			);
		} else {

			parse_str( $_REQUEST['data'], $login_data );

			foreach ( $login_data as $k => $v ) {
				$_POST[ $k ] = $v;
			}

			$user_verify = wp_signon( array(), is_ssl() );

			$code    = 1;
			$message = '';

			if ( is_wp_error( $user_verify ) ) {
				if ( ! empty( $user_verify->errors ) ) {
					$errors = $user_verify->errors;

					if ( ! empty( $errors['gglcptch_error'] ) ) {
						$message = '<p class="message message-error">' . esc_html__( 'You have entered an incorrect reCAPTCHA value.', 'coaching' ) . '</p>';
					} elseif ( ! empty( $errors['invalid_username'] ) || ! empty( $errors['incorrect_password'] ) ) {
						$message = '<p class="message message-error">' . esc_html__( 'Invalid username or password. Please try again!', 'coaching' ) . '</p>';
					} else if ( ! empty( $errors['cptch_error'] ) && is_array( $errors['cptch_error'] ) ) {
						foreach ( $errors['cptch_error'] as $key => $value ) {
							$message .= '<p class="message message-error">' . $value . '</p>';
						}
					} else {
						$message = '<p class="message message-error">' . esc_html__( 'Something wrong. Please try again.', 'coaching' ) . '</p>';
					}
				} else {
					$message = '<p class="message message-error">' . esc_html__( 'Something wrong. Please try again.', 'coaching' ) . '</p>';
				}
				$code = - 1;
			} else {
				$message = '<p class="message message-success">' . esc_html__( 'Login successful, redirecting...', 'coaching' ) . '</p>';
			}

			$response_data = array(
				'code'    => $code,
				'message' => $message
			);

			if ( ! empty( $login_data['redirect_to'] ) ) {
				$response_data['redirect'] = $login_data['redirect_to'];
			}
		}
		echo json_encode( $response_data );
		die(); // this is required to return a proper result
	}
}

/**
 * tunn added 04 Apr 2016
 */

if ( class_exists( 'TP_Event_Authentication' ) ) {
	$auth = TP_Event_Authentication::getInstance()->auth;

	remove_action( 'login_form_login', array( $auth, 'redirect_to_login_page' ) );
	remove_action( 'login_form_register', array( $auth, 'login_form_register' ) );
	remove_action( 'login_form_lostpassword', array( $auth, 'redirect_to_lostpassword' ) );
	remove_action( 'login_form_rp', array( $auth, 'resetpass' ) );
	remove_action( 'login_form_resetpass', array( $auth, 'resetpass' ) );

	remove_action( 'wp_logout', array( $auth, 'wp_logout' ) );
	remove_filter( 'login_url', array( $auth, 'login_url' ) );

}

function thim_redirect_rp_url() {
	if (
		! empty( $_REQUEST['action'] ) && $_REQUEST['action'] == 'rp'
		&& ! empty( $_REQUEST['key'] ) && ! empty( $_REQUEST['login'] )
	) {
		$reset_link = add_query_arg(
			array(
				'action' => 'rp',
				'key'    => $_REQUEST['key'],
				'login'  => rawurlencode( $_REQUEST['login'] )
			), thim_get_login_page_url()
		);

		if ( ! thim_is_current_url( $reset_link ) ) {
			wp_redirect( $reset_link );
			exit();
		}
	}
}

/**
 * Add action if without using wpengine
 */
if ( ! function_exists( 'is_wpe' ) && ! function_exists( 'is_wpe_snapshot' ) ) {
	add_action( 'init', 'thim_redirect_rp_url' );
}

if ( ! function_exists( 'thim_get_current_url' ) ) {
	function thim_get_current_url() {
		static $current_url;
		if ( ! $current_url ) {
			if ( ! empty( $_REQUEST['login'] ) ) {
				$url = add_query_arg( array( 'login' => rawurlencode( $_REQUEST['login'] ) ) );
			} else {
				$url = add_query_arg();
			}

			if ( ! preg_match( '!^https?!', $url ) ) {
				$segs1 = explode( '/', get_site_url() );
				$segs2 = explode( '/', $url );
				if ( $removed = array_intersect( $segs1, $segs2 ) ) {
					$segs2 = array_diff( $segs2, $removed );
					$url   = get_site_url() . '/' . join( '/', $segs2 );
				}
			}

			$current_url = $url;

		}

		return $current_url;
	}
}
if ( ! function_exists( 'thim_is_current_url' ) ) {
	function thim_is_current_url( $url ) {
		return strcmp( thim_get_current_url(), $url ) == 0;
	}
}

//Filter post_status tp_event
if ( ! function_exists( 'thim_get_upcoming_events' ) ) {
	function thim_get_upcoming_events( $args = array() ) {
		if ( is_tax( 'tp_event_category' ) ) {
			if ( version_compare( WPEMS_VER, '2.1.5', '>=' ) ) {
				$args = wp_parse_args(
					$args,
					array(
						'post_type'  => 'tp_event',
						'meta_query' => array(
							array(
								'key'     => 'tp_event_status',
								'value'   => 'upcoming',
								'compare' => '=',
							),
						),
						'tax_query'  => array(
							array(
								'taxonomy' => 'tp_event_category',
								'field'    => 'slug',
								'terms'    => get_query_var( 'term' ),
							)
						),
					)
				);
			} else {
				$args = wp_parse_args(
					$args,
					array(
						'post_type'   => 'tp_event',
						'post_status' => 'tp-event-upcoming',
						'tax_query'   => array(
							array(
								'taxonomy' => 'tp_event_category',
								'field'    => 'slug',
								'terms'    => get_query_var( 'term' ),
							)
						),
					)
				);
			}
		} else {
			if ( version_compare( WPEMS_VER, '2.1.5', '>=' ) ) {
				$args = wp_parse_args(
					$args,
					array(
						'post_type'  => 'tp_event',
						'meta_query' => array(
							array(
								'key'     => 'tp_event_status',
								'value'   => 'upcoming',
								'compare' => '=',
							),
						),
					)
				);
			} else {
				$args = wp_parse_args(
					$args,
					array(
						'post_type'   => 'tp_event',
						'post_status' => 'tp-event-upcoming',
					)
				);
			}
		}


		return new WP_Query( $args );
	}
}

if ( ! function_exists( 'thim_get_expired_events' ) ) {
	function thim_get_expired_events( $args = array() ) {
		if ( is_tax( 'tp_event_category' ) ) {
			if ( version_compare( WPEMS_VER, '2.1.5', '>=' ) ) {
				$args = wp_parse_args(
					$args,
					array(
						'post_type'  => 'tp_event',
						'meta_query' => array(
							array(
								'key'     => 'tp_event_status',
								'value'   => 'expired',
								'compare' => '=',
							),
						),
						'tax_query'  => array(
							array(
								'taxonomy' => 'tp_event_category',
								'field'    => 'slug',
								'terms'    => get_query_var( 'term' ),
							)
						),
					)
				);
			} else {
				$args = wp_parse_args(
					$args,
					array(
						'post_type'   => 'tp_event',
						'post_status' => 'tp-event-expired',
						'tax_query'   => array(
							array(
								'taxonomy' => 'tp_event_category',
								'field'    => 'slug',
								'terms'    => get_query_var( 'term' ),
							)
						),
					)
				);
			}
		} else {
			if ( version_compare( WPEMS_VER, '2.1.5', '>=' ) ) {
				$args = wp_parse_args(
					$args,
					array(
						'post_type'  => 'tp_event',
						'meta_query' => array(
							array(
								'key'     => 'tp_event_status',
								'value'   => 'expired',
								'compare' => '=',
							),
						),
					)
				);
			} else {
				$args = wp_parse_args(
					$args,
					array(
						'post_type'   => 'tp_event',
						'post_status' => 'tp-event-expired',
					)
				);
			}
		}

		return new WP_Query( $args );
	}
}

if ( ! function_exists( 'thim_get_happening_events' ) ) {
	function thim_get_happening_events( $args = array() ) {
		if ( is_tax( 'tp_event_category' ) ) {
			if ( version_compare( WPEMS_VER, '2.1.5', '>=' ) ) {
				$args = wp_parse_args(
					$args,
					array(
						'post_type'  => 'tp_event',
						'meta_query' => array(
							array(
								'key'     => 'tp_event_status',
								'value'   => 'happening',
								'compare' => '=',
							),
						),
						'tax_query'  => array(
							array(
								'taxonomy' => 'tp_event_category',
								'field'    => 'slug',
								'terms'    => get_query_var( 'term' ),
							)
						),
					)
				);
			} else {
				$args = wp_parse_args(
					$args,
					array(
						'post_type'   => 'tp_event',
						'post_status' => 'tp-event-happenning',
						'tax_query'   => array(
							array(
								'taxonomy' => 'tp_event_category',
								'field'    => 'slug',
								'terms'    => get_query_var( 'term' ),
							)
						),
					)
				);
			}
		} else {
			if ( version_compare( WPEMS_VER, '2.1.5', '>=' ) ) {
				$args = wp_parse_args(
					$args,
					array(
						'post_type'  => 'tp_event',
						'meta_query' => array(
							array(
								'key'     => 'tp_event_status',
								'value'   => 'happening',
								'compare' => '=',
							),
						),
					)
				);
			} else {
				$args = wp_parse_args(
					$args,
					array(
						'post_type'   => 'tp_event',
						'post_status' => 'tp-event-happenning',
					)
				);
			}
		}

		return new WP_Query( $args );
	}
}

if ( ! function_exists( 'thim_archive_event_template' ) ) {
	function thim_archive_event_template( $template ) {
		if ( get_post_type() == 'tp_event' && is_post_type_archive( 'tp_event' ) || is_tax( 'tp_event_category' ) ) {
			$GLOBALS['thim_happening_events'] = thim_get_happening_events();
			$GLOBALS['thim_upcoming_events']  = thim_get_upcoming_events();
			$GLOBALS['thim_expired_events']   = thim_get_expired_events();
		}

		return $template;
	}
}
add_action( 'template_include', 'thim_archive_event_template' );


function thim_get_nav_single_event( $event_id = null ) {

	if ( ! $event_id ) {
		$event_id = get_the_ID();
	}

	$post_status = get_post_status( $event_id );

	global $wpdb;
	$query = $wpdb->get_col( $wpdb->prepare(
		"
				  SELECT      t1.id
				  FROM        $wpdb->posts AS t1
				  WHERE t1.post_type = %s
				  ORDER BY post_date ASC
				  ",
		'tp_event'
	) );

	$key = array_search( $event_id, $query );

	$navigation = array();

	if ( $key != '0' ) {
		$navigation['prev_event'] = $query[ $key - 1 ];
	}

	if ( $key < count( $query ) - 1 ) {
		$navigation['next_event'] = $query[ $key + 1 ];
	}

	return $navigation;
}

if ( ! function_exists( 'thim_add_testimonial' ) ) {
	function thim_add_testimonial() {
		$meta_boxes[] = array(
			'id'     => 'testimonials_settings',
			'title'  => 'Testimonials Settings',
			'pages'  => array( 'testimonials' ),
			'fields' => array(

				array(
					'name' => esc_html__( 'Regency', 'coaching' ),
					'id'   => 'regency',
					'type' => 'textfield',
					'desc' => ''
				),
				array(
					'name' => esc_html__( 'Author', 'coaching' ),
					'id'   => 'author',
					'type' => 'textfield',
					'desc' => ''
				),

				array(
					'name' => esc_html__( 'Website URL', 'coaching' ),
					'id'   => 'website_url',
					'type' => 'textfield',
					'desc' => ''
				),
			)
		);

		return $meta_boxes;
	}
}
add_filter( 'testimonials_meta_boxes', 'thim_add_testimonial', 21 );


/**
 * @param $settings
 *
 * @return array
 */
if ( ! function_exists( 'thim_update_metabox_settings' ) ) {
	function thim_update_metabox_settings( $settings ) {
		$settings[] = 'lp_course';
		$settings[] = 'tp_event';

		return $settings;
	}
}

add_filter( 'thim_framework_metabox_settings', 'thim_update_metabox_settings' );


// Custom JS option
if ( ! function_exists( 'thim_add_custom_js' ) ) {
	function thim_add_custom_js() {
		$theme_options_data = get_theme_mods();
		if ( ! empty( $theme_options_data['thim_custom_js'] ) ) {
			?>
			<script data-cfasync="false" type="text/javascript">
				<?php echo ent2ncr( $theme_options_data['thim_custom_js'] ); ?>
			</script>
			<?php
		}
		//Add code js to open login-popup if not logged in.
		$enable_single_popup = get_theme_mod( 'thim_learnpress_single_popup', true );
		global $post;
		$redirect_url = '';
		if ( ! empty( $post->ID ) && get_option( 'permalink_structure' ) ) {
			$redirect_url = add_query_arg( array(
				'enroll-course' => $post->ID,
			), get_the_permalink( $post->ID ) );
		}
		if ( $enable_single_popup && is_singular( 'lp_course' ) ) {
			?>
			<script data-cfasync="true" type="text/javascript">
				(function($) {
					'use strict';
					$(document).
						on('click',
							'body:not(".logged-in") .enroll-course .button-enroll-course, body:not(".logged-in") .purchase-course:not(".guest_checkout,.learn-press-pmpro-buy-membership ") .button',
							function(e) {
								if ($(window).width() > 767) {
									if ($('.thim-login-popup .login').length > 0) {
										e.preventDefault();
										$('#thim-popup-login #loginform [name="redirect_to"]').
											val('<?php echo $redirect_url; ?>');
										$('.thim-login-popup .login').trigger('click');
									}
								} else {
									e.preventDefault();
									$(this).
										parent().
										find('[name="redirect_to"]').
										val('<?php echo thim_get_login_page_url(); ?>?redirect_to=<?php echo urlencode( $redirect_url ); ?>');
									var redirect = $(this).parent().find('[name="redirect_to"]').val();
									window.location = redirect;
								}
								if ($('#thim-popup-login .register').length > 0) {
									$('#thim-popup-login .register').each(function() {
										var link = $(this).attr('href'),
											new_link = link +
												'<?php echo ! empty( $redirect_url ) ? '&redirect_to=' . $redirect_url : ''; ?>';
										$(this).prop('href', new_link);
									});
								}
							});
				})(jQuery);
			</script>
			<?php
		} else {
			?>
			<script data-cfasync="true" type="text/javascript">
				(function($) {
					'use strict';
					$(document).
						on('click',
							'body:not(".logged-in") .enroll-course .button-enroll-course, body:not(".logged-in") .purchase-course:not(".guest_checkout") .button, body:not(".logged-in") .purchase-course:not(".guest_checkout,.learn-press-pmpro-buy-membership") .button',
							function(e) {
								e.preventDefault();
								$(this).
									parent().
									find('[name="redirect_to"]').
									val('<?php echo thim_get_login_page_url(); ?>?redirect_to=<?php echo $redirect_url; ?>');
								var redirect = $(this).parent().find('[name="redirect_to"]').val();
								window.location = redirect;
							});
				})(jQuery);
			</script>
			<?php
		}
	
	}

}
add_action( 'wp_footer', 'thim_add_custom_js' );

if ( ! function_exists( 'thim_oembed_filter' ) ) {
	function thim_oembed_filter( $return, $data, $url ) {
		$return = str_replace( 'frameborder="0"', 'style="border: none"', $return );

		return $return;
	}
}
add_filter( 'oembed_dataparse', 'thim_oembed_filter', 90, 3 );

if ( ! function_exists( 'thim_search_form' ) ) {
	function thim_search_form( $form ) {
		$form = '
    <div class="layout-overlay">
		<div class="search-popup-bg"></div>
	    <form role="search" method="get" class="search-form" action="' . home_url( '/' ) . '" >
		    <label>
				<span class="screen-reader-text">' . esc_html__( 'Search for:', 'coaching' ) . '</span>
				<input type="search" class="search-field" placeholder="' . esc_html__( 'Search ...', 'coaching' ) . '" value="" name="s" />
			</label>
		    <button type="submit" class="search-submit" value="' . esc_html__( 'Search', 'coaching' ) . '">
		    	<i class="fa fa-search"></i>
		    </button>
	    </form>
	</div>';

		return $form;
	}

}
add_filter( 'get_search_form', 'thim_search_form', 100 );

if ( ! function_exists( 'thim_meta_theme' ) ) {
	function thim_meta_theme( $key, $args = array(), $post_id = null ) {
		$post_id = empty( $post_id ) ? get_the_ID() : $post_id;

		$args = wp_parse_args( $args, array(
			'type' => 'text',
		) );

		// Image
		if ( in_array( $args['type'], array( 'image' ) ) ) {
			if ( isset( $args['single'] ) && $args['single'] == "false" ) {
				// Gallery
				$temp = array();
				$data = array();

				$attachment_id = get_post_meta( $post_id, $key, true );
				if ( ! $attachment_id ) {
					return $data;
				}
				$value = explode( ',', $attachment_id );

				if ( empty( $value ) ) {
					return $data;
				}
				foreach ( $value as $k => $v ) {
					$image_attributes = wp_get_attachment_image_src( $v, $args['size'] );
					$temp['url']      = $image_attributes[0];
					$data[]           = $temp;
				}

				return $data;
			} else {
				// Single Image
				$attachment_id    = get_post_meta( $post_id, $key, true );
				$image_attributes = wp_get_attachment_image_src( $attachment_id, $args['size'] );

				return $image_attributes;
			}
		}

		return get_post_meta( $post_id, $key, $args );
	}
}


//Remove share super-socializer
remove_filter( 'the_content', 'the_champ_render_sharing' );
remove_filter( 'the_excerpt', 'the_champ_render_sharing' );
remove_action( 'bp_activity_entry_meta', 'the_champ_render_sharing', 999 );
remove_action( 'bp_before_group_header', 'the_champ_render_sharing' );
remove_filter( 'bbp_get_reply_content', 'the_champ_render_sharing' );
remove_filter( 'bbp_template_before_single_forum', 'the_champ_render_sharing' );
remove_filter( 'bbp_template_before_single_topic', 'the_champ_render_sharing' );
remove_filter( 'bbp_template_before_lead_topic', 'the_champ_render_sharing' );
remove_filter( 'bbp_template_after_single_forum', 'the_champ_render_sharing' );
remove_filter( 'bbp_template_after_single_topic', 'the_champ_render_sharing' );
remove_filter( 'bbp_template_after_lead_topic', 'the_champ_render_sharing' );
remove_action( 'woocommerce_after_shop_loop_item', 'the_champ_render_sharing' );
remove_action( 'woocommerce_share', 'the_champ_render_sharing' );
remove_action( 'woocommerce_thankyou', 'the_champ_render_sharing' );


add_filter( 'the_champ_login_interface_filter', 'thim_custom_layout_super_social', 10, 2 );
function thim_custom_layout_super_social( $theChampLoginOptions, $widget ) {
	global $theChampLoginOptions;
	$html = the_champ_login_notifications( $theChampLoginOptions );
	if ( ! $widget ) {
		$html .= '<div class="the_champ_outer_login_container">';
		if ( isset( $theChampLoginOptions['title'] ) && $theChampLoginOptions['title'] != '' ) {
			$html .= '<div class="the_champ_social_login_title">' . $theChampLoginOptions['title'] . '</div>';
		}
	}
	$html .= '<div class="the_champ_login_container"><ul class="the_champ_login_ul">';
	if ( isset( $theChampLoginOptions['providers'] ) && is_array( $theChampLoginOptions['providers'] ) && count( $theChampLoginOptions['providers'] ) > 0 ) {
		foreach ( $theChampLoginOptions['providers'] as $provider ) {
			$html .= '<li><a ';
			// id
			if ( $provider == 'google' ) {
				$html .= 'id="theChamp' . ucfirst( $provider ) . 'Button" ';
			}
			// class
			$html .= 'class="theChampLogin theChamp' . ucfirst( $provider ) . 'Background theChamp' . ucfirst( $provider ) . 'Login" ';
			//$html .= 'alt="Login with ';
			//$html .= ucfirst( $provider );
			$html .= ' title="' . esc_html__( 'Login with ', 'coaching' );
			if ( $provider == 'live' ) {
				$html .= esc_html__( 'Windows Live', 'coaching' );
			} else {
				$html .= ucfirst( $provider );
			}
			if ( current_filter() == 'comment_form_top' || current_filter() == 'comment_form_must_log_in_after' ) {
				$html .= '" onclick="theChampCommentFormLogin = true; theChampInitiateLogin(this)" >';
			} else {
				$html .= '" onclick="theChampInitiateLogin(this)" >';
			}
			$html .= '<i style="display:block" class="theChampLoginSvg theChamp' . ucfirst( $provider ) . 'LoginSvg"></i></a></li>';
		}
	}
	$html .= '</ul></div>';
	if ( ! $widget ) {
		$html .= '</div><div style="clear:both; margin-bottom: 6px"></div>';
	}

	return $html;
}

//add wishlist link to shop detail
if ( thim_plugin_active( 'yith-woocommerce-wishlist/init.php' ) ) {
	add_action( 'woocommerce_single_product_summary', 'thim_add_wishlist', 100 );
	function thim_add_wishlist() {
		$url = substr( YITH_WCWL()->get_wishlist_url(), 0, - 5 );
		if ( function_exists( 'YITH_WCWL' ) && YITH_WCWL()->count_products() ): ?>
			<a class="wishlist-link" href="<?php echo esc_url( $url ) ?>"><?php esc_html_e( 'View wishlist', 'coaching' ) ?></a>
		<?php endif;

	}
}
//Filter wordpress search widget
if ( ! function_exists( 'thim_search_widget_filter' ) ) {
	function thim_search_widget_filter( $query ) {
		if ( ! is_admin() && $query->is_main_query() ) {
			if ( $query->is_search ) {
				wp_reset_query();
				if ( empty( $_REQUEST['post_type'] ) ) {
					$query->set( 'post_type', array( 'post', 'page' ) );
				}
				//$query->set( 'post_type', array( 'post', 'page' ) );
				$query->set( 'post_status', array( 'publish' ) );
			}
		}
	}
}
remove_filter( 'pre_get_posts', 'learn_press_query_taxonomy' );
add_action( 'pre_get_posts', 'thim_search_widget_filter', 1000 );


/**
 * LearnPress section
 */

if ( class_exists( 'LearnPress' ) ) {
	function thim_new_learnpress_template_path( $slash ) {
		if ( thim_is_new_learnpress( '4.0' ) ) {
			$layout = '-v4';
		} else {
			$layout = '-v3';
		}

		return 'learnpress' . $layout;
	}

	if ( thim_is_new_learnpress( '4.0' ) ) {
		$layout = '-v4';
	} else {
		$layout = '-v3';
	}

	add_filter( 'learn_press_template_path', 'thim_new_learnpress_template_path', 999 );
	require_once THIM_DIR . 'inc/learnpress-functions.php';
	require_once THIM_DIR . 'inc/learnpress' . $layout . '-functions.php';
}

/**
 * Check new version of LearnPress
 *
 * @return mixed
 */
function thim_is_new_learnpress( $version ) {
	if ( defined( 'LEARNPRESS_VERSION' ) ) {
		return version_compare( LEARNPRESS_VERSION, $version, '>=' );
	} else {
		return version_compare( get_option( 'learnpress_version' ), $version, '>=' );
	}
}

/**
 * Check new version of addons LearnPress woo
 *
 * @return mixed
 */
function thim_is_version_addons_woo( $version ) {
	if ( defined( 'LP_ADDON_WOOCOMMERCE_PAYMENT_VER' ) ) {
		return ( version_compare( LP_ADDON_WOOCOMMERCE_PAYMENT_VER, $version, '>=' ) && version_compare( LP_ADDON_WOOCOMMERCE_PAYMENT_VER, (int) $version + 1, '<' ) );
	}

	return false;
}

/**
 * Check new version of addons LearnPress course review
 *
 * @return mixed
 */
function thim_is_version_addons_review( $version ) {
	if ( defined( 'LP_ADDON_COURSE_REVIEW_VER' ) ) {
		return ( version_compare( LP_ADDON_COURSE_REVIEW_VER, $version, '>=' ) && version_compare( LP_ADDON_COURSE_REVIEW_VER, (int) $version + 1, '<' ) );
	}

	return false;
}

/**
 * Check new version of addons LearnPress bbpress
 *
 * @return mixed
 */
function thim_is_version_addons_bbpress( $version ) {
	if ( defined( 'LP_ADDON_BBPRESS_VER' ) ) {
		return ( version_compare( LP_ADDON_BBPRESS_VER, $version, '>=' ) && version_compare( LP_ADDON_BBPRESS_VER, (int) $version + 1, '<' ) );
	}

	return false;
}

/**
 * Check new version of addons LearnPress certificate
 *
 * @return mixed
 */
function thim_is_version_addons_certificates( $version ) {
	if ( defined( 'LP_ADDON_CERTIFICATES_VER' ) ) {
		return ( version_compare( LP_ADDON_CERTIFICATES_VER, $version, '>=' ) && version_compare( LP_ADDON_CERTIFICATES_VER, (int) $version + 1, '<' ) );
	}

	return false;
}

/**
 * Check new version of addons LearnPress wishlist
 *
 * @return mixed
 */
function thim_is_version_addons_wishlist( $version ) {
	if ( defined( 'LP_ADDON_WISHLIST_VER' ) ) {
		return ( version_compare( LP_ADDON_WISHLIST_VER, $version, '>=' ) && version_compare( LP_ADDON_WISHLIST_VER, (int) $version + 1, '<' ) );
	}

	return false;
}

/**
 * Check new version of addons LearnPress Co-instructor
 *
 * @return mixed
 */
function thim_is_version_addons_instructor( $version ) {
	if ( defined( 'LP_ADDON_CO_INSTRUCTOR_VER' ) ) {
		return ( version_compare( LP_ADDON_CO_INSTRUCTOR_VER, $version, '>=' ) && version_compare( LP_ADDON_CO_INSTRUCTOR_VER, (int) $version + 1, '<' ) );
	}

	return false;
}


if ( ! function_exists( 'thim_check_is_course' ) ) {
	function thim_check_is_course() {

		if ( function_exists( 'learn_press_is_courses' ) && learn_press_is_courses() ) {
			return true;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'thim_check_is_course_taxonomy' ) ) {
	function thim_check_is_course_taxonomy() {

		if ( function_exists( 'learn_press_is_course_taxonomy' ) && learn_press_is_course_taxonomy() ) {
			return true;
		} else {
			return false;
		}
	}
}


function thim_allowAuthorEditing() {
	add_post_type_support( 'lp_course', 'author' );
}

add_action( 'init', 'thim_allowAuthorEditing' );

if ( ! function_exists( 'thim_time_ago' ) ) {
	function thim_time_ago( $time ) {
		$periods = array(
			esc_html__( 'second', 'coaching' ),
			esc_html__( 'minute', 'coaching' ),
			esc_html__( 'hour', 'coaching' ),
			esc_html__( 'day', 'coaching' ),
			esc_html__( 'week', 'coaching' ),
			esc_html__( 'month', 'coaching' ),
			esc_html__( 'year', 'coaching' ),
			esc_html__( 'decade', 'coaching' ),
		);
		$lengths = array(
			'60',
			'60',
			'24',
			'7',
			'4.35',
			'12',
			'10'
		);


		$now = time();

		$difference = $now - $time;
		$tense      = esc_html__( 'ago', 'coaching' );

		for ( $j = 0; $difference >= $lengths[ $j ] && $j < count( $lengths ) - 1; $j ++ ) {
			$difference /= $lengths[ $j ];
		}

		$difference = round( $difference );

		if ( $difference != 1 ) {
			$periods[ $j ] .= "s";
		}

		return "$difference $periods[$j] $tense";
	}
}

//Filter image all-demo tp-chameleon
if ( ! function_exists( 'thim_override_demo_image_tp_chameleon' ) ) {
	function thim_override_demo_image_tp_chameleon() {
		return THIM_URI . 'images/chameleon-coaching.jpg';
	}
}
add_filter( 'tp_chameleon_get_image_sprite_demos', 'thim_override_demo_image_tp_chameleon' );

/**
 * Remove redirect register url buddypress
 */
remove_filter( 'register_url', 'bp_get_signup_page' );
remove_action( 'bp_init', 'bp_core_wpsignup_redirect' );

if ( ! function_exists( 'thim_ssl_secure_url' ) ) {
	function thim_ssl_secure_url( $sources ) {
		$scheme = parse_url( site_url(), PHP_URL_SCHEME );
		if ( 'https' == $scheme ) {
			if ( stripos( $sources, 'http://' ) === 0 ) {
				$sources = 'https' . substr( $sources, 4 );
			}

			return $sources;
		}

		return $sources;
	}
}

if ( ! function_exists( 'thim_ssl_secure_image_srcset' ) ) {
	function thim_ssl_secure_image_srcset( $sources ) {
		$scheme = parse_url( site_url(), PHP_URL_SCHEME );
		if ( 'https' == $scheme ) {
			foreach ( $sources as &$source ) {
				if ( stripos( $source['url'], 'http://' ) === 0 ) {
					$source['url'] = 'https' . substr( $source['url'], 4 );
				}
			}

			return $sources;
		}

		return $sources;
	}
}

add_filter( 'wp_calculate_image_srcset', 'thim_ssl_secure_image_srcset' );
add_filter( 'wp_get_attachment_url', 'thim_ssl_secure_url', 1000 );
add_filter( 'image_widget_image_url', 'thim_ssl_secure_url' );

//add_query_arg('redirect_to', get_permalink(), get_permalink());

/**
 * Footer Bottom
 */
if ( ! function_exists( 'thim_footer_bottom' ) ) {
	function thim_footer_bottom() {
		if ( is_active_sidebar( 'footer_bottom' ) ) {
			$fb_style         = '';
			$footer_bottom_bg = get_theme_mod( 'thim_footer_bottom_bg_img', false );
			if ( ! empty( $footer_bottom_bg ) ) {
				if ( is_numeric( $footer_bottom_bg ) ) {
					$url_bg   = wp_get_attachment_image_src( $footer_bottom_bg, 'full' );
					$fb_style = ! empty( $url_bg[0] ) ? 'style="background-image: url(' . $url_bg[0] . ');"' : '';
				} else {
					$fb_style = 'style="background-image: url(' . $footer_bottom_bg . ');"';
				}
			}
			?>
			<div class="footer-bottom">
				<?php if ( ! empty( $fb_style ) ) : ?>
					<div class="thim-bg-overlay-color-half" <?php echo ent2ncr( $fb_style ); ?> >
						<div class="container">
							<?php dynamic_sidebar( 'footer_bottom' ); ?>
						</div>
					</div>
				<?php else : ?>
					<div class="container">
						<?php dynamic_sidebar( 'footer_bottom' ); ?>
					</div>
				<?php endif; ?>
			</div>
		<?php }
	}
}
add_action( 'thim_end_content_pusher', 'thim_footer_bottom' );

/**
 * Footer Class
 */
if ( ! function_exists( 'thim_footer_class' ) ) {
	function thim_footer_class() {
		$footer_class = is_active_sidebar( 'footer_bottom' ) ? ' has-footer-bottom ' : '';
		$custom_class = get_theme_mod( 'thim_footer_custom_class', '' );
        $footer_bg_image    = get_theme_mod( 'thim_footer_background_img', '' );
        $custom_class       .= ! empty( $footer_bg_image ) ? ' footer-bg-image' : '';

		$footer_class .= $custom_class;

		echo esc_attr( $footer_class );
	}
}

/**
 * Check and update term meta for tax meta class
 */
if ( ! get_option( 'thim_update_tax_meta', false ) ) {
	global $wpdb;
	$querystr      = "
	    SELECT option_name, option_value
	    FROM $wpdb->options
	    WHERE $wpdb->options.option_name LIKE 'tax_meta_%'
	 ";
	$list_tax_meta = $wpdb->get_results( $querystr );

	if ( ! empty( $list_tax_meta ) ) {
		foreach ( $list_tax_meta as $tax_meta ) {
			$term_id   = str_replace( 'tax_meta_', '', $tax_meta->option_name );
			$term_meta = unserialize( $tax_meta->option_value );
			if ( is_array( $term_meta ) && ! empty( $term_meta ) ) {
				foreach ( $term_meta as $key => $value ) {
					if ( is_array( $value ) ) {
						if ( ! empty( $value['src'] ) ) {
							$value['url'] = $value['src'];
							unset( $value['src'] );
						}
					}
					update_term_meta( $term_id, $key, $value );
				}
			}
		}
	}
	update_option( 'thim_update_tax_meta', '1' );
}

/**
 * Filter demos path
 */
function thim_filter_site_demos( $demo_datas ) {
	$demo_data_file_path = get_template_directory() . '/inc/data/demos.php';
	if ( is_file( $demo_data_file_path ) ) {
		require $demo_data_file_path;
	}

	return $demo_datas;
}

add_filter( 'tp_chameleon_get_site_demos', 'thim_filter_site_demos' );


/**
 * Check import demo data page-builder
 */
add_action( 'wp_ajax_thim_update_theme_mods', 'thim_import_demo_page_builder' );
if ( ! function_exists( 'thim_import_demo_page_builder' ) ) {
    function thim_import_demo_page_builder() {
        $thim_key   = sanitize_text_field( $_POST["thim_key"] );
        $thim_value = sanitize_text_field( $_POST["thim_value"] );

        if ( ! is_multisite() ) {
            $active_plugins = get_option( 'active_plugins' );

            if ( $thim_value == 'visual_composer' ) {
                if ( $site_origin = array_search( 'siteorigin-panels/siteorigin-panels.php', $active_plugins ) ) {
                    unset( $active_plugins[ $site_origin ] );
                }

                if ( $elementor = array_search( 'elementor/elementor.php', $active_plugins ) ) {
                    unset( $active_plugins[ $elementor ] );
                }

                if ( ! in_array( 'js_composer/js_composer.php', $active_plugins ) ) {
                    $active_plugins[] = 'js_composer/js_composer.php';
                }
            } else if ( $thim_value == 'site_origin' ) {
                if ( $visual_composer = array_search( 'js_composer/js_composer.php', $active_plugins ) ) {
                    unset( $active_plugins[ $visual_composer ] );
                }

                if ( $elementor = array_search( 'elementor/elementor.php', $active_plugins ) ) {
                    unset( $active_plugins[ $elementor ] );
                }

                if ( ! in_array( 'siteorigin-panels/siteorigin-panels.php', $active_plugins ) ) {
                    $active_plugins[] = 'siteorigin-panels/siteorigin-panels.php';
                }
            } else if ( $thim_value == 'elementor' ) {
                if ( $visual_composer = array_search( 'js_composer/js_composer.php', $active_plugins ) ) {
                    unset( $active_plugins[ $visual_composer ] );
                }

                if ( $site_origin = array_search( 'siteorigin-panels/siteorigin-panels.php', $active_plugins ) ) {
                    unset( $active_plugins[ $site_origin ] );
                }

                if ( ! in_array( 'elementor/elementor.php', $active_plugins ) ) {
                    $active_plugins[] = 'elementor/elementor.php';
                }
            }

            update_option( 'active_plugins', $active_plugins );
        }

        if ( empty( $thim_key ) || empty( $thim_value ) ) {
            $output = 'update fail';
        } else {
            set_theme_mod( $thim_key, $thim_value );
            $output = 'update success';
        }

        echo ent2ncr( $output );
        die();
    }
}

/**
 * @param $settings
 *
 * @return array
 */
if ( ! function_exists( 'thim_import_add_basic_settings' ) ) {
	function thim_import_add_basic_settings( $settings ) {
		$settings[] = 'learn_press_archive_course_limit';
		$settings[] = 'siteorigin_panels_settings';
		//$settings[] = 'users_can_register';
		//$settings[] = 'permalink_structure';
		//$settings[] = 'wpb_js_use_custom';
		return $settings;
	}
}
add_filter( 'thim_importer_basic_settings', 'thim_import_add_basic_settings' );

/**
 * @param $settings
 *
 * @return array
 */
if ( ! function_exists( 'thim_import_add_page_id_settings' ) ) {
	function thim_import_add_page_id_settings( $settings ) {
		$settings[] = 'learn_press_courses_page_id';
		$settings[] = 'learn_press_profile_page_id';

		return $settings;
	}
}
add_filter( 'thim_importer_page_id_settings', 'thim_import_add_page_id_settings' );

//Add info for Dashboard Admin
if ( ! function_exists( 'thim_coaching_links_guide_user' ) ) {
	function thim_coaching_links_guide_user() {
		return array(
			'docs'      => 'http://docspress.thimpress.com/coachingwp/',
			'support'   => 'https://thimpress.com/forums/forum/coaching/',
			'knowledge' => 'https://thimpress.com/knowledge-base/',
		);
	}
}
add_filter( 'thim_theme_links_guide_user', 'thim_coaching_links_guide_user' );

/**
 * Link purchase theme.
 */
if ( ! function_exists( 'thim_coaching_link_purchase' ) ) {
	function thim_coaching_link_purchase() {
		return 'https://themeforest.net/item/speaker-and-life-coach-wordpress-theme-coaching-wp/17097658?ref=thimpress&utm_source=thimcoredashboard&utm_medium=dashboard';
	}
}
add_filter( 'thim_envato_link_purchase', 'thim_coaching_link_purchase' );

/**
 * Envato id.
 */
if ( ! function_exists( 'thim_coaching_envato_item_id' ) ) {
	function thim_coaching_envato_item_id() {
		return '17097658';
	}
}
add_filter( 'thim_envato_item_id', 'thim_coaching_envato_item_id' );

/**
 * Arguments form subscribe.
 */
if ( ! function_exists( 'thim_coaching_args_form_subscribe' ) ) {
	function thim_coaching_args_form_subscribe() {
		return array(
			'user' => 'e514ab4788b7083cb36eed163',
			'form' => '1beedf87e5',
		);
	}
}
add_filter( 'thim_core_args_form_subscribe', 'thim_coaching_args_form_subscribe' );

/**
 * Default stylesheet uri.
 */
if ( ! function_exists( 'thim_coaching_style_default_uri' ) ) {
	function thim_coaching_style_default_uri() {
		return trailingslashit( get_template_directory_uri() ) . 'inc/data/default.css';
	}
}
add_filter( 'thim_style_default_uri', 'thim_coaching_style_default_uri' );

/**
 * Field name custom css theme mods.
 */
if ( ! function_exists( 'thim_coaching_field_name_custom_css_theme' ) ) {
	function thim_coaching_field_name_custom_css_theme() {
		return 'thim_custom_css';
	}
}
add_filter( 'thim_core_field_name_custom_css_theme', 'thim_coaching_field_name_custom_css_theme' );

/**
 * Waring do not re-activate Thim Framework.
 */
function thim_notify_do_not_re_active_thim_framework() {
	if ( class_exists( 'Thim_Notification' ) ) {
		$detect_upgraded = get_option( 'thim_auto_updated_theme_mods_30', false );

		if ( ! $detect_upgraded ) {
			return;
		}

		$link_delete = network_admin_url( 'plugins.php?plugin_status=inactive' );

		Thim_Notification::add_notification(
			array(
				'id'          => 'do_not_support_thim_framework',
				'type'        => 'warning',
				'content'     => sprintf( __( 'Thim Core plugin is the newest upgrade version of Thim Framework. <strong>Do not re-activate Thim Framework and <a href="%s" title="Delete Thim Framework plugin">better delete this plugin</a></strong>.', 'coaching' ), $link_delete ),
				'dismissible' => true,
				'global'      => true,
			)
		);
	}
}

//add_action( 'admin_init', 'thim_notify_do_not_re_active_thim_framework' );

/**
 * Notify fix error theme mods.
 */
function thim_notify_fix_update_failed() {
	if ( class_exists( 'Thim_Notification' ) ) {
		$detect = get_option( 'thim_coaching_fix_theme_mods_broken', false );

		if ( $detect ) {
			return;
		}

		$version = get_option( 'thim_coaching_version' );
		if ( ! empty( $version ) ) {
			if ( version_compare( $version, THIM_THEME_VERSION, '>=' ) ) {
				return;
			}
		}

		$link = admin_url( '?thim_coaching_fix_theme_mods_broken=1' );

		Thim_Notification::add_notification(
			array(
				'id'          => 'coaching_fix_update',
				'type'        => 'warning',
				'content'     => sprintf( __( '<h3>Notice</h3>If you have troubles with saving customize after update the theme, <a href="%s">please click here to fix it</a>. If not, ignore this message.', 'coaching' ), $link ),
				'dismissible' => true,
				'global'      => true,
			)
		);
	}
}

//add_action( 'admin_init', 'thim_notify_fix_update_failed' );

/**
 * Only for developer.
 */
//add_action( 'admin_init', 'thim_coaching_fix_theme_mods_broken' );
function thim_coaching_fix_theme_mods_broken() {
	$request = isset( $_GET['thim_coaching_fix_theme_mods_broken'] );
	if ( ! $request ) {
		return;
	}

	$thim_font_body = array(
		'font-family' => 'Open Sans',
		'variant'     => 'normal',
		'font-size'   => '15px',
		'line-height' => '1.7em',
		'color'       => '#666'
	);

	set_theme_mod( 'thim_font_body', $thim_font_body );

	$thim_font_title = array(
		'font-family' => 'Montserrat',
		'variant'     => '700',
		'color'       => '#333333'
	);

	set_theme_mod( 'thim_font_title', $thim_font_title );

	$thim_font_h1 = array(
		'font-size'   => '36px',
		'line-height' => '1.6em',
	);

	set_theme_mod( 'thim_font_h1', $thim_font_h1 );

	$thim_font_h2 = array(
		'font-size'   => '28px',
		'line-height' => '1.6em',
	);

	set_theme_mod( 'thim_font_h2', $thim_font_h2 );

	$thim_font_h3 = array(
		'font-size'   => '24px',
		'line-height' => '1.6em',
	);

	set_theme_mod( 'thim_font_h3', $thim_font_h3 );

	$thim_font_h4 = array(
		'font-size'   => '18px',
		'line-height' => '1.6em',
	);

	set_theme_mod( 'thim_font_h4', $thim_font_h4 );

	$thim_font_h5 = array(
		'font-size'   => '16px',
		'line-height' => '1.6em',
	);

	set_theme_mod( 'thim_font_h5', $thim_font_h5 );

	$thim_font_h6 = array(
		'font-size'   => '16px',
		'line-height' => '1.4em',
	);

	set_theme_mod( 'thim_font_h6', $thim_font_h6 );

	update_option( 'thim_coaching_fix_theme_mods_broken', true );
	if ( ! headers_sent() ) {
		wp_redirect( admin_url( 'customize.php' ) );
	}
}


function thim_coaching_register_meta_boxes_portfolio( $meta_boxes ) {
	$prefix       = 'thim_';
	$meta_boxes[] = array(
		'id'         => 'portfolio_bg_color',
		'title'      => __( 'Portfolio Meta', 'coaching' ),
		'post_types' => 'portfolio',
		'fields'     => array(
			array(
				'name' => __( 'Background Color', 'coaching' ),
				'id'   => $prefix . 'portfolio_bg_color_ef',
				'type' => 'color',
			),
		)
	);
	$meta_boxes[] = array(
		'id'         => 'post_sticky_post',
		'title'      => __( 'Post Meta', 'coaching' ),
		'post_types' => 'post',
		'fields'     => array(
			array(
				'name' => __( 'Sticky Post', 'coaching' ),
				'id'   => $prefix . 'sticky_post',
				'type' => 'checkbox',
			),
			array(
				'name'    => __( 'Number related', 'coaching' ),
				'id'      => $prefix . 'number_related',
				'type'    => 'number_related',
				'default' => 3,
				'min'     => '1',
				'max'     => '10'
			),
		)
	);
	$meta_boxes[] = array(
		'id'         => 'testimonials_image_after',
		'title'      => __( 'Testimonials Meta', 'coaching' ),
		'post_types' => 'testimonials',
		'fields'     => array(
			array(
				'name' => __( 'Image Before', 'coaching' ),
				'id'   => $prefix . 'image_before',
				'type' => 'image',
			),
			array(
				'name' => __( 'Image After', 'coaching' ),
				'id'   => $prefix . 'image_after',
				'type' => 'image',
			),
		)
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'thim_coaching_register_meta_boxes_portfolio' );

function thim_coaching_after_switch_theme() {
	update_option( 'thim_coaching_version', THIM_THEME_VERSION );
}

add_action( 'after_switch_theme', 'thim_coaching_after_switch_theme' );

/**
 * Function print preload
 */
if ( ! function_exists( 'thim_print_preload' ) ) {
	function thim_print_preload() {
		$enable_preload     = get_theme_mod( 'thim_preload', 'default' );
		$thim_preload_image = get_theme_mod( 'thim_preload_image', false );
		$item_only          = ! empty( $_REQUEST['content-item-only'] ) ? $_REQUEST['content-item-only'] : false;
		if ( ! empty( $enable_preload ) && empty( $item_only ) ) { ?>
			<div id="preload">
				<?php
				if ( $thim_preload_image && $enable_preload == 'image' ) {
					if ( is_numeric( $thim_preload_image ) ) {
						echo wp_get_attachment_image( $thim_preload_image, 'full' );
					} else {
						echo '<img src="' . $thim_preload_image . '" alt="' . esc_html__( 'Preaload Image', 'coaching' ) . '"/>';
					}
				} else {
					switch ( $enable_preload ) {
						case 'style_1':
							$output_preload = '<div class="cssload-loader-style-1">
													<div class="cssload-inner cssload-one"></div>
													<div class="cssload-inner cssload-two"></div>
													<div class="cssload-inner cssload-three"></div>
												</div>';
							break;
						case 'style_2':
							$output_preload = '<div class="cssload-loader-style-2">
												<div class="cssload-loader-inner"></div>
											</div>';
							break;
						case 'style_3':
							$output_preload = '<div class="sk-folding-cube">
												<div class="sk-cube1 sk-cube"></div>
												<div class="sk-cube2 sk-cube"></div>
												<div class="sk-cube4 sk-cube"></div>
												<div class="sk-cube3 sk-cube"></div>
											</div>';
							break;
						case 'wave':
							$output_preload = '<div class="sk-wave">
										        <div class="sk-rect sk-rect1"></div>
										        <div class="sk-rect sk-rect2"></div>
										        <div class="sk-rect sk-rect3"></div>
										        <div class="sk-rect sk-rect4"></div>
										        <div class="sk-rect sk-rect5"></div>
										      </div>';
							break;
						case 'rotating-plane':
							$output_preload = '<div class="sk-rotating-plane"></div>';
							break;
						case 'double-bounce':
							$output_preload = '<div class="sk-double-bounce">
										        <div class="sk-child sk-double-bounce1"></div>
										        <div class="sk-child sk-double-bounce2"></div>
										      </div>';
							break;
						case 'wandering-cubes':
							$output_preload = '<div class="sk-wandering-cubes">
										        <div class="sk-cube sk-cube1"></div>
										        <div class="sk-cube sk-cube2"></div>
										      </div>';
							break;
						case 'spinner-pulse':
							$output_preload = '<div class="sk-spinner sk-spinner-pulse"></div>';
							break;
						case 'chasing-dots':
							$output_preload = '<div class="sk-chasing-dots">
										        <div class="sk-child sk-dot1"></div>
										        <div class="sk-child sk-dot2"></div>
										      </div>';
							break;
						case 'three-bounce':
							$output_preload = '<div class="sk-three-bounce">
										        <div class="sk-child sk-bounce1"></div>
										        <div class="sk-child sk-bounce2"></div>
										        <div class="sk-child sk-bounce3"></div>
										      </div>';
							break;
						case 'cube-grid':
							$output_preload = '<div class="sk-cube-grid">
										        <div class="sk-cube sk-cube1"></div>
										        <div class="sk-cube sk-cube2"></div>
										        <div class="sk-cube sk-cube3"></div>
										        <div class="sk-cube sk-cube4"></div>
										        <div class="sk-cube sk-cube5"></div>
										        <div class="sk-cube sk-cube6"></div>
										        <div class="sk-cube sk-cube7"></div>
										        <div class="sk-cube sk-cube8"></div>
										        <div class="sk-cube sk-cube9"></div>
										      </div>';
							break;
						default:
							$output_preload = '<div class="sk-folding-cube">
												<div class="sk-cube1 sk-cube"></div>
												<div class="sk-cube2 sk-cube"></div>
												<div class="sk-cube4 sk-cube"></div>
												<div class="sk-cube3 sk-cube"></div>
											</div>';
					}
					echo ent2ncr( $output_preload );
				}
				?>
			</div>
		<?php }
	}
}
add_action( 'thim_before_body', 'thim_print_preload' );

/**
 * Add google analytics & facebook pixel code
 */
if ( ! function_exists( 'thim_add_marketing_code' ) ) {
	function thim_add_marketing_code() {
		$theme_options_data = get_theme_mods();
		if ( ! empty( $theme_options_data['thim_google_analytics'] ) ) {
			?>
			<script>
                (function(i, s, o, g, r, a, m) {
                    i['GoogleAnalyticsObject'] = r;
                    i[r] = i[r] || function() {
                        (i[r].q = i[r].q || []).push(arguments);
                    }, i[r].l = 1 * new Date();
                    a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                    a.async = 1;
                    a.src = g;
                    m.parentNode.insertBefore(a, m);
                })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

                ga('create', '<?php echo esc_html( $theme_options_data['thim_google_analytics'] ); ?>', 'auto');
                ga('send', 'pageview');
			</script>
			<?php
		}
		if ( ! empty( $theme_options_data['thim_facebook_pixel'] ) ) {
			?>
			<script>
                !function(f, b, e, v, n, t, s) {
                    if (f.fbq) return;
                    n = f.fbq = function() {
                        n.callMethod ?
                            n.callMethod.apply(n, arguments) : n.queue.push(arguments);
                    };
                    if (!f._fbq) f._fbq = n;
                    n.push = n;
                    n.loaded = !0;
                    n.version = '2.0';
                    n.queue = [];
                    t = b.createElement(e);
                    t.async = !0;
                    t.src = v;
                    s = b.getElementsByTagName(e)[0];
                    s.parentNode.insertBefore(t, s);
                }(window, document, 'script',
                    'https://connect.facebook.net/en_US/fbevents.js');
                fbq('init', '<?php echo esc_html( $theme_options_data['thim_facebook_pixel'] ); ?>');
                fbq('track', 'PageView');
			</script>
			<noscript>
				<img height="1" width="1" style="display:none"
				     src="https://www.facebook.com/tr?id=<?php echo $theme_options_data['thim_facebook_pixel']; ?>&ev=PageView&noscript=1" />
			</noscript>
			<?php
		}
	}
}
add_action( 'wp_footer', 'thim_add_marketing_code' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
if ( ! function_exists( 'thim_body_classes' ) ) {
	function thim_body_classes( $classes ) {
		$item_only = ! empty( $_REQUEST['content-item-only'] ) ? $_REQUEST['content-item-only'] : false;
		// Adds a class of group-blog to blogs with more than 1 published author.
		if ( is_multi_author() ) {
			$classes[] = 'group-blog';
		}

		if ( get_theme_mod( 'thim_body_custom_class', false ) ) {
			$classes[] = get_theme_mod( 'thim_body_custom_class', false );
		}

		if ( get_theme_mod( 'thim_rtl_support', false ) ) {
			$classes[] = 'rtl';
		}

		if ( get_theme_mod( 'thim_preload', true ) && empty( $item_only ) ) {
			$classes[] = 'thim-body-preload';
		} else {
			$classes[] = 'thim-body-load-overlay';
		}

		if ( get_theme_mod( 'thim_box_layout', 'wide' ) == 'boxed' ) {
			$classes[] = 'boxed-area';
		}

		if ( get_theme_mod( 'thim_size_wrap', '' ) == 'wide' ) {
			$classes[] = 'size_wide';
		} elseif ( get_theme_mod( 'thim_size_wrap', '' ) == 'elementor' ) {
            $classes[] = 'size_elementor';
        }

		if ( get_theme_mod( 'thim_bg_boxed_type', 'image' ) == 'image' ) {
			$classes[] = 'bg-boxed-image';
		} else {
			$classes[] = 'bg-boxed-pattern';
		}
		
		if ( class_exists( 'LearnPress' ) ) {
			if ( thim_is_new_learnpress( '4.0' ) ) {
				$classes[] = 'learnpress-v4';
			}
		}

		return $classes;
	}
}
add_filter( 'body_class', 'thim_body_classes' );

/**
 * Remove hook tp-event-auth
 */
if ( class_exists( 'TP_Event_Authentication' ) ) {
	if ( ! version_compare( get_option( 'event_auth_version' ), '1.0.3', '>=' ) ) {
		$auth = TP_Event_Authentication::getInstance()->auth;

		remove_action( 'login_form_login', array( $auth, 'redirect_to_login_page' ) );
		remove_action( 'login_form_register', array( $auth, 'login_form_register' ) );
		remove_action( 'login_form_lostpassword', array( $auth, 'redirect_to_lostpassword' ) );
		remove_action( 'login_form_rp', array( $auth, 'resetpass' ) );
		remove_action( 'login_form_resetpass', array( $auth, 'resetpass' ) );

		remove_action( 'wp_logout', array( $auth, 'wp_logout' ) );
		remove_filter( 'login_url', array( $auth, 'login_url' ) );
		remove_filter( 'login_redirect', array( $auth, 'login_redirect' ) );
	}
}
/**
 * Filter event login url
 */
add_filter( 'tp_event_login_url', 'thim_get_login_page_url' );
add_filter( 'event_auth_login_url', 'thim_get_login_page_url' );

/**
 * Add filter login redirect
 */
add_filter( 'login_redirect', 'thim_login_redirect', 1000 );
if ( ! function_exists( 'thim_login_redirect' ) ) {
	function thim_login_redirect() {
		if ( empty( $_REQUEST['redirect_to'] ) ) {
			$redirect_url = get_theme_mod( 'thim_login_redirect' );
			if ( ! empty( $redirect_url ) ) {
				return $redirect_url;
			} else {
				return home_url();
			}
		} else {
			return $_REQUEST['redirect_to'];
		}
	}
}

/**
 * Filters Paid Membership pro login redirect & register redirect
 */
remove_filter( 'login_redirect', 'pmpro_login_redirect', 10 );
add_filter( 'pmpro_register_redirect', '__return_false' );

/**
 * Set login cookie
 *
 * @param $logged_in_cookie
 * @param $expire
 * @param $expiration
 * @param $user_id
 * @param $logged_in
 */
function thim_set_logged_in_cookie( $logged_in_cookie, $expire, $expiration, $user_id, $logged_in ) {
	if ( $logged_in == 'logged_in' ) {
		// Hack for wp checking empty($_COOKIE[LOGGED_IN_COOKIE]) after user logged in
		// in "private mode". $_COOKIE is not set after calling setcookie util the response
		// is sent back to client (do not know why in "private mode").
		// @see wp-login.php line #789
		$_COOKIE[ LOGGED_IN_COOKIE ] = $logged_in_cookie;
	}
}

add_action( 'set_logged_in_cookie', 'thim_set_logged_in_cookie', 100, 5 );

/**
 * Filter map single event 2.0
 */
if ( ! function_exists( 'thim_filter_event_map' ) ) {
	function thim_filter_event_map( $map_data ) {
		$map_data['height']                  = '210px';
		$map_data['map_data']['scroll-zoom'] = false;
		$map_data['map_data']['marker-icon'] = get_template_directory_uri() . '/images/map_icon.png';

		return $map_data;
	}
}
add_filter( 'tp_event_filter_event_location_map', 'thim_filter_event_map' );

/**
 * Get prefix for page title
 */
if ( ! function_exists( 'thim_get_prefix_page_title' ) ) {
	function thim_get_prefix_page_title() {
		if ( get_post_type() == "product" ) {
			$prefix = 'thim_woo';
		} elseif ( get_post_type() == "lpr_course" || get_post_type() == "lpr_quiz" || get_post_type() == "lp_course" ||
                   get_post_type() == "lp_quiz" || thim_check_is_course() || thim_check_is_course_taxonomy() ) {
			$prefix = 'thim_learnpress';
            if( get_post_type() == "lp_collection" ) {
                $prefix = 'thim_collection';
            }
		} elseif ( get_post_type() == "lp_collection" ) {
			$prefix = 'thim_collection';
		} elseif ( get_post_type() == "tp_event" ) {
			$prefix = 'thim_event';
		} elseif ( get_post_type() == "our_team" ) {
			$prefix = 'thim_team';
		} elseif ( get_post_type() == "testimonials" ) {
			$prefix = 'thim_testimonials';
		} elseif ( get_post_type() == "portfolio" ) {
			$prefix = 'thim_portfolio';
		} elseif ( get_post_type() == "forum" ) {
			$prefix = 'thim_forum';
		} elseif ( is_front_page() || is_home() ) {
			$prefix = 'thim';
		} else {
			$prefix = 'thim_archive';
		}

		return $prefix;
	}
}

/**
 * Get prefix inner for page title
 */
if ( ! function_exists( 'thim_get_prefix_inner_page_title' ) ) {
	function thim_get_prefix_inner_page_title() {
		if ( is_page() || is_single() ) {
			$prefix_inner = '_single_';
			if ( is_page() && get_post_type() == "portfolio" ) {
				$prefix_inner = '_cate_';
			}
		} else {
			if ( is_front_page() || is_home() ) {
				$prefix_inner = '_front_page_';
			} else {
				$prefix_inner = '_cate_';
			}
		}

		return $prefix_inner;
	}
}

/**
 * Print breadcrumbs
 */
if ( ! function_exists( 'thim_print_breadcrumbs' ) ) {
	function thim_print_breadcrumbs() {
		?>
		<div class="breadcrumbs-wrapper">
			<div class="container">
				<?php
				//Check seo by yoast breadcrumbs
				$wpseo = get_option( 'wpseo_internallinks' );
				if ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) && $wpseo['breadcrumbs-enable'] ) {
					if ( function_exists( 'yoast_breadcrumb' ) ) {
						yoast_breadcrumb( '<ul id="breadcrumbs">', '</ul>' );
					}
				} else {
					if ( get_post_type() == 'product' ) {
						woocommerce_breadcrumb();
					} elseif ( get_post_type() == 'lpr_course' || get_post_type() == 'lpr_quiz' || get_post_type() == 'lp_course' || get_post_type() == 'lp_quiz' || thim_check_is_course() || thim_check_is_course_taxonomy() ) {
						thim_learnpress_breadcrumb();
					} elseif ( get_post_type() == 'lp_collection' ) {
						thim_courses_collection_breadcrumb();
					} elseif ( thim_use_bbpress() ) {
						bbp_breadcrumb();
					} else {
						thim_breadcrumbs();
					}
				}

				?>
			</div>
		</div>
		<?php
	}
}

/**
 * Get page title
 */
if ( ! function_exists( 'thim_get_page_title' ) ) {
	function thim_get_page_title( $custom_title, $front_title ) {
		$heading_title = esc_html__( 'Page title', 'coaching' );
		if ( get_post_type() == 'product' ) {
			$heading_title = woocommerce_page_title( false );
		} elseif ( get_post_type() == 'lpr_course' || get_post_type() == 'lpr_quiz' || get_post_type() == 'lp_course' || get_post_type() == 'lp_quiz' || thim_check_is_course() || thim_check_is_course_taxonomy() ) {
			if ( is_single() ) {
				if ( ! empty( $custom_title ) ) {
					$heading_title = $custom_title;
				} else {
					$course_cat = get_the_terms( get_the_ID(), 'course_category' );
					if ( ! empty( $course_cat ) ) {
						$heading_title = $course_cat[0]->name;
					} else {
						$heading_title = __( 'Course', 'coaching' );
					}
				}
			} else {
				$heading_title = thim_learnpress_page_title( false );
			}
		} elseif ( get_post_type() == 'lp_collection' ) {
			$heading_title = learn_press_collections_page_title( false );
		} elseif ( ( is_category() || is_archive() || is_search() || is_404() ) && ! thim_use_bbpress() ) {
			if ( get_post_type() == 'tp_event' ) {
				$heading_title = esc_html__( 'Events', 'coaching' );
			} elseif ( get_post_type() == 'testimonials' ) {
				$heading_title = esc_html__( 'Testimonials', 'coaching' );
			} else {
				$heading_title = thim_archive_title();
			}
		} elseif ( thim_use_bbpress() ) {
			$heading_title = thim_forum_title();
		} elseif ( is_page() || is_single() ) {
			if ( is_single() ) {
				if ( $custom_title ) {
					$heading_title = $custom_title;
				} else {
					if ( get_post_type() == 'post' ) {
						$category      = get_the_category();
						if($category){
                            $category_id   = get_cat_ID( $category[0]->cat_name );
                            $heading_title = get_category_parents( $category_id, false, " " );
                        }
 					}
					if ( get_post_type() == 'tp_event' ) {
						$heading_title = esc_html__( 'Events', 'coaching' );
					}
					if ( get_post_type() == 'portfolio' ) {
						$heading_title = esc_html__( 'Portfolio', 'coaching' );
					}
					if ( get_post_type() == 'our_team' ) {
						$heading_title = esc_html__( 'Our Team', 'coaching' );
					}
					if ( get_post_type() == 'testimonials' ) {
						$heading_title = esc_html__( 'Testimonials', 'coaching' );
					}
				}

			} else {
				$heading_title = ! empty( $custom_title ) ? $custom_title : get_the_title();
			}

		} elseif ( ! is_front_page() && is_home() ) {
			$heading_title = ! empty( $front_title ) ? $front_title : esc_html__( 'Blog', 'coaching' );;
		}

		return $heading_title;
	}
}

/**
 * Format price
 */
add_filter( 'pmpro_format_price', 'thim_pmpro_formatPrice', 10, 4 );
if ( ! function_exists( 'thim_pmpro_formatPrice' ) ) {
	function thim_pmpro_formatPrice( $formatted, $price, $pmpro_currency, $pmpro_currency_symbol ) {
		if ( is_numeric( $price ) && ( intval( $price ) == floatval( $price ) ) ) {
			return $pmpro_currency_symbol . number_format( $price );
		} else {
			return $pmpro_currency_symbol . number_format( $price, 2 );
		}

	}
}


/**
 * Filter level cost text paid membership pro
 */
add_filter( 'pmpro_level_cost_text', 'thim_pmpro_getLevelCost', 10, 4 );
if ( ! function_exists( 'thim_pmpro_getLevelCost' ) ) {
	function thim_pmpro_getLevelCost( $r, $level, $tags, $short ) {
		//initial payment
		if ( ! $short ) {
			$r = sprintf( __( 'The price for membership is <p class="price">%s</p>', 'coaching' ), pmpro_formatPrice( $level->initial_payment ) );
		} else {
			$r = sprintf( __( '%s', 'coaching' ), pmpro_formatPrice( $level->initial_payment ) );
		}

		//recurring part
		if ( $level->billing_amount != '0.00' ) {
			if ( $level->billing_limit > 1 ) {
				if ( $level->cycle_number == '1' ) {
					$r .= sprintf( __( '<p class="expired">then %s per %s for %d more %s</p>', 'coaching' ), pmpro_formatPrice( $level->billing_amount ), pmpro_translate_billing_period( $level->cycle_period ), $level->billing_limit, pmpro_translate_billing_period( $level->cycle_period, $level->billing_limit ) );
				} else {
					$r .= sprintf( __( '<p class="expired">then %s every %d %s for %d more payments</p>', 'coaching' ), pmpro_formatPrice( $level->billing_amount ), $level->cycle_number, pmpro_translate_billing_period( $level->cycle_period, $level->cycle_number ), $level->billing_limit );
				}
			} elseif ( $level->billing_limit == 1 ) {
				$r .= sprintf( __( '<p class="expired">then %s after %d %s</p>', 'coaching' ), pmpro_formatPrice( $level->billing_amount ), $level->cycle_number, pmpro_translate_billing_period( $level->cycle_period, $level->cycle_number ) );
			} else {
				if ( $level->billing_amount === $level->initial_payment ) {
					if ( $level->cycle_number == '1' ) {
						if ( ! $short ) {
							$r = sprintf( __( 'The price for membership is <strong>%s per %s</strong>', 'coaching' ), pmpro_formatPrice( $level->initial_payment ), pmpro_translate_billing_period( $level->cycle_period ) );
						} else {
							$r = sprintf( __( '<p class="expired">%s per %s</p>', 'coaching' ), pmpro_formatPrice( $level->initial_payment ), pmpro_translate_billing_period( $level->cycle_period ) );
						}
					} else {
						if ( ! $short ) {
							$r = sprintf( __( 'The price for membership is <strong>%s every %d %s</strong>', 'coaching' ), pmpro_formatPrice( $level->initial_payment ), $level->cycle_number, pmpro_translate_billing_period( $level->cycle_period, $level->cycle_number ) );
						} else {
							$r = sprintf( __( '<p class="expired">%s every %d %s</p>', 'coaching' ), pmpro_formatPrice( $level->initial_payment ), $level->cycle_number, pmpro_translate_billing_period( $level->cycle_period, $level->cycle_number ) );
						}
					}
				} else {
					if ( $level->cycle_number == '1' ) {
						$r .= sprintf( __( '<p class="expired">then %s per %s</p>', 'coaching' ), pmpro_formatPrice( $level->billing_amount ), pmpro_translate_billing_period( $level->cycle_period ) );
					} else {
						$r .= sprintf( __( '<p class="expired">and then %s every %d %s</p>', 'coaching' ), pmpro_formatPrice( $level->billing_amount ), $level->cycle_number, pmpro_translate_billing_period( $level->cycle_period, $level->cycle_number ) );
					}
				}
			}
		}

		//trial part
		if ( $level->trial_limit ) {
			if ( $level->trial_amount == '0.00' ) {
				if ( $level->trial_limit == '1' ) {
					$r .= ' ' . __( 'After your initial payment, your first payment is Free.', 'coaching' );
				} else {
					$r .= ' ' . sprintf( __( 'After your initial payment, your first %d payments are Free.', 'coaching' ), $level->trial_limit );
				}
			} else {
				if ( $level->trial_limit == '1' ) {
					$r .= ' ' . sprintf( __( 'After your initial payment, your first payment will cost %s.', 'coaching' ), pmpro_formatPrice( $level->trial_amount ) );
				} else {
					$r .= ' ' . sprintf( __( 'After your initial payment, your first %d payments will cost %s.', 'coaching' ), $level->trial_limit, pmpro_formatPrice( $level->trial_amount ) );
				}
			}
		}

		//taxes part
		$tax_state = pmpro_getOption( "tax_state" );
		$tax_rate  = pmpro_getOption( "tax_rate" );

		if ( $tax_state && $tax_rate && ! pmpro_isLevelFree( $level ) ) {
			$r .= sprintf( __( 'Customers in %s will be charged %s%% tax.', 'coaching' ), $tax_state, round( $tax_rate * 100, 2 ) );
		}

		if ( ! $tags ) {
			$r = strip_tags( $r );
		}

		return $r;
	}
}

/**
 * Filter price paid membership pro
 */
add_filter( 'pmpro_format_price', 'thim_pmpro_format_price', 10, 4 );
if ( ! function_exists( 'thim_pmpro_format_price' ) ) {
	function thim_pmpro_format_price( $formatted, $price, $pmpro_currency, $pmpro_currency_symbol ) {
		global $pmpro_currency, $pmpro_currency_symbol, $pmpro_currencies;

		//start with the price formatted with two decimals
		$formatted = number_format( (double) $price, 0 );

		//settings stored in array?
		if ( ! empty( $pmpro_currencies[ $pmpro_currency ] ) && is_array( $pmpro_currencies[ $pmpro_currency ] ) ) {
			//format number do decimals, with decimal_separator and thousands_separator
			$formatted = number_format( $price,
				( isset( $pmpro_currencies[ $pmpro_currency ]['decimals'] ) ? (int) $pmpro_currencies[ $pmpro_currency ]['decimals'] : 2 ),
				( isset( $pmpro_currencies[ $pmpro_currency ]['decimal_separator'] ) ? $pmpro_currencies[ $pmpro_currency ]['decimal_separator'] : '.' ),
				( isset( $pmpro_currencies[ $pmpro_currency ]['thousands_separator'] ) ? $pmpro_currencies[ $pmpro_currency ]['thousands_separator'] : ',' )
			);

			//which side is the symbol on?
			if ( ! empty( $pmpro_currencies[ $pmpro_currency ]['position'] ) && $pmpro_currencies[ $pmpro_currency ]['position'] == 'left' ) {
				$formatted = '<span class="currency">' . $pmpro_currency_symbol . '</span>' . $formatted;
			} else {
				$formatted = $formatted . '<span class="currency">' . $pmpro_currency_symbol . '</span>';
			}
		} else {
			$formatted = '<span class="currency">' . $pmpro_currency_symbol . '</span>' . $formatted;
		}    //default to symbol on the left

		return $formatted;
	}
}

/*
 * Handle conflict betweeen Google captcha plugin vs Revolution Slider plugin
 */
if ( thim_plugin_active( 'google-captcha/google-captcha.php' ) ) {
	remove_filter( 'widget_text', 'do_shortcode' );
}

/*
 * Add google captcha register check to register form ( multisite case )
 */
if ( is_multisite() && function_exists( 'gglcptch_register_check' ) ) {
	global $gglcptch_ip_in_whitelist;

	if ( ! $gglcptch_ip_in_whitelist ) {
		add_action( 'registration_errors', 'gglcptch_register_check', 10, 1 );
	}
}

if ( ! function_exists( "thim_get_cat_taxonomy" ) ) {
	function thim_get_cat_taxonomy( $term = 'category', $cats = false, $vc = false ) {
		if ( ! $cats ) {
			$cats = array();
		}
		if ( is_admin() ) {
			$args  = array(
				'pad_counts'   => 1,
				'hierarchical' => 1,
				'hide_empty'   => 1,
				'orderby'      => 'name',
				'menu_order'   => false
			);
			$terms = get_terms( $term, $args );

			if ( is_wp_error( $terms ) ) {
			} else {
				if ( empty( $terms ) ) {
				} else {
					$prefix = '';
					foreach ( $terms as $term ) {
						if ( $term->parent > 0 ) {
							$prefix = "--";
						}
						if ( $vc == true ) {
							$cats[ $prefix . $term->name ] = $term->term_id;
						} else {
							$cats[ $term->term_id ] = $prefix . $term->name;
						}
					}
				}
			}
		}

		return $cats;
	}
}

/**
 * Get popular list courses
 *
 * Count all user enroll, buy course (No discrimination order status)
 *
 * @param int $limit
 *
 * @return array|false|mixed
 * @since 4.2.9.7
 * @note  should write on LP | function is temporary | see same get_popular_courses function of LP
 * @author tungnx
 *
 */
function coaching_lp_get_popular_courses( $limit = 10 ) {
	global $wpdb;

	$result = wp_cache_get( 'lp-popular-course', '', true );

	if ( ! $result ) {
		$query = $wpdb->prepare( "
        SELECT ID, a+IF(b IS NULL, 0, b) AS students FROM(
		SELECT p.ID as ID, IF(pm.meta_value, pm.meta_value, 0) as a, (
	       SELECT COUNT(*)
          FROM (SELECT COUNT(item_id), item_id, user_id FROM {$wpdb->prefix}learnpress_user_items GROUP BY item_id, user_id) AS Y
          GROUP BY item_id
          HAVING item_id = p.ID
        ) AS b
        FROM {$wpdb->posts} p
        LEFT JOIN {$wpdb->postmeta} AS pm ON p.ID = pm.post_id  AND pm.meta_key = %s
        WHERE p.post_type = %s AND p.post_status = %s
        GROUP BY ID
        ) AS Z
        ORDER BY students DESC
        	  LIMIT 0, $limit
         ", '_lp_students', 'lp_course', 'publish' );

		$result = $wpdb->get_col( $query );
	}

	$time_cache = apply_filters( 'lp/time-cache/popular-courses', 60 * 60 * 60 );

	wp_cache_set( 'lp-popular-courses', $result, '', current_time( 'timestamp' ) + $time_cache );

	return $result;
}