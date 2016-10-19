<?php get_header(); ?>


<!-- BEGIN CONTENT -->

<div id="content">


	<!-- BEGIN TITLE -->

	<h1 class="page-title"><?php the_title(); ?></h1>

	<!-- END TITLE -->		


	<!-- BEGIN IMAGE -->

	<?php the_attachment_link(get_the_ID(), true) ?>
	
	<!-- END IMAGE -->


	<!-- BEGIN POST CONTENT -->

	<div id="post-content">
	
		<?php the_content(__('Read On', 'gp_lang')); ?>
		
	</div>
	
	<!-- END POST CONTENT -->


</div>

<!-- END CONTENT -->

	
<?php get_sidebar(); ?>


<?php get_footer(); ?>