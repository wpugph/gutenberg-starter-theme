<?php
/**
 * ThemeWPUGPH Comments
 * 
 * @package ThemeWPUGPH
 */

if ( ! class_exists( 'ThemeWPUGPH_Comments' ) ) :
  class ThemeWPUGPH_Comments extends Walker_Comment {

	/**
	 * Outputs a comment in the HTML5 format.
	 *
	 * @since 3.6.0
	 *
	 * @see wp_list_comments()
	 *
	 * @param WP_Comment $comment Comment to display.
	 * @param int        $depth   Depth of the current comment.
	 * @param array      $args    An array of arguments.
	 */
	protected function html5_comment( $comment, $depth, $args ) {
		$tag = ( 'div' === $args['style'] ) ? 'div' : 'li';

		$commenter = wp_get_current_commenter();
		if ( $commenter['comment_author_email'] ) {
			$moderation_note = __( 'Your comment is awaiting moderation.' );
		} else {
			$moderation_note = __( 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.' );
		}

		?>
		<<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>

			<article  id="div-comment-<?php comment_ID(); ?>" class="uk-comment">
				<header class="uk-comment-header uk-grid-medium uk-flex-middle" uk-grid>
						<div class="uk-width-auto">
							<?php
								if ( 0 != $args['avatar_size'] ) {
									echo get_avatar( $comment, $args['avatar_size'] );}
							?>
						</div>
						<div class="uk-width-expand">
								<h4 class="uk-comment-title uk-margin-remove">
									<!-- <a class="uk-link-reset" href="#">Author</a> -->
									<?php
										/* translators: %s: comment author link */
										printf(
											sprintf( '<b class="fn">%s</b>', get_comment_author_link( $comment ) )
										);
									?>
								</h4>
								<ul class="uk-comment-meta uk-subnav uk-subnav-divider uk-margin-remove-top">
										<li>
											<a href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
												<time datetime="<?php comment_time( 'c' ); ?>">
													<?php
														/* translators: 1: comment date, 2: comment time */
														printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
													?>
												</time>
											</a>
										</li>
										<li>
											<ul class="uk-subnav uk-subnav-line">
												<?php
													comment_reply_link(
														array_merge(
															$args,
															array(
																'add_below' => 'div-comment',
																'depth'     => $depth,
																'max_depth' => $args['max_depth'],
																'before'    => '<li>',
																'after'     => '</li>',
															)
														)
													);
													?>			
												</ul>
										</li>
								</ul>
						</div>
				</header>
				<div class="uk-comment-body">
				<?php comment_text(); ?>
				</div>
			</article>


			
		<?php
	}    
      
  }
endif; 