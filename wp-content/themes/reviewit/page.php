<?php get_header(); global $gp_settings; ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
	
	<!-- BEGIN POST META -->
		
	<div id="content">
	

		<!-- BEGIN TITLE -->

		<?php if($gp_settings['title'] == "Show") { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>
		
		<!-- END TITLE -->
		
		
		<!-- BEGIN POST META -->
		
		<?php if ( ( isset( $gp_settings['meta_date'] ) && $gp_settings['meta_date'] == "0" ) OR ( isset( $gp_settings['meta_author'] ) && $gp_settings['meta_author'] == "0" ) OR ( isset( $gp_settings['meta_comments'] ) && $gp_settings['meta_comments'] == "0" ) ) { ?>
		
			<div class="post-meta">
				<?php if ( isset( $gp_settings['meta_date'] ) && $gp_settings['meta_date'] == "0" ) { ?><?php the_time(get_option('date_format')); ?><?php } ?>
				<?php if ( isset( $gp_settings['meta_author'] ) && $gp_settings['meta_author'] == "0" ) { ?> - <?php the_author_posts_link(); ?><?php } ?>
				<?php if ( ( isset( $gp_settings['meta_comments'] ) && $gp_settings['meta_comments'] == "0" ) && comments_open() ) { ?> - <?php comments_popup_link(__('No Comments', 'gp_lang'), __('1 Comment', 'gp_lang'), __('% Comments', 'gp_lang'), 'comments-link', ''); ?><?php } ?>
			</div>
			
		<?php } ?>
		
		<!-- END POST META -->
						
		
		<!-- BEGIN IMAGE -->
		
		<?php if((has_post_thumbnail() OR get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true)) && $gp_settings['show_image'] == "Show") { ?>
			<div class="post-thumbnail<?php if($gp_settings['image_wrap'] == "Disable") { ?> thumbnail-no-wrap<?php } ?>">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true), $gp_settings['image_width'], $gp_settings['image_height'], true); ?>
					<img src="<?php echo $image['url']; ?>" width="<?php echo $gp_settings['image_width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { the_title_attribute(); } ?>" />		
				</a>				
			</div><?php if($gp_settings['image_wrap'] == "Disable") { ?><div class="clear"></div><?php } ?>			
		<?php } ?>
		
		<!-- END IMAGE -->
		

		<!-- BEGIN POST CONTENT -->
		
		<div id="post-content">
		
			<?php the_content(__('Read On', 'gp_lang')); ?>
			
		</div>
		
		<!-- END POST CONTENT -->
		
		
		<!-- BEGIN POST NAV -->
		
		<?php wp_link_pages('before=<div class="clear"></div><div class="wp-pagenavi post-navi">&pagelink=<span>%</span>&after=</div>'); ?>		
		
		<!-- END POST NAV -->
		
		
		<!-- END CONTENT -->
		
		
		<!-- BEGIN COMMENTS -->
		
		<?php comments_template(); ?>
	
		<!-- END COMMENTS -->

	
	</div>
	
	<!-- END CONTENT -->
	
	
	<?php get_sidebar(); ?>


<?php endwhile; endif; ?>

	
<?php get_footer(); ?>