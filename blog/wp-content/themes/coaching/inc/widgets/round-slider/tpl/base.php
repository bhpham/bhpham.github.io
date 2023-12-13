<?php
wp_enqueue_script('magnific-popup');
$html       = '';
$title      = $instance['title'] ? $instance['title'] : '';
$panel_list = $instance['panel'] ? $instance['panel'] : '';

if ( empty( $panel_list ) ) {
	return;
}
?>
<?php
if ( $title != '' ) {
    echo '<h3 class="widget-title">' . $title . '</h3>';
}
?>
<div class="thim-round-slider-container">
	<div class="thim-round-slider">
		<?php foreach ( $panel_list as $key => $panel ) : ?>
			<?php
			$image_thumb = '';
			$type        = $panel['panel_type'] ? 'type-' . $panel['panel_type'] : 'type-image';
            if ( get_theme_mod('thim_page_builder_chosen') == 'elementor' ) {
                $src         = $panel['panel_image'] ? wp_get_attachment_image_src( $panel['panel_image']['id'], 'full' ) : '';
            } else {
                $src = $panel['panel_image'] ? wp_get_attachment_image_src( $panel['panel_image'], 'full' ) : '';
            }

			if( empty( $src ) ) {
				$src = thim_get_src_demo_image();
			}

			$image_thumb = '<div class="image ' . $type . '">';
			$image_thumb .= '<img src="' . $src[0] . '" alt="image-' . $key . '" data-key="' . $key . '"/>';
			if ( $type === 'type-image' ) {

			} else {
				$image_thumb .= '<i class="icon fa fa-caret-right" data-key="' . $key . '"></i>';
			}
			$image_thumb .= '</div>';


			if ( $type === 'type-image' ) {
                if ( get_theme_mod('thim_page_builder_chosen') == 'elementor' ) {
                    $src_large = $panel['panel_image_large'] ? wp_get_attachment_image_src( $panel['panel_image_large']['id'], 'full' ) : '';
                } else {
                    $src_large = $panel['panel_image_large'] ? wp_get_attachment_image_src( $panel['panel_image_large'], 'full' ) : '';
                }
				$panel_title = $panel['panel_title'];
				if( empty( $src_large ) ) {
					$src_large = thim_get_src_demo_image();
				}
				$html .= '<div class="round-slider-content mfp-hide" data-key="' . $key . '">';
				$html .= '<img src="' . $src_large[0] . '" alt="image-large-' . $key . '"/>';
				$html .= '<div class="round-slider-title">'.$panel_title.'</div>';
				$html .= '</div>';
			} else {
				if( $panel['panel_video'] ) {
					$html .= '<div class="round-slider-content mfp-hide" data-key="' . $key . '">';
					if ( filter_var( $panel['panel_video'], FILTER_VALIDATE_URL ) ) {
						if ( $oembed = @wp_oembed_get( $panel['panel_video'] ) ) {
							$html .= $oembed;
						}else{
							$html .= '<object style="max-width:100%;height:100%;width: 820px; height: 461.25px; float: none; clear: both; margin: 2px auto;" data="'.$panel['panel_video'].'"></object>';
						}
					}
					else {

						if (strpos($panel['panel_video'], '<iframe') !== false) {
							$html .= $panel['panel_video'];
						} elseif(strpos($panel['panel_video'], 'embed') !== false) {
							$html .= '<object style="width:100%;height:100%;width: 820px; height: 461.25px; float: none; clear: both; margin: 2px auto;" data="'.$panel['panel_video'].'"></object>';
						} elseif(strpos($panel['panel_video'], 'watch?v') !== false) {
							$pieces = explode("watch?v=", $panel['panel_video']);
							$html .= '<object style="width:100%;height:100%;width: 820px; height: 461.25px; float: none; clear: both; margin: 2px auto;" data="https://www.youtube.com/embed/'.$pieces[1].'"></object>';
						} else {
							$html .= $panel['panel_video'];
						}

					}
					$html .= '</div>';
				}

			}

			?>
			<?php if( $panel['panel_video'] ) {?>

			<?php }?>
			<div class="item">
				<?php echo ent2ncr( $image_thumb ); ?>
			</div>

		<?php endforeach; ?>

	</div>
	<?php
	if ( ! empty( $html ) ) {
		echo ent2ncr( $html );
	}
	?>
</div>