<?php get_header(); global $gp_settings; $col_counter = ''; ?>


<?php if($gp_settings['review_positioning'] == "Layout 1") { ?><div id="content"><?php } ?>

	
	<!-- BEGIN REVIEW CONTAINER -->
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); $parent_post_id = get_the_ID(); ?>
	
		<?php require_once('review-container.php'); ?>
		
	<?php endwhile; endif; ?>
	
	<!-- END REVIEW CONTAINER -->
	
	
<?php if($gp_settings['review_positioning'] == "Layout 2" OR $gp_settings['review_positioning'] == "Layout 3") { ?><div id="content"<?php if($gp_settings['review_positioning'] == "Layout 3") { ?> class="layout-3"<?php } ?>><?php } ?>


	<?php if(get_post_meta(get_the_ID(), 'ghostpool_tab_title_1', true)) { ?><div class="sc-tabs"><?php } ?>
		
		
		<!-- BEGIN REVIEW LINKS -->
		
		<?php if(get_post_meta(get_the_ID(), 'ghostpool_tab_title_1', true)) { ?>
			<div id="review-links">
				<ul>
			
					<li><a href="#reviewtab<?php echo preg_replace('/[^a-zA-Z0-9]/', '', get_post_meta(get_the_ID(), 'ghostpool_tab_title_0', true)); ?>"><?php echo get_post_meta(get_the_ID(), 'ghostpool_tab_title_0', true); ?></a></li>		
			
					<?php for($i = 1; $i < 11; $i++) { if(get_post_meta(get_the_ID(), 'ghostpool_tab_title_'.$i, true)) { // Begins Links ?>
						<li<?php if(preg_match("/http:/", get_post_meta(get_the_ID(), 'ghostpool_tab_id_'.$i, true))) { ?> class="no-tab-link"<?php } ?>><a href="<?php if(preg_match("/http:/", get_post_meta(get_the_ID(), 'ghostpool_tab_id_'.$i, true))) { echo(get_post_meta(get_the_ID(), 'ghostpool_tab_id_'.$i, true)); } else { ?>#reviewtab<?php echo preg_replace('/[^a-zA-Z0-9]/', '', get_post_meta(get_the_ID(), 'ghostpool_tab_title_'.$i, true)); } ?>"><?php echo(get_post_meta(get_the_ID(), 'ghostpool_tab_title_'.$i, true)); ?></a></li>		
					<?php }} ?>	
			
				</ul>							
			</div>
		<?php } ?>
		
		<!-- END REVIEW LINKS-->
		
	
		<!-- BEGIN REVIEW PANELS -->
		
		<div id="review-panels">
		
			
			<!-- BEGIN REVIEW PANEL -->
			
			<div class="review-panel" id="reviewtab<?php echo preg_replace('/[^a-zA-Z0-9]/', '', get_post_meta(get_the_ID(), 'ghostpool_tab_title_0', true)); ?>">
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<?php if($gp_settings['review_text_position'] == "Within Review Tabs") { ?>
					
						
						<!-- BEGIN POST CONTENT -->
						
						<div id="post-content">
					
							<?php the_content(__('Read On', 'gp_lang')); ?>
					
						</div>
						
						<!-- END POST CONTENT -->	
							
							
						<!-- BEGIN POST NAV -->	
											
						<?php wp_link_pages('before=<div class="clear"></div><div class="wp-pagenavi post-navi">&pagelink=<span>%</span>&after=</div>'); ?>
						
						<!-- END POST NAV -->
						
						
						<!-- BEGIN POST META -->
						
						<?php if($gp_settings['meta_date'] == "0" OR $gp_settings['meta_author'] == "0" OR $gp_settings['meta_cats'] == "0" OR $gp_settings['meta_comments'] == "0") { ?>
						
							<div class="post-meta">
								<?php if($gp_settings['meta_date'] == "0") { ?><?php the_time(get_option('date_format')); ?><?php } ?>
								<?php if($gp_settings['meta_author'] == "0") { ?> - <?php the_author_posts_link(); ?><?php } ?>
								<?php if($gp_settings['meta_cats'] == "0") { ?> - <?php echo get_the_term_list('', 'review_categories', '', ', '); ?><?php } ?>
								<?php if($gp_settings['meta_comments'] == "0" && comments_open()) { ?> - <?php comments_popup_link(__('No Comments', 'gp_lang'), __('1 Comment', 'gp_lang'), __('% Comments', 'gp_lang'), 'comments-link', ''); ?><?php } ?>
							</div>
							
							<?php if($gp_settings['meta_tags'] == "0") { ?>
								<?php the_tags('<div class="post-meta post-tags">'.__('Tags: ', 'gp_lang'), ', ', '</div>'); ?>
							<?php } ?>
											
						<?php } ?>
						
						<!-- END POST META -->
										
										
					<?php } ?>
					
					
					<!-- BEGIN COMMENTS -->
						
					<?php comments_template(); ?>
				
					<!-- BEGIN POST CONTENT -->
					
					
				<?php endwhile; endif; ?>
			
			
			</div>
			
			<!-- BEGIN REVIEW PANEL -->
		
		
			<?php for($i = 1; $i < 11; $i++) { /* Begin Loop Tabs */ ?>
	
				<?php if(get_post_meta(get_the_ID(), 'ghostpool_tab_title_'.$i, true)) { /* Begins Tabs */ ?>
				
					<?php if(preg_match("/http:/", get_post_meta(get_the_ID(), 'ghostpool_tab_id_'.$i, true))) {} else { ?>
						
						
						<!-- BEGIN REVIEW PANEL -->	
						
						<div class="review-panel" id="reviewtab<?php echo preg_replace('/[^a-zA-Z0-9]/', '', get_post_meta(get_the_ID(), 'ghostpool_tab_title_'.$i, true)); ?>">
						
							<?php 
							
							if(get_post_meta(get_the_ID(), 'ghostpool_tab_type_'.$i, true) == "Page") { 
							
								$tab_query = new WP_Query('post_type=any&name='.get_post_meta(get_the_ID(), 'ghostpool_tab_id_'.$i, true));
								
							} else {
							
								$tab_query = new WP_Query('post_type=any&posts_per_page=-1&tag='.get_post_meta(get_the_ID(), 'ghostpool_tab_id_'.$i, true));
							
							}
							
							if ($tab_query->have_posts()) : while ($tab_query->have_posts()) : $tab_query->the_post(); ?>
							
							<?php if(get_post_meta($parent_post_id, 'ghostpool_tab_type_'.$i, true) == "Page") { /* Page */ 
							
								if(get_post_meta(get_the_ID(), 'ghostpool_title', true) && get_post_meta(get_the_ID(), 'ghostpool_title', true) != "Default") {
									$gp_settings['title'] = get_post_meta(get_the_ID(), 'ghostpool_title', true);
								} else {
									$gp_settings['title'] = $theme_post_title;
								}
		
								?>
								
								
								<!-- BEGIN TITLE -->	
				
								<?php if($gp_settings['title'] == "Show") { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>
							
								<!-- END POST TITLE -->	
								
							
								<!-- BEGIN POST CONTENT -->	
									
								<div id="post-content">
							
									<?php the_content(__('Read On', 'gp_lang')); ?>
							
								</div>
								
								<!-- END POST CONTENT -->	
								
														
							<?php } elseif(get_post_meta($parent_post_id, 'ghostpool_tab_type_'.$i, true) == "Media") { /* Media */ ?>
				
								<?php $args = array('post_type' => 'attachment', 'post_mime_type' => 'image', 'numberposts' => -1, 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC', 'post_parent' => get_the_ID()); $attachments = get_children($args); if ($attachments) { foreach ($attachments as $attachment) {
								
									// Video Type
									$flv = strpos(get_post_meta($attachment->ID, '_'.$dirname.'_lightbox_url', true),".flv");
									$mp4 = strpos(get_post_meta($attachment->ID, '_'.$dirname.'_lightbox_url', true),".mp4");
									$mp3 = strpos(get_post_meta($attachment->ID, '_'.$dirname.'_lightbox_url', true),".mp3");
									$m4v = strpos(get_post_meta($attachment->ID, '_'.$dirname.'_lightbox_url', true),".m4v");
									$yt = strpos(get_post_meta($attachment->ID, '_'.$dirname.'_lightbox_url', true),"youtu");
									
									?>
								
									<a href="<?php if($flv == true OR $mp4 == true OR $mp3 == true OR $m4v == true OR $yt == true) { ?>file=<?php echo get_post_meta($attachment->ID, '_'.$dirname.'_lightbox_url', true); ?><?php } elseif(get_post_meta($attachment->ID, '_'.$dirname.'_lightbox_url', true)) { echo get_post_meta($attachment->ID, '_'.$dirname.'_lightbox_url', true); } else { echo wp_get_attachment_url($attachment->ID); } ?>" rel="prettyPhoto[gallery<?php echo($i); ?>]" title="<?php echo $attachment->post_excerpt ?>">	
										<?php $image = vt_resize($attachment->ID, '', 120, 120, true); ?>
										<img src="<?php echo $image['url']; ?>" width="<?php echo $gp_settings['image_width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php echo $attachment->post_title ?>" class="review-image" />				
									</a>
							
								<?php }} ?><div class="clear"></div>
							
							<?php } else { /* List of articles */ ?>
				
				
								<?php require('review-tabs-loop.php'); ?>
							
							
							<?php } ?>
						
						
							<?php endwhile; endif; wp_reset_query(); ?>
					
						</div>
						
						<!-- END REVIEW PANEL -->	
						
			
					<?php } ?>
					
			
				<?php } /* End Tabs */ ?>
				
		
			<?php } /* End Loop Tabs */ ?>
			
			
		</div>
		
		<!-- END REVIEW PANELS -->	
		
	
	<?php if(get_post_meta(get_the_ID(), 'ghostpool_tab_title_1', true)) { ?></div><?php } ?>


</div>

<!-- END POST CONTENT -->	


<?php get_sidebar(); ?>


<?php get_footer(); ?>