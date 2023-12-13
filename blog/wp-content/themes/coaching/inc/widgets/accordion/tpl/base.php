<?php

$html       = '';
$group_id   = 'accordion_' . uniqid();
$title      = $instance['title'] ? $instance['title'] : '';
$panel_list = $instance['panel'] ? $instance['panel'] : '';
?>

<div class="thim-widget-accordion">
	<?php
	if ( $title != '' ) {
		echo '<h3 class="widget-title">' . $title . '</h3>';
	}
	?>
	<div id="<?php echo esc_attr( $group_id ); ?>" class="panel-group" role="tablist" aria-multiselectable="true">
		<!-- List Panel -->
		<?php
		$first_panel = $panel_list[0];
		$collapsed   = '';
		$in          = '';
		if ( $instance['show_first_panel'] ) {
			$in = 'in';
		} else {
			$collapsed = 'collapsed';
		}
		?>

		<div class="panel panel-default">
			<div class="panel-heading" role="tab" id="<?php echo esc_attr( 'heading_' . $group_id . '_0' ); ?>">
				<h4 class="panel-title">
					<a role="button" class="<?php echo esc_attr( $collapsed ); ?>" data-toggle="collapse" data-parent="#<?php echo esc_attr( $group_id ); ?>" href="<?php echo esc_attr( '#collapse_' . $group_id . '_0' ); ?>" aria-expanded="false">
						<?php echo esc_html( $first_panel['panel_title'] ); ?>
					</a>
				</h4>
			</div>
			<div id="<?php echo esc_attr( 'collapse_' . $group_id . '_0' ); ?>" class="panel-collapse collapse <?php echo esc_attr( $in ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( 'heading_' . $group_id . '_0' ); ?>">
				<div class="panel-body">
					<?php echo ent2ncr( $first_panel['panel_body'] ); ?>
				</div>
			</div>
		</div>
		<?php array_shift( $panel_list ); ?>
		<?php foreach ( $panel_list as $key => $panel ) : ?>
			<?php $count = $key + 1 ?>
			<div class="panel panel-default">
				<div class="panel-heading" role="tab" id="<?php echo esc_attr( 'heading_' . $group_id . '_' . $count ); ?>">
					<h4 class="panel-title">
						<a role="button" class="collapsed" data-toggle="collapse" data-parent="#<?php echo esc_attr( $group_id ); ?>" href="<?php echo esc_attr( '#collapse_' . $group_id . '_' . $count ); ?>" aria-expanded="false">
							<?php echo esc_html( $panel['panel_title'] ); ?>
						</a>
					</h4>
				</div>
				<div id="<?php echo esc_attr( 'collapse_' . $group_id . '_' . $count ); ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="<?php echo esc_attr( 'heading_' . $group_id . '_' . $count ); ?>">
					<div class="panel-body">
						<?php echo ent2ncr( $panel['panel_body'] ); ?>
					</div>
				</div>
			</div>

		<?php endforeach; ?>
		<!-- End: List Panel -->
	</div>


</div>