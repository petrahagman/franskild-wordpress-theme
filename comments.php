<?php
/**
* The template for displaying comments
*
* @package WordPress
* @subpackage franskild
* @since 1.0
* @version 1.0
*
*/
?>

<div id="comments" class="comments-area">
	<?php 
	if ( have_comments() ) : 
		?>
		<h2><?php _e( 'Comments:', 'franskild' ); ?></h2>
		<ul class="comment-list">
			<?php 
			wp_list_comments();
			?>
		</ul>
		<?php 
	else: 
		?> 
		<h2 class="no-comments-yet">No comments yet <i class="fa fa-frown-o" aria-hidden="true"></i> Be the first to add one!</h2>
	<?php
	endif; 
	if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : 
		?>
		<p class="no-comments">
			<?php _e( 'Comments are closed.' ); ?>
		</p>
		<?php
	endif;
	comment_form(); 
	?>
</div> <!-- #comments, .comments-area -->