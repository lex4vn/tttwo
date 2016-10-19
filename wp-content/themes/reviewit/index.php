<?php get_header(); ?>


<!-- BEGIN CONTENT -->

<div id="content">
	
	<?php if(is_active_sidebar('homepage')) { dynamic_sidebar('homepage'); } else { ?>
		
		<p><?php _e('To display your reviews and/or posts here, go to Appearance -> Widgets and drag the desired widgets into the "Homepage (Left)" widget area. Alternatively import the demo widget content by going to Tools -> Widget Import/Export, click the "Choose File" button and locate the widgets.wie file that is inside the reviewit-theme/reviewit/Help/Demo Content folder and double click the file to select it and then click the "Import Widgets" button.'); ?></p>
		
		<div class="sc-divider"></div>
		
		<p><?php _e('For more info on setting up the theme please read the', 'gp_lang'); ?> <a href="http://ghostpool.com/help/<?php echo $dirname; ?>/help.html" target="_blank"><?php _e('help file', 'gp_lang'); ?></a>.</p>
	
	<?php } ?>
	
</div>

<!-- END CONTENT -->


<?php get_sidebar(); ?>


<?php get_footer(); ?>