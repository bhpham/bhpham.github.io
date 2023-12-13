<?php
/**
 * Template for displaying archive collection content.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/addons/collection/archive-collection.php.
 *
 * @author  ThimPress
 * @package LearnPress/Collections/Templates
 * @version 3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();
?>

<?php do_action( 'learn_press_before_main_content' ); ?>

<?php do_action( 'learn_press_collections_archive_description' ); ?>

<div class="thim-course-collections row">
	<?php if ( have_posts() ) : ?>

		<?php do_action( 'learn_press_collections_before_loop' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<div class="col-12 col-xs-4">
				<?php learn_press_collections_get_template( 'content-collection.php' ); ?>
			</div>

		<?php endwhile; ?>

		<?php do_action( 'learn_press_collections_after_loop' ); ?>

	<?php endif; ?>
</div>

<?php do_action( 'learn_press_after_main_content' ); ?>
