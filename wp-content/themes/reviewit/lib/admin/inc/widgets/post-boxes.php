<?php

//////////////////////////////////////// Post Boxes Widget ////////////////////////////////////////

add_action('widgets_init', 'post_boxes_widgets');

function post_boxes_widgets() {
	register_widget('Post_Boxes');
}

function gp_post_boxes_posts_per_page($query) {
	global $wp_the_query;
	if(((function_exists('is_main_query') && $query->is_main_query()) OR $wp_the_query === $query) && !is_admin()) {
		$query->set('posts_per_page', 1);
	}
}
add_action('pre_get_posts', 'gp_post_boxes_posts_per_page');

class Post_Boxes extends WP_Widget {

	function Post_Boxes() {
		$widget_ops = array('classname' => 'review-boxes-widget', 'description' => __('Display your posts in boxes.', 'gp_lang'));
		$this->WP_Widget('post_boxes-widget', __('GP Post Boxes', 'gp_lang'), $widget_ops);
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
				if($gd_multi_id) {
					$gd_multi_id = $gd_multi_id;
				} elseif($gd_sort == "date") {
					$gd_multi_id = "999999";				
				} else {
					$gd_multi_id = "0";
				}
				
				$newQuery=array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'posts_per_page' => $posts_per_page,
				'gdsr_multi' => $gd_multi_id,
				'paged' => $paged,
				'ignore_sticky_posts' => 0,
				'orderby' => $gd_sort,
				'order' => $gd_order,
				'cat' => $cats
				);

				query_posts($newQuery); if(have_posts()) : while(have_posts()) : the_post(); include(gp.'loop-data.php');
				
				// Column Count
				$col_counter = $col_counter + 1;
				$col_number = $gp_settings['content_width'] / ($image_width + 32);
				$col_number = floor($col_number);
				
				 ?>
						
					<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta($post->ID, 'ghostpool_thumbnail', true), $image_width, $image_height, true); ?>

					<div class="review-box<?php if($post_display == "Extended Boxes") { ?> review-box-extended<?php } else { ?> review-box-compact<?php } ?>" style="width: <?php echo $image_width; ?>px; height: <?php echo $box_height; ?>px;">
						
						<!--Begin Image-->
						<?php if(has_post_thumbnail() OR get_post_meta($post->ID, 'ghostpool_thumbnail', true)) { ?>	
							<div class="post-thumbnail">
								<a href="<?php the_permalink(); ?>">
									<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { the_title_attribute(); } ?>" />		
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
		$instance['image_width'] = strip_tags($new_instance['image_width']);
		$instance['image_height'] = strip_tags($new_instance['image_height']);	
		$instance['box_height'] = strip_tags($new_instance['box_height']);	
		$instance['gd_sort'] = $_POST['gd_sort'];
		$instance['gd_order'] = $_POST['gd_order'];
		$instance['title_length'] = $new_instance['title_length'];
		$instance['excerpt_length'] = $new_instance['excerpt_length'];
		$instance['pagination'] = $_POST['pagination'];		
		$instance['see_all'] = $new_instance['see_all'];
		return $instance;
	}

	function form($instance) {
		$defaults = array('title' => '', 'cats' => '', 'posts_per_page' => '6', 'post_display' => 'Compact Boxes', 'image_width' => '181', 'image_height' => '120', 'box_height' => '220', 'orderby' => 'date', 'order' => 'desc', 'title_length' => '20', 'excerpt_length' => '100', 'pagination' => 'Disable', 'see_all' => ''); $instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'gp_lang'); ?></label>
			<br/><input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Post Category IDs:', 'gp_lang'); ?></label>
			<br/><input type="text" id="<?php echo $this->get_field_id('cats'); ?>" name="<?php echo $this->get_field_name('cats'); ?>" value="<?php echo $instance['cats']; ?>" />
			<br/><small><?php _e('Enter the IDs of the <a href="../wp-admin/edit-tags.php?taxonomy=category">post categories</a> you want to display (leave blank to display all categories).', 'gp_lang'); ?></small>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('posts_per_page'); ?>"><?php _e('Posts Per Page:', 'gp_lang'); ?></label>
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
			<label for="gd_sort"><?php _e('Sort By:', 'gp_lang'); ?></label>
			<select id="gd_sort" name="gd_sort">
				<option value="date" <?php if ($instance['gd_sort'] == 'date') { echo 'selected="selected"'; } ?>><?php _e('Date', 'gp_lang'); ?></option>			
				<option value="title" <?php if ($instance['gd_sort'] == 'title') { echo 'selected="selected"'; } ?>><?php _e('Title', 'gp_lang'); ?></option>
				<option value="rand" <?php if ($instance['gd_sort'] == 'rand') { echo 'selected="selected"'; } ?>><?php _e('Random', 'gp_lang'); ?></option>	    
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('gd_order'); ?>"><?php _e('Order:', 'gp_lang'); ?></label>
			<select id="gd_order" name="gd_order">
				<option value="desc" <?php if ($instance['gd_order'] == 'desc') { echo 'selected="selected"'; } ?>><?php _e('Descending', 'gp_lang'); ?></option> 			
				<option value="asc" <?php if ($instance['gd_order'] == 'asc') { echo 'selected="selected"'; } ?>><?php _e('Ascending', 'gp_lang'); ?></option>							
			</select>
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
				<option value="Disable" <?php if ($instance['pagination'] == 'Disable'){ echo 'selected="selected"'; } ?>><?php _e('Disable', 'gp_lang'); ?></option>     
				<option value="Enable" <?php if ($instance['pagination'] == 'Enable'){ echo 'selected="selected"'; } ?>><?php _e('Enable', 'gp_lang'); ?></option>					
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