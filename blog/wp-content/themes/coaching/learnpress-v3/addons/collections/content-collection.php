<?php
/**
 * Template for displaying collection content within the loop.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/collection/content-collection.php.
 *
 * @author  ThimPress
 * @package LearnPress/Collections/Templates
 * @version 3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

$thumbnail_id = get_post_thumbnail_id();
?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php do_action( 'learn_press_collections_before_loop_item' ); ?>
	<div class="outline">
		<?php if ( $thumbnail_id ): ?>

			<div class="thumbnail">
				<a href="<?php the_permalink(); ?>" class="">
					<?php echo thim_get_feature_image( $thumbnail_id, 'full', 450, 450 ); ?>
				</a>
			</div>

		<?php endif; ?>

		<h3 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	</div>
	<?php do_action( 'learn_press_collections_after_loop_item' ); ?>

</div>