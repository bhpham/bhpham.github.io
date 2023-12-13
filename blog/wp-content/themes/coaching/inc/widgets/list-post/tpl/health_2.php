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
$timeout    = $instance['autoplayTimeout'] ? $instance['autoplayTimeout'] : '' ;
$autoplay   = $instance['autoplay'] ? $instance['autoplay'] : '';

$posts_display = new WP_Query( $query_args );
if ( $posts_display->have_posts() ) {
	if ( $instance['title'] ) {
		echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
	}
	echo '<div class="thim-list-posts ' . $style . '">';
	?>
	<div class="thim-list-posts-health2">
		<?php
		while ( $posts_display->have_posts() ) :
			$posts_display->the_post();
			$class = 'item-post';
			?>

			<article <?php post_class( $class ); ?>>
				<div class="date-meta">
					<?php echo get_the_date( "d\<\i\>\ M\<\/\i\>\ " ) ?>
				</div>
				<?php
				if ( $image_size <> 'none' && has_post_thumbnail()) {
					echo '<div class="article-image">';
					if ( $image_size == 'custom_image' ) {
						echo '<a href="' . esc_url( get_permalink( get_the_ID() ) ) . '">';
						echo thim_get_feature_image( get_post_thumbnail_id( $post->ID ), 'full', 300, 300, get_the_title() );
						echo '</a>';
					} else {
						echo the_post_thumbnail( $image_size);
					}
					echo '<div class="entry-category">';
					the_category( ', ', '' );
					echo '</div>';
					echo '</div>';
				}
				?>
				<div class="entry-content">
					<div class="main-content">
						<div class="entry-header">
							<?php echo '<h5 class="entry-title"><a href="' . esc_url( get_permalink( get_the_ID() ) ) . '" >' . esc_attr( get_the_title() ) . '</a></h5>';?>

						</div>
						<?php
						if ( $instance['show_description'] && $instance['show_description'] <> 'no' ) {
							echo thim_excerpt( '20' );
							echo '<a class="learn-more" href="'.esc_url( get_permalink( get_the_ID() ) ).'">'.esc_html__('read more','coaching').'</a>';
						}
						?>
					</div>
				</div>
			</article>

		<?php endwhile; ?>
	</div>
	<?php
	
	echo '</div>';
}
wp_reset_postdata();

?>