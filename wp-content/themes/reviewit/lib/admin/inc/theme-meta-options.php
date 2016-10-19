<?php // Meta Options (WPShout.com)
	
require(gp_inc . 'options.php');
	
add_action('admin_menu', 'gp_create_meta_box');
add_action('save_post', 'gp_save_meta_data');

function gp_create_meta_box() {
	add_meta_box('gp-theme-options', __('Post Settings', 'gp_lang'), 'gp_meta_boxes', 'post', 'normal', 'core');
	add_meta_box('gp-theme-options', __('Page Settings', 'gp_lang'), 'gp_meta_boxes', 'page', 'normal', 'core');
	add_meta_box('gp-theme-options', __('Slide Settings', 'gp_lang'), 'gp_meta_boxes', 'slide', 'normal', 'core');
	add_meta_box('gp-theme-options', __('Review Settings', 'gp_lang'), 'gp_meta_boxes', 'review', 'normal', 'core');
}


//////////////////////////////////////// Post Settings ////////////////////////////////////////


function gp_post_meta_boxes() {

	$meta_boxes = array(

	'thumbnail_settings' => array('name' => 'thumbnail_settings', 'type' => 'open', 'desc' => __('Controls the thumbnail used on category, archive, tag and search result pages.', 'gp_lang'), 'title' => __('Thumbnail Settings', 'gp_lang')),
		
		'ghostpool_thumbnail_width' => array('name' => 'ghostpool_thumbnail_width', 'title' => __('Thumbnail Width', 'gp_lang'), 'desc' => __('The width to crop the thumbnail to (set to 0 to have a proportionate width).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),
				
		'ghostpool_thumbnail_height' => array('name' => 'ghostpool_thumbnail_height', 'title' => __('Thumbnail Height', 'gp_lang'), 'desc' => __('The height to crop the thumbnail to (set to 0 to have a proportionate height).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),

	array('type' => 'separator'),		
	array('type' => 'close'),
	
	'image_settings' => array('name' => 'image_settings', 'type' => 'open', 'desc' => __('Controls the featured image displayed within this page.', 'gp_lang'), 'title' => __('Image Settings', 'gp_lang')),
	
		'ghostpool_show_image' => array('name' => 'ghostpool_show_image', 'title' => __('Featured Image', 'gp_lang'), 'desc' => __('Choose whether to display the featured image within your page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),	
		
		'ghostpool_image_width' => array('name' => 'ghostpool_image_width', 'title' => __('Image Width', 'gp_lang'), 'desc' => __('The width to crop the image to (set to 0 to have a proportionate width).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),
				
		'ghostpool_image_height' => array('name' => 'ghostpool_image_height', 'title' => __('Image Height', 'gp_lang'), 'desc' => __('The height to crop the image to (set to 0 to have a proportionate height).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),

		'ghostpool_image_wrap' => array('name' => 'ghostpool_image_wrap', 'title' => __('Image Wrap', 'gp_lang'), 'desc' => __('Choose whether the page content wraps around the featured image.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Enable' => __('Enable', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),	
		
	array('type' => 'separator'),		
	array('type' => 'close'),
	
	'format_settings' => array('name' => 'format_settings', 'type' => 'open', 'desc' => __('General formatting settings.', 'gp_lang'), 'title' => __('Format Settings', 'gp_lang')),

		'ghostpool_sidebar' => array('name' => 'ghostpool_sidebar', 'title' => __('Sidebar', 'gp_lang'), 'desc' => __('Choose which sidebar to display on this page.', 'gp_lang'), 'std' => 'Default', 'type' => 'select_sidebar'),
		
		'ghostpool_layout' => array('name' => 'ghostpool_layout', 'title' => __('Layout', 'gp_lang'), 'desc' => __('Choose the page layout.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),

		'ghostpool_title' => array('name' => 'ghostpool_title', 'title' => __('Title', 'gp_lang'), 'desc' => __('Choose whether to display the page title.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
				
		'ghostpool_skin' => array('name' => 'ghostpool_skin', 'title' => __('Page Skin', 'gp_lang'), 'desc' => __('Choose the page skin.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'dark' => __('Dark', 'gp_lang'), 'light' => __('Light', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
		
		array('type' => 'divider'),
		
		'ghostpool_custom_stylesheet' => array('name' => 'ghostpool_custom_stylesheet', 'title' => __('Custom Stylesheet URL', 'gp_lang'), 'desc' => __('Enter the relative URL to your custom stylesheet e.g. <code>lib/css/custom-style.css</code>.', 'gp_lang'), 'type' => 'text'),	

      	'ghostpool_comment_thumbs' => array('name' => 'ghostpool_comment_thumbs', 'title' => __('Comment Thumbs', 'gp_lang'), 'desc' => __('Choose whether users can rate other comments on this review.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Users can rate other comments' => __('Users can rate other comments', 'gp_lang'), 'Users cannot rate other comments' => __('Users cannot rate other comments', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
      			
	array('type' => 'close'),	
	array('type' => 'clear'),
	
	);

	return apply_filters('gp_post_meta_boxes', $meta_boxes);
}


//////////////////////////////////////// Page Settings ////////////////////////////////////////


function gp_page_meta_boxes() {

	$meta_boxes = array(

	'thumbnail_settings' => array('name' => 'thumbnail_settings', 'type' => 'open', 'desc' => __('Controls the thumbnail used on category, archive, tag and search result pages.', 'gp_lang'), 'title' => __('Thumbnail Settings', 'gp_lang')),
		
		'ghostpool_thumbnail_width' => array('name' => 'ghostpool_thumbnail_width', 'title' => __('Thumbnail Width', 'gp_lang'), 'desc' => __('The width to crop the thumbnail to (set to 0 to have a proportionate width).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),
				
		'ghostpool_thumbnail_height' => array('name' => 'ghostpool_thumbnail_height', 'title' => __('Thumbnail Height', 'gp_lang'), 'desc' => __('The height to crop the thumbnail to (set to 0 to have a proportionate height).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),

	array('type' => 'separator'),		
	array('type' => 'close'),
	
	'image_settings' => array('name' => 'image_settings', 'type' => 'open', 'desc' => __('Controls the featured image displayed within this page.', 'gp_lang'), 'title' => __('Image Settings', 'gp_lang')),

		'ghostpool_show_image' => array('name' => 'ghostpool_show_image', 'title' => __('Featured Image', 'gp_lang'), 'desc' => __('Choose whether to display the featured image within your page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),	
		
		'ghostpool_image_width' => array('name' => 'ghostpool_image_width', 'title' => __('Image Width', 'gp_lang'), 'desc' => __('The width to crop the image to (set to 0 to have a proportionate width).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),
				
		'ghostpool_image_height' => array('name' => 'ghostpool_image_height', 'title' => __('Image Height', 'gp_lang'), 'desc' => __('The height to crop the image to (set to 0 to have a proportionate height).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),

		'ghostpool_image_wrap' => array('name' => 'ghostpool_image_wrap', 'title' => __('Image Wrap', 'gp_lang'), 'desc' => __('Choose whether the page content wraps around the featured image.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Enable' => __('Enable', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),	

	array('type' => 'separator'),		
	array('type' => 'close'),

	'blog_settings' => array('name' => 'blog_settings', 'type' => 'open', 'desc' => __('Settings when using the Blog page template.', 'gp_lang'), 'title' => __('Blog Settings', 'gp_lang')),
		
		'ghostpool_blog_cats' => array( 'name' => 'ghostpool_blog_cats', 'title' => __('Category IDs', 'ghostpool'), 'desc' => 'Enter the IDs of the <a href="'.admin_url('edit-tags.php?taxonomy=category').'">post categories</a> you want to display on the blog page (leave blank to display all categories).', 'type' => 'text' ),

		'ghostpool_blog_posts_per_page' => array( 'name' => 'ghostpool_blog_posts_per_page', 'title' => __('Posts Per Page', 'ghostpool'), 'desc' => 'The number of posts per page on the blog page.', 'type' => 'text', 'size' => 'small'),

		'ghostpool_blog_post_display' => array( 'name' => 'ghostpool_blog_post_display', 'title' => __('Post Display', 'ghostpool'), 'desc' => 'Choose how to display your posts on the blog page.', 'options' => array('Default' => __('Default', 'gp_lang'), 'List' => __('List', 'gp_lang'), 'Compact Boxes' => __('Compact Boxes', 'gp_lang'), 'Extended Boxes' => __('Extended Boxes', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),	
		
		'ghostpool_blog_content_display' => array( 'name' => 'ghostpool_blog_content_display', 'title' => __('Content Display', 'ghostpool'), 'desc' => 'Choose whether to display the full post content or an excerpt on the blog page.', 'options' => array('Default' => __('Default', 'gp_lang'), 'Excerpt' => __('Excerpt', 'gp_lang'), 'Full Content' => __('Full Content', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),	

	array('type' => 'separator'),		
	array('type' => 'close'),
	
	'format_settings' => array('name' => 'format_settings', 'type' => 'open', 'desc' => __('General formatting settings.', 'gp_lang'), 'title' => __('Format Settings', 'gp_lang')),

		'ghostpool_sidebar' => array('name' => 'ghostpool_sidebar', 'title' => __('Sidebar', 'gp_lang'), 'desc' => __('Choose which sidebar to display on this page.', 'gp_lang'), 'std' => 'Default', 'type' => 'select_sidebar'),
		
		'ghostpool_layout' => array('name' => 'ghostpool_layout', 'title' => __('Layout', 'gp_lang'), 'desc' => __('Choose the page layout.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),

		'ghostpool_title' => array('name' => 'ghostpool_title', 'title' => __('Title', 'gp_lang'), 'desc' => __('Choose whether to display the page title.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
				
		'ghostpool_skin' => array('name' => 'ghostpool_skin', 'title' => __('Page Skin', 'gp_lang'), 'desc' => __('Choose the page skin.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'dark' => __('Dark', 'gp_lang'), 'light' => __('Light', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
		
		array('type' => 'divider'),
		
		'ghostpool_custom_stylesheet' => array('name' => 'ghostpool_custom_stylesheet', 'title' => __('Custom Stylesheet URL', 'gp_lang'), 'desc' => __('Enter the relative URL to your custom stylesheet e.g. <code>lib/css/custom-style.css</code>.', 'gp_lang'), 'type' => 'text'),
		
		'ghostpool_comment_thumbs' => array('name' => 'ghostpool_comment_thumbs', 'title' => __('Comment Thumbs', 'gp_lang'), 'desc' => __('Choose whether users can rate other comments on this review.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Users can rate other comments' => __('Users can rate other comments', 'gp_lang'), 'Users cannot rate other comments' => __('Users cannot rate other comments', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
		
	array('type' => 'close'),	
	array('type' => 'clear'),
	
	);

	return apply_filters('gp_page_meta_boxes', $meta_boxes);
}


//////////////////////////////////////// Review Settings ////////////////////////////////////////


function gp_review_meta_boxes() {

	$meta_boxes = array(

	'thumbnail_settings' => array('name' => 'thumbnail_settings', 'type' => 'open', 'desc' => __('Controls the thumbnail used on category, archive, tag and search result pages.', 'gp_lang'), 'title' => __('Thumbnail Settings', 'gp_lang')),
		
		'ghostpool_thumbnail_width' => array('name' => 'ghostpool_thumbnail_width', 'title' => __('Thumbnail Width', 'gp_lang'), 'desc' => __('The width to crop the thumbnail to (set to 0 to have a proportionate width).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),
				
		'ghostpool_thumbnail_height' => array('name' => 'ghostpool_thumbnail_height', 'title' => __('Thumbnail Height', 'gp_lang'), 'desc' => __('The height to crop the thumbnail to (set to 0 to have a proportionate height).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),

	array('type' => 'separator'),		
	array('type' => 'close'),
	
	'image_settings' => array('name' => 'image_settings', 'type' => 'open', 'desc' => __('Controls the featured image displayed within this page.', 'gp_lang'), 'title' => __('Image Settings', 'gp_lang')),
	
		'ghostpool_show_image' => array('name' => 'ghostpool_show_image', 'title' => __('Featured Image', 'gp_lang'), 'desc' => __('Choose whether to display the featured image within your page.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),	
		
		'ghostpool_image_width' => array('name' => 'ghostpool_image_width', 'title' => __('Image Width', 'gp_lang'), 'desc' => __('The width to crop the image to (set to 0 to have a proportionate width).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),
				
		'ghostpool_image_height' => array('name' => 'ghostpool_image_height', 'title' => __('Image Height', 'gp_lang'), 'desc' => __('The height to crop the image to (set to 0 to have a proportionate height).', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),

		'ghostpool_lightbox_content' => array('name' => 'ghostpool_lightbox_content', 'title' => __('Lightbox Content', 'gp_lang'), 'desc' => __('Upload images/audio/videos that will be opened in the lightbox.', 'gp_lang'), 'type' => 'gallery'),
		
	array('type' => 'separator'),		
	array('type' => 'close'),

	'review_settings' => array('name' => 'review_settings', 'type' => 'open', 'desc' => __('Controls the review settings for this page.', 'gp_lang'), 'title' => __('Review Settings', 'gp_lang')),
	
		'ghostpool_search_tags' => array( 'name' => 'ghostpool_search_tags', 'title' => __('Search Tags', 'gp_lang'), 'desc' => "", 'type' => 'search_tags'),

 		'ghostpool_review_positioning' => array('name' => 'ghostpool_review_positioning', 'title' => __('Review Tabs and Sidebar Position', 'gp_lang'), 'desc' => __('Choose the position of the review tabs and sidebar on review pages.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Layout 1' => __('Sidebar Next To Review Tags / Tabs Below Review Tags', 'gp_lang'), 'Layout 2' => __('Tabs & Sidebar Below Review Tags', 'gp_lang'), 'Layout 3' => __('Sidebar Below Review Tags / Tabs Next To Review Tags', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),

 		'ghostpool_review_text_position' => array('name' => 'ghostpool_review_text_position', 'title' => __('Review Text Position', 'gp_lang'), 'desc' => __('Choose the position of the review text on reviews .', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Within Review Tabs' => __('Within Review Tabs', 'gp_lang'), 'Below Review Tags' => __('Below Review Tags', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
        
		'ghostpool_review_panel_left_width' => array('name' => 'ghostpool_review_panel_left_width', 'title' => __('Left Review Panel Width', 'gp_lang'), 'desc' => __('The width of the review panel containing the review image and ratings.', 'gp_lang'), 'type' => 'text', 'size' => 'small', 'details' => 'px'),
		
 		'ghostpool_user_voting' => array('name' => 'ghostpool_user_voting', 'title' => __('User Voting', 'gp_lang'), 'desc' => __('Choose how users can vote on this review.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Vote with or without posting a comment' => __('Vote with or without posting a comment', 'gp_lang'), 'Vote without posting a comment' => __('Vote without posting a comment', 'gp_lang'), 'Vote only when posting a comment' => __('Vote only when posting a comment', 'gp_lang'), 'Users cannot vote' => __('Users cannot vote', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),

		array('type' => 'divider'),
		
      	'ghostpool_user_comments' => array('name' => 'ghostpool_user_comments', 'title' => __('User Comments', 'gp_lang'), 'desc' => __('Choose whether users can post unlimited comments on this review (only works with registered users).', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Unlimited Comments' => __('Unlimited Comments', 'gp_lang'), 'One Comment' => __('One Comment', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
		
      	'ghostpool_comment_thumbs' => array('name' => 'ghostpool_comment_thumbs', 'title' => __('Comment Thumbs', 'gp_lang'), 'desc' => __('Choose whether users can rate other comments on this review.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Users can rate other comments' => __('Users can rate other comments', 'gp_lang'), 'Users cannot rate other comments' => __('Users cannot rate other comments', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
		
		'ghostpool_site_multi_rating_id' => array( 'name' => 'ghostpool_site_multi_rating_id', 'title' => __('Site Rating Multi Set ID', 'gp_lang'), 'desc' => __('Enter the ID of your site rating multi set template that was created <a href="'.admin_url('admin.php?page=gd-star-rating-multi-sets').'">here</a>.', 'gp_lang'), 'type' => 'text', 'size' => 'small'),	
		
		'ghostpool_user_multi_rating_id' => array( 'name' => 'ghostpool_user_multi_rating_id', 'title' => __('User Rating Multi Set ID', 'gp_lang'), 'desc' => __('Enter the ID of your user rating multi set template that was created <a href="'.admin_url('admin.php?page=gd-star-rating-multi-sets').'">here</a>.', 'gp_lang'), 'type' => 'text', 'size' => 'small'),
		
		array('type' => 'divider'),
			
		'ghostpool_link_title' => array('name' => 'ghostpool_link_title', 'title' => __('Link Title', 'gp_lang'), 'desc' => "", 'type' => 'link_title'),
		'ghostpool_link_url' => array('name' => 'ghostpool_link_url', 'title' => __('Tag/Page Slug or Page URL', 'gp_lang'), 'desc' => "", 'type' => 'link_title', 'link_url' => true), 'ghostpool_link_type' => array('name' => 'ghostpool_link_type', 'title' => __('Tab Type', 'gp_lang'), 'desc' => "", 'type' => 'link_title', 'link_type_title' => "hide"),	

		array('type' => 'clear'),
			
		'ghostpool_tab_title_0' => array('name' => 'ghostpool_tab_title_0', 'desc' => "", 'std' => __('Review', 'gp_lang'), 'type' => 'link_text', 'link_number' => '1'),
		
		array('type' => 'clear'),
		
		'ghostpool_tab_title_1' => array('name' => 'ghostpool_tab_title_1', 'desc' => "", 'type' => 'link_text', 'link_number' => '2'),
		'ghostpool_tab_id_1' => array('name' => 'ghostpool_tab_id_1', 'type' => 'link_text'), 'ghostpool_tab_type_1' => array('name' => 'ghostpool_tab_type_1', 'type' => 'link_select', 'options' => array('List Of Articles' => __('List Of Articles', 'gp_lang'), 'Page' => __('Page', 'gp_lang'), 'Media' => __('Media', 'gp_lang'))),

		array('type' => 'clear'),

		'ghostpool_tab_title_2' => array('name' => 'ghostpool_tab_title_2', 'type' => 'link_text', 'link_number' => '3'),
		'ghostpool_tab_id_2' => array('name' => 'ghostpool_tab_id_2', 'type' => 'link_text'), 'ghostpool_tab_type_2' => array('name' => 'ghostpool_tab_type_2', 'type' => 'link_select', 'options' => array('List Of Articles' => __('List Of Articles', 'gp_lang'), 'Page' => __('Page', 'gp_lang'), 'Media' => __('Media', 'gp_lang'))),

		array('type' => 'clear'),
		
		'ghostpool_tab_title_3' => array('name' => 'ghostpool_tab_title_3', 'type' => 'link_text', 'link_number' => '4'),
		'ghostpool_tab_id_3' => array('name' => 'ghostpool_tab_id_3', 'type' => 'link_text'), 'ghostpool_tab_type_3' => array('name' => 'ghostpool_tab_type_3', 'type' => 'link_select', 'options' => array('List Of Articles' => __('List Of Articles', 'gp_lang'), 'Page' => __('Page', 'gp_lang'), 'Media' => __('Media', 'gp_lang'))),
		
		array('type' => 'clear'),
		
		'ghostpool_tab_title_4' => array('name' => 'ghostpool_tab_title_4', 'type' => 'link_text', 'link_number' => '5'),
		'ghostpool_tab_id_4' => array('name' => 'ghostpool_tab_id_4', 'type' => 'link_text'), 'ghostpool_tab_type_4' => array('name' => 'ghostpool_tab_type_4', 'type' => 'link_select', 'options' => array('List Of Articles' => __('List Of Articles', 'gp_lang'), 'Page' => __('Page', 'gp_lang'), 'Media' => __('Media', 'gp_lang'))),
		
		array('type' => 'clear'),
			
		'ghostpool_tab_title_5' => array('name' => 'ghostpool_tab_title_5', 'type' => 'link_text', 'link_number' => '6'),
		'ghostpool_tab_id_5' => array('name' => 'ghostpool_tab_id_5', 'type' => 'link_text'), 'ghostpool_tab_type_5' => array('name' => 'ghostpool_tab_type_5', 'type' => 'link_select', 'options' => array('List Of Articles' => __('List Of Articles', 'gp_lang'), 'Page' => __('Page', 'gp_lang'), 'Media' => __('Media', 'gp_lang'))),
		
		array('type' => 'clear'),
		
		'ghostpool_tab_title_6' => array('name' => 'ghostpool_tab_title_6', 'type' => 'link_text', 'link_number' => '7'),
		'ghostpool_tab_id_6' => array('name' => 'ghostpool_tab_id_6', 'type' => 'link_text'), 'ghostpool_tab_type_6' => array('name' => 'ghostpool_tab_type_6', 'type' => 'link_select', 'options' => array('List Of Articles' => __('List Of Articles', 'gp_lang'), 'Page' => __('Page', 'gp_lang'), 'Media' => __('Media', 'gp_lang'))),

		array('type' => 'clear'),

		'ghostpool_tab_title_7' => array('name' => 'ghostpool_tab_title_7', 'type' => 'link_text', 'link_number' => '8'),
		'ghostpool_tab_id_7' => array('name' => 'ghostpool_tab_id_7', 'type' => 'link_text'), 'ghostpool_tab_type_7' => array('name' => 'ghostpool_tab_type_7', 'type' => 'link_select', 'options' => array('List Of Articles' => __('List Of Articles', 'gp_lang'), 'Page' => __('Page', 'gp_lang'), 'Media' => __('Media', 'gp_lang'))),

		array('type' => 'clear'),

		'ghostpool_tab_title_8' => array('name' => 'ghostpool_tab_title_8', 'type' => 'link_text', 'link_number' => '9'),
		'ghostpool_tab_id_8' => array('name' => 'ghostpool_tab_id_8', 'type' => 'link_text'), 'ghostpool_tab_type_8' => array('name' => 'ghostpool_tab_type_8', 'type' => 'link_select', 'options' => array('List Of Articles' => __('List Of Articles', 'gp_lang'), 'Page' => __('Page', 'gp_lang'), 'Media' => __('Media', 'gp_lang'))),

		array('type' => 'clear'),
			
		'ghostpool_tab_title_9' => array('name' => 'ghostpool_tab_title_9', 'type' => 'link_text', 'link_number' => '10'),
		'ghostpool_tab_id_9' => array('name' => 'ghostpool_tab_id_9', 'type' => 'link_text'), 'ghostpool_tab_type_9' => array('name' => 'ghostpool_tab_type_9', 'type' => 'link_select', 'options' => array('List Of Articles' => __('List Of Articles', 'gp_lang'), 'Page' => __('Page', 'gp_lang'), 'Media' => __('Media', 'gp_lang'))),

		array('type' => 'clear'),

		'ghostpool_tab_title_10' => array('name' => 'ghostpool_tab_title_10', 'type' => 'link_text', 'link_number' => '11'),
		'ghostpool_tab_id_10' => array('name' => 'ghostpool_tab_id_10', 'type' => 'link_text'), 'ghostpool_tab_type_10' => array('name' => 'ghostpool_tab_type_10', 'type' => 'link_select', 'options' => array('List Of Articles' => __('List Of Articles', 'gp_lang'), 'Page' => __('Page', 'gp_lang'), 'Media' => __('Media', 'gp_lang'))),

	array('type' => 'separator'),		
	array('type' => 'close'),
	
	'format_settings' => array('name' => 'format_settings', 'type' => 'open', 'desc' => __('General formatting settings.', 'gp_lang'), 'title' => __('Format Settings', 'gp_lang')),

		'ghostpool_sidebar' => array('name' => 'ghostpool_sidebar', 'title' => __('Sidebar', 'gp_lang'), 'desc' => __('Choose which sidebar to display on this page.', 'gp_lang'), 'std' => 'Default', 'type' => 'select_sidebar'),
		
		'ghostpool_layout' => array('name' => 'ghostpool_layout', 'title' => __('Layout', 'gp_lang'), 'desc' => __('Choose the page layout.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),

		'ghostpool_title' => array('name' => 'ghostpool_title', 'title' => __('Title', 'gp_lang'), 'desc' => __('Choose whether to display the page title.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
						
		'ghostpool_skin' => array('name' => 'ghostpool_skin', 'title' => __('Page Skin', 'gp_lang'), 'desc' => __('Choose the page skin.', 'gp_lang'), 'options' => array('Default' => __('Default', 'gp_lang'), 'dark' => __('Dark', 'gp_lang'), 'light' => __('Light', 'gp_lang')), 'std' => 'Default', 'type' => 'select'),
		
		array('type' => 'divider'),
		
		'ghostpool_custom_stylesheet' => array('name' => 'ghostpool_custom_stylesheet', 'title' => __('Custom Stylesheet URL', 'gp_lang'), 'desc' => __('Enter the relative URL to your custom stylesheet e.g. <code>lib/css/custom-style.css</code>.', 'gp_lang'), 'type' => 'text'),
		
	array('type' => 'close'),	
	array('type' => 'clear'),
	
	);

	return apply_filters('gp_meta_boxes', $meta_boxes);
}


//////////////////////////////////////// Slide Settings ////////////////////////////////////////
	 
	 
function gp_slide_meta_boxes() {

	$meta_boxes = array(
	
	'general_settings' => array('name' => 'general_settings', 'type' => 'open', 'desc' => __('General product slide settings.', 'gp_lang'), 'title' => __('Format Settings', 'gp_lang')),
		
		'ghostpool_slide_url' => array('name' => 'ghostpool_slide_url', 'title' => __('Slide URL', 'gp_lang'), 'desc' => __('Enter the URL you want your slide to link to.', 'gp_lang'), 'type' => 'text'),

		'ghostpool_slide_link_type' => array('name' => 'ghostpool_slide_link_type', 'title' => __('Link Type', 'gp_lang'), 'desc' => __('Choose how your slide links to the URL you provided to the left.', 'gp_lang'), 'options' => array('Page' => __('Page', 'gp_lang'), 'Lightbox Image' => __('Lightbox Image', 'gp_lang'), 'Lightbox Video' => __('Lightbox Video', 'gp_lang'), 'None' => __('None', 'gp_lang')), 'std' => 'Page', 'type' => 'select'),
				
		'ghostpool_slide_read_on' => array( 'name' => 'ghostpool_slide_read_on', 'title' => __('Read On Button', 'gp_lang'), 'desc' => __('Check this option to display a "Read On" button on this slide.', 'gp_lang'), 'type' => 'checkbox'),

	array('type' => 'separator'),		
	array('type' => 'close'),
	
	'video_settings' => array('name' => 'video_settings', 'type' => 'open', 'desc' => __('The settings for a video used in this slide.', 'gp_lang'), 'title' => __('Video Settings', 'gp_lang')),
	
		'ghostpool_slide_video' => array('name' => 'ghostpool_slide_video', 'title' => __('Video URL', 'gp_lang'), 'desc' => __('The URL of your video file (YouTube/Vimeo/FLV/MP4/M4V/MP3).', 'gp_lang'), 'type' => 'upload'),

		'ghostpool_webm_mp4_slide_video' => array('name' => 'ghostpool_webm_mp4_slide_video', 'title' => __('HTML5 Video URL (Safari/Chrome)', 'gp_lang'), 'desc' => __('Enter your HTML5 video URL for Safari/Chrome (WEBM/MP4).', 'gp_lang'), 'type' => 'upload'),

		'ghostpool_ogg_slide_video' => array('name' => 'ghostpool_ogg_slide_video', 'title' => __('HTML5 Video URL (FireFox/Opera)', 'gp_lang'), 'desc' => __('Enter your HTML5 video URL for FireFox/Opera (OGG/OGV).', 'gp_lang'), 'type' => 'upload'),
				
		'ghostpool_slide_autostart_video' => array('name' => 'ghostpool_slide_autostart_video', 'title' => __('Autostart Video', 'gp_lang'), 'desc' => __('Plays the video automatically when the slide comes into view (works in the first slide only).', 'gp_lang'), 'type' => 'checkbox'),

		array('type' => 'divider'),
		
		'ghostpool_slide_video_priority' => array('name' => 'ghostpool_slide_video_priority', 'title' => __('Video Priority', 'gp_lang'), 'desc' => __('If you have provided both flash and HTML5 videos, select which one will take priority if the browser can play both.', 'gp_lang'), 'options' => array('Flash' => __('Flash', 'gp_lang'), 'HTML5' => __('HTML5', 'gp_lang')), 'std' => 'Flash', 'type' => 'select'),
		
		'ghostpool_slide_video_controls' => array('name' => 'ghostpool_slide_video_controls', 'title' => __('Video Controls', 'gp_lang'), 'desc' => __('Choose how to display the video controls (does not apply to YouTube and Vimeo videos).', 'gp_lang'), 'options' => array('None' => __('None', 'gp_lang'), 'Bottom' => __('Bottom', 'gp_lang'), 'Over' => __('Over', 'gp_lang')), 'std' => 'None', 'type' => 'select'),
		
	array('type' => 'close'),	
	array('type' => 'clear'),
	
	);

	return apply_filters('gp_slide_meta_boxes', $meta_boxes);
}


//////////////////////////////////////// Meta Fields ////////////////////////////////////////


function gp_meta_boxes() {
	global $post;
	
	if(get_post_type() == 'post') {
		$meta_boxes = gp_post_meta_boxes();	
	} elseif(get_post_type() == 'review') {
		$meta_boxes = gp_review_meta_boxes();			
	} elseif(get_post_type() == 'slide') {
		$meta_boxes = gp_slide_meta_boxes();		
	} else {
		$meta_boxes = gp_page_meta_boxes();
	}	
		

	foreach ($meta_boxes as $meta) :
	if(isset($meta['name'])) { $value = get_post_meta($post->ID, $meta['name'], true); }
	if($meta['type'] == 'text')
		get_meta_text($meta, $value);
	elseif($meta['type'] == 'upload')
		get_meta_upload($meta, $value);	
	elseif($meta['type'] == 'textarea')
		get_meta_textarea($meta, $value);
	elseif($meta['type'] == 'select')
		get_meta_select($meta, $value);
	elseif($meta['type'] == 'select_sidebar')
		get_meta_select_sidebar($meta, $value);			
	elseif($meta['type'] == 'checkbox')
		get_meta_checkbox($meta, $value);			
	elseif($meta['type'] == 'open')
		get_meta_open($meta, $value);		
	elseif($meta['type'] == 'close')
		get_meta_close($meta, $value);
	elseif($meta['type'] == 'divider')
		get_meta_divider($meta, $value);
	elseif ($meta['type'] == 'separator')
		get_meta_separator($meta, $value);				
	elseif($meta['type'] == 'clear')
		get_meta_clear($meta, $value);
	elseif ($meta['type'] == 'link_title')
		get_meta_link_title($meta, $value);
	elseif ($meta['type'] == 'link_text')
		get_meta_link_text($meta, $value);
	elseif ($meta['type'] == 'link_select')
		get_meta_link_select($meta, $value);			
	elseif ($meta['type'] == 'gallery')
		get_meta_gallery($meta, $value);
	elseif($meta['type'] == 'search_tags')
		get_meta_search_tags($meta, $value);			
	endforeach;
	
} function get_meta_open($args = array(), $value = false){
extract($args); ?>
	
	<div class="meta-settings" id="<?php echo $name; ?>">
	
		<h2><?php echo $title; ?></h2>
		<div class="clear"></div>
	
		<?php if($desc) { ?><div class="meta-settings-desc"><?php echo $desc; ?></div><div class="clear"></div><?php } ?>
		
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />		
	
	
<?php } function get_meta_close($args = array(), $value = false){
extract($args); ?>
	
	</div><div class="clear"></div>
	
	<input type="hidden" name="_noncename" id="_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />		
	
	
<?php } function get_meta_divider($args = array(), $value = false){
extract($args); ?>

	<div class="clear"></div>
	<div class="divider"></div>
	<input type="hidden" name="_noncename" id="_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />		


<?php } function get_meta_separator($args = array(), $value = false){
extract($args); ?>
	
	<div class="clear"></div>
	<div class="separator"></div>
	<input type="hidden" name="_noncename" id="_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />		
	
	
<?php } function get_meta_clear($args = array(), $value = false){
extract($args); ?>
	
	<div class="clear"></div>
	<input type="hidden" name="_noncename" id="_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />		
	
	
<?php } function get_meta_text($args = array(), $value = false){
extract($args); global $post; ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box<?php if(isset($size) && $size == "small") { ?> text-small<?php } ?>">
		<?php if(isset($title)) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo esc_html($value, 1); ?>" size="<?php if(isset($size) && $size == "small") { ?>3<?php } else { ?>30<?php } ?>" /><?php if(isset($details)) { ?> <span><?php echo $details; ?></span><?php } ?>
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>
	

<?php } function get_meta_upload($args = array(), $value = false) {
extract($args); global $post; ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box uploader">
		<?php if(isset($title)) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" class="upload" value="<?php echo esc_html($value, 1); ?>" size="30" />
		<input type="button" id="<?php echo $name; ?>_button" class="upload-image-button button" value="<?php _e('Upload', 'gp_lang'); ?>" />
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>
	
	
<?php } function get_meta_select($args = array(), $value = false) {
extract($args); ?>
	
	<div id="meta-box-<?php echo $name; ?>" class="meta-box">
		<?php if(isset($title)) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
		<?php foreach($options as $key=>$option) : ?>
			<?php if($value != "") { ?>
				<option value="<?php echo $key; ?>" <?php if(htmlentities($value, ENT_QUOTES) == $key) echo ' selected="selected"'; ?>><?php echo $option; ?></option>
			<?php } else { ?>
				<option value="<?php echo $key; ?>" <?php if($std == $key) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
			<?php } ?>	
		<?php endforeach; ?>
		</select>
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>


<?php } function get_meta_select_sidebar($args = array(), $value = false) {
extract($args); global $post, $wp_registered_sidebars; ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box">
		<?php if(isset($title)) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<option value="Default" <?php if(htmlentities($value, ENT_QUOTES) == 'Default') echo ' selected="selected"'; ?>><?php _e('Default', 'gp_lang'); ?></option>
			<?php $sidebars = $wp_registered_sidebars;
			if(is_array($sidebars) && !empty($sidebars)) { foreach($sidebars as $sidebar) { if($value != '') { ?>
				<option value="<?php echo $sidebar['id']; ?>"<?php if($value == $sidebar['id']) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>
			<?php } else { ?>
				<option value="<?php echo $sidebar['id']; ?>"<?php if($std == $sidebar['id']) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>
			<?php }}} ?>
		</select>
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>
	
	
<?php } function get_meta_textarea($args = array(), $value = false){
extract($args); ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box<?php if($size == "large") { ?> text-large<?php } ?>">	
		<?php if(isset($title)) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30"><?php echo esc_html($value, 1); ?></textarea>
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>


<?php } function get_meta_checkbox($args = array(), $value = false){
extract($args); ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box">
		<?php if(isset($title)) { ?><strong><?php echo $title; ?></strong><?php } ?>
		<?php if(esc_html($value, 1)){ $checked = "checked=\"checked\""; } else { if($std === "true"){ $checked = "checked=\"checked\""; } else { $checked = ""; } } ?>
		<input type="checkbox" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="false" <?php echo $checked; ?> />
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" /></p>			
	</div>

	
<?php } function get_meta_link_title($args = array(), $value = false) {
extract($args); ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box" style="width: 30%;">
		<?php if(isset($title)) { ?><strong><?php echo $title; ?></strong><?php } ?>
		<em><?php echo $desc; ?></em>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>


<?php } function get_meta_link_text($args = array(), $value = false) {
extract($args); ?>


	<div id="meta-box-<?php echo $name; ?>" class="meta-box" style="width: 30%;">
		<br/><?php if(isset($link_number)) { ?><span style="font-weight: bold; float: left; margin-top: 10px; width: 10%;"><?php echo $link_number; ?></span><?php } ?><input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php if(esc_html($value, 1)) { echo esc_html($value, 1); } else { echo esc_html($std, 1); } ?>" size="30" tabindex="30"<?php if(isset($link_number)) { ?> style="width:80%;"<?php } ?> />
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>


<?php } function get_meta_link_select($args = array(), $value = false) {
extract($args); ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box">
		<br/><select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
		<?php foreach ($options as $key=>$option) : ?>
			<option value="<?php echo $key; ?>" <?php if(htmlentities($value, ENT_QUOTES) == $key) echo ' selected="selected"'; ?>>
				<?php echo $option; ?>
			</option>
		<?php endforeach; ?>
		</select>
		<div class="meta-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>


<?php } function get_meta_gallery( $args = array(), $value = false ) {
extract($args); global $post; ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box">
	
		<?php if(isset($title)) { ?><strong><?php echo $title; ?></strong><div class="clear"></div><?php } ?>
			
		<div id="wp-content-media-buttons" class="wp-media-buttons" style="margin-top: 5px;">
			<a href="#" class="button insert-media add_media" data-editor="content" title="<?php _e('Add Media', 'gp_lang'); ?>"><span class="wp-media-buttons-icon"></span> <?php _e('Add Media', 'gp_lang'); ?></a>
		</div>		
		
		<div class="clear"></div>
		
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		
		<?php $image_url = site_url().'/wp-includes/images/crystal/video.png';
		$args = array('post_type' => 'attachment', 'post_parent' => $post->ID, 'numberposts' => -1, 'orderby' => 'date', 'order' => 'desc', 'post__not_in'	=> array(get_post_thumbnail_id())); $attachments = get_children($args); ?>		
		<?php if($attachments) { foreach ($attachments as $attachment) { ?>
			<?php if($attachment->post_mime_type == 'image/jpeg' OR $attachment->post_mime_type == 'image/jpg' OR $attachment->post_mime_type == 'image/png' OR $attachment->post_mime_type == 'image/gif') { $image = vt_resize($attachment->ID, '', 50, 50, true); } else { $image = vt_resize('', $image_url, 50, 50, true); } ?>
			<img src="<?php echo $image['url']; ?>" width="50" height="50" alt="" style="margin-top: 5px;" />	
		<?php }} ?>		
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	
	</div>
	

<?php } function get_meta_colorpicker( $args = array(), $value = false ) {
extract($args); global $wp_version; ?>

	<div id="meta-box-<?php echo $name; ?>" class="meta-box">
		<script type="text/javascript">
			jQuery(document).ready(function($){ 
				$("#<?php echo $name; ?>").wpColorPicker();
			});
		</script>
		<?php if(isset($title)) { ?><strong><?php echo $title; ?></strong><br/><?php } ?>
		<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php if($value != "") { echo $value; } else { echo $std; } ?>" />
		<div class="meta-box-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
	</div>
	
		
<?php } function get_meta_search_tags($args = array(), $value = false) {
extract($args); global $post, $gp_settings; 
require(gp_inc . 'options.php');
	
?>
	
	<div class="meta-box-<?php echo $name; ?>" style="display: none;">
		<input type="text" name="<?php echo $name; ?>" value="<?php for($i = 1; $i < 21; $i++) { $terms = wp_get_object_terms($post->ID, $gp_settings['review_tag_'.$i.'_tax'], 'hide_empty=0'); if(!empty($terms)){ foreach ($terms as $term): ?><?php echo $term->name.' '; endforeach; } } ?>" />
		<input type="hidden" name="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />	
	</div>	
	
	
<?php }


if(is_admin() && ($pagenow == "post.php" OR $pagenow == "post-new.php")) {	
	function gp_admin_scripts() {	
		wp_enqueue_style('gp-admin', get_template_directory_uri().'/lib/admin/css/admin.css');
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_script('wp-color-picker');
		if(!has_action('admin_footer', 'wp_print_media_templates')) wp_enqueue_media();
		wp_enqueue_script('gp-uploader', get_template_directory_uri().'/lib/admin/scripts/uploader.js');
	}	
	add_action('admin_print_scripts', 'gp_admin_scripts');		
}

function gp_save_meta_data($post_id) {
	global $post;

	if(isset($_POST['post_type']) && 'post' == $_POST['post_type'])
		$meta_boxes = array_merge(gp_post_meta_boxes());
	elseif(isset($_POST['post_type']) && 'review' == $_POST['post_type'])
		$meta_boxes = array_merge(gp_review_meta_boxes());			
	elseif(isset($_POST['post_type']) && 'slide' == $_POST['post_type'])
		$meta_boxes = array_merge(gp_slide_meta_boxes());	
	else
		$meta_boxes = array_merge(gp_page_meta_boxes());
				
	foreach ($meta_boxes as $meta_box) :
		
		if(!isset($_POST[$meta_box['name'] . '_noncename']) OR !wp_verify_nonce($_POST[$meta_box['name'] . '_noncename'], plugin_basename(__FILE__)))
			return $post_id;

		if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) 
			return $post_id;
      
		if(!current_user_can('edit_post', $post_id))
			return $post_id;
					
		$data = sanitize_text_field($_POST[$meta_box['name']]);

		if(get_post_meta($post_id, $meta_box['name']) == '')
			add_post_meta($post_id, $meta_box['name'], $data, true);

		elseif($data != get_post_meta($post_id, $meta_box['name'], true))
			update_post_meta($post_id, $meta_box['name'], $data);

		elseif($data == '')
			delete_post_meta($post_id, $meta_box['name'], get_post_meta($post_id, $meta_box['name'], true));

	endforeach;
}

?>