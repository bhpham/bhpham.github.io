<?php
$data     = get_post_meta( $pid, 'pricing_table_opt', true );
$featured = get_post_meta( $pid, 'pricing_table_opt_feature', true );

wp_enqueue_style( 'table-plus-minimal', plugins_url( '/pricing-table-plus/tpls/css/minimal.css' ), array() );

?>

<div id="shaon-pricing-table-plus" class="smooth">
	<div class="minimal row">
		<?php
		foreach ( $data as $key => $value ) {
			?>
			<div class="highlight plan p1<?php if ( $featured == $key ) {
				echo " featured";
			} ?>">
				<div class="content-highlight">
					<h3><span><?php echo get_the_title( $pid ); ?></span>
						<?php if ( $featured == $key ) {
							echo '<span class="featured-text">' . esc_html__( 'POPULAR', 'coaching' ) . '</span>';
						} ?>
						<?php echo esc_html( $key ); ?>
					</h3>
					<div class="price">
						<h4>
							<span class="amount"><span><?php echo esc_html( $currency ); ?></span><?php echo esc_html( $value['Price'] ); ?></span><span class="interval"><?php echo esc_html( $value['Detail'] ); ?></span>
						</h4>
					</div>
					<div class="features">
						<ul>

							<?php foreach ( $value as $key1 => $value1 ) {
								if ( strtolower( $key1 ) == 'detail' ) {
									echo "";
								} else {
									if ( strtolower( $key1 ) != "button url" && strtolower( $key1 ) != "button text" && strtolower( $key1 ) != "price" ) {
										$value1 = explode( "|", $value1 );
										if ( count( $value1 ) > 1 && $value1[1] != '' ) {
											echo "<li><b title='{$value1[1]}'>" . $value1[0] . "</b> $key1</li>";
										} else {
											echo "<li><b>" . $value1[0] . "</b> $key1</li>";
										}
									}
								}
							}
							?>
							<li>
								<a class="pt-button" href="<?php echo esc_url( $value['Button URL'] ); ?>"><span><?php echo esc_html( $value['Button Text'] ); ?></span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		<?php } ?>

	</div>
</div>
<div style="clear:both"></div>
 