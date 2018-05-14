<?php

global $magone_shortcode_accordion_id;
global $magone_shortcode_accordion_list;
$magone_shortcode_accordion_id = 0;
$magone_shortcode_accordion_list = array();
function magone_shortcode_accordions_display( $atts = array(), $content = "" ) {
	if ($content) {
		global $magone_shortcode_accordion_list;
		$magone_shortcode_accordion_list = array();
		do_shortcode($content);
		if (!count($magone_shortcode_accordion_list)) {
			// if content has no accordion
			return do_shortcode($content);
		} else {
			if (empty($atts['id'])) {
				global $magone_shortcode_accordion_id;
				$atts['id'] = 'shortcode-accordion-'.$magone_shortcode_accordion_id;
				$magone_shortcode_accordion_id++;
			} else {
				$atts['id'] = magone_title_to_slug($atts['id']);
			}
			
			// output follow jquery ui accordions
			$ret = '<div class="clear"></div><div id="'.esc_attr($atts['id']).'" class="shortcode-listing shortcode-accordion" data-multiple_open="'.esc_attr($atts['multiple_open']).'" data-close_all="'.esc_attr($atts['close_all']).'">';	
			
			// code for title
			
			for($i = 0; $i < count($magone_shortcode_accordion_list); $i++) {				
				$ret .= '<h3>' 
				. '<a href="javascript:void(0)" class="accordion-title accordion-title-'.esc_attr($i).'"><span class="accordion-title-text">'.$magone_shortcode_accordion_list[$i]['atts']['title'].'</span><i class="fa fa-angle-down accordion-title-icon-inactive accordion-title-icon"></i><i class="fa fa-angle-up accordion-title-icon-active accordion-title-icon"></i></a>'
				. '</h3>'
				. '<div class="accordion-content"><div class="inner">'
				. do_shortcode($magone_shortcode_accordion_list[$i]['content']) . '</div></div>';
			}
			
			// close accordion
			$ret .= '<div class="clear"></div></div><div class="clear"></div>';
		}		
		return $ret;
	}
}

function magone_shortcode_accordion_display( $atts = array(), $content = "" ) {
	global $magone_shortcode_accordion_list;
	array_push($magone_shortcode_accordion_list, array(
		'atts' => $atts,
		'content' => $content
	));
}
