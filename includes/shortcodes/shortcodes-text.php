<?php
function magone_shortcode_text_display( $atts = array(), $content = "" ) {	
	if ($content) {
		if (isset($atts['text_format']) && $atts['text_format']) {
			return $content;
		} else {
			return wpautop(make_clickable(do_shortcode($content)));
		}
	}
}
