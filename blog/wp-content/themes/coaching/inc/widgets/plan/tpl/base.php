<?php
wp_enqueue_script('owl-carousel');
$html       = '';
$panel_list = $instance['panel'] ? $instance['panel'] : '';
$num        = 1;
$timeout    = $instance['autoplayTimeout'] ? $instance['autoplayTimeout'] : '' ;
$autoplay   = $instance['autoplay'] ? $instance['autoplay'] : '';
$date_type  = $instance['date_type'] ? $instance['date_type'] : '';
?>

<div class="thim-plan">
	<div class="row">
	<div class="thim-plan-carousel-container">
		<div class="thim-carousel owl-theme owl-drag" data-visible="3" data-navigation="1" data-desktopsmall="2" data-itemtablet="1" data-autoplaytimeout="<?php echo esc_attr($timeout) ?>" data-autoplay="<?php echo esc_attr($autoplay) ?>">
			<?php foreach ( $panel_list as $key => $panel ) : ?>
				<div class="plan plan-item" role="tablist">
					<div class="panel-heading" role="tab">
						<div class="circle-border">
							<div class="circle circle-inner">
							<p class="panel-date">
								<?php echo esc_html( $date_type ); ?>
							</p>
							<p>
							<?php
							echo esc_html( $num );
							$num ++;
							?>
							</p>
							</div>
						</div>
						<h4 class="title">
							<?php echo esc_html( $panel['panel_title'] ); ?>
						</h4>
					</div>
					<div class="panel-body">
						<?php echo ent2ncr( $panel['panel_body'] ); ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
	</div>
</div>