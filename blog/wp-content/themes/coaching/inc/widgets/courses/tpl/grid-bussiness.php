<?php
global $post;

$limit           = $instance['limit'];
$columns         = $instance['grid-options']['columns'];
$view_all_course = ( $instance['view_all_courses'] && '' != $instance['view_all_courses'] ) ? $instance['view_all_courses'] : false;
$sort            = $instance['order'];
$thumb_w = ( !empty($instance['thumbnail_width']) && '' != $instance['thumbnail_width'] ) ? $instance['thumbnail_width'] : apply_filters('thim_course_thumbnail_width', 270);
$thumb_h = ( !empty($instance['thumbnail_width']) && '' != $instance['thumbnail_height'] ) ? $instance['thumbnail_height'] : apply_filters('thim_course_thumbnail_height', 375);

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


$the_query = new WP_Query( $condition );

if ( $the_query->have_posts() ) :
    if ( $instance['title'] ) {
        echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
    }
    ?>
    <div class="thim-course-grid bussiness">
        <?php
        while ( $the_query->have_posts() ) : $the_query->the_post();
            $course      = LP_Course::get_course( $post->ID );
            $is_required = $course->is_required_enroll();
            ?>
            <div class="lpr_course <?php echo 'course-grid-' . $columns; ?>">
                <div class="course-item">
                    <div class="course-thumbnail">
                        <a href="<?php echo esc_url( get_the_permalink() );?>">
                            <?php echo thim_get_feature_image( get_post_thumbnail_id( $post->ID ), 'full', $thumb_w, $thumb_h, get_the_title() );?>
                        </a>
                        <div class="course-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                            <?php
                            $course = LP_Course::get_course( $post->ID );
                            $is_required = $course->is_required_enroll();
                            ?>
                            <?php if ( $course->is_free() || !$is_required ) : ?>
                                <div class="value free-course" itemprop="price" content="<?php esc_attr_e( 'Free', 'coaching' ); ?>">
                                    <?php esc_html_e( 'Free', 'coaching' ); ?>
                                </div>
                            <?php else:
                                $price = $course->get_price_html();
                                $origin_price = $course->get_origin_price_html();
                                ?>
                                <div class="value " itemprop="price" content="<?php echo esc_attr( $price ); ?>">
                                    <?php
                                    echo esc_html( $price );
                                    if ( $price != $origin_price ) {
                                        echo '<span class="course-origin-price">' . $origin_price . '</span>';
                                    }
                                    ?>
                                </div>
                            <?php endif; ?>
                            <meta itemprop="priceCurrency" content="<?php echo learn_press_get_currency_symbol(); ?>" />
                        </div>
                    </div>
                    <div class="thim-bussiness-content">
                        <h3 class="course-title">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>"> <?php echo get_the_title(); ?></a>
                        </h3>
                        <?php learn_press_course_instructor(); ?>
                        <div class="meta_course">
                            <div class="course-review">
                                <?php thim_course_ratings_count(); ?>
                            </div>
                            <?php thim_course_wishlist_button( $post->ID );?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
        ?>
    </div>
    <?php
    if ( $view_all_course ) {
        echo '<div class="view_all bussiness">';
        echo '<a class="view-all-courses thim-button" href="' . get_post_type_archive_link( 'lp_course' ) . '">' . esc_attr( $view_all_course ) . '</a>';
        echo '</div>';
    }
endif;

wp_reset_postdata();
