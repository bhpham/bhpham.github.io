<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<div class="description">
	<?php echo thim_excerpt( 35 ); ?>

</div>
<div class="view-detail">
	<a href="<?php echo esc_attr( get_the_permalink() ); ?>">
		<?php esc_html_e( 'View Detail', 'coaching' ); ?>
	</a>
</div>