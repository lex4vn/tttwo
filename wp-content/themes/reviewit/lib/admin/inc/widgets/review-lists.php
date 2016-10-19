<?php

//////////////////////////////////////// Review Lists Widget ////////////////////////////////////////

add_action('widgets_init', 'review_lists_widgets');

function review_lists_widgets() {
	register_widget('Review_Lists');
}

class Review_Lists extends WP_Widget {
	function Review_Lists() {
		$widget_ops = array('classname' => 'review-lists-widget', 'description' => __('Display your reviews in lists.', 'gp_lang'));
		$this->WP_Widget('review_lists-widget', __('GP Review Lists', 'gp_lang'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$posts_per_page = $instance['posts_per_page'];
		$cats = $instance['cats'];
		$review_tag = $instance['review_tag'];
		$rating_type = $instance['rating_type'];		
		$gd_sort = $instance['gd_sort'];
		$gd_order = $instance['gd_order'];
		$gd_multi_id = $instance['gd_multi_id'];
		$title_length = $instance['title_length'];
		$see_all = $instance['see_all'];
		
		require(gp_inc . 'options.php'); global $gp_settings, $post, $paged, $wp_query;
		
		// Begin Widget
		echo $before_widget;
		
			echo $before_title . $title . $after_title; ?>
				
			<?php
			
			// Multi Set ID
			if($gd_multi_id != "") {
				$gd_multi_id = $gd_multi_id;
			} elseif($gd_sort == "date") {
				$gd_multi_id = "999999";				
			} else {
				$gd_multi_id = "0";
			}
			
			// Orderby Type
			if($gd_sort == "rand" OR $gd_sort == "title" OR $gd_sort == "date") {
				$orderby = "orderby";
				$order = "order";
			} else {
				$orderby = "gdsr_sort";
				$order = "gdsr_order";
			}

			if($cats) {			

				$newQuery=array(
				'post_type' => 'review',
				'post_status' => 'publish',
				'posts_per_page' => $posts_per_page,
				'paged' => 1,
				'ignore_sticky_posts' => 0,
				$orderby => $gd_sort,
				$order => $gd_order,
				'gdsr_multi' => $gd_multi_id,
				'tax_query' => array('relation' => 'OR', array('taxonomy' => 'review_categories', 'terms' => explode(',', $cats), 'field' => 'id'))
				);
			
			} else {
			
				$newQuery=array(
				'post_type' => 'review',
				'post_status' => 'publish',
				'posts_per_page' => $posts_per_page,
				'paged' => 1,
				'ignore_sticky_posts' => 0,
				$orderby => $gd_sort,
				$order => $gd_order,
				'gdsr_multi' => $gd_multi_id
				);
			
			}
			
			global $more; $more = 0;
			
			query_posts($newQuery); if(have_posts()) : ?>
		
				<ol>
			
			<?php while(have_posts()) : the_post(); include(gp.'loop-data.php'); ?>
					
				<li>
				
					<a href="<?php the_permalink(); ?>" title="<?php echo the_title_attribute(); ?>"><?php echo gp_the_title_limit($title_length); ?></a>
					
					<?php if(!empty($review_tag)) { echo(get_the_term_list(get_the_ID(), $review_tag, '<br/><span> ', ', ', '</span>')); } ?>	 
	 
					<?php if(defined('STARRATING_INSTALLED') && $rating_type != "No Ratings") { ?>
						
						<?php if($rating_type != "User Rating" && ($gp_settings['gp_gdsr']->review > 0 OR $gp_settings['gp_gdsmr']->review > 0)) { ?>
					
							<!--Site Rating-->
							<div class="review-list-stars<?php if($rating_type == "Site & User Rating") { ?> both-ratings<?php } ?>">
								<?php if($gp_settings['site_multi_rating_id']) { ?>
									<?php wp_gdsr_multi_review_average($gp_settings['site_multi_rating_id'], 0, true); ?>				
								<?php } else { ?>
									<?php wp_gdsr_render_review(0, 0, '', ''); ?>
								<?php } ?>	
							</div>
							
						<?php } ?>

						<?php if($rating_type != "Site Rating" && $gp_settings['user_voting'] != "Users cannot vote") { ?>
						
							<!--User Rating-->
							<div class="review-list-stars">
								<?php if($gp_settings['user_multi_rating_id']) { ?>
									<?php wp_gdsr_multi_rating_average($gp_settings['user_multi_rating_id'], 0, 'total', $gp_settings['mur_stars_set'], '', '', true); ?>			
								<?php } else { ?>
									<?php wp_gdsr_render_article(0, 1); ?>
								<?php } ?>	
							</div>					
						
						<?php } ?>
						
						
					<?php } ?>
				
				</li>
				
			<?php endwhile; ?>
			
				</ol>
				
				<?php if($see_all) { ?><a href="<?php echo($see_all); ?>" class="see-all"><?php _e('See All &raquo;', 'gp_lang'); ?></a><?php } ?>
			
			<?php endif; wp_reset_query();
	
		echo $after_widget; 
		// End Widget
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['cats'] = $new_instance['cats'];	
		$instance['review_tag'] = $new_instance['review_tag'];	
		$instance['posts_per_page'] = $new_instance['posts_per_page'];		
		$instance['rating_type'] = $_POST['rating_type'];		
		$instance['gd_sort'] = $_POST['gd_sort'];
		$instance['gd_order'] = $_POST['gd_order'];
		$instance['gd_multi_id'] = $new_instance['gd_multi_id'];
		$instance['title_length'] = $new_instance['title_length'];	
		$instance['see_all'] = $new_instance['see_all'];
		return $instance;
	}

	function form($instance) {
		$defaults = array('title' => '', 'cats' => '', 'rating_type' => 'Site Rating', 'gd_sort' => 'review', 'gd_order' => 'desc', 'gd_multi_id' => '', 'orderby' => 'date', 'order' => 'desc', 'title_length' => '30', 'posts_per_page' => '5', 'see_all' => ''); $instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'gp_lang'); ?></label>
			<br/><input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Review Category IDs:', 'gp_lang'); ?></label>
			<br/><input type="text" id="<?php echo $this->get_field_id('cats'); ?>" name="<?php echo $this->get_field_name('cats'); ?>" value="<?php echo $instance['cats']; ?>" />
			<br/><small><?php _e('Enter the IDs of the <a href="../wp-admin/edit-tags.php?taxonomy=review_categories&post_type=review">review categories</a> you want to display (leave blank to display all categories).', 'gp_lang'); ?></small>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('review_tag'); ?>"><?php _e('Review Tag Slug:', 'gp_lang'); ?></label>
			<br/><input type="text" id="<?php echo $this->get_field_id('review_tag'); ?>" name="<?php echo $this->get_field_name('review_tag'); ?>" value="<?php echo $instance['review_tag']; ?>" />
			<br/><small><?php _e('Enter the slug of the review tag you want to display under the review title (e.g. <code>genres</code>).', 'gp_lang'); ?></small>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('posts_per_page'); ?>"><?php _e('Number Of Reviews:', 'gp_lang'); ?></label>
			<input  type="text" id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page'); ?>" value="<?php echo $instance['posts_per_page']; ?>" size="3" />
		</p>
	
		<p>
			<label for="<?php echo $this->get_field_id('rating_type'); ?>"><?php _e('Rating Type:', 'gp_lang'); ?></label>
			<select id="rating_type" name="rating_type">
				<option value="Site Rating" <?php if ($instance['rating_type'] == 'Site Rating') { echo 'selected="selected"'; } ?>><?php _e('Site Rating', 'gp_lang'); ?></option>			
				<option value="User Rating" <?php if ($instance['rating_type'] == 'User Rating') { echo 'selected="selected"'; } ?>><?php _e('User Rating', 'gp_lang'); ?></option> 	
				<option value="Site & User Rating" <?php if ($instance['rating_type'] == 'Site & User Rating') { echo 'selected="selected"'; } ?>><?php _e('Site & User Rating', 'gp_lang'); ?></option> 
				<option value="No Ratings" <?php if ($instance['rating_type'] == 'No Ratings') { echo 'selected="selected"'; } ?>><?php _e('No Ratings', 'gp_lang'); ?></option> 
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('gd_sort'); ?>"><?php _e('Sort By:', 'gp_lang'); ?></label>
			<select id="gd_sort" name="gd_sort">
				<option value="review" <?php if ($instance['gd_sort'] == 'review') { echo 'selected="selected"'; } ?>><?php _e('Site Rating', 'gp_lang'); ?></option>			
				<option value="rating" <?php if ($instance['gd_sort'] == 'rating') { echo 'selected="selected"'; } ?>><?php _e('User Rating', 'gp_lang'); ?></option> 			
                <option value="votes" <?php if ($instance['gd_sort'] == 'votes') { echo 'selected="selected"'; } ?>><?php _e('Number of Votes', 'gp_lang'); ?></option>
				<option value="date" <?php if ($instance['gd_sort'] == 'date') { echo 'selected="selected"'; } ?>><?php _e('Date', 'gp_lang'); ?></option>
				<option value="title" <?php if ($instance['gd_sort'] == 'title') { echo 'selected="selected"'; } ?>><?php _e('Title', 'gp_lang'); ?></option>		
				<option value="rand" <?php if ($instance['gd_sort'] == 'rand') { echo 'selected="selected"'; } ?>><?php _e('Random', 'gp_lang'); ?></option>						                
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('gd_order'); ?>"><?php _e('Order:', 'gp_lang'); ?></label>
			<select id="gd_order" name="gd_order">
				<option value="desc" <?php if($instance['gd_order'] == 'desc') { echo 'selected="selected"'; } ?>><?php _e('Descending', 'gp_lang'); ?></option> 			
				<option value="asc" <?php if($instance['gd_order'] == 'asc') { echo 'selected="selected"'; } ?>><?php _e('Ascending', 'gp_lang'); ?></option>							
			</select>
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('gd_multi_id'); ?>"><?php _e('Multi Set ID:', 'gp_lang'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('gd_multi_id'); ?>" name="<?php echo $this->get_field_name('gd_multi_id'); ?>" value="<?php echo $instance['gd_multi_id']; ?>" size="3" />
			<br/><small><?php _e('Enter the ID of the <a href="admin.php?page=gd-star-rating-multi-sets">multi set</a> you want to order your reviews by.', 'gp_lang'); ?></small>			
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('title_length'); ?>"><?php _e('Title Length:', 'gp_lang'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('title_length'); ?>" name="<?php echo $this->get_field_name('title_length'); ?>" value="<?php echo $instance['title_length']; ?>" size="3" />
		</p>	
		
		<p>
			<label for="<?php echo $this->get_field_id('see_all'); ?>"><?php _e('See All Link:', 'gp_lang'); ?></label>
			<input  type="text" id="<?php echo $this->get_field_id('see_all'); ?>" name="<?php echo $this->get_field_name('see_all'); ?>" value="<?php echo $instance['see_all']; ?>" />
		</p>
		
		<input type="hidden" name="widget-options" id="widget-options" value="1" />

		<?php
	
	}
}

?>