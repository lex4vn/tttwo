<?php 

global $gp_settings;

// Image Dimensions
if(get_post_meta(get_the_ID(), 'ghostpool_thumbnail_width', true) && get_post_meta(get_the_ID(), 'ghostpool_thumbnail_width', true) != "") {
	$gp_settings['image_width'] = get_post_meta(get_the_ID(), 'ghostpool_thumbnail_width', true);
} else {
	$gp_settings['image_width'] = $gp_settings['thumbnail_width'];
}
if(get_post_meta(get_the_ID(), 'ghostpool_thumbnail_height', true) != "") {
	$gp_settings['image_height'] = get_post_meta(get_the_ID(), 'ghostpool_thumbnail_height', true);
} else {
	$gp_settings['image_height'] = $gp_settings['thumbnail_height'];
}

// User Voting
if(get_post_meta(get_the_ID(), 'ghostpool_user_voting', true) && get_post_meta(get_the_ID(), 'ghostpool_user_voting', true) != "Default") {
	$gp_settings['user_voting'] = get_post_meta(get_the_ID(), 'ghostpool_user_voting', true);
} elseif(get_post_type() != "slide") {	
	$gp_settings['user_voting'] = $theme_user_voting;	
} else {
	$gp_settings['user_voting'] = $theme_user_voting;
}

// Multi Rating IDs
if(get_post_meta(get_the_ID(), 'ghostpool_site_multi_rating_id', true) && get_post_meta(get_the_ID(), 'ghostpool_site_multi_rating_id', true) != "") {
	$gp_settings['site_multi_rating_id'] = get_post_meta(get_the_ID(), 'ghostpool_site_multi_rating_id', true);
} else {
	$gp_settings['site_multi_rating_id'] = $theme_site_multi_rating_id;
}	
if(get_post_meta(get_the_ID(), 'ghostpool_user_multi_rating_id', true) && get_post_meta(get_the_ID(), 'ghostpool_user_multi_rating_id', true) != "") {
	$gp_settings['user_multi_rating_id'] = get_post_meta(get_the_ID(), 'ghostpool_user_multi_rating_id', true);
} else {
	$gp_settings['user_multi_rating_id'] = $theme_user_multi_rating_id;
}
	
if(defined('STARRATING_INSTALLED') && get_post_type() == "review") {

	// GD Star Ratings
	$gp_settings['gp_gdsr'] = wp_gdsr_rating_article();
	$gp_settings['gp_gdsmr'] = wp_gdsr_rating_multi($gp_settings['site_multi_rating_id'], 0);
	
	if ( ! isset( $gp_settings['gp_gdsr']->review ) OR empty( $gp_settings['gp_gdsr']->review ) ) {
		$gp_settings['gp_gdsr'] = new stdClass();		
		$gp_settings['gp_gdsr']->review = false;
	}
	if ( ! isset( $gp_settings['gp_gdsmr']->review ) OR empty( $gp_settings['gp_gdsmr']->review ) ) {
		$gp_settings['gp_gdsmr'] = new stdClass();		
		$gp_settings['gp_gdsmr']->review = false;
	}
		
}		
	
?>