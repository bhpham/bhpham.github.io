<?php
/**
 * @package thim
 */
wp_enqueue_script('thim-flexslider');
$theme_options_data = get_theme_mods();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="page-content-inner">
		<header class="entry-header<?php if ( !isset( $theme_options_data['thim_show_date'] ) || $theme_options_data['thim_show_date'] == 1 ) echo ' has_date';?>">
			<?php
			if ( !isset( $theme_options_data['thim_show_date'] ) || $theme_options_data['thim_show_date'] == 1 ) {
				?>
				<div class="date-meta"><?php echo get_the_date( "d\<\i\>\ M\<\/\i\>\ " ) ?></div>
			<?php
			}
			?>
			<div class="entry-contain">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
			<?php thim_entry_meta(); ?>
			</div>
		</header>
		<div class="media_top">
			<?php
			/* Video, Audio, Image, Gallery, Default will get thumb */
			do_action( 'thim_entry_top', 'full' );
			?>
		</div>

		<!-- .entry-header -->
		<div class="entry-content">
			<?php the_content(); ?>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'coaching' ),
				'after'  => '</div>',
			) );
			?>
		</div>
		<div class="entry-tag-share">
			<?php
			if ( get_the_tag_list() ) {
				echo get_the_tag_list( '<div class="post-tag"><span>' . esc_html__( "Tags:", 'coaching' ) . '</span>', '', '</div>' );
			}
			?>

			<?php do_action( 'thim_social_share' ); ?>

		</div>
		<?php do_action( 'thim_about_author' ); ?>



		<?php
		get_template_part( 'inc/related' );
		?>
	</div>
</article>