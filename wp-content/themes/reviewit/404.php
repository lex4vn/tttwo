<?php get_header(); ?>


<!-- BEGIN CONTENT -->

<div id="content">


	<!-- BEGIN TITLE -->

	<h1 class="page-title"><?php _e('Page Not Found', 'gp_lang'); ?></h1>
	
	<!-- BEGIN TITLE -->


	<h4><?php _e('Oops, it looks like this page does not exist. If you are lost try using the search box below.', 'gp_lang'); ?></h4>


	<div class="sc-divider"></div>

	
	<h4><?php _e('Search The Site', 'gp_lang'); ?></h4>
	<?php get_search_form(); ?>


</div>

<!--END CONTENT -->


<?php get_sidebar(); ?>


<?php get_footer(); ?>