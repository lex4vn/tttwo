<div id="slider-top"></div>

<?php if($theme_slider_cats) {

require(gp_inc . 'options.php'); global $gp_settings, $is_IE, $is_gecko;

// Slide Image Dimensions
$image_width = $theme_slide_image_width;
$image_height = 86 * $theme_slides - 1;	

?>

	<style>.nivo-controlNav { width: <?php echo 977 - $image_width; ?>px; }</style>

	<div id="slider" style="height: <?php echo $image_height; ?>px;">

		<?php
		
		// Slide Order	
		if($theme_slider_orderby == "Custom Order") {
			$slider_orderby = "menu_order";	
			$slider_order = "ASC";
		} else { 
			$slider_orderby = "date";
			$slider_order = "DESC";
		}
		
		$args=array(
		'post_type' => array('post', 'review', 'slide'),
		'posts_per_page' => $theme_slides,
		'ignore_sticky_posts' => 0,
		'orderby' => $slider_orderby,
		'order' => $slider_order,
		'tax_query' =>
		array('relation' => 'OR',
			array('taxonomy' => 'category', 'terms' => explode(',', $theme_slider_cats), 'field' => 'id'),
			array('taxonomy' => 'review_categories', 'terms' => explode(',', $theme_slider_cats), 'field' => 'id'),
			array('taxonomy' => 'slide_categories', 'terms' => explode(',', $theme_slider_cats), 'field' => 'id'))			
		);
		
		query_posts($args); $slide_counter = ''; if (have_posts()) : while (have_posts()) : the_post(); $slide_counter++;
		
		// Placeholder Image				
		if(get_post_meta(get_the_ID(), 'ghostpool_slide_image', true)) {
			$gp_settings['placeholder'] = get_post_meta(get_the_ID(), 'ghostpool_slide_image', true);
		} else {
			$gp_settings['placeholder'] = get_template_directory_uri().'/lib/images/placeholder1.png';
		}
			
		// Video Type	
		$vimeo = strpos(get_post_meta(get_the_ID(), 'ghostpool_slide_video', true), "vimeo.com");
		$youtube1 = strpos(get_post_meta(get_the_ID(), 'ghostpool_slide_video', true), "youtube.com");
		$youtube2 = strpos(get_post_meta(get_the_ID(), 'ghostpool_slide_video', true), "youtu.be");
	
		 ?>
						
			<div class="slide<?php if($slide_counter != '1') {} elseif(get_post_meta(get_the_ID(), 'ghostpool_slide_autostart_video', true)) { ?> video-autostart<?php } ?>" id="slide-<?php the_ID(); ?>" style="width: <?php echo $image_width; ?>px; height: <?php echo $image_height; ?>px;">
				
				<?php if(get_post_meta(get_the_ID(), 'ghostpool_slide_read_on', true)) { ?>

					<?php $image = vt_resize(get_post_thumbnail_id(), $gp_settings['placeholder'], 9999, 9999, true); ?>
					<?php if(get_post_type() == "slide") { ?>
						<a href="<?php if(get_post_meta(get_the_ID(), 'ghostpool_slide_link_type', true) == "Lightbox Video") { ?>file=<?php echo get_post_meta(get_the_ID(), 'ghostpool_slide_url', true); } elseif(get_post_meta(get_the_ID(), 'ghostpool_slide_link_type', true) == "Lightbox Image") { if(get_post_meta(get_the_ID(), 'ghostpool_slide_url', true)) { echo get_post_meta(get_the_ID(), 'ghostpool_slide_url', true); } else { echo $image['url']; }} else { if(get_post_meta(get_the_ID(), 'ghostpool_slide_url', true)) { echo get_post_meta(get_the_ID(), 'ghostpool_slide_url', true); } else { the_permalink(); }} ?>" title="<?php the_title_attribute(); ?>"<?php if(get_post_meta(get_the_ID(), 'ghostpool_slide_link_type', true) != "Page") { ?> rel="prettyPhoto"<?php } ?> class="read-more-link sc-button">								
					<?php } elseif(get_post_type() != "slide") { ?>							
						<a href="<?php the_permalink(); ?>" class="read-more-link sc-button" title="<?php the_title_attribute(); ?>">								
					<?php } ?>
					
					<?php _e('Read On', 'gp_lang'); ?>
					
					</a>
				
				<?php } ?>
		
				<!--Begin Video-->	
				<?php if(get_post_meta(get_the_ID(), 'ghostpool_slide_video', true) OR get_post_meta(get_the_ID(), 'ghostpool_webm_mp4_slide_video', true) OR get_post_meta(get_the_ID(), 'ghostpool_ogg_slide_video', true)) { ?>
									
					<?php $image = vt_resize(get_post_thumbnail_id(), $gp_settings['placeholder'], $image_width, $image_height, true); ?>
					
					<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" title="<div class='slider-thumb-caption'><strong><?php the_title_attribute(); ?></strong><p><?php echo gp_excerpt(130); ?></p></div>" alt="<?php $image = vt_resize(get_post_thumbnail_id(), $gp_settings['placeholder'], 80, 65, true); echo $image['url']; ?>" />
					
					<?php if($vimeo) { // Vimeo
						
						// Vimeo Clip ID
						if(preg_match('/www.vimeo/', get_post_meta(get_the_ID(), 'ghostpool_slide_video', true))) {							
							$vimeoid = str_replace('http://www.vimeo.com/', '', get_post_meta(get_the_ID(), 'ghostpool_slide_video', true));
						} else {							
							$vimeoid = str_replace('http://vimeo.com/', '', get_post_meta(get_the_ID(), 'ghostpool_slide_video', true));
						}															
					
					?>

						<div class="play-video" id="play-video-<?php the_ID(); ?>" style="width: <?php echo $image_width; ?>px; height: <?php echo $image_height; ?>px;"></div>					
						
						<div class="video-player">
							<iframe src="http://player.vimeo.com/video/<?php echo $vimeoid; ?>?byline=0&amp;portrait=0&amp;autoplay=<?php if($slide_counter != '1') { ?>0<?php } elseif(get_post_meta(get_the_ID(), 'ghostpool_slide_autostart_video', true)) { ?>1<?php } else { ?>0<?php } ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>" allowFullScreen></iframe>
						</div>
						
						<script>						
						jQuery(window).load(function() { // Play Vimeo video
							jQuery("#play-video-<?php the_ID(); ?>").click(function(){
							  var thePage = jQuery("#slide-<?php the_ID(); ?> .video-player");
							  thePage.html(thePage.html().replace('http://player.vimeo.com/video/<?php echo $vimeoid; ?>?byline=0&amp;portrait=0&amp;autoplay=0', 'http://player.vimeo.com/video/<?php echo $vimeoid; ?>?byline=0&amp;portrait=0&amp;autoplay=1'));
							});
							jQuery(".nivo-controlNav").click(function(){ // Pause Vimeo video
							  var thePage = jQuery("#slide-<?php the_ID(); ?> .video-player");
							  thePage.html(thePage.html().replace('http://player.vimeo.com/video/<?php echo $vimeoid; ?>?byline=0&amp;portrait=0&amp;autoplay=1', 'http://player.vimeo.com/video/<?php echo $vimeoid; ?>?byline=0&amp;portrait=0&amp;autoplay=0'));
							});
						});
						</script>
					
					<?php } elseif(($youtube1 OR $youtube2) && $theme_jwplayer == '1') {

						// YouTube ID
						if(preg_match('/www.youtube/', get_post_meta(get_the_ID(), 'ghostpool_slide_video', true))) {							
							$youtubeid = str_replace('http://www.youtube.com/watch?v=', '', get_post_meta(get_the_ID(), 'ghostpool_slide_video', true));
						} elseif(preg_match('/youtube.com/', get_post_meta(get_the_ID(), 'ghostpool_slide_video', true))) {							
							$youtubeid = str_replace('http://youtube.com/watch?v=', '', get_post_meta(get_the_ID(), 'ghostpool_slide_video', true));
						} elseif(preg_match('/www.youtu.be/', get_post_meta(get_the_ID(), 'ghostpool_slide_video', true))) {							
							$youtubeid = str_replace('http://www.youtu.be/', '', get_post_meta(get_the_ID(), 'ghostpool_slide_video', true));	
						} else {							
							$youtubeid = str_replace('http://youtu.be/', '', get_post_meta(get_the_ID(), 'ghostpool_slide_video', true));														
						}
					
					?>						
				
						<div class="play-video" id="play-video-<?php the_ID(); ?>" style="width: <?php echo $image_width; ?>px; height: <?php echo $image_height; ?>px;"></div>					
						
						<div class="video-player">
							<iframe width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>" src="//www.youtube.com/embed/<?php echo $youtubeid; ?>?autoplay=<?php if($slide_counter != '1') { ?>0<?php } elseif(get_post_meta(get_the_ID(), 'ghostpool_slide_autostart_video', true)) { ?>1<?php } else { ?>0<?php } ?>&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
						</div>
						
						<script>						
						jQuery(window).load(function() { // Play YouTube video
							jQuery("#play-video-<?php the_ID(); ?>").click(function(){
							  var thePage = jQuery("#slide-<?php the_ID(); ?> .video-player");
							  thePage.html(thePage.html().replace('//www.youtube.com/embed/<?php echo $youtubeid; ?>?autoplay=0&amp;controls=0&amp;showinfo=0', '//www.youtube.com/embed/<?php echo $youtubeid; ?>?autoplay=1&amp;controls=0&amp;showinfo=0'));
							});
							jQuery(".nivo-controlNav").click(function(){ // Pause YouTube video
							  var thePage = jQuery("#slide-<?php the_ID(); ?> .video-player");
							  thePage.html(thePage.html().replace('//www.youtube.com/embed/<?php echo $youtubeid; ?>?autoplay=1&amp;controls=0&amp;showinfo=0', '//www.youtube.com/embed/<?php echo $youtubeid; ?>?autoplay=0&amp;controls=0&amp;showinfo=0'));
							});
						});
						</script>
						
					<?php } else { // JW Player ?>

						<?php if(($gp_settings['iphone'] OR $gp_settings['ipad']) && (!$youtube1 && !$youtube2)) { ?>
	
							<video id="player-<?php the_ID(); ?>" controls="controls" poster="<?php $image = vt_resize(get_post_thumbnail_id(), $gp_settings['placeholder'], $width, $height, true); echo $image['url']; ?>" style="width: <?php echo $image_width; ?>px; height: <?php echo $image_height; ?>px;">								
								<source src="<?php if(get_post_meta(get_the_ID(), 'ghostpool_webm_mp4_slide_video', true)) { echo $html5_1; } else { echo get_post_meta(get_the_ID(), 'ghostpool_webm_mp4_slide_video', true); } ?>" type="video/mp4" />
								<source src="<?php if(get_post_meta(get_the_ID(), 'ghostpool_ogg_slide_video', true)) { echo get_post_meta(get_the_ID(), 'ghostpool_ogg_slide_video', true); } else { echo get_post_meta(get_the_ID(), 'ghostpool_slide_video', true); } ?>" type="video/webm" />
							</video>
						
						<?php } else { ?>	
						
							<div class="play-video" id="play-video-<?php the_ID(); ?>" style="width: <?php echo $image_width; ?>px; height: <?php echo $image_height; ?>px;"></div>
						
							<div class="video-player">
								<div id="player-<?php the_ID(); ?>"></div>
							</div>
								
						<?php } ?>
						
						<script>
						
							//<![CDATA[
							jwplayer("player-<?php the_ID(); ?>").setup({
								image: "<?php $image = vt_resize(get_post_thumbnail_id(), $gp_settings['placeholder'], $image_width, $image_height, true); echo $image['url']; ?>",
								icons: "true",
								autostart: "<?php if($slide_counter != '1') { ?>false<?php } elseif(get_post_meta(get_the_ID(), 'ghostpool_slide_autostart_video', true)) { ?>true<?php } else { ?>false<?php } ?>",
								stretching: "fill",
								controlbar: "<?php if(get_post_meta(get_the_ID(), 'ghostpool_slide_video_controls', true) == 'Over') { ?>over<?php } elseif(get_post_meta(get_the_ID(), 'ghostpool_slide_video_controls', true) == 'Bottom') { ?>bottom<?php } else { ?>none<?php } ?>",
								skin: "<?php echo get_template_directory_uri(); ?>/lib/scripts/mediaplayer/fs39/fs39.xml",
								width: <?php echo $image_width; ?>,
								height: <?php echo $image_height; ?>,
								screencolor: "000000",
								modes:
									[
										<?php if($is_IE OR get_post_meta(get_the_ID(), 'ghostpool_slide_video_priority', true) == 'Flash') { ?>
											{type: "flash", src: "<?php echo get_template_directory_uri(); ?>/lib/scripts/mediaplayer/player.swf", config: {file: "<?php echo get_post_meta(get_the_ID(), 'ghostpool_slide_video', true); ?>"}},					
											{type: "html5", config: {file: "<?php if($is_gecko && get_post_meta(get_the_ID(), 'ghostpool_ogg_slide_video', true)) { echo get_post_meta(get_the_ID(), 'ghostpool_ogg_slide_video', true); } elseif(get_post_meta(get_the_ID(), 'ghostpool_webm_mp4_slide_video', true)) { echo get_post_meta(get_the_ID(), 'ghostpool_webm_mp4_slide_video', true); } else { echo get_post_meta(get_the_ID(), 'ghostpool_slide_video', true); } ?>"}}
										<?php } else { ?>
											{type: "html5", config: {file: "<?php if($is_gecko && get_post_meta(get_the_ID(), 'ghostpool_ogg_slide_video', true)) { echo get_post_meta(get_the_ID(), 'ghostpool_ogg_slide_video', true); } elseif(get_post_meta(get_the_ID(), 'ghostpool_webm_mp4_slide_video', true)) { echo get_post_meta(get_the_ID(), 'ghostpool_webm_mp4_slide_video', true); } else { echo get_post_meta(get_the_ID(), 'ghostpool_slide_video', true); } ?>"}},
											{type: "flash", src: "<?php echo get_template_directory_uri(); ?>/lib/scripts/mediaplayer/player.swf", config: {file: "<?php echo get_post_meta(get_the_ID(), 'ghostpool_slide_video', true); ?>"}}
										<?php } ?>
									],
								plugins: {}
							
							});
							
							//]]>	
							
							// Play/Stop JW Player						
							jQuery(window).load(function() {
								
								// Play JW Player
								jQuery("#play-video-<?php the_ID(); ?>").click(function() {
									jwplayer("player-<?php the_ID(); ?>").play();	
								});							
								
								// Stop JW Player
								jQuery(".nivo-controlNav").click(function() {
									if(jwplayer("player-<?php the_ID(); ?>").getState() === "PLAYING") {
										jwplayer("player-<?php the_ID(); ?>").stop();
									}
									jQuery('#slider .play-video').show();
									jQuery('#slider .video-player').hide();
								});
								
							});	
						
						</script>
						
					<?php } ?>

					<script>
					jQuery(window).load(function() {

						// Hide Play Button
						jQuery("#play-video-<?php the_ID(); ?>").click(function() {
							jQuery('#slider').data('nivoslider').stop();
							jQuery('#play-video-<?php the_ID(); ?>').hide();
							jQuery("#slide-<?php the_ID(); ?> .video-player").show();
						});							

					});	
					</script>
					<!--End Video-->

				<?php } else { ?>
																					
					<?php $image = vt_resize(get_post_thumbnail_id(), $gp_settings['placeholder'], 9999, 9999, true); ?>
					
					<?php if(get_post_type() == "slide" && (get_post_meta(get_the_ID(), 'ghostpool_slide_url', true) OR get_post_meta(get_the_ID(), 'ghostpool_slide_link_type', true) != "None")) { ?>
						<a href="<?php if(get_post_meta(get_the_ID(), 'ghostpool_slide_link_type', true) == "Lightbox Video") { ?>file=<?php echo get_post_meta(get_the_ID(), 'ghostpool_slide_url', true); } elseif(get_post_meta(get_the_ID(), 'ghostpool_slide_link_type', true) == "Lightbox Image") { if(get_post_meta(get_the_ID(), 'ghostpool_slide_url', true)) { echo get_post_meta(get_the_ID(), 'ghostpool_slide_url', true); } else { echo $image['url']; }} else { if(get_post_meta(get_the_ID(), 'ghostpool_slide_url', true)) { echo get_post_meta(get_the_ID(), 'ghostpool_slide_url', true); } else { the_permalink(); }} ?>" title="<?php the_title_attribute(); ?>"<?php if(get_post_meta(get_the_ID(), 'ghostpool_slide_link_type', true) != "Page") { ?> rel="prettyPhoto"<?php } ?>>									
					<?php } elseif(get_post_type() != "slide") { ?>							
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">								
					<?php } ?>
																																													
						<?php $image = vt_resize(get_post_thumbnail_id(), $gp_settings['placeholder'], $image_width, $image_height, true); ?>
					
						<img src="<?php echo $image['url']; ?>" width="<?php echo $image['width']; ?>" height="<?php echo $image['height']; ?>" title="<div class='slider-thumb-caption'><strong><?php the_title_attribute(); ?></strong><p><?php echo gp_excerpt(130); ?></p></div>" alt="<?php $image = vt_resize(get_post_thumbnail_id(), $gp_settings['placeholder'], 80, 65, true); echo $image['url']; ?>" />		
					
					<?php if(get_post_meta(get_the_ID(), 'ghostpool_slide_url', true) OR get_post_meta(get_the_ID(), 'ghostpool_slide_link_type', true) != "None" OR get_post_type() != "slide") { ?></a><?php } ?>
				
				<?php } ?>
		
			</div>
			
		<?php endwhile; endif; wp_reset_query(); ?>
	
	</div>
	
	<script>
	jQuery(document).ready(function(){	
		jQuery('#slider').nivoSlider({
			effect: 'random',
			boxCols: 8,
			boxRows: 4,
			slices: 20,
			animSpeed: <?php echo $theme_slide_transition_speed * 1000; ?>,
			pauseTime: <?php echo $theme_slide_length * 1000; ?>,
			startSlide: 0,
			directionNav: false,
			directionNavHide: false,
			keyboardNav: false,
			pauseOnHover: false,
			controlNavThumbs: true,
			controlNavThumbsFromRel: true,
			manualAdvance: <?php if($theme_slider_auto_rotation == "0") { ?>false<?php } else { ?>true<?php } ?>,
			captionOpacity: 0,
			beforeChange: function hideButtons(){ jQuery('.play-video, .read-more-link').hide(); },
			afterChange: function showButtons(){ jQuery('.play-video, .read-more-link').show(); }
		});
		
		// Resume Slider
		jQuery(".nivo-controlNav").click(function() {
			jQuery('#slider').data('nivoslider').start();
		});						
	
		// Show Play Button
		jQuery(".nivo-controlNav").click(function() {
			jQuery('#slider .play-video').show();
		});
		
	});
	</script>

<?php } else { ?>

	<div id="slider-error">
		<?php _e('Your can display slides (custom post type), reviews and posts in the slider. To do this first assign your slides to one or more', 'gp_lang'); ?> <a href="<?php echo admin_url(); ?>edit-tags.php?taxonomy=slide_categories&post_type=slide"><?php _e('slider categories', 'gp_lang'); ?></a>, <a href="<?php echo admin_url(); ?>edit-tags.php?taxonomy=review_categories&post_type=review"><?php _e('review categories', 'gp_lang'); ?></a> <?php _e('and your chosen posts to one or more', 'gp_lang'); ?> <a href="<?php echo admin_url(); ?>edit-tags.php?taxonomy=category"><?php _e('post categories', 'gp_lang'); ?></a><?php _e('. Now go to', 'gp_lang'); ?> <em><a href="<?php echo admin_url(); ?>themes.php?page=theme-options.php#2"><?php _e('Appearance -> Theme Options -> Slider Settings', 'gp_lang'); ?></a></em> <?php _e('and in the <em>Slider Category IDs</em> text field add your slider, review  and/or post category IDs.', 'gp_lang'); ?>
	</div>					

<?php } ?>