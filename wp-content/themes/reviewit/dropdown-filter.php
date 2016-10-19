<?php

global $gp_settings;

// Dropdown Filter URLs
$page_url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$short_page_url = $_SERVER["REQUEST_URI"];
$cat_id = get_query_var('cat');
$category_url = get_category_link($cat_id);
	
if(is_search()) {

	$category_url = $category_url.'?s='.esc_html($s).'&amp;';
	
} else {

	$term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
	$tax_name = get_taxonomy(get_query_var('taxonomy'));
	
	if($tax_name && !$tax_name->hierarchical) {

		if($tax_name->name == 'release_date') {
			$cat_slug = $theme_review_tag_1_slug;
		} elseif($tax_name->name == 'genre') {
			$cat_slug = $theme_review_tag_2_slug;			
		} elseif($tax_name->name == 'rating') {
			$cat_slug = $theme_review_tag_3_slug;
		} elseif($tax_name->name == 'director') {
			$cat_slug = $theme_review_tag_4_slug;
		} elseif($tax_name->name == 'producer') {
			$cat_slug = $theme_review_tag_5_slug;
		} elseif($tax_name->name == 'screenwriter') {
			$cat_slug = $theme_review_tag_6_slug;
		} elseif($tax_name->name == 'studio') {
			$cat_slug = $theme_review_tag_7_slug;
		} elseif($tax_name->name == 'starring') {
			$cat_slug = $theme_review_tag_8_slug;															
		} else {
			$cat_slug = $tax_name->name;
		}
			
	} else {
		if(get_option("permalink_structure")) {
			$cat_slug = $theme_review_cat_slug;
		} else {
			$cat_slug = "review_categories";
		}
	}
	
	if(get_option("permalink_structure")) {
		$category_url = home_url().'/'.$cat_slug.'/'.$term->slug.'/?';
	} else { 
		$category_url = home_url().'?'.$cat_slug.'='.$term->slug.'&amp;';	
	}
	
}

?>

<div id="dropdown-filter">
	
	<div class="order-by-text"><?php _e('Order By', 'gp_lang'); ?>:</div>
		
	<form class="order-by-form">
		<select>	
			<?php if( $gp_settings['filter_date'] == '0' ) { ?><option value="<?php echo $category_url; ?>orderby=date"<?php if(preg_match('/orderby=date/', $page_url)) { ?> selected<?php } ?>><?php _e('Date', 'gp_lang'); ?></option><?php } ?>
			<?php if( $gp_settings['filter_title'] == '0' ) { ?><option value="<?php echo $category_url; ?>orderby=title"<?php if(preg_match('/orderby=title/', $page_url)) { ?> selected<?php } ?>><?php _e('Title', 'gp_lang'); ?></option><?php } ?>						
			<?php if( $gp_settings['filter_site_score'] == '0' ) { ?><option value="<?php echo $category_url; ?>gdsr_sort=review&gdsr_multi=<?php echo $theme_site_multi_rating_id; ?>"<?php if(preg_match('/gdsr_sort=review/', $page_url)) { ?> selected<?php } ?>><?php _e('Site Rating', 'gp_lang'); ?></option><?php } ?>	
			<?php if( $gp_settings['filter_user_score'] == '0' ) { ?><option value="<?php echo $category_url; ?>gdsr_sort=rating&gdsr_multi=<?php echo $theme_user_multi_rating_id; ?>"<?php if(preg_match('/gdsr_sort=rating/', $page_url)) { ?> selected<?php } ?>><?php _e('User Rating', 'gp_lang'); ?></option><?php } ?>								
		</select>
	</form>
	
	<div class="order-text"><?php _e('Order', 'gp_lang'); ?>:</div>

	<form class="order-form">
		<select>
			<option value="<?php if(preg_match('/orderby=/', $page_url) OR preg_match('/gdsr_sort=/', $page_url) OR !get_option("permalink_structure")) { ?><?php echo $short_page_url; ?>&order=desc&gdsr_order=desc<?php } else { ?><?php echo $short_page_url; ?>?order=desc<?php } ?>"<?php if(preg_match('/order=desc/', $page_url)) { ?> selected<?php } ?>><?php _e('Descending', 'gp_lang'); ?></option>							
			<option value="<?php if(preg_match('/orderby=/', $page_url) OR preg_match('/gdsr_sort=/', $page_url) OR !get_option("permalink_structure")) { ?><?php echo $short_page_url; ?>&order=asc&gdsr_order=asc<?php } else { ?><?php echo $short_page_url; ?>?order=asc<?php } ?>" <?php if(preg_match('/order=asc/', $page_url)) { ?> selected<?php } ?>><?php _e('Ascending', 'gp_lang'); ?></option>				
		</select>
	</form>

</div>