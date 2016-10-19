<?php

if(is_admin() && isset($_GET['activated']) && $pagenow == "themes.php") {

	global $dirname;

	if(get_option($dirname.'_theme_auto_install') !== '1') {


		/////////////////////////////////////// Delete Default Content ///////////////////////////////////////	


		// Default Posts
		$post = get_page_by_path('hello-world', OBJECT, 'post');
		if($post) { wp_delete_post($post->ID,true); }

		// Default Pages		
		$post = get_page_by_path('sample-page', OBJECT, 'page');
		if($post) { wp_delete_post($post->ID,true); }
		
		
		/////////////////////////////////////// Create Attachments ///////////////////////////////////////	


		require_once(ABSPATH . 'wp-admin/includes/file.php');
		require_once(ABSPATH . 'wp-admin/includes/media.php');
		require(ABSPATH . 'wp-admin/includes/image.php');
		
		$filename1 = get_template_directory_uri().'/lib/images/placeholder1.png';
		$description1 = 'Image Description 1';
		media_sideload_image($filename1, 0, $description1);
		$last_attachment1 = $wpdb->get_row($query = "SELECT * FROM {$wpdb->prefix}posts ORDER BY ID DESC LIMIT 1", ARRAY_A);
		$attachment_id1 = $last_attachment1['ID'];
		
		$filename2 = get_template_directory_uri().'/lib/images/placeholder2.png';
		$description2 = 'Image Description 2';
		media_sideload_image($filename2, 0, $description2);
		$last_attachment2 = $wpdb->get_row($query = "SELECT * FROM {$wpdb->prefix}posts ORDER BY ID DESC LIMIT 2", ARRAY_A);
		$attachment_id2 = $last_attachment2['ID'];
		
		
		/////////////////////////////////////// Create Pages ///////////////////////////////////////	


		/*************************************** Homepage ***************************************/	
	
		update_option('page_on_front', 0);
		update_option('show_on_front', 'posts');
		

		/*************************************** Blog Page ***************************************/	
		
		$new_page_title = 'Blog Page';
		$new_page_content = '';
		$page_check = get_page_by_title($new_page_title);
		$new_page = array(
			'post_type' => 'page',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'closed'
		);
		if(!isset($page_check->ID)){
			$new_page_id = wp_insert_post($new_page);
			update_post_meta($new_page_id, '_wp_page_template', 'blog.php');
		}
		
							
		/*************************************** Contact Page ***************************************/	
		
		$new_page_title = 'Contact Page';
		$new_page_content = '[contact email="youraddress@email.com"]';
		$page_check = get_page_by_title($new_page_title);
		$new_page = array(
			'post_type' => 'page',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'closed'
		);
		if(!isset($page_check->ID)){
			$new_page_id = wp_insert_post($new_page);
			update_post_meta($new_page_id, 'ghostpool_sidebar', 'gp-contact-page');
		}

		
		/////////////////////////////////////// Create Posts ///////////////////////////////////////	


		/*************************************** Post 1 ***************************************/	

		$new_page_title = 'Article 1';
		$new_page_content =
'Globally pontificate viral services rather than superior niches. Dramatically seize backward-compatible imperatives after viral functionalities. Compellingly architect best-of-breed models via revolutionary resources. Continually myocardinate value-added benefits with best-of-breed initiatives. Completely generate superior sources through client-centric core competencies.

Conveniently leverage existing efficient processes through cost effective sources. Competently monetize diverse e-commerce rather than mission-critical strategic theme areas. Efficiently embrace frictionless collaboration.';
		$page_check = get_page_by_title($new_page_title, '', 'post');
		$new_page = array(
			'post_type' => 'post',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'open',
			'post_excerpt' => '',
			'tags_input' => 'articles'
		);
		if(!isset($page_check->ID)) {
			$new_page_id = wp_insert_post($new_page);
			set_post_thumbnail($new_page_id, $attachment_id1);
		}
		

		/*************************************** Post 2 ***************************************/	

		$new_page_title = 'Article 2';
		$new_page_content =
'Progressively cultivate client-centered strategic theme areas before fully researched action items. Competently incentivize proactive data vis-a-vis one-to-one meta-services. Objectively brand maintainable strategic theme areas through backward-compatible web services. Quickly provide access to world-class innovation after goal-oriented schemas. Continually aggregate proactive paradigms with fully tested testing procedures.

Objectively target robust channels whereas maintainable partnerships. Enthusiastically foster enterprise-wide human capital after real-time partnerships. Objectively implement flexible vortals without viral best practices. Authoritatively whiteboard clicks-and-mortar paradigms and fully researched models. Phosfluorescently mesh team driven applications through virtual scenarios.';
		$page_check = get_page_by_title($new_page_title, '', 'post');
		$new_page = array(
			'post_type' => 'post',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'open',
			'post_excerpt' => '',
			'tags_input' => 'articles'
		);
		if(!isset($page_check->ID)) {
			$new_page_id = wp_insert_post($new_page);
			set_post_thumbnail($new_page_id, $attachment_id2);
		}


		/*************************************** Post 3 ***************************************/	

		$new_page_title = 'Article 3';
		$new_page_content =
'Rapidiously expedite technically sound alignments after excellent e-commerce. Conveniently architect stand-alone core competencies after equity invested users. Appropriately incentivize highly efficient e-services via client-based platforms. Holisticly cultivate transparent bandwidth with multidisciplinary expertise. Efficiently visualize collaborative communities and cross functional methods of empowerment.

Appropriately foster interdependent users via ethical technologies. Uniquely synergize resource sucking results vis-a-vis tactical innovation. Dynamically restore low-risk high-yield e-tailers rather than out-of-the-box collaboration and idea-sharing. Objectively embrace pandemic outsourcing whereas team building alignments. Continually benchmark frictionless architectures without error-free infomediaries.

Enthusiastically evisculate equity invested schemas before distinctive experiences. Competently extend multifunctional action items before intermandated meta-services. Quickly matrix web-enabled technologies rather than market positioning.';
		$page_check = get_page_by_title($new_page_title, '', 'post');
		$new_page = array(
			'post_type' => 'post',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'open',
			'post_excerpt' => '',
			'tags_input' => 'articles'
		);
		if(!isset($page_check->ID)) {
			$new_page_id = wp_insert_post($new_page);
			set_post_thumbnail($new_page_id, $attachment_id1);
		}
		
		
		/*************************************** Post 4 ***************************************/	

		$new_page_title = 'Article 4';
		$new_page_content =
'Uniquely harness business technology vis-a-vis viral web-readiness. Credibly create goal-oriented niches before principle-centered materials. Synergistically actualize cross functional action items vis-a-vis alternative functionalities. Collaboratively reinvent mission-critical solutions via visionary paradigms. Intrinsicly integrate inexpensive schemas with customized opportunities.

Completely orchestrate resource maximizing information through resource sucking alignments. Monotonectally integrate world-class strategic theme areas and web-enabled outsourcing. Credibly incubate next-generation convergence before cost effective vortals. Efficiently enable 2.0 strategic theme areas and covalent scenarios. Energistically target dynamic catalysts for change and standards compliant mindshare.

Compellingly visualize worldwide ROI after cost effective methodologies. Dramatically pontificate 24/7 channels via scalable synergy. Rapidiously engage intermandated opportunities and one-to-one resources. Continually streamline adaptive.';
		$page_check = get_page_by_title($new_page_title, '', 'post');
		$new_page = array(
			'post_type' => 'post',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'open',
			'post_excerpt' => '',
			'tags_input' => 'articles'
		);
		if(!isset($page_check->ID)) {
			$new_page_id = wp_insert_post($new_page);
			set_post_thumbnail($new_page_id, $attachment_id2);
		}
		
		
		/////////////////////////////////////// Create Reviews ///////////////////////////////////////	

 				
		/*************************************** Review 1 ***************************************/	
		
		$new_page_title = 'Review 1';
		$new_page_content =
'Assertively fashion visionary e-business via installed base technologies. Appropriately reconceptualize error-free initiatives with value-added customer service. Monotonectally syndicate impactful core competencies via user. 
	
Rapidiously initiate premier functionalities and functionalized catalysts for change. Credibly incentivize just in time niche markets through wireless systems. Appropriately envisioneer distributed collaboration and idea-sharing with viral communities. Uniquely maximize next-generation innovation before multifunctional catalysts for change. Monotonectally integrate professional technologies vis-a-vis top-line leadership.';
		$page_check = get_page_by_title($new_page_title, '', 'review');
		$new_page = array(
			'post_type' => 'review',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'open'
		);
		if(!isset($page_check->ID)){	
			$new_page_id = wp_insert_post($new_page);
			update_post_meta($new_page_id, 'ghostpool_tab_title_0', 'Review');
			update_post_meta($new_page_id, 'ghostpool_tab_title_1', 'Articles');
			update_post_meta($new_page_id, 'ghostpool_tab_id_1', 'articles');
			update_post_meta($new_page_id, 'ghostpool_tab_title_2', 'Static Content');
			update_post_meta($new_page_id, 'ghostpool_tab_id_2', 'article-4');
			update_post_meta($new_page_id, 'ghostpool_tab_type_2', 'Page');
			set_post_thumbnail($new_page_id, $attachment_id1);
		}
		

		/*************************************** Review 2 ***************************************/	

		$new_page_title = 'Review 2';
		$new_page_content =
'Proactively target mission-critical users after top-line products. Seamlessly coordinate transparent information whereas resource-leveling potentialities. Proactively syndicate orthogonal best practices after professional imperatives. Credibly target distributed infomediaries for granular web-readiness. Competently predominate prospective internal or "organic" sources for worldwide paradigms.';
		$page_check = get_page_by_title($new_page_title, '', 'review');
		$new_page = array(
			'post_type' => 'review',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'open'
		);
		if(!isset($page_check->ID)) {
			$new_page_id = wp_insert_post($new_page);
			update_post_meta($new_page_id, 'ghostpool_tab_title_0', 'Review');
			update_post_meta($new_page_id, 'ghostpool_tab_title_1', 'Articles');
			update_post_meta($new_page_id, 'ghostpool_tab_id_1', 'articles');
			update_post_meta($new_page_id, 'ghostpool_tab_title_2', 'Static Content');
			update_post_meta($new_page_id, 'ghostpool_tab_id_2', 'article-4');
			update_post_meta($new_page_id, 'ghostpool_tab_type_2', 'Page');			
			set_post_thumbnail($new_page_id, $attachment_id2);			
		}


		/////////////////////////////////////// Create Slides ///////////////////////////////////////	


		/*************************************** Slide 1 ***************************************/	
				
		$new_page_title = 'Slide 1';
		$new_page_content = 'Proactively develop competitive strategic theme areas before inexpensive best practices. Proactively conceptualize viral convergence for standardized schemas. Intrinsicly.';
		$page_check = get_page_by_title($new_page_title, '', 'slide');
		$new_page = array(
			'post_type' => 'slide',
			'post_title' => $new_page_title,
			'post_content' => $new_page_content,
			'post_status' => 'publish',
			'post_author' => 1,
			'comment_status' => 'closed'
		);
		if(!isset($page_check->ID)){
			$new_page_id = wp_insert_post($new_page);
			update_post_meta($new_page_id, 'ghostpool_slide_url', '#');
			update_post_meta($new_page_id, 'ghostpool_slide_read_on', true);
			update_post_meta($new_page_id, 'ghostpool_slide_video', 'http://vimeo.com/36006533');
			set_post_thumbnail($new_page_id, $attachment_id1);
		}
				
		
		/////////////////////////////////////// Create Navigation ///////////////////////////////////////	


		/*************************************** Header Nav ***************************************/	
		
		$menu_name = 'Header';
		$menu_location = 'header-nav';
		$menu_exists = wp_get_nav_menu_object($menu_name);			
		if(!$menu_exists) {
			$menu_id = wp_create_nav_menu($menu_name);
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  'Home',
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'), 
				'menu-item-status' => 'publish')
			);	
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  'Reviews',
				'menu-item-classes' => 'reviews',
				'menu-item-url' => home_url('/reviews'), 
				'menu-item-status' => 'publish')
			);	
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => 'Blog',
				'menu-item-object' => 'page',
				'menu-item-object-id' => get_page_by_path('blog-page')->ID,
				'menu-item-type' => 'post_type',
				'menu-item-status' => 'publish')
			);											
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => 'Contact',
				'menu-item-object' => 'page',
				'menu-item-object-id' => get_page_by_path('contact-page')->ID,
				'menu-item-type' => 'post_type',
				'menu-item-status' => 'publish')
			);
			if(!has_nav_menu($menu_location)) {
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$menu_location] = $menu_id;
				set_theme_mod('nav_menu_locations', $locations);
			}
		}     


		/*************************************** Footer Nav ***************************************/	
		
		$menu_name = 'Footer';
		$menu_location = 'footer-nav';
		$menu_exists = wp_get_nav_menu_object($menu_name);			
		if(!$menu_exists) {
			$menu_id = wp_create_nav_menu($menu_name);
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  'Home',
				'menu-item-classes' => 'home',
				'menu-item-url' => home_url('/'), 
				'menu-item-status' => 'publish')
			);		
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' =>  'Reviews',
				'menu-item-classes' => 'reviews',
				'menu-item-url' => home_url('/reviews'), 
				'menu-item-status' => 'publish')
			);	
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => 'Blog',
				'menu-item-object' => 'page',
				'menu-item-object-id' => get_page_by_path('blog-page')->ID,
				'menu-item-type' => 'post_type',
				'menu-item-status' => 'publish')
			);											
			wp_update_nav_menu_item($menu_id, 0, array(
				'menu-item-title' => 'Contact',
				'menu-item-object' => 'page',
				'menu-item-object-id' => get_page_by_path('contact-page')->ID,
				'menu-item-type' => 'post_type',
				'menu-item-status' => 'publish')
			);
			if(!has_nav_menu($menu_location)) {
				$locations = get_theme_mod('nav_menu_locations');
				$locations[$menu_location] = $menu_id;
				set_theme_mod('nav_menu_locations', $locations);
			}
		}    
			
				
	}
	
	update_option($dirname.'_theme_auto_install', '1');

}	

?>