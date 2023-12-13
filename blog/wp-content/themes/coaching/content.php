<?php
$theme_options_data = get_theme_mods();

$classes   = array();
$classes[] = 'col-sm-12';
wp_enqueue_script('thim-flexslider');
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $classes ); ?>>
	<div class="content-inner">
		<div class="entry-content">
			<?php
			if ( has_post_format( 'link' ) && thim_meta_theme( 'thim_url' ) && thim_meta_theme( 'thim_text' ) ) {
				$url  = thim_meta_theme( 'thim_url' );
				$text = thim_meta_theme( 'thim_text' );
				if ( $url && $text ) { ?>
					<header class="entry-header">
						<h3 class="entry-title">
							<a class="link" href="<?php echo esc_url( $url ); ?>"><?php echo esc_html( $text ); ?></a>
						</h3>
					</header>
					<?php
				}
				?>
				<?php do_action( 'thim_entry_top', 'full' ); ?>
				<div class="entry-summary">
					<?php
					echo thim_excerpt( '550' );
					?>
				</div><!-- .entry-summary -->
				<div class="readmore">
					<a class="thim-button" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html__( 'Read More', 'coaching' ); ?></a>
				</div>
				<div class="thim_sharepost">
					<?php do_action( 'thim_social_share' ); ?>
				</div>
			<?php } elseif ( has_post_format( 'quote' ) && thim_meta_theme( 'thim_quote' ) && thim_meta_theme( 'thim_author_url' ) ) {
				$quote      = thim_meta_theme( 'thim_quote' );
				$author     = thim_meta_theme( 'thim_author' );
				$author_url = thim_meta_theme( 'thim_author_url' );
				if ( $author_url ) {
					$author = ' <a href=' . esc_url( $author_url ) . '>' . $author . '</a>';
				}
				if ( $quote && $author ) {
					?>
					<header class="entry-header">
						<div class="box-header box-quote">
							<blockquote><?php echo esc_html( $quote ); ?><cite><?php echo esc_html( $author ); ?></cite>
							</blockquote>
						</div>
					</header>
					<?php
				}
				do_action( 'thim_entry_top', 'full' );
			} elseif ( has_post_format( 'audio' ) ) {
				?>
				<header class="entry-header<?php if ( ! isset( $theme_options_data['thim_show_date'] ) || $theme_options_data['thim_show_date'] == 1 ) {
					echo ' has_date';
				} ?>">
					<?php
					if ( ! isset( $theme_options_data['thim_show_date'] ) || $theme_options_data['thim_show_date'] == 1 ) {
						?>
						<div class="date-meta">
							<?php
							$post_title = get_the_title();
							if ( empty( $post_title ) ) {
								echo '<a href="' . get_the_permalink() . '">';
							}
							echo get_the_date( "d\<\i\>\ M\<\/\i\>\ " );

							if ( empty( $post_title ) ) {
								echo '</a>';
							}

							?>
						</div>
						<?php
					}
					?>
					<div class="entry-contain">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						<?php thim_entry_meta(); ?>
					</div>
				</header>
				<?php do_action( 'thim_entry_top', 'full' ); ?>
				<div class="entry-summary">
					<?php
					echo thim_excerpt( '50' );
					?>
				</div><!-- .entry-summary -->
				<div class="readmore">
					<a class="thim-button" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html__( 'Read More', 'coaching' ); ?></a>
				</div>
				<div class="thim_sharepost">
					<?php do_action( 'thim_social_share' ); ?>
				</div>
				<?php
			} else {
				?>
				<header class="entry-header<?php if ( ! isset( $theme_options_data['thim_show_date'] ) || $theme_options_data['thim_show_date'] == 1 ) {
					echo ' has_date';
				} ?>">
					<?php
					if ( ! isset( $theme_options_data['thim_show_date'] ) || $theme_options_data['thim_show_date'] == 1 ) {
						?>
						<div class="date-meta">
							<?php
							$post_title = get_the_title();
							if ( empty( $post_title ) ) {
								echo '<a href="' . get_the_permalink() . '">';
							}
							echo get_the_date( "d\<\i\>\ M\<\/\i\>\ " );

							if ( empty( $post_title ) ) {
								echo '</a>';
							}

							?>
						</div>
						<?php
					}
					?>

					<div class="entry-contain">
						<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
						<?php thim_entry_meta(); ?>
					</div>
				</header>
				<!-- .entry-header -->
				<?php do_action( 'thim_entry_top', 'full' ); ?>
				<div class="entry-summary">
					<?php
					echo thim_excerpt( get_theme_mod( 'thim_post_excerpt_length', 50 ) );
					?>
				</div><!-- .entry-summary -->
				<div class="readmore">
					<a class="thim-button" href="<?php echo esc_url( get_permalink() ); ?>"><?php echo esc_html__( 'Read More', 'coaching' ); ?></a>
				</div>
				<div class="thim_sharepost">
					<?php do_action( 'thim_social_share' ); ?>
				</div>
			<?php }; ?>
		</div>

	</div>
</article><!-- #post-## -->