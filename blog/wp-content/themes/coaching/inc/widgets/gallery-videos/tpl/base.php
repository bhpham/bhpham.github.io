<?php
wp_enqueue_script('magnific-popup');
$number_posts = 3;
if ( ! empty( $instance['number_posts'] ) ) {
	$number_posts = $instance['number_posts'];
}
$html       = '';
$query_args = array(
	'posts_per_page'      => $number_posts,
	//'order'               => ( 'asc' == $instance['order'] ) ? 'asc' : 'desc',
	'post_type'           => 'post',
	'tax_query'           => array(
		array(
			'taxonomy' => 'post_format',
			'field'    => 'slug',
			'terms'    => array( 'post-format-video' ),
		)
	),
	'ignore_sticky_posts' => true
);

if ( $instance['cad_id'] && $instance['cad_id'] != 'all' && get_category( $instance['cad_id'] ) ) {
	$query_args['cat'] = $instance['cad_id'];
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

$video = new WP_Query( $query_args );
$index = 1;

if ( $video->have_posts() ) {
	if ( $instance['title'] ) {
		echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
	}
	$html = '<div class="thim-gallery-video">';
	while ( $video->have_posts() ) : $video->the_post();
		$comment_count = get_comments_number();
		if ( $comment_count > 0 ) {
			$comments = sprintf( _n( '<span>%s</span> Comment', '<span>%s</span> Comments', $comment_count, 'coaching' ), $comment_count );
		} else {
			$comments = esc_html__( 'No Comment', 'coaching' );
		}

		if ( $index === 1 ) {
			$html .= '<div class="video-item feature-item" data-id="' . get_the_ID() . '">';
			$html .= '<div class="video-thumbnail">';
			if ( get_post_thumbnail_id() ) {
				$html .= thim_get_feature_image( get_post_thumbnail_id(), 'full', '560', '315' );
			}
			$html .= '<div class="play-button"><i class="icon fa fa-caret-right" data-id="' . get_the_ID() . '"></i></div>';
			$html .= '</div>';
			$html .= '<div class="video-content">';
			$html .= '<h4 class="video-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			$html .= '<div class="video-date">' . esc_html__( 'In ', 'coaching' ) . ' <span class="date">' . get_the_date() . '</span></div>';
			$html .= '<div class="comment">' . $comments . '</div>';
			$html .= '</div>';
			$html .= '</div>';
		} else {
			$html .= '<div class="video-item" data-id="' . get_the_ID() . '">';
			$html .= '<div class="video-thumbnail">';
			if ( get_post_thumbnail_id() ) {
				$html .= thim_get_feature_image( get_post_thumbnail_id(), 'full', '265', '150' );
			}
			$html .= '<div class="play-button"><i class="icon fa fa-caret-right" data-id="' . get_the_ID() . '"></i></div>';
			$html .= '</div>';
			$html .= '<div class="video-content">';
			$html .= '<h4 class="video-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
			$html .= '</div>';
			$html .= '</div>';
		}

		$index ++;

	endwhile;
	if ( $instance['text_link'] != '' ) {
		$html .= '<div class="readmore"><a class="thim-button" href="' . $instance['link'] . '">' . $instance['text_link'] . '</a></div>';
	}
	$html .= '</div>';
}


echo ent2ncr( $html );
wp_reset_postdata();
?>
