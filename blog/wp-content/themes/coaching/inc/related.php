<?php
// Get Related Portfolio by Category
$theme_options_data = get_theme_mods();
$number_related = apply_filters( 'thim_related_posts', 4 );
//$number_related = get_post_meta( $post->ID, 'thim_number_related', true );
$related        = thim_get_related_posts( $post->ID, $number_related );
$index          = 0;
$count_posts    = $related->post_count;
?>
<?php if ( isset( $theme_options_data['thim_archive_single_hide_related'] ) && $theme_options_data['thim_archive_single_hide_related'] == '0' ) { ?>
<?php if ( $related->have_posts() ) : ?>
	<section class="related-archive">
		<h3 class="single-title"><?php esc_attr_e( 'You may also like', 'coaching' ); ?></h3>
		<div class="row">
			<?php
			while ( $related->have_posts() ) {
				$related->the_post();
				$index ++;

				if ( $index == 1 ) : ?>
					<div class="col-lg-8">
						<div class="row">
							<div class="col-sm-12 col-md-6">
								<?php do_action( 'thim_entry_top', 'medium' ); ?>
							</div>
							<div class="col-sm-12 col-md-6">
								<h3 class="title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
								<ul class="meta">
									<li class="date">
										<span><?php echo get_the_date(); ?></span>
									</li>
									<li class="author">
										<span><?php echo esc_html__( 'by', 'coaching' ); ?></span>
										<?php printf( '<a href="%1$s">%2$s</a>',
											esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
											esc_html( get_the_author() )
										); ?>
									</li>
									<li class="category">
										<span><?php esc_html_e( 'in', 'coaching' ); ?></span>
										<?php $categories = get_the_category();
										if ( !empty( $categories ) ) {
											echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
										} ?>
									</li>

								</ul>
								<div class="des-related">
									<?php echo thim_excerpt( '20' ); ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				endif;
				if ( $index >= 2 ) : ?>
					<div class="col-lg-4 item">
						<div class="post-item">
							<div class="article-image">
								<?php the_post_thumbnail( 'thumbnail' ); ?>
							</div>
							<div class="article-title-wrapper">
								<h5 class="title">
									<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
								</h5>
								<div class="article-date">
									<?php echo get_the_date(); ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				endif;
			}
			wp_reset_postdata();
			?>
		</div>
	</section><!--.related-->
<?php endif; ?>
<?php } ?>
