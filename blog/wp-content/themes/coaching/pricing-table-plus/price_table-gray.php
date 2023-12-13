<?php
$data = get_post_meta( $pid, 'pricing_table_opt', true );
$featured = get_post_meta( $pid, 'pricing_table_opt_feature', true );
wp_enqueue_style('table-plus-minimal',plugins_url('/pricing-table-plus/tpls/css/minimal.css'), array());

?>

<div id="shaon-pricing-table-plus" class="gray">
	<div class="minimal">

		<?php
		foreach ( $data as $key => $value ) {
			?>
			<div class="highlight plan p1<?php if ( $featured == $key ) { echo " featured"; } ?>">
                <div class="content-highlight">
                    <h3><?php echo $key; ?>
                    </h3>
                    <h4>
                        <span class="amount"><?php echo $currency; ?><?php echo $value['Price']; ?></span><span class="interval"><?php echo $value['Detail']; ?></span>
                    </h4>

                    <div class="features">
                        <ul>
                            <?php foreach ( $value as $key1 => $value1 ) {
                                if ( strtolower( $key1 ) == 'detail' ) {
                                    echo "";
                                } else {
                                    if ( strtolower( $key1 ) != "button url" && strtolower( $key1 ) != "button text" && strtolower( $key1 ) != "price" ) {
                                        $value1 = explode( "|", $value1 );
                                        if (count( $value1 ) > 1 && $value1[1] != '' ) {
                                            echo "<li><b title='{$value1[1]}'>" . $value1[0] . "</b> $key1</li>";
                                        } else {
                                            echo "<li><b>" . $value1[0] . "</b> $key1</li>";
                                        }
                                    }
                                }
                            }
                            ?>
                        </ul>
                        <div class="select">
                            <div>
                                <a class="pt-button" href="<?php echo $value['Button URL'] ?>"><span><?php echo $value['Button Text'] ?></span></a>
                            </div>
                        </div>

                    </div>
                </div>
			</div>
		<?php } ?>

	</div>
</div>
<div style="clear:both"></div>
 