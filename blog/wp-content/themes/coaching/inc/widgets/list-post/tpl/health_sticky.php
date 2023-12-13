<?php
global $post;
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
$feature_text = $instance['feature_text'] ? $instance['feature_text'] : '';
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

$sticky_agrs = array(
	'post_type' => 'post',
	'posts_per_page'      => 1,
	'ignore_sticky_posts' => true,
	'meta_query' => array(
		array(
			'key'   => 'thim_sticky_post',
			'value' => '1',
		),
	),
);

$posts_display = new WP_Query( $query_args );
$sticky_display = new WP_Query( $sticky_agrs );


if ( $posts_display->have_posts() || $sticky_display->have_posts()) {
	if ( $instance['title'] ) {
		echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
	}
	echo '<div class="thim-list-posts ' . $style . '">';
	?>
		<div class="sticky-post">
		<?php 
		while ( $sticky_display->have_posts() ) : $sticky_display->the_post(); ?>
			<?php
			echo '<span class="featured-text">' . $feature_text . '</span>';
			if ( has_post_thumbnail() ) :
				echo '<div class="article-image">';
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
				echo '<div class="entry-category">';
				the_category( ', ', '' );
				echo '</div>';
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
				</div>
				<ul class="entry-meta">
					<li class="author">
						<?php echo esc_html__( 'By', 'coaching' ); ?>
						<span><?php printf( '<a href="%1$s">%2$s</a>',
							esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
							esc_html( get_the_author() )
						); ?>
						</span>
					</li>

					<li class="entry-date">
						<?php echo esc_html__( 'in', 'coaching' ); ?>
						<span class="value"><?php the_time( get_option( 'date_format' ) ) ?></span>
					</li>

					<li class="entry-comment">
						<span class="value"><?php comments_popup_link( esc_html__( '0 Comment', 'coaching' ), esc_html__( '1 Comment', 'coaching' ), esc_html__( '% Comments', 'coaching' ) ); ?></span>
					</li>


				</ul>
			</article>
		<?php endwhile; ?>
			
		</div>
		
	<?php
	echo '</div>';
}
wp_reset_postdata();

?>