<?php

//////////////////////////////////////// Buttons ////////////////////////////////////////

if(!function_exists('gp_button')) {
	function gp_button($atts, $content = null) {
		extract(shortcode_atts(array(
			'link' => '',
			'target' => '_self'
		), $atts));

		$out = '<a href="'.$link.'" class="sc-button" target="'.$target.'">'.do_shortcode($content).'</a>';
	
		return $out;
	}
}
add_shortcode('button', 'gp_button');

?>