<?php
$show_description = get_theme_mod( 'thim_archive_cate_show_description' );
$show_desc   = !empty( $show_description ) ? $show_description : '';
$cat_desc = category_description();
if ( have_posts() ) :?>
	<?php if( $show_desc && $cat_desc ) {?>
		<div class="desc_cat">
			<?php echo $cat_desc;?>
		</div>
	<?php }?>
	<div class="row blog-content archive_switch blog-list">
		<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			get_template_part( 'content' );
		endwhile;
		?>
	</div>
	<?php
	thim_paging_nav();
else :
	get_template_part( 'content', 'none' );
endif;