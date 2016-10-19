<?php // Custom Post Types

function post_type_review() {

	global $gp_settings;
	require(gp_inc . 'options.php');

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
	} else {
		$gp_settings['review_tag_1_tax'] = $theme_review_tag_1_slug;
		$gp_settings['review_tag_2_tax'] = $theme_review_tag_2_slug;
		$gp_settings['review_tag_3_tax'] = $theme_review_tag_3_slug;
		$gp_settings['review_tag_4_tax'] = $theme_review_tag_4_slug;
		$gp_settings['review_tag_5_tax'] = $theme_review_tag_5_slug;
		$gp_settings['review_tag_6_tax'] = $theme_review_tag_6_slug;
		$gp_settings['review_tag_7_tax'] = $theme_review_tag_7_slug;
		$gp_settings['review_tag_8_tax'] = $theme_review_tag_8_slug;
	}

	$gp_settings['review_tag_9_tax'] = $theme_review_tag_9_slug;
	$gp_settings['review_tag_10_tax'] = $theme_review_tag_10_slug;
	$gp_settings['review_tag_11_tax'] = $theme_review_tag_11_slug;
	$gp_settings['review_tag_12_tax'] = $theme_review_tag_12_slug;
	$gp_settings['review_tag_13_tax'] = $theme_review_tag_13_slug;
	$gp_settings['review_tag_14_tax'] = $theme_review_tag_14_slug;
	$gp_settings['review_tag_15_tax'] = $theme_review_tag_15_slug;
	$gp_settings['review_tag_16_tax'] = $theme_review_tag_16_slug;
	$gp_settings['review_tag_17_tax'] = $theme_review_tag_17_slug;
	$gp_settings['review_tag_18_tax'] = $theme_review_tag_18_slug;
	$gp_settings['review_tag_19_tax'] = $theme_review_tag_19_slug;
	$gp_settings['review_tag_20_tax'] = $theme_review_tag_20_slug;


	/////////////////////////////////////// Review Post Type ///////////////////////////////////////


	register_post_type('review', array(
		'labels' => array(
			'name' => $theme_review_plural_name,
			'singular_name' => $theme_review_singular_name,
			'all_items' => __('All ', 'gp_lang').$theme_review_plural_name,
			'add_new' => _x('Add New', 'review', 'gp_lang'),
			'add_new_item' => __('Add New Review', 'gp_lang').$theme_review_singular_name,
			'edit_item' => __('Edit ', 'gp_lang').$theme_review_singular_name,
			'new_item' => __('New ', 'gp_lang').$theme_review_singular_name,
			'view_item' => __('View ', 'gp_lang').$theme_review_singular_name,
			'search_items' => __('Search ', 'gp_lang').$theme_review_plural_name,
			'menu_name' => $theme_review_plural_name
		),
		'public' => true,
		'show_ui' => true,
		'_builtin' => false,
		'_edit_link' => 'post.php?post=%d',
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => array("slug" => $theme_review_slug),
		'menu_position' => 20,
		'with_front' => true,
		'has_archive' => $theme_review_cat_slug,
		'taxonomies' => array('post_tag'),
		'supports' => array('title', 'excerpt', 'editor', 'comments', 'author', 'custom-fields', 'thumbnail')
	));


	/////////////////////////////////////// Review Categories ///////////////////////////////////////


	register_taxonomy('review_categories', 'review', array(
		'hierarchical' => true,
		'labels' => array(
			'name' => $theme_review_cat_plural_name,
			'singular_name' => $theme_review_cat_singular_name,
			'all_items' => __('All ', 'gp_lang').$theme_review_cat_plural_name,
			'add_new' => _x('Add New', 'review', 'gp_lang'),
			'add_new_item' => __('Add New ', 'gp_lang').$theme_review_cat_singular_name,
			'edit_item' => __('Edit ', 'gp_lang').$theme_review_cat_singular_name,
			'new_item' => __('New ', 'gp_lang').$theme_review_cat_singular_name,
			'view_item' => __('View ', 'gp_lang').$theme_review_cat_singular_name,
			'search_items' => __('Search ', 'gp_lang').$theme_review_cat_plural_name,
			'menu_name' => $theme_review_cat_plural_name
		),
		'rewrite' => array('slug' => $theme_review_cat_slug)
	));


	/////////////////////////////////////// Review Tags ///////////////////////////////////////


	if($theme_review_tag_1 == "0") {
		register_taxonomy($gp_settings['review_tag_1_tax'], 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_1_plural_name,
				'singular_name' => $theme_review_tag_1_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_1_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_1_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_1_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_1_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_1_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_1_plural_name,
				'menu_name' => $theme_review_tag_1_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_1_slug)
			));
	}

	if($theme_review_tag_2 == "0") {
		register_taxonomy($gp_settings['review_tag_2_tax'], 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_2_plural_name,
				'singular_name' => $theme_review_tag_2_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_2_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_2_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_2_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_2_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_2_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_2_plural_name,
				'menu_name' => $theme_review_tag_2_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_2_slug)
			));
	}

	if($theme_review_tag_3 == "0") {
		register_taxonomy($gp_settings['review_tag_3_tax'], 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_3_plural_name,
				'singular_name' => $theme_review_tag_3_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_3_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_3_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_3_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_3_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_3_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_3_plural_name,
				'menu_name' => $theme_review_tag_3_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_3_slug)
			));
	}

	if($theme_review_tag_4 == "0") {
		register_taxonomy($gp_settings['review_tag_4_tax'], 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_4_plural_name,
				'singular_name' => $theme_review_tag_4_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_4_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_4_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_4_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_4_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_4_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_4_plural_name,
				'menu_name' => $theme_review_tag_4_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_4_slug)
			));
	}

	if($theme_review_tag_5 == "0") {
		register_taxonomy($gp_settings['review_tag_5_tax'], 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_5_plural_name,
				'singular_name' => $theme_review_tag_5_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_5_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_5_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_5_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_5_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_5_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_5_plural_name,
				'menu_name' => $theme_review_tag_5_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_5_slug)
			));
	}

	if($theme_review_tag_6 == "0") {
		register_taxonomy($gp_settings['review_tag_6_tax'], 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_6_plural_name,
				'singular_name' => $theme_review_tag_6_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_6_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_6_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_6_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_6_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_6_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_6_plural_name,
				'menu_name' => $theme_review_tag_6_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_6_slug)
			));
	}

	if($theme_review_tag_7 == "0") {
		register_taxonomy($gp_settings['review_tag_7_tax'], 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_7_plural_name,
				'singular_name' => $theme_review_tag_7_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_7_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_7_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_7_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_7_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_7_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_7_plural_name,
				'menu_name' => $theme_review_tag_7_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_7_slug)
			));
	}

	if($theme_review_tag_8 == "0") {
		register_taxonomy($gp_settings['review_tag_8_tax'], 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_8_plural_name,
				'singular_name' => $theme_review_tag_8_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_8_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_8_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_8_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_8_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_8_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_8_plural_name,
				'menu_name' => $theme_review_tag_8_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_8_slug)
			));
	}

	if($theme_review_tag_9 == "0") {
		register_taxonomy($theme_review_tag_9_slug, 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_9_plural_name,
				'singular_name' => $theme_review_tag_9_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_9_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_9_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_9_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_9_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_9_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_9_plural_name,
				'menu_name' => $theme_review_tag_9_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_9_slug)
			));
	}

	if($theme_review_tag_10 == "0") {
		register_taxonomy($theme_review_tag_10_slug, 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_10_plural_name,
				'singular_name' => $theme_review_tag_10_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_10_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_10_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_10_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_10_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_10_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_10_plural_name,
				'menu_name' => $theme_review_tag_10_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_10_slug)
			));
	}

	if($theme_review_tag_11 == "0") {
		register_taxonomy($theme_review_tag_11_slug, 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_11_plural_name,
				'singular_name' => $theme_review_tag_11_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_11_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_11_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_11_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_11_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_11_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_11_plural_name,
				'menu_name' => $theme_review_tag_11_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_11_slug)
			));
	}

	if($theme_review_tag_12 == "0") {
		register_taxonomy($theme_review_tag_12_slug, 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_12_plural_name,
				'singular_name' => $theme_review_tag_12_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_12_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_12_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_12_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_12_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_12_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_12_plural_name,
				'menu_name' => $theme_review_tag_12_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_12_slug)
			));
	}

	if($theme_review_tag_13 == "0") {
		register_taxonomy($theme_review_tag_13_slug, 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_13_plural_name,
				'singular_name' => $theme_review_tag_13_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_13_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_13_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_13_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_13_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_13_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_13_plural_name,
				'menu_name' => $theme_review_tag_13_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_13_slug)
			));
	}

	if($theme_review_tag_14 == "0") {
		register_taxonomy($theme_review_tag_14_slug, 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_14_plural_name,
				'singular_name' => $theme_review_tag_14_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_14_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_14_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_14_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_14_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_14_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_141_plural_name,
				'menu_name' => $theme_review_tag_14_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_14_slug)
			));
	}

	if($theme_review_tag_15 == "0") {
		register_taxonomy($theme_review_tag_15_slug, 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_15_plural_name,
				'singular_name' => $theme_review_tag_15_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_15_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_15_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_15_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_15_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_15_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_15_plural_name,
				'menu_name' => $theme_review_tag_15_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_15_slug)
			));
	}

	if($theme_review_tag_16 == "0") {
		register_taxonomy($theme_review_tag_16_slug, 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_16_plural_name,
				'singular_name' => $theme_review_tag_16_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_16_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_16_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_16_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_16_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_16_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_16_plural_name,
				'menu_name' => $theme_review_tag_16_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_16_slug)
			));
	}

	if($theme_review_tag_17 == "0") {
		register_taxonomy($theme_review_tag_17_slug, 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_17_plural_name,
				'singular_name' => $theme_review_tag_17_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_17_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_17_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_17_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_17_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_17_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_17_plural_name,
				'menu_name' => $theme_review_tag_17_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_17_slug)
			));
	}

	if($theme_review_tag_18 == "0") {
		register_taxonomy($theme_review_tag_18_slug, 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_18_plural_name,
				'singular_name' => $theme_review_tag_18_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_18_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_18_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_18_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_18_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_18_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_18_plural_name,
				'menu_name' => $theme_review_tag_18_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_11_slug)
			));
	}

	if($theme_review_tag_19 == "0") {
		register_taxonomy($theme_review_tag_19_slug, 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_19_plural_name,
				'singular_name' => $theme_review_tag_19_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_19_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_19_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_19_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_19_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_19_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_19_plural_name,
				'menu_name' => $theme_review_tag_19_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_19_slug)
			));
	}

	if($theme_review_tag_20 == "0") {
		register_taxonomy($theme_review_tag_20_slug, 'review', array(
			'labels' => array(
				'name' => $theme_review_tag_20_plural_name,
				'singular_name' => $theme_review_tag_20_singular_name,
				'all_items' => __('All ', 'gp_lang').$theme_review_tag_20_plural_name,
				'add_new' => _x('Add New', 'review', 'gp_lang'),
				'add_new_item' => __('Add New ', 'gp_lang').$theme_review_tag_20_singular_name,
				'edit_item' => __('Edit ', 'gp_lang').$theme_review_tag_20_singular_name,
				'new_item' => __('New ', 'gp_lang').$theme_review_tag_20_singular_name,
				'view_item' => __('View ', 'gp_lang').$theme_review_tag_20_singular_name,
				'search_items' => __('Search ', 'gp_lang').$theme_review_tag_20_plural_name,
				'menu_name' => $theme_review_tag_20_plural_name
			),
			'hierarchical' => false,
			'rewrite' => array('slug' => $theme_review_tag_20_slug)
			));
	}


	/////////////////////////////////////// Review Page Layout ///////////////////////////////////////


	add_filter("manage_edit-review_columns", "review_edit_columns");
	add_action("manage_posts_custom_column",  "review_custom_columns");

	function review_edit_columns($columns){
			$columns = array(
				"cb" => "<input type=\"checkbox\" />",
				"title" => __('Title', 'gp_lang'),
				"review_categories" => __('Categories', 'gp_lang'),
				"tags" => __('Tags', 'gp_lang'),
				"review_image" => __('Image', 'gp_lang'),
				"date" => __('Date', 'gp_lang')
			);

			return $columns;
	}

	function review_custom_columns($column){
			global $post;
			switch ($column)
			{
				case "review_categories":
					echo get_the_term_list($post->ID, 'review_categories', '', ', ', '');
					break;
				case "review_image":
					if(has_post_thumbnail() OR get_post_meta($post->ID, 'ghostpool_thumbnail', true)) {
						$image = vt_resize(get_post_thumbnail_id(), get_post_meta($post->ID, 'ghostpool_thumbnail', true), 50, 50, true);
						echo '<img src="'.$image['url'].'" width="50" height="50" alt="" />';
					}
					break;
			}
	}
}

add_action('init', 'post_type_review');


?>