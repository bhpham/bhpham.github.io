<?php
$settings = array(
	'pagination'       => true,
	'height'            => $instance['thim_slider_height'],
	'speed'            => $instance['thim_slider_speed'],
	'timeout'          => $instance['thim_slider_timeout'],
	'full_screen'      => $instance['slider_full_screen'],
);

if ( empty( $instance['thim_slider_frames'] ) ) {
	return;
}
$height = '500';
if ( !empty( $instance['thim_slider_height'] ) ) {
	$height = $instance['thim_slider_height'];
}
?>
<div class=" <?php if ( wp_is_mobile() ) {
	echo 'sow-slider-is-mobile';
} ?>">
	<div id="thim-slider" class="owl-carousel" data-autoplay="<?php if($instance['slider_autoplay']) echo '1'; else echo '';?>" data-bullets="<?php if($instance['slider_bullets']) echo '1'; else echo '';?>" data-control="<?php if($instance['slider_control']) echo '1'; else echo '';?>" data-interval="<?php if(!empty($instance['thim_slider_timeout'])) echo $instance['thim_slider_timeout'];?>">
		<?php
		foreach ( $instance['thim_slider_frames'] as $frame ) {
			if ( empty( $frame['thim_slider_background_image'] ) ) {
				$background_image = false;
			} else {
				$background_image     = wp_get_attachment_image_src( $frame['thim_slider_background_image'], 'full' );
				$background_image_url = 'background-image: url(' . esc_url( $background_image['0'] ) . ');';
			}
			?>
			<div class="item" style="background-image: url(<?php if(!empty($background_image)) echo esc_url( $background_image['0'] );?>);" >
				<span class="overlay_images"<?php if ( $frame['color_overlay'] ) {
					echo ' style="background-color:' . $frame['color_overlay'] . '"';
				} ?>></span>
				<div class="container">
					<div class="inner-item" style="height: <?php echo $height.'px';?>;">
						<div class="wrapper-content">
							<div class="<?php echo 'slider-' . esc_attr( $frame['content']['thim_slider_align'] ) ?>" style="<?php if ( !empty( $frame['content']['thim_content_width'] ) ) echo ' width: '.$frame['content']['thim_content_width'].'px';?>">
								<?php
								foreach ( $frame['thim_slider_items'] as $item ) {
									switch ($item['thim_slider_item_type']) {
										case 'inputbox':
											?>
											<div class="slider_item_content <?php echo $item['thim_slider_item_class'];?> <?php echo $item['thim_slider_item_delay'];?> animate_<?php echo $item['thim_slider_item_animate'];?>">
												<?php echo $item['thim_slider_item_title_text'];?>
											</div>
											<?php
											break;
										case 'texarea':
											?>
											<div class="slider_item_content <?php echo $item['thim_slider_item_class'];?> <?php echo $item['thim_slider_item_delay'];?> animate_<?php echo $item['thim_slider_item_animate'];?>">
												<?php echo $item['thim_slider_item_title_textarea'];?>
											</div>
											<?php
											break;
										case 'button':
											?>
											<a href="<?php echo $item['thim_slider_item_title_button_link'];?>" class="slider_item_content <?php echo $item['thim_slider_item_class'];?> <?php echo $item['thim_slider_item_delay'];?> animate_<?php echo $item['thim_slider_item_animate'];?>">
												<?php echo $item['thim_slider_item_title_button_text'];?>
											</a>
											<?php
											break;
										case 'image':
											?>
											<img src="<?php echo $item['thim_slider_item_title_image'];?>" class="slider_item_content <?php echo $item['thim_slider_item_class'];?> <?php echo $item['thim_slider_item_delay'];?> animate_<?php echo $item['thim_slider_item_animate'];?>">
											<?php
											break;
									}
									?>
									<div class="slider_item_content <?php echo $item['thim_slider_item_class'];?> <?php echo $item['thim_slider_item_delay'];?> animate_<?php echo $item['thim_slider_item_animate'];?>">
										<?php echo $item['thim_slider_item_title'];?>
									</div>
									<?php
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		}
		?>
	</ul>

</div>

