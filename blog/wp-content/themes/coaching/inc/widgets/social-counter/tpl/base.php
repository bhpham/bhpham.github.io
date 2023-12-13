<?php

$settings = get_option( 'socialcountplus_settings' );

$target_blank = ( !empty( $settings['target_blank'] ) ) ? 'target="_blank"' : '';
$design = get_option( 'socialcountplus_design' );
$count  = Social_Count_Plus_Generator::get_count();
$icons  = isset( $design['icons'] ) ? array_map( 'sanitize_key', explode( ',', $design['icons'] ) ) : array();

if ( $instance['title'] ) {
	echo ent2ncr( $args['before_title'] . $instance['title'] . $args['after_title'] );
}

$html   = '<div class="thim-social-counter">';
$html .= '<ul>';

foreach ( $icons as $icon ) {

	if ( !isset( $count[$icon] ) ) {
		continue;
	}

	switch ( $icon ) {
		case 'comments':
			$html .= '<li class="count-comments">';
			$html .= '<a class="fa fa-comments" href="' . esc_url( $settings['comments_url'] ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'comments' ) . '</span><span class="label">' . esc_html( 'Comments', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'facebook':
			$facebook_id  = !empty( $settings['facebook_id'] ) ? $settings['facebook_id'] : '';
			$facebook_url = 'https://www.facebook.com/' . $facebook_id;
			$html .= '<li class="count-facebook">';
			$html .= '<a class="fa fa-facebook" href="' . esc_url( $facebook_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'facebook' ) . '</span><span class="label">' . esc_html( 'Likes', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'github':
			$github_url = !empty( $settings['github_username'] ) ? 'https://github.com/' . $github_username : 'https://github.com/';
			$html .= '<li class="count-github">';
			$html .= '<a class="fa fa-github" href="' . esc_url( $github_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'github' ) . '</span><span class="label">' . esc_html( 'Followers', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'googleplus':
			$googleplus_url = !empty( $settings['googleplus_id'] ) ? 'https://plus.google.com/' . $settings['googleplus_id'] : 'https://plus.google.com/';
			$html .= '<li class="count-googleplus">';
			$html .= '<a class="fa fa-google-plus" href="' . esc_url( $googleplus_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'googleplus' ) . '</span><span class="label">' . esc_html( 'Followers', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'instagram':
			$instagram_url = !empty( $settings['instagram_username'] ) ? 'https://instagram.com/' . $settings['instagram_username'] : 'https://instagram.com/';
			$html .= '<li class="count-instagram">';
			$html .= '<a class="fa fa-instagram" href="' . esc_url( $instagram_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'instagram' ) . '</span><span class="label">' . esc_html( 'Followers', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'linkedin':
			$linkedin_url = !empty( $settings['linkedin_company_id'] ) ? 'https://www.linkedin.com/company/' . $settings['linkedin_company_id'] : 'https://www.linkedin.com/company/';
			$html .= '<li class="count-linkedin">';
			$html .= '<a class="fa fa-linkedin" href="' . esc_url( $linkedin_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'linkedin' ) . '</span><span class="label">' . esc_html( 'Followers', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'pinterest':
			$pinterest_url = !empty( $settings['pinterest_username'] ) ? 'https://www.pinterest.com/' . $settings['pinterest_username'] : 'https://www.pinterest.com/';
			$html .= '<li class="count-pinterest">';
			$html .= '<a class="fa fa-pinterest" href="' . esc_url( $pinterest_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'pinterest' ) . '</span><span class="label">' . esc_html( 'Followers', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'posts':
			$post_url = !empty( $settings['posts_url'] ) ? $settings['posts_url'] : home_url('/');
			$html .= '<li class="count-posts">';
			$html .= '<a class="fa fa-pencil" href="' . esc_url( $post_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'posts' ) . '</span><span class="label">' . esc_html( 'Posts', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'soundcloud':
			$soundcloud_url = !empty( $settings['soundcloud_username'] ) ? 'https://soundcloud.com/' . $settings['soundcloud_username'] : 'https://soundcloud.com/';
			$html .= '<li class="count-soundcloud">';
			$html .= '<a class="fa fa-soundcloud" href="' . esc_url( $soundcloud_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'soundcloud' ) . '</span><span class="label">' . esc_html( 'Followers', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'steam':
			$steam_url = !empty( $settings['steam_group_name'] ) ? 'https://steamcommunity.com/groups/' . $settings['steam_group_name'] : 'https://steamcommunity.com/groups/';
			$html .= '<li class="count-steam">';
			$html .= '<a class="fa fa-steam" href="' . esc_url( $steam_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'steam' ) . '</span><span class="label">' . esc_html( 'Followers', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'tumblr':
			$tumblr_url = !empty( $settings['tumblr_hostname'] ) ? $settings['tumblr_hostname'] : '';
			$html .= '<li class="count-tumblr">';
			$html .= '<a class="fa fa-tumblr" href="' . esc_url( $tumblr_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'tumblr' ) . '</span><span class="label">' . esc_html( 'Followers', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'twitch':
			$twitch_url = !empty( $settings['twitch_username'] ) ? 'http://www.twitch.tv/' . $settings['twitch_username'] : 'http://www.twitch.tv/';
			$html .= '<li class="count-twitch">';
			$html .= '<a class="fa fa-twitch" href="' . esc_url( $twitch_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'twitch' ) . '</span><span class="label">' . esc_html( 'Followers', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'twitter':
			$twitter_url = !empty( $settings['twitter_user'] ) ? 'https://twitter.com/' . $settings['twitter_user'] : 'https://twitter.com/';
			$html .= '<li class="count-twitter">';
			$html .= '<a class="fa fa-twitter" href="' . esc_url( $twitter_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'twitter' ) . '</span><span class="label">' . esc_html( 'Followers', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'users':
			$users_url = !empty( $settings['users_url'] ) ? $settings['users_url'] : home_url('/');
			$html .= '<li class="count-users">';
			$html .= '<a class="fa fa-users" href="' . esc_url( $users_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'users' ) . '</span><span class="label">' . esc_html( 'Users', 'coaching' ) . '</span></span>';
			$html .= '</li>';

			break;
		case 'vimeo':
			$vimeo_url = !empty( $settings['vimeo_username'] ) ? 'https://vimeo.com/' . $settings['vimeo_username'] : 'https://vimeo.com/';
			$html .= '<li class="count-vimeo">';
			$html .= '<a class="fa fa-vimeo" href="' . esc_url( $vimeo_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'vimeo' ) . '</span><span class="label">' . esc_html( 'Followers', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;
		case 'youtube':
			$youtube_url = !empty( $settings['youtube_url'] ) ? $settings['youtube_url'] : '';
			$html .= '<li class="count-youtube">';
			$html .= '<a class="fa fa-youtube" href="' . esc_url( $youtube_url ) . '" ' . $target_blank . '></a>';
			$html .= '<span class="items"><span class="count">' . get_scp_counter( 'youtube' ) . '</span><span class="label">' . esc_html( 'Subscribers', 'coaching' ) . '</span></span>';
			$html .= '</li>';
			break;

		default:
			$html .= '';
	}
}

$html .= '</ul>';
$html .= '</div>';

echo ent2ncr( $html );

?>