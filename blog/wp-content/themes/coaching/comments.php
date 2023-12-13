<?php
/**
 * The template for displaying comments.
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package thim
 */
/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

if (
	have_comments() &&
	!( !comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) )
) {
	$class_has_comments = " has-comments";
} else {
	$class_has_comments = "";
}
?>

<div id="comments" class="comments-area<?php echo esc_attr( $class_has_comments ); ?>">
	<?php // You can start editing here -- including this comment!  ?>
	<?php if ( have_comments() ) : ?>
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through  ?>
			<nav id="comment-nav-above" class="comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php esc_attr_e( 'Comment navigation', 'coaching' ); ?></h1>

				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'coaching' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'coaching' ) ); ?></div>
			</nav><!-- #comment-nav-above -->
		<?php endif; // check for comment navigation  ?>

		<ol class="comment-list">
			<div class="comment-list-inner">
				<h2 class="comments-title">
					<?php
					esc_html_e('Comments', 'coaching');
					?>
				</h2>
				<?php wp_list_comments( 'style=li&&type=comment&avatar_size=90&callback=thim_comment' ); ?>
			</div>
		</ol><!-- .comment-list -->
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through  ?>
			<nav id="comment-nav-below" class="comment-navigation" role="navigation">
				<h1 class="screen-reader-text"><?php esc_attr_e( 'Comment navigation', 'coaching' ); ?></h1>

				<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'coaching' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'coaching' ) ); ?></div>
			</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation  ?>
	<?php endif; // have_comments() ?>
	<?php
	// If comments are closed and there are comments, let's leave a little note, shall we?
	if ( !comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
		?>
		<?php esc_attr_e( 'Comments are closed.', 'coaching' ); ?>
	<?php endif; ?>
	<div class="comment-respond-area">
		<?php comment_form( array(
				'title_reply' => esc_html__( 'Leave A Reply', 'coaching' ),
				'label_submit' => esc_html__( 'Post Comment', 'coaching' ),
				'comment_field' => '<p class="comment-form-comment"><textarea placeholder="' . esc_attr__( 'Message *', 'coaching' ) . '" id="comment" name="comment" cols="45" rows="8" aria-required="true">' . '</textarea></p>'
		) ); ?>
	</div>
	<div class="clear"></div>

</div><!-- #comments -->
