<?php global $gp_settings;

$gp_settings['thumbnail_width'] = $theme_review_cat_thumbnail_width;
$gp_settings['thumbnail_height'] = $theme_review_cat_thumbnail_height;
$gp_settings['image_wrap'] = $theme_review_cat_image_wrap;
$gp_settings['title'] = $theme_review_cat_title;
$gp_settings['posts_per_page'] = $theme_review_cat_posts_per_page;
$gp_settings['post_display'] = $theme_review_cat_post_display;
$gp_settings['rating_type'] = $theme_review_cat_rating_type;	
$gp_settings['content_display'] = $theme_review_cat_content_display;
$gp_settings['title_length'] = $theme_review_cat_title_length;
$gp_settings['excerpt_length'] = $theme_review_cat_excerpt_length;
$gp_settings['read_more'] = $theme_review_cat_read_more;
$gp_settings['meta_date'] = $theme_review_cat_date;
$gp_settings['meta_author'] = $theme_review_cat_author;
$gp_settings['meta_cats'] = $theme_review_cat_cats;
$gp_settings['meta_comments'] = $theme_review_cat_comments;
$gp_settings['meta_tags'] = $theme_review_cat_tags;
	
include('loop-data.php');

// Column Count

$col_counter = $col_counter + 1;
$col_number = $gp_settings['content_width'] / ($gp_settings['thumbnail_width'] + 32);
$col_number = floor($col_number);
				
?>


<?php if($gp_settings['post_display'] != "List") { ?><div class="review-box-container"><?php } ?>
	
	
	<?php if($gp_settings['post_display'] != "List") { /******************************************** Boxes ********************************************/ ?>
	
	
		<!-- BEGIN REVIEW BOX -->

		<div class="review-box<?php if($gp_settings['post_display'] == "Extended Boxes") { ?> review-box-extended<?php } else { ?> review-box-compact<?php } ?>" style="width: <?php echo $gp_settings['image_width']; ?>px;">
			
			
			<!-- BEGIN IMAGE -->
			
			<?php if(has_post_thumbnail() OR get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true)) { ?>
				
				<div class="post-thumbnail">
				

					<!-- BEGIN RATINGS -->
					
					<?php if((defined('STARRATING_INSTALLED') && get_post_type() == "review") && $gp_settings['rating_type'] != "No Ratings") { ?>
						
						
						<!-- BEGIN SITE RATING -->
						
						<?php if($gp_settings['rating_type'] != "User Rating" && ($gp_settings['gp_gdsr']->review > 0 OR $gp_settings['gp_gdsmr']->review > 0)) { ?>
						
							<div class="review-box-stars<?php if($gp_settings['rating_type'] == "Site & User Rating") { ?> both-ratings<?php } ?>">
								<?php if($gp_settings['site_multi_rating_id']) { ?>
									<?php wp_gdsr_multi_review_average($gp_settings['site_multi_rating_id'], 0, true); ?>				
								<?php } else { ?>
									<?php wp_gdsr_render_review(0, 0, '', ''); ?>
								<?php } ?>	
							</div>
						
						<?php } ?>
						
						<!-- END SITE RATING -->
						
						
						<!-- BEGIN USER RATING -->
						
						<?php if($gp_settings['rating_type'] != "Site Rating" && $gp_settings['user_voting'] != "Users cannot vote") { ?>
						
							<div class="review-box-stars">
								<?php if($gp_settings['user_multi_rating_id']) { ?>
									<?php wp_gdsr_multi_rating_average($gp_settings['user_multi_rating_id'], 0, 'total', $gp_settings['mur_stars_set'], '', '', true); ?>
								<?php } else { ?>
									<?php wp_gdsr_render_article(0, 1); ?>
								<?php } ?>	
							</div>					
						
						<?php } ?>	
						
						<!-- END USER RATING -->
						
						
					<?php } ?>
					
					<!-- END RATINGS -->
			
			
					<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true), $gp_settings['image_width'], $gp_settings['image_height'], true); ?>
					
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<img src="<?php echo $image[url]; ?>" width="<?php echo $gp_settings['image_width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { the_title_attribute(); } ?>" />		
					</a>		
					
				</div>
									
			<?php } ?>
			
			<!-- END IMAGE -->
			
	
			<!-- BEGIN REVIEW BOX TEXT -->

			<div class="review-box-text">
			
				
				<!-- BEGIN TITLE -->
				
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo gp_the_title_limit($gp_settings['title_length']); ?></a></h2>
								
				<!-- END TITLE -->
					
				
				<!-- BEGIN POST CONTENT -->
								
				<?php if($gp_settings['content_display'] == "Full Content") { ?>	

				
					<div id="post-content">
				
						<?php the_content(__('Read On', 'gp_lang')); ?>
				
					</div>

					
				<?php } else { ?>
				
					<?php if($gp_settings['excerpt_length'] != "0") { ?><p><?php echo gp_excerpt($gp_settings['excerpt_length']); ?><?php if($gp_settings['read_more'] == "0") { ?> <a href="<?php the_permalink(); ?>" class="read-more" title="<?php the_title_attribute(); ?>"><?php _e('Read On', 'gp_lang'); ?></a><?php } ?></p><?php } ?>
					
				<?php } ?>
				
				<!-- END POST CONTENT -->
				
				
			</div>
			
			<!-- END REVIEW BOX TEXT -->
		
		
		</div>
	
		<!-- END REVIEW BOX -->


		<?php if($col_number > 0 && $col_counter %$col_number == 0) { ?><div class="clear"></div><?php } ?>
	
	
	<?php } else { /******************************************** List ********************************************/ ?>		
	
	
		<!-- BEGIN POST -->
		
		<div <?php post_class('post-loop'); ?>>
	
			
			<!-- BEGIN IMAGE -->
			
			<?php if(has_post_thumbnail() OR get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true)) { ?>
				<div class="post-thumbnail<?php if($gp_settings['image_wrap'] == "Disable") { ?> thumbnail-no-wrap<?php } ?>">
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true), $gp_settings['image_width'], $gp_settings['image_height'], true); ?>
						<img src="<?php echo $image['url']; ?>" width="<?php echo $gp_settings['image_width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { the_title_attribute(); } ?>" />		
					</a>				
				</div><?php if($gp_settings['image_wrap'] == "Disable") { ?><div class="clear"></div><?php } ?>			
			<?php } ?>
			
			<!-- END IMAGE -->
			
			
			<!-- BEGIN POST TEXT -->
			
			<div class="post-text"<?php if((has_post_thumbnail() OR get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true)) && $gp_settings['image_wrap'] == "Enable") { ?> style="margin-left: <?php echo $gp_settings['image_width'] + 32; ?>px;"<?php } ?>>
			
				
				<!-- BEGIN TITLE -->
				
				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php echo gp_the_title_limit($gp_settings['title_length']); ?></a></h2>
					
				<!-- END TITLE -->
				
				
				<!-- BEGIN POST META -->
				
				<?php if($gp_settings['meta_date'] == "0" OR $gp_settings['meta_author'] == "0" OR $gp_settings['meta_cats'] == "0" OR $gp_settings['meta_comments'] == "0") { ?>
				
					<div class="post-meta">
						<?php if($gp_settings['meta_date'] == "0") { ?><?php the_time(get_option('date_format')); ?><?php } ?>
						<?php if($gp_settings['meta_author'] == "0") { ?> - <?php the_author_link(); ?><?php } ?>
						<?php if($gp_settings['meta_cats'] == "0") { ?> - <?php if(get_post_type() == "post") { the_category(', '); } else { echo get_the_term_list('', 'review_categories', '', ', '); } ?><?php } ?>
						<?php if($gp_settings['meta_comments'] == "0" && comments_open()) { ?> - <?php comments_popup_link(__('No Comments', 'gp_lang'), __('1 Comment', 'gp_lang'), __('% Comments', 'gp_lang'), 'comments-link', ''); ?><?php } ?>
					</div>
					
				<?php } ?>
				
				<!-- END POST META -->
				
				
				<!-- BEGIN POST CONTENT -->
				
				<?php if($gp_settings['content_display'] == "Full Content") { ?>
					
					<?php the_content(__('Read On', 'gp_lang')); ?>
					
				<?php } else { ?>
				
					<?php if($gp_settings['excerpt_length'] != "0") { ?><p><?php echo gp_excerpt($gp_settings['excerpt_length']); ?><?php if($gp_settings['read_more'] == "0") { ?> <a href="<?php the_permalink(); ?>" class="read-more" title="<?php the_title_attribute(); ?>"><?php _e('Read On', 'gp_lang'); ?></a><?php } ?></p><?php } ?>
					
				<?php } ?>
				
				<!-- END POST CONTENT -->
				
				
				<!-- BEGIN POST TAGS -->
				
				<?php if($gp_settings['meta_tags'] == "0") { ?>
					<?php the_tags('<div class="post-meta post-tags">'.__('Tags: ', 'gp_lang'), ', ', '</div>'); ?>
				<?php } ?>
		
				<!-- END POST TAGS -->


				<!-- BEGIN RATINGS -->
				
				<?php if(defined('STARRATING_INSTALLED') && get_post_type() == "review" && $gp_settings['rating_type'] != "No Ratings") { ?>
					
					
					<!-- BEGIN SITE RATING -->
					
					<?php if($gp_settings['rating_type'] != "User Rating" && ($gp_settings['gp_gdsr']->review > 0 OR $gp_settings['gp_gdsmr']->review > 0)) { ?>
					
						<div class="review-list-ratings">
							<span><?php _e('Site Rating', 'gp_lang'); ?>:</span>
							<?php if($gp_settings['site_multi_rating_id']) { ?>
								<?php wp_gdsr_multi_review_average($gp_settings['site_multi_rating_id'], 0, true); ?>				
							<?php } else { ?>
								<?php wp_gdsr_render_review(0, 0, '', ''); ?>
							<?php } ?>	
						</div>
					
					<?php } ?>
					
					<!-- END SITE RATING -->
					
					
					<!-- BEGIN USER RATING -->
					
					<?php if($gp_settings['rating_type'] != "Site Rating" && $gp_settings['user_voting'] != "Users cannot vote") { ?>
					
						<div class="review-list-ratings">
							<span><?php _e('User Rating', 'gp_lang'); ?>:</span>
							<?php if($gp_settings['user_multi_rating_id']) { ?>
								<?php wp_gdsr_multi_rating_average($gp_settings['user_multi_rating_id'], 0, 'total', $gp_settings['mur_stars_set'], '', '', true); ?>
							<?php } else { ?>
								<?php wp_gdsr_render_article(0, 1); ?>
							<?php } ?>	
						</div>					
					
					<?php } ?>	
					
					<!-- END USER RATING -->
								
				
				<?php } ?>
				
				<!-- END RATINGS -->
				
				
			</div>
		
		
			<!-- END POST TEXT -->
		
		
		</div>
		
		<!-- END POST -->
		
	
		<div class="clear"></div>
		
		
	<?php } ?>	
	

<?php if($gp_settings['post_display'] != "List") { ?></div><?php } ?>	