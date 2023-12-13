<?php
$title          = $link_face = $link_twitter = $link_google = $link_dribble = $link_pinterest = $link_youtube = $link_instagram = $link_linkedin = '';
$title          = $instance['title'];
$link_face      = $instance['link_face'];
$link_twitter   = $instance['link_twitter'];
$link_google    = $instance['link_google'];
$link_dribble   = $instance['link_dribble'];
$link_linkedin  = $instance['link_linkedin'];
$link_pinterest = $instance['link_pinterest'];
$link_instagram = $instance['link_instagram'];
$link_youtube   = $instance['link_youtube'];

$show_text = ! empty( $instance['show_text'] ) ? true : false;
$class     = ( ! empty( $instance['style'] ) && $instance['style'] == 'no-border' ) ? 'no-border thim-social' : 'thim-social';

?>
<div class="<?php echo ent2ncr( $class ); ?>">
	<?php
	if ( $title ) {
		echo ent2ncr( $args['before_title'] . esc_attr( $title ) . $args['after_title'] );
	}
	?>
	<ul class="social_link">
		<?php
		if ( $link_face != '' ) {
			echo '<li>';
			if ( $show_text ) {
				echo '<a class="facebook hasTooltip" href="' . $link_face . '" target="' . $instance['link_target'] . '"><i class="fa fa-facebook"></i><span>' . esc_html__( 'Facebook', 'coaching' ) . '</span></a>';
			}else{
				echo '<a class="facebook hasTooltip" href="' . $link_face . '" target="' . $instance['link_target'] . '"><i class="fa fa-facebook"></i></a>';
			}
			echo '</li>';
		}
		if ( $link_twitter != '' ) {
			echo '<li>';
			if ( $show_text ) {
				echo '<a class="twitter hasTooltip" href="' . $link_twitter . '" target="' . $instance['link_target'] . '" ><i class="fa fa-twitter"></i><span>' . esc_html__( 'Twitter', 'coaching' ) . '</span></a>';
			}else{
				echo '<a class="twitter hasTooltip" href="' . $link_twitter . '" target="' . $instance['link_target'] . '" ><i class="fa fa-twitter"></i></a>';
			}
			echo '</li>';
		}
		if ( $link_google != '' ) {
			echo '<li>';
			if ( $show_text ) {
				echo '<a class="google-plus hasTooltip" href="' . $link_google . '" target="' . $instance['link_target'] . '" ><i class="fa fa-google-plus"></i><span>' . esc_html__( 'Google Plus', 'coaching' ) . '</span></a>';
			}else{
				echo '<a class="google-plus hasTooltip" href="' . $link_google . '" target="' . $instance['link_target'] . '" ><i class="fa fa-google-plus"></i></a>';
			}
			echo '</li>';
		}
		if ( $link_dribble != '' ) {
			echo '<li>';
			if ( $show_text ) {
				echo '<a class="dribbble hasTooltip" href="' . $link_dribble . '" target="' . $instance['link_target'] . '" ><i class="fa fa-dribbble"></i><span>' . esc_html__( 'Dribble', 'coaching' ) . '</span></a>';
			}else{
				echo '<a class="dribbble hasTooltip" href="' . $link_dribble . '" target="' . $instance['link_target'] . '" ><i class="fa fa-dribbble"></i></a>';
			}
			echo '</li>';
		}
		if ( $link_linkedin != '' ) {
			echo '<li>';
			if ( $show_text ) {
				echo '<a class="linkedin hasTooltip" href="' . $link_linkedin . '" target="' . $instance['link_target'] . '" ><i class="fa fa-linkedin"></i><span>' . esc_html__( 'Linkedin', 'coaching' ) . '</span></a>';
			}else{
				echo '<a class="linkedin hasTooltip" href="' . $link_linkedin . '" target="' . $instance['link_target'] . '" ><i class="fa fa-linkedin"></i></a>';
			}
			echo '</li>';
		}

		if ( $link_pinterest != '' ) {
			echo '<li>';
			if ( $show_text ) {
				echo '<a class="pinterest hasTooltip" href="' . $link_pinterest . '" target="' . $instance['link_target'] . '" ><i class="fa fa-pinterest"></i><span>' . esc_html__( 'Pinterest', 'coaching' ) . '</span></a>';
			}else{
				echo '<a class="pinterest hasTooltip" href="' . $link_pinterest . '" target="' . $instance['link_target'] . '" ><i class="fa fa-pinterest"></i></a>';
			}
			echo '</li>';
		}
		if ( $link_instagram != '' ) {
			echo '<li>';
			if ( $show_text ) {
				echo '<a class="instagram hasTooltip" href="' . $link_instagram . '" target="' . $instance['link_target'] . '" ><i class="fa fa-instagram"></i><span>' . esc_html__( 'Instagram', 'coaching' ) . '</span></a>';
			}else{
				echo '<a class="instagram hasTooltip" href="' . $link_instagram . '" target="' . $instance['link_target'] . '" ><i class="fa fa-instagram"></i></a>';
			}
			echo '</li>';
		}
		if ( $link_youtube != '' ) {
			echo '<li>';
			if ( $show_text ) {
				echo '<a class="youtube hasTooltip" href="' . $link_youtube . '" target="' . $instance['link_target'] . '" ><i class="fa fa-youtube"></i><span>' . esc_html__( 'Youtube', 'coaching' ) . '</span></a>';
			}else{
				echo '<a class="youtube hasTooltip" href="' . $link_youtube . '" target="' . $instance['link_target'] . '" ><i class="fa fa-youtube"></i></a>';
			}
			echo '</li>';
		}
		?>
	</ul>
</div>