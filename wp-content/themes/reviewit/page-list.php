<?php 
/*
Template Name: Page List
*/
get_header(); global $gp_settings; ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		
	<!-- BEGIN CONTENT -->
		
	<div id="content">
		
		
		<!-- BEGIN TITLE -->
									
		<?php if($gp_settings['title'] == "Show") { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>
		
		<!-- END TITLE -->
			
			
		<!-- BEGIN IMAGE -->
		
		<?php if((has_post_thumbnail() OR get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true)) && $gp_settings['show_image'] == "Show") { ?>	
	
			<div class="post-thumbnail<?php if($gp_settings['image_wrap'] == "Disable") { ?> thumbnail-no-wrap<?php } ?>">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true), $gp_settings['image_width'], $gp_settings['image_height'], true); ?>
					<img src="<?php echo $image['url']; ?>" width="<?php echo $gp_settings['image_width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { the_title_attribute(); } ?>" />		
				</a>				
			</div>				
			
			<?php if($gp_settings['image_wrap'] == "Disable") { ?><div class="clear"></div><?php } ?>
							
		<?php } ?>
		
		<!-- END IMAGE -->
		
		
		<!-- BEGIN PAGE LIST -->
								
		<?php $children = wp_list_pages('depth=1&title_li=&child_of='.get_the_ID().'&echo=0'); if($children) { ?>
		
			<ul class="page-list">
				<?php echo $children; ?>
			</ul>
			
		<?php } ?>
		
		<!-- END PAGE LIST -->
		
		
		<!-- BEGIN COMMENTS -->
		
		<?php comments_template(); ?>
	
		<!-- END COMMENTS -->
		
	
	</div>
	
	<!-- END CONTENT -->
	

	<?php get_sidebar(); ?>


<?php endwhile; endif; ?>


<?php get_footer(); ?>