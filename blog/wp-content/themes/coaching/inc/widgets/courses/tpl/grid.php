<?php
global $post;

$limit             = $instance['limit'];
$columns           = $instance['grid-options']['columns'];
$view_all_course   = ( $instance['view_all_courses'] && '' != $instance['view_all_courses'] ) ? $instance['view_all_courses'] : false;
$view_all_position = ( $instance['view_all_position'] && '' != $instance['view_all_position'] ) ? $instance['view_all_position'] : 'top';
$sort              = $instance['order'];
$feature        = !empty( $instance['featured'] ) ? true : false ;
$thumb_w = ( !empty($instance['thumbnail_width']) && '' != $instance['thumbnail_width'] ) ? $instance['thumbnail_width'] : apply_filters('thim_course_thumbnail_width', 400);
$thumb_h = ( !empty($instance['thumbnail_width']) && '' != $instance['thumbnail_height'] ) ? $instance['thumbnail_height'] : apply_filters('thim_course_thumbnail_height', 300);

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

if( $feature ) {
    $condition['meta_query'] = array(
        array(
            'key' => '_lp_featured',
            'value' =>  'yes',
        )
    );
}

$the_query = new WP_Query( $condition );

if ( $the_query->have_posts() ) :
    if ( $instance['title'] ) {
        echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
    }
    ?>
    <div class="thim-course-grid">
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="lpr_course <?php echo 'course-grid-' . $columns; ?>">
                <div class="course-item">
                    <div class="course-thumbnail">
                        <a href="<?php echo esc_url(get_the_permalink( get_the_ID() ));?>">
                            <?php echo thim_get_feature_image(get_post_thumbnail_id( get_the_ID() ), 'full', $thumb_w, $thumb_h, get_the_title());?>
                        </a>
                        <?php do_action( 'thim_inner_thumbnail_course' );?>
                        <a class="course-readmore" href="<?php echo esc_url(get_the_permalink( get_the_ID() ));?>"><?php echo esc_html__('Read More', 'coaching');?></a>
                    </div>
                    <div class="thim-course-content">
                        <h2 class="course-title">
                            <a href="<?php echo esc_url( get_the_permalink() ); ?>"> <?php echo get_the_title(); ?></a>
                        </h2>

                        <div class="middle">
                            <?php 
                                if ( thim_is_new_learnpress( '4.0' ) ) {
                                    do_action('widget-grid-middle-content');
                                } else {
                                    learn_press_course_instructor();
                                    learn_press_courses_loop_item_students();
                                }
                            ?>
                        </div>
                        <div class="course-meta">
                            <div class="course-review">
                                <?php thim_course_ratings(); ?>
                            </div>
                            <div class="course-price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                <?php 
                                    if ( thim_is_new_learnpress( '4.0' ) ) {
                                        LP()->template( 'course' )->courses_loop_item_price();
                                    } else {
                                        learn_press_courses_loop_item_price();
                                    }
                                ?>
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
        echo '<div class="view-all"><a class="view-all-courses thim-button" href="' . get_post_type_archive_link( 'lp_course' ) . '">' . esc_attr( $view_all_course ) . '</a></div>';
    }

endif;

wp_reset_postdata();
