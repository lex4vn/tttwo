<?php // Themes Options Menu

$shortname = "theme";
$page_handle = $shortname . '-options';
$options = array (

array(	"name" => __('General Settings', 'gp_lang'),
      	"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_general_settings"),

		array(
		"name" => __('General Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_general_header",
      	"desc" => __('This section controls the general settings for the theme.', 'gp_lang')
      	),

  		array("type" => "divider"),
  		
 		array(  
		"name" => __('Theme Skin', 'gp_lang'),
        "desc" => __('Choose the theme skin (can be overridden on individual posts/pages).', 'gp_lang'),
        "id" => $shortname."_skin",
        "std" => "",
		"options" => array('dark' => __('Dark', 'gp_lang'), 'light' => __('Light', 'gp_lang')),
        "type" => "select"),
       
        array(
		"name" => __('Custom Stylesheet', 'gp_lang'),
		"desc" => __('Enter the relative URL to your custom stylesheet e.g. <code>lib/css/custom-style.css</code> (can be overridden on individual posts/pages).', 'gp_lang'),
        "id" => $shortname."_custom_stylesheet",
        "std" => "",
        "type" => "text"),
        
		array("type" => "divider"), 
		
		array(
		"name" => __('Custom Logo Image', 'gp_lang'),
        "desc" => __('Upload your own logo.', 'gp_lang'),
        "id" => $shortname."_logo",
        "std" => "",
 		"type" => "upload"),

		array(
		"name" => __('Logo Top Margin', 'gp_lang'),
        "desc" => __('Enter the top margin of your logo.', 'gp_lang'),
        "id" => $shortname."_logo_top",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),

		array(
		"name" => __('Logo Left Margin', 'gp_lang'),
        "desc" => __('Enter the left margin of your logo.', 'gp_lang'),
        "id" => $shortname."_logo_left",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
		
		array(
		"name" => __('Logo Bottom Margin', 'gp_lang'),
        "desc" => __('Enter the bottom margin of your logo.', 'gp_lang'),
        "id" => $shortname."_logo_bottom",
        "std" => "",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
		
		array("type" => "divider"),  
		
		array(
		"name" => __('Login/Register/Profile Links', 'gp_lang'),
        "desc" => __('Choose whether to display the login, register and profile links.', 'gp_lang'),
        "id" => $shortname."_profile_links",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(
		"name" => __('Login Page URL', 'gp_lang'),
        "desc" => __('Enter the URL of the page you have assigned the Login page template to.', 'gp_lang'),
        "id" => $shortname."_login_url",
        "std" => "",
		"type" => "text"),

		array(
		"name" => __('Register Page URL', 'gp_lang'),
        "desc" => __('Enter the URL of the page you have assigned the Register page template to (leave blank if you are using BuddyPress, as a register page will have already been created).', 'gp_lang'),
        "id" => $shortname."_register_url",
        "std" => "",
		"type" => "text"),
		
		array("type" => "divider"),

		array(  
		"name" => __('Breadcrumbs', 'gp_lang'),
        "desc" => __('Choose whether to display the breadcrumbs on your pages.', 'gp_lang'),
        "id" => $shortname."_breadcrumbs",
        "std" => "",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array("type" => "divider"),
		
		array(
		"name" => __('Search Criteria', 'gp_lang'),
        "desc" => __('Choose what posts and pages show up in search results.', 'gp_lang'),
        "id" => $shortname."_search_criteria",
        "std" => "All Posts And Pages",
		"options" => array('All Posts And Pages' => __('All Posts And Pages', 'gp_lang'), 'All Posts' => __('All Posts', 'gp_lang'), 'Reviews Only' => __('Reviews Only', 'gp_lang')),
        "type" => "select"),
        		
		array("type" => "divider"),
		
		array(  
		"name" => __('RSS Feed Button', 'gp_lang'),
        "desc" => __('Display the RSS feed button with the default RSS feed or enter a custom feed below.', 'gp_lang'),
        "id" => $shortname."_rss_button",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(
		"name" => __('RSS URL', 'gp_lang'),
        "id" => $shortname."_rss",
        "std" => "",
        "type" => "text"),
		
		array(
		"name" => __('Email Address', 'gp_lang'),
        "id" => $shortname."_email",
        "std" => "",
        "type" => "text"),
        
        array(
		"name" => __('Twitter URL', 'gp_lang'),
        "id" => $shortname."_twitter",
        "std" => "",
        "type" => "text"),
        
        array(
		"name" => __('Myspace URL', 'gp_lang'),
        "id" => $shortname."_myspace",
        "std" => "",
        "type" => "text"),
        
        array(
		"name" => __('Facebook URL', 'gp_lang'),
        "id" => $shortname."_facebook",
        "std" => "",
        "type" => "text"),
        
        array(
		"name" => __('Digg URL', 'gp_lang'),
        "id" => $shortname."_digg",
        "std" => "",
        "type" => "text"),    
                
        array(
		"name" => __('Flickr URL', 'gp_lang'),
        "id" => $shortname."_flickr",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Delicious URL', 'gp_lang'),
        "id" => $shortname."_delicious",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('YouTube URL', 'gp_lang'),
        "id" => $shortname."_youtube",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Google+ URL', 'gp_lang'),
        "id" => $shortname."_googleplus",
        "std" => "",
        "type" => "text"),
   
    	array(
		"name" => __('Additional Social Icons', 'gp_lang'),
        "desc" => __('Add additional social icons by entering the link and image HTML code e.g. <code>&lt;a href=&quot;http://social-link.com&quot; target=&quot;_blank&quot;&gt;&lt;img src=&quot;'.get_template_directory_uri().'/images/socialicon.png&quot; alt=&quot;&quot; /&gt;&lt;/a&gt;</code>', 'gp_lang'),
        "id" => $shortname."_additional_social_icons",
        "std" => "",
        "type" => "textarea"),
        
		array("type" => "divider"), 
		
        array(
		"name" => __('Favicon URL (.ico)', 'gp_lang'),
        "desc" => __('Type the URL of your favicon image (.ico, 16x16 or 32x32)', 'gp_lang'),
        "id" => $shortname."_favicon_ico",
        "std" => "",
        "size" => "small",
        "type" => "upload"),

        array(
		"name" => __('Favicon URL (.png)', 'gp_lang'),
        "desc" => __('Type the URL of your favicon image (.png, 16x16 or 32x32)', 'gp_lang'),
        "id" => $shortname."_favicon_png",
        "std" => "",
        "size" => "small",
        "type" => "upload"),

         array(
		"name" => __('Apple Icon URL (.png)', 'gp_lang'),
        "desc" => __('Type the URL of your apple icon image (.png, 57x57), used for display on the Apple iPhone', 'gp_lang'),
        "id" => $shortname."_apple_icon",
        "std" => "",
        "size" => "small",
        "type" => "upload"),

		array("type" => "divider"), 
		
		array(
		"name" => __('Footer Content', 'gp_lang'),
        "desc" => __('Enter the content you want to display in your footer', 'gp_lang'),
        "id" => $shortname."_footer_content",
        "std" => "",
        "type" => "textarea"),

		array("type" => "divider"), 
		
		array(
		"name" => __('Scripts', 'gp_lang'),
        "desc" => __('Enter any scripts that need to be embedded into your theme (e.g. Google Analytics)', 'gp_lang'),
        "id" => $shortname."_scripts",
        "std" => "",
        "type" => "textarea"),
 
 		array("type" => "divider"),
				
		array(  
		"name" => __('JW Player For YouTube Videos', 'gp_lang'),
        "desc" => __('Use the JW Player for YouTube vidoes (not recommended!).', 'gp_lang'),
        "id" => $shortname."_jwplayer",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
 		array(  
		"name" => __('Old Video Shortcode', 'gp_lang'),
        "desc" => __('WordPress now has it\'s own native [video] shortcode. Choose this option to use the old video shortcode instead.', 'gp_lang'),
        "id" => $dirname."_old_video_shortcode",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
                      
		array("type" => "close"),	
		
array(	"name" => __('Slider Settings', 'gp_lang'),
		"type" => "title"),
        
		array(	"type" => "open",
      	"id" => $shortname."_slider_settings"),

		array(
		"name" => __('Slider Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_slider_header",
      	"desc" => __('This section controls the slider settings for the theme.', 'gp_lang')
      	),

  		array("type" => "divider"),
  		        
        array(
		"name" => __('Slider Category IDs', 'gp_lang'),
        "desc" => __('Enter the IDs of the <a href="'.admin_url('edit-tags.php?taxonomy=slide_categories&post_type=slide').'">slider categories</a>, <a href="'.admin_url('edit-tags.php?taxonomy=review_categories&post_type=review').'">review categories</a> and <a href="'.admin_url('edit-tags.php?taxonomy=category').'">post categories</a> you want to display.', 'gp_lang'),
        "id" => $shortname."_slider_cats",
        "std" => "",
		"type" => "text"), 

		array("type" => "divider"), 
		
		array(  
		"name" => __('Slider Order', 'gp_lang'),
        "desc" => __('Choose how to order your slides.', 'gp_lang'),
        "id" => $shortname."_slider_orderby",
        "std" => "Date",
		"options" => array('Date' => __('Date', 'gp_lang'), 'Custom Order' => __('Custom Order', 'gp_lang')),
        "type" => "select"),

		array("type" => "divider"), 
		
		array(  
		"name" => __('Slider Display', 'gp_lang'),
        "desc" => __('Choose where to display the slider.', 'gp_lang'),
        "id" => $shortname."_slider_display",
        "std" => "Homepage",
		"options" => array('Homepage' => __('Homepage', 'gp_lang'), 'All Pages' => __('All Pages', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')),
        "type" => "select"),
		
		array(  
		"name" => __('Include On Specific Posts', 'gp_lang'),
        "desc" => __('Enter the IDs of the posts you want the slider to appear on, separating each with a comma (e.g. 23,51,102,65)', 'gp_lang'),
        "id" => $shortname."_slider_posts",
        "type" => "text"),
        
        array(  
		"name" => __('Include On Specific Pages', 'gp_lang'),
        "desc" => __('Enter the IDs of the pages you want the slider to appear on, separating each with a comma (e.g. 23,51,102,65)', 'gp_lang'),
        "id" => $shortname."_slider_pages",
        "type" => "text"),

		array("type" => "divider"), 
		
 		array(  
		"name" => __('Slide Image Width', 'gp_lang'),
        "desc" => __('The width to crop the main slide image to.', 'gp_lang'),
        "id" => $shortname."_slide_image_width",
        "std" => "630",
        "size" => "small",
        "details" => "px",
        "type" => "text"),
 
 		array("type" => "divider"), 
 		
 		array(  
		"name" => __('Number Of Slides', 'gp_lang'),
        "desc" => __('Enter the number of slides you want to display (also controls the height of the main slider images).', 'gp_lang'),
        "id" => $shortname."_slides",
        "std" => "4",
        "size" => "small",
        "type" => "text"),

		array("type" => "divider"), 
		
		array(  
		"name" => __('Slider Auto Rotation', 'gp_lang'),
        "desc" => "Choose whether the slider automatically rotates through slides.",
        "id" => $shortname."_slider_auto_rotation",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array("type" => "divider"),
        
        array(
		"name" => __('Slide Lengths', 'gp_lang'),
        "desc" => __('The number of seconds each slide will show for.', 'gp_lang'),
        "id" => $shortname."_slide_length",
        "std" => "5",
        "size" => "small",
		"details" => "seconds",
        "type" => "text"),
		
		array("type" => "divider"), 
		
        array(
		"name" => __('Slide Transtion Speed', 'gp_lang'),
        "desc" => __('The speed of the transition between slides.', 'gp_lang'),
        "id" => $shortname."_slide_transition_speed",
        "std" => "0.5",
        "size" => "small",
        "details" => "seconds",
        "type" => "text"),
        
		array("type" => "close"),
		
array(	"name" => __('Homepage Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_homepage_settings"),

		array(
		"name" => __('Homepage Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_homepage_header",
      	"desc" => __('This section controls the homepage settings for the theme.', 'gp_lang')
      	),

  		array("type" => "divider"),
  		 
 		array( 
		"name" => __('Sidebar', 'gp_lang'),
        "desc" => __('Choose which sidebar area to display on the right.', 'gp_lang'),
        "id" => $shortname."_homepage_sidebar",
        "std" => "homepage-right",
        "type" => "select_sidebar"),
        	
		array("type" => "divider"),
		       
	    array(  
		"name" => __('Layout', 'gp_lang'),
        "desc" => __('Choose the page layout.', 'gp_lang'),
        "id" => $shortname."_homepage_layout",
        "std" => "sb-right",
		"options" => array('sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')),
        "type" => "select"),
        
  		array("type" => "divider"),
  		
		array(
		"name" => __('Compact/Extended Buttons', 'gp_lang'),
        "desc" => __('Choose whether to display the compact and extended buttons.', 'gp_lang'),
        "id" => $shortname."_homepage_buttons",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),		

		array("type" => "close"),	

array(	"name" => __('Blog Page Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_blog_settings"),

		array(
		"name" => __('Blog Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_blog_header",
      	"desc" => __('This section controls the blog settings for the theme.', 'gp_lang')
      	),

  		array("type" => "divider"),
  				
        array(
		"name" => __('Thumbnail Width', 'gp_lang'),
        "desc" => __('The width to crop the thumbnail to (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_blog_thumbnail_width",
        "std" => "638",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

  		array(
		"name" => __('Thumbnail Height', 'gp_lang'),
        "desc" => __('The height to crop the thumbnail to (can be overridden on individual posts, set to 0 to have a proportionate height).', 'gp_lang'),
        "id" => $shortname."_blog_thumbnail_height",
        "std" => "250",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

		array(
		"name" => __('Image Wrap', 'gp_lang'),
        "desc" => __('Choose whether the page content wraps around the featured image.', 'gp_lang'),
        "id" => $shortname."_blog_image_wrap",
        "std" => "Disable",
		"options" => array('Enable' => __('Enable', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')),
        "type" => "select"),
        
  		array("type" => "divider"),
  		
        array(
		"name" => __('Blog Category IDs', 'gp_lang'),
        "desc" => __('Enter the IDs of the <a href="'.admin_url('edit-tags.php?taxonomy=category').'">post categories</a> you want to display (leave blank to display all categories).', 'gp_lang'),
        "id" => $shortname."_blog_cats",
        "std" => "",
		"type" => "text"), 

        array("type" => "divider"), 
   
 		array( 
		"name" => __('Sidebar', 'gp_lang'),
        "desc" => __('Choose which sidebar area to display.', 'gp_lang'),
        "id" => $shortname."_blog_sidebar",
        "std" => "default",
        "type" => "select_sidebar"),
        	
		array("type" => "divider"),
		      
	    array(  
		"name" => __('Layout', 'gp_lang'),
        "desc" => __('Choose the page layout.', 'gp_lang'),
        "id" => $shortname."_blog_layout",
        "std" => "sb-right",
		"options" => array('sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')),
        "type" => "select"),
        
  		array("type" => "divider"),
 
   		array(
		"name" => __('Title', 'gp_lang'),
        "desc" => __('Choose whether to display the page title.', 'gp_lang'),
        "id" => $shortname."_blog_title",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),
        		
  		array("type" => "divider"),
  		 		
		array(
		"name" => __('Compact/Extended Buttons', 'gp_lang'),
        "desc" => __('Choose whether to display the compact and extended buttons.', 'gp_lang'),
        "id" => $shortname."_blog_buttons",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),	
        
  		array("type" => "divider"),
  		
   		array(
		"name" => __('Posts Per Page', 'gp_lang'),
        "desc" => __('The number of posts per page.', 'gp_lang'),
        "id" => $shortname."_blog_posts_per_page",
        "std" => "10",
        "type" => "text",
		"size" => "small"), 

  		array("type" => "divider"),
  		
		array(  
		"name" => __('Post Display', 'gp_lang'),
        "desc" => __('Choose how to display your posts.', 'gp_lang'),
        "id" => $shortname."_blog_post_display",
        "std" => "List",
		"options" => array('List' => __('List', 'gp_lang'), 'Compact Boxes' => __('Compact Boxes', 'gp_lang'), 'Extended Boxes' => __('Extended Boxes', 'gp_lang')),
        "type" => "select"),
        
		array("type" => "divider"),
		
		array(
		"name" => __('Content Display', 'gp_lang'),
        "desc" => __('Choose whether to display the full post content or an excerpt.', 'gp_lang'),
        "id" => $shortname."_blog_content_display",
        "std" => "Excerpt",
		"options" => array('Excerpt' => __('Excerpt', 'gp_lang'), 'Full Content' => __('Full Content', 'gp_lang')),
        "type" => "select"),
        
		array("type" => "divider"),

        array(
		"name" => __('Title Length', 'gp_lang'),
        "desc" => __('The number of characters in titles.', 'gp_lang'),
        "id" => $shortname."_blog_title_length",
        "std" => "200",
        "type" => "text",
		"size" => "small"),
  		
  		array("type" => "divider"),
				
        array(
		"name" => __('Excerpt Length', 'gp_lang'),
        "desc" => __('The number of characters in excerpts.', 'gp_lang'),
        "id" => $shortname."_blog_excerpt_length",
        "std" => "400",
        "type" => "text",
		"size" => "small"), 

  		array("type" => "divider"),
		
		array(  
		"name" => __('Read More Link', 'gp_lang'),
        "desc" => __('Choose whether to display the read more links.', 'gp_lang'),
        "id" => $shortname."_blog_read_more",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
  		array("type" => "divider"),
  		
        array(
		"name" => __('Drop Down Menu Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the drop down menu filter.', 'gp_lang'),
        "id" => $shortname."_blog_dropdown_filter",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Date Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the filter by date option.', 'gp_lang'),
        "id" => $shortname."_blog_filter_date",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Title Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the filter by title option.', 'gp_lang'),
        "id" => $shortname."_blog_filter_title",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Site Score Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the filter by site score option.', 'gp_lang'),
        "id" => $shortname."_blog_filter_site_score",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
 
		array(  
		"name" => __('User Score Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the filter by user score option.', 'gp_lang'),
        "id" => $shortname."_blog_filter_user_score",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
                
   		array("type" => "divider"),
  		
		array(  
		"name" => __('Post Date', 'gp_lang'),
        "desc" => __('Choose whether to display the post date.', 'gp_lang'),
        "id" => $shortname."_blog_date",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Author', 'gp_lang'),
        "desc" => __('Choose whether to display the post author.', 'gp_lang'),
        "id" => $shortname."_blog_author",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Categories', 'gp_lang'),
        "desc" => __('Choose whether to display the post categories.', 'gp_lang'),
        "id" => $shortname."_blog_cats_",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(  
		"name" => __('Post Comments', 'gp_lang'),
        "desc" => __('Choose whether to display the post comments.', 'gp_lang'),
        "id" => $shortname."_blog_comments",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Tags', 'gp_lang'),
        "desc" => __('Choose whether to display the post tags.', 'gp_lang'),
        "id" => $shortname."_blog_tags",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
        array("type" => "close"),
		
array(	"name" => __('Post Category Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_post_category_settings"),

		array(
		"name" => __('Post Category Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_post_cat_header",
      	"desc" => __('This section controls the global settings for all post category, archive, tag and search result pages.', 'gp_lang')
      	),
  
  		array("type" => "divider"),
  		     			
        array(
		"name" => __('Thumbnail Width', 'gp_lang'),
        "desc" => __('The width to crop the thumbnail to (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_cat_thumbnail_width",
        "std" => "100",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

  		array(
		"name" => __('Thumbnail Height', 'gp_lang'),
        "desc" => __('The height to crop the thumbnail to (can be overridden on individual posts, set to 0 to have a proportionate height).', 'gp_lang'),
        "id" => $shortname."_cat_thumbnail_height",
        "std" => "130",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

		array(
		"name" => __('Image Wrap', 'gp_lang'),
        "desc" => __('Choose whether the page content wraps around the featured image.', 'gp_lang'),
        "id" => $shortname."_cat_image_wrap",
        "std" => "Disable",
		"options" => array('Enable' => __('Enable', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')),
        "type" => "select"),
        
  		array("type" => "divider"),
  
 		array( 
		"name" => __('Sidebar', 'gp_lang'),
        "desc" => __('Choose which sidebar area to display.', 'gp_lang'),
        "id" => $shortname."_cat_sidebar",
        "std" => "default",
        "type" => "select_sidebar"),
        	
		array("type" => "divider"),
		 		
	    array(  
		"name" => __('Layout', 'gp_lang'),
        "desc" => __('Choose the page layout.', 'gp_lang'),
        "id" => $shortname."_cat_layout",
        "std" => "sb-right",
		"options" => array('sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')),
        "type" => "select"),
        
   		array("type" => "divider"),
   		
  		array(
		"name" => __('Title', 'gp_lang'),
        "desc" => __('Choose whether to display the page title.', 'gp_lang'),
        "id" => $shortname."_cat_title",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),
        		
  		array("type" => "divider"),
  		
  		array(
		"name" => __('Compact/Extended Buttons', 'gp_lang'),
        "desc" => __('Choose whether to display the compact and extended buttons.', 'gp_lang'),
        "id" => $shortname."_cat_buttons",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),	
        
  		array("type" => "divider"),
  		
   		array(
		"name" => __('Posts Per Page', 'gp_lang'),
        "desc" => __('The number of posts per page.', 'gp_lang'),
        "id" => $shortname."_cat_posts_per_page",
        "std" => "10",
        "type" => "text",
		"size" => "small"), 

  		array("type" => "divider"),
  		
		array(  
		"name" => __('Post Display', 'gp_lang'),
        "desc" => __('Choose how to display your posts.', 'gp_lang'),
        "id" => $shortname."_cat_post_display",
        "std" => "List",
		"options" => array('List' => __('List', 'gp_lang'), 'Compact Boxes' => __('Compact Boxes', 'gp_lang'), 'Extended Boxes' => __('Extended Boxes', 'gp_lang')),
        "type" => "select"),

		array("type" => "divider"),
		
		array(  
		"name" => __('Rating Type', 'gp_lang'),
        "desc" => __('Choose the rating type to display.', 'gp_lang'),
        "id" => $shortname."_cat_rating_type",
        "std" => "Site & User Rating",
		"options" => array('Site & User Rating' => __('Site & User Rating', 'gp_lang'), 'Site Rating' => __('Site Rating', 'gp_lang'), 'User Rating' => __('User Rating', 'gp_lang'), 'No Ratings' => __('No Ratings', 'gp_lang')),
        "type" => "select"),
        
		array("type" => "divider"),
		
		array(
		"name" => __('Content Display', 'gp_lang'),
        "desc" => __('Choose whether to display the full post content or an excerpt.', 'gp_lang'),
        "id" => $shortname."_cat_content_display",
        "std" => "Excerpt",
		"options" => array('Excerpt' => __('Excerpt', 'gp_lang'), 'Full Content' => __('Full Content', 'gp_lang')),
        "type" => "select"),
        
		array("type" => "divider"),

        array(
		"name" => __('Title Length', 'gp_lang'),
        "desc" => __('The number of characters in titles.', 'gp_lang'),
        "id" => $shortname."_cat_title_length",
        "std" => "200",
        "type" => "text",
		"size" => "small"),
  		
  		array("type" => "divider"),
				
        array(
		"name" => __('Excerpt Length', 'gp_lang'),
        "desc" => __('The number of characters in excerpts.', 'gp_lang'),
        "id" => $shortname."_cat_excerpt_length",
        "std" => "300",
        "type" => "text",
		"size" => "small"),

  		array("type" => "divider"),
		
		array(  
		"name" => __('Read More Link', 'gp_lang'),
        "desc" => __('Choose whether to display the read more links.', 'gp_lang'),
        "id" => $shortname."_cat_read_more",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
  		array("type" => "divider"),
  		
        array(
		"name" => __('Drop Down Menu Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the drop down menu filter.', 'gp_lang'),
        "id" => $shortname."_cat_dropdown_filter",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Date Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the filter by date option.', 'gp_lang'),
        "id" => $shortname."_cat_filter_date",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Title Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the filter by title option.', 'gp_lang'),
        "id" => $shortname."_cat_filter_title",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Site Score Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the filter by site score option.', 'gp_lang'),
        "id" => $shortname."_cat_filter_site_score",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
 
		array(  
		"name" => __('User Score Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the filter by user score option.', 'gp_lang'),
        "id" => $shortname."_cat_filter_user_score",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
  		array("type" => "divider"),
  		
		array(  
		"name" => __('Post Date', 'gp_lang'),
        "desc" => __('Choose whether to display the post date.', 'gp_lang'),
        "id" => $shortname."_cat_date",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Author', 'gp_lang'),
        "desc" => __('Choose whether to display the post author.', 'gp_lang'),
        "id" => $shortname."_cat_author",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Categories', 'gp_lang'),
        "desc" => __('Choose whether to display the post categories.', 'gp_lang'),
        "id" => $shortname."_cat_cats",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(  
		"name" => __('Post Comments', 'gp_lang'),
        "desc" => __('Choose whether to display the post comments.', 'gp_lang'),
        "id" => $shortname."_cat_comments",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Tags', 'gp_lang'),
        "desc" => __('Choose whether to display the post tags.', 'gp_lang'),
        "id" => $shortname."_cat_tags",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
                        
		array("type" => "close"),

array(	"name" => __('Review Category Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_review_category_settings"),

		array(
		"name" => __('Review Category Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_review_cat_header",
      	"desc" => __('This section controls the global settings for all review category, archive, tag and search result pages.', 'gp_lang')
      	),
  
  		array("type" => "divider"),
  		      	
        array(
		"name" => __('Review Category Singular Name', 'gp_lang'),
        "desc" => __('The singular name for your review categories. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_cat_singular_name",
        "std" => "Review Category",
        "type" => "text"),

        array(
		"name" => __('Review Category Plural Name', 'gp_lang'),
        "desc" => __('The plural name for your review categories. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_cat_plural_name",
        "std" => "Review Categories",
        "type" => "text"),
        
        array(
		"name" => __('Review Category Slug', 'gp_lang'),
        "desc" => __('The slug used in review category URLs. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_cat_slug",
        "std" => "reviews",
        "type" => "text"),
        
		array("type" => "divider"),
		
        array(
		"name" => __('Thumbnail Width', 'gp_lang'),
        "desc" => __('The width to crop the thumbnail to (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_review_cat_thumbnail_width",
        "std" => "100",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

  		array(
		"name" => __('Thumbnail Height', 'gp_lang'),
        "desc" => __('The height to crop the thumbnail to (can be overridden on individual posts, set to 0 to have a proportionate height).', 'gp_lang'),
        "id" => $shortname."_review_cat_thumbnail_height",
        "std" => "130",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

		array(
		"name" => __('Image Wrap', 'gp_lang'),
        "desc" => __('Choose whether the page content wraps around the featured image.', 'gp_lang'),
        "id" => $shortname."_review_cat_image_wrap",
        "std" => "Enable",
		"options" => array('Enable' => __('Enable', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')),
        "type" => "select"),
        
  		array("type" => "divider"),
  
 		array( 
		"name" => __('Sidebar', 'gp_lang'),
        "desc" => __('Choose which sidebar area to display.', 'gp_lang'),
        "id" => $shortname."_review_cat_sidebar",
        "std" => "default",
        "type" => "select_sidebar"),
        	
		array("type" => "divider"),
		 		
	    array(  
		"name" => __('Layout', 'gp_lang'),
        "desc" => __('Choose the page layout.', 'gp_lang'),
        "id" => $shortname."_review_cat_layout",
        "std" => "sb-right",
		"options" => array('sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')),
        "type" => "select"),

  		array("type" => "divider"),
  		
  		array(
		"name" => __('Title', 'gp_lang'),
        "desc" => __('Choose whether to display the page title.', 'gp_lang'),
        "id" => $shortname."_review_cat_title",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),
        		
  		array("type" => "divider"),

  		array(
		"name" => __('Compact/Extended Buttons', 'gp_lang'),
        "desc" => __('Choose whether to display the compact and extended buttons.', 'gp_lang'),
        "id" => $shortname."_review_cat_buttons",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),	
        
  		array("type" => "divider"),
  		
   		array(
		"name" => __('Posts Per Page', 'gp_lang'),
        "desc" => __('The number of posts per page.', 'gp_lang'),
        "id" => $shortname."_review_cat_posts_per_page",
        "std" => "10",
        "type" => "text",
		"size" => "small"), 

  		array("type" => "divider"),
  		
		array(  
		"name" => __('Post Display', 'gp_lang'),
        "desc" => __('Choose how to display your posts.', 'gp_lang'),
        "id" => $shortname."_review_cat_post_display",
        "std" => "List",
		"options" => array('List' => __('List', 'gp_lang'), 'Compact Boxes' => __('Compact Boxes', 'gp_lang'), 'Extended Boxes' => __('Extended Boxes', 'gp_lang')),
        "type" => "select"),

		array("type" => "divider"),
		
		array(  
		"name" => __('Rating Type', 'gp_lang'),
        "desc" => __('Choose the rating type to display.', 'gp_lang'),
        "id" => $shortname."_review_cat_rating_type",
        "std" => "Site & User Rating",
		"options" => array('Site & User Rating' => __('Site & User Rating', 'gp_lang'), 'Site Rating' => __('Site Rating', 'gp_lang'), 'User Rating' => __('User Rating', 'gp_lang'), 'No Ratings' => __('No Ratings', 'gp_lang')),
        "type" => "select"),
        
		array("type" => "divider"),
		
		array(
		"name" => __('Content Display', 'gp_lang'),
        "desc" => __('Choose whether to display the full post content or an excerpt.', 'gp_lang'),
        "id" => $shortname."_review_cat_content_display",
        "std" => "Excerpt",
		"options" => array('Excerpt' => __('Excerpt', 'gp_lang'), 'Full Content' => __('Full Content', 'gp_lang')),
        "type" => "select"),
        
		array("type" => "divider"),

        array(
		"name" => __('Title Length', 'gp_lang'),
        "desc" => __('The number of characters in titles.', 'gp_lang'),
        "id" => $shortname."_review_cat_title_length",
        "std" => "200",
        "type" => "text",
		"size" => "small"),
  		
  		array("type" => "divider"),
				
        array(
		"name" => __('Excerpt Length', 'gp_lang'),
        "desc" => __('The number of characters in excerpts.', 'gp_lang'),
        "id" => $shortname."_review_cat_excerpt_length",
        "std" => "250",
        "type" => "text",
		"size" => "small"),

  		array("type" => "divider"),
		
		array(  
		"name" => __('Read More Link', 'gp_lang'),
        "desc" => __('Choose whether to display the read more links.', 'gp_lang'),
        "id" => $shortname."_review_cat_read_more",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
  		array("type" => "divider"),
  		
        array(
		"name" => __('Drop Down Menu Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the drop down menu filter.', 'gp_lang'),
        "id" => $shortname."_review_cat_dropdown_filter",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Date Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the filter by date option.', 'gp_lang'),
        "id" => $shortname."_review_filter_date",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Title Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the filter by title option.', 'gp_lang'),
        "id" => $shortname."_review_filter_title",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Site Score Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the filter by site score option.', 'gp_lang'),
        "id" => $shortname."_review_filter_site_score",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
 
		array(  
		"name" => __('User Score Filter', 'gp_lang'),
        "desc" => __('Choose whether to display the filter by user score option.', 'gp_lang'),
        "id" => $shortname."_review_filter_user_score",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
                
   		array("type" => "divider"),
  		
		array(  
		"name" => __('Post Date', 'gp_lang'),
        "desc" => __('Choose whether to display the post date.', 'gp_lang'),
        "id" => $shortname."_review_cat_date",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Author', 'gp_lang'),
        "desc" => __('Choose whether to display the post author.', 'gp_lang'),
        "id" => $shortname."_review_cat_author",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Categories', 'gp_lang'),
        "desc" => __('Choose whether to display the post categories.', 'gp_lang'),
        "id" => $shortname."_review_cat_cats",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(  
		"name" => __('Post Comments', 'gp_lang'),
        "desc" => __('Choose whether to display the post comments.', 'gp_lang'),
        "id" => $shortname."_review_cat_comments",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Tags', 'gp_lang'),
        "desc" => __('Choose whether to display the post tags.', 'gp_lang'),
        "id" => $shortname."_review_cat_tags",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
                       
		array("type" => "close"),

array(	"name" => __('Post Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_post_settings"),

		array(
		"name" => __('Post Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_post_header",
      	"desc" => __('This section controls the global settings for all posts, but most settings can be overridden on individual posts.', 'gp_lang')
      	),

  		array("type" => "divider"),
  		
		array(  
		"name" => __('Featured Image', 'gp_lang'),
        "desc" => __('Choose whether to display the featured image (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_show_post_image",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),
        
        array(
		"name" => __('Image Width', 'gp_lang'),
        "desc" => __('The width to crop the image to (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_image_width",
        "std" => "638",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

  		array(
		"name" => __('Image Height', 'gp_lang'),
        "desc" => __('The height to crop the image to (can be overridden on individual posts, set to 0 to have a proportionate height).', 'gp_lang'),
        "id" => $shortname."_post_image_height",
        "std" => "250",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

		array(
		"name" => __('Image Wrap', 'gp_lang'),
        "desc" => __('Choose whether the page content wraps around the featured image.', 'gp_lang'),
        "id" => $shortname."_post_image_wrap",
        "std" => "Disable",
		"options" => array('Enable' => __('Enable', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')),
        "type" => "select"),

  		array("type" => "divider"),
  
 		array( 
		"name" => __('Sidebar', 'gp_lang'),
        "desc" => __('Choose which sidebar area to display (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_sidebar",
        "std" => "default",
        "type" => "select_sidebar"),
        	
		array("type" => "divider"),
		 		             
		array(  
		"name" => __('Layout', 'gp_lang'),
        "desc" => __('Choose the page layout (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_layout",
        "std" => "sb-right",
		"options" => array('sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')),
        "type" => "select"),

  		array("type" => "divider"),
   		
  		array(
		"name" => __('Title', 'gp_lang'),
        "desc" => __('Choose whether to display the page title (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_title",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),
        
  		array("type" => "divider"),
  		
 		array(
		"name" => __('Comment Thumbs', 'gp_lang'),
        "desc" => __('Choose whether users can rate other comments (can be overridden on individual posts).', 'gp_lang'),
        "id" => $shortname."_post_comment_thumbs",
        "std" => "Users cannot rate other comments",
		"options" => array('Users can rate other comments' => __('Users can rate other comments', 'gp_lang'), 'Users cannot rate other comments' => __('Users cannot rate other comments', 'gp_lang')),
        "type" => "select"),
                	
  		array("type" => "divider"),
  		
		array(  
		"name" => __('Post Date', 'gp_lang'),
        "desc" => __('Choose whether to display the post date.', 'gp_lang'),
        "id" => $shortname."_post_date",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Author', 'gp_lang'),
        "desc" => __('Choose whether to display the post author.', 'gp_lang'),
        "id" => $shortname."_post_author",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Categories', 'gp_lang'),
        "desc" => __('Choose whether to display the post categories.', 'gp_lang'),
        "id" => $shortname."_post_cats",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(  
		"name" => __('Post Comments', 'gp_lang'),
        "desc" => __('Choose whether to display the post comments.', 'gp_lang'),
        "id" => $shortname."_post_comments",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
		
		array(  
		"name" => __('Post Tags', 'gp_lang'),
        "desc" => __('Choose whether to display the post tags.', 'gp_lang'),
        "id" => $shortname."_post_tags",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
                
		array("type" => "close"),

array(	"name" => __('Page Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_page_settings"),

		array(
		"name" => __('Page Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_page_header",
      	"desc" => __('This section controls the global settings for all pages, but most settings can be overridden on individual pages.', 'gp_lang')
      	),

  		array("type" => "divider"),
  		 
 		array(  
		"name" => __('Featured Image', 'gp_lang'),
        "desc" => __('Choose whether to display the featured image (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_show_page_image",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),
        
        array(
		"name" => __('Image Width', 'gp_lang'),
        "desc" => __('The width to crop the image to (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_image_width",
        "std" => "638",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

  		array(
		"name" => __('Image Height', 'gp_lang'),
        "desc" => __('The height to crop the image to (can be overridden on individual pages, set to 0 to have a proportionate height).', 'gp_lang'),
        "id" => $shortname."_page_image_height",
        "std" => "250",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 
		
		array(
		"name" => __('Image Wrap', 'gp_lang'),
        "desc" => __('Choose whether the page content wraps around the featured image (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_image_wrap",
        "std" => "Enable",
		"options" => array('Enable' => __('Enable', 'gp_lang'), 'Disable' => __('Disable', 'gp_lang')),
        "type" => "select"),
  		
  		array("type" => "divider"),
  		
 		array( 
		"name" => __('Sidebar', 'gp_lang'),
        "desc" => __('Choose which sidebar area to display (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_sidebar",
        "std" => "default",
        "type" => "select_sidebar"),
        	
		array("type" => "divider"),
		  		            
		array(  
		"name" => __('Layout', 'gp_lang'),
        "desc" => __('Choose the page layout (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_layout",
        "std" => "sb-right",
		"options" => array('sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')),
        "type" => "select"),

		array("type" => "divider"),
   		
  		array(
		"name" => __('Title', 'gp_lang'),
        "desc" => __('Choose whether to display the page title (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_title",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),
                
  		array("type" => "divider"),
  		
 		array(
		"name" => __('Comment Thumbs', 'gp_lang'),
        "desc" => __('Choose whether users can rate other comments (can be overridden on individual pages).', 'gp_lang'),
        "id" => $shortname."_page_comment_thumbs",
        "std" => "Users cannot rate other comments",
		"options" => array('Users cannot rate other comments' => __('Users cannot rate other comments', 'gp_lang'), 'Users can rate other comments' => __('Users can rate other comments', 'gp_lang')),
        "type" => "select"),
               
  		array("type" => "divider"),
  		
		array(  
		"name" => __('Page Date', 'gp_lang'),
        "desc" => __('Choose whether to display the page date.', 'gp_lang'),
        "id" => $shortname."_page_date",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Page Author', 'gp_lang'),
        "desc" => __('Choose whether to display the page author.', 'gp_lang'),
        "id" => $shortname."_page_author",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(  
		"name" => __('Page Comments', 'gp_lang'),
        "desc" => __('Choose whether to display the page comments.', 'gp_lang'),
        "id" => $shortname."_page_comments",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array("type" => "close"),
		
array(	"name" => __('Review Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_review_settings"),

		array(
		"name" => __('Review Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_review_header",
      	"desc" => __('This section controls the global settings for all reviews, but most settings can be overridden on individual reviews.', 'gp_lang')
      	),

  		array("type" => "divider"),
  		 
        array(
		"name" => __('Review Page Singular Name', 'gp_lang'),
        "desc" => __('The singular name for your review pages. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_singular_name",
        "std" => "Review",
        "type" => "text"),

        array(
		"name" => __('Review Page Plural Name', 'gp_lang'),
        "desc" => __('The plural name for your review pages. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_plural_name",
        "std" => "Reviews",
        "type" => "text"),
        
        array(
		"name" => __('Review Page Slug', 'gp_lang'),
        "desc" => __('The slug used for your review page URLs. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_slug",
        "std" => "review",
        "type" => "text"),
        
		array("type" => "divider"),

		array(  
		"name" => __('Featured Image', 'gp_lang'),
        "desc" => __('Choose whether to display the featured image (can be overridden on individual review pages).', 'gp_lang'),
        "id" => $shortname."_show_review_image",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),
        
        array(
		"name" => __('Image Width', 'gp_lang'),
        "desc" => __('The width to crop the image to (can be overridden on individual review pages).', 'gp_lang'),
        "id" => $shortname."_review_image_width",
        "std" => "180",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 

  		array(
		"name" => __('Image Height', 'gp_lang'),
        "desc" => __('The height to crop the image to (can be overridden on individual review pages, set to 0 to have a proportionate height).', 'gp_lang'),
        "id" => $shortname."_review_image_height",
        "std" => "0",
        "type" => "text",
		"size" => "small",
		"details" => "px"),
        
		array("type" => "divider"),
		
 		array( 
		"name" => __('Sidebar', 'gp_lang'),
        "desc" => __('Choose which sidebar area to display (can be overridden on individual reviews).', 'gp_lang'),
        "id" => $shortname."_review_sidebar",
        "std" => "default",
        "type" => "select_sidebar"),
        	
		array("type" => "divider"),
					
		array(  
		"name" => __('Layout', 'gp_lang'),
        "desc" => __('Choose the page layout (can be overridden on individual review pages).', 'gp_lang'),
        "id" => $shortname."_review_layout",
        "std" => "sb-right",
		"options" => array('sb-left' => __('Sidebar Left', 'gp_lang'), 'sb-right' => __('Sidebar Right', 'gp_lang'), 'fullwidth' => __('Fullwidth', 'gp_lang')),
        "type" => "select"),

  		array("type" => "divider"),
 
   		array(
		"name" => __('Title', 'gp_lang'),
        "desc" => __('Choose whether to display the page title.', 'gp_lang'),
        "id" => $shortname."_review_title",
        "std" => "Show",
		"options" => array('Show' => __('Show', 'gp_lang'), 'Hide' => __('Hide', 'gp_lang')),
        "type" => "select"),
        
  		array("type" => "divider"),
        
        array(
		"name" => __('Left Review Panel Width', 'gp_lang'),
        "desc" => __('The width of the review panel containing the review image and ratings (can be overridden on individual review pages).', 'gp_lang'),
        "id" => $shortname."_review_panel_left_width",
        "std" => "180",
        "type" => "text",
		"size" => "small",
		"details" => "px"), 
		
		array(  
		"name" => __('Review Tabs and Sidebar Position', 'gp_lang'),
        "desc" => __('Choose the position of the review tabs and sidebar (can be overridden on individual review pages).', 'gp_lang'),
        "id" => $shortname."_review_positioning",
        "std" => "Layout 1",
		"options" => array('Layout 1' => 'Sidebar Next To Review Tags / Tabs Below Review Tags', 'Layout 2' => 'Tabs & Sidebar Below Review Tags', 'Layout 3' => 'Sidebar Below Review Tags / Tabs Next To Review Tags'),
        "type" => "select"),

		array(  
		"name" => __('Review Text Position', 'gp_lang'),
        "desc" => __('Choose the position of the review text (can be overridden on individual review pages).', 'gp_lang'),
        "id" => $shortname."_review_text_position",
        "std" => "Within Review Tabs",
		"options" => array('Within Review Tabs' => __('Within Review Tabs', 'gp_lang'), 'Below Review Tags' => __('Below Review Tags', 'gp_lang')),
        "type" => "select"),
        
		array("type" => "divider"),

		array(
		"name" => __('User Voting', 'gp_lang'),
        "desc" => __('Choose how users can vote (can be overridden on individual reviews).', 'gp_lang'),
        "id" => $shortname."_user_voting",
        "std" => "Vote with or without posting a comment",
		"options" => array('Vote with or without posting a comment' => __('Vote with or without posting a comment', 'gp_lang'), 'Vote without posting a comment' => __('Vote without posting a comment', 'gp_lang'), 'Vote only when posting a comment' => __('Vote only when posting a comment', 'gp_lang'), 'Users cannot vote' => __('Users cannot vote', 'gp_lang')),
        "type" => "select"),
 
 		array(
		"name" => __('User Comments', 'gp_lang'),
        "desc" => __('Choose whether users can post unlimited comments in reviews (can be overridden on individual reviews, only works with registered users).', 'gp_lang'),
        "id" => $shortname."_user_comments",
        "std" => "Unlimited Comments",
		"options" => array('Unlimited Comments' => __('Unlimited Comments', 'gp_lang'), 'One Comment' => __('One Comment', 'gp_lang')),
        "type" => "select"),

 		array(
		"name" => __('Comment Thumbs', 'gp_lang'),
        "desc" => __('Choose whether users can rate other comments (can be overridden on individual reviews).', 'gp_lang'),
        "id" => $shortname."_review_comment_thumbs",
        "std" => "Users can rate other comments",
		"options" => array('Users can rate other comments' => __('Users can rate other comments', 'gp_lang'), 'Users cannot rate other comments' => __('Users cannot rate other comments', 'gp_lang')),
        "type" => "select"),
        
		array(  
		"name" => __('Site Rating Multi Set ID', 'gp_lang'),
        "desc" => __('Enter the ID of your site rating multi set template that was created <a href="'.admin_url('admin.php?page=gd-star-rating-multi-sets').'">here</a> (can be overridden on individual review pages).', 'gp_lang'),
        "id" => $shortname."_site_multi_rating_id",
        "std" => "",
        "size" => "small",
        "type" => "text"),

		array(  
		"name" => __('User Rating Multi Set ID', 'gp_lang'),
        "desc" => __('Enter the ID of your user rating multi set template that was created <a href="'.admin_url('admin.php?page=gd-star-rating-multi-sets').'">here</a> (can be overridden on individual review pages).', 'gp_lang'),
        "id" => $shortname."_user_multi_rating_id",
        "std" => "",
        "size" => "small",        
        "type" => "text"),
          
  		array("type" => "divider"),
  		
		array(  
		"name" => __('Review Tag Links', 'gp_lang'),
        "desc" => __('Choose whether to link the review tags on review pages.', 'gp_lang'),
        "id" => $shortname."_review_tag_links",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
          
  		array("type" => "divider"),

		array(  
		"name" => __('Old Review Tags', 'gp_lang'),
        "desc" => __('If you cannot see your review tags enable this option.', 'gp_lang'),
        "id" => $shortname."_old_review_tags",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
                        
		array("type" => "divider"),
				
		array(  
		"name" => __('Post Date', 'gp_lang'),
        "desc" => __('Choose whether to display the review date.', 'gp_lang'),
        "id" => $shortname."_review_date",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

		array(  
		"name" => __('Post Author', 'gp_lang'),
        "desc" => __('Choose whether to display the review author.', 'gp_lang'),
        "id" => $shortname."_review_author",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(  
		"name" => __('Post Categories', 'gp_lang'),
        "desc" => __('Choose whether to display the review categories.', 'gp_lang'),
        "id" => $shortname."_review_cats",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
        
		array(  
		"name" => __('Post Comments', 'gp_lang'),
        "desc" => __('Choose whether to display the review comments.', 'gp_lang'),
        "id" => $shortname."_review_comments",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),
		
		array(  
		"name" => __('Post Tags', 'gp_lang'),
        "desc" => __('Choose whether to display the post tags.', 'gp_lang'),
        "id" => $shortname."_review_tags",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

  		array("type" => "divider"),
  		        
		array(  
		"name" => __('Review Tag 1', 'gp_lang'),
        "id" => $shortname."_review_tag_1",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 1 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_1_singular_name",
        "std" => "Release Date",
        "type" => "text"),

        array(
		"name" => __('Review Tag 1 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_1_plural_name",
        "std" => "Release Dates",
        "type" => "text"),

        array(
		"name" => __('Review Tag 1 Slug', 'gp_lang'),
        "desc" => __('The name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_1_slug",
        "std" => "release_dates",
        "type" => "text"),
        
		array("type" => "divider"),

		array(  
		"name" => __('Review Tag 2', 'gp_lang'),
        "id" => $shortname."_review_tag_2",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 2 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_2_singular_name",
        "std" => "Genre",
        "type" => "text"),

        array(
		"name" => __('Review Tag 2 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_2_plural_name",
        "std" => "Genres",
        "type" => "text"),

        array(
		"name" => __('Review Tag 2 Slug', 'gp_lang'),
        "desc" => __('The name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_2_slug",
        "std" => "genres",
        "type" => "text"),
        
		array("type" => "divider"),

		array(  
		"name" => __('Review Tag 3', 'gp_lang'),
        "id" => $shortname."_review_tag_3",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 3 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_3_singular_name",
        "std" => "Rating",
        "type" => "text"),

        array(
		"name" => __('Review Tag 3 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_3_plural_name",
        "std" => "Ratings",
        "type" => "text"),

        array(
		"name" => __('Review Tag 3 Slug', 'gp_lang'),
        "desc" => __('The name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_3_slug",
        "std" => "ratings",
        "type" => "text"),
        
		array("type" => "divider"),

		array(  
		"name" => __('Review Tag 4', 'gp_lang'),
        "id" => $shortname."_review_tag_4",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 4 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_4_singular_name",
        "std" => "Director",
        "type" => "text"),

        array(
		"name" => __('Review Tag 4 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_4_plural_name",
        "std" => "Directors",
        "type" => "text"),

        array(
		"name" => __('Review Tag 4 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_4_slug",
        "std" => "directors",
        "type" => "text"),
        
		array("type" => "divider"),

		array(  
		"name" => __('Review Tag 5', 'gp_lang'),
        "id" => $shortname."_review_tag_5",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 5 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_5_singular_name",
        "std" => "Producer",
        "type" => "text"),

        array(
		"name" => __('Review Tag 5 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_5_plural_name",
        "std" => "Producers",
        "type" => "text"),
        
        array(
		"name" => __('Review Tag 5 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_5_slug",
        "std" => "producers",
        "type" => "text"),
        
		array("type" => "divider"),
		
		array(  
		"name" => __('Review Tag 6', 'gp_lang'),
        "id" => $shortname."_review_tag_6",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 6 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_6_singular_name",
        "std" => "Screenwriter",
        "type" => "text"),

        array(
		"name" => __('Review Tag 6 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_6_plural_name",
        "std" => "Screenwriters",
        "type" => "text"),

        array(
		"name" => __('Review Tag 6 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_6_slug",
        "std" => "screenwriters",
        "type" => "text"),
        
		array("type" => "divider"),

		array(  
		"name" => __('Review Tag 7', 'gp_lang'),
        "id" => $shortname."_review_tag_7",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 7 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_7_singular_name",
        "std" => "Studio",
        "type" => "text"),

        array(
		"name" => __('Review Tag 7 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_7_plural_name",
        "std" => "Studios",
        "type" => "text"),

        array(
		"name" => __('Review Tag 7 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_7_slug",
        "std" => "studios",
        "type" => "text"),
        
		array("type" => "divider"),		
				
		array(  
		"name" => __('Review Tag 8', 'gp_lang'),
        "id" => $shortname."_review_tag_8",
        "std" => "0",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 8 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_8_singular_name",
        "std" => "Starring",
        "type" => "text"),

        array(
		"name" => __('Review Tag 8 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_8_plural_name",
        "std" => "Starring",
        "type" => "text"),

        array(
		"name" => __('Review Tag 8 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_8_slug",
        "std" => "starring",
        "type" => "text"),
        
		array("type" => "divider"),
		
		array(  
		"name" => __('Review Tag 9', 'gp_lang'),
        "id" => $shortname."_review_tag_9",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 9 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_9_singular_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 9 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_9_plural_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 9 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_9_slug",
        "std" => "",
        "type" => "text"),
        
		array("type" => "divider"),
		
		array(  
		"name" => __('Review Tag 10', 'gp_lang'),
        "id" => $shortname."_review_tag_10",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 10 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_10_singular_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 10 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_10_plural_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 10 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_10_slug",
        "std" => "",
        "type" => "text"),
        
  		array("type" => "divider"),
  		
		array(  
		"name" => __('Review Tag 11', 'gp_lang'),
        "id" => $shortname."_review_tag_11",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 11 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_11_singular_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 11 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_11_plural_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 11 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_11_slug",
        "std" => "",
        "type" => "text"),
        
  		array("type" => "divider"),

		array(  
		"name" => __('Review Tag 12', 'gp_lang'),
        "id" => $shortname."_review_tag_12",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 12 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_12_singular_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 12 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_12_plural_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 12 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_12_slug",
        "std" => "",
        "type" => "text"),
        
  		array("type" => "divider"),

		array(  
		"name" => __('Review Tag 13', 'gp_lang'),
        "id" => $shortname."_review_tag_13",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 13 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_13_singular_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 13 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_13_plural_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 13 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_13_slug",
        "std" => "",
        "type" => "text"),
        
  		array("type" => "divider"),

		array(  
		"name" => __('Review Tag 14', 'gp_lang'),
        "id" => $shortname."_review_tag_14",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 14 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_14_singular_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 14 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_14_plural_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 14 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_14_slug",
        "std" => "",
        "type" => "text"),
        
  		array("type" => "divider"),

		array(  
		"name" => __('Review Tag 15', 'gp_lang'),
        "id" => $shortname."_review_tag_15",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 15 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_15_singular_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 15 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_15_plural_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 15 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_15_slug",
        "std" => "",
        "type" => "text"),
 
 		array(  
		"name" => __('Review Tag 16', 'gp_lang'),
        "id" => $shortname."_review_tag_16",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 16 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_16_singular_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 16 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_16_plural_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 16 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_16_slug",
        "std" => "",
        "type" => "text"),
        
  		array("type" => "divider"),

		array(  
		"name" => __('Review Tag 17', 'gp_lang'),
        "id" => $shortname."_review_tag_17",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 17 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_17_singular_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 17 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_17_plural_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 17 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_17_slug",
        "std" => "",
        "type" => "text"),
        
  		array("type" => "divider"),

		array(  
		"name" => __('Review Tag 18', 'gp_lang'),
        "id" => $shortname."_review_tag_18",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 18 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_18_singular_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 18 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_18_plural_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 18 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_18_slug",
        "std" => "",
        "type" => "text"),
        
  		array("type" => "divider"),  		  		       
 
		array(  
		"name" => __('Review Tag 19', 'gp_lang'),
        "id" => $shortname."_review_tag_19",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 19 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_19_singular_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 19 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_19_plural_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 19 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_19_slug",
        "std" => "",
        "type" => "text"),
        
  		array("type" => "divider"),

		array(  
		"name" => __('Review Tag 20', 'gp_lang'),
        "id" => $shortname."_review_tag_20",
        "std" => "1",
		"options" => array(__('Enable', 'gp_lang'), __('Disable', 'gp_lang')),
        "type" => "radio"),

        array(
		"name" => __('Review Tag 20 Singular Name', 'gp_lang'),
        "desc" => __('The singular name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_20_singular_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 20 Plural Name', 'gp_lang'),
        "desc" => __('The plural name used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_20_plural_name",
        "std" => "",
        "type" => "text"),

        array(
		"name" => __('Review Tag 20 Slug', 'gp_lang'),
        "desc" => __('The slug used for this review tag. <strong>After saving this page, go to <em>Settings -> Permalinks</em> and click <em>Save Changes</em>.</strong>', 'gp_lang'),
        "id" => $shortname."_review_tag_20_slug",
        "std" => "",
        "type" => "text"),
  		  		  		  		  		  		          
		array("type" => "close"),

array(	"name" => __('Style Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_style_settings"),

		array(
		"name" => __('Style Settings', 'gp_lang'),
		"type" => "header",
      	"id" => $dirname."_style_header",
      	"desc" => __('This section provides you with some basic settings to change the look of the theme. If you want to customize the design of the theme further you can add your own CSS styling in the "CSS Settings" tab.', 'gp_lang')
      	),
  		
  		array("type" => "divider"),
  		  		
		array(  
		"name" => __('Cufon Fonts', 'gp_lang'),
        "desc" => __('Check fonts to enable.', 'gp_lang'),
        "id" => $shortname."_cufon_fonts",
        "type" => "header"),
        
		array(  
        "desc" => "<span class=\"chunkfive\">Chunk Five</span>",
        "id" => $shortname."_chunkfive",
        "extras" => "multi",
        "type" => "checkbox"),

		array(
        "desc" => "<span class=\"journal\">Journal</span>",
        "id" => $shortname."_journal",
        "extras" => "multi",
        "type" => "checkbox"),
        
		array(
        "desc" => "<span class=\"leaguegothic\">League Gothic</span>",
        "id" => $shortname."_leaguegothic",
        "extras" => "multi",
        "type" => "checkbox"),

		array(
        "desc" => "<span class=\"nevis\">Nevis</span>",
        "id" => $shortname."_nevis",
        "extras" => "multi",
        "type" => "checkbox"),
        
		array(
        "desc" => "<span class=\"quicksand\">Quicksand</span>",
        "id" => $shortname."_quicksand",
        "extras" => "multi",
        "type" => "checkbox"),

		array(
        "desc" => "<span class=\"sansation\">Sansation</span>",
        "id" => $shortname."_sansation",
        "extras" => "multi",
        "type" => "checkbox"),
        
		array(
        "desc" => "<span class=\"vegur\">Vegur</span>",
        "id" => $shortname."_vegur",
        "extras" => "multi",
        "type" => "checkbox"),
 
 		array("type" => "divider"),
 		
		array(
		"name" => __('Cufon Replacement Code', 'gp_lang'),
        "desc" => __('If you want to add cufon to other text or use more than one cufon font e.g. <code>Cufon.replace("h1,h2,h3,h4,h5,h6", {fontFamily: "Vegur"});</code><br/><code>Cufon.replace("#logo-text", {fontFamily: "Sansation"});</code>', 'gp_lang'),
        "id" => $shortname."_cufon_code",
        "std" => "",
        "type" => "textarea"),

		array("type" => "close"),
		
array(	"name" => __('CSS Settings', 'gp_lang'),
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_css_settings"),

		array(
		"name" => "CSS Settings",
		"type" => "header",
      	"id" => $dirname."_css_header",
      	"desc" => __('You can add your own CSS below to style the theme. This CSS will not be lost if you update the theme. For more information on how to find the names of the elements you want to style  click', 'gp_lang').' <a href="http://ghostpool.com/help/'.$dirname.'/help.html#customizing-design" target="_blank">'.__('here', 'gp_lang').'</a>.'
      	),

  		array("type" => "divider"),
  		
		array(
		"name" => __('Custom CSS', 'gp_lang'),
        "desc" => '',
        "id" => $shortname."_custom_css",
        "std" => "",
        "size" => "large",        
        "type" => "textarea"),
        
		array("type" => "close"),
	
);

function gp_add_admin() {

    global $dirname, $options;
			
    if(isset($_GET['page']) && $_GET['page'] == basename(__FILE__)) {

        if(isset($_REQUEST['action']) && 'save' == $_REQUEST['action']) {

			foreach($options as $value) {
				if(isset($value['id'])) {
					update_option($value['id'], $_REQUEST[ $value['id']]);
				} else {
					if(isset($value['id'])) { delete_option($value['id']); }
				}
			}

			header("Location: themes.php?page=theme-options.php&saved=true");
			die;

        } elseif(isset($_REQUEST['action']) && 'reset' == $_REQUEST['action']) {

            foreach($options as $value) {
                delete_option($value['id']);
            }
            
            update_option($dirname.'_theme_setup_status', '0');

            header("Location: themes.php?page=theme-options.php&reset=true");
            die;

        }

		elseif(isset($_REQUEST['action']) && 'export' == $_REQUEST['action']) export_settings();
		elseif(isset($_REQUEST['action']) && 'import' == $_REQUEST['action']) import_settings();

    }

    add_theme_page(__('Theme Options', 'gp_lang'), __('Theme Options', 'gp_lang'), 'manage_options', basename(__FILE__), 'gp_admin');

}

function gp_admin() {

    global $dirname, $options;

    if(isset($_REQUEST['saved']) && $_REQUEST['saved']) echo '<div id="message" class="updated"><p><strong>'.__('Options Saved', 'gp_lang').'</strong></p></div>';
    if(isset($_REQUEST['reset']) && $_REQUEST['reset']) echo '<div id="message" class="updated"><p><strong>'.__('Options Reset', 'gp_lang').'</strong></p></div>';

?>


<!-- BEGIN THEME WRAPPER -->

<div id="gp-theme-options" class="wrap">
	
	<?php screen_icon('options-general'); ?>
	<h2><?php _e('Theme Options', 'gp_lang'); ?></h2>
		
	<p><h3><a href="http://ghostpool.com/help/<?php echo $dirname; ?>/help.html" target="_blank"><?php _e('Help File', 'gp_lang'); ?></a> | <a href="http://ghostpool.com/help/<?php echo $dirname; ?>/changelog.html" target="_blank"><?php _e('Changelog', 'gp_lang'); ?></a> | <a href="http://ghostpool.ticksy.com" target="_blank"><?php _e('Support', 'gp_lang'); ?></a> | <a href="http://www.ourwebmedia.com/ghostpool.php?aff=002" target="_blank"><?php _e('Premium Services', 'gp_lang'); ?></a></h3></p>
	
	<div id="import_export" class="hide-if-js">
	
		<h3><?php _e('Import Theme Options', 'gp_lang'); ?></h3>
		<div class="option-desc"><?php _e('If you have a back up of your theme options you can import them below.', 'gp_lang'); ?></div>
		
		<form method="post" enctype="multipart/form-data">
			<p class="submit"><input type="file" name="file" id="file" />
			<input type="submit" name="import" class="button" value="<?php _e('Upload', 'gp_lang'); ?>" /></p>
			<input type="hidden" name="action" value="import" />
		</form>

		<div class="divider"></div>
		
		<h3><?php _e('Export Theme Options', 'gp_lang'); ?></h3>
		<div class="option-desc"><?php _e('If you want to create a back up of all your theme options click the Export button below (will only back up your theme options and not your post/page/images data).', 'gp_lang'); ?></div>
		
		<form method="post">
			<p class="submit"><input name="export" type="submit" class="button" value="<?php _e('Export Theme Settings', 'gp_lang'); ?>" /></p>
			<input type="hidden" name="action" value="export" />
		</form>	
	
	</div>

	
	<form method="post">
		
		<div class="submit">	
		
			<a href="#TB_inline?height=300&amp;width=500&amp;inlineId=import_export" onclick="return false;" class="thickbox"><input type="button" class="button" value="<?php _e('Import/Export Theme Options' ,'gp_lang'); ?>"></a>
		
			<input name="save" type="submit" class="button-primary right" value="<?php _e('Save Changes', 'gp_lang'); ?>" />
			<input type="hidden" name="action" value="save" />
			
		</div>
		
		<div id="panels">


<?php foreach($options as $value) {
switch($value['type']) {
case "open":
?>

<?php break;
case "title":
?>

<div class="panel" id="<?php echo $value['name']; ?>">


<?php break;
case "header":
?>

	<div class="option option-header">
		<?php if(isset($value['name'])) { ?><h2><?php echo $value['name']; ?></h2><?php } ?>
		<?php if(isset($value['desc'])) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>	
	
	
<?php break;
case "close":
?>

</div>

<!-- END PANEL -->


<?php break;
case "divider":
?>

<div class="divider"></div>


<?php break;
case 'text':
?>
	
	<?php if(isset($value['name'])) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if(isset($value['style'])) { ?> style="<?php echo $value['style']; ?>"<?php } ?><?php if(isset($value['style'])) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if(get_option($value['id'])!= "") { echo get_option($value['id']); } else { echo $value['std']; } ?>" size="<?php if(isset($value['size']) && $value['size'] == "small") { ?>3<?php } else { ?>40<?php } ?>" /><?php if(isset($value['details'])) { ?> <span><?php echo $value['details']; ?></span>&nbsp;<?php } ?>
		<?php if(isset($value['desc'])) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php break;
case 'upload':
?>

	<?php if(isset($value['name'])) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option uploader"<?php if(isset($value['style'])) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" size="40" class="upload" value="<?php echo get_option($value['id']); ?>" />
		<input type="button" id="<?php echo $value['id']; ?>_button" class="upload-image-button button" value="<?php _e('Upload', 'gp_lang'); ?>" />
		<?php if(isset($value['desc'])) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php
break;

case 'textarea':
?>

	<?php if(isset($value['name'])) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if(isset($value['style'])) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="70" rows="<?php if(isset($value['size']) && $value['size'] == "large") { ?>50<?php } else { ?>10<?php } ?>"><?php if(get_option($value['id']) != "") { echo stripslashes(get_option($value['id'])); } else { echo $value['std']; } ?></textarea>
		<?php if(isset($value['desc'])) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php
break;
case 'select':
?>
	
	<?php if(isset($value['name'])) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if(isset($value['style'])) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
			<?php foreach($value['options'] as $key=>$option) { ?>
					<?php if(get_option($value['id']) != "") { ?>
						<option value="<?php echo $key; ?>" <?php if(get_option($value['id']) == $key) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php } else { ?>
						<option value="<?php echo $key; ?>" <?php if($value['std'] == $key) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
					<?php } ?>
			<?php } ?>
		</select>
		<?php if(isset($value['desc'])) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php
break;
case 'select_taxonomy':
?>
		
	<?php if(isset($value['name'])) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if(isset($value['style'])) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<?php $terms = get_terms($value['cats'], 'hide_empty=0'); ?>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><option value=''><?php _e('None', 'gp_lang'); ?></option><?php foreach($terms as $term): ?><option value="<?php echo $term->slug; ?>" <?php if(get_option($value['id'])==  $term->slug) { echo ' selected="selected"'; } ?>><?php echo $term->name; ?></option><?php endforeach; ?></select>
		<?php if(isset($value['desc'])) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>	



<?php
break;
case 'select_sidebar':
global $post, $wp_registered_sidebars;
?>
		
	<?php if(isset($value['name'])) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if(isset($value['style'])) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
		<?php $sidebars = $wp_registered_sidebars; 
		if(is_array($sidebars) && !empty($sidebars)) { 
			foreach($sidebars as $sidebar) { 
				if(get_option($value['id']) != "") { ?>
					<option value="<?php echo $sidebar['id']; ?>"<?php if(get_option($value['id']) == $sidebar['id']) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>
				<?php } else { ?>				
					<option value="<?php echo $sidebar['id']; ?>"<?php if($value['std'] == $sidebar['id']) { echo ' selected="selected"'; } ?>><?php echo $sidebar['name']; ?></option>				
		<?php }}} ?>	
		</select>
		<?php if(isset($value['desc'])) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>

	
<?php
break;
case "checkbox":
?>
   
   	
   	<?php if(isset($value['name'])) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option<?php if ( isset( $value['extras'] ) && $value['extras'] == "multi" ) { ?> multi-checkbox<?php } ?>">
		<?php if(get_option($value['id'])) { $checked = "checked=\"checked\""; } else { $checked = ""; } ?><input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
		<?php if(isset($value['desc'])) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php        
break;
case "radio":
?>

	<?php if(isset($value['name'])) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if(isset($value['style'])) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<?php foreach($value['options'] as $key=>$option) {	
			$radio_setting = get_option($value['id']);
			if($radio_setting != '') {
				if($key == get_option($value['id'])) {
					$checked = "checked=\"checked\"";
				} else {
					$checked = "";
				}
			} else {
				if($key == $value['std']) {
					$checked = "checked=\"checked\"";
				} else {
					$checked = "";
				}
			} ?>
			<div class="radio-buttons">
				<input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $value['id'] . $key; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><label for="<?php echo $value['id'].'_'.$key; ?>"><?php echo $option; ?></label>
			</div>	
		<?php } ?>
		<div class="clear"></div>
		<?php if(isset($value['desc'])) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php        
break;
case "colorpicker":
?>

	<?php if(isset($value['name'])) { ?><h3><?php echo $value['name']; ?></h3><?php } ?>
	<div class="option"<?php if(isset($value['style'])) { ?> style="<?php echo $value['style']; ?>"<?php } ?>>
		<script type="text/javascript">
			jQuery(document).ready(function($) { 
				$("#<?php echo $value['id']; ?>").wpColorPicker();
			});
		</script>
		<input type="text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if(get_option($value['id'])!= "") { echo get_option($value['id']); } else { echo $value['std']; } ?>" />
		<?php if(isset($value['desc'])) { ?><div class="option-desc"><?php echo $value['desc']; ?></div><?php } ?>
	</div>


<?php        
break;
}}
?>

	</div>
	
	<div class="submit">

			<input name="save" type="submit" class="button-primary right" value="<?php _e('Save Changes', 'gp_lang'); ?>" />
			<input type="hidden" name="action" value="save" />

		</form>
	
		<form method="post" onSubmit="if(confirm('<?php _e('Are you sure you want to reset all the theme options&#63;', 'gp_lang'); ?>')) return true; else return false;">	
			<input name="reset" type="submit" class="button right" style="margin-right: 10px;" value="<?php _e('Reset', 'gp_lang'); ?>" />
			<input type="hidden" name="action" value="reset" />			
		</form>
		
		<div class="clear"></div>
	
	</div>

</div>

<!-- END THEME WRAPPER -->


<?php } 

if(is_admin() && $pagenow == "themes.php") {
	function gp_admin_scripts() {
		wp_enqueue_style('thickbox');
		wp_enqueue_style('wp-color-picker');
		wp_enqueue_style('gp-admin', get_template_directory_uri().'/lib/admin/css/admin.css');	
		wp_enqueue_script('jquery-ui-core');
		wp_enqueue_script('jquery-ui-sortable');
		wp_enqueue_script('thickbox');
		wp_enqueue_media();
		wp_enqueue_script('gp-tabs', get_template_directory_uri().'/lib/admin/scripts/jquery.tabs.js', array('jquery'));
		wp_enqueue_script('wp-color-picker');
		wp_enqueue_script('gp-cufon', get_template_directory_uri().'/lib/scripts/cufon-yui.js', array('jquery'));
		wp_enqueue_script('gp-chunkfive', get_template_directory_uri().'/lib/fonts/ChunkFive_400.font.js', array('gp-cufon'));
		wp_enqueue_script('gp-journal', get_template_directory_uri().'/lib/fonts/Journal_400.font.js', array('gp-cufon'));
		wp_enqueue_script('gp-leaguegothic', get_template_directory_uri().'/lib/fonts/League_Gothic_400.font.js', array('gp-cufon'));
		wp_enqueue_script('gp-nevis', get_template_directory_uri().'/lib/fonts/nevis_700.font.js', array('gp-cufon'));
		wp_enqueue_script('gp-quicksand', get_template_directory_uri().'/lib/fonts/Quicksand_Book.font.js', array('gp-cufon'));
		wp_enqueue_script('gp-sansation', get_template_directory_uri().'/lib/fonts/Sansation_400-Sansation_700.font.js', array('gp-cufon'));
		wp_enqueue_script('gp-vegur', get_template_directory_uri().'/lib/fonts/Vegur_400-Vegur_700-Vegur_300.font.js', array('gp-cufon'));							
		wp_enqueue_script('gp-cufon-replace', get_template_directory_uri().'/lib/admin/scripts/cufon.js');		
		wp_enqueue_script('gp-uploader', get_template_directory_uri().'/lib/admin/scripts/uploader.js');
	}
	add_action('admin_print_scripts', 'gp_admin_scripts');
}

add_action('admin_menu', 'gp_add_admin'); 


// Export Theme Options
function export_settings() {
	global $options;
	header("Cache-Control: public, must-revalidate");
	header("Pragma: hack");
	header("Content-Type: text/plain");
	header('Content-Disposition: attachment; filename="theme-options-'.date("dMy").'.dat"');
	foreach($options as $value) $theme_settings[$value['id']] = get_option($value['id']);	
	echo serialize($theme_settings);
}

// Import Theme Options
function import_settings() {
	global $options;
	if($_FILES["file"]["error"] > 0) {
		echo "Error: " . $_FILES["file"]["error"] . "<br />";
	} else {
		$rawdata = file_get_contents($_FILES["file"]["tmp_name"]);		
		$theme_settings = unserialize($rawdata);		
		foreach($options as $value) {
			if($theme_settings[$value['id']]) {
				update_option($value['id'], $theme_settings[$value['id']]);
				$$value['id'] = $theme_settings[$value['id']];
			} else {
				if($value['type'] == 'checkbox_multiple')$$value['id'] = array();
				else $$value['id'] = $value['std'];
			}
		}
		
	}
	if(in_array('cacheStyles', get_option('theme_misc'))) cache_settings();
	wp_redirect($_SERVER['PHP_SELF'].'?page=theme-options.php');
}

// Help Tab
if(is_admin() && $pagenow == "themes.php") {
	function theme_help_tab() {
		global $dirname;
		$screen = get_current_screen();
		$screen->add_help_tab(array( 
			'id' => 'help', 'title' => 'Help', 'content' => '<p><a href="http://ghostpool.com/help/'.$dirname.'/help.html" target="_blank">'.__('Help File', 'gp_lang').'</a></p><p><a href="http://ghostpool.com/help/'.$dirname.'/changelog.html" target="_blank">'.__('Changelog', 'gp_lang').'</a></p><p><a href="http://ghostpool.ticksy.com" target="_blank">'.__('Support', 'gp_lang').'</a></p><p><a href="http://www.ourwebmedia.com/ghostpool.php?aff=002" target="_blank">'.__('Premium Services', 'gp_lang').'</a></p>'
		));	
	}
	add_action('admin_head', 'theme_help_tab');
}


/////////////////////////////////////// Save Default Theme Options ///////////////////////////////////////

add_action('after_setup_theme', 'the_theme_setup');
function the_theme_setup() {

	global $dirname;

	// Check if user is updating from earlier version of theme
	if(!get_option('theme_skin') && !get_option('theme_rss_button')) {
	
		if(get_option($dirname.'_theme_setup_status') !== '1') {
		
			$core_settings = array(
			
				/* General Settings */
				'theme_skin' => 'dark',
				'theme_profile_links' => '0',
				'theme_breadcrumbs' => 'Enable',
				'theme_search_criteria' => 'All Posts And Pages',
				'theme_rss_button' => '0',
				'theme_jwplayer' => '1',			
				$dirname.'_old_video_shortcode' => '1',	
				
				/* Slider Settings */
				'theme_slider_cats' => '',
				'theme_slider_display' => 'Homepage',
				
				/* Homepage settings */
				'theme_homepage_sidebar' => 'homepage-right',
				'theme_homepage_layout' => 'sb-right',
				'theme_homepage_buttons' => '0',
				
				/* Blog Page Settings */
				'theme_blog_thumbnail_width' => '638',
				'theme_blog_thumbnail_height' => '250',
				'theme_blog_image_wrap' => 'Disable',
				'theme_blog_sidebar' => 'default',
				'theme_blog_layout' => 'sb-right',
				'theme_blog_title' => 'Show',
				'theme_blog_buttons' => '1',
				'theme_blog_posts_per_page' => '10',
				'theme_blog_post_display' => 'List',
				'theme_blog_content_display' => 'Excerpt',
				'theme_blog_title_length' => '200',
				'theme_blog_excerpt_length' => '400',
				'theme_blog_read_more' => '0',
				'theme_blog_dropdown_filter' => '1',
				'theme_blog_date' => '0',
				'theme_blog_author' => '0',
				'theme_blog_cats_' => '0',
				'theme_blog_comments' => '0',
				'theme_blog_tags' => '1',
				
				/* Post Category Settings */
				'theme_cat_thumbnail_width' => '638',
				'theme_cat_thumbnail_height' => '250',
				'theme_cat_image_wrap' => 'Disable',
				'theme_cat_sidebar' => 'default',
				'theme_cat_layout' => 'sb-right',
				'theme_cat_title' => 'Show',
				'theme_cat_buttons' => '1',
				'theme_cat_posts_per_page' => '10',
				'theme_cat_post_display' => 'List',
				'theme_cat_rating_type' => 'Site & User Rating',
				'theme_cat_content_display' => 'Excerpt',
				'theme_cat_title_length' => '200',
				'theme_cat_excerpt_length' => '300',
				'theme_cat_read_more' => '0',
				'theme_cat_dropdown_filter' => '1',
				'theme_cat_date' => '0',
				'theme_cat_author' => '0',
				'theme_cat_cats' => '0',
				'theme_cat_comments' => '0',
				'theme_cat_tags' => '1',	
				
				/* Review Category Settings */
				'theme_cat_singular_name' => 'Review Category',
				'theme_review_cat_plural_name' => 'Review Categories',
				'theme_review_cat_slug' => 'reviews',
				'theme_review_cat_thumbnail_width' => '100',
				'theme_review_cat_thumbnail_height' => '130',
				'theme_review_cat_image_wrap' => 'Enable',
				'theme_review_cat_sidebar' => 'default',
				'theme_review_cat_layout' => 'sb-right',
				'theme_review_cat_title' => 'Show',
				'theme_review_cat_buttons' => '1',
				'theme_review_cat_posts_per_page' => '10',
				'theme_review_cat_post_display' => 'List',
				'theme_review_cat_rating_type' => 'Site & User Rating',
				'theme_review_cat_content_display' => 'Excerpt',
				'theme_review_cat_title_length' => '200',
				'theme_review_cat_excerpt_length' => '250',
				'theme_review_cat_read_more' => '0',
				'theme_review_cat_dropdown_filter' => '0',
				'theme_review_cat_date' => '0',
				'theme_review_cat_author' => '0',
				'theme_review_cat_cats' => '0',
				'theme_review_cat_comments' => '0',
				'theme_review_cat_tags' => '1',	
				
				/* Post Settings */
				'theme_show_post_image' => 'Show',
				'theme_post_image_width' => '638',
				'theme_post_image_height' => '250',
				'theme_post_image_wrap' => 'Disable',
				'theme_post_sidebar' => 'default',
				'theme_post_layout' => 'sb-right',
				'theme_post_title' => 'Show',
				'theme_post_comment_thumbs' => 'Users cannot rate other comments',
				'theme_post_date' => '0',
				'theme_post_author' => '0',
				'theme_post_cats' => '0',
				'theme_post_comments' => '0',
				'theme_post_tags' => '1',
				
				/* Page Settings */	
				'theme_show_page_image' => 'Show',
				'theme_page_image_width' => '638',
				'theme_page_image_height' => '250',
				'theme_page_image_wrap' => 'Disable',
				'theme_page_sidebar' => 'default',
				'theme_page_layout' => 'sb-right',
				'theme_page_title' => 'Show',
				'theme_page_comment_thumbs' => 'Users cannot rate other comments',
				'theme_page_date' => '1',
				'theme_page_author' => '1',
				'theme_page_comments' => '1',							
						
				/* Review Page Settings */				
				'theme_review_singular_name' => 'Review',
				'theme_review_plural_name' => 'Reviews',
				'theme_review_slug' => 'review',								
				'theme_show_review_image' => 'Show',
				'theme_review_image_width' => '180',
				'theme_review_image_height' => '0',
				'theme_review_sidebar' => 'default',
				'theme_review_layout' => 'sb-right',
				'theme_review_title' => 'Show',
				'theme_review_panel_left_width' => '180',
				'theme_review_positioning' => 'Layout 1',
				'theme_review_text_position' => 'Within Review Tabs',
				'theme_user_voting' => 'Vote with or without posting a comment',
				'theme_user_comments' => 'Unlimited Comments',
				'theme_review_comment_thumbs' => 'Users can rate other comments',
				'theme_review_tag_links' => '0',
				'theme_review_tag_1' => '0',
				'theme_review_tag_1_singular_name' => 'Release Date',
				'theme_review_tag_1_plural_name' => 'Release Dates',
				'theme_review_tag_1_slug' => 'release_dates',
				'theme_review_tag_2' => '0',
				'theme_review_tag_2_singular_name' => 'Genre',
				'theme_review_tag_2_plural_name' => 'Genres',
				'theme_review_tag_2_slug' => 'genres',
				'theme_review_tag_3' => '0',
				'theme_review_tag_3_singular_name' => 'Rating',
				'theme_review_tag_3_plural_name' => 'Ratings',
				'theme_review_tag_3_slug' => 'ratings',
				'theme_review_tag_4' => '0',
				'theme_review_tag_4_singular_name' => 'Director',
				'theme_review_tag_4_plural_name' => 'Directors',
				'theme_review_tag_4_slug' => 'directors',
				'theme_review_tag_5' => '0',
				'theme_review_tag_5_singular_name' => 'Producer',
				'theme_review_tag_5_plural_name' => 'Producers',
				'theme_review_tag_5_slug' => 'producers',
				'theme_review_tag_6' => '0',
				'theme_review_tag_6_singular_name' => 'Screenwriter',
				'theme_review_tag_6_plural_name' => 'Screenwriters',
				'theme_review_tag_6_slug' => 'screenwriters',
				'theme_review_tag_7' => '0',
				'theme_review_tag_7_singular_name' => 'Studio',
				'theme_review_tag_7_plural_name' => 'Studios',
				'theme_review_tag_7_slug' => 'studios',
				'theme_review_tag_8' => '0',
				'theme_review_tag_8_singular_name' => 'Starring',
				'theme_review_tag_8_plural_name' => 'Starring',
				'theme_review_tag_8_slug' => 'starring',
				'theme_review_tag_9' => '1',
				'theme_review_tag_10' => '1',
				'theme_old_review_tags' => '1',
				'theme_review_date' => '0',
				'theme_review_author' => '0',
				'theme_review_cats' => '0',
				'theme_review_comments' => '0',
				'theme_review_tags' => '1',																		
			);
			
			foreach ($core_settings as $k => $v) {
				update_option($k, $v);
			}
	
			update_option($dirname.'_theme_setup_status', '1');
	
		}
	
	}

}

?>