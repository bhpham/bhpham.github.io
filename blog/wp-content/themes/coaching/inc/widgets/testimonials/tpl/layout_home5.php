<?php
wp_enqueue_script('owl-carousel');
$link             = $regency = '';
$limit            = ( $instance['limit'] && '' <> $instance['limit'] ) ? (int) $instance['limit'] : 10;
$item_visible     = ( $instance['item_visible'] && '' <> $instance['item_visible'] ) ? (int) $instance['item_visible'] : 2;
$autoplay         = $instance['autoplay'] ? 'true' : 'false';
$full_description = isset( $instance['full_description'] ) ? $instance['full_description'] : false;

$testomonial_args = array(
	'post_type'           => 'testimonials',
	'posts_per_page'      => $limit,
	'ignore_sticky_posts' => true
);

$testimonial = new WP_Query( $testomonial_args );

?>
<div class="thim-testimonial-home5 layout_home5 item-<?php echo $item_visible ?>">
	<?php
	if ( $instance['title'] ) {
		echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
	}
	?>
	<div class="thim-testimonial-carousel"
		 data-timeout="<?php echo $timeout; ?>"
		 data-visible="<?php echo $item_visible; ?>"
		 data-auto="<?php echo $autoplay; ?>"
		 data-pagination="false">
		<?php
		if ( $testimonial->have_posts() ) {
			while ( $testimonial->have_posts() ) : $testimonial->the_post();
				$regency = get_post_meta( get_the_ID(), 'regency', true );
				$author  = get_post_meta( get_the_ID(), 'author', true );
				?>
				<?php
				$html = '<div class="left-testimonials">';
				if ( $full_description ) {
					$html .= '<div class="description full_content">' . get_the_content() . '</div>';
				} else {
					$html .= '<div class="description">' . thim_excerpt( '55' ) . '</div>';
				}

				$html .= '<div class="content">';
				$html .= '<div class="image">';
				$html .= thim_get_feature_image( get_post_thumbnail_id(), 'full', 63, 63 );
				$html .= '</div>';

				$html .= '<div class="content-info">';
				$html .= '<div class="author"><a href="' . get_the_permalink() . '">' . $author . '</a></div>';
				$html .= '<div class="regency">' . esc_attr( $regency ) . '</div>';
				$html .= '</div>';

				$html .= '</div>';
				$html .= '</div>';

				$html .= '<div class="right-testimonials">';
				$html .= '<div class="image">';
				$html .= thim_get_feature_image( get_post_thumbnail_id(), 'full', 416, 531 );
				$html .= '</div>';
				$html .= '</div>';
				?>
				<div class="item">
					<?php echo ent2ncr( $html ); ?>
				</div>
			<?php
			endwhile;
		}

		wp_reset_postdata();
		?>
	</div>
</div>


