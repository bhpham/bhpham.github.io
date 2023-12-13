<?php
// Title
$title           = $instance['title'] ? $instance['title'] : '';
$style           = $bg_style = '';
$group_id        = 'progress_' . uniqid();
$progress_with   = '';
$progress_height = '';
if ( !empty( $instance['panel'] ) ) {
	$progress_with .= $instance['panel'];
}
if ( !empty( $instance['style_options']['height'] ) ) {
	$progress_height .= "height: " . $instance['style_options']['height'] . "px;";
}
if ( !empty( $instance['style_options']['color'] ) ) {
	$style .= "background: " . $instance['style_options']['color'] . ";";
}
if ( !empty( $instance['style_options']['bg_color'] ) ) {
	$bg_style .= "background: " . $instance['style_options']['bg_color'] . ";";
}
?>
<div class="thim-widget-progress">
	<div class="row">
		<?php
		if ( $title != '' ) {
			echo '<div class="progress-title col-md-8 col-sm-8 col-xs-8">';
			echo '<h4 class="widget-title">' . $title . '</h4>';
			echo '</div>';
		}
		?>
		<div id="<?php echo esc_attr( $group_id ); ?>" class="panel-group" role="tablist" aria-multiselectable="true">
			<div class="wrap-percent">
				<div class="percent" style="margin-left: <?php echo esc_attr( $progress_with ) . '%' ?>"><?php echo esc_html( $progress_with ) . '%' ?></div>
			</div>
			<div class="progress-parent" style="<?php echo esc_attr( $bg_style ) . esc_attr( $progress_height ); ?>">
				<div class="progress" style="<?php echo esc_attr( $style ) . 'width: ' . esc_attr( $progress_with ) . '%;' . esc_attr( $progress_height ); ?>"></div>
			</div>
		</div>
	</div>
</div>