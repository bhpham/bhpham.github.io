<?php
wp_enqueue_script('twenty-twenty');
wp_enqueue_script('owl-carousel');
$link         = $regency = '';
$limit        = ( $instance['limit'] && '' <> $instance['limit'] ) ? (int) $instance['limit'] : 3;
$item_visible = ( $instance['item_visible'] && '' <> $instance['item_visible'] ) ? (int) $instance['item_visible'] : 1;
$autoplay     = $instance['autoplay'] ? 1 : 0;
//$mousewheel   = $instance['mousewheel'] ? 1 : 0;
$full_description = isset($instance['full_description']) ? $instance['full_description'] : false;

$testomonial_args = array(
	'post_type'           => 'testimonials',
	'posts_per_page'      => $limit,
	'ignore_sticky_posts' => true
);
$index = 1;
$testimonial = new WP_Query( $testomonial_args );

if ( $testimonial->have_posts() ) {
	if ( $instance['title'] ) {
		echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
	}
	$html = '<div class="thim-testimonial-before-after thim-carousel-wrapper" data-visible="' . $item_visible . '" data-autoplay="' . $autoplay . '" data-pagination="true" data-mousedrag="no" data-desktopsmall="1" data-itemmobile_horizontal="1" data-itemtablet="1">';
	while ( $testimonial->have_posts() ) : $testimonial->the_post();
		$link         = get_post_meta( get_the_ID(), 'website_url', true );
		$regency      = get_post_meta( get_the_ID(), 'regency', true );
		$author       = get_post_meta( get_the_ID(), 'author', true );
		$image_before = get_post_meta( get_the_ID(), 'thim_image_before', true );
		$image_after  = get_post_meta( get_the_ID(), 'thim_image_after', true );
//		if( $index > 1){
//			break;
//		}
//		$index++;
		$html .= '<div class="testimonial-item">';

		$html .= '<div class="testimonial-image twentytwenty-container" style="width: 470px; height: 470px;">';
		if ( !empty( $image_before ) ) {
			$html .= '<img src="' . wp_get_attachment_url( $image_before ) . '" alt="testimonial-after" />';
		}
		if ( !empty( $image_after ) ) {
			$html .= '<img src="' . wp_get_attachment_url( $image_after ) . '" alt="testimonial-after" />';
		}
		$html .= '</div>';

		$html .= '<div class="testimonial-content">';
		if ( $link <> '' ) {
			$html .= '<div class="title"><a href="' . $link . '">' . get_the_title() . '</a></div>';
		} else {
			$html .= '<div class="title"><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></div>';
		}
        if($full_description) {
            $html .= '<div class="description full_content">' . get_the_content() . '</div>';
        } else {
            $html .= '<div class="description">' . thim_excerpt( '45' ) . '</div>';
        }

		$html .= '<div class="author">' . $author . '</div>';
		$html .= '<div class="regency">' . esc_attr( $regency ) . '</div>';
		$html .= '</div>';
		$html .= '</div>';

	endwhile;
	$html .= '</div>';
}

wp_reset_postdata();
echo ent2ncr( $html );



