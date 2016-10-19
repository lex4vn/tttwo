<?php 
/*
Template Name: Blog
*/

get_header();

global $gp_settings, $post;

if (have_posts()) : while (have_posts()) : the_post(); ?>
	
	<!-- BEGIN CONTENT -->
	
	<div id="content">
	
		<!-- BEGIN TITLE -->
		
		<?php if($gp_settings['title'] == "Show") { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>
		
		<!-- END TITLE -->
		
		
		<!-- BEGIN POST CONTENT -->
		
		<?php if($post->post_content) { ?>
		
			<div id="post-content">
			
				<?php the_content(__('Read On', 'gp_lang')); ?>
				
			</div>

			<div class="sc-divider"></div>

		<?php } ?>
		
		<!-- END POST CONTENT -->
		
		
		<!-- BEGIN POST LOOP -->
		
		<?php require('loop.php'); ?>
		
		<!-- END POST LOOP -->
		
		
	</div>
	
	<!-- END CONTENT -->
	
	
	<?php get_sidebar(); ?>


<?php endwhile; endif; wp_reset_query(); ?>


<?php get_footer(); ?>