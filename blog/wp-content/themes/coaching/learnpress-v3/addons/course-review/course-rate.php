<?php
if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$course_id       = get_the_ID();
$course_rate_res = learn_press_get_course_rate( $course_id, false );
$course_rate     = $course_rate_res['rated'];
$total           = $course_rate_res['total'];

?>
<div class="course-rating">
    <h3><?php esc_html_e( 'Reviews', 'coaching' ); ?></h3>

    <div class="average-rating" itemprop="aggregateRating" itemscope="" itemtype="http://schema.org/AggregateRating">
        <p class="rating-title"><?php esc_html_e( 'Average Rating', 'coaching' ); ?></p>

        <div class="rating-box">
            <div class="average-value" itemprop="ratingValue"><?php echo ( $course_rate ) ? esc_html( round( $course_rate, 1 ) ) : 0; ?></div>
            <div class="review-star">
                <?php thim_print_rating( $course_rate ); ?>
            </div>
            <div class="review-amount" itemprop="ratingCount">
                <?php $total ? printf( _n( '%1$s rating', '%1$s ratings', $total, 'coaching' ), number_format_i18n( $total ) ) : esc_html_e( '0 rating', 'coaching' ); ?>
            </div>
        </div>
    </div>
    <div class="detailed-rating">
        <p class="rating-title"><?php esc_html_e( 'Detailed Rating', 'coaching' ); ?></p>

        <div class="rating-box">
            <?php thim_detailed_rating( $course_id, $total ); ?>
        </div>
    </div>

</div>
