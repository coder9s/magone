<?php

function magone_shortcode_message_display( $atts = array(), $content = "" ) {
	if ($content && !empty($atts['title'])) {
		return 
		'<div'.
		(!empty($atts['id'])? ' id="'.$atts['id'].'"' : '').
		' class="shortcode-listing shortcode-message">'.
			'<div class="message-title" st'.'yle="background-color: '.$atts['title_bg'].'; color: '.$atts['title_color'].'">'.
				(!empty($atts['title_icon'])? apply_filters('sneeit_get_font_awesome_tag', $atts['title_icon']) . ' ' : '').
				$atts['title'].
			'</div>'.
			'<div class="message-content" styl'.'e="background-color: '.$atts['content_bg'].'; color: '.$atts['content_color'].'">'.
				do_shortcode($content).
			'</div>'.
			'<div class="clear"></div>'.
		'</div>';
	}
}