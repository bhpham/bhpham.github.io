<?php

$title    = $instance['title'] ? $instance['title'] : '';
$daily_support = $instance['daily-support'] ? $instance['daily-support'] : '';
if ( empty( $daily_support ) ) {
	return;
}
?>

<div class="thim_daily_support_container">
	<div class="thim_daily_support">

		<?php foreach ( $daily_support as $key => $support )  : ?>
			<?php
            if ( thim_plugin_active( 'elementor/elementor.php' ) ) {
                $support_image = $support['image_support']['id'];
            } else {
                $support_image = $support['image_support'];
            }

			$position_support  = $support['position_support'];
			$body_support = $support['body_support'];
			?>
			<div class="thim_item_support <?php echo esc_html($position_support);?>">
				<?php if($support_image) {?>
                    <?php echo thim_get_feature_image( $support_image, 'full', 50, 50 );?>
				<?php }?>
				<div class="thim_content_support">
					<?php echo ent2ncr( $body_support );?>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>




