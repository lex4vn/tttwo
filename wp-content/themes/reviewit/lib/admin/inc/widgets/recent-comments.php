<?php

/*************************** Recent Comments Widget ***************************/

add_action('widgets_init', 'recent_comments_widgets');

function recent_comments_widgets() {
	register_widget('Recent_Comments');
}

class Recent_Comments extends WP_Widget {
	function Recent_Comments() {
		$widget_ops = array('classname' => 'recent-comments-widget', 'description' => __('Displays recent comments with avatars and comment excerpts.', 'gp_lang'));
		$this->WP_Widget('recent-comments', __('GP Recent Comments', 'gp_lang'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$number = $instance['number'];
	
		echo $before_widget;
		
			echo $before_title . $title . $after_title; ?>
		
				<ul>
					<?php 
					global $wpdb;
					$request = "SELECT * FROM $wpdb->comments";
					$request .= " JOIN $wpdb->posts ON ID = comment_post_ID";
					$request .= " WHERE comment_approved = '1' AND post_status = 'publish' AND post_password =''";
					$request .= " ORDER BY comment_date DESC LIMIT $number";
					$comments = $wpdb->get_results($request);
					if ($comments) {
						
						foreach ($comments as $comment) { ob_start(); ?>
						
							<li>
								<?php echo get_avatar($comment,$size='30',$default=get_template_directory_uri().'/lib/images/gravatar.gif'); ?>
								<div>
									<a href="<?php echo get_permalink($comment->comment_post_ID) . '#comment-' . $comment->comment_ID; ?>"><?php echo strip_tags(substr(apply_filters('get_comment_text', $comment->comment_content), 0, 35)); ?>...</a>
									<br/><span><?php echo($comment->comment_author) ?> <?php _e('on', 'gp_lang'); ?>
									<?php echo get_the_title($comment->comment_post_ID) ?></span>
								</div>
							</li>
								
						<?php ob_end_flush(); }
						
					} else { ?>
						
						<li>No comments found.</li>
					
					<?php } ?>
					
				</ul>

			<?php wp_reset_query();
		
		// End Widget
		echo $after_widget;
	 
	}
	
	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = strip_tags($new_instance['number']);
		return $instance;
	}

	function form($instance) {
		$defaults = array('title' => 'Recent Comments', 'number' => '5'); $instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'gp_lang'); ?></label>
			<br/><input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of Comments:', 'gp_lang'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" size="3" value="<?php echo $instance['number']; ?>" />
		</p>		
		
		<?php
		
	}
}

?>