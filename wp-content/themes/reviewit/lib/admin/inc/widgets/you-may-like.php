<?php

//////////////////////////////////////// You May Like Widget ////////////////////////////////////////

add_action('widgets_init', 'yml_widgets');

function yml_widgets() {
	register_widget('YML');
}

class YML extends WP_Widget {

	function YML() {
		$widget_ops = array('classname' => 'review-boxes-widget', 'description' => __('Displays other reviews that have any of the same post tags.', 'gp_lang'));
		$this->WP_Widget('yml-widget', __('GP You May Like', 'gp_lang'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$cats = $instance['cats'];
		$posts_per_page = $instance['posts_per_page'];
		$post_display = $instance['post_display'];
		$image_width = $instance['image_width'];
		$image_height = $instance['image_height'];	
		$rating_type = $instance['rating_type'];
		$title_length = $instance['title_length'];
		$excerpt_length = $instance['excerpt_length'];

		require(gp_inc . 'options.php'); global $gp_settings, $wp_query, $post, $paged; $col_counter = '';

		// Image Dimensions
		if(empty($image_width) && !is_numeric($image_width)) {
			$image_width = "181";
		} else {
			$image_width;
		}
		if(empty($image_height) && !is_numeric($image_height)) {
			$image_height = "120";
		} else {
			$image_height;
		}
		
		// Begin Widget
		echo $before_widget; ?>
	
			<?php echo $before_title .  $title . $after_title; ?>
			
			<div class="review-box-container">
			
				<?php
				
				/*$terms = get_the_terms(get_the_ID(), 'genre');
				$genres = array();
				foreach($terms as $term) {
					$genre_slugs[] = $term->slug;
				}
				$genres = join(', ', $genre_slugs);*/
				
				$tags = wp_get_post_tags(get_the_ID());

				if($tags) {
				
				$tag_ids = array();
				foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
				
				$newQuery=array(
				'post_type' => 'review',
				'gdsr_multi' => 0,
				'tag__in' => $tag_ids,
				//'genre' => $genres,
				'post__not_in' => array(get_the_ID()),
				'posts_per_page' => $posts_per_page,
				'ignore_sticky_posts' => 0,
				'orderby' => 'rand',
				'caller_get_posts' => 1,
				'nopaging' => 0
				);
						
				query_posts($newQuery); if(have_posts()) : while(have_posts()) : the_post(); include(gp.'loop-data.php');
				
				// Column Count
				$col_counter = $col_counter + 1;
				$col_number = $gp_settings['content_width'] / ($image_width + 32);
				$col_number = floor($col_number);
				
				 ?>
						
					<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true), $image_width, $image_height, true); ?>

					<div class="review-box<?php if($post_display == "Extended Boxes") { ?> review-box-extended<?php } else { ?> review-box-compact<?php } ?>" style="width: <?php echo $image_width; ?>px;">
						
						<!--Begin Image-->
						<?php if(has_post_thumbnail() OR get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true)) { ?>	
							<div class="post-thumbnail">
							
								<?php if(defined('STARRATING_INSTALLED') && $rating_type != "No Ratings") { ?>
									
									<?php if($rating_type != "User Rating" && ($gp_settings['gp_gdsr']->review > 0 OR $gp_settings['gp_gdsmr']->review > 0)) { ?>
								
										<!--Site Rating-->
										<div class="review-box-stars<?php if($rating_type == "Site & User Rating") { ?> both-ratings<?php } ?>">
											<?php if($gp_settings['site_multi_rating_id']) { ?>
												<?php wp_gdsr_multi_review_average($gp_settings['site_multi_rating_id'], 0, true); ?>				
											<?php } else { ?>
												<?php wp_gdsr_render_review(0, 0, '', ''); ?>
											<?php } ?>	
										</div>
										
									<?php } ?>
									
									<?php if($rating_type != "Site Rating" && $gp_settings['user_voting'] != "Users cannot vote") { ?>
									
										<!--User Rating-->
										<div class="review-box-stars">
											<?php if($gp_settings['user_multi_rating_id']) { ?>
												<?php wp_gdsr_multi_rating_average($gp_settings['user_multi_rating_id'], 0, 'total', $gp_settings['mur_stars_set'], '', '', true); ?>		
											<?php } else { ?>
												<?php wp_gdsr_render_article(0, 1); ?>
											<?php } ?>	
										</div>					
									
									<?php } ?>	
							
								<?php } ?>
							
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
									<img src="<?php echo $image['url']; ?>" width="<?php echo $image_width; ?>" height="<?php echo $image['height']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { the_title_attribute(); } ?>" />		
								</a>				

							</div>					
						<?php } ?>
						<!--End Image-->
		
						<div class="review-box-text">
						
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo gp_the_title_limit($title_length); ?></a></h2>
							
							<p><?php if($excerpt_length > 0) { echo gp_excerpt($excerpt_length); } ?></p>
							
						</div>
					
					</div>
					
					<?php if($col_number > 0 && $col_counter %$col_number == 0) { ?><div class="clear"></div><?php } ?>
						
				<?php endwhile; ?>
			
					<div class="clear"></div>
			
				<?php endif; } wp_reset_query(); ?>
								
			</div>
				
		<?php echo $after_widget;
		// End Widget
		
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['cats'] = $new_instance['cats'];
		$instance['posts_per_page'] = $new_instance['posts_per_page'];
		$instance['post_display'] = $_POST['post_display'];	
		$instance['image_width'] = strip_tags($new_instance['image_width']);
		$instance['image_height'] = strip_tags($new_instance['image_height']);
		$instance['rating_type'] = $_POST['rating_type'];
		$instance['title_length'] = $new_instance['title_length'];
		$instance['excerpt_length'] = $new_instance['excerpt_length'];
		return $instance;
	}

	function form($instance) {
		$defaults = array('title' => '', 'cats' => '', 'posts_per_page' => '3', 'post_display' => 'Compact Boxes', 'image_width' => '181', 'image_height' => '120', 'rating_type' => 'Site Rating', 'title_length' => '20', 'excerpt_length' => '15'); $instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'gp_lang'); ?></label>
			<br/><input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Review Category IDs', 'gp_lang'); ?>:</label>
			<br/><input type="text" id="<?php echo $this->get_field_id('cats'); ?>" name="<?php echo $this->get_field_name('cats'); ?>" value="<?php echo $instance['cats']; ?>" />
			<br/><small><?php _e('Enter the IDs of the <a href="../wp-admin/edit-tags.php?taxonomy=review_categories&post_type=review">review categories</a> you want to display (leave blank to display all categories).', 'gp_lang'); ?></small>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('posts_per_page'); ?>"><?php _e('Number Of Reviews:', 'gp_lang'); ?></label>
			<input  type="text" id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page'); ?>" value="<?php echo $instance['posts_per_page']; ?>" size="3" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('post_display'); ?>"><?php _e('Post Display:', 'gp_lang'); ?></label>
			<select id="post_display" name="post_display">
				<option value="Compact Boxes" <?php if ($instance['post_display'] == 'Compact Boxes'){ echo 'selected="selected"'; } ?> >Compact Boxes</option>			
				<option value="Extended Boxes" <?php if ($instance['post_display'] == 'Extended Boxes'){ echo 'selected="selected"'; } ?> >Extended Boxes</option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('image_width'); ?>"><?php _e('Image Width (px)', 'gp_lang'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('image_width'); ?>" name="<?php echo $this->get_field_name('image_width'); ?>" value="<?php echo $instance['image_width']; ?>" size="3" />
		</p>	
		
		<p>
			<label for="<?php echo $this->get_field_id('image_height'); ?>"><?php _e('Image Height (px)', 'gp_lang'); ?>:</label>
			<input type="text" id="<?php echo $this->get_field_id('image_height'); ?>" name="<?php echo $this->get_field_name('image_height'); ?>" value="<?php echo $instance['image_height']; ?>" size="3" />
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
			<label for="<?php echo $this->get_field_id('title_length'); ?>"><?php _e('Title Length', 'gp_lang'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('title_length'); ?>" name="<?php echo $this->get_field_name('title_length'); ?>" value="<?php echo $instance['title_length']; ?>" size="3" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('excerpt_length'); ?>"><?php _e('Excerpt Length', 'gp_lang'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" value="<?php echo $instance['excerpt_length']; ?>" size="3" />
		</p>
		
		<input type="hidden" name="widget-options" id="widget-options" value="1" />

		<?php
	
	}
}

?>