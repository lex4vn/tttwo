<?php global $gp_settings; ?>


<!-- BEGIN CONTENT -->

<div id="content">

	<!-- BEGIN TITLE -->
	
	<?php if($gp_settings['title'] == "Show") { ?>	
	
		<h1 class="page-title">
		
			<?php if ( is_archive() ) { echo $theme_review_plural_name; } ?>
		
			<?php if ( ( isset( $gp_settings['tax_name']->labels->name ) OR $gp_settings['tax_name']->labels->name ) && ( ! isset( $gp_settings['tax_name']->labels->name ) OR ! $gp_settings['tax_name']->hierarchical ) ) { ?> / <?php echo $gp_settings['tax_name']->labels->name; } ?><?php if ( isset( $gp_settings['term']->name ) ) { ?> / <?php echo $gp_settings['term']->name; } ?>
			
		</h1>
		
	<?php } ?>
	
	<!-- END TITLE -->
	
	
	<!-- BEGIN POST LOOP -->
	
	<?php require('loop.php'); ?>
	
	<!-- END POST LOOP -->
	
	
</div>

<!-- END CONTENT -->


<?php get_sidebar(); ?>