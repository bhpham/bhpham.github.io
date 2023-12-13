<?php

if ( have_posts() ) {

	while ( have_posts() ) : the_post();
		$link    = get_post_meta( get_the_ID(), 'website_url', true );
		$regency = get_post_meta( get_the_ID(), 'regency', true );
		$author = get_post_meta( get_the_ID(), 'author', true );
		?>
		<div class="testimonial-item-archive" id="post-<?php the_ID(); ?>">
			<div class="side-left">
				<div class="testimonial-thumbnail">
					<?php echo thim_get_feature_image( get_post_thumbnail_id(), 'full', 170, 170 ); ?>
				</div>
				<div class="testimonial-info">
					<?php
					if( $author <> '' ) {
						echo '<div class="author">'. $author .'</div>';
					}
					?>
					<div class="regency"><?php echo esc_attr($regency) ?></div>
				</div>
			</div>
			<div class="side-right">
				<div class="blockquote"><a href="<?php  the_permalink() ; ?>"><?php the_title() ?></a></div>
				<div class="description"><?php echo the_content(); ?></div>
				<div class="share_post">
					<?php do_action( 'thim_social_share' ); ?>
				</div>
			</div>
		</div>
		<?php
	endwhile;
	thim_paging_nav();
}

