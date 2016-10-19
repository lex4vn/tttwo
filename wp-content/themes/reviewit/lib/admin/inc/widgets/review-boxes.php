<?php

//////////////////////////////////////// Review Boxes Widget ////////////////////////////////////////

add_action('widgets_init', 'review_boxes_widgets');

function review_boxes_widgets() {
	register_widget('Review_Boxes');
}

function gp_review_boxes_posts_per_page($query) {
	global $wp_the_query;
	if(((function_exists('is_main_query') && $query->is_main_query()) OR $wp_the_query === $query) && !is_admin()) {
		$query->set('posts_per_page', 1);
	}
}
add_action('pre_get_posts', 'gp_review_boxes_posts_per_page');

class Review_Boxes extends WP_Widget {

	function Review_Boxes() {
		$widget_ops = array('classname' => 'review-boxes-widget', 'description' => __('Display your reviews in boxes.', 'gp_lang'));
		$this->WP_Widget('review_boxes-widget', __('GP Review Boxes', 'gp_lang'), $widget_ops);
	}
	
	function widget($args, $instance) {

		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		$cats = $instance['cats'];
		$posts_per_page = $instance['posts_per_page'];
		$post_display = $instance['post_display'];
		$image_width = $instance['image_width'];
		$image_height = $instance['image_height'];	
		$box_height = $instance['box_height'];	
		$rating_type = $instance['rating_type'];		
		$gd_sort = $instance['gd_sort'];
		$gd_order = $instance['gd_order'];
		$gd_multi_id = $instance['gd_multi_id'];
		$title_length = $instance['title_length'];
		$excerpt_length = $instance['excerpt_length'];
		$pagination = $instance['pagination'];		
		$see_all = $instance['see_all'];

		require(gp_inc . 'options.php'); global $gp_settings, $post, $paged, $wp_query; $col_counter = '';

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
		echo $before_widget;
		
		// Pagination
		if($pagination == "Disable") { 
			$paged = 1;
		} else {
			if (get_query_var('paged')) {
				$paged = get_query_var('paged');
			} elseif (get_query_var('page')) {
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}	
		}
		
		?>
	
			<?php echo $before_title; ?>
				<?php echo $title; ?>
				<?php if($see_all) { ?><a href="<?php echo($see_all); ?>" class="see-all"><?php _e('See All', 'gp_lang'); ?> &raquo;</a><?php } ?>
			<?php echo $after_title; ?>
			
			<div class="review-box-container">
			
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
					'paged' => $paged,
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
					'paged' => $paged,
					'ignore_sticky_posts' => 0,
					$orderby => $gd_sort,
					$order => $gd_order,
					'gdsr_multi' => $gd_multi_id
					);
									
				}
				
				query_posts($newQuery); if(have_posts()) : while(have_posts()) : the_post(); include(gp.'loop-data.php');
				
				// Column Count
				$col_counter = $col_counter + 1;
				$col_number = $gp_settings['content_width'] / ($image_width + 32);
				$col_number = floor($col_number);
				
				 ?>
						
					<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true), $image_width, $image_height, true); ?>

					<div class="review-box<?php if($post_display == "Extended Boxes") { ?> review-box-extended<?php } else { ?> review-box-compact<?php } ?>" style="width: <?php echo $image_width; ?>px; height: <?php echo $box_height; ?>px;">
						
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
						
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php echo gp_the_title_limit($title_length); ?></a></h2>
							
							<p><?php if($excerpt_length > 0) { echo gp_excerpt($excerpt_length); } ?></p>
							
						</div>
					
					</div>
					
					<?php if($col_number > 0 && $col_counter %$col_number == 0) { ?><div class="clear"></div><?php } ?>
						
				<?php endwhile; ?>
					
					<div class="clear"></div>
					
					<?php if($pagination == "Enable") { gp_home_pagination(); } ?>
					
					<div class="clear"></div>
			
				<?php endif; wp_reset_query(); ?>
								
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
		$instance['image_width'] = $new_instance['image_width'];
		$instance['image_height'] = $new_instance['image_height'];		
		$instance['box_height'] = $new_instance['box_height'];
		$instance['rating_type'] = $_POST['rating_type'];		
		$instance['gd_sort'] = $_POST['gd_sort'];
		$instance['gd_order'] = $_POST['gd_order'];
		$instance['gd_multi_id'] = $new_instance['gd_multi_id'];
		$instance['title_length'] = $new_instance['title_length'];
		$instance['excerpt_length'] = $new_instance['excerpt_length'];
		$instance['pagination'] = $_POST['pagination'];		
		$instance['see_all'] = $new_instance['see_all'];
		return $instance;
	}

	function form($instance) {
		$defaults = array('title' => '', 'cats' => '', 'posts_per_page' => '6', 'post_display' => 'Compact Boxes', 'image_width' => '181', 'image_height' => '120', 'box_height' => '220', 'rating_type' => 'Site Rating', 'gd_sort' => 'review', 'gd_order' => 'desc', 'gd_multi_id' => '', 'orderby' => 'date', 'order' => 'desc', 'title_length' => '20', 'excerpt_length' => '95', 'pagination' => 'Disable', 'see_all' => ''); $instance = wp_parse_args((array) $instance, $defaults); ?>

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
			<label for="<?php echo $this->get_field_id('posts_per_page'); ?>"><?php _e('Reviews Per Page:', 'gp_lang'); ?></label>
			<input  type="text" id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page'); ?>" value="<?php echo $instance['posts_per_page']; ?>" size="3" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('post_display'); ?>"><?php _e('Post Display:', 'gp_lang'); ?></label>
			<select id="post_display" name="post_display">
				<option value="Compact Boxes" <?php if ($instance['post_display'] == 'Compact Boxes'){ echo 'selected="selected"'; } ?>>Compact Boxes</option>			
				<option value="Extended Boxes" <?php if ($instance['post_display'] == 'Extended Boxes'){ echo 'selected="selected"'; } ?>>Extended Boxes</option>
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('image_width'); ?>"><?php _e('Image Width (px):', 'gp_lang'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('image_width'); ?>" name="<?php echo $this->get_field_name('image_width'); ?>" value="<?php echo $instance['image_width']; ?>" size="3" />
		</p>	
		
		<p>
			<label for="<?php echo $this->get_field_id('image_height'); ?>"><?php _e('Image Height (px):', 'gp_lang'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('image_height'); ?>" name="<?php echo $this->get_field_name('image_height'); ?>" value="<?php echo $instance['image_height']; ?>" size="3" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('box_height'); ?>"><?php _e('Box Height (px):', 'gp_lang'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('box_height'); ?>" name="<?php echo $this->get_field_name('box_height'); ?>" value="<?php echo $instance['box_height']; ?>" size="3" />
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
			<label for="<?php echo $this->get_field_id('excerpt_length'); ?>"><?php _e('Excerpt Length:', 'gp_lang'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" value="<?php echo $instance['excerpt_length']; ?>" size="3" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('pagination'); ?>"><?php _e('Page Numbers:', 'gp_lang'); ?></label>
			<select id="pagination" name="pagination">	
				<option value="Disable" <?php if ($instance['pagination'] == 'Disable') { echo 'selected="selected"'; } ?>><?php _e('Disable', 'gp_lang'); ?></option>     
				<option value="Enable" <?php if ($instance['pagination'] == 'Enable') { echo 'selected="selected"'; } ?>><?php _e('Enable', 'gp_lang'); ?></option>					
			</select>
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