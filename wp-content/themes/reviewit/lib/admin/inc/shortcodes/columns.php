<?php

//////////////////////////////////////// Columns ////////////////////////////////////////

if(!function_exists('gp_columns')) {
	function gp_columns($atts, $content = null, $code) {
		extract(shortcode_atts(array(
			'text_align' => 'text-left',
			'height' => '',
			'padding' => '',
			'margins' => '',
			'background' => ''
		), $atts));


		// Unique Name
	
		STATIC $i = 0;
		$i++;
		$name = 'columns'.$i;
	
		
		if($code=="one") {
		$class = "one first last";	
		} elseif($code=="two") {
		$class = "two first";	
		} elseif($code=="two_last") {
		$class = "two last";	
		} elseif($code=="three") {
		$class = "three first";	
		} elseif($code=="three_middle") {
		$class = "three middle";
		} elseif($code=="three_last") {
		$class = "three last";	
		} elseif($code=="four") {
		$class = "four first";	
		} elseif($code=="four_middle") {
		$class = "four middle";	
		} elseif($code=="four_last") {
		$class = "four last";	
		} elseif($code=="five") {	
		$class = "five first";	
		} elseif($code=="five_middle") {
		$class = "five middle";	
		} elseif($code=="five_last") {
		$class = "five last";		
		} elseif($code=="onethird") {
		$class = "onethird first";
		} elseif($code=="onethird_last") {
		$class = "onethird last";	
		} elseif($code=="twothirds") {
		$class = "twothirds first";	
		} elseif($code=="twothirds_last") {
		$class = "twothirds last";
		} elseif($code=="onefourth") {
		$class = "onefourth first";	
		} elseif($code=="onefourth_last") {
		$class = "onefourth last";
		} elseif($code=="threefourths") {
		$class = "threefourths";		
		} elseif($code=="threefourths_last") {
		$class = "threefourths last";		
		}
	
		$clear = strpos($class,"last");

		// Height
		if($height != "") {
			if(preg_match('/%/', $height) OR preg_match('/em/', $height) OR preg_match('/px/', $height)) {
				$height = 'height: '.$height.'; ';		
			} else {
				$height = 'height: '.$height.'px; ';		
			}
		} else {
			$height = "";
		}

		// Padding
		if($padding != "") {
			if(preg_match('/%/', $padding) OR preg_match('/em/', $padding) OR preg_match('/px/', $padding)) {
				$padding = str_replace(",", " ", $padding);
				$padding = 'padding: '.$padding.'; ';	
			} else {
				$padding = str_replace(",", "px ", $padding);
				$padding = 'padding: '.$padding.'px; ';		
			}
		} else {
			$padding = "";
		}
	
		// Margins
		if($margins != "") {
			if(preg_match('/%/', $margins) OR preg_match('/em/', $margins) OR preg_match('/px/', $margins)) {
				$margins = str_replace(",", " ", $margins);
				$margins = 'margin: '.$margins.'; ';	
			} else {
				$margins = str_replace(",", "px ", $margins);
				$margins = 'margin: '.$margins.'px; ';		
			}
		} else {
			$margins = "";
		}

		// Background
		if($background != "") {
			$background = 'background: '.$background.'; ';
		} else {
			$background = "";
		}
	
		if($clear === false) {
			return '<div class="columns '.$class.' '.$name.' '.$text_align.'" style="'.$margins.'"><div style="'.$height.$padding.$background.'">'.do_shortcode($content).'<div class="clear"></div></div></div>';
		} else {
			return '<div class="columns '.$class.' '.$name.' '.$text_align.'" style="'.$margins.'"><div style="'.$height.$padding.$background.'">'.do_shortcode($content).'<div class="clear"></div></div></div><div class="clear"></div>';
		}
	}
}

add_shortcode("one", "gp_columns");
add_shortcode("two", "gp_columns");
add_shortcode("two_last", "gp_columns");
add_shortcode("three", "gp_columns");
add_shortcode("three_middle", "gp_columns");
add_shortcode("three_last", "gp_columns");
add_shortcode("four", "gp_columns");
add_shortcode("four_middle", "gp_columns");
add_shortcode("four_last", "gp_columns");
add_shortcode("five", "gp_columns");
add_shortcode("five_middle", "gp_columns");
add_shortcode("five_last", "gp_columns");
add_shortcode("onethird", "gp_columns");
add_shortcode("onethird_last", "gp_columns");
add_shortcode("twothirds", "gp_columns");
add_shortcode("twothirds_last", "gp_columns");
add_shortcode("onefourth", "gp_columns");
add_shortcode("onefourth_last", "gp_columns");
add_shortcode("threefourths", "gp_columns");
add_shortcode("threefourths_last", "gp_columns");

?>