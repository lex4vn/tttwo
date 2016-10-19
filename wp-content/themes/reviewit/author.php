<?php get_header(); global $current_user; get_currentuserinfo(); 

if(isset($_GET['author_name'])) {
	$curauth = get_userdatabylogin($author_name);
	get_userdatabylogin(get_the_author_login());
	(get_the_author_login());
} else {
	$curauth = get_userdata(intval($author));
}

?>


<!-- BEGIN CONTENT -->

<div id="content">


	<!-- BEGIN TITLE -->

	<h1 class="page-title"><?php echo $curauth->display_name; ?><?php _e('\'s', 'gp_lang'); ?> <?php _e('Profile', 'gp_lang'); ?></h1>

	<!-- END TITLE -->	
	

	<!-- BEGIN PROFILE AVATAR -->

	<div class="profile-avatar">
		<?php echo get_avatar($curauth->ID, '60', $default=get_template_directory_uri().'/lib/images/gravatar.gif'); ?>
	</div>
	
	<!-- END PROFILE AVATAR -->
	
	
	<!-- BEGIN PROFILE OPTIONS -->
	
	<div class="profile-options">
	
		<?php if($curauth->ID == $user_ID) { ?>
		<p><a href="<?php echo site_url(); ?>/wp-admin/"><?php _e('Dashboard', 'gp_lang'); ?></a> <span class="login-divider">|</span>
		<?php if(current_user_can('edit_posts')) { ?><a href="<?php echo site_url(); ?>/wp-admin/post-new.php"><?php echo _e('Write An Article', 'gp_lang'); ?></a> <span class="login-divider">|</span><?php } ?>
		<a href="<?php echo site_url(); ?>/wp-admin/profile.php"><?php _e('Profile', 'gp_lang'); ?></a></p>
		<?php } ?>
		
		<ul><li><strong><?php _e('Member Since', 'gp_lang'); ?>:</strong> <?php echo date_i18n(get_option('date_format'), strtotime($curauth->user_registered)); ?></li>
		<?php if($curauth->user_url != "" && $curauth->user_url != "http://") { ?><li><strong><?php _e('Website', 'gp_lang'); ?>:</strong> <a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></li><?php } ?>
		<?php if($curauth->user_description) { ?><li><strong><?php _e('Bio', 'gp_lang'); ?>:</strong> <?php echo $curauth->user_description; ?></a></li><?php } ?></ul>
		
	</div>
	
	<!-- END PROFILE OPTIONS -->
	
	
	<div class="clear"></div>

	
	<!-- BEGIN RECENT POSTS -->
	
	<?php query_posts('post_type=any&author='.$curauth->ID.'&posts_per_page=10'); if (have_posts()) : ?>
			
		<div class="profile-list">
		
			<h3><?php _e('Recent Posts', 'gp_lang'); ?></h3>
			
			<?php while (have_posts()) : the_post(); ?>
			
				<div class="profile-row">
					<div class="left"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></div>
					<div class="right"><?php _e('Posted on', 'gp_lang'); ?> <?php the_time(get_option('date_format')); ?></div>
				</div>

			<?php endwhile; ?>	
			
		</div>
	
		<div class="clear"></div>
		
	<?php endif; ?>
	
	<!-- END RECENT POSTS -->
	
	
	<!-- BEGIN RECENT COMMENTS -->
	
	<?php
	$thisauthor = get_userdata(intval($author));
	$querystr = "SELECT comment_ID, comment_post_ID, post_title, comment_content
	FROM $wpdb->comments, $wpdb->posts
	WHERE user_id = $thisauthor->ID
	AND comment_post_id = ID
	AND comment_approved = 1
	ORDER BY comment_ID DESC
	LIMIT 10";
	$comments_array = $wpdb->get_results($querystr, OBJECT); if ($comments_array): ?>
	
		<div class="profile-list">
	
			<h3><?php _e('Recent Comments', 'gp_lang'); ?></h3>
			
			<?php foreach ($comments_array as $comment) : ?>
		
				<div class="profile-row">		
					<a href="<?php echo get_permalink($comment->comment_post_ID); ?>"><?php _e('Comment on', 'gp_lang'); ?> <?php echo($comment->post_title) ?></a>
					<?php comment_excerpt($comment->comment_ID); ?>	
				</div>
				
			<?php endforeach; ?>
		
		</div>
		
	<?php endif; ?>
	
	<!-- END RECENT COMMENTS -->
	
	
</div>

<!-- END CONTENT -->


<?php get_sidebar(); ?>


<?php get_footer(); ?>