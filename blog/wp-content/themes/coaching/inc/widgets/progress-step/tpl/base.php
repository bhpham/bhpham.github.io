<?php
wp_enqueue_script('owl-carousel');
$html       = '';
$title      = $instance['title'] ? $instance['title'] : '';
$title_desc = $instance['title_description'] ? $instance['title_description'] : '';
$panel_list = $instance['panel'] ? $instance['panel'] : '';
$num        = 1;
$timeout    = $instance['autoplayTimeout'] ? $instance['autoplayTimeout'] : '' ;
$autoplay   = $instance['autoplay'] ? $instance['autoplay'] : '';
$pagination   = $instance['pagination'] ? $instance['pagination'] : '';
$navigation   = $instance['navigation'] ? $instance['navigation'] : '';
?>

<div class="thim-progress-step">
	<div class="row">
		<?php
		if ( $title != '' ) {
			echo '<div class="progress-step-title progress-step col-md-3 col-sm-4">';
			echo '<h3 class="widget-title">' . $title . '</h3>';
			echo '<div class="widget-title-description">' . $title_desc . '</div>';
			echo '</div>';
		}
		?>
		<div class="col-md-9 col-sm-8 thim-progress-step-carousel-container">
			<div class="thim-progress-step-carousel owl-theme owl-drag" data-visible="3" data-pagination="<?php echo esc_attr($pagination);?>" data-navigation="<?php echo esc_attr($navigation);?>" data-desktopsmall="2" data-itemtablet="1" data-autoplaytimeout="<?php echo esc_attr($timeout) ?>" data-autoplay="<?php echo esc_attr($autoplay) ?>">
				<?php foreach ( $panel_list as $key => $panel ) : ?>
					<div class="progress-step progress-step-item" role="tablist">
						<div class="panel-heading" role="tab">
							<div class="num-progress circle circle-border">
								<div class="circle-inner">
									<?php
									echo esc_html( $num );
									$num ++;
									?>
								</div>
							</div>
							<h4 class="panel-title">
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