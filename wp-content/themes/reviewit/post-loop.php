<?php global $gp_settings; ?>

<div id="content">

	<?php if($gp_settings['title'] == "Show") { ?>
		<h1 class="page-title">
			<?php if(is_search()) { ?>
				<?php echo $wp_query->found_posts; ?> <?php _e('search results for', 'gp_lang'); ?> "<?php echo esc_html($s); ?>"
			<?php } elseif(is_category()) { ?>
				<?php if(get_category_parents($cat)) { $catstr = get_category_parents($cat, false, ' / '); echo substr($catstr, 0, strlen($catstr) -3 ); } else { single_cat_title(); } ?>
			<?php } elseif(is_tag()) { ?>
				<?php single_tag_title(); ?>
			<?php } elseif(is_author()) { ?>
				<?php wp_title(''); ?><?php _e('\'s Posts', 'gp_lang'); ?>
			<?php } elseif(is_archive()) { ?>
				<?php _e('Archives', 'gp_lang'); ?> <?php wp_title(' / '); ?>
			<?php } ?>
		</h1>
	<?php } ?>
	
	<?php require('loop.php'); ?>
	
</div>

<?php get_sidebar(); ?>