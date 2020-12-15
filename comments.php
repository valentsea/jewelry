<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Jewelry
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

<div id="comments" class="comments-area page-container">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$jewelry_comment_count = get_comments_number();
			if ( '1' === $jewelry_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( '1 Comment', 'jewelry' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s Comment', '%1$s Comments', $jewelry_comment_count, 'comments title', 'jewelry' ) ),
					number_format_i18n( $jewelry_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'      => 'ol',
					'short_ping' => true,
					'avatar_size' => 60,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'jewelry' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	comment_form(array(
		'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="Send comment" />',
		'title_reply'          => __( 'Send comment', 'jewelry' ),
		'comment_field' => '<p class="comment-form-comment"><textarea placeholder="Comment" id="comment" name="comment" aria-required="true"></textarea></p>',
		'fields' => array(
			'author' => '
				<div class="comment-form-top"><input  class="comment-form-author" placeholder="Name" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . $html_req . ' />
			',
			'email'  => '
				<input class="comment-form-email" placeholder="Email"  id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . $html_req  . ' />
			</div>',
			'url'    => '',
			'cookies' => '', 
		)	));
	?>

</div><!-- #comments -->
