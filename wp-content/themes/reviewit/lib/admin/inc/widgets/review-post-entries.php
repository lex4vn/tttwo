<?php

//////////////////////////////////////// Review/Post Entries Widget ////////////////////////////////////////

add_action('widgets_init', 'blog_posts_widgets');

function blog_posts_widgets() {
	register_widget('Blog_Posts');
}

function gp_posts_widgetsposts_per_page($query) {
	global $wp_the_query;
	if(((function_exists('is_main_query') && $query->is_main_query()) OR $wp_the_query === $query) && !is_admin()) {
		$query->set('posts_per_page', 1);
	}
}
add_action('pre_get_posts', 'gp_posts_widgetsposts_per_page');

class Blog_Posts extends WP_Widget {

	function Blog_Posts() {
		$widget_ops = array('classname' => 'blog-posts-widget', 'description' => __('Display your reviews and/or post entries in blog form.', 'gp_lang'));
		$this->WP_Widget('blog_posts-widget', __('GP Review/Post Entries', 'gp_lang'), $widget_ops);
	}

	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);		
		$post_type = $instance['post_type'];
		$cats = $instance['cats'];
		$posts_per_page = $instance['posts_per_page'];
		$images = $instance['images'];
		$image_width = $instance['image_width'];
		$image_height = $instance['image_height'];
		$image_wrap = $instance['image_wrap'];
		$rating_type = $instance['rating_type'];
		$gd_sort = $instance['gd_sort'];
		$gd_order = $instance['gd_order'];
		$gd_multi_id = $instance['gd_multi_id'];		
		$content_display = $instance['content_display'];
		$excerpt_length = $instance['excerpt_length'];
		$offset = $instance['offset'];
		$pagination = $instance['pagination'];	
		
		require(gp_inc . 'options.php'); global $post, $paged, $wp_query;
		
		// Begin Widget
		echo $before_widget;
			
		// Post Type
		if($post_type == 'Both') {
			$post_type = array('post', 'review');
		} elseif($post_type == 'Reviews') {
			$post_type = 'review';
		} else {
			$post_type = 'post';
		}

		// Image Dimensions
		if(empty($image_width) && !is_numeric($image_width)) {
			$image_width = "100";
		} else {
			$image_width;
		}
		if(empty($image_height) && !is_numeric($image_height)) {
			$image_height = "130";
		} else {
			$image_height;
		}

		// Post/Review Meta
		$meta_date = $theme_cat_date;
		$meta_author = $theme_cat_author;
		$meta_cats = $theme_cat_cats;
		$meta_comments = $theme_cat_comments;
		$meta_tags = $theme_cat_tags;
		$read_more = $theme_cat_read_more;

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
				'post_type' => $post_type,
				'post_status' => 'publish',
				'posts_per_page' => $posts_per_page,
				'paged' => $paged,
				'ignore_sticky_posts' => 0,
				$orderby => $gd_sort,
				$order => $gd_order,
				'gdsr_multi' => $gd_multi_id,			
				'offset' => $offset,
				'tax_query' =>
				array('relation' => 'OR',
					array('taxonomy' => 'review_categories', 'terms' => explode(',', $cats), 'field' => 'id'),
					array('taxonomy' => 'category', 'terms' => explode(',', $cats), 'field' => 'id'))			
				);
			
			} else {

				$newQuery=array(
				'post_type' => $post_type,
				'post_status' => 'publish',
				'posts_per_page' => $posts_per_page,
				'paged' => $paged,
				'ignore_sticky_posts' => 0,
				$orderby => $gd_sort,
				$order => $gd_order,
				'gdsr_multi' => $gd_multi_id,			
				'offset' => $offset
				);
						
			}
								
			global $more; $more = 0;
			
			query_posts($newQuery); if(have_posts()) : while(have_posts()) : the_post(); include(gp.'loop-data.php'); ?>
		
				<!--Begin Post Content-->
				<div <?php post_class('post-loop'); ?>>
		
					<!--Begin Image-->
					<?php if((has_post_thumbnail() OR get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true)) && $images == "Show") { ?>	
	
						<div class="post-thumbnail<?php if($image_wrap == "Disable") { ?> thumbnail-no-wrap<?php } ?>">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true), $image_width, $image_height, true); ?>
								<img src="<?php echo $image['url']; ?>" width="<?php echo $image_width; ?>" height="<?php echo $image['height']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { the_title_attribute(); } ?>" />		
							</a>				
						</div>				
						
						<?php if($image_wrap == "Disable") { ?><div class="clear"></div><?php } ?>
											
					<?php } ?>
					<!--End Image-->
					
					<div class="post-text"<?php if((has_post_thumbnail() OR get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true)) && $images == "Show" && $image_wrap == "Enable") { ?> style="margin-left: <?php echo $image_width + 32; ?>px;"<?php } ?>>
				
						<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			
						<!--Begin Post Meta-->
						<?php if($meta_date == "0" OR $meta_author == "0" OR $meta_cats == "0" OR $meta_comments == "0") { ?>
						
							<div class="post-meta">
								<?php if($meta_date == "0") { ?><?php the_time(get_option('date_format')); ?><?php } ?>
								<?php if($meta_author == "0") { ?> - <?php the_author_posts_link(); ?><?php } ?>
								<?php if($meta_cats == "0") { ?> - <?php if(get_post_type() == "post") { the_category(', '); } else { echo get_the_term_list('', 'review_categories', '', ', '); } ?><?php } ?>
								<?php if($meta_comments == "0" && 'open' == $post->comment_status) { ?> - <?php comments_popup_link(__('No Comments', 'gp_lang'), __('1 Comment', 'gp_lang'), __('% Comments', 'gp_lang'), 'comments-link', ''); ?><?php } ?>
							</div>
							
						<?php } ?>
						<!--End Post Meta-->
							
						<?php if($content_display == "Full Content") { ?>
							<?php the_content(__('Read On', 'gp_lang')); ?>
						<?php } else { ?>
							<?php if($excerpt_length != "0") { ?><p><?php echo gp_excerpt($excerpt_length); ?><?php if($read_more == "0") { ?> <a href="<?php the_permalink(); ?>" class="read-more" title="<?php the_title_attribute(); ?>"><?php _e('Read On', 'gp_lang'); ?></a><?php } ?></p><?php } ?>							
						<?php } ?>
						
						<?php if($meta_tags == "0") { ?>
							<?php the_tags('<div class="post-meta post-tags">'.__('Tags: ', 'gp_lang'), ', ', '</div>'); ?>
						<?php } ?>
						
						<?php if(defined('STARRATING_INSTALLED') && get_post_type() == "review" && $rating_type != "No Ratings") { ?>
						
						<?php if($rating_type != "User Rating" && ($gp_settings['gp_gdsr']->review > 0 OR $gp_settings['gp_gdsmr']->review > 0)) { ?>
						
							<!--Site Rating-->
							<div class="review-list-ratings">
								<span><?php _e('Site Rating', 'gp_lang'); ?>:</span>
								<?php if($gp_settings['site_multi_rating_id']) { ?>
									<?php wp_gdsr_multi_review_average($gp_settings['site_multi_rating_id'], 0, true); ?>				
								<?php } else { ?>
									<?php wp_gdsr_render_review(0, 0, '', ''); ?>
								<?php } ?>	
							</div>
						
						<?php } ?>
						
						<?php if($rating_type != "Site Rating" && $gp_settings['user_voting'] != "Users cannot vote") { ?>
						
							<!--User Rating-->
							<div class="review-list-ratings">
								<span><?php _e('User Rating', 'gp_lang'); ?>:</span>
								<?php if($gp_settings['user_multi_rating_id']) { ?>
									<?php wp_gdsr_multi_rating_average($gp_settings['user_multi_rating_id'], 0, 'total', $gp_settings['mur_stars_set'], '', '', true); ?>		
								<?php } else { ?>
									<?php wp_gdsr_render_article(0, 1); ?>
								<?php } ?>	
							</div>					
						
						<?php } ?>				
					
					<?php } ?>
					
					</div>
					<!--End Post Text-->
				
				</div>
				<!--End Post Content-->
					
			<?php endwhile; ?>		

				<div class="clear"></div>
				
				<?php if($pagination == "Enable") { gp_home_pagination(); } ?>
				
				<div class="clear"></div>
					
			<?php endif; wp_reset_query(); ?>
			
		<?php 
		
		echo $after_widget;
		// End Widget
		
	}

	function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['post_type'] = $_POST['post_type'];
		$instance['cats'] = $new_instance['cats'];
		$instance['posts_per_page'] = $new_instance['posts_per_page'];	
		$instance['images'] = $_POST['images'];
		$instance['image_width'] = strip_tags($new_instance['image_width']);
		$instance['image_height'] = strip_tags($new_instance['image_height']);
		$instance['image_wrap'] = $_POST['image_wrap'];		
		$instance['rating_type'] = $_POST['rating_type'];
		$instance['gd_sort'] = $_POST['gd_sort'];
		$instance['gd_order'] = $_POST['gd_order'];
		$instance['gd_multi_id'] = $new_instance['gd_multi_id'];		
		$instance['content_display'] = $_POST['content_display'];
		$instance['excerpt_length'] = $new_instance['excerpt_length'];
		$instance['offset'] = $new_instance['offset'];		
		$instance['pagination'] = $_POST['pagination'];		
		return $instance;
	}

	function form($instance) {

		$defaults = array('title' => '', 'post_type' => 'Posts', 'cats' => '', 'posts_per_page' => '5', 'images' => 'Show', 'image_width' => '100', 'image_height' => '130', 'image_wrap' => 'Enable', 'rating_type' => 'No Ratings', 'gd_sort' => 'date', 'gd_order' => 'desc', 'gd_multi_id' => '', 'orderby' => 'date', 'order' => 'desc', 'content_display' => 'excerpt', 'excerpt_length' => '350', 'offset' => '0', 'pagination' => 'Enable'); $instance = wp_parse_args((array) $instance, $defaults); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'gp_lang'); ?></label>
			<br/><input type="text" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('post_type'); ?>"><?php _e('Post Type:', 'gp_lang'); ?></label>
			<select id="post_type" name="post_type">
				<option value="Posts" <?php if ($instance['post_type'] == 'Posts') { echo 'selected="selected"'; } ?>><?php _e('Posts', 'gp_lang'); ?></option>			
				<option value="Reviews" <?php if ($instance['post_type'] == 'Reviews') { echo 'selected="selected"'; } ?>><?php _e('Reviews', 'gp_lang'); ?></option>  
				<option value="Both" <?php if ($instance['post_type'] == 'Both') { echo 'selected="selected"'; } ?>><?php _e('Both', 'gp_lang'); ?></option>  				
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('cats'); ?>"><?php _e('Category IDs:', 'gp_lang'); ?></label>
			<br/><input type="text" id="<?php echo $this->get_field_id('cats'); ?>" name="<?php echo $this->get_field_name('cats'); ?>" value="<?php echo $instance['cats']; ?>" />
			<br/><small><?php _e('Enter the IDs of the <a href="../wp-admin/edit-tags.php?taxonomy=category">post categories</a> and <a href="../wp-admin/edit-tags.php?taxonomy=review_categories&post_type=review">review categories</a> you want to display (leave blank to display all categories).', 'gp_lang'); ?></small>
		</p>	
		
		<p>
			<label for="<?php echo $this->get_field_id('posts_per_page'); ?>"><?php _e('Number Of Entries:', 'gp_lang'); ?></label>
			<input  type="text" id="<?php echo $this->get_field_id('posts_per_page'); ?>" name="<?php echo $this->get_field_name('posts_per_page'); ?>" value="<?php echo $instance['posts_per_page']; ?>" size="3" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('offset'); ?>"><?php _e('Offset Entries By:', 'gp_lang'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('offset'); ?>" name="<?php echo $this->get_field_name('offset'); ?>" value="<?php echo $instance['offset']; ?>" size="3" />
			<br/><small><?php _e('For example to hide the first five entries enter "5" (page numbers do not work with this option).', 'gp_lang'); ?></small>
		</p>		
		
		<p>
			<label for="<?php echo $this->get_field_id('images'); ?>"><?php _e('Images:', 'gp_lang'); ?></label>
			<select id="images" name="images">
				<option value="Show" <?php if($instance['images'] == 'Show') { echo 'selected="selected"'; } ?>><?php _e('Show', 'gp_lang'); ?></option>			
				<option value="Hide" <?php if($instance['images'] == 'Hide') { echo 'selected="selected"'; } ?>><?php _e('Hide', 'gp_lang'); ?></option>            
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
			<label for="<?php echo $this->get_field_id('image_wrap'); ?>"><?php _e('Image Wrap:', 'gp_lang'); ?></label>
			<select id="image_wrap" name="image_wrap">
				<option value="Enable" <?php if ($instance['image_wrap'] == 'Enable') { echo 'selected="selected"'; } ?>><?php _e('Enable', 'gp_lang'); ?></option>			
				<option value="Disable" <?php if ($instance['image_wrap'] == 'Disable') { echo 'selected="selected"'; } ?>><?php _e('Disable', 'gp_lang'); ?></option> 	
			</select>
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
			<label for="<?php echo $this->get_field_id('content_display'); ?>"><?php _e('Content Display:', 'gp_lang'); ?></label>
			<select id="content_display" name="content_display">
				<option value="Excerpt" <?php if ($instance['content_display'] == 'Excerpt') { echo 'selected="selected"'; } ?>><?php _e('Excerpt', 'gp_lang'); ?></option>			
				<option value="Full Content" <?php if ($instance['content_display'] == 'Full Content') { echo 'selected="selected"'; } ?>><?php _e('Full Content', 'gp_lang'); ?></option>            
			</select>
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('excerpt_length'); ?>"><?php _e('Excerpt Length:', 'gp_lang'); ?></label>
			<input type="text" id="<?php echo $this->get_field_id('excerpt_length'); ?>" name="<?php echo $this->get_field_name('excerpt_length'); ?>" value="<?php echo $instance['excerpt_length']; ?>" size="3" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id('pagination'); ?>"><?php _e('Page Numbers:', 'gp_lang'); ?></label>
			<select id="pagination" name="pagination">	
				<option value="Enable" <?php if ($instance['pagination'] == 'Enable') { echo 'selected="selected"'; } ?>><?php _e('Enable', 'gp_lang'); ?></option>			
				<option value="Disable" <?php if ($instance['pagination'] == 'Disable') { echo 'selected="selected"'; } ?>><?php _e('Disable', 'gp_lang'); ?></option>     
			</select>
		</p>
		
		<input type="hidden" name="widget-options" id="widget-options" value="1" />

		<?php
	}
}

?>