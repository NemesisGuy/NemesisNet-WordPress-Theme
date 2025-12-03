<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments" class="comments-area glass-section">

	<?php
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$nemesisnet_comment_count = get_comments_number();
			if ( '1' === $nemesisnet_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'nemesisnet' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $nemesisnet_comment_count, 'comments title', 'nemesisnet' ) ),
					number_format_i18n( $nemesisnet_comment_count ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'avatar_size' => 60,
					'style'       => 'ol',
					'short_ping'  => true,
					'reply_text'  => esc_html__( 'Reply', 'nemesisnet' ),
					'walker'      => new NemesisNet_Comment_Walker(), // Custom comment walker for styling
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'nemesisnet' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form(
        array(
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
            'title_reply_after'  => '</h2>',
            'class_submit'       => 'submit btn-primary',
            'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'nemesisnet' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8" required="required"></textarea></p>',
            'fields' => array(
                'author' => '<p class="comment-form-author">' . '<label for="author">' . esc_html__( 'Name', 'nemesisnet' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . ( $req ? ' required="required"' : '' ) . ' /></p>',
                'email'  => '<p class="comment-form-email"><label for="email">' . esc_html__( 'Email', 'nemesisnet' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' . '<input id="email" name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . ( $req ? ' required="required"' : '' ) . ' aria-describedby="email-notes" /></p>',
                'url'    => '<p class="comment-form-url"><label for="url">' . esc_html__( 'Website', 'nemesisnet' ) . '</label> ' . '<input id="url" name="url" type="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>',
            ),
        )
    );
	?>

</div><!-- #comments -->
