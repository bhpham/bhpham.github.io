<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php if ( has_post_thumbnail() ): ?>

	<?php if ( ! is_singular( 'tp_event' ) || ! in_the_loop() ): ?>
		<a href="<?php the_permalink() ?>">
			<?php echo thim_get_feature_image( get_post_thumbnail_id(), 'full', '560', '240' ); ?>
		</a>
	<?php else: ?>
		<?php the_post_thumbnail(); ?>
	<?php endif; ?>

<?php endif; ?>