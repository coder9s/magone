<?php

function magone_shortcode_button_display( $atts = array(), $content = "" ) {	
	if ($content) {
		if (empty($atts['size'])) {
			$atts['size'] = 14;
		}
		if (empty($atts['bg_color'])) {
			$atts['bg_color'] = '#ffffff';
		}
		if (empty($atts['text_color'])) {
			$atts['text_color'] = '#000000';
		}
		if (empty($atts['border_color'])) {
			$atts['border_color'] = '#000000';
		}
		if (empty($atts['icon_position'])) {
			$atts['icon_position'] = 'start';
		}
		return 
		'<a '.
		'href="'.esc_url(!empty($atts['url'])? $atts['url']: 'javascript:void(0)').'"'.
		(!empty($atts['target'])? ' target="_blank"':''). 
		(!empty($atts['id'])? ' id="'.esc_attr($atts['id']).'"':'').
		' class="button"'.			
		' st'.'yle="font-size: '.esc_attr($atts['size']).'px; background-color: '.esc_attr($atts['bg_color']).'; color: '.esc_attr($atts['text_color']).'"'.
		'>'.
				
			(!empty($atts['icon']) && $atts['icon_position'] == 'start'? 
				apply_filters('sneeit_get_font_awesome_tag', $atts['icon']):'').' '. 
			do_shortcode($content) .
			(!empty($atts['icon']) && $atts['icon_position'] == 'end'? 
				apply_filters('sneeit_get_font_awesome_tag', $atts['icon']):'').' '. 
			'<span class="button-overlay"></span>'.
				
		'</a>';
	}
}