<?php
$number_post        = ( $instance['number_post'] && '' <> $instance['number_post'] ) ? (int) $instance['number_post'] : 5;
$our_team_args = array(
	'posts_per_page'      => $number_post,
	'post_type'           => 'our_team',
	'ignore_sticky_posts' => true
);

if ( $instance['cat_id'] && $instance['cat_id'] != 'all' ) {
	if ( get_term( $instance['cat_id'], 'our_team_category' ) ) {
		$our_team_args['tax_query'] = array(
			array(
				'taxonomy' => 'our_team_category',
				'field'    => 'term_id',
				'terms'    => $instance['cat_id']
			),
		);
	}
}
$our_team = new WP_Query( $our_team_args );
$html     = '';
if ( $our_team->have_posts() ) {
	$html .= '<div class="list_team_business" data-rtl="true">';
	while ( $our_team->have_posts() ): $our_team->the_post();
		$team_id      = get_the_ID();
		$regency      = get_post_meta( $team_id, 'regency', true );
		$link_face    = get_post_meta( $team_id, 'face_url', true );
		$link_twitter = get_post_meta( $team_id, 'twitter_url', true );
		$skype_url    = get_post_meta( $team_id, 'skype_url', true );
		$dribbble_url = get_post_meta( $team_id, 'dribbble_url', true );
		$linkedin_url = get_post_meta( $team_id, 'linkedin_url', true );
		$html .= '<div class="item_team">';
			$html .= '<div class="image_team">';
				$html .= thim_get_feature_image( get_post_thumbnail_id(), 'full', 532, 356 );
			$html .= '</div>';
			$html .= '<div class="content">';
				if ( ! empty( $instance['link_member'] ) ) {
					$html .= '<h4 class="title"><a href="' . esc_url( get_permalink() ) . '">' . get_the_title() . '</a></h4>';
				} else {
					$html .= '<h4 class="title">' . get_the_title() . '</h4>';
				}
				$html .= '<div class="content-team">' . get_the_content() . '</div>';
				$html .= '<div class="social-team">';
				if ( $link_face <> '' ) {
					$html .= '<a target="_blank" href="' . $link_face . '"><i class="fa fa-facebook"></i></a>';
				}
				if ( $link_twitter <> '' ) {
					$html .= '<a target="_blank" href="' . $link_twitter . '"><i class="fa fa-twitter"></i></a>';
				}
				if ( $dribbble_url <> '' ) {
					$html .= '<a target="_blank" href="' . $dribbble_url . '"><i class="fa fa-dribbble"></i></a>';
				}
				if ( $skype_url <> '' ) {
					$html .= '<a target="_blank" href="' . $skype_url . '"><i class="fa fa-skype"></i></a>';
				}
				if ( $linkedin_url <> '' ) {
					$html .= '<a target="_blank" href="' . $linkedin_url . '"><i class="fa fa-linkedin"></i></a>';
				}
				$html .= '</div>';
			$html .= '</div>';
		$html .= '</div>';

	endwhile;
	$html .= '</div>';
}

wp_reset_postdata();

echo ent2ncr( $html );