<?php


/////////////////////////////////////// Media Fields ///////////////////////////////////////


function gp_edit_attachment($form_fields, $post) {

	global $dirname;


	// Lightbox
	
	$form_fields[$dirname.'_lightbox_url'] = array(
		"label" => __('Lightbox URL', 'gp_lang'),
		"input" => "text",
		"value" => get_post_meta($post->ID, '_'.$dirname.'_lightbox_url', true),
		"helps" => __('The URL of an image, video or audio file that loads in the lightbox.', 'gp_lang'),
	);
			
						
	return $form_fields;

}
add_filter("attachment_fields_to_edit", "gp_edit_attachment", null, 2);


function gp_save_attachment($post, $attachment) {
	
	global $dirname;
	
	
	// Lightbox URL
	
	if(isset($attachment[$dirname.'_lightbox_url'])){
		update_post_meta($post['ID'], '_'.$dirname.'_lightbox_url', $attachment[$dirname.'_lightbox_url']);
	}	
	
	
	return $post;
	
}
add_filter("attachment_fields_to_save", "gp_save_attachment", null , 2);


?>