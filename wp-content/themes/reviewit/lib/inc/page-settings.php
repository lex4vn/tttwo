<?php require(gp_inc . 'options.php'); global $gp_settings;
	

// iOS Conditionals

$gp_settings['iphone'] = (stripos($_SERVER['HTTP_USER_AGENT'],"iPhone") !== false);
$gp_settings['ipad'] = (stripos($_SERVER['HTTP_USER_AGENT'],"iPad") !== false);


// Skins

if(isset($_GET['skin']) && $_GET['skin'] != "default") {
	$gp_settings['skin'] = "skin-".$_GET['skin'];
} elseif(isset($_COOKIE['SkinCookie']) && $_COOKIE['SkinCookie'] != "default") {
	$gp_settings['skin'] = "skin-".$_COOKIE['SkinCookie']; 
} elseif(get_post_meta(get_the_ID(), 'ghostpool_skin', true) && get_post_meta(get_the_ID(), 'ghostpool_skin', true) != "Default") {
	$gp_settings['skin'] = "skin-".get_post_meta(get_the_ID(), 'ghostpool_skin', true);
} else {
	$gp_settings['skin'] = "skin-".$theme_skin;
}


// GD Star Ratings

if(defined('STARRATING_INSTALLED')) {
	$gp_settings['msr_stars_set'] = gdsr_settings_get("review_style");
	$gp_settings['msr_stars_size'] = gdsr_settings_get("review_size");
	$gp_settings['mur_stars_set'] = gdsr_settings_get("mur_style");
	$gp_settings['mur_stars_size'] = gdsr_settings_get("mur_size");
	$gp_settings['comment_stars_set'] = gdsr_settings_get("mur_style");
	$gp_settings['comment_stars_size'] = gdsr_settings_get("mur_size");	
}


//////////////////////////////////////// Homepage ////////////////////////////////////////


if(is_home() OR is_front_page()) {

	$gp_settings['thumbnail_width'] = '';
	$gp_settings['thumbnail_height'] = '';
	$gp_settings['sidebar'] = $theme_homepage_sidebar;
	$gp_settings['layout'] = $theme_homepage_layout;
	$gp_settings['title'] = "Hide";
	
	// Column Width
	if($gp_settings['layout'] == "fullwidth") {
		$gp_settings['content_width'] = "980";
	} else {
		$gp_settings['content_width'] = "650";
	}
	
	
//////////////////////////////////////// BuddyPress ////////////////////////////////////////


} elseif((function_exists('bp_is_active') && !bp_is_blog_page()) OR (function_exists('is_bbpress') && is_bbpress())) {

	$gp_settings['layout'] = "fullwidth";
	
	// Title
	if(get_post_meta(get_the_ID(), 'ghostpool_title', true) && get_post_meta(get_the_ID(), 'ghostpool_title', true) != "Default") {
		$gp_settings['title'] = get_post_meta(get_the_ID(), 'ghostpool_title', true);
	} else {
		$gp_settings['title'] = $theme_page_title;
	} 
	

//////////////////////////////////////// Review Categories, Archives etc. ////////////////////////////////////////


} elseif(is_post_type_archive('review') OR is_tax()) {

	$gp_settings['thumbnail_width'] = $theme_review_cat_thumbnail_width;
	$gp_settings['thumbnail_height'] = $theme_review_cat_thumbnail_height;
	$gp_settings['image_wrap'] = $theme_review_cat_image_wrap;
	$gp_settings['sidebar'] = $theme_review_cat_sidebar;
	$gp_settings['layout'] = $theme_review_cat_layout;	
	$gp_settings['title'] = $theme_review_cat_title;
	$gp_settings['posts_per_page'] = $theme_review_cat_posts_per_page;
	$gp_settings['post_display'] = $theme_review_cat_post_display;
	$gp_settings['rating_type'] = $theme_review_cat_rating_type;	
	$gp_settings['content_display'] = $theme_review_cat_content_display;
	$gp_settings['title_length'] = $theme_review_cat_title_length;
	$gp_settings['excerpt_length'] = $theme_review_cat_excerpt_length;
	$gp_settings['read_more'] = $theme_review_cat_read_more;
	$gp_settings['dropdown_filter'] = $theme_review_cat_dropdown_filter;	
	$gp_settings['filter_date'] = $theme_review_filter_date;
	$gp_settings['filter_title'] = $theme_review_filter_title;
	$gp_settings['filter_site_score'] = $theme_review_filter_site_score;
	$gp_settings['filter_user_score'] = $theme_review_filter_user_score;				
	$gp_settings['meta_date'] = $theme_review_cat_date;
	$gp_settings['meta_author'] = $theme_review_cat_author;
	$gp_settings['meta_cats'] = $theme_review_cat_cats;
	$gp_settings['meta_comments'] = $theme_review_cat_comments;
	$gp_settings['meta_tags'] = $theme_review_cat_tags;
	
	// Column Width
	if($gp_settings['layout'] == "fullwidth") {
		$gp_settings['content_width'] = "980";
	} else {
		$gp_settings['content_width'] = "650";
	}
			
	// Get Review Slug
	$gp_settings['term'] = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
	
	// Get Review Tag
	$gp_settings['tax_name'] = get_taxonomy(get_query_var('taxonomy'));
	

//////////////////////////////////////// Post Categories, Archives etc. ////////////////////////////////////////


} elseif(((is_archive() OR is_search()) && !function_exists('is_woocommerce')) OR ((is_archive() OR is_search()) && function_exists('is_woocommerce') && !is_shop())) {

	$gp_settings['thumbnail_width'] = $theme_cat_thumbnail_width;
	$gp_settings['thumbnail_height'] = $theme_cat_thumbnail_height;
	$gp_settings['image_wrap'] = $theme_cat_image_wrap;
	$gp_settings['sidebar'] = $theme_cat_sidebar;
	$gp_settings['layout'] = $theme_cat_layout;	
	$gp_settings['title'] = $theme_cat_title;
	$gp_settings['posts_per_page'] = $theme_cat_posts_per_page;
	$gp_settings['post_display'] = $theme_cat_post_display;
	$gp_settings['rating_type'] = $theme_cat_rating_type;	
	$gp_settings['content_display'] = $theme_cat_content_display;
	$gp_settings['title_length'] = $theme_cat_title_length;
	$gp_settings['excerpt_length'] = $theme_cat_excerpt_length;
	$gp_settings['read_more'] = $theme_cat_read_more;
	$gp_settings['dropdown_filter'] = $theme_cat_dropdown_filter;
	$gp_settings['filter_date'] = $theme_cat_filter_date;
	$gp_settings['filter_title'] = $theme_cat_filter_title;
	$gp_settings['filter_site_score'] = $theme_cat_filter_site_score;
	$gp_settings['filter_user_score'] = $theme_cat_filter_user_score;				
	$gp_settings['meta_date'] = $theme_cat_date;
	$gp_settings['meta_author'] = $theme_cat_author;
	$gp_settings['meta_cats'] = $theme_cat_cats;
	$gp_settings['meta_comments'] = $theme_cat_comments;
	$gp_settings['meta_tags'] = $theme_cat_tags;
	
	// Column Width
	if($gp_settings['layout'] == "fullwidth") {
		$gp_settings['content_width'] = "980";
	} else {
		$gp_settings['content_width'] = "650";
	}
	
		
//////////////////////////////////////// Blog Page Template ////////////////////////////////////////


} elseif(is_page_template('blog.php')) {

	$gp_settings['thumbnail_width'] = $theme_blog_thumbnail_width;
	$gp_settings['thumbnail_height'] = $theme_blog_thumbnail_height;
	$gp_settings['image_wrap'] = $theme_blog_image_wrap;
	$gp_settings['layout'] = $theme_blog_layout;	
	$gp_settings['title'] = $theme_blog_title;
	$gp_settings['title_length'] = $theme_blog_title_length;
	$gp_settings['excerpt_length'] = $theme_blog_excerpt_length;
	$gp_settings['read_more'] = $theme_blog_read_more;
	$gp_settings['dropdown_filter'] = $theme_blog_dropdown_filter;
	$gp_settings['filter_date'] = $theme_blog_filter_date;
	$gp_settings['filter_title'] = $theme_blog_filter_title;
	$gp_settings['filter_site_score'] = $theme_blog_filter_site_score;
	$gp_settings['filter_user_score'] = $theme_blog_filter_user_score;	
	$gp_settings['meta_date'] = $theme_blog_date;
	$gp_settings['meta_author'] = $theme_blog_author;
	$gp_settings['meta_cats'] = $theme_blog_cats_;
	$gp_settings['meta_comments'] = $theme_blog_comments;
	$gp_settings['meta_tags'] = $theme_blog_tags;

	// Category IDs
	if(get_post_meta(get_the_ID(), 'ghostpool_blog_cats', true)) {
		$gp_settings['cats'] = get_post_meta(get_the_ID(), 'ghostpool_blog_cats', true);
	} else {
		$gp_settings['cats'] = $theme_blog_cats;
	}

	// Sidebar
	if(get_post_meta(get_the_ID(), 'ghostpool_sidebar', true) && get_post_meta(get_the_ID(), 'ghostpool_sidebar', true) != 'Default') {
		$gp_settings['sidebar'] = get_post_meta(get_the_ID(), 'ghostpool_sidebar', true);
	} else {
		$gp_settings['sidebar'] = $theme_blog_sidebar;
	}
	
	// Posts Per Page
	if(get_post_meta(get_the_ID(), 'ghostpool_blog_posts_per_page', true)) {
		$gp_settings['posts_per_page'] = get_post_meta(get_the_ID(), 'ghostpool_blog_posts_per_page', true);
	} else {
		$gp_settings['posts_per_page'] = $theme_blog_posts_per_page;
	}
		
	// Post Display
	if(get_post_meta(get_the_ID(), 'ghostpool_blog_post_display', true) && get_post_meta(get_the_ID(), 'ghostpool_blog_post_display', true) != "Default") {
		$gp_settings['post_display'] = get_post_meta(get_the_ID(), 'ghostpool_blog_post_display', true);
	} else {
		$gp_settings['post_display'] = $theme_blog_post_display;
	}
	
	// Content Display
	if(get_post_meta(get_the_ID(), 'ghostpool_blog_content_display', true) && get_post_meta(get_the_ID(), 'ghostpool_blog_content_display', true) != "Default") {
		$gp_settings['content_display'] = get_post_meta(get_the_ID(), 'ghostpool_blog_content_display', true);
	} else {
		$gp_settings['content_display'] = $theme_blog_content_display;
	}
						
	// Column Width
	if($gp_settings['layout'] == "fullwidth") {
		$gp_settings['content_width'] = "980";
	} else {
		$gp_settings['content_width'] = "650";
	}

		

//////////////////////////////////////// Review Page ////////////////////////////////////////


} elseif(is_singular('review')) {

	$gp_settings['thumbnail_width'] = '';
	$gp_settings['thumbnail_height'] = '';
	
	// Show Image
	if(get_post_meta(get_the_ID(), 'ghostpool_show_image', true) && get_post_meta(get_the_ID(), 'ghostpool_show_image', true) != "Default") {
		$gp_settings['show_image'] = get_post_meta(get_the_ID(), 'ghostpool_show_image', true);
	} else {
		$gp_settings['show_image'] = $theme_show_review_image;
	}
	
	// Image Dimensions
	if(get_post_meta(get_the_ID(), 'ghostpool_image_width', true) && get_post_meta(get_the_ID(), 'ghostpool_image_width', true) != "") {
		$gp_settings['image_width'] = get_post_meta(get_the_ID(), 'ghostpool_image_width', true);
	} else {
		$gp_settings['image_width'] = $theme_review_image_width;
	}
	if(get_post_meta(get_the_ID(), 'ghostpool_image_height', true) != "") {
		$gp_settings['image_height'] = get_post_meta(get_the_ID(), 'ghostpool_image_height', true);
	} else {
		$gp_settings['image_height'] = $theme_review_image_height;
	}

	// Sidebar
	if(get_post_meta(get_the_ID(), 'ghostpool_sidebar', true) && get_post_meta(get_the_ID(), 'ghostpool_sidebar', true) != 'Default') {
		$gp_settings['sidebar'] = get_post_meta(get_the_ID(), 'ghostpool_sidebar', true);
	} else {
		$gp_settings['sidebar'] = $theme_review_sidebar;
	}
		
	// Layout
	if(get_post_meta(get_the_ID(), 'ghostpool_layout', true) && get_post_meta(get_the_ID(), 'ghostpool_layout', true) != "Default") {
		$gp_settings['layout'] = get_post_meta(get_the_ID(), 'ghostpool_layout', true);
	} else {
		$gp_settings['layout'] = $theme_review_layout;
	}

	// Title
	if(get_post_meta(get_the_ID(), 'ghostpool_title', true) && get_post_meta(get_the_ID(), 'ghostpool_title', true) != "Default") {
		$gp_settings['title'] = get_post_meta(get_the_ID(), 'ghostpool_title', true);
	} else {
		$gp_settings['title'] = $theme_review_title;
	} 	

	// User Voting
	if(get_post_meta(get_the_ID(), 'ghostpool_user_voting', true) && get_post_meta(get_the_ID(), 'ghostpool_user_voting', true) != "Default") {
		$gp_settings['user_voting'] = get_post_meta(get_the_ID(), 'ghostpool_user_voting', true);
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
	
	// User Comments
	if(get_post_meta(get_the_ID(), 'ghostpool_user_comments', true) && get_post_meta(get_the_ID(), 'ghostpool_user_comments', true) != "Default") {
		$gp_settings['user_comments'] = get_post_meta(get_the_ID(), 'ghostpool_user_comments', true);
	} else {
		$gp_settings['user_comments'] = $theme_user_comments;
	}

	// Comment Thumbs
	if(get_post_meta(get_the_ID(), 'ghostpool_comment_thumbs', true) && get_post_meta(get_the_ID(), 'ghostpool_comment_thumbs', true) != "Default") {
		$gp_settings['comment_thumbs'] = get_post_meta(get_the_ID(), 'ghostpool_comment_thumbs', true);
	} else {
		$gp_settings['comment_thumbs'] = $theme_review_comment_thumbs;
	}
	
	// Review Post Options
	$gp_settings['review_image_link'] = get_post_meta(get_the_ID(), 'ghostpool_review_image_link', true);
	$gp_settings['review_image_links_to'] = get_post_meta(get_the_ID(), 'ghostpool_review_image_links_to', true);
	
	// Review Container Widths
	if(get_post_meta(get_the_ID(), 'ghostpool_review_panel_left_width', true) && get_post_meta(get_the_ID(), 'ghostpool_review_panel_left_width', true)) {
		$gp_settings['review_panel_left_width'] = get_post_meta(get_the_ID(), 'ghostpool_review_panel_left_width', true);
	} else {
		$gp_settings['review_panel_left_width'] = $theme_review_panel_left_width;
	}

	// Review Tabs and Sidebar Position
	if(get_post_meta(get_the_ID(), 'ghostpool_review_positioning', true) && get_post_meta(get_the_ID(), 'ghostpool_review_positioning', true) != "Default") {
		$gp_settings['review_positioning'] = get_post_meta(get_the_ID(), 'ghostpool_review_positioning', true);
	} else {
		$gp_settings['review_positioning'] = $theme_review_positioning;
	}
	
	// Review Text Position
	if(get_post_meta(get_the_ID(), 'ghostpool_review_text_position', true) && get_post_meta(get_the_ID(), 'ghostpool_review_text_position', true) != "Default") {
		$gp_settings['review_text_position'] = get_post_meta(get_the_ID(), 'ghostpool_review_text_position', true);
	} else {
		$gp_settings['review_text_position'] = $theme_review_text_position;
	}

	// Column Width
	if($gp_settings['layout'] == "fullwidth" OR $gp_settings['review_positioning'] == "Layout 2" OR $gp_settings['review_positioning'] == "Layout 3") {
		$gp_settings['content_width'] = "980";
	} else {
		$gp_settings['content_width'] = "650";
	}
	
	// GD Star Ratings
	if(defined('STARRATING_INSTALLED')) {		
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
		
	// Review Meta						
	$gp_settings['meta_date'] = $theme_review_date;
	$gp_settings['meta_author'] = $theme_review_author;
	$gp_settings['meta_cats'] = $theme_review_cats;
	$gp_settings['meta_comments'] = $theme_review_comments;
	$gp_settings['meta_tags'] = $theme_review_tags;

	// Old Review Tags Fallback
	if($theme_old_review_tags == "0") {
		$gp_settings['review_tag_1_tax'] = "release_date";
		$gp_settings['review_tag_2_tax'] = "genre";
		$gp_settings['review_tag_3_tax'] = "rating";
		$gp_settings['review_tag_4_tax'] = "director";
		$gp_settings['review_tag_5_tax'] = "producer";
		$gp_settings['review_tag_6_tax'] = "screenwriter";
		$gp_settings['review_tag_7_tax'] = "studio";
		$gp_settings['review_tag_8_tax'] = "starring";
		$gp_settings['review_tag_9_tax'] = $theme_review_tag_9_slug;
		$gp_settings['review_tag_10_tax'] = $theme_review_tag_10_slug;
	} else {
		$gp_settings['review_tag_1_tax'] = $theme_review_tag_1_slug;
		$gp_settings['review_tag_2_tax'] = $theme_review_tag_2_slug;
		$gp_settings['review_tag_3_tax'] = $theme_review_tag_3_slug;
		$gp_settings['review_tag_4_tax'] = $theme_review_tag_4_slug;
		$gp_settings['review_tag_5_tax'] = $theme_review_tag_5_slug;
		$gp_settings['review_tag_6_tax'] = $theme_review_tag_6_slug;
		$gp_settings['review_tag_7_tax'] = $theme_review_tag_7_slug;
		$gp_settings['review_tag_8_tax'] = $theme_review_tag_8_slug;
		$gp_settings['review_tag_9_tax'] = $theme_review_tag_9_slug;
		$gp_settings['review_tag_10_tax'] = $theme_review_tag_10_slug;		
	}

	
//////////////////////////////////////// Posts ////////////////////////////////////////


} elseif(is_singular('post')) {

	$gp_settings['thumbnail_width'] = '';
	$gp_settings['thumbnail_height'] = '';
	
	// Show Image
	if(get_post_meta(get_the_ID(), 'ghostpool_show_image', true) && get_post_meta(get_the_ID(), 'ghostpool_show_image', true) != "Default") {
		$gp_settings['show_image'] = get_post_meta(get_the_ID(), 'ghostpool_show_image', true);
	} else {
		$gp_settings['show_image'] = $theme_show_post_image;
	}
	
	// Image Dimensions
	if(get_post_meta(get_the_ID(), 'ghostpool_image_width', true) && get_post_meta(get_the_ID(), 'ghostpool_image_width', true) != "") {
		$gp_settings['image_width'] = get_post_meta(get_the_ID(), 'ghostpool_image_width', true);
	} else {
		$gp_settings['image_width'] = $theme_post_image_width;
	}
	if(get_post_meta(get_the_ID(), 'ghostpool_image_height', true) != "") {
		$gp_settings['image_height'] = get_post_meta(get_the_ID(), 'ghostpool_image_height', true);
	} else {
		$gp_settings['image_height'] = $theme_post_image_height;
	}
	
	// Image Wrap
	if(get_post_meta(get_the_ID(), 'ghostpool_image_wrap', true) && get_post_meta(get_the_ID(), 'ghostpool_image_wrap', true) != "Default") {
		$gp_settings['image_wrap'] = get_post_meta(get_the_ID(), 'ghostpool_image_wrap', true);
	} else {
		$gp_settings['image_wrap'] = $theme_post_image_wrap;
	}

	// Sidebar
	if(get_post_meta(get_the_ID(), 'ghostpool_sidebar', true) && get_post_meta(get_the_ID(), 'ghostpool_sidebar', true) != 'Default') {
		$gp_settings['sidebar'] = get_post_meta(get_the_ID(), 'ghostpool_sidebar', true);
	} else {
		$gp_settings['sidebar'] = $theme_post_sidebar;
	}
		
	// Layout
	if(is_attachment()) {
		$gp_settings['layout'] = "fullwidth";
	} else {
		if(get_post_meta(get_the_ID(), 'ghostpool_layout', true) && get_post_meta(get_the_ID(), 'ghostpool_layout', true) != "Default") {
			$gp_settings['layout'] = get_post_meta(get_the_ID(), 'ghostpool_layout', true);
		} else {
			$gp_settings['layout'] = $theme_post_layout;
		}
	}

	// Title
	if(get_post_meta(get_the_ID(), 'ghostpool_title', true) && get_post_meta(get_the_ID(), 'ghostpool_title', true) != "Default") {
		$gp_settings['title'] = get_post_meta(get_the_ID(), 'ghostpool_title', true);
	} else {
		$gp_settings['title'] = $theme_post_title;
	}

	// Comment Thumbs
	if(get_post_meta(get_the_ID(), 'ghostpool_comment_thumbs', true) && get_post_meta(get_the_ID(), 'ghostpool_comment_thumbs', true) != "Default") {
		$gp_settings['comment_thumbs'] = get_post_meta(get_the_ID(), 'ghostpool_comment_thumbs', true);
	} else {
		$gp_settings['comment_thumbs'] = $theme_post_comment_thumbs;
	}
	
	// Post Meta						
	$gp_settings['meta_date'] = $theme_post_date;
	$gp_settings['meta_author'] = $theme_post_author;
	$gp_settings['meta_cats'] = $theme_post_cats;
	$gp_settings['meta_comments'] = $theme_post_comments;
	$gp_settings['meta_tags'] = $theme_post_tags;

	
//////////////////////////////////////// Pages, Attachments, 404 etc. ////////////////////////////////////////


} else {

	if(function_exists('is_woocommerce') && is_shop()) {
		$post_id = get_option('woocommerce_shop_page_id'); 
	} else {
		$post_id = get_the_ID(); 
	}
	
	$gp_settings['thumbnail_width'] = '';
	$gp_settings['thumbnail_height'] = '';
	
	// Show Image
	if(get_post_meta($post_id, 'ghostpool_show_image', true) && get_post_meta($post_id, 'ghostpool_show_image', true) != "Default") {
		$gp_settings['show_image'] = get_post_meta($post_id, 'ghostpool_show_image', true);
	} else {
		$gp_settings['show_image'] = $theme_show_page_image;
	}
	
	// Image Dimensions
	if(get_post_meta($post_id, 'ghostpool_image_width', true) && get_post_meta($post_id, 'ghostpool_image_width', true) != "") {
		$gp_settings['image_width'] = get_post_meta($post_id, 'ghostpool_image_width', true);
	} else {
		$gp_settings['image_width'] = $theme_page_image_width;
	}
	if(get_post_meta($post_id, 'ghostpool_image_height', true) != "") {
		$gp_settings['image_height'] = get_post_meta($post_id, 'ghostpool_image_height', true);
	} else {
		$gp_settings['image_height'] = $theme_page_image_height;
	}
	
	// Image Wrap
	if(get_post_meta($post_id, 'ghostpool_image_wrap', true) && get_post_meta($post_id, 'ghostpool_image_wrap', true) != "Default") {
		$gp_settings['image_wrap'] = get_post_meta($post_id, 'ghostpool_image_wrap', true);
	} else {
		$gp_settings['image_wrap'] = $theme_page_image_wrap;
	}

	// Sidebar
	if(get_post_meta($post_id, 'ghostpool_sidebar', true) && get_post_meta($post_id, 'ghostpool_sidebar', true) != 'Default') {
		$gp_settings['sidebar'] = get_post_meta($post_id, 'ghostpool_sidebar', true);
	} else {
		$gp_settings['sidebar'] = $theme_page_sidebar;
	}
		
	// Layout
	if(get_post_meta($post_id, 'ghostpool_layout', true) && get_post_meta($post_id, 'ghostpool_layout', true) != "Default") {
		$gp_settings['layout'] = get_post_meta($post_id, 'ghostpool_layout', true);
	} else {
		$gp_settings['layout'] = $theme_page_layout;
	}

	// Title
	if(get_post_meta($post_id, 'ghostpool_title', true) && get_post_meta($post_id, 'ghostpool_title', true) != "Default") {
		$gp_settings['title'] = get_post_meta($post_id, 'ghostpool_title', true);
	} else {
		$gp_settings['title'] = $theme_page_title;
	} 

	// Comment Thumbs
	if(get_post_meta($post_id, 'ghostpool_comment_thumbs', true) && get_post_meta($post_id, 'ghostpool_comment_thumbs', true) != "Default") {
		$gp_settings['comment_thumbs'] = get_post_meta($post_id, 'ghostpool_comment_thumbs', true);
	} else {
		$gp_settings['comment_thumbs'] = $theme_page_comment_thumbs;
	}
		
	// Page Meta						
	$gp_settings['meta_date'] = $theme_page_date;
	$gp_settings['meta_author'] = $theme_page_author;
	$gp_settings['meta_comments'] = $theme_page_comments;
		
}

?>