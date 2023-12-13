<?php
$link_before = $after_link = $image = $css_animation = $number = $style_width = '';
$list_items = $instance['item'];
wp_enqueue_script('owl-carousel');
?>
<div class="thim-timeline-slider">
	<div class="container">
		<div class="thim-carousel-wrapper <?php echo esc_attr( $css_animation ); ?>" data-navigation="1" data-visible="<?php echo esc_html( $instance['number'] ); ?>">

			<?php
			foreach ( $list_items as $item ) {
				?>
				<div class="item">
					<div class="top">
						<h3 class="title"><?php echo( $item['title'] ); ?></h3>
						<div class="description"><?php echo( $item['description'] ); ?></div>
					</div>

					<div class="bottom">
						<div class="dot"></div>
						<div class="time"><?php echo( $item['timeline'] ); ?></div>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>

	<div class="line"></div>
</div>