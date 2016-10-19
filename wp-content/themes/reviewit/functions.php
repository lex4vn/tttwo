<?php

/////////////////////////////////////// Theme Information ///////////////////////////////////////

$themename = get_option('current_theme'); // Theme Name
$dirname = 'reviewit'; // Directory Name


/////////////////////////////////////// File Directories ///////////////////////////////////////

define("gp", get_template_directory() . '/');
define("gp_inc", get_template_directory() . '/lib/inc/');
define("gp_scripts", get_template_directory() . '/lib/scripts/');
define("gp_admin", get_template_directory() . '/lib/admin/inc/');
define("gp_bp", get_template_directory() . '/buddypress/');


/////////////////////////////////////// Localisation ///////////////////////////////////////

load_theme_textdomain( 'gp_lang', get_template_directory() . '/languages' );
$gp_locale = get_locale();
$gp_locale_file = get_template_directory() . '/languages/$gp_locale.php';
if ( is_readable( $gp_locale_file ) ) { require_once( $gp_locale_file ); }


/////////////////////////////////////// Theme Setup ///////////////////////////////////////

if ( ! function_exists( 'gp_theme_setup' ) ) {
	function gp_theme_setup() {

		global $content_width;
		
		// Featured images
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 150, 150, true );

		// Background customizer
		add_theme_support( 'custom-background' );

		// Add shortcode support to Text widget
		add_filter( 'widget_text', 'do_shortcode' );

		// This theme styles the visual editor with editor-style.css to match the theme style
		add_editor_style( 'lib/css/editor-style.css' );

		// Set the content width based on the theme's design and stylesheet
		if ( !isset( $content_width ) ) {
			$content_width = 650;
		}

		// Add default posts and comments RSS feed links to <head>
		add_theme_support( 'automatic-feed-links' );

		// WooCommerce Support
		add_theme_support( 'woocommerce' );

		//if(is_admin() && function_exists('is_bbpress')) { add_theme_support('bbpress'); }
	
	}
}
add_action( 'after_setup_theme', 'gp_theme_setup' );


/////////////////////////////////////// Additional Functions ///////////////////////////////////////

// Image Resizer
require_once(gp_scripts . 'image-resizer.php');

// Main Theme Options
require_once(gp_admin . 'theme-options.php');
require(gp_inc . 'options.php');
		
// Meta Options
require_once(gp_admin . 'theme-meta-options.php');

// Other Options
if(is_admin()) { require_once(gp_admin . 'theme-other-options.php'); }

// Widgets
require_once(gp_admin . 'theme-widgets.php');

// Sidebars
require_once(gp_admin . 'theme-sidebars.php');

// Shortcodes
require_once(gp_admin . 'theme-shortcodes.php');

// Review Custom Post Type
require_once(gp_admin . 'theme-post-types.php');

// TinyMCE
if(is_admin()) { require_once (gp_admin . 'tinymce/tinymce.php'); }

// WP Show IDs
if(is_admin()) { require_once(gp_admin . 'wp-show-ids/wp-show-ids.php'); }

// Auto Install
if(is_admin()) { require_once(gp_admin . 'theme-auto-install.php'); }

// Load Skins
if(isset($_GET['skin']) && $_GET['skin'] == "default") {
	$skin = $_COOKIE['SkinCookie']; 
	setcookie('SkinCookie', $skin, time()-3600);
	$skin = $theme_skin;
} elseif(isset($_GET['skin'])) {
	$skin = $_GET['skin'];
	setcookie('SkinCookie', $skin);			
} elseif(isset($_COOKIE['SkinCookie'])) {
	$skin = $_COOKIE['SkinCookie']; 
}


/////////////////////////////////////// Enqueue Styles ///////////////////////////////////////

if(!is_admin()){
	if(!function_exists('gp_enqueue_styles')) {
		function gp_enqueue_styles() { 
	
			require(gp_inc . 'options.php'); global $skin;

			wp_enqueue_style('gp-reset', get_template_directory_uri().'/lib/css/reset.css');

			wp_enqueue_style('gp-style', get_stylesheet_uri());

			if(function_exists('bp_is_active') OR function_exists('is_bbpress')) {
				wp_deregister_style( 'bp-legacy-css' );
				wp_enqueue_style('gp-buddypress', get_template_directory_uri().'/lib/css/bp.css');
			}
				
			wp_enqueue_style('gp-prettyphoto', get_template_directory_uri().'/lib/scripts/prettyPhoto/css/prettyPhoto.css');	

			if((isset($_GET['skin']) && $_GET['skin'] != "default") OR (isset($_COOKIE['SkinCookie']) && $_COOKIE['SkinCookie'] != "default")) {
			
				wp_enqueue_style('gp-style-skin', get_template_directory_uri().'/style-'.$skin.'.css');		
		
			} else {

				if((is_singular() && !is_attachment() && !is_404()) && (get_post_meta(get_the_ID(), 'ghostpool_skin', true) && get_post_meta(get_the_ID(), 'ghostpool_skin', true) != "Default")) {

					wp_enqueue_style('gp-style-skin', get_template_directory_uri().'/style-'.get_post_meta(get_the_ID(), 'ghostpool_skin', true).'.css');		
	
				} else {
		
					wp_enqueue_style('gp-style-skin', get_template_directory_uri().'/style-'.$theme_skin.'.css');
				
				}
		
			}

			if($theme_custom_stylesheet) wp_enqueue_style('gp-style-theme-custom', get_template_directory_uri().'/'.$theme_custom_stylesheet);
		
			if((is_single() OR is_page()) && get_post_meta(get_the_ID(), 'ghostpool_custom_stylesheet', true)) wp_enqueue_style('gp-style-custom', get_template_directory_uri().'/'.get_post_meta(get_the_ID(), 'ghostpool_custom_stylesheet', true));

		}	
	}
	add_action('wp_enqueue_scripts', 'gp_enqueue_styles');
}


/////////////////////////////////////// Enqueue Scripts ///////////////////////////////////////

if(!is_admin()){
	if(!function_exists('gp_enqueue_srcipts')) {
		function gp_enqueue_scripts() { 
	
		require(gp_inc . 'options.php');

			wp_enqueue_script('gp-modernizr', get_template_directory_uri().'/lib/scripts/modernizr.js', array('jquery'), '', false);
	
			if(is_singular() && comments_open() && get_option( 'thread_comments' )) wp_enqueue_script('comment-reply');
		
			wp_enqueue_script('gp-jwplayer', get_template_directory_uri().'/lib/scripts/mediaplayer/jwplayer.js', '', '', false);

			wp_enqueue_script('gp-swfobject', 'https://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js', '', '', true);
		
			wp_enqueue_script('gp-nivo-slider', get_template_directory_uri().'/lib/scripts/jquery.nivo.slider.js', array('jquery'), '', true);
		
			wp_enqueue_script('gp-prettyphoto', get_template_directory_uri().'/lib/scripts/prettyPhoto/js/jquery.prettyPhoto.js', array('jquery'), '', true);

			wp_enqueue_script('gp-jqtransform', get_template_directory_uri().'/lib/scripts/jquery.jqtransform.js', array('jquery'), '', true);
		
			wp_enqueue_script('gp-cookies', get_template_directory_uri().'/lib/scripts/jquery.cookies.js', array('jquery'), '', true);

			wp_enqueue_script('gp-cufon', get_template_directory_uri().'/lib/scripts/cufon-yui.js', array('jquery'), '', false);
		
			if($theme_chunkfive) wp_enqueue_script('gp-chunkfive', get_template_directory_uri().'/lib/fonts/ChunkFive_400.font.js', array('gp-cufon'), '', false);
		
			if($theme_journal) wp_enqueue_script('gp-journal', get_template_directory_uri().'/lib/fonts/Journal_400.font.js', array('gp-cufon'), '', false);
		
			if($theme_leaguegothic) wp_enqueue_script('gp-leaguegothic', get_template_directory_uri().'/lib/fonts/League_Gothic_400.font.js', array('gp-cufon'), '', false);
		
			if($theme_nevis) wp_enqueue_script('gp-nevis', get_template_directory_uri().'/lib/fonts/nevis_700.font.js', array('gp-cufon'), '', false);
		
			if($theme_quicksand) wp_enqueue_script('gp-quicksand', get_template_directory_uri().'/lib/fonts/Quicksand_Book.font.js', array('gp-cufon'), '', false);
		
			if($theme_sansation) wp_enqueue_script('gp-sansation', get_template_directory_uri().'/lib/fonts/Sansation_400-Sansation_700.font.js', array('gp-cufon'), '', false);
		
			if($theme_vegur) wp_enqueue_script('gp-vegur', get_template_directory_uri().'/lib/fonts/Vegur_400-Vegur_700-Vegur_300.font.js', array('gp-cufon'), '', false);

			wp_enqueue_script('jquery-ui-tabs', '', array('jquery'), '', true);
			
			wp_register_script('gp-contact-init', get_template_directory_uri().'/lib/scripts/jquery.contact.init.js', array('jquery'), '', true);
						
			wp_register_script('gp-toggle-init', get_template_directory_uri().'/lib/scripts/jquery.toggle.init.js', array('jquery'), '', true);
		
			wp_enqueue_script('gp-custom-js', get_template_directory_uri().'/lib/scripts/custom.js', array('jquery'), '', true);
		
			wp_localize_script('gp-custom-js', 'gp_script', array(
				'rootFolder' => get_template_directory_uri(),
				'emptySearchText' => __('Please enter something in the search box!', 'gp_lang'),
			));
			
		}				
	}
	add_action('wp_enqueue_scripts', 'gp_enqueue_scripts');
}


/////////////////////////////////////// WP Header Hooks ///////////////////////////////////////

if(!function_exists('gp_wp_header')) {
	function gp_wp_header() {

		require(gp_inc . 'options.php');
	
		if($theme_favicon_ico) echo '<link rel="shortcut icon" href="'.$theme_favicon_ico.'" /><link rel="icon" href="'.$theme_favicon_ico.'" type="image/vnd.microsoft.icon" />';

		if($theme_favicon_png) echo '<link rel="icon" type="image/png" href="'.$theme_favicon_png.'" />';

		if($theme_apple_icon) echo '<link rel="apple-touch-icon" href="'.$theme_apple_icon.'" />';

		echo '
		<!--[if lte IE 9]><style>#header-top, .nivo-controlNav a, #review-panel-left, #review-panel-left .ratingbutton, #review-panel-right, .layout-3 #review-links, #content .jqTransformSelectWrapper ul, .post-button, #footer, #sidebar .widget, #sidebar .widget h3, .review-box, .comment-body, .wp-pagenavi span, .wp-pagenavi.cat-navi a, .wp-pagenavi.comment-navi a, .wp-pagenavi.post-navi a span, .wp-pagenavi .current, .wp-pagenavi.cat-navi a:hover, .wp-pagenavi.comment-navi a:hover, .wp-pagenavi .page:hover, .wp-pagenavi.post-navi span, .wp-pagenavi.post-navi a span:hover, .bp-wrapper #content-wrapper div.item-list-tabs ul li.selected, .bp-wrapper #content-wrapper div.item-list-tabs ul li a span, .bp-wrapper #content-wrapper .activity-content .activity-meta a, .bp-wrapper #content-wrapper .activity-content .date, .bp-wrapper #content-wrapper .acomment-options a, .bp-wrapper #content-wrapper .activity-meta a span, .bp-wrapper #content-wrapper form#whats-new-form #whats-new-textarea, .bp-wrapper #content-wrapper div.activity-comments form .ac-textarea, .bp-wrapper #content-wrapper div.activity-comments form .ac-textarea, .bp-wrapper #content-wrapper #message-thread .envelope-info, .bp-wrapper #content-wrapper .forum-list-container {behavior: url("' . get_template_directory_uri() . '/lib/scripts/pie/PIE.php");}</style><![endif]-->';

		if($theme_custom_css) echo '<style>'.stripslashes($theme_custom_css).'</style>';
		
		// Cufon
		if($theme_chunkfive OR $theme_journal OR $theme_leaguegothic OR $theme_nevis OR $theme_quicksand OR $theme_sansation OR $theme_vegur) {
			echo '<script>Cufon.replace("h1:not(#logo),h2,h3,h4,h5,h6,#nav li a", {hover: true});' . stripslashes($theme_cufon_code) . '</script>';
		}

		// Switch Display
		if((is_home() && $theme_homepage_buttons == "0") OR (is_page_template('blog.php') && $theme_blog_buttons == "0") OR ((is_post_type_archive('review') OR is_tax()) && $theme_review_cat_buttons == "0") OR ((is_archive() OR is_search()) && $theme_cat_buttons == "0")) {

			echo '<script>jQuery(document).ready(function(){

				jQuery("#display-compact").click(function() {
					jQuery("#display-compact").toggleClass("swap");
					jQuery(".review-box").fadeOut("fast", function() {
						jQuery(this).fadeIn("fast").addClass("review-box-compact");
						jQuery(this).fadeIn("fast").removeClass("review-box-extended");
						jQuery.cookie("display_cookie", "compact");
					});
				});

				jQuery("#display-extended").click(function() {
					jQuery("#display-extended").toggleClass("swap");
					jQuery(".review-box").fadeOut("fast", function() {
						jQuery(this).fadeIn("fast").addClass("review-box-extended");
						jQuery(this).fadeIn("fast").removeClass("review-box-compact");
						jQuery.cookie("display_cookie", "extended");
					});
				});

				var display_cookie = jQuery.cookie("display_cookie");
				if (display_cookie == "compact") {
					jQuery(".review-box").fadeIn("fast").addClass("review-box-compact");
					jQuery(".review-box").fadeIn("fast").removeClass("review-box-extended");
				} else if (display_cookie == "extended") {
					jQuery(".review-box").fadeIn("fast").addClass("review-box-extended");
					jQuery(".review-box").fadeIn("fast").removeClass("review-box-compact");
				};

			});</script>';

		}

		// Remove Links From Review Tags
		if($theme_review_tag_links == "1") {
			echo '<script>jQuery(document).ready(function(){
				jQuery("#review-tags-list li a").contents().unwrap();
			});</script>';
		}

		if($theme_scripts) echo stripslashes($theme_scripts);

	}
}
add_action('wp_head', 'gp_wp_header');


/////////////////////////////////////// Navigation Menus ///////////////////////////////////////

if ( ! function_exists( 'gp_register_menus' ) ) {
	function gp_register_menus() {
		register_nav_menus(array(
			'header-nav' => __('Header Navigation', 'gp_lang'),
			'footer-nav' => __('Footer Navigation', 'gp_lang')
		));
	}
}
add_action('init', 'gp_register_menus');


/////////////////////////////////////// Excerpts ///////////////////////////////////////

// Character Length
if ( ! function_exists( 'gp_excerpt_length' ) ) {
	function gp_excerpt_length($length) {
		return 10000;
	}
}	
add_filter('excerpt_length', 'gp_excerpt_length');

// Excerpt Output
if ( ! function_exists( 'gp_excerpt' ) ) {
	function gp_excerpt($count, $ellipsis = '...') {
		$excerpt = get_the_excerpt();
		$excerpt = strip_tags($excerpt);
		if(function_exists('mb_strlen') && function_exists('mb_substr')) { 
			if(mb_strlen($excerpt) > $count) {
				$excerpt = mb_substr($excerpt, 0, $count).$ellipsis;
			}
		} else {
			if(strlen($excerpt) > $count) {
				$excerpt = substr($excerpt, 0, $count).$ellipsis;
			}	
		}
		return $excerpt;
	}
}

// Replace Excerpt Ellipsis
if ( ! function_exists( 'gp_excerpt_more' ) ) {
	function gp_excerpt_more($more) {
		return '';
	}
}
add_filter('excerpt_more', 'gp_excerpt_more');

// Content More Text
if ( ! function_exists( 'gp_more_link' ) ) {
	function gp_more_link($more_link, $more_link_text) {
		return str_replace('more-link', 'more-link read-more', $more_link);
	}
}
add_filter('the_content_more_link', 'gp_more_link', 10, 2);


/////////////////////////////////////// Add Excerpt Support To Pages ///////////////////////////////////////

if(!function_exists('gp_add_excerpts_to_pages')) {
	function gp_add_excerpts_to_pages() {
		 add_post_type_support('page', 'excerpt');
	}
}
add_action('init', 'gp_add_excerpts_to_pages');


/////////////////////////////////////// Title Length ///////////////////////////////////////

if(!function_exists('gp_the_title_limit')) {
	function gp_the_title_limit($count, $ellipsis = '...') {
		$title = the_title_attribute( 'echo=0' );
		if(function_exists('mb_strlen') && function_exists('mb_substr')) { 
			if(mb_strlen($title) > $count) {
				$title = mb_substr($title, 0, $count).$ellipsis;
			}
		} else {
			if(strlen($title) > $count) {
				$title = substr($title, 0, $count).$ellipsis;
			}	
		}
		return $title;
	}
}


/////////////////////////////////////// Change Insert Into Post Text ///////////////////////////////////////	

if ( is_admin() && $pagenow == 'themes.php' ) {
	if ( ! function_exists( 'gp_change_image_button' ) ) {
		add_filter( 'gettext', 'gp_change_image_button', 10, 3);
		function gp_change_image_button( $gp_translation, $gp_text, $gp_domain ) {
			if ( 'default' == $gp_domain && 'Insert into post' == $gp_text ) {
				remove_filter( 'gettext', 'gp_change_image_button' );
				return __( 'Use Image', 'gp_lang' );
			}
			return $gp_translation;
		}
	}
}


/////////////////////////////////////// Page Navigation ///////////////////////////////////////

if(!function_exists('gp_pagination')) {
	function gp_pagination($pages = '', $range = 2) {  
	 
		 $showitems = ($range * 2)+1;  

		 global $paged;
	 
		 if (get_query_var('paged')) {
			 $paged = get_query_var('paged');
		 } elseif (get_query_var('page')) {
			 $paged = get_query_var('page');
		 } else {
			 $paged = 1;
		 }

		 if($pages == '') {
			 global $wp_query;
			 $pages = $wp_query->max_num_pages;
			 if(!$pages) {
				 $pages = 1;
			 }
		 }   
	
		 if(1 != $pages) {
			echo "<div class='wp-pagenavi cat-navi'>";
			echo '<span class="pages">'.__('Page', 'gp_lang').' '.$paged.' '.__('of', 'gp_lang').' '.$pages.'</span>';
			 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
			 if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

			 for ($i=1; $i <= $pages; $i++) {
				 if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)) {
					 echo ($paged == $i) ? "<span class='current'>".$i."</span>":"<a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a>";
				 }
			 }

			 if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";  
			 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
			 echo "</div>\n";
		 }
	}
}


/////////////////////////////////////// Homepage Navigation ///////////////////////////////////////

if(!function_exists('gp_home_pagination')) {
	function gp_home_pagination($pages = '', $range = 2) {  
	 
		 $showitems = ($range * 2)+1;  

		 global $paged;
	 
		 if (get_query_var('paged')) {
			 $paged = get_query_var('paged');
		 } elseif (get_query_var('page')) {
			 $paged = get_query_var('page');
		 } else {
			 $paged = 1;
		 }

		 if($pages == '') {
			 global $wp_query;
			 $pages = $wp_query->max_num_pages;
			 if(!$pages) {
				 $pages = 1;
			 }
		 }   
	
		 if(1 != $pages) {
			echo "<div class='wp-pagenavi cat-navi'>";
			echo '<span class="pages">'.__('Page', 'gp_lang').' '.$paged.' '.__('of', 'gp_lang').' '.$pages.'</span>';
			 if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".home_url()."'>&laquo;</a>";
			 if($paged > 1 && $showitems < $pages) echo "<a href='".home_url().'?page='.($paged - 1)."'>&lsaquo;</a>";

			 for ($i=1; $i <= $pages; $i++) {
				 if (1 != $pages &&(!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)) {
					 echo ($paged == $i) ? "<span class='current'>".$i."</span>":"<a href='".home_url().'?page='.($i)."' class='inactive' >".$i."</a>";
				 }
			 }

			 if ($paged < $pages && $showitems < $pages) echo "<a href='".home_url().'?page='.($paged + 1)."'>&rsaquo;</a>";  
			 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".home_url().'?page='.($pages)."'>&raquo;</a>";
			 echo "</div>\n";
		 }
	}
}


/////////////////////////////////////// Shortcode Empty Paragraph Fix ///////////////////////////////////////

if ( ! function_exists( 'gp_shortcode_empty_paragraph_fix' ) ) {
	function gp_shortcode_empty_paragraph_fix($content) {   
		$array = array (
			'<p>[' => '[', 
			']</p>' => ']',
			']<br />' => ']'
		);
		$content = strtr($content, $array);
		return $content;
	}
}
add_filter('the_content', 'gp_shortcode_empty_paragraph_fix');


/////////////////////////////////////// Breadcrumbs ///////////////////////////////////////

if(!function_exists('gp_breadcrumbs')) {
	function gp_breadcrumbs() {

		require(gp_inc . 'options.php'); global $post;

		if (!is_home()) {
			echo '<a href="'.home_url().'">'.__('Home', 'gp_lang').'</a>';
			if (is_category()) {
				echo " / ";
				echo single_cat_title();
			} elseif (is_singular('review')) {
				if(get_option("permalink_structure")) {
					echo ' / <a href="'.get_bloginfo('url').'/'.$theme_review_cat_slug.'">';
				} else {
					echo ' / <a href="'.get_bloginfo('url').'/?post_type='.$theme_review_slug.'">';
				}
				echo $theme_review_plural_name;
				echo "</a> / ";
				echo the_title_attribute( 'echo=0' );
			} elseif(is_singular('post') && !is_attachment()) {
				$cat = get_the_category(); $cat = $cat[0];
				echo " / ";
				echo get_category_parents($cat, TRUE, ' / ');
				echo the_title_attribute( 'echo=0' );
			} elseif (is_search()) {
				echo " / " . __('Search', 'gp_lang');
			} elseif (is_page() && $post->post_parent) {
				echo ' / <a href="'.get_permalink($post->post_parent).'">';
				echo get_the_title($post->post_parent);
				echo "</a> / ";
				echo preg_replace('/Groups Create a Group/', 'Groups', the_title_attribute( 'echo=0' ) );
			} elseif (is_page() OR is_attachment()) {
				echo " / "; 
				echo the_title_attribute( 'echo=0' );
			} elseif (is_author()) {
				echo wp_title(' / ');
				echo __('\'s Profile', 'gp_lang');
			} elseif (is_404()) {
				echo " / "; 
				echo __('Page Not Found', 'gp_lang');
			} elseif(is_tax() && taxonomy_exists('review_categories')) {
				$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
				$tax_name = get_taxonomy(get_query_var('taxonomy'));
				if(get_option("permalink_structure")) {
				echo ' / <a href="'.get_bloginfo('url').'/'.$theme_review_cat_slug.'">';
				} else {
				echo ' / <a href="'.get_bloginfo('url').'/?review_categories='.$theme_review_cat_slug.'">';
				}
				echo $theme_review_plural_name;
				echo "</a> / ";
				if($tax_name && !$tax_name->hierarchical) {
				echo $tax_name->labels->name;
				echo " / ";
				}
				echo $term->name;
			} elseif(function_exists('is_bbpress') && is_bbpress()) {
				echo ' / ';
				echo __('Forums', 'gp_lang');
			} elseif (is_archive()) {
				echo wp_title(' / ');		
			}
		}
	}
}


/////////////////////////////////////// Posts Per Pages ///////////////////////////////////////

if(!function_exists('gp_posts_per_page')) {
	function gp_posts_per_page($query) {

		require(gp_inc . 'options.php'); global $wp_the_query, $gp_settings;
	
		if($query->is_main_query() && !is_admin()) {

			if(!empty($post) && get_post_meta(get_the_ID(), 'ghostpool_blog_posts_per_page', true)) {
				$gp_settings['posts_per_page'] = get_post_meta($post->ID, 'ghostpool_blog_posts_per_page', true);
			} else {
				$gp_settings['posts_per_page'] = $theme_blog_posts_per_page;
			}
		
			if(is_post_type_archive('review') OR is_tax()) {
				$query->set('posts_per_page', $theme_review_cat_posts_per_page);
			} elseif(is_page_template('blog.php')) {
				$query->set('posts_per_page', $gp_settings['posts_per_page']);			
			} elseif(is_archive()) {		
				$query->set('posts_per_page', $theme_cat_posts_per_page);	
			}

		}
	
	}
}
add_action('pre_get_posts', 'gp_posts_per_page');


/////////////////////////////////////// Search Criteria ///////////////////////////////////////

if(!function_exists('gp_search_filter')) {
	function gp_search_filter($query) {

		require(gp_inc . 'options.php');

		if(!is_admin()) {
			if ($query->is_search) {
				if($theme_search_criteria == "Reviews Only") {
					$query->set('post_type','review');
				} elseif($theme_search_criteria == "All Posts") {
					$query->set('post_type','post');
				}
			}
			return $query;
		}
	}	
}
add_filter('pre_get_posts', 'gp_search_filter');


/////////////////////////////////////// Tags Support For Reviews ///////////////////////////////////////

if(!function_exists('gp_post_type_tags_fix')) {
	function gp_post_type_tags_fix($request) {
		if (isset($request['tag']) && !isset($request['post_type']))
		$request['post_type'] = 'any';
		return $request;
	} 
}
add_filter('request', 'gp_post_type_tags_fix');


/////////////////////////////////////// BuddyPress/bbPress Functions ///////////////////////////////////////	


if(function_exists('bp_is_active')) {

	// Avatar Dimensions

	if(!defined('BP_AVATAR_THUMB_WIDTH'))
		define('BP_AVATAR_THUMB_WIDTH', 80);

	if(!defined('BP_AVATAR_THUMB_HEIGHT'))
		define('BP_AVATAR_THUMB_HEIGHT', 80);

	if(!defined('BP_AVATAR_FULL_WIDTH'))
		define('BP_AVATAR_FULL_WIDTH', 128);

	if(!defined('BP_AVATAR_FULL_HEIGHT'))
		define('BP_AVATAR_FULL_HEIGHT', 128);

	// Body Classes
	if ( ! function_exists( 'gp_bp_class' ) ) {
		function gp_bp_class($classes) {
			if(!bp_is_blog_page() OR (function_exists('is_bbpress') && is_bbpress()) OR is_page_template('activity/index.php')) {
				if(is_rtl()) {
					$classes[] = 'rtl bp-wrapper';
				} else {
					$classes[] = 'bp-wrapper';
				}
			}
			return $classes;
		}
	}
	add_filter('body_class', 'gp_bp_class');

	// Add reviews to activity stream
	if ( ! function_exists( 'gp_activity_publish_review_posts' ) ) {
		function gp_activity_publish_review_posts($reviewposts) {
			$reviewposts[] = 'review';
			return $reviewposts;
		}
	}
	add_filter('bp_blogs_record_post_post_types', 'gp_activity_publish_review_posts');

	if ( ! function_exists( 'gp_record_my_custom_post_type_comments' ) ) {
		function gp_record_my_custom_post_type_comments($post_types) {
			$post_types[] = 'review';
			return $post_types;
		}
	}
	add_filter('bp_blogs_record_comment_post_types', 'gp_record_my_custom_post_type_comments');


}

	
/////////////////////////////////////// TMG Plugin Activation ///////////////////////////////////////	

require_once(gp_admin . 'class-tgm-plugin-activation.php');

if(!function_exists('gp_register_required_plugins')) {
	function gp_register_required_plugins() {

		$plugins = array(
		);

		$config = array(
			'default_path' => '',                      // Default absolute path to pre-packaged plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => true,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
		);

		tgmpa( $plugins, $config );

	}
}
add_action('tgmpa_register', 'gp_register_required_plugins');
// Remove logo, comment, new-content wp on admin bar
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
	global $wp_admin_bar;
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'comments' );
	$wp_admin_bar->remove_node( 'new-content' );
	$wp_admin_bar->remove_node( 'updates' );
}
function remove_menus(){
	remove_menu_page( 'index.php' );                  //Dashboard
	remove_menu_page( 'jetpack' );                    //Jetpack*
//	remove_menu_page( 'edit.php' );                   //Posts
//	remove_menu_page( 'upload.php' );                 //Media
//	remove_menu_page( 'edit.php?post_type=page' );    //Pages
	remove_menu_page( 'edit-comments.php' );          //Comments
//	remove_menu_page( 'themes.php' );                 //Appearance
//	remove_menu_page( 'plugins.php' );                //Plugins
//	remove_menu_page( 'users.php' );                  //Users
	remove_menu_page( 'tools.php' );                  //Tools
}
add_action( 'admin_menu', 'remove_menus' );

function modify_contact_methods($profile_fields) {

	// Add new fields
	$profile_fields['twitter'] = 'Twitter Username';
	$profile_fields['facebook'] = 'Facebook URL';
	$profile_fields['gplus'] = 'Google+ URL';
	$profile_fields['blockchain'] = 'Blockchain';
	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_contact_methods');
function howdy_message($translated_text, $text, $domain) {
	$new_message = str_replace('Howdy', 'Welcome', $text);
	return $new_message;
}
add_filter('gettext', 'howdy_message', 10, 3);

//To remove the Help Tab use
add_filter( 'contextual_help', 'remove_help_tabs', 999, 3 );
function remove_help_tabs($old_help, $screen_id, $screen){
	$screen->remove_help_tabs();
	return $old_help;
}
//remove the Screen Options Tab
add_filter('screen_options_show_screen', '__return_false');

// Edit footer text
add_filter( 'admin_footer_text', '__return_empty_string', 11 );
add_filter( 'update_footer', '__return_empty_string', 11 );
//function wp_edit_footer() {
//	add_filter( 'admin_footer_text', 'wp_edit_text', 11 );
//}
//
//function wp_edit_text($content) {
//	return "";
//}
//
//add_action( 'admin_init', 'wp_edit_footer' );

function wpsk_login_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'wpsk_login_logo_url' );
function wpsk_login_logo_url_title() {
	return 'TWOBitcoin';
}
add_filter( 'login_headertitle', 'wpsk_login_logo_url_title' );

function wpsk_login_logo() { ?>
	<style type="text/css">
		#login h1 a, .login h1 a {
			background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/lib/images/logo.png);
			background-size: 240px auto;
			width: 240px;
			height: 110px;
		}
	</style>
<?php }
add_action( 'login_enqueue_scripts', 'wpsk_login_logo' );
?>