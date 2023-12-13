<?php
global $post;
$number_posts = 3;
if ( $instance['number_posts'] <> '' ) {
    $number_posts = $instance['number_posts'];
}
$style = '';
if ( $instance['style'] <> '' ) {
    $style = $instance['style'];
}

$query_args = array(
    'post_type'           => 'post',
    'posts_per_page'      => $number_posts,
    'order'               => ( 'asc' == $instance['order'] ) ? 'asc' : 'desc',
    'ignore_sticky_posts' => true
);
$image_size = 'none';
if ( $instance['image_size'] && $instance['image_size'] <> 'none' ) {
    $image_size = $instance['image_size'];
}
if ( $instance['cat_id'] && $instance['cat_id'] != 'all' ) {
    $query_args['cat'] = $instance['cat_id'];
}
switch ( $instance['orderby'] ) {
    case 'recent' :
        $query_args['orderby'] = 'post_date';
        break;
    case 'title' :
        $query_args['orderby'] = 'post_title';
        break;
    case 'popular' :
        $query_args['orderby'] = 'comment_count';
        break;
    default : //random
        $query_args['orderby'] = 'rand';
}

$posts_display = new WP_Query( $query_args );
if ( $posts_display->have_posts() ) {
    if ( $instance['title'] ) {
        echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
    }
    echo '<div class="thim-list-posts ' . $style . '">';
    ?>
    <div class="thim-list-posts-gym">
        <div class="row">
            <?php
            while ( $posts_display->have_posts() ) :
                $posts_display->the_post();
                $class = 'item-post';
                ?>

                <div class="col-sm-4 col-xs-12">
                    <div <?php post_class( $class ); ?>>
                        <?php
                        if ( has_post_thumbnail() ) :
                            echo '<div class="post-image">';
                            if ( $image_size == 'custom_image' ) {
                                echo '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">';
                                echo thim_get_feature_image( get_post_thumbnail_id( $post->ID ), 'full', 300, 300, get_the_title() );
                                echo '</a>';
                            } elseif ( $image_size == 'custom_size' ) {
                                if ( isset( $instance['size_w'] ) && isset( $instance['size_h'] ) ) {
                                    echo '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">';
                                    echo thim_get_feature_image( get_post_thumbnail_id( $post->ID ), 'full', $instance['size_w'], $instance['size_h'], get_the_title() );
                                    echo '</a>';
                                }
                            } else {
                                echo the_post_thumbnail('medium_large');
                            }
                            ?>
                            <div class="date-meta">
                                <div class="date"><?php echo( get_the_date( 'd' ) ); ?></div>
                                <div class="month"><?php echo( get_the_date( 'M' ) ); ?></div>
                            </div>
                        <?php
                            echo '</div>';
                        endif;
                        ?>
                        <article class="entry-content">
                            <div class="main-content">
                                <div class="entry-header">
                                    <?php echo '<h5 class="entry-title"><a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" >' . esc_attr( get_the_title() ) . '</a></h5>';?>

                                </div>
                                <?php
                                if ( $instance['show_description'] && $instance['show_description'] <> 'no' ) {
                                    echo thim_excerpt( '20' );
                                }
                                ?>

                                <?php
                                    echo '<a class="learn-more" href="'.esc_url( get_permalink( get_the_ID() ) ).'">'.esc_html__('Read More','coaching').'</a>';
                                ?>
                            </div>

                        </article>
                    </div>
                </div>

            <?php endwhile; ?>
        </div>
    </div>
    <?php

    echo '</div>';
}
wp_reset_postdata();

?>