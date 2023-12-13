<?php
wp_enqueue_script('owl-carousel');
$link         = $regency = '';
$limit        = ( $instance['limit'] && '' <> $instance['limit'] ) ? (int) $instance['limit'] : 10;
$item_visible = ( $instance['item_visible'] && '' <> $instance['item_visible'] ) ? (int) $instance['item_visible'] : 2;
$autoplay     = $instance['autoplay'] ? 'true' : 'false';
//$mousewheel   = $instance['mousewheel'] ? 1 : 0;
$full_description = isset($instance['full_description']) ? $instance['full_description'] : false;

$testomonial_args = array(
	'post_type'      => 'testimonials',
	'posts_per_page' => $limit,
	'ignore_sticky_posts' => true
);

$testimonial = new WP_Query( $testomonial_args );

if ( $testimonial->have_posts() ) {
	if ( $instance['title'] ) {
		echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
	}
	$html = '<div class="thim-testimonial-carousel layout-1" data-tablet="'.$item_visible.'" data-visible="'.$item_visible.'" data-auto="' . $autoplay . '" data-pagination="true">';
	while ( $testimonial->have_posts() ) : $testimonial->the_post();
		$link    = get_post_meta( get_the_ID(), 'website_url', true );
		$regency = get_post_meta( get_the_ID(), 'regency', true );
		$author = get_post_meta( get_the_ID(), 'author', true );

		$html .= '<div class="testimonial-item">';
		if( has_post_thumbnail() ) {
			$html .= '<div class="testimonial-thumbnail">';
			$html .= thim_get_feature_image( get_post_thumbnail_id(), 'full', 120, 120 );
			$html .= '<div class="author">' . $author . '</div>';
			$html .= '<div class="regency">' . esc_attr( $regency ) . '</div>';
			$html .= '</div>';
		}
		$html .= '<div class="testimonial-content">';
		$html .= '<div class="wrap-box">';

		if ( $link <> '' ) {
			$html .= '<div class="title"><a href="' . $link . '">' . get_the_title() . '</a></div>';
		} else {
			$html .= '<div class="title"><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></div>';
		}

        if($full_description) {
            $html .= '<div class="description full_content">' . get_the_content() . '</div>';
        } else {
            $html .= '<div class="description">' . thim_excerpt( '50' ) . '</div>';
        }
		
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';


	endwhile;
	$html .= '</div>';
}

wp_reset_postdata();
echo ent2ncr( $html );
?>


