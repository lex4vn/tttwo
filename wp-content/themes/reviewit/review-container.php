<?php global $gp_settings; ?>


<!-- BEGIN REVIEW CONTAINER -->

<div id="review-container"<?php if($gp_settings['review_positioning'] == "Layout 3") { ?> class="layout-3"<?php } ?>>

	
	<!-- BEGIN REVIEW LEFT PANEL -->
	
	<div id="review-panel-left" style="width: <?php echo $gp_settings['review_panel_left_width']; ?>px;">

		
		<!-- BEGIN IMAGE -->
		
		<?php if((has_post_thumbnail() OR get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true)) && $gp_settings['show_image'] == "Show") { ?>
			<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true), $gp_settings['image_width'], $gp_settings['image_height'], true); ?>
			<img src="<?php echo $image['url']; ?>" width="<?php echo $gp_settings['image_width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { the_title_attribute(); } ?>" />					
		<?php } ?>
		
		<!-- END IMAGE-->
			

		<!-- BEGIN MORE IMAGES -->
			
		<?php $args = array('post_type' => 'attachment', 'post_parent' => get_the_ID(), 'numberposts' => -1, 'orderby' => 'menu_order', 'order' => 'ASC', 'post__not_in'	=> array(get_post_thumbnail_id())); $attachments = get_children($args); if($attachments) { $attachment_counter = ''; foreach ($attachments as $attachment) { $attachment_counter++; ?>				
				
			<a href="<?php if(get_post_meta($attachment->ID, '_ghostpool_video_url', true)) { ?>file=<?php echo get_post_meta($attachment->ID, '_ghostpool_video_url', true); ?>&image=<?php echo wp_get_attachment_url($attachment->ID); } else { echo wp_get_attachment_url($attachment->ID); } ?>" id="more-images-link" rel="prettyPhoto[large]"<?php if($attachment_counter > 1) { ?> style="display: none"<?php } ?>><?php if($attachment_counter == 1) { _e('More Images', 'gp_lang'); } else {} ?></a>
			
		 <?php }} ?>
		
		<!-- END MORE IMAGES -->
		
			
		<!-- BEGIN RATINGS -->
			 
		<?php if(defined('STARRATING_INSTALLED')) { ?>
			
			
			<!-- BEGIN SITE RATING -->
			
			<?php if($gp_settings['gp_gdsr']->review > 0 OR $gp_settings['gp_gdsmr']->review > 0) { ?>

				<div class="site-rating">
					<span><?php _e('Site Rating', 'gp_lang'); ?>:</span>
					<?php if($gp_settings['site_multi_rating_id']) { ?>
						<?php wp_gdsr_show_multi_review($gp_settings['site_multi_rating_id'], 0, 0, $gp_settings['msr_stars_set'], $gp_settings['msr_stars_size']); ?>
						<?php wp_gdsr_multi_review_average($gp_settings['site_multi_rating_id'], 0, true); ?>				
					<?php } else { ?>
						<?php wp_gdsr_render_review(0, 0, '', ''); ?>
					<?php } ?>	
				</div>
			
			<?php } ?>
			
			<!-- END SITE RATING -->
			
			
			<!-- BEGIN USER RATING -->
			
			<?php if(($gp_settings['gp_gdsr']->review > 0 OR $gp_settings['gp_gdsmr']->review > 0) && $gp_settings['user_voting'] != "Users cannot vote") { ?><div class="sc-divider"></div><?php } ?>

			<?php if($gp_settings['user_voting'] != "Users cannot vote") { ?>
			
				<!--User Rating-->
				<div class="user-rating">
					<span><?php _e('User Rating', 'gp_lang'); ?>:</span>
					<?php if($gp_settings['user_multi_rating_id']) { ?>					
						<?php if($gp_settings['user_voting'] == "Vote only when posting a comment") { wp_gdsr_render_multi($gp_settings['user_multi_rating_id'], 0, true, 0, $gp_settings['mur_stars_set'], $gp_settings['mur_stars_size']); } else { wp_gdsr_render_multi($gp_settings['user_multi_rating_id'], 0, false, 0, $gp_settings['mur_stars_set'], $gp_settings['mur_stars_size']); } ?>	
					<?php } else { ?>
						<?php if($gp_settings['user_voting'] == "Vote only when posting a comment") { wp_gdsr_render_article(0, true); } else { wp_gdsr_render_article(0, false); } ?>
					<?php } ?>	
				</div>					
			
			<?php } ?>	
			
			<!-- END USER RATING -->
						
		
		<?php } ?>
		
		<!-- END RATINGS -->
		
		
	</div>
	
	<!-- END REVIEW LEFT PANEL -->


	<!-- BEGIN REVIEW RIGHT PANEL -->
	
	<div id="review-panel-right" style="width: <?php if($gp_settings['review_positioning'] == "Layout 3") { echo $gp_settings['content_width'] - 265 - $gp_settings['review_panel_left_width']; } else { echo $gp_settings['content_width'] - 64 - $gp_settings['review_panel_left_width']; } ?>px;">
	
		
		<!-- BEGIN TITLE -->
		
		<?php if($gp_settings['title']) { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>
		
		<!-- END TITLE -->
		
		
		<!-- BEGIN REVIEW TAGS -->
		
		<ul id="review-tags-list">
			<?php if($theme_review_tag_1 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_1_tax'], '<li><strong>'.$theme_review_tag_1_singular_name.':</strong> ', ', ', '</li>')); } ?>
			<?php if($theme_review_tag_2 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_2_tax'], '<li><strong>'.$theme_review_tag_2_singular_name.':</strong> ', ', ', '</li>')); } ?>
			<?php if($theme_review_tag_3 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_3_tax'], '<li><strong>'.$theme_review_tag_3_singular_name.':</strong> ', ', ', '</li>')); } ?>
			<?php if($theme_review_tag_4 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_4_tax'], '<li><strong>'.$theme_review_tag_4_singular_name.':</strong> ', ', ', '</li>')); } ?>
			<?php if($theme_review_tag_5 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_5_tax'], '<li><strong>'.$theme_review_tag_5_singular_name.':</strong> ', ', ', '</li>')); } ?>
			<?php if($theme_review_tag_6 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_6_tax'], '<li><strong>'.$theme_review_tag_6_singular_name.':</strong> ', ', ', '</li>')); } ?>
			<?php if($theme_review_tag_7 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_7_tax'], '<li><strong>'.$theme_review_tag_7_singular_name.':</strong> ', ', ', '</li>')); } ?>
			<?php if($theme_review_tag_8 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_8_tax'], '<li><strong>'.$theme_review_tag_8_singular_name.':</strong> ', ', ', '</li>')); } ?>	
			<?php if($theme_review_tag_9 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_9_tax'], '<li><strong>'.$theme_review_tag_9_singular_name.':</strong> ', ', ', '</li>')); } ?>	
			<?php if($theme_review_tag_10 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_10_tax'], '<li><strong>'.$theme_review_tag_10_singular_name.':</strong> ', ', ', '</li>')); } ?>		
			<?php if($theme_review_tag_11 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_11_tax'], '<li><strong>'.$theme_review_tag_11_singular_name.':</strong> ', ', ', '</li>')); } ?>			
			<?php if($theme_review_tag_12 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_12_tax'], '<li><strong>'.$theme_review_tag_12_singular_name.':</strong> ', ', ', '</li>')); } ?>			
			<?php if($theme_review_tag_13 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_13_tax'], '<li><strong>'.$theme_review_tag_13_singular_name.':</strong> ', ', ', '</li>')); } ?>		
			<?php if($theme_review_tag_14 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_14_tax'], '<li><strong>'.$theme_review_tag_14_singular_name.':</strong> ', ', ', '</li>')); } ?>		
			<?php if($theme_review_tag_15 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_15_tax'], '<li><strong>'.$theme_review_tag_15_singular_name.':</strong> ', ', ', '</li>')); } ?>	
			<?php if($theme_review_tag_16 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_16_tax'], '<li><strong>'.$theme_review_tag_16_singular_name.':</strong> ', ', ', '</li>')); } ?>		
			<?php if($theme_review_tag_17 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_17_tax'], '<li><strong>'.$theme_review_tag_17_singular_name.':</strong> ', ', ', '</li>')); } ?>	
			<?php if($theme_review_tag_18 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_18_tax'], '<li><strong>'.$theme_review_tag_18_singular_name.':</strong> ', ', ', '</li>')); } ?>		
			<?php if($theme_review_tag_19 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_19_tax'], '<li><strong>'.$theme_review_tag_19_singular_name.':</strong> ', ', ', '</li>')); } ?>		
			<?php if($theme_review_tag_20 == "0") { echo(get_the_term_list(get_the_ID(), $gp_settings['review_tag_20_tax'], '<li><strong>'.$theme_review_tag_20_singular_name.':</strong> ', ', ', '</li>')); } ?>																									
		</ul>
		
		<!-- END REVIEW TAGS -->
		
		
		<!-- BEGIN BELOW REVIEW TAGS -->
		
		<?php if($gp_settings['review_text_position'] == "Below Review Tags") { ?>
			
	
			<!-- BEGIN POST CONTENT -->
			
			<div id="post-content">
			
				<?php the_content(__('Read More &raquo;', 'gp_lang')); ?>
				
			</div>
			
			<!-- END POST CONTENT -->
			
			
			<!-- BEGIN POST NAV -->
			
			<?php wp_link_pages('before=<div class="clear"></div><div class="wp-pagenavi post-navi">&pagelink=<span>%</span>&after=</div>'); ?>
			
			<!-- END POST NAV -->
			
			
			<!-- BEGIN POST META -->
			
			<?php if($gp_settings['meta_date'] == "0" OR $gp_settings['meta_author'] == "0" OR $gp_settings['meta_cats'] == "0" OR $gp_settings['meta_comments'] == "0") { ?>
			
				<div class="post-meta">
					<?php if($gp_settings['meta_date'] == "0") { ?><?php the_time(get_option('date_format')); ?><?php } ?>
					<?php if($gp_settings['meta_author'] == "0") { ?> - <?php the_author_link(); ?><?php } ?>
					<?php if($gp_settings['meta_cats'] == "0") { ?> - <?php echo get_the_term_list('', 'review_categories', '', ', '); ?><?php } ?>
					<?php if($gp_settings['meta_comments'] == "0" && comments_open()) { ?> - <?php comments_popup_link(__('No Comments', 'gp_lang'), __('1 Comment', 'gp_lang'), __('% Comments', 'gp_lang'), 'comments-link', ''); ?><?php } ?>
				</div>

			<?php } ?>			
			
			<!-- END POST META -->
			
			
			<!-- BEGIN POST TAGS -->
			
			<?php if($gp_settings['meta_tags'] == "0") { ?>
				<?php the_tags('<div class="post-meta post-tags">'.__('Tags: ', 'gp_lang'), ', ', '</div>'); ?>
			<?php } ?>
			
			<!-- END POST TAGS -->
			
		
		<?php } ?>
		
		<!-- END BELOW REVIEW TAGS -->
		
		
	</div>
	
	<!-- END REVIEW PANEL RIGHT -->
	
	
</div>

<!-- END REVIEW CONTAINER -->
