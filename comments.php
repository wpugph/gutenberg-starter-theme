<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeWPUGPH
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

<div id="comments" class="comments-area">

	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h2 class="comments-title">
			<?php
			$comment_count = get_comments_number();
			if ( 1 === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html_e( 'One thought on &ldquo;%1$s&rdquo;', 'themewpugph' ),
					'<span>' . esc_html( get_the_title() ) . '</span>'
				);
			} else {
				printf( // WPCS: XSS OK.
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'themewpugph' ) ),
					number_format_i18n( $comment_count ),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->

		<?php the_comments_navigation(); ?>

		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'walker'      => new ThemeWPUGPH_Comments(),
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 50,
				)
			);
			?>
		</ol><!-- .comment-list -->

		<?php
		the_comments_navigation();

			// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'themewpugph' ); ?></p>
			<?php
		endif;

	endif; // Check for have_comments().

	$field_required = $req ? 'required' : '';

	// Comment field.
	$comment_label = _x( 'Comment', 'noun', 'themewpugph' );
	$comment_field = <<<UIKIT3
<div class="uk-margin">
	<label class="uk-form-label" for="comment">
		{$comment_label}
	</label>
	<div class="uk-form-controls">
		<textarea id="comment" class="uk-textarea uk-form-width-large" name="comment" required></textarea>
	</div>
</div>
UIKIT3;

	// Author field.
	$author_label = __( 'Name', 'themewpugph' ) . ( $req ? '<span class="required">*</span>' : '' );
	$author_value = esc_attr( $commenter['comment_author'] );
	$author_field = <<<UIKIT3
<div class="uk-margin">
	<label class="uk-form-label" for="author">
		{$author_label}
	</label>
	<div class="uk-form-controls">
		<input id="author" class="uk-input uk-form-width-large" name="author" type="text" value="{$author_value}" {$field_required} />
	</div>
</div>
UIKIT3;

	// Email field.
	$email_label = __( 'Email', 'themewpugph' ) . ( $req ? '<span class="required">*</span>' : '' );
	$email_value = esc_attr( $commenter['comment_author_email'] );
	$email_field = <<<UIKIT3
<div class="uk-margin">
	<label class="uk-form-label" for="author">
		{$email_label}
	</label>
	<div class="uk-form-controls">
		<input id="email" class="uk-input uk-form-width-large" name="email" type="email" value="{$email_value}" {$field_required} />
	</div>
</div>
UIKIT3;

	// URL field.
	$url_label = __( 'Website', 'themewpugph' );
	$url_value = esc_attr( $commenter['comment_author_url'] );
	$url_field = <<<UIKIT3
<div class="uk-margin">
<label class="uk-form-label" for="author">
	{$url_label}
</label>
<div class="uk-form-controls">
	<input id="url" class="uk-input uk-form-width-large" name="url" type="url" value="{$url_value}" />
</div>
</div>
UIKIT3;

	comment_form(
		array(
			'class_form'    => 'uk-form-stacked',
			'class_submit'  => 'uk-button uk-button-primary',
			'comment_field' => $comment_field,
			'fields'        => array(
				'author' => $author_field,
				'email'  => $email_field,
				'url'    => $url_field,
			),
			'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
		)
	);
	?>

</div><!-- #comments -->
