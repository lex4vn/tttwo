<!DOCTYPE html>
<!--[if !IE]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<!--[if IE 9]>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class="no-js ie9">
<![endif]-->
<!--[if IE 8]>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?> class="no-js ie8">
<![endif]-->
<head>
<meta charset=<?php bloginfo('charset'); ?> />
<title><?php bloginfo('name'); ?> | <?php if ( is_home() OR is_front_page() ) { bloginfo( 'description' ); } else { wp_title( '' ); } ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php require(gp_inc . 'options.php'); ?>
<?php require(gp_inc . 'page-settings.php'); ?>
<?php wp_head(); ?>
</head>					

<body <?php body_class($gp_settings['layout'].' '.$gp_settings['skin']); ?>>


<!-- BEGIN PAGE WRAPPER -->

<div id="page-wrapper">


	<!-- BEING PROFILE LINKS -->
	
	<?php if($theme_profile_links == "0") { global $bp, $current_user; get_currentuserinfo(); ?>

		<div id="login">

			<?php if(is_user_logged_in()) { ?>	
								
				<?php echo $current_user->display_name; ?> <span class="login-divider">|</span>
			
				<a href="<?php if(function_exists('bp_is_active')) { echo $bp->loggedin_user->domain; } else { echo get_author_posts_url($current_user->ID); } ?>"><?php _e('Profile', 'gp_lang'); ?></a> <span class="login-divider">|</span>
				
				<a href="<?php echo wp_logout_url(esc_url($_SERVER['REQUEST_URI'])); ?>" class="logout-link"><?php _e('Logout', 'gp_lang'); ?></a>
		
			<?php } else { ?>
				
				<a href="<?php if($theme_login_url) { echo $theme_login_url; } else { echo wp_login_url(); } ?>"><?php _e('Login', 'gp_lang'); ?></a> 
				
				<?php if((function_exists('bp_is_active') && bp_get_signup_allowed()) OR $theme_register_url) { ?>
				
					<span class="login-divider">|</span>
					
					<a href="<?php if($theme_register_url) { echo $theme_register_url; } else { if(function_exists('bp_is_active')) { echo bp_get_signup_page(false); }} ?>"><?php _e('Register', 'gp_lang'); ?></a>
				
				<?php } ?>
				
			<?php } ?>
			
		</div>	
	
		<div class="clear"></div>

	<?php } ?>
	
	<!-- END PROFILE LINKS -->
	
	
	<!-- BEGIN HEADER TOP -->
	
	<div id="header-top">

		
		<!-- BEGIN LOGO -->
		
		<<?php if($gp_settings['title'] == "Show") { ?>div<?php } else { ?>h1<?php } ?> id="logo" style="<?php if($theme_logo_top) { ?> margin-top: <?php echo $theme_logo_top; ?>px;<?php } ?><?php if($theme_logo_left) { ?> margin-left: <?php echo $theme_logo_left; ?>px;<?php } ?><?php if($theme_logo_bottom) { ?> margin-bottom: <?php echo $theme_logo_bottom; ?>px;<?php } ?>">
		
			<span class="logo-details"><?php bloginfo('name'); ?> | <?php is_home() || is_front_page() ? bloginfo('description') : wp_title(''); ?></span>
			
			<?php if($theme_logo) { ?><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo($theme_logo); ?>" alt="<?php bloginfo('name'); ?>"></a><?php } else { ?><a href="<?php echo home_url(); ?>" title="<?php bloginfo('name'); ?>"><span class="default-logo"></span></a><?php } ?>
			
		</<?php if($gp_settings['title'] == "Show") { ?>div<?php } else { ?>h1<?php } ?>>
		
		<!-- END LOGO -->
		
		
		<!-- BEGIN NAV -->
		
		<div id="nav">
			<span id="nav-left"></span>
			<?php wp_nav_menu('sort_column=menu_order&container=ul&theme_location=header-nav&fallback_cb=null'); ?>
		</div>
		
		<!-- END NAV -->
		
		
		<!-- BEGIN SEARCH FORM -->
		
		<?php get_search_form(); ?>
	
		<!-- END SEARCH FORM -->


	</div>	
	
	<!-- END HEADER TOP -->
	

	<!-- BEGIN SLIDER -->
	
	<?php if(function_exists('bp_get_options_nav') && !bp_is_blog_page()) {} else { if((is_home() && $theme_slider_display == "Homepage") OR $theme_slider_display == "All Pages" OR is_page(explode(',',$theme_slider_pages)) OR is_single(explode(',',$theme_slider_posts))) { require('slider.php'); } } ?>
	
	<!-- END SLIDER -->
	
	
	<!-- BEGIN HEADER BOTTOM -->
	
	<div id="header-bottom">
	

		<!-- BEGIN COMPACT/EXTENDED BUTTONS -->
	
		<div id="display-options">
			<?php if((is_home() && $theme_homepage_buttons == "0") OR (is_page_template('blog.php') && $theme_blog_buttons == "0") OR ((is_post_type_archive('review') OR is_tax()) && $theme_review_cat_buttons == "0") OR ((is_archive() OR is_search()) && $theme_cat_buttons == "0")) { ?>
				<a id="display-compact"></a><a id="display-extended"></a>
			<?php } ?>&nbsp;
		</div>
		
		<!-- END COMPACT/EXTENDED BUTTONS -->
		
		
		<!-- BEGIN BREADCRUMBS -->
	
		<?php if(!is_home()) { if($theme_breadcrumbs == "1") {} else { ?><div id="breadcrumbs"><?php echo gp_breadcrumbs(); ?></div><?php }} ?>
		
		<!-- END BREADCRUMBS -->
		
		
		<!-- BEGIN SOCIAL ICONS -->
		
		<div id="social-icons">
			<?php if($theme_email) { ?><a href="mailto:<?php echo($theme_email); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social_email.png" alt="<?php _e('Email', 'gp_lang'); ?>" /></a><?php } ?>	
			<?php if($theme_rss_button == "0") { ?>
			<a href="<?php if($theme_rss) { ?><?php echo($theme_rss); ?><?php } else { ?><?php bloginfo('rss2_url'); ?><?php } ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social_rss.png" alt="<?php _e('RSS Feed', 'gp_lang'); ?>" /></a><?php } ?>
			<?php if($theme_twitter) { ?><a href="<?php echo($theme_twitter); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social_twitter.png" alt="<?php _e('Twitter', 'gp_lang'); ?>" /></a><?php } ?>
			<?php if($theme_myspace) { ?><a href="<?php echo($theme_myspace); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social_myspace.png" alt="<?php _e('MySpace', 'gp_lang'); ?>" /></a><?php } ?>
			<?php if($theme_facebook) { ?><a href="<?php echo($theme_facebook); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social_facebook.png" alt="<?php _e('Facebook', 'gp_lang'); ?>" /></a><?php } ?>
			<?php if($theme_digg) { ?><a href="<?php echo($theme_digg); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social_digg.png" alt="<?php _e('Digg', 'gp_lang'); ?>" /></a><?php } ?>
			<?php if($theme_flickr) { ?><a href="<?php echo($theme_flickr); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social_flickr.png" alt="<?php _e('Flickr', 'gp_lang'); ?>" /></a><?php } ?>
			<?php if($theme_delicious) { ?><a href="<?php echo($theme_delicious); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social_delicious.png" alt="<?php _e('Delicious', 'gp_lang'); ?>" /></a><?php } ?>
			<?php if($theme_youtube) { ?><a href="<?php echo($theme_youtube); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social_youtube.png" alt="<?php _e('YouTube', 'gp_lang'); ?>" /></a><?php } ?>	
			<?php if($theme_googleplus) { ?><a href="<?php echo($theme_googleplus); ?>" rel="nofollow" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/lib/images/social_googleplus.png" alt="<?php _e('Google+', 'gp_lang'); ?>" /></a><?php } ?>		
			<?php echo stripslashes($theme_additional_social_icons); ?>
		</div>
		
		<!-- END SOCIAL ICONS -->
		
	
	</div>
	
	<!-- END HEADER BOTTOM -->
	
	
	<!-- BEGIN CONTENT WRAPPER -->
	
	<div id="content-wrapper">