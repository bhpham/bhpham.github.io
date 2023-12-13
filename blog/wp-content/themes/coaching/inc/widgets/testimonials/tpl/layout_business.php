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

?>
<div class="thim-round-testimonial layout_business item-<?php echo $item_visible?>">
	<?php
	if ( $instance['title'] ) {
		echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
	}
	?>
	<div class="thim-round-testimonial-slider" data-tablet="<?php echo $item_visible ?>" data-visible="<?php echo $item_visible ?>" data-auto="<?php echo $autoplay ?>" data-pagination="true" data-padding="-10" data-imgwidth="270">
		<?php
		if ( $testimonial->have_posts() ) {
			//$html = '<div class="thim-testimonial-carousel layout-1 round_slider" data-tablet="'.$item_visible.'" data-visible="'.$item_visible.'" data-auto="' . $autoplay . '" data-pagination="true">';
			while ( $testimonial->have_posts() ) : $testimonial->the_post();
				$regency = get_post_meta( get_the_ID(), 'regency', true );
				$author = get_post_meta( get_the_ID(), 'author', true );
				?>
				<?php
				$html = '<div class="image">';
				$html .= thim_get_feature_image( get_post_thumbnail_id(), 'full', 270, 315 );
				$html .= '</div>';
				$html .= '<div class="content">';

                if($full_description) {
                    $html .= '<div class="description full_content">' . get_the_content() . '</div>';
                } else {
                    $html .= '<div class="description">' . thim_excerpt( '20' ) . '</div>';
                }
				$html .= '<div class="regency">' . esc_attr( $regency ) . '</div>';
				$html .= '<div class="author"><a href="' . get_the_permalink() . '">' . $author . '</a></div>';
				$html .= '</div>';
				?>
				<div class="item">
					<?php echo ent2ncr( $html ); ?>
				</div>
				<?php
			endwhile;
			//$html .= '</div>';
		}

		wp_reset_postdata();
		?>
	</div>
</div>


