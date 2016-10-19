<?php
/*
Template Name: Register
*/
get_header(); global $gp_settings, $user_ID, $user_identity, $user_level; ?>


<!-- BEGIN CONTENT -->

<div id="content">

	
	<!-- BEGIN TITLE -->
	
	<?php if($gp_settings['title'] == "Show") { ?><h1 class="page-title"><?php the_title(); ?></h1><?php } ?>	
	
	<!-- END TITLE -->
	
	
	<!-- BEGIN IMAGE -->
	
	<?php if((has_post_thumbnail() OR get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true)) && $show_image == "Show") { ?>	

		<div class="post-thumbnail<?php if($gp_settings['image_wrap'] == "Disable") { ?> thumbnail-no-wrap<?php } ?>">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<?php $image = vt_resize(get_post_thumbnail_id(), get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true), $gp_settings['image_width'], $gp_settings['image_height'], true); ?>
				<img src="<?php echo $image['url']; ?>" width="<?php echo $gp_settings['image_width']; ?>" height="<?php echo $image['height']; ?>" alt="<?php if(get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true)) { echo get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); } else { the_title_attribute(); } ?>" />		
			</a>				
		</div>				
		
		<?php if($gp_settings['image_wrap'] == "Disable") { ?><div class="clear"></div><?php } ?>
						
	<?php } ?>
	
	<!-- END IMAGES -->
	
	
	<!-- BEGIN POST CONTENT -->
	
	<div id="post-content">

		<?php the_content(__('Read On', 'gp_lang')); ?>

	</div>
	
	<!-- END POST CONTENT -->
	
	
	<?php if($user_ID) { ?>
	
	
		<h2><?php _e('You are already registered.', 'gp_lang'); ?></h2>
	
	
	<?php } else { ?>
		
		
		<!-- BEGIN REGISTRATION FORM -->
		
		<form action="<?php echo site_url('wp-login.php?action=register', 'login_post'); ?>" method="post">
			
			<p><label for="log"><?php _e('Username', 'gp_lang'); ?></label>
			<br/><input type="text" name="user_login" id="user_login" class="input" value="<?php echo esc_attr(stripslashes($user_login)); ?>" size="22" /></p>
			
			<p><label for="pwd"><?php _e('Email', 'gp_lang'); ?></label><br/>
			<input type="text" name="user_email" id="user_email" class="input" value="<?php echo esc_attr(stripslashes($user_email)); ?>" size="22" /></p>
			
			<?php do_action('register_form'); ?>
			<p><?php _e('Your password will be emailed to you.', 'gp_lang'); ?></p>
			<p><input type="submit" name="wp-submit" id="wp-submit" value="<?php _e('Register', 'gp_lang'); ?>" tabindex="100" /></p>
			
		</form>
		
		<!-- END REGISTRATION FORM -->
	
	
	<?php } ?>


</div>

<!-- END CONTENT -->
	
	
<?php get_sidebar(); ?>


<?php get_footer(); ?>