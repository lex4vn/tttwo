<?php require(gp_inc . 'options.php'); ?>

	</div>

	<!-- END CONTENT WRAPPER -->
	
	
	<?php if(is_active_sidebar('footer-1') OR is_active_sidebar('footer-2') OR is_active_sidebar('footer-3') OR is_active_sidebar('footer-4')) { ?>
	
		<div class="clear"></div>
	
		
		<!-- BEGIN FOOTER WIDGETS -->
		
		<div id="footer-widgets">
				
			<?php
			if(is_active_sidebar('footer-1') && is_active_sidebar('footer-2') && is_active_sidebar('footer-3') && is_active_sidebar('footer-4')) { $footer_widgets = "footer-fourth"; }
			elseif(is_active_sidebar('footer-1') && is_active_sidebar('footer-2') && is_active_sidebar('footer-3')) { $footer_widgets = "footer-third"; }
			elseif(is_active_sidebar('footer-1') && is_active_sidebar('footer-2')) {
			$footer_widgets = "footer-half"; }	
			elseif(is_active_sidebar('footer-1')) { $footer_widgets = "footer-whole"; }
			?>
		
			<?php if(is_active_sidebar('footer-1')) { ?>
				<div class="footer-widget-outer <?php echo($footer_widgets); ?>">
					<?php dynamic_sidebar('footer-1'); ?>
				</div>
			<?php } ?>
		
			<?php if(is_active_sidebar('footer-2')) { ?>
				<div class="footer-widget-outer <?php echo($footer_widgets); ?>">
					<?php dynamic_sidebar('footer-2'); ?>
				</div>
			<?php } ?>
			
			<?php if(is_active_sidebar('footer-3')) { ?>
				<div class="footer-widget-outer <?php echo($footer_widgets); ?>">
					<?php dynamic_sidebar('footer-3'); ?>
				</div>
			<?php } ?>
			
			<?php if(is_active_sidebar('footer-4')) { ?>
				<div class="footer-widget-outer <?php echo($footer_widgets); ?>">
					<?php dynamic_sidebar('footer-4'); ?>
				</div>
			<?php } ?>
			
		</div>
		
		<!-- END FOOTER WIDGETS -->
		
	
	<?php } ?>
	
	
	<div class="clear"></div>
	
	
	<!-- BEGIN FOOTER -->
	
	<div id="footer">
	
		<div id="footer-content">
		
			<?php wp_nav_menu('sort_column=menu_order&container=ul&theme_location=footer-nav&fallback_cb=null'); ?>
		
				<div id="copyright"><?php if($theme_footer_content) { echo stripslashes($theme_footer_content); } else { ?><?php _e('Copyright &copy;', 'gp_lang'); ?> <?php echo date('Y'); ?> <a href="http://twobitcoin.com"><?php _e('TWOBitcoin.com', 'gp_lang'); ?></a>. <?php _e('All rights reserved.', 'gp_lang'); ?><?php } ?></div>
		
		</div>
		
		<a id="top-arrow" class="back-to-top"></a>
			
	</div>
	
	<!-- END FOOTER -->
	
		
</div>

<!-- END PAGE WRAPPER -->

<?php if($theme_chunkfive OR $theme_journal OR $theme_leaguegothic OR $theme_nevis OR $theme_quicksand OR $theme_sansation OR $theme_vegur) { ?>
	<script>Cufon.now();</script>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>