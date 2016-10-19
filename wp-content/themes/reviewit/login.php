<?php
/*
Template Name: Login
*/
get_header(); global $gp_settings, $user_ID, $user_identity, $user_level; 

if(isset($_SERVER['REQUEST_URI'])) { $referrer = $_SERVER['REQUEST_URI']; }

?>


<!-- BEGIN CONTENT -->

<div id="content">
	
	
	<!-- BEGIN TITLE -->
	
	<?php if($gp_settings['title'] == "Show") { ?><h1 class="page-title"><?php _e('Login', 'gp_lang'); ?></h1><?php } ?>
	
	<!-- END TITLE -->
	
	
	<!-- BEGIN IMAGE -->
	
	<?php if((has_post_thumbnail() OR get_post_meta(get_the_ID(), 'ghostpool_thumbnail', true)) && $show_image == "Show") { ?>	
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


	<?php if($user_ID) { ?>
	
	
		<h2><?php _e('You are already logged in.', 'gp_lang'); ?></h2>
	
	
	<?php } else { ?>
	
	
		<!-- BEGIN LOGIN FORM -->

		<form action="<?php echo site_url('wp-login.php', 'login_post'); ?>" method="post" id="loginform">
			
			<p class="login-username"><label for="log"><?php _e('Username', 'gp_lang'); ?></label>
			<input type="text" name="log" id="log" value="<?php echo esc_html(stripslashes($user_login), 1) ?>" size="22" /></p>
			
			<p class="login-password"><label for="pwd"><?php _e('Password', 'gp_lang'); ?></label>
			<input type="password" name="pwd" id="pwd" size="22" /></p>
			
			 <p class="login-remember"><label for="rememberme"><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> <?php _e('Remember Me', 'gp_lang'); ?></label></p>
			
			<p class="login-submit"><input type="submit" name="submit" value="<?php _e('Login', 'gp_lang'); ?>" class="button" /></p>
			
			<input type="hidden" name="redirect_to" value="<?php if(preg_match("/key=/", $referrer)) { echo home_url(); } else { echo $referrer; } ?>"/>
			
		</form>
		
		<!-- END LOGIN FORM -->
		
		
		<!-- BEGIN LOGIN LINKS -->
					
		<?php if((function_exists('bp_is_active') && bp_get_signup_allowed()) OR $theme_register_url) { ?><a href="<?php if($theme_register_url) { echo $theme_register_url; } else { echo bp_get_signup_page(false); } ?>"><?php _e('Register', 'gp_lang'); ?></a> <span class="login-divider">|</span> <?php } ?><a href="<?php echo site_url('wp-login.php?action=lostpassword', 'login_post'); ?>"><?php _e('Lost Password', 'gp_lang'); ?></a>
		
		<!-- END LOGIN LINKS -->
		
	
	<?php } ?>


</div>

<!-- END CONTENT -->
	
	
<?php get_sidebar(); ?>


<?php get_footer(); ?>