<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if(post_password_required()) { ?>
		
	<?php
		return;
	}
	
?>

<?php

/*************************** Comment Template ***************************/

global $current_user, $gp_settings;
require(gp_inc . 'options.php');

if(isset($gp_settings['user_comments']) && $gp_settings['user_comments'] == "One Comment") {
	$comment_number = "1";
} else {
	$comment_number = "999999999";
}

$args = array('post_id' => get_the_ID(), 'user_id' => $current_user->ID);
$usercomment = get_comments($args);

function comment_template($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; 
global $gp_settings;

require(gp_inc . 'options.php');

?>

<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">

	<div id="comment-<?php comment_ID(); ?>" class="comment-container">
	
		<div class="comment-avatar">
			<?php echo get_avatar($comment,$size='60',$default=get_template_directory_uri().'/lib/images/gravatar.gif'); ?>
			<span class="post-author"><?php _e('Reviewer', 'gp_lang'); ?></span>
		</div>
		
		<div class="comment-arrow"></div>
		
		<div class="comment-body">
		
			<div class="comment-author">
				
				<?php printf(__('%s', 'gp_lang'), comment_author_link()) ?> <?php _e('says', 'gp_lang'); ?>
				
			</div>
			
			<div class="comment-date">
				<?php comment_time(get_option('date_format')); ?>, <?php comment_time(get_option('time_format')); ?>
			</div>
									
			<?php if(defined("STARRATING_INSTALLED") && is_singular('review')) { ?>
				<div class="clear"></div>
				<div class="comment-user-rating">			
					<?php if($gp_settings['user_multi_rating_id']) { ?>
						<?php wp_gdsr_comment_integrate_multi_result(get_comment_ID(), $gp_settings['user_multi_rating_id'], 0, $gp_settings['comment_stars_set'], $gp_settings['comment_stars_size']); ?>
					<?php } else { ?>
						<?php wp_gdsr_comment_integrate_standard_result(get_comment_ID()); ?>
					<?php } ?>
				</div>
			<?php } ?>
				
			<div class="comment-text">

				<?php comment_text() ?>
				<?php if ($comment->comment_approved == '0') : ?>
					<div class="moderation">
						<?php _e('Your comment is awaiting moderation.', 'gp_lang'); ?>
					</div>
				<?php endif; ?>
										
				<?php if(defined('STARRATING_INSTALLED') && $gp_settings['comment_thumbs'] == "Users can rate other comments") { wp_gdsr_render_comment_thumbs(0, 0, ''); }	?>
			
				<span>
					<?php comment_reply_link(array_merge($args, array('reply_text' => __('Reply', 'gp_lang'), 'add_below' => 'comment', 'depth' => $depth, 'max_depth' => $args['max_depth']))); ?> <?php edit_comment_link(__('Edit', 'gp_lang'),'',''); ?>
				</span>
			</div>
			
		</div>
		
	</div>


<?php } ?>

<!--Begin Comments-->
<?php if(comments_open() OR have_comments()) { ?>
	<div class="clear"></div>
	
	<div id="comments">
<?php } ?>

	<?php if(have_comments()) { ?>
				
		<div id="comments-title"><h3><?php comments_number(__('No Comments', 'gp_lang'), __('1 Comment', 'gp_lang'), __('% Comments', 'gp_lang')); ?></h3><span><a href="#respond"><?php _e('Leave A Reply' ,'gp_lang'); ?></a></span></div>
		
		<ol id="commentlist">
			<?php wp_list_comments('callback=comment_template'); ?>
		</ol>
							
		<?php $total_pages = get_comment_pages_count(); if($total_pages > 1) { ?>
			<div class="wp-pagenavi comment-navi"><?php paginate_comments_links(); ?></div>
		<?php } ?>	

		<?php if(comments_open()) { ?>
		
		<?php } else { ?>
		
			<strong><?php _e('Comments are now closed.', 'gp_lang') ?></strong>
	
		<?php } ?>
		
	<?php } else { ?>
	
	<?php } ?>
	
	<?php if(comments_open()) { ?>
	
		<!--Begin Comment Form-->
		<div id="commentform"<?php if(count($usercomment) >= $comment_number) { ?> class="hidden"<?php } ?>re>
			
			<!--Begin Respond-->
			<div id="respond">
			
				<h3><?php comment_form_title(__('Leave a Reply', 'gp_lang'), __('Respond to %s', 'gp_lang')); ?></h3>	
			
				<div class="cancel-comment-reply"><?php cancel_comment_reply_link(__('Cancel Reply', 'gp_lang')); ?></div>
			
				<?php if(get_option('comment_registration') && !$user_ID) { ?>
			
					<p><?php _e('You must be logged in to post a comment.', 'gp_lang'); ?></p>
			
				<?php } else { ?>
			
					<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">				
						
					<?php if((defined('STARRATING_INSTALLED') && is_singular('review')) && ($gp_settings['user_voting'] == "Vote with or without posting a comment" OR $gp_settings['user_voting'] == "Vote only when posting a comment")) { ?>
						<div class="comment-score">
							<div class="comment-score-title"><?php _e('Rate This Item', 'gp_lang'); ?></div> 
							<?php if($gp_settings['user_multi_rating_id']) { ?><div class="clear"></div><?php } ?>
							<div class="comment-score-stars">
								<?php if($gp_settings['user_multi_rating_id']) { ?>
									<?php wp_gdsr_comment_integrate_multi_rating($gp_settings['user_multi_rating_id'], 0, 0, $gp_settings['comment_stars_set'], $gp_settings['comment_stars_size']); ?>
								<?php } else { ?>
									<?php wp_gdsr_comment_integrate_standard_rating(0, '', ''); ?>
								<?php } ?>							
							</div>
						</div>
					<?php } ?>
					
					<?php if($user_ID) { ?>
			
						<p><?php _e('Logged in as', 'gp_lang'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a> <a href="<?php echo wp_logout_url(get_permalink()); ?>">(<?php _e('Logout', 'gp_lang'); ?>)</a></p>
			
					<?php } else { ?>
			
						<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /> <label for="author"><?php _e('Name', 'gp_lang'); ?> <span class="required"><?php if ($req) echo "*"; ?></span></label></p>
			
						<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /> <label for="email"><?php _e('Email', 'gp_lang'); ?> <span class="required"><?php if ($req) echo "*"; ?></span></label></p>
						
						<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /> <label for="url"><?php _e('Website', 'gp_lang'); ?></label></p>
						
					<?php } ?>
					
					<p><textarea name="comment" id="comment" cols="5" rows="7" tabindex="4"></textarea></p>
					
					<input name="submit" type="submit" id="submit" tabindex="5" value="<?php _e('Submit', 'gp_lang'); ?>" />
	
					<?php comment_id_fields(); ?>
		
					<?php do_action('comment_form', get_the_ID()); ?>
			
					</form>
	
				<?php } ?>
	
			</div>
			<!--End Respond-->
		
		</div>
		<!--End Comment Form-->
	
	<?php } ?>
	
	<?php if(count($usercomment) >= $comment_number) { ?>
	
		<div class="clear"></div>
		<strong><?php _e('You have already reviewed this item.', 'gp_lang'); ?></strong>
	
	<?php } ?>


<?php if(comments_open() OR have_comments()) { ?>
	</div>
<?php } ?>
<!--End Comments-->