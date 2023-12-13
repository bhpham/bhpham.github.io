<?php
$number_posts = 2;
if ( $instance['number_posts'] <> '' ) {
	$number_posts = $instance['number_posts'];
}
$style = '';
if ( $instance['style'] <> '' ) {
	$style = $instance['style'];
}
$image_size = 'none';
if ( $instance['image_size'] && $instance['image_size'] <> 'none' ) {
	$image_size = $instance['image_size'];
}
$query_args = array(
	'post_type'           => 'post',
	'posts_per_page'      => $number_posts,
	'order'               => ( 'asc' == $instance['order'] ) ? 'asc' : 'desc',
	'ignore_sticky_posts' => true
);
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
	while ( $posts_display->have_posts() ) {
		$posts_display->the_post();
		$class = 'item-post';
		?>
        <div <?php post_class( $class ); ?>>
			<?php
			if ( $image_size <> 'none' && has_post_thumbnail() && $instance['style'] != 'health_homepage' ) {
				if ( $image_size == 'custom_image' ) {
					echo '<div class="article-image">';
					echo '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">';
					echo thim_get_feature_image( get_post_thumbnail_id( get_the_ID() ), 'full', 300, 300, get_the_title() );
					echo '</a>';
					echo '</div>';
				} elseif ( $image_size == 'custom_size' ) {
					if ( isset( $instance['size_w'] ) && isset( $instance['size_h'] ) ) {
						echo '<div class="article-image">';
						echo '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">';
						echo thim_get_feature_image( get_post_thumbnail_id( $post->ID ), 'full', $instance['size_w'], $instance['size_h'], get_the_title() );
						echo '</a>';
						echo '</div>';
					}
				} else {
					echo '<div class="article-image">';
					echo the_post_thumbnail( $image_size );
					echo '</div>';
				}
			}
			if ( $instance['style'] == 'life_homepage' ) { ?>
                <article>
                    <div class="entry-header">
						<?php echo '<h5 class="entry-title"><a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" >' . esc_attr( get_the_title() ) . '</a></h5>'; ?>
                        <ul class="entry-meta">
                            <li class="author">
                                <span><?php echo esc_html__( 'By', 'coaching' ); ?></span>
								<?php printf( '<a href="%1$s">%2$s</a>',
									esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
									esc_html( get_the_author() )
								); ?>
                            </li>

                            <li class="entry-category">
                                <span><?php esc_html_e( 'In', 'coaching' ); ?></span> <?php the_category( ', ', '' ); ?>
                            </li>


                            <li class="entry-date">
                                <span class="value"> <?php the_time( get_option( 'date_format' ) ) ?></span>
                            </li>
                        </ul>
                    </div>
					<?php
					if ( $instance['show_description'] && $instance['show_description'] <> 'no' ) {
						echo '<div class="description">' . substr( strip_tags( get_the_content() ), 0, 100 ) . '</div>';
					}
					?>
                </article>
				<?php
			} elseif ( $instance['style'] == 'health_homepage' ) { ?>
                <article>
                    <div class="entry-header">
                        <div class="date-meta"><?php echo get_the_date( "d\<\i\>\ M\<\/\i\>\ " ) ?></div>
                        <div class="entry-contain">
							<?php echo '<h4 class="entry-title"><a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" >' . esc_attr( get_the_title() ) . '</a></h4>'; ?>
                        </div>
                    </div>
                    <div class="entry-content">
						<?php if ( $image_size <> 'none' && has_post_thumbnail() && $image_size != 'custom_size' ) : ?>
                            <div class="article-image">
								<?php echo the_post_thumbnail( $image_size ); ?>
                            </div>
						<?php elseif ( $image_size == 'custom_size' ) : ?>
                            <?php
							if ( isset( $instance['size_w'] ) && isset( $instance['size_h'] ) ) {
								echo '<div class="article-image">';
								echo '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">';
								echo thim_get_feature_image( get_post_thumbnail_id( $post->ID ), 'full', $instance['size_w'], $instance['size_h'], get_the_title() );
								echo '</a>';
								echo '</div>';
							}
                            ?>
						<?php endif;
						if ( $instance['show_description'] && $instance['show_description'] <> 'no' ) {
							echo '<div class="description">' . substr( strip_tags( get_the_content() ), 0, 100 ) . '</div>';
						}
						?>
                    </div>
                </article>
			<?php } else {
				echo '<div class="article-title-wrapper">';
				echo '<h5><a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" class="article-title">' . esc_attr( get_the_title() ) . '</a></h5>';
				echo '<div class="article-date"><span class="day">' . get_the_date( 'd' ) . '</span><span class="month">' . get_the_date( 'M' ) . ',</span><span class="year">' . get_the_date( 'Y' ) . '</span></div>';
				if ( $instance['show_description'] && $instance['show_description'] <> 'no' ) {
					echo substr( strip_tags( get_the_content() ), 0, 100 );
				}
				echo '</div>';
			}
			?>
        </div>
		<?php
	}
	if ( $instance['link'] <> '' ) {
		echo '<div class="readmore"><a class="thim-button" href="' . $instance['link'] . '">' . $instance['text_link'] . '</a></div>';
	}
	echo '</div>';
}
wp_reset_postdata();

?>