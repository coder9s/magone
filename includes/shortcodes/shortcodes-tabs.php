<?php
global $magone_shortcode_tab_id;
global $magone_shortcode_tab_list;
$magone_shortcode_tab_id = 0;
$magone_shortcode_tab_list = array();
function magone_shortcode_tabs_display( $atts = array(), $content = "" ) {
	if ($content) {
		global $magone_shortcode_tab_list;
		$magone_shortcode_tab_list = array();
		do_shortcode($content);
		if (!count($magone_shortcode_tab_list)) {
			// if content has no tab
			return do_shortcode($content);
		} else {
			if (empty($atts['id'])) {
				global $magone_shortcode_tab_id;
				$atts['id'] = 'shortcode-tab-'.$magone_shortcode_tab_id;
				$magone_shortcode_tab_id++;
			} else {
				$atts['id'] = magone_title_to_slug($atts['id']);
			}
			
			// output follow jquery ui tabs
			$ret = '<div class="clear"></div><div id="'.$atts['id'].'" class="shortcode-listing shortcode-'.$atts['style'].'tab">';	
			
			// code for title
			$ret .= '<ul class="tab-header">';
			for($i = 0; $i < count($magone_shortcode_tab_list); $i++) {				
				$ret .= '<li class="tab-title"><a href="'.esc_url('#'.$atts['id'].'-'.$i).'">'.$magone_shortcode_tab_list[$i]['atts']['title'].'</a></li>';
			}
			$ret .= '</ul>';

			// code for content
			for($i = 0; $i < count($magone_shortcode_tab_list); $i++) {			
				$ret .= '<div id="'.$atts['id'].'-'.$i.'" class="tab-content"><div class="inner">'.do_shortcode($magone_shortcode_tab_list[$i]['content']).'</div></div>';
			}
			
			// close tab
			$ret .= '<div class="clear"></div></div><div class="clear"></div>';
		}		
		return $ret;
	}
}

function magone_shortcode_tab_display( $atts = array(), $content = "" ) {
	global $magone_shortcode_tab_list;
	array_push($magone_shortcode_tab_list, array(
		'atts' => $atts,
		'content' => $content
	));
}
