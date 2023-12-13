<?php
$html      = $src_image = '';
$title     = $instance['title'];
$info      = $instance['info_me'];
$phone     = $instance['phone'];
$email     = $instance['email'];
$address   = $instance['address'];
$link      = $instance['link'];
$text_link = $instance['text_link'];

if ( $instance['avt_img'] != '' ) {
	$src_image = wp_get_attachment_url( $instance['avt_img'] );
}
?>

<div class="thim-about-me">
	<div class="row">
		<div class="left col-md-6 col-sm-12">
			<div class="avatar">
				<img src="<?php echo $src_image; ?>" alt="avt-about-me">
				<div class="info-contact">
					<ul>
						<li class="title"><?php echo esc_html__( 'Contact Me Now', 'coaching' ); ?></li>
						<li><i class="fa fa-phone"></i><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></li>
						<li><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></li>
						<li class="info-description"><i class="fa fa-map-marker"></i><p><?php echo $address; ?></p></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="right col-md-6 col-sm-12">
			<div class="content-info">
				<h3 class="title-info">
					<?php echo $title; ?>
				</h3>
				<p class="about-info">
					<?php echo $info; ?>
				</p>
				<a href="<?php echo $link; ?>"><?php echo $text_link; ?></a>
			</div>
		</div>
	</div>
</div>


