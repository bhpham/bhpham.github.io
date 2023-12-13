<?php
/**
 * Template for displaying content of landing course
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$course    = learn_press_get_course();
$course_id = $course->get_id();

?>

<div id="learn-press-course" class="course-summary learn-press coming-soon-detail">

    <?php the_title( '<h1 class="entry-title" itemprop="name">', '</h1>' ); ?>

    <?php if( 'no' !== get_post_meta( $course_id, '_lp_coming_soon_metadata', true ) ) {?>

        <div class="course-meta">
            <?php do_action( 'thim_single_course_meta' );?>
        </div>
        <div class="course-payment">
            <?php do_action( 'thim_single_course_payment' );?>
        </div>

    <?php }?>

    <div class="thim-top-course<?php echo !has_post_thumbnail($course_id) ? ' no-thumbnail' : ''; ?>">
        <?php if( 'no' !== get_post_meta( $course_id, '_lp_coming_soon_countdown', true ) ) {?>
            <?php do_action( 'learn_press_content_coming_soon_countdown' ); ?>
        <?php }?>
        <?php learn_press_get_template( 'single-course/thumbnail.php', array() ); ?>
    </div>

    <?php if( 'no' !== get_post_meta( $course_id, '_lp_coming_soon_details', true ) ) {?>

        <div class="course-summary">
            <?php
            /**
             * @since 3.0.0
             *
             * @see learn_press_single_course_summary()
             */
            do_action( 'learn-press/single-course-summary' );
            ?>
        </div>

    <?php }?>

    <div class="message message-warning learn-press-message coming-soon-message"><?php do_action( 'learn_press_content_coming_soon_message' ); ?></div>

</div>