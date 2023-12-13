<?php
wp_enqueue_script('magnific-popup');
wp_enqueue_script('owl-carousel');
$number_posts = 3;
if ( ! empty( $instance['number_posts'] ) ) {
	$number_posts = $instance['number_posts'];
}
$html       = '<div class="list-video-slider">';
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
	$html .= '<div class="thim-carousel-wrapper owl-theme owl-drag"  data-visible="1" data-navigation="1" data-itemmobile_horizontal="1" data-desktopsmall="1" data-itemtablet="1" data-autoplaytimeout="0" data-autoplay="0">';
	while ( $video->have_posts() ) : $video->the_post();
		$comment_count = get_comments_number();
		if ( $comment_count > 0 ) {
			$comments = sprintf( _n( '<span>%s</span> Comment', '<span>%s</span> Comments', $comment_count, 'coaching' ), $comment_count );
		} else {
			$comments = esc_html__( 'No Comment', 'coaching' );
		}
		$categories = get_the_category();

		$html .= '<div class="video-item feature-item" data-id="' . get_the_ID() . '">';
		$html .= '<div class="video-thumbnail">';
		if ( get_post_thumbnail_id() ) {
			$html .= thim_get_feature_image( get_post_thumbnail_id(), 'full', '950', '536' );
		}
		$html .= '<div class="play-button"><i class="icon ion-ios-play" data-id="' . get_the_ID() . '"></i></div>';
		$html .= '</div>';
		$html .= '<div class="video-content">';
		$html .= '<div class="video-meta">';
		$html .= '<div class="video-category">' . $categories[0]->name . '</div>';
		$html .= '<div class="video-author"><a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '">' . esc_html__( 'By', 'coaching' ) . ' ' . get_the_author() . '</a></div>';
		$html .= '<div class="video-date">' . get_the_date() . '</div>';
		$html .= '</div>';
		$html .= '<h4 class="video-title"><a href="' . get_the_permalink() . '">' . get_the_title() . '</a></h4>';
		$html .= '</div>';
		$html .= '</div>';

		$index ++;

	endwhile;
	$html .= '</div>';
	$html .= '<div class="container">';
	if ( $instance['text_link'] != '' ) {
		$html .= '<div class="readmore"><a class="thim-button-primary widget-button regular very-rounded" href="' . $instance['link'] . '">' . $instance['text_link'] . '</a></div>';
	}
	$html .= '</div>';
}

$html .= '</div>';

echo ent2ncr( $html );
wp_reset_postdata();
?>
